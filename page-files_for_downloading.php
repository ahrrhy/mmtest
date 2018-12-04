<?php get_header(); ?>

    <div id="primary" class="content-area">
        <main id="main" class="site-main">
            <section class="well-md well-md--inset-3 marker relative">
                <div class="container-fluid container-inset">
                    <h2 class="page-title text-center text-md-left"><?php echo get_the_title(); ?></h2>
                    <?php wp_nav_menu([
                        'menu_class' => 'nav-inner',
                        'menu'    => 'media-menu',
                        'container' => ''
                    ]); ?>
            <?php while ( have_posts() ) : the_post();
            the_content();
            endwhile; // End of the loop.
            ?>
                </div>
            </section>
        </main><!-- #main -->
    </div><!-- #primary -->

<?php
get_footer();
