<?php

/**
 * Template Name: Ajax Layout builder
 *
 * Ajax template
 *
 * @package glitche
 */

if (isset($_GET['caller']) && $_GET['caller'] == 'ajax') {
    get_header('ajax');

    if ( get_field( 'layout' ) ) :
        parse_acf_subfield_components();
    endif;

    get_footer('ajax');
} else {
    include_once 'template-layout-builder.php';
}
?>
