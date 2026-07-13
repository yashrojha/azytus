<div class="post-not-found text-center">
    <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/img/sad.svg') ?>" alt="<?php echo esc_attr__('Image', 'matrik') ?>">
    <div class="inner-cnt mb-30">
        <h3> <?php echo esc_html__('Sorry Nothing Found!', 'matrik'); ?> </h3>
        <p><?php echo esc_html__('Nothing Match your search terms. Please try again with some different keywords.', 'matrik'); ?></p>
    </div>
    <?php get_template_part('searchform'); ?>
</div>