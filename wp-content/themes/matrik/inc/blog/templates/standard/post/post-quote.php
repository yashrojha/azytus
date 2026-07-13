
<div id="post-<?php the_ID(); ?>" <?php post_class('col-lg-10 mb-80 wow animate fadeInDown'); ?> data-wow-delay="200ms" data-wow-duration="1500ms">
    <div class="blog-card blog-st magnetic-item">
        <?php
        Egns\Inc\Blog_Helper::egns_blog_is_sticky();
        Egns\Helper\Egns_Helper::egns_template_part('blog', 'templates/standard/parts/quote');
        Egns\Helper\Egns_Helper::egns_template_part('blog', 'templates/common/standard/content');
        ?>
    </div>
</div>