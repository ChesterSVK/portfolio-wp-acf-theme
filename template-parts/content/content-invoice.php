<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package glitche
 */


if (!is_single()){
    ?>
    <a class="invoice-link" href="<?= get_permalink()?>" title="<?= get_the_title()?>">
        <?= get_the_title()?>
    </a>
    <?php
} else {
    ?>
    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        <div class="single-invoice">
            <?php if (isMobile()) {
                ?>
                <a href="<?= get_field('document')?>" target="_blank" rel="noopener" class="icon link document"><?= __('Click here to show document', THEME_DOMAIN)?></a>
                <?php
            } else { ?>
                <iframe src="<?= get_field('document')?>"></iframe>
        <?php } ?>
        </div>
    </article><!-- #post-<?php the_ID(); ?> -->
<?php
}