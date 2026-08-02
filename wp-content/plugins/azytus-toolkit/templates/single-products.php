<?php
/**
 * Template for displaying single product
 *
 * Matrik breadcrumb is forced after header via Azytus_Frontend::render_products_breadcrumb()
 * so it also shows when Elementor Theme Builder owns the page.
 */

get_header();

while (have_posts()) :
    the_post();

    $product_id = get_the_ID();

    $cas = get_post_meta($product_id, '_azytus_cas', true);
    $hsn = get_post_meta($product_id, '_azytus_hsn', true);
    $molecular_formula = get_post_meta($product_id, '_azytus_molecular_formula', true);
    $molecular_weight = get_post_meta($product_id, '_azytus_molecular_weight', true);
    $msds_id = get_post_meta($product_id, '_azytus_msds', true);

    $pictograms = Azytus_Taxonomy_Pictogram::get_product_pictograms($product_id);
    $signal_words = get_post_meta($product_id, '_azytus_signal_words', true);
    $un_number = get_post_meta($product_id, '_azytus_un_number', true);
    $transport_info = get_post_meta($product_id, '_azytus_transport_info', true);
    $transport_hazard_class = get_post_meta($product_id, '_azytus_transport_hazard_class', true);
    $packing_group = get_post_meta($product_id, '_azytus_packing_group', true);
    $product_specification = get_post_meta($product_id, '_azytus_product_specification', true);

    $grades = get_post_meta($product_id, '_azytus_grades', true);
    if (!is_array($grades)) {
        $grades = array();
    }

    $grades = array_values(array_filter($grades, function ($grade) {
        return !empty($grade['grade_name']) || !empty($grade['product_code']);
    }));

    $grade_count = count($grades);
    $msds_url = $msds_id ? wp_get_attachment_url($msds_id) : '';

    $mw_display = trim((string) $molecular_weight);
    if ($mw_display !== '' && !preg_match('/g\s*\/\s*mol/i', $mw_display)) {
        $mw_display .= ' g/mol';
    }

    $has_safety_data = !empty($pictograms) || !empty($signal_words) || !empty($un_number)
        || !empty($transport_info) || !empty($transport_hazard_class) || !empty($packing_group);

    $contact_page = get_page_by_path('contact-us');
    if (!$contact_page) {
        $contact_page = get_page_by_path('contact');
    }
    $contact_url = $contact_page ? get_permalink($contact_page) : home_url('/contact-us/');

    $pack_total = 0;
    foreach ($grades as $grade) {
        if (!empty($grade['pack_sizes']) && is_array($grade['pack_sizes'])) {
            foreach ($grade['pack_sizes'] as $pack) {
                if (!empty($pack['pack_size'])) {
                    $pack_total++;
                }
            }
        }
    }
    ?>

    <div class="azytus-pp" id="scroll-section">
        <div class="container">

            <div class="azytus-pp-identity">
                <div class="azytus-pp-identity__meta">
                    <?php if ($molecular_formula) : ?>
                        <span class="azytus-pp-chip azytus-pp-chip--formula" title="<?php esc_attr_e('Molecular Formula', 'azytus-toolkit'); ?>">
                            <span class="azytus-pp-chip__label"><?php esc_html_e('Formula', 'azytus-toolkit'); ?></span>
                            <span class="azytus-pp-chip__value"><?php echo esc_html($molecular_formula); ?></span>
                        </span>
                    <?php endif; ?>

                    <?php if ($cas) : ?>
                        <span class="azytus-pp-chip azytus-pp-chip--cas" title="<?php esc_attr_e('CAS Registry Number', 'azytus-toolkit'); ?>">
                            <span class="azytus-pp-chip__label"><?php esc_html_e('CAS', 'azytus-toolkit'); ?></span>
                            <span class="azytus-pp-chip__value"><?php echo esc_html($cas); ?></span>
                        </span>
                    <?php endif; ?>

                    <?php if ($grade_count > 0) : ?>
                        <span class="azytus-pp-chip azytus-pp-chip--count">
                            <span class="azytus-pp-chip__value"><?php echo esc_html((string) $grade_count); ?></span>
                            <span class="azytus-pp-chip__label"><?php echo esc_html(_n('Grade', 'Grades', $grade_count, 'azytus-toolkit')); ?></span>
                        </span>
                    <?php endif; ?>

                    <?php if ($pack_total > 0) : ?>
                        <span class="azytus-pp-chip azytus-pp-chip--count">
                            <span class="azytus-pp-chip__value"><?php echo esc_html((string) $pack_total); ?></span>
                            <span class="azytus-pp-chip__label"><?php esc_html_e('Pack Sizes', 'azytus-toolkit'); ?></span>
                        </span>
                    <?php endif; ?>
                </div>

                <div class="azytus-pp-identity__actions">
                    <?php if ($msds_url) : ?>
                        <a href="<?php echo esc_url($msds_url); ?>" class="azytus-pp-btn azytus-pp-btn--primary" target="_blank" rel="noopener noreferrer">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" aria-hidden="true" focusable="false"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8l-6-6zm4 18H6V4h7v5h5v11zM8 13h8v2H8v-2zm0 4h8v2H8v-2z"/></svg>
                            <?php esc_html_e('Download MSDS', 'azytus-toolkit'); ?>
                        </a>
                    <?php endif; ?>
                    <a href="<?php echo esc_url($contact_url); ?>" class="azytus-pp-btn azytus-pp-btn--ghost">
                        <?php esc_html_e('Request Quote', 'azytus-toolkit'); ?>
                    </a>
                </div>
            </div>

            <div class="azytus-pp-layout<?php echo has_post_thumbnail() ? ' azytus-pp-layout--with-media' : ''; ?>">
                <div class="azytus-pp-main">

                    <section class="azytus-pp-section azytus-pp-specs" aria-labelledby="azytus-pp-specs-title">
                        <div class="azytus-pp-section__head">
                            <span class="azytus-pp-eyebrow"><?php esc_html_e('Technical Data', 'azytus-toolkit'); ?></span>
                            <h2 id="azytus-pp-specs-title"><?php esc_html_e('Basic Information', 'azytus-toolkit'); ?></h2>
                        </div>

                        <dl class="azytus-pp-spec-grid">
                            <div class="azytus-pp-spec">
                                <dt><?php esc_html_e('CAS Number', 'azytus-toolkit'); ?></dt>
                                <dd><?php echo $cas ? esc_html($cas) : '&mdash;'; ?></dd>
                            </div>
                            <div class="azytus-pp-spec">
                                <dt><?php esc_html_e('HSN Code', 'azytus-toolkit'); ?></dt>
                                <dd><?php echo $hsn ? esc_html($hsn) : '&mdash;'; ?></dd>
                            </div>
                            <div class="azytus-pp-spec">
                                <dt><?php esc_html_e('Molecular Formula', 'azytus-toolkit'); ?></dt>
                                <dd class="azytus-pp-spec__mono"><?php echo $molecular_formula ? esc_html($molecular_formula) : '&mdash;'; ?></dd>
                            </div>
                            <div class="azytus-pp-spec">
                                <dt><?php esc_html_e('Molecular Weight', 'azytus-toolkit'); ?></dt>
                                <dd><?php echo $mw_display !== '' ? esc_html($mw_display) : '&mdash;'; ?></dd>
                            </div>
                        </dl>
                    </section>

                    <?php if (get_the_content()) : ?>
                        <section class="azytus-pp-section" aria-labelledby="azytus-pp-desc-title">
                            <div class="azytus-pp-section__head">
                                <span class="azytus-pp-eyebrow"><?php esc_html_e('Overview', 'azytus-toolkit'); ?></span>
                                <h2 id="azytus-pp-desc-title"><?php esc_html_e('Product Description', 'azytus-toolkit'); ?></h2>
                            </div>
                            <div class="azytus-pp-prose entry-content">
                                <?php the_content(); ?>
                            </div>
                        </section>
                    <?php endif; ?>

                    <?php if (!empty($product_specification)) : ?>
                        <section class="azytus-pp-section" aria-labelledby="azytus-pp-specsheet-title">
                            <div class="azytus-pp-section__head">
                                <span class="azytus-pp-eyebrow"><?php esc_html_e('Quality', 'azytus-toolkit'); ?></span>
                                <h2 id="azytus-pp-specsheet-title"><?php esc_html_e('Product Specification', 'azytus-toolkit'); ?></h2>
                            </div>
                            <div class="azytus-pp-prose azytus-pp-prose--spec">
                                <?php echo wp_kses_post(wpautop($product_specification)); ?>
                            </div>
                        </section>
                    <?php endif; ?>

                    <?php if ($has_safety_data) : ?>
                        <section class="azytus-pp-section azytus-pp-safety" aria-labelledby="azytus-pp-safety-title">
                            <div class="azytus-pp-section__head">
                                <span class="azytus-pp-eyebrow"><?php esc_html_e('Compliance', 'azytus-toolkit'); ?></span>
                                <h2 id="azytus-pp-safety-title"><?php esc_html_e('Safety & Transport', 'azytus-toolkit'); ?></h2>
                            </div>

                            <dl class="azytus-pp-spec-grid azytus-pp-spec-grid--safety">
                                <?php if (!empty($signal_words)) : ?>
                                    <div class="azytus-pp-spec">
                                        <dt><?php esc_html_e('Signal Word', 'azytus-toolkit'); ?></dt>
                                        <dd>
                                            <span class="azytus-pp-signal azytus-pp-signal--<?php echo esc_attr(strtolower($signal_words)); ?>">
                                                <?php echo esc_html($signal_words); ?>
                                            </span>
                                        </dd>
                                    </div>
                                <?php endif; ?>

                                <?php if (!empty($pictograms)) : ?>
                                    <div class="azytus-pp-spec azytus-pp-spec--wide azytus-pp-spec--pictograms">
                                        <dt><?php esc_html_e('Pictograms', 'azytus-toolkit'); ?></dt>
                                        <dd>
                                            <ul class="azytus-pp-pictograms">
                                                <?php foreach ($pictograms as $pictogram) : ?>
                                                    <li class="azytus-pp-pictogram">
                                                        <?php echo $pictogram['image_html']; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
                                                        <span class="azytus-pp-pictogram__name"><?php echo esc_html($pictogram['name']); ?></span>
                                                    </li>
                                                <?php endforeach; ?>
                                            </ul>
                                        </dd>
                                    </div>
                                <?php endif; ?>

                                <?php if (!empty($un_number)) : ?>
                                    <div class="azytus-pp-spec">
                                        <dt><?php esc_html_e('UN Number', 'azytus-toolkit'); ?></dt>
                                        <dd><?php echo esc_html($un_number); ?></dd>
                                    </div>
                                <?php endif; ?>

                                <?php if (!empty($transport_hazard_class)) : ?>
                                    <div class="azytus-pp-spec">
                                        <dt><?php esc_html_e('Hazard Class', 'azytus-toolkit'); ?></dt>
                                        <dd><?php echo esc_html($transport_hazard_class); ?></dd>
                                    </div>
                                <?php endif; ?>

                                <?php if (!empty($packing_group)) : ?>
                                    <div class="azytus-pp-spec">
                                        <dt><?php esc_html_e('Packing Group', 'azytus-toolkit'); ?></dt>
                                        <dd><?php echo esc_html($packing_group); ?></dd>
                                    </div>
                                <?php endif; ?>

                                <?php if (!empty($transport_info)) : ?>
                                    <div class="azytus-pp-spec azytus-pp-spec--wide">
                                        <dt><?php esc_html_e('Transport Information', 'azytus-toolkit'); ?></dt>
                                        <dd><?php echo nl2br(esc_html($transport_info)); ?></dd>
                                    </div>
                                <?php endif; ?>
                            </dl>
                        </section>
                    <?php endif; ?>
                </div>

                <?php if (has_post_thumbnail()) : ?>
                    <aside class="azytus-pp-media">
                        <div class="azytus-pp-media__frame">
                            <?php the_post_thumbnail('large', array('class' => 'azytus-pp-media__img')); ?>
                        </div>
                    </aside>
                <?php endif; ?>
            </div>

            <div class="azytus-pp-grades" id="azytus-pp-grades">
                <div class="azytus-pp-grades__intro">
                    <span class="azytus-pp-eyebrow"><?php esc_html_e('Catalog', 'azytus-toolkit'); ?></span>
                    <h2 id="azytus-pp-grades-title"><?php esc_html_e('Available Grades & Pack Sizes', 'azytus-toolkit'); ?></h2>
                    <p class="azytus-pp-section__lead">
                        <?php esc_html_e('Select the purity grade and pack size that match your analytical or process requirement.', 'azytus-toolkit'); ?>
                    </p>
                </div>

                <?php if (!empty($grades)) : ?>
                    <div class="azytus-pp-grade-tabs" data-azytus-grade-tabs>
                        <div class="azytus-pp-grade-tabs__nav" role="tablist" aria-label="<?php esc_attr_e('Product grades', 'azytus-toolkit'); ?>">
                            <?php foreach ($grades as $index => $grade) :
                                $grade_name = isset($grade['grade_name']) ? $grade['grade_name'] : '';
                                $product_code = isset($grade['product_code']) ? $grade['product_code'] : '';
                                $grade_slug = $grade_name !== '' ? sanitize_title($grade_name) : 'grade-' . $index;
                                $tab_id = 'azytus-grade-tab-' . $index;
                                $panel_id = 'azytus-grade-panel-' . $index;
                                $is_active = $index === 0;
                                ?>
                                <button
                                    type="button"
                                    class="azytus-pp-grade-tabs__tab<?php echo $is_active ? ' is-active' : ''; ?>"
                                    id="<?php echo esc_attr($tab_id); ?>"
                                    role="tab"
                                    aria-selected="<?php echo $is_active ? 'true' : 'false'; ?>"
                                    aria-controls="<?php echo esc_attr($panel_id); ?>"
                                    tabindex="<?php echo $is_active ? '0' : '-1'; ?>"
                                    data-azytus-grade-tab
                                    data-grade-slug="<?php echo esc_attr($grade_slug); ?>"
                                    data-grade-code="<?php echo esc_attr($product_code); ?>"
                                    data-grade-name="<?php echo esc_attr($grade_name); ?>"
                                >
                                    <?php echo esc_html($grade_name ? $grade_name : sprintf(__('Grade %d', 'azytus-toolkit'), $index + 1)); ?>
                                </button>
                            <?php endforeach; ?>
                        </div>

                        <div class="azytus-pp-section azytus-pp-grades__content">
                            <div class="azytus-pp-grade-tabs__panels">
                                <?php foreach ($grades as $index => $grade) :
                                    $grade_name = isset($grade['grade_name']) ? $grade['grade_name'] : '';
                                    $product_code = isset($grade['product_code']) ? $grade['product_code'] : '';
                                    $grade_spec = isset($grade['product_specification']) ? $grade['product_specification'] : '';
                                    $grade_slug = $grade_name !== '' ? sanitize_title($grade_name) : 'grade-' . $index;
                                    $grade_category_id = !empty($grade['grade_category_id']) ? (int) $grade['grade_category_id'] : 0;
                                    $grade_category_url = ($grade_category_id && get_post_status($grade_category_id) === 'publish')
                                        ? get_permalink($grade_category_id)
                                        : '';
                                    $pack_sizes = (!empty($grade['pack_sizes']) && is_array($grade['pack_sizes'])) ? $grade['pack_sizes'] : array();
                                    $pack_sizes = array_values(array_filter($pack_sizes, function ($pack) {
                                        return !empty($pack['pack_size']);
                                    }));
                                    $tab_id = 'azytus-grade-tab-' . $index;
                                    $panel_id = 'azytus-grade-panel-' . $index;
                                    $is_active = $index === 0;
                                    ?>
                                    <div
                                        class="azytus-pp-grade-tabs__panel<?php echo $is_active ? ' is-active' : ''; ?>"
                                        id="<?php echo esc_attr($panel_id); ?>"
                                        role="tabpanel"
                                        aria-labelledby="<?php echo esc_attr($tab_id); ?>"
                                        <?php echo $is_active ? '' : 'hidden'; ?>
                                        data-azytus-grade-panel
                                        data-grade-slug="<?php echo esc_attr($grade_slug); ?>"
                                        data-grade-code="<?php echo esc_attr($product_code); ?>"
                                    >
                                        <article class="azytus-pp-grade azytus-pp-grade--tab">
                                            <header class="azytus-pp-grade__head">
                                                <div class="azytus-pp-grade__titles">
                                                    <h3 class="azytus-pp-grade__name">
                                                        <?php if ($grade_category_url) : ?>
                                                            <a href="<?php echo esc_url($grade_category_url); ?>"><?php echo esc_html($grade_name); ?></a>
                                                        <?php else : ?>
                                                            <?php echo esc_html($grade_name); ?>
                                                        <?php endif; ?>
                                                    </h3>
                                                    <?php if ($product_code) : ?>
                                                        <p class="azytus-pp-grade__code">
                                                            <span><?php esc_html_e('Product Code', 'azytus-toolkit'); ?></span>
                                                            <strong><?php echo esc_html($product_code); ?></strong>
                                                        </p>
                                                    <?php endif; ?>
                                                </div>
                                                <span class="azytus-pp-grade__index" aria-hidden="true"><?php echo esc_html(str_pad((string) ($index + 1), 2, '0', STR_PAD_LEFT)); ?></span>
                                            </header>

                                            <?php if (!empty($pack_sizes)) : ?>
                                                <div class="azytus-pp-grade__packs">
                                                    <span class="azytus-pp-grade__packs-label"><?php esc_html_e('Available Pack Sizes', 'azytus-toolkit'); ?></span>
                                                    <ul class="azytus-pp-packs">
                                                        <?php foreach ($pack_sizes as $pack) : ?>
                                                            <li><?php echo esc_html($pack['pack_size']); ?></li>
                                                        <?php endforeach; ?>
                                                    </ul>
                                                </div>
                                            <?php else : ?>
                                                <p class="azytus-pp-grade__empty"><?php esc_html_e('Pack sizes on request.', 'azytus-toolkit'); ?></p>
                                            <?php endif; ?>

                                            <?php if (!empty($grade_spec)) : ?>
                                                <div class="azytus-pp-grade__spec">
                                                    <span class="azytus-pp-grade__packs-label"><?php esc_html_e('Product Specification', 'azytus-toolkit'); ?></span>
                                                    <div class="azytus-pp-prose azytus-pp-prose--spec">
                                                        <?php echo wp_kses_post(wpautop($grade_spec)); ?>
                                                    </div>
                                                </div>
                                            <?php endif; ?>
                                        </article>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                <?php else : ?>
                    <div class="azytus-pp-section azytus-pp-grades__content">
                        <div class="azytus-pp-empty">
                            <?php esc_html_e('No grades have been added for this product yet.', 'azytus-toolkit'); ?>
                        </div>
                    </div>
                <?php endif; ?>
            </div>

        </div>
    </div>

<?php
endwhile;

if (class_exists('\Egns\Helper\Egns_Helper')) {
    \Egns\Helper\Egns_Helper::egns_template_part('common', 'templates/footer-top');
}

get_footer();
