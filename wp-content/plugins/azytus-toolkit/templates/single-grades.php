<?php
/**
 * Template for displaying single Grade Category (grades post type)
 */

get_header();

while (have_posts()) : the_post();

    $category_id = get_the_ID();
    $products_image_id = get_post_meta($category_id, '_azytus_products_image', true);
    $grade_items = Azytus_Frontend::get_grades_for_category($category_id);
    $half = (int) ceil(count($grade_items) / 2);
    $left_items = array_slice($grade_items, 0, $half);
    $right_items = array_slice($grade_items, $half);
    $banner_image = get_the_post_thumbnail_url($category_id, 'large');
    ?>

<style>
.azytus-grade-category-page {
    max-width: 1100px;
    margin: 0 auto;
    padding: 30px 20px 60px;
    font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Oxygen-Sans, Ubuntu, Cantarell, "Helvetica Neue", sans-serif;
    color: #333;
}

.azytus-gc-header {
    position: relative;
    margin-bottom: 40px;
}

.azytus-gc-logo {
    text-align: right;
    margin-bottom: 15px;
}

.azytus-gc-logo img {
    max-height: 50px;
    width: auto;
}

.azytus-gc-banner {
    display: flex;
    align-items: stretch;
    min-height: 220px;
    border-radius: 4px;
    overflow: hidden;
    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
}

.azytus-gc-banner-image {
    flex: 0 0 58%;
    position: relative;
    background: #e8eef0;
}

.azytus-gc-banner-image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    display: block;
}

.azytus-gc-banner-image::after {
    content: '';
    position: absolute;
    top: 0;
    right: -1px;
    width: 80px;
    height: 100%;
    background: linear-gradient(135deg, transparent 49%, #14749B 50%);
    z-index: 1;
}

.azytus-gc-banner-title {
    flex: 1;
    display: flex;
    align-items: center;
    justify-content: center;
    background: linear-gradient(135deg, #14749B 0%, #5C9541 100%);
    padding: 30px 40px;
    position: relative;
}

.azytus-gc-banner-title h1 {
    margin: 0;
    color: #fff;
    font-size: 2.4em;
    font-weight: 700;
    text-align: center;
    line-height: 1.2;
    text-shadow: 0 1px 2px rgba(0, 0, 0, 0.15);
}

.azytus-gc-content {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 40px;
    align-items: start;
    margin-bottom: 50px;
}

.azytus-gc-features h2 {
    font-size: 1.1em;
    font-weight: 700;
    color: #444;
    margin: 0 0 15px 0;
}

.azytus-gc-features .entry-content {
    font-size: 0.95em;
    line-height: 1.7;
    color: #555;
}

.azytus-gc-features .entry-content ul {
    margin: 0;
    padding-left: 20px;
}

.azytus-gc-features .entry-content li {
    margin-bottom: 8px;
}

.azytus-gc-products-image {
    text-align: center;
}

.azytus-gc-products-image img {
    max-width: 100%;
    height: auto;
    display: inline-block;
}

.azytus-gc-tables {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 0;
}

.azytus-gc-table-wrap {
    overflow: hidden;
}

.azytus-gc-table {
    width: 100%;
    border-collapse: collapse;
    font-size: 0.9em;
}

.azytus-gc-table thead th {
    background: linear-gradient(135deg, #14749B 0%, #5C9541 100%);
    color: #fff;
    font-weight: 600;
    padding: 12px 16px;
    text-align: left;
    border: none;
}

.azytus-gc-table tbody td {
    padding: 10px 16px;
    border-bottom: 1px solid #e8e8e8;
    color: #444;
}

.azytus-gc-table tbody tr:nth-child(even) {
    background: #f7f9fa;
}

.azytus-gc-table tbody tr:hover {
    background: #eef5f0;
}

.azytus-gc-table a {
    color: #14749B;
    text-decoration: none;
}

.azytus-gc-table a:hover {
    text-decoration: underline;
}

.azytus-gc-no-products {
    grid-column: 1 / -1;
    text-align: center;
    padding: 40px;
    background: #f9f9f9;
    border-radius: 8px;
    color: #777;
}

@media (max-width: 768px) {
    .azytus-gc-banner {
        flex-direction: column;
        min-height: auto;
    }

    .azytus-gc-banner-image {
        flex: none;
        height: 200px;
    }

    .azytus-gc-banner-image::after {
        display: none;
    }

    .azytus-gc-banner-title h1 {
        font-size: 1.8em;
    }

    .azytus-gc-content,
    .azytus-gc-tables {
        grid-template-columns: 1fr;
    }
}
</style>

<article id="post-<?php the_ID(); ?>" <?php post_class('azytus-grade-category-page'); ?>>

    <header class="azytus-gc-header">
        <div class="azytus-gc-logo">
            <?php if (has_custom_logo()) : ?>
                <?php the_custom_logo(); ?>
            <?php else : ?>
                <strong style="font-size: 1.2em; color: #14749B;">azytus Material Sciences</strong>
            <?php endif; ?>
        </div>

        <div class="azytus-gc-banner">
            <div class="azytus-gc-banner-image">
                <?php if ($banner_image) : ?>
                    <img src="<?php echo esc_url($banner_image); ?>" alt="<?php the_title_attribute(); ?>" />
                <?php endif; ?>
            </div>
            <div class="azytus-gc-banner-title">
                <h1><?php the_title(); ?></h1>
            </div>
        </div>
    </header>

    <div class="azytus-gc-content">
        <div class="azytus-gc-features">
            <h2><?php _e('Product Feature :', 'azytus-toolkit'); ?></h2>
            <div class="entry-content">
                <?php if (get_the_content()) : ?>
                    <?php the_content(); ?>
                <?php else : ?>
                    <p><?php _e('No description available.', 'azytus-toolkit'); ?></p>
                <?php endif; ?>
            </div>
        </div>

        <?php if ($products_image_id) : ?>
        <div class="azytus-gc-products-image">
            <?php echo wp_get_attachment_image($products_image_id, 'large'); ?>
        </div>
        <?php endif; ?>
    </div>

    <?php if (!empty($grade_items)) : ?>
    <div class="azytus-gc-tables">
        <?php
        $table_chunks = array($left_items, $right_items);
        foreach ($table_chunks as $chunk) :
            if (empty($chunk)) {
                continue;
            }
        ?>
        <div class="azytus-gc-table-wrap">
            <table class="azytus-gc-table">
                <thead>
                    <tr>
                        <th><?php _e('Product Code', 'azytus-toolkit'); ?></th>
                        <th><?php _e('Product Name', 'azytus-toolkit'); ?></th>
                        <th><?php _e('Pack Sizes', 'azytus-toolkit'); ?></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($chunk as $item) : ?>
                    <tr>
                        <td><?php echo esc_html($item['product_code']); ?></td>
                        <td>
                            <a href="<?php echo esc_url($item['product_url']); ?>">
                                <?php echo esc_html($item['product_name']); ?>
                            </a>
                        </td>
                        <td><?php echo esc_html($item['pack_sizes_display']); ?></td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <?php endforeach; ?>
    </div>
    <?php else : ?>
    <div class="azytus-gc-no-products">
        <?php _e('No products are currently assigned to this grade category.', 'azytus-toolkit'); ?>
    </div>
    <?php endif; ?>

</article>

    <?php
endwhile;

get_footer();
