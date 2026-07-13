<?php

namespace Elementor;

if (!defined('ABSPATH')) exit;  // Exit if accessed directly

use Elementor\core\Schemes;
use Egns_Core\Egns_Helper;

class Matrik_Video_Widget extends Widget_Base
{

    public function get_name()
    {
        return 'matrik_video';
    }

    public function get_title()
    {
        return esc_html__('EG Video', 'matrik-core');
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
            'matrik_video_genaral',
            [
                'label' => esc_html__('General', 'matrik-core')
            ]
        );

        $this->add_control(
            'matrik_video_genaral_style_selection',
            [
                'label'   => esc_html__('Select Style', 'matrik-core'),
                'type'    => Controls_Manager::SELECT,
                'options' => [
                    'style_one' => esc_html__('Style One', 'matrik-core'),
                    'style_two' => esc_html__('Style Two', 'matrik-core'),
                    'style_three' => esc_html__('Style Three', 'matrik-core'),
                    'style_four' => esc_html__('Style Four', 'matrik-core'),
                ],
                'default' => 'style_one',
            ]
        );

        $this->add_control(
            'matrik_video_genaral_banner_image',
            [
                'label' => esc_html__('Video Banner Image', 'matrik-core'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
                'media_types' => ['image'],
                'condition' => [
                    'matrik_video_genaral_style_selection' => ['style_one', 'style_two'],
                ]
            ]
        );

        $this->add_control(
            'matrik_video_genaral_select_type',
            [
                'label'   => esc_html__('Select Type', 'matrik-core'),
                'type'    => Controls_Manager::SELECT,
                'options' => [
                    'upload' => esc_html__('Upload', 'matrik-core'),
                    'url' => esc_html__('URL', 'matrik-core'),
                ],
                'default' => 'url',
            ]
        );

        $this->add_control(
            'matrik_video_genaral_video_area_upload',
            [
                'label' => esc_html__('Choose Video File', 'matrik-core'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'media_types' => ['video'],
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
                'condition' => [
                    'matrik_video_genaral_select_type' => ['upload'],
                ]
            ]
        );

        $this->add_control(
            'matrik_video_genaral_video_area_link',
            [
                'label'   => esc_html__('Video URL/Link', 'matrik-core'),
                'type'    => \Elementor\Controls_Manager::URL,
                'options' => ['url', 'is_external', 'nofollow'],
                'default' => [
                    'url'         => '#',
                    'is_external' => true,
                    'nofollow'    => true,
                    // 'custom_attributes' => '',
                ],
                'label_block' => true,
                'condition' => [
                    'matrik_video_genaral_select_type' => ['url'],
                ]
            ]
        );

        $this->add_control(
            'matrik_video_genaral_video_three_title_one',
            [
                'label'       => esc_html__('Title One', 'matrik-core'),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default'     => esc_html__('Empowering', 'matrik-core'),
                'placeholder' => esc_html__('write your text here', 'matrik-core'),
                'label_block' => true,
                'condition' => [
                    'matrik_video_genaral_style_selection' => ['style_three'],
                ]
            ]
        );

        $this->add_control(
            'matrik_video_genaral_video_three_title_two',
            [
                'label'       => esc_html__('Title Two', 'matrik-core'),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default'     => esc_html__('Industry Growth', 'matrik-core'),
                'placeholder' => esc_html__('write your text here', 'matrik-core'),
                'label_block' => true,
                'condition' => [
                    'matrik_video_genaral_style_selection' => ['style_three'],
                ]
            ]
        );

        $this->add_control(
            'matrik_video_genaral_video_circular_text',
            [
                'label'       => esc_html__('Circular Text', 'matrik-core'),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default'     => esc_html__(' STRATEGY . DESIGN . BRAND .', 'matrik-core'),
                'placeholder' => esc_html__('write your button text here', 'matrik-core'),
                'label_block' => true,
                'condition' => [
                    'matrik_video_genaral_style_selection' => ['style_two', 'style_three', 'style_four'],
                ]
            ]
        );

        $this->add_control(
            'matrik_video_genaral_video_circular_text_url',
            [
                'label'   => esc_html__('Circular Text URL/Link', 'matrik-core'),
                'type'    => \Elementor\Controls_Manager::URL,
                'options' => ['url', 'is_external', 'nofollow'],
                'default' => [
                    'url'         => '#',
                    'is_external' => true,
                    'nofollow'    => true,
                    // 'custom_attributes' => '',
                ],
                'label_block' => true,
                'condition' => [
                    'matrik_video_genaral_style_selection' => ['style_three'],
                ]
            ]
        );

        $this->add_control(
            'matrik_video_four_video_content_area',
            [
                'label'     => esc_html__('Video Content Area', 'matrik-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
                'condition' => [
                    'matrik_video_genaral_style_selection' => ['style_four'],
                ]
            ]
        );

        $this->add_control(
            'matrik_video_four_video_content_area_icon',
            [
                'label' => esc_html__('Icon Image', 'matrik-core'),
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
                'condition' => [
                    'matrik_video_genaral_style_selection' => ['style_four'],
                ]
            ]
        );

        $this->add_control(
            'matrik_video_four_video_content_area_description',
            [
                'label'       => esc_html__('Description', 'matrik-core'),
                'type'        => \Elementor\Controls_Manager::TEXTAREA,
                'default'     => esc_html__('“The textile industry has always been pillar of innovatio & Manship, blend age old technique with modern techy. As founders, our mission quality & durability.”', 'matrik-core'),
                'placeholder' => esc_html__('write your button text here', 'matrik-core'),
                'label_block' => true,
                'condition' => [
                    'matrik_video_genaral_style_selection' => ['style_four'],
                ]
            ]
        );


        $this->add_control(
            'matrik_video_four_video_content_area_vector_image',
            [
                'label' => esc_html__('Vector Image', 'matrik-core'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
                'media_types' => ['image', 'svg'],
                'condition' => [
                    'matrik_video_genaral_style_selection' => ['style_four'],
                ]
            ]
        );

        $this->add_control(
            'matrik_video_genaral_video_area_partner_logo_title',
            [
                'label'       => esc_html__('Partner Logo Title', 'matrik-core'),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default'     => esc_html__('A partner, Not A Vendor:', 'matrik-core'),
                'placeholder' => esc_html__('write your subtitle here', 'matrik-core'),
                'label_block' => true,
                'condition' => [
                    'matrik_video_genaral_style_selection' => ['style_two'],
                ]
            ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'matrik_video_genaral_content_logo_sec',
            [
                'label' => esc_html__('Logo', 'matrik-core'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'media_types' => ['svg', 'image'],
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],

            ]
        );

        $repeater->add_control(
            'matrik_video_genaral_content_logo_sec_url',
            [
                'label' => esc_html__('Logo URL', 'matrik-core'),
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
            'matrik_video_genaral_content_logo_list',
            [
                'label' => esc_html__('Logo List (Light)', 'matrik-core'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'matrik_video_genaral_content_logo_sec' => [
                            'url' => \Elementor\Utils::get_placeholder_image_src(),
                        ],
                    ],
                    [
                        'matrik_video_genaral_content_logo_sec' => [
                            'url' => \Elementor\Utils::get_placeholder_image_src(),
                        ],
                    ],
                    [
                        'matrik_video_genaral_content_logo_sec' => [
                            'url' => \Elementor\Utils::get_placeholder_image_src(),
                        ],
                    ],
                    [
                        'matrik_video_genaral_content_logo_sec' => [
                            'url' => \Elementor\Utils::get_placeholder_image_src(),
                        ],
                    ],


                ],
                'condition' => [
                    'matrik_video_genaral_style_selection' => ['style_two'],
                ]
            ]
        );

        $this->end_controls_section();


        //style start

        $this->start_controls_section(
            'matrik_video_style_one_genaral',
            [
                'label'     => esc_html__('Styles', 'matrik-core'),
                'tab'       => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'matrik_video_genaral_style_selection' => ['style_one'],
                ]
            ]
        );

        $this->add_control(
            'matrik_video_style_one_genaral_video_icon',
            [
                'label'     => esc_html__('Video Icon', 'matrik-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'matrik-core'),
                'name'     => 'matrik_video_style_one_genaral_video_icon_typ',
                'selector' => '{{WRAPPER}} .home1-video-section .play-btn .icon .play-icon',

            ]
        );

        $this->add_control(
            'matrik_video_style_one_genaral_video_outside_icon_color',
            [
                'label'     => esc_html__('Outside Icon Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home1-video-section .play-btn .icon .video-circle' => 'stroke: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_video_style_one_genaral_video_inside_icon_color',
            [
                'label'     => esc_html__('Inside Icon Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home1-video-section .play-btn .icon .play-icon' => 'fill: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section();

        //style start

        $this->start_controls_section(
            'matrik_video_style_three_genaral',
            [
                'label'     => esc_html__('Styles', 'matrik-core'),
                'tab'       => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'matrik_video_genaral_style_selection' => ['style_three'],
                ]
            ]
        );

        $this->add_control(
            'matrik_video_style_three_genaral_title',
            [
                'label'     => esc_html__('Title', 'matrik-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'matrik-core'),
                'name'     => 'matrik_video_style_three_genaral_title_typ',
                'selector' => '{{WRAPPER}} .home3-video-area .video-content-wrap .video-content-btn-area .content h2',

            ]
        );

        $this->add_control(
            'matrik_video_style_three_genaral_title_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home3-video-area .video-content-wrap .video-content-btn-area .content h2' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_video_style_three_genaral_circular_text',
            [
                'label'     => esc_html__('Circular Text', 'matrik-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'matrik-core'),
                'name'     => 'matrik_video_style_three_genaral_circular_text_typ',
                'selector' => '{{WRAPPER}} .home3-video-area .video-content-wrap .video-content-btn-area .circular-text2 .text span',

            ]
        );

        $this->add_control(
            'matrik_video_style_three_genaral_circular_text_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home3-video-area .video-content-wrap .video-content-btn-area .circular-text2 .text span' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_video_style_three_genaral_circular_text_bg_color',
            [
                'label'     => esc_html__('Background Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home3-video-area .video-content-wrap .video-content-btn-area .circular-text2' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_video_style_three_genaral_circular_text_icon_color',
            [
                'label'     => esc_html__('Icon Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home3-video-area .video-content-wrap .video-content-btn-area .circular-text2 .play-btn svg' => 'fill: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_video_style_three_genaral_circular_text_icon_bg_color',
            [
                'label'     => esc_html__('Icon Background Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home3-video-area .video-content-wrap .video-content-btn-area .circular-text2 .play-btn' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section();

        //style start

        $this->start_controls_section(
            'matrik_video_style_four_genaral',
            [
                'label'     => esc_html__('Styles', 'matrik-core'),
                'tab'       => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'matrik_video_genaral_style_selection' => ['style_four'],
                ]
            ]
        );

        $this->add_control(
            'matrik_video_style_four_genaral_circular_text',
            [
                'label'     => esc_html__('Circular Text', 'matrik-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'matrik-core'),
                'name'     => 'matrik_video_style_four_genaral_circular_text_typ',
                'selector' => '{{WRAPPER}} .home5-video-section .video-wrapper .btn-area .circular-text2 .text span',

            ]
        );

        $this->add_control(
            'matrik_video_style_ffour_genaral_circular_text_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home5-video-section .video-wrapper .btn-area .circular-text2 .text span' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_video_style_four_genaral_circular_icon',
            [
                'label'     => esc_html__('Circular Icon', 'matrik-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_control(
            'matrik_video_style_four_genaral_circular_icon_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home5-video-section .video-wrapper .btn-area .circular-text2 .play-btn svg' => 'fill: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_video_style_four_genaral_circular_icon_bg_color',
            [
                'label'     => esc_html__('Background Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home5-video-section .video-wrapper .btn-area .circular-text2 .play-btn' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_video_style_four_genaral_circular_icon_outside_bg_color',
            [
                'label'     => esc_html__('Outside Background Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home5-video-section .video-wrapper .btn-area .circular-text2' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_video_style_four_genaral_video_content_area',
            [
                'label'     => esc_html__('Video Content Area', 'matrik-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'matrik_video_style_four_genaral_video_content_area_background_color',
            [
                'label'     => esc_html__('Section Background Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home5-video-section .video-content-wrap .video-content' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_video_style_four_genaral_video_content_area_icon',
            [
                'label'     => esc_html__('Icon', 'matrik-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_control(
            'matrik_video_style_four_genaral_video_content_area_icon_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home5-video-section .video-content-wrap .video-content .icon svg' => 'fill: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_video_style_four_genaral_content_description',
            [
                'label'     => esc_html__('Content Description', 'matrik-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'matrik-core'),
                'name'     => 'matrik_video_style_four_genaral_content_description_typ',
                'selector' => '{{WRAPPER}} .home5-video-section .video-content-wrap .video-content p',

            ]
        );

        $this->add_control(
            'matrik_video_style_four_genaral_content_description_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home5-video-section .video-content-wrap .video-content p' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section();


        //style start

        $this->start_controls_section(
            'matrik_video_style_two_genaral',
            [
                'label'     => esc_html__('Styles', 'matrik-core'),
                'tab'       => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'matrik_video_genaral_style_selection' => ['style_two'],
                ]
            ]
        );

        $this->add_control(
            'matrik_video_style_two_genaral_circular_text',
            [
                'label'     => esc_html__('Circular Text', 'matrik-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'matrik-core'),
                'name'     => 'matrik_video_style_two_genaral_circular_text_typ',
                'selector' => '{{WRAPPER}} .home2-video-banner-section .banner-wrapper .circular-text2 .text span',

            ]
        );

        $this->add_control(
            'matrik_video_style_two_genaral_circular_text_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home2-video-banner-section .banner-wrapper .circular-text2 .text span' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_video_style_two_genaral_circular_icon',
            [
                'label'     => esc_html__('Circular Icon', 'matrik-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_control(
            'matrik_video_style_two_genaral_circular_icon_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home2-video-banner-section .banner-wrapper .circular-text2 .center-icon svg' => 'fill: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_video_style_two_genaral_circular_icon_bg_color',
            [
                'label'     => esc_html__('Background Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home2-video-banner-section .banner-wrapper .circular-text2 .center-icon' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_video_style_two_genaral_circular_icon_outside_bg_color',
            [
                'label'     => esc_html__('Outside Background Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home2-video-banner-section .banner-wrapper .circular-text2' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_video_style_two_genaral_partner_text_title',
            [
                'label'     => esc_html__('Partner Title', 'matrik-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'matrik-core'),
                'name'     => 'matrik_video_style_two_genaral_partner_text_title_typ',
                'selector' => '{{WRAPPER}} .logo-section .logo-wrap .logo-title h6',

            ]
        );

        $this->add_control(
            'matrik_video_style_two_genaral_partner_text_title_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .logo-section .logo-wrap .logo-title h6' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_video_style_two_genaral_partner_text_title_right_border_color',
            [
                'label'     => esc_html__('Right Border Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .logo-section .logo-wrap .logo-title' => 'border-right: 1px solid {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section();
    }
    protected function render()
    {

        $settings = $this->get_settings_for_display();

?>

        <?php if (is_admin()) : ?>
            <script>
                const video = document.querySelector(".video-area video");
                const playBtn = document.querySelector(".play-btn");

                if (video && playBtn) {
                    playBtn.addEventListener("click", function(event) {
                        event.preventDefault();

                        if (video.paused) {
                            video.play();
                            playBtn.classList.add("active");
                        } else {
                            video.pause();
                            playBtn.classList.remove("active");
                        }
                    });
                };
            </script>
        <?php endif; ?>
        <?php if ($settings['matrik_video_genaral_style_selection'] == 'style_one') : ?>
            <div class="home1-video-section">
                <?php if (!empty($settings['matrik_video_genaral_banner_image']['url'])) : ?>
                    <img src="<?php echo esc_url($settings['matrik_video_genaral_banner_image']['url']); ?>" alt="<?php echo esc_attr__('banner-image', 'matrik-core'); ?>">
                <?php endif; ?>
                <a href="<?php if ($settings['matrik_video_genaral_select_type'] == 'upload') : ?><?php echo esc_url($settings['matrik_video_genaral_video_area_upload']['url']); ?><?php elseif ($settings['matrik_video_genaral_select_type'] == 'url') : ?><?php echo esc_url($settings['matrik_video_genaral_video_area_link']['url']); ?><?php endif; ?>" class="play-btn video-player">
                    <div class="icon">
                        <svg class="video-circle" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="70px" viewBox="0 0 206 206" style="enable-background:new 0 0 206 206;" xml:space="preserve">
                            <circle class="circle" stroke-miterlimit="10" cx="103" cy="103" r="100"></circle>
                            <path class="circle-half top-half" stroke-width="4" stroke-miterlimit="10" d="M16.4,53C44,5.2,105.2-11.2,153,16.4s64.2,88.8,36.6,136.6"></path>
                            <path class="circle-half bottom-half" stroke-width="4" stroke-miterlimit="10" d="M189.6,153C162,200.8,100.8,217.2,53,189.6S-11.2,100.8,16.4,53"></path>
                        </svg>
                        <svg class="play-icon" width="22" height="26" viewBox="0 0 22 26" xmlns="http://www.w3.org/2000/svg">
                            <path d="M21.0414 12.6872C21.0414 11.9857 20.68 11.3397 20.0741 10.9581L3.71746 0.667707C3.05587 0.252161 2.24905 0.221801 1.5565 0.588432C0.866106 0.954858 0.453125 1.63119 0.453125 2.39695V22.9762C0.453125 23.742 0.866072 24.4181 1.55755 24.7847C1.87989 24.9547 2.22564 25.0392 2.57141 25.0392C2.96897 25.0392 3.36391 24.927 3.71724 24.7054L20.0739 14.4166C20.68 14.0348 21.0414 13.3888 21.0414 12.6874V12.6872ZM19.4837 13.5246L3.12701 23.8134C2.80597 24.015 2.41492 24.0287 2.07958 23.8524C1.74423 23.6749 1.5435 23.3475 1.5435 22.976V2.39676C1.5435 2.02528 1.74423 1.69657 2.07958 1.52035C2.2363 1.43855 2.40452 1.39701 2.57165 1.39701C2.76458 1.39701 2.9562 1.45119 3.12725 1.55956L19.4839 11.85C19.7817 12.0376 19.9526 12.3438 19.9526 12.6887C19.9523 13.0323 19.7815 13.337 19.4837 13.5246Z"></path>
                        </svg>
                    </div>
                </a>
            </div>
        <?php endif; ?>

        <?php if ($settings['matrik_video_genaral_style_selection'] == 'style_two') : ?>
            <div class="home2-video-banner-section">
                <div class="banner-wrapper">
                    <?php if (!empty($settings['matrik_video_genaral_banner_image']['url'])) : ?>
                        <img src="<?php echo esc_url($settings['matrik_video_genaral_banner_image']['url']); ?>" alt="<?php echo esc_attr__('video-banner-image', 'matrik-core'); ?>">
                    <?php endif; ?>
                    <div class="circular-text2">
                        <a href="<?php if ($settings['matrik_video_genaral_select_type'] == 'upload') : ?><?php echo esc_url($settings['matrik_video_genaral_video_area_upload']['url']); ?><?php elseif ($settings['matrik_video_genaral_select_type'] == 'url') : ?><?php echo esc_url($settings['matrik_video_genaral_video_area_link']['url']); ?><?php endif; ?>" class="center-icon video-player">
                            <svg width="24" height="27" viewBox="0 0 24 27" xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M21.3787 9.99987L4.82154 0.433939C4.34825 0.153923 3.80926 0.00420458 3.25936 0C2.39492 0 1.56589 0.343396 0.954645 0.954644C0.343396 1.56589 0 2.39492 0 3.25936V23.7895C0.000109938 24.3631 0.153886 24.9263 0.445339 25.4203C0.736791 25.9144 1.15528 26.3214 1.65729 26.599C2.1593 26.8766 2.72651 27.0146 3.29994 26.9988C3.87336 26.9829 4.43207 26.8137 4.91797 26.5088L21.4944 16.0364C22.0098 15.7139 22.4329 15.2633 22.7224 14.7286C23.0119 14.1939 23.1579 13.5933 23.1463 12.9854C23.1346 12.3775 22.9657 11.7829 22.6559 11.2597C22.3461 10.7365 21.9061 10.3024 21.3787 9.99987Z" />
                            </svg>
                        </a>
                        <?php if (!empty($settings['matrik_video_genaral_video_circular_text'])) : ?>
                            <div class="text">
                                <span>
                                    <?php echo esc_html($settings['matrik_video_genaral_video_circular_text']); ?>
                                </span>
                            </div>
                        <?php endif; ?>
                    </div>
                    <div class="logo-section">
                        <div class="container-fluid">
                            <div class="logo-wrap">
                                <?php if (!empty($settings['matrik_video_genaral_video_area_partner_logo_title'])) : ?>
                                    <div class="logo-title">
                                        <h6><?php echo esc_html($settings['matrik_video_genaral_video_area_partner_logo_title']); ?></h6>
                                    </div>
                                <?php endif; ?>
                                <div class="marquee">
                                    <div class="marquee__group">
                                        <?php foreach ($settings['matrik_video_genaral_content_logo_list'] as $data) : ?>
                                            <?php if (!empty($data['matrik_video_genaral_content_logo_sec']['url'])) : ?>
                                                <a href="<?php echo esc_url($data['matrik_video_genaral_content_logo_sec_url']['url']); ?>"><img src="<?php echo esc_url($data['matrik_video_genaral_content_logo_sec']['url']); ?>" alt="<?php echo esc_attr__('logo-image', 'matrik-core'); ?>"></a>
                                            <?php endif; ?>
                                        <?php endforeach; ?>

                                    </div>
                                    <div aria-hidden="true" class="marquee__group">
                                        <?php foreach ($settings['matrik_video_genaral_content_logo_list'] as $data) : ?>
                                            <?php if (!empty($data['matrik_video_genaral_content_logo_sec']['url'])) : ?>
                                                <a href="<?php echo esc_url($data['matrik_video_genaral_content_logo_sec_url']['url']); ?>"><img src="<?php echo esc_url($data['matrik_video_genaral_content_logo_sec']['url']); ?>" alt="<?php echo esc_attr__('logo-image', 'matrik-core'); ?>"></a>
                                            <?php endif; ?>
                                        <?php endforeach; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>

        <?php if ($settings['matrik_video_genaral_style_selection'] == 'style_three') : ?>
            <div class="home3-video-area">
                <div class="video-area">
                    <video autoplay="" loop="" muted="" playsinline="" src="<?php if ($settings['matrik_video_genaral_select_type'] == 'upload') : ?><?php echo esc_url($settings['matrik_video_genaral_video_area_upload']['url']); ?><?php elseif ($settings['matrik_video_genaral_select_type'] == 'url') : ?><?php echo esc_url($settings['matrik_video_genaral_video_area_link']['url']); ?><?php endif; ?>"></video>
                </div>
                <div class="video-content-wrap">
                    <div class="video-content-btn-area">
                        <div class="content">
                            <?php if (!empty($settings['matrik_video_genaral_video_three_title_one'])) : ?>
                                <h2><?php echo esc_html($settings['matrik_video_genaral_video_three_title_one']); ?></h2>
                            <?php endif; ?>
                            <?php if (!empty($settings['matrik_video_genaral_video_three_title_two'])) : ?>
                                <h2><?php echo esc_html($settings['matrik_video_genaral_video_three_title_two']); ?></h2>
                            <?php endif; ?>
                        </div>
                        <div class="circular-text2">
                            <?php if (!empty($settings['matrik_video_genaral_video_circular_text_url']['url'])) : ?>
                                <a href="<?php echo esc_url($settings['matrik_video_genaral_video_circular_text_url']['url']); ?>" class="play-btn active">
                                    <svg class="play-icon" width="24" height="27" viewBox="0 0 24 27" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M21.3787 9.99987L4.82154 0.433939C4.34825 0.153923 3.80926 0.00420458 3.25936 0C2.39492 0 1.56589 0.343396 0.954645 0.954644C0.343396 1.56589 0 2.39492 0 3.25936V23.7895C0.000109938 24.3631 0.153886 24.9263 0.445339 25.4203C0.736791 25.9144 1.15528 26.3214 1.65729 26.599C2.1593 26.8766 2.72651 27.0146 3.29994 26.9988C3.87336 26.9829 4.43207 26.8137 4.91797 26.5088L21.4944 16.0364C22.0098 15.7139 22.4329 15.2633 22.7224 14.7286C23.0119 14.1939 23.1579 13.5933 23.1463 12.9854C23.1346 12.3775 22.9657 11.7829 22.6559 11.2597C22.3461 10.7365 21.9061 10.3024 21.3787 9.99987Z" />
                                    </svg>
                                    <svg class="pause-icon" width="21" height="27" viewBox="0 0 21 27" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M7.125 3.375C7.125 1.51104 5.61396 0 3.75 0C1.88604 0 0.375 1.51104 0.375 3.375V23.625C0.375 25.489 1.88604 27 3.75 27C5.61396 27 7.125 25.489 7.125 23.625V3.375Z" />
                                        <path d="M20.625 3.375C20.625 1.51104 19.114 0 17.25 0C15.386 0 13.875 1.51104 13.875 3.375V23.625C13.875 25.489 15.386 27 17.25 27C19.114 27 20.625 25.489 20.625 23.625V3.375Z" />
                                    </svg>
                                </a>
                            <?php endif; ?>
                            <?php if (!empty($settings['matrik_video_genaral_video_circular_text'])) : ?>
                                <div class="text">
                                    <span>
                                        <?php echo esc_html($settings['matrik_video_genaral_video_circular_text']); ?>
                                    </span>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>

        <?php if ($settings['matrik_video_genaral_style_selection'] == 'style_four') : ?>
            <div class="home5-video-section">
                <div class="video-wrapper">
                    <div class="video-area">
                        <video autoplay="" loop="" muted="" playsinline="" src="<?php if ($settings['matrik_video_genaral_select_type'] == 'upload') : ?><?php echo esc_url($settings['matrik_video_genaral_video_area_upload']['url']); ?><?php elseif ($settings['matrik_video_genaral_select_type'] == 'url') : ?><?php echo esc_url($settings['matrik_video_genaral_video_area_link']['url']); ?><?php endif; ?>"></video>
                    </div>
                    <div class="btn-area">
                        <div class="circular-text2">
                            <a href="#" class="play-btn active">
                                <svg class="play-icon" width="24" height="27" viewBox="0 0 24 27" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M21.3787 9.99987L4.82154 0.433939C4.34825 0.153923 3.80926 0.00420458 3.25936 0C2.39492 0 1.56589 0.343396 0.954645 0.954644C0.343396 1.56589 0 2.39492 0 3.25936V23.7895C0.000109938 24.3631 0.153886 24.9263 0.445339 25.4203C0.736791 25.9144 1.15528 26.3214 1.65729 26.599C2.1593 26.8766 2.72651 27.0146 3.29994 26.9988C3.87336 26.9829 4.43207 26.8137 4.91797 26.5088L21.4944 16.0364C22.0098 15.7139 22.4329 15.2633 22.7224 14.7286C23.0119 14.1939 23.1579 13.5933 23.1463 12.9854C23.1346 12.3775 22.9657 11.7829 22.6559 11.2597C22.3461 10.7365 21.9061 10.3024 21.3787 9.99987Z" />
                                </svg>
                                <svg class="pause-icon" width="21" height="27" viewBox="0 0 21 27" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M7.125 3.375C7.125 1.51104 5.61396 0 3.75 0C1.88604 0 0.375 1.51104 0.375 3.375V23.625C0.375 25.489 1.88604 27 3.75 27C5.61396 27 7.125 25.489 7.125 23.625V3.375Z" />
                                    <path d="M20.625 3.375C20.625 1.51104 19.114 0 17.25 0C15.386 0 13.875 1.51104 13.875 3.375V23.625C13.875 25.489 15.386 27 17.25 27C19.114 27 20.625 25.489 20.625 23.625V3.375Z" />
                                </svg>
                            </a>
                            <?php if (!empty($settings['matrik_video_genaral_video_circular_text'])) : ?>
                                <div class="text">
                                    <span>
                                        <?php echo esc_html($settings['matrik_video_genaral_video_circular_text']); ?>
                                    </span>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                <div class="video-content-wrap wow animate fadeInUp" data-wow-delay="200ms" data-wow-duration="1500ms">
                    <div class="container">
                        <div class="row justify-content-end">
                            <div class="col-xl-6 col-lg-8 col-md-10">
                                <div class="video-content">
                                    <?php if ($settings['matrik_video_four_video_content_area_icon']) : ?>
                                        <div class="icon">
                                            <?php \Elementor\Icons_Manager::render_icon($settings['matrik_video_four_video_content_area_icon'], ['aria-hidden' => 'true']); ?>
                                        </div>
                                    <?php endif; ?>
                                    <?php if (!empty($settings['matrik_video_four_video_content_area_description'])) : ?>
                                        <p><?php echo esc_html($settings['matrik_video_four_video_content_area_description']); ?></p>
                                    <?php endif; ?>
                                    <svg class="quote" width="68" height="69" viewBox="0 0 68 69" xmlns="http://www.w3.org/2000/svg">
                                        <g>
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                d="M45.3642 64.2802L45.3627 64.2806C45.1299 64.3371 44.8064 64.3551 44.462 64.3248C44.1183 64.2946 43.7952 64.22 43.5622 64.1202L43.5575 64.1182C43.3412 64.028 43.1919 63.9464 43.0566 63.8362C42.92 63.7249 42.7745 63.5653 42.5935 63.2944C42.2192 62.7341 41.7529 61.7927 40.9298 60.0476C39.518 57.0597 39.3915 56.6799 39.3472 56.0529C39.2891 55.1531 39.5072 54.5321 39.9928 54.0287L39.9958 54.0255L39.9988 54.0223C39.999 54.0222 39.9994 54.0218 40 54.0211L40.0035 54.0177C40.0067 54.0146 40.0111 54.0105 40.017 54.0053C40.0238 53.9992 40.0319 53.9923 40.0414 53.9844C40.0486 53.9784 40.0566 53.9719 40.0655 53.9649C40.1072 53.9318 40.1618 53.8917 40.2299 53.8447C40.3659 53.7507 40.5426 53.6384 40.7502 53.5138C41.1645 53.2652 41.6846 52.9781 42.2137 52.7063C45.0219 51.2781 47.199 49.7293 48.8922 47.8666C50.5883 46.0007 51.7787 43.8418 52.6421 41.2206C53.4017 38.9084 53.9312 35.8181 53.9312 33.5971L53.9312 32.07L42.5495 32.07L41.9668 31.7743C41.6367 31.6126 41.2157 31.2817 41.0643 31.0896L41.0616 31.0862L41.0588 31.0828C41.0451 31.066 41.0319 31.0498 41.0192 31.0342C40.8293 30.8016 40.747 30.7007 40.675 30.5027C40.59 30.2691 40.5183 29.8824 40.4714 29.0711C40.381 27.506 40.3902 24.5782 40.409 18.6336L40.4109 18.047L40.4503 6.67263L40.6793 6.2396C40.6794 6.23941 40.6795 6.23923 40.6796 6.23904C40.8297 5.95629 41.085 5.64036 41.3844 5.36674C41.6869 5.09037 41.9933 4.89469 42.2261 4.81238C42.2274 4.81201 42.2646 4.8009 42.3705 4.78729C42.4724 4.77418 42.6161 4.76132 42.8162 4.74936C43.216 4.72545 43.8136 4.70663 44.6993 4.69234C46.4689 4.66378 49.3599 4.65366 54.0556 4.65366L65.4073 4.65366L65.8304 4.88404C65.8306 4.88415 65.8308 4.88425 65.831 4.88436C66.402 5.19744 66.9464 5.76481 67.214 6.29651L67.2149 6.29824C67.2604 6.38797 67.3276 6.54442 67.3651 7.97563C67.4014 9.35945 67.4147 11.8379 67.4347 16.4438C67.4612 22.3229 67.4212 27.6581 67.3291 29.5545L67.329 29.5565C67.0312 36.1897 66.2715 41.1785 64.7969 45.3098C63.3265 49.4295 61.1359 52.7221 57.9369 55.9482L57.9358 55.9494C55.9575 57.9567 54.6442 59.0257 52.2942 60.611L52.2937 60.6114C51.4017 61.2147 49.8848 62.0833 48.4628 62.8333C47.754 63.2071 47.0756 63.5479 46.518 63.8082C45.9423 64.077 45.5418 64.2377 45.3642 64.2802ZM66.0884 4.40684L65.5439 4.11035L54.0556 4.11035C44.6658 4.11035 42.4743 4.15078 42.0493 4.29903C41.3986 4.52813 40.5751 5.28281 40.2033 5.9836L39.9111 6.53614L39.8712 18.0451C39.8364 29.096 39.8219 30.2806 40.3672 31.0765C40.4463 31.192 40.5372 31.2993 40.6415 31.4273C40.854 31.6969 41.3454 32.0742 41.7306 32.2629L42.4212 32.6133L53.3915 32.6133L53.3915 33.5971C53.3915 35.7533 52.8736 38.7855 52.1298 41.0496C50.4431 46.1707 47.5079 49.4051 41.9697 52.2217C40.8939 52.7742 39.8447 53.3941 39.6056 53.6502C38.9947 54.2836 38.7423 55.0652 38.8087 56.0895C38.8619 56.8441 39.0478 57.3293 40.4423 60.2807C42.0759 63.7441 42.3814 64.2158 43.3509 64.6201C43.9486 64.8762 44.8783 64.957 45.4892 64.8088C46.4454 64.5797 50.7618 62.3021 52.5947 61.0623C54.972 59.4586 56.3134 58.367 58.3189 56.332C64.8134 49.7824 67.2704 42.8959 67.8681 29.5811C67.9611 27.6674 68.0009 22.3172 67.9743 16.4414C67.9345 7.23691 67.9212 6.4957 67.6954 6.05098C67.3767 5.41758 66.7525 4.7707 66.0884 4.40684Z" />
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                d="M26.4695 45.8203C23.4547 53.6772 16.6414 60.4154 7.70313 64.3775C6.0297 65.1188 4.44923 64.8627 3.50626 63.7037C3.29376 63.4342 2.43048 61.7631 1.59376 60.0111L1.58341 59.9893C0.0928524 56.8439 0.0664147 56.7881 0.0664146 55.8604C0.0796953 54.1354 0.610945 53.502 3.0547 52.316C7.7961 49.9981 10.5852 47.3701 12.418 43.4619C13.2813 41.6156 13.7195 40.2814 14.1313 38.2061C14.3969 36.8584 14.7422 33.8801 14.7422 32.8693C14.7422 32.6133 14.5961 32.6133 9.19063 32.6133L3.63907 32.6133L2.94844 32.2629C2.56329 32.0742 2.07188 31.6969 1.85938 31.4274C1.75503 31.2993 1.66412 31.192 1.585 31.0765C1.03973 30.2806 1.05427 29.096 1.08907 18.0451L1.08911 18.0335C1.12891 6.56307 1.12901 6.53595 1.40782 5.99707C1.80625 5.25586 2.3375 4.73028 3.05469 4.39336C3.65235 4.11035 3.74532 4.11035 15.207 4.11035L26.7617 4.11035L27.3063 4.40684C28.0102 4.78418 28.5813 5.36367 28.9 6.02402C29.1391 6.50918 29.1523 7.02129 29.1523 18.3281C29.1523 30.5918 29.0992 32.2494 28.5414 36.6563C28.1031 40.1736 27.3328 43.5832 26.4695 45.8203ZM26.6251 4.65366L15.207 4.65366C9.47157 4.65366 6.59186 4.6537 5.06922 4.68889C4.3034 4.70659 3.90729 4.73288 3.67149 4.7674C3.47062 4.79681 3.40452 4.82811 3.28808 4.88325L3.2844 4.885L3.2829 4.8857C2.68185 5.16806 2.233 5.60501 1.8844 6.25203C1.8828 6.25512 1.88123 6.25815 1.87968 6.26114C1.83106 6.35487 1.80587 6.40343 1.77922 6.57588C1.74532 6.79513 1.71824 7.17581 1.69828 7.93192C1.65866 9.43315 1.64869 12.3012 1.62875 18.0468C1.62875 18.0468 1.62875 18.0469 1.62875 18.0468L1.62689 18.6336C1.60808 24.5782 1.59881 27.506 1.68926 29.0711C1.73615 29.8824 1.80788 30.2691 1.89282 30.5027C1.96481 30.7007 2.04715 30.8016 2.23699 31.0342C2.24972 31.0498 2.26294 31.066 2.27667 31.0828L2.27941 31.0862L2.2821 31.0896C2.43353 31.2817 2.8545 31.6127 3.18458 31.7744L3.76737 32.07L9.23018 32.07C11.898 32.07 13.2933 32.07 14.0175 32.1025C14.3578 32.1178 14.6302 32.1413 14.8197 32.2108C14.9306 32.2515 15.0859 32.3331 15.1886 32.506C15.2822 32.6636 15.2819 32.8201 15.2819 32.8661L15.2819 32.8693C15.2819 33.9271 14.9305 36.9428 14.6606 38.3118L14.6605 38.3125C14.2403 40.4303 13.7885 41.8065 12.9063 43.6933L12.906 43.6939C11.0092 47.7386 8.11571 50.4458 3.29045 52.8048L3.28904 52.8054C2.06306 53.4004 1.41815 53.8132 1.06072 54.2375C0.738207 54.6203 0.612492 55.0597 0.606097 55.8625C0.606112 56.0968 0.608533 56.238 0.628415 56.38C0.647473 56.5162 0.685376 56.67 0.773103 56.9074C0.956555 57.4038 1.32353 58.1791 2.08053 59.7765C2.49667 60.6478 2.91892 61.498 3.26271 62.1623C3.43481 62.4949 3.5859 62.7782 3.70593 62.9933C3.76603 63.1009 3.81684 63.1887 3.8576 63.2558C3.87796 63.2892 3.89469 63.3156 3.90794 63.3356C3.91451 63.3455 3.9197 63.3531 3.92359 63.3586C3.92554 63.3613 3.92695 63.3632 3.92784 63.3645C4.67636 64.2797 5.9704 64.5514 7.48565 63.8803C16.3163 59.9659 23.0116 53.3241 25.9661 45.6245L25.9665 45.6236C26.8081 43.4427 27.5708 40.0808 28.0059 36.5886L28.0061 36.5876C28.5589 32.22 28.6127 30.5957 28.6127 18.3281C28.6127 12.6712 28.6093 9.72407 28.5763 8.12928C28.5429 6.52087 28.4743 6.38219 28.4194 6.27125C28.4184 6.26931 28.4175 6.26739 28.4165 6.26546L28.4146 6.26149C28.1504 5.7142 27.6657 5.21505 27.0526 4.88639L26.6251 4.65366Z" />
                                        </g>
                                    </svg>
                                    <?php if (!empty($settings['matrik_video_four_video_content_area_vector_image']['url'])) : ?>
                                        <img src="<?php echo esc_url($settings['matrik_video_four_video_content_area_vector_image']['url']); ?>" alt="<?php echo esc_attr__('vector-image', 'matrik-core'); ?>" class="vector">
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>

<?php

    }
}

Plugin::instance()->widgets_manager->register(new Matrik_Video_Widget());
