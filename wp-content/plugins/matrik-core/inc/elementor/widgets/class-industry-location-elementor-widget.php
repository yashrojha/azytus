<?php

namespace Elementor;

if (!defined('ABSPATH')) exit;  // Exit if accessed directly

use Elementor\core\Schemes;
use Egns_Core\Egns_Helper;

class Matrik_Industry_Location_Widget extends Widget_Base
{

    public function get_name()
    {
        return 'matrik_industry_location';
    }

    public function get_title()
    {
        return esc_html__('EG Industry Location', 'matrik-core');
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
            'matrik_industry_location_genaral',
            [
                'label' => esc_html__('General', 'matrik-core')
            ]
        );

        $this->add_control(
            'matrik_industry_location_genaral_title',
            [
                'label'       => esc_html__('Header Title', 'matrik-core'),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default'     => esc_html__('Our Industry Location', 'matrik-core'),
                'placeholder' => esc_html__('write your title here', 'matrik-core'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'matrik_industry_location_genaral_background_image',
            [
                'label' => esc_html__('Background Map Image', 'matrik-core'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
                'media_types' => ['image'],
            ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'matrik_industry_location_flag_image',
            [
                'label' => esc_html__('Flag Image', 'matrik-core'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
                'media_types' => ['image', 'svg'],
            ]
        );

        $repeater->add_control(
            'matrik_industry_location_flag_country_name',
            [
                'label'       => esc_html__('Country Name', 'matrik-core'),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default'     => esc_html__('Singapore', 'matrik-core'),
                'placeholder' => esc_html__('write your text here', 'matrik-core'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'matrik_industry_location_list',
            [
                'label' => esc_html__('Location List', 'matrik-core'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'matrik_industry_location_flag_country_name' => esc_html('Singapore'),
                    ],
                    [
                        'matrik_industry_location_flag_country_name' => esc_html('United Kingdom'),

                    ],
                    [
                        'matrik_industry_location_flag_country_name' => esc_html('United Arab Emirates'),
                    ],
                    [
                        'matrik_industry_location_flag_country_name' => esc_html('Australia'),
                    ],
                    [
                        'matrik_industry_location_flag_country_name' => esc_html('Cambodia'),
                    ],

                ],
                'title_field' => '{{{ matrik_industry_location_flag_country_name }}}',
            ]
        );

        $this->add_control(
            'matrik_industry_location_contact',
            [
                'label'       => esc_html__('Contact Text', 'matrik-core'),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default' => wp_kses('See Your Near Location & <a href="/contact">Contact</a> With Us Any Time! ', wp_kses_allowed_html('post')),
                'placeholder' => esc_html__('write your text here', 'matrik-core'),
                'label_block' => true,
            ]
        );

        $this->end_controls_section();

        //style start

        $this->start_controls_section(
            'matrik_industry_location_style_genaral',
            [
                'label'     => esc_html__('Styles', 'matrik-core'),
                'tab'       => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'matrik_industry_location_style_genaral_title',
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
                'name'     => 'matrik_industry_location_style_genaral_title_typ',
                'selector' => '{{WRAPPER}} .section-title.two h2',

            ]
        );

        $this->add_control(
            'matrik_industry_location_style_genaral_title_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .section-title.two h2' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_industry_location_style_genaral_country_name',
            [
                'label'     => esc_html__('Country Name', 'matrik-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'matrik-core'),
                'name'     => 'matrik_industry_location_style_genaral_country_name_typ',
                'selector' => '{{WRAPPER}} .home3-industry-location-section .industry-location-wrapper .indicator-area ul li .single-item span',

            ]
        );

        $this->add_control(
            'matrik_industry_location_style_genaral_country_name_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home3-industry-location-section .industry-location-wrapper .indicator-area ul li .single-item span' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_industry_location_style_genaral_country_name_hover_color',
            [
                'label'     => esc_html__('Hover Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home3-industry-location-section .industry-location-wrapper .indicator-area ul li .single-item:hover span' => 'color: {{VALUE}};',
                ],
            ]
        );



        $this->add_control(
            'matrik_industry_location_style_genaral_country_name_bg_color',
            [
                'label'     => esc_html__('Background Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home3-industry-location-section .industry-location-wrapper .indicator-area ul li .single-item' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_industry_location_style_genaral_country_name_bg_hover_color',
            [
                'label'     => esc_html__('Hover Background Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home3-industry-location-section .industry-location-wrapper .indicator-area ul li .single-item:hover' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_industry_location_style_genaral_contact',
            [
                'label'     => esc_html__('Contact Title', 'matrik-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'matrik-core'),
                'name'     => 'matrik_industry_location_style_genaral_contact_typ',
                'selector' => '{{WRAPPER}} .home3-industry-location-section .location-bottom-area h6',

            ]
        );

        $this->add_control(
            'matrik_industry_location_style_genaral_contact_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home3-industry-location-section .location-bottom-area h6' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_industry_location_style_genaral_contact_second_color',
            [
                'label'     => esc_html__('Second Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home3-industry-location-section .location-bottom-area h6 a' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_industry_location_style_genaral_contact_second_hover_color',
            [
                'label'     => esc_html__('Second Hover Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home3-industry-location-section .location-bottom-area h6 a:hover' => 'color: {{VALUE}};',
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
                const listItems = document.querySelectorAll(".indicator-area ul li");

                // Function to add active class on hover
                listItems.forEach((item) => {
                    item.addEventListener("mouseenter", () => {
                        // Remove active class from all list items
                        listItems.forEach((li) => li.classList.remove("active"));

                        // Add active class to the hovered item
                        item.classList.add("active");
                    });
                });
            </script>
        <?php endif; ?>

        <div class="home3-industry-location-section">
            <div class="container">
                <?php if (!empty($settings['matrik_industry_location_genaral_title'])) : ?>
                    <div class="section-title two text-center mb-80 wow animate fadeInDown" data-wow-delay="200ms" data-wow-duration="1500ms">
                        <h2><?php echo esc_html($settings['matrik_industry_location_genaral_title']); ?></h2>
                    </div>
                <?php endif; ?>
                <div class="industry-location-wrapper" <?php if (!empty($settings['matrik_industry_location_genaral_background_image']['url'])) : ?>style="background-image: url(<?php echo esc_url($settings['matrik_industry_location_genaral_background_image']['url']); ?>);" <?php endif; ?>>
                    <div class="indicator-area">
                        <ul>
                            <?php
                            $index = 0;
                            foreach ($settings['matrik_industry_location_list'] as $data) : ?>
                                <li class="<?php echo esc_attr(($index === 0) ? 'active' : ''); ?>">
                                    <div class="dot-main">
                                        <div class="promo-video">
                                            <div class="waves-block">
                                                <div class="waves wave-1"></div>
                                                <div class="waves wave-2"></div>
                                                <div class="waves wave-3"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="single-item">
                                        <?php if (!empty($data['matrik_industry_location_flag_image']['url'])) : ?>
                                            <div class="flag">
                                                <img src="<?php echo esc_url($data['matrik_industry_location_flag_image']['url']); ?>" alt="<?php echo esc_attr__('flag-image', 'matrik-core'); ?>">
                                            </div>
                                        <?php endif; ?>
                                        <?php if (!empty($data['matrik_industry_location_flag_country_name'])) : ?>
                                            <span><?php echo esc_html($data['matrik_industry_location_flag_country_name']); ?></span>
                                        <?php endif; ?>
                                    </div>
                                </li>
                            <?php
                                $index++;
                            endforeach; ?>
                        </ul>
                    </div>
                </div>
                <?php if (!empty($settings['matrik_industry_location_contact'])) : ?>
                    <div class="location-bottom-area">
                        <h6><?php echo wp_kses($settings['matrik_industry_location_contact'], wp_kses_allowed_html('post'));  ?></h6>
                    </div>
                <?php endif; ?>
            </div>
        </div>

<?php

    }
}

Plugin::instance()->widgets_manager->register(new Matrik_Industry_Location_Widget());
