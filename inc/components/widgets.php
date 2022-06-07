<?php
/**
 * Register widget area.
 *
 * @return void
 */
function theme_widgets_init() {
    register_sidebar(
        array(
            'name'          => __( 'Footer left', THEME_DOMAIN ),
            'id'            => 'footer-left',
            'description'   => __( 'Add widgets here to appear in your sidebar on blog posts and archive pages.', THEME_DOMAIN ),
            'before_widget' => '<section id="%1$s" class="widget %2$s">',
            'after_widget'  => '</section>',
            'before_title'  => '<h2 class="widget-title">',
            'after_title'   => '</h2>',
        )
    );

    register_sidebar(
        array(
            'name'          => __( 'Footer right', THEME_DOMAIN ),
            'id'            => 'footer-right',
            'description'   => __( 'Add widgets here to appear in your footer.', THEME_DOMAIN ),
            'before_widget' => '<section id="%1$s" class="widget %2$s">',
            'after_widget'  => '</section>',
            'before_title'  => '<h2 class="widget-title">',
            'after_title'   => '</h2>',
        )
    );

    register_sidebar(
        array(
            'name'          => __( 'Footer row', THEME_DOMAIN ),
            'id'            => 'footer-row',
            'description'   => __( 'Add widgets here to appear in your footer main row.', THEME_DOMAIN ),
            'before_widget' => '<section id="%1$s" class="widget %2$s">',
            'after_widget'  => '</section>',
            'before_title'  => '<h2 class="widget-title">',
            'after_title'   => '</h2>',
        )
    );

}
add_action( 'widgets_init', 'theme_widgets_init' );
