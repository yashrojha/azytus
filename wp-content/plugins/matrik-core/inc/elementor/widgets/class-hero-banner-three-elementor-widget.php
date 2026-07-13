<?php

namespace Elementor;

if (!defined('ABSPATH')) exit;  // Exit if accessed directly

use Elementor\core\Schemes;
use Egns_Core\Egns_Helper;

class Matrik_Hero_Banner_Three_Widget extends Widget_Base
{

    public function get_name()
    {
        return 'matrik_hero_banner_three';
    }

    public function get_title()
    {
        return esc_html__('EG Hero Banner Three', 'matrik-core');
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
            'matrik_hero_banner_three_genaral',
            [
                'label' => esc_html__('General', 'matrik-core')
            ]
        );

        $this->add_control(
            'matrik_hero_banner_three_genaral_background_image',
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
            'matrik_hero_banner_three_genaral_banner_image',
            [
                'label' => esc_html__('Banner Image', 'matrik-core'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
                'media_types' => ['image'],
            ]
        );

        $this->add_control(
            'matrik_hero_banner_three_genaral_header_subtitle',
            [
                'label'       => esc_html__('Header Subtitle', 'matrik-core'),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default'     => esc_html__('Crafting excellence', 'matrik-core'),
                'placeholder' => esc_html__('write your subtitle here', 'matrik-core'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'matrik_hero_banner_three_genaral_header_title',
            [
                'label'       => esc_html__('Header Title', 'matrik-core'),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default' => wp_kses('Leading The Way <span>The Future</span> Of Industry', wp_kses_allowed_html('post')),
                'placeholder' => esc_html__('write your title here', 'matrik-core'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'matrik_hero_banner_three_genaral_show_video_area',
            [
                'label' => esc_html__("Show Video Button?", 'matrik-core'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Yes', 'matrik-core'),
                'label_off' => esc_html__('No', 'matrik-core'),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );

        $this->add_control(
            'matrik_hero_banner_three_genaral_video_area',
            [
                'label'     => esc_html__('Video Area', 'matrik-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_control(
            'matrik_hero_banner_three_genaral_video_area_select_type',
            [
                'label'   => esc_html__('Select Type', 'matrik-core'),
                'type'    => Controls_Manager::SELECT,
                'options' => [
                    'upload' => esc_html__('Upload', 'matrik-core'),
                    'url' => esc_html__('URL', 'matrik-core'),
                ],
                'default' => 'url',
            ]
        );

        $this->add_control(
            'matrik_hero_banner_three_genaral_video_area_video',
            [
                'label' => esc_html__('Choose Video File', 'matrik-core'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'media_types' => ['video'],
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
                'condition' => [
                    'matrik_hero_banner_three_genaral_video_area_select_type' => ['upload'],
                ]
            ]
        );

        $this->add_control(
            'matrik_hero_banner_three_genaral_video_area_link',
            [
                'label'   => esc_html__('Video URL/Link', 'matrik-core'),
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
                    'matrik_hero_banner_three_genaral_video_area_select_type' => ['url'],
                ]
            ]
        );

        $this->add_control(
            'matrik_hero_banner_three_genaral_video_description',
            [
                'label'       => esc_html__('Video Description', 'matrik-core'),
                'type'        => \Elementor\Controls_Manager::TEXTAREA,
                'default'     => esc_html__('Sed nisl eros, condimentum nec risus sit amet, finibus conguese.Fusen fringilla est libero, sed tempus urna feugiat eu. Curabitur eu feugiat ligu Suspendisse nectoraba porttitor velit go this week and more about.', 'matrik-core'),
                'placeholder' => esc_html__('write your subtitle here', 'matrik-core'),
                'label_block' => true,
            ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'matrik_hero_banner_three_genaral_button_switcher',
            [
                'label' => esc_html__("Select Button Style", 'matrik-core'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Style One', 'matrik-core'),
                'label_off' => esc_html__('Style Two', 'matrik-core'),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );

        $repeater->add_control(
            'matrik_hero_banner_three_genaral_button_text',
            [
                'label'       => esc_html__('Button Text', 'matrik-core'),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default'     => esc_html__('About Us More', 'matrik-core'),
                'placeholder' => esc_html__('write your text here', 'matrik-core'),
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'matrik_hero_banner_three_genaral_button_text_url',
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

        $this->add_control(
            'matrik_hero_banner_three_genaral_button_list',
            [
                'label' => esc_html__('Button List', 'matrik-core'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'matrik_hero_banner_three_genaral_button_text' => esc_html('About Us More'),
                    ],
                    [
                        'matrik_hero_banner_three_genaral_button_text' => esc_html('View Our Work'),
                    ],

                ],
                'title_field' => '{{{ matrik_hero_banner_three_genaral_button_text }}}',
            ]
        );

        $this->end_controls_section();

        //style start

        $this->start_controls_section(
            'matrik_hero_banner_three_style_genaral',
            [
                'label'     => esc_html__('Styles', 'matrik-core'),
                'tab'       => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'matrik_hero_banner_three_style_genaral_subtitle',
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
                'name'     => 'matrik_hero_banner_three_style_genaral_subtitle_typ',
                'selector' => '{{WRAPPER}} .home3-banner-section .banner-content > span',

            ]
        );

        $this->add_control(
            'matrik_hero_banner_three_style_genaral_subtitle_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home3-banner-section .banner-content > span' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_hero_banner_three_style_genaral_subtitle_bg_color',
            [
                'label'     => esc_html__('Background Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home3-banner-section .banner-content > span' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_hero_banner_three_style_genaral_title',
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
                'name'     => 'matrik_hero_banner_three_style_genaral_title_typ',
                'selector' => '{{WRAPPER}} .home3-banner-section .banner-content h1',

            ]
        );

        $this->add_control(
            'matrik_hero_banner_three_style_genaral_title_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home3-banner-section .banner-content h1' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_hero_banner_three_style_genaral_title_second_color',
            [
                'label'     => esc_html__('Second Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home3-banner-section .banner-content h1 span' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_hero_banner_three_style_genaral_video_description',
            [
                'label'     => esc_html__('Video Description', 'matrik-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'matrik-core'),
                'name'     => 'matrik_hero_banner_three_style_genaral_video_description_typ',
                'selector' => '{{WRAPPER}} .home3-banner-section .banner-content .video-and-content .content p',

            ]
        );

        $this->add_control(
            'matrik_hero_banner_three_style_genaral_video_description_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home3-banner-section .banner-content .video-and-content .content p' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_hero_banner_three_style_genaral_video_description_icon_color',
            [
                'label'     => esc_html__('Icon Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home3-banner-section .banner-content .video-and-content .content p::before' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_hero_banner_three_style_genaral_video_icon',
            [
                'label'     => esc_html__('Video Icon', 'matrik-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'matrik-core'),
                'name'     => 'matrik_hero_banner_three_style_genaral_video_icon_typ',
                'selector' => '{{WRAPPER}} matrik_hero_banner_three_style_genaral_video_icon',

            ]
        );

        $this->add_control(
            'matrik_hero_banner_three_style_genaral_video_icon_outside_color',
            [
                'label'     => esc_html__('Outside Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home3-banner-section .banner-content .video-and-content .video-area .icon .video-circle' => 'stroke: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_hero_banner_three_style_genaral_video_icon_inside_color',
            [
                'label'     => esc_html__('Inside Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home3-banner-section .banner-content .video-and-content .video-area .icon .play-icon' => 'fill: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_hero_banner_three_style_genaral_button_one',
            [
                'label'     => esc_html__('Button One', 'matrik-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'matrik-core'),
                'name'     => 'matrik_hero_banner_three_style_genaral_button_one_typ',
                'selector' => '{{WRAPPER}} .primary-btn3.black-bg',

            ]
        );

        $this->add_control(
            'matrik_hero_banner_three_style_genaral_button_one_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .primary-btn3.black-bg' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_hero_banner_three_style_genaral_button_one_hover_color',
            [
                'label'     => esc_html__('Hover Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .primary-btn3.black-bg:hover' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_hero_banner_three_style_genaral_button_one_icon_color',
            [
                'label'     => esc_html__('Icon Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .primary-btn3.black-bg .arrow' => 'fill: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_hero_banner_three_style_genaral_button_one_hover_icon_color',
            [
                'label'     => esc_html__('Hover Icon Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .primary-btn3.black-bg:hover .arrow' => 'fill: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_hero_banner_three_style_genaral_button_one_bg_color',
            [
                'label'     => esc_html__('Background Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .primary-btn3.black-bg' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_hero_banner_three_style_genaral_button_one_bg_hover_color',
            [
                'label'     => esc_html__('Hover Background Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .primary-btn3.black-bg::after' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_hero_banner_three_style_genaral_button_two',
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
                'name'     => 'matrik_hero_banner_three_style_genaral_button_two_typ',
                'selector' => '{{WRAPPER}} .primary-btn3.transparent',

            ]
        );

        $this->add_control(
            'matrik_hero_banner_three_style_genaral_button_two_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .primary-btn3.transparent' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_hero_banner_three_style_genaral_button_two_hover_color',
            [
                'label'     => esc_html__('Hover Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .primary-btn3.transparent:hover' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_hero_banner_three_style_genaral_button_two_icon_color',
            [
                'label'     => esc_html__('Icon Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .primary-btn3 .arrow ' => 'fill: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_hero_banner_three_style_genaral_button_two_hover_icon_color',
            [
                'label'     => esc_html__('Hover Icon Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .primary-btn3.transparent:hover .arrow' => 'fill: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_hero_banner_three_style_genaral_button_two_border_color',
            [
                'label'     => esc_html__('Border Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .primary-btn3.transparent' => 'border: 1px solid {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_hero_banner_three_style_genaral_button_two_hover_order_color',
            [
                'label'     => esc_html__('Hover Border Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .primary-btn3.transparent:hover' => 'border-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_hero_banner_three_style_genaral_button_two_bg_color',
            [
                'label'     => esc_html__('Background Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .primary-btn3.transparent' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_hero_banner_three_style_genaral_button_two_bg_hover_color',
            [
                'label'     => esc_html__('Hover Background Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .primary-btn3.transparent::after' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section();
    }
    protected function render()
    {

        $settings = $this->get_settings_for_display();

?>

        <div class="home3-banner-section" <?php if (!empty($settings['matrik_hero_banner_three_genaral_background_image']['url'])) : ?> style="background-image: url(<?php echo esc_url($settings['matrik_hero_banner_three_genaral_background_image']['url']); ?>);" <?php endif; ?>>
            <div class="container-fluid">
                <div class="banner-wrapper">
                    <?php if (!empty($settings['matrik_hero_banner_three_genaral_banner_image']['url'])) : ?>
                        <div class="banner-img magnetic-item btn_wrapper">
                            <img src="<?php echo esc_url($settings['matrik_hero_banner_three_genaral_banner_image']['url']); ?>" alt="<?php echo esc_attr__('banner-image', 'matrik-core'); ?>">
                        </div>
                    <?php endif; ?>
                    <div class="banner-content">
                        <?php if (!empty($settings['matrik_hero_banner_three_genaral_header_subtitle'])) : ?>
                            <span><?php echo esc_html($settings['matrik_hero_banner_three_genaral_header_subtitle']); ?></span>
                        <?php endif; ?>
                        <?php if (!empty($settings['matrik_hero_banner_three_genaral_header_title'])) : ?>
                            <h1><?php echo wp_kses($settings['matrik_hero_banner_three_genaral_header_title'], wp_kses_allowed_html('post'))  ?></h1>
                        <?php endif; ?>
                        <div class="video-and-content">
                            <?php if ($settings['matrik_hero_banner_three_genaral_show_video_area'] == 'yes') : ?>
                                <a data-fancybox="video-player" href="<?php if ($settings['matrik_hero_banner_three_genaral_video_area_select_type'] == 'video') : ?><?php echo esc_url($settings['matrik_hero_banner_three_genaral_video_area_video']['url']); ?><?php elseif ($settings['matrik_hero_banner_three_genaral_video_area_select_type'] == 'url') : ?><?php echo esc_url($settings['matrik_hero_banner_three_genaral_video_area_link']['url']); ?><?php endif; ?>" class="video-area">
                                    <div class="icon">
                                        <svg class="video-circle" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                            x="0px" y="0px" width="77px" viewBox="0 0 206 206" style="enable-background:new 0 0 206 206;" xml:space="preserve">
                                            <circle class="circle" stroke-miterlimit="10" cx="103" cy="103" r="100"></circle>
                                            <path class="circle-half top-half" stroke-width="4" stroke-miterlimit="10"
                                                d="M16.4,53C44,5.2,105.2-11.2,153,16.4s64.2,88.8,36.6,136.6"></path>
                                            <path class="circle-half bottom-half" stroke-width="4" stroke-miterlimit="10"
                                                d="M189.6,153C162,200.8,100.8,217.2,53,189.6S-11.2,100.8,16.4,53"></path>
                                        </svg>
                                        <svg class="play-icon" width="23" height="28" viewBox="0 0 23 28" xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M22.8424 14.2559C22.8424 13.4843 22.4449 12.7737 21.7784 12.3539L3.78608 1.03446C3.05833 0.577358 2.17083 0.543963 1.40902 0.947257C0.649591 1.35033 0.195312 2.09429 0.195312 2.93663V25.5738C0.195312 26.4162 0.649555 27.1599 1.41018 27.5632C1.76475 27.7501 2.14507 27.8431 2.52543 27.8431C2.96275 27.8431 3.39718 27.7197 3.78584 27.476L21.7782 16.1583C22.4449 15.7383 22.8424 15.0277 22.8424 14.2561V14.2559ZM21.1289 15.177L3.13659 26.4947C2.78345 26.7165 2.35329 26.7315 1.98441 26.5376C1.61553 26.3424 1.39473 25.9822 1.39473 25.5736V2.93642C1.39473 2.52778 1.61553 2.16621 1.98441 1.97237C2.15681 1.88239 2.34185 1.83669 2.52569 1.83669C2.73791 1.83669 2.9487 1.8963 3.13685 2.0155L21.1292 13.335C21.4568 13.5414 21.6447 13.8781 21.6447 14.2575C21.6444 14.6356 21.4565 14.9707 21.1289 15.177Z" />
                                        </svg>
                                    </div>
                                </a>
                            <?php endif; ?>
                            <?php if (!empty($settings['matrik_hero_banner_three_genaral_video_description'])) : ?>
                                <div class="content">
                                    <p><?php echo esc_html($settings['matrik_hero_banner_three_genaral_video_description']); ?></p>
                                </div>
                            <?php endif; ?>
                        </div>
                        <div class="btn-grp">
                            <?php foreach ($settings['matrik_hero_banner_three_genaral_button_list'] as $data) : ?>
                                <?php if (!empty($data['matrik_hero_banner_three_genaral_button_text'])) : ?>
                                    <a class="<?php if ($data['matrik_hero_banner_three_genaral_button_switcher'] == 'yes') : ?>  primary-btn3 black-bg<?php else : ?>primary-btn3 transparent<?php endif; ?>" href="<?php echo esc_url($data['matrik_hero_banner_three_genaral_button_text_url']['url']); ?>">
                                        <span><?php echo esc_html($data['matrik_hero_banner_three_genaral_button_text']); ?>
                                        </span>
                                        <span><?php echo esc_html($data['matrik_hero_banner_three_genaral_button_text']); ?>
                                        </span>
                                        <svg class="arrow" width="23" height="23" viewBox="0 0 23 23" xmlns="http://www.w3.org/2000/svg">
                                            <g>
                                                <path d="M0.113861 0H22.9999V4.28425L4.32671 22.9997L0 18.7154L12.7524 6.08815L0.113861 6.20089V0Z" />
                                                <path d="M23 22.9996V8.56848L16.8516 14.6566V22.9996H23Z" />
                                            </g>
                                        </svg>
                                    </a>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>

<?php

    }
}

Plugin::instance()->widgets_manager->register(new Matrik_Hero_Banner_Three_Widget());
