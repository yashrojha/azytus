<?php

namespace Elementor;

if (!defined('ABSPATH')) exit;  // Exit if accessed directly

use Elementor\core\Schemes;
use Egns_Core\Egns_Helper;

class Matrik_Project_Widget extends Widget_Base
{

    public function get_name()
    {
        return 'matrik_project';
    }

    public function get_title()
    {
        return esc_html__('EG Project', 'matrik-core');
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
            'matrik_project_genaral',
            [
                'label' => esc_html__('General', 'matrik-core')
            ]
        );

        $this->add_control(
            'matrik_project_genaral_style_selection',
            [
                'label'   => esc_html__('Select Style', 'matrik-core'),
                'type'    => Controls_Manager::SELECT,
                'options' => [
                    'style_one' => esc_html__('Style One', 'matrik-core'),
                    'style_two' => esc_html__('Style Two', 'matrik-core'),
                    'style_three' => esc_html__('Style Three', 'matrik-core'),
                    'style_four' => esc_html__('Style Four', 'matrik-core'),
                    'style_five' => esc_html__('Style Five', 'matrik-core'),
                    'style_six' => esc_html__('Style Six', 'matrik-core'),
                ],
                'default' => 'style_one',
            ]
        );

        $this->add_control(
            'matrik_project_genaral_header_switcher',
            [
                'label' => esc_html__("Show Header Area?", 'matrik-core'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Enable', 'matrik-core'),
                'label_off' => esc_html__('Disable', 'matrik-core'),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );

        $this->add_control(
            'matrik_project_genaral_header_area',
            [
                'label'     => esc_html__('Header Area', 'matrik-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_control(
            'matrik_project_genaral_subtitle',
            [
                'label'       => esc_html__('Header Subtitle', 'matrik-core'),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default'     => esc_html__('Our Latest Project', 'matrik-core'),
                'placeholder' => esc_html__('write your subtitle here', 'matrik-core'),
                'label_block' => true,
                'condition' => [
                    'matrik_project_genaral_header_switcher' => ['yes'],
                    'matrik_project_genaral_style_selection' => ['style_two', 'style_one', 'style_five', 'style_six'],

                ]
            ]
        );

        $this->add_control(
            'matrik_project_genaral_title',
            [
                'label'       => esc_html__('Header Title', 'matrik-core'),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default'     => esc_html__('Our Manufacturing Projects', 'matrik-core'),
                'placeholder' => esc_html__('write your title here', 'matrik-core'),
                'label_block' => true,
                'condition' => [
                    'matrik_project_genaral_header_switcher' => ['yes'],
                ]
            ]
        );


        $this->add_control(
            'matrik_project_genaral_description',
            [
                'label'       => esc_html__('Header Description', 'matrik-core'),
                'type'        => \Elementor\Controls_Manager::TEXTAREA,
                'default'     => esc_html__('Sed nisl eros, condimentum nec risus sit amet, finibus conguese.Fusen fringilla est libero sed tempus urna feugiat eu. Curabitur eu feugiat ligu Suspendisse.', 'matrik-core'),
                'placeholder' => esc_html__('write your description here', 'matrik-core'),
                'label_block' => true,
                'condition' => [
                    'matrik_project_genaral_header_switcher' => ['yes'],
                    'matrik_project_genaral_style_selection' => ['style_six'],

                ]
            ]
        );

        $this->add_control(
            'matrik_project_genaral_query_area',
            [
                'label'     => esc_html__('Query Area', 'matrik-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_control(
            'matrik_project_genaral_post_per_page',
            [
                'label'       => esc_html__('Posts Per Page', 'matrik-core'),
                'type'        => Controls_Manager::NUMBER,
                'default'     => 12,
                'label_block' => false,
            ]
        );

        $this->add_control(
            'matrik_project_genaral_post_list',
            [
                'label'       => __('Post Lists', 'matrik-core'),
                'type'        => \Elementor\Controls_Manager::SELECT2,
                'label_block' => true,
                'multiple'    => true,
                'options'     => \Egns_Core\Egns_Helper::get_project_post_options(),
                'condition' => [
                    'matrik_project_genaral_style_selection' => ['style_two', 'style_one', 'style_three', 'style_five', 'style_six'],
                ]
            ]
        );

        $this->add_control(
            'matrik_project_horizontal_genaral_query_area_category_list',
            [
                'label'       => __('Select Categories', 'matrik-core'),
                'type'        => \Elementor\Controls_Manager::SELECT2,
                'label_block' => true,
                'multiple'    => true,
                'options'     => \Egns_Core\Egns_Helper::get_project_category_options(),
                'condition' => [
                    'matrik_project_genaral_style_selection' => ['style_four'],
                ]
            ]
        );


        $this->add_control(
            'matrik_project_genaral_order_by',
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
            'matrik_project_genaral_order',
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
            'matrik_project_genaral_button_text',
            [
                'label'       => esc_html__('Button Text', 'matrik-core'),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default'     => esc_html__('View All Projects', 'matrik-core'),
                'placeholder' => esc_html__('write your text here', 'matrik-core'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'matrik_project_genaral_button_text_url',
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

        //style start

        $this->start_controls_section(
            'matrik_project_one_style_genaral',
            [
                'label'     => esc_html__('Styles', 'matrik-core'),
                'tab'       => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'matrik_project_genaral_style_selection' => ['style_one'],
                ]
            ]
        );


        $this->add_control(
            'matrik_project_one_style_genaral_section',
            [
                'label'     => esc_html__('Section', 'matrik-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_control(
            'matrik_project_one_style_genaral_section_bg_color',
            [
                'label'     => esc_html__('Background Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home1-project-section' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_project_one_style_genaral_header_subtitle',
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
                'name'     => 'matrik_project_one_style_genaral_header_subtitle_typ',
                'selector' => '{{WRAPPER}} .section-title > span',

            ]
        );

        $this->add_control(
            'matrik_project_one_style_genaral_header_subtitle_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .section-title > span' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_project_one_style_genaral_header_title',
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
                'name'     => 'matrik_project_one_style_genaral_header_title_typ',
                'selector' => '{{WRAPPER}} .section-title.white h2',

            ]
        );

        $this->add_control(
            'matrik_project_one_style_genaral_header_title_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .section-title.white h2' => 'color: {{VALUE}};',
                ],
            ]
        );



        $this->add_control(
            'matrik_project_one_style_genaral_project_info',
            [
                'label'     => esc_html__('Project Info', 'matrik-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'matrik-core'),
                'name'     => 'matrik_project_one_style_genaral_project_info_typ',
                'selector' => '{{WRAPPER}} .project-card .project-content-wrap .project-content span',

            ]
        );

        $this->add_control(
            'matrik_project_one_style_genaral_project_info_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .project-card .project-content-wrap .project-content span' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_project_one_style_genaral_project_title',
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
                'name'     => 'matrik_project_one_style_genaral_project_title_typ',
                'selector' => '{{WRAPPER}} .project-card .project-content-wrap .project-content h3 a',

            ]
        );

        $this->add_control(
            'matrik_project_one_style_genaral_project_title_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .project-card .project-content-wrap .project-content h3 a' => 'color: {{VALUE}};',
                ],
            ]
        );


        $this->add_control(
            'matrik_project_one_style_genaral_project_title_hover_color',
            [
                'label'     => esc_html__('Hover Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .project-card .project-content-wrap .project-content h3 a:hover' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_project_one_style_genaral_project_categories',
            [
                'label'     => esc_html__('Project Categories', 'matrik-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'matrik-core'),
                'name'     => 'matrik_project_one_style_genaral_project_categories_typ',
                'selector' => '{{WRAPPER}} .project-card .project-content-wrap .project-content ul li a',

            ]
        );

        $this->add_control(
            'matrik_project_one_style_genaral_project_categories_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .project-card .project-content-wrap .project-content ul li a' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_project_one_style_genaral_project_categories_hover_color',
            [
                'label'     => esc_html__('Hover Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .project-card .project-content-wrap .project-content ul li a:hover' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_project_one_style_genaral_project_categories_border_color',
            [
                'label'     => esc_html__('Border Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .project-card .project-content-wrap .project-content ul li a' => 'border: 1px solid {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_project_one_style_genaral_project_categories_border_hover_color',
            [
                'label'     => esc_html__('Hover Border Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .project-card .project-content-wrap .project-content ul li a:hover' => 'border-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_project_one_style_genaral_project_categories_bg_color',
            [
                'label'     => esc_html__('Background Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .project-card .project-content-wrap .project-content ul li a' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_project_one_style_genaral_project_categories_bg_hover_color',
            [
                'label'     => esc_html__('Hover Background Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .project-card .project-content-wrap .project-content ul li a:hover' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_project_one_style_genaral_button',
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
                'name'     => 'matrik_project_one_style_genaral_button_typ',
                'selector' => '{{WRAPPER}} .primary-btn1.white-bg',

            ]
        );

        $this->add_control(
            'matrik_project_one_style_genaral_button_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .primary-btn1.white-bg' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_project_one_style_genaral_button_hover_color',
            [
                'label'     => esc_html__('Hover Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .primary-btn1.white-bg:hover' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_project_one_style_genaral_button_icon_color',
            [
                'label'     => esc_html__('Icon Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .primary-btn1.white-bg .arrow' => 'fill: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_project_one_style_genaral_button_hover_icon_color',
            [
                'label'     => esc_html__('Hover Icon Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .primary-btn1.white-bg:hover .arrow' => 'fill: {{VALUE}};',
                ],
            ]
        );


        $this->add_control(
            'matrik_project_one_style_genaral_button_bg_color',
            [
                'label'     => esc_html__('Background Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .primary-btn1.white-bg' => 'background-color: {{VALUE}};',
                ],
            ]
        );


        $this->add_control(
            'matrik_project_one_style_genaral_button_hover_bg_color',
            [
                'label'     => esc_html__('Hover Background Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .primary-btn1.white-bg::after' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section();


        //style start

        $this->start_controls_section(
            'matrik_project_two_style_genaral',
            [
                'label'     => esc_html__('Styles', 'matrik-core'),
                'tab'       => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'matrik_project_genaral_style_selection' => ['style_two'],
                ]
            ]
        );


        $this->add_control(
            'matrik_project_two_style_genaral_section',
            [
                'label'     => esc_html__('Section', 'matrik-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_control(
            'matrik_project_two_style_genaral_section_bg_color',
            [
                'label'     => esc_html__('Background Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home2-project-section' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_project_two_style_genaral_header_subtitle',
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
                'name'     => 'matrik_project_two_style_genaral_header_subtitle_typ',
                'selector' => '{{WRAPPER}} .section-title.two span',

            ]
        );

        $this->add_control(
            'matrik_project_two_style_genaral_header_subtitle_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .section-title.two span' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_project_two_style_genaral_header_title',
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
                'name'     => 'matrik_project_two_style_genaral_header_title_typ',
                'selector' => '{{WRAPPER}} .section-title.white h2',

            ]
        );

        $this->add_control(
            'matrik_project_two_style_genaral_header_title_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .section-title.white h2' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_project_two_style_genaral_header_button',
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
                'name'     => 'matrik_project_two_style_genaral_header_button_typ',
                'selector' => '{{WRAPPER}} .primary-btn2.two.white',

            ]
        );

        $this->add_control(
            'matrik_project_two_style_genaral_header_button_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .primary-btn2.two.white' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_project_two_style_genaral_header_button_hover_color',
            [
                'label'     => esc_html__('Hover Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .primary-btn2.two.white:hover' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_project_two_style_genaral_header_button_icon_color',
            [
                'label'     => esc_html__('Icon Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .primary-btn2.two.white svg' => 'fill: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_project_two_style_genaral_header_button_hover_icon_color',
            [
                'label'     => esc_html__('Hover Icon Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .primary-btn2.two.white:hover svg' => 'fill: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_project_two_style_genaral_project_info',
            [
                'label'     => esc_html__('Project Info', 'matrik-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'matrik-core'),
                'name'     => 'matrik_project_two_style_genaral_project_info_typ',
                'selector' => '{{WRAPPER}} .project-card2 .project-content span',

            ]
        );

        $this->add_control(
            'matrik_project_two_style_genaral_project_info_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .project-card2 .project-content span' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_project_two_style_genaral_project_title',
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
                'name'     => 'matrik_project_two_style_genaral_project_title_typ',
                'selector' => '{{WRAPPER}} .project-card2 .project-content h4 a',

            ]
        );

        $this->add_control(
            'matrik_project_two_style_genaral_project_title_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .project-card2 .project-content h4 a' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_project_two_style_genaral_project_title_hover_color',
            [
                'label'     => esc_html__('Hover Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .project-card2 .project-content h4 a:hover' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section();

        //style start

        $this->start_controls_section(
            'matrik_project_three_style_genaral',
            [
                'label'     => esc_html__('Styles', 'matrik-core'),
                'tab'       => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'matrik_project_genaral_style_selection' => ['style_three'],
                ]
            ]
        );

        $this->add_control(
            'matrik_project_three_style_genaral_header_title',
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
                'name'     => 'matrik_project_three_style_genaral_header_title_typ',
                'selector' => '{{WRAPPER}} .section-title h2',

            ]
        );

        $this->add_control(
            'matrik_project_three_style_genaral_header_title_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .section-title h2' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_project_three_style_genaral_project_title',
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
                'name'     => 'matrik_project_three_style_genaral_project_title_typ',
                'selector' => '{{WRAPPER}} .project-card2.two .project-content h4 a',

            ]
        );

        $this->add_control(
            'matrik_project_three_style_genaral_project_title_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .project-card2.two .project-content h4 a' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_project_three_style_genaral_project_title_hover_color',
            [
                'label'     => esc_html__('Hover Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .project-card2.two .project-content h4 a:hover' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_project_three_style_genaral_project_categories',
            [
                'label'     => esc_html__('Project Categories', 'matrik-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'matrik-core'),
                'name'     => 'matrik_project_three_style_genaral_project_categories_typ',
                'selector' => '{{WRAPPER}} .project-card2.two .project-content ul li a',

            ]
        );

        $this->add_control(
            'matrik_project_three_style_genaral_project_categories_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .project-card2.two .project-content ul li a' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_project_three_style_genaral_project_categories_hover_color',
            [
                'label'     => esc_html__('Hover Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .project-card2.two .project-content ul li a:hover' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_project_three_style_genaral_project_categories_border_color',
            [
                'label'     => esc_html__('Border Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .project-card2.two .project-content ul li a' => 'border: 1px solid {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_project_three_style_genaral_project_categories_hover_border_color',
            [
                'label'     => esc_html__('Hover Border Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .project-card2.two .project-content ul li a:hover ' => 'border-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_project_three_style_genaral_project_categories_hover_bg_color',
            [
                'label'     => esc_html__('Hover Background Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .project-card2.two .project-content ul li a:hover ' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_project_three_style_genaral_project_button',
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
                'name'     => 'matrik_project_three_style_genaral_project_button_typ',
                'selector' => '{{WRAPPER}} .primary-btn3.black-bg',

            ]
        );

        $this->add_control(
            'matrik_project_three_style_genaral_project_button_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .primary-btn3.black-bg' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_project_three_style_genaral_project_button_hover_color',
            [
                'label'     => esc_html__('Hover Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .primary-btn3.black-bg:hover' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_project_three_style_genaral_project_button_icon_color',
            [
                'label'     => esc_html__('Icon Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .primary-btn3.black-bg .arrow' => 'fill: {{VALUE}};',
                ],
            ]
        );


        $this->add_control(
            'matrik_project_three_style_genaral_project_button_bg_color',
            [
                'label'     => esc_html__('Background Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .primary-btn3.black-bg' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_project_three_style_genaral_project_button_hover_bg_color',
            [
                'label'     => esc_html__('Hover Background Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .primary-btn3.black-bg::after' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section();

        //style start

        $this->start_controls_section(
            'matrik_project_four_style_genaral',
            [
                'label'     => esc_html__('Styles', 'matrik-core'),
                'tab'       => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'matrik_project_genaral_style_selection' => ['style_four'],
                ]
            ]
        );

        $this->add_control(
            'matrik_project_four_style_genaral_header_title',
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
                'name'     => 'matrik_project_four_style_genaral_header_title_typ',
                'selector' => '{{WRAPPER}} .section-title h2',

            ]
        );

        $this->add_control(
            'matrik_project_four_style_genaral_header_title_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .section-title h2' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_project_four_style_genaral_header_tab_category',
            [
                'label'     => esc_html__('Tab Category', 'matrik-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'matrik-core'),
                'name'     => 'matrik_project_four_style_genaral_header_tab_category_typ',
                'selector' => '{{WRAPPER}} .home4-project-section .project-nav-area .nav-pills .nav-item .nav-link',

            ]
        );

        $this->add_control(
            'matrik_project_four_style_genaral_header_tab_category_color_active',
            [
                'label'     => esc_html__('Color (Active)', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home4-project-section .project-nav-area .nav-pills .nav-item .nav-link.active' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_project_four_style_genaral_header_tab_category_color_inactive',
            [
                'label'     => esc_html__('Color (Inactive)', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home4-project-section .project-nav-area .nav-pills .nav-item .nav-link' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_project_four_style_genaral_project_title',
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
                'name'     => 'matrik_project_four_style_genaral_project_title_typ',
                'selector' => '{{WRAPPER}} .project-card2.two .project-content h4 a',

            ]
        );

        $this->add_control(
            'matrik_project_four_style_genaral_project_title_colors',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .project-card2.two .project-content h4 a' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_project_four_style_genaral_project_title_hover_colors',
            [
                'label'     => esc_html__('Hover Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .project-card2.two .project-content h4 a:hover' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_project_four_style_genaral_project_category',
            [
                'label'     => esc_html__('Project Category', 'matrik-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'matrik-core'),
                'name'     => 'matrik_project_four_style_genaral_project_category_typ',
                'selector' => '{{WRAPPER}} .project-card2.two .project-content ul li a',

            ]
        );

        $this->add_control(
            'matrik_project_four_style_genaral_project_category_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .project-card2.two .project-content ul li a' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_project_four_style_genaral_project_category_hover_color',
            [
                'label'     => esc_html__('Hover Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .project-card2.two .project-content ul li a:hover' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_project_four_style_genaral_project_category_border_color',
            [
                'label'     => esc_html__('Border Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .project-card2.two .project-content ul li a' => 'border: 1px solid {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_project_four_style_genaral_project_category_border_hover_color',
            [
                'label'     => esc_html__('Hover Border Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .project-card2.two .project-content ul li a:hover' => 'border-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_project_four_style_genaral_project_category_background_color',
            [
                'label'     => esc_html__('Hover Background Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .project-card2.two .project-content ul li a:hover' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_project_four_style_genaral_project_pagination',
            [
                'label'     => esc_html__('Pagination', 'matrik-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'matrik-core'),
                'name'     => 'matrik_project_four_style_genaral_project_pagination_typ',
                'selector' => '{{WRAPPER}} .slider-btn-grp .slider-btn i',

            ]
        );

        $this->add_control(
            'matrik_project_four_style_genaral_project_pagination_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .slider-btn-grp .slider-btn i' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_project_four_style_genaral_project_pagination_hover_color',
            [
                'label'     => esc_html__('Hover Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .slider-btn-grp .slider-btn:hover i' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_project_four_style_genaral_project_pagination_border_color',
            [
                'label'     => esc_html__('Border Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .slider-btn-grp .slider-btn' => 'border: 1px solid {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_project_four_style_genaral_project_pagination_border_hover_color',
            [
                'label'     => esc_html__('Hover Border Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .slider-btn-grp.two .slider-btn:hover' => 'border-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_project_four_style_genaral_project_pagination_hover_bg_color',
            [
                'label'     => esc_html__('Hover Background Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .slider-btn-grp.two .slider-btn:hover' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_project_four_style_genaral_project_bottom_line',
            [
                'label'     => esc_html__('Bottom Line', 'matrik-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_control(
            'matrik_project_four_style_genaral_project_bottom_line_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home4-project-section .project-bottom-area' => 'border-top: 1px solid {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_project_four_style_genaral_project_button',
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
                'name'     => 'matrik_project_four_style_genaral_project_button_typ',
                'selector' => '{{WRAPPER}} .primary-btn4.transparent',

            ]
        );

        $this->add_control(
            'matrik_project_four_style_genaral_project_button_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .primary-btn4.transparent' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_project_four_style_genaral_project_button_hover_color',
            [
                'label'     => esc_html__('Hover Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .primary-btn4.transparent:hover' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_project_four_style_genaral_project_button_icon_color',
            [
                'label'     => esc_html__('Icon Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .primary-btn4 .arrow' => 'fill: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_project_four_style_genaral_project_button_icon_hover_color',
            [
                'label'     => esc_html__('Hover Icon Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .primary-btn4.transparent:hover .arrow' => 'fill: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_project_four_style_genaral_project_button_border_color',
            [
                'label'     => esc_html__('Border Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .primary-btn4.transparent' => 'border: 1px solid {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_project_four_style_genaral_project_button_border_hover_color',
            [
                'label'     => esc_html__('Hover Border Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .primary-btn4.transparent:hover' => 'border-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_project_four_style_genaral_project_button_bg_color',
            [
                'label'     => esc_html__('Background Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .primary-btn4.transparent' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_project_four_style_genaral_project_button_hover_bg_color',
            [
                'label'     => esc_html__('Hover Background Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .primary-btn4.transparent > span' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section();

        //style start

        $this->start_controls_section(
            'matrik_project_five_style_genaral',
            [
                'label'     => esc_html__('Styles', 'matrik-core'),
                'tab'       => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'matrik_project_genaral_style_selection' => ['style_five'],
                ]
            ]
        );

        $this->add_control(
            'matrik_project_five_style_genaral_subtitle',
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
                'name'     => 'matrik_project_five_style_genaral_subtitle_typ',
                'selector' => '{{WRAPPER}} .section-title.four span',

            ]
        );

        $this->add_control(
            'matrik_project_five_style_genaral_subtitle_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .section-title.four span' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_project_five_style_genaral_subtitle_icon_color',
            [
                'label'     => esc_html__('Icon Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .section-title.four span svg' => 'fill: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_project_five_style_genaral_title',
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
                'name'     => 'matrik_project_five_style_genaral_title_typ',
                'selector' => '{{WRAPPER}} .section-title.four h2',

            ]
        );

        $this->add_control(
            'matrik_project_five_style_genaral_title_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .section-title.four h2' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_project_five_style_genaral_button',
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
                'name'     => 'matrik_project_five_style_genaral_button_typ',
                'selector' => '{{WRAPPER}} .primary-btn5',

            ]
        );

        $this->add_control(
            'matrik_project_five_style_genaral_button_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .primary-btn5' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_project_five_style_genaral_button_hover_color',
            [
                'label'     => esc_html__('Hover Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .primary-btn5:hover' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_project_five_style_genaral_button_icon_color',
            [
                'label'     => esc_html__('Icon Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .primary-btn5 .arrow' => 'fill: {{VALUE}};',
                ],
            ]
        );


        $this->add_control(
            'matrik_project_five_style_genaral_button_icon_hover_color',
            [
                'label'     => esc_html__('Hover Icon Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .primary-btn5:hover .arrow' => 'fill: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_project_five_style_genaral_button_bg_color',
            [
                'label'     => esc_html__('Background Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .primary-btn5' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_project_five_style_genaral_button_bg_hover_color',
            [
                'label'     => esc_html__('Hover Background Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .primary-btn5 > span' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_project_five_style_genaral_project_info',
            [
                'label'     => esc_html__('Project Info', 'matrik-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'matrik-core'),
                'name'     => 'matrik_project_five_style_genaral_project_info_typ',
                'selector' => '{{WRAPPER}} .project-card3 .project-content span',

            ]
        );

        $this->add_control(
            'matrik_project_five_style_genaral_project_info_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .project-card3 .project-content span' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_project_five_style_genaral_project_title',
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
                'name'     => 'matrik_project_five_style_genaral_project_title_typ',
                'selector' => '{{WRAPPER}} .project-card3 .project-content h4 a',

            ]
        );

        $this->add_control(
            'matrik_project_five_style_genaral_project_title_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .project-card3 .project-content h4 a' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_project_five_style_genaral_project_title_hover_color',
            [
                'label'     => esc_html__('Hover Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .project-card3 .project-content h4 a:hover' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section();


        //style start

        $this->start_controls_section(
            'matrik_project_six_style_genaral',
            [
                'label'     => esc_html__('Styles', 'matrik-core'),
                'tab'       => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'matrik_project_genaral_style_selection' => ['style_six'],
                ]
            ]
        );

        $this->add_control(
            'matrik_project_six_style_genaral_subtitle',
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
                'name'     => 'matrik_project_six_style_genaral_subtitle_typ',
                'selector' => '{{WRAPPER}} .section-title.five > span',

            ]
        );

        $this->add_control(
            'matrik_project_six_style_genaral_subtitle_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .section-title.five > span' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_project_six_style_genaral_subtitle_line_color',
            [
                'label'     => esc_html__('Line Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .section-title.five > span::after' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_project_six_style_genaral_title',
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
                'name'     => 'matrik_project_six_style_genaral_title_typ',
                'selector' => '{{WRAPPER}} .section-title h2',

            ]
        );

        $this->add_control(
            'matrik_project_six_style_genaral_title_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .section-title h2' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_project_six_style_genaral_description',
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
                'name'     => 'matrik_project_six_style_genaral_description_typ',
                'selector' => '{{WRAPPER}} .section-title p',

            ]
        );

        $this->add_control(
            'matrik_project_six_style_genaral_description_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .section-title p' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_project_six_style_genaral_project_icon',
            [
                'label'     => esc_html__('Project Arrow Icon', 'matrik-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_control(
            'matrik_project_six_style_genaral_project_icon_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home6-project-section .project-slider-area .project-card4 .project-content-wrap .arrow-vector svg' => 'fill: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_project_six_style_genaral_project_icon_hover_color',
            [
                'label'     => esc_html__('Hover Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home6-project-section .project-slider-area .project-card4 .project-content-wrap .arrow-vector:hover svg' => 'fill: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_project_six_style_genaral_project_title',
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
                'name'     => 'matrik_project_six_style_genaral_project_title_typ',
                'selector' => '{{WRAPPER}} .home6-project-section .project-slider-area .project-card4 .project-content-wrap .project-content h4 a',

            ]
        );

        $this->add_control(
            'matrik_project_six_style_genaral_project_title_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home6-project-section .project-slider-area .project-card4 .project-content-wrap .project-content h4 a' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_project_six_style_genaral_project_title_hover_color',
            [
                'label'     => esc_html__('Hover Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home6-project-section .project-slider-area .project-card4 .project-content-wrap .project-content h4 a:hover' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_project_six_style_genaral_project_categories',
            [
                'label'     => esc_html__('Project Categories', 'matrik-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'matrik-core'),
                'name'     => 'matrik_project_six_style_genaral_project_categories_typ',
                'selector' => '{{WRAPPER}} .home6-project-section .project-slider-area .project-card4 .project-content-wrap .project-content .tag-list li a',

            ]
        );

        $this->add_control(
            'matrik_project_six_style_genaral_project_categories_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home6-project-section .project-slider-area .project-card4 .project-content-wrap .project-content .tag-list li a' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_project_six_style_genaral_project_categories_hover_color',
            [
                'label'     => esc_html__('Hover Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home6-project-section .project-slider-area .project-card4 .project-content-wrap .project-content .tag-list li a:hover' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_project_six_style_genaral_project_categories_border_color',
            [
                'label'     => esc_html__('Border Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home6-project-section .project-slider-area .project-card4 .project-content-wrap .project-content .tag-list li a' => 'border: 1px solid {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_project_six_style_genaral_project_categories_hover_border_color',
            [
                'label'     => esc_html__('Hover Border Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home6-project-section .project-slider-area .project-card4 .project-content-wrap .project-content .tag-list li a:hover' => 'border-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_project_six_style_genaral_project_section_border',
            [
                'label'     => esc_html__('Section Border', 'matrik-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_control(
            'matrik_project_six_style_genaral_project_section_border_color',
            [
                'label'     => esc_html__('Border Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home6-project-section .btn-area' => 'border-top: 1px solid {{VALUE}};',
                ],
            ]
        );


        $this->add_control(
            'matrik_project_six_style_genaral_project_pagination',
            [
                'label'     => esc_html__('Project Pagination', 'matrik-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'matrik-core'),
                'name'     => 'matrik_project_six_style_genaral_project_pagination_typ',
                'selector' => '{{WRAPPER}} .slider-btn-grp .slider-btn i',

            ]
        );

        $this->add_control(
            'matrik_project_six_style_genaral_project_pagination_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .slider-btn-grp .slider-btn i' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_project_six_style_genaral_project_pagination_hover_color',
            [
                'label'     => esc_html__('Hover Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .slider-btn-grp .slider-btn:hover i' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_project_six_style_genaral_project_pagination_border_color',
            [
                'label'     => esc_html__('Border Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .slider-btn-grp .slider-btn' => 'border: 1px solid {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_project_six_style_genaral_project_pagination_hover_border_color',
            [
                'label'     => esc_html__('Hover Border Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .slider-btn-grp.four .slider-btn:hover' => 'border-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_project_six_style_genaral_project_pagination_hover_bg_color',
            [
                'label'     => esc_html__('Hover Background Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .slider-btn-grp.four .slider-btn:hover' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_project_six_style_genaral_project_button',
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
                'name'     => 'matrik_project_six_style_genaral_project_button_typ',
                'selector' => '{{WRAPPER}} .primary-btn6',

            ]
        );

        $this->add_control(
            'matrik_project_six_style_genaral_project_button_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .primary-btn6' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_project_six_style_genaral_project_button_icon_color',
            [
                'label'     => esc_html__('Icon Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .primary-btn6 svg' => 'fill: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_project_six_style_genaral_project_button_bg_color',
            [
                'label'     => esc_html__('Background Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .primary-btn6' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_project_six_style_genaral_project_button_hover_bg_color',
            [
                'label'     => esc_html__('Hover Background Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .primary-btn6::after' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section();
    }
    protected function render()
    {

        $settings = $this->get_settings_for_display();
        $selected_post_ids     = $settings['matrik_project_genaral_post_list'];
        $args                  = array(
            'post_type'      => 'project',
            'posts_per_page' => $settings['matrik_project_genaral_post_per_page'],
            'orderby'        => $settings['matrik_project_genaral_order_by'],
            'order'          => $settings['matrik_project_genaral_order'],
            'offset'         => 0,
            'post_status'    => 'publish',
        );

        if (!empty($selected_category_ids)) {
            $args['tax_query'] = array(
                array(
                    'taxonomy' => 'project-category',
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

        <?php if (is_admin()) : ?>
            <script>
                var swiper = new Swiper(".home1-project-slider", {
                    slidesPerView: 1,
                    speed: 1500,
                    spaceBetween: 0,
                    autoplay: {
                        delay: 2500, // Autoplay duration in milliseconds
                        disableOnInteraction: false,
                    },
                    navigation: {
                        nextEl: ".project-slider-next",
                        prevEl: ".project-slider-prev",
                    },
                    pagination: {
                        el: ".swiper-pagination1",
                        clickable: true,
                    },
                    breakpoints: {
                        280: {
                            slidesPerView: 1,
                        },
                        386: {
                            slidesPerView: 1,
                        },
                        576: {
                            slidesPerView: 1,
                        },
                        768: {
                            slidesPerView: 2,
                        },
                        992: {
                            slidesPerView: 3,
                        },
                        1200: {
                            slidesPerView: 3,
                        },
                        1400: {
                            slidesPerView: 4,
                        },
                    },
                    observer: true,
                    observeParents: true,
                });

                const sliders = document.querySelectorAll(".home4-project-slider");
                sliders.forEach((slider) => {
                    const nextBtn = slider.parentElement.querySelector(".project-slider-next");
                    const prevBtn = slider.parentElement.querySelector(".project-slider-prev");

                    const swiper = new Swiper(slider, {
                        slidesPerView: 1,
                        speed: 1500,
                        spaceBetween: 35,
                        autoplay: {
                            delay: 2500, // Autoplay duration in milliseconds
                            disableOnInteraction: false,
                        },
                        navigation: {
                            nextEl: nextBtn,
                            prevEl: prevBtn,
                        },
                        breakpoints: {
                            280: {
                                slidesPerView: 1,
                            },
                            386: {
                                slidesPerView: 1,
                            },
                            576: {
                                slidesPerView: 1,
                            },
                            768: {
                                slidesPerView: 2,
                            },
                            992: {
                                slidesPerView: 2,
                            },
                            1200: {
                                slidesPerView: 2,
                                spaceBetween: 20,
                            },
                            1400: {
                                slidesPerView: 2,
                            },
                        },
                        observer: true,
                        observeParents: true,
                    });

                    nextBtn.addEventListener("click", () => {
                        swiper.slideNext();
                    });

                    prevBtn.addEventListener("click", () => {
                        swiper.slidePrev();
                    });

                });

                var swiper = new Swiper(".home5-project-slider", {
                    slidesPerView: 1,
                    speed: 1500,
                    spaceBetween: 24,
                    autoplay: {
                        delay: 2500, // Autoplay duration in milliseconds
                        disableOnInteraction: false,
                    },
                    pagination: {
                        el: ".progress-pagination",
                        type: "progressbar",
                    },
                    breakpoints: {
                        280: {
                            slidesPerView: 1,
                            spaceBetween: 24,
                        },
                        386: {
                            slidesPerView: 1,
                            spaceBetween: 24,
                        },
                        576: {
                            slidesPerView: 2,
                            spaceBetween: 24,
                        },
                        768: {
                            slidesPerView: 2,
                        },
                        992: {
                            slidesPerView: 3,
                        },
                        1200: {
                            slidesPerView: 3,
                        },
                        1400: {
                            slidesPerView: 3,
                        },
                    },
                });

                var swiper = new Swiper(".home6-project-slider", {
                    slidesPerView: 1,
                    speed: 1500,
                    spaceBetween: 30,
                    autoplay: {
                        delay: 2500, // Autoplay duration in milliseconds
                        disableOnInteraction: false,
                    },
                    navigation: {
                        nextEl: ".project-slider-next",
                        prevEl: ".project-slider-prev",
                    },
                    breakpoints: {
                        280: {
                            slidesPerView: 1,
                        },
                        386: {
                            slidesPerView: 1,
                        },
                        576: {
                            slidesPerView: 1,
                        },
                        768: {
                            slidesPerView: 1,
                        },
                        992: {
                            slidesPerView: 2,
                        },
                        1200: {
                            slidesPerView: 2,
                            spaceBetween: 15,
                        },
                        1400: {
                            slidesPerView: 2,
                        },
                    },
                });
            </script>
        <?php endif; ?>

        <?php if ($settings['matrik_project_genaral_style_selection'] == 'style_one') : ?>
            <div class="home1-project-section">
                <?php if ($settings['matrik_project_genaral_header_switcher'] == 'yes') : ?>
                    <div class="container">
                        <div class="row justify-content-center mb-50">
                            <div class="col-xl-6 col-lg-7 col-md-8">
                                <div class="section-title white text-center wow animate fadeInDown" data-wow-delay="200ms" data-wow-duration="1500ms">
                                    <?php if (!empty($settings['matrik_project_genaral_subtitle'])) : ?>
                                        <span><?php echo esc_html($settings['matrik_project_genaral_subtitle']); ?></span>
                                    <?php endif; ?>
                                    <?php if (!empty($settings['matrik_project_genaral_title'])) : ?>
                                        <h2><?php echo esc_html($settings['matrik_project_genaral_title']); ?></h2>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
                <div class="project-slider-area mb-50">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="swiper home1-project-slider">
                                <div class="swiper-wrapper">
                                    <?php
                                    while ($query->have_posts()) :
                                        $query->the_post();
                                    ?>
                                        <div class="swiper-slide">
                                            <div class="project-card-wrap">
                                                <div class="project-card">
                                                    <?php if (has_post_thumbnail()) : ?>
                                                        <div class="project-img">
                                                            <?php the_post_thumbnail(); ?>
                                                        </div>
                                                    <?php endif; ?>
                                                    <div class="project-content-wrap">
                                                        <div class="project-content">
                                                            <span><?php
                                                                    $data = Egns_Helper::egns_project_value('project_info_list');
                                                                    if (!empty($data) && isset($data[0]['project_label_text']) && isset($data[0]['project_content_text'])) { ?>
                                                                    <?php echo esc_html($data[0]['project_label_text']); ?> <?php echo esc_html($data[0]['project_content_text']); ?>
                                                                <?php }
                                                                ?></span>
                                                            <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                                                            <ul>
                                                                <?php
                                                                $post_categories = get_the_terms(get_the_ID(), 'project-category');
                                                                if ($post_categories && !is_wp_error($post_categories)) :
                                                                ?>
                                                                    <?php foreach ($post_categories as $category) : ?>
                                                                        <li><a href="<?php echo esc_url(get_term_link($category)); ?>"><?php echo esc_html($category->name); ?></a></li>
                                                                    <?php endforeach; ?>
                                                                <?php endif; ?>
                                                            </ul>
                                                        </div>
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

                <?php if (!empty($settings['matrik_project_genaral_button_text'])) : ?>
                    <div class="row">
                        <div class="col-lg-12 d-flex justify-content-center bounce_up">
                            <a class="primary-btn1 white-bg" href="<?php echo esc_url($settings['matrik_project_genaral_button_text_url']['url']); ?>">
                                <span><?php echo esc_html($settings['matrik_project_genaral_button_text']); ?>
                                </span>
                                <span><?php echo esc_html($settings['matrik_project_genaral_button_text']); ?>
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
        <?php endif; ?>

        <?php if ($settings['matrik_project_genaral_style_selection'] == 'style_two') : ?>
            <div class="home2-project-section">
                <div class="container-fluid">
                    <div class="row g-4 align-items-end justify-content-between mb-70">
                        <div class="col-lg-5 wow animate fadeInLeft" data-wow-delay="200ms" data-wow-duration="1500ms">
                            <div class="section-title two white">
                                <?php if (!empty($settings['matrik_project_genaral_subtitle'])) : ?>
                                    <span><?php echo esc_html($settings['matrik_project_genaral_subtitle']); ?></span>
                                <?php endif; ?>
                                <?php if (!empty($settings['matrik_project_genaral_title'])) : ?>
                                    <h2><?php echo esc_html($settings['matrik_project_genaral_title']); ?></h2>
                                <?php endif; ?>
                            </div>
                        </div>
                        <?php if (!empty($settings['matrik_project_genaral_button_text'])) : ?>
                            <div class="col-lg-3 d-flex justify-content-lg-end btn_wrapper">
                                <a class="primary-btn2 two white" href="<?php echo esc_url($settings['matrik_project_genaral_button_text_url']['url']); ?>">
                                    <span><?php echo esc_html($settings['matrik_project_genaral_button_text']); ?></span>
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
                    <div class="project-wrapper">

                        <div class="project-card-area">
                            <?php
                            $count = 0;
                            while ($query->have_posts()) :
                                $query->the_post();
                                if ($count >= 3) break;
                            ?>
                                <div class="project-card2 wow animate fadeInDown" data-wow-delay="200ms" data-wow-duration="1500ms">
                                    <?php if (has_post_thumbnail()) : ?>
                                        <a href="<?php the_permalink(); ?>" class="project-img">
                                            <?php the_post_thumbnail(); ?>
                                        </a>
                                    <?php endif; ?>
                                    <div class="project-content">
                                        <span><?php
                                                $data = Egns_Helper::egns_project_value('project_info_list');
                                                if (!empty($data) && isset($data[0]['project_label_text']) && isset($data[0]['project_content_text'])) { ?>
                                                <?php echo esc_html($data[0]['project_label_text']); ?> <?php echo esc_html($data[0]['project_content_text']); ?>
                                            <?php }
                                            ?></span>
                                        <h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
                                    </div>
                                </div>
                            <?php $count++;
                            endwhile;

                            wp_reset_postdata(); ?>
                        </div>
                        <div class="project-card-area two">
                            <?php
                            $query->rewind_posts();
                            $count = 0;
                            while ($query->have_posts()) :
                                $query->the_post();
                                $count++;

                                if ($count <= 3) continue;
                            ?>
                                <div class="project-card2 wow animate fadeInDown" data-wow-delay="800ms" data-wow-duration="1500ms">
                                    <a href="<?php the_permalink(); ?>" class="project-img">
                                        <?php the_post_thumbnail(); ?>
                                    </a>
                                    <div class="project-content">
                                        <span><?php
                                                $data = Egns_Helper::egns_project_value('project_info_list');
                                                if (!empty($data) && isset($data[0]['project_label_text']) && isset($data[0]['project_content_text'])) { ?>
                                                <?php echo esc_html($data[0]['project_label_text']); ?> <?php echo esc_html($data[0]['project_content_text']); ?>
                                            <?php }
                                            ?></span>
                                        <h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
                                    </div>
                                </div>

                            <?php endwhile;
                            wp_reset_postdata(); ?>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>

        <?php if ($settings['matrik_project_genaral_style_selection'] == 'style_three') : ?>
            <div class="home3-project-section">
                <div class="container">
                    <?php if (!empty($settings['matrik_project_genaral_title'])) : ?>
                        <div class="row justify-content-center mb-70 wow animate fadeInDown" data-wow-delay="200ms" data-wow-duration="1500ms">
                            <div class="col-xl-5 col-lg-6">
                                <div class="section-title two">
                                    <h2><?php echo esc_html($settings['matrik_project_genaral_title']); ?></h2>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
                    <div class="row gy-md-5 gy-4 mb-70">
                        <?php
                        while ($query->have_posts()) :
                            $query->the_post();
                        ?>
                            <div class="col-lg-6 wow animate fadeInDown" data-wow-delay="200ms" data-wow-duration="1500ms">
                                <div class="project-card2 two magnetic-item">
                                    <?php if (has_post_thumbnail()) : ?>
                                        <a href="<?php the_permalink(); ?>" class="project-img">
                                            <?php the_post_thumbnail(); ?>
                                        </a>
                                    <?php endif; ?>
                                    <div class="project-content">
                                        <h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
                                        <ul>
                                            <?php
                                            $post_categories = get_the_terms(get_the_ID(), 'project-category');
                                            if ($post_categories && !is_wp_error($post_categories)) :
                                            ?>
                                                <?php foreach ($post_categories as $category) : ?>
                                                    <li><a href="<?php echo esc_url(get_term_link($category)); ?>"><?php echo esc_html($category->name); ?></a></li>
                                                <?php endforeach; ?>
                                            <?php endif; ?>

                                        </ul>
                                    </div>
                                </div>
                            </div>
                        <?php endwhile;
                        wp_reset_postdata(); ?>
                    </div>
                    <?php if (!empty($settings['matrik_project_genaral_button_text'])) : ?>
                        <div class="row wow animate fadeInUp" data-wow-delay="200ms" data-wow-duration="1500ms">
                            <div class="col-lg-12 d-flex justify-content-center">
                                <a class="primary-btn3 black-bg" href="<?php echo esc_url($settings['matrik_project_genaral_button_text_url']['url']); ?>">
                                    <span><?php echo esc_html($settings['matrik_project_genaral_button_text']); ?>
                                    </span>
                                    <span><?php echo esc_html($settings['matrik_project_genaral_button_text']); ?>
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

        <?php if ($settings['matrik_project_genaral_style_selection'] == 'style_four') : ?>
            <div class="home4-project-section">
                <div class="container">
                    <?php
                    $selected_categories = !empty($settings['matrik_project_horizontal_genaral_query_area_category_list']) ? $settings['matrik_project_horizontal_genaral_query_area_category_list'] : [];

                    $term_args = array(
                        'taxonomy'   => 'project-category',
                        'hide_empty' => true,
                    );

                    if (!empty($selected_categories)) {
                        $term_args['include'] = $selected_categories;
                    }

                    $terms = get_terms($term_args);

                    if (!empty($terms) && !is_wp_error($terms)) :
                    ?>
                        <div class="row gy-5 align-items-center mb-70 wow animate fadeInDown" data-wow-delay="200ms" data-wow-duration="1500ms">
                            <?php if (!empty($settings['matrik_project_genaral_title'])) : ?>
                                <div class="col-lg-5">
                                    <div class="section-title three">
                                        <h2><?php echo esc_html($settings['matrik_project_genaral_title']); ?></h2>
                                    </div>
                                </div>
                            <?php endif; ?>
                            <div class="col-lg-7 d-flex justify-content-lg-end">
                                <div class="project-nav-area">
                                    <ul class="nav nav-pills" id="pills-tab" role="tablist">
                                        <?php foreach ($terms as $index => $term) : ?>
                                            <li class="nav-item" role="presentation">
                                                <button class="nav-link <?php echo ($index === 0) ? 'active' : ''; ?>"
                                                    id="pills-<?php echo esc_attr($term->slug); ?>-tab"
                                                    data-bs-toggle="pill"
                                                    data-bs-target="#pills-<?php echo esc_attr($term->slug); ?>"
                                                    type="button"
                                                    role="tab"
                                                    aria-controls="pills-<?php echo esc_attr($term->slug); ?>"
                                                    aria-selected="<?php echo ($index === 0) ? 'true' : 'false'; ?>">
                                                    <?php echo esc_html($term->name); ?>
                                                </button>
                                            </li>
                                        <?php endforeach; ?>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-12">
                                <div class="tab-content" id="pills-tabContent">
                                    <?php foreach ($terms as $index => $term) : ?>
                                        <div class="tab-pane fade <?php echo ($index === 0) ? 'show active' : ''; ?>"
                                            id="pills-<?php echo esc_attr($term->slug); ?>"
                                            role="tabpanel"
                                            aria-labelledby="pills-<?php echo esc_attr($term->slug); ?>-tab">

                                            <div class="swiper home4-project-slider mb-50">
                                                <div class="swiper-wrapper">
                                                    <?php
                                                    $args = array(
                                                        'post_type'      => 'project',
                                                        'posts_per_page' => $settings['matrik_project_genaral_post_per_page'],
                                                        'orderby'        => $settings['matrik_project_genaral_order_by'],
                                                        'order'          => $settings['matrik_project_genaral_order'],
                                                        'tax_query'      => array(
                                                            array(
                                                                'taxonomy' => 'project-category',
                                                                'field'    => 'term_id',
                                                                'terms'    => $term->term_id,
                                                            ),
                                                        ),
                                                    );
                                                    $query = new \WP_Query($args);

                                                    if ($query->have_posts()) :
                                                        while ($query->have_posts()) : $query->the_post(); ?>
                                                            <div class="swiper-slide">
                                                                <div class="project-card2 two">
                                                                    <?php if (has_post_thumbnail()) : ?>
                                                                        <a href="<?php the_permalink(); ?>" class="project-img">
                                                                            <?php the_post_thumbnail(); ?>
                                                                        </a>
                                                                    <?php endif; ?>
                                                                    <div class="project-content">
                                                                        <h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
                                                                        <ul>
                                                                            <?php
                                                                            $post_categories = get_the_terms(get_the_ID(), 'project-category');
                                                                            if ($post_categories && !is_wp_error($post_categories)) :
                                                                                foreach ($post_categories as $category) :
                                                                            ?>
                                                                                    <li><a href="<?php echo esc_url(get_term_link($category)); ?>"><?php echo esc_html($category->name); ?></a></li>
                                                                            <?php
                                                                                endforeach;
                                                                            endif;
                                                                            ?>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                    <?php endwhile;
                                                        wp_reset_postdata();
                                                    endif; ?>
                                                </div>
                                            </div>

                                            <div class="project-bottom-area">

                                                <div class="slider-btn-grp two">
                                                    <div class="slider-btn project-slider-prev">
                                                        <i class="bi bi-arrow-left"></i>
                                                    </div>
                                                    <div class="slider-btn project-slider-next">
                                                        <i class="bi bi-arrow-right"></i>
                                                    </div>
                                                </div>

                                                <?php if (!empty($settings['matrik_project_genaral_button_text'])) : ?>
                                                    <a class="primary-btn4 btn-hover transparent" href="<?php echo esc_url($settings['matrik_project_genaral_button_text_url']['url']); ?>">
                                                        <?php echo esc_html($settings['matrik_project_genaral_button_text']); ?>
                                                        <svg class="arrow" width="23" height="23" viewBox="0 0 23 23" xmlns="http://www.w3.org/2000/svg">
                                                            <g>
                                                                <path d="M0.113861 0H22.9999V4.28425L4.32671 22.9997L0 18.7154L12.7524 6.08815L0.113861 6.20089V0Z"></path>
                                                                <path d="M23 22.9996V8.56848L16.8516 14.6566V22.9996H23Z"></path>
                                                            </g>
                                                        </svg>
                                                        <span></span>
                                                    </a>
                                                <?php endif; ?>
                                            </div>

                                        </div>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>

                </div>
            </div>
        <?php endif; ?>

        <?php if ($settings['matrik_project_genaral_style_selection'] == 'style_five') : ?>
            <div class="home5-project-section">
                <div class="container">
                    <?php if ($settings['matrik_project_genaral_header_switcher'] == 'yes') : ?>
                        <div class="row justify-content-lg-end mb-70 wow animate fadeInDown" data-wow-delay="200ms" data-wow-duration="1500ms">
                            <div class="col-lg-11 d-flex align-items-center justify-content-between flex-wrap gap-4">
                                <div class="section-title four">
                                    <?php if (!empty($settings['matrik_project_genaral_subtitle'])) : ?>
                                        <span>
                                            <svg width="12" height="12" viewBox="0 0 12 12" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M0.0594065 0H12.0001V2.2353L2.25745 12L0 9.76471L6.65353 3.17647L0.0594065 3.2353V0Z" />
                                                <path d="M11.9999 11.9999V4.47046L8.79199 7.64693V11.9999H11.9999Z" />
                                            </svg>
                                            <?php echo esc_html($settings['matrik_project_genaral_subtitle']); ?>
                                        </span>
                                    <?php endif; ?>
                                    <?php if (!empty($settings['matrik_project_genaral_title'])) : ?>
                                        <h2><?php echo esc_html($settings['matrik_project_genaral_title']); ?></h2>
                                    <?php endif; ?>
                                </div>
                                <?php if (!empty($settings['matrik_project_genaral_button_text'])) : ?>
                                    <a class="primary-btn5 btn-hover" href="<?php echo esc_url($settings['matrik_project_genaral_button_text_url']['url']); ?>">
                                        <?php echo esc_html($settings['matrik_project_genaral_button_text']); ?>
                                        <svg class="arrow" width="23" height="23" viewBox="0 0 23 23" xmlns="http://www.w3.org/2000/svg">
                                            <g>
                                                <path d="M0.113861 0H22.9999V4.28425L4.32671 22.9997L0 18.7154L12.7524 6.08815L0.113861 6.20089V0Z"></path>
                                                <path d="M23 22.9996V8.56848L16.8516 14.6566V22.9996H23Z"></path>
                                            </g>
                                        </svg>
                                        <span></span>
                                    </a>
                                <?php endif; ?>
                            </div>
                        </div>
                    <?php endif; ?>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="swiper home5-project-slider mb-70">
                                <div class="swiper-wrapper">
                                    <?php
                                    while ($query->have_posts()) :
                                        $query->the_post();
                                    ?>
                                        <div class="swiper-slide">
                                            <div class="project-card3">
                                                <?php if (has_post_thumbnail()) : ?>
                                                    <a href="<?php the_permalink(); ?>" class="project-img">
                                                        <?php the_post_thumbnail(); ?>
                                                    </a>
                                                <?php endif; ?>
                                                <div class="project-content">
                                                    <span><?php
                                                            $data = Egns_Helper::egns_project_value('project_info_list');
                                                            if (!empty($data) && isset($data[0]['project_label_text']) && isset($data[0]['project_content_text'])) { ?>
                                                            <?php echo esc_html($data[0]['project_label_text']); ?> <?php echo esc_html($data[0]['project_content_text']); ?>
                                                        <?php }
                                                        ?></span>
                                                    <h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endwhile;
                                    wp_reset_postdata(); ?>

                                </div>
                            </div>
                            <div class="progress-pagination"></div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>

        <?php if ($settings['matrik_project_genaral_style_selection'] == 'style_six') : ?>
            <div class="home6-project-section">
                <?php if ($settings['matrik_project_genaral_header_switcher'] == 'yes') : ?>
                    <div class="container">
                        <div class="row justify-content-center mb-70 wow animate fadeInDown" data-wow-delay="200ms" data-wow-duration="1500ms">
                            <div class="col-lg-8">
                                <div class="section-title five text-center">
                                    <?php if (!empty($settings['matrik_project_genaral_subtitle'])) : ?>
                                        <span><?php echo esc_html($settings['matrik_project_genaral_subtitle']); ?></span>
                                    <?php endif; ?>
                                    <?php if (!empty($settings['matrik_project_genaral_title'])) : ?>
                                        <h2><?php echo esc_html($settings['matrik_project_genaral_title']); ?></h2>
                                    <?php endif; ?>
                                    <?php if (!empty($settings['matrik_project_genaral_description'])) : ?>
                                        <p><?php echo esc_html($settings['matrik_project_genaral_description']); ?></p>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
                <div class="project-slider-area mb-50">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="swiper home6-project-slider">
                                    <div class="swiper-wrapper">
                                        <?php
                                        while ($query->have_posts()) :
                                            $query->the_post();
                                        ?>
                                            <div class="swiper-slide">
                                                <div class="project-card4">
                                                    <?php if (has_post_thumbnail()) : ?>
                                                        <div class="project-img">
                                                            <?php the_post_thumbnail(); ?>
                                                        </div>
                                                    <?php endif; ?>
                                                    <div class="project-content-wrap">
                                                        <a href="<?php the_permalink(); ?>" class="arrow-vector">
                                                            <svg width="45" height="45" viewBox="0 0 45 45" xmlns="http://www.w3.org/2000/svg">
                                                                <g>
                                                                    <path d="M0.222775 0H45.0006V8.38239L8.46546 45.0002L0 36.6178L24.9508 11.9118L0.222775 12.1324V0Z" />
                                                                    <path d="M45.0006 44.9998V16.7644L32.9707 28.6762V44.9998H45.0006Z" />
                                                                </g>
                                                            </svg>
                                                        </a>
                                                        <div class="project-content">
                                                            <h4>
                                                                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                                            </h4>
                                                            <ul class="tag-list">
                                                                <?php
                                                                $post_categories = get_the_terms(get_the_ID(), 'project-category');
                                                                if ($post_categories && !is_wp_error($post_categories)) :
                                                                    foreach ($post_categories as $category) :
                                                                ?>
                                                                        <li><a href="<?php echo esc_url(get_term_link($category)); ?>"><?php echo esc_html($category->name); ?></a></li>
                                                                <?php
                                                                    endforeach;
                                                                endif;
                                                                ?>
                                                            </ul>
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

                <div class="container wow animate fadeInUp" data-wow-delay="200ms" data-wow-duration="1500ms">
                    <div class="btn-area">

                        <?php if (!empty($settings['matrik_project_genaral_button_text'])) : ?>
                            <a class="primary-btn6" href="<?php echo esc_url($settings['matrik_project_genaral_button_text_url']['url']); ?>">
                                <?php echo esc_html($settings['matrik_project_genaral_button_text']); ?>
                                <svg width="28" height="28" viewBox="0 0 28 28" xmlns="http://www.w3.org/2000/svg">
                                    <g>
                                        <path
                                            d="M14.1952 0.936056L27.5226 14.2634L25.0277 16.7583L3.25495 16.7829L3.23022 11.7684L18.0098 11.8413L10.5842 4.54707L14.1952 0.936056Z" />
                                        <path d="M14.1298 27.657L22.5336 19.2532L15.4078 19.218L10.5493 24.0765L14.1298 27.657Z" />
                                    </g>
                                </svg>
                            </a>
                        <?php endif; ?>

                        <div class="slider-btn-grp four">
                            <div class="slider-btn project-slider-prev">
                                <i class="bi bi-arrow-left"></i>
                            </div>
                            <div class="slider-btn project-slider-next">
                                <i class="bi bi-arrow-right"></i>
                            </div>
                        </div>

                    </div>
                </div>



            </div>
        <?php endif; ?>



<?php

    }
}

Plugin::instance()->widgets_manager->register(new Matrik_Project_Widget());
