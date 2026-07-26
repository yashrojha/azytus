<?php
/**
 * Grade category products table markup.
 *
 * Expects: $category_id (int), $grade_items (array), $columns (1|2).
 */

if (!defined('ABSPATH')) {
    exit;
}

$category_id = !empty($category_id) ? (int) $category_id : 0;
$grade_items = isset($grade_items) && is_array($grade_items) ? $grade_items : array();
$columns = isset($columns) ? max(1, min(2, (int) $columns)) : 2;

if (!$category_id) {
    return;
}

if (empty($grade_items)) {
    ?>
    <div class="azytus-gc-no-products">
        <?php esc_html_e('No products are currently assigned to this grade category.', 'azytus-toolkit'); ?>
    </div>
    <?php
    return;
}

$chunks = ($columns === 1)
    ? array($grade_items)
    : array_chunk($grade_items, (int) ceil(count($grade_items) / 2));
?>

<div class="azytus-gc-tables azytus-gc-tables--cols-<?php echo esc_attr((string) $columns); ?>">
    <?php foreach ($chunks as $chunk) : ?>
        <?php if (empty($chunk)) : ?>
            <?php continue; ?>
        <?php endif; ?>
        <div class="azytus-gc-table-wrap">
            <table class="azytus-gc-table">
                <thead>
                    <tr>
                        <th><?php esc_html_e('Product Code', 'azytus-toolkit'); ?></th>
                        <th><?php esc_html_e('Product Name', 'azytus-toolkit'); ?></th>
                        <th><?php esc_html_e('Pack Sizes', 'azytus-toolkit'); ?></th>
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
