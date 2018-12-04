<article id="post-<?php the_ID(); ?>" <?php post_class('text-center'); ?>>
    <div class="container-fluid container-inset marker well-md bg-aside bg-aside-right">
        <div class="row">
            <div class="col-md-6 col-lg-5 text-md-left">
                <?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
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
                    ) );

                    ?>
                </div>
            </div>
            <div class="img-wrap img-wrap-md">
                <?php boats_post_thumbnail(); ?>
            </div>
        </div>
    </div>

</article><!-- #post-<?php the_ID(); ?> -->
