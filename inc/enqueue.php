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
    if('toplevel_page_delvoy_aless' == $hook){

        wp_register_style('delvoy-admin', get_template_directory_uri() . '/css/delvoy.admin.css', array(), '1.0.0', 'all');
        wp_enqueue_style('delvoy-admin');

        wp_enqueue_media();

        wp_register_script('delvoy-admin-script', get_template_directory_uri() . '/js/delvoy.admin.js', array('jquery'), '1.0.0', true);
        wp_enqueue_script('delvoy-admin-script');

    }
    else if('theme-options_page_delvoy_custom_css' ==  $hook){

        wp_enqueue_style('ace', get_template_directory_uri() . '/css/delvoy.ace.css', array(), '1.0.0', 'all');

        wp_enqueue_script('ace', get_template_directory_uri() . '/js/ace/ace.js', array('jquery'), '1.0', true);
        wp_enqueue_script('delvoy-custom-css-script', get_template_directory_uri() . '/js/delvoy.customcss.js', array('jquery'), '1.0.0', true);
    }
    else{
        return;
    }
}
add_action('admin_enqueue_scripts', 'delvoy_load_admin_scripts');


/*
#########################################################
                FRONTEND ENQUEUE FUNCTIONS
#########################################################
*/

function delvoy_load_scripts(){
    wp_enqueue_style('bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css', array(), '5.1.3', 'all');
    wp_enqueue_style('delvoy-css', get_template_directory_uri() . '/css/delvoy.css', array(), '1.0.0', 'all');
    wp_enqueue_style('poppins', 'https://fonts.googleapis.com/css2?family=Poppins:wght@100;300;400;600&display=swap');

    wp_deregister_script('jquery');
    wp_register_script('jquery', get_template_directory_uri() . '/js/jquery-3.6.1.min.js', false, '3.6.1', true);
    wp_enqueue_script('jquery');
    wp_enqueue_script('bootstrap', get_template_directory_uri() . '/js/bootstrap.min.js', array('jquery'), '5.1.3', true);
}
add_action('wp_enqueue_scripts', 'delvoy_load_scripts');