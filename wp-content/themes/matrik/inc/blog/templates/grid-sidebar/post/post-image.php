<div class="col-md-6 wow animate fadeInDown" data-wow-delay="200ms" data-wow-duration="1500ms">
    <div class="blog-card grid magnetic-item">
        <div class="blog-img-wrap">
            <?php
            Egns\Helper\Egns_Helper::egns_template_part('blog', 'templates/grid/parts/image');
            ?>
            <?php
            Egns\Helper\Egns_Helper::egns_template_part('blog', 'templates/common/grid/meta');
            ?>
        </div>
        <?php
        Egns\Helper\Egns_Helper::egns_template_part('blog', 'templates/common/grid/content');
        ?>
    </div>
</div>