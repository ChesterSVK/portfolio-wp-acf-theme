<?php

if (!defined('get_asset_suffix')) {
    function get_asset_suffix($suffix, $state = WP_APPLICATION_STATE_DEV) {
        if ($state == WP_APPLICATION_STATE_PROD) {
            return '.min.' . $suffix;
        }
        return '.' . $suffix;
    }
}

if (!function_exists('get_default_thumbnail_url')) {
    function get_default_thumbnail_url(){
        return THEME_ASSETS_DIR_URI . '/img/default.png';
    }
}

