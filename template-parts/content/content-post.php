<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Twenty_Twenty_One
 * @since Twenty Twenty-One 1.0
 */

$categories = get_the_category();
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

    <header class="post-header">
        <?php
        if (!empty($categories)) {
            echo '<h6 class="post-category">' . esc_html($categories[0]->name) . '</h6>';
        }
        ?>
    </header><!-- .entry-header -->

    <div class="post-info">
        <div class="post-left">
            <a href="<?= get_permalink();?>" title="<?= get_the_title(); ?>">
                <?php the_title('<h2 class="post-title">', '</h2>'); ?>
            </a>
            <div class="post-meta">
                <?= the_date('d.m.Y', '<h6 class="post-date">', '</h6>'); ?>
            </div>
            <div class="post-excerpt">
                <?php if (is_single()) {
                    the_content();
                } else {
                    the_excerpt();
                }?>
            </div>
            <?php if (!is_single()) {
                ?>
                <div class="post-link">
                    <a class="post-link-btn effect-btn red" title="<?= get_the_title() ?>"
                       href="<?= the_permalink() ?>">
                        <svg>
                            <rect x="0" y="0" fill="none" width="100%" height="100%"/>
                        </svg>
                        <?= __('Show detail', THEME_DOMAIN) ?></a>
                </div>
            <?php
            }?>
        </div>
        <div class="post-right">
            <?php echo get_the_post_thumbnail(get_the_ID(), 'full'); ?>
        </div>
    </div>
</article><!-- #post-<?php the_ID(); ?> -->
