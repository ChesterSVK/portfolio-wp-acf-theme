<?php

require_once THEME_INC_DIR . '/shortcodes/list-chambers.php';
require_once THEME_INC_DIR . '/shortcodes/list-events.php';
require_once THEME_INC_DIR . '/shortcodes/list-members.php';
require_once THEME_INC_DIR . '/shortcodes/list-offers.php';
require_once THEME_INC_DIR . '/shortcodes/list-posts.php';
require_once THEME_INC_DIR . '/shortcodes/list-invoices.php';
require_once THEME_INC_DIR . '/shortcodes/list-public-orders.php';

function register_theme_shortcodes()
{
    $init_suffix = '_init_shortcode';
    $shortcodes = ['list-posts', 'list-events', 'list-members', 'list-chambers', 'list-offers', 'list-invoices', 'list-pos'];

    foreach ($shortcodes as $shortcode){
        add_shortcode( $shortcode, str_replace('-', '_', $shortcode) . $init_suffix );
    }
}

add_action('init', 'register_theme_shortcodes');