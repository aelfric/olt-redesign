<?php
class AudtionPostType
{
    /**
     * Registers the `audition` post type.
     */
    function audition_init()
    {
        register_post_type('audition', array(
            'labels'                => array(
                'name'                  => __('Auditions', 'olt-redesign'),
                'singular_name'         => __('Audition', 'olt-redesign'),
                'all_items'             => __('All Auditions', 'olt-redesign'),
                'archives'              => __('Audition Archives', 'olt-redesign'),
                'attributes'            => __('Audition Attributes', 'olt-redesign'),
                'insert_into_item'      => __('Insert into audition', 'olt-redesign'),
                'uploaded_to_this_item' => __('Uploaded to this audition', 'olt-redesign'),
                'featured_image'        => _x('Featured Image', 'audition', 'olt-redesign'),
                'set_featured_image'    => _x('Set featured image', 'audition', 'olt-redesign'),
                'remove_featured_image' => _x('Remove featured image', 'audition', 'olt-redesign'),
                'use_featured_image'    => _x('Use as featured image', 'audition', 'olt-redesign'),
                'filter_items_list'     => __('Filter auditions list', 'olt-redesign'),
                'items_list_navigation' => __('Auditions list navigation', 'olt-redesign'),
                'items_list'            => __('Auditions list', 'olt-redesign'),
                'new_item'              => __('New Audition', 'olt-redesign'),
                'add_new'               => __('Add New', 'olt-redesign'),
                'add_new_item'          => __('Add New Audition', 'olt-redesign'),
                'edit_item'             => __('Edit Audition', 'olt-redesign'),
                'view_item'             => __('View Audition', 'olt-redesign'),
                'view_items'            => __('View Auditions', 'olt-redesign'),
                'search_items'          => __('Search auditions', 'olt-redesign'),
                'not_found'             => __('No auditions found', 'olt-redesign'),
                'not_found_in_trash'    => __('No auditions found in trash', 'olt-redesign'),
                'parent_item_colon'     => __('Parent Audition:', 'olt-redesign'),
                'menu_name'             => __('Auditions', 'olt-redesign'),
            ),
            'public'                => true,
            'hierarchical'          => false,
            'show_ui'               => true,
            'show_in_nav_menus'     => true,
            'supports'              => array('title', 'editor', 'thumbnail'),
            'has_archive'           => true,
            'rewrite'               => array('slug' => 'audition'),
            'query_var'             => true,
            'menu_position'         => null,
            'menu_icon'             => 'dashicons-admin-post',
            'show_in_rest'          => true,
            'rest_base'             => 'audition',
            'rest_controller_class' => 'WP_REST_Posts_Controller',
        ));
    }


    /**
     * Sets the post updated messages for the `audition` post type.
     *
     * @param  array $messages Post updated messages.
     * @return array Messages for the `audition` post type.
     */
    function audition_updated_messages($messages)
    {
        global $post;

        $permalink = get_permalink($post);

        $messages['audition'] = array(
            0  => '', // Unused. Messages start at index 1.
            /* translators: %s: post permalink */
            1  => sprintf(__('Audition updated. <a target="_blank" href="%s">View audition</a>', 'olt-redesign'), esc_url($permalink)),
            2  => __('Custom field updated.', 'olt-redesign'),
            3  => __('Custom field deleted.', 'olt-redesign'),
            4  => __('Audition updated.', 'olt-redesign'),
            /* translators: %s: date and time of the revision */
            5  => isset($_GET['revision']) ? sprintf(__('Audition restored to revision from %s', 'olt-redesign'), wp_post_revision_title((int) $_GET['revision'], false)) : false,
            /* translators: %s: post permalink */
            6  => sprintf(__('Audition published. <a href="%s">View audition</a>', 'olt-redesign'), esc_url($permalink)),
            7  => __('Audition saved.', 'olt-redesign'),
            /* translators: %s: post permalink */
            8  => sprintf(__('Audition submitted. <a target="_blank" href="%s">Preview audition</a>', 'olt-redesign'), esc_url(add_query_arg('preview', 'true', $permalink))),
            /* translators: 1: Publish box date format, see https://secure.php.net/date 2: Post permalink */
            9  => sprintf(
                __('Audition scheduled for: <strong>%1$s</strong>. <a target="_blank" href="%2$s">Preview audition</a>', 'olt-redesign'),
                date_i18n(__('M j, Y @ G:i', 'olt-redesign'), strtotime($post->post_date)),
                esc_url($permalink)
            ),
            /* translators: %s: post permalink */
            10 => sprintf(__('Audition draft updated. <a target="_blank" href="%s">Preview audition</a>', 'olt-redesign'), esc_url(add_query_arg('preview', 'true', $permalink))),
        );

        return $messages;
    }

    public function __construct()
    {
        add_action('init', array($this, 'audition_init'));
        add_filter('post_updated_messages', array($this, 'audition_updated_messages'));
    }
}
