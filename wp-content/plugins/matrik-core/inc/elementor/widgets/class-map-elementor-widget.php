<?php

namespace Elementor;

if (!defined('ABSPATH')) exit;  // Exit if accessed directly

use Elementor\core\Schemes;
use Egns_Core\Egns_Helper;

class Matrik_Map_Widget extends Widget_Base
{

    public function get_name()
    {
        return 'matrik_map';
    }

    public function get_title()
    {
        return esc_html__('EG Map', 'matrik-core');
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
            'matrik_map_genaral',
            [
                'label' => esc_html__('General', 'matrik-core')
            ]
        );

        $this->add_control(
            'matrik_map_genaral_title',
            [
                'label'       => esc_html__('Title', 'matrik-core'),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default'     => esc_html__('Our Factory Locations', 'matrik-core'),
                'placeholder' => esc_html__('write your title here', 'matrik-core'),
                'label_block' => true,
            ]
        );

        // Repeater
        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'matrik_map_genaral_location_title',
            [
                'label' => esc_html__('Location Title', 'matrik-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html('NEW YORK'),
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'matrik_map_genaral_location',
            [
                'label' => esc_html__('Location', 'matrik-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html('8204 Glen Ridge DriveEndicott, NY 13760'),
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'matrik_map_genaral_location_link',
            [
                'label'   => esc_html__('Location URL/Link', 'matrik-core'),
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

        $repeater->add_control(
            'matrik_map_genaral_location_iframe',
            [
                'label' => esc_html__('Custom Iframe', 'matrik-core'),
                'type' => \Elementor\Controls_Manager::CODE,
                'language' => 'html',
                'rows' => 20,
            ]
        );

        $this->add_control(
            'matrik_map_genaral_location_list',
            [
                'label' => esc_html__('Location List', 'matrik-core'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'matrik_map_genaral_location_title' => esc_html('NEW YORK'),
                        'matrik_map_genaral_location' => esc_html('8204 Glen Ridge DriveEndicott, NY 13760'),
                        'matrik_map_genaral_location_iframe' => wp_kses('<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d193596.26002786632!2d-74.14431287431229!3d40.697284634966785!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c24fa5d33f083b%3A0xc80b8f06e177fe62!2sNew%20York%2C%20NY%2C%20USA!5e0!3m2!1sen!2sbd!4v1741770418248!5m2!1sen!2sbd" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>', wp_kses_allowed_html('post')),
                    ],
                    [
                        'matrik_map_genaral_location_title' => esc_html('WASHINGTON DC'),
                        'matrik_map_genaral_location' => esc_html('8204 Glen Ridge DriveEndicott, NY 13760'),
                        'matrik_map_genaral_location_iframe' => wp_kses('<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d99370.15308095436!2d-77.09697652886626!3d38.89385915497123!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89b7c6de5af6e45b%3A0xc2524522d4885d2a!2sWashington%2C%20DC%2C%20USA!5e0!3m2!1sen!2sbd!4v1741770512263!5m2!1sen!2sbd" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>', wp_kses_allowed_html('post')),
                    ],

                    [
                        'matrik_map_genaral_location_title' => esc_html('New Jersey'),
                        'matrik_map_genaral_location' => esc_html('8204 Glen Ridge DriveEndicott, NY 13760'),
                        'matrik_map_genaral_location_iframe' => wp_kses(' <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1563756.0690582087!2d-77.22309702196499!3d40.04839034274329!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c0fb959e00409f%3A0x2cd27b07f83f6d8d!2sNew%20Jersey%2C%20USA!5e0!3m2!1sen!2sbd!4v1741771122024!5m2!1sen!2sbd" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>', wp_kses_allowed_html('post')),
                    ],

                ],
                'title_field' => '{{{ matrik_map_genaral_location_title }}}',
            ]
        );


        $this->add_control(
            'matrik_map_genaral_button',
            [
                'label'       => esc_html__('Button Text', 'matrik-core'),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default'     => esc_html__('View All Factory Location', 'matrik-core'),
                'placeholder' => esc_html__('write your button text here', 'matrik-core'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'matrik_map_genaral_button_url',
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
            'matrik_map_style_one_genaral',
            [
                'label'     => esc_html__('Styles', 'matrik-core'),
                'tab'       => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'matrik_map_style_one_genaral_section',
            [
                'label'     => esc_html__('Section', 'matrik-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_control(
            'matrik_map_style_one_genaral_section_bg_color',
            [
                'label'     => esc_html__('Background Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home1-map-section .address-wrapper' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_map_style_one_genaral_title',
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
                'name'     => 'matrik_map_style_one_genaral_title_typ',
                'selector' => '{{WRAPPER}} .home1-map-section .address-wrapper h2',

            ]
        );

        $this->add_control(
            'matrik_map_style_one_genaral_title_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home1-map-section .address-wrapper h2' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_map_style_one_genaral_location_title',
            [
                'label'     => esc_html__('Location Title', 'matrik-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'matrik-core'),
                'name'     => 'matrik_map_style_one_genaral_location_title_typ',
                'selector' => '{{WRAPPER}} .home1-map-section .address-wrapper .address-area .address-list .single-address .content span',

            ]
        );

        $this->add_control(
            'matrik_map_style_one_genaral_location_title_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home1-map-section .address-wrapper .address-area .address-list .single-address .content span' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_map_style_one_genaral_location_title_hover_color',
            [
                'label'     => esc_html__('Hover Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home1-map-section .address-wrapper .address-area .address-list .single-address:hover .content span' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_map_style_one_genaral_location',
            [
                'label'     => esc_html__('Location', 'matrik-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'matrik-core'),
                'name'     => 'matrik_map_style_one_genaral_location_typ',
                'selector' => '{{WRAPPER}} .home1-map-section .address-wrapper .address-area .address-list .single-address .content a',

            ]
        );

        $this->add_control(
            'matrik_map_style_one_genaral_location_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home1-map-section .address-wrapper .address-area .address-list .single-address .content a' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_map_style_one_genaral_location_hover_color',
            [
                'label'     => esc_html__('Hover Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home1-map-section .address-wrapper .address-area .address-list .single-address:hover .content a' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_map_style_one_genaral_location_vector_icon',
            [
                'label'     => esc_html__('Vector Icon', 'matrik-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'matrik-core'),
                'name'     => 'matrik_map_style_one_genaral_location_vector_icon_typ',
                'selector' => '{{WRAPPER}} .home1-map-section .address-wrapper .address-area .address-list .single-address .vector',

            ]
        );

        $this->add_control(
            'matrik_map_style_one_genaral_location_vector_icon_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home1-map-section .address-wrapper .address-area .address-list .single-address .vector' => 'fill: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_map_style_one_genaral_button',
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
                'name'     => 'matrik_map_style_one_genaral_button_typ',
                'selector' => '{{WRAPPER}} .home1-map-section .address-wrapper .address-area .location-btn',

            ]
        );

        $this->add_control(
            'matrik_map_style_one_genaral_button_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home1-map-section .address-wrapper .address-area .location-btn' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_map_style_one_genaral_button_bg_color',
            [
                'label'     => esc_html__('Background Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home1-map-section .address-wrapper .address-area .location-btn' => 'background: linear-gradient(to bottom, {{VALUE}} 0%, {{VALUE}} 98%);',
                ],
            ]
        );


        $this->end_controls_section();
    }
    protected function render()
    {

        $settings = $this->get_settings_for_display();

?>

        <div class="home1-map-section">
            <div class="address-wrapper">
                <?php if (!empty($settings['matrik_map_genaral_title'])) : ?>
                    <h2><?php echo esc_html($settings['matrik_map_genaral_title']); ?></h2>
                <?php endif; ?>
                <div class="address-area">
                    <ul class="address-list">
                        <?php foreach ($settings['matrik_map_genaral_location_list'] as $data) : ?>
                            <li class="single-address">
                                <div class="content">
                                    <?php if (!empty($data['matrik_map_genaral_location_title'])) : ?>
                                        <span><?php echo esc_html($data['matrik_map_genaral_location_title']); ?></span>
                                    <?php endif; ?>
                                    <?php if (!empty($data['matrik_map_genaral_location'])) : ?>
                                        <a href="<?php echo esc_url($data['matrik_map_genaral_location_link']['url']); ?>"><?php echo esc_html($data['matrik_map_genaral_location']); ?></a>
                                    <?php endif; ?>
                                </div>
                                <svg class="vector" width="96" height="21" viewBox="0 0 96 21" xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M0 17C0 19.2091 1.79086 21 4 21C6.20914 21 8 19.2091 8 17C8 14.7909 6.20914 13 4 13C1.79086 13 0 14.7909 0 17ZM95.2874 10.4452C95.67 10.2865 95.8515 9.84768 95.6928 9.46508L93.1066 3.23018C92.9479 2.84757 92.509 2.66606 92.1264 2.82477C91.7438 2.98347 91.5623 3.42229 91.721 3.80489L94.0199 9.34703L88.4777 11.6459C88.0951 11.8046 87.9136 12.2434 88.0723 12.626C88.231 13.0086 88.6699 13.1901 89.0525 13.0314L95.2874 10.4452ZM4 17.75C20.5519 17.75 31.0581 15.8359 38.3869 13.3026C45.7178 10.7686 49.8449 7.6167 53.5398 5.28006C55.3872 4.11177 57.1134 3.15365 59.0971 2.53065C61.0739 1.90979 63.3403 1.61157 66.2653 1.81185C72.1491 2.21471 80.6511 4.62889 94.7133 10.4455L95.2867 9.05938C81.2079 3.23598 72.5127 0.73609 66.3678 0.315351C63.2784 0.103827 60.8227 0.416431 58.6476 1.09957C56.4793 1.78057 54.624 2.81964 52.7381 4.0123C48.9664 6.39753 45.0205 9.42253 37.8968 11.8849C30.771 14.3481 20.441 16.25 4 16.25L4 17.75Z" />
                                </svg>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                    <?php if (!empty($settings['matrik_map_genaral_button'])) : ?>
                        <a href="<?php echo esc_url($settings['matrik_map_genaral_button_url']['url']); ?>" class="location-btn"><?php echo esc_html($settings['matrik_map_genaral_button']); ?></a>
                    <?php endif; ?>
                </div>
            </div>
            <ul class="map-list">
                <?php
                $allowed_iframe_html = [
                    'iframe' => [
                        'src'             => true,
                        'width'           => true,
                        'height'          => true,
                        'frameborder'     => true,
                        'allowfullscreen' => true,
                        'loading'         => true,
                        'referrerpolicy'  => true,
                        'allow'           => true,
                    ],
                ];
                ?>
                <?php foreach ($settings['matrik_map_genaral_location_list'] as $index => $data) : ?>
                    <li class="<?php echo esc_attr(($index === 0) ? 'active' : ''); ?>">
                        <?php echo wp_kses($data['matrik_map_genaral_location_iframe'], $allowed_iframe_html); ?>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>

<?php

    }
}

Plugin::instance()->widgets_manager->register(new Matrik_Map_Widget());
