<?php
/**
 * Displays header site branding
 *
 * @package WordPress
 * @subpackage Twenty_Twenty_One
 * @since Twenty Twenty-One 1.0
 */


$header_logo = get_field('header_logo', 'options');
$header_logo_dark = get_field('header_logo_dark', 'options');
$header_logo_type = get_field('header_logo_type', 'options');
$header_logo_text = get_field('header_logo_text', 'options');
?>

<!-- BEGIN SITE BRANDING -->


<?php if ($header_logo_type == 1) : ?>
    <div class="logo">
        <a href="<?php echo esc_url(home_url()); ?>">
            <?php echo esc_html($header_logo_text); ?>
        </a>
    </div>
<?php else : ?>
    <?php if ($header_logo) : ?>
        <div class="logo">
            <a href="<?php echo esc_url(home_url()); ?>">
                <img id="main-logo" width="377" height="105" src="<?php echo esc_url($header_logo['url']); ?>"
                     alt="<?php bloginfo('name'); ?>"/>
                <img id="main-logo-dark" width="377" height="105" src="<?php echo esc_url($header_logo_dark['url']); ?>"
                     alt="<?php bloginfo('name'); ?>"/>
<!--                <img id="favicon-logo" class="show-on-scroll" src="--><?//= THEME_ASSETS_DIR_URI . '/img/logo-w.svg' ?><!--"-->
<!--                     alt="Favicon">-->
            </a>
        </div>
    <?php endif; ?>
<?php endif; ?>

<!-- END SITE BRANDING -->
