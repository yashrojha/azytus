<div class="blog-standard-page sec-mar" id="scroll-section">
    <?php
    do_action('egns_page_before');
    ?>
    <div class="row justify-content-center">
        <?php
        if (class_exists('CSF')) {
            $params = get_option('egns_theme_options') ?? [];

            $layout_option = $params['blog_layout_options'] ?? '';

            if ($layout_option === 'standard') {
                echo '<div class="row justify-content-center mb-70">';
            }
        }

        echo apply_filters(
            'egns_filter_blog_template',
            Egns\Helper\Egns_Helper::egns_get_template_part('blog', 'templates/blog', '', $params)
        );

        if (class_exists('CSF')) {
            if ($layout_option === 'standard') {
                echo '</div>';
            }
        }
        ?>
    </div>
    <?php
    do_action('egns_page_after');
    ?>
</div>