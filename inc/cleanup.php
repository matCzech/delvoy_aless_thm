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

function delvoy_remove_wp_version_strings($src){
    global $query;

    parse_str(parse_url($src, PHP_URL_QUERY), $query);

    if(!empty($query['ver']) && $query['ver'] === $query['ver']){
        $src = remove_query_arg('ver', $src);
    }
    return $src;
}
add_filter('script_loader_src', 'delvoy_remove_wp_version_strings');
add_filter('style_loader_src', 'delvoy_remove_wp_version_strings');


function delvoy_remove_meta_version(){
    return '';
}
add_filter('the_generator', 'delvoy_remove_meta_version');