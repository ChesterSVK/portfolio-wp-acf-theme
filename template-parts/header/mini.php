<?php
$header_langs = get_field('header_languages', 'options');
$header_search = get_field('search_enable', 'options');
?>

<section id="mini-header">
    <div class="mini-header-wrap">
        <div class="header-mini-menu">
            <?php

            wp_nav_menu(array(
                'theme_location' => 'top',
                'link_before' => '<span>',
                'link_after' => '</span>'
            ));

            ?>
        </div>
<!--        --><?php //if ($header_search): ?>
<!--            <div class="header-mini-search">-->
<!--                Search-->
<!--            </div>-->
<!--        --><?php //endif; ?>
        <div class="header-mini-lang">
            <div class="language-wrapper">
                <?php echo do_shortcode( '[wpml_language_switcher flags=1 native=1]' ) ?>
            </div>
        </div>
    </div>
</section>