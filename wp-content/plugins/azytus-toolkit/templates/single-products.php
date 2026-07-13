<?php
/**
 * Template for displaying single product
 */

get_header(); ?>

<style>
.azytus-product-page {
    max-width: 1200px;
    margin: 40px auto;
    padding: 0 20px;
}

.azytus-product-header {
    background: linear-gradient(135deg, #5C9541 0%, #14749B 100%);
    color: white;
    padding: 40px;
    border-radius: 10px;
    margin-bottom: 30px;
}

.azytus-product-title {
    font-size: 2.5em;
    margin: 0 0 10px 0;
    font-weight: 700;
}

.azytus-product-subtitle {
    font-size: 1.2em;
    opacity: 0.9;
    margin: 0;
}

.azytus-product-content {
    display: grid;
    grid-template-columns: 1fr;
    gap: 30px;
}

.azytus-info-section {
    background: white;
    border: 1px solid #e0e0e0;
    border-radius: 8px;
    padding: 30px;
    box-shadow: 0 2px 4px rgba(0,0,0,0.05);
}

.azytus-section-title {
    font-size: 1.5em;
    margin: 0 0 20px 0;
    padding-bottom: 15px;
    border-bottom: 3px solid #5C9541;
    color: #333;
}

.azytus-info-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
    gap: 20px;
}

.azytus-info-item {
    padding: 15px;
    background: #f9f9f9;
    border-radius: 6px;
    border-left: 4px solid #5C9541;
}

.azytus-info-label {
    font-weight: 600;
    color: #555;
    font-size: 0.9em;
    text-transform: uppercase;
    margin-bottom: 5px;
}

.azytus-info-value {
    font-size: 1.1em;
    color: #222;
    word-break: break-word;
}

.azytus-grade-card {
    background: #f5f7fa;
    border: 2px solid #e1e8ed;
    border-radius: 8px;
    padding: 25px;
    margin-bottom: 20px;
}

.azytus-grade-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 20px;
    padding-bottom: 15px;
    border-bottom: 2px solid #ddd;
}

.azytus-grade-name {
    font-size: 1.3em;
    font-weight: 700;
    color: #5C9541;
    margin: 0;
}

.azytus-product-code {
    background: #14749B;
    color: white;
    padding: 5px 15px;
    border-radius: 20px;
    font-weight: 600;
    font-size: 0.9em;
}

.azytus-pack-sizes {
    display: flex;
    flex-wrap: wrap;
    gap: 10px;
    margin-top: 15px;
}

.azytus-pack-size-badge {
    background: white;
    border: 2px solid #14749B;
    color: #14749B;
    padding: 8px 16px;
    border-radius: 6px;
    font-weight: 600;
    font-size: 0.95em;
}

.azytus-download-button {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    background: #5C9541;
    color: white;
    padding: 12px 24px;
    border-radius: 6px;
    text-decoration: none;
    font-weight: 600;
    transition: all 0.3s ease;
}

.azytus-download-button:hover {
    background: #4a7a34;
    color: white;
    transform: translateY(-2px);
    box-shadow: 0 4px 12px rgba(92, 149, 65, 0.4);
}

.azytus-download-button svg {
    width: 20px;
    height: 20px;
    fill: currentColor;
}

.azytus-description {
    line-height: 1.8;
    color: #555;
    font-size: 1.05em;
}

.azytus-no-data {
    color: #999;
    font-style: italic;
    padding: 20px;
    text-align: center;
    background: #f9f9f9;
    border-radius: 6px;
}

@media (max-width: 768px) {
    .azytus-product-header {
        padding: 30px 20px;
    }
    
    .azytus-product-title {
        font-size: 1.8em;
    }
    
    .azytus-info-grid {
        grid-template-columns: 1fr;
    }
    
    .azytus-grade-header {
        flex-direction: column;
        align-items: flex-start;
        gap: 10px;
    }
}
</style>

