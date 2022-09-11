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

// load special admin CSS styles
function delvoy_load_admin_scripts($hook){

    if('toplevel_page_delvoy_aless' != $hook){
        return;
    }

    wp_register_style('delvoy_admin', get_template_directory_uri() . '/css/delvoy.admin.css', array(), '1.0.0', 'all');
    wp_enqueue_style('delvoy_admin');
}
add_action('admin_enqueue_scripts', 'delvoy_load_admin_scripts');