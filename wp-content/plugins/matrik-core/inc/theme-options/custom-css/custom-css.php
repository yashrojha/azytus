<?php
// exit if access directly
if (!defined('ABSPATH')) {
    exit();
}
function egnsCustomStyling()
{

    $custom_css         = "";
    $egns_theme_options = get_option('egns_theme_options');
    $egns_page_options  = get_post_meta(get_the_ID(), 'egns_page_options', true);

    /**************************
     * Primary Color Start
     *************************/

    $primary_main_color = $egns_theme_options['primary_theme_color'] ?? '';
    $primary_opc_color  = $egns_theme_options['primary_theme_color_opc'] ?? '';

    // Get hex color 
    $hex = $primary_opc_color;

    // Remove the '#' if present
    $hex = ltrim($hex, '#');

    // Convert the hex to RGB values
    $r = hexdec(substr($hex, 0, 2));
    $g = hexdec(substr($hex, 2, 2));
    $b = hexdec(substr($hex, 4, 2));


    if (!empty($primary_main_color)) {
        $custom_css .= "
         :root{
                 --primary-color1: $primary_main_color !important;
                 --primary-color2: $primary_main_color !important;
                 --primary-color3: $primary_main_color !important;
                 --primary-color4: $primary_main_color !important;
                 --primary-color5: $primary_main_color !important;
              }
          ";
    }

    if (!empty($primary_opc_color)) {
        $custom_css .= "
         :root{
                 --primary-color1-opc: $r, $g, $b !important;
                 --primary-color2-opc: $r, $g, $b !important;
                 --primary-color3-opc: $r, $g, $b !important;
                 --primary-color4-opc: $r, $g, $b !important;
                 --primary-color5-opc: $r, $g, $b !important;
              }
          ";
    }

    /**************************
     * Primary Color End
     *************************/




    /**************************
     * Primary Font Start
     *************************/

    $font_manrope = $egns_theme_options['font_manrope']['font-family'] ?? '';
    if (!empty($font_manrope)) {
        $custom_css .= "
         :root{
                 --font-manrope: '$font_manrope', sans-serif !important;
              }
          ";
    }

    $font_dmsans = $egns_theme_options['font_dmsans']['font-family'] ?? '';
    if (!empty($font_dmsans)) {
        $custom_css .= "
         :root{
                 --font-dmsans: '$font_dmsans', sans-serif !important;
              }
          ";
    }

    /**************************
     * Primary Font End
     *************************/



    /************************
     * Start Breadcrumb Style
     ************************/

    //Breadcrumb BG Color
    $breadcump_normal_color_background = $egns_theme_options['breadcrumb_background_color'] ?? '';
    $breadcump_page_color_background   = $egns_page_options['breadcrumb_page_bg_color'] ?? '';

    if (!empty($breadcump_page_color_background)) {
        $custom_css .= "
        .breadcrumb-section {
            background-color: $breadcump_page_color_background !important;
        }
    ";
    } else {
        if (!empty($breadcump_normal_color_background)) {
            $custom_css .= "
            .breadcrumb-section {
                background-color: $breadcump_normal_color_background !important;
            }
        ";
        }
    }



    /*********************
     * End Breadcrumb
     *********************/

    /*********************
     * Footer Style
     *********************/

    //Footer Background image
    $footer_background_color = $egns_theme_options['footer_background_color'] ?? '';
    $footer_background_image = $egns_theme_options['footer_background_image']['url'] ?? '';


    if (!empty($footer_background_color)) {
        $custom_css .= "
        footer.footer-section{
            background-color: $footer_background_color !important;
        }
    ";
    }

    if (!empty($footer_background_image)) {
        $custom_css .= "
        footer.footer-section{
            background-image: url($footer_background_image) !important;
        }
    ";
    }




    wp_register_style('egns-stylesheet', false);
    wp_enqueue_style('egns-stylesheet', false);
    wp_add_inline_style('egns-stylesheet', $custom_css, true);
}
if (class_exists('CSF')) {
    add_action('wp_enqueue_scripts', 'egnsCustomStyling');
}
