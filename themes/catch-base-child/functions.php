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

function giveParentCredit($content){
	$theme_data = wp_get_theme()->parent();
	$content['right'].=' '.esc_attr( $theme_data->get( 'Name') ) . '&nbsp;' . __( 'by', 'catch-base' ). '&nbsp;<a target="_blank" href="'. esc_url( $theme_data->get( 'AuthorURI' ) ) .'">'. esc_attr( $theme_data->get( 'Author' ) ) .'</a>';
	return $content;
}

\add_filter( 'catchbase_get_content','CatchBaseChild\giveParentCredit');