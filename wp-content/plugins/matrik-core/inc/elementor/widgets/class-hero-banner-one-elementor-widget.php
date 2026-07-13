<?php

namespace Elementor;

if (!defined('ABSPATH')) exit;  // Exit if accessed directly

use Elementor\core\Schemes;
use Egns_Core\Egns_Helper;

class Matrik_Hero_Banner_One_Widget extends Widget_Base
{

    public function get_name()
    {
        return 'matrik_hero_banner_one';
    }

    public function get_title()
    {
        return esc_html__('EG Hero Banner One', 'matrik-core');
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
            'matrik_hero_banner_one_genaral',
            [
                'label' => esc_html__('General', 'matrik-core')
            ]
        );

        $this->add_control(
            'matrik_hero_banner_one_genaral_background_image',
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
            'matrik_hero_banner_one_genaral_title',
            [
                'label'       => esc_html__('Header Title', 'matrik-core'),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default'     => esc_html__('Modern Factory Operation Innovative Facility.', 'matrik-core'),
                'placeholder' => esc_html__('write your title here', 'matrik-core'),
                'label_block' => true,
            ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'matrik_hero_banner_one_genaral_button_style',
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
            'matrik_hero_banner_one_genaral_button_text',
            [
                'label'       => esc_html__('Button Text', 'matrik-core'),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default'     => esc_html__('Start A Project', 'matrik-core'),
                'placeholder' => esc_html__('write your button text here', 'matrik-core'),
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'matrik_hero_banner_one_genaral_button_text_url',
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
            'matrik_hero_banner_one_genaral_button_list',
            [
                'label' => esc_html__('Button List', 'matrik-core'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'matrik_hero_banner_one_genaral_button_text' => esc_html('Start A Project'),
                        'matrik_hero_banner_one_genaral_button_style' => esc_html('style_one'),

                    ],
                    [
                        'matrik_hero_banner_one_genaral_button_text' => esc_html('Let’s Discuss'),
                        'matrik_hero_banner_one_genaral_button_style' => esc_html('style_two'),

                    ],

                ],
                'title_field' => '{{{ matrik_hero_banner_one_genaral_button_text }}}',
            ]
        );

        $this->add_control(
            'matrik_hero_banner_one_genaral_circular_button_text',
            [
                'label'       => esc_html__('Circular Text', 'matrik-core'),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default'     => esc_html__(' STRATEGY . DESIGN . BRAND .', 'matrik-core'),
                'placeholder' => esc_html__('write your button text here', 'matrik-core'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'matrik_hero_banner_one_genaral_circular_button_text_url',
            [
                'label'   => esc_html__('Button URL/Link/ID', 'matrik-core'),
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
            'matrik_hero_banner_one_style_general',
            [
                'label'     => esc_html__('Styles', 'matrik-core'),
                'tab'       => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'matrik_hero_banner_one_style_general_title',
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
                'name'     => 'matrik_hero_banner_one_style_general_title_typ',
                'selector' => '{{WRAPPER}} .home1-banner-section .banner-wrapper .banner-content-wrap .banner-content h1',

            ]
        );

        $this->add_control(
            'matrik_hero_banner_one_style_general_title_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home1-banner-section .banner-wrapper .banner-content-wrap .banner-content h1' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_hero_banner_one_style_general_button_one',
            [
                'label'     => esc_html__('Button One', 'matrik-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        // Tabs
        $this->start_controls_tabs(
            'matrik_hero_banner_one_style_general_button_one_tabs'
        );

        $this->start_controls_tab(
            'matrik_hero_banner_one_style_general_button_one_normal_tab',
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
                'name'     => 'matrik_hero_banner_one_style_general_button_one_normal_tab_typ',
                'selector' => '{{WRAPPER}} .primary-btn1',

            ]
        );

        $this->add_control(
            'matrik_hero_banner_one_style_general_button_one_normal_tab_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}}  .primary-btn1' => 'color: {{VALUE}};',

                ],
            ]
        );

        $this->add_control(
            'matrik_hero_banner_one_style_general_button_one_normal_tab_icon_color',
            [
                'label'     => esc_html__('Icon Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}}  .primary-btn1 .arrow' => 'fill: {{VALUE}};',

                ],
            ]
        );

        $this->add_control(
            'matrik_hero_banner_one_style_general_button_one_normal_tab_background_color',
            [
                'label'     => esc_html__('Background Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}}  .primary-btn1' => 'background: {{VALUE}};',

                ],
            ]
        );

        $this->add_responsive_control(
            'matrik_hero_banner_one_style_general_button_one_normal_tab_margin',
            [
                'label' => esc_html__(
                    'Margin',
                    'matrik-core'
                ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .primary-btn1' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'matrik_hero_banner_one_style_general_button_one_normal_tab_padding',
            [
                'label'      => esc_html__(
                    'Padding',
                    'matrik-core'
                ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .primary-btn1' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        $this->end_controls_tab();

        // Hover start
        $this->start_controls_tab(
            'matrik_hero_banner_one_style_general_button_one_hover_tab',
            [
                'label' => esc_html__('Hover', 'matrik-core'),
            ]
        );

        $this->add_control(
            'matrik_hero_banner_one_style_general_button_one_hover_tab_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}}  .primary-btn1:hover' => 'color: {{VALUE}};',

                ],
            ]
        );

        $this->add_control(
            'matrik_hero_banner_one_style_general_button_one_hover_tab_icon_color',
            [
                'label'     => esc_html__('Icon Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}}  .primary-btn1:hover .arrow' => 'fill: {{VALUE}};',

                ],
            ]
        );

        $this->add_control(
            'matrik_hero_banner_one_style_general_button_one_hover_tab_background_color',
            [
                'label'     => esc_html__('Background Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .primary-btn1::after' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_tab();
        $this->end_controls_tabs();

        $this->add_control(
            'matrik_hero_banner_one_style_general_button_two',
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
                'name'     => 'matrik_hero_banner_one_style_general_button_two_typ',
                'selector' => '{{WRAPPER}} .home1-banner-section .banner-wrapper .banner-content-wrap .banner-content .btn-grp .discuss-btn',

            ]
        );

        $this->add_control(
            'matrik_hero_banner_one_style_general_button_two_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}}  .home1-banner-section .banner-wrapper .banner-content-wrap .banner-content .btn-grp .discuss-btn' => 'color: {{VALUE}};',

                ],
            ]
        );

        $this->add_control(
            'matrik_hero_banner_one_style_general_button_two_hover_color',
            [
                'label'     => esc_html__('Hover Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}}  .home1-banner-section .banner-wrapper .banner-content-wrap .banner-content .btn-grp .discuss-btn:hover' => 'color: {{VALUE}};',

                ],
            ]
        );

        $this->add_control(
            'matrik_hero_banner_one_style_general_button_two_icon_color',
            [
                'label'     => esc_html__('Icon Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}}  .home1-banner-section .banner-wrapper .banner-content-wrap .banner-content .btn-grp .discuss-btn svg' => 'fill: {{VALUE}};',

                ],
            ]
        );

        $this->add_control(
            'matrik_hero_banner_one_style_general_button_two_hover_icon_color',
            [
                'label'     => esc_html__('Hover Icon Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}}  .home1-banner-section .banner-wrapper .banner-content-wrap .banner-content .btn-grp .discuss-btn:hover svg' => 'fill: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_hero_banner_one_style_general_circular_text',
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
                'name'     => 'matrik_hero_banner_one_style_general_circular_text_typ',
                'selector' => '{{WRAPPER}} .home1-banner-section .banner-wrapper .banner-content-wrap .circular-text .text span',

            ]
        );

        $this->add_control(
            'matrik_hero_banner_one_style_general_circular_text_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}}  .home1-banner-section .banner-wrapper .banner-content-wrap .circular-text .text span' => 'color: {{VALUE}};',

                ],
            ]
        );

        $this->add_control(
            'matrik_hero_banner_one_style_general_circular_text_sec_bg_color',
            [
                'label'     => esc_html__('Outside Background Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}}  .home1-banner-section .banner-wrapper .banner-content-wrap .circular-text' => 'background-color: {{VALUE}};',

                ],
            ]
        );

        $this->add_control(
            'matrik_hero_banner_one_style_general_circular_text_inside_bg_color',
            [
                'label'     => esc_html__('Inside Background Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}}  .home1-banner-section .banner-wrapper .banner-content-wrap .circular-text .center-icon' => 'background-color: {{VALUE}};',

                ],
            ]
        );

        $this->end_controls_section();
    }
    protected function render()
    {

        $settings = $this->get_settings_for_display();
?>
        <div class="home1-banner-section">
            <div class="container-fluid">
                <div class="banner-wrapper" <?php if ($settings['matrik_hero_banner_one_genaral_background_image']['url']): ?>style="background-image: linear-gradient(180deg, rgba(0, 0, 0, 0.5) 0%, rgba(0, 0, 0, 0.5) 100%), url(<?php echo esc_url($settings['matrik_hero_banner_one_genaral_background_image']['url']); ?>);" <?php endif; ?>>
                    <div class="banner-content-wrap">
                        <div class="banner-content wow animate fadeInLeft" data-wow-delay="200ms" data-wow-duration="1500ms">
                            <?php if (!empty($settings['matrik_hero_banner_one_genaral_title'])) : ?>
                                <h1><?php echo esc_html($settings['matrik_hero_banner_one_genaral_title']); ?></h1>
                            <?php endif; ?>

                            <div class="btn-grp">
                                <?php foreach ($settings['matrik_hero_banner_one_genaral_button_list'] as $data) : ?>
                                    <?php if ($data['matrik_hero_banner_one_genaral_button_style'] == 'style_one') : ?>
                                        <a class="primary-btn1" href="<?php echo esc_url($data['matrik_hero_banner_one_genaral_button_text_url']['url']); ?>">
                                            <span><?php echo esc_html($data['matrik_hero_banner_one_genaral_button_text']); ?>
                                            </span>
                                            <span><?php echo esc_html($data['matrik_hero_banner_one_genaral_button_text']); ?>
                                            </span>
                                            <svg class="arrow" width="23" height="23" viewBox="0 0 23 23" xmlns="http://www.w3.org/2000/svg">
                                                <g>
                                                    <path d="M0.113861 0H22.9999V4.28425L4.32671 22.9997L0 18.7154L12.7524 6.08815L0.113861 6.20089V0Z" />
                                                    <path d="M23 22.9996V8.56848L16.8516 14.6566V22.9996H23Z" />
                                                </g>
                                            </svg>
                                        </a>
                                    <?php elseif ($data['matrik_hero_banner_one_genaral_button_style'] == 'style_two') : ?>
                                        <a class="discuss-btn" href="<?php echo esc_url($data['matrik_hero_banner_one_genaral_button_text_url']['url']); ?>">
                                            <?php echo esc_html($data['matrik_hero_banner_one_genaral_button_text']); ?>
                                            <svg width="9" height="9" viewBox="0 0 9 9" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M0.0445549 0H9.00008V1.67647L1.69308 9L0 7.32353L4.99014 2.38235L0.0445549 2.42647V0Z" />
                                                <path d="M9.0002 8.99999V3.35294L6.59424 5.73529V8.99999H9.0002Z" />
                                            </svg>
                                        </a>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </div>
                        </div>
                        <?php if (!empty($settings['matrik_hero_banner_one_genaral_circular_button_text'])) : ?>
                            <div class="circular-text btn_wrapper">
                                <a href="<?php echo esc_url($settings['matrik_hero_banner_one_genaral_circular_button_text_url']['url']); ?>" class="center-icon" id="scroll-btn">
                                    <svg width="16" height="31" viewBox="0 0 16 31" xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M2.66667 6C2.66667 8.94552 5.05448 11.3333 8 11.3333C10.9455 11.3333 13.3333 8.94552 13.3333 6C13.3333 3.05448 10.9455 0.666666 8 0.666667C5.05448 0.666667 2.66667 3.05448 2.66667 6ZM7.29289 30.7071C7.68342 31.0976 8.31658 31.0976 8.70711 30.7071L15.0711 24.3431C15.4616 23.9526 15.4616 23.3195 15.0711 22.9289C14.6805 22.5384 14.0474 22.5384 13.6569 22.9289L8 28.5858L2.34315 22.9289C1.95262 22.5384 1.31946 22.5384 0.928933 22.9289C0.538409 23.3195 0.538409 23.9526 0.928933 24.3431L7.29289 30.7071ZM7 6L7 30L9 30L9 6L7 6Z" />
                                    </svg>
                                </a>
                                <div class="text">
                                    <span>
                                        <?php echo esc_html($settings['matrik_hero_banner_one_genaral_circular_button_text']); ?>
                                    </span>
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>

<?php

    }
}

Plugin::instance()->widgets_manager->register(new Matrik_Hero_Banner_One_Widget());
