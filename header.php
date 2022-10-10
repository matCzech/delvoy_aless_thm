<?php

/*
@package delvoy_aless_thm
    Template for header
*/

?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>
    <head>
        <meta charset="<?php bloginfo('charset') ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?php if(is_singular() && pings_open(get_queried_object())): ?>
            <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
        <?php endif; ?>
        <?php wp_head(); ?>
    </head>

    <body <?php body_class(); ?>>
       <div class="container-fluid">
           <div class="row">
               <div class="col-xs-12">
                    <div class="header-container text-center background-image d-flex align-items-center justify-content-center" style="background-image: url(<?php header_image(); ?>)">
                        <div class="header-content">
                            <h1 class="site-title">
                                <?php bloginfo('name'); ?>
                            </h1>
                            <h2 class="site-description">
                                 <?php bloginfo('description'); ?>   
                            </h2>
                        </div>
                        <div class="nav-container">
                                
                        </div>
                    </div><!--header-container-->
               </div><!--col-xs-12-->
           </div><!--row-->
       </div><!--container-fluid-->
