  <?php

    use Egns\Helper\Egns_Helper;

    $header_logo  = Egns\Helper\Egns_Helper::egns_get_theme_option('header_logo', 'url');
    $page_header_logo  = Egns\Helper\Egns_Helper::egns_page_option_value('page_header_logo', 'url');

    $header_mobile_logo = Egns\Helper\Egns_Helper::egns_get_theme_option('header_mobile_logo', 'url');
    $page_header_mobile_logo = Egns\Helper\Egns_Helper::egns_page_option_value('page_header_mobile_logo', 'url');

    $sidebar_image =  Egns\Helper\Egns_Helper::egns_get_theme_option('header_four_sidebar_logo', 'url');
    $page_sidebar_image = Egns\Helper\Egns_Helper::egns_page_option_value('page_header_sidebar_logo', 'url');

    ?>

  <div class="sidebar-menu">
      <div class="sidebar-menu-top-area">
          <div class="container d-flex align-items-center justify-content-between">
              <?php if (!empty($page_sidebar_image)) : ?>
                  <div class="sidebar-menu-logo">
                      <a href="<?php echo esc_url(home_url('/')); ?>"><img alt="image" src="<?php echo esc_url($page_sidebar_image); ?>"></a>
                  </div>
              <?php elseif (!empty($sidebar_image)) : ?>
                  <div class="sidebar-menu-logo">
                      <a href="<?php echo esc_url(home_url('/')); ?>"><img alt="image" src="<?php echo esc_url($sidebar_image); ?>"></a>
                  </div>
              <?php else : ?>
                  <?php Egns\Helper\Egns_Helper::get_theme_logo(NULL); ?>
              <?php endif; ?>

              <div class="sidebar-menu-close">
                  <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 18 18">
                      <path fill-rule="evenodd" clip-rule="evenodd" d="M18 0L11.1686 8.99601L18 18L9.0041 11.1605L0 18L6.83156 8.99601L0 0L9.0041 6.83156L18 0Z"></path>
                  </svg>
              </div>
          </div>
      </div>
      <div class="container">
          <div class="row g-lg-0 gy-5 align-items-center">
              <div class="col-lg-4 order-lg-1 order-2">
                  <div class="sidebar-contact">
                      <div class="contact-area mb-40">
                          <?php if (!empty(Egns\Helper\Egns_Helper::egns_get_theme_option('header_four_sidebar_title'))) : ?>
                              <h4><?php echo esc_html(Egns\Helper\Egns_Helper::egns_get_theme_option('header_four_sidebar_title')); ?>
                                  <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 12 12">
                                      <path d="M10.0035 3.40804L1.41153 12L0 10.5885L8.59097 1.99651H1.01922V0H12V10.9808H10.0035V3.40804Z" />
                                  </svg>
                              <?php endif; ?>
                              </h4>
                              <ul class="contact-list">
                                  <?php foreach (Egns\Helper\Egns_Helper::egns_get_theme_option('header_four_sidebar_lists') as $loop_index => $sidebar_data) : ?>
                                      <li>
                                          <div class="single-contact">
                                              <div class="icon">
                                                  <?php if (!empty($sidebar_data['header_four_sidebar_list_icon']['url'])) : ?>
                                                      <?php
                                                        $image_url = $sidebar_data['header_four_sidebar_list_icon']['url'];
                                                        if ($image_url) {
                                                            if (str_ends_with($image_url, '.svg')) {
                                                                $svg_content = file_get_contents($image_url);
                                                                if ($svg_content !== false) {
                                                                    // Allow only safe SVG tags and attributes
                                                                    $allowed_tags = [
                                                                        'svg' => [
                                                                            'xmlns'        => true,
                                                                            'width'        => true,
                                                                            'height'       => true,
                                                                            'viewBox'      => true,
                                                                            'fill'         => true,
                                                                            'stroke'       => true,
                                                                            'stroke-width' => true,
                                                                            'aria-hidden'  => true,
                                                                            'role'         => true,
                                                                            'focusable'    => true,
                                                                            'class'        => true,
                                                                        ],
                                                                        'path' => [
                                                                            'd'            => true,
                                                                            'fill'         => true,
                                                                            'stroke'       => true,
                                                                            'stroke-width' => true,
                                                                            'class'        => true,
                                                                        ],
                                                                        'g' => [
                                                                            'fill'         => true,
                                                                            'stroke'       => true,
                                                                            'stroke-width' => true,
                                                                            'class'        => true,
                                                                        ],
                                                                        'title' => [],
                                                                    ];

                                                                    echo wp_kses($svg_content, $allowed_tags);
                                                                }
                                                            } else {
                                                        ?>
                                                              <img src="<?php echo esc_url($image_url); ?>" alt="<?php echo esc_attr__('icon-image', 'matrik'); ?>">
                                                      <?php
                                                            }
                                                        }
                                                        ?>
                                                  <?php endif; ?>
                                              </div>
                                              <div class="content">
                                                  <?php if (!empty($sidebar_data['header_four_sidebar_list_label'])) : ?>
                                                      <span><?php echo esc_html($sidebar_data['header_four_sidebar_list_label']); ?></span>
                                                  <?php endif; ?>
                                                  <?php if ($sidebar_data['header_four_sidebar_select_content_type'] == 'phone') : ?>
                                                      <?php if (!empty($sidebar_data['header_four_sidebar_phone'])) : ?>
                                                          <h6><a href="tel:<?php echo preg_replace('/[^0-9]/', '', $sidebar_data['header_four_sidebar_phone']); ?>"><?php echo esc_html($sidebar_data['header_four_sidebar_phone']); ?></a></h6>
                                                      <?php endif; ?>
                                                  <?php elseif ($sidebar_data['header_four_sidebar_select_content_type'] == 'email') : ?>
                                                      <?php if (!empty($sidebar_data['header_four_sidebar_email'])) : ?>
                                                          <h6><a href="mailto:<?php echo esc_html($sidebar_data['header_four_sidebar_email']); ?>"><?php echo esc_html($sidebar_data['header_four_sidebar_email']); ?></a></h6>
                                                      <?php endif; ?>
                                                  <?php elseif ($sidebar_data['header_four_sidebar_select_content_type'] == 'others') : ?>
                                                      <?php if (!empty($sidebar_data['header_four_sidebar_others_text_link']['text'])) : ?>
                                                          <h6><a href="<?php echo esc_html($sidebar_data['header_four_sidebar_others_text_link']['url']); ?>"><?php echo esc_html($sidebar_data['header_four_sidebar_others_text_link']['text']); ?></a></h6>
                                                      <?php endif; ?>
                                                  <?php endif; ?>
                                              </div>
                                          </div>
                                          <?php if ($loop_index !== count(Egns\Helper\Egns_Helper::egns_get_theme_option('header_four_sidebar_lists')) - 1) : ?>
                                              <svg class="arrow" width="8" height="29" viewBox="0 0 8 29" xmlns="http://www.w3.org/2000/svg">
                                                  <path
                                                      d="M1.33333 3C1.33333 4.47276 2.52724 5.66667 4 5.66667C5.47276 5.66667 6.66667 4.47276 6.66667 3C6.66667 1.52724 5.47276 0.333333 4 0.333333C2.52724 0.333333 1.33333 1.52724 1.33333 3ZM3.64645 28.3536C3.84171 28.5488 4.15829 28.5488 4.35355 28.3536L7.53553 25.1716C7.7308 24.9763 7.7308 24.6597 7.53553 24.4645C7.34027 24.2692 7.02369 24.2692 6.82843 24.4645L4 27.2929L1.17157 24.4645C0.976311 24.2692 0.659728 24.2692 0.464466 24.4645C0.269204 24.6597 0.269204 24.9763 0.464466 25.1716L3.64645 28.3536ZM3.5 3V28H4.5V3H3.5Z" />
                                              </svg>
                                          <?php endif; ?>
                                      </li>
                                  <?php endforeach; ?>
                              </ul>
                      </div>
                      <div class="address-area">
                          <?php if (!empty(Egns\Helper\Egns_Helper::egns_get_theme_option('header_four_sidebar_location_title'))) : ?>
                              <h4><?php echo esc_html(Egns\Helper\Egns_Helper::egns_get_theme_option('header_four_sidebar_location_title')); ?>
                                  <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 12 12">
                                      <path d="M10.0035 3.40804L1.41153 12L0 10.5885L8.59097 1.99651H1.01922V0H12V10.9808H10.0035V3.40804Z" />
                                  </svg>
                              </h4>
                          <?php endif; ?>
                          <ul class="address-list">
                              <?php foreach (Egns\Helper\Egns_Helper::egns_get_theme_option('header_four_sidebar_locations') as $location_data) : ?>
                                  <li class="single-address">
                                      <?php if (!empty($location_data['header_four_sidebar_location_title'])) : ?>
                                          <span><?php echo esc_html($location_data['header_four_sidebar_location_title']); ?></span>
                                      <?php endif; ?>
                                      <?php if (!empty($location_data['header_four_sidebar_location_text_and_link']['text'])) : ?>
                                          <a href="<?php echo esc_url($location_data['header_four_sidebar_location_text_and_link']['url']); ?>"><?php echo esc_html($location_data['header_four_sidebar_location_text_and_link']['text']); ?></a>
                                      <?php endif; ?>
                                  </li>
                              <?php endforeach; ?>
                          </ul>
                      </div>
                  </div>
              </div>
              <div class="col-lg-8 order-lg-2 order-1">
                  <div class="sidebar-menu-wrap">

                      <!-- sidebar main menu  -->
                      <?php \Egns\Helper\Egns_Helper::egns_get_theme_side_menu('side-menu', 'nav-menu', '<svg xmlns="http://www.w3.org/2000/svg" width="10" height="10" viewBox="0 0 10 10"> <path d="M8.33624 2.84003L1.17627 10L0 8.82373L7.15914 1.66376H0.849347V0H10V9.15065H8.33624V2.84003Z"></path></svg>', '<span class="dropdown-icon2"><i class="bi bi-plus"></i></span>', 'main-menu', 3) ?>

                  </div>
              </div>
          </div>
      </div>
  </div>
  <div class="main-container">
      <div class="sidebar-wrapper header-area">
          <div class="sidebar-logo">
              <?php if (!empty($page_header_logo)) : ?>
                  <a href="<?php echo esc_url(home_url('/')); ?>"><img src="<?php echo esc_url($page_header_logo); ?>" alt="<?php echo esc_attr__('header-logo', 'matrik'); ?>"></a>
              <?php elseif (!empty($header_logo)) : ?>
                  <a href="<?php echo esc_url(home_url('/')); ?>"><img src="<?php echo esc_url($header_logo); ?>" alt="<?php echo esc_attr__('header-logo', 'matrik'); ?>"></a>
              <?php else :
                    Egns\Helper\Egns_Helper::get_theme_logo(NULL);
                endif; ?>
          </div>
          <div class="menu-btn">
              <svg width="18" height="18" viewBox="0 0 18 18" xmlns="http://www.w3.org/2000/svg">
                  <rect x="0.605469" y="0.600098" width="13.4399" height="1.67999" rx="0.839996" />
                  <rect x="3.96484" y="7.32007" width="13.4399" height="3.35999" rx="1.67999" />
                  <rect x="0.605469" y="15.7201" width="13.4399" height="1.67999" rx="0.839996" />
              </svg>
          </div>
          <?php if (!empty(Egns\Helper\Egns_Helper::egns_get_theme_option('header_four_text_label'))) : ?>
              <span><?php echo esc_html(Egns\Helper\Egns_Helper::egns_get_theme_option('header_four_text_label')); ?></span>
          <?php endif; ?>
      </div>
  </div>