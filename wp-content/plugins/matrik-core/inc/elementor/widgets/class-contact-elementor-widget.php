<?php

namespace Elementor;

if (!defined('ABSPATH')) exit;  // Exit if accessed directly

use Elementor\core\Schemes;
use Egns_Core\Egns_Helper;

class Matrik_Contact_Widget extends Widget_Base
{

    public function get_name()
    {
        return 'matrik_contact';
    }

    public function get_title()
    {
        return esc_html__('EG Contact', 'matrik-core');
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
            'matrik_contact_genaral',
            [
                'label' => esc_html__('General', 'matrik-core')
            ]
        );

        $this->add_control(
            'matrik_contact_genaral_style_selection',
            [
                'label'   => esc_html__('Select Style', 'matrik-core'),
                'type'    => Controls_Manager::SELECT,
                'options' => [
                    'style_one'   => esc_html__('Style One', 'matrik-core'),
                    'style_two'   => esc_html__('Style Two', 'matrik-core'),
                    'style_three' => esc_html__('Style Three', 'matrik-core'),
                    'style_four'  => esc_html__('Style Four', 'matrik-core'),
                    'style_five'  => esc_html__('Style Five', 'matrik-core'),
                    'style_six'   => esc_html__('Style Six', 'matrik-core'),
                    'style_seven' => esc_html__('Style Seven', 'matrik-core'),
                ],
                'default' => 'style_one',
            ]
        );

        $this->add_control(
            'matrik_contact_genaral_subtitle',
            [
                'label'       => esc_html__('Subtitle', 'matrik-core'),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default'     => esc_html__('Connect with Us', 'matrik-core'),
                'placeholder' => esc_html__('write your subtitle here', 'matrik-core'),
                'label_block' => true,
                'condition'   => [
                    'matrik_contact_genaral_style_selection' => ['style_one', 'style_three', 'style_five', 'style_six'],
                ]
            ]
        );

        $this->add_control(
            'matrik_contact_genaral_title',
            [
                'label'       => esc_html__('Title', 'matrik-core'),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default'     => esc_html__('Industry Inquiries & Support', 'matrik-core'),
                'placeholder' => esc_html__('write your title here', 'matrik-core'),
                'label_block' => true,
                'condition'   => [
                    'matrik_contact_genaral_style_selection' => ['style_one', 'style_three', 'style_five', 'style_six'],
                ]
            ]
        );

        $this->add_control(
            'matrik_contact_genaral_two_title',
            [
                'label'       => esc_html__('Title', 'matrik-core'),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default'     => esc_html__('[Get In Touch]', 'matrik-core'),
                'placeholder' => esc_html__('write your title here', 'matrik-core'),
                'label_block' => true,
                'condition'   => [
                    'matrik_contact_genaral_style_selection' => ['style_two'],
                ]
            ]
        );

        $this->add_control(
            'matrik_contact_genaral_two_description',
            [
                'label'       => esc_html__('Description', 'matrik-core'),
                'type'        => \Elementor\Controls_Manager::TEXTAREA,
                'default'     => esc_html__('*Our contact support team always support you and you are can easily contact us*.', 'matrik-core'),
                'placeholder' => esc_html__('write your description here', 'matrik-core'),
                'label_block' => true,
                'condition'   => [
                    'matrik_contact_genaral_style_selection' => ['style_two'],
                ]
            ]
        );

        $this->add_control(
            'matrik_contact_genaral_six_banner_image',
            [
                'label'   => esc_html__('Banner Image', 'matrik-core'),
                'type'    => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
                'condition' => [
                    'matrik_contact_genaral_style_selection' => ['style_four'],
                ]
            ]
        );

        $repeater = new \Elementor\Repeater();


