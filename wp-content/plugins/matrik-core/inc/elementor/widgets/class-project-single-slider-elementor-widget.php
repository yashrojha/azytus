<?php

namespace Elementor;

if (!defined('ABSPATH')) exit;  // Exit if accessed directly

use Elementor\core\Schemes;
use Egns_Core\Egns_Helper;

class Matrik_Project_Single_Slider_Widget extends Widget_Base
{

    public function get_name()
    {
        return 'matrik_project_single_slider';
    }

    public function get_title()
    {
        return esc_html__('EG Project Single Slider', 'matrik-core');
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
            'matrik_project_single_slider_genaral',
            [
                'label' => esc_html__('General', 'matrik-core')
            ]
        );

        $this->add_control(
            'matrik_project_single_slider_genaral_show_pagination',
            [
                'label' => esc_html__("Show Pagination?", 'matrik-core'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Enable', 'matrik-core'),
                'label_off' => esc_html__('Disable', 'matrik-core'),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );

        $this->add_control(
            'matrik_project_single_slider_genaral_query_area',
            [
                'label'     => esc_html__('Query Area', 'matrik-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_control(
            'matrik_project_single_slider_genaral_post_per_page',
            [
                'label'       => esc_html__('Posts Per Page', 'matrik-core'),
                'type'        => Controls_Manager::NUMBER,
                'default'     => 12,
                'label_block' => false,
            ]
        );

        $this->add_control(
            'matrik_project_single_slider_genaral_post_list',
            [
                'label'       => __('Post Lists', 'matrik-core'),
                'type'        => \Elementor\Controls_Manager::SELECT2,
                'label_block' => true,
                'multiple'    => true,
                'options'     => \Egns_Core\Egns_Helper::get_project_post_options(),
            ]
        );


        $this->add_control(
            'matrik_project_single_slider_genaral_order_by',
            [
                'label'   => esc_html__('Order By', 'matrik-core'),
                'type'    => Controls_Manager::SELECT,
                'default' => 'ID',
                'options' => [
                    'ID'         => esc_html__('Post Id', 'matrik-core'),
                    'author'     => esc_html__('Post Author', 'matrik-core'),
                    'title'      => esc_html__('Title', 'matrik-core'),
                    'post_date'  => esc_html__('Date', 'matrik-core'),
                    'rand'       => esc_html__('Random', 'matrik-core'),
                    'menu_order' => esc_html__('Menu Order', 'matrik-core'),
                ],
            ]
        );

        $this->add_control(
            'matrik_project_single_slider_genaral_order',
            [
                'label'   => esc_html__('Order', 'matrik-core'),
                'type'    => Controls_Manager::SELECT,
                'options' => [
                    'asc'  => esc_html__('Ascending', 'matrik-core'),
                    'desc' => esc_html__('Descending', 'matrik-core')

                ],
                'default' => 'desc',
            ]
        );

        $this->end_controls_section();


        //style start

        $this->start_controls_section(
            'matrik_project_single_slider_style_genaral',
            [
                'label'     => esc_html__('Styles', 'matrik-core'),
                'tab'       => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'matrik_project_single_slider_style_genaral_info',
            [
                'label'     => esc_html__('Info', 'matrik-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'matrik-core'),
                'name'     => 'matrik_project_single_slider_style_genaral_info_typ',
                'selector' => '{{WRAPPER}} .project-slider-page .project-slider-item .project-slider-content span',

            ]
        );

        $this->add_control(
            'matrik_project_single_slider_style_genaral_info_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .project-slider-page .project-slider-item .project-slider-content span' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_project_single_slider_style_genaral_project_title',
            [
                'label'     => esc_html__('Project Title', 'matrik-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'matrik-core'),
                'name'     => 'matrik_project_single_slider_style_genaral_project_title_typ',
                'selector' => '{{WRAPPER}} .project-slider-page .project-slider-item .project-slider-content h1 a',

            ]
        );

        $this->add_control(
            'matrik_project_single_slider_style_genaral_project_title_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .project-slider-page .project-slider-item .project-slider-content h1 a' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_project_single_slider_style_genaral_project_title_hover_color',
            [
                'label'     => esc_html__('Hover Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .project-slider-page .project-slider-item .project-slider-content h1 a:hover' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_project_single_slider_style_genaral_project_categories',
            [
                'label'     => esc_html__('Project Categories', 'matrik-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'matrik-core'),
                'name'     => 'matrik_project_single_slider_style_genaral_project_categories_typ',
                'selector' => '{{WRAPPER}} .project-slider-page .project-slider-item .project-slider-content ul li a',

            ]
        );

        $this->add_control(
            'matrik_project_single_slider_style_genaral_project_categories_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .project-slider-page .project-slider-item .project-slider-content ul li a' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_project_single_slider_style_genaral_project_categories_hover_color',
            [
                'label'     => esc_html__('Hover Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .project-slider-page .project-slider-item .project-slider-content ul li a:hover' => 'color: {{VALUE}};',
                ],
            ]
        );


        $this->add_control(
            'matrik_project_single_slider_style_genaral_project_categories_border_color',
            [
                'label'     => esc_html__('Border Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .project-slider-page .project-slider-item .project-slider-content ul li a' => 'border: 1px solid {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_project_single_slider_style_genaral_project_categories_border_hover_color',
            [
                'label'     => esc_html__('Hover Border Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .project-slider-page .project-slider-item .project-slider-content ul li a:hover' => 'border-color:{{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_project_single_slider_style_genaral_project_categories_hover_bg_color',
            [
                'label'     => esc_html__('Hover Background Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .project-slider-page .project-slider-item .project-slider-content ul li a:hover' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_project_single_slider_style_genaral_project_pagination',
            [
                'label'     => esc_html__('Pagination', 'matrik-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'matrik-core'),
                'name'     => 'matrik_project_single_slider_style_genaral_project_pagination_typ',
                'selector' => '{{WRAPPER}} .project-slider-page .slider-btn-area .slider-btn',

            ]
        );

        $this->add_control(
            'matrik_project_single_slider_style_genaral_project_pagination_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .project-slider-page .slider-btn-area .slider-btn' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_project_single_slider_style_genaral_project_pagination_hover_color',
            [
                'label'     => esc_html__('Hover Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .project-slider-page .slider-btn-area .slider-btn:hover' => 'color: {{VALUE}};',
                ],
            ]
        );


        $this->add_control(
            'matrik_project_single_slider_style_genaral_project_pagination_icon_color',
            [
                'label'     => esc_html__('Icon Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .project-slider-page .slider-btn-area .slider-btn i' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_project_single_slider_style_genaral_project_pagination_hover_icon_color',
            [
                'label'     => esc_html__('Hover Icon Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .project-slider-page .slider-btn-area .slider-btn:hover i' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section();
    }
    protected function render()
    {

        $settings = $this->get_settings_for_display();
        $selected_post_ids     = $settings['matrik_project_single_slider_genaral_post_list'];
        $args                  = array(
            'post_type'      => 'project',
            'posts_per_page' => $settings['matrik_project_single_slider_genaral_post_per_page'],
            'orderby'        => $settings['matrik_project_single_slider_genaral_order_by'],
            'order'          => $settings['matrik_project_single_slider_genaral_order'],
            'offset'         => 0,
            'post_status'    => 'publish',
        );

        if (!empty($selected_category_ids)) {
            $args['tax_query'] = array(
                array(
                    'taxonomy' => 'project-category',
                    'field'    => 'slug',
                    'terms'    => $selected_category_ids,
                    'operator' => 'IN',
                ),
            );
        }
        if (!empty($selected_post_ids)) {
            $args['post__in'] = $selected_post_ids;
        }
        $query = new \WP_Query($args);
        $num   = 0;
?>
        <?php if (is_admin()) : ?>
            <script>
                var swiper = new Swiper(".pf-horizontal-slider", {
                    slidesPerView: 1,
                    speed: 1500,
                    spaceBetween: 25,
                    loop: true,
                    effect: "fade",
                    mousewheel: {
                        invert: false,
                    },
                    navigation: {
                        nextEl: ".pf-slider-next",
                        prevEl: ".pf-slider-prev",
                    },
                });
            </script>
        <?php endif; ?>

        <div class="project-slider-page">
            <div class="swiper pf-horizontal-slider">
                <div class="swiper-wrapper">
                    <?php
                    while ($query->have_posts()) :
                        $query->the_post();
                    ?>
                        <div class="swiper-slide">
                            <div class="project-slider-item">
                                <div class="project-slider-bg"
                                    style="background: linear-gradient(rgba(0, 0, 0, 0.5) 0%, rgba(0, 0, 0, 0.5) 100%), url('<?php $thumbnail_url = get_the_post_thumbnail_url(get_the_ID(), 'full');
                                                                                                                                echo esc_url($thumbnail_url); ?>')">
                                </div>
                                <div class="project-slider-content">
                                    <span><?php
                                            $data = Egns_Helper::egns_project_value('project_info_list');
                                            if (!empty($data) && isset($data[0]['project_label_text']) && isset($data[0]['project_content_text'])) { ?>
                                            <?php echo esc_html($data[0]['project_label_text']); ?> <?php echo esc_html($data[0]['project_content_text']); ?>
                                        <?php }
                                        ?></span>
                                    <h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
                                    <ul>
                                        <?php
                                        $post_categories = get_the_terms(get_the_ID(), 'project-category');
                                        if ($post_categories && !is_wp_error($post_categories)) :
                                        ?>
                                            <?php foreach ($post_categories as $category) : ?>
                                                <li><a href="<?php echo esc_url(get_term_link($category)); ?>"><?php echo esc_html($category->name); ?></a></li>
                                            <?php endforeach; ?>
                                        <?php endif; ?>

                                    </ul>
                                    <div class="title-area">
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endwhile;
                    wp_reset_postdata(); ?>
                </div>
            </div>
            <?php if ($settings['matrik_project_single_slider_genaral_show_pagination'] == 'yes') : ?>
                <div class="slider-btn-area">
                    <div class="slider-btn pf-slider-prev">
                        <i class="bi bi-arrow-left"></i>
                        <?php echo esc_html__('PREVIOUS', 'matrik-core'); ?>
                    </div>
                    <div class="slider-btn pf-slider-next">
                        <?php echo esc_html__('NEXT', 'matrik-core'); ?>
                        <i class="bi bi-arrow-right"></i>
                    </div>
                </div>
            <?php endif; ?>
        </div>

<?php

    }
}

Plugin::instance()->widgets_manager->register(new Matrik_Project_Single_Slider_Widget());
