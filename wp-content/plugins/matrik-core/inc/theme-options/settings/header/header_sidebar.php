<?php
CSF::createSection($prefix, array(
    'parent' => 'header_options',
    'title'  => esc_html__('Header Sidebar Options', 'matrik-core'),
    'id'     => 'theme_header_style_options',
    'icon'   => 'fab fa-algolia',
    'fields' => array(

        /*************** Header Sidebar content ***************/
        array(
            'type'    => 'subheading',
            'content' => '<h4>' . esc_html__('Sidebar Content', 'matrik-core') . '</h4>',
        ),
        array(
            'id'      => 'header_sidebar_logo',
            'title'   => esc_html__('Logo', 'matrik-core'),
            'type'    => 'media',
            'default' => array(
                'url'       => esc_url(EGNS_CORE_THEME_OPTIONS_IMAGES . '/logo/right-sidebar-logo.svg'),
                'id'        => 'logo_dark',
                'thumbnail' => esc_url(EGNS_CORE_THEME_OPTIONS_IMAGES . '/logo/right-sidebar-logo.svg'),
                'alt'       => esc_attr('logo-dark'),
                'title'     => esc_html('Logo'),
            ),
        ),
        array(
            'id'      => 'header_sidebar_subtitle',
            'type'    => 'text',
            'title'   => esc_html__('Subtitle', 'matrik-core'),
            'default' => esc_html__('Get In Touch With Us', 'matrik-core'),
        ),
        array(
            'id'      => 'header_sidebar_title',
            'type'    => 'text',
            'title'   => esc_html__('Title', 'matrik-core'),
            'default' => esc_html__('Connect with Matrik', 'matrik-core'),
        ),
        array(
            'id'      => 'header_desc_title',
            'type'    => 'textarea',
            'title'   => esc_html__('Short Description', 'matrik-core'),
            'default' => esc_html__('Ready to take the first step towards unlocking opportunity realizing goals, and embracing innovation?', 'matrik-core'),
        ),
        array(
            'id'     => 'header_sidebar_lists',
            'type'   => 'repeater',
            'title'  => esc_html__('Information lists', 'matrik-core'),
            'fields' => array(
                array(
                    'id'          => 'header_sidebar_select_content_type',
                    'type'        => 'select',
                    'title'       => 'Type',
                    'placeholder' => 'Select an option',
                    'options'     => array(
                        'phone'  => 'Phone',
                        'email'  => 'Email',
                        'others' => 'Others',
                    ),
                    'default' => 'phone'
                ),
                array(
                    'id'      => 'header_sidebar_list_icon',
                    'title'   => esc_html__('Icon', 'matrik-core'),
                    'type'    => 'media',
                    'default' => array(
                        'url'       => esc_url(EGNS_CORE_THEME_OPTIONS_IMAGES . '/icons/contact-call-icon.svg'),
                        'id'        => 'icon_list',
                        'thumbnail' => esc_url(EGNS_CORE_THEME_OPTIONS_IMAGES . '/icons/contact-call-icon.svg'),
                        'alt'       => esc_attr('icon'),
                        'title'     => esc_html('Icon'),
                    ),
                ),
                array(
                    'id'      => 'header_sidebar_list_label',
                    'type'    => 'text',
                    'title'   => esc_html__('Label', 'matrik-core'),
                    'default' => esc_html__('TO MORE INQUIRY', 'matrik-core'),
                ),
                array(
                    'id'         => 'header_sidebar_phone',
                    'type'       => 'text',
                    'title'      => esc_html__('Number', 'matrik-core'),
                    'default'    => esc_html__('2-965-871-8617', 'matrik-core'),
                    'class'      => 'egns_hide_search',
                    'dependency' => array('header_sidebar_select_content_type', '==', 'phone'),
                ),

                array(
                    'id'         => 'header_sidebar_email',
                    'type'       => 'text',
                    'title'      => esc_html__('Email', 'matrik-core'),
                    'default'    => esc_html__('info@example.com', 'matrik-core'),
                    'class'      => 'egns_hide_search',
                    'dependency' => array('header_sidebar_select_content_type', '==', 'email'),
                ),
                array(
                    'id'     => 'header_sidebar_content_list',
                    'type'   => 'repeater',
                    'title'  => 'Content List',
                    'fields' => array(
                        array(
                            'id'      => 'header_sidebar_content_text_and_link',
                            'type'    => 'link',
                            'title'   => 'Custom text & link',
                            'default' => array(
                                'url'    => 'facebook.com',
                                'text'   => 'Facebook',
                                'target' => '_blank'
                            ),
                        ),
                    ),
                    'dependency' => array('header_sidebar_select_content_type', '==', 'others'),
                    'default'    => array(
                        array(
                            'header_sidebar_content_text_and_link' => array(
                                'url'    => 'https://facebook.com',
                                'text'   => 'Facebook',
                                'target' => '_blank'
                            ),
                        ),
                        array(
                            'header_sidebar_content_text_and_link' => array(
                                'url'    => 'https://linkedin.com',
                                'text'   => 'Linkedin',
                                'target' => '_blank'
                            ),
                        ),
                        array(
                            'header_sidebar_content_text_and_link' => array(
                                'url'    => 'https://instagram.com',
                                'text'   => 'Instagram',
                                'target' => '_blank'
                            ),
                        ),
                    )
                ),
            ),
            'default'   => array(
                array(
                    'header_sidebar_list_icon' => array(
                        'url'       => esc_url(EGNS_CORE_THEME_OPTIONS_IMAGES . '/icons/contact-call-icon.svg'),
                        'id'        => 'icon_list',
                        'thumbnail' => esc_url(EGNS_CORE_THEME_OPTIONS_IMAGES . '/icons/contact-call-icon.svg'),
                        'alt'       => esc_attr('icon'),
                        'title'     => esc_html('Icon'),
                    ),
                    'header_sidebar_select_content_type' => 'phone',
                    'header_sidebar_list_label'          => 'CALL ANY TIME',
                    'header_sidebar_phone'               => '2-965-871-8617',
                ),
                array(
                    'header_sidebar_list_icon' => array(
                        'url'       => esc_url(EGNS_CORE_THEME_OPTIONS_IMAGES . '/icons/contact-world-icon.svg'),
                        'id'        => 'icon_list',
                        'thumbnail' => esc_url(EGNS_CORE_THEME_OPTIONS_IMAGES . '/icons/contact-world-icon.svg'),
                        'alt'       => esc_attr('icon'),
                        'title'     => esc_html('Icon'),
                    ),
                    'header_sidebar_select_content_type' => 'others',
                    'header_sidebar_list_label'          => 'Call 24/7 Hours',
                    'header_sidebar_content_list'        => array( // <-- ADDED NESTED REPEATER DEFAULTS
                        array(
                            'header_sidebar_content_text_and_link' => array(
                                'url'    => 'https://facebook.com',
                                'text'   => 'Facebook',
                                'target' => '_blank'
                            ),
                        ),
                        array(
                            'header_sidebar_content_text_and_link' => array(
                                'url'    => 'https://linkedin.com',
                                'text'   => 'LinkedIn',
                                'target' => '_blank'
                            ),
                        ),
                        array(
                            'header_sidebar_content_text_and_link' => array(
                                'url'    => 'https://instagram.com',
                                'text'   => 'Instagram',
                                'target' => '_blank'
                            ),
                        ),
                    ),
                ),
                array(
                    'header_sidebar_list_icon' => array(
                        'url'       => esc_url(EGNS_CORE_THEME_OPTIONS_IMAGES . '/icons/contact-mail-icon.svg'),
                        'id'        => 'icon_list',
                        'thumbnail' => esc_url(EGNS_CORE_THEME_OPTIONS_IMAGES . '/icons/contact-mail-icon.svg'),
                        'alt'       => esc_attr('icon'),
                        'title'     => esc_html('Icon'),
                    ),
                    'header_sidebar_select_content_type' => 'email',
                    'header_sidebar_list_label'          => 'SAY HELLO',
                    'header_sidebar_email'               => 'info@example.com',
                ),
            )
        ),
        array(
            'type'    => 'subheading',
            'content' => '<h4>' . esc_html__('Locations', 'matrik-core') . '</h4>',
        ),
        array(
            'id'     => 'header_sidebar_locations',
            'type'   => 'repeater',
            'title'  => esc_html__('Location list', 'matrik-core'),
            'fields' => array(
                array(
                    'id'      => 'header_sidebar_location_title',
                    'type'    => 'text',
                    'title'   => 'Location Name',
                    'default' => esc_html__('NEW YORK', 'matrik-core'),
                ),
                array(
                    'id'      => 'header_sidebar_location_text_and_link',
                    'type'    => 'link',
                    'title'   => 'Address & link',
                    'default' => array(
                        'url'    => '#',
                        'text'   => '8204 Glen Ridge DriveEndicott, NY 13760',
                        'target' => '_blank'
                    ),
                ),
            ),
            'default'   => array(
                array(
                    'header_sidebar_location_title'         => 'NEW YORK',
                    'header_sidebar_location_text_and_link' => array(
                        'url'    => '#',
                        'text'   => '8204 Glen Ridge DriveEndicott, NY 13760',
                        'target' => '_blank'
                    ),
                ),
                array(
                    'header_sidebar_location_title'         => 'LOS ANGELES',
                    'header_sidebar_location_text_and_link' => array(
                        'url'    => '#',
                        'text'   => '123 Example Street, LA 90001',
                        'target' => '_blank'
                    ),
                )
            )
        ),
        array(
            'id'           => 'header_sidebar_location_button_link_text',
            'type'         => 'link',
            'title'        => esc_html__('Button label & link', 'matrik-core'),
            'add_title'    => esc_html__('Add Content', 'matrik-core'),
            'edit_title'   => esc_html__('Edit Content', 'matrik-core'),
            'remove_title' => esc_html__('Remove Content', 'matrik-core'),
            'default'      => array(
                'url'  => '#',
                'text' => 'View All Factory Location',
            ),
        ),
        array(
            'type'    => 'subheading',
            'content' => '<h4>' . esc_html__('Copyright', 'matrik-core') . '</h4>',
        ),
        array(
            'id'      => 'header_sidebar_copyright',
            'type'    => 'textarea',
            'title'   => esc_html__('Copyright content', 'matrik-core'),
            'default' => wp_kses('Copyright 2025 <a href="https://matrik-wp.egenstheme.com/">Matrik</a> | Design By <a href="https://www.egenslab.com/">Egens Lab</a>', wp_kses_allowed_html('post')),
        ),

        /*************** End Header Sidebar content ***************/

    ),
));
