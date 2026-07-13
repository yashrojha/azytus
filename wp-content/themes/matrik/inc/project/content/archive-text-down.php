<?php

use Egns\Helper\Egns_Helper;

?>
<div class="project-card2 three magnetic-item">
    <?php if (has_post_thumbnail()) : ?>
        <a href="<?php the_permalink(); ?>" class="project-img">
            <?php the_post_thumbnail(); ?>
        </a>
    <?php endif; ?>
    <div class="project-content">
        <?php
        $data = Egns_Helper::egns_project_value('project_info_list');
        if (!empty($data) && isset($data[0]['project_label_text']) && isset($data[0]['project_content_text'])) { ?>
            <span><?php echo esc_html($data[0]['project_label_text']); ?> <?php echo esc_html($data[0]['project_content_text']); ?></span>
        <?php }
        ?>
        <h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
    </div>
</div>