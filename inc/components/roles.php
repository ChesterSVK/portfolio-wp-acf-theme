<?php

function xx__update_custom_roles()
{
    if (get_option('skozilina_roles_version') < 1) {
        add_role('employee', __('Employee', THEME_DOMAIN),
            array(
                'read' => true,  // true allows this capability
                'delete_posts' => true,
                'upload_files' => false,
                'level_0' => true,
                'level_1' => true,

            ));
        update_option('skozilina_roles_version', 1);
    }
}

add_action('init', 'xx__update_custom_roles');


function allow_employee_uploads() {
    $contributor = get_role('employee');
//    $contributor->add_cap('upload_files');
}


if ( current_user_can('employee') && !current_user_can('upload_files') ) {
    add_action('admin_init', 'allow_employee_uploads');
}


function custom_menu_page_removing() {
    if ( current_user_can('employee')) {
        // This menu item is removed because Media Library Folders Plugin is enabled
        remove_menu_page( 'upload.php' );
        remove_action( 'media_buttons', 'media_buttons' );
    }
}
add_action( 'admin_menu', 'custom_menu_page_removing' );

function admin_style() {
    $screen = get_current_screen();

    if ( current_user_can('employee')) {

        if ( $screen->base == 'media' && $screen->action == 'add' )
        {
            wp_redirect( admin_url() );
            exit(0);
        }
        if ( $screen->base == 'upload' )
        {
            wp_redirect( admin_url() );
            exit(0);
        }

        echo '<style>.media-upload-form, div.uploader-inline,a.page-title-action{display: none;} </style>';

        remove_action( 'media_buttons', 'media_buttons' );

        remove_submenu_page( 'upload.php', 'media-new.php' );

        if ($_REQUEST['page'] == 'media-library-folders'){
            echo '<style>#mgmlp-toolbar,#above-toolbar,#mgmlp-header{display: none;}#ft-panel{top:100px;}</style>';
        }
        remove_submenu_page('media-library-folders','admin-check-for-new-folders');
        remove_submenu_page('media-library-folders','mlp-upgrade-to-pro');
        remove_submenu_page('media-library-folders','mlp-regenerate-thumbnails');
        remove_submenu_page('media-library-folders','image-seo');
        remove_submenu_page('media-library-folders','image-seo');
        remove_submenu_page('media-library-folders','mlp-support');
        remove_submenu_page('media-library-folders','mlpp-settings');
    }
}
add_action('admin_enqueue_scripts', 'admin_style');