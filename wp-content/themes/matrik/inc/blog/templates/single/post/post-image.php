<?php

use Egns\Inc\Blog_Helper;

?>

<div class="row gy-5">
    <div class="col-lg-<?php echo is_active_sidebar('blog_sidebar') ? '8' : '12' ?>">
        <!-- Blog Meta -->
        <?php Egns\Helper\Egns_Helper::egns_template_part('blog', 'templates/common/single/meta'); ?>
        <div class="details-content-wrapper mb-80">
            <?php the_content(); ?>
        </div>
        <div class="tag-and-social-area">
            <ul class="tag-list">
                <?php
                $tags = get_the_tags();
                if ($tags) {
                    foreach ($tags as $tag) { ?>
                        <li><a href="<?php echo esc_url(get_tag_link($tag->term_id)); ?>"><span># </span><?php echo esc_html($tag->name); ?></a></li>

                <?php
                    }
                }
                ?>
            </ul>
            <?php if (class_exists('Egns_Core')) : ?>
                <div class="social-area">
                    <h6><?php echo esc_html__('Share On:', 'matrik'); ?></h6>
                    <ul class="social-link">
                        <li><a href="<?php echo esc_url('http://www.facebook.com/sharer/sharer.php?u=' . get_permalink()); ?>"><i class="bx bxl-facebook"></i></a></li>
                        <li><a href="<?php echo esc_url('http://www.twitter.com/share?url=' . get_permalink()); ?>"><i class="bi bi-twitter-x"></i></a></li>
                        <li><a href="<?php echo esc_url('http://www.pinterest.com/share?url=' . get_permalink()); ?>"><i class="bx bxl-pinterest-alt"></i></a></li>
                        <li><a href="<?php echo esc_url('http://www.instagram.com/share?url=' . get_permalink()); ?>"><i class="bx bxl-instagram"></i></a></li>
                    </ul>
                </div>
            <?php endif; ?>
        </div>
        <?php
        $prev = get_adjacent_post(false, '', true); // Get the previous post
        $next = get_adjacent_post(false, '', false); // Get the next post
        ?>
        <?php if (!empty($prev) || !empty($next)) : ?>
            <div class="details-navigation">
                <?php if (!empty($prev)) : ?>
                    <a href="<?php echo get_permalink($prev->ID); ?>" class="navigation-arrow">
                        <svg width="21" height="14" viewBox="0 0 21 14" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M20.75 7C20.75 7.41421 20.4142 7.75 20 7.75H2V6.25H20C20.4142 6.25 20.75 6.58579 20.75 7Z" />
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M10.0856 0.531506C10.3444 0.854953 10.2919 1.32692 9.96849 1.58568L3.20056 7.00003L9.96849 12.4144C10.2919 12.6731 10.3444 13.1451 10.0856 13.4685C9.82687 13.792 9.3549 13.8444 9.03145 13.5857L0.799387 7.00003L9.03145 0.414376C9.3549 0.155619 9.82687 0.20806 10.0856 0.531506Z" />
                        </svg>
                    </a>
                <?php endif; ?>
                <?php if (!empty($next->ID)) : ?>
                    <p><?php echo get_the_title($next->ID); ?></p>
                <?php endif; ?>
                <?php if (!empty($next)) : ?>
                    <a href="<?php echo get_permalink($next->ID); ?>" class="navigation-arrow">
                        <svg width="21" height="14" viewBox="0 0 21 14" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M0.095796 6.74944C0.101677 6.33526 0.442198 6.00428 0.85637 6.01016L18.8546 6.26574L18.8333 7.76559L0.835071 7.51001C0.420899 7.50413 0.0899145 7.16361 0.095796 6.74944Z" />
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M10.6671 13.3686C10.413 13.0415 10.4721 12.5703 10.7992 12.3162L17.6434 6.99845L10.953 1.48855C10.6332 1.22523 10.5875 0.752562 10.8508 0.432823C11.1142 0.113083 11.5868 0.0673482 11.9066 0.330672L20.0443 7.03255L11.7195 13.5006C11.3925 13.7548 10.9213 13.6956 10.6671 13.3686Z" />
                        </svg>
                    </a>
                <?php endif; ?>
            </div>
        <?php endif; ?>

        <!-- Comments Section -->
        <?php
        //If comments are open or we have at least one comment, load up the comment template.
        if (comments_open() || get_comments_number()) {
            comments_template();
        }
        ?>
    </div>
    <?php
    Egns\Helper\Egns_Helper::egns_template_part('sidebar', 'templates/sidebar');
    ?>
</div>