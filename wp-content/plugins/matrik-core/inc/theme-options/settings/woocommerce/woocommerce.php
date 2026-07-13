<?php
if (class_exists('CSF')) {

    /*-------------------------------------------------------
	   ** WooCommerce  Options
   --------------------------------------------------------*/
    CSF::createSection($prefix, array(
        'id'     => 'woocommerce_options',
        'title'  => esc_html__('WooCommerce', 'matrik-core'),
        'icon'   => 'fa fa-shopping-bag',
        'fields' => array(
            array(
                'type'    => 'subheading',
                'content' => '<h4>' . esc_html__('WooCommerce Options', 'matrik-core') . '</h4>',
            ),
            array(
                'id'          => 'product_column',
                'type'        => 'radio',
                'inline'      => true,
                'title'       => esc_html__('Product column', 'matrik-core'),
                'placeholder' => esc_html__('Select an option', 'matrik-core'),
                'options'     => array(
                    '6' => 'Two Column',
                    '4' => 'Three Column',
                    '3' => 'Four Column',
                ),
                'default' => '3',
            ),
            array(
                'id'      => 'product_per_page',
                'type'    => 'number',
                'title'   => esc_html__('Products per page', 'matrik-core'),
                'default' => 8,
            ),

            //Gateway Images with Title
            array(
                'id'      => 'enable_contents',
                'type'    => 'switcher',
                'title'   => esc_html__('Extended Contents', 'matrik-core'),
                'label'   => esc_html__('Do you want activate it ?', 'matrik-core'),
                'default' => true
            ),
            array(
                'id'         => 'matrik_gateway_title',
                'type'       => 'text',
                'title'      => esc_html__('Gateway title', 'matrik-core'),
                'default'    => esc_html__('Guaranted Safe Checkout', 'matrik-core'),
                'dependency' => array('enable_contents', '==', 'true'),
            ),
            array(
                'id'         => 'matrik_gateway_images',
                'type'       => 'gallery',
                'add_title'  => esc_html__('Gateway Images', 'matrik-core'),
                'title'      => esc_html__('Add Gateway images', 'matrik-core'),
                'dependency' => array('enable_contents', '==', 'true'),
            ),

        ),
    ));
    /*-----------------------------------
		REQUIRE Woocommerce FILES
	------------------------------------*/
}
