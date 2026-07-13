<?php
/*-----------------------------------
    PAGE BARNER SECTION
------------------------------------*/

CSF::createSection(
	$prefix,
	array(
		'title'  => esc_html__('Breadcrumb', 'matrik-core'),
		'parent' => 'page_meta_option',
		'fields' => array(
			array(
				'type'    => 'subheading',
				'content' => esc_html__('Breadcrumb Options', 'matrik-core'),
			),

			array(
				'id'      => 'breadcrumb_enable_page',
				'type'    => 'switcher',
				'title'   => esc_html__('Enable Breadcrumb', 'matrik-core'),
				'desc'    => esc_html__('If you want to show or hide page banner you can toggle ( ON / OFF ).', 'matrik-core'),
				'default' => true,
			),
			array(
				'id'         => 'page_breadcrumb_title_text',
				'type'       => 'text',
				'title'      => esc_html__('Breadcrumb title', 'matrik-core'),
				'dependency' => array('breadcrumb_enable_page', '==', 'true'),
			),
			array(
				'id'         => 'page_breadcrumb_scroll_button_text',
				'type'       => 'text',
				'title'      => esc_html__('Circle Button label', 'matrik-core'),
				'dependency' => array('breadcrumb_enable_page', '==', 'true'),
			),
			array(
				'id'         => 'breadcrumb_page_bg_color',
				'type'       => 'color',
				'title'      => esc_html__('Breadcrumb Background Color', 'matrik-core'),
				'dependency' => array('breadcrumb_enable_page', '==', 'true'),
			),
			array(
				'id'         => 'breadcrumb_page_bg_image',
				'type'       => 'media',
				'title'      => esc_html__('Breadcrumb Background Image', 'matrik-core'),
				'desc'       => esc_html__('Set the banner background image', 'matrik-core'),
				'dependency' => array('breadcrumb_enable_page', '==', 'true'),
			),
		)
	)
);
