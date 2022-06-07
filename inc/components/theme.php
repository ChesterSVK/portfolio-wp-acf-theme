<?php

/**
 * ACF Options
 */

function glitche_acf_json_load_point( $paths ) {
    $paths = array( get_template_directory() . '/inc/acf-json' );
    if( is_child_theme() ) {
        $paths[] = get_stylesheet_directory() . '/inc/acf-json';
    }

    return $paths;
}

add_filter('acf/settings/load_json', 'glitche_acf_json_load_point');

if ( function_exists( 'acf_add_options_page' ) ) {
    // Hide ACF field group menu item
//	add_filter( 'acf/settings/show_admin', '__return_false' );

    // Add ACF Options Page
    acf_add_options_page( array(
        'page_title' 	=> esc_html__( 'Theme Options', 'glitche' ),
        'menu_title'	=> esc_html__( 'Theme Options', 'glitche' ),
        'menu_slug' 	=> 'theme-options',
        'capability'	=> 'edit_theme_options',
    ) );

    // Hide ACF Pro Update Notice
    function glitche_remove_update_notice( $value ) {
        if ( isset( $value->response[ 'advanced-custom-fields-pro/acf.php' ] ) ){
            unset( $value->response[ 'advanced-custom-fields-pro/acf.php' ] );
        }
        return $value;
    }
    add_filter( 'site_transient_update_plugins', 'glitche_remove_update_notice' );
}

function glitche_acf_json_save_point( $path ) {
    // update path
    $path = get_stylesheet_directory() . '/inc/acf-json';

    // return
    return $path;
}
add_filter( 'acf/settings/save_json', 'glitche_acf_json_save_point' );


function glitche_acf_fallback() {
    // ACF Plugin fallback
    if ( ! is_admin() && ! function_exists( 'get_field' ) ) {
        function get_field( $field = '', $id = false ) {
            return false;
        }
        function the_field( $field = '', $id = false ) {
            return false;
        }
        function have_rows( $field = '', $id = false ) {
            return false;
        }
        function has_sub_field( $field = '', $id = false ) {
            return false;
        }
        function get_sub_field( $field = '', $id = false ) {
            return false;
        }
        function the_sub_field( $field = '', $id = false ) {
            return false;
        }
        function the_sub_fields() {
            return false;
        }
    }
}
add_action( 'init', 'glitche_acf_fallback' );


/**
 * Parse components to proper JS FILES
 */
function parse_acf_subfield_components() {

    while ( has_sub_field( 'layout') ) :
        $layout = get_row_layout();
        if ( in_array($layout, THEME_SUPPORTED_MODULES)){
            get_template_part('modules/' . $layout );
        }
    endwhile;
}


function theme_excerpt_more( $more ) {
    return ' ...';
}
add_filter('excerpt_more', 'theme_excerpt_more');

function theme_excerpt_length($length){
    return 15;
}
add_filter('excerpt_length', 'theme_excerpt_length');

function theme_the_date($the_date, $format, $before, $after ){
    $date = get_the_date( $format );
    return $before . __('Published at', THEME_DOMAIN) . ' : ' . $date . $after ;
}

add_filter('the_date', 'theme_the_date', 10, 4);