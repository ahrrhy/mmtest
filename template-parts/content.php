<article id="post-<?php the_ID(); ?>" <?php post_class('well-md well-md--inset-3 marker relative'); ?>>
	<div class="container-fluid container-inset">
        <h2><?php echo get_the_title(); ?></h2>
        <div class="timeline-details">
            <div class="time"><?php echo get_the_date('j F Y'); ?></div>
            <?php
                the_content();
            ?>
        </div><!-- .entry-content -->
        <div class="row row-no-gutter inner-tl-gallery">
            <?php $gallery_array = get_post_meta($post->ID, 'vdw_gallery_id', true);
            if ($gallery_array) {
                foreach ($gallery_array as $img) : ?>
                    <div  class="col-sm-6 col-md-4 ">
                        <img src="<?php echo wp_get_attachment_url($img); ?>"
                             alt="banner"
                             class="img-responsive">
                    </div>
                <?php endforeach;
            } ?>
        </div>
        <div class="text-center">
            <?php
            $post_args = array(
                'post_type' => 'gallery_post',
                'cat' => get_the_category($post->ID)[0]->term_id,
            );
            $query = new WP_Query( $post_args );
            if ($query->have_posts()) : ?>
                    <?php while ($query->have_posts()) : $query->the_post(); ?>
                    <a href="<?php echo get_post_permalink(); ?>">смотреть все</a>
                    <?php endwhile;
                    wp_reset_postdata();
                    endif; ?>
        </div>
    </div>
</article><!-- #post-<?php the_ID(); ?> -->
