<?php

namespace Elementor;

if (!defined('ABSPATH')) exit;  // Exit if accessed directly

use Elementor\core\Schemes;
use Egns_Core\Egns_Helper;

class Matrik_Process_Widget extends Widget_Base
{

    public function get_name()
    {
        return 'matrik_process';
    }

    public function get_title()
    {
        return esc_html__('EG Process', 'matrik-core');
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
            'matrik_process_genaral',
            [
                'label' => esc_html__('General', 'matrik-core')
            ]
        );

        $this->add_control(
            'matrik_process_genaral_style_selection',
            [
                'label'   => esc_html__('Select Style', 'matrik-core'),
                'type'    => Controls_Manager::SELECT,
                'options' => [
                    'style_one' => esc_html__('Style One', 'matrik-core'),
                    'style_two' => esc_html__('Style Two', 'matrik-core'),
                    'style_three' => esc_html__('Style Three', 'matrik-core'),
                    'style_four' => esc_html__('Style Four', 'matrik-core'),
                    'style_five' => esc_html__('Style Five', 'matrik-core'),
                ],
                'default' => 'style_one',
            ]
        );

        $this->add_control(
            'matrik_process_genaral_subtitle',
            [
                'label'       => esc_html__('Header Subtitle', 'matrik-core'),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default'     => esc_html__('Process our Work', 'matrik-core'),
                'placeholder' => esc_html__('write your subtitle here', 'matrik-core'),
                'label_block' => true,
                'condition' => [
                    'matrik_process_genaral_style_selection' => ['style_one', 'style_two', 'style_five'],
                ]
            ]
        );

        $this->add_control(
            'matrik_process_genaral_title',
            [
                'label'       => esc_html__('Header Title', 'matrik-core'),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default'     => esc_html__('The Experts Behind The Process', 'matrik-core'),
                'placeholder' => esc_html__('write your title here', 'matrik-core'),
                'label_block' => true,
                'condition' => [
                    'matrik_process_genaral_style_selection' => ['style_one', 'style_two', 'style_three', 'style_four', 'style_five'],
                ]
            ]
        );

        $this->add_control(
            'matrik_process_genaral_three_button_text',
            [
                'label'       => esc_html__('Button Text', 'matrik-core'),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default'     => esc_html__('Start A Project', 'matrik-core'),
                'placeholder' => esc_html__('write your button text here', 'matrik-core'),
                'label_block' => true,
                'condition' => [
                    'matrik_process_genaral_style_selection' => ['style_three', 'style_five'],
                ]
            ]
        );

        $this->add_control(
            'matrik_process_genaral_three_button_text_url',
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
                    'matrik_process_genaral_style_selection' => ['style_three', 'style_five'],
                ]
            ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'matrik_process_genaral_step_count',
            [
                'label'       => esc_html__('Step Count', 'matrik-core'),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default'     => esc_html__('STEP : 01', 'matrik-core'),
                'placeholder' => esc_html__('write your text here', 'matrik-core'),
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'matrik_process_genaral_content_title',
            [
                'label'       => esc_html__('Title', 'matrik-core'),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default' => wp_kses('Cutting-Edge <br> Machinery', wp_kses_allowed_html('post')),
                'placeholder' => esc_html__('write your text here', 'matrik-core'),
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'matrik_process_genaral_description',
            [
                'label'       => esc_html__('Description', 'matrik-core'),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default'     => esc_html__('Conduct a thoroug need effortless assessment the understand your current marketing.', 'matrik-core'),
                'placeholder' => esc_html__('write your text here', 'matrik-core'),
                'label_block' => true,
            ]
        );


        $this->add_control(
            'matrik_process_genaral_content_list',
            [
                'label' => esc_html__('Content List', 'matrik-core'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'matrik_process_genaral_content_title' => wp_kses('Cutting-Edge <br> Machinery', wp_kses_allowed_html('post')),
                        'matrik_process_genaral_step_count' => esc_html('STEP : 01'),
                    ],
                    [
                        'matrik_process_genaral_content_title' => wp_kses('Material Sourcing Production', wp_kses_allowed_html('post')),
                        'matrik_process_genaral_step_count' => esc_html('STEP : 02'),
                    ],
                    [
                        'matrik_process_genaral_content_title' => wp_kses('Manufacturing & Assembly', wp_kses_allowed_html('post')),
                        'matrik_process_genaral_step_count' => esc_html('STEP : 03'),
                    ],

                ],
                'title_field' => '{{{ matrik_process_genaral_content_title }}}',
                'condition' => [
                    'matrik_process_genaral_style_selection' => ['style_one'],
                ]
            ]
        );

        //style two content list

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'matrik_process_two_genaral_step_count',
            [
                'label'       => esc_html__('Step Count', 'matrik-core'),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default'     => esc_html__('STEP : 01', 'matrik-core'),
                'placeholder' => esc_html__('write your text here', 'matrik-core'),
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'matrik_process_two_genaral_content_title',
            [
                'label'       => esc_html__('Title', 'matrik-core'),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default' => wp_kses('Cutting-Edge <br> Machinery', wp_kses_allowed_html('post')),
                'placeholder' => esc_html__('write your text here', 'matrik-core'),
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'matrik_process_two_genaral_description',
            [
                'label'       => esc_html__('Description', 'matrik-core'),
                'type'        => \Elementor\Controls_Manager::TEXTAREA,
                'default'     => esc_html__('Conduct a thoroug need effortless assessment the understand your current marketing.', 'matrik-core'),
                'placeholder' => esc_html__('write your text here', 'matrik-core'),
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'matrik_process_two_genaral_icon_image',
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
            ]
        );

        $this->add_control(
            'matrik_process_two_genaral_content_list',
            [
                'label' => esc_html__('Content List', 'matrik-core'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'matrik_process_two_genaral_content_title' => wp_kses('Industry Concept & Planning', wp_kses_allowed_html('post')),
                        'matrik_process_two_genaral_step_count' => esc_html('STEP : 01'),
                    ],
                    [
                        'matrik_process_two_genaral_content_title' => wp_kses('Research & Development', wp_kses_allowed_html('post')),
                        'matrik_process_two_genaral_step_count' => esc_html('STEP : 02'),
                    ],
                    [
                        'matrik_process_two_genaral_content_title' => wp_kses('Sourcing & Procurement', wp_kses_allowed_html('post')),
                        'matrik_process_two_genaral_step_count' => esc_html('STEP : 03'),
                    ],
                    [
                        'matrik_process_two_genaral_content_title' => wp_kses('Manufacturing & Assembly', wp_kses_allowed_html('post')),
                        'matrik_process_two_genaral_step_count' => esc_html('STEP : 04'),
                    ],
                    [
                        'matrik_process_two_genaral_content_title' => wp_kses('Quality Control & Testing', wp_kses_allowed_html('post')),
                        'matrik_process_two_genaral_step_count' => esc_html('STEP : 05'),
                    ],

                ],
                'title_field' => '{{{ matrik_process_two_genaral_content_title }}}',
                'condition' => [
                    'matrik_process_genaral_style_selection' => ['style_two', 'style_five'],
                ]
            ]
        );


        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'matrik_process_genaral_three_process_image',
            [
                'label' => esc_html__('Process Image', 'matrik-core'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
                'media_types' => ['image'],
            ]
        );

