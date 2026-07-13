<?php
/*-------------------------------------------------------
		   ** 404 page options
--------------------------------------------------------*/

CSF::createSection($prefix, array(
	'id'     => '404_page',
	'title'  => esc_html__('404 Page', 'matrik-core'),
	'icon'   => 'fa fa-exclamation-triangle',
	'fields' => array(
		array(
			'type'    => 'subheading',
			'content' => '<h3>' . esc_html__('404 Page Options', 'matrik-core') . '</h3>',
		),
		array(
			'id'      => '404_image',
			'type'    => 'media',
			'title'   => esc_html__('Error Image', 'matrik-core'),
			'library' => 'image',
			'default' => array(
				'url'       => esc_url(EGNS_CORE_THEME_OPTIONS_IMAGES . '/error/error.png'),
				'id'        => '404_image',
				'thumbnail' => esc_url(EGNS_CORE_THEME_OPTIONS_IMAGES . '/error/error.png'),
				'alt'       => esc_attr('404 image'),
				'title'     => esc_html('404 image'),
			),
		),
		array(
			'id'      => '404_title',
			'title'   => esc_html__('Title', 'matrik-core'),
			'type'    => 'text',
			'info'    => wp_kses(__('you can change <mark>404</mark> text of 404 page', 'matrik-core'), wp_kses_allowed_html('matrik-core')),
			'default' => wp_kses(__("Sorry! Page Not Found.", 'matrik-core'), wp_kses_allowed_html('post')),

		),
		array(
			'id'      => '404_content',
			'title'   => esc_html__('Description', 'matrik-core'),
			'type'    => 'textarea',
			'info'    => wp_kses(__('you can change <mark>Content</mark> text of 404 page', 'matrik-core'), wp_kses_allowed_html('matrik-core')),
			'default' => esc_html__("The page you are looking for was moved, removed, renamed or never existed. we are open for this constructions & architecture.", 'matrik-core')
		),
		array(
			'id'      => '404_button_text',
			'title'   => esc_html__('Button Label', 'matrik-core'),
			'type'    => 'text',
			'info'    => wp_kses(__('you can change <mark>button text</mark> of 404 page', 'matrik-core'), wp_kses_allowed_html('matrik-core')),
			'default' => esc_html__('Take Me Home', 'matrik-core')
		),

	)
));
