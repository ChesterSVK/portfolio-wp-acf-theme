<?php
$label = get_sub_field('label');
$link = get_sub_field('link');
$target = get_sub_field('target');
$alignment = get_sub_field('alignment');
?>


<!-- Button -->
<div class="section button-section">
    <div class="container <?= $alignment;?>">
        <?php if ($label) : ?>
            <a class="module-button effect-btn from-top gray" href="<?= $link?>" target="<?= $target?>" title="<?= $label?>">
                <svg>
                    <rect x="0" y="0" fill="none" width="100%" height="100%"/>
                </svg>
                <?= $label?>
            </a>
        <?php endif; ?>
    </div>
</div>