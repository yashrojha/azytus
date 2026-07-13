<?php
/**
 * Single Chemical Category Template
 */

get_header();

while (have_posts()) : the_post();
    
    $cas = get_post_meta(get_the_ID(), '_azytus_cas', true);
    $hsn = get_post_meta(get_the_ID(), '_azytus_hsn', true);
    $molecular_formula = get_post_meta(get_the_ID(), '_azytus_molecular_formula', true);
    $molecular_weight = get_post_meta(get_the_ID(), '_azytus_molecular_weight', true);
    $msds_id = get_post_meta(get_the_ID(), '_azytus_msds', true);
    
    ?>
    <article id="post-<?php the_ID(); ?>" <?php post_class('azytus-single-category'); ?>>
        
        <header class="entry-header">
            <h1 class="entry-title"><?php the_title(); ?></h1>
        </header>
        
        <div class="entry-content">
            
            <div class="azytus-product-info">
                <h2><?php _e('Product Information', 'azytus-toolkit'); ?></h2>
                <table class="azytus-info-table">
                    <tr>
                        <th><?php _e('CAS Number:', 'azytus-toolkit'); ?></th>
                        <td><?php echo esc_html($cas); ?></td>
                    </tr>
                    <tr>
                        <th><?php _e('HSN Code:', 'azytus-toolkit'); ?></th>
                        <td><?php echo esc_html($hsn); ?></td>
                    </tr>
                    <tr>
                        <th><?php _e('Molecular Formula:', 'azytus-toolkit'); ?></th>
                        <td><?php echo esc_html($molecular_formula); ?></td>
                    </tr>
                    <tr>
                        <th><?php _e('Molecular Weight:', 'azytus-toolkit'); ?></th>
                        <td><?php echo esc_html($molecular_weight . ' g/mol'); ?></td>
                    </tr>
                    <?php if ($msds_id): ?>
                    <tr>
                        <th><?php _e('MSDS:', 'azytus-toolkit'); ?></th>
                        <td>
                            <a href="<?php echo esc_url(wp_get_attachment_url($msds_id)); ?>" target="_blank" class="azytus-download-btn">
                                <?php _e('Download Material Safety Data Sheet', 'azytus-toolkit'); ?>
                            </a>
                        </td>
                    </tr>
                    <?php endif; ?>
                </table>
            </div>
            
            <?php if (get_the_content()): ?>
            <div class="azytus-product-description">
                <h2><?php _e('Description', 'azytus-toolkit'); ?></h2>
                <?php the_content(); ?>
            </div>
            <?php endif; ?>
            
            <?php
            // Display available grades
            $grades = get_posts(array(
                'post_type' => 'azytus_subcategory',
                'posts_per_page' => -1,
                'meta_query' => array(
                    array(
                        'key' => '_azytus_category_id',
                        'value' => get_the_ID(),
                        'compare' => '='
                    )
                )
            ));
            
            if ($grades):
            ?>
            <div class="azytus-available-grades">
                <h2><?php _e('Available Grades', 'azytus-toolkit'); ?></h2>
                <ul class="azytus-grades-list">
                    <?php foreach ($grades as $grade): ?>
                        <li>
                            <a href="<?php echo get_permalink($grade->ID); ?>">
                                <?php echo esc_html($grade->post_title); ?>
                            </a>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
            <?php endif; ?>
            
        </div>
        
    </article>
    <?php
    
endwhile;

get_footer();
