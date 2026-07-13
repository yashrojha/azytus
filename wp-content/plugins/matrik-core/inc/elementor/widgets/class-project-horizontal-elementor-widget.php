<?php

namespace Elementor;

if (!defined('ABSPATH')) exit;  // Exit if accessed directly

use Elementor\core\Schemes;
use Egns_Core\Egns_Helper;


class Matrik_Project_Horizontal_Widget extends Widget_Base
{

    public function get_name()
    {
        return 'matrik_project_horizontal';
    }

    public function get_title()
    {
        return esc_html__('EG Project Horizontal', 'matrik-core');
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
            'matrik_project_horizontal_genaral',
            [
                'label' => esc_html__('General', 'matrik-core')
            ]
        );

        $this->add_control(
            'matrik_project_horizontal_genaral_show_pagination',
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
            'matrik_project_horizontal_genaral_query_area',
            [
                'label'     => esc_html__('Query Area', 'matrik-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_control(
            'matrik_project_horizontal_genaral_query_area_post_per_page',
            [
                'label'       => esc_html__('Posts Per Page', 'matrik-core'),
                'type'        => Controls_Manager::NUMBER,
                'default'     => 12,
                'label_block' => false,
            ]
        );

        $this->add_control(
            'matrik_project_horizontal_genaral_query_area_post_list',
            [
                'label'       => __('Post Lists', 'matrik-core'),
                'type'        => \Elementor\Controls_Manager::SELECT2,
                'label_block' => true,
                'multiple'    => true,
                'options'     => \Egns_Core\Egns_Helper::get_project_post_options(),
            ]
        );


        $this->add_control(
            'matrik_project_horizontal_genaral_query_area_order_by',
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
            'matrik_project_horizontal_genaral_query_area_order',
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


        $this->start_controls_section(
            'matrik_project_horizontal_style_genaral',
            [
                'label'     => esc_html__('Styles', 'matrik-core'),
                'tab'       => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'matrik_project_horizontal_style_genaral_card',
            [
                'label'     => esc_html__('Card', 'matrik-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_control(
            'matrik_project_horizontal_style_genaral_card_color',
            [
                'label'     => esc_html__('Card Background Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .project-card .project-content-wrap' => 'background: linear-gradient(180deg, rgb(213 41 41 / 0%) 24.28%, {{VALUE}} 91.5%)',
                ],
            ]
        );

        $this->add_control(
            'matrik_project_horizontal_style_genaral_info',
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
                'name'     => 'matrik_project_horizontal_style_genaral_info_typ',
                'selector' => '{{WRAPPER}} .project-card .project-content-wrap .project-content span',

            ]
        );

        $this->add_control(
            'matrik_project_horizontal_style_genaral_info_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .project-card .project-content-wrap .project-content span' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_project_horizontal_style_genaral_project_title',
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
                'name'     => 'matrik_project_horizontal_style_genaral_project_title_typ',
                'selector' => '{{WRAPPER}} .project-card .project-content-wrap .project-content h3 a',

            ]
        );

        $this->add_control(
            'matrik_project_horizontal_style_genaral_project_title_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .project-card .project-content-wrap .project-content h3 a' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_project_horizontal_style_genaral_project_title_hover_color',
            [
                'label'     => esc_html__('Hover Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .project-card .project-content-wrap .project-content h3 a:hover' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_project_horizontal_style_genaral_project_category',
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
                'name'     => 'matrik_project_horizontal_style_genaral_project_category_typ',
                'selector' => '{{WRAPPER}} .project-card .project-content-wrap .project-content ul li a',

            ]
        );

        $this->add_control(
            'matrik_project_horizontal_style_genaral_project_category_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .project-card .project-content-wrap .project-content ul li a' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_project_horizontal_style_genaral_project_category_hover_color',
            [
                'label'     => esc_html__('Hover Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .project-card .project-content-wrap .project-content ul li a:hover' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_project_horizontal_style_genaral_project_category_border_color',
            [
                'label'     => esc_html__('Border Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .project-card .project-content-wrap .project-content ul li a' => 'border: 1px solid {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_project_horizontal_style_genaral_project_category_border_hover_color',
            [
                'label'     => esc_html__('Hover Border Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .project-card .project-content-wrap .project-content ul li a:hover' => 'border-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_project_horizontal_style_genaral_project_category_hover_bg_color',
            [
                'label'     => esc_html__('Hover Background Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .project-card .project-content-wrap .project-content ul li a:hover' => 'background-color: {{VALUE}};',
                ],
            ]
        );


        $this->add_control(
            'matrik_project_horizontal_style_genaral_pagination_dot',
            [
                'label'     => esc_html__('Pagination Dot', 'matrik-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'matrik-core'),
                'name'     => 'matrik_project_horizontal_style_genaral_pagination_dot_typ',
                'selector' => '{{WRAPPER}} .project-horizontal-page .slider-btn-grp .pagination .swiper-pagination-bullet.swiper-pagination-bullet-active',

            ]
        );

        $this->add_control(
            'matrik_project_horizontal_style_genaral_pagination_dot_color',
            [
                'label'     => esc_html__('Color (active)', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .project-horizontal-page .slider-btn-grp .pagination .swiper-pagination-bullet.swiper-pagination-bullet-active' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_project_horizontal_style_genaral_pagination_dot_inactive_color',
            [
                'label'     => esc_html__('Color (inactive)', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .project-horizontal-page .slider-btn-grp .pagination .swiper-pagination-bullet' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_project_horizontal_style_genaral_pagination_dot_inactive_border_color',
            [
                'label'     => esc_html__('Border Color (inactive)', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .project-horizontal-page .slider-btn-grp .pagination .swiper-pagination-bullet' => 'border: 1px solid {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_project_horizontal_style_genaral_pagination',
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
                'name'     => 'matrik_project_horizontal_style_genaral_pagination_typ',
                'selector' => '{{WRAPPER}} .slider-btn-grp .slider-btn i',

            ]
        );

        $this->add_control(
            'matrik_project_horizontal_style_genaral_pagination_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .slider-btn-grp .slider-btn i' => 'color: {{VALUE}};',
                ],
            ]
        );


        $this->add_control(
            'matrik_project_horizontal_style_genaral_pagination_hover_color',
            [
                'label'     => esc_html__('Hover Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .slider-btn-grp .slider-btn:hover i' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_project_horizontal_style_genaral_pagination_border_color',
            [
                'label'     => esc_html__('Border Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .slider-btn-grp .slider-btn' => 'border: 1px solid {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_project_horizontal_style_genaral_pagination_border_hover_color',
            [
                'label'     => esc_html__('Hover Border Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .slider-btn-grp .slider-btn:hover' => 'border-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_project_horizontal_style_genaral_pagination_bg_color',
            [
                'label'     => esc_html__('Background Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .slider-btn-grp .slider-btn' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_project_horizontal_style_genaral_pagination_hover_bg_color',
            [
                'label'     => esc_html__('Hover Background Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .slider-btn-grp .slider-btn:hover' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section();
    }
    protected function render()
    {

        $settings = $this->get_settings_for_display();
        $selected_post_ids     = $settings['matrik_project_horizontal_genaral_query_area_post_list'];
        $args                  = array(
            'post_type'      => 'project',
            'posts_per_page' => $settings['matrik_project_horizontal_genaral_query_area_post_per_page'],
            'orderby'        => $settings['matrik_project_horizontal_genaral_query_area_order_by'],
            'order'          => $settings['matrik_project_horizontal_genaral_query_area_order'],
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
                var swiper = new Swiper(".home1-project-slider", {
                    slidesPerView: 1,
                    speed: 1500,
                    spaceBetween: 0,
                    autoplay: {
                        delay: 2500, // Autoplay duration in milliseconds
                        disableOnInteraction: false,
                    },
                    navigation: {
                        nextEl: ".project-slider-next",
                        prevEl: ".project-slider-prev",
                    },
                    pagination: {
                        el: ".swiper-pagination1",
                        clickable: true,
                    },
                    breakpoints: {
                        280: {
                            slidesPerView: 1,
                        },
                        386: {
                            slidesPerView: 1,
                        },
                        576: {
                            slidesPerView: 1,
                        },
                        768: {
                            slidesPerView: 2,
                        },
                        992: {
                            slidesPerView: 3,
                        },
                        1200: {
                            slidesPerView: 3,
                        },
                        1400: {
                            slidesPerView: 4,
                        },
                    },
                });
            </script>
        <?php endif; ?>

        <div class="project-horizontal-page" id="scroll-section">
            <div class="project-slider-area mb-50">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="swiper home1-project-slider">
                            <div class="swiper-wrapper">
                                <?php
                                while ($query->have_posts()) :
                                    $query->the_post();
                                ?>
                                    <div class="swiper-slide">
                                        <div class="project-card-wrap">
                                            <div class="project-card">
                                                <?php if (has_post_thumbnail()) : ?>
                                                    <div class="project-img">
                                                        <?php the_post_thumbnail(); ?>
                                                    </div>
                                                <?php endif; ?>
                                                <div class="project-content-wrap">
                                                    <div class="project-content">
                                                        <span><?php
                                                                $data = Egns_Helper::egns_project_value('project_info_list');
                                                                if (!empty($data) && isset($data[0]['project_label_text']) && isset($data[0]['project_content_text'])) { ?>
                                                                <?php echo esc_html($data[0]['project_label_text']); ?> <?php echo esc_html($data[0]['project_content_text']); ?>
                                                            <?php }
                                                            ?></span>
                                                        <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
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
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php endwhile;
                                wp_reset_postdata(); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php if ($settings['matrik_project_horizontal_genaral_show_pagination'] == 'yes') : ?>
                <div class="container">
                    <div class="slider-btn-grp wow animate fadeInUp" data-wow-delay="200ms" data-wow-duration="1500ms">
                        <div class="slider-btn project-slider-prev">
                            <i class="bi bi-arrow-left"></i>
                        </div>
                        <div class="pagination swiper-pagination1"></div>
                        <div class="slider-btn project-slider-next">
                            <i class="bi bi-arrow-right"></i>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
        </div>

<?php

    }
}

Plugin::instance()->widgets_manager->register(new Matrik_Project_Horizontal_Widget());
