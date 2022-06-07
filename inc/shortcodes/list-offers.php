<?php
/**
 * List posts shortcode
 */

if (!function_exists('list_offers_init_shortcode')) {
    function list_offers_init_shortcode($atts)
    {
        $a = shortcode_atts(array(
            'per-page' => '-1',
            'limit' => '-1',
        ), $atts);

        $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
        $args = array('post_type' => 'offer', 'posts_per_page' => $a['per-page'], 'paged' => $paged);
        $wp_query = new WP_Query($args);
        if ($wp_query->have_posts()) {
            ob_start();
            echo '<div class="list-offers-section page-content">
                    <h3 style="text-align: center">' . __('Offers', THEME_DOMAIN) .'</h3>
                    <div class="container">';
            while ($wp_query->have_posts()) : $wp_query->the_post();
                get_template_part('template-parts/content/content', 'offer');
            endwhile;

            echo '</div></div>';
            wp_reset_postdata();
            $result = ob_get_clean();
            return $result;
        } else {
            ob_start();
            echo '<div><h3 style="text-align: center">' . __('No posts', THEME_DOMAIN)  . '</h3></div>';
            wp_reset_postdata();
            $result = ob_get_clean();
            return $result;
        }
         return '';
    }
}
