<?php
/**
 * List posts shortcode
 */

if (!function_exists('list_posts_init_shortcode')) {
    function list_posts_init_shortcode($atts)
    {
        $a = shortcode_atts(array(
            'per-page' => '10',
            'limit' => '10',
            'link_to' => '',
            'link_to_label' => '',
            'cat' => '',
            'not' => '',
        ), $atts);

        $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
        $args = array('post_type' => 'post', 'posts_per_page' => $a['per-page'], 'paged' => $paged);
        if ($a['cat']) {
            $args['tax_query'] = array(
                array(
                    'taxonomy' => 'category',
                    'field' => 'term_id',
                    'terms' => $a['cat'],
                ),
            );
        }


        if ($a['not']) {
            $args['category__not_in'] = $a['not'];
        }
        $wp_query = new WP_Query($args);
        if ($wp_query->have_posts()) {
            ob_start();
            echo '<div class="list-posts-section">';
            while ($wp_query->have_posts()) : $wp_query->the_post();
                get_template_part('template-parts/content/content', 'post');
            endwhile;

            if ($a['link_to']) {
                echo '<a class="show-all-btn btn-primary effect-btn black ' . (isset($header_style) && $header_style == 'light' ? 'gray' : '') . '" href="' . $a['link_to'] . '" title="' . ($a['link_to_label'] ? $a['link_to_label'] : __('All posts', THEME_DOMAIN)) . '"><svg><rect x="0" y="0" fill="none" width="100%" height="100%"/></svg>' . ($a['link_to_label'] ? $a['link_to_label'] : __('All posts', THEME_DOMAIN)) . '</a>';
            } else {
                echo '<div class="container narrow">';
                echo '<div class="post-pagination">';
                next_posts_link('&#8592; ' . __('Older posts', THEME_DOMAIN), $wp_query->max_num_pages);
                previous_posts_link(__('Newer posts', THEME_DOMAIN) . ' &#8594;');
                echo '</div>';
                echo '</div>';

            }
            echo '</div>';
            wp_reset_postdata();
            $result = ob_get_clean();
            return $result;
        } else {
            ob_start();
            echo '<h4 class="no-posts-title">' . __('No posts', THEME_DOMAIN) . '</h4>';
            $result = ob_get_clean();
            return $result;

        }
    }
}
