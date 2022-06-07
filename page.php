<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package glitche
 */

get_header();
?>
    <!-- Blog -->
    <div class="section page-section">
        <div class="container">
            <div class="section spacer" style="height: 20vh; min-height:200px; max-height:500px;"></div>
            <?php if ( have_posts() ) : ?>
                <div class="news-wrapper">
                    <?php
                    /* Start the Loop */
                    while ( have_posts() ) :
                        the_post();
                        /*
                         * Include the Post-Type-specific template for the content.
                         * If you want to override this in a child theme, then include a file
                         * called content-___.php (where ___ is the Post Type name) and that will be used instead.
                         */
                        get_template_part( 'template-parts/content/content', get_post_type() );
                    endwhile;
                    ?>
                </div>
            <?php else :
                get_template_part( 'template-parts/content', 'none' );
            endif; ?>

            <div class="clear"></div>
        </div>
    </div>
<?php
get_footer();