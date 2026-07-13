<?php

/*-------------------------------------------------------
	   ** Footer  Options
--------------------------------------------------------*/

CSF::createSection(
	$prefix,
	array(
		'parent' => 'footer_options',
		'id'     => 'footer_content_options',
		'title'  => esc_html__('Footer Template', 'matrik-core'),
		'icon'   => 'fa fa-copyright',
		'fields' => array(
			array(
				'type'    => 'subheading',
				'content' => '<h3>' . esc_html__('Footer Template', 'matrik-core') . '</h3>'
			),

			//------------------------- Footer Template Text --------------------------//
			array(
				'id'          => 'footer_one_template',
				'type'        => 'select',
				'title'       => esc_html__('Footer One', 'matrik-core'),
				'chosen'      => true,
				'placeholder' => esc_html__('Select a footer', 'matrik-core'),
				'options'     => \Egns_Core\Egns_Helper::get_custom_footer_list(),
				'default' => 'footer-one'
			),
			array(
				'id'          => 'footer_two_template',
				'type'        => 'select',
				'title'       => esc_html__('Footer Two', 'matrik-core'),
				'chosen'      => true,
				'placeholder' => esc_html__('Select a footer', 'matrik-core'),
				'options'     => \Egns_Core\Egns_Helper::get_custom_footer_list(),
				'default' => 'footer-two'
			),
			array(
				'id'          => 'footer_three_template',
				'type'        => 'select',
				'title'       => esc_html__('Footer Three', 'matrik-core'),
				'chosen'      => true,
				'placeholder' => esc_html__('Select a footer', 'matrik-core'),
				'options'     => \Egns_Core\Egns_Helper::get_custom_footer_list(),
				'default' => 'footer-three'
			),
			array(
				'id'          => 'footer_four_template',
				'type'        => 'select',
				'title'       => esc_html__('Footer Four', 'matrik-core'),
				'chosen'      => true,
				'placeholder' => esc_html__('Select a footer', 'matrik-core'),
				'options'     => \Egns_Core\Egns_Helper::get_custom_footer_list(),
				'default' => 'footer-four'
			),
			array(
				'id'          => 'footer_five_template',
				'type'        => 'select',
				'title'       => esc_html__('Footer Five', 'matrik-core'),
				'chosen'      => true,
				'placeholder' => esc_html__('Select a footer', 'matrik-core'),
				'options'     => \Egns_Core\Egns_Helper::get_custom_footer_list(),
				'default' => 'footer-five'
			),
			array(
				'id'          => 'footer_six_template',
				'type'        => 'select',
				'title'       => esc_html__('Footer Six', 'matrik-core'),
				'chosen'      => true,
				'placeholder' => esc_html__('Select a footer', 'matrik-core'),
				'options'     => \Egns_Core\Egns_Helper::get_custom_footer_list(),
				'default' 	  => 'footer-six'
			),
		),
	)
);
