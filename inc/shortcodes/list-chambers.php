<?php
/**
 * List posts shortcode
 */

if (!function_exists('list_chambers_init_shortcode')) {
    function list_chambers_init_shortcode($atts)
    {
        $a = shortcode_atts(array(
            'per-page' => '-1',
            'limit' => '-1',
            'link_to' => '',
            'link_to_label' => ''
        ), $atts);

        $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
        $args = array('post_type' => 'chamber', 'posts_per_page' => $a['per-page'], 'paged' => $paged);
        $wp_query = new WP_Query($args);
        if ($wp_query->have_posts()) {
            ob_start();
            echo '<div class="list-chambers-section">';
            while ($wp_query->have_posts()) : $wp_query->the_post();
                get_template_part('template-parts/content/content', 'chamber');
            endwhile;
            echo '</div>';
            wp_reset_postdata();
            $result = ob_get_clean();
            return $result;
        }
    }
}
