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
    add_action('add_meta_boxes', 'delvoy_contact_add_meta_box');
    add_action('save_post', 'delvoy_save_contact_email_data');
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
        $email = get_post_meta($post_id, '_delvoy_contact_email_value_key', true);
        echo $email;
        break;
    }
}

//CONTACT META BOXES
function delvoy_contact_add_meta_box(){
    add_meta_box('contact_email', 'User email', 'delvoy_contact_email_callback', 'delvoy-contact-form', 'side');
}

function delvoy_contact_email_callback($post){
    wp_nonce_field('delvoy_save_contact_email_data', 'delvoy_contact_email_meta_box_nonce');

    $value = get_post_meta($post->ID, '_delvoy_contact_email_value_key', true);

    echo '<label for="delvoy_contact_email_field">User email adress </label>';
    echo '<input type="text" id="delvoy_contact_email_field" name="delvoy_contact_email_field" value="'.esc_attr($value).'">';
}

function delvoy_save_contact_email_data($post_id){
    if(!isset($_POST['delvoy_contact_email_meta_box_nonce'])){
        return;
    } 

    if(!wp_verify_nonce($_POST['delvoy_contact_email_meta_box_nonce'], 'delvoy_save_contact_email_data')){
        return;
    }

    if(defined('DOING_AUTOSAVE') && DOING_AUTOSAVE){
        return;
    }

    if(!current_user_can('edit_post', $post_id)){
        return;
    }

    if(!isset($_POST['delvoy_contact_email_field'])){
        return;
    }

    $my_data = sanitize_text_field($_POST['delvoy_contact_email_field']);

    update_post_meta($post_id, '_delvoy_contact_email_value_key', $my_data);
}