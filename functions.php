<?php

require_once(get_template_directory() . '/theme-options.php');
require_once(get_template_directory() . '/inc/post-type-audition.php');
require_once(get_template_directory() . '/inc/post-type-timeline.php');
require_once(get_template_directory() . '/inc/post-type-production.php');
require_once(get_template_directory() . '/inc/image-sizes.php');

function link_css_stylesheet()
{
  wp_enqueue_style('normalize', get_template_directory_uri() . '/normalize.css');
  wp_enqueue_style('fonts', get_template_directory_uri() . '/fonts.css');
  wp_enqueue_style('style', get_stylesheet_uri());

  wp_enqueue_script('main', get_template_directory_uri() . '/script.js', "", "", true);
}

function register_my_menus()
{
  register_nav_menus(
    array(
      'about-menu' => __('About Menu'),
    )
  );
}
add_action('init', 'register_my_menus');

add_action('wp_enqueue_scripts', 'link_css_stylesheet');
add_theme_support('custom-logo');
add_theme_support('title-tag');

new OltSiteOptions();
new OltLinkSettings();
new AudtionPostType();
new TimelineYearPostType();
new ProductionPostType();
new OltImageSizes();

function olt_gutenberg_blocks()
{
  wp_register_script(
    'olt-gutenberg-js',
    get_template_directory_uri() . '/build/index.js',
    array('wp-blocks')
  );

  register_block_type('olt/show-date', array(
    'editor_script' => 'olt-gutenberg-js'
  ));
}

add_action('init', 'olt_gutenberg_blocks');