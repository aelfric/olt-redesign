<?php

require_once ( get_template_directory() . '/theme-options.php' );

function link_css_stylesheet()
{
    wp_enqueue_style('normalize', get_template_directory_uri() . '/normalize.css');
    wp_enqueue_style('fonts', get_template_directory_uri() . '/fonts.css');
    wp_enqueue_style('style', get_stylesheet_uri());

    wp_enqueue_script('main', get_template_directory_uri() . '/script.js', "", "", true);
}

function register_my_menus() {
    register_nav_menus(
      array(
        'about-menu' => __( 'About Menu' ),
      )
    );
  }
  add_action( 'init', 'register_my_menus' );

  function remove_widthHeight_attribute( $html ) {
    $html = preg_replace( '/(width|height)="\d*"\s/', "", $html );
    return $html;
 }

 function register_production_post_type(){
    $labels = array(
        'name'               => _x( 'Theatrical Productions', 'post type general name' ),
        'singular_name'      => _x( 'Theatrical Production', 'post type singular name' ),
        'add_new'            => _x( 'Add New', 'theatrical-production' ),
        'add_new_item'       => __( 'Add New Production' ),
        'edit_item'          => __( 'Edit Production' ),
        'new_item'           => __( 'New Production' ),
        'all_items'          => __( 'All Production' ),
        'view_item'          => __( 'View Production' ),
        'search_items'       => __( 'Search Productions' ),
        'not_found'          => __( 'No production found' ),
        'not_found_in_trash' => __( 'No production found in the Trash' ), 
        'menu_name'          => 'Productions'
      );
    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'production' ),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => null,
        'show_in_rest'       => true,
        'supports'           => array( 'title', 'editor', 'thumbnail' ),
    );
    register_post_type( 'production', $args);    
 }
 
 add_filter( 'post_thumbnail_html', 'remove_widthHeight_attribute', 10 );

add_action('wp_enqueue_scripts', 'link_css_stylesheet');
add_theme_support( 'custom-logo' );
add_theme_support('title-tag');
add_theme_support('post-thumbnails');
add_image_size('featured-image', 490, 490, true);
add_image_size('hero-image', 1024, 1024, true);
add_image_size('footer-image', 1280, 320, Array('top', 'left'));
add_image_size('production-marquee', 360, 480, TRUE);
add_image_size('audition-thumb', 150, 150, TRUE);
register_production_post_type();
new OltSiteOptions();

/**
 * Registers the `audition` post type.
 */
function audition_init() {
  register_post_type( 'audition', array(
          'labels'                => array(
                  'name'                  => __( 'Auditions', 'olt-redesign' ),
                  'singular_name'         => __( 'Audition', 'olt-redesign' ),
                  'all_items'             => __( 'All Auditions', 'olt-redesign' ),
                  'archives'              => __( 'Audition Archives', 'olt-redesign' ),
                  'attributes'            => __( 'Audition Attributes', 'olt-redesign' ),
                  'insert_into_item'      => __( 'Insert into audition', 'olt-redesign' ),
                  'uploaded_to_this_item' => __( 'Uploaded to this audition', 'olt-redesign' ),
                  'featured_image'        => _x( 'Featured Image', 'audition', 'olt-redesign' ),
                  'set_featured_image'    => _x( 'Set featured image', 'audition', 'olt-redesign' ),
                  'remove_featured_image' => _x( 'Remove featured image', 'audition', 'olt-redesign' ),
                  'use_featured_image'    => _x( 'Use as featured image', 'audition', 'olt-redesign' ),
                  'filter_items_list'     => __( 'Filter auditions list', 'olt-redesign' ),
                  'items_list_navigation' => __( 'Auditions list navigation', 'olt-redesign' ),
                  'items_list'            => __( 'Auditions list', 'olt-redesign' ),
                  'new_item'              => __( 'New Audition', 'olt-redesign' ),
                  'add_new'               => __( 'Add New', 'olt-redesign' ),
                  'add_new_item'          => __( 'Add New Audition', 'olt-redesign' ),
                  'edit_item'             => __( 'Edit Audition', 'olt-redesign' ),
                  'view_item'             => __( 'View Audition', 'olt-redesign' ),
                  'view_items'            => __( 'View Auditions', 'olt-redesign' ),
                  'search_items'          => __( 'Search auditions', 'olt-redesign' ),
                  'not_found'             => __( 'No auditions found', 'olt-redesign' ),
                  'not_found_in_trash'    => __( 'No auditions found in trash', 'olt-redesign' ),
                  'parent_item_colon'     => __( 'Parent Audition:', 'olt-redesign' ),
                  'menu_name'             => __( 'Auditions', 'olt-redesign' ),
          ),
          'public'                => true,
          'hierarchical'          => false,
          'show_ui'               => true,
          'show_in_nav_menus'     => true,
          'supports'              => array( 'title', 'editor', 'thumbnail' ),
          'has_archive'           => true,
          'rewrite'               => true,
          'query_var'             => true,
          'menu_position'         => null,
          'menu_icon'             => 'dashicons-admin-post',
          'show_in_rest'          => true,
          'rest_base'             => 'audition',
          'rest_controller_class' => 'WP_REST_Posts_Controller',
  ) );

}
add_action( 'init', 'audition_init' );

