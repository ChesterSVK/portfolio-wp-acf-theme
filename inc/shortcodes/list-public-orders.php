<?php
/**
 * List posts shortcode
 */

if (!function_exists('list_pos_init_shortcode')) {
    function list_pos_init_shortcode($atts)
    {
        $a = shortcode_atts(array(
            'per-page' => '-1',
            'limit' => '-1',
        ), $atts);

        $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
        $args = array('post_type' => 'public_order', 'posts_per_page' => $a['per-page'], 'paged' => $paged);
        $years = get_terms(
            [
                'taxonomy' => 'public_orders_category',
                'order' => 'desc'
            ]);
        ob_start();
        foreach ($years as $year) { ?>
            <div class="po-wrapper">
                <h2 class="po-year-title"> <?= $year->name; ?></h2>
                <?php $args['tax_query'] =
                    array(array(
                        'taxonomy' => 'public_orders_category',
                        'field' => 'id',
                        'terms' => $year->term_id
                    ));
                $wp_query = new WP_Query($args);
                if ($wp_query->have_posts()) { ?>
                    <div class="list-po-section po-year-id-<?= $years->term_id ?>">
                        <?php while ($wp_query->have_posts()) : $wp_query->the_post();
                            get_template_part('template-parts/content/content', 'public-order');
                        endwhile; ?>
                    </div>
                <?php } ?>
            </div>
            <?php
        }

        wp_reset_postdata();
        $result = ob_get_clean();
        return $result;
    }
}
