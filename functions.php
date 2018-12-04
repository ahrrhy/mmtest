<?php
/**
 * boats functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package boats
 */

if ( ! function_exists( 'boats_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function boats_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on boats, use a find and replace
		 * to change 'boats' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'boats', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'menu-1' => esc_html__( 'Primary', 'boats' ),
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'boats_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );
	}
endif;
add_action( 'after_setup_theme', 'boats_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function boats_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'boats_content_width', 640 );
}
add_action( 'after_setup_theme', 'boats_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function boats_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'boats' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'boats' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'boats_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function boats_scripts() {
	wp_enqueue_style( 'boats-style', get_stylesheet_uri() );
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

    /**
     * Camera JS
     */
    wp_register_script(
        'jquery.mobile.customized',
        get_template_directory_uri(). '/libs/camera/scripts/jquery.mobile.customized.min.js',
        ['jquery'],
        '',
        true
    );
	wp_enqueue_script('jquery.mobile.customized');

    wp_register_script(
        'jquery.easing',
        get_template_directory_uri(). '/libs/camera/scripts/jquery.easing.1.3.js',
        ['jquery'],
        '',
        true
    );
    wp_enqueue_script('jquery.easing');

    wp_register_script(
        'camera-js',
        get_template_directory_uri(). '/libs/camera/scripts/camera.min.js',
        ['jquery'],
        '',
        true
    );

    /**
     * Bootstrap JS
     */
    wp_register_script(
        'bootstrap-js',
        get_template_directory_uri(). '/libs/bootstrap/dist/js/bootstrap.min.js',
        ['jquery'],
        '',
        true
    );
    wp_enqueue_script('bootstrap-js');

    /**
     * Register camera-init js
     */
	wp_register_script(
	    'camera-init-js',
        get_template_directory_uri(). '/js/camera-init.js',
        ['jquery'],
        '',
        true
    );

    /**
     * Bootstrap CSS
     */
    wp_register_style(
        'bootstrap-css',
        get_template_directory_uri(). '/libs/bootstrap/dist/css/bootstrap.css',
        '',
        '',
        'screen'
    );
    wp_enqueue_style('bootstrap-css');

    wp_register_style(
        'bootstrap-theme',
        get_template_directory_uri(). '/libs/bootstrap/dist/css/bootstrap-theme.css',
        '',
        '',
        'screen'
    );
    wp_enqueue_style('bootstrap-theme');

    /**
     * Camera CSS
     */
    wp_register_style(
        'camera-css',
        get_template_directory_uri(). '/libs/camera/css/camera.css',
        '',
        '',
        'all'
    );
    wp_enqueue_style('camera-css');

    /**
     * Common CSS
     */
    wp_register_style(
        'common-css',
        get_template_directory_uri(). '/stylesheets/style.css',
        '',
        '',
        'screen'
    );
    wp_enqueue_style('common-css');

    /**
     * Enqueue camera slider on front-page
     */

    if (is_front_page()) {
        wp_enqueue_script('camera-js');
        wp_enqueue_script('camera-init-js');

    }


}
add_action( 'wp_enqueue_scripts', 'boats_scripts' );

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

/**
 * Add custom post types.
 */
require get_template_directory() . '/inc/custom-metabox.php';

/**
 * Add custom post types.
 */
require get_template_directory() . '/inc/custom-post-types.php';


/**
 * This one gets images meta-data
 * @param $attachment_id
 * @return array
 */
function wp_get_attachment( $attachment_id ) {

    $attachment = get_post( $attachment_id );
    return array(
        'alt' => get_post_meta( $attachment->ID, '_wp_attachment_image_alt', true ),
        'caption' => $attachment->post_excerpt,
        'description' => $attachment->post_content,
        'href' => get_permalink( $attachment->ID ),
        'src' => $attachment->guid,
        'title' => $attachment->post_title
    );
}

/**
 * Add class active to menu
 */
add_filter('nav_menu_css_class' , 'special_nav_class' , 10 , 2);
/**
 * @param $classes
 * @param $item
 * @return array
 */
function special_nav_class ($classes, $item) {
    if (in_array('current-menu-item', $classes) ){
        $classes[] = 'active ';
    }
    return $classes;
}