        $repeater->add_control(
            'matrik_process_genaral_three_step_count',
            [
                'label'       => esc_html__('Step Count', 'matrik-core'),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default'     => esc_html__('STEP : 01', 'matrik-core'),
                'placeholder' => esc_html__('write your text here', 'matrik-core'),
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'matrik_process_genaral_three_content_title',
            [
                'label'       => esc_html__('Title', 'matrik-core'),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default' => wp_kses('Industry Concept & Planning', wp_kses_allowed_html('post')),
                'placeholder' => esc_html__('write your text here', 'matrik-core'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'matrik_process_genaral_three_content_list',
            [
                'label' => esc_html__('Content List', 'matrik-core'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'matrik_process_genaral_three_content_title' => wp_kses('Industry Concept & Planning', wp_kses_allowed_html('post')),
                        'matrik_process_genaral_three_step_count' => esc_html('STEP : 01'),
                    ],
                    [
                        'matrik_process_genaral_three_content_title' => wp_kses('Research & Oil Pick Development', wp_kses_allowed_html('post')),
                        'matrik_process_genaral_three_step_count' => esc_html('STEP : 02'),
                    ],
                    [
                        'matrik_process_genaral_three_content_title' => wp_kses('Sourcing & Procurement Gas & Oil.', wp_kses_allowed_html('post')),
                        'matrik_process_genaral_three_step_count' => esc_html('STEP : 03'),
                    ],

                ],
                'title_field' => '{{{ matrik_process_genaral_three_content_title }}}',
                'condition' => [
                    'matrik_process_genaral_style_selection' => ['style_three'],
                ]
            ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'matrik_process_genaral_four_step_count',
            [
                'label'       => esc_html__('Step Count', 'matrik-core'),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default'     => esc_html__('01', 'matrik-core'),
                'placeholder' => esc_html__('write your text here', 'matrik-core'),
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'matrik_process_genaral_four_content_title',
            [
                'label'       => esc_html__('Title', 'matrik-core'),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default' => wp_kses('Quoting process', wp_kses_allowed_html('post')),
                'placeholder' => esc_html__('write your text here', 'matrik-core'),
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'matrik_process_genaral_four_description',
            [
                'label'       => esc_html__('Description', 'matrik-core'),
                'type'        => \Elementor\Controls_Manager::TEXTAREA,
                'default'     => esc_html__('Conduct a thoroug need effortless assessment the understand your current marketing.', 'matrik-core'),
                'placeholder' => esc_html__('write your text here', 'matrik-core'),
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'matrik_process_genaral_four_content_two',
            [
                'label'     => esc_html__('Content Two', 'matrik-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $repeater->add_control(
            'matrik_process_genaral_four_banner_image',
            [
                'label' => esc_html__('Banner Image', 'matrik-core'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
                'media_types' => ['image'],
            ]
        );


        $repeater->add_control(
            'matrik_process_genaral_four_content_two_title',
            [
                'label'       => esc_html__('Title', 'matrik-core'),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default' => wp_kses('Quotin process', wp_kses_allowed_html('post')),
                'placeholder' => esc_html__('write your text here', 'matrik-core'),
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'matrik_process_genaral_four_content_two_description',
            [
                'label'       => esc_html__('Description', 'matrik-core'),
                'type'        => \Elementor\Controls_Manager::TEXTAREA,
                'default'     => esc_html__('Sed nisl eros, condimentum nec risus sit amet, finibus congt Fusen fringilla est libero, sed tempus urna feugiat eu. Curabit eu feugiat ligu Suspendisse nectoraba.', 'matrik-core'),
                'placeholder' => esc_html__('write your text here', 'matrik-core'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'matrik_process_genaral_four_content_list',
            [
                'label' => esc_html__('Content List', 'matrik-core'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'matrik_process_genaral_four_content_title' => wp_kses('Quoting process', wp_kses_allowed_html('post')),
                        'matrik_process_genaral_four_step_count' => esc_html('01'),
                    ],
                    [
                        'matrik_process_genaral_four_content_title' => wp_kses('Order placement', wp_kses_allowed_html('post')),
                        'matrik_process_genaral_four_step_count' => esc_html('02'),
                    ],
                    [
                        'matrik_process_genaral_four_content_title' => wp_kses('Manufacturing', wp_kses_allowed_html('post')),
                        'matrik_process_genaral_four_step_count' => esc_html('03'),
                    ],
                    [
                        'matrik_process_genaral_four_content_title' => wp_kses('QUALITY CONTROL', wp_kses_allowed_html('post')),
                        'matrik_process_genaral_four_step_count' => esc_html('04'),
                    ],
                    [
                        'matrik_process_genaral_four_content_title' => wp_kses('Shipment', wp_kses_allowed_html('post')),
                        'matrik_process_genaral_four_step_count' => esc_html('05'),
                    ],
                    [
                        'matrik_process_genaral_four_content_title' => wp_kses('Final Product Your Hand', wp_kses_allowed_html('post')),
                        'matrik_process_genaral_four_step_count' => esc_html('06'),
                    ],

                ],
                'title_field' => '{{{ matrik_process_genaral_four_content_title }}}',
                'condition' => [
                    'matrik_process_genaral_style_selection' => ['style_four'],
                ]
            ]
        );

        $this->add_control(
            'matrik_process_genaral_four_bg_vector_image_area',
            [
                'label'     => esc_html__('Vector Image Area', 'matrik-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
                'condition' => [
                    'matrik_process_genaral_style_selection' => ['style_four'],
                ]
            ]
        );

        $this->add_control(
            'matrik_process_genaral_four_bg_vector_image_one',
            [
                'label' => esc_html__('Vector Image One', 'matrik-core'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
                'media_types' => ['image', 'svg'],
                'condition' => [
                    'matrik_process_genaral_style_selection' => ['style_four'],
                ]
            ]
        );

        $this->add_control(
            'matrik_process_genaral_four_bg_vector_image_two',
            [
                'label' => esc_html__('Vector Image Two', 'matrik-core'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
                'media_types' => ['image', 'svg'],
                'condition' => [
                    'matrik_process_genaral_style_selection' => ['style_four'],
                ]
            ]
        );

        $this->add_control(
            'matrik_process_genaral_three_bg_vector_image',
            [
                'label' => esc_html__('Background Vector Image', 'matrik-core'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
                'media_types' => ['image', 'svg'],
                'condition' => [
                    'matrik_process_genaral_style_selection' => ['style_three'],
                ]
            ]
        );

        //style two contact area
        $this->add_control(
            'matrik_process_genaral_contact_area',
            [
                'label'     => esc_html__('Contact Area', 'matrik-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
                'condition' => [
                    'matrik_process_genaral_style_selection' => ['style_two'],
                ]
            ]
        );

        $this->add_control(
            'matrik_process_genaral_contact_area_text',
            [
                'label'       => esc_html__('Contact Area Text', 'matrik-core'),
                'type'        => \Elementor\Controls_Manager::TEXTAREA,
                'default' => wp_kses('Any Doubt Question &amp; <a href="/contact">Contact</a> With Us Any Time! ', wp_kses_allowed_html('post')),
                'placeholder' => esc_html__('write your text here', 'matrik-core'),
                'label_block' => true,
                'condition' => [
                    'matrik_process_genaral_style_selection' => ['style_two'],
                ]
            ]
        );


        $this->end_controls_section();


        //style start

        $this->start_controls_section(
            'matrik_process_style_one_genaral',
            [
                'label'     => esc_html__('Styles', 'matrik-core'),
                'tab'       => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'matrik_process_genaral_style_selection' => ['style_one'],
                ]
            ]
        );

        $this->add_control(
            'matrik_process_style_one_genaral_subtitle',
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
                'name'     => 'matrik_process_style_one_genaral_subtitle_typ',
                'selector' => '{{WRAPPER}} .section-title > span',

            ]
        );

        $this->add_control(
            'matrik_process_style_one_genaral_subtitle_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .section-title > span' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_process_style_one_genaral_subtitle_icon_color',
            [
                'label'     => esc_html__('Icon Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .section-title > span::after' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_process_style_one_genaral_title',
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
                'name'     => 'matrik_process_style_one_genaral_title_typ',
                'selector' => '{{WRAPPER}} .section-title h2',

            ]
        );

        $this->add_control(
            'matrik_process_style_one_genaral_title_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .section-title h2' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_process_style_one_genaral_step_no',
            [
                'label'     => esc_html__('Step Number', 'matrik-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'matrik-core'),
                'name'     => 'matrik_process_style_one_genaral_step_no_typ',
                'selector' => '{{WRAPPER}} .home1-process-section .process-wrapper .single-process .process-card .step-no span',

            ]
        );

        $this->add_control(
            'matrik_process_style_one_genaral_step_no_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home1-process-section .process-wrapper .single-process .process-card .step-no span' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_process_style_one_genaral_step_no_border_color',
            [
                'label'     => esc_html__('Border Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home1-process-section .process-wrapper .single-process .process-card .step-no' => 'border: 1px solid {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_process_style_one_genaral_step_no_bg_color',
            [
                'label'     => esc_html__('Background Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home1-process-section .process-wrapper .single-process .process-card .step-no' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_process_style_one_genaral_content_title',
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
                'name'     => 'matrik_process_style_one_genaral_content_title_typ',
                'selector' => '{{WRAPPER}} .home1-process-section .process-wrapper .single-process .process-card h3',

            ]
        );

        $this->add_control(
            'matrik_process_style_one_genaral_content_title_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home1-process-section .process-wrapper .single-process .process-card h3' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_process_style_one_genaral_content_description',
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
                'name'     => 'matrik_process_style_one_genaral_content_description_typ',
                'selector' => '{{WRAPPER}} .home1-process-section .process-wrapper .single-process .process-card p',

            ]
        );

        $this->add_control(
            'matrik_process_style_one_genaral_content_description_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home1-process-section .process-wrapper .single-process .process-card p' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_process_style_one_genaral_content_svg_icon',
            [
                'label'     => esc_html__('Content SVG', 'matrik-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'matrik-core'),
                'name'     => 'matrik_process_style_one_genaral_content_svg_icon_typ',
                'selector' => '{{WRAPPER}} .home1-process-section .process-wrapper .single-process .process-card .vector',

            ]
        );

        $this->add_control(
            'matrik_process_style_one_genaral_content_svg_icon_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home1-process-section .process-wrapper .single-process .process-card .vector' => 'fill: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section();


        //style start

        $this->start_controls_section(
            'matrik_process_style_three_genaral',
            [
                'label'     => esc_html__('Styles', 'matrik-core'),
                'tab'       => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'matrik_process_genaral_style_selection' => ['style_three'],
                ]
            ]
        );

        $this->add_control(
            'matrik_process_style_three_genaral_section',
            [
                'label'     => esc_html__('Section', 'matrik-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_control(
            'matrik_process_style_three_genaral_section_bg',
            [
                'label'     => esc_html__('Background Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home3-process-section' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_process_style_three_genaral_section_vector_image_color',
            [
                'label'     => esc_html__('Vector Background Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home3-process-section .scroll-svg' => 'stroke: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_process_style_three_genaral_title',
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
                'name'     => 'matrik_process_style_three_genaral_title_typ',
                'selector' => '{{WRAPPER}} .section-title.two h2',

            ]
        );

        $this->add_control(
            'matrik_process_style_three_genaral_title_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .section-title.two h2' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_process_style_three_genaral_header_button',
            [
                'label'     => esc_html__('Header Button', 'matrik-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'matrik-core'),
                'name'     => 'matrik_process_style_three_genaral_header_button_typ',
                'selector' => '{{WRAPPER}} .primary-btn3.transparent',

            ]
        );

        $this->add_control(
            'matrik_process_style_three_genaral_header_button_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .primary-btn3.transparent' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_process_style_three_genaral_header_button_hover_color',
            [
                'label'     => esc_html__('Hover Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .primary-btn3.transparent:hover' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_process_style_three_genaral_header_button_icon_color',
            [
                'label'     => esc_html__('Icon Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .primary-btn3.transparent .arrow' => 'fill: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_process_style_three_genaral_header_button_icon_hover_color',
            [
                'label'     => esc_html__('Icon Hover Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .primary-btn3.transparent:hover .arrow' => 'fill: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_process_style_three_genaral_header_button_border_color',
            [
                'label'     => esc_html__('Border Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .primary-btn3.transparent' => 'border: 1px solid {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_process_style_three_genaral_header_button_bg_color',
            [
                'label'     => esc_html__('Background Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .primary-btn3.transparent' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_process_style_three_genaral_header_button_hover_bg_color',
            [
                'label'     => esc_html__('Hover Background Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .primary-btn3.transparent::after' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_process_style_three_genaral_proecss_counter_text',
            [
                'label'     => esc_html__('Process Counter Text', 'matrik-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'matrik-core'),
                'name'     => 'matrik_process_style_three_genaral_proecss_counter_text_typ',
                'selector' => '{{WRAPPER}} .home3-process-section .process-wrapper .process-list .process-and-progress .single-process .step-no span',

            ]
        );

        $this->add_control(
            'matrik_process_style_three_genaral_proecss_counter_text_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home3-process-section .process-wrapper .process-list .process-and-progress .single-process .step-no span' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_process_style_three_genaral_proecss_counter_text_border_color',
            [
                'label'     => esc_html__('Border Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home3-process-section .process-wrapper .process-list .process-and-progress .single-process .step-no' => 'border: 1px solid {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_process_style_three_genaral_proecss_counter_text_bg_color',
            [
                'label'     => esc_html__('Background Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home3-process-section .process-wrapper .process-list .process-and-progress .single-process .step-no' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_process_style_three_genaral_proecss_title',
            [
                'label'     => esc_html__('Process Title', 'matrik-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'matrik-core'),
                'name'     => 'matrik_process_style_three_genaral_proecss_title_typ',
                'selector' => '{{WRAPPER}} .home3-process-section .process-wrapper .process-list .process-and-progress .single-process h6',

            ]
        );

        $this->add_control(
            'matrik_process_style_three_genaral_proecss_title_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home3-process-section .process-wrapper .process-list .process-and-progress .single-process h6' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_process_style_three_genaral_proecss_title_bg_color',
            [
                'label'     => esc_html__('Background Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home3-process-section .process-wrapper .process-list .process-and-progress .single-process' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_process_style_three_genaral_proecss_progress_bar',
            [
                'label'     => esc_html__('Process Progress Bar', 'matrik-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'matrik-core'),
                'name'     => 'matrik_process_style_three_genaral_proecss_progress_bar_typ',
                'selector' => '{{WRAPPER}} .home3-process-section .process-wrapper .progressBarContainer div span.progressBar',

            ]
        );

        $this->add_control(
            'matrik_process_style_three_genaral_proecss_progress_bar_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home3-process-section .process-wrapper .progressBarContainer div span.progressBar' => 'background-color: {{VALUE}};',
                ],
            ]
        );


        $this->end_controls_section();

        //style start

        $this->start_controls_section(
            'matrik_process_style_four_genaral',
            [
                'label'     => esc_html__('Styles', 'matrik-core'),
                'tab'       => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'matrik_process_genaral_style_selection' => ['style_four'],
                ]
            ]
        );

        $this->add_control(
            'matrik_process_style_four_genaral_header_title',
            [
                'label'     => esc_html__('Header Title', 'matrik-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'matrik-core'),
                'name'     => 'matrik_process_style_four_genaral_title_typ_two',
                'selector' => '{{WRAPPER}} .section-title.three h2',

            ]
        );

        $this->add_control(
            'matrik_process_style_four_genaral_title_color_two',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .section-title.three h2' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_process_style_four_genaral_step_count',
            [
                'label'     => esc_html__('Step Count', 'matrik-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'matrik-core'),
                'name'     => 'matrik_process_style_four_genaral_step_count_typ',
                'selector' => '{{WRAPPER}} .home4-process-section .process-list li .single-process span',

            ]
        );

        $this->add_control(
            'matrik_process_style_four_genaral_step_count_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home4-process-section .process-list li .single-process span' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_process_style_four_genaral_step_count_hover_color',
            [
                'label'     => esc_html__('Hover Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home4-process-section .process-list li .single-process:hover span' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_process_style_four_genaral_step_count_border_color',
            [
                'label'     => esc_html__('Border Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home4-process-section .process-list li .single-process span' => 'border: 1px solid {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_process_style_four_genaral_step_count_border_hover_color',
            [
                'label'     => esc_html__('Hover Border Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home4-process-section .process-list li .single-process:hover span' => 'border-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_process_style_four_genaral_step_count_list_border_color',
            [
                'label'     => esc_html__('List Border Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home4-process-section .process-list li' => 'border-bottom: 1px solid {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_process_style_four_genaral_title',
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
                'name'     => 'matrik_process_style_four_genaral_title_typ',
                'selector' => '{{WRAPPER}} .home4-process-section .process-list li .single-process h5',

            ]
        );

        $this->add_control(
            'matrik_process_style_four_genaral_title_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home4-process-section .process-list li .single-process h5' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_process_style_four_genaral_title_hover_color',
            [
                'label'     => esc_html__('Hover Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home4-process-section .process-list li .single-process:hover h5' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_process_style_four_genaral_title_hover_bg_color',
            [
                'label'     => esc_html__('Hover Background Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home4-process-section .process-list li .single-process:hover' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_process_style_four_genaral_content_two',
            [
                'label'     => esc_html__('Content Two', 'matrik-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'matrik_process_style_four_genaral_content_two_title',
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
                'name'     => 'matrik_process_style_four_genaral_content_two_title_typ',
                'selector' => '{{WRAPPER}} .home4-process-section .process-img-wrap .process-img-list li .process-content h5',

            ]
        );

        $this->add_control(
            'matrik_process_style_four_genaral_content_two_title_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home4-process-section .process-img-wrap .process-img-list li .process-content h5' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_process_style_four_genaral_content_two_description',
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
                'name'     => 'matrik_process_style_four_genaral_content_two_description_typ',
                'selector' => '{{WRAPPER}} .home4-process-section .process-img-wrap .process-img-list li .process-content p',

            ]
        );

        $this->add_control(
            'matrik_process_style_four_genaral_content_two_description_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home4-process-section .process-img-wrap .process-img-list li .process-content p' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_process_style_four_genaral_content_two_description_icon_color',
            [
                'label'     => esc_html__('Icon Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home4-process-section .process-img-wrap .process-img-list li .process-content p::before' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section();

        //style start

        $this->start_controls_section(
            'matrik_process_style_five_genaral',
            [
                'label'     => esc_html__('Styles', 'matrik-core'),
                'tab'       => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'matrik_process_genaral_style_selection' => ['style_five'],
                ]
            ]
        );

        $this->add_control(
            'matrik_process_style_five_genaral_header_subtitle',
            [
                'label'     => esc_html__('Header Subtitle', 'matrik-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'matrik-core'),
                'name'     => 'matrik_process_style_five_genaral_header_subtitle_typ',
                'selector' => '{{WRAPPER}} .section-title.four.white span',

            ]
        );

        $this->add_control(
            'matrik_process_style_five_genaral_header_subtitle_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .section-title.four.white span' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_process_style_five_genaral_header_subtitle_icon_color',
            [
                'label'     => esc_html__('Icon Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .section-title.four span svg' => 'fill: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_process_style_five_genaral_header_title',
            [
                'label'     => esc_html__('Header Title', 'matrik-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'matrik-core'),
                'name'     => 'matrik_process_style_five_genaral_header_title_typ',
                'selector' => '{{WRAPPER}} .section-title.four.white h2',

            ]
        );

        $this->add_control(
            'matrik_process_style_five_genaral_header_title_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .section-title.four.white h2' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_process_style_five_genaral_header_button',
            [
                'label'     => esc_html__('Header Button', 'matrik-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'matrik-core'),
                'name'     => 'matrik_process_style_five_genaral_header_button_typ',
                'selector' => '{{WRAPPER}} .primary-btn2.two.white',

            ]
        );

        $this->add_control(
            'matrik_process_style_five_genaral_header_button_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .primary-btn2.two.white' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_process_style_five_genaral_header_button_hover_color',
            [
                'label'     => esc_html__('Hover Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home5-process-section .primary-btn2.two:hover' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_process_style_five_genaral_header_button_icon_color',
            [
                'label'     => esc_html__('Icon Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .primary-btn2.two.white svg' => 'fill: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_process_style_five_genaral_header_button_hover_icon_color',
            [
                'label'     => esc_html__('Hover Icon Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home5-process-section .primary-btn2.two:hover svg' => 'fill: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_process_style_five_genaral_process_card',
            [
                'label'     => esc_html__('Process Card', 'matrik-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_control(
            'matrik_process_style_five_genaral_process_card_bg_color',
            [
                'label'     => esc_html__('Background Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .process-card2.two .process-content-wrap .process-content' => 'background-color: {{VALUE}};',
                ],
            ]
        );


        $this->add_control(
            'matrik_process_style_five_genaral_step_number',
            [
                'label'     => esc_html__('Step Number', 'matrik-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'matrik-core'),
                'name'     => 'matrik_process_style_five_genaral_step_number_typ',
                'selector' => '{{WRAPPER}} .process-card2.two .step-no span',

            ]
        );

        $this->add_control(
            'matrik_process_style_five_genaral_step_number_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .process-card2.two .step-no span' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_process_style_five_genaral_step_number_hover_color',
            [
                'label'     => esc_html__('Hover Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .process-card2:hover .step-no span' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_process_style_five_genaral_step_number_border_color',
            [
                'label'     => esc_html__('Border Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .process-card2.two .step-no' => 'border: 1px solid {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_process_style_five_genaral_step_number_bg_color',
            [
                'label'     => esc_html__('Background Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .process-card2.two .step-no' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_process_style_five_genaral_step_number_hover_bg_color',
            [
                'label'     => esc_html__('Hover Background Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .process-card2.two:hover .step-no' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_process_style_five_genaral_step_number_border_before_color',
            [
                'label'     => esc_html__('Before Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .process-card2.two .step-no::before' => 'border: 1px solid {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_process_style_five_genaral_step_number_border_before_bg_color',
            [
                'label'     => esc_html__('Before Background Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .process-card2.two .step-no::before' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_process_style_five_genaral_step_number_border_before_hover_bg_color',
            [
                'label'     => esc_html__('Before Hover Background Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .process-card2.two:hover .step-no::before' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_process_style_five_genaral_process_dot_icon',
            [
                'label'     => esc_html__('Process Dot Icon', 'matrik-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_control(
            'matrik_process_style_five_genaral_process_dot_icon_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .process-card2.two .dot span' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_process_style_five_genaral_process_icon',
            [
                'label'     => esc_html__('Process Icon', 'matrik-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_control(
            'matrik_process_style_five_genaral_process_icon_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .process-card2.two .process-content-wrap .process-content .icon svg' => 'fill: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_process_style_five_genaral_process_title',
            [
                'label'     => esc_html__('Process Title', 'matrik-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'matrik-core'),
                'name'     => 'matrik_process_style_five_genaral_process_title_typ',
                'selector' => '{{WRAPPER}} .process-card2.two .process-content-wrap .process-content h4',

            ]
        );

        $this->add_control(
            'matrik_process_style_five_genaral_process_title_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .process-card2.two .process-content-wrap .process-content h4' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_process_style_five_genaral_process_description',
            [
                'label'     => esc_html__('Process Description', 'matrik-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'matrik-core'),
                'name'     => 'matrik_process_style_five_genaral_process_description_typ',
                'selector' => '{{WRAPPER}} .process-card2.two .process-content-wrap .process-content p',

            ]
        );

        $this->add_control(
            'matrik_process_style_five_genaral_process_description_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .process-card2.two .process-content-wrap .process-content p' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section();

        //style start

        $this->start_controls_section(
            'matrik_process_style_two_genaral',
            [
                'label'     => esc_html__('Styles', 'matrik-core'),
                'tab'       => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'matrik_process_genaral_style_selection' => ['style_two'],
                ]
            ]
        );

        $this->add_control(
            'matrik_process_style_two_genaral_header_subtitle',
            [
                'label'     => esc_html__('Header Subtitle', 'matrik-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'matrik-core'),
                'name'     => 'matrik_process_style_two_genaral_header_subtitle_typ',
                'selector' => '{{WRAPPER}} .section-title.two span',

            ]
        );

        $this->add_control(
            'matrik_process_style_two_genaral_header_subtitle_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .section-title.two span' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_process_style_two_genaral_header_subtitle_bg_color',
            [
                'label'     => esc_html__('Background Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .section-title.two span' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_process_style_two_genaral_header_title',
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
                'name'     => 'matrik_process_style_two_genaral_header_title_typ',
                'selector' => '{{WRAPPER}} .section-title h2',

            ]
        );

        $this->add_control(
            'matrik_process_style_two_genaral_header_title_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .section-title h2' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_process_style_two_genaral_content_step_number',
            [
                'label'     => esc_html__('Step Number', 'matrik-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'matrik-core'),
                'name'     => 'matrik_process_style_two_genaral_content_step_number_typ',
                'selector' => '{{WRAPPER}} .process-card2 .step-no span',

            ]
        );

        $this->add_control(
            'matrik_process_style_two_genaral_content_step_number_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .process-card2 .step-no span' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_process_style_two_genaral_content_step_number_hover_color',
            [
                'label'     => esc_html__('Hover Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .process-card2:hover .step-no span' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_process_style_two_genaral_content_step_number_border_color',
            [
                'label'     => esc_html__('Border Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .process-card2 .step-no' => 'border: 1px solid {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_process_style_two_genaral_content_step_number_border_hover_color',
            [
                'label'     => esc_html__('Hover Border Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .process-card2:hover .step-no' => 'border-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_process_style_two_genaral_content_step_number_bg_color',
            [
                'label'     => esc_html__('Background Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .process-card2 .step-no' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_process_style_two_genaral_content_step_number_hover_bg_color',
            [
                'label'     => esc_html__('Hover Background Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .process-card2:hover .step-no' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_process_style_two_genaral_content_dot_icon',
            [
                'label'     => esc_html__('Dot Icon', 'matrik-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_control(
            'matrik_process_style_two_genaral_content_dot_icon_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .process-card2 .dot span::before' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_process_style_two_genaral_content_dot_icon_bg_color',
            [
                'label'     => esc_html__('Background Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .process-card2 .dot span' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_process_style_two_genaral_content_title',
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
                'name'     => 'matrik_process_style_two_genaral_content_title_typ',
                'selector' => '{{WRAPPER}} .process-card2 .process-content-wrap .process-content h4',

            ]
        );

        $this->add_control(
            'matrik_process_style_two_genaral_content_title_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .process-card2 .process-content-wrap .process-content h4' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_process_style_two_genaral_content_description',
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
                'name'     => 'matrik_process_style_two_genaral_content_description_typ',
                'selector' => '{{WRAPPER}} .process-card2 .process-content-wrap .process-content p',

            ]
        );

        $this->add_control(
            'matrik_process_style_two_genaral_content_description_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .process-card2 .process-content-wrap .process-content p' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_process_style_two_genaral_content_icon',
            [
                'label'     => esc_html__('Content Icon', 'matrik-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_control(
            'matrik_process_style_two_genaral_content_icon_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .process-card2 .process-content-wrap .process-content .icon svg' => 'fill: {{VALUE}};',
                ],
            ]
        );


        $this->add_control(
            'matrik_process_style_two_genaral_content_icon_bg_color',
            [
                'label'     => esc_html__('Background Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .process-card2 .process-content-wrap .process-content .icon' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_process_style_two_genaral_bottom_text',
            [
                'label'     => esc_html__('Bottom Text', 'matrik-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'matrik-core'),
                'name'     => 'matrik_process_style_two_genaral_bottom_text_typ',
                'selector' => '{{WRAPPER}} .home2-process-section .process-wrapper p',

            ]
        );

        $this->add_control(
            'matrik_process_style_two_genaral_bottom_text_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home2-process-section .process-wrapper p' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_process_style_two_genaral_bottom_text_link_color',
            [
                'label'     => esc_html__('Link Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home2-process-section .process-wrapper p a' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_process_style_two_genaral_bottom_text_link_hover_color',
            [
                'label'     => esc_html__('Link Hover Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home2-process-section .process-wrapper p a:hover' => 'color: {{VALUE}};',
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
                var swiper = new Swiper(".home2-process-slider", {
                    slidesPerView: 1,
                    speed: 1500,
                    spaceBetween: 24,
                    autoplay: {
                        delay: 2500, // Autoplay duration in milliseconds
                        disableOnInteraction: false,
                    },
                    navigation: {
                        nextEl: ".service-slider-next",
                        prevEl: ".service-slider-prev",
                    },
                    breakpoints: {
                        280: {
                            slidesPerView: 1,
                        },
                        386: {
                            slidesPerView: 1,
                        },
                        576: {
                            slidesPerView: 2,
                        },
                        768: {
                            slidesPerView: 2,
                        },
                        992: {
                            slidesPerView: 3,
                        },
                        1200: {
                            slidesPerView: 4,
                            spaceBetween: 20,
                        },
                        1400: {
                            slidesPerView: 4,
                            spaceBetween: 40,
                        },
                    },
                });

                var percentTime;
                var tick;
                var time = 0.5;
                var progressBarIndex = 0;

                jQuery(".progressBarContainer .progressBar").each(function(index) {
                    var progress = "<div class='inProgress inProgress" + index + "'></div>";
                    jQuery(this).html(progress);
                });

                function startProgressbar() {
                    resetProgressbar();
                    percentTime = 0;
                    tick = setInterval(interval, 10);
                }

                function interval() {
                    if (
                        jQuery(
                            '.slider .slick-track div[data-slick-index="' + progressBarIndex + '"]'
                        ).attr("aria-hidden") === "true"
                    ) {
                        progressBarIndex = jQuery(
                            '.slider .slick-track div[aria-hidden="false"]'
                        ).data("slickIndex");
                        startProgressbar();
                    } else {
                        percentTime += 1 / (time + 5);
                        jQuery(".inProgress" + progressBarIndex).css({
                            width: percentTime + "%",
                        });
                        if (percentTime >= 100) {
                            jQuery(".slider").slick("slickNext");
                            progressBarIndex++;
                            if (progressBarIndex > 2) {
                                progressBarIndex = 0;
                            }
                            startProgressbar();
                        }
                    }
                }

                function resetProgressbar() {
                    jQuery(".inProgress").css({
                        width: 0 + "%",
                    });
                    clearInterval(tick);
                }
                startProgressbar();

                jQuery(".slider").slick({
                    infinite: true,
                    centerMode: false,
                    arrows: false,
                    dots: false,
                    autoplay: false,
                    speed: 800,
                    slidesToScroll: 1,
                    vertical: true,
                    verticalSwiping: true,
                    slidesToShow: 1,
                    slidesToScroll: 1,
                });

                function initScrollAnimation() {
                    const scrollSecTitle = document.querySelector(".scroll-sec-vector");
                    const scrollSecTitleEnd = document.querySelector(".scroll-sec-vector-end");

                    // Check if both elements exist before proceeding
                    if (scrollSecTitle && scrollSecTitleEnd) {
                        const start = scrollSecTitle.getBoundingClientRect().top;
                        const end = scrollSecTitleEnd.getBoundingClientRect().top;
                        const distance = end - start;

                        const scScrollTl = gsap.timeline({
                            scrollTrigger: {
                                trigger: ".scroll-sec-vector",
                                start: "top 30%",
                                endTrigger: ".scroll-sec-vector-end",
                                end: "top -120%",
                                toggleActions: "restart pause reverse pause",
                                scrub: 1,
                            },
                        });

                        scScrollTl.to(".scroll-sec-vector", {
                            y: distance, // Use the calculated distance
                            duration: 10, // Duration can be kept for scrub speed
                        });
                    }
                }

                function handleResize() {
                    if (window.innerWidth >= 991) {
                        initScrollAnimation();
                    } else {
                        if (ScrollTrigger.getById("scScrollTl")) {
                            ScrollTrigger.getById("scScrollTl").kill();
                        }
                    }
                }
                handleResize();
                window.addEventLis;
            </script>
        <?php endif; ?>

        <?php if ($settings['matrik_process_genaral_style_selection'] == 'style_one') : ?>
            <div class="home1-process-section">
                <div class="container">
                    <div class="row justify-content-center mb-70 wow animate fadeInDown" data-wow-delay="200ms" data-wow-duration="1500ms">
                        <div class="col-xl-6 col-lg-7 col-md-8">
                            <div class="section-title text-center">
                                <?php if (!empty($settings['matrik_process_genaral_subtitle'])) : ?>
                                    <span><?php echo esc_html($settings['matrik_process_genaral_subtitle']); ?></span>
                                <?php endif; ?>
                                <?php if (!empty($settings['matrik_process_genaral_title'])) : ?>
                                    <h2><?php echo esc_html($settings['matrik_process_genaral_title']); ?></h2>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="container-fluid">
                    <div class="process-wrapper">
                        <?php
                        $classes = array('mt-30', '', 'mt-30');
                        $class_count = count($classes);
                        $total_items = count($settings['matrik_process_genaral_content_list']);

                        foreach ($settings['matrik_process_genaral_content_list'] as $index => $data) :
                            $class = $classes[$index % $class_count];
                        ?>

                            <div class="single-process <?php echo esc_attr($class); ?>">
                                <div class="process-card wow animate fadeInLeft" data-wow-delay="200ms" data-wow-duration="1500ms">
                                    <?php if (!empty($data['matrik_process_genaral_step_count'])) : ?>
                                        <div class="step-no">
                                            <span><?php echo esc_html($data['matrik_process_genaral_step_count']); ?></span>
                                        </div>
                                    <?php endif; ?>
                                    <?php if (!empty($data['matrik_process_genaral_content_title'])) : ?>
                                        <h3><?php echo wp_kses($data['matrik_process_genaral_content_title'], wp_kses_allowed_html('post')); ?></h3>
                                    <?php endif; ?>
                                    <?php if (!empty($data['matrik_process_genaral_description'])) : ?>
                                        <p><?php echo esc_html($data['matrik_process_genaral_description']); ?></p>
                                    <?php endif; ?>


                                    <svg class="vector" width="75" height="75" viewBox="0 0 75 75" xmlns="http://www.w3.org/2000/svg">
                                        <rect width="25" height="25" />
                                        <rect x="25" y="25" width="25" height="25" />
                                        <rect y="50" width="25" height="25" />
                                        <rect x="50" y="50" width="25" height="25" />
                                    </svg>
                                </div>
                                <?php
                                // Show description only if NOT the last item
                                if ($index < $total_items - 1 && !empty($data['matrik_process_genaral_description'])) : ?>
                                    <svg class="animated-vector" width="181" height="124" viewBox="0 0 181 124" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path opacity="0.2" id="theMotionPath11"
                                            d="M0 123H67.5C84.0685 123 97.5 109.569 97.5 93V31C97.5 14.4315 110.931 1 127.5 1H181"
                                            stroke="black" />
                                        <path d="M0 0 L13 0" stroke="url(#paint0_linear_354_7441)" stroke-linecap="round" stroke-width="2">
                                            <animateMotion dur="4s" begin="0s" repeatCount="indefinite" rotate="auto">
                                                <mpath href="#theMotionPath11"></mpath>
                                            </animateMotion>
                                        </path>
                                        <defs>
                                            <linearGradient id="paint0_linear_354_7441" x1="10" y1="0" x2="0" y2="0" gradientUnits="userSpaceOnUse">
                                                <stop stop-color="#CB0000" offset="0" />
                                                <stop offset="1" stop-color="white" stop-opacity="0" />
                                            </linearGradient>
                                        </defs>
                                    </svg>
                                <?php endif; ?>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        <?php endif; ?>


        <?php if ($settings['matrik_process_genaral_style_selection'] == 'style_two') : ?>
            <div class="home2-process-section">
                <div class="container">
                    <div class="row justify-content-center mb-70 wow animate fadeInDown" data-wow-delay="200ms" data-wow-duration="1500ms">
                        <div class="col-xl-6 col-lg-8">
                            <div class="section-title two text-center">
                                <?php if (!empty($settings['matrik_process_genaral_subtitle'])) : ?>
                                    <span><?php echo esc_html($settings['matrik_process_genaral_subtitle']); ?></span>
                                <?php endif; ?>
                                <?php if (!empty($settings['matrik_process_genaral_title'])) : ?>
                                    <h2><?php echo esc_html($settings['matrik_process_genaral_title']); ?></h2>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="process-wrapper">
                    <div class="container-fluid">
                        <div class="process-slider-wrap">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="swiper home2-process-slider">
                                        <div class="swiper-wrapper">
                                            <?php foreach ($settings['matrik_process_two_genaral_content_list'] as $data) : ?>
                                                <div class="swiper-slide">
                                                    <div class="process-card2">
                                                        <?php if (!empty($data['matrik_process_two_genaral_step_count'])) : ?>
                                                            <div class="step-no">
                                                                <span><?php echo esc_html($data['matrik_process_two_genaral_step_count']); ?></span>
                                                            </div>
                                                        <?php endif; ?>
                                                        <div class="dot">
                                                            <span></span>
                                                            <svg class="line" width="6" height="119" viewBox="0 0 6 119" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path opacity="0.2"
                                                                    d="M0.333333 116C0.333333 117.473 1.52724 118.667 3 118.667C4.47276 118.667 5.66667 117.473 5.66667 116C5.66667 114.527 4.47276 113.333 3 113.333C1.52724 113.333 0.333333 114.527 0.333333 116ZM2.5 0V116H3.5V0H2.5Z"
                                                                    fill="black" />
                                                            </svg>
                                                        </div>
                                                        <div class="process-content-wrap">
                                                            <div class="process-content">
                                                                <?php if (!empty($data['matrik_process_two_genaral_content_title'])) : ?>
                                                                    <h4><?php echo wp_kses($data['matrik_process_two_genaral_content_title'], wp_kses_allowed_html('post')); ?></h4>
                                                                <?php endif; ?>
                                                                <?php if (!empty($data['matrik_process_two_genaral_description'])) : ?>
                                                                    <p><?php echo esc_html($data['matrik_process_two_genaral_description']); ?></p>
                                                                <?php endif; ?>
                                                                <div class="icon">
                                                                    <?php if (!empty($data['matrik_process_two_genaral_icon_image'])) : ?>
                                                                        <?php \Elementor\Icons_Manager::render_icon($data['matrik_process_two_genaral_icon_image'], ['aria-hidden' => 'true']); ?>
                                                                    <?php endif; ?>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php endforeach; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php if (!empty($settings['matrik_process_genaral_contact_area_text'])) : ?>
                            <p><?php echo wp_kses($settings['matrik_process_genaral_contact_area_text'], wp_kses_allowed_html('post')); ?></p>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        <?php endif; ?>

        <?php if ($settings['matrik_process_genaral_style_selection'] == 'style_three') : ?>
            <div class="home3-process-section" id="trigger-route-1">
                <div class="container">
                    <div class="row gy-md-5 gy-4 align-items-center justify-content-between mb-70">
                        <?php if (!empty($settings['matrik_process_genaral_title'])) : ?>
                            <div class="col-lg-6 wow animate fadeInLeft" data-wow-delay="200ms" data-wow-duration="1500ms">
                                <div class="section-title two">
                                    <h2><?php echo esc_html($settings['matrik_process_genaral_title']); ?></h2>
                                </div>
                            </div>
                        <?php endif; ?>
                        <?php if (!empty($settings['matrik_process_genaral_three_button_text'])) : ?>
                            <div class="col-lg-3 d-flex justify-content-lg-end btn_wrapper">
                                <a class="primary-btn3 transparent" href="<?php echo esc_url($settings['matrik_process_genaral_three_button_text_url']['url']); ?>">
                                    <span><?php echo esc_html($settings['matrik_process_genaral_three_button_text']); ?>
                                    </span>
                                    <span><?php echo esc_html($settings['matrik_process_genaral_three_button_text']); ?>
                                    </span>
                                    <svg class="arrow" width="23" height="23" viewBox="0 0 23 23" xmlns="http://www.w3.org/2000/svg">
                                        <g>
                                            <path d="M0.113861 0H22.9999V4.28425L4.32671 22.9997L0 18.7154L12.7524 6.08815L0.113861 6.20089V0Z" />
                                            <path d="M23 22.9996V8.56848L16.8516 14.6566V22.9996H23Z" />
                                        </g>
                                    </svg>
                                </a>
                            </div>
                        <?php endif; ?>
                    </div>
                    <div class="process-wrapper">
                        <div class="row align-items-center">
                            <div class="col-xl-4 col-lg-5">
                                <div class="process-list">
                                    <div class="progressBarContainer">
                                        <?php foreach ($settings['matrik_process_genaral_three_content_list'] as $data) : ?>
                                            <div class="process-and-progress">
                                                <div class="single-process">
                                                    <?php if (!empty($data['matrik_process_genaral_three_step_count'])) : ?>
                                                        <div class="step-no">
                                                            <span><?php echo esc_html($data['matrik_process_genaral_three_step_count']); ?></span>
                                                        </div>
                                                    <?php endif; ?>
                                                    <?php if (!empty($data['matrik_process_genaral_three_content_title'])) : ?>
                                                        <h6><?php echo esc_html($data['matrik_process_genaral_three_content_title']); ?></h6>
                                                    <?php endif; ?>
                                                </div>
                                                <span data-slick-index="0" class="progressBar"></span>
                                            </div>
                                        <?php endforeach; ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-8 col-lg-7">
                                <div class="process-img-wrap">
                                    <div class="slider single-item">
                                        <?php foreach ($settings['matrik_process_genaral_three_content_list'] as $data) : ?>
                                            <div class="slider-item">
                                                <?php if (!empty($data['matrik_process_genaral_three_process_image']['url'])) : ?>
                                                    <div class="process-img">
                                                        <img src="<?php echo esc_url($data['matrik_process_genaral_three_process_image']['url']); ?>" alt="<?php echo esc_attr__('process-image', 'matrik-core'); ?>">
                                                    </div>
                                                <?php endif; ?>
                                            </div>
                                        <?php endforeach; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
                $image = $settings['matrik_process_genaral_three_bg_vector_image'];

                if (!empty($image['url'])) {
                    $file_url  = esc_url($image['url']);
                    $file_path = isset($image['id']) ? get_attached_file($image['id']) : '';

                    if ($file_path && strtolower(pathinfo($file_path, PATHINFO_EXTENSION)) === 'svg') {
                        $svg_content = file_get_contents($file_path);

                        if ($svg_content) {
                            // Add or append class
                            $svg_content = preg_replace('/<svg\b(?![^>]*\bclass=)/', '<svg class="scroll-svg"', $svg_content, 1);
                            $svg_content = preg_replace('/<svg[^>]*class=["\']([^"\']*)["\']/', '<svg class="$1 scroll-svg"', $svg_content, 1);

                            // Define allowed SVG tags and attributes
                            $allowed_svg_tags = [
                                'svg'      => ['class' => true, 'xmlns' => true, 'viewBox' => true, 'width' => true, 'height' => true, 'fill' => true],
                                'g'        => ['fill' => true],
                                'path'     => ['d' => true, 'fill' => true],
                                'circle'   => ['cx' => true, 'cy' => true, 'r' => true, 'fill' => true],
                                'rect'     => ['x' => true, 'y' => true, 'width' => true, 'height' => true, 'fill' => true],
                                'use'      => ['xlink:href' => true],
                                // add more allowed tags and attributes as needed
                            ];

                            echo wp_kses($svg_content, $allowed_svg_tags);
                        }
                    } else {
                ?>
                        <img src="<?php echo esc_url($file_url); ?>" alt="<?php echo esc_attr__('vector-image', 'matrik-core'); ?>" />
                <?php
                    }
                }
                ?>
            </div>
        <?php endif; ?>

        <?php if ($settings['matrik_process_genaral_style_selection'] == 'style_four') : ?>
            <div class="home4-process-section">
                <div class="container">
                    <?php if (!empty($settings['matrik_process_genaral_title'])) : ?>
                        <div class="section-title three text-center mb-70 wow animate fadeInDown" data-wow-delay="200ms" data-wow-duration="1500ms">
                            <h2><?php echo esc_html($settings['matrik_process_genaral_title']); ?></h2>
                        </div>
                    <?php endif; ?>
                    <div class="process-wrapper">
                        <div class="row gy-5 justify-content-between">
                            <div class="col-lg-5">
                                <ul class="process-list">
                                    <?php foreach ($settings['matrik_process_genaral_four_content_list'] as $data) : ?>
                                        <li class="wow animate fadeInLeft" data-wow-delay="200ms" data-wow-duration="1500ms">
                                            <div class="single-process">
                                                <?php if (!empty($data['matrik_process_genaral_four_step_count'])) : ?>
                                                    <span><?php echo esc_html($data['matrik_process_genaral_four_step_count']); ?></span>
                                                <?php endif; ?>
                                                <?php if (!empty($data['matrik_process_genaral_four_content_title'])) : ?>
                                                    <h5><?php echo esc_html($data['matrik_process_genaral_four_content_title']); ?></h5>
                                                <?php endif; ?>
                                            </div>
                                        </li>
                                    <?php endforeach; ?>
                                </ul>
                            </div>
                            <div class="col-lg-6 wow animate fadeInRight" data-wow-delay="200ms" data-wow-duration="1500ms">
                                <div class="process-img-wrap">
                                    <ul class="process-img-list">
                                        <?php $firstItem = true;  ?>
                                        <?php foreach ($settings['matrik_process_genaral_four_content_list'] as $data) : ?>
                                            <li class="<?php echo $firstItem ? 'active' : ''; ?>">
                                                <div class="process-card3">
                                                    <?php if ($data['matrik_process_genaral_four_banner_image']['url']) : ?>
                                                        <div class="process-img">
                                                            <img src="<?php echo esc_url($data['matrik_process_genaral_four_banner_image']['url']); ?>" alt="">
                                                        </div>
                                                    <?php endif; ?>
                                                    <div class="process-content">
                                                        <?php if (!empty($data['matrik_process_genaral_four_content_two_title'])) : ?>
                                                            <h5><?php echo esc_html($data['matrik_process_genaral_four_content_two_title']); ?></h5>
                                                        <?php endif; ?>
                                                        <?php if (!empty($data['matrik_process_genaral_four_content_two_description'])) : ?>
                                                            <p><?php echo esc_html($data['matrik_process_genaral_four_content_two_description']); ?></p>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>
                                            </li>
                                        <?php $firstItem = false;
                                        endforeach; ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <?php if (!empty($settings['matrik_process_genaral_four_bg_vector_image_one']['url'])) : ?>
                            <div class="vector-area">
                                <div class="top-vector scroll-sec-vector">
                                    <img src="<?php echo esc_url($settings['matrik_process_genaral_four_bg_vector_image_one']['url']); ?>" alt="<?php echo esc_attr__('vector-image-one', 'matrik-core'); ?>">
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <?php if (!empty($settings['matrik_process_genaral_four_bg_vector_image_two']['url'])) : ?>
                <div class="home4-process-bottom-vector scroll-sec-vector-end">
                    <img src="<?php echo esc_url($settings['matrik_process_genaral_four_bg_vector_image_two']['url']); ?>" alt="<?php echo esc_attr__('vector-image-two', 'matrik-core'); ?>">
                </div>
            <?php endif; ?>
        <?php endif; ?>

        <?php if ($settings['matrik_process_genaral_style_selection'] == 'style_five') : ?>
            <div class="home5-process-section">
                <div class="container">
                    <div class="row gy-md-5 gy-4 align-items-center justify-content-between mb-70 wow animate fadeInDown" data-wow-delay="200ms" data-wow-duration="1500ms">
                        <div class="col-lg-5">
                            <div class="section-title four white">
                                <?php if (!empty($settings['matrik_process_genaral_subtitle'])) : ?>
                                    <span>
                                        <svg width="12" height="12" viewBox="0 0 12 12" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M0.0594065 0H12.0001V2.2353L2.25745 12L0 9.76471L6.65353 3.17647L0.0594065 3.2353V0Z" />
                                            <path d="M11.9999 11.9999V4.47046L8.79199 7.64693V11.9999H11.9999Z" />
                                        </svg>
                                        <?php echo esc_html($settings['matrik_process_genaral_subtitle']); ?>
                                    </span>
                                <?php endif; ?>
                                <?php if (!empty($settings['matrik_process_genaral_title'])) : ?>
                                    <h2><?php echo esc_html($settings['matrik_process_genaral_title']); ?></h2>
                                <?php endif; ?>
                            </div>
                        </div>
                        <?php if (!empty($settings['matrik_process_genaral_three_button_text'])) : ?>
                            <div class="col-lg-3 d-flex justify-content-lg-end">
                                <a class="primary-btn2 two white" href="<?php echo esc_url($settings['matrik_process_genaral_three_button_text_url']['url']); ?>">
                                    <span><?php echo esc_html($settings['matrik_process_genaral_three_button_text']); ?></span>
                                    <svg class="arrow" width="23" height="23" viewBox="0 0 23 23" xmlns="http://www.w3.org/2000/svg">
                                        <g>
                                            <path d="M0.113861 0H22.9999V4.28425L4.32671 22.9997L0 18.7154L12.7524 6.08815L0.113861 6.20089V0Z"></path>
                                            <path d="M23 22.9996V8.56848L16.8516 14.6566V22.9996H23Z"></path>
                                        </g>
                                    </svg>
                                </a>
                            </div>
                        <?php endif; ?>
                    </div>
                    <div class="process-wrapper">
                        <div class="row gy-5">
                            <?php
                            $classes = array('', 'd-flex justify-content-lg-center pt-40', 'd-flex justify-content-lg-end pt-80');
                            $class_count = count($classes);
                            $total_items = count($settings['matrik_process_two_genaral_content_list']);

                            foreach ($settings['matrik_process_two_genaral_content_list'] as $index => $data) :
                                $class = $classes[$index % $class_count];
                            ?>
                                <div class="col-lg-4 col-md-6 <?php echo esc_attr($class); ?> wow animate fadeInDown" data-wow-delay="200ms" data-wow-duration="1500ms">
                                    <div class="process-card2 two">
                                        <?php if (!empty($data['matrik_process_two_genaral_step_count'])) : ?>
                                            <div class="step-no">
                                                <span><?php echo esc_html($data['matrik_process_two_genaral_step_count']); ?></span>
                                            </div>
                                        <?php endif; ?>
                                        <div class="dot">
                                            <span></span>
                                        </div>
                                        <div class="process-content-wrap">
                                            <div class="process-content">
                                                <div class="icon">
                                                    <?php if (!empty($data['matrik_process_two_genaral_icon_image'])) : ?>
                                                        <?php \Elementor\Icons_Manager::render_icon($data['matrik_process_two_genaral_icon_image'], ['aria-hidden' => 'true']); ?>
                                                    <?php endif; ?>
                                                </div>
                                                <?php if (!empty($data['matrik_process_two_genaral_content_title'])) : ?>
                                                    <h4><?php echo esc_html($data['matrik_process_two_genaral_content_title']); ?></h4>
                                                <?php endif; ?>
                                                <?php if (!empty($data['matrik_process_two_genaral_description'])) : ?>
                                                    <p><?php echo esc_html($data['matrik_process_two_genaral_description']); ?></p>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                        <svg class="vector" width="1334" height="97" viewBox="0 0 1334 97" xmlns="http://www.w3.org/2000/svg">
                            <g filter="url(#filter0_f_1190_191)">
                                <path
                                    d="M5.33333 8C5.33333 9.47276 6.52724 10.6667 8 10.6667C9.47276 10.6667 10.6667 9.47276 10.6667 8C10.6667 6.52724 9.47276 5.33333 8 5.33333C6.52724 5.33333 5.33333 6.52724 5.33333 8ZM432 8H432.5V7.5H432V8ZM432 48H431.5V48.5H432V48ZM880 48H880.5V47.5H880V48ZM880 88H879.5V88.5H880V88ZM1328.35 88.3536C1328.55 88.1583 1328.55 87.8417 1328.35 87.6464L1325.17 84.4645C1324.98 84.2692 1324.66 84.2692 1324.46 84.4645C1324.27 84.6597 1324.27 84.9763 1324.46 85.1716L1327.29 88L1324.46 90.8284C1324.27 91.0237 1324.27 91.3403 1324.46 91.5355C1324.66 91.7308 1324.98 91.7308 1325.17 91.5355L1328.35 88.3536ZM8 8.5H432V7.5H8V8.5ZM431.5 8V48H432.5V8H431.5ZM432 48.5H880V47.5H432V48.5ZM879.5 48V88H880.5V48H879.5ZM880 88.5H1328V87.5H880V88.5Z" />
                            </g>
                            <defs>
                                <filter id="filter0_f_1190_191" x="0.333008" y="0.333496" width="1333.17" height="96.3486"
                                    filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                                    <feFlood flood-opacity="0" result="BackgroundImageFix" />
                                    <feBlend mode="normal" in="SourceGraphic" in2="BackgroundImageFix" result="shape" />
                                    <feGaussianBlur stdDeviation="2.5" result="effect1_foregroundBlur_1190_191" />
                                </filter>
                            </defs>
                        </svg>
                    </div>
                </div>
            </div>
        <?php endif; ?>

<?php

    }
}

Plugin::instance()->widgets_manager->register(new Matrik_Process_Widget());
