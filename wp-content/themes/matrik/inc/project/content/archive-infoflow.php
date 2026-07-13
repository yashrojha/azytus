<?php

use Egns\Helper\Egns_Helper;

?>
<div class="col-lg-3 col-md-4 col-sm-6 wow animate fadeInDown" data-wow-delay="200ms" data-wow-duration="1500ms">
    <div class="project-info-flow-card">
        <?php if (has_post_thumbnail()) : ?>
            <a href="<?php the_permalink(); ?>" class="info-flow-img">
                <?php the_post_thumbnail(); ?>
            </a>
        <?php endif; ?>
        <div class="info-flow-content">
            <a href="<?php the_permalink(); ?>">
                <?php
                $data = Egns_Helper::egns_project_value('project_info_list');
                if (!empty($data) && isset($data[0]['project_label_text']) && isset($data[0]['project_content_text'])) { ?>
                    <?php echo esc_html($data[0]['project_label_text']); ?> <?php echo esc_html($data[0]['project_content_text']); ?>
                <?php }
                ?></a>
            <h6><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h6>
        </div>
    </div>
</div>