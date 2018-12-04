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
                <div class="photo-page-main">
                    <div class="row row-no-gutter list-cars list-albums">
                        <?php $gallery_posts_args = [
                            'numberposts' => 30,
                            'orderby'     => 'date',
                            'order'       => 'ASC',
                            'post_type'   => 'gallery_post',
                            'suppress_filters' => true,
                        ];
                        $gallery_posts_args_query = new WP_Query($gallery_posts_args);
                        if ($gallery_posts_args_query->have_posts()) :
                            while ($gallery_posts_args_query->have_posts()) : $gallery_posts_args_query->the_post(); ?>
                                <div class="col-sm-6 col-md-4">
                                    <a href="<?php echo get_post_permalink(); ?>"
                                       class="product">
                                        <?php the_post_thumbnail(); ?>
                                        <span class="product__cnt">
                                            <h5 class="uppercase"><?php echo get_the_title(); ?></h5>
                                            <span class="link">
                                                <?php echo get_theme_mod('gallery_link_text'); ?></span>
                                        </span>
                                    </a>
                                </div>
                        <?php endwhile;
                            endif;
                        wp_reset_postdata(); ?>
                    </div>
                </div>
            </div>
        </section>
    </main>
</div>

<?php get_footer();
