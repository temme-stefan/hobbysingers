<?php
namespace CatchBaseChild;

function enqueCustomStyle(){
    $parenthandle = 'catchbase-style';
    $theme        = wp_get_theme();
    wp_enqueue_style( $parenthandle,
        get_template_directory_uri() . '/style.css',
        array(),
        $theme->parent()->get( 'Version' )
    );
    wp_enqueue_style( 'catchbase-child-style',
        get_stylesheet_uri(),
        array( $parenthandle ),
        $theme->get( 'Version' )
    );
}


\add_action( 'wp_enqueue_scripts', 'CatchBaseChild\enqueCustomStyle' );

