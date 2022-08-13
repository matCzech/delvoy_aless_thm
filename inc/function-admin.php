<?php

/*
@package delvoy_aless_thm
    Admin Page
*/

function delvoy_aless_admin_page(){
    //generate admin page
    add_menu_page('DeLvoy Aless settings', 'Theme options', 'manage_options', 'delvoy_aless', 'delvoy_theme_create_page', 'dashicons-nametag', 100);

    //generate admin subpages
    add_submenu_page('delvoy_aless', 'DeLvoy Aless settings', 'Settings', 'manage_options', 'delvoy_aless', 'delvoy_theme_settings_page');
    add_submenu_page('delvoy_aless', 'DeLvoy Aless CSS', 'Custom CSS', 'manage_options', 'delvoy_custom_css', 'delvoy_theme_options_page');
}
add_action('admin_menu', 'delvoy_aless_admin_page');


function delvoy_theme_create_page(){
    require_once(get_template_directory() . '/inc/templates/delvoy-admin.php');
}


function delvoy_theme_settings_page(){

}


function delvoy_theme_options_page(){

}