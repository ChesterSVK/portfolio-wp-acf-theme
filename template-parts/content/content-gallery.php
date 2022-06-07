<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package glitche
 */


$photographer = get_field('photographer');
$photographer_socials = get_field('photographer_socials');
$images = get_field('images');

wp_add_inline_script(THEME_MODULES_EFFECTS_ID, '
const ACF_FIELDS = {"gallery_images" : ' . json_encode($images) . '};', 'before');


?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div class="container">
        <div class="single-gallery">
            <div class="gallery-info">
                <?= the_title('<div class="title"><h2>', '</h2></div>')?>
                <?php if ($photographer) {
                    ?>
                    <div class="photographer-wrapper">
                        <small>
                            <?= __('Photos by', THEME_DOMAIN)?>
                        </small>
                        <div class="photographer">
                            <?= $photographer; ?>
                        </div>
                        <?php if ($photographer_socials) {
                            ?>
                            <div class="photographer_socials">
                                <?php foreach ($photographer_socials as $social) {
                                    echo '<a class="photographer-icon icon ' . $social['icon'] . '" href="' . $social['link'] .'" target="_blank" rel="noopener">#</a>';
                                } ?>
                            </div>
                            <?php
                        }?>
                    </div>
                    <?php
                }?>

                <?php if ($images) {
                    ?>
                    <div id="single-image-gallery">
                    </div>
                    <?php
                }?>
            </div>

        </div>
    </div>
</article><!-- #post-<?php the_ID(); ?> -->