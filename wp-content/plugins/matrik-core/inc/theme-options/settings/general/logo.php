<?php
CSF::createSection($prefix, array(
    'parent' => 'theme_general_options',
    'title'  => esc_html__('Logo', 'matrik-core'),
    'id'     => 'logo_options',
    'icon'   => 'fas fa-record-vinyl',
    'fields' => array(
        array(
            'type'    => 'subheading',
            'content' => '<h3>' . esc_html__('Logo', 'matrik-core') . '</h3>',
        ),
        array(
            'id'      => 'header_logo',
            'title'   => esc_html__('Header Logo', 'matrik-core'),
            'type'    => 'media',
            'desc'    => wp_kses(__('you can upload <mark>Logo</mark> for header', 'matrik-core'), wp_kses_allowed_html('post')),
            'default' => array(
                'url'       => esc_url(EGNS_CORE_THEME_OPTIONS_IMAGES . '/logo/logo.svg'),
                'id'        => 'logo_dark',
                'thumbnail' => esc_url(EGNS_CORE_THEME_OPTIONS_IMAGES . '/logo/logo.svg'),
                'alt'       => esc_attr('logo'),
                'title'     => esc_html('Logo'),
            ),
        ),

        array(
            'id'               => 'header_logo_dimensions',
            'type'             => 'dimensions',
            'title'            => esc_html__('Set Header Logo Dimensions', 'matrik-core'),
            'output_important' => true,
            'default'          => array(
                'width'  => '160',
                'height' => '',
                'unit'   => 'px',
            ),
            'output' => array(
                'header.style-1 .company-logo img',
                'header.style-2 .company-logo img',
                'header.style-3 .company-logo img',
                'header.style-4 .company-logo img',
            ),
        ),

        array(
            'id'      => 'header_mobile_logo',
            'title'   => esc_html__('Header Mobile Logo', 'matrik-core'),
            'type'    => 'media',
            'desc'    => wp_kses(__('you can upload <mark>Mobile Logo</mark> for header', 'matrik-core'), wp_kses_allowed_html('post')),
            'default' => array(
                'url'       => esc_url(EGNS_CORE_THEME_OPTIONS_IMAGES . '/logo/logo.svg'),
                'id'        => 'mobile_logo_dark',
                'thumbnail' => esc_url(EGNS_CORE_THEME_OPTIONS_IMAGES . '/logo/logo.svg'),
                'alt'       => esc_attr('Dark Mobile-logo'),
                'title'     => esc_html('Logo'),
            ),
        ),

        array(
            'id'               => 'header_mobile_logo_dimensions',
            'type'             => 'dimensions',
            'title'            => esc_html__('Set Mobile Logo Dimensions', 'matrik-core'),
            'output_important' => true,
            'default'          => array(
                'width'  => '130',
                'height' => '',
                'unit'   => 'px',
            ),
            'output' => array(
                'header.style-1 .mobile-logo-area .mobile-logo-wrap img',
            ),
        ),

        array(
            'id'      => 'header_sticky_logo',
            'title'   => esc_html__('Header Sticky Logo', 'matrik-core'),
            'type'    => 'media',
            'desc'    => wp_kses(__('you can upload <mark>Sticky Logo</mark> for header two only.', 'matrik-core'), wp_kses_allowed_html('post')),
            'default' => array(
                'url'       => esc_url(EGNS_CORE_THEME_OPTIONS_IMAGES . '/logo/logo.svg'),
                'id'        => 'logo_dark',
                'thumbnail' => esc_url(EGNS_CORE_THEME_OPTIONS_IMAGES . '/logo/logo.svg'),
                'alt'       => esc_attr('logo'),
                'title'     => esc_html('Logo'),
            ),
        ),

    ),

));
