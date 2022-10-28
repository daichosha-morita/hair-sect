<?php
/**
 * Moving Media Library
 *
 * @package    Moving Media Library
 * @subpackage MovingMediaLibrary Main function
/*  Copyright (c) 2020- Katsushi Kawamori (email : dodesyoswift312@gmail.com)
	This program is free software; you can redistribute it and/or modify
	it under the terms of the GNU General Public License as published by
	the Free Software Foundation; version 2 of the License.

	This program is distributed in the hope that it will be useful,
	but WITHOUT ANY WARRANTY; without even the implied warranty of
	MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
	GNU General Public License for more details.

	You should have received a copy of the GNU General Public License
	along with this program; if not, write to the Free Software
	Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA
 */

$movingmedialibrary = new MovingMediaLibrary();

/** ==================================================
 * Class Main function
 *
 * @since 1.00
 */
class MovingMediaLibrary {

	/** ==================================================
	 * Path
	 *
	 * @var $upload_dir  upload_dir.
	 */
	private $upload_dir;

	/** ==================================================
	 * Construct
	 *
	 * @since 1.00
	 */
	public function __construct() {

		$wp_uploads = wp_upload_dir();
		$upload_dir = wp_normalize_path( $wp_uploads['basedir'] );
		$upload_dir = untrailingslashit( $upload_dir );
		$this->upload_dir = trailingslashit( $upload_dir ) . trailingslashit( 'moving-media-library' );

		/* Make json files dir */
		if ( ! is_dir( $this->upload_dir ) ) {
			wp_mkdir_p( $this->upload_dir );
		}

		add_action( 'movingmedialibrary_generate_json_hook', array( $this, 'generate_json' ) );
		add_action( 'movingmedialibrary_update_db_hook', array( $this, 'update_db' ), 10, 6 );
		add_action( 'movingmedialibrary_logs_check_files', array( $this, 'logs_check_files' ), 10, 1 );
		add_action( 'movingmedialibrary_logs_slice_create', array( $this, 'logs_slice_create' ), 10, 3 );
		add_action( 'movingmedialibrary_logs_slice_delete', array( $this, 'logs_slice_delete' ), 10, 2 );

	}

	/** ==================================================
	 * Gennerate json
	 *
	 * @since 1.00
	 */
	public function generate_json() {

		if ( function_exists( 'wp_date' ) ) {
			$time_stamp = wp_date( 'Y-m-d_H-i-s' );
		} else {
			$time_stamp = date_i18n( 'Y-m-d_H-i-s' );
		}
		$name = 'moving_media_library_' . $time_stamp . '.json';

		$json_file = $this->upload_dir . $name;

		/* Scan files */
		global $wpdb;
		$posts = $wpdb->get_results(
			"
			SELECT	*
			FROM	{$wpdb->prefix}posts
			WHERE	post_type = 'attachment'
					AND post_status = 'inherit'
			"
		);

		if ( empty( $posts ) ) {
			?>
			<div class="notice notice-error is-dismissible"><ul><li><?php esc_html_e( 'There is no media.', 'moving-media-library' ); ?></li></ul></div>
			<?php
			exit;
		}

		$posts_meta = $wpdb->get_results(
			"
			SELECT	*
			FROM	{$wpdb->prefix}postmeta
			WHERE	meta_key = '_wp_attached_file'
					OR meta_key = '_wp_attachment_metadata'
					OR meta_key = '_wp_attachment_image_alt'
			"
		);

		$posts_comment = $wpdb->get_results(
			"
			SELECT	comment_ID, comment_post_ID, comment_author, comment_author_email, comment_author_url, comment_author_IP, comment_date, comment_date_gmt, comment_content, comment_karma, comment_approved, comment_agent, comment_type, comment_parent, user_id
			FROM	{$wpdb->prefix}comments
			LEFT	JOIN {$wpdb->prefix}posts ON( {$wpdb->prefix}comments.comment_post_id = {$wpdb->prefix}posts.ID )
			WHERE	post_type = 'attachment'
					AND post_status = 'inherit'
			"
		);

		$post_json = json_encode(
			array(
				'post' => $posts,
				'postmeta' => $posts_meta,
				'comment' => $posts_comment,
			)
		);

		file_put_contents( $json_file, $post_json );

		/* Option logs slice and file delete for create json */
		do_action( 'movingmedialibrary_logs_slice_create', 'moving_media_library_export_files', $name, get_option( 'moving_media_library_number_files', 5 ) );

		if ( get_option( 'moving_media_library_mail_send' ) ) {
			/* Send mail JSON file */
			$message = 'Moving Media Library : ' . __( 'The JSON file for the contents has been generated.', 'moving-media-library' );
			wp_mail( get_option( 'admin_email' ), $message, $message, null, $json_file );
		}

	}

