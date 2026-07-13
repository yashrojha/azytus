<?php

use Egns\Helper\Egns_Helper;
?>

<div class="col-lg-4 col-md-6 wow animate fadeInDown" data-wow-delay="200ms" data-wow-duration="1500ms">
    <div class="product-card">
        <?php if (has_post_thumbnail()) : ?>
            <div class="product-img">
                <?php the_post_thumbnail(); ?>
                <a href="<?php the_permalink(); ?>" class="arrow">
                    <svg width="18" height="19" viewBox="0 0 18 19" xmlns="http://www.w3.org/2000/svg">
                        <path d="M0.0891088 0.0541992H18V3.40711L3.38614 18.054L0 14.7011L9.98019 4.81886L0.0891088 4.90709V0.0541992Z" />
                        <path d="M18.0004 18.0543V6.76025L13.1885 11.5249V18.0543H18.0004Z" />
                    </svg>
                </a>
            </div>
        <?php endif; ?>
        <div class="product-content">
            <h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
            <p><?php the_excerpt(); ?></p>
        </div>
    </div>
</div>