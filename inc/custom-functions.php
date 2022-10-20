<?php

/*
@package delvoy_aless_thm
    Theme support
*/

/*
#########################################################
                CUSTOM FUNCTIONS
#########################################################
*/

function delvoy_posted_meta(){
    $posted_on = human_time_diff(get_the_time('U'), current_time('timestamp')) . ' temu';
    $categories = get_the_category();
    $separator = ', ';
    $output = '';

    if(!empty($categories)):
        foreach($categories as $category):
            $output .= '<a href="'.esc_url(get_category_link($category->term_id)).'">'.esc_html($category->name).'</a>'.$separator;
        endforeach;
    endif;

    $outputFinal = rtrim($output, ', ');
    return '<span class="posted-in">Opublikowane <a href="'.esc_url(get_permalink()).'">'.$posted_on.'</a></span> | <span class="posted-on">'.$outputFinal.'</span>';
}

function deloy_posted_footer(){
    return 'tags and shit';
}

