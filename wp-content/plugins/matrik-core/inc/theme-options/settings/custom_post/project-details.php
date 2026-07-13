<?php
/*-------------------------------------------------------
		  ** Project Page  Options
--------------------------------------------------------*/

CSF::createSection($prefix, array(
  'parent' => 'custom_post_type_settings',
  'id'     => 'project_details_settings',
  'title'  => esc_html__('Project Details', 'matrik-core'),
  'icon'   => 'fa fa-project-diagram',
  'fields' => array(
    array(
      'type'    => 'heading',
      'content' => esc_html__('Sidebar Banner', 'matrik-core'),
    ),
    array(
      'id'      => 'project_banner_title',
      'type'    => 'text',
      'title'   => esc_html__('Banner Title', 'matrik-core'),
      'default' => wp_kses('Ready to <span>work with us?</span>', wp_kses_allowed_html('post')),
    ),
    array(
      'id'      => 'project_banner_button_text',
      'title'   => esc_html__('Button label', 'matrik-core'),
      'type'    => 'text',
      'default' => esc_html__('Open Project', 'matrik-core')
    ),
    array(
      'id'      => 'project_banner_button_text_url',
      'type'    => 'link',
      'title'   => 'Button link',
      'default' => array(
        'url'    => '#',
        'target' => '_blank'
      ),
    ),
    array(
      'id'      => 'project_banner_image',
      'type'    => 'media',
      'title'   => 'Banner Thumbnail',
      'default' => array(
        'url'       => esc_url(EGNS_CORE_THEME_OPTIONS_IMAGES . '/banner/project-sidebar-banner-img.webp'),
        'id'        => 'banner_image',
        'thumbnail' => esc_url(EGNS_CORE_THEME_OPTIONS_IMAGES . '/banner/project-sidebar-banner-img.webp'),
        'alt'       => esc_attr('banner'),
        'title'     => esc_html('banner'),
      ),
    ),

  ),

));
