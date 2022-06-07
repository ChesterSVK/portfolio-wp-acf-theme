<?php


/**
 * Register Default Fonts
 */
function glitche_fonts_url() {
    $fonts_url = '';

    /* Translators: If there are characters in your language that are not
     * supported by Lora, translate this to 'off'. Do not translate
     * into your own language.
     */
    $roboto_mono = _x( 'on', 'Roboto Mono: on or off', 'glitche' );


//    if ( 'off' !== $roboto_mono ) {
//        $font_families = array();
//
//        $font_families[] = 'Roboto Mono:400,100,300italic,300,100italic,400italic,500,500italic,700,700italic';
//        $font_families[] = 'Roboto:100,100italic,300,300italic,400,400italic,500,500italic,700,700italic,900,900italic';
//
//        $query_args = array(
//            'family' => urlencode( implode( '|', $font_families ) ),
//            'subset' => urlencode( 'latin,latin-ext' ),
//        );
//
//        $fonts_url = add_query_arg( $query_args, 'https://fonts.googleapis.com/css' );
//    }

    return $fonts_url;
}