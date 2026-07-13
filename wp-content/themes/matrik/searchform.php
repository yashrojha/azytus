<?php

/**
 * The template for displaying search forms
 *
 * @package matrik
 */
?>

<form method="get" id="searchform" action="<?php echo esc_url(home_url('/')); ?>" role="search">
    <div class="search-group">
        <div class="form-inner2">
            <input type="text" id="s" name="s" placeholder="<?php echo esc_attr__('Enter your keywords', 'matrik'); ?>">
            <button type="submit"><i class="bi bi-search"></i></button>
        </div>
    </div>
</form>