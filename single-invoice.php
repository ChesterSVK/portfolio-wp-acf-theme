<?php
/**
 * The template for displaying all single invoice
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package glitche
 */

get_header(); ?>
    <!-- Invoice -->
    <div class="section spacer" style="height: 20vh; min-height:200px; max-height:500px;"></div>
    <div class="section invoice-single">
        <div class="content container">
            <?php get_template_part('template-parts/content/content', 'invoice'); ?>
            <div class="clear"></div>
        </div>
    </div>

<?php get_footer();

