<?php

/*
=====================
    Theme setup
=====================	
*/


function codelibry_setup(){

	load_theme_textdomain( 'theme_slug', get_template_directory() . '/languages' );

	add_theme_support( 'title-tag' );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'menus' );
	add_theme_support( 'woocommerce' );

	global $content_width;
	if ( ! isset( $content_width ) ) $content_width = 640;

  register_nav_menus(
    array(
      'header-menu' => __('Header Menu', 'ywm'),
      'footer-menu' => __('Footer Menu', 'ywm'),
      'footer-menu-1' => __('Footer Col 1', 'ywm'),
      'footer-menu-2' => __('Footer Col 2', 'ywm'),
      'footer-menu-3' => __('Footer Col 3', 'ywm'),
    )
  );
}

add_action( 'after_setup_theme', 'codelibry_setup', 0 );
