<?php
/**
 * Displays the site header.
 *
 * @package WordPress
 * @subpackage Twenty_Twenty_One
 * @since Twenty Twenty-One 1.0
 */

$wrapper_classes = 'site-header';
$wrapper_classes .= has_custom_logo() ? ' has-logo' : '';
$wrapper_classes .= has_nav_menu('primary') ? ' has-menu' : '';
?>

<!-- BEGIN HEADER -->
<header id="header" class="<?php echo esc_attr($wrapper_classes); ?>" role="banner">

    <div class="head-main">
        <div class="show-on-scroll">
            <?php wp_nav_menu(array(
                'theme_location' => 'top',
                'link_before' => '<span>',
                'link_after' => '</span>'
            )); ?>
        </div>
        <?= get_template_part( 'template-parts/header/site-branding' ); ?>
        <nav class="header-main-menu-nav">
            <?php wp_nav_menu(array(
                'theme_location' => 'primary',
                'link_before' => '<span>',
                'link_after' => '</span>'
            )); ?>
        </nav>
    </div>
    <div id="menu">
        <div id="pencet">
            <span></span>
            <span></span>
            <span></span>
        </div>
    </div>
    <div class="head-main-mobile">
        <?= get_template_part( 'template-parts/header/site-branding' ); ?>
        <nav class="header-main-menu-nav">
            <?php wp_nav_menu(array(
                'theme_location' => 'primary',
                'link_before' => '<span>',
                'link_after' => '</span>'
            )); ?>
            <?php wp_nav_menu(array(
                'theme_location' => 'top',
                'link_before' => '<span>',
                'link_after' => '</span>'
            )); ?>
        </nav>
        <div class="header-mini-lang">
            <div class="language-wrapper" style="text-align: center;">
                <?php echo do_shortcode( '[wpml_language_switcher flags=1 native=1]' ) ?>
            </div>
        </div>
    </div>

</header>
<!-- END HEADER -->
