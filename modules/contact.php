<?php


$title = get_sub_field('title');
$banner = get_sub_field('banner');
$form_title = get_sub_field('form_title');
$contact_form_shortcode = get_sub_field('form');
$contact_info_content = get_sub_field('contact_info_content');


?>

<!-- Started -->
<div class="section contact-section">
    <div class="contact-banner">
        <img src="<?= $banner; ?>" alt="Contact banner">
    </div>
    <div class="container">
        <?php if ($title) : ?>
            <div class="title">
                <h2>
                    <?php echo esc_html($title); ?>
                </h2>
            </div>
        <?php endif; ?>

        <div class="contact-row">
            <?php if ($contact_info_content) : ?>
                <div class="contact-info">
                    <?= $contact_info_content; ?>
                </div>
            <?php endif; ?>
            <div class="contact-form">
                <?php if ($form_title) : ?>
                    <div class="contact-form-title">
                        <h3>
                            <?php echo esc_html($form_title); ?>
                        </h3>
                    </div>
                <?php endif; ?>
                <?php if ($contact_form_shortcode) : ?>
                    <?php echo str_replace('Kontaktny formular[:en]Contact Form[:]"]', '', $contact_form_shortcode); ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>