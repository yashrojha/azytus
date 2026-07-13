<?php

/*-----------------------------------------
	CONTROL CORE CLASSES FOR AVOID ERRORS
------------------------------------------*/
if (class_exists('CSF')) {

  /*-----------------------------------
	    PAGE METABOX SECTION
	------------------------------------*/
  CSF::createMetabox(
    "EGNS_PROJECT_META_ID",
    array(
      'id'              => 'project_meta_option',
      'title'           => esc_html__('Project Informations', 'matrik-core'),
      'post_type'       => 'project',
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
    "EGNS_PROJECT_META_ID",
    array(
      'parent' => 'project_meta_option',
      'title'           => esc_html__('Project Info', 'matrik-core'),
      'fields' => array(
        array(
          'id'     => 'project_info_list',
          'type'   => 'repeater',
          'title'  => esc_html__('Project Info List', 'matrik-core'),
          'fields' => array(
            array(
              'id'    => 'project_icon',
              'type'  => 'media',
              'title' => 'Icon Image (SVG)',
            ),
            array(
              'id'    => 'project_label_text',
              'type'  => 'text',
              'title' => esc_html__('Label', 'matrik-core'),
              'default' => 'Client :	',
            ),
            array(
              'id'    => 'project_content_text',
              'type'  => 'text',
              'title' => esc_html__('Content', 'matrik-core'),
              'default' => 'Argova Josen',
            ),
          ),
          'default' => array(
            array(
              'project_label_text' => 'Client : ',
              'project_content_text' => 'Argova Josen'
            ),
          )
        ),
      )
    )
  );
}
