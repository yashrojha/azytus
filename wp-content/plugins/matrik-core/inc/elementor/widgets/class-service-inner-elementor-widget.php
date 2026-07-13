<?php

namespace Elementor;

if (!defined('ABSPATH')) exit;  // Exit if accessed directly

use Elementor\core\Schemes;
use Egns_Core\Egns_Helper;

class Matrik_Service_Inner_Widget extends Widget_Base
{

    public function get_name()
    {
        return 'matrik_service_inner';
    }

    public function get_title()
    {
        return esc_html__('EG Service Inner', 'matrik-core');
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
            'matrik_service_inner_genaral',
            [
                'label' => esc_html__('General', 'matrik-core')
            ]
        );

        $this->add_control(
            'matrik_service_inner_genaral_style_selection',
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

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'matrik_service_inner_genaral_service_image',
            [
                'label' => esc_html__('Service Image', 'matrik-core'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
                'media_types' => ['image'],
            ]
        );

        $repeater->add_control(
            'matrik_service_inner_genaral_title',
            [
                'label'       => esc_html__('Title', 'matrik-core'),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default' => wp_kses('Workforce Training & Control', wp_kses_allowed_html('post')),
                'placeholder' => esc_html__('write your text here', 'matrik-core'),
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'matrik_service_inner_genaral_title_url',
            [
                'label'   => esc_html__('Title URL/Link', 'matrik-core'),
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
            'matrik_service_inner_genaral_description',
            [
                'label'       => esc_html__('Description', 'matrik-core'),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default'     => esc_html__('We provide end-to-end product development services, from ideation to launch.', 'matrik-core'),
                'placeholder' => esc_html__('write your text here', 'matrik-core'),
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'matrik_service_inner_genaral_service_button_text',
            [
                'label'       => esc_html__('Button Text', 'matrik-core'),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default'     => esc_html__('View Details', 'matrik-core'),
                'placeholder' => esc_html__('write your button text here', 'matrik-core'),
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'matrik_service_inner_genaral_service_button_text_url',
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
            'matrik_service_inner_genaral_content_list',
            [
                'label' => esc_html__('Content List', 'matrik-core'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'matrik_service_inner_genaral_title' => wp_kses('Workforce Training & Control', wp_kses_allowed_html('post')),
                    ],
                    [
                        'matrik_service_inner_genaral_title' => wp_kses('Logistics <br> Management', wp_kses_allowed_html('post')),
                    ],
                    [
                        'matrik_service_inner_genaral_title' => wp_kses('Equipment <br> Rental &amp; Leasing', wp_kses_allowed_html('post')),
                    ],
                    [
                        'matrik_service_inner_genaral_title' => wp_kses('Metal Work &amp; <br> Compliance Train', wp_kses_allowed_html('post')),
                    ],
                    [
                        'matrik_service_inner_genaral_title' => wp_kses('Solar Panel Wind Installation', wp_kses_allowed_html('post')),
                    ],
                    [
                        'matrik_service_inner_genaral_title' => wp_kses('Exploration and <br> Drilling', wp_kses_allowed_html('post')),
                    ],
                    [
                        'matrik_service_inner_genaral_title' => wp_kses('Warehousing and Distribution', wp_kses_allowed_html('post')),
                    ],
                    [
                        'matrik_service_inner_genaral_title' => wp_kses('Custom Fabricatio  & Prototyping', wp_kses_allowed_html('post')),
                    ],

                ],
                'title_field' => '{{{ matrik_service_inner_genaral_title }}}',
                'condition' => [
                    'matrik_service_inner_genaral_style_selection' => ['style_one'],
                ]
            ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'matrik_service_inner_genaral_service_two_image',
            [
                'label' => esc_html__('Service Image', 'matrik-core'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
                'media_types' => ['image'],
            ]
        );

        $repeater->add_control(
            'matrik_service_inner_genaral_two_title',
            [
                'label'       => esc_html__('Title', 'matrik-core'),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default' => wp_kses('Workforce Training & Control', wp_kses_allowed_html('post')),
                'placeholder' => esc_html__('write your text here', 'matrik-core'),
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'matrik_service_inner_genaral_title_two_url',
            [
                'label'   => esc_html__('Title URL/Link', 'matrik-core'),
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
            'matrik_service_inner_genaral_service_button_two_text',
            [
                'label'       => esc_html__('Button Text', 'matrik-core'),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default'     => esc_html__('View Details', 'matrik-core'),
                'placeholder' => esc_html__('write your button text here', 'matrik-core'),
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'matrik_service_inner_genaral_service_button_text_two_url',
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
            'matrik_service_inner_genaral_content_two_list',
            [
                'label' => esc_html__('Content List', 'matrik-core'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'matrik_service_inner_genaral_two_title' => wp_kses('Workforce Training & Control', wp_kses_allowed_html('post')),
                    ],
                    [
                        'matrik_service_inner_genaral_two_title' => wp_kses('Logistics <br> Management', wp_kses_allowed_html('post')),
                    ],
                    [
                        'matrik_service_inner_genaral_two_title' => wp_kses('Equipment <br> Rental &amp; Leasing', wp_kses_allowed_html('post')),
                    ],
                    [
                        'matrik_service_inner_genaral_two_title' => wp_kses('Metal Work &amp; <br> Compliance Train', wp_kses_allowed_html('post')),
                    ],
                    [
                        'matrik_service_inner_genaral_two_title' => wp_kses('Solar Panel Wind Installation', wp_kses_allowed_html('post')),
                    ],
                    [
                        'matrik_service_inner_genaral_two_title' => wp_kses('Exploration and <br> Drilling', wp_kses_allowed_html('post')),
                    ],
                    [
                        'matrik_service_inner_genaral_two_title' => wp_kses('Warehousing and Distribution', wp_kses_allowed_html('post')),
                    ],
                    [
                        'matrik_service_inner_genaral_two_title' => wp_kses('Custom Fabricatio  & Prototyping', wp_kses_allowed_html('post')),
                    ],

                ],
                'title_field' => '{{{ matrik_service_inner_genaral_two_title }}}',
                'condition' => [
                    'matrik_service_inner_genaral_style_selection' => ['style_two'],
                ]
            ]
        );

        $this->end_controls_section();

        //style start

        $this->start_controls_section(
            'matrik_service_inner_style_genaral',
            [
                'label'     => esc_html__('Styles', 'matrik-core'),
                'tab'       => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'matrik_service_inner_genaral_style_selection' => ['style_one'],
                ]
            ]
        );

        $this->add_control(
            'matrik_service_inner_style_genaral_card',
            [
                'label'     => esc_html__('Card', 'matrik-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_control(
            'matrik_service_inner_style_genaral_card_bg_color',
            [
                'label'     => esc_html__('Background Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .service-card' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_service_inner_style_genaral_card_arrow_icon_color',
            [
                'label'     => esc_html__('Arrow Icon Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .service-card .arrow-vector' => 'fill: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_service_inner_style_genaral_service_title',
            [
                'label'     => esc_html__('Service Title', 'matrik-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'matrik-core'),
                'name'     => 'matrik_service_inner_style_genaral_service_title_typ',
                'selector' => '{{WRAPPER}} .service-card h4 a',

            ]
        );

        $this->add_control(
            'matrik_service_inner_style_genaral_service_title_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .service-card h4 a' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_service_inner_style_genaral_service_title_hover_color',
            [
                'label'     => esc_html__('Hover Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .service-card h4 a:hover' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_service_inner_style_genaral_service_description',
            [
                'label'     => esc_html__('Service Description', 'matrik-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'matrik-core'),
                'name'     => 'matrik_service_inner_style_genaral_service_description_typ',
                'selector' => '{{WRAPPER}} .service-card p',

            ]
        );

        $this->add_control(
            'matrik_service_inner_style_genaral_service_description_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .service-card p' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_service_inner_style_genaral_service_button',
            [
                'label'     => esc_html__('Service Button', 'matrik-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'matrik-core'),
                'name'     => 'matrik_service_inner_style_genaral_service_button_typ',
                'selector' => '{{WRAPPER}} .primary-btn3.transparent',

            ]
        );

        $this->add_control(
            'matrik_service_inner_style_genaral_service_button_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .primary-btn3.transparent' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_service_inner_style_genaral_service_button_hover_color',
            [
                'label'     => esc_html__('Hover Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .primary-btn3.transparent:hover' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_service_inner_style_genaral_service_button_icon_color',
            [
                'label'     => esc_html__('Icon Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .primary-btn3.transparent .arrow' => 'fill: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_service_inner_style_genaral_service_button_icon_hover_color',
            [
                'label'     => esc_html__('Hover Icon Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .primary-btn3.transparent:hover .arrow' => 'fill: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_service_inner_style_genaral_service_button_border_color',
            [
                'label'     => esc_html__('Border Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .primary-btn3.transparent' => 'border: 1px solid {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_service_inner_style_genaral_service_button_border_hover_color',
            [
                'label'     => esc_html__('Hover Border Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .primary-btn3.transparent:hover' => 'border-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_service_inner_style_genaral_service_button_bg_color',
            [
                'label'     => esc_html__('Background Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .primary-btn3.transparent' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_service_inner_style_genaral_service_button_hover_bg_color',
            [
                'label'     => esc_html__('Hover Background Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .primary-btn3.transparent::after' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section();


        //style start

        $this->start_controls_section(
            'matrik_service_inner_style_two_genaral',
            [
                'label'     => esc_html__('Styles', 'matrik-core'),
                'tab'       => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'matrik_service_inner_genaral_style_selection' => ['style_two'],
                ]
            ]
        );

        $this->add_control(
            'matrik_service_inner_style_two_genaral_service_card',
            [
                'label'     => esc_html__('Service Card', 'matrik-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_control(
            'matrik_service_inner_style_two_genaral_service_card_border_color',
            [
                'label'     => esc_html__('Border Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .service-card3.two' => 'border: 1px solid {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_service_inner_style_two_genaral_service_card_bg_color',
            [
                'label'     => esc_html__('Background Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .service-card3.two' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_service_inner_style_two_genaral_service_card_hover_bg_color',
            [
                'label'     => esc_html__('Hover Background Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .service-card3.two:hover' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_service_inner_style_two_genaral_service_title',
            [
                'label'     => esc_html__('Service Title', 'matrik-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'matrik-core'),
                'name'     => 'matrik_service_inner_style_two_genaral_service_title_typ',
                'selector' => '{{WRAPPER}} .service-card3.two .service-content h4 a',

            ]
        );

        $this->add_control(
            'matrik_service_inner_style_two_genaral_service_title_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .service-card3.two .service-content h4 a' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_service_inner_style_two_genaral_service_title_hover_color',
            [
                'label'     => esc_html__('Hover Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .service-card3.two .service-content h4 a:hover' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_service_inner_style_two_genaral_service_button',
            [
                'label'     => esc_html__('Service Button', 'matrik-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'matrik-core'),
                'name'     => 'matrik_service_inner_style_two_genaral_service_button_typ',
                'selector' => '{{WRAPPER}} .service-card3.two .service-content .details-btn',

            ]
        );

        $this->add_control(
            'matrik_service_inner_style_two_genaral_service_button_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .service-card3.two .service-content .details-btn' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_service_inner_style_two_genaral_service_button_hover_color',
            [
                'label'     => esc_html__('Hover Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .service-card3.two .service-content .details-btn:hover' => 'color: {{VALUE}};',
                ],
            ]
        );


        $this->add_control(
            'matrik_service_inner_style_two_genaral_service_button_icon_color',
            [
                'label'     => esc_html__('Icon Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .service-card3.two .service-content .details-btn .arrow' => 'fill: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_service_inner_style_two_genaral_service_button_border_color',
            [
                'label'     => esc_html__('Border Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .service-card3.two .service-content .details-btn' => 'border: 1px solid {{VALUE}};',
                ],
            ]
        );


        $this->add_control(
            'matrik_service_inner_style_two_genaral_service_button_hover_bg_color',
            [
                'label'     => esc_html__('Hover Background Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .service-card3 .service-content .details-btn::after' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section();
    }
    protected function render()
    {

        $settings = $this->get_settings_for_display();

?>

        <?php if ($settings['matrik_service_inner_genaral_style_selection'] == 'style_one') : ?>
            <div class="service-page" id="scroll-section">
                <div class="container">
                    <div class="row gy-md-5 gy-4 mb-70">
                        <?php foreach ($settings['matrik_service_inner_genaral_content_list'] as $data) : ?>
                            <div class="col-xl-3 col-lg-4 col-sm-6 wow animate fadeInDown" data-wow-delay="200ms" data-wow-duration="1500ms">
                                <div class="service-card magnetic-item">
                                    <?php if (!empty($data['matrik_service_inner_genaral_title'])) : ?>
                                        <h4><a href="<?php echo esc_url($data['matrik_service_inner_genaral_title_url']['url']); ?>"><?php echo wp_kses($data['matrik_service_inner_genaral_title'], wp_kses_allowed_html('post')); ?></a></h4>
                                    <?php endif; ?>
                                    <?php if (!empty($data['matrik_service_inner_genaral_service_image']['url'])) : ?>
                                        <a href="<?php echo esc_url($data['matrik_service_inner_genaral_title_url']['url']); ?>" class="service-img"><img src="<?php echo esc_url($data['matrik_service_inner_genaral_service_image']['url']); ?>" alt="<?php echo esc_attr__('service-image', 'matrik-core'); ?>"></a>
                                    <?php endif; ?>
                                    <?php if (!empty($data['matrik_service_inner_genaral_description'])) : ?>
                                        <p><?php echo esc_html($data['matrik_service_inner_genaral_description']); ?></p>
                                    <?php endif; ?>
                                    <?php if (!empty($data['matrik_service_inner_genaral_service_button_text'])) : ?>
                                        <a class="primary-btn3 transparent" href="<?php echo esc_url($data['matrik_service_inner_genaral_service_button_text_url']['url']); ?>">
                                            <span><?php echo esc_html($data['matrik_service_inner_genaral_service_button_text']); ?>
                                            </span>
                                            <span><?php echo esc_html($data['matrik_service_inner_genaral_service_button_text']); ?>
                                            </span>
                                            <svg class="arrow" width="17" height="17" viewBox="0 0 17 17" xmlns="http://www.w3.org/2000/svg">
                                                <g>
                                                    <path d="M0.0836709 0H16.9997V3.16667L3.19756 17L-0.000488281 13.8333L9.42534 4.5L0.0836709 4.58333V0Z" />
                                                    <path d="M16.9997 17V6.33337L12.4551 10.8334V17H16.9997Z" />
                                                </g>
                                            </svg>
                                        </a>
                                    <?php endif; ?>
                                    <svg class="arrow-vector" width="50" height="50" viewBox="0 0 50 50" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M0.247529 0H50.0008V9.31379L9.40609 50.0004L0 40.6866L27.7232 13.2354L0.247529 13.4805V0Z" />
                                        <path d="M50.0013 50.0006V18.6278L36.6348 31.8632V50.0006H50.0013Z" />
                                    </svg>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        <?php endif; ?>

        <?php if ($settings['matrik_service_inner_genaral_style_selection'] == 'style_two') : ?>
            <div class="service-page" id="scroll-section">
                <div class="container">
                    <div class="row gy-md-5 gy-4 mb-70">
                        <?php foreach ($settings['matrik_service_inner_genaral_content_two_list'] as $data) : ?>
                            <div class="col-xl-3 col-lg-4 col-sm-6 wow animate fadeInDown" data-wow-delay="200ms" data-wow-duration="1500ms">
                                <div class="service-card3 two magnetic-item">
                                    <?php if (!empty($data['matrik_service_inner_genaral_service_two_image']['url'])) : ?>
                                        <div class="service-img">
                                            <img src="<?php echo esc_url($data['matrik_service_inner_genaral_service_two_image']['url']); ?>" alt="<?php echo esc_attr__('service-image', 'matrik-core'); ?>">
                                        </div>
                                    <?php endif; ?>
                                    <div class="service-content">
                                        <?php if (!empty($data['matrik_service_inner_genaral_two_title'])) : ?>
                                            <h4><a href="<?php echo esc_url($data['matrik_service_inner_genaral_title_two_url']['url']); ?>"><?php echo wp_kses($data['matrik_service_inner_genaral_two_title'], wp_kses_allowed_html('post')); ?></a></h4>
                                        <?php endif; ?>
                                        <?php if (!empty($data['matrik_service_inner_genaral_service_button_two_text'])) : ?>
                                            <a href="<?php echo esc_url($data['matrik_service_inner_genaral_service_button_text_two_url']['url']); ?>" class="details-btn"><?php echo esc_html($data['matrik_service_inner_genaral_service_button_two_text']); ?>
                                                <svg class="arrow" width="17" height="17" viewBox="0 0 17 17" xmlns="http://www.w3.org/2000/svg">
                                                    <g>
                                                        <path d="M0.0841592 0H17.0002V3.16667L3.19805 17L0 13.8333L9.42583 4.5L0.0841592 4.58333V0Z" />
                                                        <path d="M16.9997 16.9999V6.33325L12.4551 10.8333V16.9999H16.9997Z" />
                                                    </g>
                                                </svg>
                                            </a>
                                        <?php endif; ?>
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

Plugin::instance()->widgets_manager->register(new Matrik_Service_Inner_Widget());
