<?php

namespace Elementor;

if (!defined('ABSPATH')) exit;  // Exit if accessed directly

use Elementor\core\Schemes;
use Egns_Core\Egns_Helper;

class Matrik_Company_Info_Widget extends Widget_Base
{

    public function get_name()
    {
        return 'matrik_company_info';
    }

    public function get_title()
    {
        return esc_html__('EG Company Info', 'matrik-core');
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
            'matrik_company_info_genaral',
            [
                'label' => esc_html__('General', 'matrik-core')
            ]
        );

        $this->add_control(
            'matrik_company_info_genaral_title',
            [
                'label'       => esc_html__('Title', 'matrik-core'),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default'     => esc_html__('Redefining Industry Standards.', 'matrik-core'),
                'placeholder' => esc_html__('write your title here', 'matrik-core'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'matrik_company_info_genaral_description',
            [
                'label'       => esc_html__('Description', 'matrik-core'),
                'type'        => \Elementor\Controls_Manager::TEXTAREA,
                'default'     => esc_html__("We understand your needs and deliver digital marketing through unique selling proposition. Our team of experts is passionate about helping you SEO company. Choose us and experience the difference! Looking for something different? We challenge the status quo with innovative solutions and a [company culture adjective] approach. Let us show you how we can help you achieve desired outcome in a way you won't expect.", 'matrik-core'),
                'placeholder' => esc_html__('write your description here', 'matrik-core'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'matrik_company_info_genaral_button_text',
            [
                'label'       => esc_html__('Button Text', 'matrik-core'),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default'     => esc_html__('Become a Member', 'matrik-core'),
                'placeholder' => esc_html__('write your button text here', 'matrik-core'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'matrik_company_info_genaral_button_text_url',
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
            'matrik_company_info_genaral_counter_area',
            [
                'label'     => esc_html__('Counter Area', 'matrik-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_control(
            'matrik_company_info_genaral_counter_number',
            [
                'label'       => esc_html__('Counter Number', 'matrik-core'),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default'     => esc_html__('5', 'matrik-core'),
                'placeholder' => esc_html__('write your text here', 'matrik-core'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'matrik_company_info_genaral_counter_sign',
            [
                'label'       => esc_html__('Counter Sign', 'matrik-core'),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default'     => esc_html__('+', 'matrik-core'),
                'placeholder' => esc_html__('write your text here', 'matrik-core'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'matrik_company_info_genaral_counter_title',
            [
                'label'       => esc_html__('Counter Title', 'matrik-core'),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default' => wp_kses('Year’s Of <br> Experience', wp_kses_allowed_html('post')),
                'placeholder' => esc_html__('write your text here', 'matrik-core'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'matrik_company_info_genaral_counter_banner_image',
            [
                'label' => esc_html__('Banner Image', 'matrik-core'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
                'media_types' => ['image'],
            ]
        );

        $this->end_controls_section();
        //style start

        $this->start_controls_section(
            'matrik_company_info_style_genaral',
            [
                'label'     => esc_html__('Styles', 'matrik-core'),
                'tab'       => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'matrik_company_info_style_genaral_title',
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
                'name'     => 'matrik_company_info_style_genaral_title_typ',
                'selector' => '{{WRAPPER}} .home3-company-info-section .company-info-content h2',

            ]
        );

        $this->add_control(
            'matrik_company_info_style_genaral_title_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home3-company-info-section .company-info-content h2' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_company_info_style_genaral_description',
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
                'name'     => 'matrik_company_info_style_genaral_description_typ',
                'selector' => '{{WRAPPER}} .home3-company-info-section .company-info-content p',

            ]
        );

        $this->add_control(
            'matrik_company_info_style_genaral_description_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home3-company-info-section .company-info-content p' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_company_info_style_genaral_description_icon_color',
            [
                'label'     => esc_html__('Icon Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home3-company-info-section .company-info-content p::before' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_company_info_style_genaral_button',
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
                'name'     => 'matrik_company_info_style_genaral_button_typ',
                'selector' => '{{WRAPPER}} .primary-btn2',

            ]
        );

        $this->add_control(
            'matrik_company_info_style_genaral_button_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .primary-btn2' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_company_info_style_genaral_button_hover_color',
            [
                'label'     => esc_html__('Hover Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .primary-btn2.two:hover' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_company_info_style_genaral_button_icon_color',
            [
                'label'     => esc_html__('Icon Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .primary-btn2 svg' => 'fill: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_company_info_style_genaral_button_icon_hover_color',
            [
                'label'     => esc_html__('Hover Icon Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .primary-btn2.two:hover svg' => 'fill: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_company_info_style_genaral_counter_number',
            [
                'label'     => esc_html__('Counter Number', 'matrik-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'matrik-core'),
                'name'     => 'matrik_company_info_style_genaral_counter_number_typ',
                'selector' => '{{WRAPPER}} .home3-company-info-section .company-info-img-and-countdown-area .countdown-area .number h3',

            ]
        );

        $this->add_control(
            'matrik_company_info_style_genaral_counter_number_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home3-company-info-section .company-info-img-and-countdown-area .countdown-area .number h3' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_company_info_style_genaral_counter_sign',
            [
                'label'     => esc_html__('Counter Sign', 'matrik-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'matrik-core'),
                'name'     => 'matrik_company_info_style_genaral_counter_sign_typ',
                'selector' => '{{WRAPPER}} .home3-company-info-section .company-info-img-and-countdown-area .countdown-area .number span',

            ]
        );

        $this->add_control(
            'matrik_company_info_style_genaral_counter_sign_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home3-company-info-section .company-info-img-and-countdown-area .countdown-area .number span' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_company_info_style_genaral_counter_title',
            [
                'label'     => esc_html__('Counter Title', 'matrik-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'matrik-core'),
                'name'     => 'matrik_company_info_style_genaral_counter_title_typ',
                'selector' => '{{WRAPPER}} ..home3-company-info-section .company-info-img-and-countdown-area .countdown-area > span',

            ]
        );

        $this->add_control(
            'matrik_company_info_style_genaral_counter_title_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home3-company-info-section .company-info-img-and-countdown-area .countdown-area > span' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_company_info_style_genaral_counter_title_bg_color',
            [
                'label'     => esc_html__('Background Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home3-company-info-section .company-info-img-and-countdown-area .countdown-area' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section();
    }
    protected function render()
    {

        $settings = $this->get_settings_for_display();

?>

        <div class="home3-company-info-section">
            <div class="container">
                <div class="row gy-md-5 gy-4 align-items-center">
                    <div class="col-lg-6 wow animate fadeInLeft" data-wow-delay="200ms" data-wow-duration="1500ms">
                        <div class="company-info-img-and-countdown-area">
                            <?php if (!empty($settings['matrik_company_info_genaral_counter_banner_image']['url'])) : ?>
                                <div class="info-img magnetic-item">
                                    <img src="<?php echo esc_url($settings['matrik_company_info_genaral_counter_banner_image']['url']); ?>" alt="<?php echo esc_attr__('banner-image', 'matrik-core'); ?>">
                                </div>
                            <?php endif; ?>
                            <div class="countdown-area">
                                <div class="number">
                                    <?php if (!empty($settings['matrik_company_info_genaral_counter_number'])) : ?>
                                        <h3 class="counter"><?php echo esc_html($settings['matrik_company_info_genaral_counter_number']); ?></h3>
                                    <?php endif; ?>
                                    <?php if (!empty($settings['matrik_company_info_genaral_counter_sign'])) : ?>
                                        <span><?php echo esc_html($settings['matrik_company_info_genaral_counter_sign']); ?></span>
                                    <?php endif; ?>
                                </div>
                                <?php if (!empty($settings['matrik_company_info_genaral_counter_title'])) : ?>
                                    <span><?php echo wp_kses($settings['matrik_company_info_genaral_counter_title'], wp_kses_allowed_html('post'))  ?></span>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 wow animate fadeInRight" data-wow-delay="200ms" data-wow-duration="1500ms">
                        <div class="company-info-content">
                            <?php if (!empty($settings['matrik_company_info_genaral_title'])) : ?>
                                <h2><?php echo esc_html($settings['matrik_company_info_genaral_title']); ?></h2>
                            <?php endif; ?>
                            <?php if (!empty($settings['matrik_company_info_genaral_description'])) : ?>
                                <p><?php echo esc_html($settings['matrik_company_info_genaral_description']); ?></p>
                            <?php endif; ?>
                            <?php if (!empty($settings['matrik_company_info_genaral_button_text'])) : ?>
                                <a class="primary-btn2 two" href="<?php echo esc_url($settings['matrik_company_info_genaral_button_text_url']['url']); ?>">
                                    <span><?php echo esc_html($settings['matrik_company_info_genaral_button_text']); ?></span>
                                    <svg class="arrow" width="23" height="23" viewBox="0 0 23 23" xmlns="http://www.w3.org/2000/svg">
                                        <g>
                                            <path d="M0.113861 0H22.9999V4.28425L4.32671 22.9997L0 18.7154L12.7524 6.08815L0.113861 6.20089V0Z"></path>
                                            <path d="M23 22.9996V8.56848L16.8516 14.6566V22.9996H23Z"></path>
                                        </g>
                                    </svg>
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

Plugin::instance()->widgets_manager->register(new Matrik_Company_Info_Widget());
