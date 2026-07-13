<?php

namespace Elementor;

if (!defined('ABSPATH')) exit;  // Exit if accessed directly

use Elementor\core\Schemes;
use Egns_Core\Egns_Helper;

class Matrik_Career_Gallery_Widget extends Widget_Base
{

    public function get_name()
    {
        return 'matrik_career_gallery';
    }

    public function get_title()
    {
        return esc_html__('EG Career Gallery', 'matrik-core');
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
            'matrik_career_gallery_genaral',
            [
                'label' => esc_html__('General', 'matrik-core')
            ]
        );

        $this->add_control(
            'matrik_career_gallery_genaral_header_title',
            [
                'label'       => esc_html__('Header Title', 'matrik-core'),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default'     => esc_html__('[CAREER OPPORTUNITIES]', 'matrik-core'),
                'placeholder' => esc_html__('write your title here', 'matrik-core'),
                'label_block' => true,
            ]
        );


        $this->add_control(
            'matrik_career_gallery_genaral_header_description',
            [
                'label'       => esc_html__('Header Description', 'matrik-core'),
                'type'        => \Elementor\Controls_Manager::TEXTAREA,
                'default' => wp_kses('Our Metal captures the true nature of <span>buildings. Watch house is a slow take on instant gratification. Be Part of Our Unlock Success Story</span>', wp_kses_allowed_html('post')),
                'placeholder' => esc_html__('write your description here', 'matrik-core'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'matrik_career_gallery_genaral_icon_image',
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

        $this->add_control(
            'matrik_career_gallery_genaral_image_one',
            [
                'label' => esc_html__('Image One', 'matrik-core'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
                'media_types' => ['image'],
            ]
        );

        $this->add_control(
            'matrik_career_gallery_genaral_image_two',
            [
                'label' => esc_html__('Image Two', 'matrik-core'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
                'media_types' => ['image'],
            ]
        );

        $this->add_control(
            'matrik_career_gallery_genaral_image_three',
            [
                'label' => esc_html__('Image Three', 'matrik-core'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
                'media_types' => ['image'],
            ]
        );

        $this->add_control(
            'matrik_career_gallery_genaral_image_four',
            [
                'label' => esc_html__('Image Four', 'matrik-core'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
                'media_types' => ['image'],
            ]
        );

        $this->add_control(
            'matrik_career_gallery_genaral_image_five',
            [
                'label' => esc_html__('Image Five', 'matrik-core'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
                'media_types' => ['image'],
            ]
        );

        $this->end_controls_section();

        //Style Six Start
        $this->start_controls_section(
            'matrik_career_gallery_style_genaral',
            [
                'label'     => esc_html__('Styles', 'matrik-core'),
                'tab'       => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'matrik_career_gallery_style_genaral_title',
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
                'name'     => 'matrik_career_gallery_style_genaral_title_typ',
                'selector' => '{{WRAPPER}} .section-title h2',

            ]
        );

        $this->add_control(
            'matrik_career_gallery_style_genaral_title_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .section-title h2' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_career_gallery_style_genaral_description',
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
                'name'     => 'matrik_career_gallery_style_genaral_description_typ',
                'selector' => '{{WRAPPER}} .section-title h2',

            ]
        );

        $this->add_control(
            'matrik_career_gallery_style_genaral_description_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .career-page .section-title p' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_career_gallery_style_genaral_description_span_color',
            [
                'label'     => esc_html__('Span Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .career-page .section-title p span' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_career_gallery_style_genaral_icon_image',
            [
                'label'     => esc_html__('Icon Image', 'matrik-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_control(
            'matrik_career_gallery_style_genaral_icon_image_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .career-page .career-img-grp-wrapper .career-center-img-wrap .career-center-img .overlay svg' => 'fill: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section();
    }
    protected function render()
    {

        $settings = $this->get_settings_for_display();

?>

        <div class="career-page" id="scroll-section">
            <div class="container">
                <div class="row justify-content-center mb-70">
                    <div class="col-xl-10">
                        <div class="section-title three text-center wow animate fadeInDown" data-wow-delay="200ms" data-wow-duration="1500ms">
                            <?php if (!empty($settings['matrik_career_gallery_genaral_header_title'])) : ?>
                                <h2><?php echo esc_html($settings['matrik_career_gallery_genaral_header_title']); ?></h2>
                            <?php endif; ?>
                            <?php if (!empty($settings['matrik_career_gallery_genaral_header_description'])) : ?>
                                <p><?php echo wp_kses($settings['matrik_career_gallery_genaral_header_description'], wp_kses_allowed_html('post')); ?></p>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="career-img-grp-wrapper">
                <div class="container-fluid">
                    <div class="career-img-grp">
                        <div class="row justify-content-md-between gy-lg-5 gy-4">
                            <?php if (!empty($settings['matrik_career_gallery_genaral_image_one']['url'])) : ?>
                                <div class="col-md-6">
                                    <div class="single-img pr">
                                        <img src="<?php echo esc_url($settings['matrik_career_gallery_genaral_image_one']['url']); ?>" alt="<?php echo esc_attr__('image-one', 'matrik-core'); ?>">
                                    </div>
                                </div>
                            <?php endif; ?>

                            <?php if (!empty($settings['matrik_career_gallery_genaral_image_two']['url'])) : ?>
                                <div class="col-md-6">
                                    <div class="single-img pl">
                                        <img src="<?php echo esc_url($settings['matrik_career_gallery_genaral_image_two']['url']); ?>" alt="<?php echo esc_attr__('image-one', 'matrik-core'); ?>">
                                    </div>
                                </div>
                            <?php endif; ?>
                            <?php if (!empty($settings['matrik_career_gallery_genaral_image_five']['url'])) : ?>
                                <div class="col-md-6 d-md-none d-flex justify-content-center">
                                    <div class="career-center-img-wrap">
                                        <div class="career-center-img">
                                            <img src="<?php echo esc_url($settings['matrik_career_gallery_genaral_image_five']['url']); ?>" alt="<?php echo esc_attr__('image-five', 'matrik-core'); ?>">
                                            <?php if (!empty($settings['matrik_career_gallery_genaral_icon_image'])) : ?>
                                                <div class="overlay">
                                                    <?php \Elementor\Icons_Manager::render_icon($settings['matrik_career_gallery_genaral_icon_image'], ['aria-hidden' => 'true']); ?>
                                                </div>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                            <?php endif; ?>
                            <?php if (!empty($settings['matrik_career_gallery_genaral_image_three']['url'])) : ?>
                                <div class="col-md-6">
                                    <div class="single-img pr">
                                        <img src="<?php echo esc_url($settings['matrik_career_gallery_genaral_image_three']['url']); ?>" alt="<?php echo esc_attr__('image-three', 'matrik-core'); ?>">
                                    </div>
                                </div>
                            <?php endif; ?>
                            <?php if (!empty($settings['matrik_career_gallery_genaral_image_four']['url'])) : ?>
                                <div class="col-md-6">
                                    <div class="single-img pl">
                                        <img src="<?php echo esc_url($settings['matrik_career_gallery_genaral_image_four']['url']); ?>" alt="<?php echo esc_attr__('image-four', 'matrik-core'); ?>">
                                    </div>
                                </div>
                            <?php endif; ?>
                        </div>
                        <?php if (!empty($settings['matrik_career_gallery_genaral_image_five']['url'])) : ?>
                            <div class="career-center-img-wrap d-md-flex d-none">
                                <div class="career-center-img">
                                    <img src="<?php echo esc_url($settings['matrik_career_gallery_genaral_image_five']['url']); ?>" alt="<?php echo esc_attr__('image-three', 'matrik-core'); ?>">
                                    <?php if (!empty($settings['matrik_career_gallery_genaral_icon_image'])) : ?>
                                        <div class="overlay">
                                            <?php \Elementor\Icons_Manager::render_icon($settings['matrik_career_gallery_genaral_icon_image'], ['aria-hidden' => 'true']); ?>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>

<?php

    }
}

Plugin::instance()->widgets_manager->register(new Matrik_Career_Gallery_Widget());
