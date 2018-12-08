<?php
/**
 * boats Theme Customizer
 *
 * @package boats
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function boats_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial( 'blogname', array(
			'selector'        => '.site-title a',
			'render_callback' => 'boats_customize_partial_blogname',
		) );
		$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
			'selector'        => '.site-description',
			'render_callback' => 'boats_customize_partial_blogdescription',
		) );
	}
}
add_action( 'customize_register', 'boats_customize_register' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function boats_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function boats_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function boats_customize_preview_js() {
	wp_enqueue_script( 'boats-customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'boats_customize_preview_js' );

function customizer_front_page_data($wp_customize)
{

    $wp_customize->add_panel(
        'front_page_data_panel',
        [
            'title' => __('Настройки Сайта', 'boats'),
            'description' => esc_html__('Здесь будут настройки типа назаний секций, футер сайта', 'boats'),
            'priority' => 50,
            'capability' => 'edit_theme_options',
            'theme_supports' => '',
            'active_callback' => '',
        ]
    );

    $wp_customize->add_section(
        'header_settings',
        [
            'panel'              => 'front_page_data_panel',
            'title' => __('Настройки хедера сайта', 'boats'),
            'description' => __('Здесь нужно задать фон хедера', 'boats'),
        ]
    );

    $wp_customize->add_setting(
        'header_bg',
        [
            'default' => '',
        ]
    );

    $wp_customize->add_control( new WP_Customize_Image_Control(
        $wp_customize,
        'header_bg',
        [
            'label'    => __('Фоновый рисунок хедера', 'boats'),
            'section'  => 'header_settings',
            'settings' => 'header_bg',
        ]
    ));


    $wp_customize->add_section(
        'page_settings',
        [
            'panel'              => 'front_page_data_panel',
            'title' => __('Настройки страниц сайта', 'boats'),
            'description' => __('Разные настройки страниц сайта', 'boats'),
        ]
    );

    $wp_customize->add_setting(
        'logo_bg',
        [
            'default' => '',
        ]
    );

    $wp_customize->add_control( new WP_Customize_Image_Control(
        $wp_customize,
        'logo_bg',
        [
            'label'    => __('Лого для страницы Истории', 'boats'),
            'section'  => 'page_settings',
            'settings' => 'logo_bg',
        ]
    ));

    $wp_customize->add_setting('boat_link_text');
    $wp_customize->add_control(
        'boat_link_text',
        [
            'label' => __('Текст ссылки на страницу лодки для главной страницы', 'boats'),
            'description' => __('Нужно ввести текст ссылки', 'boats'),
            'section' => 'page_settings',
            'type' => 'text',
        ]
    );

    $wp_customize->add_setting('gallery_link_text');
    $wp_customize->add_control(
        'gallery_link_text',
        [
            'label' => __('Текст ссылки на страницу галереи', 'boats'),
            'description' => __('Нужно ввести текст ссылки', 'boats'),
            'section' => 'page_settings',
            'type' => 'text',
        ]
    );


    $wp_customize->add_section(
        'footer_settings',
        [
            'panel'              => 'front_page_data_panel',
            'title' => __('Настройки подвала сайта', 'boats'),
            'description' => __('Здесь нужно ввести текст футера, ссылку на почту и текст ссылки на почту', 'boats'),
        ]
    );

    $wp_customize->add_setting('footer_text');
    $wp_customize->add_control(
        'footer_text',
        [
            'label' => __('Текст футера', 'boats'),
            'description' => __('Нужно ввести текст футера', 'boats'),
            'section' => 'footer_settings',
            'type' => 'text',
        ]
    );

    $wp_customize->add_setting('footer_email_text');
    $wp_customize->add_control(
        'footer_email_text',
        [
            'label' => __('Текст ссылки на почту', 'boats'),
            'description' => __('Текст ссылки на почту. Это тот текст, который будет видеть пользователь', 'boats'),
            'section' => 'footer_settings',
            'type' => 'text',
        ]
    );

    $wp_customize->add_setting('footer_email_link');
    $wp_customize->add_control(
        'footer_email_link',
        [
            'label' => __('Адрес электронной почты', 'boats'),
            'description' => __('Адрес электронной почты, на которую будут писать клиенты', 'boats'),
            'section' => 'footer_settings',
            'type' => 'text',
        ]
    );
}
add_action( 'customize_register', 'customizer_front_page_data' );

function output_customizer_setting(){ ?>
    <style>
        .nav-bg, header.any-page {
            background: url("<?php echo get_theme_mod('header_bg'); ?>") no-repeat top left/cover;
        }
        .timeline-cell .date {
            background: #fff url("<?php echo get_theme_mod('logo_bg'); ?>") center/contain no-repeat;
        }
    </style>
<?php }
add_action('wp_head', 'output_customizer_setting');