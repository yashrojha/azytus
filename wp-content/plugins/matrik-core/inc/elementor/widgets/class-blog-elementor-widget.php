<?php

namespace Elementor;

if (!defined('ABSPATH')) exit;  // Exit if accessed directly

use Elementor\core\Schemes;
use Egns_Core\Egns_Helper;

class Matrik_Blog_Widget extends Widget_Base
{

    public function get_name()
    {
        return 'matrik_blog';
    }

    public function get_title()
    {
        return esc_html__('EG Blog', 'matrik-core');
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
            'matrik_blog_genaral',
            [
                'label' => esc_html__('General', 'matrik-core')
            ]
        );

        $this->add_control(
            'matrik_blog_genaral_style_selection',
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
            'matrik_blog_genaral_header_switcher',
            [
                'label' => esc_html__("Show Header Area?", 'matrik-core'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Enable', 'matrik-core'),
                'label_off' => esc_html__('Disable', 'matrik-core'),
                'return_value' => 'yes',
                'default' => 'yes',
                'matrik_blog_genaral_style_selection' => ['style_one', 'style_two', 'style_three', 'style_four', 'style_six'],
            ]
        );

        $this->add_control(
            'matrik_blog_genaral_header_area',
            [
                'label'     => esc_html__('Header Area', 'matrik-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
                'condition' => [
                    'matrik_blog_genaral_header_switcher' => ['yes'],
                    'matrik_blog_genaral_style_selection' => ['style_one', 'style_two', 'style_three', 'style_four', 'style_five'],
                ]
            ]
        );

        $this->add_control(
            'matrik_blog_genaral_subtitle',
            [
                'label'       => esc_html__('Header Subtitle', 'matrik-core'),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default'     => esc_html__('Our Blog & Article', 'matrik-core'),
                'placeholder' => esc_html__('write your subtitle here', 'matrik-core'),
                'label_block' => true,
                'condition' => [
                    'matrik_blog_genaral_header_switcher' => ['yes'],
                    'matrik_blog_genaral_style_selection' => ['style_one', 'style_two', 'style_five', 'style_six'],
                ]
            ]
        );

        $this->add_control(
            'matrik_blog_genaral_title',
            [
                'label'       => esc_html__('Header Title', 'matrik-core'),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default'     => esc_html__('Factory Trends & Updates', 'matrik-core'),
                'placeholder' => esc_html__('write your title here', 'matrik-core'),
                'label_block' => true,
                'condition' => [
                    'matrik_blog_genaral_header_switcher' => ['yes'],
                    'matrik_blog_genaral_style_selection' => ['style_one', 'style_two', 'style_three', 'style_four', 'style_five', 'style_six'],
                ]
            ]
        );

        $this->add_control(
            'matrik_blog_genaral_description',
            [
                'label'       => esc_html__('Header Description', 'matrik-core'),
                'type'        => \Elementor\Controls_Manager::TEXTAREA,
                'default'     => esc_html__('Sed nisl eros, condimentum nec risus sit amet, finibus conguese.Fusen fringilla est libero sed tempus urna feugiat eu. Curabitur eu feugiat ligu Suspendisse.', 'matrik-core'),
                'placeholder' => esc_html__('write your description here', 'matrik-core'),
                'label_block' => true,
                'condition' => [
                    'matrik_blog_genaral_header_switcher' => ['yes'],
                    'matrik_blog_genaral_style_selection' => ['style_six'],
                ]
            ]
        );

        $this->add_control(
            'matrik_blog_genaral_header_button_text',
            [
                'label'       => esc_html__('Button Text', 'matrik-core'),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default'     => esc_html__('View All Blogs', 'matrik-core'),
                'placeholder' => esc_html__('write your button text here', 'matrik-core'),
                'label_block' => true,
                'condition' => [
                    'matrik_blog_genaral_header_switcher' => ['yes'],
                    'matrik_blog_genaral_style_selection' => ['style_two', 'style_four', 'style_five', 'style_six'],
                ]
            ]
        );

        $this->add_control(
            'matrik_blog_genaral_header_button_text_url',
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
                    'matrik_blog_genaral_header_switcher' => ['yes'],
                    'matrik_blog_genaral_style_selection' => ['style_two', 'style_four', 'style_five', 'style_six'],
                ]
            ]
        );

        $this->add_control(
            'matrik_blog_genaral_show_pagination_switcher',
            [
                'label' => esc_html__("Show Pagination?", 'matrik-core'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Enable', 'matrik-core'),
                'label_off' => esc_html__('Disable', 'matrik-core'),
                'return_value' => 'yes',
                'default' => 'yes',
                'condition' => [
                    'matrik_blog_genaral_style_selection' => ['style_one', 'style_three'],
                ]
            ]
        );

        $this->add_control(
            'matrik_blog_genaral_query_area',
            [
                'label'     => esc_html__('Query Area', 'matrik-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_control(
            'matrik_blog_genaral_query_post_per_page',
            [
                'label'       => esc_html__('Posts Per Page', 'matrik-core'),
                'type'        => Controls_Manager::NUMBER,
                'default'     => 6,
                'label_block' => false,
            ]
        );

        $this->add_control(
            'blog_post_list',
            [
                'label'       => __('Post Lists', 'matrik-core'),
                'type'        => \Elementor\Controls_Manager::SELECT2,
                'label_block' => true,
                'multiple'    => true,
                'options'     => \Egns_Core\Egns_Helper::get_blog_post_options(),
            ]
        );

        $this->add_control(
            'selected_categories',
            [
                'label'       => __('Categories', 'matrik-core'),
                'type'        => \Elementor\Controls_Manager::SELECT2,
                'label_block' => true,
                'multiple'    => true,
                'options'     => \Egns_Core\Egns_Helper::get_blog_categories(),
            ]
        );

        $this->add_control(
            'matrik_blog_genaral_query_orderby',
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
            'matrik_blog_genaral_query_template_order',
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
            'matrik_blog_genaral_query_blog_button',
            [
                'label'       => esc_html__('Button Text', 'matrik-core'),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default'     => esc_html__('Read More', 'matrik-core'),
                'placeholder' => esc_html__('write your button text here', 'matrik-core'),
                'label_block' => true,
                'condition' => [
                    'matrik_blog_genaral_style_selection' => ['style_one', 'style_two', 'style_three', 'style_four', 'style_six',],
                ]
            ]
        );


        $this->add_control(
            'matrik_blog_genaral_bottom_button_text',
            [
                'label'       => esc_html__('Bottom Button Text', 'matrik-core'),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default'     => esc_html__('View All Blogs', 'matrik-core'),
                'placeholder' => esc_html__('write your button text here', 'matrik-core'),
                'label_block' => true,
                'condition' => [
                    'matrik_blog_genaral_style_selection' => ['style_three'],
                ]
            ]
        );

        $this->add_control(
            'matrik_blog_genaral_bottom_button_text_url',
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
                    'matrik_blog_genaral_style_selection' => ['style_three'],
                ]
            ]
        );

        $this->end_controls_section();

        //style start

        $this->start_controls_section(
            'matrik_blog_style_one_genaral',
            [
                'label'     => esc_html__('Styles', 'matrik-core'),
                'tab'       => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'matrik_blog_genaral_style_selection' => ['style_one'],
                ]
            ]
        );

