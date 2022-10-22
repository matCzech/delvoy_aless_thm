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
    $comments_num = get_comments_number();

    if(comments_open()){
        if($comments_num == 0){
            $comments = __('No comments yet');
        }elseif($comments_num > 1){
            $comments = $comments_num . __(' comments');
        }else{
            $comments = __('1 comment');
        }
        $comments = '<a href="'.get_comments_link().'">'.$comments.'</a>';
    }else{
        $comments = __('Comments are closed');
    }

    return '<div class="blog-footer-container"><div class="row"><div class="col-xs-12 col-sm-6">'.get_the_tag_list('<div class="tags-list">' ,'', '</div>').'</div><div class="col-xs-12 col-sm-6">'.$comments.'</div></div></div>';
}

