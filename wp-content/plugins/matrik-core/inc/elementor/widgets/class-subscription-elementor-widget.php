<?php

namespace Elementor;

if (!defined('ABSPATH')) exit;  // Exit if accessed directly

use Elementor\core\Schemes;
use Egns_Core\Egns_Helper;

class Matrik_Subscription_Widget extends Widget_Base
{

    public function get_name()
    {
        return 'matrik_subscription';
    }

    public function get_title()
    {
        return esc_html__('EG Subscription', 'matrik-core');
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
            'matrik_subscription_genaral',
            [
                'label' => esc_html__('General', 'matrik-core')
            ]
        );

        $this->add_control(
            'matrik_subscription_genaral_title',
            [
                'label'       => esc_html__('Title', 'matrik-core'),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default'     => esc_html__('Don’t Missed Subscribe Connected Our Engineering Firm.', 'matrik-core'),
                'placeholder' => esc_html__('write your title here', 'matrik-core'),
                'label_block' => true,

            ]
        );

        $this->add_control(
            'matrik_subscription_banner_image',
            [
                'label' => esc_html__('Banner Image', 'matrik-core'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $this->add_control(
            'matrik_subscription_genaral_shortcode',
            [
                'label'       => esc_html__('Shortcode', 'matrik-core'),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'placeholder' => esc_html__('Put your shortcode here', 'matrik-core'),
                'label_block' => true,

            ]
        );

        $this->add_control(
            'matrik_subscription_banner_vector_image',
            [
                'label' => esc_html__('Vector Image', 'matrik-core'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $this->end_controls_section();


        //style start

        $this->start_controls_section(
            'matrik_subscription_one_section_genaral',
            [
                'label'     => esc_html__('Styles', 'matrik-core'),
                'tab'       => Controls_Manager::TAB_STYLE,
            ]
        );


        $this->add_control(
            'matrik_subscription_one_section_genaral_global_sec',
            [
                'label'     => esc_html__('Global Section', 'matrik-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_control(
            'matrik_subscription_one_section_genaral_global_sec_color',
            [
                'label'     => esc_html__('Section Background Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home6-subscribe-section .subscribe-wrapper' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_subscription_one_section_genaral_title',
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
                'name'     => 'matrik_subscription_one_section_genaral_title_typ',
                'selector' => '{{WRAPPER}}.home6-subscribe-section .subscribe-wrapper .subscribe-content h4',

            ]
        );

        $this->add_control(
            'matrik_subscription_one_section_genaral_title_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home6-subscribe-section .subscribe-wrapper .subscribe-content h4' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_subscription_one_section_genaral_form_input',
            [
                'label'     => esc_html__('Form Input', 'matrik-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'matrik-core'),
                'name'     => 'matrik_subscription_one_section_genaral_form_input_typ',
                'selector' => '{{WRAPPER}}.home6-subscribe-section .subscribe-wrapper .subscribe-content h4',

            ]
        );

        $this->add_control(
            'matrik_subscription_one_section_genaral_form_input_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home6-subscribe-section .subscribe-wrapper .subscribe-content h4' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_subscription_one_section_genaral_form_input_border_color',
            [
                'label'     => esc_html__('Border Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home6-subscribe-section .subscribe-wrapper .subscribe-content h4' => 'border-color: {{VALUE}};',
                ],
            ]
        );


        $this->add_control(
            'matrik_subscription_one_section_genaral_button',
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
                'name'     => 'matrik_subscription_one_section_genaral_button_typ',
                'selector' => '{{WRAPPER}} .home6-subscribe-section .subscribe-wrapper .subscribe-content .form-inner .btn-grp button',

            ]
        );

        $this->add_control(
            'matrik_subscription_one_section_genaral_button_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home6-subscribe-section .subscribe-wrapper .subscribe-content .form-inner .btn-grp button' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_subscription_one_section_genaral_button_hover_color',
            [
                'label'     => esc_html__('Hover Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home6-subscribe-section .subscribe-wrapper .subscribe-content .form-inner .btn-grp button:hover' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_subscription_one_section_genaral_button_bg_color',
            [
                'label'     => esc_html__('Background Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home6-subscribe-section .subscribe-wrapper .subscribe-content .form-inner .btn-grp button' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_subscription_one_section_genaral_button_hover_bg_color',
            [
                'label'     => esc_html__('Hover Background Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home6-subscribe-section .subscribe-wrapper .subscribe-content .form-inner .btn-grp button:hover' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section();
    }


    protected function render()
    {

        $settings = $this->get_settings_for_display();

?>
        <div class="home6-subscribe-section">
            <div class="container">
                <div class="subscribe-wrapper">
                    <?php if (!empty($settings['matrik_subscription_banner_image']['url'])): ?>
                        <div class="subscribe-img">
                            <img src="<?php echo esc_url($settings['matrik_subscription_banner_image']['url']); ?>" alt="<?php echo esc_html__('banner-image', 'matrik-core'); ?>">
                        </div>
                    <?php endif; ?>
                    <div class="subscribe-content">
                        <?php if (!empty($settings['matrik_subscription_genaral_title'])): ?>
                            <h4><?php echo esc_html($settings['matrik_subscription_genaral_title']); ?></h4>
                        <?php endif; ?>
                        <?php if (!empty($settings['matrik_subscription_genaral_shortcode'])) : ?>
                            <?php echo do_shortcode($settings['matrik_subscription_genaral_shortcode']); ?>
                        <?php endif; ?>
                    </div>
                    <?php if (!empty($settings['matrik_subscription_banner_vector_image']['url'])) : ?>
                        <img src="<?php echo esc_url($settings['matrik_subscription_banner_vector_image']['url']); ?>" alt="<?php echo esc_attr__('vector-image', 'matrik-core'); ?>" class="vector">
                    <?php endif; ?>
                </div>
            </div>
        </div>
<?php

    }
}

Plugin::instance()->widgets_manager->register(new Matrik_Subscription_Widget());
