<?php
/**
 * Display footer
 */

$socials = get_field('socials', 'options');
?>

<div class="footer-main">
    <div class="container">
        <div class="footer-row">
            <div class="footer-left">
                <?php
                if (is_active_sidebar('footer-row')) {
                    dynamic_sidebar('footer-row');
                } ?>
            </div>
            <div class="footer-right">
                <?php
                wp_nav_menu(array(
                    'theme_location' => 'secondary',
                    'link_before' => '<span>',
                    'link_after' => '</span>'
                ));
                ?>
            </div>
        </div>
        <div class="footer-row">
            <div class="footer-left">
                <?php
                if (is_active_sidebar('footer-left')) {
                    dynamic_sidebar('footer-left');
                } ?>
            </div>
            <div class="footer-right">
                <?php
                if (is_active_sidebar('footer-right')) {
                    dynamic_sidebar('footer-right');
                } ?>
            </div>
        </div>
    </div>
</div>
<div class="footer-copy">
    <div class="container">
        <div class="footer-row">
            <div class="footer-left">
                <div class="copy">
                    <span><?= date('Y') . ' ©'; ?></span>
                    <?php the_field('copyright', 'options'); ?>
                </div>
            </div>
            <div class="footer-right">
                <?php if ($socials) {
                    ?>
                    <div class="socials">
                        <?php
                        foreach ($socials as $social) {
                            echo '<a target="_blank" href="' . $social['link'] . '" class="icon style-2 no-text ' . $social['icon'] . '" title="' . $social['icon'] . '" rel="noreferrer">#</a>';
                        }
                        ?>
                    </div>
                    <?php
                }?>
            </div>
        </div>
    </div>
</div>


<?php if ($socials) {
    ?>
    <div class="side-socials">
        <?php
        foreach ($socials as $social) {
            echo '<a target="_blank" href="' . $social['link'] . '" class="icon style-1 no-text ' . $social['icon'] . '" title="' . $social['icon'] . '" rel="noreferrer">#</a>';
        }
        ?>
    </div>
    <?php
}?>


