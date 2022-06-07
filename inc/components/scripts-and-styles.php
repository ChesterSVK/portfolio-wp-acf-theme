<?php


/**
 * Enqueue styles.
 */
function theme_stylesheets()
{
    // Web fonts
    wp_enqueue_style('theme-fonts', glitche_fonts_url(), array(), null);
    /*Styles*/
    wp_enqueue_style('theme-style', get_stylesheet_directory_uri() . '/style.min.css', [], THEME_VERSION);
}

add_action('wp_enqueue_scripts', 'theme_stylesheets');


/**
 * Enqueue scripts
 *
 * @return void
 */
function theme_scripts()
{


    wp_enqueue_script('theme-main', THEME_ASSETS_DIR_URI . '/js/main' . get_asset_suffix('js'), ['jquery'], THEME_VERSION, true);

    wp_enqueue_script(THEME_MODULES_EFFECTS_ID, THEME_ASSETS_DIR_URI . '/js/dist/main' . (WP_APPLICATION_STATE == WP_APPLICATION_STATE_PROD ? '.min' : '') . '.js', ['jquery'], THEME_VERSION, true);
    wp_localize_script( THEME_MODULES_EFFECTS_ID, 'theme_ajax_object', array( 'ajax_url' => admin_url( 'admin-ajax.php' ) ) );
}

add_action('wp_enqueue_scripts', 'theme_scripts');