        $this->add_control(
            'matrik_blog_style_one_genaral_subtitle',
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
                'name'     => 'matrik_blog_style_one_genaral_subtitle_typ',
                'selector' => '{{WRAPPER}} .section-title > span',

            ]
        );

        $this->add_control(
            'matrik_blog_style_one_genaral_subtitle_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .section-title > span' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_blog_style_one_genaral_subtitle_icon_color',
            [
                'label'     => esc_html__('Icon Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .section-title > span::after' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_blog_style_one_genaral_title',
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
                'name'     => 'matrik_blog_style_one_genaral_title_typ',
                'selector' => '{{WRAPPER}} .section-title h2',

            ]
        );

        $this->add_control(
            'matrik_blog_style_one_genaral_title_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .section-title h2' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_blog_style_one_genaral_pagination',
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
                'name'     => 'matrik_blog_style_one_genaral_pagination_typ',
                'selector' => '{{WRAPPER}} .slider-btn-grp .slider-btn i',

            ]
        );

        $this->add_control(
            'matrik_blog_style_one_genaral_pagination_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .slider-btn-grp .slider-btn i' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_blog_style_one_genaral_pagination_hover_color',
            [
                'label'     => esc_html__('Hover Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .slider-btn-grp .slider-btn:hover i' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_blog_style_one_genaral_pagination_background_color',
            [
                'label'     => esc_html__('Background Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .slider-btn-grp .slider-btn' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_blog_style_one_genaral_pagination_background_hover_color',
            [
                'label'     => esc_html__('Hover Background Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .slider-btn-grp .slider-btn:hover' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_blog_style_one_genaral_pagination_border_color',
            [
                'label'     => esc_html__('Border Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .slider-btn-grp .slider-btn' => 'border: 1px solid {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_blog_style_one_genaral_pagination_border_hover_color',
            [
                'label'     => esc_html__('Hover Border Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .slider-btn-grp .slider-btn:hover' => 'border-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_blog_style_one_genaral_blog_date',
            [
                'label'     => esc_html__('Blog Date', 'matrik-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'matrik-core'),
                'name'     => 'matrik_blog_style_one_genaral_blog_date_typ',
                'selector' => '{{WRAPPER}} .blog-card .blog-meta ul li a.blog-date',

            ]
        );

        $this->add_control(
            'matrik_blog_style_one_genaral_blog_date_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .blog-card .blog-meta ul li a.blog-date' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_blog_style_one_genaral_blog_date_hover_color',
            [
                'label'     => esc_html__('Hover Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .blog-card .blog-meta ul li a.blog-date:hover' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_blog_style_one_genaral_blog_separator',
            [
                'label'     => esc_html__('Info Separator', 'matrik-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_control(
            'matrik_blog_style_one_genaral_blog_separator_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .blog-card .blog-meta ul li::before' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_blog_style_one_genaral_blog_category',
            [
                'label'     => esc_html__('Blog Category', 'matrik-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'matrik-core'),
                'name'     => 'matrik_blog_style_one_genaral_blog_category_typ',
                'selector' => '{{WRAPPER}} .blog-card .blog-meta ul li a',

            ]
        );

        $this->add_control(
            'matrik_blog_style_one_genaral_blog_category_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .blog-card .blog-meta ul li a' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_blog_style_one_genaral_blog_category_hover_color',
            [
                'label'     => esc_html__('Hover Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .blog-card .blog-meta ul li a:hover' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_blog_style_one_genaral_blog_title',
            [
                'label'     => esc_html__('Blog Title', 'matrik-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'matrik-core'),
                'name'     => 'matrik_blog_style_one_genaral_blog_title_typ',
                'selector' => '{{WRAPPER}} .blog-card .blog-content h5 a',

            ]
        );

        $this->add_control(
            'matrik_blog_style_one_genaral_blog_title_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .blog-card .blog-content h5 a' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_blog_style_one_genaral_blog_title_hover_color',
            [
                'label'     => esc_html__('Hover Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .blog-card .blog-content h5 a:hover' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_blog_style_one_genaral_blog_button',
            [
                'label'     => esc_html__('Blog Button', 'matrik-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'matrik-core'),
                'name'     => 'matrik_blog_style_one_genaral_blog_button_typ',
                'selector' => '{{WRAPPER}} .blog-card .read-btn',

            ]
        );

        $this->add_control(
            'matrik_blog_style_one_genaral_blog_button_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .blog-card .read-btn' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_blog_style_one_genaral_blog_button_hover_color',
            [
                'label'     => esc_html__('Hover Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .blog-card .read-btn:hover' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_blog_style_one_genaral_blog_button_icon_color',
            [
                'label'     => esc_html__('Icon Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .blog-card .read-btn svg' => 'fill: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_blog_style_one_genaral_blog_button_hover_icon_color',
            [
                'label'     => esc_html__('Hover Icon Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .blog-card .read-btn:hover svg' => 'fill: {{VALUE}};',
                ],
            ]
        );


        $this->end_controls_section();

        //style start

        $this->start_controls_section(
            'matrik_blog_style_three_genaral',
            [
                'label'     => esc_html__('Styles', 'matrik-core'),
                'tab'       => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'matrik_blog_genaral_style_selection' => ['style_three'],
                ]
            ]
        );

        $this->add_control(
            'matrik_blog_style_three_genaral_title',
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
                'name'     => 'matrik_blog_style_three_genaral_title_typ',
                'selector' => '{{WRAPPER}} .section-title.two h2',

            ]
        );

        $this->add_control(
            'matrik_blog_style_three_genaral_title_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .section-title.two h2' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_blog_style_three_genaral_blog_card_one',
            [
                'label'     => esc_html__('Card One', 'matrik-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'matrik_blog_style_three_genaral_blog_card_one_blog_date',
            [
                'label'     => esc_html__('Blog Date', 'matrik-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'matrik-core'),
                'name'     => 'matrik_blog_style_three_genaral_blog_card_one_blog_date_typ',
                'selector' => '{{WRAPPER}} .blog-card2 .blog-content-wrap .blog-date',

            ]
        );

        $this->add_control(
            'matrik_blog_style_three_genaral_blog_card_one_blog_date_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .blog-card2 .blog-content-wrap .blog-date' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_blog_style_three_genaral_blog_card_one_blog_date_hover_color',
            [
                'label'     => esc_html__('Hover Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .blog-card2 .blog-content-wrap .blog-date:hover' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_blog_style_three_genaral_blog_card_one_blog_date_bg_color',
            [
                'label'     => esc_html__('Background Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .blog-card2 .blog-content-wrap .blog-date' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_blog_style_three_genaral_blog_card_one_blog_date_hover_bg_color',
            [
                'label'     => esc_html__('Hover Background Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .blog-card2 .blog-content-wrap .blog-date:hover' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_blog_style_three_genaral_blog_card_one_blog_title',
            [
                'label'     => esc_html__('Blog Title', 'matrik-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'matrik-core'),
                'name'     => 'matrik_blog_style_three_genaral_blog_card_one_blog_title_typ',
                'selector' => '{{WRAPPER}} .blog-card2 .blog-content-wrap .blog-content h4 a',

            ]
        );

        $this->add_control(
            'matrik_blog_style_three_genaral_blog_card_one_blog_title_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .blog-card2 .blog-content-wrap .blog-content h4 a' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_blog_style_three_genaral_blog_card_one_blog_title_hover_color',
            [
                'label'     => esc_html__('Hover Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .blog-card2 .blog-content-wrap .blog-content h4 a:hover' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_blog_style_three_genaral_blog_card_one_blog_button',
            [
                'label'     => esc_html__('Blog Button', 'matrik-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'matrik-core'),
                'name'     => 'matrik_blog_style_three_genaral_blog_card_one_blog_button_typ',
                'selector' => '{{WRAPPER}} .blog-card2 .blog-content-wrap .blog-content .details-btn',

            ]
        );

        $this->add_control(
            'matrik_blog_style_three_genaral_blog_card_one_blog_button_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .blog-card2 .blog-content-wrap .blog-content .details-btn' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_blog_style_three_genaral_blog_card_one_blog_button_icon_color',
            [
                'label'     => esc_html__('Icon Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .blog-card2 .blog-content-wrap .blog-content .details-btn svg' => 'fill: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_blog_style_three_genaral_blog_card_two',
            [
                'label'     => esc_html__('Card Two', 'matrik-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'matrik_blog_style_three_genaral_blog_card_two_blog_date',
            [
                'label'     => esc_html__('Blog Date', 'matrik-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'matrik-core'),
                'name'     => 'matrik_blog_style_three_genaral_blog_card_two_blog_date_typ',
                'selector' => '{{WRAPPER}} .blog-card.three .blog-img-wrap .blog-date',

            ]
        );

        $this->add_control(
            'matrik_blog_style_three_genaral_blog_card_two_blog_date_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .blog-card.three .blog-img-wrap .blog-date' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_blog_style_three_genaral_blog_card_two_blog_date_bg_color',
            [
                'label'     => esc_html__('Background Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .blog-card.three .blog-img-wrap .blog-date' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_blog_style_three_genaral_blog_card_two_blog_title',
            [
                'label'     => esc_html__('Blog Title', 'matrik-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'matrik-core'),
                'name'     => 'matrik_blog_style_three_genaral_blog_card_two_blog_title_typ',
                'selector' => '{{WRAPPER}} .blog-card .blog-content h5 a',

            ]
        );

        $this->add_control(
            'matrik_blog_style_three_genaral_blog_card_two_blog_title_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .blog-card .blog-content h5 a' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_blog_style_three_genaral_blog_card_two_blog_title_hover_color',
            [
                'label'     => esc_html__('Hover Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .blog-card.three .blog-content h5 a:hover' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_blog_style_three_genaral_blog_card_two_blog_button',
            [
                'label'     => esc_html__('Blog Button', 'matrik-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'matrik-core'),
                'name'     => 'matrik_blog_style_three_genaral_blog_card_two_blog_button_typ',
                'selector' => '{{WRAPPER}} .blog-card .read-btn',

            ]
        );

        $this->add_control(
            'matrik_blog_style_three_genaral_blog_card_two_blog_button_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .blog-card .read-btn' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_blog_style_three_genaral_blog_card_two_blog_button_hover_color',
            [
                'label'     => esc_html__('Hover Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .blog-card.three .blog-content .read-btn:hover' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_blog_style_three_genaral_blog_card_two_blog_button_icon_color',
            [
                'label'     => esc_html__('Icon Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .blog-card .read-btn svg' => 'fill: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_blog_style_three_genaral_blog_card_two_blog_button_icon_hover_color',
            [
                'label'     => esc_html__('Icon Hover Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .blog-card.three .blog-content .read-btn:hover svg' => 'fill: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_blog_style_three_genaral_blog_card_two_bottom_button',
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
                'name'     => 'matrik_blog_style_three_genaral_blog_card_two_bottom_button_typ',
                'selector' => '{{WRAPPER}} .home3-blog-section .view-all-btn',

            ]
        );

        $this->add_control(
            'matrik_blog_style_three_genaral_blog_card_two_bottom_button_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home3-blog-section .view-all-btn' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_blog_style_three_genaral_blog_card_two_bottom_button_hover_color',
            [
                'label'     => esc_html__('Hover Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home3-blog-section .view-all-btn:hover' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_blog_style_three_genaral_blog_card_two_bottom_button_icon_color',
            [
                'label'     => esc_html__('Icon Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home3-blog-section .view-all-btn svg' => 'fill: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_blog_style_three_genaral_blog_card_two_bottom_button_icon_hover_color',
            [
                'label'     => esc_html__('Icon Hover Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home3-blog-section .view-all-btn:hover svg' => 'fill: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_blog_style_three_genaral_blog_card_two_pagination',
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
                'name'     => 'matrik_blog_style_three_genaral_blog_card_two_pagination_typ',
                'selector' => '{{WRAPPER}} .slider-btn-grp .slider-btn i',

            ]
        );

        $this->add_control(
            'matrik_blog_style_three_genaral_blog_card_two_pagination_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .slider-btn-grp .slider-btn i' => 'color: {{VALUE}};',
                ],
            ]
        );


        $this->add_control(
            'matrik_blog_style_three_genaral_blog_card_two_pagination_hover_color',
            [
                'label'     => esc_html__('Hover Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .slider-btn-grp .slider-btn:hover i' => 'color: {{VALUE}};',
                ],
            ]
        );


        $this->add_control(
            'matrik_blog_style_three_genaral_blog_card_two_pagination_border_color',
            [
                'label'     => esc_html__('Border Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .slider-btn-grp .slider-btn' => 'border: 1px solid {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_blog_style_three_genaral_blog_card_two_pagination_hover_border_color',
            [
                'label'     => esc_html__('Hover Border Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .slider-btn-grp.two .slider-btn:hover' => 'border-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_blog_style_three_genaral_blog_card_two_pagination_bg_color',
            [
                'label'     => esc_html__('Background Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .slider-btn-grp .slider-btn' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_blog_style_three_genaral_blog_card_two_pagination_hover_bg_color',
            [
                'label'     => esc_html__('Hover Background Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .slider-btn-grp.two .slider-btn:hover' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section();

        //style start

        $this->start_controls_section(
            'matrik_blog_style_four_genaral',
            [
                'label'     => esc_html__('Styles', 'matrik-core'),
                'tab'       => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'matrik_blog_genaral_style_selection' => ['style_four'],
                ]
            ]
        );

        $this->add_control(
            'matrik_blog_style_four_genaral_blog_card',
            [
                'label'     => esc_html__('Blog Card', 'matrik-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_control(
            'matrik_blog_style_four_genaral_blog_card_color',
            [
                'label'     => esc_html__('Card Background Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .blog-card3' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_blog_style_four_genaral_blog_card_border_color',
            [
                'label'     => esc_html__('Card Border Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .blog-card3' => 'border: 1px solid {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_blog_style_four_genaral_title',
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
                'name'     => 'matrik_blog_style_four_genaral_title_typ',
                'selector' => '{{WRAPPER}} .section-title.three h2',

            ]
        );

        $this->add_control(
            'matrik_blog_style_four_genaral_title_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .section-title.three h2' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_blog_style_four_genaral_button',
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
                'name'     => 'matrik_blog_style_four_genaral_button_typ',
                'selector' => '{{WRAPPER}} .primary-btn4.transparent',

            ]
        );

        $this->add_control(
            'matrik_blog_style_four_genaral_button_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .primary-btn4.transparent' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_blog_style_four_genaral_button_hover_color',
            [
                'label'     => esc_html__('Hover Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .primary-btn4.transparent:hover' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_blog_style_four_genaral_button_icon_color',
            [
                'label'     => esc_html__('Icon Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .primary-btn4 .arrow' => 'fill: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_blog_style_four_genaral_button_icon_hover_color',
            [
                'label'     => esc_html__('Hover Icon Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .primary-btn4.transparent:hover .arrow' => 'fill: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_blog_style_four_genaral_button_border_color',
            [
                'label'     => esc_html__('Border Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .primary-btn4.transparent' => 'border: 1px solid {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_blog_style_four_genaral_button_border_hover_color',
            [
                'label'     => esc_html__('Hover Border Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .primary-btn4.transparent:hover' => 'border: 1px solid {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_blog_style_four_genaral_button_bg_color',
            [
                'label'     => esc_html__('Background Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .primary-btn4.transparent' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_blog_style_four_genaral_button_bg_hover_color',
            [
                'label'     => esc_html__('Hover Background Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .primary-btn4.transparent > span' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_blog_style_four_genaral_blog_comment',
            [
                'label'     => esc_html__('Blog Comment', 'matrik-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'matrik-core'),
                'name'     => 'matrik_blog_style_four_genaral_blog_comment_typ',
                'selector' => '{{WRAPPER}} .blog-card3 .blog-meta ul li',

            ]
        );

        $this->add_control(
            'matrik_blog_style_four_genaral_blog_comment_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .blog-card3 .blog-meta ul li' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_blog_style_four_genaral_blog_category',
            [
                'label'     => esc_html__('Blog Category', 'matrik-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'matrik-core'),
                'name'     => 'matrik_blog_style_four_genaral_blog_category_typ',
                'selector' => '{{WRAPPER}} .blog-card3 .blog-meta ul li a',

            ]
        );

        $this->add_control(
            'matrik_blog_style_four_genaral_blog_category_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .blog-card3 .blog-meta ul li a' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_blog_style_four_genaral_blog_category_hover_color',
            [
                'label'     => esc_html__('Hover Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .blog-card3 .blog-meta ul li a:hover' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_blog_style_four_genaral_blog_author_text',
            [
                'label'     => esc_html__('Blog Author Text', 'matrik-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'matrik-core'),
                'name'     => 'matrik_blog_style_four_genaral_blog_author_text_typ',
                'selector' => '{{WRAPPER}} .blog-card3 .author-area .author-content h6',

            ]
        );

        $this->add_control(
            'matrik_blog_style_four_genaral_blog_author_text_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .blog-card3 .author-area .author-content h6' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_blog_style_four_genaral_blog_author_name',
            [
                'label'     => esc_html__('Blog Author Name', 'matrik-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'matrik-core'),
                'name'     => 'matrik_blog_style_four_genaral_blog_author_name_typ',
                'selector' => '{{WRAPPER}} .blog-card3 .author-area .author-content h6 span',

            ]
        );

        $this->add_control(
            'matrik_blog_style_four_genaral_blog_author_name_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .blog-card3 .author-area .author-content h6 span' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_blog_style_four_genaral_blog_date',
            [
                'label'     => esc_html__('Blog Date', 'matrik-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'matrik-core'),
                'name'     => 'matrik_blog_style_four_genaral_blog_date_typ',
                'selector' => '{{WRAPPER}} .blog-card3 .author-area .author-content > span',

            ]
        );

        $this->add_control(
            'matrik_blog_style_four_genaral_blog_date_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .blog-card3 .author-area .author-content > span' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_blog_style_four_genaral_blog_title',
            [
                'label'     => esc_html__('Blog Title', 'matrik-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'matrik-core'),
                'name'     => 'matrik_blog_style_four_genaral_blog_title_typ',
                'selector' => '{{WRAPPER}} .blog-card3 h4 a',

            ]
        );

        $this->add_control(
            'matrik_blog_style_four_genaral_blog_title_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .blog-card3 h4 a' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_blog_style_four_genaral_blog_title_hover_color',
            [
                'label'     => esc_html__('Hover Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .blog-card3 h4 a:hover' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section();


        //style start

        $this->start_controls_section(
            'matrik_blog_style_five_genaral',
            [
                'label'     => esc_html__('Styles', 'matrik-core'),
                'tab'       => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'matrik_blog_genaral_style_selection' => ['style_five'],
                ]
            ]
        );

        $this->add_control(
            'matrik_blog_style_five_genaral_ssubtitle',
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
                'name'     => 'matrik_blog_style_five_genaral_ssubtitle_typ',
                'selector' => '{{WRAPPER}} .section-title.four span',

            ]
        );

        $this->add_control(
            'matrik_blog_style_five_genaral_ssubtitle_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .section-title.four span' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_blog_style_five_genaral_subtitle_icon_color',
            [
                'label'     => esc_html__('Icon Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .section-title.four span svg' => 'fill: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_blog_style_five_genaral_title',
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
                'name'     => 'matrik_blog_style_five_genaral_title_typ',
                'selector' => '{{WRAPPER}} .section-title.four h2',

            ]
        );

        $this->add_control(
            'matrik_blog_style_five_genaral_title_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .section-title.four h2' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_blog_style_five_genaral_button',
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
                'name'     => 'matrik_blog_style_five_genaral_button_typ',
                'selector' => '{{WRAPPER}} .primary-btn5',

            ]
        );

        $this->add_control(
            'matrik_blog_style_five_genaral_button_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .primary-btn5' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_blog_style_five_genaral_button_hover_color',
            [
                'label'     => esc_html__('Hover Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .primary-btn5:hover' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_blog_style_five_genaral_button_icon_color',
            [
                'label'     => esc_html__('Icon Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .primary-btn5 .arrow' => 'fill: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_blog_style_five_genaral_button_icon_hover_color',
            [
                'label'     => esc_html__('Icon Hover Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .primary-btn5:hover .arrow' => 'fill: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_blog_style_five_genaral_button_bg_color',
            [
                'label'     => esc_html__('Background Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .primary-btn5' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_blog_style_five_genaral_button_bg_hover_color',
            [
                'label'     => esc_html__('Hover Background Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .primary-btn5 > span' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_blog_style_five_genaral_card_one_area',
            [
                'label'     => esc_html__('Card One Area', 'matrik-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'matrik_blog_style_five_genaral_card_one_area_date',
            [
                'label'     => esc_html__('Date', 'matrik-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'matrik-core'),
                'name'     => 'matrik_blog_style_five_genaral_card_one_area_date_typ',
                'selector' => '{{WRAPPER}} .blog-card2 .blog-content-wrap .blog-date',

            ]
        );

        $this->add_control(
            'matrik_blog_style_five_genaral_card_one_area_date_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .blog-card2 .blog-content-wrap .blog-date' => 'color: {{VALUE}};',
                ],
            ]
        );


        $this->add_control(
            'matrik_blog_style_five_genaral_card_one_area_date_hover_color',
            [
                'label'     => esc_html__('Hover Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .blog-card2.two .blog-content-wrap .blog-date:hover' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_blog_style_five_genaral_card_one_area_date_bg_color',
            [
                'label'     => esc_html__('Background Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .blog-card2 .blog-content-wrap .blog-date' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_blog_style_five_genaral_card_one_area_date_bg_hover_color',
            [
                'label'     => esc_html__('Hover Background Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .blog-card2.two .blog-content-wrap .blog-date:hover' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_blog_style_five_genaral_card_one_area_title',
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
                'name'     => 'matrik_blog_style_five_genaral_card_one_area_title_typ',
                'selector' => '{{WRAPPER}} .blog-card2 .blog-content-wrap .blog-content h4 a',

            ]
        );

        $this->add_control(
            'matrik_blog_style_five_genaral_card_one_area_title_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .blog-card2 .blog-content-wrap .blog-content h4 a' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_blog_style_five_genaral_card_one_area_title_hover_color',
            [
                'label'     => esc_html__('Hover Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .blog-card2.two .blog-content-wrap .blog-content h4 a:hover' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_blog_style_five_genaral_card_one_area_title_bg_color',
            [
                'label'     => esc_html__('Background Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .blog-card2.two .blog-content-wrap .blog-content' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_blog_style_five_genaral_card_two_area',
            [
                'label'     => esc_html__('Card Two Area', 'matrik-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'matrik_blog_style_five_genaral_card_two_area_date',
            [
                'label'     => esc_html__('Date', 'matrik-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'matrik-core'),
                'name'     => 'matrik_blog_style_five_genaral_card_two_area_date_typ',
                'selector' => '{{WRAPPER}} .blog-card.four .blog-meta ul li a.blog-date',

            ]
        );

        $this->add_control(
            'matrik_blog_style_five_genaral_card_two_area_date_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .blog-card.four .blog-meta ul li a.blog-date' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_blog_style_five_genaral_card_two_area_date_hover_color',
            [
                'label'     => esc_html__('Hover Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .blog-card.four .blog-meta ul li a.blog-date:hover' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_blog_style_five_genaral_card_one_seperator_area',
            [
                'label'     => esc_html__('Seperator', 'matrik-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'matrik_blog_style_five_genaral_card_one_seperator_area_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .blog-card .blog-meta ul li::before' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_blog_style_five_genaral_card_two_area_category',
            [
                'label'     => esc_html__('Category', 'matrik-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'matrik-core'),
                'name'     => 'matrik_blog_style_five_genaral_card_two_area_category_typ',
                'selector' => '{{WRAPPER}} .blog-card .blog-meta ul li a',

            ]
        );

        $this->add_control(
            'matrik_blog_style_five_genaral_card_two_area_category_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .blog-card .blog-meta ul li a' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_blog_style_five_genaral_card_two_area_category_hover_color',
            [
                'label'     => esc_html__('Hover Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .blog-card.four .blog-meta ul li a:hover' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_blog_style_five_genaral_card_two_area_title',
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
                'name'     => 'matrik_blog_style_five_genaral_card_two_area_title_typ',
                'selector' => '{{WRAPPER}} .blog-card .blog-content h5 a',

            ]
        );

        $this->add_control(
            'matrik_blog_style_five_genaral_card_two_area_title_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .blog-card .blog-content h5 a' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_blog_style_five_genaral_card_two_area_title_hover_color',
            [
                'label'     => esc_html__('Hover Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .blog-card.four .blog-content h5 a:hover' => 'color: {{VALUE}};',
                ],
            ]
        );


        $this->end_controls_section();

        //style start

        $this->start_controls_section(
            'matrik_blog_style_two_genaral',
            [
                'label'     => esc_html__('Styles', 'matrik-core'),
                'tab'       => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'matrik_blog_genaral_style_selection' => ['style_two'],
                ]
            ]
        );

        $this->add_control(
            'matrik_blog_style_two_genaral_subtitle',
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
                'name'     => 'matrik_blog_style_two_genaral_subtitle_typ',
                'selector' => '{{WRAPPER}} .section-title.two span',

            ]
        );

        $this->add_control(
            'matrik_blog_style_two_genaral_subtitle_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .section-title.two span' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_blog_style_two_genaral_subtitle_bg_color',
            [
                'label'     => esc_html__('Background Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .section-title.two span' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_blog_style_two_genaral_title',
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
                'name'     => 'matrik_blog_style_two_genaral_title_typ',
                'selector' => '{{WRAPPER}} .section-title.two h2',

            ]
        );

        $this->add_control(
            'matrik_blog_style_two_genaral_title_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .section-title.two h2' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_blog_style_two_genaral_button',
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
                'name'     => 'matrik_blog_style_two_genaral_button_typ',
                'selector' => '{{WRAPPER}} .primary-btn3.transparent',

            ]
        );

        $this->add_control(
            'matrik_blog_style_two_genaral_button_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .primary-btn3.transparent' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_blog_style_two_genaral_button_hover_color',
            [
                'label'     => esc_html__('Hover Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .primary-btn3.transparent:hover' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_blog_style_two_genaral_button_icon_color',
            [
                'label'     => esc_html__('Icon Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .primary-btn3 .arrow' => 'fill: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_blog_style_two_genaral_button_hover_icon_color',
            [
                'label'     => esc_html__('Hover Icon Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .primary-btn3.transparent:hover .arrow' => 'fill: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_blog_style_two_genaral_button_border_color',
            [
                'label'     => esc_html__('Border Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .primary-btn3.transparent' => 'border: 1px solid {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_blog_style_two_genaral_button_bg_color',
            [
                'label'     => esc_html__('Background Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .primary-btn3.transparent' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_blog_style_two_genaral_button_hover_bg_color',
            [
                'label'     => esc_html__('Hover Background Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .primary-btn3.transparent::after' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_blog_style_two_genaral_blog_category',
            [
                'label'     => esc_html__('Blog Category', 'matrik-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'matrik-core'),
                'name'     => 'matrik_blog_style_two_genaral_blog_category_typ',
                'selector' => '{{WRAPPER}} .blog-card.two .blog-img-wrap .blog-tag a',

            ]
        );

        $this->add_control(
            'matrik_blog_style_two_genaral_blog_category_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .blog-card.two .blog-img-wrap .blog-tag a' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_blog_style_two_genaral_blog_category_hover_color',
            [
                'label'     => esc_html__('Hover Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .blog-card.two .blog-img-wrap .blog-tag a:hover' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_blog_style_two_genaral_blog_category_bg_color',
            [
                'label'     => esc_html__('Background Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .blog-card.two .blog-img-wrap .blog-tag a' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_blog_style_two_genaral_blog_category_hover_bg_color',
            [
                'label'     => esc_html__('Hover Background Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .blog-card.two .blog-img-wrap .blog-tag a:hover' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_blog_style_two_genaral_blog_date',
            [
                'label'     => esc_html__('Blog Date', 'matrik-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'matrik-core'),
                'name'     => 'matrik_blog_style_two_genaral_blog_date_typ',
                'selector' => '{{WRAPPER}} .blog-card.two .blog-meta ul li a.blog-date',

            ]
        );

        $this->add_control(
            'matrik_blog_style_two_genaral_blog_date_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .blog-card.two .blog-meta ul li a.blog-date' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_blog_style_two_genaral_blog_date_hover_color',
            [
                'label'     => esc_html__('Hover Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .blog-card.two .blog-meta ul li a.blog-date:hover' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_blog_style_two_genaral_blog_date_bg_color',
            [
                'label'     => esc_html__('Background Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .blog-card.two .blog-meta ul li a.blog-date' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_blog_style_two_genaral_blog_seperator',
            [
                'label'     => esc_html__('Blog Separator', 'matrik-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_control(
            'matrik_blog_style_two_genaral_blog_seperator_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .blog-card .blog-meta ul li::before' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_blog_style_two_genaral_blog_comment',
            [
                'label'     => esc_html__('Blog Comment', 'matrik-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'matrik-core'),
                'name'     => 'matrik_blog_style_two_genaral_blog_comment_typ',
                'selector' => '{{WRAPPER}} .blog-card.two .blog-meta ul li span',

            ]
        );

        $this->add_control(
            'matrik_blog_style_two_genaral_blog_comment_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .blog-card.two .blog-meta ul li span' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_blog_style_two_genaral_blog_comment_bg_color',
            [
                'label'     => esc_html__('Background Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .blog-card.two .blog-meta ul li span' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_blog_style_two_genaral_blog_title',
            [
                'label'     => esc_html__('Blog Title', 'matrik-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'matrik-core'),
                'name'     => 'matrik_blog_style_two_genaral_blog_title_typ',
                'selector' => '{{WRAPPER}} .blog-card .blog-content h5 a',

            ]
        );

        $this->add_control(
            'matrik_blog_style_two_genaral_blog_title_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .blog-card .blog-content h5 a' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_blog_style_two_genaral_blog_title_hover_color',
            [
                'label'     => esc_html__('Hover Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .blog-card.two .blog-content h5 a:hover' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_blog_style_two_genaral_blog_details_button',
            [
                'label'     => esc_html__('Blog Button', 'matrik-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'matrik-core'),
                'name'     => 'matrik_blog_style_two_genaral_blog_details_button_typ',
                'selector' => '{{WRAPPER}} .blog-card .read-btn',

            ]
        );

        $this->add_control(
            'matrik_blog_style_two_genaral_blog_details_button_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .blog-card .read-btn' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_blog_style_two_genaral_blog_details_button_hover_color',
            [
                'label'     => esc_html__('Hover Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .blog-card.two .blog-content .read-btn:hover' => 'color: {{VALUE}};',
                ],
            ]
        );


        $this->add_control(
            'matrik_blog_style_two_genaral_blog_details_button_icon_color',
            [
                'label'     => esc_html__('Icon Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .blog-card .read-btn svg' => 'fill: {{VALUE}};',
                ],
            ]
        );


        $this->add_control(
            'matrik_blog_style_two_genaral_blog_details_button_icon_hover_color',
            [
                'label'     => esc_html__('Hover Icon Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .blog-card.two .blog-content .read-btn:hover svg' => 'fill: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section();

        //style start

        $this->start_controls_section(
            'matrik_blog_style_six_genaral',
            [
                'label'     => esc_html__('Styles', 'matrik-core'),
                'tab'       => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'matrik_blog_genaral_style_selection' => ['style_six'],
                ]
            ]
        );

        $this->add_control(
            'matrik_blog_style_six_genaral_subtitle',
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
                'name'     => 'matrik_blog_style_six_genaral_subtitle_typ',
                'selector' => '{{WRAPPER}} .section-title.five > span',

            ]
        );

        $this->add_control(
            'matrik_blog_style_six_genaral_subtitle_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .section-title.five > span' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_blog_style_one_genaral_subtitle_iicon_color',
            [
                'label'     => esc_html__('Icon Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .section-title.five > span::after' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_blog_style_six_genaral_title',
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
                'name'     => 'matrik_blog_style_six_genaral_title_typ',
                'selector' => '{{WRAPPER}} .section-title h2',

            ]
        );

        $this->add_control(
            'matrik_blog_style_six_genaral_title_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .section-title h2' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_blog_style_six_genaral_description',
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
                'name'     => 'matrik_blog_style_six_genaral_description_typ',
                'selector' => '{{WRAPPER}} .section-title p',

            ]
        );

        $this->add_control(
            'matrik_blog_style_six_genaral_description_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .section-title p' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_blog_style_six_genaral_button',
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
                'name'     => 'matrik_blog_style_six_genaral_button_typ',
                'selector' => '{{WRAPPER}} .primary-btn6',

            ]
        );

        $this->add_control(
            'matrik_blog_style_six_genaral_button_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .primary-btn6' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_blog_style_six_genaral_button_hover_color',
            [
                'label'     => esc_html__('Hover Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .primary-btn6:hover' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_blog_style_six_genaral_button_bg_color',
            [
                'label'     => esc_html__('Background Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .primary-btn6' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_blog_style_six_genaral_button_hover_bg_color',
            [
                'label'     => esc_html__('Hover Background Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .primary-btn6::after' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_blog_style_six_genaral_blog_date',
            [
                'label'     => esc_html__('Blog Date', 'matrik-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'matrik-core'),
                'name'     => 'matrik_blog_style_six_genaral_blog_date_typ',
                'selector' => '{{WRAPPER}} .blog-card2 .blog-content-wrap .blog-date',

            ]
        );

        $this->add_control(
            'matrik_blog_style_six_genaral_blog_date_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .blog-card2 .blog-content-wrap .blog-date6' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_blog_style_six_genaral_blog_date_hover_color',
            [
                'label'     => esc_html__('Hover Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .blog-card2 .blog-content-wrap .blog-date:hover' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_blog_style_six_genaral_blog_date_bg_color',
            [
                'label'     => esc_html__('Background Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .blog-card2 .blog-content-wrap .blog-date' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_blog_style_six_genaral_blog_date_bg_hover_color',
            [
                'label'     => esc_html__('Hover Background Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .blog-card2.three .blog-content-wrap .blog-date:hover' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_blog_style_six_genaral_blog_title',
            [
                'label'     => esc_html__('Blog Title', 'matrik-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'matrik-core'),
                'name'     => 'matrik_blog_style_six_genaral_blog_title_typ',
                'selector' => '{{WRAPPER}} .blog-card2 .blog-content-wrap .blog-content h4 a',

            ]
        );

        $this->add_control(
            'matrik_blog_style_six_genaral_blog_title_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .blog-card2 .blog-content-wrap .blog-content h4 a' => 'color: {{VALUE}};',
                ],
            ]
        );


        $this->add_control(
            'matrik_blog_style_six_genaral_blog_title_hover_color',
            [
                'label'     => esc_html__('Hover Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}}.blog-card2.three .blog-content-wrap .blog-content h4 a:hover' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_blog_style_six_genaral_blog_button',
            [
                'label'     => esc_html__('Blog Button', 'matrik-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'matrik-core'),
                'name'     => 'matrik_blog_style_six_genaral_blog_button_typ',
                'selector' => '{{WRAPPER}} .blog-card2.three .blog-content-wrap .blog-content .details-btn',

            ]
        );

        $this->add_control(
            'matrik_blog_style_six_genaral_blog_button_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .blog-card2.three .blog-content-wrap .blog-content .details-btn' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_blog_style_six_genaral_blog_button_icon_color',
            [
                'label'     => esc_html__('Icon Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .blog-card2.three .blog-content-wrap .blog-content .details-btn svg' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section();
    }
    protected function render()
    {

        $settings = $this->get_settings_for_display();
        $selected_category_ids = $settings['selected_categories'];

        $selected_post_ids     = $settings['blog_post_list'];
        $args                  = array(
            'post_type'      => 'post',
            'posts_per_page' => $settings['matrik_blog_genaral_query_post_per_page'],
            'orderby'        => $settings['matrik_blog_genaral_query_orderby'],
            'order'          => $settings['matrik_blog_genaral_query_template_order'],
            'offset'         => 0,
            'post_status'    => 'publish',
        );

        if (!empty($selected_category_ids)) {
            $args['tax_query'] = array(
                array(
                    'taxonomy' => 'category',
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
                var swiper = new Swiper(".home1-blog-slider", {
                    slidesPerView: 1,
                    speed: 1500,
                    spaceBetween: 24,
                    autoplay: {
                        delay: 2500,
                        disableOnInteraction: false,
                    },
                    navigation: {
                        nextEl: ".blog-slider-next",
                        prevEl: ".blog-slider-prev",
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
                            spaceBetween: 20,
                        },
                        1400: {
                            slidesPerView: 3,
                        },
                    },
                });

                var swiper = new Swiper(".home3-blog-slider", {
                    slidesPerView: 1,
                    speed: 1500,
                    spaceBetween: 24,
                    autoplay: {
                        delay: 2500, // Autoplay duration in milliseconds
                        disableOnInteraction: false,
                    },
                    navigation: {
                        nextEl: ".blog-slider-next",
                        prevEl: ".blog-slider-prev",
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
                            spaceBetween: 15,
                        },
                        1200: {
                            slidesPerView: 2,
                            spaceBetween: 20,
                        },
                        1400: {
                            slidesPerView: 2,
                        },
                    },
                });
            </script>
        <?php endif; ?>


        <?php if ($settings['matrik_blog_genaral_style_selection'] == 'style_one') : ?>
            <div class="home1-blog-section">
                <div class="container">
                    <div class="row g-4 align-items-end justify-content-between mb-70 wow animate fadeInDown" data-wow-delay="200ms" data-wow-duration="1500ms">
                        <?php if ($settings['matrik_blog_genaral_header_switcher'] == 'yes') : ?>
                            <div class="col-lg-5">
                                <div class="section-title">
                                    <?php if (!empty($settings['matrik_blog_genaral_subtitle'])) : ?>
                                        <span><?php echo esc_html($settings['matrik_blog_genaral_subtitle']); ?></span>
                                    <?php endif; ?>
                                    <?php if (!empty($settings['matrik_blog_genaral_title'])) : ?>
                                        <h2><?php echo esc_html($settings['matrik_blog_genaral_title']); ?></h2>
                                    <?php endif; ?>
                                </div>
                            </div>
                        <?php endif; ?>
                        <?php if ($settings['matrik_blog_genaral_show_pagination_switcher'] == 'yes') : ?>
                            <div class="col-lg-3 d-flex justify-content-lg-end">
                                <div class="slider-btn-grp">
                                    <div class="slider-btn blog-slider-prev">
                                        <i class="bi bi-arrow-left"></i>
                                    </div>
                                    <div class="slider-btn blog-slider-next">
                                        <i class="bi bi-arrow-right"></i>
                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="swiper home1-blog-slider">
                                <div class="swiper-wrapper">
                                    <?php
                                    while ($query->have_posts()) :
                                        $query->the_post();
                                        $post_category = get_the_category()[0]->name;
                                    ?>
                                        <div class="swiper-slide">
                                            <div class="blog-card">
                                                <div class="blog-img-wrap">
                                                    <?php if (has_post_thumbnail()) : ?>
                                                        <a class="blog-img" href="<?php the_permalink(); ?>">
                                                            <?php the_post_thumbnail(); ?>
                                                        </a>
                                                    <?php endif; ?>
                                                    <div class="blog-meta">
                                                        <ul>
                                                            <li><a class="blog-date" href="<?php echo esc_url(home_url(get_the_date('Y/m/d'))) ?>"><?php echo get_the_date("j M, Y"); ?></a></li>
                                                            <?php $categories = get_the_category(); ?>
                                                            <?php if (!empty($categories)) : ?>
                                                                <li><a href="<?php echo esc_url(get_category_link($categories[0]->cat_ID)) ?>"><?php echo esc_html($post_category); ?></a></li>
                                                            <?php endif; ?>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="blog-content">
                                                    <h5><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
                                                    <?php if (!empty($settings['matrik_blog_genaral_query_blog_button'])) : ?>
                                                        <a href="<?php the_permalink(); ?>" class="read-btn">
                                                            <span><?php echo esc_html($settings['matrik_blog_genaral_query_blog_button']); ?></span>
                                                            <svg width="15" height="15" viewBox="0 0 15 15" xmlns="http://www.w3.org/2000/svg">
                                                                <g>
                                                                    <path
                                                                        d="M7.23241 0.232893L14.3936 7.39408L13.053 8.73466L1.35388 8.74787L1.3406 6.05345L9.28207 6.0926L5.2921 2.17319L7.23241 0.232893Z" />
                                                                    <path d="M7.19784 14.5909L11.7135 10.0753L7.88453 10.0564L5.27394 12.667L7.19784 14.5909Z" />
                                                                </g>
                                                            </svg>
                                                        </a>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endwhile;
                                    wp_reset_postdata();
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>

        <?php if ($settings['matrik_blog_genaral_style_selection'] == 'style_two') : ?>
            <div class="home2-blog-section">
                <div class="container">
                    <div class="row g-4 align-items-center justify-content-between mb-70">
                        <div class="col-lg-6 wow animate fadeInLeft" data-wow-delay="200ms" data-wow-duration="1500ms">
                            <div class="section-title two">
                                <?php if (!empty($settings['matrik_blog_genaral_subtitle'])) : ?>
                                    <span><?php echo esc_html($settings['matrik_blog_genaral_subtitle']); ?></span>
                                <?php endif; ?>
                                <?php if (!empty($settings['matrik_blog_genaral_title'])) : ?>
                                    <h2><?php echo esc_html($settings['matrik_blog_genaral_title']); ?></h2>
                                <?php endif; ?>
                            </div>
                        </div>
                        <?php if (!empty($settings['matrik_blog_genaral_header_button_text'])) : ?>
                            <div class="col-lg-3 d-flex justify-content-lg-end btn_wrapper">
                                <a class="primary-btn3 transparent" href="<?php echo esc_url($settings['matrik_blog_genaral_header_button_text_url']['url']); ?>">
                                    <span><?php echo esc_html($settings['matrik_blog_genaral_header_button_text']); ?>
                                    </span>
                                    <span><?php echo esc_html($settings['matrik_blog_genaral_header_button_text']); ?>
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
                    <div class="row gy-5">
                        <?php
                        while ($query->have_posts()) :
                            $query->the_post();
                            $post_category = get_the_category()[0]->name;
                        ?>
                            <div class="col-lg-6">
                                <div class="blog-card two">
                                    <div class="blog-img-wrap">
                                        <?php if (has_post_thumbnail()) : ?>
                                            <a class="blog-img" href="<?php the_permalink(); ?>">
                                                <?php the_post_thumbnail(); ?>
                                            </a>
                                        <?php endif; ?>
                                        <div class="blog-tag">
                                            <?php $categories = get_the_category(); ?>
                                            <a href="<?php echo esc_url(get_category_link($categories[0]->cat_ID)) ?>"><?php echo esc_html($post_category); ?></a>
                                        </div>
                                    </div>
                                    <div class="blog-content">
                                        <div class="blog-meta">
                                            <ul>
                                                <li><a class="blog-date" href="<?php echo esc_url(home_url(get_the_date('Y/m/d'))) ?>"><?php echo get_the_date("j M, Y"); ?></a></li>
                                                <li><span><?php comments_number('No comment', '1 comment', '% comments'); ?></span></li>

                                            </ul>
                                        </div>
                                        <h5><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
                                        <?php if (!empty($settings['matrik_blog_genaral_query_blog_button'])) : ?>
                                            <a href="<?php the_permalink(); ?>" class="read-btn">
                                                <span><?php echo esc_html($settings['matrik_blog_genaral_query_blog_button']); ?></span>
                                                <svg width="15" height="15" viewBox="0 0 15 15" xmlns="http://www.w3.org/2000/svg">
                                                    <g>
                                                        <path
                                                            d="M7.23241 0.232893L14.3936 7.39408L13.053 8.73466L1.35388 8.74787L1.3406 6.05345L9.28207 6.0926L5.2921 2.17319L7.23241 0.232893Z" />
                                                        <path d="M7.19784 14.5909L11.7135 10.0753L7.88453 10.0564L5.27394 12.667L7.19784 14.5909Z" />
                                                    </g>
                                                </svg>
                                            </a>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        <?php endwhile;
                        wp_reset_postdata();
                        ?>
                    </div>
                </div>
            </div>
        <?php endif; ?>

        <?php if ($settings['matrik_blog_genaral_style_selection'] == 'style_three') : ?>
            <div class="home3-blog-section">
                <div class="container">
                    <div class="row g-4 align-items-end justify-content-between mb-60 wow animate fadeInDown" data-wow-delay="200ms" data-wow-duration="1500ms">

                        <?php if ($settings['matrik_blog_genaral_header_switcher'] == 'yes') : ?>
                            <?php if (!empty($settings['matrik_blog_genaral_title'])) : ?>
                                <div class="col-lg-5">
                                    <div class="section-title two">
                                        <h2><?php echo esc_html($settings['matrik_blog_genaral_title']); ?></h2>
                                    </div>
                                </div>
                            <?php endif; ?>
                        <?php endif; ?>
                        <?php if ($settings['matrik_blog_genaral_show_pagination_switcher'] == 'yes') : ?>
                            <div class="col-lg-3 d-flex justify-content-lg-end">
                                <div class="slider-btn-grp two">
                                    <div class="slider-btn blog-slider-prev">
                                        <i class="bi bi-arrow-left"></i>
                                    </div>
                                    <div class="slider-btn blog-slider-next">
                                        <i class="bi bi-arrow-right"></i>
                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>
                    <div class="row g-xl-4 g-lg-3 gy-5 mb-70">
                        <div class="col-lg-6 order-lg-1 order-2 wow animate fadeInLeft" data-wow-delay="200ms" data-wow-duration="1500ms">
                            <?php
                            $index = 0;
                            while ($query->have_posts()) :
                                $query->the_post();
                                if ($index == 0):
                                    $post_category = get_the_category()[0]->name;
                            ?>
                                    <div class="blog-card2 magnetic-item">
                                        <?php if (has_post_thumbnail()) : ?>
                                            <div class="blog-img">
                                                <?php the_post_thumbnail(); ?>
                                            </div>
                                        <?php endif; ?>
                                        <div class="blog-content-wrap">
                                            <a href="<?php echo esc_url(home_url(get_the_date('Y/m/d'))) ?>" class="blog-date"><?php echo get_the_date("j M, Y"); ?></a>
                                            <div class="blog-content">
                                                <h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
                                                <?php if (!empty($settings['matrik_blog_genaral_query_blog_button'])) : ?>
                                                    <a href="<?php the_permalink(); ?>" class="details-btn">
                                                        <span><?php echo esc_html($settings['matrik_blog_genaral_query_blog_button']); ?></span>
                                                        <svg width="15" height="15" viewBox="0 0 15 15" xmlns="http://www.w3.org/2000/svg">
                                                            <path
                                                                d="M7.23289 0.232893L14.3941 7.39408L13.0535 8.73466L1.35437 8.74787L1.34109 6.05345L9.28256 6.0926L5.29259 2.17319L7.23289 0.232893Z" />
                                                            <path d="M7.19833 14.5909L11.7139 10.0753L7.88502 10.0564L5.27443 12.667L7.19833 14.5909Z" />
                                                        </svg>
                                                    </a>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                            <?php
                                endif;
                                $index++;
                            endwhile;
                            wp_reset_postdata();
                            ?>
                        </div>
                        <div class="col-lg-6 order-lg-2 order-1">
                            <div class="swiper home3-blog-slider">
                                <div class="swiper-wrapper">

                                    <?php
                                    $index = 0;
                                    while ($query->have_posts()) :
                                        $query->the_post();
                                        if ($index == 0) {
                                            $index++;
                                            continue;
                                        }
                                        $post_category = get_the_category()[0]->name;
                                    ?>
                                        <div class="swiper-slide">
                                            <div class="blog-card three">
                                                <?php if (has_post_thumbnail()) : ?>
                                                    <div class="blog-img-wrap">
                                                        <a class="blog-img" href="<?php the_permalink(); ?>">
                                                            <?php the_post_thumbnail(); ?>
                                                        </a>
                                                        <a href="<?php echo esc_url(home_url(get_the_date('Y/m/d'))) ?>" class="blog-date"><?php echo get_the_date("j M, Y"); ?></a>
                                                    </div>
                                                <?php endif; ?>
                                                <div class="blog-content">
                                                    <h5><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
                                                    <?php if (!empty($settings['matrik_blog_genaral_query_blog_button'])) : ?>
                                                        <a href="<?php the_permalink(); ?>" class="read-btn">
                                                            <span><?php echo esc_html($settings['matrik_blog_genaral_query_blog_button']); ?></span>
                                                            <svg width="15" height="15" viewBox="0 0 15 15" xmlns="http://www.w3.org/2000/svg">
                                                                <g>
                                                                    <path
                                                                        d="M7.23241 0.232893L14.3936 7.39408L13.053 8.73466L1.35388 8.74787L1.3406 6.05345L9.28207 6.0926L5.2921 2.17319L7.23241 0.232893Z" />
                                                                    <path d="M7.19784 14.5909L11.7135 10.0753L7.88453 10.0564L5.27394 12.667L7.19784 14.5909Z" />
                                                                </g>
                                                            </svg>
                                                        </a>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        </div>
                                    <?php
                                        $index++;
                                    endwhile;
                                    wp_reset_postdata();
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php if (!empty($settings['matrik_blog_genaral_bottom_button_text'])) : ?>
                        <div class="row">
                            <div class="col-lg-12 d-flex justify-content-center">
                                <a href="<?php echo esc_url($settings['matrik_blog_genaral_bottom_button_text_url']['url']); ?>" class="view-all-btn">
                                    <span><?php echo esc_html($settings['matrik_blog_genaral_bottom_button_text']); ?></span>
                                    <svg width="15" height="15" viewBox="0 0 15 15" xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M7.23289 0.232893L14.3941 7.39408L13.0535 8.73466L1.35437 8.74787L1.34109 6.05345L9.28256 6.0926L5.29259 2.17319L7.23289 0.232893Z" />
                                        <path d="M7.19833 14.5909L11.7139 10.0753L7.88502 10.0564L5.27443 12.667L7.19833 14.5909Z" />
                                    </svg>
                                </a>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        <?php endif; ?>

        <?php if ($settings['matrik_blog_genaral_style_selection'] == 'style_four') : ?>
            <div class="home4-blog-section">
                <div class="container">
                    <?php if ($settings['matrik_blog_genaral_header_switcher'] == 'yes') : ?>
                        <div class="row gy-md-5 gy-4 justify-content-between mb-70 wow animate fadeInDown" data-wow-delay="200ms" data-wow-duration="1500ms">
                            <?php if (!empty($settings['matrik_blog_genaral_title'])) : ?>
                                <div class="col-lg-5">
                                    <div class="section-title three">
                                        <h2><?php echo esc_html($settings['matrik_blog_genaral_title']); ?></h2>
                                    </div>
                                </div>
                            <?php endif; ?>
                            <?php if (!empty($settings['matrik_blog_genaral_header_button_text'])) : ?>
                                <div class="col-lg-4 d-flex justify-content-lg-end">
                                    <a class="primary-btn4 btn-hover transparent" href="<?php echo esc_url($settings['matrik_blog_genaral_header_button_text_url']['url']); ?>">
                                        <?php echo esc_html($settings['matrik_blog_genaral_header_button_text']); ?>
                                        <svg class="arrow" width="23" height="23" viewBox="0 0 23 23" xmlns="http://www.w3.org/2000/svg">
                                            <g>
                                                <path d="M0.113861 0H22.9999V4.28425L4.32671 22.9997L0 18.7154L12.7524 6.08815L0.113861 6.20089V0Z"></path>
                                                <path d="M23 22.9996V8.56848L16.8516 14.6566V22.9996H23Z"></path>
                                            </g>
                                        </svg>
                                        <span></span>
                                    </a>
                                </div>
                            <?php endif; ?>
                        </div>
                    <?php endif; ?>
                    <div class="row g-4">
                        <?php
                        while ($query->have_posts()) :
                            $query->the_post();
                            $post_category = get_the_category()[0]->name;
                        ?>
                            <div class="col-xl-4 col-md-6 wow animate fadeInUp" data-wow-delay="200ms" data-wow-duration="1500ms">
                                <div class="blog-card3 magnetic-item">
                                    <div class="blog-meta">
                                        <ul>
                                            <li><span><?php echo esc_html__('Comment', 'matrik-core'); ?> (<?php echo get_comments_number(); ?>)</span></li>
                                            <li> <?php
                                                    $categories = get_the_category();
                                                    if (!empty($categories)) {
                                                        $output = [];
                                                        foreach ($categories as $category) {
                                                            $output[] = '<a href="' . esc_url(get_category_link($category->term_id)) . '">' . esc_html($category->name) . '</a>';
                                                        }
                                                        echo implode(', ', $output);
                                                    }
                                                    ?>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="author-area">
                                        <div class="author-img">
                                            <?php echo get_avatar(get_the_author_meta('ID'), 96); ?>
                                        </div>
                                        <div class="author-content">
                                            <h6><?php echo esc_html__('Posted By,', 'matrik-core'); ?> <span><?php the_author(); ?></span></h6>
                                            <span><?php echo get_the_date("j M, Y"); ?></span>
                                        </div>
                                    </div>
                                    <h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
                                    <?php if (has_post_thumbnail()) : ?>
                                        <a class="blog-img" href="<?php the_permalink(); ?>">
                                            <?php the_post_thumbnail(); ?>
                                        </a>
                                    <?php endif; ?>
                                    <?php if (!empty($settings['matrik_blog_genaral_bottom_button_text'])) : ?>
                                        <a href="<?php the_permalink(); ?>" class="read-btn">
                                            <span><?php echo esc_html($settings['matrik_blog_genaral_bottom_button_text']); ?></span>
                                            <svg width="15" height="15" viewBox="0 0 15 15" xmlns="http://www.w3.org/2000/svg">
                                                <g>
                                                    <path
                                                        d="M7.23241 0.232893L14.3936 7.39408L13.053 8.73466L1.35388 8.74787L1.3406 6.05345L9.28207 6.0926L5.2921 2.17319L7.23241 0.232893Z" />
                                                    <path d="M7.19784 14.5909L11.7135 10.0753L7.88453 10.0564L5.27394 12.667L7.19784 14.5909Z" />
                                                </g>
                                            </svg>
                                        </a>
                                    <?php endif; ?>
                                </div>
                            </div>
                        <?php
                        endwhile;
                        wp_reset_postdata();
                        ?>
                    </div>
                </div>
            </div>
        <?php endif; ?>

        <?php if ($settings['matrik_blog_genaral_style_selection'] == 'style_five') : ?>
            <div class="home5-blog-section">
                <div class="container">
                    <?php if ($settings['matrik_blog_genaral_header_switcher'] == 'yes') : ?>
                        <div class="row gy-md-5 gy-4 align-items-center justify-content-between mb-70 wow animate fadeInDown" data-wow-delay="200ms" data-wow-duration="1500ms">
                            <div class="col-lg-5">
                                <div class="section-title four">
                                    <?php if (!empty($settings['matrik_blog_genaral_subtitle'])) : ?>
                                        <span>
                                            <svg width="12" height="12" viewBox="0 0 12 12" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M0.0594065 0H12.0001V2.2353L2.25745 12L0 9.76471L6.65353 3.17647L0.0594065 3.2353V0Z" />
                                                <path d="M11.9999 11.9999V4.47046L8.79199 7.64693V11.9999H11.9999Z" />
                                            </svg>
                                            <?php echo esc_html($settings['matrik_blog_genaral_subtitle']); ?>
                                        </span>
                                    <?php endif; ?>
                                    <?php if (!empty($settings['matrik_blog_genaral_title'])) : ?>
                                        <h2><?php echo esc_html($settings['matrik_blog_genaral_title']); ?></h2>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <?php if (!empty($settings['matrik_blog_genaral_header_button_text'])) : ?>
                                <div class="col-lg-3 d-flex justify-content-lg-end">
                                    <a class="primary-btn5 btn-hover" href="<?php echo esc_url($settings['matrik_blog_genaral_header_button_text_url']['url']); ?>">
                                        <?php echo esc_html($settings['matrik_blog_genaral_header_button_text']); ?>
                                        <svg class="arrow" width="23" height="23" viewBox="0 0 23 23" xmlns="http://www.w3.org/2000/svg">
                                            <g>
                                                <path d="M0.113861 0H22.9999V4.28425L4.32671 22.9997L0 18.7154L12.7524 6.08815L0.113861 6.20089V0Z"></path>
                                                <path d="M23 22.9996V8.56848L16.8516 14.6566V22.9996H23Z"></path>
                                            </g>
                                        </svg>
                                        <span></span>
                                    </a>
                                </div>
                            <?php endif; ?>
                        </div>
                    <?php endif; ?>
                    <div class="row gy-5">
                        <?php
                        $index = 0;
                        while ($query->have_posts()) :
                            $query->the_post();
                            if ($index == 0):
                                $post_category = get_the_category()[0]->name;
                        ?>
                                <div class="col-xl-6 col-lg-5 wow animate fadeInLeft" data-wow-delay="200ms" data-wow-duration="1500ms">
                                    <div class="blog-card2 two magnetic-item">
                                        <?php if (has_post_thumbnail()) : ?>
                                            <div class="blog-img">
                                                <?php the_post_thumbnail(); ?>
                                            </div>
                                        <?php endif; ?>
                                        <div class="blog-content-wrap">
                                            <a href="<?php echo esc_url(home_url(get_the_date('Y/m/d'))) ?>" class="blog-date"><?php echo get_the_date("j M, Y"); ?></a>
                                            <div class="blog-content">
                                                <h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
                                                <?php if (!empty($settings['matrik_blog_genaral_bottom_button_text'])) : ?>
                                                    <a href="<?php the_permalink(); ?>" class="details-btn">
                                                        <span><?php echo esc_html($settings['matrik_blog_genaral_bottom_button_text']); ?></span>
                                                        <svg width="15" height="15" viewBox="0 0 15 15" xmlns="http://www.w3.org/2000/svg">
                                                            <path
                                                                d="M7.23289 0.232893L14.3941 7.39408L13.0535 8.73466L1.35437 8.74787L1.34109 6.05345L9.28256 6.0926L5.29259 2.17319L7.23289 0.232893Z" />
                                                            <path d="M7.19833 14.5909L11.7139 10.0753L7.88502 10.0564L5.27443 12.667L7.19833 14.5909Z" />
                                                        </svg>
                                                    </a>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                        <?php
                            endif;
                            $index++;
                        endwhile;
                        wp_reset_postdata();
                        ?>
                        <div class="col-xl-6 col-lg-7">

                            <?php
                            $index = 0;
                            $total_posts = $query->post_count - 1;
                            $visible_index = 0;

                            while ($query->have_posts()) :
                                $query->the_post();

                                if ($index == 0) {
                                    $index++;
                                    continue;
                                }

                                $post_category = get_the_category()[0]->name;


                                $is_last = ($visible_index == $total_posts - 1);
                                $mb_class = $is_last ? '' : 'mb-30';
                            ?>
                                <div class="blog-card four <?php echo esc_attr($mb_class) ?> wow animate fadeInDown" data-wow-delay="200ms" data-wow-duration="1500ms">
                                    <?php if (has_post_thumbnail()) : ?>
                                        <div class="blog-img-wrap">
                                            <a class="blog-img" href="<?php the_permalink(); ?>">
                                                <?php the_post_thumbnail(); ?>
                                            </a>
                                        </div>
                                    <?php endif; ?>
                                    <div class="blog-content-wrap">
                                        <div class="blog-content">
                                            <div class="blog-meta">
                                                <ul>
                                                    <li><a class="blog-date" href="<?php echo esc_url(home_url(get_the_date('Y/m/d'))) ?>"><?php echo get_the_date("j M, Y"); ?></a></li>

                                                    <?php $categories = get_the_category(); ?>
                                                    <li><a href="<?php echo esc_url(get_category_link($categories[0]->cat_ID)) ?>"><?php echo esc_html($post_category); ?></a></li>
                                                </ul>
                                            </div>
                                            <h5><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
                                        </div>
                                        <?php if (!empty($settings['matrik_blog_genaral_bottom_button_text'])) : ?>
                                            <a href="<?php the_permalink(); ?>" class="read-btn">
                                                <span><?php echo esc_html($settings['matrik_blog_genaral_bottom_button_text']); ?></span>
                                            </a>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            <?php
                                $index++;
                                $visible_index++;
                            endwhile;

                            wp_reset_postdata();
                            ?>

                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>

        <?php if ($settings['matrik_blog_genaral_style_selection'] == 'style_six') : ?>
            <div class="home6-blog-section">
                <div class="container">
                    <div class="row gy-5">
                        <div class="col-lg-6 wow animate fadeInLeft" data-wow-delay="200ms" data-wow-duration="1500ms">
                            <div class="section-title five">
                                <?php if (!empty($settings['matrik_blog_genaral_subtitle'])) : ?>
                                    <span><?php echo esc_html($settings['matrik_blog_genaral_subtitle']); ?></span>
                                <?php endif; ?>
                                <?php if (!empty($settings['matrik_blog_genaral_title'])) : ?>
                                    <h2><?php echo esc_html($settings['matrik_blog_genaral_title']); ?></h2>
                                <?php endif; ?>
                                <?php if (!empty($settings['matrik_blog_genaral_description'])) : ?>
                                    <p><?php echo esc_html($settings['matrik_blog_genaral_description']); ?></p>
                                <?php endif; ?>
                                <?php if (!empty($settings['matrik_blog_genaral_header_button_text'])) : ?>
                                    <a class="primary-btn6" href="<?php echo esc_url($settings['matrik_blog_genaral_header_button_text_url']['url']); ?>">
                                        <?php echo esc_html($settings['matrik_blog_genaral_header_button_text']); ?>
                                        <svg width="28" height="28" viewBox="0 0 28 28" xmlns="http://www.w3.org/2000/svg">
                                            <g>
                                                <path
                                                    d="M14.1952 0.936056L27.5226 14.2634L25.0277 16.7583L3.25495 16.7829L3.23022 11.7684L18.0098 11.8413L10.5842 4.54707L14.1952 0.936056Z" />
                                                <path d="M14.1298 27.657L22.5336 19.2532L15.4078 19.218L10.5493 24.0765L14.1298 27.657Z" />
                                            </g>
                                        </svg>
                                    </a>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <?php

                            $index = 0;
                            while ($query->have_posts()) :
                                $query->the_post();

                            ?>
                                <div class="blog-card2 three magnetic-item <?php echo ($index === 0) ? 'mb-40' : ''; ?>">
                                    <?php if (has_post_thumbnail()): ?>
                                        <div class="blog-img">
                                            <?php the_post_thumbnail(); ?>
                                        </div>
                                    <?php endif; ?>
                                    <div class="blog-content-wrap">
                                        <a href="<?php echo esc_url(home_url(get_the_date('Y/m/d'))) ?>" class="blog-date"><?php echo get_the_date("j M, Y"); ?></a>
                                        <div class="blog-content">
                                            <h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>

                                            <?php if (!empty($settings['matrik_blog_genaral_query_blog_button'])) : ?>
                                                <a href="<?php the_permalink(); ?>" class="details-btn">
                                                    <span><?php echo esc_html($settings['matrik_blog_genaral_query_blog_button']); ?></span>
                                                    <svg width="15" height="15" viewBox="0 0 15 15" xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M7.23289 0.232893L14.3941 7.39408L13.0535 8.73466L1.35437 8.74787L1.34109 6.05345L9.28256 6.0926L5.29259 2.17319L7.23289 0.232893Z" />
                                                        <path d="M7.19833 14.5909L11.7139 10.0753L7.88502 10.0564L5.27443 12.667L7.19833 14.5909Z" />
                                                    </svg>
                                                </a>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                            <?php
                                $index++;
                            endwhile;

                            wp_reset_postdata();
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>

<?php

    }
}

Plugin::instance()->widgets_manager->register(new Matrik_Blog_Widget());
