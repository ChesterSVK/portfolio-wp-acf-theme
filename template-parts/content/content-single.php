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

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<header class="entry-header alignwide container-xxl">
        <h2 style="text-transform: none"><?= __('Realizácia')?></h2>
        <?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
	</header><!-- .entry-header -->

    <div class="entry-content row">
        <div class="col-xs-12 col-md-12">
            <div id="realisationSingle">
            </div>
        </div>
    </div>
</article><!-- #post-<?php the_ID(); ?> -->