/**
* Sets the post updated messages for the `audition` post type.
*
* @param  array $messages Post updated messages.
* @return array Messages for the `audition` post type.
*/
function audition_updated_messages( $messages ) {
  global $post;

  $permalink = get_permalink( $post );

  $messages['audition'] = array(
          0  => '', // Unused. Messages start at index 1.
          /* translators: %s: post permalink */
          1  => sprintf( __( 'Audition updated. <a target="_blank" href="%s">View audition</a>', 'olt-redesign' ), esc_url( $permalink ) ),
          2  => __( 'Custom field updated.', 'olt-redesign' ),
          3  => __( 'Custom field deleted.', 'olt-redesign' ),
          4  => __( 'Audition updated.', 'olt-redesign' ),
          /* translators: %s: date and time of the revision */
          5  => isset( $_GET['revision'] ) ? sprintf( __( 'Audition restored to revision from %s', 'olt-redesign' ), wp_post_revision_title( (int) $_GET['revision'], false ) ) : false,
          /* translators: %s: post permalink */
          6  => sprintf( __( 'Audition published. <a href="%s">View audition</a>', 'olt-redesign' ), esc_url( $permalink ) ),
          7  => __( 'Audition saved.', 'olt-redesign' ),
          /* translators: %s: post permalink */
          8  => sprintf( __( 'Audition submitted. <a target="_blank" href="%s">Preview audition</a>', 'olt-redesign' ), esc_url( add_query_arg( 'preview', 'true', $permalink ) ) ),
          /* translators: 1: Publish box date format, see https://secure.php.net/date 2: Post permalink */
          9  => sprintf( __( 'Audition scheduled for: <strong>%1$s</strong>. <a target="_blank" href="%2$s">Preview audition</a>', 'olt-redesign' ),
          date_i18n( __( 'M j, Y @ G:i', 'olt-redesign' ), strtotime( $post->post_date ) ), esc_url( $permalink ) ),
          /* translators: %s: post permalink */
          10 => sprintf( __( 'Audition draft updated. <a target="_blank" href="%s">Preview audition</a>', 'olt-redesign' ), esc_url( add_query_arg( 'preview', 'true', $permalink ) ) ),
  );

  return $messages;
}
add_filter( 'post_updated_messages', 'audition_updated_messages' );


/**
 * Registers the `timeline_year` post type.
 */
function timeline_year_init() {
  register_post_type( 'timeline-year', array(
          'labels'                => array(
                  'name'                  => __( 'Timeline years', 'olt-redesign' ),
                  'singular_name'         => __( 'Timeline year', 'olt-redesign' ),
                  'all_items'             => __( 'All Timeline years', 'olt-redesign' ),
                  'archives'              => __( 'Timeline year Archives', 'olt-redesign' ),
                  'attributes'            => __( 'Timeline year Attributes', 'olt-redesign' ),
                  'insert_into_item'      => __( 'Insert into timeline year', 'olt-redesign' ),
                  'uploaded_to_this_item' => __( 'Uploaded to this timeline year', 'olt-redesign' ),
                  'featured_image'        => _x( 'Featured Image', 'timeline-year', 'olt-redesign' ),
                  'set_featured_image'    => _x( 'Set featured image', 'timeline-year', 'olt-redesign' ),
                  'remove_featured_image' => _x( 'Remove featured image', 'timeline-year', 'olt-redesign' ),
                  'use_featured_image'    => _x( 'Use as featured image', 'timeline-year', 'olt-redesign' ),
                  'filter_items_list'     => __( 'Filter timeline years list', 'olt-redesign' ),
                  'items_list_navigation' => __( 'Timeline years list navigation', 'olt-redesign' ),
                  'items_list'            => __( 'Timeline years list', 'olt-redesign' ),
                  'new_item'              => __( 'New Timeline year', 'olt-redesign' ),
                  'add_new'               => __( 'Add New', 'olt-redesign' ),
                  'add_new_item'          => __( 'Add New Timeline year', 'olt-redesign' ),
                  'edit_item'             => __( 'Edit Timeline year', 'olt-redesign' ),
                  'view_item'             => __( 'View Timeline year', 'olt-redesign' ),
                  'view_items'            => __( 'View Timeline years', 'olt-redesign' ),
                  'search_items'          => __( 'Search timeline years', 'olt-redesign' ),
                  'not_found'             => __( 'No timeline years found', 'olt-redesign' ),
                  'not_found_in_trash'    => __( 'No timeline years found in trash', 'olt-redesign' ),
                  'parent_item_colon'     => __( 'Parent Timeline year:', 'olt-redesign' ),
                  'menu_name'             => __( 'Timeline years', 'olt-redesign' ),
          ),
          'public'                => true,
          'hierarchical'          => false,
          'show_ui'               => true,
          'show_in_nav_menus'     => true,
          'supports'              => array( 'title', 'editor' ),
          'has_archive'           => true,
          'rewrite'               => true,
          'query_var'             => true,
          'menu_position'         => null,
          'menu_icon'             => 'dashicons-admin-post',
          'show_in_rest'          => true,
          'rest_base'             => 'timeline-year',
          'rest_controller_class' => 'WP_REST_Posts_Controller',
  ) );

}
add_action( 'init', 'timeline_year_init' );

