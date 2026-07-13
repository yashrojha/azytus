<?php
/**
 * Single Batch Record Template
 */

get_header();

while (have_posts()) : the_post();
    
    $category_id = get_post_meta(get_the_ID(), '_azytus_category_id', true);
    $subcategory_id = get_post_meta(get_the_ID(), '_azytus_subcategory_id', true);
    $variation_id = get_post_meta(get_the_ID(), '_azytus_variation_id', true);
    $batch_no = get_post_meta(get_the_ID(), '_azytus_batch_no', true);
    $coa_id = get_post_meta(get_the_ID(), '_azytus_coa', true);
    
    $category = get_post($category_id);
    $subcategory = get_post($subcategory_id);
    $variation = get_post($variation_id);
    
    ?>
    <article id="post-<?php the_ID(); ?>" <?php post_class('azytus-single-batch'); ?>>
        
        <header class="entry-header">
            <h1 class="entry-title"><?php the_title(); ?></h1>
        </header>
        
        <div class="entry-content">
            
            <div class="azytus-batch-info">
                <h2><?php _e('Batch Information', 'azytus-toolkit'); ?></h2>
                <table class="azytus-info-table">
                    <tr>
                        <th><?php _e('Batch Number:', 'azytus-toolkit'); ?></th>
                        <td><strong><?php echo esc_html($batch_no); ?></strong></td>
                    </tr>
                    <?php if ($category): ?>
                    <tr>
                        <th><?php _e('Chemical Product:', 'azytus-toolkit'); ?></th>
                        <td>
                            <a href="<?php echo get_permalink($category->ID); ?>">
                                <?php echo esc_html($category->post_title); ?>
                            </a>
                        </td>
                    </tr>
                    <?php endif; ?>
                    <?php if ($subcategory): ?>
                    <tr>
                        <th><?php _e('Grade:', 'azytus-toolkit'); ?></th>
                        <td>
                            <a href="<?php echo get_permalink($subcategory->ID); ?>">
                                <?php echo esc_html($subcategory->post_title); ?>
                            </a>
                        </td>
                    </tr>
                    <?php endif; ?>
                    <?php if ($variation): ?>
                    <tr>
                        <th><?php _e('Pack Size:', 'azytus-toolkit'); ?></th>
                        <td>
                            <a href="<?php echo get_permalink($variation->ID); ?>">
                                <?php echo esc_html($variation->post_title); ?>
                            </a>
                        </td>
                    </tr>
                    <?php endif; ?>
                    <?php if ($coa_id): ?>
                    <tr>
                        <th><?php _e('COA:', 'azytus-toolkit'); ?></th>
                        <td>
                            <a href="<?php echo esc_url(wp_get_attachment_url($coa_id)); ?>" target="_blank" class="azytus-download-btn azytus-coa-btn">
                                <?php _e('Download Certificate of Analysis', 'azytus-toolkit'); ?>
                            </a>
                        </td>
                    </tr>
                    <?php endif; ?>
                </table>
            </div>
            
            <?php if (get_the_content()): ?>
            <div class="azytus-batch-description">
                <h2><?php _e('Additional Information', 'azytus-toolkit'); ?></h2>
                <?php the_content(); ?>
            </div>
            <?php endif; ?>
            
        </div>
        
    </article>
    <?php
    
endwhile;

get_footer();
