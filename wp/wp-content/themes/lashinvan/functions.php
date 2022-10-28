<?php add_theme_support('post-thumbnails'); ?>
<?php
    // カスタム投稿タイプ
add_action( 'init', 'create_post_type' );
function create_post_type() {
  register_post_type( 'style',
    array(
      'labels' => array(
        'name' => __( 'スタイル' ),
        'singular_name' => __( 'Style' )
      ),
      'public' => true,
        'has_archive' => true,
      'supports' => array('title','editor','thumbnail')
    )
  );

  register_post_type( 'staff',
    array(
      'labels' => array(
        'name' => __( 'スタッフ' ),
        'singular_name' => __( 'Staff' )
      ),
      'public' => true,
        'has_archive' => true,
      'supports' => array('title','editor','thumbnail')
    )
  );
}

register_taxonomy(
    'length', /* タクソノミーの名前 */
    'style', /* books投稿で設定する */
    array(
      'hierarchical' => true, /* 親子関係が必要なければ false */
      'update_count_callback' => '_update_post_term_count',
      'label' => 'レングス',
      'singular_label' => 'スタイル',
      'public' => true,
      'show_ui' => true
    )
  );

register_taxonomy(
    'stylist', /* タクソノミーの名前 */
    'style', /* books投稿で設定する */
    array(
      'hierarchical' => true, /* 親子関係が必要なければ false */
      'update_count_callback' => '_update_post_term_count',
      'label' => 'スタイリスト',
      'singular_label' => 'スタイル',
      'public' => true,
      'show_ui' => true
    )
  );

register_taxonomy(
    'salon-staff', /* タクソノミーの名前 */
    'staff', /* books投稿で設定する */
    array(
      'hierarchical' => true, /* 親子関係が必要なければ false */
      'update_count_callback' => '_update_post_term_count',
      'label' => '店舗',
      'singular_label' => 'スタッフ',
      'public' => true,
      'show_ui' => true
    )
  );
	?>
<?php add_image_size( 'blog_thumbnail_01', 200, 200, true ); ?>
<?php add_image_size( 'blog_thumbnail_02', 767, 767, false ); ?>
<?php add_image_size( 'style_thumbnail', 510, 400, true ); ?>
<?php add_image_size( 'staff_thumbnail', 510, 660, true ); ?>
<?php
add_action('pre_get_posts', 'custom_pre_get_posts');
function custom_pre_get_posts($query) {
  	if (!is_admin() && $query->is_main_query() && is_post_type_archive('style'))
    $query->set('posts_per_page', '15');
	 elseif (!is_admin() && $query->is_main_query() && $query->is_tax('length'))
  	$query->set('posts_per_page', '15');
  	elseif (!is_admin() && $query->is_main_query() && $query->is_tax('salon-staff'))
  $query->set('posts_per_page', '15');
  }
 ?>
<?php
function disable_emoji() {
     remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
     remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
     remove_action( 'wp_print_styles', 'print_emoji_styles' );
     remove_action( 'admin_print_styles', 'print_emoji_styles' );
     remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
     remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );
     remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
}
add_action( 'init', 'disable_emoji' );
?>
<?php
add_action( 'restrict_manage_posts', 'add_post_taxonomy_restrict_filter' );
function add_post_taxonomy_restrict_filter() {
    global $post_type;
    if ( 'staff' == $post_type ) {
        ?>
        <select name="salon-staff">
            <option value="">カテゴリー指定なし</option>
            <?php
            $terms = get_terms('salon-staff');
            foreach ($terms as $term) { ?>
                <option value="<?php echo $term->slug; ?>"><?php echo $term->name; ?></option>
            <?php } ?>
        </select>
        <?php
    }
}
?>
<?php
add_shortcode('template', 'shortcode_tp');
function shortcode_tp() {
return get_template_directory_uri();
}
add_shortcode('url', 'shortcode_url');
function shortcode_url() {
return get_bloginfo('url');
}
?>
<?php
add_action( 'pre_get_posts', 'my_exclude_terms_from_query' );
function my_exclude_terms_from_query( $query ) {
    if ( $query->is_main_query() /* その他の設定 */ ) {
        $tax_query = array (
                array(
                    'taxonomy' => 'length',
                    'terms' => array( 'mens','color' ),
                    'field' => 'slug',
                    'operator' => 'NOT IN',
                )
        );
        $query->set( 'tax_query', $tax_query );
    }
}
?>
