<?php

namespace Elementor;

if (!defined('ABSPATH')) exit;  // Exit if accessed directly

use Elementor\core\Schemes;
use Egns_Core\Egns_Helper;

class Matrik_Feature_Widget extends Widget_Base
{

    public function get_name()
    {
        return 'matrik_feature';
    }

    public function get_title()
    {
        return esc_html__('EG Feature', 'matrik-core');
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
            'matrik_feature_genaral',
            [
                'label' => esc_html__('General', 'matrik-core')
            ]
        );

        $this->add_control(
            'matrik_feature_genaral_style_selection',
            [
                'label'   => esc_html__('Select Style', 'matrik-core'),
                'type'    => Controls_Manager::SELECT,
                'options' => [
                    'style_one' => esc_html__('Style One', 'matrik-core'),
                    'style_two' => esc_html__('Style Two', 'matrik-core'),
                ],
                'default' => 'style_one',
            ]
        );

        $this->add_control(
            'matrik_feature_genaral_header_switcher',
            [
                'label' => esc_html__("Show Header Area?", 'matrik-core'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Enable', 'matrik-core'),
                'label_off' => esc_html__('Disable', 'matrik-core'),
                'return_value' => 'yes',
                'default' => 'yes',
                'condition' => [
                    'matrik_feature_genaral_style_selection' => ['style_one'],
                ]
            ]
        );

        $this->add_control(
            'matrik_feature_genaral_background_image',
            [
                'label' => esc_html__('Background Image', 'matrik-core'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
                'media_types' => ['image'],
                'condition' => [
                    'matrik_feature_genaral_style_selection' => ['style_two'],
                ]
            ]
        );

        $this->add_control(
            'matrik_feature_genaral_header_area',
            [
                'label'     => esc_html__('Header Area', 'matrik-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_control(
            'matrik_feature_genaral_subtitle',
            [
                'label'       => esc_html__('Header Subtitle', 'matrik-core'),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default'     => esc_html__('Product Quality', 'matrik-core'),
                'placeholder' => esc_html__('write your subtitle here', 'matrik-core'),
                'label_block' => true,
                'condition' => [
                    'matrik_feature_genaral_header_switcher' => ['yes'],
                    'matrik_feature_genaral_style_selection' => ['style_one', 'style_two'],
                ]
            ]
        );

        $this->add_control(
            'matrik_feature_genaral_title',
            [
                'label'       => esc_html__('Header Title', 'matrik-core'),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default'     => esc_html__('Quality Product at Every Step', 'matrik-core'),
                'placeholder' => esc_html__('write your title here', 'matrik-core'),
                'label_block' => true,
                'condition' => [
                    'matrik_feature_genaral_header_switcher' => ['yes'],
                    'matrik_feature_genaral_style_selection' => ['style_one', 'style_two'],
                ]
            ]
        );

        $this->add_control(
            'matrik_feature_genaral_header_button',
            [
                'label'       => esc_html__('Button Text', 'matrik-core'),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default'     => esc_html__('Contact Us Now', 'matrik-core'),
                'placeholder' => esc_html__('write your button text here', 'matrik-core'),
                'label_block' => true,
                'condition' => [
                    'matrik_feature_genaral_header_switcher' => ['yes'],
                    'matrik_feature_genaral_style_selection' => ['style_one', 'style_two'],
                ]
            ]
        );

        $this->add_control(
            'matrik_feature_genaral_header_button_url',
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
                    'matrik_feature_genaral_header_switcher' => ['yes'],
                    'matrik_feature_genaral_style_selection' => ['style_one', 'style_two'],
                ]
            ]
        );

        $this->add_control(
            'matrik_feature_genaral_content_area',
            [
                'label'     => esc_html__('Content Area', 'matrik-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
                'condition' => [
                    'matrik_feature_genaral_style_selection' => ['style_one'],
                ]
            ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'matrik_feature_genaral_icon_image',
            [
                'label' => esc_html__('Icon Image (SVG)', 'matrik-core'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
                'media_types' => ['image', 'svg'],
            ]
        );

        $repeater->add_control(
            'matrik_feature_genaral_content_title',
            [
                'label'       => esc_html__('Content Title', 'matrik-core'),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default' => wp_kses('Cutting-Edge <br> Machinery', wp_kses_allowed_html('post')),
                'placeholder' => esc_html__('write your text here', 'matrik-core'),
                'label_block' => true,
            ]
        );


        $repeater->add_control(
            'matrik_feature_genaral_content_description',
            [
                'label'       => esc_html__('Content Description', 'matrik-core'),
                'type'        => \Elementor\Controls_Manager::TEXTAREA,
                'default'     => esc_html__('Conduct a thoroug need effortless assessment the understand your current marketing.', 'matrik-core'),
                'placeholder' => esc_html__('write your text here', 'matrik-core'),
                'label_block' => true,
            ]
        );


        $this->add_control(
            'matrik_feature_genaral_content_list',
            [
                'label' => esc_html__('Content List', 'matrik-core'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'matrik_feature_genaral_content_title' => wp_kses('Cutting-Edge <br> Machinery', wp_kses_allowed_html('post')),
                        'matrik_about_genaral_content_area_content_description' => esc_html('Sed nisl eros, condimentum nec risussit amet finibus cons sem fusce. Advantage of thes limited-time offers & start.'),

                    ],
                    [
                        'matrik_feature_genaral_content_title' => wp_kses('Quality Control <br> Systems', wp_kses_allowed_html('post')),
                        'matrik_feature_genaral_content_description' => esc_html('Sed nisl eros, condimentum nec risussit amet finibus cons sem fusce. Advantage of thes limited-time offers & start.'),

                    ],
                    [
                        'matrik_feature_genaral_content_title' => wp_kses('Scalability and <br> Flexibility', wp_kses_allowed_html('post')),
                        'matrik_feature_genaral_content_description' => esc_html('Sed nisl eros, condimentum nec risussit amet finibus cons sem fusce. Advantage of thes limited-time offers & start.'),

                    ],
                    [
                        'matrik_feature_genaral_content_title' => wp_kses('Sustainable <br> Operation &amp; Safety', wp_kses_allowed_html('post')),
                        'matrik_feature_genaral_content_description' => esc_html('Sed nisl eros, condimentum nec risussit amet finibus cons sem fusce. Advantage of thes limited-time offers & start.'),

                    ],
                    [
                        'matrik_feature_genaral_content_title' => wp_kses('Scalability and <br> Flexibility', wp_kses_allowed_html('post')),
                        'matrik_feature_genaral_content_description' => esc_html('Sed nisl eros, condimentum nec risussit amet finibus cons sem fusce. Advantage of thes limited-time offers & start.'),

                    ],

                ],
                'title_field' => '{{{ matrik_feature_genaral_content_title }}}',
                'condition' => [
                    'matrik_feature_genaral_style_selection' => ['style_one'],
                ]
            ]
        );

        $this->add_control(
            'matrik_feature_six_genaral_content_area',
            [
                'label'     => esc_html__('Content Area', 'matrik-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
                'condition' => [
                    'matrik_feature_genaral_style_selection' => ['style_two'],
                ]
            ]
        );

        $ss_repeater = new \Elementor\Repeater();

        $ss_repeater->add_control(
            'matrik_feature_six_genaral_content_title',
            [
                'label'       => esc_html__('Content Title', 'matrik-core'),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default' => wp_kses('Matrik Quality', wp_kses_allowed_html('post')),
                'placeholder' => esc_html__('write your text here', 'matrik-core'),
                'label_block' => true,
            ]
        );

        $ss_repeater->add_control(
            'matrik_feature_six_genaral_content_desc',
            [
                'label'       => esc_html__('Description', 'matrik-core'),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default' => wp_kses('Sed nisl eros, condimentum nec risussit amet finibus cons sem fusce. Advantage of thes limited-time offers & start.', wp_kses_allowed_html('post')),
                'placeholder' => esc_html__('write your description here', 'matrik-core'),
                'label_block' => true,
            ]
        );


        $this->add_control(
            'matrik_feature_six_genaral_content_list',
            [
                'label' => esc_html__('Content List', 'matrik-core'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $ss_repeater->get_controls(),
                'default' => [
                    [
                        'matrik_feature_six_genaral_content_title' => wp_kses('Matrik Quality', wp_kses_allowed_html('post')),
                        'matrik_feature_six_genaral_content_desc' => esc_html('Sed nisl eros, condimentum nec risussit amet finibus cons sem fusce. Advantage of thes limited-time offers & start.'),

                    ],
                    [
                        'matrik_feature_six_genaral_content_title' => wp_kses('Cost Reduction', wp_kses_allowed_html('post')),
                        'matrik_feature_six_genaral_content_desc' => esc_html('Sed nisl eros, condimentum nec risussit amet finibus cons sem fusce. Advantage of thes limited-time offers & start.'),

                    ],
                    [
                        'matrik_feature_six_genaral_content_title' => wp_kses('Improved Safety', wp_kses_allowed_html('post')),
                        'matrik_feature_six_genaral_content_desc' => esc_html('Sed nisl eros, condimentum nec risussit amet finibus cons sem fusce. Advantage of thes limited-time offers & start.'),

                    ],
                    [
                        'matrik_feature_six_genaral_content_title' => wp_kses('Supply Chain', wp_kses_allowed_html('post')),
                        'matrik_feature_six_genaral_content_desc' => esc_html('Sed nisl eros, condimentum nec risussit amet finibus cons sem fusce. Advantage of thes limited-time offers & start.'),

                    ],
                    [
                        'matrik_feature_six_genaral_content_title' => wp_kses('Market Reach', wp_kses_allowed_html('post')),
                        'matrik_feature_six_genaral_content_desc' => esc_html('Sed nisl eros, condimentum nec risussit amet finibus cons sem fusce. Advantage of thes limited-time offers & start.'),

                    ],
                    [
                        'matrik_feature_six_genaral_content_title' => wp_kses('Matrik Quality', wp_kses_allowed_html('post')),
                        'matrik_feature_six_genaral_content_desc' => esc_html('Sed nisl eros, condimentum nec risussit amet finibus cons sem fusce. Advantage of thes limited-time offers & start.'),

                    ],

                ],
                'title_field' => '{{{ matrik_feature_six_genaral_content_title }}}',
                'condition' => [
                    'matrik_feature_genaral_style_selection' => ['style_two'],
                ]
            ]
        );

        $this->end_controls_section();


        //style start

        $this->start_controls_section(
            'matrik_feature_style_one_genaral',
            [
                'label'     => esc_html__('Styles', 'matrik-core'),
                'tab'       => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'matrik_feature_genaral_style_selection' => ['style_one'],
                ]
            ]
        );

        $this->add_control(
            'matrik_feature_style_one_genaral_subtitle',
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
                'name'     => 'matrik_feature_style_one_genaral_subtitle_typ',
                'selector' => '{{WRAPPER}} .section-title > span',

            ]
        );

        $this->add_control(
            'matrik_feature_style_one_genaral_subtitle_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .section-title > span' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_feature_style_one_genaral_subtitle_icon_color',
            [
                'label'     => esc_html__('Icon Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .section-title > span::after' => 'background-color: {{VALUE}};',
                ],
            ]
        );


        $this->add_control(
            'matrik_feature_style_one_genaral_title',
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
                'name'     => 'matrik_feature_style_one_genaral_title_typ',
                'selector' => '{{WRAPPER}} .section-title h2',

            ]
        );

        $this->add_control(
            'matrik_feature_style_one_genaral_title_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .section-title h2' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_feature_style_one_genaral_header_button',
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
                'name'     => 'matrik_feature_style_one_genaral_header_button_typ',
                'selector' => '{{WRAPPER}} .primary-btn2',

            ]
        );

        $this->add_control(
            'matrik_feature_style_one_genaral_header_button_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .primary-btn2' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_feature_style_one_genaral_header_button_hover_color',
            [
                'label'     => esc_html__('Hover Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .primary-btn2:hover' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_feature_style_one_genaral_header_button_icon_color',
            [
                'label'     => esc_html__('Icon Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .primary-btn2 svg' => 'fill: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_feature_style_one_genaral_header_button_hover_icon_color',
            [
                'label'     => esc_html__('Hover Icon Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .primary-btn2:hover svg' => 'fill: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_feature_style_one_genaral_feature_icon',
            [
                'label'     => esc_html__('Feature Icon', 'matrik-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'matrik-core'),
                'name'     => 'matrik_feature_style_one_genaral_feature_icon_typ',
                'selector' => '{{WRAPPER}} .home1-feature-section .feature-wrap .single-feature svg ',

            ]
        );

        $this->add_control(
            'matrik_feature_style_one_genaral_feature_icon_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home1-feature-section .feature-wrap .single-feature svg ' => 'fill: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_feature_style_one_genaral_feature_title',
            [
                'label'     => esc_html__('Feature Title', 'matrik-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'matrik-core'),
                'name'     => 'matrik_feature_style_one_genaral_feature_title_typ',
                'selector' => '{{WRAPPER}} .home1-feature-section .feature-wrap .single-feature h5',

            ]
        );

        $this->add_control(
            'matrik_feature_style_one_genaral_feature_title_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home1-feature-section .feature-wrap .single-feature h5' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_feature_style_one_genaral_feature_description',
            [
                'label'     => esc_html__('Feature Description', 'matrik-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'matrik-core'),
                'name'     => 'matrik_feature_style_one_genaral_feature_description_typ',
                'selector' => '{{WRAPPER}} .home1-feature-section .feature-wrap .single-feature p',

            ]
        );

        $this->add_control(
            'matrik_feature_style_one_genaral_feature_description_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home1-feature-section .feature-wrap .single-feature p' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section();

        // Style Two Start
        $this->start_controls_section(
            'matrik_feature_style_two_genaral',
            [
                'label'     => esc_html__('Styles', 'matrik-core'),
                'tab'       => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'matrik_feature_genaral_style_selection' => ['style_two'],
                ]
            ]
        );

        $this->add_control(
            'matrik_feature_style_two_genaral_subtitle',
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
                'name'     => 'matrik_feature_style_two_genaral_subtitle_typ',
                'selector' => '{{WRAPPER}} .section-title.five > span',

            ]
        );

        $this->add_control(
            'matrik_feature_style_two_genaral_subtitle_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .section-title.five > span' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_feature_style_two_genaral_subtitle_icon_color',
            [
                'label'     => esc_html__('Icon Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .section-title.five > span::after' => 'background-color: {{VALUE}};',
                ],
            ]
        );


        $this->add_control(
            'matrik_feature_style_two_genaral_title',
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
                'name'     => 'matrik_feature_style_two_genaral_title_typ',
                'selector' => '{{WRAPPER}} .section-title h2',

            ]
        );

        $this->add_control(
            'matrik_feature_style_two_genaral_title_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .section-title h2' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_feature_style_two_genaral_title_span_color',
            [
                'label'     => esc_html__('Span Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .section-title.five h2 span' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_feature_style_two_genaral_header_button',
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
                'name'     => 'matrik_feature_style_two_genaral_header_button_typ',
                'selector' => '{{WRAPPER}} .primary-btn2 span',

            ]
        );

        $this->add_control(
            'matrik_feature_style_two_genaral_header_button_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .primary-btn2 span' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_feature_style_two_genaral_header_button_hover_color',
            [
                'label'     => esc_html__('Hover Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home6-feature-section .about-btn-area:hover .primary-btn2 span' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_feature_style_two_genaral_header_button_bg_csolor',
            [
                'label'     => esc_html__('Background Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home6-feature-section .about-btn-area .bg svg' => 'fill: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_feature_style_two_genaral_header_button_stroke_color',
            [
                'label'     => esc_html__('Border Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home6-feature-section .about-btn-area .bg svg' => 'stroke: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_feature_style_two_genaral_header_button_bg_color',
            [
                'label'     => esc_html__('Hover Background Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home6-feature-section .about-btn-area:hover .bg svg' => 'fill: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_feature_style_two_genaral_header_button_hover_stroke_color',
            [
                'label'     => esc_html__('Hover Border Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home6-feature-section .about-btn-area:hover .bg svg' => 'stroke: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_feature_style_two_genaral_header_button_icon_color',
            [
                'label'     => esc_html__('Icon Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .primary-btn2 svg' => 'fill: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_feature_style_two_genaral_header_button_hover_icon_color',
            [
                'label'     => esc_html__('Hover Icon Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home6-feature-section .about-btn-area:hover .primary-btn2 svg' => 'fill: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_feature_style_two_genaral_feature_title',
            [
                'label'     => esc_html__('Feature Title', 'matrik-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'matrik-core'),
                'name'     => 'matrik_feature_style_two_genaral_feature_title_typ',
                'selector' => '{{WRAPPER}} .home6-feature-section .feature-list .single-feature h3',

            ]
        );

        $this->add_control(
            'matrik_feature_style_two_genaral_feature_title_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home6-feature-section .feature-list .single-feature h3' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_feature_style_two_genaral_feature_description',
            [
                'label'     => esc_html__('Feature Description', 'matrik-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'matrik-core'),
                'name'     => 'matrik_feature_style_two_genaral_feature_description_typ',
                'selector' => '{{WRAPPER}} .home6-feature-section .feature-list .single-feature p',

            ]
        );

        $this->add_control(
            'matrik_feature_style_two_genaral_feature_description_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home6-feature-section .feature-list .single-feature p' => 'color: {{VALUE}};',
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
                var swiper = new Swiper(".home1-feature-slider", {
                    slidesPerView: 1,
                    speed: 1500,
                    spaceBetween: 0,
                    autoplay: {
                        delay: 2500, // Autoplay duration in milliseconds
                        disableOnInteraction: false,
                    },
                    navigation: {
                        nextEl: ".process-slider-next",
                        prevEl: ".process-slider-prev",
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
                        },
                        1400: {
                            slidesPerView: 4,
                        },
                    },
                });
            </script>
        <?php endif; ?>

        <?php if ($settings['matrik_feature_genaral_style_selection'] == 'style_one') : ?>
            <div class="home1-feature-section">
                <div class="container">
                    <?php if ($settings['matrik_feature_genaral_header_switcher'] == 'yes') : ?>
                        <div class="row g-4 align-items-center justify-content-between mb-70">
                            <div class="col-lg-6 wow animate fadeInLeft" data-wow-delay="200ms" data-wow-duration="1500ms">
                                <div class="section-title">
                                    <?php if (!empty($settings['matrik_feature_genaral_subtitle'])) : ?>
                                        <span><?php echo esc_html($settings['matrik_feature_genaral_subtitle']); ?></span>
                                    <?php endif; ?>
                                    <?php if (!empty($settings['matrik_feature_genaral_title'])) : ?>
                                        <h2><?php echo esc_html($settings['matrik_feature_genaral_title']); ?></h2>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <?php if (!empty($settings['matrik_feature_genaral_header_button'])) : ?>
                                <div class="col-lg-3 d-flex justify-content-lg-end wow animate fadeInRight" data-wow-delay="200ms" data-wow-duration="1500ms">
                                    <a class="primary-btn2" href="<?php echo esc_url($settings['matrik_feature_genaral_header_button_url']['url']); ?>">
                                        <span><?php echo esc_html($settings['matrik_feature_genaral_header_button']); ?>
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
                    <?php endif; ?>
                    <div class="feature-wrap">
                        <div class="swiper home1-feature-slider">
                            <div class="swiper-wrapper">
                                <?php foreach ($settings['matrik_feature_genaral_content_list'] as $data) : ?>
                                    <div class="swiper-slide">
                                        <div class="single-feature">
                                            <?php
                                            $svg_url = $data['matrik_feature_genaral_icon_image']['url'];

                                            if (pathinfo($svg_url, PATHINFO_EXTENSION) === 'svg') {
                                                $svg_path = str_replace(home_url('/'), ABSPATH, $svg_url);

                                                if (file_exists($svg_path)) {
                                                    $svg_content = file_get_contents($svg_path);

                                                    // Allow only safe SVG tags/attributes
                                                    $allowed_svg_tags = [
                                                        'svg' => [
                                                            'xmlns' => true,
                                                            'width' => true,
                                                            'height' => true,
                                                            'viewBox' => true,
                                                            'fill' => true,
                                                            'stroke' => true,
                                                            'class' => true,
                                                            'aria-hidden' => true,
                                                            'role' => true,
                                                            'focusable' => true,
                                                        ],
                                                        'g' => ['fill' => true],
                                                        'path' => [
                                                            'd' => true,
                                                            'fill' => true,
                                                            'stroke' => true,
                                                            'stroke-width' => true,
                                                        ],
                                                        'title' => [],
                                                        'desc' => [],
                                                        'use' => [
                                                            'xlink:href' => true,
                                                        ],
                                                    ];

                                                    echo wp_kses($svg_content, $allowed_svg_tags);
                                                }
                                            } else { ?>

                                                <img src="<?php echo esc_url($svg_url); ?>" alt="<?php echo esc_attr__('icon-image', 'matrik-core'); ?>" />
                                            <?php
                                            }
                                            ?>
                                            <?php if (!empty($data['matrik_feature_genaral_content_title'])) : ?>
                                                <h5><?php echo wp_kses($data['matrik_feature_genaral_content_title'], wp_kses_allowed_html('post')); ?></h5>
                                            <?php endif; ?>
                                            <?php if (!empty($data['matrik_feature_genaral_content_description'])) : ?>
                                                <p><?php echo esc_html($data['matrik_feature_genaral_content_description']); ?></p>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>

        <?php if ($settings['matrik_feature_genaral_style_selection'] == 'style_two') : ?>
            <div class="home6-feature-section" <?php if (!empty($settings['matrik_feature_genaral_background_image']['url'])) : ?>style="background-image: url(<?php echo esc_url($settings['matrik_feature_genaral_background_image']['url']); ?>), linear-gradient(180deg, #ECEDF8 0%, #ECEDF8 100%)" <?php endif; ?>>
                <div class="container">
                    <div class="row g-4 align-items-center justify-content-between mb-70">
                        <div class="col-lg-7 wow animate fadeInLeft" data-wow-delay="200ms" data-wow-duration="1500ms" style="visibility: visible; animation-duration: 1500ms; animation-delay: 200ms;">
                            <?php if (!empty($settings['matrik_feature_genaral_title'])) : ?>
                                <div class="section-title five">
                                    <?php if (!empty($settings['matrik_feature_genaral_subtitle'])) : ?>
                                        <span><?php echo esc_html($settings['matrik_feature_genaral_subtitle']); ?></span>
                                    <?php endif; ?>
                                    <h2><?php echo wp_kses($settings['matrik_feature_genaral_title'], wp_kses_allowed_html('post')); ?></h2>
                                </div>
                            <?php endif; ?>
                        </div>
                        <?php if (!empty($settings['matrik_feature_genaral_header_button'])) : ?>
                            <div class="col-lg-3 d-flex justify-content-lg-end">
                                <a class="about-btn-area btn_wrapper" href="<?php if (!empty($settings['matrik_feature_genaral_header_button_url']['url'])) {
                                                                                echo esc_url($settings['matrik_feature_genaral_header_button_url']['url']);
                                                                            } ?>" style="translate: none; rotate: none; scale: none; transform: translate(0px); opacity: 1;">
                                    <div class="bg">
                                        <svg width="214" height="214" viewBox="0 0 214 214" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M99.1061 2.41945C104.011 -0.326338 109.989 -0.326337 114.894 2.41945L117.658 3.96699C121.014 5.84584 124.93 6.46609 128.702 5.71624L131.81 5.09862C137.323 4.00279 143.009 5.85038 146.825 9.97734L148.975 12.3033C151.587 15.1273 155.119 16.9273 158.939 17.3799L162.085 17.7526C167.666 18.414 172.503 21.9283 174.857 27.0325L176.184 29.9092C177.795 33.4018 180.598 36.2054 184.091 37.8161L186.967 39.1428C192.072 41.4966 195.586 46.3337 196.247 51.9154L196.62 55.0613C197.073 58.8807 198.873 62.4135 201.697 65.0246L204.023 67.1753C208.15 70.9912 209.997 76.6775 208.901 82.1904L208.284 85.2975C207.534 89.0698 208.154 92.9859 210.033 96.3419L211.581 99.1061C214.326 104.011 214.326 109.989 211.581 114.894L210.033 117.658C208.154 121.014 207.534 124.93 208.284 128.702L208.901 131.81C209.997 137.323 208.15 143.009 204.023 146.825L201.697 148.975C198.873 151.587 197.073 155.119 196.62 158.939L196.247 162.085C195.586 167.666 192.072 172.503 186.967 174.857L184.091 176.184C180.598 177.795 177.795 180.598 176.184 184.091L174.857 186.967C172.503 192.072 167.666 195.586 162.085 196.247L158.939 196.62C155.119 197.073 151.587 198.873 148.975 201.697L146.825 204.023C143.009 208.15 137.323 209.997 131.81 208.901L128.702 208.284C124.93 207.534 121.014 208.154 117.658 210.033L114.894 211.581C109.989 214.326 104.011 214.326 99.1061 211.581L96.3419 210.033C92.9859 208.154 89.0698 207.534 85.2975 208.284L82.1904 208.901C76.6775 209.997 70.9912 208.15 67.1753 204.023L65.0246 201.697C62.4135 198.873 58.8807 197.073 55.0613 196.62L51.9154 196.247C46.3337 195.586 41.4966 192.072 39.1428 186.968L37.8161 184.091C36.2054 180.598 33.4018 177.795 29.9092 176.184L27.0325 174.857C21.9283 172.503 18.414 167.666 17.7526 162.085L17.3799 158.939C16.9273 155.119 15.1273 151.587 12.3033 148.975L9.97734 146.825C5.85038 143.009 4.00279 137.323 5.09862 131.81L5.71624 128.702C6.46609 124.93 5.84584 121.014 3.96699 117.658L2.41945 114.894C-0.326338 109.989 -0.326337 104.011 2.41945 99.1061L3.96699 96.3419C5.84584 92.9859 6.46609 89.0698 5.71624 85.2975L5.09862 82.1904C4.00279 76.6775 5.85038 70.9912 9.97734 67.1753L12.3033 65.0246C15.1273 62.4135 16.9273 58.8807 17.3799 55.0613L17.7526 51.9154C18.414 46.3337 21.9283 41.4966 27.0325 39.1428L29.9092 37.8161C33.4018 36.2054 36.2054 33.4018 37.8161 29.9092L39.1428 27.0325C41.4966 21.9283 46.3337 18.414 51.9154 17.7526L55.0613 17.3799C58.8807 16.9273 62.4135 15.1273 65.0246 12.3033L67.1753 9.97734C70.9912 5.85038 76.6775 4.00279 82.1904 5.09862L85.2975 5.71624C89.0698 6.46609 92.9859 5.84584 96.3419 3.96699L99.1061 2.41945Z"></path>
                                            <path d="M99.3503 2.85573C104.103 0.194902 109.897 0.194903 114.65 2.85573L117.414 4.40327C120.874 6.34026 124.911 6.97969 128.8 6.20665L131.907 5.58903C137.249 4.5271 142.76 6.31753 146.458 10.3168L148.608 12.6428C151.3 15.5541 154.942 17.4098 158.88 17.8764L162.026 18.2491C167.435 18.8901 172.122 22.2957 174.403 27.2419L175.73 30.1186C177.39 33.7193 180.281 36.6097 183.881 38.2702L186.758 39.5968C191.704 41.8778 195.11 46.5652 195.751 51.9743L196.124 55.1201C196.59 59.0577 198.446 62.6998 201.357 65.3917L203.683 67.5424C207.682 71.2402 209.473 76.7506 208.411 82.0929L207.793 85.2001C207.02 89.0891 207.66 93.1263 209.597 96.5861L211.144 99.3503C213.805 104.103 213.805 109.897 211.144 114.65L209.597 117.414C207.66 120.874 207.02 124.911 207.793 128.8L208.411 131.907C209.473 137.249 207.682 142.76 203.683 146.458L201.357 148.608C198.446 151.3 196.59 154.942 196.124 158.88L195.751 162.026C195.11 167.435 191.704 172.122 186.758 174.403L183.881 175.73C180.281 177.39 177.39 180.281 175.73 183.881L174.403 186.758C172.122 191.704 167.435 195.11 162.026 195.751L158.88 196.124C154.942 196.59 151.3 198.446 148.608 201.357L146.458 203.683C142.76 207.682 137.249 209.473 131.907 208.411L128.8 207.793C124.911 207.02 120.874 207.66 117.414 209.597L114.65 211.144C109.897 213.805 104.103 213.805 99.3503 211.144L96.5861 209.597C93.1263 207.66 89.0891 207.02 85.2001 207.793L82.0929 208.411C76.7506 209.473 71.2402 207.682 67.5424 203.683L65.3917 201.357C62.6998 198.446 59.0577 196.59 55.1201 196.124L51.9743 195.751C46.5652 195.11 41.8778 191.704 39.5968 186.758L38.2702 183.881C36.6097 180.281 33.7193 177.39 30.1186 175.73L27.2419 174.403C22.2957 172.122 18.8901 167.435 18.2491 162.026L17.8764 158.88C17.4098 154.942 15.5541 151.3 12.6428 148.608L10.3168 146.458C6.31753 142.76 4.5271 137.249 5.58903 131.907L6.20665 128.8C6.97969 124.911 6.34026 120.874 4.40327 117.414L2.85573 114.65C0.194902 109.897 0.194903 104.103 2.85573 99.3503L4.40327 96.5861C6.34026 93.1263 6.97969 89.0891 6.20665 85.2L5.58903 82.0929C4.5271 76.7506 6.31753 71.2402 10.3168 67.5424L12.6428 65.3917C15.5541 62.6998 17.4098 59.0577 17.8764 55.1201L18.2491 51.9742C18.8901 46.5652 22.2957 41.8778 27.2419 39.5968L30.1186 38.2702C33.7193 36.6097 36.6097 33.7193 38.2702 30.1186L39.5968 27.2419C41.8778 22.2957 46.5652 18.8901 51.9742 18.2491L55.1201 17.8764C59.0577 17.4098 62.6998 15.5541 65.3917 12.6428L67.5424 10.3168C71.2402 6.31753 76.7506 4.5271 82.0929 5.58903L85.2 6.20665C89.0891 6.97969 93.1263 6.34026 96.5861 4.40327L99.3503 2.85573Z"></path>
                                        </svg>
                                    </div>
                                    <div class="primary-btn2">
                                        <span><?php echo esc_html($settings['matrik_feature_genaral_header_button']); ?></span>
                                        <svg class="arrow" width="23" height="23" viewBox="0 0 23 23" xmlns="http://www.w3.org/2000/svg">
                                            <g>
                                                <path d="M0.113861 0H22.9999V4.28425L4.32671 22.9997L0 18.7154L12.7524 6.08815L0.113861 6.20089V0Z"></path>
                                                <path d="M23 22.9996V8.56848L16.8516 14.6566V22.9996H23Z"></path>
                                            </g>
                                        </svg>
                                    </div>
                                </a>
                            </div>
                        <?php endif; ?>
                    </div>
                    <?php if (!empty($settings['matrik_feature_six_genaral_content_list'])) : ?>
                        <div class="row justify-content-lg-end">
                            <div class="col-xxl-9 col-xl-10 col-lg-11">
                                <ul class="feature-list">
                                    <?php foreach ($settings['matrik_feature_six_genaral_content_list'] as $item) : ?>
                                        <li class="single-feature wow animate fadeInDown" data-wow-delay="200ms" data-wow-duration="1500ms" style="visibility: visible; animation-duration: 1500ms; animation-delay: 200ms;">
                                            <?php if (!empty($item['matrik_feature_six_genaral_content_title'])) : ?>
                                                <h3><?php echo esc_html($item['matrik_feature_six_genaral_content_title']); ?></h3>
                                            <?php endif; ?>
                                            <?php if (!empty($item['matrik_feature_six_genaral_content_desc'])) : ?>
                                                <p><?php echo esc_html($item['matrik_feature_six_genaral_content_desc']); ?></p>
                                            <?php endif; ?>
                                        </li>
                                    <?php endforeach; ?>
                                </ul>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
                <svg class="arrow-vector" width="420" height="320" viewBox="0 0 420 320" xmlns="http://www.w3.org/2000/svg">
                    <path d="M420 15L364.01 0.910809L379.804 56.4438L420 15ZM4.85321 319.703C22.1656 249.84 120.668 111.134 378.19 32.0875L375.256 22.5277C115.6 102.23 13.5717 242.945 -4.85321 317.297L4.85321 319.703Z"></path>
                </svg>
            </div>
        <?php endif; ?>

<?php

    }
}

Plugin::instance()->widgets_manager->register(new Matrik_Feature_Widget());
