<?php

/*-------------------------------------------------------
	   ** Footer  Options
--------------------------------------------------------*/

CSF::createSection(
    $prefix,
    array(
        'parent' => 'footer_options',
        'id'     => 'footer_top_options',
        'title'  => esc_html__('Footer Top', 'matrik-core'),
        'icon'   => 'fa fa-question-circle',
        'fields' => array(
            // Footer Top Content
            array(
                'type'    => 'subheading',
                'content' => '<h3>' . esc_html__('Footer Top Options', 'matrik-core') . '</h3>'
            ),
            array(
                'id'      => 'header_footer_top_image',
                'type'    => 'image_select',
                'options' => array(
                    'footer_top' => esc_url(EGNS_CORE_THEME_OPTIONS_IMAGES . '/footer/footer-top.jpg'),
                ),
                'dependency' => array('header_footer_top_enable', '==', 'true')
            ),
            array(
                'id'      => 'header_footer_top_enable',
                'title'   => esc_html__('Enable', 'matrik-core'),
                'type'    => 'switcher',
                'desc'    => wp_kses(__('You can set <mark>ON/OFF</mark> to show the section bottom of post archive and details pages.', 'matrik-core'), wp_kses_allowed_html('post')),
                'default' => true,
            ),
            array(
                'id'         => 'footer_top_section_title',
                'type'       => 'text',
                'title'      => esc_html__('Title', 'matrik-core'),
                'default'    => esc_html__("Let's Build Dream Something Amazing.", 'matrik-core'),
                'dependency' => array('header_footer_top_enable', '==', 'true')
            ),
            array(
                'id'         => 'footer_top_section_subtitle',
                'type'       => 'text',
                'title'      => esc_html__('Subtitle', 'matrik-core'),
                'default'    => esc_html__('Building Your Vision', 'matrik-core'),
                'dependency' => array('header_footer_top_enable', '==', 'true')
            ),
            array(
                'id'           => 'footer_top_section_button_one',
                'type'         => 'link',
                'title'        => esc_html__('Button One Label & Link', 'matrik-core'),
                'add_title'    => esc_html__('Add Content', 'matrik-core'),
                'edit_title'   => esc_html__('Edit Content', 'matrik-core'),
                'remove_title' => esc_html__('Remove Content', 'matrik-core'),
                'default'      => array(
                    'url'  => '#',
                    'text' => 'Start Journey',
                ),
                'dependency' => array('header_footer_top_enable', '==', 'true')
            ),
            array(
                'id'           => 'footer_top_section_button_two',
                'type'         => 'link',
                'title'        => esc_html__('Button Two Label & Link', 'matrik-core'),
                'add_title'    => esc_html__('Add Content', 'matrik-core'),
                'edit_title'   => esc_html__('Edit Content', 'matrik-core'),
                'remove_title' => esc_html__('Remove Content', 'matrik-core'),
                'default'      => array(
                    'url'  => '#',
                    'text' => 'Let’s Discuss',
                ),
                'dependency' => array('header_footer_top_enable', '==', 'true')
            ),

        ),
    )
);
