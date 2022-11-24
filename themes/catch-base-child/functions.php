<?php
namespace CatchBaseChild;

function enqueCustomStyle(){
    $parenthandle = 'catchbase-style';
    $theme        = wp_get_theme();
    wp_enqueue_style( $parenthandle,
        get_template_directory_uri() . '/style.css',
        null,
        date( 'Ymd-Gis', filemtime( get_template_directory() . '/style.css' ) )
    );
    wp_enqueue_style( 'catchbase-child-style',
        get_stylesheet_uri(),
        array( $parenthandle ),
        date( 'Ymd-Gis',filemtime(get_stylesheet_directory().'/style.css'))
    );
}


\add_action( 'wp_enqueue_scripts', 'CatchBaseChild\enqueCustomStyle' );

