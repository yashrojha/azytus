<?php

namespace Elementor;

if (!defined('ABSPATH')) exit;  // Exit if accessed directly

use Elementor\core\Schemes;
use Egns_Core\Egns_Helper;

class Matrik_Process_Inner_Widget extends Widget_Base
{

    public function get_name()
    {
        return 'matrik_process_inner';
    }

    public function get_title()
    {
        return esc_html__('EG Process Inner', 'matrik-core');
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
            'matrik_process_inner_genaral',
            [
                'label' => esc_html__('General', 'matrik-core')
            ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'matrik_process_inner_genaral_banner_image',
            [
                'label' => esc_html__('Banner Image', 'matrik-core'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],

            ]
        );

        $repeater->add_control(
            'matrik_process_inner_genaral_icon_image',
            [
                'label' => esc_html__('Icon', 'matrik-core'),
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
            'matrik_process_inner_genaral_step_count',
            [
                'label'       => esc_html__('Step Count', 'matrik-core'),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default'     => esc_html__('Step 01', 'matrik-core'),
                'placeholder' => esc_html__('write your text here', 'matrik-core'),
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'matrik_process_inner_genaral_title',
            [
                'label'       => esc_html__('Title', 'matrik-core'),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default' => wp_kses('Industry Concept & Planning', wp_kses_allowed_html('post')),
                'placeholder' => esc_html__('write your text here', 'matrik-core'),
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'matrik_process_inner_genaral_description',
            [
                'label'       => esc_html__('Description', 'matrik-core'),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default'     => esc_html__('Conduct a thoroug need effortless assessment the understand your current marketing. Discover thousand of easy to customize themes, templates & CMS products.', 'matrik-core'),
                'placeholder' => esc_html__('write your text here', 'matrik-core'),
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'matrik_process_inner_genaral_vector_image',
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
            'matrik_process_inner_genaral_content_list',
            [
                'label' => esc_html__('Content List', 'matrik-core'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'matrik_process_inner_genaral_title' => wp_kses('Industry Concept & Planning', wp_kses_allowed_html('post')),
                        'matrik_process_inner_genaral_step_count' => esc_html('STEP : 01'),
                    ],
                    [
                        'matrik_process_inner_genaral_title' => wp_kses('Material Sourcing Production', wp_kses_allowed_html('post')),
                        'matrik_process_inner_genaral_step_count' => esc_html('STEP : 02'),
                    ],
                    [
                        'matrik_process_inner_genaral_title' => wp_kses('Manufacturing & Assembly', wp_kses_allowed_html('post')),
                        'matrik_process_inner_genaral_step_count' => esc_html('STEP : 03'),
                    ],

                ],
                'title_field' => '{{{ matrik_process_inner_genaral_title }}}',
            ]
        );


        $this->end_controls_section();

        //style start

        $this->start_controls_section(
            'matrik_process_inner_style_general',
            [
                'label'     => esc_html__('Styles', 'matrik-core'),
                'tab'       => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'matrik_process_inner_style_general_process_card',
            [
                'label'     => esc_html__('Process Card', 'matrik-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_control(
            'matrik_process_inner_style_general_process_card_bg_color',
            [
                'label'     => esc_html__('Background_Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .our-process-page .process-wrapper .single-process .process-content' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_process_inner_style_general_step_number',
            [
                'label'     => esc_html__('Step Number', 'matrik-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'matrik-core'),
                'name'     => 'matrik_process_inner_style_general_step_number_typ',
                'selector' => '{{WRAPPER}} .our-process-page .process-wrapper .single-process .process-content span',

            ]
        );

        $this->add_control(
            'matrik_process_inner_style_general_step_number_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .our-process-page .process-wrapper .single-process .process-content span' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_process_inner_style_general_icon',
            [
                'label'     => esc_html__('Icon Image', 'matrik-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_control(
            'matrik_process_inner_style_general_icon_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .our-process-page .process-wrapper .single-process .process-content .icon svg' => 'fill: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_process_inner_style_general_process_title',
            [
                'label'     => esc_html__('Process Title', 'matrik-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'matrik-core'),
                'name'     => 'matrik_process_inner_style_general_process_title_typ',
                'selector' => '{{WRAPPER}} .our-process-page .process-wrapper .single-process .process-content h2',

            ]
        );

        $this->add_control(
            'matrik_process_inner_style_general_process_title_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .our-process-page .process-wrapper .single-process .process-content h2' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_process_inner_style_general_process_description',
            [
                'label'     => esc_html__('Process Description', 'matrik-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'matrik-core'),
                'name'     => 'matrik_process_inner_style_general_process_description_typ',
                'selector' => '{{WRAPPER}} .our-process-page .process-wrapper .single-process .process-content p',

            ]
        );

        $this->add_control(
            'matrik_process_inner_style_general_process_description_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .our-process-page .process-wrapper .single-process .process-content p' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section();
    }
    protected function render()
    {

        $settings = $this->get_settings_for_display();

?>

        <div class="our-process-page">
            <div class="container">
                <div class="process-wrapper">
                    <?php foreach ($settings['matrik_process_inner_genaral_content_list'] as $index => $data) : ?>
                        <div class="single-process<?php echo ($index === array_key_last($settings['matrik_process_inner_genaral_content_list'])) ? '' : ' mb-40'; ?>">
                            <div class="row g-0">
                                <?php if (!empty($data['matrik_process_inner_genaral_banner_image']['url'])) : ?>
                                    <div class="col-lg-6">
                                        <div class="process-img">
                                            <img src="<?php echo esc_url($data['matrik_process_inner_genaral_banner_image']['url']); ?>" alt="<?php echo esc_attr__('banner-image', 'matrik-core'); ?>">
                                        </div>
                                    </div>
                                <?php endif; ?>
                                <div class="col-lg-6">
                                    <div class="process-content">
                                        <?php if (!empty($data['matrik_process_inner_genaral_icon_image'])) : ?>
                                            <div class="icon">
                                                <?php \Elementor\Icons_Manager::render_icon($data['matrik_process_inner_genaral_icon_image'], ['aria-hidden' => 'true']); ?>
                                            </div>
                                        <?php endif; ?>
                                        <?php if (!empty($data['matrik_process_inner_genaral_step_count'])) : ?>
                                            <span><?php echo esc_html($data['matrik_process_inner_genaral_step_count']); ?></span>
                                        <?php endif; ?>
                                        <svg class="arrow" width="8" height="204" viewBox="0 0 8 204" xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M1.33333 3C1.33333 4.47276 2.52724 5.66667 4 5.66667C5.47276 5.66667 6.66667 4.47276 6.66667 3C6.66667 1.52724 5.47276 0.333333 4 0.333333C2.52724 0.333333 1.33333 1.52724 1.33333 3ZM3.64645 203.354C3.84171 203.549 4.15829 203.549 4.35355 203.354L7.53553 200.172C7.7308 199.976 7.7308 199.66 7.53553 199.464C7.34027 199.269 7.02369 199.269 6.82843 199.464L4 202.293L1.17157 199.464C0.976311 199.269 0.659728 199.269 0.464466 199.464C0.269204 199.66 0.269204 199.976 0.464466 200.172L3.64645 203.354ZM3.5 3V203H4.5V3H3.5Z" />
                                        </svg>
                                        <?php if (!empty($data['matrik_process_inner_genaral_title'])) : ?>
                                            <h2><?php echo esc_html($data['matrik_process_inner_genaral_title']); ?></h2>
                                        <?php endif; ?>
                                        <?php if (!empty($data['matrik_process_inner_genaral_description'])) : ?>
                                            <p><?php echo esc_html($data['matrik_process_inner_genaral_description']); ?></p>
                                        <?php endif; ?>
                                        <?php if (!empty($data['matrik_process_inner_genaral_vector_image']['url'])) : ?>
                                            <img src="<?php echo esc_url($data['matrik_process_inner_genaral_vector_image']['url']); ?>" alt="<?php echo esc_attr__('vector-image', 'matrik-core'); ?>" class="vector">
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>

<?php

    }
}

Plugin::instance()->widgets_manager->register(new Matrik_Process_Inner_Widget());
