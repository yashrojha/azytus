<?php

namespace Elementor;

if (!defined('ABSPATH')) exit;  // Exit if accessed directly

use Elementor\core\Schemes;
use Egns_Core\Egns_Helper;

class Matrik_Hero_Banner_Five_Widget extends Widget_Base
{

    public function get_name()
    {
        return 'matrik_hero_banner_five';
    }

    public function get_title()
    {
        return esc_html__('EG Hero Banner Five', 'matrik-core');
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
            'matrik_hero_banner_five_genaral',
            [
                'label' => esc_html__('General', 'matrik-core')
            ]
        );

        $this->add_control(
            'matrik_hero_banner_five_genaral_title',
            [
                'label'       => esc_html__('Title', 'matrik-core'),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default' => wp_kses('Leading the way shaping <span>the future of textile.</span>', wp_kses_allowed_html('post')),
                'placeholder' => esc_html__('write your title here', 'matrik-core'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'matrik_hero_banner_five_genaral_description',
            [
                'label'       => esc_html__('Description', 'matrik-core'),
                'type'        => \Elementor\Controls_Manager::TEXTAREA,
                'default'     => esc_html__('Sed nisl eros, condimentum nec risus sit amet, finibus conguese.Fusen fringilla est libero, sed tempus urna feugiat eu. Curabitur eu Here are some creative title options for your testimonial section feugiat ligu Suspendisse nectoraba porttitor velit go this week and more about.', 'matrik-core'),
                'placeholder' => esc_html__('write your description here', 'matrik-core'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'matrik_hero_banner_five_genaral_expert_gallary',
            [
                'label' => esc_html__('Add Expert Images', 'matrik-core'),
                'type' => \Elementor\Controls_Manager::GALLERY,
                'show_label' => false,
                'default' => [],
            ]
        );

        $this->add_control(
            'matrik_hero_banner_five_genaral_button',
            [
                'label'       => esc_html__('Button', 'matrik-core'),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default'     => esc_html__('1k PEOPLE WORK WITH US', 'matrik-core'),
                'placeholder' => esc_html__('write your button text here', 'matrik-core'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'matrik_hero_banner_five_genaral_button_url',
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
            'matrik_hero_banner_five_genaral_circular_text',
            [
                'label'       => esc_html__('Circular Text', 'matrik-core'),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default'     => esc_html__(' STRATEGY . DESIGN . BRAND .', 'matrik-core'),
                'placeholder' => esc_html__('write your button text here', 'matrik-core'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'matrik_hero_banner_five_genaral_circular_text_url',
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

        $this->start_controls_section(
            'matrik_hero_banner_five_featured_section',
            [
                'label' => esc_html__('Featured Section', 'matrik-core')
            ]
        );

        $this->add_control(
            'matrik_hero_banner_five_featured_section_featured_image',
            [
                'label' => esc_html__('Featured Image', 'matrik-core'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
                'media_types' => ['image'],
            ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'matrik_hero_banner_five_featured_section_icon_image',
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
            'matrik_hero_banner_five_featured_section_content_title',
            [
                'label'       => esc_html__('Content Title', 'matrik-core'),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default' => wp_kses('Best Production', wp_kses_allowed_html('post')),
                'placeholder' => esc_html__('write your text here', 'matrik-core'),
                'label_block' => true,
            ]
        );


        $repeater->add_control(
            'matrik_hero_banner_five_featured_section_content_description',
            [
                'label'       => esc_html__('Content Description', 'matrik-core'),
                'type'        => \Elementor\Controls_Manager::TEXTAREA,
                'default'     => esc_html__('Conduct a thoroug need effortless assessment the understand your current marketing.', 'matrik-core'),
                'placeholder' => esc_html__('write your text here', 'matrik-core'),
                'label_block' => true,
            ]
        );


        $this->add_control(
            'matrik_hero_banner_five_featured_section_content_list',
            [
                'label' => esc_html__('Content List', 'matrik-core'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'matrik_hero_banner_five_featured_section_content_title' => wp_kses('Best Production', wp_kses_allowed_html('post')),
                        'matrik_hero_banner_five_featured_section_content_description' => esc_html('Sed nisl eros, condimentum nec risus amet finib cons sem fusce.'),

                    ],
                    [
                        'matrik_hero_banner_five_featured_section_content_title' => wp_kses('Eco-Certifications', wp_kses_allowed_html('post')),
                        'matrik_hero_banner_five_featured_section_content_description' => esc_html('Sed nisl eros, condimentum nec risus amet finib cons sem fusce.'),

                    ],
                    [
                        'matrik_hero_banner_five_featured_section_content_title' => wp_kses('SQuality Materials', wp_kses_allowed_html('post')),
                        'matrik_hero_banner_five_featured_section_content_description' => esc_html('Sed nisl eros, condimentum nec risus amet finib cons sem fusce.'),

                    ],

                ],
                'title_field' => '{{{ matrik_hero_banner_five_featured_section_content_title }}}',
            ]
        );

        $this->end_controls_section();

        //style start

        $this->start_controls_section(
            'matrik_hero_banner_five_style_genaral',
            [
                'label'     => esc_html__('Styles', 'matrik-core'),
                'tab'       => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'matrik_hero_banner_five_style_genaral_title',
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
                'name'     => 'matrik_hero_banner_five_style_genaral_title_typ',
                'selector' => '{{WRAPPER}} .home5-banner-section .banner-wrapper .title-area h1',

            ]
        );

        $this->add_control(
            'matrik_hero_banner_five_style_genaral_title_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home5-banner-section .banner-wrapper .title-area h1' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_hero_banner_five_style_genaral_title_span_color',
            [
                'label'     => esc_html__('Span Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home5-banner-section .banner-wrapper .title-area h1 span' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_hero_banner_five_style_genaral_description',
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
                'name'     => 'matrik_hero_banner_five_style_genaral_description_typ',
                'selector' => '{{WRAPPER}} .home5-banner-section .banner-wrapper .banner-content p',

            ]
        );

        $this->add_control(
            'matrik_hero_banner_five_style_genaral_description_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home5-banner-section .banner-wrapper .banner-content p' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_hero_banner_five_style_genaral_description_icon_color',
            [
                'label'     => esc_html__('Icon Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home5-banner-section .banner-wrapper .banner-content p::before' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_hero_banner_five_style_genaral_button',
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
                'name'     => 'matrik_hero_banner_five_style_genaral_button_typ',
                'selector' => '{{WRAPPER}} .home5-banner-section .banner-wrapper .banner-content .btn-area a',

            ]
        );

        $this->add_control(
            'matrik_hero_banner_five_style_genaral_button_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home5-banner-section .banner-wrapper .banner-content .btn-area a' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_hero_banner_five_style_genaral_button_hover_color',
            [
                'label'     => esc_html__('Hover Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home5-banner-section .banner-wrapper .banner-content .btn-area a:hover' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_hero_banner_five_style_genaral_circular_text',
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
                'name'     => 'matrik_hero_banner_five_style_genaral_circular_text_typ',
                'selector' => '{{WRAPPER}} .home5-feature-section .circular-text .text span',

            ]
        );

        $this->add_control(
            'matrik_hero_banner_five_style_genaral_circular_text_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home5-feature-section .circular-text .text span' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_hero_banner_five_style_genaral_circular_text_icon',
            [
                'label'     => esc_html__('Circular Text Icon', 'matrik-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'matrik-core'),
                'name'     => 'matrik_hero_banner_five_style_genaral_circular_text_icon_typ',
                'selector' => '{{WRAPPER}} .home5-feature-section .circular-text .center-icon svg',

            ]
        );

        $this->add_control(
            'matrik_hero_banner_five_style_genaral_circular_text_icon_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home5-feature-section .circular-text .center-icon svg' => 'fill: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_hero_banner_five_style_genaral_circular_text_icon_inside_bg_color',
            [
                'label'     => esc_html__('Inside Background Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home5-feature-section .circular-text .center-icon' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_hero_banner_five_style_genaral_circular_text_icon_outside_bg_color',
            [
                'label'     => esc_html__('Outside Background Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home5-feature-section .circular-text' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_hero_banner_five_style_genaral_circular_text_icon_outside_border_color',
            [
                'label'     => esc_html__('Outside Border Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home5-feature-section .circular-text' => 'border: 1px solid {{VALUE}};',
                ],
            ]
        );


        $this->end_controls_section();

        //style featured

        $this->start_controls_section(
            'matrik_hero_banner_five_style_featured',
            [
                'label'     => esc_html__('Featured Style', 'matrik-core'),
                'tab'       => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'matrik_hero_banner_five_style_featured_card',
            [
                'label'     => esc_html__('Featured Card', 'matrik-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_control(
            'matrik_hero_banner_five_style_featured_card_bg_color',
            [
                'label'     => esc_html__('Background Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home5-feature-section .feature-wrapper .feature-content' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_hero_banner_five_style_featured_icon',
            [
                'label'     => esc_html__('Icon', 'matrik-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_control(
            'matrik_hero_banner_five_style_featured_icon_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home5-feature-section .feature-wrapper .feature-content .single-feature .icon svg' => 'fill: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_hero_banner_five_style_featured_icon_width',
            [
                'label' => esc_html__('Width', 'matrik-core'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 1000,
                        'step' => 5,
                    ],
                    '%' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                ],
                'default' => [
                    'unit' => '%',
                    'size' => 100,
                ],
                'selectors' => [
                    '{{WRAPPER}} .home5-feature-section .feature-wrapper .feature-content .single-feature .icon svg' => 'width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );


        $this->add_control(
            'matrik_hero_banner_five_style_featured_icon_height',
            [
                'label' => esc_html__('Height', 'matrik-core'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 1000,
                        'step' => 5,
                    ],
                    '%' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                ],
                'default' => [
                    'unit' => '%',
                    'size' => 55,
                ],
                'selectors' => [
                    '{{WRAPPER}} .home5-feature-section .feature-wrapper .feature-content .single-feature .icon svg' => 'height: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_hero_banner_five_style_featured_title',
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
                'name'     => 'matrik_hero_banner_five_style_featured_title_typ',
                'selector' => '{{WRAPPER}} .home5-feature-section .feature-wrapper .feature-content .single-feature .content h5',
            ]
        );

        $this->add_control(
            'matrik_hero_banner_five_style_featured_title_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home5-feature-section .feature-wrapper .feature-content .single-feature .content h5' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_hero_banner_five_style_featured_description',
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
                'name'     => 'matrik_hero_banner_five_style_featured_description_typ',
                'selector' => '{{WRAPPER}} .home5-feature-section .feature-wrapper .feature-content .single-feature .content p',
            ]
        );

        $this->add_control(
            'matrik_hero_banner_five_style_featured_description_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home5-feature-section .feature-wrapper .feature-content .single-feature .content p' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_hero_banner_five_style_featured_divider',
            [
                'label'     => esc_html__('Divider', 'matrik-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_control(
            'matrik_hero_banner_five_style_featured_divider_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home5-feature-section .feature-wrapper .feature-content .divider::before' => 'background: {{VALUE}};',
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
                // Get the height of the section between start and end triggers
                function initScrollAnimation() {
                    const scrollSecTitle = document.querySelector(".scroll-sec-vector");
                    const scrollSecTitleEnd = document.querySelector(".scroll-sec-vector-end");

                    // Check if both elements exist before proceeding
                    if (scrollSecTitle && scrollSecTitleEnd) {
                        const start = scrollSecTitle.getBoundingClientRect().top;
                        const end = scrollSecTitleEnd.getBoundingClientRect().top;
                        const distance = end - start;

                        const scScrollTl = gsap.timeline({
                            scrollTrigger: {
                                trigger: ".scroll-sec-vector",
                                start: "top 30%",
                                endTrigger: ".scroll-sec-vector-end",
                                end: "top -120%",
                                toggleActions: "restart pause reverse pause",
                                scrub: 1,
                            },
                        });

                        scScrollTl.to(".scroll-sec-vector", {
                            y: distance, // Use the calculated distance
                            duration: 10, // Duration can be kept for scrub speed
                        });
                    }
                }

                function handleResize() {
                    if (window.innerWidth >= 991) {
                        initScrollAnimation();
                    } else {
                        if (ScrollTrigger.getById("scScrollTl")) {
                            ScrollTrigger.getById("scScrollTl").kill();
                        }
                    }
                }
                handleResize();
                window.addEventLis;

                gsap.registerPlugin(ScrollTrigger);
                ScrollTrigger.matchMedia({
                    // Devices wider than 991px
                    "(min-width: 992px)": function() {
                        gsap.from(".feature-wrapper", {
                            scale: 0.85,
                            ease: "none",
                            scrollTrigger: {
                                trigger: ".home5-feature-section",
                                scrub: true,
                                start: "top 80%",
                                end: "top 20%",
                            },
                        });
                    },
                });
            </script>
        <?php endif; ?>

        <div class="home5-banner-section">
            <div class="container-fluid">
                <div class="banner-wrapper">
                    <?php if (!empty($settings['matrik_hero_banner_five_genaral_title'])) : ?>
                        <div class="title-area wow animate fadeInLeft" data-wow-delay="200ms" data-wow-duration="1500ms">
                            <h1><?php echo wp_kses($settings['matrik_hero_banner_five_genaral_title'], wp_kses_allowed_html('post'))  ?></h1>
                        </div>
                    <?php endif; ?>
                    <div class="banner-content wow animate fadeInRight" data-wow-delay="200ms" data-wow-duration="1500ms">
                        <?php if (!empty($settings['matrik_hero_banner_five_genaral_description'])) : ?>
                            <p><?php echo esc_html($settings['matrik_hero_banner_five_genaral_description']); ?></p>
                        <?php endif; ?>
                        <div class="btn-area">
                            <ul class="img-grp">
                                <?php foreach ($settings['matrik_hero_banner_five_genaral_expert_gallary'] as $image) : ?>
                                    <li><img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr__('expert-image', 'matrik-core'); ?>"></li>
                                <?php endforeach; ?>
                            </ul>
                            <?php if (!empty($settings['matrik_hero_banner_five_genaral_button'])) : ?>
                                <a href="<?php echo esc_url($settings['matrik_hero_banner_five_genaral_button_url']['url']); ?>"><?php echo esc_html($settings['matrik_hero_banner_five_genaral_button']); ?></a>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="home5-feature-section">
                <div class="feature-wrapper">
                    <?php if (!empty($settings['matrik_hero_banner_five_featured_section_featured_image']['url'])) : ?>
                        <div class="feature-img">
                            <img src="<?php echo esc_url($settings['matrik_hero_banner_five_featured_section_featured_image']['url']); ?>" alt="<?php echo esc_attr__('feature-image', 'matrik-core'); ?>">
                        </div>
                    <?php endif; ?>
                    <div class="feature-content">
                        <div class="container">
                            <div class="row gy-md-5 gy-4">
                                <?php
                                $classes = array('divider', 'd-flex justify-content-lg-center divider', 'd-flex justify-content-lg-end', 'd-flex justify-content-lg-end');
                                $class_count = count($classes);
                                $total_items = count($settings['matrik_hero_banner_five_featured_section_content_list']);

                                foreach ($settings['matrik_hero_banner_five_featured_section_content_list'] as $index => $data) :
                                    $class = $classes[$index % $class_count];
                                ?>
                                    <div class="col-lg-4 col-md-6 <?php echo esc_attr($class); ?>">
                                        <div class="single-feature">
                                            <div class="icon">
                                                <?php \Elementor\Icons_Manager::render_icon($data['matrik_hero_banner_five_featured_section_icon_image'], ['aria-hidden' => 'true']); ?>
                                            </div>
                                            <div class="content">
                                                <?php if (!empty($data['matrik_hero_banner_five_featured_section_content_title'])) : ?>
                                                    <h5><?php echo esc_html($data['matrik_hero_banner_five_featured_section_content_title']); ?></h5>
                                                <?php endif; ?>
                                                <?php if (!empty($data['matrik_hero_banner_five_featured_section_content_description'])) : ?>
                                                    <p><?php echo esc_html($data['matrik_hero_banner_five_featured_section_content_description']); ?></p>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="circular-text btn_wrapper">
                    <a href="#service-section" class="center-icon" id="scroll-btn">
                        <svg width="16" height="31" viewBox="0 0 16 31" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M2.66667 6C2.66667 8.94552 5.05448 11.3333 8 11.3333C10.9455 11.3333 13.3333 8.94552 13.3333 6C13.3333 3.05448 10.9455 0.666666 8 0.666667C5.05448 0.666667 2.66667 3.05448 2.66667 6ZM7.29289 30.7071C7.68342 31.0976 8.31658 31.0976 8.70711 30.7071L15.0711 24.3431C15.4616 23.9526 15.4616 23.3195 15.0711 22.9289C14.6805 22.5384 14.0474 22.5384 13.6569 22.9289L8 28.5858L2.34315 22.9289C1.95262 22.5384 1.31946 22.5384 0.928933 22.9289C0.538409 23.3195 0.538409 23.9526 0.928933 24.3431L7.29289 30.7071ZM7 6L7 30L9 30L9 6L7 6Z" />
                        </svg>
                    </a>
                    <?php if (!empty($settings['matrik_hero_banner_five_genaral_circular_text'])) : ?>
                        <div class="text">
                            <span>
                                <?php echo esc_html($settings['matrik_hero_banner_five_genaral_circular_text']); ?>
                            </span>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>

<?php

    }
}

Plugin::instance()->widgets_manager->register(new Matrik_Hero_Banner_Five_Widget());
