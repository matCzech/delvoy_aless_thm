<?php

/*
@package delvoy_aless_thm
    Theme support
*/

/*
#########################################################
                THEME SUPPORT OPTIONS
#########################################################
*/

$header = get_option('custom_header');
if(@$header == 1){
    add_theme_support('custom-header');
}

$background = get_option('custom_background');
if(@$background == 1){
    add_theme_support('custom-background');
}

/*Activate nav menu option*/
function delvoy_register_nav_menu(){
    register_nav_menu('main_nav', 'Main header navigation');
}
add_action('after_setup_theme', 'delvoy_register_nav_menu');
