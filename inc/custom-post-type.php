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
    delvoy_contactform_post_type();
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