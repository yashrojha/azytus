<?php
/*-------------------------------------------------------
		  ** Project Page  Options
--------------------------------------------------------*/

CSF::createSection($prefix, array(
  'parent' => 'custom_post_type_settings',
  'id'     => 'material_archive_settings',
  'title'  => esc_html__('Material Archive', 'matrik-core'),
  'icon'   => 'fa fa-box',
  'fields' => array(
    array(
      'id'      => 'posts_per_page_option_material',
      'type'    => 'number',
      'title'   => esc_html__('Posts per page (default)', 'matrik-core'),
      'default' => 9,
    ),
  ),

));
