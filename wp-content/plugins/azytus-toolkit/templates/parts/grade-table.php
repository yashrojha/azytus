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

$product_count = count($grade_items);
$chunks = ($columns === 1)
    ? array($grade_items)
    : array_chunk($grade_items, (int) ceil($product_count / 2));
?>

<section class="azytus-gc-catalog" aria-labelledby="azytus-gc-catalog-title">
    <div class="azytus-gc-catalog__head">
        <span class="azytus-gc-eyebrow"><?php esc_html_e('Catalog', 'azytus-toolkit'); ?></span>
        <h2 id="azytus-gc-catalog-title"><?php esc_html_e('Products in this grade', 'azytus-toolkit'); ?></h2>
        <p class="azytus-gc-catalog__lead">
            <?php
            echo esc_html(
                sprintf(
                    /* translators: %d: number of products */
                    _n('%d product available in this category.', '%d products available in this category.', $product_count, 'azytus-toolkit'),
                    $product_count
                )
            );
            ?>
        </p>
    </div>

    <div class="azytus-gc-tables azytus-gc-tables--cols-<?php echo esc_attr((string) $columns); ?>">
        <?php foreach ($chunks as $chunk) : ?>
            <?php if (empty($chunk)) : ?>
                <?php continue; ?>
            <?php endif; ?>
            <div class="azytus-gc-table-wrap">
                <table class="azytus-gc-table">
                    <thead>
                        <tr>
                            <th scope="col" class="azytus-gc-table__code"><?php esc_html_e('Code', 'azytus-toolkit'); ?></th>
                            <th scope="col" class="azytus-gc-table__name"><?php esc_html_e('Product', 'azytus-toolkit'); ?></th>
                            <th scope="col" class="azytus-gc-table__packs"><?php esc_html_e('Pack Sizes', 'azytus-toolkit'); ?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($chunk as $item) : ?>
                            <?php
                            $pack_sizes = !empty($item['pack_sizes']) && is_array($item['pack_sizes'])
                                ? $item['pack_sizes']
                                : array_filter(array_map('trim', explode(',', (string) ($item['pack_sizes_display'] ?? ''))));
                            ?>
                            <tr>
                                <td class="azytus-gc-table__code" data-label="<?php esc_attr_e('Code', 'azytus-toolkit'); ?>">
                                    <?php if (!empty($item['product_code'])) : ?>
                                        <span class="azytus-gc-code"><?php echo esc_html($item['product_code']); ?></span>
                                    <?php else : ?>
                                        <span class="azytus-gc-code azytus-gc-code--empty">—</span>
                                    <?php endif; ?>
                                </td>
                                <td class="azytus-gc-table__name" data-label="<?php esc_attr_e('Product', 'azytus-toolkit'); ?>">
                                    <a href="<?php echo esc_url($item['product_url']); ?>">
                                        <?php echo esc_html($item['product_name']); ?>
                                    </a>
                                </td>
                                <td class="azytus-gc-table__packs" data-label="<?php esc_attr_e('Pack Sizes', 'azytus-toolkit'); ?>">
                                    <?php if (!empty($pack_sizes)) : ?>
                                        <ul class="azytus-gc-packs">
                                            <?php foreach ($pack_sizes as $pack_size) : ?>
                                                <?php if ($pack_size === '') : ?>
                                                    <?php continue; ?>
                                                <?php endif; ?>
                                                <li><?php echo esc_html($pack_size); ?></li>
                                            <?php endforeach; ?>
                                        </ul>
                                    <?php else : ?>
                                        <span class="azytus-gc-packs-empty">—</span>
                                    <?php endif; ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        <?php endforeach; ?>
    </div>
</section>
