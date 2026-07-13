<?php
/*-------------------------
**** WooCommerce Hooks ****
--------------------------*/

use Egns\Helper\Egns_Helper;

if (class_exists('WooCommerce')) {
    global $product;
    /**
     * 
     * WooCommerce before, after wrapper change
     * 
     * */
    function matrik_wrapper_start()
    {
        echo '<div class="shop-page-wrapper">
    <div class="container">';
    }

    function matrik_wrapper_end()
    {
        echo '</div>
	</div>';
    }
    add_action('woocommerce_before_main_content', 'matrik_wrapper_start', 10);
    add_action('woocommerce_after_main_content', 'matrik_wrapper_end', 10);


    /**
     * remove default woocommerce sidebar
     */
    remove_action('woocommerce_sidebar', 'woocommerce_get_sidebar', 10);

    /**
     * remove default breadcrumb product
     */
    remove_action('woocommerce_before_main_content', 'woocommerce_breadcrumb', 20);


    /**
     * remove default related_products
     */
    remove_action('woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20);

    /**
     * remove default single page notice
     */
    remove_action('woocommerce_before_single_product', 'woocommerce_output_all_notices', 10);


    /**
     * woocommerce product single review position change
     */
    remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_rating', 10);
    add_action('woocommerce_single_product_summary', 'woocommerce_template_single_rating', 8);

    /**
     * woocommerce product price swap the positions of <del> and <ins> tags
     */
    function custom_woocommerce_format_sale_price($price, $regular_price, $sale_price)
    {
        // Swap the positions of <del> and <ins> tags
        $price = '<ins>' . (is_numeric($sale_price) ? wc_price($sale_price) : $sale_price) . '</ins> <del>' . (is_numeric($regular_price) ? wc_price($regular_price) : $regular_price) . '</del>';
        return $price;
    }
    add_filter('woocommerce_format_sale_price', 'custom_woocommerce_format_sale_price', 10, 3);



    function custom_products_per_page($cols)
    {
        // Default number of products per page
        $default_products_per_page = 12;

        // Check if CSF class exists
        if (class_exists('CSF')) {
            $products_per_page = \Egns\Helper\Egns_Helper::egns_get_theme_option('product_per_page');

            if (is_numeric($products_per_page) && $products_per_page > 0) {
                return (int) $products_per_page;
            }
        }

        // Return the default value if any check fails
        return $default_products_per_page;
    }
    add_filter('loop_shop_per_page', 'custom_products_per_page', 20);


    // Remove rating text and show only stars on archive and single product pages
    function custom_woocommerce_rating_stars_only($rating_html, $rating, $count)
    {
        // Generate star rating HTML without the text
        if ($rating > 0) {
            $rating_html  = '<div class="star-rating" title="' . esc_attr(sprintf(__('Rated %s out of 5', 'matrik'), $rating)) . '">';
            $rating_html .= wc_get_star_rating_html($rating, $count, false);
            $rating_html .= '</div>';
        }
        return $rating_html;
    }
    add_filter('woocommerce_product_get_rating_html', 'custom_woocommerce_rating_stars_only', 10, 3);


    /**
     * woocommerce product single excerpt position change
     */
    remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 20);
    add_action('woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 9);



    // 1. Show plus minus buttons
    function matrik_display_quantity_plus()
    {
        echo '<button type="button" class="plus"><i class="bi bi-plus-lg"></i></button>';
    }
    add_action('woocommerce_after_quantity_input_field', 'matrik_display_quantity_plus');

    function matrik_display_quantity_minus()
    {
        echo '<button type="button" class="minus"><i class="bi bi-dash-lg"></i></button>';
    }
    add_action('woocommerce_before_quantity_input_field', 'matrik_display_quantity_minus');

    function matrik_set_default_quantity($args, $product)
    {
        $args['input_value'] = 1;  // Default quantity
        return $args;
    }
    add_filter('woocommerce_quantity_input_args', 'matrik_set_default_quantity', 5, 2);

    if (class_exists('WooCommerce', false)) {
        // 2. Trigger update quantity script
        function matrik_add_cart_quantity_plus_minus()
        {

            if (!is_product() && !is_cart()) return;
            wc_enqueue_js("
            $(document).on( 'click', 'button.plus, button.minus', function() {
            var qty  = $( this ).parent( '.quantity' ).find( '.qty' );
            var val  = parseFloat(qty.val()) || 1;
            var max  = parseFloat(qty.attr( 'max' ));
            var min  = parseFloat(qty.attr( 'min' ));
            var step = parseFloat(qty.attr( 'step' ));

            if ( $( this ).is( '.plus' ) ) {
            if ( max && ( max <= val ) ) {
            qty.val( max ).change();
            } else {
            qty.val( val + step ).change();
            }
            } else {
            if ( min && ( min >= val ) ) {
            qty.val( min ).change();
            } else if ( val > 1 ) {
            qty.val( val - step ).change();
            }
            }
            });
        ");
        }

        add_action('wp_footer', 'matrik_add_cart_quantity_plus_minus');
    }



    /**Product archive page edit -mna */
    add_action('template_redirect', 'egns_matrik_remove_woocommerce_hooks');

    function egns_matrik_remove_woocommerce_hooks()
    {
        // Check if WooCommerce is installed and activated
        if (class_exists('WooCommerce')) {
            if (is_shop() || is_product_category() || is_product_tag()) {
                // Remove product title and price
                remove_action('woocommerce_shop_loop_item_title', 'woocommerce_template_loop_product_title', 10);
                remove_action('woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_price', 10);

                // Remove add to cart button
                remove_action('woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10);
            }
        }
    }
    add_action('wp', 'egns_matrik_remove_woocommerce_hooks');

    // archive page product cart 
    function egns_matrik_shop_product_card()
    {
        global $product;

?>
        <div <?php wc_product_class('shop-card', $product); ?>>
            <div class="shop-card-wrap">
                <div class="shop-card-img">
                    <a href="<?php echo esc_url(get_permalink($product->get_id())); ?>">
                        <?php echo woocommerce_get_product_thumbnail('large'); ?>
                    </a>
                </div>
                <div class="shop-card-content">
                    <h6>
                        <a href="<?php echo esc_url(get_permalink($product->get_id())); ?>">
                            <?php echo esc_html($product->get_name()); ?>
                        </a>
                    </h6>
                    <?php if ($product->get_rating_count() > 0) : ?>
                        <div class="rating">
                            <?php echo wc_get_rating_html($product->get_average_rating(), $product->get_rating_count()); ?>
                            <span class="count">(<?php echo esc_html($product->get_rating_count()); ?>)</span>
                        </div>
                    <?php endif; ?>
                    <span><?php echo sprintf('%s', $product->get_price_html()); ?></span>
                </div>
            </div>


            <?php
            // Determine the product type
            $product_type = $product->get_type();


            $button_text  = __('Add to Cart', 'matrik');
            $button_class = 'add_to_cart_button';
            if ($product_type === 'grouped') {
                $button_text  = __('Select Options', 'matrik');
                $button_class = '';
            } elseif ($product_type === 'variable') {
                $button_text  = __('View Options', 'matrik');
                $button_class = '';
            } elseif ($product_type === 'external') {
                $button_text  = __('Buy Product', 'matrik');
                $button_class = '';
            }
            ?>
            <!-- Add or view cart -->
            <?php
            $product_id = $product->get_id();
            $in_cart    = WC()->cart->find_product_in_cart(WC()->cart->generate_cart_id($product_id));
            ?>

            <div class="matrik-cart-button-wrapper" data-product-id="<?php echo esc_attr($product_id); ?>">

                <a class="primary-btn4 btn-hover <?php echo (!$in_cart) ? 'ajax_add_to_cart ' . $button_class : 'added_to_cart'; ?>" href="<?php echo (!$in_cart) ? esc_url($product->add_to_cart_url()) : esc_url(wc_get_cart_url()); ?>" data-product_id="<?php echo esc_attr($product_id); ?>" data-product_sku="<?php echo esc_attr($product->get_sku()); ?>" aria-label="<?php echo esc_attr($product->add_to_cart_description()); ?>" rel="nofollow">
                    <?php if (!$in_cart): ?>
                        <?php echo esc_html($button_text, 'matrik'); ?>
                    <?php else: ?>
                        <?php esc_html_e('View Cart', 'matrik'); ?>
                    <?php endif; ?>
                    <span></span>
                </a>
            </div>
            <!-- Add or View cart -->

        </div>
    <?php
    }
    add_action('egns_matrik_shop_page_product_card', 'egns_matrik_shop_product_card');


    // archive page product cart not found
    function egns_matrik_shop_no_products()
    {
    ?>
        <p><?php esc_html_e('No products found.', 'matrik'); ?></p>
        <?php
    }
    add_action('egns_matrik_shop_page_no_products', 'egns_matrik_shop_no_products');




    /**
     * Add Custom WooCommerce Related Products Function
     * */
    function egns_morter_woocommerce_related_products($product_id, $limit = 8)
    {
        if (! $product_id) {
            return;
        }

        // Get product categories
        $terms      = wp_get_post_terms($product_id, 'product_cat');
        $categories = wp_list_pluck($terms, 'term_id');

        // Get product tags
        $terms = wp_get_post_terms($product_id, 'product_tag');
        $tags  = wp_list_pluck($terms, 'term_id');
        // Prepare query arguments
        $args = array(
            'post_type'      => 'product',
            'posts_per_page' => $limit,
            'post__not_in'   => array($product_id),
            'orderby'        => 'rand',
            'tax_query'      => array(
                'relation' => 'OR',
                array(
                    'taxonomy' => 'product_cat',
                    'field'    => 'term_id',
                    'terms'    => $categories,
                ),
                array(
                    'taxonomy' => 'product_tag',
                    'field'    => 'term_id',
                    'terms'    => $tags,
                ),
            ),
        );

        // Get related products
        $related_products = new WP_Query($args);

        $count = $related_products->found_posts;

        // Check if related products exist
        if ($related_products->have_posts()) {
        ?>
            <div class="related-product-section mt-120">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="section-title">
                                <h4><?php echo esc_html__('Related products', 'matrik'); ?></h4>
                            </div>
                        </div>
                    </div>
                    <div class="related-product-slider-area">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="swiper related-product-slider">
                                    <div class="swiper-wrapper">
                                        <?php
                                        while ($related_products->have_posts()):
                                            $related_products->the_post();
                                            global $product;
                                        ?>
                                            <div class="swiper-slide">
                                                <div class="product-card">
                                                    <div class="product-card-img-wrap">
                                                        <a href="<?php the_permalink(); ?>" class="product-card-img">
                                                            <?php if (has_post_thumbnail()): ?>
                                                                <?php the_post_thumbnail('product-thumb'); ?>
                                                            <?php else: ?>
                                                                <img src="<?php echo esc_url(wc_placeholder_img_src()); ?>" alt="<?php the_title(); ?>">
                                                            <?php endif; ?>
                                                        </a>
                                                        <?php
                                                        // Determine the product type
                                                        $product_type = $product->get_type();


                                                        $button_text = __('Add to Cart', 'matrik');
                                                        if ($product_type === 'grouped') {
                                                            $button_text = __('Select Options', 'matrik');
                                                        } elseif ($product_type === 'variable') {
                                                            $button_text = __('View Options', 'matrik');
                                                        } elseif ($product_type === 'external') {
                                                            $button_text = __('Buy Product', 'matrik');
                                                        }
                                                        ?>
                                                        <a href="<?php echo esc_url($product->add_to_cart_url()); ?>"
                                                            class=" <?php echo esc_attr($product_type); ?> cart-btn"
                                                            data-product_id="<?php echo esc_attr($product->get_id()); ?>"
                                                            data-product_sku="<?php echo esc_attr($product->get_sku()); ?>"
                                                            aria-label="<?php echo esc_attr($product->add_to_cart_description()); ?>"
                                                            rel="nofollow">
                                                            <svg width="16" height="16" viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg">
                                                                <path
                                                                    d="M11.9016 15H4.10156C2.45156 15 1.10156 13.65 1.10156 12V11.9L1.40156 3.9C1.45156 2.25 2.80156 1 4.40156 1H11.6016C13.2016 1 14.5516 2.25 14.6016 3.9L14.9016 11.9C14.9516 12.7 14.6516 13.45 14.1016 14.05C13.5516 14.65 12.8016 15 12.0016 15H11.9016ZM4.40156 2C3.30156 2 2.45156 2.85 2.40156 3.9L2.10156 12C2.10156 13.1 3.00156 14 4.10156 14H12.0016C12.5516 14 13.0516 13.75 13.4016 13.35C13.7516 12.95 13.9516 12.45 13.9516 11.9L13.6516 3.9C13.6016 2.8 12.7516 2 11.6516 2H4.40156Z" />
                                                                <path
                                                                    d="M8 7C6.05 7 4.5 5.45 4.5 3.5C4.5 3.2 4.7 3 5 3C5.3 3 5.5 3.2 5.5 3.5C5.5 4.9 6.6 6 8 6C9.4 6 10.5 4.9 10.5 3.5C10.5 3.2 10.7 3 11 3C11.3 3 11.5 3.2 11.5 3.5C11.5 5.45 9.95 7 8 7Z" />
                                                            </svg>
                                                            <?php echo esc_html($button_text, 'matrik'); ?>
                                                        </a>
                                                    </div>
                                                    <div class="product-card-content">
                                                        <h6><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h6>
                                                        <div class="price">
                                                            <span><?php echo sprintf('%s', $product->get_price_html()); ?></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php
                                        endwhile;
                                        wp_reset_postdata();
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php if ($count > 4): ?>
                            <div class="slider-btn-grp three">
                                <div class="slider-btn related-product-slider-prev">
                                    <svg width="14" height="14" viewBox="0 0 14 14" xmlns="http://www.w3.org/2000/svg">
                                        <g>
                                            <path d="M11.002 13.0005C10.002 10.5005 5.00195 8.00049 2.00195 7.00049C5.00195 6.00049 9.50195 4.50049 11.002 1.00049" stroke-width="1.5" stroke-linecap="round"></path>
                                        </g>
                                    </svg>
                                </div>
                                <div class="slider-btn related-product-slider-next">
                                    <svg width="14" height="14" viewBox="0 0 14 14" xmlns="http://www.w3.org/2000/svg">
                                        <g>
                                            <path d="M2.99805 13.0005C3.99805 10.5005 8.99805 8.00049 11.998 7.00049C8.99805 6.00049 4.49805 4.50049 2.99805 1.00049" stroke-width="1.5" stroke-linecap="round"></path>
                                        </g>
                                    </svg>
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
    <?php

            wp_reset_postdata();
        }
    }


    /**********Tab Description title Remove*********** */

    function rename_description_tab($tabs)
    {
        if (isset($tabs['description'])) {
            $tabs['description']['title'] = __('Product Details', 'matrik');
        }
        return $tabs;
    }
    add_filter('woocommerce_product_tabs', 'rename_description_tab', 98);

    function remove_description_tab_title($title)
    {
        if (is_product()) {
            return '';  // Return empty to remove the title
        }
        return $title;
    }
    add_filter('woocommerce_product_description_heading', 'remove_description_tab_title');


    /** Remove Sale Flus badge From Single Product Page */
    function remove_sale_badge_single_product()
    {
        if (is_product()) {
            remove_action('woocommerce_before_single_product_summary', 'woocommerce_show_product_sale_flash', 10);
        }
    }
    add_action('wp', 'remove_sale_badge_single_product');
}



function get_variation_data()
{
    if (!isset($_POST['product_id']) || !isset($_POST['attributes'])) {
        wp_send_json_error(['message' => 'Missing required parameters.']);
        return;
    }

    $product_id = intval($_POST['product_id']);
    $attributes = $_POST['attributes'];

    $product = wc_get_product($product_id);
    if (!$product || !$product->is_type('variable')) {
        wp_send_json_error(['message' => 'Invalid product or not a variable product.']);
        return;
    }

    $variation_id = find_matching_product_variation($product, $attributes);

    if (!$variation_id) {
        wp_send_json_error(['message' => 'No matching variation found.']);
        return;
    }

    $variation_image_id = get_post_thumbnail_id($variation_id);

    wp_send_json_success([
        'variation_id'       => $variation_id,
        'variation_image_id' => $variation_image_id
    ]);
}
add_action('wp_ajax_get_variation_data', 'get_variation_data');
add_action('wp_ajax_nopriv_get_variation_data', 'get_variation_data');


/**
 * Find variation ID based on selected attributes.
 */
function find_matching_product_variation($product, $attributes)
{
    foreach ($product->get_children() as $child_id) {
        $variation            = new WC_Product_Variation($child_id);
        $variation_attributes = $variation->get_attributes();

        $match = true;
        foreach ($attributes as $attribute => $value) {
            if (!isset($variation_attributes[$attribute]) || $variation_attributes[$attribute] !== $value) {
                $match = false;
                break;
            }
        }

        if ($match) return $variation->get_id();
    }

    return false;
}

/** Single page VARIABLE products options */

add_action('wp_enqueue_scripts', function () {
    if (function_exists('is_product') && is_product()) {
        wp_enqueue_script('wc-add-to-cart-variation');

        if (!wp_script_is('wc-add-to-cart-variation', 'done')) {
            $params = array(
                'ajax_url'    => admin_url('admin-ajax.php'),
                'wc_ajax_url' => WC_AJAX::get_endpoint('%%endpoint%%')
            );
            wp_localize_script('wc-add-to-cart-variation', 'wc_add_to_cart_variation_params', $params);
        }
    }
}, 30);

function egns_matrik_variation_options_html($html, $args)
{
    $options   = $args['options'];
    $attribute = $args['attribute'];
    $product   = $args['product'];

    if (empty($options) || !$product) {
        return $html;
    }

    $is_color_attribute = strpos($attribute, 'color') !== false;

    $html = '<div class="custom-variation-options">';

    // Hidden select element for WooCommerce
    $html .= '<select class="hidden-variation-select" name="attribute_' . esc_attr(sanitize_title($attribute)) . '" style="display:none;">';
    foreach ($options as $option) {
        $selected  = (isset($_REQUEST['attribute_' . sanitize_title($attribute)]) && $_REQUEST['attribute_' . sanitize_title($attribute)] === $option) ? 'selected' : '';
        $html     .= '<option value="' . esc_attr($option) . '" ' . $selected . '>' . esc_html($option) . '</option>';
    }
    $html .= '</select>';

    $html .= '<div class="eg-variation">';
    //custom variations
    foreach ($options as $option) {


        $selected = (isset($_REQUEST['attribute_' . sanitize_title($attribute)]) && $_REQUEST['attribute_' . sanitize_title($attribute)] === $option) ? 'selected' : '';

        if ($is_color_attribute) {
            $html .= '<button class="variation-option color-swatch ' . esc_attr($selected) . '" 
                      data-attribute_name = "attribute_' . esc_attr(sanitize_title($attribute)) . '"
                      data-value          = "' . esc_attr($option) . '"
                      style               = "background-color: ' . esc_attr($option) . '"
                      title               = "' . ($option) . '"></button>';
        } else {
            $html .= '<button class="variation-option ' . esc_attr($selected) . '" 
                      data-attribute_name = "attribute_' . esc_attr(sanitize_title($attribute)) . '"
                      data-value          = "' . esc_attr($option) . '">' . esc_html($option) . '</button>';
        }
    }

    $html .= '</div></div>';
    return $html;
}
add_filter('woocommerce_dropdown_variation_attribute_options_html', 'egns_matrik_variation_options_html', 10, 2);

/** End Single page VARIABLE products options */

/**
 * woocommerce product single add custom content
 */
function add_content_woocommerce()
{
    $gallery_opt = Egns_Helper::egns_get_theme_option('matrik_gateway_images');
    $gallery_ids = explode(',', $gallery_opt);
    ?>
    <?php if ((Egns\Helper\Egns_Helper::egns_get_theme_option('enable_contents') == 1) && class_exists('CSF')): ?>

        <div class="payment-method">
            <h6><?php echo Egns_Helper::egns_get_theme_option('matrik_gateway_title') ?></h6>
            <ul>
                <?php foreach ($gallery_ids as $item): ?>
                    <li><a><img src="<?php echo esc_url(wp_get_attachment_url($item)) ?>" alt="<?php echo esc_attr__('image', 'matrik') ?>"></a></li>
                <?php endforeach; ?>
            </ul>
        </div>
    <?php endif; ?>

<?php
}
add_action('woocommerce_single_product_summary', 'add_content_woocommerce', 70);
