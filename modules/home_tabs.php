<?php
$title = get_sub_field('title');
$description = get_sub_field('description');
$label_heading = get_sub_field('label_heading');
$label_link = get_sub_field('label_link');
$season = get_sub_field('season');
$season_link = get_sub_field('season_link');


wp_add_inline_script(THEME_MODULES_EFFECTS_ID, '
const ACF_FIELDS = {"tabs" : ' . json_encode(get_sub_field('tabs')) . '};', 'before');

?>

<!-- Started Home Tabs -->
<div class="section home-tabs-section">
    <div class="container">
        <div class="title-section">
            <div class="section-left">
                <?php if ($title) : ?>
                    <div class="title">
                        <h2>
                            <?php echo $title; ?>
                        </h2>
                    </div>
                <?php endif; ?>
                <?php if ($description) : ?>
                    <div class="description">
                        <h6>
                            <?php echo esc_html($description); ?>
                        </h6>
                    </div>
                <?php endif; ?>
            </div>
            <div class="section-right">
                <?php if ($label_heading) : ?>
                    <div class="label-heading">
                        <a class="btn effect-btn from-top red" href="<?= $label_link; ?>" title="<?= esc_html($label_heading); ?>">
                            <svg>
                                <rect x="0" y="0" fill="none" width="100%" height="100%"/>
                            </svg>
                            <?= esc_html($label_heading); ?>
                        </a>
                    </div>
                <?php endif; ?>

                <?php if ($season) : ?>
                    <div class="season">
                        <a  class="btn effect-btn from-top gray" href="<?= $season_link; ?>" title="<?= esc_html($season); ?>">
                            <svg>
                                <rect x="0" y="0" fill="none" width="100%" height="100%"/>
                            </svg>
                            <?= esc_html($season); ?>
                        </a>
                    </div>
                <?php endif; ?>
            </div>
        </div>
        <div id="home-tabs">
        </div>
    </div>
</div>