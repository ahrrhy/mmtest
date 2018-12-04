<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package boats
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'boats' ); ?></a>

	<header id="masthead" class="site-header container-fluid">
        <div class="row">
            <div class="slider-box">
                <div class="navigation-box">
                    <div class="site-branding">
                        <h1 class="site-title">
                            <span><?php the_custom_logo(); ?></span>
                            <a href="<?php echo esc_url( home_url( '/' ) ); ?>"
                               rel="home"><?php bloginfo( 'name' ); ?>
                            </a>
                        </h1>
                        <?php $boats_description = get_bloginfo( 'description', 'display' );
                        if ( $boats_description || is_customize_preview() ) : ?>
                            <p class="site-description"><?php echo $boats_description; /* WPCS: xss ok. */ ?></p>
                        <?php endif; ?>
                    </div><!-- .site-branding -->

                    <nav id="site-navigation" class="main-navigation">
                        <?php
                            wp_nav_menu( array(
                                'theme_location' => 'menu-1',
                                'menu_id'        => 'primary-menu',
                            ) ); ?>
                    </nav><!-- #site-navigation -->
                </div>
                <?php if (is_front_page()) : ?>
                    <div id="camera_wrap" class="portfolio-list camera_wrap">
                        <?php $slider_array = get_post_meta($post->ID, 'vdw_gallery_id', true);
                        foreach ($slider_array as $slide) : ?>
                            <div data-src="<?php echo wp_get_attachment_url($slide); ?>">
                                <img src="<?php echo wp_get_attachment_url($slide); ?>" alt="banner">
                                <div class="camera-caption">
                                    <?php $img_meta = wp_get_attachment( $slide );
                                    echo $img_meta['title'];
                                    ?>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
	</header><!-- #masthead -->

	<div id="content" class="site-content">
