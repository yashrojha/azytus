<?php

namespace Elementor;

if (!defined('ABSPATH')) exit;  // Exit if accessed directly

use Elementor\core\Schemes;
use Egns_Core\Egns_Helper;

class Matrik_Footer_Two_Widget extends Widget_Base
{

    public function get_name()
    {
        return 'matrik_footer_two';
    }

    public function get_title()
    {
        return esc_html__('EG Footer Two', 'matrik-core');
    }

    public function get_icon()
    {
        return 'egns-widget-icon';
    }

    public function get_categories()
    {
        return ['matrik_widgets'];
    }

    protected function register_controls()
    {

        //=====================General=======================//

        $this->start_controls_section(
            'matrik_footer_two_genaral',
            [
                'label' => esc_html__('General', 'matrik-core')
            ]
        );

        $this->add_control(
            'matrik_footer_two_genaral_logo_image',
            [
                'label' => esc_html__('Logo Image', 'matrik-core'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
                'media_types' => ['image', 'svg'],
            ]
        );

        $this->add_control(
            'matrik_footer_two_genaral_logo_image_url',
            [
                'label'   => esc_html__('Logo URL/Link', 'matrik-core'),
                'type'    => \Elementor\Controls_Manager::URL,
                'options' => ['url', 'is_external', 'nofollow'],
                'default' => [
                    'url'         => '#',
                    'is_external' => true,
                    'nofollow'    => true,
                    // 'custom_attributes' => '',
                ],
                'label_block' => true,
            ]
        );

        $this->add_control(
            'matrik_footer_two_genaral_description',
            [
                'label'       => esc_html__('Description', 'matrik-core'),
                'type'        => \Elementor\Controls_Manager::TEXTAREA,
                'default'     => esc_html__('Welcome to Matrik, where innovation meet our passion in a journey that started dream.', 'matrik-core'),
                'placeholder' => esc_html__('write your description here', 'matrik-core'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'matrik_footer_two_genaral_title_text',
            [
                'label'       => esc_html__('Title Text', 'matrik-core'),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default'     => esc_html__('EST . 2000', 'matrik-core'),
                'placeholder' => esc_html__('write your title here', 'matrik-core'),
                'label_block' => true,
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'matrik_footer_two_genaral_address_area',
            [
                'label' => esc_html__('Address Area', 'matrik-core')
            ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'matrik_footer_two_genaral_address_area_title',
            [
                'label'       => esc_html__('Title', 'matrik-core'),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default'     => esc_html__('NEW YORK', 'matrik-core'),
                'placeholder' => esc_html__('write your title here', 'matrik-core'),
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'matrik_footer_two_genaral_address_area_address_text',
            [
                'label'       => esc_html__('Address', 'matrik-core'),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default'     => esc_html__('8204 Glen Ridge DriveEndicott, NY 13760', 'matrik-core'),
                'placeholder' => esc_html__('write your address here', 'matrik-core'),
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'matrik_footer_two_genaral_address_area_address_text_url',
            [
                'label'   => esc_html__('Address URL/Link', 'matrik-core'),
                'type'    => \Elementor\Controls_Manager::URL,
                'options' => ['url', 'is_external', 'nofollow'],
                'default' => [
                    'url'         => '#',
                    'is_external' => true,
                    'nofollow'    => true,
                    // 'custom_attributes' => '',
                ],
                'label_block' => true,
            ]
        );

        $this->add_control(
            'matrik_footer_two_genaral_address_area_list',
            [
                'label' => esc_html__('Address List', 'matrik-core'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'matrik_footer_two_genaral_address_area_title' => esc_html('NEW YORK'),

                    ],
                    [
                        'matrik_footer_two_genaral_address_area_title' => esc_html('WASHINGTON DC'),

                    ],

                ],
                'title_field' => '{{{ matrik_footer_two_genaral_address_area_title }}}',
            ]
        );

        $this->add_control(
            'matrik_footer_two_genaral_address_area_button_text',
            [
                'label'       => esc_html__('Button Text', 'matrik-core'),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default'     => esc_html__('View All Factory Location', 'matrik-core'),
                'placeholder' => esc_html__('write your button text here', 'matrik-core'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'matrik_footer_two_genaral_address_area_button_text_url',
            [
                'label'   => esc_html__('Button URL/Link', 'matrik-core'),
                'type'    => \Elementor\Controls_Manager::URL,
                'options' => ['url', 'is_external', 'nofollow'],
                'default' => [
                    'url'         => '#',
                    'is_external' => true,
                    'nofollow'    => true,
                    // 'custom_attributes' => '',
                ],
                'label_block' => true,
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'matrik_footer_two_genaral_menu_one_area',
            [
                'label' => esc_html__('Menu One', 'matrik-core')
            ]
        );

        $this->add_control(
            'matrik_footer_two_genaral_menu_one_area_menu_title',
            [
                'label'       => esc_html__('Menu Title', 'matrik-core'),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default'     => esc_html__('COMPANY', 'matrik-core'),
                'placeholder' => esc_html__('write your menu title here', 'matrik-core'),
                'label_block' => true,

            ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'matrik_footer_two_genaral_menu_one_area_menu_content_title',
            [
                'label'       => esc_html__('Content Title', 'matrik-core'),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default' => wp_kses('Finance & Fintech', wp_kses_allowed_html('post')),
                'placeholder' => esc_html__('write your content title here', 'matrik-core'),
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'matrik_footer_two_genaral_menu_one_area_menu_content_title_url',
            [
                'label'   => esc_html__('URL/Link', 'matrik-core'),
                'type'    => \Elementor\Controls_Manager::URL,
                'options' => ['url', 'is_external', 'nofollow'],
                'default' => [
                    'url'         => '#',
                    'is_external' => true,
                    'nofollow'    => true,
                ],
                'label_block' => true,
            ]
        );

        $this->add_control(
            'matrik_footer_two_genaral_menu_one_area_menu_content_list',
            [
                'label' => esc_html__('Content List', 'matrik-core'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'matrik_footer_two_genaral_menu_one_area_menu_content_title' => esc_html('About Us'),

                    ],
                    [
                        'matrik_footer_two_genaral_menu_one_area_menu_content_title' => esc_html('Meet Our Team'),

                    ],
                    [
                        'matrik_footer_two_genaral_menu_one_area_menu_content_title' => esc_html('Our Project'),

                    ],
                    [
                        'matrik_footer_two_genaral_menu_one_area_menu_content_title' => esc_html('Blog & Article'),

                    ],
                    [
                        'matrik_footer_two_genaral_menu_one_area_menu_content_title' => esc_html('Solutions'),

                    ],

                ],
                'title_field' => '{{{ matrik_footer_two_genaral_menu_one_area_menu_content_title }}}',
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'matrik_footer_two_genaral_menu_two_area',
            [
                'label' => esc_html__('Menu Two', 'matrik-core')
            ]
        );

        $this->add_control(
            'matrik_footer_two_genaral_menu_two_area_menu_title',
            [
                'label'       => esc_html__('Menu Title', 'matrik-core'),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default'     => esc_html__('CAREER', 'matrik-core'),
                'placeholder' => esc_html__('write your menu title here', 'matrik-core'),
                'label_block' => true,

            ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'matrik_footer_two_genaral_menu_two_area_menu_content_title',
            [
                'label'       => esc_html__('Content Title', 'matrik-core'),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default' => wp_kses('Open Positions', wp_kses_allowed_html('post')),
                'placeholder' => esc_html__('write your content title here', 'matrik-core'),
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'matrik_footer_two_genaral_menu_two_area_menu_content_title_url',
            [
                'label'   => esc_html__('URL/Link', 'matrik-core'),
                'type'    => \Elementor\Controls_Manager::URL,
                'options' => ['url', 'is_external', 'nofollow'],
                'default' => [
                    'url'         => '#',
                    'is_external' => true,
                    'nofollow'    => true,
                ],
                'label_block' => true,
            ]
        );

        $this->add_control(
            'matrik_footer_two_genaral_menu_two_area_menu_content_list',
            [
                'label' => esc_html__('Content List', 'matrik-core'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'matrik_footer_two_genaral_menu_two_area_menu_content_title' => esc_html('Open Positions'),

                    ],
                    [
                        'matrik_footer_two_genaral_menu_two_area_menu_content_title' => esc_html('Students'),

                    ],
                    [
                        'matrik_footer_two_genaral_menu_two_area_menu_content_title' => esc_html('Diversity & Inclusion'),

                    ],
                    [
                        'matrik_footer_two_genaral_menu_two_area_menu_content_title' => esc_html('Factory Employ'),

                    ],
                ],
                'title_field' => '{{{ matrik_footer_two_genaral_menu_two_area_menu_content_title }}}',
            ]
        );

        $this->end_controls_section();


        $this->start_controls_section(
            'matrik_footer_two_genaral_contact',
            [
                'label' => esc_html__('Contact', 'matrik-core')
            ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'matrik_footer_two_genaral_contact_icon',
            [
                'label' => esc_html__('Icon Image', 'matrik-core'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
                'media_types' => ['image', 'svg'],
            ]
        );

        $repeater->add_control(
            'matrik_footer_two_genaral_contact_title',
            [
                'label'       => esc_html__('Contact Title', 'matrik-core'),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default' => wp_kses('CALL ANY TIME', wp_kses_allowed_html('post')),
                'placeholder' => esc_html__('write your contact title here', 'matrik-core'),
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'matrik_footer_two_genaral_contact_type',
            [
                'label'   => esc_html__('Select Type', 'matrik-core'),
                'type'    => Controls_Manager::SELECT,
                'options' => [
                    'phone' => esc_html__('Phone', 'matrik-core'),
                    'email' => esc_html__('Email', 'matrik-core'),
                    'custom' => esc_html__('Custom', 'matrik-core'),
                ],
                'default' => 'phone',
            ]
        );

        $repeater->add_control(
            'matrik_footer_two_genaral_contact_phone_number',
            [
                'label'       => esc_html__('Phone Number', 'matrik-core'),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default'     => esc_html__('2-965-871-8617', 'matrik-core'),
                'placeholder' => esc_html__('write your text here', 'matrik-core'),
                'label_block' => true,
                'condition' => [
                    'matrik_footer_two_genaral_contact_type' => 'phone',
                ]

            ]
        );

        $repeater->add_control(
            'matrik_footer_two_genaral_contact_email',
            [
                'label'       => esc_html__('Email', 'matrik-core'),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default'     => esc_html__('info@example.com', 'matrik-core'),
                'placeholder' => esc_html__('write your menu title here', 'matrik-core'),
                'label_block' => true,
                'condition' => [
                    'matrik_footer_two_genaral_contact_type' => 'email',
                ]
            ]
        );

        $repeater->add_control(
            'matrik_footer_two_genaral_contact_custom',
            [
                'label'       => esc_html__('Custom', 'matrik-core'),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default'     => esc_html__('Dhaka, Bangladesh', 'matrik-core'),
                'placeholder' => esc_html__('write your menu title here', 'matrik-core'),
                'label_block' => true,
                'condition' => [
                    'matrik_footer_two_genaral_contact_type' => 'custom',
                ]
            ]
        );

        $repeater->add_control(
            'matrik_footer_two_genaral_contact_custom_url',
            [
                'label'   => esc_html__('URL/Link', 'matrik-core'),
                'type'    => \Elementor\Controls_Manager::URL,
                'options' => ['url', 'is_external', 'nofollow'],
                'default' => [
                    'url'         => '#',
                    'is_external' => true,
                    'nofollow'    => true,
                ],
                'label_block' => true,
                'condition' => [
                    'matrik_footer_two_genaral_contact_type' => 'custom',
                ]
            ]
        );

        $this->add_control(
            'matrik_footer_two_genaral_contact_list',
            [
                'label' => esc_html__('Contact List', 'matrik-core'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'matrik_footer_two_genaral_contact_title' => esc_html('CALL ANY TIME'),
                        'matrik_footer_two_genaral_contact_type' => esc_html('phone'),


                    ],
                    [
                        'matrik_footer_two_genaral_contact_title' => esc_html('ADDRESS'),
                        'matrik_footer_two_genaral_contact_type' => esc_html('custom'),

                    ],
                    [
                        'matrik_footer_two_genaral_contact_title' => esc_html('SAY HELLO'),
                        'matrik_footer_two_genaral_contact_type' => esc_html('email'),

                    ],
                ],
                'title_field' => '{{{ matrik_footer_two_genaral_contact_title }}}',
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'matrik_footer_two_genaral_copyright_and_social',
            [
                'label' => esc_html__('Copyright And Social Area', 'matrik-core')
            ]
        );

        $this->add_control(
            'matrik_footer_two_genaral_copyright_and_social_text',
            [
                'label'       => esc_html__('Copyright Text', 'matrik-core'),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default' => wp_kses('Copyright 2025 <a href="index.html">Matrik</a> | Design By <a href="https://www.egenslab.com/">Egens Lab</a>', wp_kses_allowed_html('post')),
                'placeholder' => esc_html__('write your text here', 'matrik-core'),
                'label_block' => true,

            ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'matrik_footer_two_genaral_copyright_and_social_social_icon',
            [
                'label' => esc_html__('Icon', 'matrik-core'),
                'type' => \Elementor\Controls_Manager::ICONS,
                'default' => [
                    'value' => 'fas fa-circle',
                    'library' => 'fa-solid',
                ],
                'recommended' => [
                    'fa-solid' => [
                        'circle',
                        'dot-circle',
                        'square-full',
                    ],
                    'fa-regular' => [
                        'circle',
                        'dot-circle',
                        'square-full',
                    ],
                ],
            ]
        );

        $repeater->add_control(
            'matrik_footer_two_genaral_copyright_and_social_social_title',
            [
                'label'       => esc_html__('Title', 'matrik-core'),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default'     => esc_html__('Linkedin', 'matrik-core'),
                'placeholder' => esc_html__('write your menu title here', 'matrik-core'),
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'matrik_footer_two_genaral_copyright_and_social_social_icon_url',
            [
                'label' => esc_html__('Social Link/URL', 'matrik-core'),
                'type' => \Elementor\Controls_Manager::URL,
                'placeholder' => esc_html__('https://your-link.com', 'matrik-core'),
                'options' => ['url', 'is_external', 'nofollow'],
                'default' => [
                    'url' => '#',
                    'is_external' => true,
                    'nofollow' => true,
                    // 'custom_attributes' => '',
                ],
                'label_block' => true,

            ]
        );

        $this->add_control(
            'matrik_footer_two_genaral_copyright_and_social_social_icon_list',
            [
                'label' => esc_html__('Social Icon List', 'matrik-core'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'matrik_footer_two_genaral_copyright_and_social_social_icon' => [
                            'value' => 'bi bi-linkedin',
                            'library' => 'boxicons',
                        ],
                        'matrik_footer_two_genaral_copyright_and_social_social_title' => esc_html('Linkedin'),

                    ],
                    [
                        'matrik_footer_two_genaral_copyright_and_social_social_icon' => [
                            'value' => 'bi bi-facebook',
                            'library' => 'bootstrap-icons',
                        ],
                        'matrik_footer_two_genaral_copyright_and_social_social_title' => esc_html('Facebook'),

                    ],
                    [
                        'matrik_footer_two_genaral_copyright_and_social_social_icon' => [
                            'value' => 'bi bi-twitter-x',
                            'library' => 'boxicons',
                        ],
                        'matrik_footer_two_genaral_copyright_and_social_social_title' => esc_html('Twitter'),

                    ],
                    [
                        'matrik_footer_two_genaral_copyright_and_social_social_icon' => [
                            'value' => 'bi bi-instagram',
                            'library' => 'boxicons',
                        ],
                        'matrik_footer_two_genaral_copyright_and_social_social_title' => esc_html('Instagram'),

                    ],
                ],
            ]
        );

        $this->end_controls_section();

        //style

        $this->start_controls_section(
            'matrik_footer_two_style_genaral',
            [
                'label'     => esc_html__('Styles', 'matrik-core'),
                'tab'       => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'matrik_footer_two_style_genaral_description',
            [
                'label'     => esc_html__('Description', 'matrik-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'matrik-core'),
                'name'     => 'matrik_footer_two_style_genaral_description_typ',
                'selector' => '{{WRAPPER}} .footer-section .footer-wrapper .footer-top-area p',

            ]
        );

        $this->add_control(
            'matrik_footer_two_style_genaral_description_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .footer-section .footer-wrapper .footer-top-area p' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_footer_two_style_genaral_established_title',
            [
                'label'     => esc_html__('Established Title', 'matrik-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'matrik-core'),
                'name'     => 'matrik_footer_two_style_genaral_established_title_typ',
                'selector' => '{{WRAPPER}} .footer-section .footer-wrapper .established h2',

            ]
        );

        $this->add_control(
            'matrik_footer_two_style_genaral_established_title_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .footer-section .footer-wrapper .established h2' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_footer_two_style_genaral_location_title',
            [
                'label'     => esc_html__('Location Title', 'matrik-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'matrik-core'),
                'name'     => 'matrik_footer_two_style_genaral_location_title_typ',
                'selector' => '{{WRAPPER}} .footer-section .footer-wrapper .address-area .address-list .single-address span',

            ]
        );

        $this->add_control(
            'matrik_footer_two_style_genaral_location_title_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .footer-section .footer-wrapper .address-area .address-list .single-address span' => 'color: {{VALUE}};',
                ],
            ]
        );


        $this->add_control(
            'matrik_footer_two_style_genaral_location',
            [
                'label'     => esc_html__('Location', 'matrik-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'matrik-core'),
                'name'     => 'matrik_footer_two_style_genaral_location_typ',
                'selector' => '{{WRAPPER}} .footer-section .footer-wrapper .address-area .address-list .single-address a',

            ]
        );

        $this->add_control(
            'matrik_footer_two_style_genaral_location_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .footer-section .footer-wrapper .address-area .address-list .single-address a' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_footer_two_style_genaral_location_hover_color',
            [
                'label'     => esc_html__('Hover Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .footer-section .footer-wrapper .address-area .address-list .single-address a:hover' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_footer_two_style_genaral_location_icon_color',
            [
                'label'     => esc_html__('Icon Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .footer-section .footer-wrapper .address-area .address-list .single-address::before' => 'background-color: {{VALUE}};',
                ],
            ]
        );


        $this->add_control(
            'matrik_footer_two_style_genaral_location_button',
            [
                'label'     => esc_html__('Location Button', 'matrik-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'matrik-core'),
                'name'     => 'matrik_footer_two_style_genaral_location_button_typ',
                'selector' => '{{WRAPPER}} .footer-section .footer-wrapper .address-area .location-btn',

            ]
        );

        $this->add_control(
            'matrik_footer_two_style_genaral_location_button_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .footer-section .footer-wrapper .address-area .location-btn' => 'color: {{VALUE}};',
                ],
            ]
        );


        $this->add_control(
            'matrik_footer_two_style_genaral_menu_title',
            [
                'label'     => esc_html__('Menu Title', 'matrik-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'matrik-core'),
                'name'     => 'matrik_footer_two_style_genaral_menu_title_typ',
                'selector' => '{{WRAPPER}} .footer-section .footer-wrapper .footer-menu-and-address-wrap .footer-widget .widget-title h5',

            ]
        );

        $this->add_control(
            'matrik_footer_two_style_genaral_menu_title_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .footer-section .footer-wrapper .footer-menu-and-address-wrap .footer-widget .widget-title h5' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_footer_two_style_genaral_menu',
            [
                'label'     => esc_html__('Menu', 'matrik-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'matrik-core'),
                'name'     => 'matrik_footer_two_style_genaral_menu_typ',
                'selector' => '{{WRAPPER}} .footer-section .footer-wrapper .footer-menu-and-address-wrap .footer-widget .widget-list li a',

            ]
        );

        $this->add_control(
            'matrik_footer_two_style_genaral_menu_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .footer-section .footer-wrapper .footer-menu-and-address-wrap .footer-widget .widget-list li a' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_footer_two_style_genaral_menu_hover_color',
            [
                'label'     => esc_html__('Hover Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .footer-section .footer-wrapper .footer-menu-and-address-wrap .footer-widget .widget-list li a:hover' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_footer_two_style_genaral_menu_icon_color',
            [
                'label'     => esc_html__('Icon Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .footer-section .footer-wrapper .footer-menu-and-address-wrap .footer-widget .widget-list li a svg' => 'fill: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_footer_two_style_genaral_contact_icon',
            [
                'label'     => esc_html__('Contact Icon', 'matrik-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_control(
            'matrik_footer_two_style_genaral_contact_icon_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .footer-section .footer-wrapper .footer-menu-and-address-wrap .contact-area li .single-contact .icon svg' => 'fill: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_footer_two_style_genaral_contact_title',
            [
                'label'     => esc_html__('Contact Title', 'matrik-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'matrik-core'),
                'name'     => 'matrik_footer_two_style_genaral_contact_title_typ',
                'selector' => '{{WRAPPER}} .footer-section .footer-wrapper .footer-menu-and-address-wrap .contact-area li .single-contact .content span',

            ]
        );

        $this->add_control(
            'matrik_footer_two_style_genaral_contact_title_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .footer-section .footer-wrapper .footer-menu-and-address-wrap .contact-area li .single-contact .content span' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_footer_two_style_genaral_contact',
            [
                'label'     => esc_html__('Contact', 'matrik-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'matrik-core'),
                'name'     => 'matrik_footer_two_style_genaral_contact_typ',
                'selector' => '{{WRAPPER}} .footer-section .footer-wrapper .footer-menu-and-address-wrap .contact-area li .single-contact .content h6 a',

            ]
        );

        $this->add_control(
            'matrik_footer_two_style_genaral_contact_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .footer-section .footer-wrapper .footer-menu-and-address-wrap .contact-area li .single-contact .content h6 a' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_footer_two_style_genaral_contact_hover_color',
            [
                'label'     => esc_html__('Hover Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .footer-section .footer-wrapper .footer-menu-and-address-wrap .contact-area li .single-contact .content h6 a:hover' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_footer_two_style_genaral_copyright_text',
            [
                'label'     => esc_html__('Copyright Text', 'matrik-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'matrik-core'),
                'name'     => 'matrik_footer_two_style_genaral_copyright_text_typ',
                'selector' => '{{WRAPPER}} .footer-section .footer-bottom-wrap .footer-bottom .copyright-area p',

            ]
        );

        $this->add_control(
            'matrik_footer_two_style_genaral_copyright_text_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .footer-section .footer-bottom-wrap .footer-bottom .copyright-area p' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_footer_two_style_genaral_copyright_text_span_color',
            [
                'label'     => esc_html__('Span Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .footer-section .footer-bottom-wrap .footer-bottom .copyright-area p a' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_footer_two_style_genaral_copyright_text_span_hover_color',
            [
                'label'     => esc_html__('Span Hover Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .footer-section .footer-bottom-wrap .footer-bottom .copyright-area p a:hover' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_footer_two_style_genaral_copyright_social_icon',
            [
                'label'     => esc_html__('Social Area', 'matrik-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'matrik-core'),
                'name'     => 'matrik_footer_two_style_genaral_copyright_social_icon_typ',
                'selector' => '{{WRAPPER}} .footer-section .footer-bottom-wrap .footer-bottom .social-area li a',

            ]
        );

        $this->add_control(
            'matrik_footer_two_style_genaral_copyright_social_icon_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .footer-section .footer-bottom-wrap .footer-bottom .social-area li a' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_footer_two_style_genaral_copyright_social_icon_hover_color',
            [
                'label'     => esc_html__('Hover Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .footer-section .footer-bottom-wrap .footer-bottom .social-area li a:hover' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section();
    }
    protected function render()
    {

        $settings = $this->get_settings_for_display();

?>

        <footer class="footer-section style-2">
            <div class="footer-wrapper">
                <div class="footer-top-area">
                    <div class="container">
                        <div class="row g-4 align-items-center">
                            <?php if (!empty($settings['matrik_footer_two_genaral_logo_image']['url'])) : ?>
                                <div class="col-md-3">
                                    <a href="<?php echo esc_url($settings['matrik_footer_two_genaral_logo_image_url']['url']); ?>" class="footer-logo">
                                        <img src="<?php echo esc_url($settings['matrik_footer_two_genaral_logo_image']['url']); ?>" alt="<?php echo esc_attr__('logo-image', 'matrik-core'); ?>">
                                    </a>
                                </div>
                            <?php endif; ?>
                            <?php if (!empty($settings['matrik_footer_two_genaral_description'])) : ?>
                                <div class="col-md-5 d-flex justify-content-md-center">
                                    <p><?php echo esc_html($settings['matrik_footer_two_genaral_description']); ?></p>
                                </div>
                            <?php endif; ?>
                            <?php if (!empty($settings['matrik_footer_two_genaral_title_text'])) : ?>
                                <div class="col-md-4 d-flex justify-content-md-end">
                                    <div class="established">
                                        <h2><?php echo esc_html($settings['matrik_footer_two_genaral_title_text']); ?></h2>
                                    </div>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                <div class="container">
                    <div class="footer-menu-and-address-wrap">
                        <div class="row align-items-center">
                            <div class="col-lg-3">
                                <div class="footer-widget">
                                    <div class="address-area">
                                        <ul class="address-list">
                                            <?php foreach ($settings['matrik_footer_two_genaral_address_area_list'] as $data) : ?>
                                                <li class="single-address">
                                                    <?php if (!empty($data['matrik_footer_two_genaral_address_area_title'])) : ?>
                                                        <span><?php echo esc_html($data['matrik_footer_two_genaral_address_area_title']); ?></span>
                                                    <?php endif; ?>
                                                    <?php if (!empty($data['matrik_footer_two_genaral_address_area_address_text'])) : ?>
                                                        <a href="<?php echo esc_url($data['matrik_footer_two_genaral_address_area_address_text_url']['url']); ?>"><?php echo esc_html($data['matrik_footer_two_genaral_address_area_address_text']); ?></a>
                                                    <?php endif; ?>
                                                </li>
                                            <?php endforeach; ?>
                                        </ul>
                                        <?php if (!empty($settings['matrik_footer_two_genaral_address_area_button_text'])) : ?>
                                            <a href="<?php echo esc_url($settings['matrik_footer_two_genaral_address_area_button_text_url']['url']); ?>" class="location-btn"><?php echo esc_html($settings['matrik_footer_two_genaral_address_area_button_text']); ?></a>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-9">
                                <div class="footer-menu">
                                    <div class="row gy-5">
                                        <div class="col-md-4 col-sm-6 d-flex justify-content-lg-center">
                                            <div class="footer-widget">
                                                <?php if (!empty($settings['matrik_footer_two_genaral_menu_one_area_menu_title'])) : ?>
                                                    <div class="widget-title">
                                                        <h5><?php echo esc_html($settings['matrik_footer_two_genaral_menu_one_area_menu_title']); ?></h5>
                                                    </div>
                                                <?php endif; ?>
                                                <div class="menu-container">
                                                    <ul class="widget-list">
                                                        <?php foreach ($settings['matrik_footer_two_genaral_menu_one_area_menu_content_list'] as $data) : ?>
                                                            <?php if (!empty($data['matrik_footer_two_genaral_menu_one_area_menu_content_title'])) : ?>
                                                                <li>
                                                                    <a href="<?php echo esc_url($data['matrik_footer_two_genaral_menu_one_area_menu_content_title_url']['url']); ?>">
                                                                        <?php echo esc_html($data['matrik_footer_two_genaral_menu_one_area_menu_content_title']); ?>
                                                                        <svg width="9" height="9" viewBox="0 0 9 9" xmlns="http://www.w3.org/2000/svg">
                                                                            <path d="M0.0445549 0H9.00008V1.67647L1.69308 9L0 7.32353L4.99014 2.38235L0.0445549 2.42647V0Z" />
                                                                            <path d="M9.0002 8.9996V3.35254L6.59424 5.73489V8.9996H9.0002Z" />
                                                                        </svg>
                                                                    </a>
                                                                </li>
                                                            <?php endif; ?>
                                                        <?php endforeach; ?>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-sm-6 d-flex justify-content-lg-center">
                                            <div class="footer-widget">
                                                <?php if (!empty($settings['matrik_footer_two_genaral_menu_two_area_menu_title'])) : ?>
                                                    <div class="widget-title">
                                                        <h5><?php echo esc_html($settings['matrik_footer_two_genaral_menu_two_area_menu_title']); ?></h5>
                                                    </div>
                                                <?php endif; ?>
                                                <div class="menu-container">
                                                    <ul class="widget-list">
                                                        <?php foreach ($settings['matrik_footer_two_genaral_menu_two_area_menu_content_list'] as $data) : ?>
                                                            <?php if (!empty($data['matrik_footer_two_genaral_menu_two_area_menu_content_title'])) : ?>
                                                                <li>
                                                                    <a href="<?php echo esc_url($data['matrik_footer_two_genaral_menu_two_area_menu_content_title_url']['url']); ?>">
                                                                        <?php echo esc_html($data['matrik_footer_two_genaral_menu_two_area_menu_content_title']); ?>
                                                                        <svg width="9" height="9" viewBox="0 0 9 9" xmlns="http://www.w3.org/2000/svg">
                                                                            <path d="M0.0445549 0H9.00008V1.67647L1.69308 9L0 7.32353L4.99014 2.38235L0.0445549 2.42647V0Z" />
                                                                            <path d="M9.0002 8.9996V3.35254L6.59424 5.73489V8.9996H9.0002Z" />
                                                                        </svg>
                                                                    </a>
                                                                </li>
                                                            <?php endif; ?>
                                                        <?php endforeach; ?>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-sm-6 d-flex justify-content-lg-end">
                                            <ul class="contact-area">
                                                <?php
                                                $total_items = count($settings['matrik_footer_two_genaral_contact_list']);
                                                $index = 0;
                                                foreach ($settings['matrik_footer_two_genaral_contact_list'] as $data) :
                                                    $index++; ?>
                                                    <li>
                                                        <div class="single-contact">
                                                            <div class="icon">
                                                                <?php
                                                                $icon_url = $data['matrik_footer_two_genaral_contact_icon']['url'];
                                                                $icon_path = get_attached_file($data['matrik_footer_two_genaral_contact_icon']['id']);
                                                                if (strtolower(pathinfo($icon_path, PATHINFO_EXTENSION)) === 'svg') {

                                                                    if (file_exists($icon_path)) {
                                                                        echo file_get_contents($icon_path);
                                                                    }
                                                                } else {
                                                                ?>
                                                                    <img src="<?php echo esc_url($icon_url); ?>" alt="<?php echo esc_attr__('icon-image', 'matrik-core'); ?>" />
                                                                <?php
                                                                }
                                                                ?>
                                                            </div>
                                                            <div class="content">
                                                                <?php if (!empty($data['matrik_footer_two_genaral_contact_title'])) : ?>
                                                                    <span><?php echo esc_html($data['matrik_footer_two_genaral_contact_title']); ?></span>
                                                                <?php endif; ?>
                                                                <h6><a href="<?php if ($data['matrik_footer_two_genaral_contact_type'] == 'phone') : ?> tel:<?php echo preg_replace('/[^0-9]/', '', $data['matrik_footer_two_genaral_contact_phone_number']); ?><?php elseif ($data['matrik_footer_two_genaral_contact_type'] == 'email') : ?>mailto:<?php echo esc_html($data['matrik_footer_two_genaral_contact_email']); ?><?php elseif ($data['matrik_footer_two_genaral_contact_type'] == 'custom') : ?><?php echo esc_html($data['matrik_footer_two_genaral_contact_custom_url']['url']); ?><?php endif; ?>"><?php if ($data['matrik_footer_two_genaral_contact_type'] == 'phone') : ?><?php echo esc_html($data['matrik_footer_two_genaral_contact_phone_number']); ?><?php elseif ($data['matrik_footer_two_genaral_contact_type'] == 'email') : ?><?php echo esc_html($data['matrik_footer_two_genaral_contact_email']); ?><?php elseif ($data['matrik_footer_two_genaral_contact_type'] == 'custom') : ?><?php echo esc_html($data['matrik_footer_two_genaral_contact_custom']); ?><?php endif; ?></a></h6>
                                                            </div>
                                                        </div>
                                                        <?php if ($index < $total_items) : ?>
                                                            <svg class="arrow" width="8" height="29" viewBox="0 0 8 29" xmlns="http://www.w3.org/2000/svg">
                                                                <path
                                                                    d="M1.33333 3C1.33333 4.47276 2.52724 5.66667 4 5.66667C5.47276 5.66667 6.66667 4.47276 6.66667 3C6.66667 1.52724 5.47276 0.333333 4 0.333333C2.52724 0.333333 1.33333 1.52724 1.33333 3ZM3.64645 28.3536C3.84171 28.5488 4.15829 28.5488 4.35355 28.3536L7.53553 25.1716C7.7308 24.9763 7.7308 24.6597 7.53553 24.4645C7.34027 24.2692 7.02369 24.2692 6.82843 24.4645L4 27.2929L1.17157 24.4645C0.976311 24.2692 0.659728 24.2692 0.464466 24.4645C0.269204 24.6597 0.269204 24.9763 0.464466 25.1716L3.64645 28.3536ZM3.5 3V28H4.5V3H3.5Z" />
                                                            </svg>
                                                        <?php endif; ?>
                                                    </li>
                                                <?php endforeach; ?>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer-bottom-wrap">
                <div class="container">
                    <div class="footer-bottom">
                        <?php if (!empty($settings['matrik_footer_two_genaral_copyright_and_social_text'])) : ?>
                            <div class="copyright-area">
                                <p><?php echo wp_kses($settings['matrik_footer_two_genaral_copyright_and_social_text'], wp_kses_allowed_html('post'))  ?></p>
                            </div>
                        <?php endif; ?>
                        <ul class="social-area">
                            <?php foreach ($settings['matrik_footer_two_genaral_copyright_and_social_social_icon_list'] as $data) :
                                $icon = $data['matrik_footer_two_genaral_copyright_and_social_social_icon'];
                            ?>
                                <li>
                                    <a href="<?php echo esc_url($data['matrik_footer_two_genaral_copyright_and_social_social_icon_url']['url']); ?>">
                                        <?php if (!empty($icon['value'])) : ?>
                                            <i class="<?php echo esc_attr($icon['value']); ?>"></i>
                                        <?php endif; ?>
                                        <?php if (!empty($data['matrik_footer_two_genaral_copyright_and_social_social_title'])) : ?>
                                            <?php echo esc_html($data['matrik_footer_two_genaral_copyright_and_social_social_title']); ?>
                                        <?php endif; ?>
                                    </a>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>
            </div>
        </footer>

<?php

    }
}

Plugin::instance()->widgets_manager->register(new Matrik_footer_Two_Widget());
