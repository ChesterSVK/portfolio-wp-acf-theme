<?php

/*
 *
 *
 */
//add_action( 'wp_ajax_list-news', 'list_news' );
//add_action( 'wp_ajax_nopriv_list-news', 'list_news' );
//
//function list_news() {
//    //really, go ahead, do something
//    $args = array(
//        'post_type' => 'post',
//        'post_status' => 'publish',
//        'posts_per_page' => -1,
//        'orderby' => 'date',
//        'order' => 'DESC',
//    );
//
//    $loop = new WP_Query( $args );
//    $result = [];
//    while ( $loop->have_posts() ) : $loop->the_post();
//    $thumb = get_the_post_thumbnail_url($loop->post, 'large');
//        array_push($result, [
//            'id' => $loop->post->ID,
//            'title' => get_the_title($loop->post),
//            'thumbnail_url' => $thumb ? $thumb : get_default_thumbnail_url(),
//            'permalink' => get_the_permalink($loop->post),
//            'categories' => wp_get_post_terms($loop->post->ID, 'category')
//        ]);
//    endwhile;
//    die(json_encode($result));
//}

/*
 *
 *
 */



add_action( 'wp_ajax_list_galleries', 'list_galleries' );
add_action( 'wp_ajax_nopriv_list_galleries', 'list_galleries' );

function list_galleries() {
    //really, go ahead, do something

    $cur_page = isset($_GET['page']) ? sanitize_text_field($_GET['page']) : 1;
    $per_page = isset($_GET['per_page']) ? sanitize_text_field($_GET['per_page']) : 1;
    $start = $cur_page * $per_page;

    $args = array(
        'post_type' => 'gallery',
        'post_status' => 'publish',
        'posts_per_page' => $per_page,
        'orderby' => 'date',
        'order' => 'DESC',
        'paged' => $cur_page
    );


    $loop = new WP_Query( $args );
    $result = [];
    while ( $loop->have_posts() ) : $loop->the_post();
    $categories = get_terms(['taxonomy' => 'gallery_category']);
    $category = '';
    if (count($categories)) {
        $category = $categories[0]->slug;
    }
        $item = new stdClass();
        $item->id = $loop->post->ID;
        $item->title = get_the_title($item->id);
        $item->category = $category;
        $item->date = get_the_date('m-Y', $item->id);
        $item->featured = get_the_post_thumbnail_url($loop->post);
        $item->link = get_the_permalink($item->id);
        array_push($result, $item);
    endwhile;
    die(json_encode($result));
}