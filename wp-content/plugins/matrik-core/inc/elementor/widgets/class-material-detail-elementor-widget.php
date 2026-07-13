<?php

namespace Elementor;

if (!defined('ABSPATH')) exit;  // Exit if accessed directly

use Elementor\core\Schemes;
use Egns_Core\Egns_Helper;
use WP_Query;

class Matrik_Material_Detail_Widget extends Widget_Base
{

    public function get_name()
    {
        return 'matrik_material_detail';
    }

    public function get_title()
    {
        return esc_html__('EG Material Details', 'matrik-core');
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
            'matrik_material_detail_area',
            [
                'label' => esc_html__('General', 'matrik-core')
            ]
        );

        $this->add_control(
            'matrik_material_detail_title',
            [
                'label'      => __('Title', 'matrik-core'),
                'type'       => \Elementor\Controls_Manager::TEXT,
                'label_block' => true,
                'default'   => 'STEEL SHEETS & PLATES',
            ]
        );

        $this->add_control(
            'matrik_material_detail_description',
            [
                'label'     => __('Description', 'matrik-core'),
                'type'      => \Elementor\Controls_Manager::WYSIWYG,
                'default'   => 'Urna Aenean onewaryzo eleifend vitae tellus a facilisis. Nunc posuere at augue eget porta. Inei odio tellus, dignissim fermentumara purus nec, consequat dapibus metus.Vivamus urna worlda mauris, faucibus at egestas quis, fermentum egetonav neque. Duis pharetra lectus nec risusonl pellentesque, vitae aliquet nisi dapibus. Sed volutpat mi velit, ateng maximus est eleifend accui Fusce porttitor ex arcu. Phasellus viverra lorem a nibh placerat tincidunt.bolgotai Aliquam andit rutrum elementum urna, vel fringilla tellus varius ut. Morbi non velit odio.',
            ]
        );

        $this->add_control(
            'matrik_material_details_banner_image',
            [
                'label' => esc_html__('Banner Image', 'matrik-core'),
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
            'matrik_material_detail_area_style',
            [
                'label'     => esc_html__('Styles', 'matrik-core'),
                'tab'       => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'matrik_material_detail_title',
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
                'name'     => 'matrik_material_detail_title_typ',
                'selector' => '{{WRAPPER}} .product-details-top-area .details-content h2',

            ]
        );

        $this->add_control(
            'matrik_material_detail_title_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .product-details-top-area .details-content h2' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_material_detail_desc',
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
                'name'     => 'matrik_material_detail_desc_typ',
                'selector' => '{{WRAPPER}} .product-details-top-area .details-content p',

            ]
        );

        $this->add_control(
            'matrik_material_detail_desc_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .product-details-top-area .details-content p' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section();
    }

    protected function render()
    {

        $settings = $this->get_settings_for_display();
?>
        <div class="product-details-top-area">
            <div class="container">
                <div class="row gy-md-5 gy-4 align-items-lg-end">
                    <div class="col-lg-8 wow animate fadeInLeft" data-wow-delay="200ms" data-wow-duration="1500ms">
                        <div class="details-content">
                            <?php if (!empty($settings['matrik_material_detail_title'])) : ?>
                                <h2><?php echo esc_html($settings['matrik_material_detail_title']); ?></h2>
                            <?php endif; ?>
                            <?php if (!empty($settings['matrik_material_detail_description'])) : ?>
                                <?php echo wp_kses($settings['matrik_material_detail_description'], wp_kses_allowed_html('post')); ?>
                            <?php endif; ?>
                        </div>
                    </div>
                    <?php if (!empty($settings['matrik_material_details_banner_image']['url'])) : ?>
                        <div class="col-lg-4 wow animate fadeInRight" data-wow-delay="200ms" data-wow-duration="1500ms">
                            <div class="product-img">
                                <img src="<?php echo esc_url($settings['matrik_material_details_banner_image']['url']); ?>" alt="<?php echo esc_attr__('banner-image', 'matrik-core'); ?>">
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>

<?php

    }
}

Plugin::instance()->widgets_manager->register(new Matrik_Material_Detail_Widget());
