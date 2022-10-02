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
    add_submenu_page('delvoy_aless', 'DeLvoy Aless sidebar', 'Sidebar', 'manage_options', 'delvoy_aless', 'delvoy_theme_settings_page');
    add_submenu_page('delvoy_aless', 'DeLvoy Aless CSS', 'Custom CSS', 'manage_options', 'delvoy_custom_css', 'delvoy_theme_customcss_page');
    add_submenu_page('delvoy_aless', 'DeLvoy Contact Form', 'Contact form', 'manage_options', 'delvoy_theme_contact', 'delvoy_theme_contactform_page');
    add_submenu_page('delvoy_aless', 'DeLvoy theme options', 'Theme options', 'manage_options', 'delvoy_theme_options', 'delvoy_theme_options_page');

    //activate custom settings
    add_action('admin_init', 'delvoy_custom_settings');
}
add_action('admin_menu', 'delvoy_aless_admin_page');


//generate options in admin page
function delvoy_custom_settings(){
    //Sidebar options
    register_setting('delvoy-setting-group', 'profile_picture');
    register_setting('delvoy-setting-group', 'first_name');
    register_setting('delvoy-setting-group', 'last_name');
    register_setting('delvoy-setting-group', 'description_area');
    register_setting('delvoy-setting-group', 'twitter_link');
    register_setting('delvoy-setting-group', 'facebook_link');
    register_setting('delvoy-setting-group', 'instagram_link');
    
    add_settings_section('delvoy-sidebar-options', 'Sidebar options', 'delvoy_sidebar_options', 'delvoy_aless');

    add_settings_field('sidebar-profile-picture', 'Profile picture', 'delvoy_sidebar_picture', 'delvoy_aless', 'delvoy-sidebar-options');
    add_settings_field('sidebar-name', 'Full Name', 'delvoy_sidebar_name', 'delvoy_aless', 'delvoy-sidebar-options');
    add_settings_field('sidebar-description', 'Description', 'delvoy_sidebar_desc', 'delvoy_aless', 'delvoy-sidebar-options');
    add_settings_field('sidebar-twitter', 'Twitter link', 'delvoy_sidebar_twitter', 'delvoy_aless', 'delvoy-sidebar-options');
    add_settings_field('sidebar-facebook', 'Facebook link', 'delvoy_sidebar_facebook', 'delvoy_aless', 'delvoy-sidebar-options');
    add_settings_field('sidebar-instagram', 'Instagram link', 'delvoy_sidebar_instagram', 'delvoy_aless', 'delvoy-sidebar-options');

    //Theme support
    register_setting('delvoy-theme-support', 'custom_header');
    register_setting('delvoy-theme-support', 'custom_background');

    add_settings_section('delvoy-section-support', 'DeLvoy options', 'delvoy_theme_support', 'delvoy_theme_options_page');

    add_settings_field('support-custom-header', 'Custom header', 'delvoy_custom_header', 'delvoy_theme_options_page', 'delvoy-section-support');
    add_settings_field('support-custom-background', 'Custom background', 'delvoy_custom_background', 'delvoy_theme_options_page', 'delvoy-section-support');

    //Contact form options
    register_setting('delvoy-contactform-group', 'activate_form');

    add_settings_section('delvoy-contactform-section', 'Contact form', 'delvoy_contactform_section', 'delvoy_theme_contact');

    add_settings_field('custom-contact-form', 'Activate contact form', 'delvoy_activate_contactform', 'delvoy_theme_contact', 'delvoy-contactform-section');

    //Custom CSS options
    register_setting('delvoy-custom-css-options', 'delvoy_css', 'delvoy_santize_custom_css');

    add_settings_section('delvoy-custom-css-section', 'Custom CSS', 'delvoy_custom_css_callback', 'delvoy_custom_css');

    add_settings_field('custom-css', 'Insert your custom CSS', 'delvoy_custom_css_editor', 'delvoy_custom_css', 'delvoy-custom-css-section');
}


//generate content & forms for custom options
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

function delvoy_sidebar_picture(){
    $profilePic = esc_attr(get_option('profile_picture'));
    if(empty($profilePic)){
        echo '<input type="button" value="Upload picture" id="profile-img" class="button button-secondary"><input type="hidden" name="profile_picture" id="profile-picture" value="">';
    }else{
        echo '<input type="button" value="Upload picture" id="profile-img" class="button button-secondary"><input type="hidden" name="profile_picture" id="profile-picture" value="'.$profilePic.'"> <input type="button" value="Delete picture" id="delete-avatar" class="button button-secondary">';
    }
}

//generate content & forms for theme support
function delvoy_theme_support(){
    echo 'Activate and deactivate specific Theme Support Options';
}

function delvoy_custom_header(){
    $custom_header = get_option('custom_header');
    $checked = (@$custom_header == 1 ? 'checked' : '');
    echo '<label><input type="checkbox" id="custom_header" name="custom_header" value="1" '.$checked.'>Activate custom header</label>';
}

function delvoy_custom_background(){
    $custom_bck = get_option('custom_background');
    $checked = (@$custom_bck == 1 ? 'checked' : '');
    echo '<label><input type="checkbox" id="custom_background" name="custom_background" value="1" '.$checked.'>Activate custom background</label>';
}

//generate content & forms for contact form page
function delvoy_contactform_section(){
    echo 'Activate and deactivate contact form';
}

function delvoy_activate_contactform(){
    $activate_form = get_option('activate_form');
    $checked = (@$activate_form == 1 ? 'checked' : '');
    echo '<label><input type="checkbox" id="activate_form" name="activate_form" value="1" '.$checked.'></label>';
}

//generate content & forms for custom css page
function delvoy_custom_css_callback(){
    echo 'Customize your theme with your own CSS';
}

function delvoy_custom_css_editor(){
    $custom_css = get_option('delvoy_css');
    $custom_css = (empty($custom_css) ? "/*DeLvoy Theme Custom CSS*/" : $custom_css);
    echo '<div id="delvoy-custom-css">'.$custom_css.'</div><textarea id="delvoy_css" name="delvoy_css" style="display:block;visibility:hidden;"></textarea>';
}

function delvoy_santize_custom_css($input){
    $output = esc_textarea($input);
    return $output;
}

//pages for custom option in admin page
function delvoy_theme_create_page(){
    require_once(get_template_directory() . '/inc/templates/delvoy-admin.php');
}

function delvoy_theme_options_page(){
    require_once(get_template_directory() . '/inc/templates/delvoy-theme-support.php');
}

function delvoy_theme_contactform_page(){
    require_once(get_template_directory() . '/inc/templates/delvoy-theme-contactform.php');
}

function delvoy_theme_customcss_page(){
    require_once(get_template_directory() . '/inc/templates/delvoy-custom-css.php');
}


