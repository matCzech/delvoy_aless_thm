<?php

/*
@package delvoy_aless_thm
    Theme custom post types
*/

/*
#########################################################
                    CUSTOM POSTY TYPES
#########################################################
*/

$contact_form = get_option('activate_form');

if($contact_form == 1){
    add_action('init', 'delvoy_contactform_post_type');
    add_filter('manage_delvoy-contact-form_posts_columns', 'set_delvoy_contact_cols');
    add_action('manage_delvoy-contact-form_posts_custom_column', 'delvoy_contact_post_columns', 10, 2);
}

//Contact form CPT
function delvoy_contactform_post_type(){
    $labels = [
        'name'              => 'Messages',
        'singular_name'     => 'Message',
        'menu_name'         => 'Messages',
        'name_admin_bar'    => "Message"
    ];

    $args = [
        'labels'                => $labels,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'capability_type'       => 'post',
        'hierarchical'          => false,
        'menu_position'         => 26,
        'menu_icon'             => 'dashicons-email-alt2',
        'supports'              => ['title', 'editor', 'author'],
    ];

    register_post_type('delvoy-contact-form' ,$args);
}

function set_delvoy_contact_cols(){
    $newColumns = [];
    $newColumns['title'] = 'Full name';
    $newColumns['message'] = 'Message';
    $newColumns['email'] = 'Email';
    $newColumns['date'] = 'Date';
    return $newColumns;
}

function delvoy_contact_post_columns($column, $post_id){
    switch($column){
        //Message column
        case 'message' : 
        echo get_the_excerpt();
        break;

        //Email column
        case 'email' : 
        break;
    }
}