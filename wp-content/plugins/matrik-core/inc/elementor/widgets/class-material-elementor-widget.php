<?php

namespace Elementor;

if (!defined('ABSPATH')) exit;  // Exit if accessed directly

use Elementor\core\Schemes;
use Egns_Core\Egns_Helper;

class Matrik_Material_Widget extends Widget_Base
{

    public function get_name()
    {
        return 'matrik_material';
    }

    public function get_title()
    {
        return esc_html__('EG Material', 'matrik-core');
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
            'matrik_material_genaral',
            [
                'label' => esc_html__('General', 'matrik-core')
            ]
        );

        $this->add_control(
            'matrik_material_genaral_style_selection',
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
            'matrik_material_genaral_header_title',
            [
                'label'       => esc_html__('Header Title', 'matrik-core'),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default'     => esc_html__('[Our Product]', 'matrik-core'),
                'placeholder' => esc_html__('write your title here', 'matrik-core'),
                'label_block' => true,
                'condition' => [
                    'matrik_material_genaral_style_selection' => ['style_one'],
                ]
            ]
        );

        $this->add_control(
            'matrik_material_genaral_header_style_two_subtitle',
            [
                'label'       => esc_html__('Header Subtitle', 'matrik-core'),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default'     => esc_html__(' Our Products ', 'matrik-core'),
                'placeholder' => esc_html__('write your subtitle here', 'matrik-core'),
                'label_block' => true,
                'condition' => [
                    'matrik_material_genaral_style_selection' => ['style_two', 'style_three'],
                ]
            ]
        );

        $this->add_control(
            'matrik_material_genaral_header_style_two_title',
            [
                'label'       => esc_html__('Title', 'matrik-core'),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default'     => esc_html__('Quality Textile Products', 'matrik-core'),
                'placeholder' => esc_html__('write your title here', 'matrik-core'),
                'label_block' => true,
                'condition' => [
                    'matrik_material_genaral_style_selection' => ['style_two', 'style_three'],
                ]
            ]
        );

