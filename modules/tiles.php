<?php
$title = get_sub_field('title');
$content_main = get_sub_field('content_main');
$content_left = get_sub_field('content_left');
$content_right = get_sub_field('content_right');
$links = get_sub_field('links');

?>

<!-- Started TILES -->
<div class="section tiles-section">
    <div class="container">
        <div class="tile-wrapper">
            <div class="tile-row upper">
                <?php if ($title) : ?>
                    <div class="title">
                        <h2>
                            <?php echo esc_html($title); ?>
                        </h2>
                    </div>
                <?php endif; ?>

                <div class="upper-content">
                    <?php if ($content_main) : ?>
                        <div class="content-main page-content">
                            <?php echo $content_main; ?>
                        </div>
                    <?php endif; ?>
                    <?php if ($links) : ?>
                        <div class="content-links">
                            <?php foreach ($links as $link) {?>
                            <a class="link-wrapper" href="<?= $link['link']?>" title="<?= $link['label']?>" target="_blank">
                                <img src="<?= $link['icon']?>" alt="Link Icon" width="30" height="30" class="link-icon">
                                <?= $link['label']?>
                            </a>
                            <?php }?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
            <div class="tile-row lower">
                <?php if ($content_left) : ?>
                    <div class="content-left page-content">
                        <?= $content_left; ?>
                    </div>
                <?php endif; ?>

                <?php if ($content_right) : ?>
                    <div class="content-right page-content">
                        <?= $content_right?>
                    </div>
                <?php endif; ?>
            </div>

        </div>
    </div>
</div>