<?php

/*
@package delvoy_aless_thm
    Theme support
*/

/*
#########################################################
                    AJAX FUNCTIONS
#########################################################
*/

add_action('wp_ajax_nopriv_delvoy_load_more', 'delvoy_load_more');
add_action('wp_ajax_delvoy_load_more', 'delvoy_load_more');

function delvoy_load_more(){
    $paged = $_POST['page']+1;
    $query = new WP_Query([
        'post_type' => 'post',
        'post_status' => 'publish',
        'paged' => $paged
    ]);

    if($query->have_posts()):
        while($query->have_posts()): $query->the_post();
            get_template_part('template-parts/content');
        endwhile;
    endif;
    
    wp_reset_postdata();

    die();
}