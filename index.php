<?php get_header() ?>

    <div id="primary" class="content-area">
        <main id="main" class="site-main" role="main">
            <div class="container delvoy-posts-container">
                
                <?php
                    if(have_posts()):
                        echo '<div class="page-limit" data-page="/'. delvoy_check_paged() .'">';
                        while(have_posts()): the_post();
                            get_template_part('template-parts/content');
                        endwhile;
                        echo '</div>';
                    endif;
                ?>

            </div><!--.container-->
            <div class="container text-center">
                <a class="btn-delvoy-load delvoy-load-more" data-page="<?php delvoy_check_paged() ?>" data-url="<?php echo admin_url('admin-ajax.php'); ?>">
                <span class="dashicons dashicons-image-rotate delvoy-loading"></span>
                <span class="text">Wczytaj więcej</span>
                </a>
            </div><!--.container-->
        </main>
    </div><!--#primary-->

<?php get_footer(); ?>