/**
* Sets the post updated messages for the `timeline_year` post type.
*
* @param  array $messages Post updated messages.
* @return array Messages for the `timeline_year` post type.
*/
function timeline_year_updated_messages( $messages ) {
  global $post;

  $permalink = get_permalink( $post );

  $messages['timeline-year'] = array(
          0  => '', // Unused. Messages start at index 1.
          /* translators: %s: post permalink */
          1  => sprintf( __( 'Timeline year updated. <a target="_blank" href="%s">View timeline year</a>', 'olt-redesign' ), esc_url( $permalink ) ),
          2  => __( 'Custom field updated.', 'olt-redesign' ),
          3  => __( 'Custom field deleted.', 'olt-redesign' ),
          4  => __( 'Timeline year updated.', 'olt-redesign' ),
          /* translators: %s: date and time of the revision */
          5  => isset( $_GET['revision'] ) ? sprintf( __( 'Timeline year restored to revision from %s', 'olt-redesign' ), wp_post_revision_title( (int) $_GET['revision'], false ) ) : false,
          /* translators: %s: post permalink */
          6  => sprintf( __( 'Timeline year published. <a href="%s">View timeline year</a>', 'olt-redesign' ), esc_url( $permalink ) ),
          7  => __( 'Timeline year saved.', 'olt-redesign' ),
          /* translators: %s: post permalink */
          8  => sprintf( __( 'Timeline year submitted. <a target="_blank" href="%s">Preview timeline year</a>', 'olt-redesign' ), esc_url( add_query_arg( 'preview', 'true', $permalink ) ) ),
          /* translators: 1: Publish box date format, see https://secure.php.net/date 2: Post permalink */
          9  => sprintf( __( 'Timeline year scheduled for: <strong>%1$s</strong>. <a target="_blank" href="%2$s">Preview timeline year</a>', 'olt-redesign' ),
          date_i18n( __( 'M j, Y @ G:i', 'olt-redesign' ), strtotime( $post->post_date ) ), esc_url( $permalink ) ),
          /* translators: %s: post permalink */
          10 => sprintf( __( 'Timeline year draft updated. <a target="_blank" href="%s">Preview timeline year</a>', 'olt-redesign' ), esc_url( add_query_arg( 'preview', 'true', $permalink ) ) ),
  );

  return $messages;
}
add_filter( 'post_updated_messages', 'timeline_year_updated_messages' );

function olt_gutenberg_blocks(){
  wp_register_script(
    'olt-gutenberg-js', 
    get_template_directory_uri() . '/build/index.js', 
    array('wp-blocks'));

  register_block_type('olt/show-date', array(
    'editor_script' => 'olt-gutenberg-js'
  ));
}

add_action('init', 'olt_gutenberg_blocks');

function prefix_add_api_endpoints() {
	add_rewrite_tag( '%api_item_id%', '([0-9]+)' );
	add_rewrite_rule( 'api/items/([0-9]+)/?', 'index.php?api_item_id=$matches[1]', 'top' );
}
add_action( 'init', 'prefix_add_api_endpoints' );

/**
 * Handle data (maybe) passed to the API endpoint.
 */
function prefix_do_api() {
	global $wp_query;

	$item_id = $wp_query->get( 'api_item_id' );

	if ( ! empty( $item_id ) ) {
		$response = get_post($item_id, ARRAY_A);

		// Do stuff with $item_id

		wp_send_json( $response );
	}
}
add_action( 'template_redirect', 'prefix_do_api' );