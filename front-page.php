<?php get_header(); ?>
	<div id="primary" class="content-area">
		<main id="main" class="site-main">
            <section class="first-section bg-primary text-center">
                <?php $first_section = get_field('page_sections');
                if ($first_section) : ?>
                <div class="container-fluid container-inset bg-aside bg-aside-right marker well-md">
                    <div class="row">
                        <div class="col-md-6 col-lg-5 inset-2 text-md-left">
                            <h2><?php echo $first_section['section_title'];?></h2>
                            <p><?php echo $first_section['section_description'];?>
                                <a href="<?php echo $first_section['section_page_link'];?>">
                                    <?php echo $first_section['section_page_link_text'];?>
                                </a></p>
                        </div>
                        <div class="img-wrap img-wrap-md d-hide-mob">
                            <img src="<?php echo $first_section['section_image']['url'];?>"
                                 alt="<?php echo $first_section['section_image']['alt'];?>">
                        </div>
                    </div>
                </div>
                <?php endif; ?>
            </section>
            <section class="second-section bg-secondary text-center">
                <?php $second_section = get_field('page_sections_second');
                if ($second_section) : ?>
                    <div class="container-fluid container-inset bg-aside bg-aside-left well-md well-md--inset-1 marker-1">
                        <div class="row">
                            <div class="col-md-6 text-md-left inset-3 pull-md-right">
                                <h2><?php echo $second_section['section_title'];?></h2>
                                <p><?php echo $second_section['section_description'];?>
                                    <a href="<?php echo $second_section['section_page_link'];?>">
                                        <?php echo $second_section['section_page_link_text'];?>
                                    </a></p>
                            </div>
                            <div class="img-wrap img-wrap-md d-hide-mob">
                                <img src="<?php echo $second_section['section_image']['url'];?>"
                                     alt="<?php echo $second_section['section_image']['alt'];?>">
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
            </section>
            <section>
                <?php
                $boats_query_args = [
                    'numberposts' => 6,
                    'orderby'     => 'date',
                    'order'       => 'ASC',
                    'post_type'   => 'boats',
                    'suppress_filters' => true,
                ];
                $boats_post = new WP_Query($boats_query_args);
                if ($boats_post->have_posts()) : ?>
                    <ul class="row row-no-gutter reset-list list-cars">
                        <?php while ($boats_post->have_posts()) : $boats_post->the_post(); ?>
                            <li class="col-sm-6 col-md-4">
                                <a href="<?php echo get_permalink(); ?>" class="product">
                                    <?php $attr = [ 'class' => 'img-fluid slider-img' ];
                                        the_post_thumbnail( 'full', $attr ); ?>
                                    <span class="product__cnt">
                                        <h5 class="uppercase"><?php the_title(); ?></h5>
                                        <span class="link"><?php echo get_theme_mod('boat_link_text'); ?></span>
                                    </span>
                                </a>
                            </li>
                        <?php endwhile;
                        wp_reset_postdata(); ?>
                    </ul>
                <?php endif; ?>
            </section>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