<div class="azytus-product-page">
    <?php while (have_posts()) : the_post(); 
        // Get product meta
        $cas = get_post_meta(get_the_ID(), '_azytus_cas', true);
        $hsn = get_post_meta(get_the_ID(), '_azytus_hsn', true);
        $molecular_formula = get_post_meta(get_the_ID(), '_azytus_molecular_formula', true);
        $molecular_weight = get_post_meta(get_the_ID(), '_azytus_molecular_weight', true);
        $msds_id = get_post_meta(get_the_ID(), '_azytus_msds', true);
        
        // Optional additional fields
        $pictograms_ghs = get_post_meta(get_the_ID(), '_azytus_pictograms_ghs', true);
        $signal_words = get_post_meta(get_the_ID(), '_azytus_signal_words', true);
        $un_number = get_post_meta(get_the_ID(), '_azytus_un_number', true);
        $transport_info = get_post_meta(get_the_ID(), '_azytus_transport_info', true);
        $transport_hazard_class = get_post_meta(get_the_ID(), '_azytus_transport_hazard_class', true);
        $packing_group = get_post_meta(get_the_ID(), '_azytus_packing_group', true);
        $product_specification = get_post_meta(get_the_ID(), '_azytus_product_specification', true);
        
        // Get grades
        $grades = get_post_meta(get_the_ID(), '_azytus_grades', true);
        if (!is_array($grades)) {
            $grades = array();
        }
    ?>
    
    <div class="azytus-product-header">
        <h1 class="azytus-product-title"><?php the_title(); ?></h1>
        <p class="azytus-product-subtitle"><?php echo esc_html($molecular_formula); ?> | CAS: <?php echo esc_html($cas); ?></p>
    </div>
    
    <?php if (has_post_thumbnail()): ?>
    <div class="azytus-info-section">
        <div style="text-align: center;">
            <?php the_post_thumbnail('large', array('style' => 'max-width: 100%; height: auto; border-radius: 8px;')); ?>
        </div>
    </div>
    <?php endif; ?>
    
    <?php if (get_the_content()): ?>
    <div class="azytus-info-section">
        <h2 class="azytus-section-title">Product Description</h2>
        <div class="azytus-description">
            <?php the_content(); ?>
        </div>
    </div>
    <?php endif; ?>
    
    <div class="azytus-info-section">
        <h2 class="azytus-section-title">Basic Information</h2>
        <div class="azytus-info-grid">
            <div class="azytus-info-item">
                <div class="azytus-info-label">CAS Number</div>
                <div class="azytus-info-value"><?php echo esc_html($cas); ?></div>
            </div>
            <div class="azytus-info-item">
                <div class="azytus-info-label">HSN Code</div>
                <div class="azytus-info-value"><?php echo esc_html($hsn); ?></div>
            </div>
            <div class="azytus-info-item">
                <div class="azytus-info-label">Molecular Formula</div>
                <div class="azytus-info-value"><?php echo esc_html($molecular_formula); ?></div>
            </div>
            <div class="azytus-info-item">
                <div class="azytus-info-label">Molecular Weight</div>
                <div class="azytus-info-value"><?php echo esc_html($molecular_weight); ?> g/mol</div>
            </div>
        </div>
        
        <?php if ($msds_id): ?>
        <div style="margin-top: 20px;">
            <a href="<?php echo esc_url(wp_get_attachment_url($msds_id)); ?>" class="azytus-download-button" target="_blank">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M14 2H6c-1.1 0-2 .9-2 2v16c0 1.1.9 2 2 2h12c1.1 0 2-.9 2-2V8l-6-6zM6 20V4h7v5h5v11H6z"/></svg>
                Download MSDS
            </a>
        </div>
        <?php endif; ?>
    </div>
    
    <?php 
    // Check if any safety/transport fields have values
    $has_safety_data = !empty($pictograms_ghs) || !empty($signal_words) || !empty($un_number) || 
                       !empty($transport_info) || !empty($transport_hazard_class) || !empty($packing_group);
    
    if ($has_safety_data): ?>
    <div class="azytus-info-section">
        <h2 class="azytus-section-title">Safety & Transport Information</h2>
        <div class="azytus-info-grid">
            <?php if (!empty($pictograms_ghs)): ?>
            <div class="azytus-info-item">
                <div class="azytus-info-label">Pictograms/GHS Symbols</div>
                <div class="azytus-info-value"><?php echo esc_html($pictograms_ghs); ?></div>
            </div>
            <?php endif; ?>
            
            <?php if (!empty($signal_words)): ?>
            <div class="azytus-info-item">
                <div class="azytus-info-label">Signal Words</div>
                <div class="azytus-info-value"><strong style="color: <?php echo $signal_words === 'Danger' ? '#dc3545' : '#ffc107'; ?>;"><?php echo esc_html($signal_words); ?></strong></div>
            </div>
            <?php endif; ?>
            
            <?php if (!empty($un_number)): ?>
            <div class="azytus-info-item">
                <div class="azytus-info-label">UN Number</div>
                <div class="azytus-info-value"><?php echo esc_html($un_number); ?></div>
            </div>
            <?php endif; ?>
            
            <?php if (!empty($transport_hazard_class)): ?>
            <div class="azytus-info-item">
                <div class="azytus-info-label">Transport Hazard Class</div>
                <div class="azytus-info-value"><?php echo esc_html($transport_hazard_class); ?></div>
            </div>
            <?php endif; ?>
            
            <?php if (!empty($packing_group)): ?>
            <div class="azytus-info-item">
                <div class="azytus-info-label">Packing Group</div>
                <div class="azytus-info-value"><?php echo esc_html($packing_group); ?></div>
            </div>
            <?php endif; ?>
            
            <?php if (!empty($transport_info)): ?>
            <div class="azytus-info-item" style="grid-column: 1 / -1;">
                <div class="azytus-info-label">Transport Information</div>
                <div class="azytus-info-value"><?php echo nl2br(esc_html($transport_info)); ?></div>
            </div>
            <?php endif; ?>
        </div>
    </div>
    <?php endif; ?>
    
    <?php if (!empty($product_specification)): ?>
    <div class="azytus-info-section">
        <h2 class="azytus-section-title">Product Specification</h2>
        <div class="azytus-description">
            <?php echo nl2br(esc_html($product_specification)); ?>
        </div>
    </div>
    <?php endif; ?>
    
    <?php if (!empty($grades)): ?>
    <div class="azytus-info-section">
        <h2 class="azytus-section-title">Available Grades & Pack Sizes</h2>
        
        <?php foreach ($grades as $grade): ?>
        <div class="azytus-grade-card">
            <div class="azytus-grade-header">
                <h3 class="azytus-grade-name"><?php echo esc_html($grade['grade_name']); ?></h3>
                <span class="azytus-product-code">Code: <?php echo esc_html($grade['product_code']); ?></span>
            </div>
            
            <?php if (!empty($grade['pack_sizes'])): ?>
            <div>
                <strong style="color: #555; font-size: 0.95em;">Available Pack Sizes:</strong>
                <div class="azytus-pack-sizes">
                    <?php foreach ($grade['pack_sizes'] as $pack_size): ?>
                    <span class="azytus-pack-size-badge"><?php echo esc_html($pack_size['pack_size']); ?></span>
                    <?php endforeach; ?>
                </div>
            </div>
            <?php endif; ?>
        </div>
        <?php endforeach; ?>
    </div>
    <?php else: ?>
    <div class="azytus-info-section">
        <h2 class="azytus-section-title">Available Grades & Pack Sizes</h2>
        <div class="azytus-no-data">No grades have been added for this product yet.</div>
    </div>
    <?php endif; ?>
    
    <?php endwhile; ?>
</div>

<?php get_footer(); ?>
