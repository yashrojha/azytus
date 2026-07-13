<?php

namespace Elementor;

if (!defined('ABSPATH')) exit;  // Exit if accessed directly

use Elementor\core\Schemes;
use Egns_Core\Egns_Helper;

class Matrik_Client_Widget extends Widget_Base
{

    public function get_name()
    {
        return 'matrik_client';
    }

    public function get_title()
    {
        return esc_html__('EG Client', 'matrik-core');
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
            'matrik_client_genaral',
            [
                'label' => esc_html__('General', 'matrik-core')
            ]
        );

        $this->add_control(
            'matrik_client_genaral_header_title',
            [
                'label'       => esc_html__('Header Title', 'matrik-core'),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default' => wp_kses('Our Global Client', wp_kses_allowed_html('post')),
                'placeholder' => esc_html__('write your title here', 'matrik-core'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'matrik_client_genaral_banner_image',
            [
                'label' => esc_html__('Banner Image', 'matrik-core'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'matrik_client_genaral_partner_logo',
            [
                'label' => esc_html__('Partner Logo', 'matrik-core'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $repeater->add_control(
            'matrik_client_genaral_content_title',
            [
                'label'       => esc_html__('Content Title', 'matrik-core'),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default'     => esc_html__('www.qzency.com', 'matrik-core'),
                'placeholder' => esc_html__('write your text here', 'matrik-core'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'matrik_client_genaral_content_list',
            [
                'label' => esc_html__('Content List', 'matrik-core'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'matrik_client_genaral_content_title' => wp_kses('Industry Concept & Planning', wp_kses_allowed_html('post')),
                    ],
                    [
                        'matrik_client_genaral_content_title' => wp_kses('Material Sourcing Production', wp_kses_allowed_html('post')),
                    ],
                    [
                        'matrik_client_genaral_content_title' => wp_kses('Manufacturing & Assembly', wp_kses_allowed_html('post')),
                    ],

                ],
                'title_field' => '{{{ matrik_client_genaral_content_title }}}',
            ]
        );

        $this->end_controls_section();

        //style start

        $this->start_controls_section(
            'matrik_client_style_genaral',
            [
                'label'     => esc_html__('Styles', 'matrik-core'),
                'tab'       => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'matrik_client_style_genaral_card',
            [
                'label'     => esc_html__('Card', 'matrik-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_control(
            'matrik_client_style_genaral_card_bg_color',
            [
                'label'     => esc_html__('Background Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .our-client-page .client-card' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_client_style_genaral_title',
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
                'name'     => 'matrik_client_style_genaral_title_typ',
                'selector' => '{{WRAPPER}} .section-title.two h2',

            ]
        );

        $this->add_control(
            'matrik_client_style_genaral_title_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .section-title.two h2' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_client_style_genaral_content_title',
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
                'name'     => 'matrik_client_style_genaral_content_title_typ',
                'selector' => '{{WRAPPER}} .our-client-page .client-card span',

            ]
        );

        $this->add_control(
            'matrik_client_style_genaral_content_title_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .our-client-page .client-card span' => 'color: {{VALUE}};',
                ],
            ]
        );


        $this->add_control(
            'matrik_client_style_genaral_content_arrow_icon',
            [
                'label'     => esc_html__('Arrow Icon', 'matrik-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_control(
            'matrik_client_style_genaral_content_arrow_icon_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .our-client-page .client-card svg' => 'fill: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_client_style_genaral_content_arrow_icon_hover_color',
            [
                'label'     => esc_html__('Hover Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .our-client-page .client-card:hover svg' => 'fill: {{VALUE}};',
                ],
            ]
        );


        $this->end_controls_section();
    }
    protected function render()
    {

        $settings = $this->get_settings_for_display();

?>

        <div class="our-client-page" id="scroll-section">
            <div class="container-fluid">
                <?php if (!empty($settings['matrik_client_genaral_header_title'])) : ?>
                    <div class="section-title two text-center mb-80">
                        <h2><?php echo esc_html($settings['matrik_client_genaral_header_title']); ?></h2>
                    </div>
                <?php endif; ?>
                <div class="row g-xl-4 g-lg-3 g-4">
                    <div class="col-lg-4 d-lg-block d-none wow animate fadeInLeft" data-wow-delay="200ms" data-wow-duration="1500ms">
                        <div class="our-client-img-area">
                            <?php if (!empty($settings['matrik_client_genaral_banner_image']['url'])) : ?>
                                <img src="<?php echo esc_url($settings['matrik_client_genaral_banner_image']['url']); ?>" alt="<?php echo esc_attr__('banner-image', 'matrik-core'); ?>">
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="col-lg-8">
                        <div class="row g-xl-4 g-lg-3 g-4 gy-md-5">
                            <?php foreach ($settings['matrik_client_genaral_content_list'] as $client_data) : ?>
                                <div class="col-md-4 col-sm-6 wow animate fadeInDown" data-wow-delay="200ms" data-wow-duration="1500ms">
                                    <div class="client-card magnetic-item">
                                        <?php if (!empty($client_data['matrik_client_genaral_partner_logo']['url'])) : ?>
                                            <img src="<?php echo esc_url($client_data['matrik_client_genaral_partner_logo']['url']); ?>" alt="<?php echo esc_attr__('partner-logo', 'matrik-core'); ?>">
                                        <?php endif; ?>
                                        <?php if (!empty($client_data['matrik_client_genaral_content_title'])) : ?>
                                            <span><?php echo esc_html($client_data['matrik_client_genaral_content_title']); ?></span>
                                        <?php endif; ?>
                                        <svg width="35" height="35" viewBox="0 0 35 35" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M0.173267 0H34.9999V6.51953L6.58414 34.9996L0 28.4801L19.4059 9.2646L0.173267 9.43616V0Z" />
                                            <path d="M34.999 34.9996V13.0391L25.6426 22.3037V34.9996H34.999Z" />
                                        </svg>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>

<?php

    }
}

Plugin::instance()->widgets_manager->register(new Matrik_Client_Widget());
