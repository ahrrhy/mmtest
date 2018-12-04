<?php get_header();
while ( have_posts() ) : the_post(); ?>
<div id="primary" class="content-area container-fluid">
    <main id="main" class="site-main">
        <section class="text-center">
            <div class="container-fluid container-inset marker well-md bg-aside bg-aside-right">
                <div class="row">
                    <div class="col-md-6 col-lg-5 text-md-left">
                        <h2><?php echo get_the_title(); ?></h2>
                        <?php the_content(); ?>
                        <div class="img-wrap img-wrap-md">
                            <?php the_post_thumbnail(); ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
<?php endwhile;// End of the loop.
wp_reset_postdata();
$existing_boats_args = [
    'post_type' => 'boats',
    'category_name' => 'existing_boats'
];
$existing_boats_query = new WP_Query($existing_boats_args);
if ($existing_boats_query->have_posts()) : ?>
    <div class="row row-no-gutter list-cars">
    <?php while ($existing_boats_query->have_posts()) : $existing_boats_query->the_post(); ?>

            <div class="col-sm-6 col-md-4">
                <a href="<?php echo get_post_permalink(); ?>"
                   class="product">
                    <?php the_post_thumbnail(); ?>
                    <span class="product__cnt">
                        <h5 class="uppercase"><?php echo get_the_title(); ?></h5>
                        <span class="link"><?php echo get_theme_mod('boat_link_text'); ?></span>
                    </span>
                </a>
            </div>

    <?php endwhile; ?>
    </div>
<?php endif;
wp_reset_postdata();
$projects_boats_args = [
    'post_type' => 'boats',
    'category_name' => 'projects'
];
$projects_boats_query = new WP_Query($projects_boats_args);
if ($projects_boats_query->have_posts()) : ?>
        <h3><?php echo __('Проекты', 'boats'); ?></h3>
        <div class="inprogress-gallery">
            <div class="row row-no-gutter list-cars">
                <?php while ($projects_boats_query->have_posts()) : $projects_boats_query->the_post(); ?>
                    <div class="col-sm-6 col-md-4">
                        <a href="<?php echo get_post_permalink(); ?>"
                           class="product">
                            <?php the_post_thumbnail(); ?>
                            <span class="product__cnt">
                        <h5 class="uppercase"><?php echo get_the_title(); ?></h5>
                        <span class="link"><?php echo get_theme_mod('boat_link_text'); ?></span>
                    </span>
                        </a>
                    </div>
                <?php endwhile; ?>
            </div>
        </div>
        <?php endif;
        wp_reset_postdata(); ?>
    </main>
</div>
