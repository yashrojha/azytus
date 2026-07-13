<?php

namespace Elementor;

if (!defined('ABSPATH')) exit;  // Exit if accessed directly

use Elementor\core\Schemes;
use Egns_Core\Egns_Helper;

class Matrik_Certification_Widget extends Widget_Base
{

    public function get_name()
    {
        return 'matrik_certification';
    }

    public function get_title()
    {
        return esc_html__('EG Certification', 'matrik-core');
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
            'matrik_certification_genaral',
            [
                'label' => esc_html__('General', 'matrik-core')
            ]
        );

        $this->add_control(
            'matrik_certification_genaral_title',
            [
                'label'       => esc_html__('Header Title', 'matrik-core'),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default'     => esc_html__('Certification Memberships', 'matrik-core'),
                'placeholder' => esc_html__('write your title here', 'matrik-core'),
                'label_block' => true,
            ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'matrik_certification_genaral_logo_image',
            [
                'label' => esc_html__('Logo Image', 'matrik-core'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $repeater->add_control(
            'matrik_certification_genaral_tag_text',
            [
                'label' => esc_html__('Tag Text', 'matrik-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Industry', 'matrik-core'),
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'matrik_certification_genaral_content_title',
            [
                'label' => esc_html__('Content Title', 'matrik-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('ISO 9001:2000, SGS', 'matrik-core'),
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'matrik_certification_genaral_content_vector_image',
            [
                'label' => esc_html__('Vector Image (SVG)', 'matrik-core'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
                'media_types' => ['image', 'svg'],
            ]
        );

        $this->add_control(
            'matrik_certification_genaral_content_list',
            [
                'label' => esc_html__('Content List', 'matrik-core'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'matrik_certification_genaral_content_title' => esc_html__('ISO 9001:2000, SGS', 'matrik-core'),
                    ],
                    [
                        'matrik_certification_genaral_content_title' => esc_html__('Quality Management, GLC', 'matrik-core'),
                    ],
                    [
                        'matrik_certification_genaral_content_title' => esc_html__('ISO 8700, ISO', 'matrik-core'),
                    ],
                    [
                        'matrik_certification_genaral_content_title' => esc_html__('B Corporation', 'matrik-core'),
                    ],

                ],
                'title_field' => '{{{ matrik_certification_genaral_content_title  }}}',
            ]
        );


        $this->end_controls_section();

        //style start

        $this->start_controls_section(
            'matrik_certification_style_genaral',
            [
                'label'     => esc_html__('Styles', 'matrik-core'),
                'tab'       => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'matrik_certification_style_genaral_card',
            [
                'label'     => esc_html__('Card', 'matrik-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_control(
            'matrik_certification_style_genaral_card_bg_color',
            [
                'label'     => esc_html__('Background Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home2-certification-section .certificate-card' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_certification_style_genaral_title',
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
                'name'     => 'matrik_certification_style_genaral_title_typ',
                'selector' => '{{WRAPPER}} .section-title h2',

            ]
        );

        $this->add_control(
            'matrik_certification_style_genaral_title_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .section-title h2' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_certification_style_genaral_tag',
            [
                'label'     => esc_html__('Tag', 'matrik-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'matrik-core'),
                'name'     => 'matrik_certification_style_genaral_tag_typ',
                'selector' => '{{WRAPPER}} .home2-certification-section .certificate-card .tag',

            ]
        );

        $this->add_control(
            'matrik_certification_style_genaral_tag_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home2-certification-section .certificate-card .tag' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_certification_style_genaral_content_title',
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
                'name'     => 'matrik_certification_style_genaral_content_title_typ',
                'selector' => '{{WRAPPER}} .home2-certification-section .certificate-card h6',

            ]
        );

        $this->add_control(
            'matrik_certification_style_genaral_content_title_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home2-certification-section .certificate-card h6' => 'color: {{VALUE}};',
                ],
            ]
        );


        $this->end_controls_section();
    }
    protected function render()
    {

        $settings = $this->get_settings_for_display();

?>

        <div class="home2-certification-section">
            <div class="container">
                <?php if (!empty($settings['matrik_certification_genaral_title'])) : ?>
                    <div class="section-title two text-center mb-60 wow animate fadeInDown" data-wow-delay="200ms" data-wow-duration="1500ms">
                        <h2><?php echo esc_html($settings['matrik_certification_genaral_title']); ?></h2>
                    </div>
                <?php endif; ?>
                <div class="row g-4">
                    <?php foreach ($settings['matrik_certification_genaral_content_list'] as $data) : ?>
                        <div class="col-lg-3 col-sm-6 wow animate fadeInDown" data-wow-delay="200ms" data-wow-duration="1500ms">
                            <div class="certificate-card">
                                <?php if (!empty($data['matrik_certification_genaral_logo_image']['url'])) : ?>
                                    <div class="certificate-logo">
                                        <img src="<?php echo esc_url($data['matrik_certification_genaral_logo_image']['url']); ?>" alt="<?php echo esc_attr__('logo-image', 'matrik-core'); ?>">
                                    </div>
                                <?php endif; ?>
                                <?php if (!empty($data['matrik_certification_genaral_content_title'])) : ?>
                                    <h6><?php echo esc_html($data['matrik_certification_genaral_content_title']); ?></h6>
                                <?php endif; ?>
                                <?php if (!empty($data['matrik_certification_genaral_tag_text'])) : ?>
                                    <span class="tag"><?php echo esc_html($data['matrik_certification_genaral_tag_text']); ?></span>
                                <?php endif; ?>

                                <?php
                                $svg_url = $data['matrik_certification_genaral_content_vector_image']['url'];

                                if (pathinfo($svg_url, PATHINFO_EXTENSION) === 'svg') {
                                    $svg_path = str_replace(home_url('/'), ABSPATH, $svg_url);

                                    if (file_exists($svg_path)) {
                                        $svg_content = file_get_contents($svg_path);

                                        // Add class="vector" to the <svg> tag if it doesn't already exist
                                        $svg_content = preg_replace('/<svg([^>]+)?/', '<svg$1 class="vector"', $svg_content, 1);

                                        // Escape with wp_kses and a safe whitelist
                                        $allowed_svg_tags = [
                                            'svg' => [
                                                'xmlns' => true,
                                                'width' => true,
                                                'height' => true,
                                                'viewBox' => true,
                                                'fill' => true,
                                                'stroke' => true,
                                                'class' => true,
                                                'aria-hidden' => true,
                                                'role' => true,
                                                'focusable' => true,
                                            ],
                                            'g' => ['fill' => true],
                                            'path' => [
                                                'd' => true,
                                                'fill' => true,
                                                'stroke' => true,
                                                'stroke-width' => true,
                                            ],
                                            'title' => [],
                                            'desc' => [],
                                            'use' => [
                                                'xlink:href' => true,
                                            ],
                                        ];

                                        echo wp_kses($svg_content, $allowed_svg_tags);
                                    }
                                } else {
                                ?>
                                    <img src="<?php echo esc_url($svg_url); ?>" alt="<?php echo esc_attr__('icon-image', 'matrik-core'); ?>" class="vector" />
                                <?php
                                }
                                ?>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>

<?php

    }
}

Plugin::instance()->widgets_manager->register(new Matrik_Certification_Widget());
