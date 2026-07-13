<?php

namespace Elementor;

if (!defined('ABSPATH')) exit;  // Exit if accessed directly

use Elementor\core\Schemes;
use Egns_Core\Egns_Helper;

class Matrik_Benefit_Widget extends Widget_Base
{

    public function get_name()
    {
        return 'matrik_benefit';
    }

    public function get_title()
    {
        return esc_html__('EG Benefit', 'matrik-core');
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
            'matrik_benefit_genaral',
            [
                'label' => esc_html__('General', 'matrik-core')
            ]
        );

        $this->add_control(
            'matrik_benefit_genaral_header_switcher',
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
            'matrik_benefit_genaral_header_area',
            [
                'label'     => esc_html__('Header Area', 'matrik-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_control(
            'matrik_benefit_genaral_subtitle',
            [
                'label'       => esc_html__('Header Subtitle', 'matrik-core'),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default'     => esc_html__('Benefits Our Product', 'matrik-core'),
                'placeholder' => esc_html__('write your subtitle here', 'matrik-core'),
                'label_block' => true,
                'condition' => [
                    'matrik_benefit_genaral_header_switcher' => ['yes'],
                ]
            ]
        );

        $this->add_control(
            'matrik_benefit_genaral_title',
            [
                'label'       => esc_html__('Header Title', 'matrik-core'),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default'     => esc_html__('Benefits Of Matrik Industry.', 'matrik-core'),
                'placeholder' => esc_html__('write your title here', 'matrik-core'),
                'label_block' => true,
                'condition' => [
                    'matrik_benefit_genaral_header_switcher' => ['yes'],
                ]
            ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'matrik_benefit_genaral_content_step_count',
            [
                'label'       => esc_html__('Step Count', 'matrik-core'),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default'     => esc_html__('01', 'matrik-core'),
                'placeholder' => esc_html__('write your text here', 'matrik-core'),
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'matrik_benefit_genaral_content_title',
            [
                'label'       => esc_html__('Content Title', 'matrik-core'),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default'     => esc_html__('Matrik quality', 'matrik-core'),
                'placeholder' => esc_html__('write your text here', 'matrik-core'),
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'matrik_benefit_genaral_content_description',
            [
                'label'       => esc_html__('Content Description', 'matrik-core'),
                'type'        => \Elementor\Controls_Manager::TEXTAREA,
                'default' => wp_kses('Sed nisl eros, condimentum nec risussit amet finibus cons sem fusce. Advantage of thes limited-time offers & start.', wp_kses_allowed_html('post')),
                'placeholder' => esc_html__('write your text here', 'matrik-core'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'matrik_benefit_genaral_content_list',
            [
                'label' => esc_html__('Content List', 'matrik-core'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'matrik_benefit_genaral_content_step_count' => wp_kses('01', wp_kses_allowed_html('post')),
                        'matrik_benefit_genaral_content_title' => wp_kses('Matrik quality', wp_kses_allowed_html('post')),


                    ],
                    [
                        'matrik_benefit_genaral_content_step_count' => wp_kses('02', wp_kses_allowed_html('post')),
                        'matrik_benefit_genaral_content_title' => wp_kses('Cost Reduction', wp_kses_allowed_html('post')),


                    ],
                    [
                        'matrik_benefit_genaral_content_step_count' => wp_kses('03', wp_kses_allowed_html('post')),
                        'matrik_benefit_genaral_content_title' => wp_kses('Improved Safety', wp_kses_allowed_html('post')),


                    ],
                    [
                        'matrik_benefit_genaral_content_step_count' => wp_kses('04', wp_kses_allowed_html('post')),
                        'matrik_benefit_genaral_content_title' => wp_kses('Supply Chain', wp_kses_allowed_html('post')),


                    ],
                    [
                        'matrik_benefit_genaral_content_step_count' => wp_kses('05', wp_kses_allowed_html('post')),
                        'matrik_benefit_genaral_content_title' => wp_kses('Market Reach', wp_kses_allowed_html('post')),


                    ],

                ],

                'title_field' => '{{{ matrik_benefit_genaral_content_step_count }}}',
            ]
        );

        $this->add_control(
            'matrik_service_genaral_banner_image',
            [
                'label' => esc_html__('Banner Image', 'matrik-core'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
                'media_types' => ['image'],
            ]
        );

        $this->add_control(
            'matrik_service_genaral_banner_bg_image',
            [
                'label' => esc_html__('Banner Background Image', 'matrik-core'),
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
            'matrik_benefit_style_genaral',
            [
                'label'     => esc_html__('Styles', 'matrik-core'),
                'tab'       => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'matrik_benefit_style_genaral_subtitle',
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
                'name'     => 'matrik_benefit_style_genaral_subtitle_typ',
                'selector' => '{{WRAPPER}} .section-title.two span',

            ]
        );

        $this->add_control(
            'matrik_benefit_style_genaral_subtitle_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .section-title.two span' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_benefit_style_genaral_subtitle_bg_color',
            [
                'label'     => esc_html__('Background Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .section-title.two span' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_benefit_style_genaral_title',
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
                'name'     => 'matrik_benefit_style_genaral_title_typ',
                'selector' => '{{WRAPPER}} .section-title h2',

            ]
        );

        $this->add_control(
            'matrik_benefit_style_genaral_title_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .section-title h2' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_benefit_style_genaral_content_number',
            [
                'label'     => esc_html__('Content Number', 'matrik-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'matrik-core'),
                'name'     => 'matrik_benefit_style_genaral_content_number_typ',
                'selector' => '{{WRAPPER}} .home2-benefit-section .benefit-list .single-benefit .number span',

            ]
        );

        $this->add_control(
            'matrik_benefit_style_genaral_content_number_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home2-benefit-section .benefit-list .single-benefit .number span' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_benefit_style_genaral_content_number_hover_color',
            [
                'label'     => esc_html__('Hover Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home2-benefit-section .benefit-list .single-benefit:hover .number span' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_benefit_style_genaral_content_number_border_color',
            [
                'label'     => esc_html__('Border Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home2-benefit-section .benefit-list .single-benefit .number' => 'border: 1px solid {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_benefit_style_genaral_content_number_hover_border_color',
            [
                'label'     => esc_html__('Hover Border Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home2-benefit-section .benefit-list .single-benefit:hover .number' => 'border-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_benefit_style_genaral_content_number__bg_color',
            [
                'label'     => esc_html__('Background Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home2-benefit-section .benefit-list .single-benefit .number' => 'box-shadow: inset 0 0 0 10em {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_benefit_style_genaral_content_number_hover_bg_color',
            [
                'label'     => esc_html__('Hover Background Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home2-benefit-section .benefit-list .single-benefit:hover .number' => 'box-shadow: inset 0 0 0 10em {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_benefit_style_genaral_content_title',
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
                'name'     => 'matrik_benefit_style_genaral_content_title_typ',
                'selector' => '{{WRAPPER}} .home2-benefit-section .benefit-list .single-benefit .content h4',

            ]
        );

        $this->add_control(
            'matrik_benefit_style_genaral_content_title_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home2-benefit-section .benefit-list .single-benefit .content h4' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_benefit_style_genaral_content_description',
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
                'name'     => 'matrik_benefit_style_genaral_content_description_typ',
                'selector' => '{{WRAPPER}} .home2-benefit-section .benefit-list .single-benefit .content p',

            ]
        );

        $this->add_control(
            'matrik_benefit_style_genaral_content_description_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home2-benefit-section .benefit-list .single-benefit .content p' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section();
    }
    protected function render()
    {

        $settings = $this->get_settings_for_display();

?>

        <div class="home2-benefit-section">
            <div class="container">
                <div class="row mb-80 wow animate fadeInDown" data-wow-delay="200ms" data-wow-duration="1500ms">
                    <div class="col-xl-5 col-lg-6">
                        <div class="section-title two">
                            <?php if (!empty($settings['matrik_benefit_genaral_subtitle'])) : ?>
                                <span><?php echo esc_html($settings['matrik_benefit_genaral_subtitle']); ?></span>
                            <?php endif; ?>
                            <?php if (!empty($settings['matrik_benefit_genaral_title'])) : ?>
                                <h2><?php echo esc_html($settings['matrik_benefit_genaral_title']); ?></h2>
                                <svg class="vector" width="254" height="57" viewBox="0 0 254 57" xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M0.634619 3.96702C0.416606 6.16537 2.02199 8.12423 4.22035 8.34224C6.4187 8.56025 8.37755 6.95487 8.59557 4.75651C8.81358 2.55816 7.2082 0.599304 5.00984 0.381291C2.81148 0.163279 0.852631 1.76866 0.634619 3.96702ZM251.63 56.2387C252.037 56.3185 252.431 56.0537 252.511 55.6472L253.811 49.0236C253.89 48.6171 253.626 48.2229 253.219 48.1432C252.813 48.0634 252.418 48.3282 252.339 48.7347L251.183 54.6224L245.295 53.4668C244.889 53.3871 244.495 53.6519 244.415 54.0584C244.335 54.4648 244.6 54.859 245.007 54.9388L251.63 56.2387ZM4.65432 5.11074C38.8809 3.31822 92.3013 3.7224 141.306 10.7568C165.809 14.2742 189.18 19.4454 208.487 26.8144C227.811 34.1905 242.962 43.7307 251.152 55.921L252.397 55.0845C243.95 42.512 228.452 32.8297 209.021 25.4131C189.572 17.9894 166.081 12.7978 141.519 9.27206C92.3932 2.22022 38.8713 1.81667 4.57587 3.61279L4.65432 5.11074Z" />
                                </svg>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                <div class="row align-items-center">
                    <div class="col-xl-7 col-lg-6">
                        <ul class="benefit-list">
                            <?php foreach ($settings['matrik_benefit_genaral_content_list'] as $data) : ?>
                                <li class="single-benefit wow animate fadeInDown" data-wow-delay="200ms" data-wow-duration="1500ms">
                                    <?php if (!empty($data['matrik_benefit_genaral_content_step_count'])) : ?>
                                        <div class="number">
                                            <span><?php echo esc_html($data['matrik_benefit_genaral_content_step_count']); ?></span>
                                        </div>
                                    <?php endif; ?>
                                    <div class="content">
                                        <?php if (!empty($data['matrik_benefit_genaral_content_title'])) : ?>
                                            <h4><?php echo esc_html($data['matrik_benefit_genaral_content_title']); ?></h4>
                                        <?php endif; ?>
                                        <?php if (!empty($data['matrik_benefit_genaral_content_description'])) : ?>
                                            <p><?php echo esc_html($data['matrik_benefit_genaral_content_description']); ?></p>
                                        <?php endif; ?>
                                    </div>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                    <div class="col-xl-5 col-lg-6 d-lg-block d-none wow animate fadeInRight" data-wow-delay="200ms" data-wow-duration="1500ms">
                        <div class="benefit-img-wrap magnetic-item">
                            <?php if (!empty($settings['matrik_service_genaral_banner_image']['url'])) : ?>
                                <div class="benefit-img">
                                    <img src="<?php echo esc_url($settings['matrik_service_genaral_banner_image']['url']); ?>" alt="<?php echo esc_attr__('banner-image', 'matrik-core'); ?>">
                                </div>
                            <?php endif; ?>
                            <?php if (!empty($settings['matrik_service_genaral_banner_bg_image']['url'])) : ?>
                                <img src="<?php echo esc_url($settings['matrik_service_genaral_banner_bg_image']['url']); ?>" alt="<?php echo esc_attr__('banner-background-image', 'matrik-core'); ?>" class="img-bg">
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>

<?php

    }
}

Plugin::instance()->widgets_manager->register(new Matrik_Benefit_Widget());
