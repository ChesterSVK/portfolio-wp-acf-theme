<?php
/*
 * Template Name: Ajax Content
 * Description: A Page Template with a Page Builder design.
 */

if (isset($_GET['caller'])) {
    if ($_GET['caller'] == 'ajax') {
        get_header('ajax');
        if (have_posts()) {
            while (have_posts()) : the_post();
                the_content();
            endwhile;
        }
        get_footer('ajax');

    } else if ($_GET['caller'] == 'default') {

        get_header();
        echo '<div class="section spacer" style="height: 20vh; min-height:200px; max-height:500px;"></div>';
        if (have_posts()) {
            while (have_posts()) : the_post();
                echo apply_filters('the_content', get_the_content());
            endwhile;
        }
        get_footer();

    }
} else {

    global $wp_query;
    $wp_query->set_404();
    status_header(404);
    get_template_part(404);
    exit();

}

