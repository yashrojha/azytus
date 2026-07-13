<?php
CSF::createSection($prefix, array(
    'parent' => 'header_options',
    'title'  => esc_html__('Header Options', 'matrik-core'),
    'id'     => 'theme_header_style_options',
    'icon'   => 'fab fa-algolia',
    'fields' => array(
        array(
            'type'    => 'subheading',
            'content' => '<h3>' . esc_html__('Look Header Layout', 'matrik-core') . '</h3>'
        ),
        array(
            'id'      => 'header_menu_style',
            'type'    => 'image_select',
            'class'   => 'egns_header_select',
            'options' => array(
                'header_one'   => esc_url(EGNS_CORE_THEME_OPTIONS_IMAGES . '/header/header-one.png'),
                'header_two'   => esc_url(EGNS_CORE_THEME_OPTIONS_IMAGES . '/header/header-two.png'),
                'header_three' => esc_url(EGNS_CORE_THEME_OPTIONS_IMAGES . '/header/header-three.png'),
                'header_four'  => esc_url(EGNS_CORE_THEME_OPTIONS_IMAGES . '/header/header-four.png'),
                'header_five'  => esc_url(EGNS_CORE_THEME_OPTIONS_IMAGES . '/header/header-five.png'),
                'header_six'   => esc_url(EGNS_CORE_THEME_OPTIONS_IMAGES . '/header/header-six.png'),
            ),
            'default' => 'header_one',
        ),

        /*************** Header One content ***************/
        array(
            'type'       => 'subheading',
            'content'    => '<h4>' . esc_html__('Header One Content', 'matrik-core') . '</h4>',
            'dependency' => array('header_menu_style', '==', 'header_one')
        ),

        array(
            'id'      => 'header_info_icon',
            'title'   => esc_html__('Icon', 'matrik-core'),
            'type'    => 'media',
            'default' => array(
                'url'       => esc_url(EGNS_CORE_THEME_OPTIONS_IMAGES . '/icons/icon-phone.svg'),
                'id'        => 'icon_list',
                'thumbnail' => esc_url(EGNS_CORE_THEME_OPTIONS_IMAGES . '/icons/icon-phone.svg'),
                'alt'       => esc_attr('icon'),
                'title'     => esc_html('Icon'),
            ),
            'dependency' => array('header_menu_style', '==', 'header_one'),
        ),
        array(
            'id'         => 'header_info_label',
            'type'       => 'text',
            'title'      => esc_html__('Label', 'matrik-core'),
            'default'    => esc_html__('Any Question', 'matrik-core'),
            'dependency' => array('header_menu_style', '==', 'header_one'),
        ),
        array(
            'id'           => 'header_info_link',
            'type'         => 'link',
            'title'        => esc_html__('Add Text & Link', 'matrik-core'),
            'add_title'    => esc_html__('Add Content', 'matrik-core'),
            'edit_title'   => esc_html__('Edit Content', 'matrik-core'),
            'remove_title' => esc_html__('Remove Content', 'matrik-core'),
            'default'      => array(
                'url'  => 'tel:997636844568',
                'text' => '+99-763 684 4568',
            ),
            'dependency' => array('header_menu_style', '==', 'header_one'),
        ),

        array(
            'type'       => 'subheading',
            'content'    => '<h4>' . esc_html__('Sidebar Button', 'matrik-core') . '</h4>',
            'dependency' => array('header_menu_style', '==', 'header_one')
        ),
        array(
            'id'         => 'header_btn_label',
            'type'       => 'text',
            'title'      => esc_html__('Button label', 'matrik-core'),
            'default'    => esc_html__('GET IN TOUCH', 'matrik-core'),
            'dependency' => array('header_menu_style', '==', 'header_one')
        ),

        /*************** End Header One content ***************/


        /*************** End Header Two content ***************/
        array(
            'type'       => 'subheading',
            'content'    => '<h4>' . esc_html__('Header Two Content', 'matrik-core') . '</h4>',
            'dependency' => array('header_menu_style', '==', 'header_two')
        ),
        array(
            'id'      => 'header_two_btn_link',
            'type'    => 'link',
            'title'   => esc_html__('Button Label & Link', 'matrik-core'),
            'default' => array(
                'url'    => '#',
                'text'   => 'Get In Touch',
                'target' => '_blank'
            ),
            'dependency' => array('header_menu_style', '==', 'header_two')
        ),
        /*************** End Header Two content ***************/


        /*************** Header three content ***************/
        array(
            'type'       => 'subheading',
            'content'    => '<h4>' . esc_html__('Header Three Content', 'matrik-core') . '</h4>',
            'dependency' => array('header_menu_style', '==', 'header_three')
        ),

        array(
            'id'      => 'header_info_three_icon',
            'title'   => esc_html__('Icon', 'matrik-core'),
            'type'    => 'media',
            'default' => array(
                'url'       => esc_url(EGNS_CORE_THEME_OPTIONS_IMAGES . '/icons/icon-phone.svg'),
                'id'        => 'icon_list',
                'thumbnail' => esc_url(EGNS_CORE_THEME_OPTIONS_IMAGES . '/icons/icon-phone.svg'),
                'alt'       => esc_attr('icon'),
                'title'     => esc_html('Icon'),
            ),
            'dependency' => array('header_menu_style', '==', 'header_three'),
        ),
        array(
            'id'         => 'header_info_three_label',
            'type'       => 'text',
            'title'      => esc_html__('Label', 'matrik-core'),
            'default'    => esc_html__('Any Question', 'matrik-core'),
            'dependency' => array('header_menu_style', '==', 'header_three'),
        ),
        array(
            'id'           => 'header_info_three_link',
            'type'         => 'link',
            'title'        => esc_html__('Add Text & Link', 'matrik-core'),
            'add_title'    => esc_html__('Add Content', 'matrik-core'),
            'edit_title'   => esc_html__('Edit Content', 'matrik-core'),
            'remove_title' => esc_html__('Remove Content', 'matrik-core'),
            'default'      => array(
                'url'  => 'tel:997636844568',
                'text' => '+99-763 684 4568',
            ),
            'dependency' => array('header_menu_style', '==', 'header_three'),
        ),
        array(
            'type'       => 'subheading',
            'content'    => '<h4>' . esc_html__('Sidebar Button', 'matrik-core') . '</h4>',
            'dependency' => array('header_menu_style', '==', 'header_three')
        ),
        array(
            'id'         => 'header_three_btn_label',
            'type'       => 'text',
            'title'      => esc_html__('Button label', 'matrik-core'),
            'default'    => esc_html__('GET IN TOUCH', 'matrik-core'),
            'dependency' => array('header_menu_style', '==', 'header_three')
        ),

        /*************** End Header three content ***************/


        /*************** Header four content ***************/
        array(
            'type'       => 'subheading',
            'content'    => '<h4>' . esc_html__('Header Four Content', 'matrik-core') . '</h4>',
            'dependency' => array('header_menu_style', '==', 'header_four')
        ),

        array(
            'id'         => 'header_four_text_label',
            'type'       => 'text',
            'title'      => esc_html__('Bottom label', 'matrik-core'),
            'default'    => esc_html__('EST . 2000', 'matrik-core'),
            'dependency' => array('header_menu_style', '==', 'header_four')
        ),

        array(
            'type'       => 'subheading',
            'content'    => '<h4>' . esc_html__('Sidebar Menu Content', 'matrik-core') . '</h4>',
            'dependency' => array('header_menu_style', '==', 'header_four')
        ),

        array(
            'id'      => 'header_four_sidebar_logo',
            'title'   => esc_html__('Logo', 'matrik-core'),
            'type'    => 'media',
            'desc'    => wp_kses(__('You can upload <mark>Logo</mark> for sidebar', 'matrik-core'), wp_kses_allowed_html('post')),
            'default' => array(
                'url'       => esc_url(EGNS_CORE_THEME_OPTIONS_IMAGES . '/logo/right-sidebar-logo.svg'),
                'id'        => 'logo_sidebar',
                'thumbnail' => esc_url(EGNS_CORE_THEME_OPTIONS_IMAGES . '/logo/right-sidebar-logo.svg'),
                'alt'       => esc_attr('logo'),
                'title'     => esc_html('Logo'),
            ),
            'dependency' => array('header_menu_style', '==', 'header_four'),
        ),

        array(
            'id'         => 'header_four_sidebar_title',
            'type'       => 'text',
            'title'      => esc_html__('Information title', 'matrik-core'),
            'default'    => esc_html__('Get in Touch', 'matrik-core'),
            'dependency' => array('header_menu_style', '==', 'header_four'),
        ),

        array(
            'id'         => 'header_four_sidebar_lists',
            'type'       => 'repeater',
            'title'      => esc_html__('Information list', 'matrik-core'),
            'dependency' => array('header_menu_style', '==', 'header_four'),
            'fields'     => array(
                array(
                    'id'          => 'header_four_sidebar_select_content_type',
                    'type'        => 'select',
                    'title'       => 'Type',
                    'placeholder' => 'Select an option',
                    'options'     => array(
                        'phone'  => 'Phone',
                        'email'  => 'Email',
                        'others' => 'Others',
                    ),
                    'default' => 'phone',
                ),
                array(
                    'id'      => 'header_four_sidebar_list_icon',
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
                    'id'      => 'header_four_sidebar_list_label',
                    'type'    => 'text',
                    'title'   => esc_html__('Label', 'matrik-core'),
                    'default' => esc_html__('TO MORE INQUIRY', 'matrik-core'),
                ),

                array(
                    'id'         => 'header_four_sidebar_phone',
                    'type'       => 'text',
                    'title'      => esc_html__('Number', 'matrik-core'),
                    'default'    => esc_html__('2-965-871-8617', 'matrik-core'),
                    'class'      => 'egns_hide_search',
                    'dependency' => array('header_four_sidebar_select_content_type', '==', 'phone'),
                ),

                array(
                    'id'         => 'header_four_sidebar_email',
                    'type'       => 'text',
                    'title'      => esc_html__('Email', 'matrik-core'),
                    'default'    => esc_html__('info@example.com', 'matrik-core'),
                    'class'      => 'egns_hide_search',
                    'dependency' => array('header_four_sidebar_select_content_type', '==', 'email'),
                ),

                array(
                    'id'           => 'header_four_sidebar_others_text_link',
                    'type'         => 'link',
                    'title'        => esc_html__('Custom text & link', 'matrik-core'),
                    'add_title'    => esc_html__('Add Content', 'matrik-core'),
                    'edit_title'   => esc_html__('Edit Content', 'matrik-core'),
                    'remove_title' => esc_html__('Remove Content', 'matrik-core'),
                    'default'      => array(
                        'url'  => '#',
                        'text' => 'Dhaka, Bangladesh',
                    ),
                    'dependency' => array('header_four_sidebar_select_content_type', '==', 'others'),
                ),
            ),
            'default'   => array(
                array(
                    'header_four_sidebar_list_icon' => array(
                        'url'       => esc_url(EGNS_CORE_THEME_OPTIONS_IMAGES . '/icons/contact-call-icon.svg'),
                        'id'        => 'icon_list',
                        'thumbnail' => esc_url(EGNS_CORE_THEME_OPTIONS_IMAGES . '/icons/contact-call-icon.svg'),
                        'alt'       => esc_attr('icon'),
                        'title'     => esc_html('Icon'),
                    ),
                    'header_four_sidebar_select_content_type' => 'phone',
                    'header_four_sidebar_list_label'          => 'CALL ANY TIME',
                    'header_four_sidebar_phone'               => '2-965-871-8617',
                ),
                array(
                    'header_four_sidebar_list_icon' => array(
                        'url'       => esc_url(EGNS_CORE_THEME_OPTIONS_IMAGES . '/icons/contact-mail-icon.svg'),
                        'id'        => 'icon_list',
                        'thumbnail' => esc_url(EGNS_CORE_THEME_OPTIONS_IMAGES . '/icons/contact-mail-icon.svg'),
                        'alt'       => esc_attr('icon'),
                        'title'     => esc_html('Icon'),
                    ),
                    'header_four_sidebar_select_content_type' => 'others',
                    'header_four_sidebar_list_label'          => 'ADDRESS',
                    'header_four_sidebar_others_text_link'    => array(
                        'url'    => '#',
                        'text'   => 'Dhaka, Bangladesh',
                        'target' => '_blank'
                    ),
                ),
                array(
                    'header_four_sidebar_list_icon' => array(
                        'url'       => esc_url(EGNS_CORE_THEME_OPTIONS_IMAGES . '/icons/contact-mail-icon.svg'),
                        'id'        => 'icon_list',
                        'thumbnail' => esc_url(EGNS_CORE_THEME_OPTIONS_IMAGES . '/icons/contact-mail-icon.svg'),
                        'alt'       => esc_attr('icon'),
                        'title'     => esc_html('Icon'),
                    ),
                    'header_four_sidebar_select_content_type' => 'email',
                    'header_four_sidebar_list_label'          => 'SAY HELLO',
                    'header_four_sidebar_email'               => 'info@example.com',
                ),
            )
        ),

        array(
            'type'       => 'subheading',
            'content'    => '<h4>' . esc_html__('Location', 'matrik-core') . '</h4>',
            'dependency' => array('header_menu_style', '==', 'header_four')
        ),

        array(
            'id'         => 'header_four_sidebar_location_title',
            'type'       => 'text',
            'title'      => esc_html__('Title', 'matrik-core'),
            'default'    => esc_html__('Office Address', 'matrik-core'),
            'dependency' => array('header_menu_style', '==', 'header_four'),
        ),

        array(
            'id'         => 'header_four_sidebar_locations',
            'type'       => 'repeater',
            'title'      => 'List',
            'dependency' => array('header_menu_style', '==', 'header_four'),
            'fields'     => array(
                array(
                    'id'      => 'header_four_sidebar_location_title',
                    'type'    => 'text',
                    'title'   => 'Label',
                    'default' => esc_html__('NEW YORK', 'matrik-core'),

                ),
                array(
                    'id'      => 'header_four_sidebar_location_text_and_link',
                    'type'    => 'link',
                    'title'   => 'Address & link',
                    'default' => array(
                        'url'    => '#',
                        'text'   => '8204 Glen Ridge DriveEndicott, NY 13760',
                        'target' => '_blank',

                    ),

                ),
            ),
            'default'   => array(
                array(
                    'header_four_sidebar_location_title'         => 'NEW YORK',
                    'header_four_sidebar_location_text_and_link' => array(
                        'url'    => '#',
                        'text'   => '8204 Glen Ridge DriveEndicott, NY 13760',
                        'target' => '_blank',

                    ),
                ),
                array(
                    'header_four_sidebar_location_title'         => 'WASHINGTON DC',
                    'header_four_sidebar_location_text_and_link' => array(
                        'url'    => '#',
                        'text'   => '8204 Glen Ridge DriveEndicott, NY 13760',
                        'target' => '_blank',

                    ),
                )
            )

        ),

        /*************** End Header four content ***************/


        /*************** Header five content ***************/
        array(
            'type'       => 'subheading',
            'content'    => '<h4>' . esc_html__('Header Five Content', 'matrik-core') . '</h4>',
            'dependency' => array('header_menu_style', '==', 'header_five')
        ),

        array(
            'id'         => 'header_five_btn_label',
            'type'       => 'text',
            'title'      => esc_html__('Button label', 'matrik-core'),
            'default'    => esc_html__('GET IN TOUCH', 'matrik-core'),
            'dependency' => array('header_menu_style', '==', 'header_five')
        ),

        /*************** End Header five content ***************/


        /*************** Header six content ***************/
        array(
            'type'       => 'subheading',
            'content'    => '<h4>' . esc_html__('Header Six Content', 'matrik-core') . '</h4>',
            'dependency' => array('header_menu_style', '==', 'header_six')
        ),
        array(
            'id'      => 'header_info_six_contact_icon',
            'title'   => esc_html__('Icon', 'matrik-core'),
            'type'    => 'media',
            'default' => array(
                'url'       => esc_url(EGNS_CORE_THEME_OPTIONS_IMAGES . '/icons/icon-phone.svg'),
                'id'        => 'icon_list',
                'thumbnail' => esc_url(EGNS_CORE_THEME_OPTIONS_IMAGES . '/icons/icon-phone.svg'),
                'alt'       => esc_attr('icon'),
                'title'     => esc_html('Icon'),

            ),
            'dependency' => array('header_menu_style', '==', 'header_six'),

        ),
        array(
            'id'         => 'header_six_info_label',
            'type'       => 'text',
            'title'      => esc_html__('Label', 'matrik-core'),
            'default'    => esc_html__('Any Question', 'matrik-core'),
            'dependency' => array('header_menu_style', '==', 'header_six')
        ),
        array(
            'id'           => 'header_info_six_contact_link',
            'type'         => 'link',
            'title'        => esc_html__('Custom text & link', 'matrik-core'),
            'add_title'    => esc_html__('Add Content', 'matrik-core'),
            'edit_title'   => esc_html__('Edit Content', 'matrik-core'),
            'remove_title' => esc_html__('Remove Content', 'matrik-core'),
            'default'      => array(
                'url'  => 'tel:990737621432',
                'text' => '+990-737 621 432',
            ),
            'dependency' => array('header_menu_style', '==', 'header_six'),
        ),
        array(
            'id'         => 'header_six_btn_label',
            'type'       => 'text',
            'title'      => esc_html__('Button label', 'matrik-core'),
            'default'    => esc_html__('GET IN TOUCH', 'matrik-core'),
            'dependency' => array('header_menu_style', '==', 'header_six')
        ),


        array(
            'type'       => 'subheading',
            'content'    => '<h4>' . esc_html__('Header Topbar Content', 'matrik-core') . '</h4>',
            'dependency' => array(
                array('header_menu_style', '==', 'header_six'),
            )
        ),
        array(
            'id'         => 'header_six_top_bar_switcher',
            'type'       => 'switcher',
            'title'      => 'Enable Topbar',
            'label'      => 'Do you want activate it ?',
            'default'    => true,
            'dependency' => array(
                array('header_menu_style', '==', 'header_six'),
            )
        ),
        array(
            'type'       => 'subheading',
            'content'    => '<h4>' . esc_html__('Email', 'matrik-core') . '</h4>',
            'dependency' => array(
                array('header_menu_style', '==', 'header_six'),
                array('header_six_top_bar_switcher', '==', 'true')
            )
        ),
        array(
            'id'      => 'header_info_six_email_icon',
            'title'   => esc_html__('Icon', 'matrik-core'),
            'type'    => 'media',
            'default' => array(
                'url'       => esc_url(EGNS_CORE_THEME_OPTIONS_IMAGES . '/icons/email-icon.svg'),
                'id'        => 'email_icon',
                'thumbnail' => esc_url(EGNS_CORE_THEME_OPTIONS_IMAGES . '/icons/email-icon.svg'),
                'alt'       => esc_attr('icon'),
                'title'     => esc_html('Icon'),
            ),
            'dependency' => array(
                array('header_menu_style', '==', 'header_six'),
                array('header_six_top_bar_switcher', '==', 'true')
            )
        ),
        array(
            'id'           => 'header_info_six_email_link',
            'type'         => 'link',
            'title'        => esc_html__('Custom text & link', 'matrik-core'),
            'add_title'    => esc_html__('Add Content', 'matrik-core'),
            'edit_title'   => esc_html__('Edit Content', 'matrik-core'),
            'remove_title' => esc_html__('Remove Content', 'matrik-core'),
            'default'      => array(
                'url'  => 'mailto:info@example.com ',
                'text' => 'info@example.com',
            ),
            'dependency' => array(
                array('header_menu_style', '==', 'header_six'),
                array('header_six_top_bar_switcher', '==', 'true')
            )
        ),
        array(
            'type'       => 'subheading',
            'content'    => '<h4>' . esc_html__('Phone', 'matrik-core') . '</h4>',
            'dependency' => array(
                array('header_menu_style', '==', 'header_six'),
                array('header_six_top_bar_switcher', '==', 'true')
            )
        ),
        array(
            'id'      => 'header_info_six_phone_icon',
            'title'   => esc_html__('Icon', 'matrik-core'),
            'type'    => 'media',
            'default' => array(
                'url'       => esc_url(EGNS_CORE_THEME_OPTIONS_IMAGES . '/icons/topbar-phone-icon.svg'),
                'id'        => 'phone_icon',
                'thumbnail' => esc_url(EGNS_CORE_THEME_OPTIONS_IMAGES . '/icons/topbar-phone-icon.svg'),
                'alt'       => esc_attr('icon'),
                'title'     => esc_html('Icon'),
            ),
            'dependency' => array(
                array('header_menu_style', '==', 'header_six'),
                array('header_six_top_bar_switcher', '==', 'true')
            )
        ),
        array(
            'id'           => 'header_info_six_phone_link',
            'type'         => 'link',
            'title'        => esc_html__('Custom text & link', 'matrik-core'),
            'add_title'    => esc_html__('Add Content', 'matrik-core'),
            'edit_title'   => esc_html__('Edit Content', 'matrik-core'),
            'remove_title' => esc_html__('Remove Content', 'matrik-core'),
            'default'      => array(
                'url'  => 'mailto:info@example.com ',
                'text' => 'info@example.com',
            ),
            'dependency' => array(
                array('header_menu_style', '==', 'header_six'),
                array('header_six_top_bar_switcher', '==', 'true')
            )
        ),
        array(
            'type'       => 'subheading',
            'content'    => '<h4>' . esc_html__('Location', 'matrik-core') . '</h4>',
            'dependency' => array(
                array('header_menu_style', '==', 'header_six'),
                array('header_six_top_bar_switcher', '==', 'true')
            )
        ),
        array(
            'id'      => 'header_info_six_location_icon',
            'title'   => esc_html__('Icon', 'matrik-core'),
            'type'    => 'media',
            'default' => array(
                'url'       => esc_url(EGNS_CORE_THEME_OPTIONS_IMAGES . '/icons/location-icon.svg'),
                'id'        => 'address_icon',
                'thumbnail' => esc_url(EGNS_CORE_THEME_OPTIONS_IMAGES . '/icons/location-icon.svg'),
                'alt'       => esc_attr('icon'),
                'title'     => esc_html('Icon'),
            ),
            'dependency' => array(
                array('header_menu_style', '==', 'header_six'),
                array('header_six_top_bar_switcher', '==', 'true')
            )
        ),
        array(
            'id'           => 'header_info_six_location_link',
            'type'         => 'link',
            'title'        => esc_html__('Custom text & link', 'matrik-core'),
            'add_title'    => esc_html__('Add Content', 'matrik-core'),
            'edit_title'   => esc_html__('Edit Content', 'matrik-core'),
            'remove_title' => esc_html__('Remove Content', 'matrik-core'),
            'default'      => array(
                'url'  => '#',
                'text' => 'Capital Office, 124 City Road, London',
            ),
            'dependency' => array(
                array('header_menu_style', '==', 'header_six'),
                array('header_six_top_bar_switcher', '==', 'true')
            )
        ),
        /*************** End Header six content ***************/

    ),
));
