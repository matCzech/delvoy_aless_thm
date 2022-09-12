<?php

/*
@package delvoy_aless_thm
    Admin Page
*/

/*
#########################################################
                ADMIN ENQUEUE FUNCTIONS
#########################################################
*/

// load special admin CSS styles and JS scripts
function delvoy_load_admin_scripts($hook){
    if('toplevel_page_delvoy_aless' != $hook){
        return;
    }

    wp_register_style('delvoy-admin', get_template_directory_uri() . '/css/delvoy.admin.css', array(), '1.0.0', 'all');
    wp_enqueue_style('delvoy-admin');

    wp_enqueue_media();

    wp_register_script('delvoy-admin-script', get_template_directory_uri() . '/js/delvoy.admin.js', array('jquery'), '1.0.0', true);
    wp_enqueue_script('delvoy-admin-script');
}
add_action('admin_enqueue_scripts', 'delvoy_load_admin_scripts');