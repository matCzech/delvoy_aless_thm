<?php

/*
@package delvoy_aless_thm
    Admin Page
*/

/*
#########################################################
                REMOVE VERSION GENERATOR
#########################################################
*/


function delvoy_remove_meta_version(){
    return '';
}
add_filter('the_generator', 'delvoy_remove_meta_version');