        $this->add_control(
            'matrik_material_genaral_query_area',
            [
                'label'     => esc_html__('Query Area', 'matrik-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_control(
            'matrik_material_genaral_post_per_page',
            [
                'label'       => esc_html__('Posts Per Page', 'matrik-core'),
                'type'        => Controls_Manager::NUMBER,
                'default'     => 4,
                'label_block' => false,
            ]
        );

        $this->add_control(
            'matrik_material_genaral_post_list',
            [
                'label'       => __('Post Lists', 'matrik-core'),
                'type'        => \Elementor\Controls_Manager::SELECT2,
                'label_block' => true,
                'multiple'    => true,
                'options'     => \Egns_Core\Egns_Helper::get_materials_post_options(),
            ]
        );

        $this->add_control(
            'matrik_material_genaral_order_by',
            [
                'label'   => esc_html__('Order By', 'matrik-core'),
                'type'    => Controls_Manager::SELECT,
                'default' => 'ID',
                'options' => [
                    'ID'         => esc_html__('Post Id', 'matrik-core'),
                    'author'     => esc_html__('Post Author', 'matrik-core'),
                    'title'      => esc_html__('Title', 'matrik-core'),
                    'post_date'  => esc_html__('Date', 'matrik-core'),
                    'rand'       => esc_html__('Random', 'matrik-core'),
                    'menu_order' => esc_html__('Menu Order', 'matrik-core'),
                ],
            ]
        );

        $this->add_control(
            'matrik_material_genaral_order',
            [
                'label'   => esc_html__('Order', 'matrik-core'),
                'type'    => Controls_Manager::SELECT,
                'options' => [
                    'asc'  => esc_html__('Ascending', 'matrik-core'),
                    'desc' => esc_html__('Descending', 'matrik-core')

                ],
                'default' => 'desc',
            ]
        );

        $this->add_control(
            'matrik_material_genaral_header_style_two_button_text',
            [
                'label'       => esc_html__('Button Text', 'matrik-core'),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default'     => esc_html__('View All Product', 'matrik-core'),
                'placeholder' => esc_html__('write your text here', 'matrik-core'),
                'label_block' => true,
                'condition' => [
                    'matrik_material_genaral_style_selection' => ['style_two', 'style_three'],
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
                'condition' => [
                    'matrik_material_genaral_style_selection' => ['style_two', 'style_three'],
                ]
            ]
        );

        $this->end_controls_section();



        $this->start_controls_section(
            'matrik_material_genaral_faq',
            [
                'label' => esc_html__('FAQ', 'matrik-core'),
                'condition' => [
                    'matrik_material_genaral_style_selection' => ['style_one'],
                ]
            ]
        );

        // Repeater
        $repeater = new \Elementor\Repeater();

        // accordion title
        $repeater->add_control(
            'matrik_material_genaral_faq_question',
            [
                'label' => esc_html__('Question', 'matrik-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('What services does your agency offer?', 'matrik-core'),
                'label_block' => true,
            ]
        );

        // accordion Description
        $repeater->add_control(
            'matrik_material_genaral_faq_answer',
            [
                'label' => esc_html__('Answer', 'matrik-core'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => wp_kses(' Yes, we provide comprehensive design and industry services tailored to meet your needs. ', wp_kses_allowed_html('post')),
                'placeholder' => esc_html__('Type your description here', 'matrik-core'),
            ]
        );

        $this->add_control(
            'matrik_material_genaral_faq_list',
            [
                'label' => esc_html__('FAQ List', 'matrik-core'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'matrik_material_genaral_faq_question' => esc_html('01. Do you provide design and Industry services?'),
                        'matrik_material_genaral_faq_answer' => wp_kses(' Yes, we provide comprehensive design and industry services tailored to meet your needs. ', wp_kses_allowed_html('post')),
                    ],
                    [
                        'matrik_material_genaral_faq_question' => esc_html('02. Is Matrik suitable for my business?'),
                        'matrik_material_genaral_faq_answer' => wp_kses('Discover if Matrik is the right fit for your business by exploring its tailored solutions for various industries and unique needs. ', wp_kses_allowed_html('post')),
                    ],
                    [
                        'matrik_material_genaral_faq_question' => esc_html('03. What is your typical project timeline?'),
                        'matrik_material_genaral_faq_answer' => wp_kses("Discover the typical project timeline for our construction services, outlining each phase from planning to completion, ensuring timely and efficient project delivery. ", wp_kses_allowed_html('post')),
                    ],
                    [
                        'matrik_material_genaral_faq_question' => esc_html('04. How do you handle permits and inspections?'),
                        'matrik_material_genaral_faq_answer' => wp_kses("We handle all necessary permits and inspections for your project, ensuring full compliance with local regulations and smooth progress throughout the construction process. ", wp_kses_allowed_html('post')),
                    ],
                    [
                        'matrik_material_genaral_faq_question' => esc_html('05. How do you handle waste disposal and recycling?'),
                        'matrik_material_genaral_faq_answer' => wp_kses("At our construction sites, we prioritize responsible waste disposal and recycling by adhering to local regulations, and implementing sustainable practices. ", wp_kses_allowed_html('post')),
                    ],
                    [
                        'matrik_material_genaral_faq_question' => esc_html('06. How do ensure buildings are structurally safe?'),
                        'matrik_material_genaral_faq_answer' => wp_kses("Learn how we prioritize safety in construction by following strict structural guidelines and using high-quality materials to ensure buildings are secure and reliable. ", wp_kses_allowed_html('post')),
                    ],
                ],
                'title_field' => '{{{ matrik_material_genaral_faq_question }}}',
            ]
        );

        $this->end_controls_section();



        $this->start_controls_section(
            'matrik_material_genaral_documents',
            [
                'label' => esc_html__('Documents', 'matrik-core'),
                'condition' => [
                    'matrik_material_genaral_style_selection' => ['style_one'],
                ]
            ]
        );

        $this->add_control(
            'matrik_material_genaral_documents_title',
            [
                'label'       => esc_html__('Title', 'matrik-core'),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default'     => esc_html__('[Advance R&D]', 'matrik-core'),
                'placeholder' => esc_html__('write your title here', 'matrik-core'),
                'label_block' => true,
            ]
        );

        // Repeater
        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'matrik_material_genaral_document_content_title',
            [
                'label' => esc_html__('Content Title', 'matrik-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Integrated Report', 'matrik-core'),
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'matrik_material_genaral_document_content_button',
            [
                'label' => esc_html__('Button Text', 'matrik-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => wp_kses('DOWNLOAD', wp_kses_allowed_html('post')),
                'placeholder' => esc_html__('Type your button text here', 'matrik-core'),
            ]
        );

        $repeater->add_control(
            'matrik_material_genaral_document_content_type',
            [
                'label'   => esc_html__('Select Type', 'matrik-core'),
                'type'    => Controls_Manager::SELECT,
                'options' => [
                    'upload' => esc_html__('Upload', 'matrik-core'),
                    'link' => esc_html__('Link', 'matrik-core'),

                ],
                'default' => 'upload',
            ]
        );

        $repeater->add_control(
            'matrik_material_genaral_document_content_upload',
            [
                'label' => esc_html__('Choose PDF', 'matrik-core'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'media_types' => ['application/pdf'],
                'condition' => [
                    'matrik_material_genaral_document_content_type' => ['upload'],
                ]
            ]
        );

        $repeater->add_control(
            'matrik_material_genaral_document_content_url',
            [
                'label'   => esc_html__('URL/Link', 'matrik-core'),
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
                    'matrik_material_genaral_document_content_type' => ['link'],
                ]
            ]
        );

        $this->add_control(
            'matrik_material_genaral_document_content_list',
            [
                'label' => esc_html__('Content List', 'matrik-core'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'matrik_material_genaral_document_content_title' => esc_html('Matrik Metal Company Profile'),

                    ],
                    [
                        'matrik_material_genaral_document_content_title' => esc_html('Integrated Report'),

                    ],
                    [
                        'matrik_material_genaral_document_content_title' => esc_html('Sustainbility Report'),

                    ],

                ],
                'title_field' => '{{{ matrik_material_genaral_document_content_title }}}',
            ]
        );

        $this->add_control(
            'matrik_material_genaral_document_bottom_text',
            [
                'label' => esc_html__('Bottom Text', 'matrik-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => wp_kses('See Your Near Location &amp; <a href="/contact">Contact</a> With Us Any Time!', wp_kses_allowed_html('post')),
                'label_block' => true,
            ]
        );

        $this->end_controls_section();

        //style start three

        $this->start_controls_section(
            'matrik_material_style_general',
            [
                'label'     => esc_html__('Styles', 'matrik-core'),
                'tab'       => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'matrik_material_genaral_style_selection' => ['style_one'],
                ]
            ]
        );

        $this->add_control(
            'matrik_material_style_general_header_title',
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
                'name'     => 'matrik_material_style_general_header_title_typ',
                'selector' => '{{WRAPPER}} .section-title h2',

            ]
        );

        $this->add_control(
            'matrik_material_style_general_header_title_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .section-title h2' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_material_style_general_material_title',
            [
                'label'     => esc_html__('Material Title', 'matrik-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'matrik-core'),
                'name'     => 'matrik_material_style_general_material_title_typ',
                'selector' => '{{WRAPPER}} .product-card .product-content h4 a',

            ]
        );

        $this->add_control(
            'matrik_material_style_general_material_title_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .product-card .product-content h4 a' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_material_style_general_material_title_hover_color',
            [
                'label'     => esc_html__('Hover Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .product-card .product-content h4 a:hover' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_material_style_general_material_description',
            [
                'label'     => esc_html__('Material Description', 'matrik-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'matrik-core'),
                'name'     => 'matrik_material_style_general_material_description_typ',
                'selector' => '{{WRAPPER}} .product-card .product-content p',

            ]
        );

        $this->add_control(
            'matrik_material_style_general_material_description_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .product-card .product-content p' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_material_style_general_material_arrow_icon',
            [
                'label'     => esc_html__('Material Arrow Icon', 'matrik-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_control(
            'matrik_material_style_general_material_arrow_icon_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .product-card .product-img .arrow svg' => 'fill: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_material_style_general_material_arrow_icon_hover_color',
            [
                'label'     => esc_html__('Hover Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .product-card:hover .product-img .arrow svg' => 'fill: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_material_style_general_material_arrow_bg_color',
            [
                'label'     => esc_html__('Background Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .product-card .product-img .arrow' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_material_style_general_material_arrow_hover_bg_color',
            [
                'label'     => esc_html__('Hover Background Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .product-card:hover .product-img .arrow' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section();


        $this->start_controls_section(
            'matrik_material_style_general_faq',
            [
                'label'     => esc_html__('FAQ Styles', 'matrik-core'),
                'tab'       => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'matrik_material_genaral_style_selection' => ['style_one'],
                ]
            ]
        );


        $this->add_control(
            'matrik_material_style_general_faq_list_border',
            [
                'label'     => esc_html__('Border', 'matrik-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_control(
            'matrik_material_style_general_faq_list_border_color',
            [
                'label'     => esc_html__('Border Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .faq-wrap .accordion .accordion-item .accordion-header .accordion-button' => 'border-bottom: 1px solid {{VALUE}};',
                ],
            ]
        );


        $this->add_control(
            'matrik_material_style_general_faq_question',
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
                'name'     => 'matrik_material_style_general_faq_question_typ',
                'selector' => '{{WRAPPER}} .faq-wrap .accordion .accordion-item .accordion-header .accordion-button',

            ]
        );

        $this->add_control(
            'matrik_material_style_general_faq_question_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .faq-wrap .accordion .accordion-item .accordion-header .accordion-button' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_material_style_general_faq_answer',
            [
                'label'     => esc_html__('Answer', 'matrik-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'matrik-core'),
                'name'     => 'matrik_material_style_general_faq_answer_typ',
                'selector' => '{{WRAPPER}} .faq-wrap .accordion .accordion-item .accordion-body',

            ]
        );

        $this->add_control(
            'matrik_material_style_general_faq_answer_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .faq-wrap .accordion .accordion-item .accordion-body' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section();


        $this->start_controls_section(
            'matrik_material_style_general_document_area',
            [
                'label'     => esc_html__('Documents Style', 'matrik-core'),
                'tab'       => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'matrik_material_genaral_style_selection' => ['style_one'],
                ]
            ]
        );

        $this->add_control(
            'matrik_material_style_general_document_area_section',
            [
                'label'     => esc_html__('Document Section', 'matrik-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_control(
            'matrik_material_style_general_document_area_section_bg_color',
            [
                'label'     => esc_html__('Background Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home4-product-section .document-area .document-list li' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_material_style_general_document_area_section_hover_bg_color',
            [
                'label'     => esc_html__('Hover Background Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home4-product-section .document-area .document-list li:hover' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_material_style_general_document_area_title',
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
                'name'     => 'matrik_material_style_general_document_area_title_typ',
                'selector' => '{{WRAPPER}} .home4-product-section .document-area .document-list li h6',

            ]
        );

        $this->add_control(
            'matrik_material_style_general_document_area_title_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home4-product-section .document-area .document-list li h6' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_material_style_general_document_area_title_hover_color',
            [
                'label'     => esc_html__('Hover Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home4-product-section .document-area .document-list li:hover h6' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_material_style_general_document_area_button_icon',
            [
                'label'     => esc_html__('Button Icon', 'matrik-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_control(
            'matrik_material_style_general_document_area_button_icon_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home4-product-section .document-area .document-list li .download-btn svg' => 'fill: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_material_style_general_document_area_button_hover_icon_color',
            [
                'label'     => esc_html__('Hover Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home4-product-section .document-area .document-list li:hover .download-btn svg' => 'fill: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_material_style_general_document_area_button_text',
            [
                'label'     => esc_html__('Button Text', 'matrik-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'matrik-core'),
                'name'     => 'matrik_material_style_general_document_area_button_text_typ',
                'selector' => '{{WRAPPER}} .home4-product-section .document-area .document-list li .download-btn span',

            ]
        );

        $this->add_control(
            'matrik_material_style_general_document_area_button_text_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home4-product-section .document-area .document-list li .download-btn span' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_material_style_general_document_area_button_text_hover_color',
            [
                'label'     => esc_html__('Hover Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home4-product-section .document-area .document-list li:hover .download-btn span' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_material_style_general_document_area_bottom_title_text',
            [
                'label'     => esc_html__('Bottom Title Text', 'matrik-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'matrik-core'),
                'name'     => 'matrik_material_style_general_document_area_bottom_title_text_typ',
                'selector' => '{{WRAPPER}} .home4-product-section .document-area .contact-area h6',

            ]
        );

        $this->add_control(
            'matrik_material_style_general_document_area_bottom_title_text_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home4-product-section .document-area .contact-area h6' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_material_style_general_document_area_bottom_title_text_span_color',
            [
                'label'     => esc_html__('Span Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home4-product-section .document-area .contact-area h6 a' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_material_style_general_document_area_bottom_title_text_span_hover_color',
            [
                'label'     => esc_html__('Span Hover Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home4-product-section .document-area .contact-area h6 a:hover' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section();

        //style start two

        $this->start_controls_section(
            'matrik_material_style_two_general',
            [
                'label'     => esc_html__('Styles', 'matrik-core'),
                'tab'       => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'matrik_material_genaral_style_selection' => ['style_two'],
                ]
            ]
        );

        $this->add_control(
            'matrik_material_style_two_general_card_borders',
            [
                'label'     => esc_html__('Card Borders', 'matrik-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_control(
            'matrik_material_style_two_general_card_borders_top',
            [
                'label'     => esc_html__('Border Top Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .product-card2' => 'border-top: 1px solid {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_material_style_two_general_card_borders_bottom',
            [
                'label'     => esc_html__('Border Bottom Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .product-card2' => 'border-bottom: 1px solid {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_material_style_two_general_header_subtitle',
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
                'name'     => 'matrik_material_style_two_general_header_subtitle_typ',
                'selector' => '{{WRAPPER}} .section-title.four span',

            ]
        );

        $this->add_control(
            'matrik_material_style_two_general_header_subtitle_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .section-title.four span' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_material_style_two_general_header_subtitle_icon_color',
            [
                'label'     => esc_html__('Icon Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .section-title.four span svg' => 'fill: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_material_style_two_general_header_title',
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
                'name'     => 'matrik_material_style_two_general_header_title_typ',
                'selector' => '{{WRAPPER}} .section-title.four h2',

            ]
        );

        $this->add_control(
            'matrik_material_style_two_general_header_title_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .section-title.four h2' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_material_style_two_general_material_title',
            [
                'label'     => esc_html__('Material Title', 'matrik-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'matrik-core'),
                'name'     => 'matrik_material_style_two_general_material_title_typ',
                'selector' => '{{WRAPPER}} .product-card2 .product-content h4 a',

            ]
        );

        $this->add_control(
            'matrik_material_style_two_general_material_title_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .product-card2 .product-content h4 a' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_material_style_two_general_material_title_hover_color',
            [
                'label'     => esc_html__('Hover Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .product-card2 .product-content h4 a:hover' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_material_style_two_general_material_description',
            [
                'label'     => esc_html__('Material Description', 'matrik-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'matrik-core'),
                'name'     => 'matrik_material_style_two_general_material_description_typ',
                'selector' => '{{WRAPPER}} .product-card2 .product-content p',

            ]
        );

        $this->add_control(
            'matrik_material_style_two_general_material_description_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .product-card2 .product-content p' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_material_style_two_general_material_arrow_icon',
            [
                'label'     => esc_html__('Arrow Icon', 'matrik-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );


        $this->add_control(
            'matrik_material_style_two_general_material_arrow_icon_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .product-card2 .arrow svg' => 'fill: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_material_style_two_general_material_arrow_hover_icon_color',
            [
                'label'     => esc_html__('Hover Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .product-card2:hover .arrow svg' => 'fill: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_material_style_two_general_bottom_button',
            [
                'label'     => esc_html__('Bottom Button', 'matrik-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'matrik-core'),
                'name'     => 'matrik_material_style_two_general_bottom_button_typ',
                'selector' => '{{WRAPPER}} .primary-btn5',

            ]
        );

        $this->add_control(
            'matrik_material_style_two_general_bottom_button_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .primary-btn5' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_material_style_two_general_bottom_button_hover_color',
            [
                'label'     => esc_html__('Hover Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .primary-btn5:hover' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_material_style_two_general_bottom_button_icon_color',
            [
                'label'     => esc_html__('Icon Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .primary-btn5.two .arrow' => 'fill: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_material_style_two_general_bottom_button_hover_icon_color',
            [
                'label'     => esc_html__('Hover Icon Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .primary-btn5.two:hover .arrow' => 'fill: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_material_style_two_general_bottom_button_bg_color',
            [
                'label'     => esc_html__('Background Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .primary-btn5' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_material_style_two_general_bottom_button_bg_hover_color',
            [
                'label'     => esc_html__('Hover Background Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .primary-btn5 > span' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section();

        //style start three

        $this->start_controls_section(
            'matrik_material_style_three_general',
            [
                'label'     => esc_html__('Styles', 'matrik-core'),
                'tab'       => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'matrik_material_genaral_style_selection' => ['style_three'],
                ]
            ]
        );

        $this->add_control(
            'matrik_material_style_three_general_global_section',
            [
                'label'     => esc_html__('Global Section', 'matrik-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_control(
            'matrik_material_style_three_general_global_section_bg_color',
            [
                'label'     => esc_html__('Background Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .service-page-product-section' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_material_style_three_general_subtitle',
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
                'name'     => 'matrik_material_style_three_general_subtitle_typ',
                'selector' => '{{WRAPPER}} .section-title > span',

            ]
        );

        $this->add_control(
            'matrik_material_style_three_general_subtitle_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .section-title > span' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_material_style_three_general_subtitle_icon_color',
            [
                'label'     => esc_html__('Icon Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .section-title > span::after' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_material_style_three_general_title',
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
                'name'     => 'matrik_material_style_three_general_title_typ',
                'selector' => '{{WRAPPER}} .section-title h2',

            ]
        );

        $this->add_control(
            'matrik_material_style_three_general_title_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .section-title h2' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_material_style_three_general_material_title',
            [
                'label'     => esc_html__('Material Title', 'matrik-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'matrik-core'),
                'name'     => 'matrik_material_style_three_general_material_title_typ',
                'selector' => '{{WRAPPER}} .product-card2.two .product-content h4 a',

            ]
        );

        $this->add_control(
            'matrik_material_style_three_general_material_title_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .product-card2.two .product-content h4 a' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_material_style_three_general_material_title_hover_color',
            [
                'label'     => esc_html__('Hover Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .product-card2.two .product-content h4 a:hover' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_material_style_three_general_material_description',
            [
                'label'     => esc_html__('Material Description', 'matrik-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'matrik-core'),
                'name'     => 'matrik_material_style_three_general_material_description_typ',
                'selector' => '{{WRAPPER}} .product-card2.two .product-content p',

            ]
        );

        $this->add_control(
            'matrik_material_style_three_general_material_description_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .product-card2.two .product-content p' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_material_style_three_general_material_arrow_icon',
            [
                'label'     => esc_html__('Arrow Icon', 'matrik-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_control(
            'matrik_material_style_three_general_material_arrow_icon_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .product-card2 .arrow svg' => 'fill: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_material_style_three_general_material_arrow_hover_icon_color',
            [
                'label'     => esc_html__('Hover Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .product-card2.two:hover .arrow svg' => 'fill: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_material_style_three_general_bottom_button',
            [
                'label'     => esc_html__('Bottom Button', 'matrik-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'matrik-core'),
                'name'     => 'matrik_material_style_three_general_bottom_button_typ',
                'selector' => '{{WRAPPER}} .primary-btn1.black-bg',

            ]
        );

        $this->add_control(
            'matrik_material_style_three_general_bottom_button_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .primary-btn1.black-bg' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_material_style_three_general_bottom_hover_button_color',
            [
                'label'     => esc_html__('Hover Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .primary-btn1.black-bg:hover' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_material_style_three_general_bottom_button_icon_color',
            [
                'label'     => esc_html__('Icon Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .primary-btn1.black-bg' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_material_style_three_general_bottom_button_icon_hover_color',
            [
                'label'     => esc_html__('Hover Icon Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .primary-btn1.black-bg:hover .arrow' => 'fill: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_material_style_three_general_bottom_button_bg_color',
            [
                'label'     => esc_html__('Background Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .primary-btn1.black-bg' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_material_style_three_general_bottom_button_hover_bg_color',
            [
                'label'     => esc_html__('Hover Background Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .primary-btn1.black-bg::after' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section();
    }
    protected function render()
    {

        $settings = $this->get_settings_for_display();
        $selected_post_ids     = $settings['matrik_material_genaral_post_list'];
        $args                  = array(
            'post_type'      => 'materials',
            'posts_per_page' => $settings['matrik_material_genaral_post_per_page'],
            'orderby'        => $settings['matrik_material_genaral_order_by'],
            'order'          => $settings['matrik_material_genaral_order'],
            'offset'         => 0,
            'post_status'    => 'publish',
        );

        if (!empty($selected_post_ids)) {
            $args['post__in'] = $selected_post_ids;
        }
        $query = new \WP_Query($args);
?>

        <?php if ($settings['matrik_material_genaral_style_selection'] == 'style_one') : ?>
            <div class="home4-product-section">
                <div class="container">
                    <div class="row gy-5 mb-90">
                        <div class="col-xl-5 order-xl-1 order-2">
                            <div class="faq-wrap">
                                <div class="accordion" id="accordionExample">
                                    <?php
                                    foreach ($settings['matrik_material_genaral_faq_list'] as $index => $data) :
                                        $is_first = ($index === 0); 
                                    ?>
                                        <div class="accordion-item wow animate fadeInDown" data-wow-delay="200ms" data-wow-duration="1500ms">
                                            <?php if (!empty($data['matrik_material_genaral_faq_question'])) : ?>
                                                <h2 class="accordion-header" id="heading-<?php echo esc_attr($index); ?>">
                                                    <button class="accordion-button <?php if (!$is_first) echo 'collapsed'; ?>" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-<?php echo esc_attr($index); ?>" aria-expanded="<?php echo $is_first ? 'true' : 'false'; ?>" aria-controls="collapse-<?php echo esc_attr($index); ?>">
                                                        <?php echo esc_html($data['matrik_material_genaral_faq_question']); ?>
                                                    </button>
                                                </h2>
                                            <?php endif; ?>
                                            <div id="collapse-<?php echo esc_attr($index); ?>" class="accordion-collapse collapse <?php if ($is_first) echo 'show'; ?>" aria-labelledby="heading-<?php echo esc_attr($index); ?>" data-bs-parent="#accordionExample">
                                                <?php if (!empty($data['matrik_material_genaral_faq_answer'])) : ?>
                                                    <div class="accordion-body">
                                                        <?php echo wp_kses_post($data['matrik_material_genaral_faq_answer']); ?>
                                                    </div>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-7 oder-xl-2 order-1">
                            <?php if (!empty($settings['matrik_material_genaral_header_title'])) : ?>
                                <div class="section-title three text-center mb-50 wow animate fadeInDown" data-wow-delay="200ms" data-wow-duration="1500ms">
                                    <h2><?php echo esc_html($settings['matrik_material_genaral_header_title']); ?></h2>
                                </div>
                            <?php endif; ?>
                            <div class="product-wrapper">
                                <div class="row g-4">
                                    <?php
                                    while ($query->have_posts()) :
                                        $query->the_post();
                                    ?>
                                        <div class="col-md-6 wow animate fadeInDown" data-wow-delay="200ms" data-wow-duration="1500ms">
                                            <div class="product-card magnetic-item">
                                                <div class="product-img">
                                                    <?php if (has_post_thumbnail()) : ?>
                                                        <?php the_post_thumbnail(); ?>
                                                    <?php endif; ?>
                                                    <a href="<?php the_permalink(); ?>" class="arrow">
                                                        <svg width="18" height="19" viewBox="0 0 18 19" xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M0.0891088 0.0541992H18V3.40711L3.38614 18.054L0 14.7011L9.98019 4.81886L0.0891088 4.90709V0.0541992Z" />
                                                            <path d="M18.0004 18.0543V6.76025L13.1885 11.5249V18.0543H18.0004Z" />
                                                        </svg>
                                                    </a>
                                                </div>
                                                <div class="product-content">
                                                    <h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
                                                    <p><?php the_excerpt(); ?></p>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endwhile;
                                    wp_reset_postdata(); ?>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="document-area">
                        <?php if (!empty($settings['matrik_material_genaral_documents_title'])) : ?>
                            <div class="section-title three mb-50 wow animate fadeInDown" data-wow-delay="200ms" data-wow-duration="1500ms">
                                <h2><?php echo esc_html($settings['matrik_material_genaral_documents_title']); ?></h2>
                            </div>
                        <?php endif; ?>
                        <ul class="document-list">
                            <?php foreach ($settings['matrik_material_genaral_document_content_list'] as $data) : ?>
                                <li>
                                    <?php if (!empty($data['matrik_material_genaral_document_content_title'])) : ?>
                                        <h6><?php echo esc_html($data['matrik_material_genaral_document_content_title']); ?></h6>
                                    <?php endif; ?>
                                    <?php if (!empty($data['matrik_material_genaral_document_content_button'])) : ?>
                                        <a href="<?php if ($data['matrik_material_genaral_document_content_type'] == 'upload') : ?><?php echo esc_url($data['matrik_material_genaral_document_content_upload']['url']); ?><?php elseif ($data['matrik_material_genaral_document_content_type'] == 'link') : ?><?php echo esc_url($data['matrik_material_genaral_document_content_url']['url']); ?><?php endif; ?>" download="Matrik Metal Company Profile.pdf" class="download-btn">
                                            <svg width="16" height="17" viewBox="0 0 16 17" xmlns="http://www.w3.org/2000/svg">
                                                <g>
                                                    <path
                                                        d="M7.58515 12.917C7.63953 12.9717 7.70419 13.0151 7.77541 13.0447C7.84662 13.0743 7.92299 13.0896 8.00011 13.0896C8.07724 13.0896 8.1536 13.0743 8.22482 13.0447C8.29603 13.0151 8.36069 12.9717 8.41508 12.917L12.8442 8.48825C12.9003 8.43408 12.945 8.36929 12.9758 8.29764C13.0066 8.226 13.0228 8.14895 13.0235 8.07098C13.0242 7.99301 13.0093 7.91568 12.9798 7.84352C12.9502 7.77135 12.9066 7.70579 12.8515 7.65065C12.7964 7.59552 12.7308 7.55192 12.6586 7.52239C12.5865 7.49286 12.5092 7.47801 12.4312 7.47868C12.3532 7.47936 12.2762 7.49556 12.2045 7.52633C12.1329 7.55711 12.0681 7.60185 12.0139 7.65793L8.58732 11.0845V0.639948C8.58732 0.484209 8.52546 0.334849 8.41533 0.224725C8.30521 0.114602 8.15585 0.0527344 8.00011 0.0527344C7.84437 0.0527344 7.69501 0.114602 7.58489 0.224725C7.47476 0.334849 7.4129 0.484209 7.4129 0.639948V11.0845L3.98631 7.65793C3.93239 7.6009 3.86758 7.55525 3.79572 7.52369C3.72385 7.49213 3.64639 7.4753 3.56791 7.47419C3.48943 7.47308 3.41152 7.48772 3.3388 7.51723C3.26607 7.54674 3.2 7.59054 3.14448 7.64603C3.08897 7.70151 3.04515 7.76756 3.0156 7.84028C2.98605 7.91299 2.97138 7.99089 2.97245 8.06937C2.97352 8.14785 2.99032 8.22532 3.02184 8.2972C3.05337 8.36908 3.09898 8.43391 3.15599 8.48786L7.58515 12.917ZM14.6552 14.8783H1.34503C1.18929 14.8783 1.03993 14.9402 0.929803 15.0503C0.819679 15.1604 0.757813 15.3098 0.757812 15.4655C0.757813 15.6213 0.819679 15.7706 0.929803 15.8807C1.03993 15.9909 1.18929 16.0527 1.34503 16.0527H14.6552C14.8109 16.0527 14.9603 15.9909 15.0704 15.8807C15.1805 15.7706 15.2424 15.6213 15.2424 15.4655C15.2424 15.3098 15.1805 15.1604 15.0704 15.0503C14.9603 14.9402 14.8109 14.8783 14.6552 14.8783Z" />
                                                </g>
                                            </svg>
                                            <span><?php echo esc_html($data['matrik_material_genaral_document_content_button']); ?></span>
                                        </a>
                                    <?php endif; ?>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                        <?php if ($settings['matrik_material_genaral_document_bottom_text']) : ?>
                            <div class="contact-area pt-50 wow animate fadeInUp" data-wow-delay="200ms" data-wow-duration="1500ms">
                                <h6><?php echo wp_kses($settings['matrik_material_genaral_document_bottom_text'], wp_kses_allowed_html('post'))  ?></h6>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        <?php endif; ?>



        <?php if ($settings['matrik_material_genaral_style_selection'] == 'style_two') : ?>
            <div class="home5-product-section">
                <div class="container">
                    <div class="row justify-content-center mb-70 wow animate fadeInDown" data-wow-delay="200ms" data-wow-duration="1500ms">
                        <div class="col-lg-5">
                            <div class="section-title four text-center">
                                <?php if (!empty($settings['matrik_material_genaral_header_style_two_subtitle'])) : ?>
                                    <span>
                                        <svg width="12" height="12" viewBox="0 0 12 12" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M0.0594065 0H12.0001V2.2353L2.25745 12L0 9.76471L6.65353 3.17647L0.0594065 3.2353V0Z" />
                                            <path d="M11.9999 11.9999V4.47046L8.79199 7.64693V11.9999H11.9999Z" />
                                        </svg>
                                        <?php echo esc_html($settings['matrik_material_genaral_header_style_two_subtitle']); ?>
                                    </span>
                                <?php endif; ?>
                                <?php if (!empty($settings['matrik_material_genaral_header_style_two_title'])) : ?>
                                    <h2><?php echo esc_html($settings['matrik_material_genaral_header_style_two_title']); ?></h2>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                    <div class="row gy-md-5 gy-4 mb-60">
                        <?php
                        while ($query->have_posts()) :
                            $query->the_post();
                        ?>
                            <div class="col-lg-6 wow animate fadeInDown" data-wow-delay="200ms" data-wow-duration="1500ms">
                                <div class="product-card2">
                                    <?php if (has_post_thumbnail()) : ?>
                                        <div class="product-img">
                                            <?php the_post_thumbnail(); ?>
                                        </div>
                                    <?php endif; ?>
                                    <div class="product-content">
                                        <h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
                                        <p><?php the_excerpt(); ?></p>
                                    </div>
                                    <a href="<?php the_permalink(); ?>" class="arrow">
                                        <svg width="38" height="38" viewBox="0 0 38 38" xmlns="http://www.w3.org/2000/svg">
                                            <g>
                                                <path d="M0.188118 0H37.9999V7.07834L7.14849 37.9995L0 30.9212L21.0692 10.0587L0.188118 10.245V0Z" />
                                                <path d="M38.0002 37.9991V14.1562L27.8418 24.2149V37.9991H38.0002Z" />
                                            </g>
                                        </svg>
                                    </a>
                                </div>
                            </div>
                        <?php endwhile;
                        wp_reset_postdata(); ?>
                    </div>
                    <?php if (!empty($settings['matrik_material_genaral_header_style_two_button_text'])) : ?>
                        <div class="row bounce_up">
                            <div class="col-lg-12 d-flex justify-content-center">
                                <a class="primary-btn5 two btn-hover" href="<?php echo esc_url($settings['matrik_contact_seven_location_button_text_url']['url']); ?>">
                                    <?php echo esc_html($settings['matrik_material_genaral_header_style_two_button_text']); ?>
                                    <svg class="arrow" width="23" height="23" viewBox="0 0 23 23" xmlns="http://www.w3.org/2000/svg">
                                        <g>
                                            <path d="M0.113861 0H22.9999V4.28425L4.32671 22.9997L0 18.7154L12.7524 6.08815L0.113861 6.20089V0Z"></path>
                                            <path d="M23 22.9996V8.56848L16.8516 14.6566V22.9996H23Z"></path>
                                        </g>
                                    </svg>
                                    <span></span>
                                </a>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        <?php endif; ?>

        <?php if ($settings['matrik_material_genaral_style_selection'] == 'style_three') : ?>
            <div class="service-page-product-section">
                <div class="container">
                    <div class="row justify-content-center mb-70 wow animate fadeInDown" data-wow-delay="200ms" data-wow-duration="1500ms">
                        <div class="col-xl-6 col-lg-7 col-md-8">
                            <div class="section-title text-center">
                                <?php if ($settings['matrik_material_genaral_header_style_two_subtitle']) : ?>
                                    <span><?php echo esc_html($settings['matrik_material_genaral_header_style_two_subtitle']); ?></span>
                                <?php endif; ?>
                                <?php if (!empty($settings['matrik_material_genaral_header_style_two_title'])) : ?>
                                    <h2><?php echo esc_html($settings['matrik_material_genaral_header_style_two_title']); ?></h2>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                    <div class="row gy-md-5 gy-4 mb-60">
                        <?php
                        while ($query->have_posts()) :
                            $query->the_post();
                        ?>
                            <div class="col-lg-6 wow animate fadeInDown" data-wow-delay="200ms" data-wow-duration="1500ms">
                                <div class="product-card2 two">
                                    <?php if (has_post_thumbnail()) : ?>
                                        <div class="product-img">
                                            <?php the_post_thumbnail(); ?>
                                        </div>
                                    <?php endif; ?>
                                    <div class="product-content">
                                        <h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
                                        <p><?php the_excerpt(); ?></p>
                                    </div>
                                    <a href="<?php the_permalink(); ?>" class="arrow">
                                        <svg width="38" height="38" viewBox="0 0 38 38" xmlns="http://www.w3.org/2000/svg">
                                            <g>
                                                <path d="M0.188118 0H37.9999V7.07834L7.14849 37.9995L0 30.9212L21.0692 10.0587L0.188118 10.245V0Z" />
                                                <path d="M38.0002 37.9991V14.1562L27.8418 24.2149V37.9991H38.0002Z" />
                                            </g>
                                        </svg>
                                    </a>
                                </div>
                            </div>
                        <?php endwhile;
                        wp_reset_postdata(); ?>
                    </div>
                    <?php if (!empty($settings['matrik_material_genaral_header_style_two_button_text'])) : ?>
                        <div class="row bounce_up">
                            <div class="col-lg-12 d-flex justify-content-center">
                                <a class="primary-btn1 black-bg" href="<?php echo esc_url($settings['matrik_contact_seven_location_button_text_url']['url']); ?>">
                                    <span><?php echo esc_html($settings['matrik_material_genaral_header_style_two_button_text']); ?>
                                    </span>
                                    <span><?php echo esc_html($settings['matrik_material_genaral_header_style_two_button_text']); ?>
                                    </span>
                                    <svg class="arrow" width="23" height="23" viewBox="0 0 23 23" xmlns="http://www.w3.org/2000/svg">
                                        <g>
                                            <path d="M0.113861 0H22.9999V4.28425L4.32671 22.9997L0 18.7154L12.7524 6.08815L0.113861 6.20089V0Z" />
                                            <path d="M23 22.9996V8.56848L16.8516 14.6566V22.9996H23Z" />
                                        </g>
                                    </svg>
                                </a>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        <?php endif; ?>


<?php

    }
}

Plugin::instance()->widgets_manager->register(new Matrik_Material_Widget());
