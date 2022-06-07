<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Kognit
 * @subpackage KogniT
 * @since KogniT 1.0
 */

$header_default = 'dark';
$body_default = 'dark';
$footer_default = 'dark';

get_header();
get_template_part('template-parts/errors/not-found');
get_footer();
