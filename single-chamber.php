<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package glitche
 */


$header_default = 'dark';
$body_default = 'dark';
$footer_default = 'dark';
get_header(); ?>
    <!-- Chamber -->
    <div class="section spacer" style="height: 20vh; min-height:200px; max-height:500px;"></div>
    <div class="section chamber-single">
        <div class="content">
            <?php get_template_part( 'template-parts/content/content', 'chamber' ); ?>
            <div class="clear"></div>
        </div>
    </div>
<?php get_footer();