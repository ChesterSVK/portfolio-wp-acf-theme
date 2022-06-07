<?php
$title = get_sub_field('title');
$subtitle = get_sub_field('subtitle');
$description = get_sub_field('description');
$hero = get_sub_field('hero');
?>

<!-- Started HERO -->
<div class="section hero-section">
    <?php if ($hero) {
        echo '<img src="' . $hero . '" class="hero-bg" alt="Background image">';
    }?>
    <div class="container">
        <?php if ($subtitle) : ?>
            <div class="subtitle">
                <h4>
                    <?php echo esc_html($subtitle); ?>
                </h4>
            </div>
        <?php endif; ?>
        <?php if ($title) : ?>
            <div class="title">
                <h2>
                    <?php echo esc_html($title); ?>
                </h2>
            </div>
        <?php endif; ?>
        <?php if ($description) : ?>
            <div class="description">
                <h5>
                    <?php echo esc_html($description); ?>
                </h5>
            </div>
        <?php endif; ?>
    </div>
</div>