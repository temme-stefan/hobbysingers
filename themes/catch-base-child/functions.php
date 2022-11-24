<?php
namespace CatchBaseChild;

function enqueCustomStyle(){
    wp_enqueue_style( 'catchbase-child-style',
        get_stylesheet_uri(),
        array( 'catchbase-style' ),
        wp_get_theme()->get( 'Version' )
    );
}


\add_action( 'wp_enqueue_scripts', 'CatchBaseChild\enqueCustomStyle' );

