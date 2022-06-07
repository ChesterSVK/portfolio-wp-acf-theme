<?php
/**
 * Functions and definitions
 *
 * @package Kognit
 * @subpackage KogniT
 * @since KogniT 1.0
 */

define('THEME_VERSION', '1.3.8');
define('THEME_DIR', get_template_directory());
define('THEME_DIR_URI', get_template_directory_uri());
define('THEME_ASSETS_DIR', THEME_DIR . '/assets');
define('THEME_ASSETS_DIR_URI', THEME_DIR_URI . '/assets');
define('THEME_LANG_DIR', THEME_DIR . '/languages');
define('THEME_INC_DIR', THEME_DIR . '/inc');
define('THEME_TEMPLATES_DIR', THEME_DIR . '/template-parts');
//define('THEME_WOO_TEMPLATES_DIR', THEME_DIR . '/woocommerce');
define('THEME_DOMAIN', 'progresio');
define('THEME_MODULES_EFFECTS_ID', 'modules-main');

// Each module has stylesheet, php file in modules folder and if existing also js file
define('THEME_SUPPORTED_MODULES', ['about', 'faq', 'structure', 'partners', 'big_image', 'hero', 'tiles', 'info', 'map', 'two_columns', 'two_columns_text', 'contact', 'home_tabs', 'posts', 'directions', 'text', 'gallery', 'spacer', 'button', 'download', 'rent_info']);


/**
 * !!!!!!!!!!!!! Warning Order Dependent
 */

/**
 * HELPERS
 */
require_once THEME_INC_DIR . '/components/helpers.php';

/**
 * Roles
 */
include_once THEME_INC_DIR . '/components/roles.php';

/**
 * IE SUPPORT
 */
include_once THEME_INC_DIR . '/components/ie-support.php';

/**
 * THEME RESET & SUPPORTS
 */
require_once THEME_INC_DIR . '/components/reset.php';

/**
 * Widgets
 */
require_once THEME_INC_DIR . '/components/widgets.php';

/**
 * FONTS
 */
require_once THEME_INC_DIR . '/components/fonts.php';

/**
 * Scripts and styles
 */
require_once THEME_INC_DIR . '/components/scripts-and-styles.php';

/**
 * THEME
 */
require_once THEME_INC_DIR . '/components/theme.php';
/**
 * OCDI
 */
//require THEME_INC_DIR . '/components/ocdi-setup.php';
/**
 * Customizer additions.
 */
//require THEME_INC_DIR . '/components/customizer.php';

/**
 * Include Skin Options
 */
//require_once THEME_INC_DIR . '/components/skin-options.php';

/**
 * Shortcodes
 */
include_once THEME_INC_DIR . '/components/shortcodes.php';

/**
 * Ajax API
 */
include_once THEME_INC_DIR . '/components/ajax.php';

/**
 * Responsivity
 */
include_once THEME_INC_DIR . '/components/respo.php';
