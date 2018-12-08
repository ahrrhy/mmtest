<?php get_header(); ?>
<div id="primary" class="content-area">
    <main id="main" class="site-main">
        <section class="well-md well-md--inset-3 marker relative">
            <div class="container-fluid container-inset">
                <h2 class="page-title text-center text-md-left"><?php single_post_title(); ?></h2>
                <div class="timeline d-hb d-cb">
                    <?php
                    $counter = 0;
                    $containerClass = '';
                    while ( have_posts() ) : the_post();
                        $counter++;
                        if ($counter%2 === 0) {
                            $containerClass = 'odd';
                        } else {
                            $containerClass = '';
                        } ?>

                    <div class="timeline-cell <?php echo $containerClass; ?> js-timeline-cell">

                        <div class="date"><span><?php echo get_the_date('j F Y'); ?></span></div>
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
                                <?php the_excerpt();
                                $place = get_field('history_places');
                                if ($place) : ?>
                                <div class="place">
                                    <strong><?php echo __('Место:'); ?> </strong> <?php echo $place; ?>
                                </div>
                                <?php endif; ?>
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