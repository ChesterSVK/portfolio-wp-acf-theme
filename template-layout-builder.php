<?php
/**
 * Template Name: Layout builder
 *
 * Black background white fonts
 *
 * @package glitche
 */

get_header();

if ( get_field( 'layout' ) ) :
	parse_acf_subfield_components();
endif;

get_footer();