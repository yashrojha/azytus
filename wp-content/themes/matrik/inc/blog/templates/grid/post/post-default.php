<div class="col-lg-4 col-md-6 wow animate fadeInDown" data-wow-delay="200ms" data-wow-duration="1500ms">
    <div class="blog-card grid magnetic-item">
        <div class="blog-img-wrap">
            <?php if (has_post_thumbnail()) : ?>
                <a class="blog-img" href="<?php the_permalink() ?>">
                    <?php the_post_thumbnail() ?>
                </a>
            <?php endif; ?>
            <?php
            Egns\Helper\Egns_Helper::egns_template_part('blog', 'templates/common/grid/meta');
            ?>
        </div>
        <?php
        Egns\Helper\Egns_Helper::egns_template_part('blog', 'templates/common/grid/content');
        ?>
    </div>
</div>