	/** ==================================================
	 * Update DB
	 *
	 * @param string $json_file  json_file.
	 * @param int    $uid  uid.
	 * @param array  $user_ids  user_ids.
	 * @param string $search_url  search_url.
	 * @param string $replace_url  replace_url.
	 * @param bool   $change_guid  change_guid.
	 * @since 1.00
	 */
	public function update_db( $json_file, $uid, $user_ids, $search_url, $replace_url, $change_guid ) {

		global $wpdb;

		$json = file_get_contents( $json_file );
		$import_data = json_decode( $json );

		foreach ( $import_data as $key1 => $value1 ) {
			foreach ( $value1 as $key2 => $value2 ) {
				if ( 'post' === $key1 ) {
					$table = $wpdb->prefix . 'posts';
					if ( is_null( get_post( $value2->ID ) ) ) {
						$wpdb->insert( $table, array( 'ID' => $value2->ID ), array( '%d' ) );
					}
					if ( array_key_exists( $value2->post_author, $user_ids ) ) {
						$pid = $user_ids[ $value2->post_author ];
					} else {
						$pid = $value2->post_author;
					}
					if ( 0 < $uid ) {
						$value2->post_author = $uid;
					} else {
						$value2->post_author = $pid;
					}
					$wpdb->update( $table, (array) $value2, array( 'ID' => $value2->ID ) );
				} else if ( 'postmeta' === $key1 ) {
					$table = $wpdb->prefix . 'postmeta';
					$is_meta_id = false;
					$is_meta_id = $wpdb->get_var(
						$wpdb->prepare(
							"
							SELECT meta_id
							FROM {$wpdb->prefix}postmeta
							WHERE meta_id = %d
							",
							$value2->meta_id
						)
					);
					if ( ! $is_meta_id ) {
						$wpdb->insert( $table, (array) $value2 );
					} else {
						$wpdb->update( $table, (array) $value2, array( 'meta_id' => $value2->meta_id ) );
					}
				} else if ( 'comment' === $key1 ) {
					$table = $wpdb->prefix . 'comments';
					if ( is_null( get_comment( $value2->comment_ID ) ) ) {
						$wpdb->insert( $table, array( 'comment_ID' => $value2->comment_ID ), array( '%d' ) );
					}
					if ( array_key_exists( $value2->user_id, $user_ids ) ) {
						$pid = $user_ids[ $value2->user_id ];
					} else {
						$pid = $value2->user_id;
					}
					if ( 0 < $uid && 0 < $value2->user_id ) {
						$value2->user_id = $uid;
					} else {
						$value2->user_id = $pid;
					}
					$wpdb->update( $table, (array) $value2, array( 'comment_ID' => $value2->comment_ID ) );
				}
			}
		}

		if ( ! empty( $search_url ) && ! empty( $replace_url ) ) {
			/* Replace Contents */
			$wpdb->query(
				$wpdb->prepare(
					"
					UPDATE {$wpdb->prefix}posts
					SET post_content = replace( post_content, %s, %s )
					",
					$search_url,
					$replace_url
				)
			);
			if ( $change_guid ) {
				/* Replace guid */
				$wpdb->query(
					$wpdb->prepare(
						"
						UPDATE {$wpdb->prefix}posts
						SET guid = replace( guid, %s, %s )
						",
						$search_url,
						$replace_url
					)
				);
			}
		}

		echo '<div class="notice notice-success is-dismissible"><ul><li>' . esc_html__( 'The import is now complete.', 'moving-media-library' ) . '</li></ul></div>';

	}

	/** ==================================================
	 * Check option logs and files
	 *
	 * @param string $option_name  option_name.
	 * @since 1.15
	 */
	public function logs_check_files( $option_name ) {

		$logs = get_option( $option_name, array() );

		$json_files = array();
		$files = glob( $this->upload_dir . '*.json' );
		if ( ! empty( $files ) ) {
			foreach ( $files as $file ) {
				$json_files[] = wp_basename( $file );
			}
		}
		$delete_files_diff = array_diff( $logs, $json_files );
		if ( ! empty( $delete_files_diff ) ) {
			foreach ( $logs as $key => $value ) {
				if ( in_array( $value, $delete_files_diff ) ) {
					unset( $logs[ $key ] );
				}
			}
			array_values( $logs );
			update_option( $option_name, $logs );
		}

	}

	/** ==================================================
	 * Option logs slice and file delete for create json
	 *
	 * @param string $option_name  option_name.
	 * @param string $name  name.
	 * @param int    $number_files  number_files.
	 * @since 1.15
	 */
	public function logs_slice_create( $option_name, $name, $number_files ) {

		$logs = get_option( $option_name, array() );

		if ( ! empty( $logs ) ) {
			$log_files_all = array_merge( array( $name ), $logs );
		} else {
			$log_files_all = array( $name );
		}
		$log_files = array_slice( $log_files_all, 0, $number_files );
		$delete_files = array_slice( $log_files_all, $number_files );
		update_option( $option_name, $log_files );
		foreach ( $delete_files as $value ) {
			$delete_file = $this->upload_dir . $value;
			if ( file_exists( $delete_file ) ) {
				unlink( $delete_file );
			}
		}

	}

	/** ==================================================
	 * Option logs slice and file delete for delete json
	 *
	 * @param string $option_name  option_name.
	 * @param array  $delete_files  delete_files.
	 * @since 1.15
	 */
	public function logs_slice_delete( $option_name, $delete_files ) {

		$logs = get_option( $option_name, array() );

		foreach ( $delete_files as $name ) {
			if ( ! empty( $logs ) ) {
				foreach ( $logs as $key => $value ) {
					if ( $value === $name ) {
						unset( $logs[ $key ] );
					}
				}
				array_values( $logs );
				update_option( $option_name, $logs );
			}
			if ( file_exists( $this->upload_dir . $name ) ) {
				unlink( $this->upload_dir . $name );
			}
		}

	}

}


