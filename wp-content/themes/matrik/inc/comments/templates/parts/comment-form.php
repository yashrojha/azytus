<div class="contact-form-area <?php echo !have_comments() ? 'mt-120' : ''; ?>">
    <?php
    // Custom comments_args here: https://codex.wordpress.org/Function_Reference/comment_form
    $commenter = wp_get_current_commenter();
    $req = get_option('require_name_email');
    $aria_req = ($req ? " aria-required='true'" : '');

    $comments_args = array(
        'title_reply' => '<h2 class="comment-title">' . esc_html__('Leave A Comment:', 'matrik') . '</h2>',
        'fields'     => apply_filters('comment_form_default_fields', array(
            'author' => '<div class="col-md-6 form-inner two mb-20 name"><label>' . esc_html__('Full Name*', 'matrik') . '</label><input id="author" name="author" type="text" value="' . esc_attr($commenter['comment_author'])
                . '" placeholder="' . esc_attr__('Enter your name', 'matrik') . '" ' . esc_html($aria_req) . '></div>',

            'email' => '<div class="col-md-6 form-inner two mb-20 email"><label>' . esc_html__('Your Email*', 'matrik') . '</label><input  id="email" name="email" type="email"  value="' . esc_attr($commenter['comment_author_email'])
                . '" placeholder="' . esc_attr__('Enter your email', 'matrik') . '" ' . esc_html($aria_req) . '></div>',
        )),
        'comment_field' => ' <div class="row"><div class="col-12 form-inner two mb-15"><label>' . esc_html__('Message*', 'matrik') . '</label><textarea class=" text__area" id="comment" name="comment" cols="45" rows="8" placeholder="' . esc_attr__('Your Message', 'matrik') . '"></textarea></div></div>',

        'submit_button' => '<div class="form-inner">
        <button type="submit" class="primary-btn3 black-bg">
            <span>' . esc_html__('Submit Now', 'matrik') . '</span>
            <span>' . esc_html__('Submit Now', 'matrik') . '</span>
            <svg class="arrow" width="23" height="23" viewBox="0 0 23 23" xmlns="http://www.w3.org/2000/svg">
                <g>
                    <path d="M0.113861 0H22.9999V4.28425L4.32671 22.9997L0 18.7154L12.7524 6.08815L0.113861 6.20089V0Z"/>
                    <path d="M23 22.9996V8.56848L16.8516 14.6566V22.9996H23Z"/>
                </g>
            </svg>
        </button>
    </div>',

        'class_submit' => 'primary-btn3 black-bg',
        'label_submit' => esc_html__('Post Comment', 'matrik'),
        'format'       => 'xhtml'
    );
    ?>
    <?php
    comment_form($comments_args);
    ?>
</div>