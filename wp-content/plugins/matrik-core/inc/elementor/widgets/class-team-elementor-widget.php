<?php

namespace Elementor;

if (!defined('ABSPATH')) exit;  // Exit if accessed directly

use Elementor\core\Schemes;
use Egns_Core\Egns_Helper;

class Matrik_Team_Widget extends Widget_Base
{

    public function get_name()
    {
        return 'matrik_team';
    }

    public function get_title()
    {
        return esc_html__('EG Team', 'matrik-core');
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
            'matrik_team_genaral',
            [
                'label' => esc_html__('General', 'matrik-core')
            ]
        );

        $this->add_control(
            'matrik_team_genaral_style_selection',
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
            'matrik_team_genaral_three_bg_image',
            [
                'label' => esc_html__('Background Image', 'matrik-core'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
                'media_types' => ['image'],
                'condition' => [
                    'matrik_team_genaral_style_selection' => ['style_three'],
                ]
            ]
        );

        $this->add_control(
            'matrik_team_genaral_header_switcher',
            [
                'label' => esc_html__("Show Header Area?", 'matrik-core'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Enable', 'matrik-core'),
                'label_off' => esc_html__('Disable', 'matrik-core'),
                'return_value' => 'yes',
                'default' => 'yes',
                'condition' => [
                    'matrik_team_genaral_style_selection' => ['style_one', 'style_two', 'style_three', 'style_four'],
                ]
            ]
        );

        $this->add_control(
            'matrik_team_genaral_header_area',
            [
                'label'     => esc_html__('Header Area', 'matrik-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
                'condition' => [
                    'matrik_team_genaral_style_selection' => ['style_one', 'style_two', 'style_three', 'style_four'],
                    'matrik_team_genaral_header_switcher' => ['yes'],
                ]
            ]
        );

        $this->add_control(
            'matrik_team_genaral_subtitle',
            [
                'label'       => esc_html__('Header Subtitle', 'matrik-core'),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default'     => esc_html__('Our Factory People', 'matrik-core'),
                'placeholder' => esc_html__('write your subtitle here', 'matrik-core'),
                'label_block' => true,
                'condition' => [
                    'matrik_team_genaral_header_switcher' => ['yes'],
                    'matrik_team_genaral_style_selection' => ['style_one', 'style_two', 'style_four'],
                ]
            ]
        );

        $this->add_control(
            'matrik_team_genaral_title',
            [
                'label'       => esc_html__('Header Title', 'matrik-core'),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default'     => esc_html__('Meet Our Factory Team', 'matrik-core'),
                'placeholder' => esc_html__('write your title here', 'matrik-core'),
                'label_block' => true,
                'condition' => [
                    'matrik_team_genaral_header_switcher' => ['yes'],
                    'matrik_team_genaral_style_selection' => ['style_one', 'style_two', 'style_three', 'style_four'],
                ]
            ]
        );

        $this->add_control(
            'matrik_team_genaral_description',
            [
                'label'       => esc_html__('Header Description', 'matrik-core'),
                'type'        => \Elementor\Controls_Manager::TEXTAREA,
                'default'     => esc_html__('Sed nisl eros, condimentum nec risus sit amet, finibus conguese.Fusen fringilla est libero sed tempus urna feugiat eu. Curabitur eu feugiat ligu Suspendisse.', 'matrik-core'),
                'placeholder' => esc_html__('write your description here', 'matrik-core'),
                'label_block' => true,
                'condition' => [
                    'matrik_team_genaral_header_switcher' => ['yes'],
                    'matrik_team_genaral_style_selection' => ['style_four'],
                ]
            ]
        );

        $this->add_control(
            'matrik_team_three_genaral_button_text',
            [
                'label'       => esc_html__('Button', 'matrik-core'),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default'     => esc_html__('View All Team', 'matrik-core'),
                'placeholder' => esc_html__('write your button text here', 'matrik-core'),
                'label_block' => true,
                'condition' => [
                    'matrik_team_genaral_header_switcher' => ['yes'],
                    'matrik_team_genaral_style_selection' => ['style_three'],
                ]
            ]
        );

        $this->add_control(
            'matrik_team_three_genaral_button_text_url',
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
                    'matrik_team_genaral_header_switcher' => ['yes'],
                    'matrik_team_genaral_style_selection' => ['style_three'],
                ]
            ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'matrik_team_genaral_author_name',
            [
                'label'       => esc_html__('Author Name', 'matrik-core'),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default'     => esc_html__('Olivern James', 'matrik-core'),
                'placeholder' => esc_html__('write your text here', 'matrik-core'),
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'matrik_team_genaral_author_designation',
            [
                'label'       => esc_html__('Author Designation', 'matrik-core'),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default'     => esc_html__('Production Manager', 'matrik-core'),
                'placeholder' => esc_html__('write your text here', 'matrik-core'),
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'matrik_team_genaral_author_image',
            [
                'label' => esc_html__('Author Image', 'matrik-core'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
                'media_types' => ['image'],
            ]
        );

        $repeater->add_control(
            'matrik_team_genaral_author_social_icon',
            [
                'label' => esc_html__('Social Icon', 'matrik-core'),
                'type' => \Elementor\Controls_Manager::ICONS,
                'default' => [
                    'value' => 'bx bxl-facebook',
                    'library' => 'boxicons',
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
            'matrik_team_genaral_author_social_title',
            [
                'label'       => esc_html__('Social Title', 'matrik-core'),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default'     => esc_html__('Facebook', 'matrik-core'),
                'placeholder' => esc_html__('write your text here', 'matrik-core'),
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'matrik_team_genaral_author_social_title_link',
            [
                'label'   => esc_html__('Social URL/Link', 'matrik-core'),
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
            'matrik_team_genaral_author_list',
            [
                'label' => esc_html__('Team List', 'matrik-core'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'matrik_team_genaral_author_name' => esc_html('Olivern James'),
                        'matrik_team_genaral_author_social_icon' => [
                            'value' => 'bx bxl-facebook',
                            'library' => 'boxicons',
                        ],
                        'matrik_team_genaral_author_social_title' => esc_html__('Facebook', 'matrik-core'),
                    ],
                    [
                        'matrik_team_genaral_author_name' => esc_html('Michael Daniel'),
                        'matrik_team_genaral_author_social_icon' => [
                            'value' => 'bx bxl-linkedin',
                            'library' => 'boxicons',
                        ],
                        'matrik_team_genaral_author_social_title' => esc_html__('LinkedIn', 'matrik-core'),
                    ],
                    [
                        'matrik_team_genaral_author_name' => esc_html('Matthew Julian'),
                        'matrik_team_genaral_author_social_icon' => [
                            'value' => 'bi bi-twitter-x',
                            'library' => 'boxicons',
                        ],
                        'matrik_team_genaral_author_social_title' => esc_html__('Twitter', 'matrik-core'),
                    ],
                    [
                        'matrik_team_genaral_author_name' => esc_html('Anthony Wyatt'),
                        'matrik_team_genaral_author_social_icon' => [
                            'value' => 'bx bxl-linkedin',
                            'library' => 'boxicons',
                        ],
                        'matrik_team_genaral_author_social_title' => esc_html__('LinkedIn', 'matrik-core'),
                    ],
                    [
                        'matrik_team_genaral_author_name' => esc_html('Cooper Josiah'),
                        'matrik_team_genaral_author_social_icon' => [
                            'value' => 'bx bxl-instagram',
                            'library' => 'boxicons',
                        ],
                        'matrik_team_genaral_author_social_title' => esc_html__('Instagram', 'matrik-core'),
                    ],
                ],
                'title_field' => '{{{ matrik_team_genaral_author_name }}}',
                'condition' => [
                    'matrik_team_genaral_style_selection' => ['style_one', 'style_two', 'style_three', 'style_four', 'style_five'],
                ]
            ]
        );

        $this->add_control(
            'matrik_team_genaral_bottom_text',
            [
                'label'       => esc_html__('Bottom Text', 'matrik-core'),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default' => wp_kses('Hey Creative People <a href="/career">Join Our</a> Team Any Time!', wp_kses_allowed_html('post')),
                'placeholder' => esc_html__('write your text here', 'matrik-core'),
                'label_block' => true,
                'condition' => [
                    'matrik_team_genaral_style_selection' => ['style_three', 'style_four'],
                ]
            ]
        );

        $this->end_controls_section();

        //style start

        $this->start_controls_section(
            'matrik_team_style_one_genaral',
            [
                'label'     => esc_html__('Styles', 'matrik-core'),
                'tab'       => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'matrik_team_genaral_style_selection' => ['style_one'],
                ]
            ]
        );

        $this->add_control(
            'matrik_team_style_one_genaral_subtitle',
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
                'name'     => 'matrik_team_style_one_genaral_subtitle_typ',
                'selector' => '{{WRAPPER}} .section-title > span',

            ]
        );

        $this->add_control(
            'matrik_team_style_one_genaral_subtitle_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .section-title > span' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_team_style_one_genaral_subtitle_icon_color',
            [
                'label'     => esc_html__('Icon Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .section-title > span::after' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_team_style_one_genaral_title',
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
                'name'     => 'matrik_team_style_one_genaral_title_typ',
                'selector' => '{{WRAPPER}} .section-title h2',

            ]
        );

        $this->add_control(
            'matrik_team_style_one_genaral_title_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .section-title h2' => 'color: {{VALUE}};',
                ],
            ]
        );


        $this->add_control(
            'matrik_team_style_one_genaral_list_border',
            [
                'label'     => esc_html__('List Border', 'matrik-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_control(
            'matrik_team_style_one_genaral_list_border_first_child_border_color',
            [
                'label'     => esc_html__('First Child Border Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home1-team-section .team-list .single-item:first-child' => 'border-top: 1px solid {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_team_style_one_genaral_list_border_color',
            [
                'label'     => esc_html__('Border Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home1-team-section .team-list .single-item' => 'border-bottom: 1px solid {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_team_style_one_genaral_author_designation',
            [
                'label'     => esc_html__('Author Designation', 'matrik-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'matrik-core'),
                'name'     => 'matrik_team_style_one_genaral_author_designation_typ',
                'selector' => '{{WRAPPER}} .home1-team-section .team-list .single-item .team-name-and-desig span',

            ]
        );

        $this->add_control(
            'matrik_team_style_one_genaral_author_designation_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home1-team-section .team-list .single-item .team-name-and-desig span' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_team_style_one_genaral_author_name',
            [
                'label'     => esc_html__('Author Name', 'matrik-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'matrik-core'),
                'name'     => 'matrik_team_style_one_genaral_author_name_typ',
                'selector' => '{{WRAPPER}} .home1-team-section .team-list .single-item .team-name-and-desig h4',

            ]
        );

        $this->add_control(
            'matrik_team_style_one_genaral_author_name_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home1-team-section .team-list .single-item .team-name-and-desig h4' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_team_style_one_genaral_social_icon',
            [
                'label'     => esc_html__('Social Icon', 'matrik-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'matrik-core'),
                'name'     => 'matrik_team_style_one_genaral_social_icon_typ',
                'selector' => '{{WRAPPER}} .home1-team-section .team-list .single-item .social-area .icon span i',

            ]
        );

        $this->add_control(
            'matrik_team_style_one_genaral_social_icon_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home1-team-section .team-list .single-item .social-area .icon span i' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_team_style_one_genaral_social_icon_hover_color',
            [
                'label'     => esc_html__('Hover Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home1-team-section .team-list .single-item:hover .social-area .icon span i' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_team_style_one_genaral_social_icon_bg_color',
            [
                'label'     => esc_html__('Background Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home1-team-section .team-list .single-item .social-area .icon span' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_team_style_one_genaral_social_icon_hover_bg_color',
            [
                'label'     => esc_html__('Hover Background Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home1-team-section .team-list .single-item:hover .social-area .icon span' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_team_style_one_genaral_social_icon_second_bg_color',
            [
                'label'     => esc_html__('Second Background Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home1-team-section .team-list .single-item .social-area .icon' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_team_style_one_genaral_social_icon_second_hover_bg_color',
            [
                'label'     => esc_html__('Hover Second Background Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home1-team-section .team-list .single-item:hover .social-area .icon' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_team_style_one_genaral_social_icon_border_color',
            [
                'label'     => esc_html__('Border Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home1-team-section .team-list .single-item .social-area .icon' => 'border: 1px solid {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_team_style_one_genaral_social_icon_border_hover_color',
            [
                'label'     => esc_html__('Hover Border Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home1-team-section .team-list .single-item:hover .social-area .icon' => 'border-color: {{VALUE}};',
                ],
            ]
        );


        $this->add_control(
            'matrik_team_style_one_genaral_social_text',
            [
                'label'     => esc_html__('Social Text', 'matrik-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'matrik-core'),
                'name'     => 'matrik_team_style_one_genaral_social_text_typ',
                'selector' => '{{WRAPPER}} .home1-team-section .team-list .single-item .social-area > span',

            ]
        );

        $this->add_control(
            'matrik_team_style_one_genaral_social_text_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home1-team-section .team-list .single-item .social-area > span' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_team_style_one_genaral_social_text_hover_color',
            [
                'label'     => esc_html__('Hover Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home1-team-section .team-list .single-item:hover .social-area > span ' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_team_style_one_genaral_social_text_bg_color',
            [
                'label'     => esc_html__('Background Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home1-team-section .team-list .single-item .social-area > span' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_team_style_one_genaral_social_text_hover_bg_color',
            [
                'label'     => esc_html__('Hover Background Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home1-team-section .team-list .single-item:hover .social-area > span ' => 'background-color: {{VALUE}};',
                ],
            ]
        );


        $this->add_control(
            'matrik_team_style_one_genaral_social_text_border_color',
            [
                'label'     => esc_html__('Border Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home1-team-section .team-list .single-item .social-area > span' => 'border: 1px solid {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_team_style_one_genaral_social_text_hover_border_color',
            [
                'label'     => esc_html__('Hover Border Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home1-team-section .team-list .single-item:hover .social-area > span' => 'border-color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section();

        //style start

        $this->start_controls_section(
            'matrik_team_style_three_genaral',
            [
                'label'     => esc_html__('Styles', 'matrik-core'),
                'tab'       => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'matrik_team_genaral_style_selection' => ['style_three'],
                ]
            ]
        );

        $this->add_control(
            'matrik_team_style_three_genaral_title',
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
                'name'     => 'matrik_team_style_three_genaral_title_typ',
                'selector' => '{{WRAPPER}} .section-title.two h2',

            ]
        );

        $this->add_control(
            'matrik_team_style_three_genaral_title_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .section-title.two h2' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_team_style_three_genaral_button',
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
                'name'     => 'matrik_team_style_three_genaral_button_typ',
                'selector' => '{{WRAPPER}} .primary-btn2',

            ]
        );

        $this->add_control(
            'matrik_team_style_three_genaral_button_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .primary-btn2' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_team_style_three_genaral_button_hover_color',
            [
                'label'     => esc_html__('Hover Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .primary-btn2.two:hover' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_team_style_three_genaral_button_icon_color',
            [
                'label'     => esc_html__('Icon Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .primary-btn2 svg' => 'fill: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_team_style_three_genaral_button_icon_hover_color',
            [
                'label'     => esc_html__('Hover Icon Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .primary-btn2.two:hover svg' => 'fill: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_team_style_three_genaral_author_designation',
            [
                'label'     => esc_html__('Author Designation', 'matrik-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'matrik-core'),
                'name'     => 'matrik_team_style_three_genaral_author_designation_typ',
                'selector' => '{{WRAPPER}} .team-card2 .team-content span',

            ]
        );

        $this->add_control(
            'matrik_team_style_three_genaral_author_designation_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .team-card2 .team-content span' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_team_style_three_genaral_author_name',
            [
                'label'     => esc_html__('Author Name', 'matrik-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'matrik-core'),
                'name'     => 'matrik_team_style_three_genaral_author_name_typ',
                'selector' => '{{WRAPPER}} .team-card2 .team-content h5',

            ]
        );

        $this->add_control(
            'matrik_team_style_three_genaral_author_name_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .team-card2 .team-content h5' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_team_style_three_genaral_social_icon',
            [
                'label'     => esc_html__('Social Icon', 'matrik-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'matrik-core'),
                'name'     => 'matrik_team_style_three_genaral_social_icon_typ',
                'selector' => '{{WRAPPER}} .team-card2 .team-img .social-wrap .social-area .icon span i',

            ]
        );

        $this->add_control(
            'matrik_team_style_three_genaral_social_icon_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .team-card2 .team-img .social-wrap .social-area .icon span i' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_team_style_three_genaral_social_icon_border_color',
            [
                'label'     => esc_html__('Border Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .team-card2 .team-img .social-wrap .social-area .icon' => 'border: 1px solid {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_team_style_three_genaral_social_icon_hover_border_color',
            [
                'label'     => esc_html__('Hover Border Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .team-card2 .team-img .social-wrap .social-area .icon' => 'border-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_team_style_three_genaral_social_icon_bg_color',
            [
                'label'     => esc_html__('Background Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .team-card2 .team-img .social-wrap .social-area .icon span' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_team_style_three_genaral_social_icon_hover_bg_color',
            [
                'label'     => esc_html__('Hover Background Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .team-card2 .team-img .social-wrap .social-area:hover .icon' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_team_style_three_genaral_social_title',
            [
                'label'     => esc_html__('Social Title', 'matrik-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'matrik-core'),
                'name'     => 'matrik_team_style_three_genaral_social_title_typ',
                'selector' => '{{WRAPPER}} .team-card2 .team-img .social-wrap .social-area > span',

            ]
        );

        $this->add_control(
            'matrik_team_style_three_genaral_social_title_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .team-card2 .team-img .social-wrap .social-area > span' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_team_style_three_genaral_social_title_hover_color',
            [
                'label'     => esc_html__('Hover Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .team-card2 .team-img .social-wrap .social-area:hover > span' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_team_style_three_genaral_social_title_border_color',
            [
                'label'     => esc_html__('Border Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .team-card2 .team-img .social-wrap .social-area > span' => 'border: 1px solid {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_team_style_three_genaral_social_title_hover_border_color',
            [
                'label'     => esc_html__('Hover Border Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .team-card2 .team-img .social-wrap .social-area:hover > span' => 'border-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_team_style_three_genaral_social_title_bg_color',
            [
                'label'     => esc_html__('Background Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .team-card2 .team-img .social-wrap .social-area > span' => 'background-color: {{VALUE}};',
                ],
            ]
        );


        $this->add_control(
            'matrik_team_style_three_genaral_social_title_hover_bg_color',
            [
                'label'     => esc_html__('Hover Background Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .team-card2 .team-img .social-wrap .social-area:hover > span' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_team_style_three_genaral_bottom_area',
            [
                'label'     => esc_html__('Bottom Area', 'matrik-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'matrik-core'),
                'name'     => 'matrik_team_style_three_genaral_bottom_area_typ',
                'selector' => '{{WRAPPER}} .home3-team-section .team-bottom-area h6',

            ]
        );

        $this->add_control(
            'matrik_team_style_three_genaral_bottom_area_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home3-team-section .team-bottom-area h6' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_team_style_three_genaral_bottom_area_second_color',
            [
                'label'     => esc_html__('Second Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home3-team-section .team-bottom-area h6 a' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_team_style_three_genaral_bottom_area_hover_econd_color',
            [
                'label'     => esc_html__('Hover Second Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home3-team-section .team-bottom-area h6 a:hover' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section();

        //style Two start

        $this->start_controls_section(
            'matrik_team_style_four_genaral',
            [
                'label'     => esc_html__('Styles', 'matrik-core'),
                'tab'       => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'matrik_team_genaral_style_selection' => ['style_four'],
                ]
            ]
        );

        $this->add_control(
            'matrik_team_style_four_genaral_subtitle',
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
                'name'     => 'matrik_team_style_four_genaral_subtitle_typ',
                'selector' => '{{WRAPPER}} .section-title.five > span',

            ]
        );

        $this->add_control(
            'matrik_team_style_four_genaral_subtitle_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .section-title.five > span' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_team_style_four_genaral_subtitle_icon_color',
            [
                'label'     => esc_html__('Icon Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .section-title.five > span::after' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_team_style_four_genaral_title',
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
                'name'     => 'matrik_team_style_four_genaral_title_typ',
                'selector' => '{{WRAPPER}} .section-title h2',

            ]
        );

        $this->add_control(
            'matrik_team_style_four_genaral_title_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .section-title h2' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_team_style_four_genaral_desc',
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
                'name'     => 'matrik_team_style_four_genaral_desc_typ',
                'selector' => '{{WRAPPER}} .section-title.five p',

            ]
        );

        $this->add_control(
            'matrik_team_style_four_genaral_desc_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .section-title.five p' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_team_style_four_genaral_author_designation',
            [
                'label'     => esc_html__('Author Designation', 'matrik-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'matrik-core'),
                'name'     => 'matrik_team_style_four_genaral_author_designation_typ',
                'selector' => '{{WRAPPER}} .team-card .team-content-wrap .team-content span',

            ]
        );

        $this->add_control(
            'matrik_team_style_four_genaral_author_designation_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .team-card .team-content-wrap .team-content span' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_team_style_four_genaral_author_designation_bg_color',
            [
                'label'     => esc_html__('Background Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .team-card .team-content-wrap .team-content span' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_team_style_four_genaral_author_name',
            [
                'label'     => esc_html__('Author Name', 'matrik-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'matrik-core'),
                'name'     => 'matrik_team_style_four_genaral_author_name_typ',
                'selector' => '{{WRAPPER}} .team-card .team-content-wrap .team-content h5',

            ]
        );

        $this->add_control(
            'matrik_team_style_four_genaral_author_name_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .team-card .team-content-wrap .team-content h5' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_team_style_four_genaral_author_name_bg_color',
            [
                'label'     => esc_html__('Background Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .team-card .team-content-wrap .team-content h5' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_team_style_four_genaral_social_link',
            [
                'label'     => esc_html__('Social Link', 'matrik-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'matrik-core'),
                'name'     => 'matrik_team_style_four_genaral_social_link_typ',
                'selector' => '{{WRAPPER}} .team-card .social-btn .social-area > span',
            ]
        );

        $this->add_control(
            'matrik_team_style_four_genaral_social_link_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .team-card .social-btn .social-area > span' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .team-card.two .social-btn .social-area .icon span svg' => 'fill: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_team_style_four_genaral_social_link_bg_color',
            [
                'label'     => esc_html__('Background Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .team-card .social-btn .social-area > span' => 'background-color: {{VALUE}};',
                    '{{WRAPPER}} .team-card.two .social-btn .social-area .icon' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_team_style_four_genaral_social_link_ico_bg_color',
            [
                'label'     => esc_html__('Icon BG Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .team-card.two .social-btn .social-area .icon span' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_team_style_four_genaral_social_link_hover_color',
            [
                'label'     => esc_html__('Hover Text Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .team-card .social-btn .social-area:hover > span' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .team-card.two .social-btn .social-area:hover .icon span svg' => 'fill: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_team_style_four_genaral_social_link_bg_hover_color',
            [
                'label'     => esc_html__('Hover Background Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .team-card .social-btn .social-area:hover > span' => 'background-color: {{VALUE}};',
                    '{{WRAPPER}} .team-card.two .social-btn .social-area:hover .icon' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_team_style_four_genaral_social_link_icon_bg_hover_color',
            [
                'label'     => esc_html__('Icon Hover BG Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .team-card.two .social-btn .social-area:hover .icon span' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_team_style_four_genaral_pagination_button',
            [
                'label'     => esc_html__('Pagination Buttons', 'matrik-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_control(
            'matrik_team_style_four_genaral_pagination_btn_icon_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .slider-btn-grp .slider-btn i' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_team_style_four_genaral_pagination_btn_bg_color',
            [
                'label'     => esc_html__('Background Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .slider-btn-grp .slider-btn' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_team_style_four_genaral_pagination_btn_icon_hover_color',
            [
                'label'     => esc_html__('Hover Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .slider-btn-grp .slider-btn:hover i' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_team_style_four_genaral_pagination_btn_hover_bg_color',
            [
                'label'     => esc_html__('Hover Background Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .slider-btn-grp .slider-btn:hover' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_team_style_four_genaral_pagination_btn_icon_border_color',
            [
                'label'     => esc_html__('Border Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .slider-btn-grp .slider-btn' => 'border: 1px solid {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_team_style_four_genaral_pagination_btn_icon_border_hover_color',
            [
                'label'     => esc_html__('Hover Border Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .slider-btn-grp.four .slider-btn:hover' => 'border-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_team_style_four_genaral_bottom_cta_text',
            [
                'label'     => esc_html__('Bottom CTA Text', 'matrik-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'matrik-core'),
                'name'     => 'matrik_team_style_four_genaral_bottom_cta_text_typ',
                'selector' => '{{WRAPPER}} .home6-team-section .slider-btn-grp h6',

            ]
        );

        $this->add_control(
            'matrik_team_style_four_genaral_bottom_cta_text_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home6-team-section .slider-btn-grp h6' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Link Text Typography', 'matrik-core'),
                'name'     => 'matrik_team_style_four_genaral_bottom_cta_link_text_typ',
                'selector' => '{{WRAPPER}} .home6-team-section .slider-btn-grp h6 a',

            ]
        );

        $this->add_control(
            'matrik_team_style_four_genaral_bottom_cta_link_text_color',
            [
                'label'     => esc_html__('Link Text Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home6-team-section .slider-btn-grp h6 a' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_team_style_four_genaral_bottom_cta_link_text_hover_color',
            [
                'label'     => esc_html__('Hover Link Text Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home6-team-section .slider-btn-grp h6 a:hover' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_team_style_four_genaral_section_border',
            [
                'label'     => esc_html__('Section Border', 'matrik-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_control(
            'matrik_team_style_four_genaral_section_border_border_top_color',
            [
                'label'     => esc_html__('Border Top Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home6-team-section .team-slider-area' => 'border-top: 1px solid {{VALUE}};',
                ],
            ]
        );


        $this->add_control(
            'matrik_team_style_four_genaral_section_border_border_bottom_color',
            [
                'label'     => esc_html__('Border Bottom Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home6-team-section .team-slider-area' => 'border-bottom: 1px solid {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section();

        //style start

        $this->start_controls_section(
            'matrik_team_style_five_genaral',
            [
                'label'     => esc_html__('Styles', 'matrik-core'),
                'tab'       => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'matrik_team_genaral_style_selection' => ['style_five'],
                ]
            ]
        );

        $this->add_control(
            'matrik_team_style_five_genaral_author_designation',
            [
                'label'     => esc_html__('Author Designation', 'matrik-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'matrik-core'),
                'name'     => 'matrik_team_style_five_genaral_author_designation_typ',
                'selector' => '{{WRAPPER}} .team-card .team-content-wrap .team-content span',

            ]
        );

        $this->add_control(
            'matrik_team_style_five_genaral_author_designation_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .team-card .team-content-wrap .team-content span' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_team_style_five_genaral_author_designation_bg_color',
            [
                'label'     => esc_html__('Background Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .team-card .team-content-wrap .team-content span' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_team_style_five_genaral_author_name',
            [
                'label'     => esc_html__('Author Name', 'matrik-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'matrik-core'),
                'name'     => 'matrik_team_style_five_genaral_author_name_typ',
                'selector' => '{{WRAPPER}} .team-card .team-content-wrap .team-content h5',

            ]
        );

        $this->add_control(
            'matrik_team_style_five_genaral_author_name_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .team-card .team-content-wrap .team-content h5' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_team_style_five_genaral_author_name_bg_color',
            [
                'label'     => esc_html__('Background Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .team-card .team-content-wrap .team-content h5' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_team_style_five_genaral_social_plus_icon',
            [
                'label'     => esc_html__('Social Plus Icon', 'matrik-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'matrik-core'),
                'name'     => 'matrik_team_style_five_genaral_social_plus_icon_typ',
                'selector' => '{{WRAPPER}} .team-card .social-btn .icon i',

            ]
        );

        $this->add_control(
            'matrik_team_style_five_genaral_social_plus_icon_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .team-card .social-btn .icon i' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_team_style_five_genaral_social_plus_icon_bg_color',
            [
                'label'     => esc_html__('Background Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .team-card .social-btn .icon' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_team_style_five_genaral_social_title',
            [
                'label'     => esc_html__('Social Title', 'matrik-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'matrik-core'),
                'name'     => 'matrik_team_style_five_genaral_social_title_typ',
                'selector' => '{{WRAPPER}} .team-card .social-btn .social-area > span',

            ]
        );

        $this->add_control(
            'matrik_team_style_five_genaral_social_title_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .team-card .social-btn .social-area > span' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_team_style_five_genaral_social_title_hover_color',
            [
                'label'     => esc_html__('Hover Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .team-card.three .social-area:hover > span' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_team_style_five_genaral_social_title_border_color',
            [
                'label'     => esc_html__('Border Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .team-card .social-btn .social-area > span' => 'border: 1px solid {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_team_style_five_genaral_social_title_border_hover_color',
            [
                'label'     => esc_html__('Hover Border Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .team-card.three .social-area:hover > span' => 'border-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_team_style_five_genaral_social_title_bg_color',
            [
                'label'     => esc_html__('Background Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .team-card .social-btn .social-area > span' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_team_style_five_genaral_social_title_hover_bg_color',
            [
                'label'     => esc_html__('Hover Background Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .team-card.three .social-area:hover > span' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_team_style_five_genaral_social_icon',
            [
                'label'     => esc_html__('Social Icon', 'matrik-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'matrik-core'),
                'name'     => 'matrik_team_style_five_genaral_social_icon_typ',
                'selector' => '{{WRAPPER}} .team-card .social-btn .social-area:hover .icon span i',

            ]
        );

        $this->add_control(
            'matrik_team_style_five_genaral_social_icon_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .team-card .social-btn .social-area:hover .icon span i' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_team_style_five_genaral_social_hover_icon_color',
            [
                'label'     => esc_html__('Hover Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .team-card.three .social-area:hover .icon span i' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_team_style_five_genaral_social_icon_bg_color',
            [
                'label'     => esc_html__('Background Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .team-card .social-btn .social-area .icon span' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_team_style_five_genaral_social_icon_hover_bg_color',
            [
                'label'     => esc_html__('Hover Background Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .team-card.three .social-area:hover .icon span' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section();

        //style start

        $this->start_controls_section(
            'matrik_team_style_two_genaral',
            [
                'label'     => esc_html__('Styles', 'matrik-core'),
                'tab'       => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'matrik_team_genaral_style_selection' => ['style_two'],
                ]
            ]
        );

        $this->add_control(
            'matrik_team_style_two_genaral_subtitle',
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
                'name'     => 'matrik_team_style_two_genaral_subtitle_typ',
                'selector' => '{{WRAPPER}} .section-title.two span',

            ]
        );

        $this->add_control(
            'matrik_team_style_two_genaral_subtitle_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .section-title.two span' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_team_style_two_genaral_subtitle_bg_color',
            [
                'label'     => esc_html__('Background Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .section-title.two span' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_team_style_two_genaral_title',
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
                'name'     => 'matrik_team_style_two_genaral_title_typ',
                'selector' => '{{WRAPPER}} .section-title h2',

            ]
        );

        $this->add_control(
            'matrik_team_style_two_genaral_title_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .section-title h2' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_team_style_two_genaral_author_ddesignation',
            [
                'label'     => esc_html__('Author Designation', 'matrik-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'matrik-core'),
                'name'     => 'matrik_team_style_two_genaral_author_ddesignation_typ',
                'selector' => '{{WRAPPER}} .team-card .team-content-wrap .team-content span',

            ]
        );

        $this->add_control(
            'matrik_team_style_two_genaral_author_ddesignation_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .team-card .team-content-wrap .team-content span' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_team_style_two_genaral_author_ddesignation_bg_color',
            [
                'label'     => esc_html__('Background Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .team-card .team-content-wrap .team-content span' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_team_style_two_genaral_author_name',
            [
                'label'     => esc_html__('Author Name', 'matrik-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'matrik-core'),
                'name'     => 'matrik_team_style_two_genaral_author_name_typ',
                'selector' => '{{WRAPPER}} .team-card .team-content-wrap .team-content h5',

            ]
        );

        $this->add_control(
            'matrik_team_style_two_genaral_author_name_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .team-card .team-content-wrap .team-content h5' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_team_style_two_genaral_author_name_bg_color',
            [
                'label'     => esc_html__('Background Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .team-card .team-content-wrap .team-content h5' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_team_style_two_genaral_social_plus_icon',
            [
                'label'     => esc_html__('Social Plus Icon', 'matrik-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'matrik-core'),
                'name'     => 'matrik_team_style_two_genaral_social_plus_icon_typ',
                'selector' => '{{WRAPPER}} .team-card .social-btn .icon i',

            ]
        );

        $this->add_control(
            'matrik_team_style_two_genaral_social_plus_icon_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .team-card .social-btn .icon i' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_team_style_two_genaral_social_plus_icon_bg_color',
            [
                'label'     => esc_html__('Background Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .team-card .social-btn .icon' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_team_style_two_genaral_social_title',
            [
                'label'     => esc_html__('Social Title', 'matrik-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'matrik-core'),
                'name'     => 'matrik_team_style_two_genaral_social_title_typ',
                'selector' => '{{WRAPPER}} .team-card .social-btn .social-area > span',

            ]
        );

        $this->add_control(
            'matrik_team_style_two_genaral_social_title_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .team-card .social-btn .social-area > span' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_team_style_two_genaral_social_title_hover_color',
            [
                'label'     => esc_html__('Hover Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .team-card .social-btn .social-area:hover > span' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_team_style_two_genaral_social_title_border_color',
            [
                'label'     => esc_html__('Border Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .team-card .social-btn .social-area > span' => 'border: 1px solid {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_team_style_two_genaral_social_title_border_hover_color',
            [
                'label'     => esc_html__('Hover Border Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .team-card .social-btn .social-area:hover > span' => 'border-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_team_style_two_genaral_social_title_bg_color',
            [
                'label'     => esc_html__('Background Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .team-card .social-btn .social-area > span' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_team_style_two_genaral_social_title_hover_bg_color',
            [
                'label'     => esc_html__('Hover Background Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .team-card .social-btn .social-area:hover > span' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_team_style_two_genaral_social_icon',
            [
                'label'     => esc_html__('Social Icon', 'matrik-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'matrik-core'),
                'name'     => 'matrik_team_style_two_genaral_social_icon_typ',
                'selector' => '{{WRAPPER}} .team-card .social-btn .social-area .icon span i',

            ]
        );

        $this->add_control(
            'matrik_team_style_two_genaral_social_icon_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .team-card .social-btn .social-area .icon span i' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_team_style_two_genaral_social_hover_icon_color',
            [
                'label'     => esc_html__('Hover Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .team-card .social-btn .social-area:hover .icon span i' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_team_style_two_genaral_social_icon_border_color',
            [
                'label'     => esc_html__('Border Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .team-card .social-btn .social-area .icon' => 'border: 1px solid {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_team_style_two_genaral_social_icon_hover_border_color',
            [
                'label'     => esc_html__('Hover Border Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .team-card .social-btn .social-area:hover .icon' => 'border-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_team_style_two_genaral_social_icon_bg_color',
            [
                'label'     => esc_html__('Background Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .team-card .social-btn .social-area .icon span' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_team_style_two_genaral_social_icon_hover_bg_color',
            [
                'label'     => esc_html__('Hover Background Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .team-card .social-btn .social-area:hover .icon span' => 'background-color: {{VALUE}};',
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
                var swiper = new Swiper(".home2-team-slider", {
                    slidesPerView: 1,
                    speed: 1500,
                    spaceBetween: 24,
                    autoplay: {
                        delay: 2500, // Autoplay duration in milliseconds
                        disableOnInteraction: false,
                    },
                    pagination: {
                        el: ".swiper-pagination1",
                        clickable: true,
                    },
                    navigation: {
                        nextEl: ".team-slider-next",
                        prevEl: ".team-slider-prev",
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

                var swiper = new Swiper(".home3-team-slider", {
                    slidesPerView: 1,
                    speed: 1500,
                    spaceBetween: 0,
                    autoplay: {
                        delay: 2500, // Autoplay duration in milliseconds
                        disableOnInteraction: false,
                    },
                    pagination: {
                        el: ".swiper-pagination1",
                        clickable: true,
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
                            slidesPerView: 3,
                        },
                        992: {
                            slidesPerView: 4,
                        },
                        1200: {
                            slidesPerView: 5,
                        },
                        1400: {
                            slidesPerView: 5,
                        },
                    },
                });
            </script>
        <?php endif; ?>

        <?php if ($settings['matrik_team_genaral_style_selection'] == 'style_one') : ?>
            <div class="home1-team-section">
                <div class=" container">
                    <div class="row justify-content-center mb-70 wow animate fadeInDown" data-wow-delay="200ms" data-wow-duration="1500ms">
                        <div class="col-xl-4 col-lg-5 col-md-8">
                            <div class="section-title text-center">
                                <?php if (!empty($settings['matrik_team_genaral_subtitle'])) : ?>
                                    <span><?php echo esc_html($settings['matrik_team_genaral_subtitle']); ?></span>
                                <?php endif; ?>
                                <?php if (!empty($settings['matrik_team_genaral_title'])) : ?>
                                    <h2><?php echo esc_html($settings['matrik_team_genaral_title']); ?></h2>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                    <ul class="team-list">
                        <?php foreach ($settings['matrik_team_genaral_author_list'] as $data) : ?>
                            <li class="single-item wow animate fadeInDown" data-wow-delay="200ms" data-wow-duration="1500ms">
                                <div class="team-name-and-desig">
                                    <?php if (!empty($data['matrik_team_genaral_author_designation'])) : ?>
                                        <span><?php echo esc_html($data['matrik_team_genaral_author_designation']); ?></span>
                                    <?php endif; ?>
                                    <?php if (!empty($data['matrik_team_genaral_author_name'])) : ?>
                                        <h4><?php echo esc_html($data['matrik_team_genaral_author_name']); ?></h4>
                                    <?php endif; ?>
                                </div>
                                <?php if (!empty($data['matrik_team_genaral_author_image']['url'])) : ?>
                                    <div class="team-img">
                                        <img src="<?php echo esc_url($data['matrik_team_genaral_author_image']['url']); ?>" alt="<?php echo esc_attr__('author-image', 'matrik-core'); ?>">
                                    </div>
                                <?php endif; ?>

                                <a href="<?php echo esc_url($data['matrik_team_genaral_author_social_title_link']['url']); ?>" class="social-area">
                                    <?php if (!empty($data['matrik_team_genaral_author_social_icon'])) : ?>
                                        <div class="icon">
                                            <span><?php \Elementor\Icons_Manager::render_icon($data['matrik_team_genaral_author_social_icon'], ['aria-hidden' => 'true']); ?></span>
                                        </div>
                                    <?php endif; ?>
                                    <?php if (!empty($data['matrik_team_genaral_author_social_title'])) : ?>
                                        <span><?php echo esc_html($data['matrik_team_genaral_author_social_title']); ?></span>
                                    <?php endif; ?>
                                </a>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>
        <?php endif; ?>

        <?php if ($settings['matrik_team_genaral_style_selection'] == 'style_two') : ?>
            <div class="home2-team-section">
                <div class="container">
                    <div class="row justify-content-center mb-60 wow animate fadeInDown" data-wow-delay="200ms" data-wow-duration="1500ms">
                        <div class="col-lg-6">
                            <div class="section-title two text-center">
                                <?php if (!empty($settings['matrik_team_genaral_subtitle'])) : ?>
                                    <span><?php echo esc_html($settings['matrik_team_genaral_subtitle']); ?></span>
                                <?php endif; ?>
                                <?php if (!empty($settings['matrik_team_genaral_title'])) : ?>
                                    <h2><?php echo esc_html($settings['matrik_team_genaral_title']); ?></h2>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="swiper home2-team-slider">
                                <div class="swiper-wrapper">
                                    <?php foreach ($settings['matrik_team_genaral_author_list'] as $data) : ?>
                                        <div class="swiper-slide">
                                            <div class="team-card">
                                                <?php if (!empty($data['matrik_team_genaral_author_image']['url'])) : ?>
                                                    <img src="<?php echo esc_url($data['matrik_team_genaral_author_image']['url']); ?>" alt="<?php echo esc_attr__('author-image', 'matrik-core'); ?>">
                                                <?php endif; ?>
                                                <div class="team-content-wrap">
                                                    <div class="team-content">
                                                        <?php if (!empty($data['matrik_team_genaral_author_designation'])) : ?>
                                                            <span><?php echo esc_html($data['matrik_team_genaral_author_designation']); ?></span>
                                                        <?php endif; ?>
                                                        <?php if (!empty($data['matrik_team_genaral_author_name'])) : ?>
                                                            <h5><?php echo esc_html($data['matrik_team_genaral_author_name']); ?></h5>
                                                        <?php endif; ?>
                                                    </div>
                                                    <div class="social-btn">
                                                        <div class="icon">
                                                            <i class="bi bi-plus"></i>
                                                        </div>
                                                        <a href="<?php echo esc_url($data['matrik_team_genaral_author_social_title_link']['url']); ?>" class="social-area">
                                                            <?php if (!empty($data['matrik_team_genaral_author_social_icon'])) : ?>
                                                                <div class="icon">
                                                                    <span><?php \Elementor\Icons_Manager::render_icon($data['matrik_team_genaral_author_social_icon'], ['aria-hidden' => 'true']); ?></span>
                                                                </div>
                                                            <?php endif; ?>
                                                            <?php if (!empty($data['matrik_team_genaral_author_social_title'])) : ?>
                                                                <span><?php echo esc_html($data['matrik_team_genaral_author_social_title']); ?></span>
                                                            <?php endif; ?>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row pt-50">
                        <div class="col-lg-12 d-flex justify-content-center">
                            <div class="pagination-area">
                                <div class="pagination swiper-pagination1"></div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        <?php endif; ?>

        <?php if ($settings['matrik_team_genaral_style_selection'] == 'style_three') : ?>
            <div class="home3-team-section" <?php if (!empty($settings['matrik_team_genaral_three_bg_image']['url'])) : ?> style="background-image: url(<?php echo esc_url($settings['matrik_team_genaral_three_bg_image']['url']); ?>);" <?php endif; ?>>
                <div class="container">
                    <?php if ($settings['matrik_team_genaral_header_switcher'] == 'yes') : ?>
                        <div class="row gy-md-5 gy-4 align-items-center justify-content-between mb-70">
                            <?php if (!empty($settings['matrik_team_genaral_title'])) : ?>
                                <div class="col-lg-6 wow animate fadeInLeft" data-wow-delay="200ms" data-wow-duration="1500ms">
                                    <div class="section-title two">
                                        <h2><?php echo esc_html($settings['matrik_team_genaral_title']); ?></h2>
                                    </div>
                                </div>
                            <?php endif; ?>
                            <?php if (!empty($settings['matrik_team_three_genaral_button_text'])) : ?>
                                <div class="col-lg-3 d-flex justify-content-lg-end btn_wrapper">
                                    <a class="primary-btn2 two" href="<?php echo esc_url($settings['matrik_team_three_genaral_button_text_url']['url']); ?>">
                                        <span><?php echo esc_html($settings['matrik_team_three_genaral_button_text']); ?></span>
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
                    <?php endif; ?>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="swiper home3-team-slider">
                                <div class="swiper-wrapper">
                                    <?php foreach ($settings['matrik_team_genaral_author_list'] as $data) : ?>
                                        <div class="swiper-slide">
                                            <div class="team-card2">
                                                <div class="team-img">
                                                    <?php if (!empty($data['matrik_team_genaral_author_image']['url'])) : ?>
                                                        <img src="<?php echo esc_url($data['matrik_team_genaral_author_image']['url']); ?>" alt="<?php echo esc_attr__('author-image', 'matrik-core'); ?>">
                                                    <?php endif; ?>
                                                    <div class="social-wrap">
                                                        <a href="<?php echo esc_url($data['matrik_team_genaral_author_social_title_link']['url']); ?>" class="social-area">
                                                            <?php if (!empty($data['matrik_team_genaral_author_social_icon'])) : ?>
                                                                <div class="icon">
                                                                    <span><?php \Elementor\Icons_Manager::render_icon($data['matrik_team_genaral_author_social_icon'], ['aria-hidden' => 'true']); ?></span>
                                                                </div>
                                                            <?php endif; ?>
                                                            <?php if (!empty($data['matrik_team_genaral_author_social_title'])) : ?>
                                                                <span><?php echo esc_html($data['matrik_team_genaral_author_social_title']); ?></span>
                                                            <?php endif; ?>
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="team-content">
                                                    <?php if (!empty($data['matrik_team_genaral_author_designation'])) : ?>
                                                        <span><?php echo esc_html($data['matrik_team_genaral_author_designation']); ?></span>
                                                    <?php endif; ?>
                                                    <?php if (!empty($data['matrik_team_genaral_author_name'])) : ?>
                                                        <h5><?php echo esc_html($data['matrik_team_genaral_author_name']); ?></h5>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php if (!empty($settings['matrik_team_genaral_bottom_text'])) : ?>
                        <div class="team-bottom-area">
                            <h6><?php echo wp_kses($settings['matrik_team_genaral_bottom_text'], wp_kses_allowed_html('post'));  ?></h6>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        <?php endif; ?>

        <?php if ($settings['matrik_team_genaral_style_selection'] == 'style_four') : ?>
            <div class="home6-team-section">
                <div class="container">
                    <div class="row justify-content-center mb-60 wow animate fadeInDown" data-wow-delay="200ms" data-wow-duration="1500ms" style="visibility: visible; animation-duration: 1500ms; animation-delay: 200ms;">
                        <div class="col-lg-8">
                            <div class="section-title five text-center">
                                <?php if (!empty($settings['matrik_team_genaral_subtitle'])) : ?>
                                    <span><?php echo esc_html($settings['matrik_team_genaral_subtitle']); ?></span>
                                <?php endif; ?>
                                <?php if (!empty($settings['matrik_team_genaral_title'])) : ?>
                                    <h2><?php echo esc_html($settings['matrik_team_genaral_title']); ?></h2>
                                <?php endif; ?>
                                <?php if (!empty($settings['matrik_team_genaral_description'])) : ?>
                                    <p><?php echo esc_html($settings['matrik_team_genaral_description']); ?></p>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                    <div class="team-slider-area">
                        <div class="row">
                            <div class="col-lg-12">
                                <?php if (!empty($settings['matrik_team_genaral_author_list'])) : ?>
                                    <div class="swiper home2-team-slider swiper-initialized swiper-horizontal swiper-backface-hidden">
                                        <div class="swiper-wrapper" id="swiper-wrapper-010b7f5fc41035233b" aria-live="off" style="transition-duration: 1500ms; transform: translate3d(-330px, 0px, 0px);">
                                            <?php foreach ($settings['matrik_team_genaral_author_list'] as $data) : ?>
                                                <div class="swiper-slide swiper-slide-prev" style="width: 306px; margin-right: 24px;" role="group" aria-label="1 / 6">
                                                    <div class="team-card two">
                                                        <img src="<?php echo esc_url($data['matrik_team_genaral_author_image']['url']); ?>" alt="">
                                                        <div class="team-content-wrap">
                                                            <div class="team-content">
                                                                <span><?php echo esc_html($data['matrik_team_genaral_author_designation']); ?></span>
                                                                <h5><?php echo esc_html($data['matrik_team_genaral_author_name']); ?></h5>
                                                            </div>
                                                        </div>
                                                        <div class="social-btn">
                                                            <div class="icon">
                                                                <i class="bi bi-plus"></i>
                                                            </div>
                                                            <a href="<?php echo esc_url($data['matrik_team_genaral_author_social_title_link']['url']); ?>" class="social-area">
                                                                <span><?php echo esc_html($data['matrik_team_genaral_author_social_title']); ?></span>
                                                                <div class="icon">
                                                                    <span><?php \Elementor\Icons_Manager::render_icon($data['matrik_team_genaral_author_social_icon'], ['aria-hidden' => 'true']); ?></span>
                                                                </div>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php endforeach; ?>
                                        </div>
                                        <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                    <div class="slider-btn-grp four wow animate fadeInUp" data-wow-delay="200ms" data-wow-duration="1500ms" style="visibility: visible; animation-duration: 1500ms; animation-delay: 200ms;">
                        <div class="slider-btn team-slider-prev" tabindex="0" role="button" aria-label="Previous slide" aria-controls="swiper-wrapper-010b7f5fc41035233b" aria-disabled="false">
                            <i class="bi bi-arrow-left"></i>
                        </div>
                        <?php if (!empty($settings['matrik_team_genaral_bottom_text'])): ?>
                            <h6><?php echo wp_kses($settings['matrik_team_genaral_bottom_text'], wp_kses_allowed_html('post')); ?></h6>
                        <?php endif; ?>
                        <div class="slider-btn team-slider-next" tabindex="0" role="button" aria-label="Next slide" aria-controls="swiper-wrapper-010b7f5fc41035233b" aria-disabled="false">
                            <i class="bi bi-arrow-right"></i>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>


        <?php if ($settings['matrik_team_genaral_style_selection'] == 'style_five') : ?>
            <div class="team-page" id="scroll-section">
                <div class="container">
                    <div class="row gy-5">
                        <?php foreach ($settings['matrik_team_genaral_author_list'] as $data) : ?>
                            <div class="col-xl-3 col-lg-4 col-md-6 wow animate fadeInDown" data-wow-delay="200ms" data-wow-duration="1500ms">
                                <div class="team-card three magnetic-item">
                                    <?php if (!empty($data['matrik_team_genaral_author_image']['url'])) : ?>
                                        <img src="<?php echo esc_url($data['matrik_team_genaral_author_image']['url']); ?>" alt="<?php echo esc_attr__('team-image', 'matrik-core'); ?>">
                                    <?php endif; ?>
                                    <div class="team-content-wrap">
                                        <div class="team-content">
                                            <?php if (!empty($data['matrik_team_genaral_author_designation'])) : ?>
                                                <span><?php echo esc_html($data['matrik_team_genaral_author_designation']); ?></span>
                                            <?php endif; ?>
                                            <?php if (!empty($data['matrik_team_genaral_author_name'])) : ?>
                                                <h5><?php echo esc_html($data['matrik_team_genaral_author_name']); ?></h5>
                                            <?php endif; ?>
                                        </div>
                                        <div class="social-btn">
                                            <div class="icon">
                                                <i class="bi bi-plus"></i>
                                            </div>
                                            <a href="<?php echo esc_url($data['matrik_team_genaral_author_social_title_link']['url']); ?>" class="social-area">
                                                <?php if (!empty($data['matrik_team_genaral_author_social_title'])) : ?>
                                                    <span><?php echo esc_html($data['matrik_team_genaral_author_social_title']); ?></span>
                                                <?php endif; ?>
                                                <?php if (!empty($data['matrik_team_genaral_author_social_icon'])) : ?>
                                                    <div class="icon">
                                                        <span><?php \Elementor\Icons_Manager::render_icon($data['matrik_team_genaral_author_social_icon'], ['aria-hidden' => 'true']); ?></span>
                                                    </div>
                                                <?php endif; ?>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        <?php endif; ?>


<?php

    }
}

Plugin::instance()->widgets_manager->register(new Matrik_Team_Widget());
