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
$event_id = Tribe__Main::post_id_helper();
$website = tribe_get_event_website_url($event_id);
$website_title = tribe_events_get_event_website_title();

?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

    <header class="post-header">
        <?php
        // Event Website
        if (!empty($website)) : ?>
            <div class="tribe-events-sale"> <?= __('Event sale', THEME_DOMAIN) ?> </div>
        <?php endif;
        ?>
    </header><!-- .entry-header -->

    <div class="post-info">
        <div class="post-left">
            <?php the_title('<h2 class="post-title">', '</h2>'); ?>
            <div class="post-excerpt">
                <?php the_excerpt(); ?>
            </div>
            <div class="post-meta">
                <?php

                get_template_part('template-parts/content/custom/custom-event-meta');

                ?>
            </div>
            <div class="post-link">
                <?php
                // Event Website
                if (!empty($website)) : ?>
                    <a class="post-link-btn effect-btn red" title="<?= __('Buy tickets', THEME_DOMAIN); ?>"
                       href="<?= $website ?>" target="_blank" rel="noopener">
                        <svg>
                            <rect x="0" y="0" fill="none" width="100%" height="100%"/>
                        </svg>
                        <?= __('Buy tickets', THEME_DOMAIN)?>
                    </a>
                <?php endif; ?>
                <a class="post-link-btn effect-btn from-top gray" title="<?= get_the_title() ?>"
                   href="<?php the_permalink() ?>">
                    <svg>
                        <rect x="0" y="0" fill="none" width="100%" height="100%"/>
                    </svg>
                    <?= __('Event details', THEME_DOMAIN) ?>
                </a>
            </div>
        </div>
        <div class="post-right">
            <?php echo get_the_post_thumbnail(get_the_ID(), 'full'); ?>
        </div>
    </div>
</article><!-- #post-<?php the_ID(); ?> -->
