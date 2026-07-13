<?php

namespace Elementor;

if (!defined('ABSPATH')) exit;  // Exit if accessed directly

use Elementor\core\Schemes;
use Egns_Core\Egns_Helper;

class Matrik_Why_Choose_Us_Widget extends Widget_Base
{

    public function get_name()
    {
        return 'matrik_why_choose_us';
    }

    public function get_title()
    {
        return esc_html__('EG Why Choose Us', 'matrik-core');
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
            'matrik_why_choose_us_genaral',
            [
                'label' => esc_html__('General', 'matrik-core')
            ]
        );

        $this->add_control(
            'matrik_why_choose_us_genaral_header_switcher',
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
            'matrik_why_choose_us_genaral_header_area',
            [
                'label'     => esc_html__('Header Area', 'matrik-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
                'condition' => [
                    'matrik_why_choose_us_genaral_header_switcher' => ['yes'],
                ]
            ]
        );

        $this->add_control(
            'matrik_why_choose_us_genaral_subtitle',
            [
                'label'       => esc_html__('Header Subtitle', 'matrik-core'),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default'     => esc_html__('Why Work With Us', 'matrik-core'),
                'placeholder' => esc_html__('write your subtitle here', 'matrik-core'),
                'label_block' => true,
                'condition' => [
                    'matrik_why_choose_us_genaral_header_switcher' => ['yes'],
                ]
            ]
        );

        $this->add_control(
            'matrik_why_choose_us_genaral_title',
            [
                'label'       => esc_html__('Header Title', 'matrik-core'),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default'     => esc_html__('Why We’re the Right Choice Industry', 'matrik-core'),
                'placeholder' => esc_html__('write your title here', 'matrik-core'),
                'label_block' => true,
                'condition' => [
                    'matrik_why_choose_us_genaral_header_switcher' => ['yes'],
                ]
            ]
        );

        $this->add_control(
            'matrik_why_choose_us_genaral_header_button',
            [
                'label'       => esc_html__('Button Text', 'matrik-core'),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default'     => esc_html__('Contact Now', 'matrik-core'),
                'placeholder' => esc_html__('write your button text here', 'matrik-core'),
                'label_block' => true,
                'condition' => [
                    'matrik_why_choose_us_genaral_header_switcher' => ['yes'],
                ]
            ]
        );

        $this->add_control(
            'matrik_why_choose_us_genaral_header_button_url',
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
                'condition' => [
                    'matrik_why_choose_us_genaral_header_switcher' => ['yes'],
                ]
            ]
        );

