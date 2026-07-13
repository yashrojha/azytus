<?php

if (class_exists('CSF') && !empty(Egns\Helper\Egns_Helper::egns_get_theme_option('footer_one_template'))) {

    echo \Egns_Core\Egns_Helper::get_footer_data(Egns\Helper\Egns_Helper::egns_get_theme_option('footer_one_template'));
} else { ?>

    <footer class="footer-section">
        <div class="footer-bottom-wrap" style="background-color: #FFFBF5;">
            <div class="container">
                <div class="footer-bottom justify-content-center">
                    <div class="copyright-area">
                        <p><?php echo esc_html__('Copyright ', 'matrik') ?> <?php echo the_date('Y') ?> <a href="<?php echo esc_url('https://matrik-wp.egenstheme.com/') ?>"><?php echo esc_html__('Matrik', 'matrik') ?></a> | <?php echo esc_html__('Design By', 'matrik') ?> <a href="<?php echo esc_url('https://www.egenslab.com/') ?>"><?php echo esc_html__(' Egens Lab', 'matrik') ?></a></p>
                    </div>
                </div>
            </div>
        </div>
    </footer>

<?php } ?>