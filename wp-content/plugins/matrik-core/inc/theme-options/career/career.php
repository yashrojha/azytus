<?php

/*-----------------------------------------
	CONTROL CORE CLASSES FOR AVOID ERRORS
------------------------------------------*/
if (class_exists('CSF')) {

  /*-----------------------------------
	    PAGE METABOX SECTION
	------------------------------------*/
  CSF::createMetabox(
    "EGNS_CAREER_META_ID",
    array(
      'id'              => 'career_meta_option',
      'title'           => esc_html__('Career Informations', 'matrik-core'),
      'post_type'       => 'career',
      'context'         => 'normal',
      'priority'        => 'high',
      'show_restore'    => true,
      'enqueue_webfont' => true,
      'async_webfont'   => false,
      'output_css'      => false,
      'nav'             => 'normal',
      'theme'           => 'dark',
    )
  );


  /*-----------------------------------
		REQUIRE META FILES
	------------------------------------*/

  CSF::createSection(
    "EGNS_CAREER_META_ID",
    array(
      'parent' => 'career_meta_option',
      'title'  => esc_html__('Career Info', 'matrik-core'),
      'fields' => array(
        array(
          'id'      => 'career_short_description',
          'type'    => 'text',
          'title'   => esc_html__('Short Description', 'matrik-core'),
          'default' => '“ We are seeking a talented and 2+ years experienced UI/UX Creative Designer with expertise in Figma to join our dynamic team ”.',
        ),
        array(
          'id'     => 'career_info_list',
          'type'   => 'repeater',
          'title'  => esc_html__('Career Info List', 'matrik-core'),
          'fields' => array(
            array(
              'id'      => 'career_label_text',
              'type'    => 'text',
              'title'   => esc_html__('Label', 'matrik-core'),
              'default' => 'Experience :	',
            ),
            array(
              'id'      => 'career_content_text',
              'type'    => 'text',
              'title'   => esc_html__('Content', 'matrik-core'),
              'default' => '2-3 Years',
            ),
          ),
          'default' => array(
            array(
              'career_label_text'   => 'Experience : ',
              'career_content_text' => '2-3 Years'
            ),
          )
        ),
        array(
          'type'    => 'subheading',
          'content' => esc_html__('Extra Info', 'matrik-core'),
        ),
        array(
          'id'    => 'career_icon',
          'type'  => 'media',
          'title' => 'Icon Image (SVG)',
        ),
        array(
          'id'      => 'career_info_text',
          'type'    => 'text',
          'title'   => esc_html__('Info Text', 'matrik-core'),
          'default' => '(02 Open Roles)',
        ),
        array(
          'type'    => 'subheading',
          'content' => esc_html__('Apply By Form', 'matrik-core'),
        ),
        array(
          'id'      => 'career_apply_by_form_title',
          'type'    => 'text',
          'title'   => esc_html__('Title', 'matrik-core'),
          'default' => 'Ready to grow your career with us?',
        ),
        array(
          'id'          => 'career_apply_by_form_modal_shortcode',
          'type'        => 'text',
          'title'       => esc_html__('Shortcode', 'matrik-core'),
          'placeholder' => '[add shortcode here]',
        ),
      )
    )
  );
}
