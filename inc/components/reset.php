<?php


// Disables the block editor from managing widgets in the Gutenberg plugin.
add_filter( 'gutenberg_use_widgets_block_editor', '__return_false', 100 );

// Disables the block editor from managing widgets. renamed from wp_use_widgets_block_editor
add_filter( 'use_widgets_block_editor', '__return_false' );

if ( ! function_exists( 'theme_setup' ) ) :
    /**
     * Sets up theme defaults and registers support for various WordPress features.
     *
     * Note that this function is hooked into the after_setup_theme hook, which
     * runs before the init hook. The init hook is too late for some features, such
     * as indicating support for post thumbnails.
     */
    function theme_setup() {
        /*
         * Make theme available for translation.
         * Translations can be filed in the /languages/ directory.
         * If you're building a theme based on glitche, use a find and replace
         * to change 'glitche' to the name of your theme in all the template files.
         */
        load_theme_textdomain( THEME_DOMAIN, THEME_LANG_DIR );

        // Add default posts and comments RSS feed links to head.
        add_theme_support( 'automatic-feed-links' );

        /*
         * Let WordPress manage the document title.
         * By adding theme support, we declare that this theme does not use a
         * hard-coded <title> tag in the document head, and expect WordPress to
         * provide it for us.
         */
        add_theme_support( 'title-tag' );

        /*
         * Enable support for Post Thumbnails on posts and pages.
         *
         * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
         */
        add_theme_support( 'post-thumbnails' );

        // This theme uses wp_nav_menu() in one location.
        register_nav_menus( array(
            'primary' => esc_html__( 'Primary Menu', THEME_DOMAIN ),
            'top' => esc_html__( 'Top Small Menu', THEME_DOMAIN ),
            'secondary' => esc_html__( 'Footer menu', THEME_DOMAIN ),
        ) );


        /**
         * Add post-formats support.
         */
//        add_theme_support(
//            'post-formats',
//            array(
//				'link',
//				'aside',
//				'gallery',
//				'image',
//				'quote',
//				'status',
//				'video',
//				'audio',
//				'chat',
//            )
//        );


        /*
         * Switch default core markup for search form, comment form, and comments
         * to output valid HTML5.
         */
        add_theme_support( 'html5', array(
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
        ) );

        // Add theme support for selective refresh for widgets.
        add_theme_support( 'customize-selective-refresh-widgets' );

        // Image Sizes
        remove_image_size('1024x1536');
        remove_image_size('1536x1536');
        remove_image_size('2048x2048');
//        add_image_size( 'theme_100x100', 100, 100, true );
//        add_image_size( 'theme_282x232', 282, 232, true );
//        add_image_size( 'theme_282x282', 282, 282, true );
//        add_image_size( 'theme_500x500', 500, 500, true );
//        add_image_size( 'theme_680xAuto', 680, 9999, false );
//        add_image_size( 'theme_680x680', 680, 680, true );
//        add_image_size( 'theme_1920xAuto', 1920, 9999, false );


        // Note, the is_IE global variable is defined by WordPress and is used
        // to detect if the current browser is internet explorer.
        global $is_IE;
        if ( $is_IE ) {
//			TODO
        }

//        if (WP_WOOCOMMERCE){
            // Add support for woocommerce templates
//            add_theme_support( 'woocommerce' );
//        }
        // Add support for responsive embedded content.
//        add_theme_support( 'responsive-embeds' );

        // Add support for custom line height controls.
//        add_theme_support( 'custom-line-height' );

        // Add support for experimental link color control.
//        add_theme_support( 'experimental-link-color' );

        // Add support for experimental cover block spacing.
//        add_theme_support( 'custom-spacing' );

        // Add support for custom units.
        // This was removed in WordPress 5.6 but is still required to properly support WP 5.5.
//        add_theme_support( 'custom-units' );
    }
endif;
add_action( 'after_setup_theme', 'theme_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function theme_content_width() {
    // This variable is intended to be overruled from themes.
    // Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
    // phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
    $GLOBALS['content_width'] = apply_filters( 'glitche_content_width', 900 );
}
add_action( 'after_setup_theme', 'theme_content_width', 0 );

/**
 * Disable the emoji's
 */
function disable_emojis() {
    remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
    remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
    remove_action( 'wp_print_styles', 'print_emoji_styles' );
    remove_action( 'admin_print_styles', 'print_emoji_styles' );
    remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
    remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );
    remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
    add_filter( 'tiny_mce_plugins', 'disable_emojis_tinymce' );
    add_filter( 'wp_resource_hints', 'disable_emojis_remove_dns_prefetch', 10, 2 );
}
add_action( 'init', 'disable_emojis' );

/**
 * Filter function used to remove the tinymce emoji plugin.
 *
 * @param array $plugins
 * @return array Difference betwen the two arrays
 */
function disable_emojis_tinymce( $plugins ) {
    if ( is_array( $plugins ) ) {
        return array_diff( $plugins, array( 'wpemoji' ) );
    } else {
        return array();
    }
}

/**
 * Remove emoji CDN hostname from DNS prefetching hints.
 *
 * @param array $urls URLs to print for resource hints.
 * @param string $relation_type The relation type the URLs are printed for.
 * @return array Difference betwen the two arrays.
 */
function disable_emojis_remove_dns_prefetch( $urls, $relation_type ) {
    if ( 'dns-prefetch' == $relation_type ) {
        /** This filter is documented in wp-includes/formatting.php */
        $emoji_svg_url = apply_filters( 'emoji_svg_url', 'https://s.w.org/images/core/emoji/2/svg/' );

        $urls = array_diff( $urls, array( $emoji_svg_url ) );
    }

    return $urls;
}

// Disable admin bar on FE
if (WP_APPLICATION_STATE == WP_APPLICATION_STATE_PROD) {
    add_filter( 'show_admin_bar', '__return_false' );
}

//Remove unwanted roles
$wp_roles = new WP_Roles(); // create new role object
$wp_roles->remove_role('translator');
$wp_roles->remove_role('shop_manger');
$wp_roles->remove_role('contributor');
$wp_roles->remove_role('editor');
$wp_roles->remove_role('author');



add_filter( 'intermediate_image_sizes_advanced', 'prefix_remove_default_images' );
// This will remove the default image sizes and the medium_large size.
function prefix_remove_default_images( $sizes ) {
    unset( $sizes['small']); // 150px
    unset( $sizes['medium']); // 300px
    unset( $sizes['large']); // 1024px
    unset( $sizes['medium_large']); // 768px
    return $sizes;
}
