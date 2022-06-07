<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 *
* @package Kognit
* @subpackage KogniT
* @since KogniT 1.0
*/

// Disable unnecessary files loading, keep it before get header function
include_once THEME_INC_DIR . '/optimization/front-page.php';

include_once 'template-layout-builder.php';