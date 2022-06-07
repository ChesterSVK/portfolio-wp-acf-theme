<?php
$preloader_enable = get_field( 'preloader_enable', 'options' );
$preloader_text = get_field( 'preloader_text', 'options' );

if (!$preloader_enable) return;
?>

<div id="preloader">
    <div class="loader-holder">
        <span>
            <?= $preloader_text; ?>
        </span>
    </div>
</div>
