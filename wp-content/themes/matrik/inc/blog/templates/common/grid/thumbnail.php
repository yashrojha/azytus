<?php

use Egns\Inc\Blog_Helper;

?>
<?php if (has_post_thumbnail()) : ?>
    <div class="col-lg-6 col-md-5 col-sm-6">
        <a href="<?php the_permalink() ?>" class="blog-img">
            <?php the_post_thumbnail('grid2-thumb') ?>
        </a>
    </div>
<?php endif; ?>