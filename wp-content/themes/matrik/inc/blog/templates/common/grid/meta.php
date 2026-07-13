<div class="blog-meta">
    <ul>
        <li><a class="blog-date" href="<?php echo esc_url(home_url(get_the_date('Y/m/d'))) ?>"><?php echo get_the_date('d F, Y'); ?></a></li>
        <?php
        $categories = get_the_category();
        if (!empty($categories)) :
            $category = $categories[0]; ?>
            <li>
                <a href="<?php echo esc_url(get_category_link($category->cat_ID)); ?>">
                    <?php echo esc_html($category->cat_name); ?>
                </a>
            </li>
        <?php endif; ?>

    </ul>
</div>