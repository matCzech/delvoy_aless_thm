<?php

/*
@package delvoy_aless_thm
    Admin Page
*/

/*
#########################################################
        CUSTOM OPTIONS OF THEME IN ADMIN PAGE
#########################################################
*/

function delvoy_aless_admin_page(){
    //generate admin page
    add_menu_page('DeLvoy Aless settings', 'Theme options', 'manage_options', 'delvoy_aless', 'delvoy_theme_create_page', 'dashicons-nametag', 100);

    //generate admin subpages
    add_submenu_page('delvoy_aless', 'DeLvoy Aless settings', 'Settings', 'manage_options', 'delvoy_aless', 'delvoy_theme_settings_page');
    add_submenu_page('delvoy_aless', 'DeLvoy Aless CSS', 'Custom CSS', 'manage_options', 'delvoy_custom_css', 'delvoy_theme_options_page');

    //activate custom settings
    add_action('admin_init', 'delvoy_custom_settings');
}
add_action('admin_menu', 'delvoy_aless_admin_page');


//generate options in admin page
function delvoy_custom_settings(){
    register_setting( 'delvoy-setting-group', 'first_name');
    register_setting('delvoy-setting-group', 'last_name');
    register_setting('delvoy-setting-group', 'description_area');
    register_setting('delvoy-setting-group', 'twitter_link');
    register_setting('delvoy-setting-group', 'facebook_link');
    register_setting('delvoy-setting-group', 'instagram_link');
    add_settings_section('delvoy-sidebar-options', 'Sidebar options', 'delvoy_sidebar_options', 'delvoy_aless');
    add_settings_field('sidebar-name', 'Full Name', 'delvoy_sidebar_name', 'delvoy_aless', 'delvoy-sidebar-options');
    add_settings_field('sidebar-description', 'Description', 'delvoy_sidebar_desc', 'delvoy_aless', 'delvoy-sidebar-options');
    add_settings_field('sidebar-twitter', 'Twitter link', 'delvoy_sidebar_twitter', 'delvoy_aless', 'delvoy-sidebar-options');
    add_settings_field('sidebar-facebook', 'Facebook link', 'delvoy_sidebar_facebook', 'delvoy_aless', 'delvoy-sidebar-options');
    add_settings_field('sidebar-instagram', 'Instagram link', 'delvoy_sidebar_instagram', 'delvoy_aless', 'delvoy-sidebar-options');
}


//generate forms for custom options
function delvoy_sidebar_options(){
    echo 'customize your sidebar information';
}

function delvoy_sidebar_name(){
    $firstName = esc_attr(get_option('first_name'));
    $lastName = esc_attr(get_option('last_name'));
    echo '<input type="text" name="first_name" value="'.$firstName.'"> <input type="text" name="last_name" value="'.$lastName.'">';
}

function delvoy_sidebar_desc(){
    $description = esc_attr(get_option('description_area'));
    echo '<input type="text" name="description_area" value="'.$description.'">';
}

function delvoy_sidebar_twitter(){
    $twitterLink = esc_attr(get_option('twitter_link'));
    echo '<input type="text" name="twitter_link" value="'.$twitterLink.'" placeholder="Twitter link">';
}

function delvoy_sidebar_facebook(){
    $facebookLink = esc_attr(get_option('facebook_link'));
    echo '<input type="text" name="facebook_link" value="'.$facebookLink.'" placeholder="Facebook link">';
}

function delvoy_sidebar_instagram(){
    $instagramLink = esc_attr(get_option('instagram_link'));
    echo '<input type="text" name="instagram_link" value="'.$instagramLink.'" placeholder="Instagram link">';
}


//pages for custom option in admin page
function delvoy_theme_create_page(){
    require_once(get_template_directory() . '/inc/templates/delvoy-admin.php');
}


function delvoy_theme_settings_page(){

}


function delvoy_theme_options_page(){

}