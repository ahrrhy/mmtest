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
    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

	<?php wp_head();
	$current_page = 'any-page';
	if (is_front_page()) {
	    $current_page = 'front-page';
    } ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'boats' ); ?></a>

	<header id="masthead" class="site-header <?php echo $current_page; ?> container-fluid">
        <div class="row">
            <div class="slider-box">
                <div class="header-box">
                    <div class="site-branding container-inset">
                        <h1 class="site-title">
                            <span><?php the_custom_logo(); ?></span>
                            <a href="<?php echo esc_url( home_url( '/' ) ); ?>"
                               rel="home"
                               class="site-title-link"><?php bloginfo( 'name' ); ?>
                            </a>
                        </h1>
                    </div><!-- .site-branding -->
                    <nav id="site-navigation" class="main-navigation">
                        <?php
                        wp_nav_menu( array(
                            'theme_location' => 'menu-1',
                            'menu_id'        => 'primary-menu',
                            'menu_class'     => 'reset-list'
                        ) ); ?>
                        <div class="button-box">
                            <button id="menu-toggle" class="menu-toggler">
                                <span></span>
                            </button>
                        </div>
                    </nav><!-- #site-navigation -->
                </div>
                <?php if (is_front_page()) : ?>
                    <div id="camera_wrap" class="portfolio-list camera_wrap">
                        <?php $slider_array = get_post_meta($post->ID, 'vdw_gallery_id', true);
                        foreach ($slider_array as $slide) : ?>
                            <div data-src="<?php echo wp_get_attachment_url($slide); ?>">
                                <img src="<?php echo wp_get_attachment_url($slide); ?>" alt="banner">
                                <div class="camera-caption fadeIn">
                                    <div>
                                        <div class="container-fluid container-inset">
                                            <div class="row">
                                                <div class="col-md-12 col-lg-7 pull-lg-right content-right text-md-left">
                                                    <div class="box">
                                                        <?php $img_meta = wp_get_attachment( $slide );
                                                        echo '<h2>' . $img_meta['title'] . '</h2>'; ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
	</header><!-- #masthead -->

	<div id="content" class="site-content">