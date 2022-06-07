<?php
/**
 * Template part for displaying members
 *
 */
$categories = wp_get_object_terms( get_the_ID(), 'member_category', [] );

?>
<article id="post-<?php the_ID(); ?>" <?php post_class('member-style-1'); ?> data-cat="<?= ( $categories ? $categories[0]->slug : '') ?>">

    <div class="member-info">
        <?php
        if (has_post_thumbnail()){
            ?>
            <div class="member-image">
                <img width="316" height="325" src="<?= get_the_post_thumbnail_url(get_the_ID(), 'large')?>" alt="<?= get_the_title()?>">
            </div>
        <?php
        }
        ?>
        <header class="member-header">
            <?php the_title('<h2 class="title">', '</h2>'); ?>
            <div class="member-meta">
                <?= get_field('subtitle')?>
            </div>
        </header>
    </div>
</article>
<!-- #member-<?php the_ID(); ?> -->
