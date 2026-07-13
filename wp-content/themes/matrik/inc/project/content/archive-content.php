<?php

use Egns\Helper\Egns_Helper;

?>
<div class="col-lg-4 col-md-6 wow animate fadeInDown" data-wow-delay="200ms" data-wow-duration="1500ms">
    <div class="project-card magnetic-item">
        <?php if (has_post_thumbnail()) : ?>
            <div class="project-img">
                <?php the_post_thumbnail(); ?>
            </div>
        <?php endif; ?>
        <div class="project-content-wrap">
            <div class="project-content">
                <?php
                $data = Egns_Helper::egns_project_value('project_info_list');
                if (!empty($data) && isset($data[0]['project_label_text']) && isset($data[0]['project_content_text'])) { ?>
                    <span><?php echo esc_html($data[0]['project_label_text']); ?> <?php echo esc_html($data[0]['project_content_text']); ?></span>
                <?php }
                ?>
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