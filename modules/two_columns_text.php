<?php

$title = get_sub_field('title');
$subtitle = get_sub_field('subtitle');
$content1 = get_sub_field('content_left');
$content2 = get_sub_field('content_right');


?>

<!-- Started -->
<div class="section two-columns-text-section">
    <div class="container">
        <?php if ($subtitle) : ?>
            <div class="subtitle">
                <h3>
                    <?php echo esc_html($subtitle); ?>
                </h3>
            </div>
        <?php endif; ?>
        <?php if ($title) : ?>
            <div class="title">
                <h2>
                    <?php echo esc_html($title); ?>
                </h2>
            </div>
        <?php endif; ?>
        <div class="columns-wrapper">
            <?php if ($content1) : ?>
                <div class="column-left">
                    <div class="content page-content">
                        <?= $content1; ?>
                    </div>
                </div>
            <?php endif; ?>
            <?php if ($content2) : ?>
            <div class="column-right">
                <div class="content page-content">
                    <?= $content2; ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>