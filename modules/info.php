<?php
$title = get_sub_field('title');
$text = get_sub_field('text');
?>

<!-- Started -->
<div class="section info-section">
    <div class="container">
        <?php if ($title) : ?>
            <div class="title">
                <h2>
                    <?php echo esc_html($title); ?>
                </h2>
            </div>
        <?php endif; ?>
        <?php if ($text) : ?>
            <div class="text page-content">
                <?php echo $text; ?>
            </div>
        <?php endif; ?>
    </div>
</div>