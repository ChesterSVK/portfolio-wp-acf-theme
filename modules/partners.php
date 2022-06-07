<?php

$title = get_sub_field('title');
$partners = get_sub_field('partners');


?>

<!-- Started -->
<div id="partneri" class="section partners-section">
    <div class="container">
        <?php if ($title) : ?>
            <div class="title">
                <h2>
                    <?php echo esc_html($title); ?>
                </h2>
            </div>
        <?php endif; ?>

        <?php if ($partners) : ?>
            <div class="partner-items">
                <?php foreach ($partners as $item) { ?>
                    <div class="partner-item">
                        <?php if ($item['logo'] && $item['link']) { ?>
                            <a href="<?= $item['link'] ?>" target="_blank" rel="noopener" title="Partner"
                               class="partner-link">
                                <img src="<?= $item['logo']; ?>" alt="Partner Image" class="partner-logo">
                            </a>
                        <?php } else if ($item['logo']) { ?>
                            <img src="<?= $item['logo']; ?>" alt="Partner Image" class="partner-logo">
                        <?php } ?>
                    </div>
                <?php } ?>
            </div>
        <?php endif; ?>
    </div>
</div>