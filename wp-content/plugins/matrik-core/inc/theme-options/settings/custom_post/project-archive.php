<?php
/*-------------------------------------------------------
		  ** Project Page  Options
--------------------------------------------------------*/

CSF::createSection($prefix, array(
  'parent' => 'custom_post_type_settings',
  'id'     => 'project_archive_settings',
  'title'  => esc_html__('Project Archive', 'matrik-core'),
  'icon'   => 'fa fa-folder-open',
  'fields' => array(
    array(
      'id'      => 'posts_per_page_option_project',
      'type'    => 'number',
      'title'   => esc_html__('Posts per page (default)', 'matrik-core'),
      'default' => 9,
    ),
    array(
      'id'      => 'posts_per_page_option_project_infoflow',
      'type'    => 'number',
      'title'   => esc_html__('Posts per page (InfoFlow Template)', 'matrik-core'),
      'default' => 12,
    ),
    array(
      'id'      => 'posts_per_page_option_project_text_down',
      'type'    => 'number',
      'title'   => esc_html__('Posts per page (Text Down Template)', 'matrik-core'),
      'default' => 8,
    ),
  ),

));
