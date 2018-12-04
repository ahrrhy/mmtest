<?php
// Cars/Boats
function create_post_type_boats() {
    register_post_type(
        'boats',
        [
            'labels' => [
                'name' => __( 'Лодки', 'boats' ),
                'singular_name' => __( 'Лодка', 'boats' )
            ],
            'description' =>  __( 'Это Ваши лодки и их описание' ),
            'menu_icon'   => 'dashicons-smiley',
            'public' => true,
            'publicly_queryable' => true,
            'show_ui' => true,
            'show_in_menu' => true,
            'show_in_nav_menus' => true,
            'query_var' => true,
            'capability_type' => 'post',
            'has_archive' => false,
            'taxonomies'  => array( 'category' ),
            'supports' => ['title', 'thumbnail', 'editor', 'author', 'custom-fields'],
        ]
    );
}
add_action( 'init', 'create_post_type_boats' );

// Cars/Boats
function create_post_type_gallery_post() {
    register_post_type(
        'gallery_post',
        [
            'labels' => [
                'name' => __( 'Записи с галереями', 'boats' ),
                'singular_name' => __( 'Запись с галереей', 'boats' )
            ],
            'description' =>  __( 'Это Записи в которые нужно добавлять галереи' ),
            'menu_icon'   => 'dashicons-format-gallery',
            'public' => true,
            'publicly_queryable' => true,
            'show_ui' => true,
            'show_in_menu' => true,
            'show_in_nav_menus' => true,
            'query_var' => true,
            'capability_type' => 'post',
            'has_archive' => false,
            'taxonomies'  => array( 'category' ),
            'supports' => ['title', 'thumbnail', 'editor', 'author', 'custom-fields', 'categories'],
        ]
    );
}
add_action( 'init', 'create_post_type_gallery_post' );
