<?php


// disable stylesheet (example)
function disable_front_page_obsolete_items()
{

//    if (!is_front_page() || !is_home()) return;
    wp_dequeue_style('wp-block-library');
    wp_deregister_style('wp-block-library');
    wp_dequeue_style('wc-block-style');
    if (WP_WOOCOMMERCE) {
        wp_dequeue_style('woocommerce-layout');
        wp_deregister_style('woocommerce-layout');
        wp_dequeue_style('woocommerce-general');
        wp_deregister_style('woocommerce-general');
        wp_dequeue_style('woocommerce-smallscreen');
        wp_deregister_style('woocommerce-smallscreen');
    }

    wp_deregister_script('bootstrap-popper');
    wp_dequeue_script('bootstrap-popper');
    wp_deregister_script('bootstrap-bootstrap-script');
    wp_dequeue_script('bootstrap-bootstrap-script');
    wp_dequeue_script('wp-embed');
    wp_deregister_script('wp-embed');
    if (WP_APPLICATION_STATE == WP_APPLICATION_STATE_PROD) {
//        wp_deregister_script('jquery');
//        wp_deregister_script('jquery-core');
//        wp_deregister_script('jquery-migrate');
        wp_dequeue_style('dashicons');
        wp_deregister_style('dashicons');

        wp_deregister_script('hoverintent-js');
    }
    if (WP_WOOCOMMERCE) {
        wp_dequeue_script('woocommerce');
        wp_dequeue_script('wc-cart-fragments');
        wp_dequeue_script('wc-add-to-cart');
    }

}

add_action('wp_enqueue_scripts', 'disable_front_page_obsolete_items', 20);