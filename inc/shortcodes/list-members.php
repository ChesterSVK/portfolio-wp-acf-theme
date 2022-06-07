<?php
/**
 * List posts shortcode
 */

if (!function_exists('list_members_init_shortcode')) {
    function list_members_init_shortcode($atts)
    {
        $a = shortcode_atts(array(
            'per-page' => '-1',
            'limit' => '-1',
            'link_to' => '',
            'link_to_label' => '',
            'cat' => '',
            'style' => '1',
            'filter' => false,
            'exclude' => "",
            'ordering' => ""
        ), $atts);

        $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
        $args = array(
            'post_type' => 'member',
            'posts_per_page' => $a['per-page'],
            'paged' => $paged,
        );

        if ($a['cat']) {
            $args['tax_query'] = array(
                array(
                    'taxonomy' => 'member_category', //double check your taxonomy name in you dd
                    'field' => 'id',
                    'terms' => $a['cat'],
                ));
        }

        if ($a['exclude']) {
            if (isset($args['tax_query'])) {
                array_push($args['tax_query'], array(
                    'taxonomy' => 'member_category', //double check your taxonomy name in you dd
                    'field' => 'id',
                    'operator' => 'NOT IN',
                    'terms' => $a['exclude'],
                ));
            } else {
                $args['tax_query'] = array(
                    array(
                        'taxonomy' => 'member_category', //double check your taxonomy name in you dd
                        'field' => 'id',
                        'operator' => 'NOT IN',
                        'terms' => $a['exclude'],
                    ));
            }
        }

        $wp_query = new WP_Query($args);
        if ($wp_query->have_posts()) {
            ob_start();
            if ($a['filter']) {
                echo '<ul class="members-filter-category">';

                $ordering = explode(',', $a['ordering']);
                if ($ordering && count($ordering) > 1){
                    echo '<li class="member-filter-item" data-cat="">' . __('All', THEME_DOMAIN) . '</li>';
                    foreach ($ordering as $order_item) {
                        $term = get_term_by('ID', $order_item, 'member_category');
                        echo '<li class="member-filter-item" data-cat="' . $term->slug . '">' . $term->name . '</li>';
                    }
                } else {
                    $terms = get_terms([
                        'taxonomy' => 'member_category',
                        'hide_empty' => false,
                        'exclude' => explode(',', $a['exclude']),
                        'orderby' => 'ID',
                        'order' => 'ASC',
                    ]);
                    echo '<li class="member-filter-item" data-cat="">' . __('All', THEME_DOMAIN) . '</li>';
                    foreach ($terms as $term) {
                        echo '<li class="member-filter-item" data-cat="' . $term->slug . '">' . $term->name . '</li>';
                    }
                }
                echo '</ul>';
            }


            echo '<div class="list-members-section">';
            while ($wp_query->have_posts()) : $wp_query->the_post();
                get_template_part('template-parts/content/content', 'member-style-' . $a['style']);
            endwhile;
            echo '</div>';
            wp_reset_postdata();
            $result = ob_get_clean();
            return $result;
        }
    }
}
