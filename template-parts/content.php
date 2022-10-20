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

    <header class="entry-header">
        <?php the_title('<h2 class="entry-title">', '</h2>'); ?>
        <div class="entry-meta">
            <?php echo delvoy_posted_meta(); ?>
        </div>
    </header>

    <div class="entry-content">
        <?php
            if(has_post_thumbnail()): ?>
                <div class="standard-featured">
                    <?php the_post_thumbnail(); ?>
                </div>
        <?php endif; ?>
        <div class="entry-excerpt">
            <?php the_excerpt(); ?>
        </div>
        <div class="button-container">
            <a href="<?php the_permalink(); ?>" class="btn btn-default"><?php _e('Read more'); ?></a>
        </div>
    </div><!--entry-content-->

    <footer class="entry-footer">
        <?php echo deloy_posted_footer(); ?>
    </footer>

</article>