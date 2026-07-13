<?php

namespace Elementor;

if (!defined('ABSPATH')) exit;  // Exit if accessed directly

use Elementor\core\Schemes;
use Egns_Core\Egns_Helper;

class Matrik_FAQ_Widget extends Widget_Base
{
    private function number_to_word($number)
    {
        $words = [
            'One',
            'Two',
            'Three',
            'Four',
            'Five',
            'Six',
            'Seven',
            'Eight',
            'Nine',
            'Ten',
            'Eleven',
            'Twelve',
            'Thirteen',
            'Fourteen',
            'Fifteen',
            'Sixteen',
            'Seventeen',
            'Eighteen',
            'Nineteen',
            'Twenty',
            'TwentyOne',
            'TwentyTwo',
            'TwentyThree',
            'TwentyFour',
            'TwentyFive'
        ];

        return isset($words[$number]) ? $words[$number] : 'Item' . $number;
    }

    public function get_name()
    {
        return 'matrik_faq';
    }

    public function get_title()
    {
        return esc_html__('EG FAQ', 'matrik-core');
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
            'matrik_faq_genaral',
            [
                'label' => esc_html__('General', 'matrik-core')
            ]
        );

        $this->add_control(
            'matrik_faq_genaral_style_selection',
            [
                'label'   => esc_html__('Select Style', 'matrik-core'),
                'type'    => Controls_Manager::SELECT,
                'options' => [
                    'style_one' => esc_html__('Style One', 'matrik-core'),
                    'style_two' => esc_html__('Style Two', 'matrik-core'),
                    'style_three' => esc_html__('Style Three', 'matrik-core'),
                    'style_six' => esc_html__('Style Six', 'matrik-core'),
                    'style_seven' => esc_html__('Style Seven', 'matrik-core'),
                ],
                'default' => 'style_one',
            ]
        );

