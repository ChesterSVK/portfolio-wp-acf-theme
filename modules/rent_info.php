<?php
$content = get_sub_field('content');
$contacts = get_sub_field('contacts');
$gallery = get_sub_field('gallery');

wp_add_inline_script(THEME_MODULES_EFFECTS_ID, '
                const ACF_FIELDS = {"lightbox_images" : ' . json_encode($gallery) . '};', 'before');
?>

<!-- Rent info -->
<div class="section rent-section">
    <div class="container">
        <?php if ($content) : ?>
            <div class="content">
                <?= $content; ?>
            </div>
        <?php endif; ?>

        <?php if ($contacts) : ?>
            <div class="contacts-row">
                <?php
                foreach ($contacts as $contact) {
                    ?>
                    <a href="<?= $contact['link']; ?>" class="contact-item" target="_blank"
                       title="<?= $contact['label']; ?>">
                        <img width="50" height="50" class="icon svg" src="<?= $contact['icon']; ?>" alt="Contact icon">
                        <?= $contact['label']; ?>
                    </a>
                <?php } ?>
            </div>
        <?php endif; ?>

        <?php if ($gallery) : ?>
            <div id="lightbox-gallery" class="gallery-row">
            </div>
        <?php endif; ?>
    </div>
</div>