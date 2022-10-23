<?php

/*
@package delvoy_aless_thm
    Theme support
*/

/*
#########################################################
                POST CONTENT PART
#########################################################
*/

?>

<article id="<?php the_ID(); ?>" class="<?php post_class(); ?>">

    <header class="entry-header text-center">
        <?php the_title('<h2 class="entry-title"><a href="'.esc_url(get_permalink()).'" rel="bookmark">', '</a></h2>'); ?>
        <div class="entry-meta">
            <?php echo delvoy_posted_meta(); ?>
        </div>
    </header>

    <div class="entry-content">
        <?php
            if(has_post_thumbnail()): 
            $featured_image = wp_get_attachment_url(get_post_thumbnail_id(get_the_ID()));
            ?>
                <a class="standard-featured-link" href="<?php the_permalink(); ?>">
                    <div class="standard-featured background-image" style="background-image: url( <?php echo $featured_image; ?>)"></div>
                </a>
        <?php endif; ?>
        <div class="entry-excerpt">
            <?php the_excerpt(); ?>
        </div>
        <div class="button-container text-center">
            <a href="<?php the_permalink(); ?>" class="btn btn-delvoy"><?php _e('Read more'); ?></a>
        </div>
    </div><!--entry-content-->

    <footer class="entry-footer">
        <?php echo deloy_posted_footer(); ?>
    </footer>

</article>