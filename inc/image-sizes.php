<?php

class OltImageSizes
{
    function remove_widthHeight_attribute( $html ) {
        $html = preg_replace( '/(width|height)="\d*"\s/', "", $html );
        return $html;
     }

    public function __construct()
    {
        add_theme_support('post-thumbnails');
        add_image_size('featured-image', 490, 490, true);
        add_image_size('hero-image', 1024, 1024, true);
        add_image_size('footer-image', 1280, 320, array('top', 'left'));
        add_image_size('production-marquee', 360, 480, TRUE);
        add_image_size('audition-thumb', 150, 150, TRUE);

        add_filter('post_thumbnail_html', array($this, 'remove_widthHeight_attribute'), 10);
    }
}
