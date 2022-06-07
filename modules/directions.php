<?php
$title1 = get_sub_field('title1');
$items1 = get_sub_field('items1');
$title2 = get_sub_field('title2');
$items2 = get_sub_field('items2');

?>

<!-- Started directions -->
<div id="directions" class="section directions-section">
    <div class="container">
        <div class="directions directions-1">
            <?php if ($title1) : ?>
                <div class="title">
                    <h2>
                        <?php echo esc_html($title1); ?>
                    </h2>
                </div>
            <?php endif; ?>
            <?php if ($items1) : ?>
                <div class="directions-items">
                    <?php foreach ($items1 as $item) { ?>
                        <div class="direction-item">
                            <div class="direction-icon">
                                <img width="24" height="24" src="<?= $item['icon'] ?>" alt="Direction">
                            </div>
                            <p class="direction-text">
                                <?= $item['text'] ?>
                            </p>
                        </div>
                    <?php } ?>
                </div>
            <?php endif; ?>
        </div>
        <div class="directions directions-2">
            <?php if ($title2) : ?>
                <div class="title">
                    <h2>
                        <?php echo esc_html($title2); ?>
                    </h2>
                </div>
            <?php endif; ?>
            <?php if ($items2) : ?>
                <div class="directions-items">
                    <?php foreach ($items2 as $item) { ?>
                        <div class="direction-item">
                            <div class="direction-icon">
                                <img width="24" height="24" src="<?= $item['icon'] ?>" alt="Direction">
                            </div>
                            <p class="direction-text">
                                <?= $item['text'] ?>
                            </p>
                        </div>
                    <?php } ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>