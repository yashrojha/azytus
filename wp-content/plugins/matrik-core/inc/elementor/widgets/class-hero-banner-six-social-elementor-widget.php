<?php

namespace Elementor;

if (!defined('ABSPATH')) exit;  // Exit if accessed directly

use Elementor\core\Schemes;
use Egns_Core\Egns_Helper;

class Matrik_Hero_Banner_Six_Social_Widget extends Widget_Base
{

    public function get_name()
    {
        return 'matrik_hero_banner_six_social';
    }

    public function get_title()
    {
        return esc_html__('EG Hero Banner Six Social Area', 'matrik-core');
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
            'matrik_hero_banner_six_social_area',
            [
                'label' => esc_html__('General', 'matrik-core')
            ]
        );

        $this->add_control(
            'matrik_hero_banner_six_social_area_background_image',
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
            'matrik_hero_banner_six_social_area_background_video',
            [
                'label' => esc_html__('Background Video', 'matrik-core'),
                'type' => \Elementor\Controls_Manager::URL,
                'default' => [
                    'url' => '#',
                ],
            ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'matrik_hero_banner_six_social_area_icon',
            [
                'label'       => esc_html__('Social Icon', 'matrik-core'),
                'type'        => \Elementor\Controls_Manager::ICONS,
                'default' => [
                    'value' => 'fas fa-circle',
                    'library' => 'fa-solid',
                ],
            ]
        );

        $repeater->add_control(
            'matrik_hero_banner_six_social_area_social_profile_url',
            [
                'label'   => esc_html__('Social URL/Link', 'matrik-core'),
                'type'    => \Elementor\Controls_Manager::URL,
                'options' => ['url', 'is_external', 'nofollow'],
                'default' => [
                    'url'         => '#',
                    'is_external' => true,
                    'nofollow'    => true,
                ],
            ]
        );

        $this->add_control(
            'matrik_hero_banner_six_social_area_social_list',
            [
                'label' => esc_html__('Social List', 'matrik-core'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'title_field' => '{{{ "Social Icon" }}}',
            ]
        );

        $this->add_control(
            'matrik_home_six_hero_social_area_circular_text',
            [
                'label' => __('Text Around Circle', 'matrik-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => 'STRATEGY . DESIGN . BRAND .',
            ]
        );

        $this->add_control(
            'matrik_hero_banner_six_social_area_circular_button_text_url',
            [
                'label'   => esc_html__('Button URL/Link/ID', 'matrik-core'),
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

        $this->end_controls_section();

        //style start

        $this->start_controls_section(
            'matrik_hero_banner_six_social_area_style',
            [
                'label'     => esc_html__('Styles', 'matrik-core'),
                'tab'       => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'matrik_hero_banner_six_social_style_icon',
            [
                'label'     => esc_html__('Social Icons', 'matrik-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_control(
            'matrik_hero_banner_six_social_style_icon_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home6-banner-bottom-area .social-list li a svg' => 'fill: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_hero_banner_six_social_style_icon_separator_color',
            [
                'label'     => esc_html__('Separator Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home6-banner-bottom-area .social-list li::before' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_hero_banner_six_social_area_style_circular_text',
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
                'name'     => 'matrik_hero_banner_six_social_area_style_circular_text_typ',
                'selector' => '{{WRAPPER}} .home6-banner-bottom-area .circular-text .text span',

            ]
        );

        $this->add_control(
            'matrik_hero_banner_six_style_general_desc_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home6-banner-bottom-area .circular-text .text span' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_hero_banner_six_style_general_icon_color',
            [
                'label'     => esc_html__('Icon Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home6-banner-bottom-area .circular-text .center-icon svg' => 'fill: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_hero_banner_six_style_general_icon_bg_color',
            [
                'label'     => esc_html__('Icon Background Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home6-banner-bottom-area .circular-text .center-icon' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_hero_banner_six_style_general_text_bg_color',
            [
                'label'     => esc_html__('Text Background Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home6-banner-bottom-area .circular-text' => 'background-color: {{VALUE}};',
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
            'matrik_hero_banner_six_social_area_counter_content',
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
        <div class="home6-banner-bottom-area">
            <div class="banner-bottom-img-wrapper">
                <?php if (!empty($settings['matrik_hero_banner_six_social_area_background_image']['url'])): ?>
                    <img src="<?php echo esc_url($settings['matrik_hero_banner_six_social_area_background_image']['url']); ?>" alt="<?php echo esc_attr__('background-image', 'matrik-core'); ?>">
                <?php else: ?>
                    <iframe src="<?php echo esc_url($settings['matrik_hero_banner_six_social_area_background_video']['url']); ?>" title="description"></iframe>
                <?php endif; ?>
            </div>
            <ul class="social-list">
                <?php foreach ($settings['matrik_hero_banner_six_social_area_social_list'] as $social): ?>
                    <?php if (!empty($social['matrik_hero_banner_six_social_area_icon'])): ?>
                        <li><a href="<?php echo esc_url($social['matrik_hero_banner_six_social_area_social_profile_url']['url']); ?>"><?php \Elementor\Icons_Manager::render_icon($social['matrik_hero_banner_six_social_area_icon']); ?></a></li>
                <?php endif;
                endforeach; ?>
            </ul>

            <div class="circular-text">';
                <a href="#service-section" class="center-icon" id="scroll-btn">
                    <svg width="16" height="31" viewBox="0 0 16 31" xmlns="http://www.w3.org/2000/svg">
                        <path d="M2.66667 6C2.66667 8.94552 5.05448 11.3333 8 11.3333C10.9455 11.3333 13.3333 8.94552 13.3333 6C13.3333 3.05448 10.9455 0.666666 8 0.666667C5.05448 0.666667 2.66667 3.05448 2.66667 6ZM7.29289 30.7071C7.68342 31.0976 8.31658 31.0976 8.70711 30.7071L15.0711 24.3431C15.4616 23.9526 15.4616 23.3195 15.0711 22.9289C14.6805 22.5384 14.0474 22.5384 13.6569 22.9289L8 28.5858L2.34315 22.9289C1.95262 22.5384 1.31946 22.5384 0.928933 22.9289C0.538409 23.3195 0.538409 23.9526 0.928933 24.3431L7.29289 30.7071ZM7 6L7 30L9 30L9 6L7 6Z"></path>
                    </svg>
                </a>

                <?php if (!empty($settings['matrik_home_six_hero_social_area_circular_text'])) : ?>
                    <div class="text">
                        <span>
                            <?php echo esc_html($settings['matrik_home_six_hero_social_area_circular_text']); ?>
                        </span>
                    </div>
                <?php endif; ?>
            </div>
        </div>

<?php

    }
}

Plugin::instance()->widgets_manager->register(new Matrik_Hero_Banner_Six_Social_Widget());
