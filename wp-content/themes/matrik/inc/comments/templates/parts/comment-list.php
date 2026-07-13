<div class="row mt-120">
    <div class="col-lg-12">
        <div class="comment-area <?php echo comments_open() ? 'mb-70' : '' ?>" id="scroll-section2">
            <div class="title">
                <h3>
                    <?php comments_number(esc_html__('0 Comment', 'matrik'), esc_html__('01 Comment', 'matrik'), esc_html__('Comments (%)', 'matrik')); ?>
                </h3>
            </div>
            <ul class="comment">
                <?php
                wp_list_comments(array(
                    'short_ping' => true,
                    'callback' => 'egns_comment_callback',
                ));
                ?>
                <?php
                the_comments_navigation();

                // If comments are closed and there are comments, let's leave a little note, shall we?
                if (!comments_open()) {
                    echo '<p class="no-comments">' . esc_html__('Comments are closed.', 'matrik') . '</p>';
                }
                ?>
            </ul>
        </div>
    </div>
</div>