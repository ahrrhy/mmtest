<article id="post-<?php the_ID(); ?>" <?php post_class('well-md well-md--inset-3 marker relative'); ?>>
    <div class="container-fluid container-inset">
        <h2 class="page-title text-center text-md-left"><?php echo get_the_title(); ?></h2>
        <?php wp_nav_menu([
            'menu_class' => 'nav-inner',
            'menu'    => 'media-menu',
            'container' => ''
        ]); ?>
        <div class="photo-page-section">
            <div class="photo-album-item photo-album-active">
                <div class="photo-album-info">
                    <div class="photo-album-name">
                        <?php echo get_the_title(); ?>
                    </div>
                    <div class="photo-album-date">
                        <span><?php echo get_the_date('j.m.y'); ?></span>
                    </div>
                </div>
            </div>
            <div class="photo-info-box photo-info-box-photo-list">
                <div class="photo-info-box-inner">
                    <div class="popup-gallery row row-no-gutter">
                        <?php $gallery_array = get_post_meta($post->ID, 'vdw_gallery_id', true);
                        if ($gallery_array) {
                            foreach ($gallery_array as $img) : ?>
                                <div  class="col-sm-6 col-md-4">
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
                </div>
            </div>
        </div><!-- .entry-content -->
    </div>
</article><!-- #post-<?php the_ID(); ?> -->