        $this->add_control(
            'matrik_faq_genaral_header_switcher',
            [
                'label' => esc_html__("Show Header Area?", 'matrik-core'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Enable', 'matrik-core'),
                'label_off' => esc_html__('Disable', 'matrik-core'),
                'return_value' => 'yes',
                'default' => 'yes',
                'condition' => [
                    'matrik_faq_genaral_style_selection' => ['style_one', 'style_six'],
                ]
            ]
        );

        $this->add_control(
            'matrik_faq_genaral_header_area',
            [
                'label'     => esc_html__('Header Area', 'matrik-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_control(
            'matrik_faq_genaral_subtitle',
            [
                'label'       => esc_html__('Header Subtitle', 'matrik-core'),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default'     => esc_html__('Answer your questions', 'matrik-core'),
                'placeholder' => esc_html__('write your subtitle here', 'matrik-core'),
                'label_block' => true,
                'condition' => [
                    'matrik_faq_genaral_header_switcher' => ['yes'],
                    'matrik_faq_genaral_style_selection' => ['style_one', 'style_six'],
                ]
            ]
        );

        $this->add_control(
            'matrik_faq_genaral_title',
            [
                'label'       => esc_html__('Header Title', 'matrik-core'),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default'     => esc_html__('Frequently Asked Questions', 'matrik-core'),
                'placeholder' => esc_html__('write your title here', 'matrik-core'),
                'label_block' => true,
                'condition' => [
                    'matrik_faq_genaral_header_switcher' => ['yes'],
                    'matrik_faq_genaral_style_selection' => ['style_one', 'style_six', 'style_seven'],
                ]
            ]
        );

        $this->add_control(
            'matrik_faq_genaral_description',
            [
                'label'       => esc_html__('Header Description', 'matrik-core'),
                'type'        => \Elementor\Controls_Manager::TEXTAREA,
                'default'     => esc_html__('Yes, we offer a full range of design and engineering services tailored to meet the specific needs of each project. Our experienced team works closely with clients from concept to completion, delivering innovative and practical solutions across various industries.', 'matrik-core'),
                'placeholder' => esc_html__('Write your description here', 'matrik-core'),
                'label_block' => true,
                'condition' => [
                    'matrik_faq_genaral_header_switcher' => ['yes'],
                    'matrik_faq_genaral_style_selection' => ['style_six'],
                ]
            ]
        );

        $this->add_control(
            'matrik_faq_genaral_header_button',
            [
                'label'       => esc_html__('Button Text', 'matrik-core'),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default'     => esc_html__('Talk Any Question', 'matrik-core'),
                'placeholder' => esc_html__('write your button text here', 'matrik-core'),
                'label_block' => true,
                'condition' => [
                    'matrik_faq_genaral_header_switcher' => ['yes'],
                    'matrik_faq_genaral_style_selection' => ['style_one', 'style_seven'],
                ]
            ]
        );

        $this->add_control(
            'matrik_faq_genaral_header_button_url',
            [
                'label'   => esc_html__('Button URL/Link', 'matrik-core'),
                'type'    => \Elementor\Controls_Manager::URL,
                'options' => ['url', 'is_external', 'nofollow'],
                'default' => [
                    'url'         => '#',
                    'is_external' => true,
                    'nofollow'    => true,
                ],
                'label_block' => true,
                'condition' => [
                    'matrik_faq_genaral_header_switcher' => ['yes'],
                    'matrik_faq_genaral_style_selection' => ['style_one', 'style_seven'],
                ]
            ]
        );

        $this->add_control(
            'matrik_faq_genaral_banner_image',
            [
                'label' => esc_html__('Banner Image', 'matrik-core'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
                'media_types' => ['image'],
                'matrik_faq_genaral_style_selection' => ['style_one', 'style_seven'],
            ]
        );

        $this->add_control(
            'matrik_faq_genaral_accordion_area',
            [
                'label'     => esc_html__('Accordion Area', 'matrik-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $tab_repeater = new \Elementor\Repeater();

        $this->add_control(
            'matrik_faq_genaral_faq_switcher',
            [
                'label' => esc_html__("Need Tab Area?", 'matrik-core'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Enable', 'matrik-core'),
                'label_off' => esc_html__('Disable', 'matrik-core'),
                'return_value' => 'yes',
                'default' => 'yes',
                'condition' => [
                    'matrik_faq_genaral_style_selection' => ['style_six'],
                ]
            ]
        );

        $tab_repeater->add_control(
            'matrik_faq_general_accordion_tab_nav_text',
            [
                'label'     => esc_html__('Tab Button Name', 'matrik-core'),
                'type'      => Controls_Manager::TEXT,
                'default'   => esc_html__('General', 'matrik-core'),
                'label_block' => true,
            ]
        );
        $this->add_control(
            'matrik_faq_general_accordion_tab',
            [
                'label'     => esc_html__('Tabs', 'matrik-core'),
                'type'      => Controls_Manager::REPEATER,
                'fields'    => $tab_repeater->get_controls(),
                'default'    => [
                    [
                        'matrik_faq_general_accordion_tab_nav_text'  => esc_html('General'),
                    ],
                    [
                        'matrik_faq_general_accordion_tab_nav_text'  => esc_html('Payment'),
                    ],
                    [
                        'matrik_faq_general_accordion_tab_nav_text'  => esc_html('Support'),
                    ],
                ],
                'title_field'   => '{{{matrik_faq_general_accordion_tab_nav_text}}}',
                'condition' => [
                    'matrik_faq_genaral_faq_switcher' => ['yes'],
                    'matrik_faq_genaral_style_selection' => ['style_six'],
                ]
            ]
        );

        // Repeater
        $repeater = new \Elementor\Repeater();

        // accordion title
        $repeater->add_control(
            'matrik_faq_genaral_accordion_area_question',
            [
                'label' => esc_html__('Question', 'matrik-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('What services does your agency offer?', 'matrik-core'),
                'label_block' => true,
            ]
        );

        // accordion Description
        $repeater->add_control(
            'matrik_faq_genaral_accordion_area_answer',
            [
                'label' => esc_html__('Answer', 'matrik-core'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => wp_kses('We specialize in a full range of digital services including <span>web design and development, digital marketing, SEO, social media management, content creation, branding, UI/UX design, and more.</span> Visit our <a href="service.html">[Services Page]</a> for a complete list of what we offer.', wp_kses_allowed_html('post')),
                'placeholder' => esc_html__('Type your description here', 'matrik-core'),
            ]
        );

        $this->add_control(
            'matrik_faq_genaral_accordion_area_list',
            [
                'label' => esc_html__('FAQ List', 'matrik-core'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'matrik_faq_genaral_accordion_area_question' => esc_html('01. Do you provide design and Industry services?'),
                        'matrik_faq_genaral_accordion_area_answer' => wp_kses('Yes, we provide comprehensive design and industry services tailored to meet your needs. Our team of experts delivers innovative solutions in design, development, and implementation, ensuring high-quality results and client satisfaction.', wp_kses_allowed_html('post')),
                    ],
                    [
                        'matrik_faq_genaral_accordion_area_question' => esc_html('02. Is Matrik suitable for my business?'),
                        'matrik_faq_genaral_accordion_area_answer' => wp_kses('Discover if Matrik is the right fit for your business by exploring its tailored solutions for various industries and unique needs.', wp_kses_allowed_html('post')),
                    ],
                    [
                        'matrik_faq_genaral_accordion_area_question' => esc_html('03. What is your typical project timeline?'),
                        'matrik_faq_genaral_accordion_area_answer' => wp_kses("Discover the typical project timeline for our construction services, outlining each phase from planning to completion, ensuring timely and efficient project delivery.", wp_kses_allowed_html('post')),
                    ],
                    [
                        'matrik_faq_genaral_accordion_area_question' => esc_html('04. How do you handle permits and inspections?'),
                        'matrik_faq_genaral_accordion_area_answer' => wp_kses("We handle all necessary permits and inspections for your project, ensuring full compliance with local regulations and smooth progress throughout the construction process.", wp_kses_allowed_html('post')),
                    ],
                    [
                        'matrik_faq_genaral_accordion_area_question' => esc_html('05. How do you handle waste disposal and recycling?'),
                        'matrik_faq_genaral_accordion_area_answer' => wp_kses("At our construction sites, we prioritize responsible waste disposal and recycling by adhering to local regulations, implementing sustainable practices, and partnering with certified waste management services to minimize environmental impact.", wp_kses_allowed_html('post')),
                    ],
                    [
                        'matrik_faq_genaral_accordion_area_question' => esc_html('06. How do ensure buildings are structurally safe?'),
                        'matrik_faq_genaral_accordion_area_answer' => wp_kses("Learn how we prioritize safety in construction by following strict structural guidelines and using high-quality materials to ensure buildings are secure and reliable.", wp_kses_allowed_html('post')),
                    ],
                ],
                'title_field' => '{{{ matrik_faq_genaral_accordion_area_question }}}',
                'condition' => [
                    'matrik_faq_genaral_style_selection' => ['style_one', 'style_six', 'style_seven'],
                ]
            ]
        );

        // Repeater Two
        $repeaterTwo = new \Elementor\Repeater();

        // accordion title
        $repeaterTwo->add_control(
            'matrik_faq_genaral_accordion_area_two_question',
            [
                'label' => esc_html__('Question', 'matrik-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('What services does your agency offer?', 'matrik-core'),
                'label_block' => true,
            ]
        );

        // accordion Description
        $repeaterTwo->add_control(
            'matrik_faq_genaral_accordion_area_two_answer',
            [
                'label' => esc_html__('Answer', 'matrik-core'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => wp_kses('We specialize in a full range of digital services including <span>web design and development, digital marketing, SEO, social media management, content creation, branding, UI/UX design, and more.</span> Visit our <a href="service.html">[Services Page]</a> for a complete list of what we offer.', wp_kses_allowed_html('post')),
                'placeholder' => esc_html__('Type your description here', 'matrik-core'),
            ]
        );

        $this->add_control(
            'matrik_faq_genaral_accordion_area_two_list',
            [
                'label' => esc_html__('FAQ List Two', 'matrik-core'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeaterTwo->get_controls(),
                'default' => [
                    [
                        'matrik_faq_genaral_accordion_area_two_question' => esc_html('01. Where you provide design and Industry services?'),
                        'matrik_faq_genaral_accordion_area_two_answer' => wp_kses('Worldwide we provide comprehensive design and industry services tailored to meet your needs. Our team of experts delivers innovative solutions in design, development, and implementation, ensuring high-quality results and client satisfaction.', wp_kses_allowed_html('post')),
                    ],
                    [
                        'matrik_faq_genaral_accordion_area_two_question' => esc_html('02. How is Matrik suitable for my business?'),
                        'matrik_faq_genaral_accordion_area_two_answer' => wp_kses('Discover if Matrik is the right fit for your business by exploring its tailored solutions for various industries and unique needs.', wp_kses_allowed_html('post')),
                    ],
                    [
                        'matrik_faq_genaral_accordion_area_two_question' => esc_html('03. What is your typical project timeline?'),
                        'matrik_faq_genaral_accordion_area_two_answer' => wp_kses("Discover the typical project timeline for our construction services, outlining each phase from planning to completion, ensuring timely and efficient project delivery.", wp_kses_allowed_html('post')),
                    ],
                    [
                        'matrik_faq_genaral_accordion_area_two_question' => esc_html('04. How do you handle permits and inspections?'),
                        'matrik_faq_genaral_accordion_area_two_answer' => wp_kses("We handle all necessary permits and inspections for your project, ensuring full compliance with local regulations and smooth progress throughout the construction process.", wp_kses_allowed_html('post')),
                    ],
                    [
                        'matrik_faq_genaral_accordion_area_two_question' => esc_html('05. How do you handle waste disposal and recycling?'),
                        'matrik_faq_genaral_accordion_area_two_answer' => wp_kses("At our construction sites, we prioritize responsible waste disposal and recycling by adhering to local regulations, implementing sustainable practices, and partnering with certified waste management services to minimize environmental impact.", wp_kses_allowed_html('post')),
                    ],
                    [
                        'matrik_faq_genaral_accordion_area_two_question' => esc_html('06. How do ensure buildings are structurally safe?'),
                        'matrik_faq_genaral_accordion_area_two_answer' => wp_kses("Learn how we prioritize safety in construction by following strict structural guidelines and using high-quality materials to ensure buildings are secure and reliable.", wp_kses_allowed_html('post')),
                    ],
                ],
                'title_field' => '{{{ matrik_faq_genaral_accordion_area_two_question }}}',
                'condition' => [
                    'matrik_faq_genaral_faq_switcher' => ['yes'],
                    'matrik_faq_genaral_style_selection' => ['style_six'],
                ]
            ]
        );

        // Repeater Three
        $repeaterThree = new \Elementor\Repeater();

        // accordion title
        $repeaterThree->add_control(
            'matrik_faq_genaral_accordion_area_three_question',
            [
                'label' => esc_html__('Question', 'matrik-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('What services does your agency offer?', 'matrik-core'),
                'label_block' => true,
            ]
        );

        // accordion Description
        $repeaterThree->add_control(
            'matrik_faq_genaral_accordion_area_three_answer',
            [
                'label' => esc_html__('Answer', 'matrik-core'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => wp_kses('We specialize in a full range of digital services including <span>web design and development, digital marketing, SEO, social media management, content creation, branding, UI/UX design, and more.</span> Visit our <a href="service.html">[Services Page]</a> for a complete list of what we offer.', wp_kses_allowed_html('post')),
                'placeholder' => esc_html__('Type your description here', 'matrik-core'),
            ]
        );

        $this->add_control(
            'matrik_faq_genaral_accordion_area_three_list',
            [
                'label' => esc_html__('FAQ List Three', 'matrik-core'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeaterThree->get_controls(),
                'default' => [
                    [
                        'matrik_faq_genaral_accordion_area_three_question' => esc_html('01. When do you provide design and Industry services?'),
                        'matrik_faq_genaral_accordion_area_three_answer' => wp_kses('Worldwide we provide comprehensive design and industry services tailored to meet your needs. Our team of experts delivers innovative solutions in design, development, and implementation, ensuring high-quality results and client satisfaction.', wp_kses_allowed_html('post')),
                    ],
                    [
                        'matrik_faq_genaral_accordion_area_three_question' => esc_html('02. How is Matrik suitable for my business?'),
                        'matrik_faq_genaral_accordion_area_three_answer' => wp_kses('Discover if Matrik is the right fit for your business by exploring its tailored solutions for various industries and unique needs.', wp_kses_allowed_html('post')),
                    ],
                    [
                        'matrik_faq_genaral_accordion_area_three_question' => esc_html('03. What is your typical project timeline?'),
                        'matrik_faq_genaral_accordion_area_three_answer' => wp_kses("Discover the typical project timeline for our construction services, outlining each phase from planning to completion, ensuring timely and efficient project delivery.", wp_kses_allowed_html('post')),
                    ],
                    [
                        'matrik_faq_genaral_accordion_area_three_question' => esc_html('04. How do you handle permits and inspections?'),
                        'matrik_faq_genaral_accordion_area_three_answer' => wp_kses("We handle all necessary permits and inspections for your project, ensuring full compliance with local regulations and smooth progress throughout the construction process.", wp_kses_allowed_html('post')),
                    ],
                    [
                        'matrik_faq_genaral_accordion_area_three_question' => esc_html('05. How do you handle waste disposal and recycling?'),
                        'matrik_faq_genaral_accordion_area_three_answer' => wp_kses("At our construction sites, we prioritize responsible waste disposal and recycling by adhering to local regulations, implementing sustainable practices, and partnering with certified waste management services to minimize environmental impact.", wp_kses_allowed_html('post')),
                    ],
                    [
                        'matrik_faq_genaral_accordion_area_three_question' => esc_html('06. How do ensure buildings are structurally safe?'),
                        'matrik_faq_genaral_accordion_area_three_answer' => wp_kses("Learn how we prioritize safety in construction by following strict structural guidelines and using high-quality materials to ensure buildings are secure and reliable.", wp_kses_allowed_html('post')),
                    ],
                ],
                'title_field' => '{{{ matrik_faq_genaral_accordion_area_three_question }}}',
                'condition' => [
                    'matrik_faq_genaral_faq_switcher' => ['yes'],
                    'matrik_faq_genaral_style_selection' => ['style_six'],
                ]
            ]
        );


        $this->end_controls_section();

        //style One start

        $this->start_controls_section(
            'matrik_faq_style_one_general',
            [
                'label'     => esc_html__('Styles', 'matrik-core'),
                'tab'       => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'matrik_faq_genaral_style_selection' => ['style_one'],
                ]
            ]
        );

        $this->add_control(
            'matrik_faq_style_one_general_subtitle',
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
                'name'     => 'matrik_faq_style_one_general_subtitle_typ',
                'selector' => '{{WRAPPER}} .section-title > span',

            ]
        );

        $this->add_control(
            'matrik_faq_style_one_general_subtitle_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .section-title > span' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_faq_style_one_general_subtitle_icon_color',
            [
                'label'     => esc_html__('Icon Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .section-title > span::after' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_faq_style_one_general_title',
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
                'name'     => 'matrik_faq_style_one_general_title_typ',
                'selector' => '{{WRAPPER}} .section-title h2',

            ]
        );

        $this->add_control(
            'matrik_faq_style_one_general_title_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .section-title h2' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_faq_style_one_general_header_button',
            [
                'label'     => esc_html__('Header Button', 'matrik-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        // Tabs
        $this->start_controls_tabs(
            'matrik_faq_style_one_general_header_button_tabs'
        );

        $this->start_controls_tab(
            'matrik_faq_style_one_general_header_button_tabs_normal_tab',
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
                'name'     => 'matrik_faq_style_one_general_header_button_tabs_normal_tab_typ',
                'selector' => '{{WRAPPER}} .primary-btn1.transparent',

            ]
        );

        $this->add_control(
            'matrik_faq_style_one_general_header_button_tabs_normal_tab_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .primary-btn1.transparent' => 'color: {{VALUE}};',

                ],
            ]
        );

        $this->add_control(
            'matrik_faq_style_one_general_header_button_tabs_normal_tab_icon_color',
            [
                'label'     => esc_html__('Icon Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .primary-btn1 .arrow' => 'fill: {{VALUE}};',

                ],
            ]
        );

        $this->add_control(
            'matrik_faq_style_one_general_header_button_tabs_normal_tab_border_color',
            [
                'label'     => esc_html__('Border Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}}  .primary-btn1.transparent' => 'border: 1px solid {{VALUE}};',

                ],
            ]
        );

        $this->add_control(
            'matrik_faq_style_one_general_header_button_tabs_normal_tab_border_bg_color',
            [
                'label'     => esc_html__('Background Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}}  .primary-btn1.transparent' => 'background-color: {{VALUE}};',

                ],
            ]
        );

        $this->add_responsive_control(
            'matrik_faq_style_one_general_header_button_tabs_normal_tab_margin',
            [
                'label' => esc_html__(
                    'Margin',
                    'matrik-core'
                ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .primary-btn1.transparent' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'matrik_faq_style_one_general_header_button_tabs_normal_tab_padding',
            [
                'label'      => esc_html__(
                    'Padding',
                    'matrik-core'
                ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .primary-btn1.transparent' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        $this->end_controls_tab();

        // Hover start
        $this->start_controls_tab(
            'matrik_faq_style_one_general_header_button_tabs_hover_tab',
            [
                'label' => esc_html__('Hover', 'matrik-core'),
            ]
        );

        $this->add_control(
            'matrik_faq_style_one_general_header_button_tabs_hover_tab_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}}  .primary-btn1.transparent:hover' => 'color: {{VALUE}};',

                ],
            ]
        );

        $this->add_control(
            'matrik_faq_style_one_general_header_button_tabs_hover_tab_icon_color',
            [
                'label'     => esc_html__('Icon Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}}  .primary-btn1:hover .arrow' => 'fill: {{VALUE}};',

                ],
            ]
        );

        $this->add_control(
            'matrik_faq_style_one_general_header_button_tabs_hover_tab_border_color',
            [
                'label'     => esc_html__('Border Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .primary-btn1.transparent:hover' => 'border-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_faq_style_one_general_header_button_tabs_hover_tab_background_color',
            [
                'label'     => esc_html__('Background Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .primary-btn1.transparent::after' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_tab();
        $this->end_controls_tabs();



        $this->add_control(
            'matrik_faq_style_one_general_faq_title',
            [
                'label'     => esc_html__('FAQ Title', 'matrik-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'matrik-core'),
                'name'     => 'matrik_faq_style_one_general_faq_title_typ',
                'selector' => '{{WRAPPER}} .faq-wrap .accordion .accordion-item .accordion-header .accordion-button',

            ]
        );

        $this->add_control(
            'matrik_faq_style_one_general_faq_title_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .faq-wrap .accordion .accordion-item .accordion-header .accordion-button' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_faq_style_one_general_faq_description',
            [
                'label'     => esc_html__('FAQ Description', 'matrik-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'matrik-core'),
                'name'     => 'matrik_faq_style_one_general_faq_description_typ',
                'selector' => '{{WRAPPER}} .faq-wrap .accordion .accordion-item .accordion-body',

            ]
        );

        $this->add_control(
            'matrik_faq_style_one_general_faq_description_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .faq-wrap .accordion .accordion-item .accordion-body' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section();

        //style Six start

        $this->start_controls_section(
            'matrik_faq_style_six_general',
            [
                'label'     => esc_html__('Styles', 'matrik-core'),
                'tab'       => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'matrik_faq_genaral_style_selection' => ['style_six'],
                ]
            ]
        );

        $this->add_control(
            'matrik_faq_style_six_general_subtitle',
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
                'name'     => 'matrik_faq_style_six_general_subtitle_typ',
                'selector' => '{{WRAPPER}} .section-title.five > span',

            ]
        );

        $this->add_control(
            'matrik_faq_style_six_general_subtitle_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .section-title.five > span' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_faq_style_six_general_subtitle_icon_color',
            [
                'label'     => esc_html__('Icon Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .section-title.five > span::after' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_faq_style_six_general_title',
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
                'name'     => 'matrik_faq_style_six_general_title_typ',
                'selector' => '{{WRAPPER}} .home6-faq-section .section-title h2',

            ]
        );

        $this->add_control(
            'matrik_faq_style_six_general_title_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home6-faq-section .section-title h2' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_faq_style_six_general_desc',
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
                'name'     => 'matrik_faq_style_six_general_desc_typ',
                'selector' => '{{WRAPPER}} .home6-faq-section .section-title.five.text-center p',

            ]
        );

        $this->add_control(
            'matrik_faq_style_six_general_desc_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home6-faq-section .section-title.five.text-center p' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_faq_style_six_general_tabs',
            [
                'label'     => esc_html__('Tab', 'matrik-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'matrik-core'),
                'name'     => 'matrik_faq_style_six_general_tabs_typ',
                'selector' => '{{WRAPPER}} .home6-faq-section .nav-pills .nav-item .nav-link',

            ]
        );

        $this->add_control(
            'matrik_faq_style_six_general_tabs_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home6-faq-section .nav-pills .nav-item .nav-link' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_faq_style_six_general_tabs_bg_color',
            [
                'label'     => esc_html__('Background Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home6-faq-section .nav-pills .nav-item .nav-link' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_faq_style_six_general_tabs_active_color',
            [
                'label'     => esc_html__('Active Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home6-faq-section .nav-pills .nav-item .nav-link.active' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_faq_style_six_general_tabs_active_bg_color',
            [
                'label'     => esc_html__('Active Background Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home6-faq-section .nav-pills .nav-item .nav-link.active' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_faq_style_six_general_tabs_border_color',
            [
                'label'     => esc_html__('Border Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home6-faq-section .nav-pills .nav-item .nav-link' => 'border: 1px solid {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_faq_style_six_general_faqs',
            [
                'label'     => esc_html__('FAQs Question', 'matrik-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'matrik-core'),
                'name'     => 'matrik_faq_style_six_general_faqs_ques_typ',
                'selector' => '{{WRAPPER}} .home6-faq-section .faq-wrap .accordion .accordion-item .accordion-header .accordion-button.collapsed',

            ]
        );

        $this->add_control(
            'matrik_faq_style_six_general_faqs_ques_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home6-faq-section .faq-wrap .accordion .accordion-item .accordion-header .accordion-button.collapsed' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_faq_style_six_general_faqs_border_color',
            [
                'label'     => esc_html__('Border Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home6-faq-section .faq-wrap .accordion .accordion-item .accordion-header .accordion-button' => 'border-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Active Typography', 'matrik-core'),
                'name'     => 'matrik_faq_style_six_general_faqs_ques_active_typ',
                'selector' => '{{WRAPPER}} .home6-faq-section .faq-wrap .accordion .accordion-item .accordion-header .accordion-button',

            ]
        );

        $this->add_control(
            'matrik_faq_style_six_general_faqs_ques_active_color',
            [
                'label'     => esc_html__('Active Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home6-faq-section .faq-wrap .accordion .accordion-item .accordion-header .accordion-button' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_faq_style_six_general_faqs_ans',
            [
                'label'     => esc_html__('FAQs Answer', 'matrik-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'matrik-core'),
                'name'     => 'matrik_faq_style_six_general_faqs_ans_typ',
                'selector' => '{{WRAPPER}} .home6-faq-section .faq-wrap .accordion .accordion-item .accordion-body',

            ]
        );

        $this->add_control(
            'matrik_faq_style_six_general_faqs_ans_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home6-faq-section .faq-wrap .accordion .accordion-item .accordion-body' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_faq_style_six_general_faqs_ans_bg_color',
            [
                'label'     => esc_html__('Border Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .faq-wrap .accordion .accordion-item .accordion-header .accordion-button' => 'border-bottom: 1px solid {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'matrik_faq_style_seven_general',
            [
                'label'     => esc_html__('Styles', 'matrik-core'),
                'tab'       => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'matrik_faq_genaral_style_selection' => ['style_seven'],
                ]
            ]
        );

        $this->add_control(
            'matrik_faq_style_seven_general_section',
            [
                'label'     => esc_html__('Section General', 'matrik-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_control(
            'matrik_faq_style_seven_general_background_color',
            [
                'label'     => esc_html__('Background Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .product-dt-faq-section .faq-content-area' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_faq_style_seven_general_border_color',
            [
                'label'     => esc_html__('Border Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .faq-wrap .accordion .accordion-item .accordion-header .accordion-button' => 'border-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_faq_style_seven_general_button_bg_color',
            [
                'label'     => esc_html__('Button BG Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .product-dt-faq-section .product-dt-faq-wrapper .primary-btn1' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_faq_style_seven_general_button_hover_bg_color',
            [
                'label'     => esc_html__('Button Hover BG Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .primary-btn1.black-bg::after' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Button Typography', 'matrik-core'),
                'name'     => 'matrik_faq_style_seven_general_button_text_typ',
                'selector' => '{{WRAPPER}} .product-dt-faq-section .product-dt-faq-wrapper .primary-btn1',

            ]
        );

        $this->add_control(
            'matrik_faq_style_seven_general_button_text_color',
            [
                'label'     => esc_html__('Button Text Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .product-dt-faq-section .product-dt-faq-wrapper .primary-btn1' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_faq_style_seven_general_button_hover_text_color',
            [
                'label'     => esc_html__('Button Hover Text Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .product-dt-faq-section .product-dt-faq-wrapper .primary-btn1 span:nth-child(2)' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_faq_style_seven_general_title',
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
                'name'     => 'matrik_faq_style_seven_general_title_typ',
                'selector' => '{{WRAPPER}} .product-dt-faq-section .faq-content-area > h2',

            ]
        );

        $this->add_control(
            'matrik_faq_style_seven_general_title_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .product-dt-faq-section .faq-content-area > h2' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_faq_style_seven_general_faq',
            [
                'label'     => esc_html__('FAQ', 'matrik-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Questions Typography', 'matrik-core'),
                'name'     => 'matrik_faq_style_seven_general_faq_ques_typ',
                'selector' => '{{WRAPPER}} .faq-wrap .accordion .accordion-item .accordion-header .accordion-button',

            ]
        );

        $this->add_control(
            'matrik_faq_style_seven_general_faq_ques_color',
            [
                'label'     => esc_html__('Questions Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .faq-wrap .accordion .accordion-item .accordion-header .accordion-button' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Answer Typography', 'matrik-core'),
                'name'     => 'matrik_faq_style_seven_general_faq_ans_typ',
                'selector' => '{{WRAPPER}} .faq-wrap .accordion .accordion-item .accordion-body',

            ]
        );

        $this->add_control(
            'matrik_faq_style_seven_general_faq_ans_color',
            [
                'label'     => esc_html__('Answer Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .faq-wrap .accordion .accordion-item .accordion-body' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section();
    }

    protected function render()
    {

        $settings = $this->get_settings_for_display();
        $faq_list = $settings['matrik_faq_genaral_accordion_area_list'];

        if (empty($faq_list)) return;

?>

        <?php if ($settings['matrik_faq_genaral_style_selection'] == 'style_one') : ?>
            <div class="home1-faq-section">
                <div class="container">
                    <?php if ($settings['matrik_faq_genaral_header_switcher'] == 'yes') : ?>
                        <div class="row g-4 align-items-center justify-content-between mb-70">
                            <div class="col-lg-6 wow animate fadeInLeft" data-wow-delay="200ms" data-wow-duration="1500ms">
                                <div class="section-title">
                                    <?php if (!empty($settings['matrik_faq_genaral_subtitle'])) : ?>
                                        <span><?php echo esc_html($settings['matrik_faq_genaral_subtitle']); ?></span>
                                    <?php endif; ?>
                                    <?php if (!empty($settings['matrik_faq_genaral_title'])) : ?>
                                        <h2><?php echo esc_html($settings['matrik_faq_genaral_title']); ?></h2>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <?php if (!empty($settings['matrik_faq_genaral_header_button'])) : ?>
                                <div class="col-lg-3 d-flex justify-content-lg-end btn_wrapper">
                                    <a class="primary-btn1 transparent" href="<?php echo esc_url($settings['matrik_faq_genaral_header_button_url']['url']); ?>">
                                        <span><?php echo esc_html($settings['matrik_faq_genaral_header_button']); ?>
                                        </span>
                                        <span><?php echo esc_html($settings['matrik_faq_genaral_header_button']); ?>
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
                    <div class="row align-items-center">
                        <?php if (!empty($settings['matrik_faq_genaral_banner_image']['url'])) : ?>
                            <div class="col-lg-5 d-lg-flex d-none justify-content-lg-center">
                                <div class="faq-img magnetic-item">
                                    <img src="<?php echo esc_url($settings['matrik_faq_genaral_banner_image']['url']); ?>" alt="<?php echo esc_attr__('banner-image', 'matrik-core'); ?>">
                                </div>
                            </div>
                        <?php endif; ?>
                        <div class="col-lg-7">
                            <div class="faq-wrap">
                                <div class="accordion" id="accordionExample">
                                    <?php foreach ($settings['matrik_faq_genaral_accordion_area_list'] as $index => $faq) : ?>
                                        <div class="accordion-item wow animate fadeInDown" data-wow-delay="200ms" data-wow-duration="1500ms">
                                            <h2 class="accordion-header" id="flush-heading-<?php echo esc_attr($index); ?>">
                                                <button class="accordion-button <?php echo ($index == 0) ? '' : 'collapsed'; ?>" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse-<?php echo esc_attr($index); ?>" aria-expanded="<?php echo ($index == 0) ? 'true' : 'false'; ?>" aria-controls="flush-collapse-<?php echo esc_attr($index); ?>">
                                                    <?php echo esc_html($faq['matrik_faq_genaral_accordion_area_question']); ?>
                                                </button>
                                            </h2>
                                            <div id="flush-collapse-<?php echo esc_attr($index); ?>" class="accordion-collapse collapse <?php echo ($index == 0) ? 'show' : ''; ?>" aria-labelledby="flush-heading-<?php echo esc_attr($index); ?>" data-bs-parent="#accordionExample">
                                                <?php if (!empty($faq['matrik_faq_genaral_accordion_area_answer'])) : ?>
                                                    <div class="accordion-body">
                                                        <?php echo esc_html($faq['matrik_faq_genaral_accordion_area_answer']); ?>
                                                    </div>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>

        <?php if ($settings['matrik_faq_genaral_style_selection'] == 'style_six') : ?>
            <div class="home6-faq-section">
                <div class="container">
                    <?php if ($settings['matrik_faq_genaral_header_switcher'] == 'yes') : ?>
                        <div class="row justify-content-center mb-45 wow animate fadeInDown" data-wow-delay="200ms" data-wow-duration="1500ms" style="visibility: visible; animation-duration: 1500ms; animation-delay: 200ms;">
                            <div class="col-xl-8 col-lg-10">
                                <div class="section-title five text-center">
                                    <?php if (!empty($settings['matrik_faq_genaral_title'])): ?>
                                        <span><?php echo esc_html($settings['matrik_faq_genaral_subtitle']); ?></span>
                                    <?php endif; ?>
                                    <?php if (!empty($settings['matrik_faq_genaral_title'])): ?>
                                        <h2><?php echo esc_html($settings['matrik_faq_genaral_title']); ?></h2>
                                    <?php endif; ?>
                                    <?php if (!empty($settings['matrik_faq_genaral_description'])): ?>
                                        <p><?php echo esc_html($settings['matrik_faq_genaral_description']); ?></p>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
                    <div class="row justify-content-center">
                        <div class="col-xl-8 col-lg-10">
                            <?php if ($settings['matrik_faq_genaral_faq_switcher'] === 'yes') : ?>
                                <ul class="nav nav-pills wow animate fadeInDown" data-wow-delay="200ms" data-wow-duration="1500ms" id="pills-tab" role="tablist" style="visibility: visible; animation-duration: 1500ms; animation-delay: 200ms;">
                                    <?php
                                    foreach ($settings['matrik_faq_general_accordion_tab'] as $index => $tab) :
                                        $is_first = $index === 0;
                                    ?>
                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link <?php echo esc_attr(($is_first ? 'active' : '')); ?>" id="pills-<?php echo esc_attr(strtolower($tab['matrik_faq_general_accordion_tab_nav_text'])); ?>-tab" data-bs-toggle="pill" data-bs-target="#pills-<?php echo esc_attr(strtolower($tab['matrik_faq_general_accordion_tab_nav_text'])); ?>" type="button" role="tab" aria-controls="pills-<?php echo esc_attr(strtolower($tab['matrik_faq_general_accordion_tab_nav_text'])); ?>" aria-selected="true"><?php echo esc_html($tab['matrik_faq_general_accordion_tab_nav_text']) ?></button>
                                        </li>
                                    <?php endforeach; ?>
                                </ul>
                            <?php endif; ?>
                            <div class="tab-content" id="pills-tabContent">
                                <?php if (!empty($settings['matrik_faq_genaral_accordion_area_list'])): ?>
                                    <div class="tab-pane fade show active" id="pills-general" role="tabpanel" aria-labelledby="pills-general-tab">
                                        <div class="faq-wrap">
                                            <div class="accordion" id="accordionExample">
                                                <?php
                                                foreach ($faq_list as $index => $faq) :
                                                    $question = esc_html($faq['matrik_faq_genaral_accordion_area_question']);
                                                    $answer = wp_kses_post($faq['matrik_faq_genaral_accordion_area_answer']);

                                                    $word = $this->number_to_word($index);
                                                    $heading_id = 'heading' . $word;
                                                    $collapse_id = 'collapse' . $word;

                                                    $is_first = $index === 0;
                                                ?>
                                                    <div class="accordion-item wow animate fadeInDown" data-wow-delay="<?php echo esc_attr(200 + $index * 200); ?>" data-wow-duration="1500ms" style="visibility: visible; animation-duration: 1500ms; animation-delay: 200ms;">
                                                        <h2 class="accordion-header" id="<?php echo esc_attr($heading_id); ?>">
                                                            <button class="accordion-button <?php echo ($is_first ? '' : 'collapsed') ?>" type="button" data-bs-toggle="collapse" data-bs-target="#<?php echo esc_attr($collapse_id); ?>" aria-expanded="<?php echo esc_attr(($is_first ? 'true' : 'false')); ?>" aria-controls="<?php echo esc_attr($collapse_id); ?>">
                                                                <?php echo esc_html($question); ?>
                                                            </button>
                                                        </h2>
                                                        <div id="<?php echo esc_attr($collapse_id); ?>" class="accordion-collapse collapse <?php echo ($is_first ? 'show' : ''); ?>" aria-labelledby="<?php echo esc_attr($heading_id); ?>" data-bs-parent="#accordionExample">
                                                            <div class="accordion-body">
                                                                <?php echo esc_html($answer); ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                <?php endforeach; ?>
                                            </div>
                                        </div>
                                    </div>
                                <?php endif; ?>

                                <?php if ($settings['matrik_faq_genaral_faq_switcher'] === 'yes' && !empty($settings['matrik_faq_genaral_accordion_area_two_list'])): ?>
                                    <div class="tab-pane fade" id="pills-payment" role="tabpanel" aria-labelledby="pills-payment-tab">
                                        <div class="faq-wrap">
                                            <div class="accordion" id="accordionPayment">
                                                <?php
                                                foreach ($settings['matrik_faq_genaral_accordion_area_two_list'] as $index => $faqTwo) :
                                                    $word = $this->number_to_word($index);
                                                    $heading_id2 = 'heading' . $word;
                                                    $collapse_id2 = 'collapse' . $word;

                                                    $is_first = $index === 0;
                                                ?>
                                                    <div class="accordion-item">
                                                        <h2 class="accordion-header" id="payment<?php echo esc_attr($heading_id2); ?>">
                                                            <button class="accordion-button <?php echo ($is_first ? '' : 'collapsed') ?>" type="button" data-bs-toggle="collapse" data-bs-target="#payment<?php echo esc_attr($collapse_id2); ?>" aria-expanded="<?php echo esc_attr(($is_first ? 'true' : 'false')); ?>" aria-controls="payment<?php echo esc_attr($collapse_id2); ?>">
                                                                <?php echo esc_html($faqTwo['matrik_faq_genaral_accordion_area_two_question']); ?>
                                                            </button>
                                                        </h2>
                                                        <div id="payment<?php echo esc_attr($collapse_id2); ?>" class="accordion-collapse collapse <?php echo ($is_first ? 'show' : ''); ?>" aria-labelledby="payment<?php echo esc_attr($heading_id2); ?>" data-bs-parent="#accordionPayment">
                                                            <div class="accordion-body">
                                                                <?php echo esc_html($faqTwo['matrik_faq_genaral_accordion_area_two_answer']); ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                <?php endforeach; ?>
                                            </div>
                                        </div>
                                    </div>
                                <?php endif; ?>
                                <?php if ($settings['matrik_faq_genaral_faq_switcher'] === 'yes' && !empty($settings['matrik_faq_genaral_accordion_area_three_list'])): ?>
                                    <div class="tab-pane fade" id="pills-support" role="tabpanel" aria-labelledby="pills-support-tab">
                                        <div class="faq-wrap">
                                            <div class="accordion" id="accordionSupport">
                                                <?php
                                                foreach ($settings['matrik_faq_genaral_accordion_area_three_list'] as $index => $faqThree) :
                                                    $word = $this->number_to_word($index);
                                                    $heading_id3 = 'heading' . $word;
                                                    $collapse_id3 = 'collapse' . $word;

                                                    $is_first = $index === 0;
                                                ?>
                                                    <div class="accordion-item">
                                                        <h2 class="accordion-header" id="support<?php echo esc_attr($heading_id3); ?>">
                                                            <button class="accordion-button <?php echo ($is_first ? '' : 'collapsed') ?>" type="button" data-bs-toggle="collapse" data-bs-target="#support<?php echo esc_attr($collapse_id3); ?>" aria-expanded="<?php echo esc_attr(($is_first ? 'true' : 'false')); ?>" aria-controls="support<?php echo esc_attr($collapse_id3); ?>">
                                                                <?php echo esc_html($faqThree['matrik_faq_genaral_accordion_area_three_question']); ?>
                                                            </button>
                                                        </h2>
                                                        <div id="support<?php echo esc_attr($collapse_id3); ?>" class="accordion-collapse collapse <?php echo ($is_first ? 'show' : ''); ?>" aria-labelledby="support<?php echo esc_attr($heading_id3); ?>" data-bs-parent="#accordionSupport">
                                                            <div class="accordion-body">
                                                                <?php echo esc_html($faqThree['matrik_faq_genaral_accordion_area_three_answer']); ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                <?php endforeach; ?>
                                            </div>
                                        </div>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>

        <?php if ($settings['matrik_faq_genaral_style_selection'] == 'style_seven') : ?>
            <div class="product-dt-faq-section">
                <div class="container">
                    <div class="product-dt-faq-wrapper">
                        <div class="row g-0">
                            <?php if (!empty($settings['matrik_faq_genaral_banner_image'])) : ?>
                                <div class="col-lg-6 d-lg-block">
                                    <div class="product-dt-faq-img">
                                        <img src="<?php echo esc_url($settings['matrik_faq_genaral_banner_image']['url']); ?>" alt="<?php echo esc_attr('banner-image', 'matrik-core'); ?>">
                                    </div>
                                </div>
                            <?php endif; ?>
                            <div class="col-lg-6">
                                <div class="faq-content-area">
                                    <?php if (!empty($settings['matrik_faq_genaral_title'])) : ?>
                                        <h2><?php echo esc_html($settings['matrik_faq_genaral_title']); ?></h2>
                                    <?php endif; ?>
                                    <div class="faq-wrap">
                                        <div class="accordion" id="accordionExample">
                                            <?php
                                            foreach ($settings['matrik_faq_genaral_accordion_area_list'] as $index => $faqSeven) :
                                                $word = $this->number_to_word($index);
                                                $heading_id7 = 'heading' . $word;
                                                $collapse_id7 = 'collapse' . $word;

                                                $is_first = $index === 0;
                                            ?>
                                                <div class="accordion-item wow animate fadeInDown" data-wow-delay="200ms" data-wow-duration="1500ms">
                                                    <h2 class="accordion-header" id="heading<?php echo esc_attr($heading_id7); ?>">
                                                        <button class="accordion-button <?php echo ($is_first ? '' : 'collapsed') ?>" type="button" data-bs-toggle="collapse" data-bs-target="#collapse<?php echo esc_attr($collapse_id7); ?>"
                                                            aria-expanded="true" aria-controls="collapse<?php echo esc_attr($collapse_id7); ?>">
                                                            <?php echo esc_html($faqSeven['matrik_faq_genaral_accordion_area_question']); ?>
                                                        </button>
                                                    </h2>
                                                    <div id="collapse<?php echo esc_attr($collapse_id7); ?>" class="accordion-collapse collapse <?php echo ($is_first ? 'show' : ''); ?>" aria-labelledby="heading<?php echo esc_attr($heading_id7); ?>" data-bs-parent="#accordionExample">
                                                        <div class="accordion-body">
                                                            <?php echo esc_html($faqSeven['matrik_faq_genaral_accordion_area_answer']); ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php endforeach; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php if (! empty($settings['matrik_faq_genaral_header_button'])): ?>
                            <a class="primary-btn1 black-bg" href="<?php echo esc_url($settings['matrik_faq_genaral_header_button_url']['url']); ?>">
                                <span><?php echo esc_html($settings['matrik_faq_genaral_header_button']); ?>
                                </span>
                                <span><?php echo esc_html($settings['matrik_faq_genaral_header_button']); ?>
                                </span>
                                <svg class="arrow" width="23" height="23" viewBox="0 0 23 23" xmlns="http://www.w3.org/2000/svg">
                                    <g>
                                        <path d="M0.113861 0H22.9999V4.28425L4.32671 22.9997L0 18.7154L12.7524 6.08815L0.113861 6.20089V0Z" />
                                        <path d="M23 22.9996V8.56848L16.8516 14.6566V22.9996H23Z" />
                                    </g>
                                </svg>
                            </a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        <?php endif; ?>

<?php

    }
}

Plugin::instance()->widgets_manager->register(new Matrik_FAQ_Widget());
