<?php
/**
 * View: Default Template for Events
 *
 * Override this template in your own theme by creating a file at:
 * [your-theme]/tribe/events/v2/default-template.php
 *
 * See more documentation about our views templating system.
 *
 * @link http://evnt.is/1aiy
 *
 * @version 5.0.0
 */

use Tribe\Events\Views\V2\Template_Bootstrap;

$subtitle = get_field('events_page_subtitle', 'options');
$title = get_field('events_page_title', 'options');
$description = get_field('events_page_description', 'options');
$bg_image = get_field('events_bg_image', 'options');
if (is_single()){
    $header_default = 'light';
} else {
    $header_default = 'dark';
}
get_header();


?>
<?php if (!is_single()) { ?>
    <div class="section hero-section">
        <img src="<?= $bg_image; ?>" class="hero-bg"
             alt="Background image">
        <div class="container">
            <?php if ($subtitle) {
                echo '<div class="subtitle"><h4>' . $subtitle . '</h4></div>';
            } ?>
            <?php if ($title) {
                echo '<div class="title"><h2>' . $subtitle . '</h2></div>';
            } ?>
            <?php if ($description) {
                echo '<div class="description"><h5>' . $description . '</h5></div>';
            } ?>
        </div>
    </div>
<?php } else {
    ?>
    <div class="section spacer" style="height: 20vh; min-height:200px; max-height:500px;"></div>
    <?php
} ?>

<?php
echo tribe(Template_Bootstrap::class)->get_view_html();

get_footer();
