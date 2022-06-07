<?php
$image = get_sub_field('image');
$layout = get_sub_field('placement');
?>


<!-- Big Image -->
<div class="section big-image">
    <div class="container <?= $layout?>">
        <?php if ($image) : ?>
            <div class="image-wrapper">
                <img width="100%" height="100%" src="<?= $image ?>" class="big-image <?= pathinfo($image, PATHINFO_EXTENSION)?>" alt="Big Image">
            </div>
        <?php endif; ?>
    </div>
</div>