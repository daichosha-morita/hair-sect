<?php
/**
 * Uninstall
 *
 * @package Moving Media Library
 */

if ( ! defined( 'WP_UNINSTALL_PLUGIN' ) ) {
	exit();
}

/* For Single site */
if ( ! is_multisite() ) {
	delete_option( 'moving_media_library_export_files' );
	delete_option( 'moving_media_library_number_files' );
	delete_option( 'moving_media_library_mail_send' );
} else {
	/* For Multisite */
	global $wpdb;
	$blog_ids = $wpdb->get_col( "SELECT blog_id FROM {$wpdb->prefix}blogs" );
	$original_blog_id = get_current_blog_id();
	foreach ( $blog_ids as $blogid ) {
		switch_to_blog( $blogid );
		delete_option( 'moving_media_library_export_files' );
		delete_option( 'moving_media_library_number_files' );
		delete_option( 'moving_media_library_mail_send' );
	}
	switch_to_blog( $original_blog_id );

	/* For site options. */
	delete_site_option( 'moving_media_library_export_files' );
	delete_site_option( 'moving_media_library_number_files' );
	delete_site_option( 'moving_media_library_mail_send' );
}


