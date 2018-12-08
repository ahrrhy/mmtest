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
                    ]);
                    if( have_rows('pdf_downloadable_files') ) : ?>

                    <div class="news-list">
                        <?php while ( have_rows('pdf_downloadable_files') ) : the_row();
                        $pdf_file  = get_sub_field('downloaded_pdf');
                        $pdf_thumb = get_sub_field('pdf_thumbnail'); ?>
                        <p class="news-item">
                            <a href="<?php echo $pdf_file['url']; ?>" class="reset-left">
                                <img src="<?php echo $pdf_thumb['url'] ?>"
                                     alt="<?php echo $pdf_thumb['alt']; ?>">
                            </a>
                            <a href="<?php echo $pdf_file['url']; ?>">
                                <?php echo $pdf_file['title']; ?>
                            </a>(<?php echo $pdf_file['subtype'] . ' ' . size_format($pdf_file['filesize'], 2)?>)<?php echo get_sub_field('pdf_description')?>
                        </p>
                        <?php endwhile; ?>
                    </div>
                    <?php endif; ?>
                </div>
            </section>
        </main><!-- #main -->
    </div><!-- #primary -->

<?php
get_footer();
