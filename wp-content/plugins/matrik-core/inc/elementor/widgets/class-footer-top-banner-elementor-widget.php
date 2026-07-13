<?php

namespace Elementor;

if (!defined('ABSPATH')) exit;  // Exit if accessed directly

use Elementor\core\Schemes;
use Egns_Core\Egns_Helper;

class Matrik_Footer_Top_Banner_Widget extends Widget_Base
{

    public function get_name()
    {
        return 'matrik_footer_top_banner';
    }

    public function get_title()
    {
        return esc_html__('EG Footer Top Banner', 'matrik-core');
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
            'matrik_footer_top_banner_genaral',
            [
                'label' => esc_html__('General', 'matrik-core')
            ]
        );

        $this->add_control(
            'matrik_footer_top_banner_genaral_style_selection',
            [
                'label'   => esc_html__('Select Style', 'matrik-core'),
                'type'    => Controls_Manager::SELECT,
                'options' => [
                    'style_one' => esc_html__('Style One', 'matrik-core'),
                    'style_two' => esc_html__('Style Two', 'matrik-core'),
                    'style_three' => esc_html__('Style Three', 'matrik-core'),
                ],
                'default' => 'style_one',
            ]
        );

        $this->add_control(
            'matrik_footer_top_banner_genaral_background_image',
            [
                'label'       => esc_html__('Background Image', 'matrik-core'),
                'type'        => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
                'label_block' => true,
                'condition' => [
                    'matrik_footer_top_banner_genaral_style_selection' => ['style_two'],
                ]
            ]
        );

        $this->add_control(
            'matrik_footer_top_banner_genaral_subtitle',
            [
                'label'       => esc_html__('Subtitle', 'matrik-core'),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default'     => esc_html__('Building Your Vision', 'matrik-core'),
                'placeholder' => esc_html__('write your subtitle here', 'matrik-core'),
                'label_block' => true,
                'condition' => [
                    'matrik_footer_top_banner_genaral_style_selection' => ['style_one', 'style_two'],
                ]
            ]
        );

        $this->add_control(
            'matrik_footer_top_banner_genaral_expert_gallery',
            [
                'label' => esc_html__('Add Expert Images', 'matrik-core'),
                'type' => \Elementor\Controls_Manager::GALLERY,
                'show_label' => false,
                'default' => [],
                'condition' => [
                    'matrik_footer_top_banner_genaral_style_selection' => ['style_two', 'style_three'],
                ]
            ]
        );

        $this->add_control(
            'matrik_footer_top_banner_genaral_title',
            [
                'label'       => esc_html__('Title', 'matrik-core'),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default'     => esc_html__("Let's Build Dream Something Amazing.", 'matrik-core'),
                'placeholder' => esc_html__('write your title here', 'matrik-core'),
                'label_block' => true,
                'condition' => [
                    'matrik_footer_top_banner_genaral_style_selection' => ['style_one', 'style_two', 'style_three'],
                ]
            ]
        );

        $this->add_control(
            'matrik_footer_top_banner_genaral_button_one_text',
            [
                'label'       => esc_html__('Button One Text', 'matrik-core'),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default'     => esc_html__('Start Journey', 'matrik-core'),
                'placeholder' => esc_html__('write your button text here', 'matrik-core'),
                'label_block' => true,
                'condition' => [
                    'matrik_footer_top_banner_genaral_style_selection' => ['style_one', 'style_two', 'style_three'],
                ]
            ]
        );

