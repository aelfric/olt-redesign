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
        'supports'           => array( 'title', 'editor', 'author', 'thumbnail' ),
    );
    register_post_type( 'production', $args);    
 }
 
 add_filter( 'post_thumbnail_html', 'remove_widthHeight_attribute', 10 );

add_action('wp_enqueue_scripts', 'link_css_stylesheet');
add_theme_support('title-tag');
add_theme_support('post-thumbnails');
add_image_size('featured-image', 490, 490, true);
add_image_size('hero-image', 1024, 1024, true);
add_image_size('footer-image', 1280, 320, Array('top', 'left'));
add_image_size('production-marquee', 360, 480, TRUE);
register_production_post_type();
new OltSiteOptions();
