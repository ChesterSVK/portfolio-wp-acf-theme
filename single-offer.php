<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package glitche
 */

get_header(); ?>
    <!-- Offer -->
    <div class="section spacer" style="height: 20vh; min-height:200px; max-height:500px;"></div>
    <div class="section offer-single">
        <div class="content">
            <?php get_template_part('template-parts/content/content', 'offer'); ?>
            <div class="clear"></div>
        </div>
    </div>

<?php get_footer();