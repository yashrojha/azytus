<?php

namespace Elementor;

if (!defined('ABSPATH')) exit;  // Exit if accessed directly

use Elementor\core\Schemes;
use Egns_Core\Egns_Helper;

class Matrik_Project_Metro_Widget extends Widget_Base
{

    public function get_name()
    {
        return 'matrik_project_metro';
    }

    public function get_title()
    {
        return esc_html__('EG Project Metro', 'matrik-core');
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
            'matrik_project_metro_genaral',
            [
                'label' => esc_html__('General', 'matrik-core')
            ]
        );

        $this->add_control(
            'matrik_project_metro_genaral_query_area',
            [
                'label'     => esc_html__('Query Area', 'matrik-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_control(
            'matrik_project_metro_genaral_query_area_post_per_page',
            [
                'label'       => esc_html__('Posts Per Page', 'matrik-core'),
                'type'        => Controls_Manager::NUMBER,
                'default'     => 12,
                'label_block' => false,
            ]
        );
        $this->add_control(
            'matrik_project_metro_genaral_query_area_notice',
            [
                'type' => \Elementor\Controls_Manager::NOTICE,
                'notice_type' => 'warning',
                'dismissible' => true,
                'heading' => esc_html__('Note', 'matrik-core'),
                'content' => esc_html__('Maximum 12 Post Can Be Show.', 'matrik-core'),
            ]
        );

        $this->add_control(
            'matrik_project_metro_genaral_query_area_post_lists',
            [
                'label'       => __('Post Lists', 'matrik-core'),
                'type'        => \Elementor\Controls_Manager::SELECT2,
                'label_block' => true,
                'multiple'    => true,
                'options'     => \Egns_Core\Egns_Helper::get_project_post_options(),
            ]
        );


        $this->add_control(
            'matrik_project_metro_genaral_query_area_order_by',
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
            'matrik_project_metro_genaral_query_area_order',
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

        //style start three

        $this->start_controls_section(
            'matrik_project_metro_style_general',
            [
                'label'     => esc_html__('Styles', 'matrik-core'),
                'tab'       => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'matrik_project_metro_style_general_title',
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
                'name'     => 'matrik_project_metro_style_general_title_typ',
                'selector' => '{{WRAPPER}} .project-metro-card .project-content-wrap .project-content h3 a',

            ]
        );

        $this->add_control(
            'matrik_project_metro_style_general_title_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .project-metro-card .project-content-wrap .project-content h3 a' => 'color: {{VALUE}};',
                ],
            ]
        );


        $this->add_control(
            'matrik_project_metro_style_general_title_hover_color',
            [
                'label'     => esc_html__('Hover Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .project-metro-card .project-content-wrap .project-content h3 a:hover' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_project_metro_style_general_category',
            [
                'label'     => esc_html__('Category', 'matrik-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'matrik-core'),
                'name'     => 'matrik_project_metro_style_general_category_typ',
                'selector' => '{{WRAPPER}} .project-metro-card .project-content-wrap .project-content ul li a',

            ]
        );

        $this->add_control(
            'matrik_project_metro_style_general_category_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .project-metro-card .project-content-wrap .project-content ul li a' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_project_metro_style_general_category_hover_color',
            [
                'label'     => esc_html__('Hover Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .project-metro-card .project-content-wrap .project-content ul li a:hover' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_project_metro_style_general_category_border_color',
            [
                'label'     => esc_html__('Border Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .project-metro-card .project-content-wrap .project-content ul li a' => 'border: 1px solid {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_project_metro_style_general_category_border_hover_color',
            [
                'label'     => esc_html__('Hover Border Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .project-metro-card .project-content-wrap .project-content ul li a:hover' => 'border: 1px solid {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_project_metro_style_general_category_hover_bg_color',
            [
                'label'     => esc_html__('Hover Background Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .project-metro-card .project-content-wrap .project-content ul li a:hover' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section();
    }
    protected function render()
    {

        $settings = $this->get_settings_for_display();

        $selected_post_ids     = $settings['matrik_project_metro_genaral_query_area_post_lists'];
        $args                  = array(
            'post_type'      => 'project',
            'posts_per_page' => $settings['matrik_project_metro_genaral_query_area_post_per_page'],
            'orderby'        => $settings['matrik_project_metro_genaral_query_area_order_by'],
            'order'          => $settings['matrik_project_metro_genaral_query_area_order'],
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
        <div class="project-metro-page" id="scroll-section">
            <div class="row g-0">
                <div class="col-xl-6">
                    <div class="row g-0">
                        <?php
                        $num = 0;
                        $index           = 0;
                        $classes         = array('col-md-12', 'col-md-6', 'col-md-6', 'col-md-12', 'col-md-6', 'col-md-6');
                        $classes_two         = array('', 'two', 'two', '', 'two', 'two');
                        $class_count     = count($classes);
                        $class_count_two     = count($classes_two);
                        while ($query->have_posts()) :
                            $class     = $classes[$index % $class_count];
                            $class_sec_two     = $classes_two[$index % $class_count_two];
                            $index++;
                            $query->the_post();

                            $num++;
                            if ($num > 6) break;
                        ?>
                            <div class="<?php echo esc_attr($class); ?>">
                                <div class="project-metro-card <?php echo esc_attr($class_sec_two); ?>">
                                    <?php if (has_post_thumbnail()) : ?>
                                        <div class="project-img">
                                            <?php the_post_thumbnail(); ?>
                                        </div>
                                    <?php endif; ?>
                                    <div class="project-content-wrap">
                                        <div class="project-content">
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
                        <?php endwhile;
                        wp_reset_postdata(); ?>
                    </div>
                </div>
                <div class="col-xl-6">
                    <div class="row g-0">
                        <?php
                        $query->rewind_posts();
                        $num = 0;
                        $index = 0;

                        $classes = array('col-md-6', 'col-md-6', 'col-md-12', 'col-md-6', 'col-md-6', 'col-md-12');
                        $classes_two = array('two', 'two', '', 'two', 'two', '');

                        $class_count = count($classes);
                        $class_count_two = count($classes_two);

                        while ($query->have_posts()) :
                            $query->the_post();
                            $num++;

                            if ($num >= 7 && $num <= 12) {
                                $class = $classes[$index % $class_count];
                                $class_sec_two = $classes_two[$index % $class_count_two];
                                $index++;
                        ?>
                                <div class="<?php echo esc_attr($class); ?>">
                                    <div class="project-metro-card <?php echo esc_attr($class_sec_two); ?>">
                                        <?php if (has_post_thumbnail()) : ?>
                                            <div class="project-img">
                                                <?php the_post_thumbnail(); ?>
                                            </div>
                                        <?php endif; ?>
                                        <div class="project-content-wrap">
                                            <div class="project-content">
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
                        <?php
                            }

                            if ($num >= 12) {
                                break;
                            }

                        endwhile;

                        wp_reset_postdata();
                        ?>
                    </div>
                </div>
            </div>
        </div>

<?php

    }
}

Plugin::instance()->widgets_manager->register(new Matrik_Project_Metro_Widget());
