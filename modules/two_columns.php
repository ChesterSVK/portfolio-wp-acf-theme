<?php

$title1 = get_sub_field('column_1_title');
$title2 = get_sub_field('column_2_title');
$content1 = get_sub_field('column_1_content');
$content2 = get_sub_field('column_2_content');


?>

<!-- Started -->
<div class="section two-columns-section">
    <div class="container">
        <div class="column-left">
            <?php if ($title1) : ?>
                <div class="title">
                    <h2>
                        <?php echo esc_html($title1); ?>
                    </h2>
                </div>
            <?php endif; ?>
            <?php if ($content1) : ?>
                <div class="content">
                    <?= $content1; ?>
                </div>
            <?php endif; ?>
        </div>
        <div class="column-right">
            <?php if ($title2) : ?>
                <div class="title">
                    <h2>
                        <?php echo esc_html($title2); ?>
                    </h2>
                </div>
            <?php endif; ?>
            <?php if ($content2) : ?>
                <div class="content">
                    <?= $content2; ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>