        //content area

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'matrik_why_choose_us_genaral_content_step_count',
            [
                'label'       => esc_html__('Step Count', 'matrik-core'),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default'     => esc_html__('01.', 'matrik-core'),
                'placeholder' => esc_html__('write your text here', 'matrik-core'),
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'matrik_why_choose_us_genaral_content_title',
            [
                'label'       => esc_html__('Content Title', 'matrik-core'),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default'     => esc_html__('Solutions Expert', 'matrik-core'),
                'placeholder' => esc_html__('write your text here', 'matrik-core'),
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'matrik_why_choose_us_genaral_content_image',
            [
                'label' => esc_html__('Content Image', 'matrik-core'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
                'media_types' => ['image'],
            ]
        );

        $repeater->add_control(
            'matrik_why_choose_us_genaral_content_description',
            [
                'label'       => esc_html__('Content Description', 'matrik-core'),
                'type'        => \Elementor\Controls_Manager::TEXTAREA,
                'default' => wp_kses('Spanish mackerel yellow weaver sigils. Sunporch flying fish yellowfin cutthroat trout grouper whitebait oneamt horsefish bullhead shark California smoothtongue, striped burrfish threadtail saber-toothed blenny Red Seden ut perspiciatis unde omnis iste natus ut perspic iatis unde omnis iste perspiciatis ut perspiciatis unde omnison iste natus we are work industry very fast and worked smoothly.', wp_kses_allowed_html('post')),
                'placeholder' => esc_html__('write your text here', 'matrik-core'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'matrik_why_choose_us_genaral_content_list',
            [
                'label' => esc_html__('Content List', 'matrik-core'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'matrik_why_choose_us_genaral_content_step_count' => wp_kses('01.', wp_kses_allowed_html('post')),
                        'matrik_why_choose_us_genaral_content_title' => wp_kses('Solutions Expert', wp_kses_allowed_html('post')),
                        'matrik_why_choose_us_genaral_content_description' => wp_kses('Spanish mackerel yellow weaver sigils. Sunporch flying fish yellowfin cutthroat trout grouper whitebait oneamt horsefish bullhead shark California smoothtongue, striped burrfish threadtail saber-toothed blenny Red Seden ut perspiciatis unde omnis iste natus ut perspic iatis unde omnis iste perspiciatis ut perspiciatis unde omnison iste natus we are work industry very fast and worked smoothly.', wp_kses_allowed_html('post')),

                    ],
                    [
                        'matrik_why_choose_us_genaral_content_step_count' => wp_kses('02.', wp_kses_allowed_html('post')),
                        'matrik_why_choose_us_genaral_content_title' => wp_kses('Trusted Partner', wp_kses_allowed_html('post')),
                        'matrik_why_choose_us_genaral_content_description' => wp_kses('A trusted partner is a reliable and dependable collaborator who consistently delivers quality, integrity, and support in a professional relationship. They prioritize transparency, effective communication, and shared goals, ensuring long-term success and mutual growth. Whether in business or personal relationships, a trusted partner fosters confidence, accountability, and a strong foundation for collaboration.', wp_kses_allowed_html('post')),

                    ],
                    [
                        'matrik_why_choose_us_genaral_content_step_count' => wp_kses('03.', wp_kses_allowed_html('post')),
                        'matrik_why_choose_us_genaral_content_title' => wp_kses('Driving Innovation', wp_kses_allowed_html('post')),
                        'matrik_why_choose_us_genaral_content_description' => wp_kses('Driving Innovation means continuously exploring new ideas, technologies, and strategies to improve products, services, and processes. It involves creativity, problem-solving, and adapting to changing market needs to stay ahead of the competition. By fostering a culture of innovation, businesses can enhance efficiency, meet customer demands, and drive long-term success.', wp_kses_allowed_html('post')),

                    ],
                    [
                        'matrik_why_choose_us_genaral_content_step_count' => wp_kses('04.', wp_kses_allowed_html('post')),
                        'matrik_why_choose_us_genaral_content_title' => wp_kses('Pushing The Boundaries of material science', wp_kses_allowed_html('post')),
                        'matrik_why_choose_us_genaral_content_description' => wp_kses('Exploring new materials and technologies to improve strength, durability, and sustainability. It involves innovative research, advanced manufacturing techniques, and the development of smarter, more efficient materials for various industries. This progress drives breakthroughs in aerospace, healthcare, construction, and more, shaping the future with stronger, lighter, and more eco-friendly solutions.', wp_kses_allowed_html('post')),

                    ],
                    [
                        'matrik_why_choose_us_genaral_content_step_count' => wp_kses('05.', wp_kses_allowed_html('post')),
                        'matrik_why_choose_us_genaral_content_title' => wp_kses('Aerospace quality as standard', wp_kses_allowed_html('post')),
                        'matrik_why_choose_us_genaral_content_description' => wp_kses('Aerospace quality as standard means that products or services meet the high safety, precision, and reliability standards required in the aerospace industry. These standards ensure exceptional performance and compliance with strict regulations, guaranteeing top-notch quality, durability, and safety for critical applications in aviation and aerospace systems.', wp_kses_allowed_html('post')),

                    ],

                ],

                'title_field' => '{{{ matrik_why_choose_us_genaral_content_step_count }}}',
            ]
        );

        $this->end_controls_section();

        //style start

        $this->start_controls_section(
            'matrik_why_choose_us_style_genaral',
            [
                'label'     => esc_html__('Styles', 'matrik-core'),
                'tab'       => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'matrik_why_choose_us_style_genaral_subtitle',
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
                'name'     => 'matrik_why_choose_us_style_genaral_subtitle_typ',
                'selector' => '{{WRAPPER}} .section-title.two span',

            ]
        );

        $this->add_control(
            'matrik_why_choose_us_style_genaral_subtitle_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .section-title.two span' => 'color: {{VALUE}};',
                ],
            ]
        );


        $this->add_control(
            'matrik_why_choose_us_style_genaral_subtitle_bg_color',
            [
                'label'     => esc_html__('Background Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .section-title.two span' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_why_choose_us_style_genaral_title',
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
                'name'     => 'matrik_why_choose_us_style_genaral_title_typ',
                'selector' => '{{WRAPPER}} .section-title h2',

            ]
        );

        $this->add_control(
            'matrik_why_choose_us_style_genaral_title_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .section-title h2' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_why_choose_us_style_genaral_button',
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
                'name'     => 'matrik_why_choose_us_style_genaral_button_typ',
                'selector' => '{{WRAPPER}} .primary-btn2',

            ]
        );

        $this->add_control(
            'matrik_why_choose_us_style_genaral_button_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .primary-btn2' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_why_choose_us_style_genaral_button_hover_color',
            [
                'label'     => esc_html__('Hover Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home2-why-choose-us-section .contact-btn:hover .primary-btn2' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_why_choose_us_style_genaral_button_icon_color',
            [
                'label'     => esc_html__('Icon Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .primary-btn2 svg' => 'fill: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_why_choose_us_style_genaral_button_hover_icon_color',
            [
                'label'     => esc_html__('Hover Icon Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home2-why-choose-us-section .contact-btn:hover .primary-btn2 .arrow' => 'fill: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_why_choose_us_style_genaral_button_border_color',
            [
                'label'     => esc_html__('Border Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home2-why-choose-us-section .contact-btn' => 'border: 1px solid {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_why_choose_us_style_genaral_button_hover_border_color',
            [
                'label'     => esc_html__('Hover Border Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home2-why-choose-us-section .contact-btn:hover' => 'border-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_why_choose_us_style_genaral_button_hover_background_color',
            [
                'label'     => esc_html__('Hover Background Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home2-why-choose-us-section .contact-btn:hover' => 'box-shadow: inset 0 0 0 10em {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_why_choose_us_style_genaral_border',
            [
                'label'     => esc_html__('Border', 'matrik-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_control(
            'matrik_why_choose_us_style_genaral_border_first_child_color',
            [
                'label'     => esc_html__('First Child Border Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home2-why-choose-us-section .faq-content .accordion .accordion-item:first-child .accordion-header .accordion-button' => 'border-top: 1px solid {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_why_choose_us_style_genaral_border_color',
            [
                'label'     => esc_html__('Border Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home2-why-choose-us-section .faq-content .accordion .accordion-item .accordion-header .accordion-button' => 'border-bottom: 1px solid {{VALUE}};',
                ],
            ]
        );


        $this->add_control(
            'matrik_why_choose_us_style_genaral_step_number_and_title',
            [
                'label'     => esc_html__('Step Number & Title', 'matrik-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'matrik-core'),
                'name'     => 'matrik_why_choose_us_style_genaral_step_number_and_title_typ',
                'selector' => '{{WRAPPER}} .home2-why-choose-us-section .faq-content .accordion .accordion-item .accordion-header .accordion-button',

            ]
        );

        $this->add_control(
            'matrik_why_choose_us_style_genaral_step_number_and_title_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home2-why-choose-us-section .faq-content .accordion .accordion-item .accordion-header .accordion-button' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_why_choose_us_style_genaral_description',
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
                'name'     => 'matrik_why_choose_us_style_genaral_description_typ',
                'selector' => '{{WRAPPER}} .home2-why-choose-us-section .faq-content .accordion .accordion-item .accordion-body',

            ]
        );

        $this->add_control(
            'matrik_why_choose_us_style_genaral_description_color',
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

        <div class="home2-why-choose-us-section">
            <div class="container">
                <?php if ($settings['matrik_why_choose_us_genaral_header_switcher'] == 'yes') : ?>
                    <div class="row g-4 align-items-center justify-content-between mb-60">
                        <div class="col-xl-6 col-lg-8 wow animate fadeInLeft" data-wow-delay="200ms" data-wow-duration="1500ms">
                            <div class="section-title two">
                                <?php if (!empty($settings['matrik_why_choose_us_genaral_subtitle'])) : ?>
                                    <span><?php echo esc_html($settings['matrik_why_choose_us_genaral_subtitle']); ?></span>
                                <?php endif; ?>
                                <?php if (!empty($settings['matrik_why_choose_us_genaral_title'])) : ?>
                                    <h2><?php echo esc_html($settings['matrik_why_choose_us_genaral_title']); ?></h2>
                                <?php endif; ?>
                            </div>
                        </div>
                        <?php if (!empty($settings['matrik_why_choose_us_genaral_header_button'])) : ?>
                            <div class="col-lg-3 d-flex justify-content-lg-end btn_wrapper">
                                <a href="<?php echo esc_url($settings['matrik_why_choose_us_genaral_header_button_url']['url']); ?>" class="contact-btn">
                                    <div class="primary-btn2 two">
                                        <span><?php echo esc_html($settings['matrik_why_choose_us_genaral_header_button']); ?></span>
                                        <svg class="arrow" width="23" height="23" viewBox="0 0 23 23" xmlns="http://www.w3.org/2000/svg">
                                            <g>
                                                <path d="M0.113861 0H22.9999V4.28425L4.32671 22.9997L0 18.7154L12.7524 6.08815L0.113861 6.20089V0Z" />
                                                <path d="M23 22.9996V8.56848L16.8516 14.6566V22.9996H23Z" />
                                            </g>
                                        </svg>
                                    </div>
                                </a>
                            </div>
                        <?php endif; ?>
                    </div>
                <?php endif; ?>
                <div class="row justify-content-xl-end">
                    <div class="col-xl-11">
                        <div class="faq-content">
                            <div class="accordion" id="accordionTravel">
                                <?php foreach ($settings['matrik_why_choose_us_genaral_content_list'] as $index => $data) :
                                    // Generate unique IDs per item
                                    $heading_id = 'travelheading_' . $index;
                                    $collapse_id = 'travelcollapse_' . $index;
                                    $is_first = ($index === 0);
                                ?>
                                    <div class="accordion-item wow animate fadeInDown" data-wow-delay="200ms" data-wow-duration="1500ms">
                                        <h2 class="accordion-header" id="<?php echo esc_attr($heading_id); ?>">
                                            <button class="accordion-button <?php echo $is_first ? '' : 'collapsed'; ?>"
                                                type="button"
                                                data-bs-toggle="collapse"
                                                data-bs-target="#<?php echo esc_attr($collapse_id); ?>"
                                                aria-expanded="<?php echo $is_first ? 'true' : 'false'; ?>"
                                                aria-controls="<?php echo esc_attr($collapse_id); ?>">

                                                <?php if (!empty($data['matrik_why_choose_us_genaral_content_step_count'])) : ?>
                                                    <span><?php echo esc_html($data['matrik_why_choose_us_genaral_content_step_count']); ?></span>
                                                <?php endif; ?>

                                                <?php if (!empty($data['matrik_why_choose_us_genaral_content_title'])) : ?>
                                                    <?php echo esc_html($data['matrik_why_choose_us_genaral_content_title']); ?>
                                                <?php endif; ?>
                                            </button>
                                        </h2>
                                        <div id="<?php echo esc_attr($collapse_id); ?>"
                                            class="accordion-collapse collapse <?php echo $is_first ? 'show' : ''; ?>"
                                            aria-labelledby="<?php echo esc_attr($heading_id); ?>"
                                            data-bs-parent="#accordionTravel">

                                            <div class="accordion-body">
                                                <?php if (!empty($data['matrik_why_choose_us_genaral_content_image']['url'])) : ?>
                                                    <img src="<?php echo esc_url($data['matrik_why_choose_us_genaral_content_image']['url']); ?>" alt="<?php echo esc_attr__('why-choose-image', 'matrik-core'); ?>">
                                                <?php endif; ?>

                                                <?php if (!empty($data['matrik_why_choose_us_genaral_content_description'])) : ?>
                                                    <?php echo esc_html($data['matrik_why_choose_us_genaral_content_description']); ?>
                                                <?php endif; ?>
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

<?php

    }
}

Plugin::instance()->widgets_manager->register(new Matrik_Why_Choose_Us_Widget());
