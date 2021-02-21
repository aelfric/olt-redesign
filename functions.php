<?php

require_once ( get_template_directory() . '/theme-options.php' );

function link_css_stylesheet()
{
    wp_enqueue_style('normalize', get_template_directory_uri() . '/normalize.css');
    wp_enqueue_style('fonts', get_template_directory_uri() . '/fonts.css');
    wp_enqueue_style('style', get_stylesheet_uri());

    wp_enqueue_script('main', get_template_directory_uri() . '/script.js', "", "", true);
}

add_action('wp_enqueue_scripts', 'link_css_stylesheet');
add_theme_support('title-tag');
add_theme_support('post-thumbnails');
add_image_size('featured-image', 490, 490, true);
add_image_size('hero-image', 1024, 1024, true);
add_image_size('footer-image', 1280, 320, Array('top', 'left'));
