<?php
add_theme_support('custom-header');
add_theme_support('edit_theme_options');

class OltSiteOptions
{
    private $SECTION = 'olt_settings_section';

    public function __construct()
    {
        add_action('customize_register', array(
            $this, 'register_customize_section'
        ));
    }

    public function register_customize_section($wp_customize)
    {
        $this->olt_site_settings_section($wp_customize);
    }

    public function olt_site_settings_section($wp_customize)
    {
        $wp_customize->add_section($this->SECTION, array(
            'title' => 'Site-Wide Settings',
            'priority' => 2,
            'description' => 'Options for customizing some site-wide theme settings'
        ));

        $wp_customize->add_setting('olt_settings_friend_text', array(
            'default' => '',
            'sanitize_callback' => array($this, 'sanitize_custom_text')
        ));

        $wp_customize->add_control(new WP_Customize_Control(
            $wp_customize,
            'olt_settings_friend_text_control',
            array(
                'label' => 'Become a Friend Text',
                'section' => $this->SECTION,
                'settings' => 'olt_settings_friend_text',
                'type' => 'textarea'
            )
        ));

        $wp_customize->add_setting('olt_settings_donate_text', array(
            'default' => '',
            'sanitize_callback' => array($this, 'sanitize_custom_text')
        ));


        $wp_customize->add_control(new WP_Customize_Control(
            $wp_customize,
            'olt_settings_donate_text_control',
            array(
                'label' => 'Become a Donor Text',
                'section' => $this->SECTION,
                'settings' => 'olt_settings_donate_text',
                'type' => 'textarea'
            )
        ));

        $wp_customize->add_setting('olt_settings_friend_image', array(
            'default' => '',
            'type' => 'theme_mod',
            'capability' => 'edit_theme_options',
            'sanitize_callback' => array($this, 'sanitize_custom_url')
        ));

        $wp_customize->add_control(new WP_Customize_Cropped_Image_Control(
            $wp_customize,
            'olt_settings_friend_image_input',
            array(
                'label' => 'Become a Friend Image',
                'section' => $this->SECTION,
                'height' => 470,
                'width' => 1280,
                'settings' => 'olt_settings_friend_image'
            )
        ));

        $wp_customize->add_setting('olt_settings_footer_image', array(
            'default' => '',
            'type' => 'theme_mod',
            'capability' => 'edit_theme_options',
            'sanitize_callback' => array($this, 'sanitize_custom_url')
        ));

        $wp_customize->add_control(new WP_Customize_Cropped_Image_Control(
            $wp_customize,
            'olt_settings_footer_image_input',
            array(
                'label' => 'Footer Image',
                'section' => $this->SECTION,
                'height' => 510,
                'width' => 510,
                'settings' => 'olt_settings_footer_image'
            )
        ));
    }

    public function sanitize_custom_text($input)
    {
        return filter_var($input, FILTER_SANITIZE_STRING);
    }

    public function sanitize_custom_url($input)
    {
        return filter_var($input, FILTER_SANITIZE_URL);
    }
}

class OltLinkSettings {
    private $SECTION = 'olt_links_settings_section';

    public function __construct()
    {
        add_action('customize_register', array(
            $this, 'register_customize_section'
        ));
    }

    public function register_customize_section($wp_customize)
    {
        $this->olt_site_settings_section($wp_customize);
    }

    public function olt_site_settings_section($wp_customize)
    {
        $wp_customize->add_section($this->SECTION, array(
            'title' => 'Link Settings',
            'priority' => 2,
            'description' => 'Options for global site links'
        ));

        $this->add_url_setting($wp_customize, 'olt_donate_link', 'Donate Link');
        $this->add_url_setting($wp_customize, 'olt_friend_link', 'Friend Link');
        $this->add_url_setting($wp_customize, 'olt_facebook_link', 'Facebook Link');
        $this->add_url_setting($wp_customize, 'olt_twitter_link', 'Twitter Link');
        $this->add_url_setting($wp_customize, 'olt_instagram_link', 'Instagram Link');
        $this->add_url_setting($wp_customize, 'olt_flickr_link', 'Flickr Link');
    }
   
    public function add_url_setting($wp_customize, $setting_name, $setting_label){
        $wp_customize->add_setting($setting_name, array(
            'default' => '',
            'sanitize_callback' => array($this, 'sanitize_custom_url')
        ));

        $wp_customize->add_control(new WP_Customize_Control(
            $wp_customize,
            $setting_name."_text_control",
            array(
                'label' => $setting_label,
                'section' => $this->SECTION,
                'settings' => $setting_name,
                'type' => 'url'
            )
        ));
    }

    public function sanitize_custom_url($input)
    {
        return filter_var($input, FILTER_SANITIZE_URL);
    }
}