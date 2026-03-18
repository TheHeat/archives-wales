<?php
/**
 * Core functions file for Proper Bear.
 *
 * @package WordPress
 */

/**
 * Theme setup function
 */
function acaw_setup() {

	add_theme_support( 'html5', array( 'comment-list', 'search-form', 'comment-form', 'gallery' ) );
	add_post_type_support( 'page', 'excerpt' );
	
	register_nav_menu( 'primary', __( 'Header Menu', 'acaw' ) );
	register_nav_menu( 'secondary', __( 'Footer Menu', 'acaw' ) );
	
	}
	add_action( 'after_setup_theme', 'acaw_setup' );
	
	/**
	 * Scripts & Styles
	*/
	function acaw_scripts_styles() {
		
		wp_enqueue_style('acaw-style', get_stylesheet_uri(), array(), wp_get_theme()->get( 'Version' ) );
		
		// Enqueue Vite-built JS bundle
		wp_enqueue_script(
			'acaw-main',
			get_template_directory_uri() . '/build/main.js',
			array('wp-element'),
			null,
			true
			);
			
			
			}
			add_action( 'wp_enqueue_scripts', 'acaw_scripts_styles' );
			
			/**
			 * Include all PHP files in the inc folder
			*/
			foreach ( glob( get_template_directory() . '/inc/*.php' ) as $filename ) {
				require_once $filename;
				}
				
				add_theme_support( 'post-thumbnails' );
				load_theme_textdomain( 'acaw', get_template_directory() . '/languages' );

/**
 * Set Image sizes
*/
add_image_size( 'hero-large', 1920, 1080, true );
add_image_size( 'hero', 1280, 720, true );
add_image_size( 'hero-small', 800, 450, true );
add_image_size( 'thumbnail-large', 800, 800, true );
