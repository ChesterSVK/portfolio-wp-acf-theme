<?php
/**
 * List events shortcode
 */

if (!function_exists('list_events_init_shortcode')) {
    function list_events_init_shortcode($atts)
    {
        global $post;

        $a = shortcode_atts(array(
            'per-page' => '-1',
            'link_to' => '',
            'link_to_label' => ''
        ), $atts);


//        $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
//        $args = array('post_type' => 'tribe_events', 'posts_per_page' => $a['per-page'], 'paged' => $paged);
        $events = tribe_get_events([
            'posts_per_page' => $a['per-page'],
            'start_date' => 'now',
        ]);
//        $wp_query = new WP_Query($args);
        if ($events) {
            ob_start();
            echo '<div class="list-events-section">';
            foreach ($events as $post) {
                get_template_part('template-parts/content/content', 'event');
            }
            if ($a['link_to']) {
                echo '<a class="btn-primary effect-btn red" href="' . $a['link_to'] . '" title="' . ($a['link_to_label'] ? $a['link_to_label'] : __('All events', THEME_DOMAIN)) . '"><svg><rect x="0" y="0" fill="none" width="100%" height="100%"/></svg>' . ($a['link_to_label'] ? $a['link_to_label'] : __('All events', 'default')) . '</a>';
            }
            echo '</div>';
            $result = ob_get_clean();
            return $result;
        }
    }
}
