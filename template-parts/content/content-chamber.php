<?php
/**
 * Template part for displaying chambers
 *
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class((is_single() ? 'single-view' : '')); ?>>

    <?php

    if (is_single()) {

        $banner = get_field('banner_image');
        $members_list = get_field('members');

        ?>
        <div class="container">
            <div class="chamber-wrapper">
                <?php
                if ($banner) {
                    ?>
                    <div class="chamber-banner">
                        <img width="1282" height="380" src="<?= $banner ?>" alt="<?= get_the_title() ?>">
                    </div>
                    <?php
                }

                the_title('<h2 class="chamber-title">', '</h2>');

                if ($members_list) {
                    ?>
                <div class="chamber-members">
                    <?php foreach ($members_list as $member)
                        echo '<div class="chamber-member"><h4 class="member-title">' . $member['name'] . '</h4><p class="member-position">' . $member['position'] . '</p></div>';
                        ?>
                </div>
                <?php
                }

                ?>

                <div class="chamber-content">
                    <?php the_content() ?>
                </div>
            </div>
        </div>
        <?php
    } else {
        ?>
        <a href="<?= get_the_permalink() ?>" title="<?= get_the_title() ?>">
            <header class="chamber-header">
                <?php
                if (has_post_thumbnail()) {
                    echo '<img width="600" height="313" src="' . get_the_post_thumbnail_url(get_the_ID(), 'large') . '" title="' . get_the_title() . '" />';
                }
                ?>
            </header>
            <?php the_title('<h3 class="chamber-title">', '</h3>') ?>
        </a>

        <?php
    }
    ?>
</article>
<!-- #chamber-<?php the_ID(); ?> -->
