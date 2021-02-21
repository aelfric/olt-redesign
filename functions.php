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
 
 add_filter( 'post_thumbnail_html', 'remove_widthHeight_attribute', 10 );

add_action('wp_enqueue_scripts', 'link_css_stylesheet');
add_theme_support('title-tag');
add_theme_support('post-thumbnails');
add_image_size('featured-image', 490, 490, true);
add_image_size('hero-image', 1024, 1024, true);
add_image_size('footer-image', 1280, 320, Array('top', 'left'));

new OltSiteOptions();
