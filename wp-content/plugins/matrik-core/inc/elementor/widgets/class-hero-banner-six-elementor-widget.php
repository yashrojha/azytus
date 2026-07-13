<?php

namespace Elementor;

if (!defined('ABSPATH')) exit;  // Exit if accessed directly

use Elementor\core\Schemes;
use Egns_Core\Egns_Helper;

class Matrik_Hero_Banner_Six_Widget extends Widget_Base
{

    public function get_name()
    {
        return 'matrik_hero_banner_six';
    }

    public function get_title()
    {
        return esc_html__('EG Hero Banner Six', 'matrik-core');
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
            'matrik_hero_banner_six_genaral',
            [
                'label' => esc_html__('General', 'matrik-core')
            ]
        );

        $this->add_control(
            'matrik_hero_banner_six_genaral_background_image',
            [
                'label' => esc_html__('Background Image', 'matrik-core'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
                'media_types' => ['image'],
            ]
        );

        $this->add_control(
            'matrik_hero_banner_six_genaral_title',
            [
                'label'       => esc_html__('Header Title', 'matrik-core'),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default'     => wp_kses('Leading The Way <span>The Future</span> Of Industry', wp_kses_allowed_html('post')),
                'placeholder' => esc_html__('write your title here', 'matrik-core'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'matrik_hero_banner_six_genaral_video',
            [
                'label' => esc_html__('Video', 'matrik-core'),
                'type' => \Elementor\Controls_Manager::URL,
                'default' => [
                    'url' => '#',
                ],
            ]
        );

        $this->add_control(
            'matrik_hero_banner_six_genaral_text',
            [
                'label'       => esc_html__('Hero Text', 'matrik-core'),
                'type'        => \Elementor\Controls_Manager::TEXTAREA,
                'default'     => wp_kses('Sed nisl eros, condimentum nec risus sit amet, finibus conguese.Fusen fringilla est libero, sed tempus urna feugiat eu. Curabitur eu feugiat ligu Suspendisse nectoraba porttitor velit go this week and more about.', wp_kses_allowed_html('post')),
                'placeholder' => esc_html__('write your text here', 'matrik-core'),
                'label_block' => true,
            ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'matrik_hero_banner_six_genaral_button_style',
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

        $repeater->add_control(
            'matrik_hero_banner_six_genaral_button_text',
            [
                'label'       => esc_html__('Button Text', 'matrik-core'),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default'     => esc_html__('About Us More', 'matrik-core'),
                'placeholder' => esc_html__('write your button text here', 'matrik-core'),
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'matrik_hero_banner_six_genaral_button_text_url',
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
            ]
        );

        $this->add_control(
            'matrik_hero_banner_six_genaral_button_list',
            [
                'label' => esc_html__('Button List', 'matrik-core'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'matrik_hero_banner_six_genaral_button_text' => esc_html('About Us More'),
                        'matrik_hero_banner_six_genaral_button_style' => esc_html('style_one'),

                    ],
                    [
                        'matrik_hero_banner_six_genaral_button_text' => esc_html('View our work'),
                        'matrik_hero_banner_six_genaral_button_style' => esc_html('style_two'),

                    ],

                ],
                'title_field' => '{{{ matrik_hero_banner_six_genaral_button_text }}}',
            ]
        );

        $counter_repeater = new \Elementor\Repeater();

        $counter_repeater->add_control(
            'matrik_hero_banner_six_genaral_counter_number',
            [
                'label'       => esc_html__('Counter Number', 'matrik-core'),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default'     => esc_html__('130', 'matrik-core'),
                'placeholder' => esc_html__('write your number here', 'matrik-core'),
                'label_block' => true,
            ]
        );

        $counter_repeater->add_control(
            'matrik_hero_banner_six_genaral_counter_number_letter',
            [
                'label'       => esc_html__('Counter Letter', 'matrik-core'),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'placeholder' => esc_html__('write your letter here', 'matrik-core'),
                'label_block' => true,
            ]
        );

        $counter_repeater->add_control(
            'matrik_hero_banner_six_genaral_counter_text',
            [
                'label'       => esc_html__('Counter Text', 'matrik-core'),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default'     => esc_html__('Project Completed', 'matrik-core'),
                'placeholder' => esc_html__('write your text here', 'matrik-core'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'matrik_hero_banner_six_counter_content_list',
            [
                'label'         => esc_html__('Counter Content List', 'matrik-core'),
                'type'          => \Elementor\Controls_Manager::REPEATER,
                'fields'        => $counter_repeater->get_controls(),
                'default'       => [
                    [
                        'matrik_hero_banner_six_genaral_counter_number' => esc_html('130'),
                        'matrik_hero_banner_six_genaral_counter_text'   => esc_html('Project Completed'),
                    ],
                    [
                        'matrik_hero_banner_six_genaral_counter_number' => esc_html('5'),
                        'matrik_hero_banner_six_genaral_counter_text'   => esc_html('Winning Award')
                    ],
                    [
                        'matrik_hero_banner_six_genaral_counter_number' => esc_html('1'),
                        'matrik_hero_banner_six_genaral_counter_number_letter' => esc_html('K'),
                        'matrik_hero_banner_six_genaral_counter_text'   => esc_html('Awesome Client')
                    ],
                ],
                'title_field'   => '{{{ matrik_hero_banner_six_genaral_counter_text }}}',
            ]
        );

        $this->end_controls_section();

        //style start

        $this->start_controls_section(
            'matrik_hero_banner_six_style_general',
            [
                'label'     => esc_html__('Styles', 'matrik-core'),
                'tab'       => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'matrik_hero_banner_six_style_general_title',
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
                'name'     => 'matrik_hero_banner_six_style_general_title_typ',
                'selector' => '{{WRAPPER}} .home6-banner-section .banner-content h1',

            ]
        );

        $this->add_control(
            'matrik_hero_banner_six_style_general_title_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home6-banner-section .banner-content h1' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Span Text Typography', 'matrik-core'),
                'name'     => 'matrik_hero_banner_six_style_general_title_span_typ',
                'selector' => '{{WRAPPER}} .home6-banner-section .banner-content h1 span',

            ]
        );

        $this->add_control(
            'matrik_hero_banner_six_style_general_title_span_color',
            [
                'label'     => esc_html__('Span Text Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home6-banner-section .banner-content h1 span' => '-webkit-text-stroke-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_hero_banner_six_style_general_desc',
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
                'name'     => 'matrik_hero_banner_six_style_general_desc_typ',
                'selector' => '{{WRAPPER}} .home6-banner-section .banner-content .video-and-content .content p',

            ]
        );

        $this->add_control(
            'matrik_hero_banner_six_style_general_desc_color',
            [
                'label'     => esc_html__('Description Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home6-banner-section .banner-content .video-and-content .content p' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_hero_banner_six_style_general_desc_left_border_color',
            [
                'label'     => esc_html__('Description Left Border Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home6-banner-section .banner-content .video-and-content .content p::before' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_hero_banner_six_style_general_button_one',
            [
                'label'     => esc_html__('Button One', 'matrik-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        // Tabs
        $this->start_controls_tabs(
            'matrik_hero_banner_six_style_general_button_one_tabs'
        );

        $this->start_controls_tab(
            'matrik_hero_banner_six_style_general_button_one_normal_tab',
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
                'name'     => 'matrik_hero_banner_six_style_general_button_one_normal_tab_typ',
                'selector' => '{{WRAPPER}} .primary-btn6',

            ]
        );

        $this->add_control(
            'matrik_hero_banner_six_style_general_button_one_normal_tab_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}}  .primary-btn6' => 'color: {{VALUE}};',

                ],
            ]
        );

        $this->add_control(
            'matrik_hero_banner_six_style_general_button_one_normal_tab_icon_color',
            [
                'label'     => esc_html__('Icon Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}}  .primary-btn6 svg' => 'fill: {{VALUE}};',

                ],
            ]
        );

        $this->add_control(
            'matrik_hero_banner_six_style_general_button_one_normal_tab_background_color',
            [
                'label'     => esc_html__('Background Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}}  .primary-btn6' => 'background: {{VALUE}};',

                ],
            ]
        );

        $this->add_responsive_control(
            'matrik_hero_banner_six_style_general_button_one_normal_tab_margin',
            [
                'label' => esc_html__(
                    'Margin',
                    'matrik-core'
                ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .primary-btn6' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'matrik_hero_banner_six_style_general_button_one_normal_tab_padding',
            [
                'label'      => esc_html__(
                    'Padding',
                    'matrik-core'
                ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .primary-btn6' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        $this->end_controls_tab();

        // Hover start
        $this->start_controls_tab(
            'matrik_hero_banner_six_style_general_button_one_hover_tab',
            [
                'label' => esc_html__('Hover', 'matrik-core'),
            ]
        );

        $this->add_control(
            'matrik_hero_banner_six_style_general_button_one_hover_tab_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}}  .primary-btn6:hover' => 'color: {{VALUE}};',

                ],
            ]
        );

        $this->add_control(
            'matrik_hero_banner_six_style_general_button_one_hover_tab_icon_color',
            [
                'label'     => esc_html__('Icon Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}}  .primary-btn6:hover svg' => 'fill: {{VALUE}};',

                ],
            ]
        );

        $this->add_control(
            'matrik_hero_banner_six_style_general_button_one_hover_tab_background_color',
            [
                'label'     => esc_html__('Background Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .primary-btn6::after' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_tab();
        $this->end_controls_tabs();

        $this->add_control(
            'matrik_hero_banner_six_style_general_button_two',
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
                'name'     => 'matrik_hero_banner_six_style_general_button_two_typ',
                'selector' => '{{WRAPPER}} .primary-btn6.transparent',

            ]
        );

        $this->add_control(
            'matrik_hero_banner_six_style_general_button_two_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}}  .primary-btn6.transparent' => 'color: {{VALUE}};',

                ],
            ]
        );

        $this->add_control(
            'matrik_hero_banner_six_style_general_button_two_hover_color',
            [
                'label'     => esc_html__('Hover Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}}  .primary-btn6.transparent:hover' => 'color: {{VALUE}};',

                ],
            ]
        );


        $this->add_control(
            'matrik_hero_banner_six_style_general_button_two_bg_color',
            [
                'label'     => esc_html__('Background Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}}  .primary-btn6.transparent' => 'background-color: {{VALUE}};',

                ],
            ]
        );

        $this->add_control(
            'matrik_hero_banner_six_style_general_button_two_hover_bg_color',
            [
                'label'     => esc_html__('Hover Background Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}}  .primary-btn6::after' => 'background-color: {{VALUE}};',

                ],
            ]
        );


        $this->add_control(
            'matrik_hero_banner_six_style_general_button_two_icon_color',
            [
                'label'     => esc_html__('Icon Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}}  .primary-btn6.transparent svg' => 'fill: {{VALUE}};',

                ],
            ]
        );

        $this->add_control(
            'matrik_hero_banner_six_style_general_button_two_hover_icon_color',
            [
                'label'     => esc_html__('Hover Icon Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}}  .primary-btn6.transparent:hover svg' => 'fill: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_hero_banner_six_genaral_counter_content',
            [
                'label'     => esc_html__('Counter Content', 'matrik-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Number Typography', 'matrik-core'),
                'name'     => 'matrik_hero_banner_six_style_general_counter_number_typ',
                'selector' => '{{WRAPPER}} .home6-banner-section .counter-list .single-counter .number h2',

            ]
        );

        $this->add_control(
            'matrik_hero_banner_six_style_general_counter_number_typ_color',
            [
                'label'     => esc_html__('Number Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}}  .home6-banner-section .counter-list .single-counter .number h2' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Span Text Typography', 'matrik-core'),
                'name'     => 'matrik_hero_banner_six_style_general_counter_span_text_typ',
                'selector' => '{{WRAPPER}} .home6-banner-section .counter-list .single-counter .number span',

            ]
        );

        $this->add_control(
            'matrik_hero_banner_six_style_general_counter_text_typ_color',
            [
                'label'     => esc_html__('Span Text Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}}  .home6-banner-section .counter-list .single-counter .number span' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Text Typography', 'matrik-core'),
                'name'     => 'matrik_hero_banner_six_style_general_counter_text_typ',
                'selector' => '{{WRAPPER}} .home6-banner-section .counter-list .single-counter .content p',

            ]
        );

        $this->add_control(
            'matrik_hero_banner_six_style_general_counter_span_text_typ_color',
            [
                'label'     => esc_html__('Text Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}}  .home6-banner-section .counter-list .single-counter .content p' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_hero_banner_six_style_general_counter_border_bottom_color',
            [
                'label'     => esc_html__('Border Bottom Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}}  .home6-banner-section .counter-list .single-counter' => 'border-color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section();
    }
    protected function render()
    {

        $settings = $this->get_settings_for_display();
?>
        <div class="home6-banner-section" <?php if (!empty($settings['matrik_hero_banner_six_genaral_background_image']['url'])): ?>style="background-image: url('<?php echo esc_url($settings['matrik_hero_banner_six_genaral_background_image']['url']); ?>');" <?php endif; ?>>
            <div class="container">
                <div class="banner-wrapper">
                    <div class="row gy-5">
                        <div class="col-lg-8">
                            <div class="banner-content">
                                <?php if (!empty($settings['matrik_hero_banner_six_genaral_title'])): ?>
                                    <h1><?php echo wp_kses($settings['matrik_hero_banner_six_genaral_title'], wp_kses_allowed_html('post')); ?></h1>
                                <?php endif; ?>
                                <div class="video-and-content">
                                    <?php if (!empty($settings['matrik_hero_banner_six_genaral_video']['url'])): ?>
                                        <a data-fancybox="video-player" href="<?php echo esc_url($settings['matrik_hero_banner_six_genaral_video']['url']); ?>" class="video-area">
                                            <div class="icon">
                                                <svg class="video-circle" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="77px" viewBox="0 0 206 206" style="enable-background:new 0 0 206 206;" xml:space="preserve">
                                                    <circle class="circle" stroke-miterlimit="10" cx="103" cy="103" r="100"></circle>
                                                    <path class="circle-half top-half" stroke-width="4" stroke-miterlimit="10" d="M16.4,53C44,5.2,105.2-11.2,153,16.4s64.2,88.8,36.6,136.6"></path>
                                                    <path class="circle-half bottom-half" stroke-width="4" stroke-miterlimit="10" d="M189.6,153C162,200.8,100.8,217.2,53,189.6S-11.2,100.8,16.4,53"></path>
                                                </svg>
                                                <svg class="play-icon" width="23" height="28" viewBox="0 0 23 28" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M22.8424 14.2559C22.8424 13.4843 22.4449 12.7737 21.7784 12.3539L3.78608 1.03446C3.05833 0.577358 2.17083 0.543963 1.40902 0.947257C0.649591 1.35033 0.195312 2.09429 0.195312 2.93663V25.5738C0.195312 26.4162 0.649555 27.1599 1.41018 27.5632C1.76475 27.7501 2.14507 27.8431 2.52543 27.8431C2.96275 27.8431 3.39718 27.7197 3.78584 27.476L21.7782 16.1583C22.4449 15.7383 22.8424 15.0277 22.8424 14.2561V14.2559ZM21.1289 15.177L3.13659 26.4947C2.78345 26.7165 2.35329 26.7315 1.98441 26.5376C1.61553 26.3424 1.39473 25.9822 1.39473 25.5736V2.93642C1.39473 2.52778 1.61553 2.16621 1.98441 1.97237C2.15681 1.88239 2.34185 1.83669 2.52569 1.83669C2.73791 1.83669 2.9487 1.8963 3.13685 2.0155L21.1292 13.335C21.4568 13.5414 21.6447 13.8781 21.6447 14.2575C21.6444 14.6356 21.4565 14.9707 21.1289 15.177Z"></path>
                                                </svg>
                                            </div>
                                        </a>
                                    <?php endif; ?>
                                    <?php if (!empty($settings['matrik_hero_banner_six_genaral_text'])): ?>
                                        <div class="content">
                                            <p><?php echo wp_kses($settings['matrik_hero_banner_six_genaral_text'], wp_kses_allowed_html('post')); ?></p>
                                        </div>
                                    <?php endif; ?>
                                </div>
                                <div class="btn-grp">
                                    <?php foreach ($settings['matrik_hero_banner_six_genaral_button_list'] as $btn): ?>
                                        <?php if (!empty($btn['matrik_hero_banner_six_genaral_button_text'])): ?>
                                            <a class="primary-btn6 <?php if ($btn['matrik_hero_banner_six_genaral_button_style'] == 'style_two') {
                                                                        echo ' transparent';
                                                                    } ?>" href="<?php echo esc_url($btn['matrik_hero_banner_six_genaral_button_text_url']['url']); ?>">
                                                <?php echo esc_html($btn['matrik_hero_banner_six_genaral_button_text']); ?>
                                                <svg width="28" height="28" viewBox="0 0 28 28" xmlns="http://www.w3.org/2000/svg">
                                                    <g>
                                                        <path d="M14.1952 0.936056L27.5226 14.2634L25.0277 16.7583L3.25495 16.7829L3.23022 11.7684L18.0098 11.8413L10.5842 4.54707L14.1952 0.936056Z"></path>
                                                        <path d="M14.1298 27.657L22.5336 19.2532L15.4078 19.218L10.5493 24.0765L14.1298 27.657Z"></path>
                                                    </g>
                                                </svg>
                                            </a>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 d-flex justify-content-lg-end">
                            <ul class="counter-list">
                                <?php foreach ($settings['matrik_hero_banner_six_counter_content_list'] as $counter): ?>
                                    <?php if (!empty($counter['matrik_hero_banner_six_genaral_counter_number'])): ?>
                                        <li class="single-counter">
                                            <div class="number">
                                                <h2 class="counter">
                                                    <?php
                                                    if (!empty($counter['matrik_hero_banner_six_genaral_counter_number'])) {
                                                        echo esc_html($counter['matrik_hero_banner_six_genaral_counter_number']);
                                                    }
                                                    ?>
                                                </h2>
                                                <span>
                                                    <?php
                                                    if (!empty($counter['matrik_hero_banner_six_genaral_counter_number_letter'])) {
                                                        echo esc_html($counter['matrik_hero_banner_six_genaral_counter_number_letter']);
                                                    }
                                                    ?>
                                                </span>
                                            </div>
                                            <?php if (!empty($counter['matrik_hero_banner_six_genaral_counter_text'])) : ?>
                                                <div class="content">
                                                    <p><?php echo esc_html($counter['matrik_hero_banner_six_genaral_counter_text']); ?></p>
                                                </div>
                                            <?php endif; ?>
                                        </li>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

<?php

    }
}

Plugin::instance()->widgets_manager->register(new Matrik_Hero_Banner_Six_Widget());
