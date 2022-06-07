<?php
/**
 * List posts shortcode
 */

if (!function_exists('list_invoices_init_shortcode')) {
    function list_invoices_init_shortcode($atts)
    {
        $a = shortcode_atts(array(
            'per-page' => '-1',
            'limit' => '-1',
        ), $atts);

        $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
        $args = array('post_type' => 'invoice', 'posts_per_page' => $a['per-page'], 'paged' => $paged);
        $years = get_terms(
            [
                'taxonomy' => 'invoice_category'
            ]);
        ob_start();
        for ($i = count($years) - 1; $i >= 0; $i--) { ?>
            <div class="invoice-wrapper">
                <h2 class="invoice-year-title"> <?= $years[$i]->name; ?></h2>
                <?php $args['tax_query'] =
                    array(array(
                        'taxonomy' => 'invoice_category',
                        'field' => 'id',
                        'terms' => $years[$i]->term_id
                    ));
                $wp_query = new WP_Query($args);
                if ($wp_query->have_posts()) { ?>
                    <div class="list-invoice-section invoice-year-id-<?= $years[$i]->term_id ?>">
                        <?php while ($wp_query->have_posts()) : $wp_query->the_post();
                            get_template_part('template-parts/content/content', 'invoice');
                        endwhile; ?>
                    </div>
                <?php } ?>
            </div>
        <?php }

        wp_reset_postdata();
        $result = ob_get_clean();
        return $result;
    }
}
