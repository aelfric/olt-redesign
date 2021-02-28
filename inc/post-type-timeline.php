<?php
class TimelineYearPostType
{
    /**
     * Registers the `timeline_year` post type.
     */
    function timeline_year_init()
    {
        register_post_type('timeline-year', array(
            'labels'                => array(
                'name'                  => __('Timeline years', 'olt-redesign'),
                'singular_name'         => __('Timeline year', 'olt-redesign'),
                'all_items'             => __('All Timeline years', 'olt-redesign'),
                'archives'              => __('Timeline year Archives', 'olt-redesign'),
                'attributes'            => __('Timeline year Attributes', 'olt-redesign'),
                'insert_into_item'      => __('Insert into timeline year', 'olt-redesign'),
                'uploaded_to_this_item' => __('Uploaded to this timeline year', 'olt-redesign'),
                'featured_image'        => _x('Featured Image', 'timeline-year', 'olt-redesign'),
                'set_featured_image'    => _x('Set featured image', 'timeline-year', 'olt-redesign'),
                'remove_featured_image' => _x('Remove featured image', 'timeline-year', 'olt-redesign'),
                'use_featured_image'    => _x('Use as featured image', 'timeline-year', 'olt-redesign'),
                'filter_items_list'     => __('Filter timeline years list', 'olt-redesign'),
                'items_list_navigation' => __('Timeline years list navigation', 'olt-redesign'),
                'items_list'            => __('Timeline years list', 'olt-redesign'),
                'new_item'              => __('New Timeline year', 'olt-redesign'),
                'add_new'               => __('Add New', 'olt-redesign'),
                'add_new_item'          => __('Add New Timeline year', 'olt-redesign'),
                'edit_item'             => __('Edit Timeline year', 'olt-redesign'),
                'view_item'             => __('View Timeline year', 'olt-redesign'),
                'view_items'            => __('View Timeline years', 'olt-redesign'),
                'search_items'          => __('Search timeline years', 'olt-redesign'),
                'not_found'             => __('No timeline years found', 'olt-redesign'),
                'not_found_in_trash'    => __('No timeline years found in trash', 'olt-redesign'),
                'parent_item_colon'     => __('Parent Timeline year:', 'olt-redesign'),
                'menu_name'             => __('Timeline years', 'olt-redesign'),
            ),
            'public'                => true,
            'hierarchical'          => false,
            'show_ui'               => true,
            'show_in_nav_menus'     => true,
            'supports'              => array('title', 'editor'),
            'has_archive'           => true,
            'rewrite'               => true,
            'query_var'             => true,
            'menu_position'         => null,
            'menu_icon'             => 'dashicons-admin-post',
            'show_in_rest'          => true,
            'rest_base'             => 'timeline-year',
            'rest_controller_class' => 'WP_REST_Posts_Controller',
        ));
    }


    /**
     * Sets the post updated messages for the `timeline_year` post type.
     *
     * @param  array $messages Post updated messages.
     * @return array Messages for the `timeline_year` post type.
     */
    function timeline_year_updated_messages($messages)
    {
        global $post;

        $permalink = get_permalink($post);

        $messages['timeline-year'] = array(
            0  => '', // Unused. Messages start at index 1.
            /* translators: %s: post permalink */
            1  => sprintf(__('Timeline year updated. <a target="_blank" href="%s">View timeline year</a>', 'olt-redesign'), esc_url($permalink)),
            2  => __('Custom field updated.', 'olt-redesign'),
            3  => __('Custom field deleted.', 'olt-redesign'),
            4  => __('Timeline year updated.', 'olt-redesign'),
            /* translators: %s: date and time of the revision */
            5  => isset($_GET['revision']) ? sprintf(__('Timeline year restored to revision from %s', 'olt-redesign'), wp_post_revision_title((int) $_GET['revision'], false)) : false,
            /* translators: %s: post permalink */
            6  => sprintf(__('Timeline year published. <a href="%s">View timeline year</a>', 'olt-redesign'), esc_url($permalink)),
            7  => __('Timeline year saved.', 'olt-redesign'),
            /* translators: %s: post permalink */
            8  => sprintf(__('Timeline year submitted. <a target="_blank" href="%s">Preview timeline year</a>', 'olt-redesign'), esc_url(add_query_arg('preview', 'true', $permalink))),
            /* translators: 1: Publish box date format, see https://secure.php.net/date 2: Post permalink */
            9  => sprintf(
                __('Timeline year scheduled for: <strong>%1$s</strong>. <a target="_blank" href="%2$s">Preview timeline year</a>', 'olt-redesign'),
                date_i18n(__('M j, Y @ G:i', 'olt-redesign'), strtotime($post->post_date)),
                esc_url($permalink)
            ),
            /* translators: %s: post permalink */
            10 => sprintf(__('Timeline year draft updated. <a target="_blank" href="%s">Preview timeline year</a>', 'olt-redesign'), esc_url(add_query_arg('preview', 'true', $permalink))),
        );

        return $messages;
    }
    public function __construct()
    {
        add_action('init', array($this, 'timeline_year_init'));
        add_filter('post_updated_messages', array($this, 'timeline_year_updated_messages'));
    }
}