        $repeater->add_control(
            'matrik_contact_genaral_two_contact_icon',
            [
                'label'   => esc_html__('Icon', 'matrik-core'),
                'type'    => \Elementor\Controls_Manager::ICONS,
                'default' => [
                    'value'   => 'fas fa-circle',
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
            'matrik_contact_genaral_two_contact_title',
            [
                'label'       => esc_html__('Contact Title', 'matrik-core'),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default'     => esc_html__('To More Inquiry', 'matrik-core'),
                'placeholder' => esc_html__('write your text here', 'matrik-core'),
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'matrik_contact_genaral_two_contact_type',
            [
                'label'   => esc_html__('Select Type', 'matrik-core'),
                'type'    => Controls_Manager::SELECT,
                'options' => [
                    'phone' => esc_html__('Phone', 'matrik-core'),
                    'email' => esc_html__('Email', 'matrik-core'),
                ],
                'default' => 'phone',
            ]
        );

        $repeater->add_control(
            'matrik_contact_genaral_two_contact_phone',
            [
                'label'       => esc_html__('Phone', 'matrik-core'),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default'     => esc_html__('+990-737 621 432', 'matrik-core'),
                'placeholder' => esc_html__('write your text here', 'matrik-core'),
                'label_block' => true,
                'condition'   => [
                    'matrik_contact_genaral_two_contact_type' => ['phone'],
                ]
            ]
        );

        $repeater->add_control(
            'matrik_contact_genaral_two_contact_email',
            [
                'label'       => esc_html__('Email', 'matrik-core'),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default'     => esc_html__('info@gmail.com', 'matrik-core'),
                'placeholder' => esc_html__('write your text here', 'matrik-core'),
                'label_block' => true,
                'condition'   => [
                    'matrik_contact_genaral_two_contact_type' => ['email'],
                ]
            ]
        );

        $this->add_control(
            'matrik_contact_genaral_two_contact_list',
            [
                'label'   => esc_html__('Contact List', 'matrik-core'),
                'type'    => \Elementor\Controls_Manager::REPEATER,
                'fields'  => $repeater->get_controls(),
                'default' => [
                    [
                        'matrik_contact_genaral_two_contact_title' => esc_html('To More Inquiry'),

                    ],
                    [
                        'matrik_contact_genaral_two_contact_title' => esc_html('To Send Mail'),

                    ],
                ],
                'title_field' => '{{{ matrik_contact_genaral_two_contact_title }}}',
                'condition'   => [
                    'matrik_contact_genaral_style_selection' => ['style_two', 'style_five', 'style_six'],
                ]
            ]
        );

        $this->add_control(
            'matrik_contact_genaral_location_area',
            [
                'label'     => esc_html__('Location Area', 'matrik-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
                'condition' => [
                    'matrik_contact_genaral_style_selection' => ['style_two'],
                ]
            ]
        );

        $this->add_control(
            'matrik_contact_genaral_location_area_title',
            [
                'label'       => esc_html__('Title', 'matrik-core'),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default'     => esc_html__('Washington DC', 'matrik-core'),
                'placeholder' => esc_html__('write your text here', 'matrik-core'),
                'label_block' => true,
                'condition'   => [
                    'matrik_contact_genaral_style_selection' => ['style_two'],
                ]
            ]
        );

        $this->add_control(
            'matrik_contact_genaral_location_area_location',
            [
                'label'       => esc_html__('Location', 'matrik-core'),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default'     => esc_html__('8204 Glen Ridge DriveEndicott, NY 13760', 'matrik-core'),
                'placeholder' => esc_html__('write your text here', 'matrik-core'),
                'label_block' => true,
                'condition'   => [
                    'matrik_contact_genaral_style_selection' => ['style_two'],
                ]
            ]
        );

        $this->add_control(
            'matrik_contact_genaral_location_area_location_url',
            [
                'label'   => esc_html__('Location URL/Link', 'matrik-core'),
                'type'    => \Elementor\Controls_Manager::URL,
                'options' => ['url', 'is_external', 'nofollow'],
                'default' => [
                    'url'         => '#',
                    'is_external' => true,
                    'nofollow'    => true,
                    // 'custom_attributes' => '',
                ],
                'label_block' => true,
                'condition'   => [
                    'matrik_contact_genaral_style_selection' => ['style_two'],
                ]
            ]
        );

        //style seven content 

        $this->add_control(
            'matrik_contact_seven_location_button_text',
            [
                'label'       => esc_html__('Location Button Text', 'matrik-core'),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default'     => esc_html__('View All Factory Location', 'matrik-core'),
                'placeholder' => esc_html__('write your text here', 'matrik-core'),
                'label_block' => true,
                'condition'   => [
                    'matrik_contact_genaral_style_selection' => ['style_seven'],
                ]
            ]
        );

        $this->add_control(
            'matrik_contact_seven_location_button_text_url',
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
                'condition'   => [
                    'matrik_contact_genaral_style_selection' => ['style_seven'],
                ]
            ]
        );

        // Repeater
        $repeater = new \Elementor\Repeater();

        // accordion title
        $repeater->add_control(
            'matrik_contact_seven_location_title',
            [
                'label'       => esc_html__('Location Title', 'matrik-core'),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default'     => esc_html('NEW YORK'),
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'matrik_contact_seven_location',
            [
                'label'       => esc_html__('Location', 'matrik-core'),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default'     => esc_html('8204 Glen Ridge DriveEndicott, NY 13760'),
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'matrik_contact_seven_location_text_url',
            [
                'label'   => esc_html__('Location URL/Link', 'matrik-core'),
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
            'matrik_contact_seven_content_list',
            [
                'label'   => esc_html__('Location List', 'matrik-core'),
                'type'    => \Elementor\Controls_Manager::REPEATER,
                'fields'  => $repeater->get_controls(),
                'default' => [
                    [
                        'matrik_contact_seven_location_title' => esc_html('NEW YORK'),
                    ],
                    [
                        'matrik_contact_seven_location_title' => esc_html('WASHINGTON DC'),
                    ],
                    [
                        'matrik_contact_seven_location_title' => esc_html('WASHINGTON DC'),
                    ],
                    [
                        'matrik_contact_seven_location_title' => esc_html('WASHINGTON DC'),
                    ],


                ],
                'title_field' => '{{{ matrik_contact_seven_location_title }}}',
                'condition'   => [
                    'matrik_contact_genaral_style_selection' => ['style_seven'],
                ]
            ]
        );

        // Repeater
        $repeater = new \Elementor\Repeater();

        // accordion title
        $repeater->add_control(
            'matrik_contact_genaral_faq_question',
            [
                'label'       => esc_html__('Question', 'matrik-core'),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default'     => esc_html('What services does your agency offer?'),
                'label_block' => true,
            ]
        );

        // accordion Description
        $repeater->add_control(
            'matrik_contact_genaral_faq_answer',
            [
                'label'       => esc_html__('Answer', 'matrik-core'),
                'type'        => \Elementor\Controls_Manager::TEXTAREA,
                'default'     => wp_kses('We specialize in a full range of digital services including <span>web design and development, digital marketing, SEO, social media management, content creation, branding, UI/UX design, and more.</span> Visit our <a href="service.html">[Services Page]</a> for a complete list of what we offer.', wp_kses_allowed_html('post')),
                'placeholder' => esc_html__('Type your description here', 'matrik-core'),
            ]
        );

        $this->add_control(
            'matrik_contact_genaral_faq_list',
            [
                'label'   => esc_html__('FAQ List', 'matrik-core'),
                'type'    => \Elementor\Controls_Manager::REPEATER,
                'fields'  => $repeater->get_controls(),
                'default' => [
                    [
                        'matrik_contact_genaral_faq_question' => esc_html('01. Do you provide design and Industry services?'),
                        'matrik_contact_genaral_faq_answer'   => wp_kses('Yes, we provide comprehensive design and industry services tailored to meet your needs. Our team of experts delivers innovative solutions in design, development, and implementation, ensuring high-quality results and client satisfaction.', wp_kses_allowed_html('post')),
                    ],
                    [
                        'matrik_contact_genaral_faq_question' => esc_html('02. Is Matrik suitable for my business?'),
                        'matrik_contact_genaral_faq_answer'   => wp_kses('Discover if Matrik is the right fit for your business by exploring its tailored solutions for various industries and unique needs.', wp_kses_allowed_html('post')),
                    ],
                    [
                        'matrik_contact_genaral_faq_question' => esc_html('03. What is your typical project timeline?'),
                        'matrik_contact_genaral_faq_answer'   => wp_kses("Discover the typical project timeline for our construction services, outlining each phase from planning to completion, ensuring timely and efficient project delivery.", wp_kses_allowed_html('post')),
                    ],
                    [
                        'matrik_contact_genaral_faq_question' => esc_html('04. How do you handle permits and inspections?'),
                        'matrik_contact_genaral_faq_answer'   => wp_kses("We handle all necessary permits and inspections for your project, ensuring full compliance with local regulations and smooth progress throughout the construction process.", wp_kses_allowed_html('post')),
                    ],
                    [
                        'matrik_contact_genaral_faq_question' => esc_html('05. How do you handle waste disposal and recycling?'),
                        'matrik_contact_genaral_faq_answer'   => wp_kses("At our construction sites, we prioritize responsible waste disposal and recycling by adhering to local regulations, implementing sustainable practices, and partnering with certified waste management services to minimize environmental impact.", wp_kses_allowed_html('post')),
                    ],
                    [
                        'matrik_contact_genaral_faq_question' => esc_html('06. How do ensure buildings are structurally safe?'),
                        'matrik_contact_genaral_faq_answer'   => wp_kses("Learn how we prioritize safety in construction by following strict structural guidelines and using high-quality materials to ensure buildings are secure and reliable.", wp_kses_allowed_html('post')),
                    ],
                ],
                'title_field' => '{{{ matrik_contact_genaral_faq_question }}}',
                'condition'   => [
                    'matrik_contact_genaral_style_selection' => ['style_one', 'style_three'],
                ]
            ]
        );

        $this->add_control(
            'matrik_contact_genaral_faq_shortcode',
            [
                'label'       => esc_html__('Shortcode', 'matrik-core'),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default'     => '[add_shortcode]',
                'placeholder' => esc_html__('write your shortcode here', 'matrik-core'),
                'label_block' => true,
                'condition'   => [
                    'matrik_contact_genaral_style_selection' => ['style_one', 'style_two', 'style_three', 'style_four', 'style_five', 'style_six'],
                ]
            ]
        );

        $this->end_controls_section();

        //style start

        $this->start_controls_section(
            'matrik_contact_style_genaral',
            [
                'label'     => esc_html__('Styles', 'matrik-core'),
                'tab'       => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'matrik_contact_genaral_style_selection' => ['style_two'],
                ]
            ]
        );

        $this->add_control(
            'matrik_contact_style_genaral_title',
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
                'name'     => 'matrik_contact_style_genaral_title_typ',
                'selector' => '{{WRAPPER}} .section-title.three h2',

            ]
        );

        $this->add_control(
            'matrik_contact_style_genaral_title_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .section-title.three h2' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_contact_style_genaral_description',
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
                'name'     => 'matrik_contact_style_genaral_description_typ',
                'selector' => '{{WRAPPER}} .home4-contact-section .contact-content .vector-and-content p',

            ]
        );

        $this->add_control(
            'matrik_contact_style_genaral_description_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home4-contact-section .contact-content .vector-and-content p' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_contact_style_genaral_vector_icon',
            [
                'label'     => esc_html__('Vector Icon', 'matrik-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_control(
            'matrik_contact_style_genaral_vector_icon_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home4-contact-section .contact-content .vector-and-content svg' => 'fill: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_contact_style_genaral_contact_icon',
            [
                'label'     => esc_html__('Contact Icon', 'matrik-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_control(
            'matrik_contact_style_genaral_contact_icon_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home4-contact-section .contact-content .contact-wrap .contact-list .single-contact .icon svg' => 'fill: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_contact_style_genaral_contact_title',
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
                'name'     => 'matrik_contact_style_genaral_contact_title_typ',
                'selector' => '{{WRAPPER}} .home4-contact-section .contact-content .contact-wrap .contact-list .single-contact .content span',

            ]
        );

        $this->add_control(
            'matrik_contact_style_genaral_contact_title_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home4-contact-section .contact-content .contact-wrap .contact-list .single-contact .content span' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_contact_style_genaral_contact_title_icon_color',
            [
                'label'     => esc_html__('Icon Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home4-contact-section .contact-content .contact-wrap .address-area::before' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_contact_style_genaral_contact_text',
            [
                'label'     => esc_html__('Contact Text', 'matrik-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'matrik-core'),
                'name'     => 'matrik_contact_style_genaral_contact_text_typ',
                'selector' => '{{WRAPPER}} .home4-contact-section .contact-content .contact-wrap .contact-list .single-contact .content h6 a',

            ]
        );

        $this->add_control(
            'matrik_contact_style_genaral_contact_text_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home4-contact-section .contact-content .contact-wrap .contact-list .single-contact .content h6 a' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_contact_style_genaral_contact_text_hover_color',
            [
                'label'     => esc_html__('Hover Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home4-contact-section .contact-content .contact-wrap .contact-list .single-contact .content h6 a:hover' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_contact_style_genaral_location_title',
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
                'name'     => 'matrik_contact_style_genaral_location_title_typ',
                'selector' => '{{WRAPPER}} .home4-contact-section .contact-content .contact-wrap .address-area span',

            ]
        );

        $this->add_control(
            'matrik_contact_style_genaral_location_title_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home4-contact-section .contact-content .contact-wrap .address-area span' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_contact_style_genaral_location',
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
                'name'     => 'matrik_contact_style_genaral_location_typ',
                'selector' => '{{WRAPPER}} .home4-contact-section .contact-content .contact-wrap .address-area a',

            ]
        );

        $this->add_control(
            'matrik_contact_style_genaral_location_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home4-contact-section .contact-content .contact-wrap .address-area a' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_contact_style_genaral_location_hover_color',
            [
                'label'     => esc_html__('Hover Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home4-contact-section .contact-content .contact-wrap .address-area a:hover' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_contact_style_two_genaral_form_label',
            [
                'label'     => esc_html__('Form Label', 'matrik-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'matrik-core'),
                'name'     => 'matrik_contact_style_two_genaral_form_label_typ',
                'selector' => '{{WRAPPER}} .form-inner label',

            ]
        );

        $this->add_control(
            'matrik_contact_style_two_genaral_form_label_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .form-inner label' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_contact_style_two_genaral_form_input',
            [
                'label'     => esc_html__('Form Input', 'matrik-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'matrik-core'),
                'name'     => 'matrik_contact_style_two_genaral_form_input_typ',
                'selector' => '{{WRAPPER}} .form-inner input',

            ]
        );

        $this->add_control(
            'matrik_contact_style_two_genaral_form_input_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .form-inner input' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_contact_style_two_genaral_form_input_border_color',
            [
                'label'     => esc_html__('Border Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .form-inner input' => 'border: 1px solid {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_contact_style_two_genaral_form_input_bg_color',
            [
                'label'     => esc_html__('Background Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .form-inner input' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_contact_style_two_genaral_check_box_text',
            [
                'label'     => esc_html__('Acceptance Label', 'matrik-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'matrik-core'),
                'name'     => 'matrik_contact_style_two_genaral_check_box_text_typ',
                'selector' => '{{WRAPPER}} .form-inner2 .form-check .form-check-label',

            ]
        );

        $this->add_control(
            'matrik_contact_style_two_genaral_check_box_text_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .form-inner2 .form-check .form-check-label' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_contact_style_two_genaral_form_button',
            [
                'label'     => esc_html__('Form Button', 'matrik-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'matrik-core'),
                'name'     => 'matrik_contact_style_two_genaral_form_button_typ',
                'selector' => '{{WRAPPER}} .primary-btn4.black-bg',

            ]
        );

        $this->add_control(
            'matrik_contact_style_two_genaral_form_button_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .primary-btn4.black-bg' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_contact_style_two_genaral_form_button_hover_color',
            [
                'label'     => esc_html__('Hover Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .primary-btn4.black-bg:hover' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_contact_style_two_genaral_form_button_bg_color',
            [
                'label'     => esc_html__('Background Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .primary-btn4.black-bg' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_contact_style_two_genaral_form_button_hover_bg_color',
            [
                'label'     => esc_html__('Hover Background Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .primary-btn4.black-bg > span' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_contact_style_two_genaral_form_bg',
            [
                'label'     => esc_html__('Form Background', 'matrik-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_control(
            'matrik_contact_style_two_genaral_form_bg_color',
            [
                'label'     => esc_html__('Background Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .contact-form-wrap' => 'background-color: {{VALUE}};',
                ],
            ]
        );


        $this->end_controls_section();

        //style start

        $this->start_controls_section(
            'matrik_contact_style_five_genaral',
            [
                'label'     => esc_html__('Styles', 'matrik-core'),
                'tab'       => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'matrik_contact_genaral_style_selection' => ['style_five', 'style_six'],
                ]
            ]
        );

        $this->add_control(
            'matrik_contact_style_five_genaral_subtitle',
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
                'name'     => 'matrik_contact_style_five_genaral_subtitle_typ',
                'selector' => '{{WRAPPER}} .inner-contact-section .section-title span',

            ]
        );

        $this->add_control(
            'matrik_contact_style_five_genaral_subtitle_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .inner-contact-section .section-title span' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_contact_style_five_genaral_subtitle_icon_color',
            [
                'label'     => esc_html__('Icon Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .inner-contact-section .section-title span svg' => 'fill: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_contact_style_five_genaral_subtitle_border_color',
            [
                'label'     => esc_html__('Border Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .inner-contact-section .section-title span' => 'border: 1px solid {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_contact_style_five_genaral_subtitle_bg_color',
            [
                'label'     => esc_html__('Background Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .inner-contact-section .section-title span' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_contact_style_five_genaral_title',
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
                'name'     => 'matrik_contact_style_five_genaral_title_typ',
                'selector' => '{{WRAPPER}} .inner-contact-section .section-title h2',

            ]
        );

        $this->add_control(
            'matrik_contact_style_five_genaral_title_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .inner-contact-section .section-title h2' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_contact_style_five_genaral_icon',
            [
                'label'     => esc_html__('Vector Icon', 'matrik-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_control(
            'matrik_contact_style_five_genaral_icon_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .inner-contact-section .arrow-vector' => 'fill: {{VALUE}};',
                ],
            ]
        );


        $this->add_control(
            'matrik_contact_style_five_genaral_contact_icon',
            [
                'label'     => esc_html__('Contact Icon', 'matrik-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_control(
            'matrik_contact_style_five_genaral_contact_icon_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .inner-contact-section .contact-content .contact-list .single-contact .icon svg' => 'fill: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_contact_style_five_genaral_contact_title',
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
                'name'     => 'matrik_contact_style_five_genaral_contact_title_typ',
                'selector' => '{{WRAPPER}} .inner-contact-section .contact-content .contact-list .single-contact .content span',

            ]
        );

        $this->add_control(
            'matrik_contact_style_five_genaral_contact_title_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .inner-contact-section .contact-content .contact-list .single-contact .content span' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_contact_style_five_genaral_contact',
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
                'name'     => 'matrik_contact_style_five_genaral_contact_typ',
                'selector' => '{{WRAPPER}} .inner-contact-section .contact-content .contact-list .single-contact .content span',

            ]
        );

        $this->add_control(
            'matrik_contact_style_five_genaral_contact_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .inner-contact-section .contact-content .contact-list .single-contact .content span' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_contact_style_five_genaral_contact_hover_color',
            [
                'label'     => esc_html__('Hover Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .inner-contact-section .contact-content .contact-list .single-contact .content h6 a:hover' => 'color: {{VALUE}};',
                ],
            ]
        );


        $this->end_controls_section();

        //style start

        $this->start_controls_section(
            'matrik_contact_style_seven_genaral',
            [
                'label'     => esc_html__('Styles', 'matrik-core'),
                'tab'       => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'matrik_contact_genaral_style_selection' => ['style_seven'],
                ]
            ]
        );

        $this->add_control(
            'matrik_contact_style_seven_genaral_location_button',
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
                'name'     => 'matrik_contact_style_seven_genaral_location_button_typ',
                'selector' => '{{WRAPPER}} .contact-page-address-section h6 a',

            ]
        );

        $this->add_control(
            'matrik_contact_style_seven_genaral_location_button_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .contact-page-address-section h6 a' => 'color: {{VALUE}};',
                ],
            ]
        );


        $this->add_control(
            'matrik_contact_style_seven_genaral_location_title',
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
                'name'     => 'matrik_contact_style_seven_genaral_location_title_typ',
                'selector' => '{{WRAPPER}} .contact-page-address-section .address-list .single-address span',

            ]
        );

        $this->add_control(
            'matrik_contact_style_seven_genaral_location_title_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .contact-page-address-section .address-list .single-address span' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_contact_style_seven_genaral_location',
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
                'name'     => 'matrik_contact_style_seven_genaral_location_typ',
                'selector' => '{{WRAPPER}} .contact-page-address-section .address-list .single-address a',

            ]
        );

        $this->add_control(
            'matrik_contact_style_seven_genaral_location_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .contact-page-address-section .address-list .single-address a' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_contact_style_seven_genaral_location_icon_color',
            [
                'label'     => esc_html__('Icon Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .contact-page-address-section .address-list .single-address::before' => 'background-color: {{VALUE}};',
                ],
            ]
        );


        $this->add_control(
            'matrik_contact_style_seven_genaral_location_hover_color',
            [
                'label'     => esc_html__('Hover Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .contact-page-address-section .address-list .single-address a:hover' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section();

        //style start

        $this->start_controls_section(
            'matrik_contact_style_one_genaral',
            [
                'label'     => esc_html__('Styles', 'matrik-core'),
                'tab'       => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'matrik_contact_genaral_style_selection' => ['style_one'],
                ]
            ]
        );

        $this->add_control(
            'matrik_contact_style_one_genaral_subtitle',
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
                'name'     => 'matrik_contact_style_one_genaral_subtitle_typ',
                'selector' => '{{WRAPPER}} .section-title.two span',

            ]
        );

        $this->add_control(
            'matrik_contact_style_one_genaral_subtitle_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .section-title.two span' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_contact_style_one_genaral_subtitle_bg_color',
            [
                'label'     => esc_html__('Background Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .section-title.two span' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_contact_style_one_genaral_title',
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
                'name'     => 'matrik_contact_style_one_genaral_title_typ',
                'selector' => '{{WRAPPER}} .section-title h2',

            ]
        );

        $this->add_control(
            'matrik_contact_style_one_genaral_title_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .section-title h2' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_contact_style_one_genaral_faq_question',
            [
                'label'     => esc_html__('Question', 'matrik-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'matrik-core'),
                'name'     => 'matrik_contact_style_one_genaral_faq_question_typ',
                'selector' => '{{WRAPPER}} .faq-wrap .accordion .accordion-item .accordion-header .accordion-button',

            ]
        );

        $this->add_control(
            'matrik_contact_style_one_genaral_faq_question_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .faq-wrap .accordion .accordion-item .accordion-header .accordion-button' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_contact_style_one_genaral_answer',
            [
                'label'     => esc_html__('FAQ Answer', 'matrik-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'matrik-core'),
                'name'     => 'matrik_contact_style_one_genaral_answer_typ',
                'selector' => '{{WRAPPER}} .faq-wrap .accordion .accordion-item .accordion-body',

            ]
        );

        $this->add_control(
            'matrik_contact_style_one_genaral_answer_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .faq-wrap .accordion .accordion-item .accordion-body' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_contact_style_one_genaral_form_label',
            [
                'label'     => esc_html__('Form Label', 'matrik-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'matrik-core'),
                'name'     => 'matrik_contact_style_one_genaral_form_label_typ',
                'selector' => '{{WRAPPER}} .form-inner label',

            ]
        );

        $this->add_control(
            'matrik_contact_style_one_genaral_form_label_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .form-inner label' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_contact_style_one_genaral_form_input',
            [
                'label'     => esc_html__('Form Input', 'matrik-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'matrik-core'),
                'name'     => 'matrik_contact_style_one_genaral_form_input_typ',
                'selector' => '{{WRAPPER}} .form-inner input',

            ]
        );

        $this->add_control(
            'matrik_contact_style_one_genaral_form_input_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .form-inner input' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_contact_style_one_genaral_form_input_border_color',
            [
                'label'     => esc_html__('Border Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .form-inner input' => 'border: 1px solid {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_contact_style_one_genaral_form_input_bg_color',
            [
                'label'     => esc_html__('Background Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .form-inner input' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_contact_style_one_genaral_check_box_text',
            [
                'label'     => esc_html__('Acceptance Label', 'matrik-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'matrik-core'),
                'name'     => 'matrik_contact_style_one_genaral_check_box_text_typ',
                'selector' => '{{WRAPPER}} .form-inner2 .form-check .form-check-label',

            ]
        );

        $this->add_control(
            'matrik_contact_style_one_genaral_check_box_text_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .form-inner2 .form-check .form-check-label' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_contact_style_one_genaral_form_button',
            [
                'label'     => esc_html__('Form Button', 'matrik-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'matrik-core'),
                'name'     => 'matrik_contact_style_one_genaral_form_button_typ',
                'selector' => '{{WRAPPER}} .primary-btn3.black-bg',

            ]
        );

        $this->add_control(
            'matrik_contact_style_one_genaral_form_button_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .primary-btn3.black-bg' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_contact_style_one_genaral_form_button_hover_color',
            [
                'label'     => esc_html__('Hover Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .primary-btn3.black-bg:hover' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_contact_style_one_genaral_form_button_bg_color',
            [
                'label'     => esc_html__('Background Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .primary-btn3.black-bg' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_contact_style_one_genaral_form_button_hover_bg_color',
            [
                'label'     => esc_html__('Hover Background Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .primary-btn3.black-bg::after' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_contact_style_one_genaral_form_bg',
            [
                'label'     => esc_html__('Form Background', 'matrik-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_control(
            'matrik_contact_style_one_genaral_form_bg_color',
            [
                'label'     => esc_html__('Background Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .contact-form-wrap' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section();

        //style start

        $this->start_controls_section(
            'matrik_contact_style_four_genaral',
            [
                'label'     => esc_html__('Styles', 'matrik-core'),
                'tab'       => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'matrik_contact_genaral_style_selection' => ['style_four'],
                ]
            ]
        );

        $this->add_control(
            'matrik_contact_style_four_genaral_title',
            [
                'label'     => esc_html__('Section Background', 'matrik-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_control(
            'matrik_contact_style_four_genaral_bg_color',
            [
                'label'     => esc_html__('Background Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home6-contact-section .contact-wrapper' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_contact_style_four_genaral_form',
            [
                'label'     => esc_html__('Labels', 'matrik-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'matrik-core'),
                'name'     => 'matrik_contact_style_four_genaral_labels_typ',
                'selector' => '{{WRAPPER}} .home6-contact-section .contact-wrapper .form-inner label',

            ]
        );

        $this->add_control(
            'matrik_contact_style_four_genaral_labels_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home6-contact-section .contact-wrapper .form-inner label' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Button Typography', 'matrik-core'),
                'name'     => 'matrik_contact_style_four_genaral_button_typ',
                'selector' => '{{WRAPPER}} .primary-btn6',

            ]
        );

        $this->add_control(
            'matrik_contact_style_four_genaral_button_color',
            [
                'label'     => esc_html__('Button Text Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .primary-btn6' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_contact_style_four_genaral_button_bg_color',
            [
                'label'     => esc_html__('Button BG Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .primary-btn6' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_contact_style_four_genaral_button_bg_hover_color',
            [
                'label'     => esc_html__('Button Hover BG Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .primary-btn6::after' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_contact_style_four_genaral_input_border_color',
            [
                'label'     => esc_html__('Input Border Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home6-contact-section .form-inner input'    => 'border-color: {{VALUE}};',
                    '{{WRAPPER}} .home6-contact-section .form-inner textarea' => 'border-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Checkbox Text Typography', 'matrik-core'),
                'name'     => 'matrik_contact_style_four_genaral_checkbox_typ',
                'selector' => '{{WRAPPER}} .home6-contact-section .wpcf7-checkbox',

            ]
        );

        $this->add_control(
            'matrik_contact_style_four_genaral_checkbox_color',
            [
                'label'     => esc_html__('Checkbox Text Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home6-contact-section .wpcf7-checkbox' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section();



        //style start

        $this->start_controls_section(
            'matrik_contact_style_three_genaral',
            [
                'label'     => esc_html__('Styles', 'matrik-core'),
                'tab'       => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'matrik_contact_genaral_style_selection' => ['style_three'],
                ]
            ]
        );

        $this->add_control(
            'matrik_contact_style_three_genaral_subtitle',
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
                'name'     => 'matrik_contact_style_three_genaral_subtitle_typ',
                'selector' => '{{WRAPPER}} .section-title.four span',

            ]
        );

        $this->add_control(
            'matrik_contact_style_three_genaral_subtitle_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .section-title.four span' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_contact_style_three_genaral_subtitle_icon_color',
            [
                'label'     => esc_html__('Icon Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .section-title.four span svg' => 'fill: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_contact_style_three_genaral_title',
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
                'name'     => 'matrik_contact_style_three_genaral_title_typ',
                'selector' => '{{WRAPPER}} .section-title.four h2',

            ]
        );

        $this->add_control(
            'matrik_contact_style_three_genaral_title_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .section-title.four h2' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_contact_style_three_genaral_accrodion_question',
            [
                'label'     => esc_html__('Accordion Question', 'matrik-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'matrik-core'),
                'name'     => 'matrik_contact_style_three_genaral_accrodion_question_typ',
                'selector' => '{{WRAPPER}} .faq-wrap.two .accordion .accordion-item .accordion-header .accordion-button',

            ]
        );

        $this->add_control(
            'matrik_contact_style_three_genaral_accrodion_question_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .faq-wrap.two .accordion .accordion-item .accordion-header .accordion-button' => 'color: {{VALUE}};',
                ],
            ]
        );


        $this->add_control(
            'matrik_contact_style_three_genaral_accrodion_answer',
            [
                'label'     => esc_html__('Accordion Answer', 'matrik-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'matrik-core'),
                'name'     => 'matrik_contact_style_three_genaral_accrodion_answer_typ',
                'selector' => '{{WRAPPER}} .faq-wrap.two .accordion .accordion-item .accordion-body',

            ]
        );

        $this->add_control(
            'matrik_contact_style_three_genaral_accrodion_answer_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .faq-wrap.two .accordion .accordion-item .accordion-body' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_contact_style_three_genaral_form_label',
            [
                'label'     => esc_html__('Form Label', 'matrik-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]

        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'matrik-core'),
                'name'     => 'matrik_contact_style_three_genaral_form_label_typ',
                'selector' => '{{WRAPPER}} .contact-form-wrap.three .form-inner label',

            ]
        );

        $this->add_control(
            'matrik_contact_style_three_genaral_form_label_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .contact-form-wrap.three .form-inner label' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_contact_style_three_genaral_form_input',
            [
                'label'     => esc_html__('Form Input', 'matrik-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'matrik-core'),
                'name'     => 'matrik_contact_style_three_genaral_form_input_typ',
                'selector' => '{{WRAPPER}} .form-inner input',

            ]
        );

        $this->add_control(
            'matrik_contact_style_three_genaral_form_input_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .form-inner input' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_contact_style_three_genaral_form_input_border_color',
            [
                'label'     => esc_html__('Border Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .form-inner input' => 'border: 1px solid {{VALUE}};',
                ],
            ]
        );


        $this->add_control(
            'matrik_contact_style_three_genaral_form_input_bg_color',
            [
                'label'     => esc_html__('Background Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .form-inner input' => 'background: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_contact_style_three_genaral_form_acceptance_text',
            [
                'label'     => esc_html__('Acceptance Label', 'matrik-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'matrik-core'),
                'name'     => 'matrik_contact_style_three_genaral_form_acceptance_text_typ',
                'selector' => '{{WRAPPER}} .contact-form-wrap.three .form-inner2 .form-check .form-check-label',

            ]
        );

        $this->add_control(
            'matrik_contact_style_three_genaral_form_acceptance_text_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .contact-form-wrap.three .form-inner2 .form-check .form-check-label' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_contact_style_three_genaral_form_button',
            [
                'label'     => esc_html__('Form Button', 'matrik-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'matrik-core'),
                'name'     => 'matrik_contact_style_three_genaral_form_button_typ',
                'selector' => '{{WRAPPER}} .primary-btn5',

            ]
        );

        $this->add_control(
            'matrik_contact_style_three_genaral_form_button_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .primary-btn5' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_contact_style_three_genaral_form_button_hoveer_color',
            [
                'label'     => esc_html__('Hover Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .primary-btn5:hover' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_contact_style_three_genaral_form_button_icon_color',
            [
                'label'     => esc_html__('Icon Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .primary-btn5.two .arrow' => 'fill: {{VALUE}};',
                ],
            ]
        );


        $this->add_control(
            'matrik_contact_style_three_genaral_form_button_hover_icon_color',
            [
                'label'     => esc_html__('Hover Icon Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .primary-btn5.two:hover .arrow' => 'fill: {{VALUE}};',
                ],
            ]
        );


        $this->add_control(
            'matrik_contact_style_three_genaral_form_button_hover_color',
            [
                'label'     => esc_html__('Background Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .primary-btn5.two' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_contact_style_three_genaral_form_button_hover_bg_color',
            [
                'label'     => esc_html__('Hover Background Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .primary-btn5 > span' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section();
    }

    protected function render()
    {

        $settings = $this->get_settings_for_display();

?>

        <?php if ($settings['matrik_contact_genaral_style_selection'] == 'style_one'): ?>
            <div class="home2-contact-section">
                <div class="container">
                    <div class="row gy-5">
                        <div class="col-lg-5">
                            <div class="section-title two mb-70 wow animate fadeInDown" data-wow-delay="200ms" data-wow-duration="1500ms">
                                <?php if (!empty($settings['matrik_contact_genaral_subtitle'])): ?>
                                    <span><?php echo esc_html($settings['matrik_contact_genaral_subtitle']); ?></span>
                                <?php endif; ?>
                                <?php if (!empty($settings['matrik_contact_genaral_title'])): ?>
                                    <h2><?php echo esc_html($settings['matrik_contact_genaral_title']); ?></h2>
                                <?php endif; ?>
                            </div>
                            <div class="faq-wrap">
                                <div class="accordion" id="accordionExample">
                                    <?php foreach ($settings['matrik_contact_genaral_faq_list'] as $index => $faq): ?>
                                        <div class="accordion-item wow animate fadeInDown" data-wow-delay="200ms" data-wow-duration="1500ms">
                                            <h2 class="accordion-header" id="flush-heading-<?php echo esc_attr($index); ?>">
                                                <button class="accordion-button <?php echo ($index == 0) ? '' : 'collapsed'; ?>" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse-<?php echo esc_attr($index); ?>" aria-expanded="<?php echo ($index == 0) ? 'true' : 'false'; ?>" aria-controls="flush-collapse-<?php echo esc_attr($index); ?>">
                                                    <?php echo esc_html($faq['matrik_contact_genaral_faq_question']); ?>
                                                </button>
                                            </h2>
                                            <div id="flush-collapse-<?php echo esc_attr($index); ?>" class="accordion-collapse collapse <?php echo ($index == 0) ? 'show' : ''; ?>" aria-labelledby="flush-heading-<?php echo esc_attr($index); ?>" data-bs-parent="#accordionExample">
                                                <?php if (!empty($faq['matrik_contact_genaral_faq_answer'])): ?>
                                                    <div class="accordion-body">
                                                        <?php echo esc_html($faq['matrik_contact_genaral_faq_answer']); ?>
                                                    </div>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        </div>
                        <?php if (!empty($settings['matrik_contact_genaral_faq_shortcode'])): ?>
                            <div class="col-lg-7 d-flex align-items-lg-end wow animate fadeInRight" data-wow-delay="200ms" data-wow-duration="1500ms">
                                <div class="contact-form-wrap">
                                    <?php echo do_shortcode($settings['matrik_contact_genaral_faq_shortcode']); ?>
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        <?php endif; ?>

        <?php if ($settings['matrik_contact_genaral_style_selection'] == 'style_two'): ?>
            <div class="home4-contact-section">
                <div class="container">
                    <div class="row gy-5 align-items-center">
                        <div class=" col-lg-5 wow animate fadeInLeft" data-wow-delay="200ms" data-wow-duration="1500ms">
                            <div class="contact-content">
                                <?php if (!empty($settings['matrik_contact_genaral_two_title'])): ?>
                                    <div class="section-title three">
                                        <h2><?php echo esc_html($settings['matrik_contact_genaral_two_title']); ?></h2>
                                    </div>
                                <?php endif; ?>
                                <div class="vector-and-content">
                                    <svg width="76" height="202" viewBox="0 0 76 202" xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M4.33349 3.05273C4.33349 4.52549 5.5274 5.7194 7.00015 5.7194C8.47291 5.7194 9.66682 4.52549 9.66682 3.05273C9.66682 1.57997 8.47291 0.386067 7.00015 0.386067C5.5274 0.386067 4.33349 1.57997 4.33349 3.05273ZM6.86257 201.533C7.12805 201.609 7.40487 201.456 7.48086 201.19L8.71922 196.864C8.79521 196.599 8.6416 196.322 8.37612 196.246C8.11064 196.17 7.83382 196.323 7.75783 196.589L6.65706 200.434L2.81151 199.334C2.54603 199.258 2.26921 199.411 2.19322 199.677C2.11722 199.942 2.27083 200.219 2.53632 200.295L6.86257 201.533ZM7.00015 3.05273C6.81154 3.5158 6.81187 3.51593 6.81264 3.51624C6.81349 3.51659 6.81471 3.51709 6.81641 3.51778C6.81982 3.51918 6.82501 3.5213 6.83197 3.52415C6.84588 3.52985 6.86684 3.53846 6.8947 3.54996C6.95042 3.57295 7.03376 3.60748 7.14353 3.65338C7.36307 3.74516 7.68832 3.88238 8.10983 4.06357C8.95287 4.42593 10.1809 4.96412 11.7182 5.66635C14.793 7.0709 19.1043 9.13126 24.0471 11.7532C33.9379 16.9999 46.3358 24.484 56.418 33.4498C66.5165 42.4303 74.2006 52.8165 74.8448 63.8583C75.4861 74.8493 69.155 86.6962 50.7283 98.6331L51.272 99.4724C69.8454 87.4405 76.5143 75.3031 75.8431 63.8C75.1749 52.3477 67.2339 41.73 57.0825 32.7026C46.9146 23.6606 34.4375 16.133 24.5157 10.8698C19.5523 8.23693 15.2229 6.16788 12.1337 4.75675C10.589 4.05115 9.35408 3.50992 8.50474 3.14484C8.08006 2.9623 7.75174 2.82378 7.52926 2.73077C7.41803 2.68426 7.33324 2.64912 7.2761 2.62555C7.24753 2.61376 7.22586 2.60486 7.21126 2.59887C7.20396 2.59588 7.19842 2.59361 7.19466 2.59208C7.19279 2.59131 7.19131 2.59071 7.19037 2.59033C7.18934 2.58991 7.18876 2.58967 7.00015 3.05273ZM50.7283 98.6331C13.6176 122.673 2.51766 148.303 0.7521 167.985C-0.129487 177.812 1.31876 186.13 2.988 191.993C3.82271 194.925 4.7131 197.244 5.39628 198.834C5.73789 199.628 6.02779 200.24 6.23315 200.656C6.33583 200.863 6.41739 201.021 6.47372 201.129C6.50189 201.182 6.52375 201.223 6.53879 201.251C6.54632 201.265 6.55214 201.276 6.55618 201.283C6.55821 201.287 6.55979 201.29 6.56093 201.292C6.56149 201.293 6.562 201.294 6.56229 201.294C6.56268 201.295 6.56297 201.295 7.00016 201.053C7.43736 200.81 7.43741 200.81 7.43736 200.81C7.43718 200.81 7.43701 200.809 7.43667 200.809C7.43599 200.808 7.43486 200.806 7.43328 200.803C7.43014 200.797 7.42522 200.788 7.41861 200.776C7.40538 200.751 7.38534 200.714 7.359 200.664C7.30632 200.563 7.22846 200.412 7.12948 200.212C6.93151 199.812 6.64914 199.216 6.31497 198.439C5.64658 196.884 4.77133 194.605 3.94978 191.72C2.30649 185.948 0.87971 177.754 1.7481 168.074C3.4825 148.74 14.3825 123.369 51.272 99.4724L50.7283 98.6331Z" />
                                    </svg>
                                    <?php if (!empty($settings['matrik_contact_genaral_two_description'])): ?>
                                        <p><?php echo esc_html($settings['matrik_contact_genaral_two_description']); ?></p>
                                    <?php endif; ?>
                                </div>
                                <div class="contact-wrap">
                                    <ul class="contact-list">
                                        <?php foreach ($settings['matrik_contact_genaral_two_contact_list'] as $data): ?>
                                            <li class="single-contact">
                                                <div class="icon">
                                                    <?php \Elementor\Icons_Manager::render_icon($data['matrik_contact_genaral_two_contact_icon'], ['aria-hidden' => 'true']); ?>
                                                </div>
                                                <div class="content">
                                                    <?php if (!empty($data['matrik_contact_genaral_two_contact_title'])): ?>
                                                        <span><?php echo esc_html($data['matrik_contact_genaral_two_contact_title']); ?></span>
                                                    <?php endif; ?>
                                                    <h6><a href="<?php if ($data['matrik_contact_genaral_two_contact_type'] == 'phone'): ?>tel:<?php echo preg_replace('/[^0-9]/', '', $data['matrik_contact_genaral_two_contact_phone']); ?><?php elseif ($data['matrik_contact_genaral_two_contact_type'] == 'email') : ?>mailto:<?php echo esc_html($data['matrik_contact_genaral_two_contact_email']); ?><?php endif; ?>"><?php if ($data['matrik_contact_genaral_two_contact_type'] == 'phone'): ?><?php echo esc_html($data['matrik_contact_genaral_two_contact_phone']); ?><?php elseif ($data['matrik_contact_genaral_two_contact_type'] == 'email') : ?><?php echo esc_html($data['matrik_contact_genaral_two_contact_email']); ?><?php endif; ?></a></h6>
                                                </div>
                                            </li>
                                        <?php endforeach; ?>
                                    </ul>
                                    <div class="address-area">
                                        <?php if (!empty($settings['matrik_contact_genaral_location_area_title'])): ?>
                                            <span><?php echo esc_html($settings['matrik_contact_genaral_location_area_title']); ?></span>
                                        <?php endif; ?>
                                        <?php if (!empty($settings['matrik_contact_genaral_location_area_location'])): ?>
                                            <a href="<?php echo esc_url($settings['matrik_contact_genaral_location_area_location_url']['url']); ?>"><?php echo esc_html($settings['matrik_contact_genaral_location_area_location']); ?></a>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php if (!empty($settings['matrik_contact_genaral_faq_shortcode'])): ?>
                            <div class="col-lg-7 wow animate fadeInRight" data-wow-delay="200ms" data-wow-duration="1500ms">
                                <div class="contact-form-wrap two">
                                    <?php echo do_shortcode($settings['matrik_contact_genaral_faq_shortcode']); ?>
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        <?php endif; ?>

        <?php if ($settings['matrik_contact_genaral_style_selection'] == 'style_three'): ?>
            <div class="home5-contact-section">
                <div class="container">
                    <div class="row gy-5">
                        <div class="col-lg-5">
                            <div class="section-title four mb-60 wow animate fadeInDown" data-wow-delay="200ms" data-wow-duration="1500ms">
                                <?php if (!empty($settings['matrik_contact_genaral_subtitle'])): ?>
                                    <span>
                                        <svg width="12" height="12" viewBox="0 0 12 12" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M0.0594065 0H12.0001V2.2353L2.25745 12L0 9.76471L6.65353 3.17647L0.0594065 3.2353V0Z" />
                                            <path d="M11.9999 11.9999V4.47046L8.79199 7.64693V11.9999H11.9999Z" />
                                        </svg>
                                        <?php echo esc_html($settings['matrik_contact_genaral_subtitle']); ?>
                                    </span>
                                <?php endif; ?>
                                <?php if (!empty($settings['matrik_contact_genaral_title'])): ?>
                                    <h2><?php echo esc_html($settings['matrik_contact_genaral_title']); ?></h2>
                                <?php endif; ?>
                            </div>
                            <div class="faq-wrap two">
                                <div class="accordion" id="accordionExample">
                                    <?php foreach ($settings['matrik_contact_genaral_faq_list'] as $index => $faq): ?>
                                        <div class="accordion-item wow animate fadeInDown" data-wow-delay="200ms" data-wow-duration="1500ms">
                                            <h2 class="accordion-header" id="flush-heading-<?php echo esc_attr($index); ?>">
                                                <button class="accordion-button <?php echo ($index == 0) ? '' : 'collapsed'; ?>" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse-<?php echo esc_attr($index); ?>" aria-expanded="<?php echo ($index == 0) ? 'true' : 'false'; ?>" aria-controls="flush-collapse-<?php echo esc_attr($index); ?>">
                                                    <?php echo esc_html($faq['matrik_contact_genaral_faq_question']); ?>
                                                </button>
                                            </h2>
                                            <div id="flush-collapse-<?php echo esc_attr($index); ?>" class="accordion-collapse collapse <?php echo ($index == 0) ? 'show' : ''; ?>" aria-labelledby="flush-heading-<?php echo esc_attr($index); ?>" data-bs-parent="#accordionExample">
                                                <?php if (!empty($faq['matrik_contact_genaral_faq_answer'])): ?>
                                                    <div class="accordion-body">
                                                        <?php echo esc_html($faq['matrik_contact_genaral_faq_answer']); ?>
                                                    </div>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        </div>
                        <?php if (!empty($settings['matrik_contact_genaral_faq_shortcode'])): ?>
                            <div class="col-lg-7 d-flex align-items-lg-end wow animate fadeInRight" data-wow-delay="200ms" data-wow-duration="1500ms">
                                <div class="contact-form-wrap three">
                                    <?php echo do_shortcode($settings['matrik_contact_genaral_faq_shortcode']); ?>
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        <?php endif; ?>

        <?php if ($settings['matrik_contact_genaral_style_selection'] == 'style_four'): ?>
            <div class="home6-contact-section">
                <div class="container">
                    <div class="contact-wrapper">
                        <div class="row gy-5 align-items-center">
                            <?php if (!empty($settings['matrik_contact_genaral_six_banner_image'])): ?>
                                <div class="col-lg-6 d-md-block d-none">
                                    <div class="contact-img">
                                        <img src="<?php echo esc_url($settings['matrik_contact_genaral_six_banner_image']['url']); ?>" alt="<?php echo esc_attr__('banner-image', 'matrik-core'); ?>">
                                    </div>
                                </div>
                            <?php endif; ?>
                            <?php if (!empty($settings['matrik_contact_genaral_faq_shortcode'])): ?>
                                <div class="col-lg-6">
                                    <div class="contact-form-wrap">
                                        <?php echo do_shortcode($settings['matrik_contact_genaral_faq_shortcode']); ?>
                                    </div>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>

        <?php if ($settings['matrik_contact_genaral_style_selection'] == 'style_five'): ?>
            <div class="inner-contact-section">
                <div class="container">
                    <div class="row gy-5 align-items-center">
                        <div class="col-lg-5 wow animate fadeInLeft" data-wow-delay="200ms" data-wow-duration="1500ms">
                            <div class="contact-content">
                                <div class="section-title two">
                                    <?php if (!empty($settings['matrik_contact_genaral_subtitle'])): ?>
                                        <span>
                                            <svg width="9" height="14" viewBox="0 0 9 14" xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M8.98296 6.85403C8.95783 6.74844 8.90581 6.65097 8.83186 6.57091C8.7579 6.49085 8.66448 6.43086 8.56049 6.39665L5.40652 5.35573L7.64645 0.92109C7.78706 0.642066 7.70293 0.302757 7.44742 0.120036C7.19067 -0.0620481 6.83912 -0.0346848 6.61687 0.186515L0.188418 6.55014C0.11097 6.62683 0.0545794 6.72182 0.024588 6.82611C-0.00540343 6.9304 -0.008003 7.04055 0.0170357 7.14612C0.042173 7.25171 0.0941932 7.34917 0.168144 7.42923C0.242096 7.50929 0.335517 7.56928 0.439513 7.60349L3.59348 8.64441L1.35355 13.0791C1.21294 13.3581 1.29707 13.6974 1.55258 13.8801C1.80847 14.0616 2.15934 14.0351 2.38313 13.8136L8.81158 7.45C8.88903 7.37332 8.94542 7.27833 8.97541 7.17403C9.0054 7.06974 9.008 6.95959 8.98296 6.85403Z" />
                                            </svg>
                                            <?php echo esc_html($settings['matrik_contact_genaral_subtitle']); ?>
                                        </span>
                                    <?php endif; ?>
                                    <?php if (!empty($settings['matrik_contact_genaral_title'])): ?>
                                        <h2><?php echo esc_html($settings['matrik_contact_genaral_title']); ?></h2>
                                    <?php endif; ?>
                                </div>
                                <svg class="arrow-vector" width="8" height="143" viewBox="0 0 8 143" xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M1.33333 3C1.33333 4.47276 2.52724 5.66667 4 5.66667C5.47276 5.66667 6.66667 4.47276 6.66667 3C6.66667 1.52724 5.47276 0.333333 4 0.333333C2.52724 0.333333 1.33333 1.52724 1.33333 3ZM3.64645 142.354C3.84171 142.549 4.1583 142.549 4.35356 142.354L7.53554 139.172C7.7308 138.976 7.7308 138.66 7.53554 138.464C7.34028 138.269 7.0237 138.269 6.82843 138.464L4.00001 141.293L1.17158 138.464C0.976317 138.269 0.659734 138.269 0.464472 138.464C0.26921 138.66 0.26921 138.976 0.464472 139.172L3.64645 142.354ZM3.5 3L3.50001 142L4.50001 142L4.5 3L3.5 3Z" />
                                </svg>
                                <ul class="contact-list">
                                    <?php foreach ($settings['matrik_contact_genaral_two_contact_list'] as $data): ?>
                                        <li class="single-contact">
                                            <div class="icon">
                                                <?php \Elementor\Icons_Manager::render_icon($data['matrik_contact_genaral_two_contact_icon'], ['aria-hidden' => 'true']); ?>
                                            </div>
                                            <div class="content">
                                                <?php if (!empty($data['matrik_contact_genaral_two_contact_title'])): ?>
                                                    <span><?php echo esc_html($data['matrik_contact_genaral_two_contact_title']); ?></span>
                                                <?php endif; ?>
                                                <h6><a href="<?php if ($data['matrik_contact_genaral_two_contact_type'] == 'phone'): ?>tel:<?php echo preg_replace('/[^0-9]/', '', $data['matrik_contact_genaral_two_contact_phone']); ?><?php elseif ($data['matrik_contact_genaral_two_contact_type'] == 'email') : ?>mailto:<?php echo esc_html($data['matrik_contact_genaral_two_contact_email']); ?><?php endif; ?>"><?php if ($data['matrik_contact_genaral_two_contact_type'] == 'phone'): ?><?php echo esc_html($data['matrik_contact_genaral_two_contact_phone']); ?><?php elseif ($data['matrik_contact_genaral_two_contact_type'] == 'email') : ?><?php echo esc_html($data['matrik_contact_genaral_two_contact_email']); ?><?php endif; ?></a></h6>
                                            </div>
                                        </li>
                                    <?php endforeach; ?>
                                </ul>
                            </div>
                        </div>
                        <?php if (!empty($settings['matrik_contact_genaral_faq_shortcode'])): ?>
                            <div class="col-lg-7 wow animate fadeInRight" data-wow-delay="200ms" data-wow-duration="1500ms">
                                <div class="contact-form-wrap two">
                                    <?php echo do_shortcode($settings['matrik_contact_genaral_faq_shortcode']); ?>
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        <?php endif; ?>

        <?php if ($settings['matrik_contact_genaral_style_selection'] == 'style_six'): ?>
            <div class="inner-contact-section two" id="scroll-section">
                <div class="container">
                    <div class="contact-wrapper">
                        <div class="row gy-5 align-items-center">
                            <div class="col-lg-4 wow animate fadeInLeft" data-wow-delay="200ms" data-wow-duration="1500ms">
                                <div class="contact-content">
                                    <div class="section-title two">
                                        <?php if (!empty($settings['matrik_contact_genaral_subtitle'])): ?>
                                            <span>
                                                <svg width="9" height="14" viewBox="0 0 9 14" xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M8.98296 6.85403C8.95783 6.74844 8.90581 6.65097 8.83186 6.57091C8.7579 6.49085 8.66448 6.43086 8.56049 6.39665L5.40652 5.35573L7.64645 0.92109C7.78706 0.642066 7.70293 0.302757 7.44742 0.120036C7.19067 -0.0620481 6.83912 -0.0346848 6.61687 0.186515L0.188418 6.55014C0.11097 6.62683 0.0545794 6.72182 0.024588 6.82611C-0.00540343 6.9304 -0.008003 7.04055 0.0170357 7.14612C0.042173 7.25171 0.0941932 7.34917 0.168144 7.42923C0.242096 7.50929 0.335517 7.56928 0.439513 7.60349L3.59348 8.64441L1.35355 13.0791C1.21294 13.3581 1.29707 13.6974 1.55258 13.8801C1.80847 14.0616 2.15934 14.0351 2.38313 13.8136L8.81158 7.45C8.88903 7.37332 8.94542 7.27833 8.97541 7.17403C9.0054 7.06974 9.008 6.95959 8.98296 6.85403Z" />
                                                </svg>
                                                <?php echo esc_html($settings['matrik_contact_genaral_subtitle']); ?>
                                            </span>
                                        <?php endif; ?>
                                        <?php if (!empty($settings['matrik_contact_genaral_title'])): ?>
                                            <h2><?php echo esc_html($settings['matrik_contact_genaral_title']); ?></h2>
                                        <?php endif; ?>
                                    </div>
                                    <svg class="arrow-vector" width="8" height="143" viewBox="0 0 8 143" xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M1.33333 3C1.33333 4.47276 2.52724 5.66667 4 5.66667C5.47276 5.66667 6.66667 4.47276 6.66667 3C6.66667 1.52724 5.47276 0.333333 4 0.333333C2.52724 0.333333 1.33333 1.52724 1.33333 3ZM3.64645 142.354C3.84171 142.549 4.1583 142.549 4.35356 142.354L7.53554 139.172C7.7308 138.976 7.7308 138.66 7.53554 138.464C7.34028 138.269 7.0237 138.269 6.82843 138.464L4.00001 141.293L1.17158 138.464C0.976317 138.269 0.659734 138.269 0.464472 138.464C0.26921 138.66 0.26921 138.976 0.464472 139.172L3.64645 142.354ZM3.5 3L3.50001 142L4.50001 142L4.5 3L3.5 3Z" />
                                    </svg>
                                    <ul class="contact-list">

                                        <?php foreach ($settings['matrik_contact_genaral_two_contact_list'] as $data): ?>
                                            <li class="single-contact">
                                                <div class="icon">
                                                    <?php \Elementor\Icons_Manager::render_icon($data['matrik_contact_genaral_two_contact_icon'], ['aria-hidden' => 'true']); ?>
                                                </div>
                                                <div class="content">
                                                    <?php if (!empty($data['matrik_contact_genaral_two_contact_title'])): ?>
                                                        <span><?php echo esc_html($data['matrik_contact_genaral_two_contact_title']); ?></span>
                                                    <?php endif; ?>
                                                    <h6><a href="<?php if ($data['matrik_contact_genaral_two_contact_type'] == 'phone'): ?>tel:<?php echo preg_replace('/[^0-9]/', '', $data['matrik_contact_genaral_two_contact_phone']); ?><?php elseif ($data['matrik_contact_genaral_two_contact_type'] == 'email') : ?>mailto:<?php echo esc_html($data['matrik_contact_genaral_two_contact_email']); ?><?php endif; ?>"><?php if ($data['matrik_contact_genaral_two_contact_type'] == 'phone'): ?><?php echo esc_html($data['matrik_contact_genaral_two_contact_phone']); ?><?php elseif ($data['matrik_contact_genaral_two_contact_type'] == 'email') : ?><?php echo esc_html($data['matrik_contact_genaral_two_contact_email']); ?><?php endif; ?></a></h6>
                                                </div>
                                            </li>
                                        <?php endforeach; ?>

                                    </ul>
                                </div>
                            </div>
                            <?php if (!empty($settings['matrik_contact_genaral_faq_shortcode'])): ?>
                                <div class="col-lg-8 wow animate fadeInRight" data-wow-delay="200ms" data-wow-duration="1500ms">
                                    <div class="contact-form-wrap">
                                        <?php echo do_shortcode($settings['matrik_contact_genaral_faq_shortcode']); ?>
                                    </div>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>

        <?php if ($settings['matrik_contact_genaral_style_selection'] == 'style_seven'): ?>
            <div class="contact-page-address-section">
                <div class="container">
                    <?php if (!empty($settings['matrik_contact_seven_location_button_text'])): ?>
                        <h6><a href="<?php echo esc_url($settings['matrik_contact_seven_location_button_text_url']['url']); ?>"><?php echo esc_html($settings['matrik_contact_seven_location_button_text']); ?></a></h6>
                    <?php endif; ?>
                    <ul class="address-list">
                        <?php foreach ($settings['matrik_contact_seven_content_list'] as $data): ?>
                            <li class="single-address">
                                <?php if (!empty($data['matrik_contact_seven_location_title'])): ?>
                                    <span><?php echo esc_html($data['matrik_contact_seven_location_title']); ?></span>
                                <?php endif; ?>
                                <?php if (!empty($data['matrik_contact_seven_location'])): ?>
                                    <a href="<?php echo esc_url($data['matrik_contact_seven_location_text_url']['url']); ?>"><?php echo esc_html($data['matrik_contact_seven_location']); ?></a>
                                <?php endif; ?>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>
        <?php endif; ?>
<?php

    }
}

Plugin::instance()->widgets_manager->register(new Matrik_Contact_Widget());
