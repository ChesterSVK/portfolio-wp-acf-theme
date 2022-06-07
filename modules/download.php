<?php
$title = get_sub_field('title');
$help = get_sub_field('help');
$items = get_sub_field('items');
?>


<!-- Downloads -->
<div class="section downloads-section">
    <div class="container">
        <?php if ($title) : ?>
            <div class="title">
                <h2>
                    <?= $title; ?>
                </h2>
            </div>
        <?php endif; ?>
        <?php if ($help) : ?>
            <div class="help">
                <?= $help; ?>
            </div>
        <?php endif; ?>
        <?php if ($items) : ?>
            <div class="download-items">
                <?php foreach ($items as $item) { ?>
                    <div class="download-item">
                        <a class="download-link" href="<?= $item['link'] ?>" target="_blank"
                           title="<?= $item['label']; ?>"><?= $item['label'] ?></a>
                    </div>
                <?php } ?>
            </div>
        <?php endif; ?>
    </div>
</div>