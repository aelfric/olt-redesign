<?php

class ProductionPostType
{
    /**
     * Registers the `production` post type.
     */
    function production_init()
    {
        register_post_type('production', array(
            'labels'                => array(
                'name'                  => __('Productions', 'olt-redesign'),
                'singular_name'         => __('Production', 'olt-redesign'),
                'all_items'             => __('All Productions', 'olt-redesign'),
                'archives'              => __('Production Archives', 'olt-redesign'),
                'attributes'            => __('Production Attributes', 'olt-redesign'),
                'insert_into_item'      => __('Insert into production', 'olt-redesign'),
                'uploaded_to_this_item' => __('Uploaded to this production', 'olt-redesign'),
                'featured_image'        => _x('Featured Image', 'production', 'olt-redesign'),
                'set_featured_image'    => _x('Set featured image', 'production', 'olt-redesign'),
                'remove_featured_image' => _x('Remove featured image', 'production', 'olt-redesign'),
                'use_featured_image'    => _x('Use as featured image', 'production', 'olt-redesign'),
                'filter_items_list'     => __('Filter productions list', 'olt-redesign'),
                'items_list_navigation' => __('Productions list navigation', 'olt-redesign'),
                'items_list'            => __('Productions list', 'olt-redesign'),
                'new_item'              => __('New Production', 'olt-redesign'),
                'add_new'               => __('Add New', 'olt-redesign'),
                'add_new_item'          => __('Add New Production', 'olt-redesign'),
                'edit_item'             => __('Edit Production', 'olt-redesign'),
                'view_item'             => __('View Production', 'olt-redesign'),
                'view_items'            => __('View Productions', 'olt-redesign'),
                'search_items'          => __('Search productions', 'olt-redesign'),
                'not_found'             => __('No productions found', 'olt-redesign'),
                'not_found_in_trash'    => __('No productions found in trash', 'olt-redesign'),
                'parent_item_colon'     => __('Parent Production:', 'olt-redesign'),
                'menu_name'             => __('Productions', 'olt-redesign'),
            ),
            'public'                => true,
            'hierarchical'          => false,
            'show_ui'               => true,
            'show_in_nav_menus'     => true,
            'supports'              => array('title', 'editor', 'thumbnail'),
            'rewrite'               => array('slug' => 'production'),
            'has_archive'           => true,
            'rewrite'               => true,
            'query_var'             => true,
            'menu_position'         => null,
            'menu_icon'             => 'dashicons-admin-post',
            'show_in_rest'          => true,
            'rest_base'             => 'production',
            'rest_controller_class' => 'WP_REST_Posts_Controller',
        ));
    }


    /**
     * Sets the post updated messages for the `production` post type.
     *
     * @param  array $messages Post updated messages.
     * @return array Messages for the `production` post type.
     */
    function production_updated_messages($messages)
    {
        global $post;

        $permalink = get_permalink($post);

        $messages['production'] = array(
            0  => '', // Unused. Messages start at index 1.
            /* translators: %s: post permalink */
            1  => sprintf(__('Production updated. <a target="_blank" href="%s">View production</a>', 'olt-redesign'), esc_url($permalink)),
            2  => __('Custom field updated.', 'olt-redesign'),
            3  => __('Custom field deleted.', 'olt-redesign'),
            4  => __('Production updated.', 'olt-redesign'),
            /* translators: %s: date and time of the revision */
            5  => isset($_GET['revision']) ? sprintf(__('Production restored to revision from %s', 'olt-redesign'), wp_post_revision_title((int) $_GET['revision'], false)) : false,
            /* translators: %s: post permalink */
            6  => sprintf(__('Production published. <a href="%s">View production</a>', 'olt-redesign'), esc_url($permalink)),
            7  => __('Production saved.', 'olt-redesign'),
            /* translators: %s: post permalink */
            8  => sprintf(__('Production submitted. <a target="_blank" href="%s">Preview production</a>', 'olt-redesign'), esc_url(add_query_arg('preview', 'true', $permalink))),
            /* translators: 1: Publish box date format, see https://secure.php.net/date 2: Post permalink */
            9  => sprintf(
                __('Production scheduled for: <strong>%1$s</strong>. <a target="_blank" href="%2$s">Preview production</a>', 'olt-redesign'),
                date_i18n(__('M j, Y @ G:i', 'olt-redesign'), strtotime($post->post_date)),
                esc_url($permalink)
            ),
            /* translators: %s: post permalink */
            10 => sprintf(__('Production draft updated. <a target="_blank" href="%s">Preview production</a>', 'olt-redesign'), esc_url(add_query_arg('preview', 'true', $permalink))),
        );

        return $messages;
    }
    public function __construct()
    {
        add_action('init', array($this, 'production_init'));
        add_filter('post_updated_messages', array($this, 'production_updated_messages'));
    }
}
