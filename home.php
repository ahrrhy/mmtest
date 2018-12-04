<?php get_header(); ?>
<div id="primary" class="content-area">
    <main id="main" class="site-main">
        <section class="well-md well-md--inset-3 marker relative">
            <div class="container-fluid container-inset">
                <h2 class="page-title text-center text-md-left"><?php single_post_title(); ?></h2>
                <div class="timeline d-hb d-cb">
                    <?php
                    while ( have_posts() ) : the_post(); ?>
                    <div class="timeline-cell js-timeline-cell on">
                        <div class="date"><?php echo get_the_date('j F Y'); ?></div>
                        <article class="timeline-cell-i">
                            <h3 class="title">
                                <a href="<?php echo get_post_permalink(); ?>"><?php echo get_the_title(); ?></a>
                            </h3>
                            <div class="img">
                                <a href="<?php echo get_post_permalink(); ?>">
                                    <?php the_post_thumbnail('thumbnail'); ?>
                                </a>
                            </div>
                            <div class="descr d-cb imgd">
                                <?php the_excerpt(); ?>
                            </div>
                        </article>
                    </div>
                    <?php endwhile; // End of the loop. ?>
                </div>
            </div>
        </section>
    </main><!-- #main -->
</div><!-- #primary -->
<?php
get_footer();