        $this->add_control(
            'matrik_footer_top_banner_genaral_button_one_text_url',
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
                'condition' => [
                    'matrik_footer_top_banner_genaral_style_selection' => ['style_one', 'style_two', 'style_three'],
                ]
            ]
        );

        $this->add_control(
            'matrik_footer_top_banner_genaral_button_two_text',
            [
                'label'       => esc_html__('Button Two Text', 'matrik-core'),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default'     => esc_html__('Let’s Discuss', 'matrik-core'),
                'placeholder' => esc_html__('write your button text here', 'matrik-core'),
                'label_block' => true,
                'condition' => [
                    'matrik_footer_top_banner_genaral_style_selection' => ['style_one', 'style_two', 'style_three'],
                ]
            ]
        );

        $this->add_control(
            'matrik_footer_top_banner_genaral_button_two_text_url',
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
                'condition' => [
                    'matrik_footer_top_banner_genaral_style_selection' => ['style_one', 'style_two', 'style_three'],
                ]
            ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'matrik_footer_top_banner_three_genaral_content_title',
            [
                'label'       => esc_html__('Content Title', 'matrik-core'),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default'     => esc_html__('Software Platform', 'matrik-core'),
                'placeholder' => esc_html__('write your text here', 'matrik-core'),
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'matrik_footer_top_banner_three_genaral_content_description',
            [
                'label'       => esc_html__('Content Description', 'matrik-core'),
                'type'        => \Elementor\Controls_Manager::TEXTAREA,
                'default'     => esc_html__('Sed nisl eros, condimentum nec risus sitame finibus congu. Fusen fringilla est libero, sed tempus urna.', 'matrik-core'),
                'placeholder' => esc_html__('write your text here', 'matrik-core'),
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'matrik_footer_top_banner_three_genaral_content_url',
            [
                'label'   => esc_html__('Content URL/Link', 'matrik-core'),
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
            'matrik_footer_top_banner_three_genaral_content_list',
            [
                'label' => esc_html__('Content List', 'matrik-core'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'matrik_footer_top_banner_three_genaral_content_title' => esc_html('Software Platform'),

                    ],
                    [
                        'matrik_footer_top_banner_three_genaral_content_title' => esc_html('Expert Team'),


                    ],

                ],
                'title_field' => '{{{ matrik_footer_top_banner_three_genaral_content_title }}}',
                'condition' => [
                    'matrik_footer_top_banner_genaral_style_selection' => ['style_three'],
                ]
            ]
        );

        $this->end_controls_section();

        //style start

        $this->start_controls_section(
            'matrik_footer_top_style_genaral',
            [
                'label'     => esc_html__('Styles', 'matrik-core'),
                'tab'       => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'matrik_footer_top_banner_genaral_style_selection' => ['style_one'],
                ]
            ]
        );

        $this->add_control(
            'matrik_footer_top_style_genaral_subtitle',
            [
                'label'     => esc_html__('Subtitle', 'matrik-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'matrik-core'),
                'name'     => 'matrik_footer_top_style_genaral_subtitle_typ',
                'selector' => '{{WRAPPER}} .footer-top-banner-section .footer-top-banner-wrap .section-title.white span',

            ]
        );

        $this->add_control(
            'matrik_footer_top_style_genaral_subtitle_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .footer-top-banner-section .footer-top-banner-wrap .section-title.white span' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_footer_top_style_genaral_subtitle_icon_color',
            [
                'label'     => esc_html__('Icon Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .footer-top-banner-section .footer-top-banner-wrap .section-title.white span::after' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_footer_top_style_genaral_title',
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
                'name'     => 'matrik_footer_top_style_genaral_title_typ',
                'selector' => '{{WRAPPER}} .section-title.white h2',

            ]
        );

        $this->add_control(
            'matrik_footer_top_style_genaral_title_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .section-title.white h2' => 'color: {{VALUE}};',
                ],
            ]
        );


        $this->add_control(
            'matrik_footer_top_style_genaral_button_one',
            [
                'label'     => esc_html__('Button One', 'matrik-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        // Tabs
        $this->start_controls_tabs(
            'matrik_footer_top_style_genaral_button_one_tabs'
        );

        $this->start_controls_tab(
            'matrik_footer_top_style_genaral_button_one_tabs_normal_tab',
            [
                'label' => esc_html__(
                    'Normal',
                    'matrik-core'
                ),
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'matrik-core'),
                'name'     => 'matrik_footer_top_style_genaral_button_one_tabs_normal_tab_typ',
                'selector' => '{{WRAPPER}} .footer-top-banner-section .footer-top-banner-wrap .btn-grp .primary-btn1.white-bg',

            ]
        );

        $this->add_control(
            'matrik_footer_top_style_genaral_button_one_tabs_normal_tab_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .footer-top-banner-section .footer-top-banner-wrap .btn-grp .primary-btn1.white-bg' => 'color: {{VALUE}};',

                ],
            ]
        );

        $this->add_control(
            'matrik_footer_top_style_genaral_button_one_tabs_normal_tab_icon_color',
            [
                'label'     => esc_html__('Icon Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .primary-btn1.white-bg .arrow' => 'fill: {{VALUE}};',

                ],
            ]
        );

        $this->add_control(
            'matrik_footer_top_style_genaral_button_one_tabs_normal_tab_background_color',
            [
                'label'     => esc_html__('Background Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}}  .footer-top-banner-section .footer-top-banner-wrap .btn-grp .primary-btn1.white-bg' => 'background-color: {{VALUE}};',

                ],
            ]
        );

        $this->add_responsive_control(
            'matrik_footer_top_style_genaral_button_one_tabs_normal_tab_margin',
            [
                'label' => esc_html__(
                    'Margin',
                    'matrik-core'
                ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .footer-top-banner-section .footer-top-banner-wrap .btn-grp .primary-btn1.white-bg' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'matrik_footer_top_style_genaral_button_one_tabs_normal_tab_padding',
            [
                'label'      => esc_html__(
                    'Padding',
                    'matrik-core'
                ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .footer-top-banner-section .footer-top-banner-wrap .btn-grp .primary-btn1.white-bg' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        $this->end_controls_tab();

        // Hover start
        $this->start_controls_tab(
            'matrik_footer_top_style_genaral_button_one_tabs_hover_tab',
            [
                'label' => esc_html__('Hover', 'matrik-core'),
            ]
        );

        $this->add_control(
            'matrik_footer_top_style_genaral_button_one_tabs_hover_tab_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .footer-top-banner-section .footer-top-banner-wrap .btn-grp .primary-btn1.white-bg:hover' => 'color: {{VALUE}};',

                ],
            ]
        );

        $this->add_control(
            'matrik_footer_top_style_genaral_button_one_tabs_hover_tab_icon_color',
            [
                'label'     => esc_html__('Icon Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}}  .footer-top-banner-section .footer-top-banner-wrap .btn-grp .primary-btn1.white-bg:hover .arrow' => 'fill: {{VALUE}};',

                ],
            ]
        );

        $this->add_control(
            'matrik_footer_top_style_genaral_button_one_tabs_hover_tab_background_color',
            [
                'label'     => esc_html__('Background Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .footer-top-banner-section .footer-top-banner-wrap .btn-grp .primary-btn1.white-bg::after' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_tab();
        $this->end_controls_tabs();

        $this->add_control(
            'matrik_footer_top_style_genaral_button_two',
            [
                'label'     => esc_html__('Button Two', 'matrik-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'matrik-core'),
                'name'     => 'matrik_footer_top_style_genaral_button_two_typ',
                'selector' => '{{WRAPPER}} .footer-top-banner-section .footer-top-banner-wrap .btn-grp .discuss-btn',

            ]
        );

        $this->add_control(
            'matrik_footer_top_style_genaral_button_two_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .footer-top-banner-section .footer-top-banner-wrap .btn-grp .discuss-btn' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_footer_top_style_genaral_button_two_icon_color',
            [
                'label'     => esc_html__('Icon Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .footer-top-banner-section .footer-top-banner-wrap .btn-grp .discuss-btn svg' => 'fill: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_footer_top_style_genaral_vector_arrow',
            [
                'label'     => esc_html__('Vector Arrow', 'matrik-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_control(
            'matrik_footer_top_style_genaral_vector_arrow_color',
            [
                'label'     => esc_html__('Vector Icon Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .footer-top-banner-section .arrow-vector' => 'fill: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section();

        //style start

        $this->start_controls_section(
            'matrik_footer_top_style_three_genaral',
            [
                'label'     => esc_html__('Styles', 'matrik-core'),
                'tab'       => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'matrik_footer_top_banner_genaral_style_selection' => ['style_three'],
                ]
            ]
        );

        $this->add_control(
            'matrik_footer_top_style_three_genaral_title',
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
                'name'     => 'matrik_footer_top_style_three_genaral_title_typ',
                'selector' => '{{WRAPPER}} .footer-top-banner-section.three .footer-top-banner-wrap .title-and-btn-area .section-title h2',
            ]
        );

        $this->add_control(
            'matrik_footer_top_style_three_genaral_title_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .footer-top-banner-section.three .footer-top-banner-wrap .title-and-btn-area .section-title h2' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_footer_top_style_three_genaral_button_one',
            [
                'label'     => esc_html__('Button One', 'matrik-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        // Tabs
        $this->start_controls_tabs(
            'matrik_footer_top_style_three_genaral_button_one_tabs'
        );

        $this->start_controls_tab(
            'matrik_footer_top_style_three_genaral_button_one_tabs_normal_tab',
            [
                'label' => esc_html__(
                    'Normal',
                    'matrik-core'
                ),
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'matrik-core'),
                'name'     => 'matrik_footer_top_style_three_genaral_button_one_tabs_normal_tab_typ',
                'selector' => '{{WRAPPER}} .footer-top-banner-section .footer-top-banner-wrap .btn-grp .primary-btn1.white-bg',

            ]
        );

        $this->add_control(
            'matrik_footer_top_style_three_genaral_button_one_tabs_normal_tab_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .footer-top-banner-section .footer-top-banner-wrap .btn-grp .primary-btn1.white-bg' => 'color: {{VALUE}};',

                ],
            ]
        );

        $this->add_control(
            'matrik_footer_top_style_three_genaral_button_one_tabs_normal_tab_icon_color',
            [
                'label'     => esc_html__('Icon Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .footer-top-banner-section.three .footer-top-banner-wrap .title-and-btn-area .primary-btn1.white-bg svg' => 'fill: {{VALUE}};',

                ],
            ]
        );

        $this->add_control(
            'matrik_footer_top_style_three_genaral_button_one_tabs_normal_tab_background_color',
            [
                'label'     => esc_html__('Background Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}}  .footer-top-banner-section .footer-top-banner-wrap .btn-grp .primary-btn1.white-bg' => 'background-color: {{VALUE}};',

                ],
            ]
        );

        $this->add_responsive_control(
            'matrik_footer_top_style_three_genaral_button_one_tabs_normal_tab_margin',
            [
                'label' => esc_html__(
                    'Margin',
                    'matrik-core'
                ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .footer-top-banner-section .footer-top-banner-wrap .btn-grp .primary-btn1.white-bg' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'matrik_footer_top_style_three_genaral_button_one_tabs_normal_tab_padding',
            [
                'label'      => esc_html__(
                    'Padding',
                    'matrik-core'
                ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .footer-top-banner-section .footer-top-banner-wrap .btn-grp .primary-btn1.white-bg' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        $this->end_controls_tab();

        // Hover start
        $this->start_controls_tab(
            'matrik_footer_top_style_three_genaral_button_one_tabs_hover_tab',
            [
                'label' => esc_html__('Hover', 'matrik-core'),
            ]
        );

        $this->add_control(
            'matrik_footer_top_style_three_genaral_button_one_tabs_hover_tab_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .footer-top-banner-section .footer-top-banner-wrap .btn-grp .primary-btn1.white-bg:hover' => 'color: {{VALUE}};',

                ],
            ]
        );

        $this->add_control(
            'matrik_footer_top_style_three_genaral_button_one_tabs_hover_tab_icon_color',
            [
                'label'     => esc_html__('Icon Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}}  .footer-top-banner-section.three .footer-top-banner-wrap .title-and-btn-area .primary-btn1.white-bg:hover svg' => 'fill: {{VALUE}};',

                ],
            ]
        );

        $this->add_control(
            'matrik_footer_top_style_three_genaral_button_one_tabs_hover_tab_background_color',
            [
                'label'     => esc_html__('Background Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .footer-top-banner-section .footer-top-banner-wrap .btn-grp .primary-btn1.white-bg::after' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_tab();
        $this->end_controls_tabs();

        $this->add_control(
            'matrik_footer_top_style_three_genaral_button_two',
            [
                'label'     => esc_html__('Button Two', 'matrik-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'matrik-core'),
                'name'     => 'matrik_footer_top_style_three_genaral_button_two_typ',
                'selector' => '{{WRAPPER}} .footer-top-banner-section .footer-top-banner-wrap .btn-grp .discuss-btn',

            ]
        );

        $this->add_control(
            'matrik_footer_top_style_genaral_three_button_two_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .footer-top-banner-section .footer-top-banner-wrap .btn-grp .discuss-btn' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_footer_top_style_genaral_three_button_two_icon_color',
            [
                'label'     => esc_html__('Icon Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .footer-top-banner-section .footer-top-banner-wrap .btn-grp .discuss-btn svg' => 'fill: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_footer_top_style_three_genaral_content_title',
            [
                'label'     => esc_html__('Content Title', 'matrik-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'matrik-core'),
                'name'     => 'matrik_footer_top_style_three_genaral_content_title_typ',
                'selector' => '{{WRAPPER}} .footer-top-banner-section.three .footer-top-banner-wrap .footer-banner-right-content ul .single-item .content h5',

            ]
        );

        $this->add_control(
            'matrik_footer_top_style_three_genaral_content_title_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .footer-top-banner-section.three .footer-top-banner-wrap .footer-banner-right-content ul .single-item .content h5' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_footer_top_style_three_genaral_content_description',
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
                'name'     => 'matrik_footer_top_style_three_genaral_content_description_typ',
                'selector' => '{{WRAPPER}} .footer-top-banner-section.three .footer-top-banner-wrap .footer-banner-right-content ul .single-item .content p',

            ]
        );

        $this->add_control(
            'matrik_footer_top_style_three_genaral_content_description_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .footer-top-banner-section.three .footer-top-banner-wrap .footer-banner-right-content ul .single-item .content p' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_footer_top_style_three_genaral_content_button',
            [
                'label'     => esc_html__('Content Button', 'matrik-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'matrik-core'),
                'name'     => 'matrik_footer_top_style_three_genaral_content_button_typ',
                'selector' => '{{WRAPPER}} .footer-top-banner-section.three .footer-top-banner-wrap .footer-banner-right-content ul .single-item .details-btn svg',

            ]
        );

        $this->add_control(
            'matrik_footer_top_style_three_genaral_content_button_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .footer-top-banner-section.three .footer-top-banner-wrap .footer-banner-right-content ul .single-item .details-btn svg' => 'fill: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_footer_top_style_three_genaral_content_button_border_color',
            [
                'label'     => esc_html__('Border Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .footer-top-banner-section.three .footer-top-banner-wrap .footer-banner-right-content ul .single-item .details-btn' => 'border: 1px solid {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section();

        //style start

        $this->start_controls_section(
            'matrik_footer_top_style_two_genaral',
            [
                'label'     => esc_html__('Styles', 'matrik-core'),
                'tab'       => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'matrik_footer_top_banner_genaral_style_selection' => ['style_two'],
                ]
            ]
        );

        $this->add_control(
            'matrik_footer_top_style_two_genaral_subtitle',
            [
                'label'     => esc_html__('Subtitle', 'matrik-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'matrik-core'),
                'name'     => 'matrik_footer_top_style_two_genaral_subtitle_typ',
                'selector' => '{{WRAPPER}} .footer-top-banner-section.two .footer-top-banner-wrap .section-title span',
            ]
        );

        $this->add_control(
            'matrik_footer_top_style_two_genaral_subtitle_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .footer-top-banner-section.two .footer-top-banner-wrap .section-title span' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_footer_top_style_two_genaral_subtitle_icon_color',
            [
                'label'     => esc_html__('Icon Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .footer-top-banner-section.two .footer-top-banner-wrap .section-title span::after' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_footer_top_style_two_genaral_title',
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
                'name'     => 'matrik_footer_top_style_two_genaral_title_typ',
                'selector' => '{{WRAPPER}} .section-title h2',
            ]
        );

        $this->add_control(
            'matrik_footer_top_style_two_genaral_title_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .section-title h2' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_footer_top_style_two_genaral_button',
            [
                'label'     => esc_html__('Button', 'matrik-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'matrik-core'),
                'name'     => 'matrik_footer_top_style_two_genaral_button_typ',
                'selector' => '{{WRAPPER}} .primary-btn3.black-bg',
            ]
        );

        $this->add_control(
            'matrik_footer_top_style_two_genaral_button_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .primary-btn3.black-bg' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_footer_top_style_two_genaral_button_icon_color',
            [
                'label'     => esc_html__('Icon Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .primary-btn3.black-bg .arrow' => 'fill: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_footer_top_style_two_genaral_button_hover_icon_color',
            [
                'label'     => esc_html__('Hover Icon Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .primary-btn3.black-bg:hover .arrow' => 'fill: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_footer_top_style_two_genaral_button_bg_color',
            [
                'label'     => esc_html__('Background Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .primary-btn3.black-bg' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_footer_top_style_two_genaral_button_hover_bg_color',
            [
                'label'     => esc_html__('Hover Background Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .primary-btn3.black-bg::after' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_footer_top_style_two_genaral_button_two',
            [
                'label'     => esc_html__('Button Two', 'matrik-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'matrik-core'),
                'name'     => 'matrik_footer_top_style_two_genaral_button_two_typ',
                'selector' => '{{WRAPPER}} .footer-top-banner-section.two .footer-top-banner-wrap .btn-grp .discuss-btn',
            ]
        );

        $this->add_control(
            'matrik_footer_top_style_two_genaral_button_two_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .footer-top-banner-section.two .footer-top-banner-wrap .btn-grp .discuss-btn' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_footer_top_style_two_genaral_button_two_hover_color',
            [
                'label'     => esc_html__('Hover Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .footer-top-banner-section.two .footer-top-banner-wrap .btn-grp .discuss-btn' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_footer_top_style_two_genaral_button_two_icon_color',
            [
                'label'     => esc_html__('Icon Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .footer-top-banner-section.two .footer-top-banner-wrap .btn-grp .discuss-btn svg' => 'fill: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section();
    }
    protected function render()
    {

        $settings = $this->get_settings_for_display();

?>

        <?php if ($settings['matrik_footer_top_banner_genaral_style_selection'] == 'style_one') : ?>
            <div class="footer-top-banner-section">
                <div class="container">
                    <div class="footer-top-banner-wrap">
                        <div class="section-title white wow animate fadeInLeft" data-wow-delay="200ms" data-wow-duration="1500ms">
                            <?php if (!empty($settings['matrik_footer_top_banner_genaral_subtitle'])) : ?>
                                <span><?php echo esc_html($settings['matrik_footer_top_banner_genaral_subtitle']); ?></span>
                            <?php endif; ?>
                            <?php if (!empty($settings['matrik_footer_top_banner_genaral_title'])) : ?>
                                <h2><?php echo esc_html($settings['matrik_footer_top_banner_genaral_title']); ?></h2>
                            <?php endif; ?>
                        </div>
                        <div class="btn-grp wow animate fadeInRight" data-wow-delay="200ms" data-wow-duration="1500ms">
                            <?php if (!empty($settings['matrik_footer_top_banner_genaral_button_one_text'])) : ?>
                                <a class="primary-btn1 white-bg" href="<?php echo esc_url($settings['matrik_footer_top_banner_genaral_button_one_text_url']['url']); ?>">
                                    <span><?php echo esc_html($settings['matrik_footer_top_banner_genaral_button_one_text']); ?>
                                    </span>
                                    <span><?php echo esc_html($settings['matrik_footer_top_banner_genaral_button_one_text']); ?>
                                    </span>
                                    <svg class="arrow" width="23" height="23" viewBox="0 0 23 23" xmlns="http://www.w3.org/2000/svg">
                                        <g>
                                            <path d="M0.113861 0H22.9999V4.28425L4.32671 22.9997L0 18.7154L12.7524 6.08815L0.113861 6.20089V0Z" />
                                            <path d="M23 22.9996V8.56848L16.8516 14.6566V22.9996H23Z" />
                                        </g>
                                    </svg>
                                </a>
                            <?php endif; ?>
                            <?php if (!empty($settings['matrik_footer_top_banner_genaral_button_two_text'])) : ?>
                                <a class="discuss-btn" href="<?php echo esc_url($settings['matrik_footer_top_banner_genaral_button_two_text_url']['url']); ?>">
                                    <?php echo esc_html($settings['matrik_footer_top_banner_genaral_button_two_text']); ?>
                                    <svg width="9" height="9" viewBox="0 0 9 9" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M0.0445549 0H9.00008V1.67647L1.69308 9L0 7.32353L4.99014 2.38235L0.0445549 2.42647V0Z" />
                                        <path d="M9.0002 8.99999V3.35294L6.59424 5.73529V8.99999H9.0002Z" />
                                    </svg>
                                </a>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>

                <svg class="arrow-vector" width="147" height="147" viewBox="0 0 147 147" xmlns="http://www.w3.org/2000/svg">
                    <g>
                        <path d="M0.727728 0H147.001V27.3823L27.6537 147L0 119.617L81.5055 38.9117L0.727728 39.6323V0Z" />
                        <path d="M147.002 146.999V54.7637L107.705 93.6754V146.999H147.002Z" />
                    </g>
                </svg>

            </div>
        <?php endif; ?>

        <?php if ($settings['matrik_footer_top_banner_genaral_style_selection'] == 'style_two') : ?>
            <div class="footer-top-banner-section two" style="background-image: url(<?php echo esc_url($settings['matrik_footer_top_banner_genaral_background_image']['url']); ?>);">
                <div class="container">
                    <div class="footer-top-banner-wrap">
                        <div class="row justify-content-center">
                            <div class="col-xl-8 col-lg-10">
                                <div class="section-title wow animate fadeInDown" data-wow-delay="200ms" data-wow-duration="1500ms">
                                    <?php if (!empty($settings['matrik_footer_top_banner_genaral_subtitle'])) : ?>
                                        <span><?php echo esc_html($settings['matrik_footer_top_banner_genaral_subtitle']); ?></span>
                                    <?php endif; ?>
                                    <?php if (!empty($settings['matrik_footer_top_banner_genaral_title'])) : ?>
                                        <h2><?php echo esc_html($settings['matrik_footer_top_banner_genaral_title']); ?></h2>
                                    <?php endif; ?>
                                </div>
                                <div class="btn-grp wow animate fadeInUp" data-wow-delay="200ms" data-wow-duration="1500ms">
                                    <?php if (!empty($settings['matrik_footer_top_banner_genaral_button_one_text'])) : ?>
                                        <a class="primary-btn3 black-bg" href="<?php echo esc_url($settings['matrik_footer_top_banner_genaral_button_one_text_url']['url']); ?>">
                                            <span><?php echo esc_html($settings['matrik_footer_top_banner_genaral_button_one_text']); ?>
                                            </span>
                                            <span><?php echo esc_html($settings['matrik_footer_top_banner_genaral_button_one_text']); ?>
                                            </span>
                                            <svg class="arrow" width="23" height="23" viewBox="0 0 23 23" xmlns="http://www.w3.org/2000/svg">
                                                <g>
                                                    <path d="M0.113861 0H22.9999V4.28425L4.32671 22.9997L0 18.7154L12.7524 6.08815L0.113861 6.20089V0Z" />
                                                    <path d="M23 22.9996V8.56848L16.8516 14.6566V22.9996H23Z" />
                                                </g>
                                            </svg>
                                        </a>
                                    <?php endif; ?>
                                    <?php if (!empty($settings['matrik_footer_top_banner_genaral_button_two_text'])) : ?>
                                        <a class="discuss-btn" href="<?php echo esc_url($settings['matrik_footer_top_banner_genaral_button_two_text_url']['url']); ?>">
                                            <?php echo esc_html($settings['matrik_footer_top_banner_genaral_button_two_text']); ?>
                                            <svg width="9" height="9" viewBox="0 0 9 9" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M0.0445549 0H9.00008V1.67647L1.69308 9L0 7.32353L4.99014 2.38235L0.0445549 2.42647V0Z" />
                                                <path d="M9.0002 8.99999V3.35294L6.59424 5.73529V8.99999H9.0002Z" />
                                            </svg>
                                        </a>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>

        <?php if ($settings['matrik_footer_top_banner_genaral_style_selection'] == 'style_three') : ?>
            <div class="footer-top-banner-section three">
                <div class="container">
                    <div class="footer-top-banner-wrap">
                        <div class="title-and-btn-area wow animate fadeInLeft" data-wow-delay="200ms" data-wow-duration="1500ms">
                            <div class="section-title white">
                                <h2>
                                    <?php foreach ($settings['matrik_footer_top_banner_genaral_expert_gallery'] as $image) : ?>
                                        <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr__('expert-images', 'matrik-core'); ?>">
                                    <?php endforeach; ?>
                                    <?php if ($settings['matrik_footer_top_banner_genaral_title']) : ?>
                                        <?php echo esc_html($settings['matrik_footer_top_banner_genaral_title']); ?>
                                    <?php endif; ?>
                                </h2>
                            </div>
                            <div class="btn-grp">
                                <?php if (!empty($settings['matrik_footer_top_banner_genaral_button_one_text'])) : ?>
                                    <a class="primary-btn1 white-bg" href="<?php echo esc_url($settings['matrik_footer_top_banner_genaral_button_one_text_url']['url']); ?>">
                                        <span><?php echo esc_html($settings['matrik_footer_top_banner_genaral_button_one_text']); ?>
                                        </span>
                                        <span><?php echo esc_html($settings['matrik_footer_top_banner_genaral_button_one_text']); ?>
                                        </span>
                                        <svg class="arrow" width="23" height="23" viewBox="0 0 23 23" xmlns="http://www.w3.org/2000/svg">
                                            <g>
                                                <path d="M0.113861 0H22.9999V4.28425L4.32671 22.9997L0 18.7154L12.7524 6.08815L0.113861 6.20089V0Z" />
                                                <path d="M23 22.9996V8.56848L16.8516 14.6566V22.9996H23Z" />
                                            </g>
                                        </svg>
                                    </a>
                                <?php endif; ?>
                                <?php if (!empty($settings['matrik_footer_top_banner_genaral_button_two_text'])) : ?>
                                    <a class="discuss-btn" href="<?php echo esc_url($settings['matrik_footer_top_banner_genaral_button_two_text_url']['url']); ?>">
                                        <?php echo esc_html($settings['matrik_footer_top_banner_genaral_button_two_text']); ?>
                                        <svg width="9" height="9" viewBox="0 0 9 9" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M0.0445549 0H9.00008V1.67647L1.69308 9L0 7.32353L4.99014 2.38235L0.0445549 2.42647V0Z" />
                                            <path d="M9.0002 8.99999V3.35294L6.59424 5.73529V8.99999H9.0002Z" />
                                        </svg>
                                    </a>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="footer-banner-right-content">
                            <ul>
                                <?php foreach ($settings['matrik_footer_top_banner_three_genaral_content_list'] as $data) : ?>
                                    <li class="single-item wow animate fadeInDown" data-wow-delay="200ms" data-wow-duration="1500ms">
                                        <div class="content">
                                            <?php if (!empty($data['matrik_footer_top_banner_three_genaral_content_title'])) : ?>
                                                <h5><?php echo esc_html($data['matrik_footer_top_banner_three_genaral_content_title']); ?></h5>
                                            <?php endif; ?>
                                            <?php if (!empty($data['matrik_footer_top_banner_three_genaral_content_description'])) : ?>
                                                <p><?php echo esc_html($data['matrik_footer_top_banner_three_genaral_content_description']); ?></p>
                                            <?php endif; ?>
                                        </div>
                                        <?php if (!empty($data['matrik_footer_top_banner_three_genaral_content_url']['url'])) : ?>
                                            <a href="<?php echo esc_url($data['matrik_footer_top_banner_three_genaral_content_url']['url']); ?>" class="details-btn">
                                                <svg width="15" height="16" viewBox="0 0 15 16" xmlns="http://www.w3.org/2000/svg">
                                                    <g>
                                                        <path
                                                            d="M0.0742581 0.0507812H15.0001V2.8449L2.82181 15.0508L0 12.2567L8.31691 4.02137L0.0742581 4.0949V0.0507812Z" />
                                                        <path d="M14.9992 15.0504V5.63867L10.9893 9.60926V15.0504H14.9992Z" />
                                                    </g>
                                                </svg>
                                            </a>
                                        <?php endif; ?>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>

<?php

    }
}

Plugin::instance()->widgets_manager->register(new Matrik_Footer_Top_Banner_Widget());
