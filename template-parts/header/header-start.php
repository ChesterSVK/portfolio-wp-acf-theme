<?php
global $header_default;
global $body_default;
$body_style = get_field('page_style');
if (!$body_style) {
    if (!$body_default){
        $body_style = 'light';
    } else $body_style = $body_default;
}
$header_style = get_field('header_style');
if (!$header_style) {
    if (!$header_default){
        $header_style = 'light';
    } else {
        $header_style = $header_default;
    }
}
?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>" />
    <?php include_once THEME_DIR . '/inc/meta.php'?>
    <?php wp_head(); ?>
</head>

<body <?php body_class($body_style); ?>>
<?php wp_body_open(); ?>

<!--BEGIN PAGE-->
<div id="page">

    <!-- Preloader -->
    <!--    --><?php //echo get_template_part('template-parts/header/preloader')?>
    <div id="header-parent-wrapper" class="<?=$header_style?>">
        <!-- Mini Header -->
        <?php echo get_template_part('template-parts/header/mini')?>
        <!-- Main Header -->
        <?php echo get_template_part('template-parts/header/main')?>
    </div>

    <!--BEGIN MAIN-->
    <main id="content">
