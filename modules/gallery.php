<?php

$title = get_sub_field('title');
$allow_filter = get_sub_field('allow_filter');
$categories = get_terms([
    'taxonomy' => 'gallery_category',
    'hide_empty' => false,
    'order' => 'desc'

]);
$categories_arr = [];
foreach ($categories as $category) {
    array_push($categories_arr, [
        'value' => $category->slug,
        'label' => $category->name
    ]);
}
$months = [];
$galleries = get_posts(
    ['post_type' => 'gallery']
);
foreach ($galleries as $gallery){
    $date = $gallery->post_date;
    $date_unique = date('m-Y', strtotime($date));
    $months[$date_unique] = $date_unique;
}
$months_arr = [];
foreach ($months as $index=>$month){
    array_push($months_arr, ['value' => $index, 'label' => $month]);
}

wp_add_inline_script(THEME_MODULES_EFFECTS_ID, '
const ACF_FIELDS = {"categories" : ' . json_encode($categories_arr)
    . ', "filter_allowed" : ' . json_encode($allow_filter)
    . ', "months" : ' . json_encode($months_arr)
    . ', "monthsString" : "' . __('Choose month', THEME_DOMAIN)
    . '", "seasonString" : "' . __('Choose season', THEME_DOMAIN) .'"};', 'before');

?>

<!-- Gallery -->
<div class="section gallery-section">
    <div class="container full">
        <?php if ($title) : ?>
            <div class="title">
                <h2>
                    <?php echo esc_html($title); ?>
                </h2>
            </div>
        <?php endif; ?>

        <div id="galleryElement">

        </div>
    </div>
</div>