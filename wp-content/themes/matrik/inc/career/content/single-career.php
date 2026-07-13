<?php

use Egns\Helper\Egns_Helper;

?>

<div class="career-details-page sec-mar" id="scroll-section">
    <div class="container">
        <div class="row gy-5">
            <div class="col-lg-8">
                <div class="job-title-and-description-area mb-70">
                    <h2><?php the_title(); ?></h2>
                    <?php if (!empty(Egns\Helper\Egns_Helper::egns_career_value('career_short_description'))) : ?>
                        <div class="description-area">
                            <p><?php echo esc_html(Egns\Helper\Egns_Helper::egns_career_value('career_short_description')); ?></p>
                        </div>
                    <?php endif; ?>
                </div>
                <div class="details-content-wrapper">
                    <?php the_content(); ?>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="career-details-sidebar">
                    <div class="career-info-wrap mb-35">
                        <ul class="career-info">
                            <?php $data = Egns\Helper\Egns_Helper::egns_career_value('career_info_list');
                            foreach ($data as $career_data) : ?>
                                <li>
                                    <?php if (!empty($career_data['career_label_text'])) : ?>
                                        <span><?php echo esc_html($career_data['career_label_text']); ?></span>
                                    <?php endif; ?>
                                    <?php if (!empty($career_data['career_content_text'])) : ?>
                                        <h5><?php echo esc_html($career_data['career_content_text']); ?></h5>
                                    <?php endif; ?>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                    <button class="primary-btn1" type="submit" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        <span><?php echo esc_html__('Apply Now', 'matrik'); ?>
                        </span>
                        <span><?php echo esc_html__('Apply Now', 'matrik'); ?>
                        </span>
                        <svg class="arrow" width="23" height="23" viewBox="0 0 23 23" xmlns="http://www.w3.org/2000/svg">
                            <g>
                                <path d="M0.113861 0H22.9999V4.28425L4.32671 22.9997L0 18.7154L12.7524 6.08815L0.113861 6.20089V0Z" />
                                <path d="M23 22.9996V8.56848L16.8516 14.6566V22.9996H23Z" />
                            </g>
                        </svg>
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade job-form-modal" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <?php if (!empty(Egns_Helper::egns_career_value('career_apply_by_form_title'))) : ?>
                <div class="modal-header">
                    <h2 class="modal-title" id="exampleModalLabel"><?php echo esc_html(Egns_Helper::egns_career_value('career_apply_by_form_title')); ?></h2>
                </div>
            <?php endif; ?>
            <button type="button" class="modal-close" data-bs-dismiss="modal" aria-label="Close">
                <i class="bi bi-x-lg"></i>
            </button>
            <?php if (!empty(Egns_Helper::egns_career_value('career_apply_by_form_modal_shortcode'))) : ?>
                <div class="modal-body">
                    <?php echo do_shortcode(Egns_Helper::egns_career_value('career_apply_by_form_modal_shortcode')); ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>