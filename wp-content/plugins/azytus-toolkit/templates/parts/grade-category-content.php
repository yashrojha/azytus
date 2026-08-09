<?php
/**
 * Grade category content markup (used by single template + shortcode).
 *
 * Expects $category_id (int). Falls back to current post ID.
 */

if (!defined('ABSPATH')) {
    exit;
}

$category_id = !empty($category_id) ? (int) $category_id : get_the_ID();
if (!$category_id) {
    return;
}

$products_image_id = get_post_meta($category_id, '_azytus_products_image', true);
$grade_items = Azytus_Frontend::get_grades_for_category($category_id);
$banner_image = get_the_post_thumbnail_url($category_id, 'large');
$title = get_the_title($category_id);
$content = get_post_field('post_content', $category_id);
$columns = 1;
?>

<article id="post-<?php echo esc_attr($category_id); ?>" <?php post_class('azytus-grade-category-page', $category_id); ?>>

    <header class="azytus-gc-header">
        <div class="azytus-gc-logo">
            <?php if (has_custom_logo()) : ?>
                <?php the_custom_logo(); ?>
            <?php else : ?>
                <strong class="azytus-gc-logo-fallback">azytus Material Sciences</strong>
            <?php endif; ?>
        </div>

        <div class="azytus-gc-banner">
            <div class="azytus-gc-banner-image">
                <?php if ($banner_image) : ?>
                    <img src="<?php echo esc_url($banner_image); ?>" alt="<?php echo esc_attr($title); ?>" />
                <?php endif; ?>
            </div>
            <div class="azytus-gc-banner-title">
                <h1><?php echo esc_html($title); ?></h1>
            </div>
        </div>
    </header>

    <div class="azytus-gc-content">
        <div class="azytus-gc-features">
            <span class="azytus-gc-eyebrow"><?php esc_html_e('Overview', 'azytus-toolkit'); ?></span>
            <h2><?php esc_html_e('Product Features', 'azytus-toolkit'); ?></h2>
            <div class="entry-content">
                <?php if (!empty($content)) : ?>
                    <?php echo apply_filters('the_content', $content); ?>
                <?php else : ?>
                    <p><?php esc_html_e('No description available.', 'azytus-toolkit'); ?></p>
                <?php endif; ?>
            </div>
        </div>

        <?php if ($products_image_id) : ?>
            <?php echo Azytus_Frontend::grade_products_image_shortcode(array('id' => $category_id)); ?>
        <?php endif; ?>
    </div>

    <?php
    include AZYTUS_TOOLKIT_PLUGIN_DIR . 'templates/parts/grade-table.php';
    ?>

</article>
