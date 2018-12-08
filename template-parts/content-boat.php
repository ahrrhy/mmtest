<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <section class="text-center">
        <div class="container-fluid container-inset marker well-md bg-aside bg-aside-right">
            <div class="row">
                <div class="col-md-6 col-lg-5 text-md-left">
                    <?php the_title( '<h2 class="entry-title">', '</h2>' ); ?>
                    <div>
                        <?php the_content( sprintf(
                            wp_kses(
                            /* translators: %s: Name of current post. Only visible to screen readers */
                                __( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'boats' ),
                                array(
                                    'span' => array(
                                        'class' => array(),
                                    ),
                                )
                            ),
                            get_the_title()
                        ) ); ?>
                    </div>
                </div>
                <div class="img-wrap img-wrap-md">
                    <?php boats_post_thumbnail(); ?>
                </div>
            </div>
        </div>
    </section>
    <div class="popup-gallery row row-no-gutter list-cars">
        <?php $gallery_array = get_post_meta($post->ID, 'vdw_gallery_id', true);
        if ($gallery_array) {
            foreach ($gallery_array as $img) : ?>
                <div  class="col-sm-6 col-md-4 ">
                    <a href="<?php echo wp_get_attachment_url($img); ?>"
                       title="<?php echo wp_get_attachment($img)['title']; ?>">
                        <img src="<?php echo wp_get_attachment_url($img); ?>"
                             alt="banner"
                             class="img-responsive">
                    </a>
                </div>
            <?php endforeach;
        } ?>
    </div>
</article>
<!-- #post-<?php the_ID(); ?> -->
