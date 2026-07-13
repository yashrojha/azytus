<?php

namespace Elementor;

if (!defined('ABSPATH')) exit;  // Exit if accessed directly

use Elementor\core\Schemes;
use Egns_Core\Egns_Helper;

class Matrik_Feature_Inner_Widget extends Widget_Base
{
    private function number_to_word($number)
    {
        $words = [
            'One',
            'Two',
            'Three',
            'Four',
            'Five',
            'Six',
            'Seven',
            'Eight',
            'Nine',
            'Ten',
            'Eleven',
            'Twelve',
            'Thirteen',
            'Fourteen',
            'Fifteen',
            'Sixteen',
            'Seventeen',
            'Eighteen',
            'Nineteen',
            'Twenty',
            'TwentyOne',
            'TwentyTwo',
            'TwentyThree',
            'TwentyFour',
            'TwentyFive'
        ];

        return isset($words[$number]) ? $words[$number] : 'Item' . $number;
    }

    public function get_name()
    {
        return 'matrik_feature_inner';
    }

    public function get_title()
    {
        return esc_html__('EG Feature Inner', 'matrik-core');
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
            'matrik_feature_inner_genaral',
            [
                'label' => esc_html__('General', 'matrik-core')
            ]
        );

        $this->add_control(
            'matrik_inner_feature_genaral_style_selection',
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

        $this->add_control(
            'matrik_feature_inner_genaral_header_switcher',
            [
                'label' => esc_html__("Show Header Area?", 'matrik-core'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Enable', 'matrik-core'),
                'label_off' => esc_html__('Disable', 'matrik-core'),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );

        $this->add_control(
            'matrik_feature_inner_genaral_header_subtitle',
            [
                'label'       => esc_html__('Header Subtitle', 'matrik-core'),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default'     => esc_html__('Matrik Facilities', 'matrik-core'),
                'placeholder' => esc_html__('write your subtitle here', 'matrik-core'),
                'label_block' => true,
                'condition' => [
                    'matrik_feature_inner_genaral_header_switcher' => ['yes'],
                    'matrik_inner_feature_genaral_style_selection' => ['style_one'],
                ]
            ]
        );

        $this->add_control(
            'matrik_matrik_feature_genaral_header_subtitle',
            [
                'label'       => esc_html__('Header Subtitle', 'matrik-core'),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default'     => esc_html__('Product Features', 'matrik-core'),
                'placeholder' => esc_html__('write your subtitle here', 'matrik-core'),
                'label_block' => true,
                'condition' => [
                    'matrik_feature_inner_genaral_header_switcher' => ['yes'],
                    'matrik_inner_feature_genaral_style_selection' => ['style_two'],
                ]
            ]
        );

        $this->add_control(
            'matrik_feature_inner_genaral_header_title',
            [
                'label'       => esc_html__('Header Title', 'matrik-core'),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default'     => esc_html__('Why You Should Attach Our Expert Member!', 'matrik-core'),
                'placeholder' => esc_html__('write your title here', 'matrik-core'),
                'label_block' => true,
                'condition' => [
                    'matrik_feature_inner_genaral_header_switcher' => ['yes'],
                    'matrik_inner_feature_genaral_style_selection' => ['style_one'],
                ]
            ]
        );

        $this->add_control(
            'matrik_material_feature_genaral_header_title',
            [
                'label'       => esc_html__('Header Title', 'matrik-core'),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default'     => esc_html__('Cold-Rolled Coil Products', 'matrik-core'),
                'placeholder' => esc_html__('write your title here', 'matrik-core'),
                'label_block' => true,
                'condition' => [
                    'matrik_feature_inner_genaral_header_switcher' => ['yes'],
                    'matrik_inner_feature_genaral_style_selection' => ['style_two'],
                ]
            ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'matrik_feature_inner_genaral_icon_image',
            [
                'label' => esc_html__('Icon Image', 'matrik-core'),
                'type' => \Elementor\Controls_Manager::ICONS,
                'default' => [
                    'value' => 'fas fa-circle',
                    'library' => 'fa-solid',
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
            'matrik_feature_inner_genaral_title',
            [
                'label'       => esc_html__('Title', 'matrik-core'),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default' => wp_kses('Cutting-Edge <br> Machinery', wp_kses_allowed_html('post')),
                'placeholder' => esc_html__('write your text here', 'matrik-core'),
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'matrik_feature_inner_genaral_description',
            [
                'label'       => esc_html__('Description', 'matrik-core'),
                'type'        => \Elementor\Controls_Manager::TEXTAREA,
                'default'     => esc_html__('Conduct a thoroug need effortless assessment the understand your current marketing.', 'matrik-core'),
                'placeholder' => esc_html__('write your text here', 'matrik-core'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'matrik_feature_inner_genaral_content_list',
            [
                'label' => esc_html__('Content List', 'matrik-core'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'matrik_feature_inner_genaral_title' => wp_kses('Cutting-Edge <br> Machinery', wp_kses_allowed_html('post')),

                    ],
                    [
                        'matrik_feature_inner_genaral_title' => wp_kses('Quality Control <br> Systems', wp_kses_allowed_html('post')),

                    ],
                    [
                        'matrik_feature_inner_genaral_title' => wp_kses('Scalability and <br> Flexibility', wp_kses_allowed_html('post')),

                    ],
                    [
                        'matrik_feature_inner_genaral_title' => wp_kses('Sustainable <br> Operation &amp; Safety', wp_kses_allowed_html('post')),

                    ],
                    [
                        'matrik_feature_inner_genaral_title' => wp_kses('Quality Control <br> Systems', wp_kses_allowed_html('post')),

                    ],
                    [
                        'matrik_feature_inner_genaral_title' => wp_kses('Scalability and <br> Flexibility', wp_kses_allowed_html('post')),

                    ],

                ],
                'title_field' => '{{{ matrik_feature_inner_genaral_title }}}',
                'condition'    => [
                    'matrik_inner_feature_genaral_style_selection' => ['style_one'],
                ]
            ]
        );

        $mat_repeater = new \Elementor\Repeater();

        $mat_repeater->add_control(
            'matrik_material_feature_image',
            [
                'label'     => esc_html__('Feature Image', 'matrik-core'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
                'media_types' => ['image'],
            ]
        );

        $mat_repeater->add_control(
            'matrik_material_feature_title',
            [
                'label'     => esc_html__('Feature Heading', 'matrik-core'),
                'type'      => \Elementor\Controls_Manager::TEXT,
                'default'     => esc_html__('Solutions Expert', 'matrik-core'),
                'placeholder' => esc_html__('Write your text here', 'matrik-core'),
                'label_block' => true,
            ]
        );

        $mat_repeater->add_control(
            'matrik_material_feature_desc',
            [
                'label'     => esc_html__('Feature Description', 'matrik-core'),
                'type'      => \Elementor\Controls_Manager::TEXTAREA,
                'default'     => esc_html__('Spanish mackerel yellow weaver sigils. Sunporch flying fish yellowfin cutthroat trout grouper whitebait oneamt horsefish bullhead shark California smoothtongue, striped burrfish threadtail saber-toothed blenny Red Seden ut perspiciatis unde omnis iste natus ut perspic iatis unde omnis iste perspiciatis ut perspiciatis unde omnison iste natus we are work industry very fast and worked smoothly.', 'matrik-core'),
                'placeholder' => esc_html__('Write your text here', 'matrik-core'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'matrik_material_feature_list',
            [
                'label' => esc_html__('Feature List', 'matrik-core'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $mat_repeater->get_controls(),
                'default' => [
                    [
                        'matrik_material_feature_title' => wp_kses('<span>01</span>Solutions Expert', wp_kses_allowed_html('post')),
                        'matrik_material_feature_desc' => wp_kses('Spanish mackerel yellow weaver sigils. Sunporch flying fish yellowfin cutthroat trout grouper whitebait oneamt horsefish bullhead shark California smoothtongue, striped burrfish threadtail saber-toothed blenny Red Seden ut perspiciatis unde omnis iste natus ut perspic iatis unde omnis iste perspiciatis ut perspiciatis unde omnison iste natus we are work industry very fast and worked smoothly.', wp_kses_allowed_html('post')),

                    ],
                    [
                        'matrik_material_feature_title' => wp_kses('<span>02</span>Trusted Partner', wp_kses_allowed_html('post')),
                        'matrik_material_feature_desc' => wp_kses('A trusted partner is a reliable and dependable collaborator who consistently delivers quality, integrity, and support in a professional relationship. They prioritize transparency, effective communication, and shared goals, ensuring long-term success and mutual growth. Whether in business or personal relationships, a trusted partner fosters confidence, accountability, and a strong foundation for collaboration.', wp_kses_allowed_html('post')),

                    ],
                    [
                        'matrik_material_feature_title' => wp_kses('<span>03</span>Driving Innovation', wp_kses_allowed_html('post')),
                        'matrik_material_feature_desc' => wp_kses('Driving Innovation means continuously exploring new ideas, technologies, and strategies to improve products, services, and processes. It involves creativity, problem-solving, and adapting to changing market needs to stay ahead of the competition. By fostering a culture of innovation, businesses can enhance efficiency, meet customer demands, and drive long-term success. ', wp_kses_allowed_html('post')),

                    ],
                    [
                        'matrik_material_feature_title' => wp_kses('<span>04</span>Pushing the boundaries', wp_kses_allowed_html('post')),
                        'matrik_material_feature_desc' => wp_kses('Driving Innovation means continuously exploring new ideas, technologies, and strategies to improve products, services, and processes. It involves creativity, problem-solving, and adapting to changing market needs to stay ahead of the competition. By fostering a culture of innovation, businesses can enhance efficiency, meet customer demands, and drive long-term success. ', wp_kses_allowed_html('post')),

                    ],

                ],
                'title_field' => '{{{ matrik_material_feature_title }}}',
                'condition'    => [
                    'matrik_inner_feature_genaral_style_selection' => ['style_two'],
                ]
            ]
        );


        $this->end_controls_section();



        $this->start_controls_section(
            'matrik_feature_inner_style_genaral',
            [
                'label'     => esc_html__('Styles', 'matrik-core'),
                'tab'       => Controls_Manager::TAB_STYLE,
                'condition'    => [
                    'matrik_inner_feature_genaral_style_selection' => ['style_one'],
                ]
            ]
        );

        $this->add_control(
            'matrik_feature_inner_style_genaral_subtitle',
            [
                'label'     => esc_html__('Header Subtitle', 'matrik-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'matrik-core'),
                'name'     => 'matrik_feature_inner_style_genaral_subtitle_typ',
                'selector' => '{{WRAPPER}} .section-title > span',

            ]
        );

        $this->add_control(
            'matrik_feature_inner_style_genaral_subtitle_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .section-title > span' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_feature_inner_style_genaral_subtitle_line_color',
            [
                'label'     => esc_html__('Line Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .section-title > span::after' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_feature_inner_style_genaral_header_title',
            [
                'label'     => esc_html__('Header Title', 'matrik-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'matrik-core'),
                'name'     => 'matrik_feature_inner_style_genaral_header_title_typ',
                'selector' => '{{WRAPPER}} .section-title h2',

            ]
        );

        $this->add_control(
            'matrik_feature_inner_style_genaral_header_title_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .section-title h2' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_feature_inner_style_genaral_content_icon',
            [
                'label'     => esc_html__('Content Icon', 'matrik-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_control(
            'matrik_feature_inner_style_genaral_content_icon_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home1-feature-section .feature-wrap .single-feature svg' => 'fill: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_feature_inner_style_genaral_content_title',
            [
                'label'     => esc_html__('Content Title', 'matrik-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'matrik-core'),
                'name'     => 'matrik_feature_inner_style_genaral_content_title_typ',
                'selector' => '{{WRAPPER}} .home1-feature-section .feature-wrap .single-feature h5',

            ]
        );

        $this->add_control(
            'matrik_feature_inner_style_genaral_content_title_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home1-feature-section .feature-wrap .single-feature h5' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_feature_inner_style_genaral_content_description',
            [
                'label'     => esc_html__('Content Description', 'matrik-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'matrik-core'),
                'name'     => 'matrik_feature_inner_style_genaral_content_description_typ',
                'selector' => '{{WRAPPER}} .home1-feature-section .feature-wrap .single-feature h5',

            ]
        );

        $this->add_control(
            'matrik_feature_inner_style_genaral_content_description_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home1-feature-section .feature-wrap .single-feature h5' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'matrik_material_feature_style_seven_general',
            [
                'label'     => esc_html__('Styles', 'matrik-core'),
                'tab'       => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'matrik_inner_feature_genaral_style_selection' => ['style_two'],
                ]
            ]
        );

        $this->add_control(
            'matrik_material_feature_style_general_section',
            [
                'label'     => esc_html__('Section General', 'matrik-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_control(
            'matrik_material_feature_style_general_background_ccolor',
            [
                'label'     => esc_html__('Background Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home2-why-choose-us-section.two' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_material_feature_style_general_border_color',
            [
                'label'     => esc_html__('Border Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home2-why-choose-us-section .faq-content .accordion .accordion-item .accordion-header .accordion-button' => 'border-color: {{VALUE}};',
                    '{{WRAPPER}} .home2-why-choose-us-section .faq-content .accordion .accordion-item .accordion-body' => 'border-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Subtitle Typography', 'matrik-core'),
                'name'     => 'matrik_material_feature_genaral_subtitle_typ',
                'selector' => '{{WRAPPER}} .section-title > span',

            ]
        );

        $this->add_control(
            'matrik_material_feature_genaral_subtitle_color',
            [
                'label'     => esc_html__('Subtitle Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .section-title > span' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_material_feature_genaral_subtitle_icon_color',
            [
                'label'     => esc_html__('Subtitle Icon Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .section-title > span::after' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Title Typography', 'matrik-core'),
                'name'     => 'matrik_material_feature_genaral_title_typ',
                'selector' => '{{WRAPPER}} .section-title h2',

            ]
        );

        $this->add_control(
            'matrik_material_feature_genaral_title_color',
            [
                'label'     => esc_html__('Title Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .section-title h2' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_material_feature_accordion_style',
            [
                'label'     => esc_html__('Features', 'matrik-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_control(
            'matrik_material_feature_style_general_background_color',
            [
                'label'     => esc_html__('Background Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home2-why-choose-us-section.two' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'matrik-core'),
                'name'     => 'matrik_material_feature_genaral_item_title_typ',
                'selector' => '{{WRAPPER}} .home2-why-choose-us-section .faq-content .accordion .accordion-item .accordion-header .accordion-button',

            ]
        );

        $this->add_control(
            'matrik_material_feature_genaral_item_title_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home2-why-choose-us-section .faq-content .accordion .accordion-item .accordion-header .accordion-button' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'matrik-core'),
                'name'     => 'matrik_material_feature_genaral_item_desc_typ',
                'selector' => '{{WRAPPER}} .home2-why-choose-us-section .faq-content .accordion .accordion-item .accordion-body',

            ]
        );

        $this->add_control(
            'matrik_material_feature_genaral_item_desc_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home2-why-choose-us-section .faq-content .accordion .accordion-item .accordion-body' => 'color: {{VALUE}};',
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
                var swiper = new Swiper(".home1-feature-slider", {
                    slidesPerView: 1,
                    speed: 1500,
                    spaceBetween: 0,
                    autoplay: {
                        delay: 2500, // Autoplay duration in milliseconds
                        disableOnInteraction: false,
                    },
                    navigation: {
                        nextEl: ".process-slider-next",
                        prevEl: ".process-slider-prev",
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
            </script>
        <?php endif; ?>

        <?php if ($settings['matrik_inner_feature_genaral_style_selection'] == 'style_one') : ?>
            <div class="home1-feature-section">
                <div class="container">
                    <?php if ($settings['matrik_feature_inner_genaral_header_switcher'] == 'yes') : ?>
                        <div class="row g-4 justify-content-center mb-70">
                            <div class="col-xl-7 col-lg-8 wow animate fadeInDown" data-wow-delay="200ms" data-wow-duration="1500ms">
                                <div class="section-title text-center">
                                    <?php if (!empty($settings['matrik_feature_inner_genaral_header_subtitle'])) : ?>
                                        <span><?php echo esc_html($settings['matrik_feature_inner_genaral_header_subtitle']); ?></span>
                                    <?php endif; ?>
                                    <?php if (!empty($settings['matrik_feature_inner_genaral_header_title'])) : ?>
                                        <h2><?php echo esc_html($settings['matrik_feature_inner_genaral_header_title']); ?></h2>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
                    <div class="feature-wrap">
                        <div class="swiper home1-feature-slider">
                            <div class="swiper-wrapper">
                                <?php foreach ($settings['matrik_feature_inner_genaral_content_list'] as $data) : ?>
                                    <div class="swiper-slide">
                                        <div class="single-feature">
                                            <?php if (!empty($data['matrik_feature_inner_genaral_icon_image'])) : ?>
                                                <?php \Elementor\Icons_Manager::render_icon($data['matrik_feature_inner_genaral_icon_image'], ['aria-hidden' => 'true']); ?>
                                            <?php endif; ?>
                                            <?php if (!empty($data['matrik_feature_inner_genaral_title'])) : ?>
                                                <h5><?php echo wp_kses($data['matrik_feature_inner_genaral_title'], wp_kses_allowed_html('post')); ?></h5>
                                            <?php endif; ?>
                                            <?php if (!empty($data['matrik_feature_inner_genaral_description'])) : ?>
                                                <p><?php echo esc_html($data['matrik_feature_inner_genaral_description']); ?></p>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>

        <?php if ($settings['matrik_inner_feature_genaral_style_selection'] == 'style_two') : ?>
            <div class="home2-why-choose-us-section two">
                <div class="container">
                    <div class="row g-4 align-items-center justify-content-between mb-60">
                        <div class="col-xl-6 col-lg-8 wow animate fadeInLeft" data-wow-delay="200ms" data-wow-duration="1500ms">
                            <div class="section-title">
                                <?php if (!empty($settings['matrik_matrik_feature_genaral_header_subtitle'])) : ?>
                                    <span><?php echo esc_html($settings['matrik_matrik_feature_genaral_header_subtitle']); ?></span>
                                <?php endif; ?>
                                <?php if (!empty($settings['matrik_material_feature_genaral_header_title'])) : ?>
                                    <h2><?php echo esc_html($settings['matrik_material_feature_genaral_header_title']); ?></h2>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                    <div class="row justify-content-xl-end">
                        <div class="col-xl-11">
                            <div class="faq-content">
                                <div class="accordion" id="accordionTravel">

                                <?php foreach ($settings['matrik_material_feature_list'] as $index => $data) : 
                                    $word = $this->number_to_word( $index );
                                    $heading_id3 = 'heading' . $word;
                                    $collapse_id3 = 'collapse' . $word;

                                    $is_first = $index === 0;
                                    ?>
                                    <div class="accordion-item wow animate fadeInDown" data-wow-delay="200ms" data-wow-duration="1500ms">
                                        <h2 class="accordion-header" id="travelheading<?php echo esc_attr( $heading_id3 ); ?>">
                                            <button class="accordion-button <?php echo ( $is_first ? '' : 'collapsed' ) ?>" type="button" data-bs-toggle="collapse" data-bs-target="#travelcollapse<?php echo esc_attr( $collapse_id3 ); ?>" aria-expanded="<?php echo esc_attr(( $is_first ? 'true' : 'false' )); ?>" aria-controls="travelcollapse<?php echo esc_attr( $collapse_id3 ); ?>">
                                                <?php echo wp_kses( $data['matrik_material_feature_title'], wp_kses_allowed_html('post') ); ?>
                                            </button>
                                        </h2>
                                        <div id="travelcollapse<?php echo esc_attr( $collapse_id3 ); ?>" class="accordion-collapse collapse <?php echo ( $is_first ? 'show' : '' ); ?>" aria-labelledby="travelheading<?php echo esc_attr( $heading_id3 ); ?>" data-bs-parent="#accordionTravel">
                                            <div class="accordion-body">
                                                <?php if( !empty( $data['matrik_material_feature_image'] ) ): ?>
                                                <img src="<?php echo esc_url( $data['matrik_material_feature_image']['url'] ); ?>" alt="<?php echo esc_attr__( 'feature-image', 'matrik-core' ); ?>">
                                                <?php endif; ?>
                                                <?php echo esc_html( $data[ 'matrik_material_feature_desc' ] ); ?>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>

<?php

    }
}

Plugin::instance()->widgets_manager->register(new Matrik_Feature_Inner_Widget());
