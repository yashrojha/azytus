<?php

namespace Elementor;

if (!defined('ABSPATH')) exit;  // Exit if accessed directly

use Elementor\core\Schemes;
use Egns_Core\Egns_Helper;

class Matrik_Career_Widget extends Widget_Base
{

    public function get_name()
    {
        return 'matrik_career';
    }

    public function get_title()
    {
        return esc_html__('EG Career', 'matrik-core');
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
            'matrik_career_genaral',
            [
                'label' => esc_html__('General', 'matrik-core')
            ]
        );


        $this->add_control(
            'matrik_career_genaral_style_selection',
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
            'matrik_career_genaral_header_title',
            [
                'label'       => esc_html__('Header Title', 'matrik-core'),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default' => wp_kses('We’re Currently hiring', wp_kses_allowed_html('post')),
                'placeholder' => esc_html__('write your title here', 'matrik-core'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'matrik_career_genaral_banner_image',
            [
                'label' => esc_html__('Banner Image', 'matrik-core'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
                'condition' => [
                    'matrik_career_genaral_style_selection' => ['style_three'],
                ]
            ]
        );

        $this->add_control(
            'matrik_career_genaral_header_description',
            [
                'label'       => esc_html__('Description', 'matrik-core'),
                'type'        => \Elementor\Controls_Manager::TEXTAREA,
                'default' => wp_kses('Sed nisl eros, condimentum nec risus sit amet, finibusni conguese.Fusen fringilla est libero, sed tempus urna feu eu. Curabitur eu feugiat ligu Suspendisse.', wp_kses_allowed_html('post')),
                'placeholder' => esc_html__('write your title here', 'matrik-core'),
                'label_block' => true,
                'condition' => [
                    'matrik_career_genaral_style_selection' => ['style_two'],
                ]
            ]
        );

        $this->add_control(
            'matrik_career_genaral_button_content_two_text',
            [
                'label'       => esc_html__('Button Text', 'matrik-core'),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default'     => esc_html__('View Opportunity', 'matrik-core'),
                'placeholder' => esc_html__('write your button text here', 'matrik-core'),
                'label_block' => true,
                'condition' => [
                    'matrik_career_genaral_style_selection' => ['style_two'],
                ]

            ]
        );

        $this->add_control(
            'matrik_career_genaral_button_content_two_text_url',
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
                    'matrik_career_genaral_style_selection' => ['style_two'],
                ]

            ]
        );

        $this->add_control(
            'matrik_career_genaral_query_area',
            [
                'label'     => esc_html__('Query Area', 'matrik-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_control(
            'matrik_career_genaral_query_area_post_per_page',
            [
                'label'       => esc_html__('Posts Per Page', 'matrik-core'),
                'type'        => Controls_Manager::NUMBER,
                'default'     => 6,
                'label_block' => false,
            ]
        );

        $this->add_control(
            'matrik_career_genaral_query_area_post_list',
            [
                'label'       => __('Post Lists', 'matrik-core'),
                'type'        => \Elementor\Controls_Manager::SELECT2,
                'label_block' => true,
                'multiple'    => true,
                'options'     => \Egns_Core\Egns_Helper::get_career_post_options(),

            ]
        );

        $this->add_control(
            'matrik_career_genaral_query_area_order_by',
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
            'matrik_career_genaral_query_area_order',
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
            'matrik_career_genaral_button_text',
            [
                'label'       => esc_html__('Career Button Text', 'matrik-core'),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default'     => esc_html__('View Details', 'matrik-core'),
                'placeholder' => esc_html__('write your button text here', 'matrik-core'),
                'label_block' => true,

            ]
        );

        $this->add_control(
            'matrik_career_genaral_bottom_button',
            [
                'label'     => esc_html__('Bottom Button', 'matrik-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
                'condition' => [
                    'matrik_career_genaral_style_selection' => ['style_three'],
                ]
            ]
        );

        $this->add_control(
            'matrik_career_genaral_bottom_button_text',
            [
                'label'       => esc_html__('Button Text', 'matrik-core'),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default'     => esc_html__('View All Career', 'matrik-core'),
                'placeholder' => esc_html__('write your button text here', 'matrik-core'),
                'label_block' => true,
                'condition' => [
                    'matrik_career_genaral_style_selection' => ['style_three'],
                ]

            ]
        );

        $this->add_control(
            'matrik_career_genaral_bottom_button_content_two_text_url',
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
                    'matrik_career_genaral_style_selection' => ['style_three'],
                ]

            ]
        );

        $this->end_controls_section();


        //style start

        $this->start_controls_section(
            'matrik_career_style_genaral',
            [
                'label'     => esc_html__('Styles', 'matrik-core'),
                'tab'       => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'matrik_career_genaral_style_selection' => ['style_one'],
                ]
            ]
        );

        $this->add_control(
            'matrik_career_style_genaral_global_section',
            [
                'label'     => esc_html__('Global Section', 'matrik-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_control(
            'matrik_career_style_genaral_global_section_color',
            [
                'label'     => esc_html__('Background Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .job-post-section' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_career_style_genaral_header_title',
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
                'name'     => 'matrik_career_style_genaral_header_titlee_typ',
                'selector' => '{{WRAPPER}} .section-title.white h2',

            ]
        );

        $this->add_control(
            'matrik_career_style_genaral_header_title_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .section-title.white h2' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_career_style_genaral_career_number',
            [
                'label'     => esc_html__('Career Number', 'matrik-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'matrik-core'),
                'name'     => 'matrik_career_style_genaral_career_number_typ',
                'selector' => '{{WRAPPER}} .job-post-section .job-post-list .single-job .number-and-icon-area span',

            ]
        );

        $this->add_control(
            'matrik_career_style_genaral_career_number_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .job-post-section .job-post-list .single-job .number-and-icon-area span' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_career_style_genaral_icon',
            [
                'label'     => esc_html__('Career Icon', 'matrik-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_control(
            'matrik_career_style_genaral_icon_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .job-post-section .job-post-list .single-job .number-and-icon-area .icon svg' => 'fill: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_career_style_genaral_career_title',
            [
                'label'     => esc_html__('Career Title', 'matrik-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'matrik-core'),
                'name'     => 'matrik_career_style_genaral_career_title_typ',
                'selector' => '{{WRAPPER}} .job-post-section .job-post-list .single-job h2',

            ]
        );

        $this->add_control(
            'matrik_career_style_genaral_career_title_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .job-post-section .job-post-list .single-job h2' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_career_style_genaral_career_info',
            [
                'label'     => esc_html__('Career Info', 'matrik-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'matrik-core'),
                'name'     => 'matrik_career_style_genaral_career_info_typ',
                'selector' => '{{WRAPPER}} .job-post-section .job-post-list .single-job span',

            ]
        );

        $this->add_control(
            'matrik_career_style_genaral_career_info_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .job-post-section .job-post-list .single-job span' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_career_style_genaral_career_button',
            [
                'label'     => esc_html__('Career Button', 'matrik-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'matrik-core'),
                'name'     => 'matrik_career_style_genaral_career_button_typ',
                'selector' => '{{WRAPPER}} .job-post-section .job-post-list .single-job .details-btn span',

            ]
        );

        $this->add_control(
            'matrik_career_style_genaral_career_button_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .job-post-section .job-post-list .single-job .details-btn span' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_career_style_genaral_career_button_hover_color',
            [
                'label'     => esc_html__('Hover Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .job-post-section .job-post-list .single-job:hover .details-btn span' => 'color: {{VALUE}};',
                ],
            ]
        );


        $this->add_control(
            'matrik_career_style_genaral_career_button_border_color',
            [
                'label'     => esc_html__('Border Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .job-post-section .job-post-list .single-job .details-btn span' => 'border: 1px solid {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_career_style_genaral_career_button_hover_bg_color',
            [
                'label'     => esc_html__('Hover Background Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .job-post-section .job-post-list .single-job:hover .details-btn span' => 'background-color: {{VALUE}};',
                ],
            ]
        );


        $this->add_control(
            'matrik_career_style_genaral_career_button_icon_color',
            [
                'label'     => esc_html__('Icon Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .job-post-section .job-post-list .single-job .details-btn .icon svg' => 'fill: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_career_style_genaral_career_button_icon_hover_color',
            [
                'label'     => esc_html__('Icon Hover Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .job-post-section .job-post-list .single-job:hover .details-btn .icon svg' => 'fill: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_career_style_genaral_career_button_icon_border_color',
            [
                'label'     => esc_html__('Icon Border Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .job-post-section .job-post-list .single-job .details-btn .icon' => 'border: 1px solid {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_career_style_genaral_career_button_icon_hover_bg_color',
            [
                'label'     => esc_html__('Icon Hover Background Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .job-post-section .job-post-list .single-job:hover .details-btn .icon' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section();

        //style start

        $this->start_controls_section(
            'matrik_career_style_two_genaral',
            [
                'label'     => esc_html__('Styles', 'matrik-core'),
                'tab'       => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'matrik_career_genaral_style_selection' => ['style_two'],
                ]
            ]
        );

        $this->add_control(
            'matrik_career_style_two_genaral_title',
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
                'name'     => 'matrik_career_style_two_genaral_title_typ',
                'selector' => '{{WRAPPER}} .section-title h2',

            ]
        );

        $this->add_control(
            'matrik_career_style_two_genaral_title_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .section-title h2' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_career_style_two_genaral_description',
            [
                'label'     => esc_html__('Header Description', 'matrik-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'matrik-core'),
                'name'     => 'matrik_career_style_two_genaral_description_typ',
                'selector' => '{{WRAPPER}} .home3-career-opportunity-section .career-opportunity-title-area p',

            ]
        );

        $this->add_control(
            'matrik_career_style_two_genaral_description_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home3-career-opportunity-section .career-opportunity-title-area p' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_career_style_two_genaral_button',
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
                'name'     => 'matrik_career_style_two_genaral_button_typ',
                'selector' => '{{WRAPPER}} .primary-btn3.transparent',

            ]
        );

        $this->add_control(
            'matrik_career_style_two_genaral_button_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .primary-btn3.transparent' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_career_style_two_genaral_button_hover_color',
            [
                'label'     => esc_html__('Hover Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .primary-btn3.transparent:hover' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_career_style_two_genaral_button_icon_color',
            [
                'label'     => esc_html__('Icon Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .primary-btn3 .arrow' => 'fill: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_career_style_two_genaral_button_icon_hover_color',
            [
                'label'     => esc_html__('Hover Icon Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .primary-btn3.transparent:hover .arrow' => 'fill: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_career_style_two_genaral_button_border_color',
            [
                'label'     => esc_html__('Border Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .primary-btn3.transparent' => 'border: 1px solid {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_career_style_two_genaral_button_border_hover_color',
            [
                'label'     => esc_html__('Hover Border Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .primary-btn3.transparent:hover' => 'border-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_career_style_two_genaral_button_background_color',
            [
                'label'     => esc_html__('Background Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .primary-btn3.transparent' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_career_style_two_genaral_button_background_hover_color',
            [
                'label'     => esc_html__('Hover Background Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .primary-btn3.transparent::after' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_career_style_two_genaral_career_title',
            [
                'label'     => esc_html__('Career Title', 'matrik-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'matrik-core'),
                'name'     => 'matrik_career_style_two_genaral_career_title_typ',
                'selector' => '{{WRAPPER}} .home3-career-opportunity-section .career-card .career-content-wrap .career-content h5 a',

            ]
        );

        $this->add_control(
            'matrik_career_style_two_genaral_career_title_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home3-career-opportunity-section .career-card .career-content-wrap .career-content h5 a' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_career_style_two_genaral_career_title_hover_color',
            [
                'label'     => esc_html__('Hover Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home3-career-opportunity-section .career-card .career-content-wrap .career-content h5 a:hover' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_career_style_two_genaral_career_description',
            [
                'label'     => esc_html__('Career Description', 'matrik-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'matrik-core'),
                'name'     => 'matrik_career_style_two_genaral_career_description_typ',
                'selector' => '{{WRAPPER}} .home3-career-opportunity-section .career-card .career-content-wrap .career-content p',

            ]
        );

        $this->add_control(
            'matrik_career_style_two_genaral_career_description_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home3-career-opportunity-section .career-card .career-content-wrap .career-content p' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_career_style_two_genaral_career_button',
            [
                'label'     => esc_html__('Career Button', 'matrik-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'matrik-core'),
                'name'     => 'matrik_career_style_two_genaral_career_button_typ',
                'selector' => '{{WRAPPER}} .home3-career-opportunity-section .career-card .career-content-wrap .career-content > a',

            ]
        );

        $this->add_control(
            'matrik_career_style_two_genaral_career_button_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home3-career-opportunity-section .career-card .career-content-wrap .career-content > a' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_career_style_two_genaral_career_button_hover_color',
            [
                'label'     => esc_html__('Hover Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home3-career-opportunity-section .career-card .career-content-wrap .career-content > a:hover' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_career_style_two_genaral_career_button_icon_color',
            [
                'label'     => esc_html__('Icon Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home3-career-opportunity-section .career-card .career-content-wrap .career-content > a svg' => 'fill: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_career_style_two_genaral_career_button_icon_hover_color',
            [
                'label'     => esc_html__('Hover Icon Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home3-career-opportunity-section .career-card .career-content-wrap .career-content > a:hover svg' => 'fill: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section();

        //style start

        $this->start_controls_section(
            'matrik_career_style_three_genaral',
            [
                'label'     => esc_html__('Styles', 'matrik-core'),
                'tab'       => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'matrik_career_genaral_style_selection' => ['style_three'],
                ]
            ]
        );

        $this->add_control(
            'matrik_career_style_three_genaral_global_section',
            [
                'label'     => esc_html__('Global Section', 'matrik-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_control(
            'matrik_career_style_three_genaral_global_section_color',
            [
                'label'     => esc_html__('Background Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home4-career-section .career-content-wrap' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_career_style_three_genaral_header_title',
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
                'name'     => 'matrik_career_style_genaral_header_title_typ',
                'selector' => '{{WRAPPER}} .section-title.three h2',

            ]
        );

        $this->add_control(
            'matrik_career_style_three_genaral_header_title_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .section-title.three h2' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_career_style_three_genaral_project_title',
            [
                'label'     => esc_html__('Project Title', 'matrik-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'matrik-core'),
                'name'     => 'matrik_career_style_three_genaral_project_title_typ',
                'selector' => '{{WRAPPER}} .home4-career-section .career-content-wrap .career-list .single-career .post-name h5',

            ]
        );

        $this->add_control(
            'matrik_career_style_three_genaral_project_title_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home4-career-section .career-content-wrap .career-list .single-career .post-name h5' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_career_style_three_genaral_project_info_label',
            [
                'label'     => esc_html__('Project Info Label', 'matrik-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'matrik-core'),
                'name'     => 'matrik_career_style_three_genaral_project_info_label_typ',
                'selector' => '{{WRAPPER}} .home4-career-section .career-content-wrap .career-list .single-career .job-discription-wrap .job-discription li span',

            ]
        );

        $this->add_control(
            'matrik_career_style_three_genaral_project_info_label_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home4-career-section .career-content-wrap .career-list .single-career .job-discription-wrap .job-discription li span' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_career_style_three_genaral_project_info_content',
            [
                'label'     => esc_html__('Project Info Content', 'matrik-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'matrik-core'),
                'name'     => 'matrik_career_style_three_genaral_project_info_content_typ',
                'selector' => '{{WRAPPER}} .home4-career-section .career-content-wrap .career-list .single-career .job-discription-wrap .job-discription li',

            ]
        );

        $this->add_control(
            'matrik_career_style_three_genaral_project_info_content_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home4-career-section .career-content-wrap .career-list .single-career .job-discription-wrap .job-discription li' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_career_style_three_genaral_project_button',
            [
                'label'     => esc_html__('Project Button', 'matrik-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'matrik-core'),
                'name'     => 'matrik_career_style_three_genaral_project_button_typ',
                'selector' => '{{WRAPPER}} .home4-career-section .career-content-wrap .career-list .single-career .job-discription-wrap .apply-btn span',

            ]
        );

        $this->add_control(
            'matrik_career_style_three_genaral_project_button_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home4-career-section .career-content-wrap .career-list .single-career .job-discription-wrap .apply-btn span' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_career_style_three_genaral_project_button_hover_color',
            [
                'label'     => esc_html__('Hover Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home4-career-section .career-content-wrap .career-list .single-career .job-discription-wrap .apply-btn:hover span' => 'color: {{VALUE}};',
                ],
            ]
        );


        $this->add_control(
            'matrik_career_style_three_genaral_project_button_border_color',
            [
                'label'     => esc_html__('Border Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home4-career-section .career-content-wrap .career-list .single-career .job-discription-wrap .apply-btn span' => 'border: 1px solid {{VALUE}};',
                ],
            ]
        );


        $this->add_control(
            'matrik_career_style_three_genaral_project_button_hover_border_color',
            [
                'label'     => esc_html__('Hover Border Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home4-career-section .career-content-wrap .career-list .single-career .job-discription-wrap .apply-btn:hover span' => 'border-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_career_style_three_genaral_project_button_bg_color',
            [
                'label'     => esc_html__('Background Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home4-career-section .career-content-wrap .career-list .single-career .job-discription-wrap .apply-btn span' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_career_style_three_genaral_project_button_hover_bg_color',
            [
                'label'     => esc_html__('Hover Background Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home4-career-section .career-content-wrap .career-list .single-career .job-discription-wrap .apply-btn:hover span' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_career_style_three_genaral_project_button_icon_color',
            [
                'label'     => esc_html__('Icon Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home4-career-section .career-content-wrap .career-list .single-career .job-discription-wrap .apply-btn .icon svg' => 'fill: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_career_style_three_genaral_project_button_icon_hover_color',
            [
                'label'     => esc_html__('Hover Icon Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home4-career-section .career-content-wrap .career-list .single-career .job-discription-wrap .apply-btn:hover .icon svg' => 'fill: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_career_style_three_genaral_project_button_icon_border_color',
            [
                'label'     => esc_html__('Icon Border Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home4-career-section .career-content-wrap .career-list .single-career .job-discription-wrap .apply-btn .icon' => 'border: 1px solid {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_career_style_three_genaral_project_button_icon_hover_border_color',
            [
                'label'     => esc_html__('Hover Icon Border Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home4-career-section .career-content-wrap .career-list .single-career .job-discription-wrap .apply-btn:hover .icon' => 'border-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_career_style_three_genaral_project_button_icon_bg_color',
            [
                'label'     => esc_html__('Icon Background Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home4-career-section .career-content-wrap .career-list .single-career .job-discription-wrap .apply-btn .icon' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_career_style_three_genaral_project_button_icon_hover_bg_color',
            [
                'label'     => esc_html__('Icon Hover Background Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home4-career-section .career-content-wrap .career-list .single-career .job-discription-wrap .apply-btn:hover .icon' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_career_style_three_genaral_bottom_button',
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
                'name'     => 'matrik_career_style_three_genaral_bottom_button_typ',
                'selector' => '{{WRAPPER}} .primary-btn2.two.white',

            ]
        );

        $this->add_control(
            'matrik_career_style_three_genaral_bottom_button_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .primary-btn2.two.white' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_career_style_three_genaral_bottom_button_hover_color',
            [
                'label'     => esc_html__('Hover Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .primary-btn2.two.white:hover' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_career_style_three_genaral_bottom_button_icon_color',
            [
                'label'     => esc_html__('Icon Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .primary-btn2.two.white svg' => 'fill: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_career_style_three_genaral_bottom_button_icon_hover_color',
            [
                'label'     => esc_html__('Hover Icon Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .primary-btn2.two.white:hover svg' => 'fill: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section();
    }
    protected function render()
    {

        $settings = $this->get_settings_for_display();
        $selected_post_ids     = $settings['matrik_career_genaral_query_area_post_list'];
        $args                  = array(
            'post_type'      => 'career',
            'posts_per_page' => $settings['matrik_career_genaral_query_area_post_per_page'],
            'orderby'        => $settings['matrik_career_genaral_query_area_order_by'],
            'order'          => $settings['matrik_career_genaral_query_area_order'],
            'offset'         => 0,
            'post_status'    => 'publish',
        );

        if (!empty($selected_category_ids)) {
            $args['tax_query'] = array(
                array(
                    'taxonomy' => 'career-category',
                    'field'    => 'slug',
                    'terms'    => $selected_category_ids,
                    'operator' => 'IN',
                ),
            );
        }
        if (!empty($selected_post_ids)) {
            $args['post__in'] = $selected_post_ids;
        }
        $query = new \WP_Query($args);
        $num   = 0;

?>

        <?php if ($settings['matrik_career_genaral_style_selection'] == 'style_one') : ?>
            <div class="job-post-section">
                <div class="container">
                    <?php if (!empty($settings['matrik_career_genaral_header_title'])) : ?>
                        <div class="row justify-content-center mb-70 wow animate fadeInDown" data-wow-delay="200ms" data-wow-duration="1500ms">
                            <div class="col-lg-5">
                                <div class="section-title two white text-center">
                                    <h2><?php echo esc_html($settings['matrik_career_genaral_header_title']); ?></h2>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
                    <ul class="job-post-list">
                        <?php
                        while ($query->have_posts()) :
                            $query->the_post();
                            $num++;
                        ?>
                            <li class="single-job wow animate fadeInDown" data-wow-delay="200ms" data-wow-duration="1500ms">
                                <div class="number-and-icon-area">
                                    <?php
                                    $formatted_num = str_pad($num, 2, '0', STR_PAD_LEFT);
                                    ?>
                                    <span><?php echo esc_html($formatted_num); ?></span>
                                    <?php $icon_image = \Egns\Helper\Egns_Helper::egns_career_value('career_icon');
                                    if (!empty($icon_image['url'])) : ?>
                                        <div class="icon">
                                            <?php
                                            if (!empty($icon_image['url'])) {
                                                $file_url = $icon_image['url'];
                                                $file_ext = strtolower(pathinfo($file_url, PATHINFO_EXTENSION));

                                                // For SVGs – output the inline SVG code
                                                if ($file_ext === 'svg') {
                                                    $svg_path = get_attached_file($icon_image['id']);
                                                    if (file_exists($svg_path)) {
                                                        $svg_code = file_get_contents($svg_path);
                                                        echo $svg_code;
                                                    }
                                                } else {
                                                    echo '<img src="' . esc_url($file_url) . '" alt="' . esc_attr($icon_image['alt'] ?? '') . '" width="' . esc_attr($icon_image['width']) . '" height="' . esc_attr($icon_image['height']) . '">';
                                                }
                                            }
                                            ?>
                                        </div>
                                    <?php endif; ?>
                                </div>
                                <h2><?php the_title(); ?></h2>
                                <?php if (!empty(\Egns\Helper\Egns_Helper::egns_career_value('career_info_text'))) : ?>
                                    <span><?php echo esc_html(\Egns\Helper\Egns_Helper::egns_career_value('career_info_text')); ?></span>
                                <?php endif; ?>
                                <?php if (!empty($settings['matrik_career_genaral_button_text'])) : ?>
                                    <a href="<?php the_permalink(); ?>" class="details-btn">
                                        <span><?php echo esc_html($settings['matrik_career_genaral_button_text']); ?></span>
                                        <div class="icon">
                                            <svg width="24" height="23" viewBox="0 0 24 23" xmlns="http://www.w3.org/2000/svg">
                                                <g>
                                                    <path
                                                        d="M12.056 0.0560084L23.3137 11.3137L21.2063 13.4211L2.81473 13.4419L2.79385 9.20615L15.2782 9.26771L9.00578 3.10624L12.056 0.0560084Z" />
                                                    <path d="M11.9999 22.6272L19.0987 15.5285L13.0794 15.4988L8.9755 19.6027L11.9999 22.6272Z" />
                                                </g>
                                            </svg>
                                        </div>
                                    </a>
                                <?php endif; ?>
                            </li>
                        <?php endwhile;
                        wp_reset_postdata(); ?>
                    </ul>
                </div>
            </div>
        <?php endif; ?>


        <?php if ($settings['matrik_career_genaral_style_selection'] == 'style_two') : ?>
            <div class="home3-career-opportunity-section">
                <div class="container-fluid">
                    <div class="row gy-5">
                        <div class="col-xl-4 wow animate fadeInLeft" data-wow-delay="200ms" data-wow-duration="1500ms">
                            <div class="career-opportunity-title-area">
                                <div class="section-title two">
                                    <?php if (!empty($settings['matrik_career_genaral_header_title'])) : ?>
                                        <h2><?php echo esc_html($settings['matrik_career_genaral_header_title']); ?></h2>
                                    <?php endif; ?>
                                    <?php if (!empty($settings['matrik_career_genaral_header_description'])) : ?>
                                        <p><?php echo esc_html($settings['matrik_career_genaral_header_description']); ?></p>
                                    <?php endif; ?>
                                </div>
                                <?php if (!empty($settings['matrik_career_genaral_button_content_two_text'])) : ?>
                                    <a class="primary-btn3 transparent" href="<?php echo esc_url($settings['matrik_career_genaral_button_content_two_text_url']['url']); ?>">
                                        <span><?php echo esc_html($settings['matrik_career_genaral_button_content_two_text']); ?>
                                        </span>
                                        <span><?php echo esc_html($settings['matrik_career_genaral_button_content_two_text']); ?>
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
                        <div class="col-xl-8">
                            <div class="career-card-area">
                                <div class="row gy-5">
                                    <?php
                                    while ($query->have_posts()) :
                                        $query->the_post();
                                        $num++;
                                    ?>
                                        <div class="col-md-6 wow animate fadeInDown" data-wow-delay="200ms" data-wow-duration="1500ms">
                                            <div class="career-card">
                                                <?php if (has_post_thumbnail()) : ?>
                                                    <div class="career-banner-img">
                                                        <?php the_post_thumbnail(); ?>
                                                    </div>
                                                <?php endif; ?>
                                                <div class="career-content-wrap">
                                                    <div class="career-content">
                                                        <h5><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
                                                        <p><?php echo esc_html(get_the_excerpt()); ?></p>
                                                        <?php if (!empty($settings['matrik_career_genaral_button_text'])) : ?>
                                                            <a href="<?php the_permalink(); ?>">
                                                                <span><?php echo esc_html($settings['matrik_career_genaral_button_text']); ?></span>
                                                                <svg width="9" height="9" viewBox="0 0 9 9" xmlns="http://www.w3.org/2000/svg">
                                                                    <path d="M0.0445549 0H9.00008V1.67647L1.69308 9L0 7.32353L4.99014 2.38235L0.0445549 2.42647V0Z" />
                                                                    <path d="M8.99971 9.00058V3.35352L6.59375 5.73587V9.00058H8.99971Z" />
                                                                </svg>
                                                            </a>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endwhile;
                                    wp_reset_postdata(); ?>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>

        <?php if ($settings['matrik_career_genaral_style_selection'] == 'style_three') : ?>
            <div class="home4-career-section">
                <div class="row g-0">
                    <?php if (!empty($settings['matrik_career_genaral_banner_image']['url'])) : ?>
                        <div class="col-xl-5 d-xl-block d-none">
                            <div class="career-img">
                                <img src="<?php echo esc_url($settings['matrik_career_genaral_banner_image']['url']); ?>" alt="<?php echo esc_attr__('banner-image', 'matrik-core'); ?>">
                            </div>
                        </div>
                    <?php endif; ?>
                    <div class="col-xl-7">
                        <div class="career-content-wrap">
                            <?php if (!empty($settings['matrik_career_genaral_header_title'])) : ?>
                                <div class="section-title three white text-center mb-50 wow animate fadeInDown" data-wow-delay="200ms" data-wow-duration="1500ms">
                                    <h2><?php echo esc_html($settings['matrik_career_genaral_header_title']); ?></h2>
                                </div>
                            <?php endif; ?>
                            <ul class="career-list">
                                <?php
                                while ($query->have_posts()) :
                                    $query->the_post();
                                    $num++;
                                ?>
                                    <li class="single-career wow animate fadeInDown" data-wow-delay="200ms" data-wow-duration="1500ms">
                                        <div class="post-name">
                                            <h5><?php the_title(); ?></h5>
                                        </div>
                                        <div class="job-discription-wrap">
                                            <ul class="job-discription">
                                                <?php $data = \Egns\Helper\Egns_Helper::egns_career_value('career_info_list');
                                                ?>
                                                <?php
                                                $last_index = count($data) - 1;
                                                foreach ($data as $index => $career_data) :
                                                    if ($index === 2 || $index === $last_index) :
                                                ?>
                                                        <li>
                                                            <?php if (!empty($career_data['career_label_text'])) : ?>
                                                                <span><?php echo esc_html($career_data['career_label_text']); ?></span>
                                                            <?php endif; ?>
                                                            <?php if (!empty($career_data['career_content_text'])) : ?>
                                                                <?php echo esc_html($career_data['career_content_text']); ?>
                                                            <?php endif; ?>
                                                        </li>
                                                <?php
                                                    endif;
                                                endforeach;
                                                ?>
                                            </ul>
                                            <?php if (!empty($settings['matrik_career_genaral_button_text'])) : ?>
                                                <a href="<?php the_permalink(); ?>" class="apply-btn">
                                                    <span><?php echo esc_html($settings['matrik_career_genaral_button_text']); ?></span>
                                                    <div class="icon">
                                                        <svg width="16" height="16" viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg">
                                                            <g>
                                                                <path d="M0.0792086 0H16.0001V2.98039L3.00993 16L0 13.0196L8.87137 4.23529L0.0792086 4.31373V0Z" />
                                                                <path d="M15.9999 15.9997V5.96045L11.7227 10.1957V15.9997H15.9999Z" />
                                                            </g>
                                                        </svg>
                                                    </div>
                                                </a>
                                            <?php endif; ?>
                                        </div>
                                    </li>
                                <?php endwhile;
                                wp_reset_postdata(); ?>
                            </ul>
                            <?php if (!empty($settings['matrik_career_genaral_bottom_button_text'])) : ?>
                                <div class="row bounce_up">
                                    <div class="col-lg-12 d-flex justify-content-center">
                                        <a class="primary-btn2 two white" href="<?php echo esc_url($settings['matrik_career_genaral_bottom_button_content_two_text_url']['url']); ?>">
                                            <span><?php echo esc_html($settings['matrik_career_genaral_bottom_button_text']); ?></span>
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
                </div>
            </div>
        <?php endif; ?>

<?php

    }
}

Plugin::instance()->widgets_manager->register(new Matrik_Career_Widget());
