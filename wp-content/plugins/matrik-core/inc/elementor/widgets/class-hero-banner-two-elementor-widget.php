<?php

namespace Elementor;

if (!defined('ABSPATH')) exit;  // Exit if accessed directly

use Elementor\core\Schemes;
use Egns_Core\Egns_Helper;

class Matrik_Hero_Banner_Two_Widget extends Widget_Base
{

    public function get_name()
    {
        return 'matrik_hero_banner_two';
    }

    public function get_title()
    {
        return esc_html__('EG Hero Banner Two', 'matrik-core');
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
            'matrik_hero_banner_two_genaral',
            [
                'label' => esc_html__('General', 'matrik-core'),
            ]
        );

        $this->add_control(
            'matrik_hero_banner_two_genaral_banner_image',
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
            'matrik_hero_banner_two_genaral_circular_button_show',
            [
                'label' => esc_html__("Show Circular Area?", 'matrik-core'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Enable', 'matrik-core'),
                'label_off' => esc_html__('Disable', 'matrik-core'),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );

        $this->add_control(
            'matrik_hero_banner_two_genaral_circular_button_text_icon',
            [
                'label' => esc_html__('Icon Image', 'matrik-core'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
                'media_types' => ['image', 'svg'],
            ]
        );

        $this->add_control(
            'matrik_hero_banner_two_genaral_circular_button_text',
            [
                'label'       => esc_html__('Circular Text', 'matrik-core'),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default'     => esc_html__(' STRATEGY . DESIGN . BRAND .', 'matrik-core'),
                'placeholder' => esc_html__('write your button text here', 'matrik-core'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'matrik_hero_banner_two_genaral_circular_button_text_url',
            [
                'label'   => esc_html__('Circular URL/Link', 'matrik-core'),
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
            'matrik_hero_banner_two_genaral_title',
            [
                'label'       => esc_html__('Title', 'matrik-core'),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default' => wp_kses('Leading The Way Shaping <span>The Future Of Industry</span>', wp_kses_allowed_html('post')),
                'placeholder' => esc_html__('write your title here', 'matrik-core'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'matrik_hero_banner_two_genaral_description',
            [
                'label'       => esc_html__('Description', 'matrik-core'),
                'type'        => \Elementor\Controls_Manager::TEXTAREA,
                'default'     => esc_html__('Sed nisl eros, condimentum nec risus sit amet, finibus conguese.Fusen fringilla est libero, sed tempus urna feugiat eu. Curabitur eu feugiat ligu Suspendisse nectoraba porttitor velit go this week and more about.', 'matrik-core'),
                'placeholder' => esc_html__('write your button text here', 'matrik-core'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'matrik_hero_banner_two_genaral_button_text',
            [
                'label'       => esc_html__('Button Text', 'matrik-core'),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default'     => esc_html__('About Us More', 'matrik-core'),
                'placeholder' => esc_html__('write your button text here', 'matrik-core'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'matrik_hero_banner_two_genaral_button_text_url',
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
            'matrik_hero_banner_two_genaral_gallery_images',
            [
                'label' => esc_html__('Add Gallery Images', 'matrik-core'),
                'type' => \Elementor\Controls_Manager::GALLERY,
                'show_label' => false,
                'default' => [],
            ]
        );

        $this->add_control(
            'matrik_hero_banner_two_genaral_button_two_text',
            [
                'label'       => esc_html__('Button Text', 'matrik-core'),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default'     => esc_html__('1k People Work with us', 'matrik-core'),
                'placeholder' => esc_html__('write your button text here', 'matrik-core'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'matrik_hero_banner_two_genaral_button_two_text_url',
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
            'matrik_hero_banner_two_style_genaral',
            [
                'label'     => esc_html__('Styles', 'matrik-core'),
                'tab'       => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'matrik_hero_banner_two_style_genaral_title',
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
                'name'     => 'matrik_hero_banner_two_style_genaral_title_typ',
                'selector' => '{{WRAPPER}} .home2-banner-section .banner-content-wrapper .banner-content h1',

            ]
        );

        $this->add_control(
            'matrik_hero_banner_two_style_genaral_title_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home2-banner-section .banner-content-wrapper .banner-content h1' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_hero_banner_two_style_genaral_title_second_color',
            [
                'label'     => esc_html__('Second Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home2-banner-section .banner-content-wrapper .banner-content h1 span' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_hero_banner_two_style_genaral_description',
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
                'name'     => 'matrik_hero_banner_two_style_genaral_description_typ',
                'selector' => '{{WRAPPER}} .home2-banner-section .banner-content-wrapper .banner-content .content p',

            ]
        );

        $this->add_control(
            'matrik_hero_banner_two_style_genaral_description_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home2-banner-section .banner-content-wrapper .banner-content .content p' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_hero_banner_two_style_genaral_button',
            [
                'label'     => esc_html__('Button', 'matrik-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        // Tabs
        $this->start_controls_tabs(
            'matrik_hero_banner_two_style_genaral_button_tabs'
        );

        $this->start_controls_tab(
            'matrik_hero_banner_two_style_genaral_button_tabs_normal_tab',
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
                'name'     => 'matrik_hero_banner_two_style_genaral_button_tabs_normal_tab_typ',
                'selector' => '{{WRAPPER}} .primary-btn3.black-bg',

            ]
        );

        $this->add_control(
            'matrik_hero_banner_two_style_genaral_button_tabs_normal_tab_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .primary-btn3.black-bg' => 'color: {{VALUE}};',

                ],
            ]
        );

        $this->add_control(
            'matrik_hero_banner_two_style_genaral_button_tabs_normal_tab_icon_color',
            [
                'label'     => esc_html__('Icon Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .primary-btn3.black-bg .arrow' => 'fill: {{VALUE}};',

                ],
            ]
        );

        $this->add_control(
            'matrik_hero_banner_two_style_genaral_button_tabs_normal_tab_background_color',
            [
                'label'     => esc_html__('Background Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}}  .primary-btn3.black-bg' => 'background-color: {{VALUE}};',

                ],
            ]
        );

        $this->add_responsive_control(
            'matrik_hero_banner_two_style_genaral_button_tabs_normal_tab_margin',
            [
                'label' => esc_html__(
                    'Margin',
                    'matrik-core'
                ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .primary-btn3.black-bg' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'matrik_hero_banner_two_style_genaral_button_tabs_normal_tab_padding',
            [
                'label'      => esc_html__(
                    'Padding',
                    'matrik-core'
                ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .primary-btn3.black-bg' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        $this->end_controls_tab();

        // Hover start
        $this->start_controls_tab(
            'matrik_hero_banner_two_style_genaral_button_hover_tab',
            [
                'label' => esc_html__('Hover', 'matrik-core'),
            ]
        );

        $this->add_control(
            'matrik_hero_banner_two_style_genaral_button_hover_tab_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}}  .primary-btn3.black-bg:hover' => 'color: {{VALUE}};',

                ],
            ]
        );

        $this->add_control(
            'matrik_hero_banner_two_style_genaral_button_hover_tab_icon_color',
            [
                'label'     => esc_html__('Icon Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}}  .primary-btn3.black-bg:hover .arrow' => 'fill: {{VALUE}};',

                ],
            ]
        );

        $this->add_control(
            'matrik_hero_banner_two_style_genaral_button_hover_tab_background-color',
            [
                'label'     => esc_html__('Background Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .primary-btn3.black-bg::after' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_tab();
        $this->end_controls_tabs();

        $this->add_control(
            'matrik_hero_banner_two_style_genaral_button_two',
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
                'name'     => 'matrik_hero_banner_two_style_genaral_button_two_typ',
                'selector' => '{{WRAPPER}} .home2-banner-section .banner-content-wrapper .banner-content .btn-and-people-area .people-area a',

            ]
        );

        $this->add_control(
            'matrik_hero_banner_two_style_genaral_button_two_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home2-banner-section .banner-content-wrapper .banner-content .btn-and-people-area .people-area a' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_hero_banner_two_style_genaral_circular_text',
            [
                'label'     => esc_html__('Circular Text', 'matrik-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'matrik-core'),
                'name'     => 'matrik_hero_banner_two_style_genaral_circular_text_typ',
                'selector' => '{{WRAPPER}} .home2-banner-section .banner-img .circular-text .text span',

            ]
        );

        $this->add_control(
            'matrik_hero_banner_two_style_genaral_circular_text_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home2-banner-section .banner-img .circular-text .text span' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_hero_banner_two_style_genaral_circular_text_bg_color',
            [
                'label'     => esc_html__('Background Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home2-banner-section .banner-img .circular-text' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_hero_banner_two_style_genaral_circular_text_icon_color',
            [
                'label'     => esc_html__('Icon Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home2-banner-section .banner-img .circular-text .center-icon svg' => 'fill: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_hero_banner_two_style_genaral_circular_text_icon_bg_color',
            [
                'label'     => esc_html__('Icon Background Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home2-banner-section .banner-img .circular-text .center-icon' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section();
    }
    protected function render()
    {

        $settings = $this->get_settings_for_display();
?>
        <div class="home2-banner-section">
            <div class="banner-img">
                <img src="<?php echo esc_url($settings['matrik_hero_banner_two_genaral_banner_image']['url']); ?>" alt="<?php echo esc_attr__('image', 'matrik-core'); ?>">
                <?php if ($settings['matrik_hero_banner_two_genaral_circular_button_show'] == 'yes') : ?>
                    <div class="circular-text">
                        <a href="<?php echo esc_url($settings['matrik_hero_banner_two_genaral_circular_button_text_url']['url']); ?>" class="center-icon">
                            <?php
                            $icon_url = $settings['matrik_hero_banner_two_genaral_circular_button_text_icon']['url'];
                            $icon_path = get_attached_file($settings['matrik_hero_banner_two_genaral_circular_button_text_icon']['id']);
                            if (strtolower(pathinfo($icon_path, PATHINFO_EXTENSION)) === 'svg') {

                                if (file_exists($icon_path)) {
                                    echo file_get_contents($icon_path);
                                }
                            } else {
                            ?>
                                <img src="<?php echo esc_url($icon_url); ?>" alt="<?php echo esc_attr__('icon-image', 'matrik-core'); ?>" />
                            <?php
                            }
                            ?>
                        </a>
                        <?php if (!empty($settings['matrik_hero_banner_two_genaral_circular_button_text'])) : ?>
                            <div class="text">
                                <span>
                                    <?php echo esc_html($settings['matrik_hero_banner_two_genaral_circular_button_text']); ?>
                                </span>
                            </div>
                        <?php endif; ?>
                    </div>
                <?php endif; ?>
            </div>
            <div class="banner-content-wrapper">
                <div class="banner-content wow animate fadeInLeft" data-wow-delay="200ms" data-wow-duration="1500ms">
                    <?php if (!empty($settings['matrik_hero_banner_two_genaral_title'])) : ?>
                        <h1><?php echo wp_kses($settings['matrik_hero_banner_two_genaral_title'], wp_kses_allowed_html('post')); ?></h1>
                    <?php endif; ?>
                    <?php if (!empty($settings['matrik_hero_banner_two_genaral_description'])) : ?>
                        <div class="content">
                            <p><?php echo esc_html($settings['matrik_hero_banner_two_genaral_description']); ?></p>
                        </div>
                    <?php endif; ?>
                    <div class="btn-and-people-area">
                        <?php if (!empty($settings['matrik_hero_banner_two_genaral_button_text'])) : ?>
                            <a class="primary-btn3 black-bg" href="<?php echo esc_url($settings['matrik_hero_banner_two_genaral_button_text_url']['url']); ?>">
                                <span><?php echo esc_html($settings['matrik_hero_banner_two_genaral_button_text']); ?>
                                </span>
                                <span><?php echo esc_html($settings['matrik_hero_banner_two_genaral_button_text']); ?>
                                </span>
                                <svg class="arrow" width="23" height="23" viewBox="0 0 23 23" xmlns="http://www.w3.org/2000/svg">
                                    <g>
                                        <path d="M0.113861 0H22.9999V4.28425L4.32671 22.9997L0 18.7154L12.7524 6.08815L0.113861 6.20089V0Z" />
                                        <path d="M23 22.9996V8.56848L16.8516 14.6566V22.9996H23Z" />
                                    </g>
                                </svg>
                            </a>
                        <?php endif; ?>
                        <svg width="52" height="8" viewBox="0 0 52 8" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M0.333333 4C0.333333 5.47276 1.52724 6.66667 3 6.66667C4.47276 6.66667 5.66667 5.47276 5.66667 4C5.66667 2.52724 4.47276 1.33333 3 1.33333C1.52724 1.33333 0.333333 2.52724 0.333333 4ZM51.3536 4.35355C51.5488 4.15829 51.5488 3.84171 51.3536 3.64645L48.1716 0.464466C47.9763 0.269204 47.6597 0.269204 47.4645 0.464466C47.2692 0.659728 47.2692 0.976311 47.4645 1.17157L50.2929 4L47.4645 6.82843C47.2692 7.02369 47.2692 7.34027 47.4645 7.53553C47.6597 7.7308 47.9763 7.7308 48.1716 7.53553L51.3536 4.35355ZM3 4.5H51V3.5H3V4.5Z" />
                        </svg>
                        <div class="people-area">
                            <ul class="img-grp">
                                <?php foreach ($settings['matrik_hero_banner_two_genaral_gallery_images'] as $image) : ?>
                                    <li><img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr__('matrik-core', 'matrik-core'); ?>"></li>
                                <?php endforeach; ?>

                            </ul>
                            <?php if (!empty($settings['matrik_hero_banner_two_genaral_button_two_text'])) : ?>
                                <a
                                    href="<?php echo esc_url($settings['matrik_hero_banner_two_genaral_button_two_text_url']['url']); ?>"
                                    <?php if (!empty($settings['matrik_hero_banner_two_genaral_button_two_text_url']['is_external'])) echo 'target="_blank"'; ?>
                                    <?php if (!empty($settings['matrik_hero_banner_two_genaral_button_two_text_url']['nofollow'])) echo 'rel="nofollow"'; ?>>
                                    <?php echo esc_html($settings['matrik_hero_banner_two_genaral_button_two_text']); ?>
                                </a>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>

<?php

    }
}

Plugin::instance()->widgets_manager->register(new Matrik_Hero_Banner_Two_Widget());
