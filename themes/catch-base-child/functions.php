<?php

namespace CatchBaseChild;

function enqueCustomStyle() {
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

function giveParentCredit( $content ) {
	$theme_data        = wp_get_theme();
	$theme_data_parent = $theme_data->parent();
	$content['right']  = esc_attr( $theme_data_parent->get( 'Name' ) )
	                     . '&nbsp;' . __( 'by', 'catch-base' )
	                     . '&nbsp;<a target="_blank" href="'
	                     . esc_url( $theme_data_parent->get( 'AuthorURI' ) )
	                     . '">' . esc_attr( $theme_data_parent->get( 'Author' ) )
	                     . '</a>'
	                     . '<br/>'
	                     . __( 'Modified by', 'catch-base-child' )
	                     . '&nbsp;<a target="_blank" href="'
	                     . esc_url( $theme_data->get( 'AuthorURI' ) )
	                     . '">' . esc_attr( $theme_data->get( 'Author' ) )
	                     . '</a>';

	return $content;
}


function setupCustomHooks() {
	\delete_transient( 'catchbase_footer_content' );
	\add_filter( 'catchbase_get_content', 'CatchBaseChild\giveParentCredit' );
}

\add_action( 'catchbase_footer', 'CatchBaseChild\setupCustomHooks' );

function setup() {
	\load_child_theme_textdomain( 'catch-base-child', \get_stylesheet_directory() . '/languages' );
}

\add_action( 'after_setup_theme', 'CatchBaseChild\setup' );

function alterThemeOptions($options){
	$options['move_title_tagline']=true;
	return $options;
}

\add_filter('theme_mod_catchbase_theme_options','CatchBaseChild\alterThemeOptions');