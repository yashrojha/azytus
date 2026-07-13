<?php
/*-------------------------------------------------------
		  ** Project Page  Options
--------------------------------------------------------*/

CSF::createSection($prefix, array(
  'parent' => 'custom_post_type_settings',
  'id'     => 'career_archive_settings',
  'title'  => esc_html__('Career Archive', 'matrik-core'),
  'icon'   => 'fa fa-briefcase',
  'fields' => array(
    array(
      'id'      => 'posts_per_page_option_career',
      'type'    => 'number',
      'title'   => esc_html__('Posts per page (default)', 'matrik-core'),
      'default' => 9,
    ),
  ),



));
