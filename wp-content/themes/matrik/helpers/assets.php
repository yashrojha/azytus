<?php

namespace Egns\Helper;

if (!class_exists('Egns_Assets')) {

    /**
     * Assets handlers class
     */
    class Egns_Assets
    {

        /**
         * Class constructor
         */
        function __construct()
        {
            // Theme setup and admin enqueue files
            add_action('admin_enqueue_scripts', array($this, 'egns_enqueue_admin_assets'));

            // Theme setup and enqueue files
            add_action('wp_enqueue_scripts', array($this, 'egns_enqueue_assets'));
        }

        /**
         * Return all available scripts
         *
         * @version 1.0.0
         * @return array
         */
        function egns_get_scripts()
        {
            return [
                'popper' => [
                    'src'     => EGNS_ASSETS_ROOT . '/js/popper.min.js',
                    'version' => filemtime(EGNS_ASSETS_ROOT_DIR . '/js/popper.min.js'),
                    'deps'    => ['jquery']
                ],
                'bootstrap' => [
                    'src'     => EGNS_ASSETS_ROOT . '/js/bootstrap.min.js',
                    'version' => filemtime(EGNS_ASSETS_ROOT_DIR . '/js/bootstrap.min.js'),
                    'deps'    => ['jquery']
                ],
                'swiper-bundle' => [
                    'src'     => EGNS_ASSETS_ROOT . '/js/swiper-bundle.min.js',
                    'version' => filemtime(EGNS_ASSETS_ROOT_DIR . '/js/swiper-bundle.min.js'),
                    'deps'    => ['jquery']
                ],
                'slick' => [
                    'src'     => EGNS_ASSETS_ROOT . '/js/slick.js',
                    'version' => filemtime(EGNS_ASSETS_ROOT_DIR . '/js/slick.js'),
                    'deps'    => ['jquery']
                ],
                'waypoints' => [
                    'src'     => EGNS_ASSETS_ROOT . '/js/waypoints.min.js',
                    'version' => filemtime(EGNS_ASSETS_ROOT_DIR . '/js/waypoints.min.js'),
                    'deps'    => ['jquery']
                ],
                'counterup-min' => [
                    'src'     => EGNS_ASSETS_ROOT . '/js/jquery.counterup.min.js',
                    'version' => filemtime(EGNS_ASSETS_ROOT_DIR . '/js/jquery.counterup.min.js'),
                    'deps'    => ['jquery']
                ],
                'wow' => [
                    'src'     => EGNS_ASSETS_ROOT . '/js/wow.min.js',
                    'version' => filemtime(EGNS_ASSETS_ROOT_DIR . '/js/wow.min.js'),
                    'deps'    => ['jquery']
                ],
                'gsap-min' => [
                    'src'     => EGNS_ASSETS_ROOT . '/js/gsap.min.js',
                    'version' => filemtime(EGNS_ASSETS_ROOT_DIR . '/js/gsap.min.js'),
                    'deps'    => ['jquery']
                ],
                'scroll-smoother' => [
                    'src'     => EGNS_ASSETS_ROOT . '/js/ScrollSmoother.min.js',
                    'version' => filemtime(EGNS_ASSETS_ROOT_DIR . '/js/ScrollSmoother.min.js'),
                    'deps'    => ['jquery']
                ],
                'scroll-trigger' => [
                    'src'     => EGNS_ASSETS_ROOT . '/js/ScrollTrigger.min.js',
                    'version' => filemtime(EGNS_ASSETS_ROOT_DIR . '/js/ScrollTrigger.min.js'),
                    'deps'    => ['jquery']
                ],
                'drawsvg-plugin' => [
                    'src'     => EGNS_ASSETS_ROOT . '/js/DrawSVGPlugin3.min.js',
                    'version' => filemtime(EGNS_ASSETS_ROOT_DIR . '/js/DrawSVGPlugin3.min.js'),
                    'deps'    => ['jquery']
                ],
                'throwable-min' => [
                    'src'     => EGNS_ASSETS_ROOT . '/js/jquery.throwable.js',
                    'version' => filemtime(EGNS_ASSETS_ROOT_DIR . '/js/jquery.throwable.js'),
                    'deps'    => ['jquery']
                ],
                'type' => [
                    'src'     => EGNS_ASSETS_ROOT . '/js/type.js',
                    'version' => filemtime(EGNS_ASSETS_ROOT_DIR . '/js/type.js'),
                    'deps'    => ['jquery']
                ],
                'smoother-script' => [
                    'src'     => EGNS_ASSETS_ROOT . '/js/smoother-script.js',
                    'version' => filemtime(EGNS_ASSETS_ROOT_DIR . '/js/smoother-script.js'),
                    'deps'    => ['jquery']
                ],
                'egns-nice-select' => [
                    'src'     => EGNS_ASSETS_ROOT . '/js/jquery.nice-select.min.js',
                    'version' => filemtime(EGNS_ASSETS_ROOT_DIR . '/js/jquery.nice-select.min.js'),
                    'deps'    => ['jquery']
                ],
                'fancybox' => [
                    'src'     => EGNS_ASSETS_ROOT . '/js/jquery.fancybox.min.js',
                    'version' => filemtime(EGNS_ASSETS_ROOT_DIR . '/js/jquery.fancybox.min.js'),
                    'deps'    => ['jquery']
                ],
                'confetti-browser' => [
                    'src'     => EGNS_ASSETS_ROOT . '/js/confetti.browser.min.js',
                    'version' => filemtime(EGNS_ASSETS_ROOT_DIR . '/js/confetti.browser.min.js'),
                    'deps'    => ['jquery']
                ],
                'marquee' => [
                    'src'     => EGNS_ASSETS_ROOT . '/js/jquery.marquee.min.js',
                    'version' => filemtime(EGNS_ASSETS_ROOT_DIR . '/js/jquery.marquee.min.js'),
                    'deps'    => ['jquery']
                ],
                'custom-main' => [
                    'src'     => EGNS_ASSETS_ROOT . '/js/custom.js',
                    'version' => filemtime(EGNS_ASSETS_ROOT_DIR . '/js/custom.js'),
                    'deps'    => ['jquery']
                ],

            ];
        }


        /**
         * Return all available styles
         *
         * @version 1.0.0
         * @return array
         */
        function egns_get_styles()
        {
            return [
                'egns-fonts' => [
                    'src'     => 'https://fonts.googleapis.com/css2?family=DM+Sans:ital,opsz,wght@0,9..40,100..1000;1,9..40,100..1000&family=Manrope:wght@200..800&display=swap',
                    'deps'    => [],
                    'version' => null,
                ],
                'bootstrap' => [
                    'src'     => EGNS_ASSETS_ROOT . '/css/bootstrap.min.css',
                    'version' => filemtime(EGNS_ASSETS_ROOT_DIR . '/css/bootstrap.min.css'),
                ],
                'bootstrap-icons' => [
                    'src'     => EGNS_ASSETS_ROOT . '/css/bootstrap-icons.css',
                    'version' => filemtime(EGNS_ASSETS_ROOT_DIR . '/css/bootstrap-icons.css'),
                ],
                'boxicons' => [
                    'src'     => EGNS_ASSETS_ROOT . '/css/boxicons.min.css',
                    'version' => filemtime(EGNS_ASSETS_ROOT_DIR . '/css/boxicons.min.css'),
                ],
                'swiper-bundle' => [
                    'src'     => EGNS_ASSETS_ROOT . '/css/swiper-bundle.min.css',
                    'version' => filemtime(EGNS_ASSETS_ROOT_DIR . '/css/swiper-bundle.min.css'),
                ],
                'egns-datetimepicker-select' => [
                    'src'     => EGNS_ASSETS_ROOT . '/css/bootstrap-datetimepicker.min.css',
                    'version' => filemtime(EGNS_ASSETS_ROOT_DIR . '/css/bootstrap-datetimepicker.min.css'),
                ],
                'egns-nice-select' => [
                    'src'     => EGNS_ASSETS_ROOT . '/css/nice-select.css',
                    'version' => filemtime(EGNS_ASSETS_ROOT_DIR . '/css/nice-select.css'),
                ],
                'egns-slick-theme-select' => [
                    'src'     => EGNS_ASSETS_ROOT . '/css/slick.css',
                    'version' => filemtime(EGNS_ASSETS_ROOT_DIR . '/css/slick.css'),
                ],
                'egns-slick-select' => [
                    'src'     => EGNS_ASSETS_ROOT . '/css/slick-theme.css',
                    'version' => filemtime(EGNS_ASSETS_ROOT_DIR . '/css/slick-theme.css'),
                ],
                'animate' => [
                    'src'     => EGNS_ASSETS_ROOT . '/css/animate.min.css',
                    'version' => filemtime(EGNS_ASSETS_ROOT_DIR . '/css/animate.min.css'),
                ],
                'fancybox' => [
                    'src'     => EGNS_ASSETS_ROOT . '/css/jquery.fancybox.min.css',
                    'version' => filemtime(EGNS_ASSETS_ROOT_DIR . '/css/jquery.fancybox.min.css'),
                ],
                'egns-ui' => [
                    'src'     => EGNS_ASSETS_ROOT . '/css/jquery-ui.css',
                    'version' => filemtime(EGNS_ASSETS_ROOT_DIR . '/css/jquery-ui.css'),
                ],
                'blog-and-pages' => [
                    'src'     => EGNS_ASSETS_ROOT . '/css/blog-and-pages.css',
                    'version' => filemtime(EGNS_ASSETS_ROOT_DIR . '/css/blog-and-pages.css'),
                ],
                'egns-woocommerce' => [
                    'src'     => EGNS_ASSETS_ROOT . '/css/woocommerce-custom.css',
                    'version' => filemtime(EGNS_ASSETS_ROOT_DIR . '/css/woocommerce-custom.css'),
                ],
                'egns-style' => [
                    'src'     => EGNS_ASSETS_ROOT . '/css/style.css',
                    'version' => filemtime(EGNS_ASSETS_ROOT_DIR . '/css/style.css'),
                ],
                'egns-theme' => [
                    'src'     => EGNS_ROOT . '/style.css',
                    'version' => rand(10, 100),
                ],

            ];
        }


        /**
         * Egens enqueue scripts and styles 
         * 
         * @since 1.0.0
         * 
         * @return void
         */
        public function egns_enqueue_assets()
        {
            $scripts = $this->egns_get_scripts();
            $styles  = $this->egns_get_styles();


            // Applied filter hook for scripts and styles
            $scripts = apply_filters('egns_filter_scripts', $scripts);
            $styles  = apply_filters('egns_filter_styles', $styles);

            // Enqueue all styles
            foreach ($styles as $handle => $style) {
                $deps = isset($style['deps']) ? $style['deps'] : false;

                wp_enqueue_style($handle, $style['src'], $deps, $style['version'], 'all');
            }

            // Enqueue all scripts
            foreach ($scripts as $handle => $script) {
                $deps = isset($script['deps']) ? $script['deps'] : false;

                wp_enqueue_script($handle, $script['src'], $deps, $script['version'], true);
            }

            if (is_singular() && comments_open() && get_option('thread_comments')) {
                wp_enqueue_script('comment-reply');
            }

            // Localize script 
            $objects = array(
                'sticky_header'  => class_exists('Egns_Core') ? Egns_Helper::sticky_header_enable() : '',
                'ajaxurl'        => admin_url('admin-ajax.php'),
                'posts_per_page' => get_option('posts_per_page'),
                'author_id'      => get_the_author_meta('ID'),
                'cart_url'       => class_exists('WooCommerce') ? wc_get_cart_url() : '',
                'nonce'          => wp_create_nonce('ajax-nonce')
            );
            wp_localize_script('custom-main', 'localize_params', $objects);
        }


        /**
         * Return all available admin styles
         *
         * @version 1.0.0
         * @return array
         */
        function egns_get_admin_styles()
        {
            return [
                'egns-admin-style' => [
                    'src'     => EGNS_ASSETS_ROOT . '/css/admin.css',
                    'version' => filemtime(EGNS_ASSETS_ROOT_DIR . '/css/admin.css'),
                ],

            ];
        }


        /**
         * Egens enqueue admin scripts and styles 
         * 
         * @since 1.0.0
         * 
         * @return void
         */
        public function egns_enqueue_admin_assets()
        {
            $admin_styles = $this->egns_get_admin_styles();

            // Applied filter hook for styles
            $admin_styles = apply_filters('egns_filter_admin_styles', $admin_styles);

            // Enqueue all admin styles
            foreach ($admin_styles as $handle => $admin_style) {
                $deps = isset($admin_style['deps']) ? $admin_style['deps'] : false;

                wp_enqueue_style($handle, $admin_style['src'], $deps, $admin_style['version'], 'all');
            }
        }
    }
}
