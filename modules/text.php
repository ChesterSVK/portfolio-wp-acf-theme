<?php
$title = get_sub_field('title');
$text = get_sub_field('text');
$narrow = get_sub_field('narrow');

?>

<!-- Started Text -->
<div class="section text-section">
    <div class="container">
        <?php if ($title) : ?>
            <div class="title">
                <h2>
                    <?php echo esc_html($title); ?>
                </h2>
            </div>
        <?php endif; ?>
        <?php if ($text) : ?>
            <div class="page-content <?= (isset($narrow) && $narrow ? 'narrow' : '')?>">
                <?= $text?>
            </div>
        <?php endif; ?>
    </div>
</div>