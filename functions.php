<?php
/**
 * Core functions file for Proper Bear.
 *
 * @package WordPress
 */

/**
 * Theme setup function
 */
function properbear_setup() {
	load_theme_textdomain( 'properbear', get_template_directory() . '/languages' );

	add_theme_support( 'html5', array( 'comment-list', 'search-form', 'comment-form', 'gallery' ) );
	add_post_type_support( 'page', 'excerpt' );

	register_nav_menu( 'primary', __( 'Navigation Menu', 'properbear' ) );
}
add_action( 'after_setup_theme', 'properbear_setup' );

/**
 * Scripts & Styles
 */
function properbear_scripts_styles() {

    $manifestPath = get_theme_file_path('dist/.vite/manifest.json');
    
    // Check if the manifest file exists and is readable before using it
    if (file_exists($manifestPath)) {
        $manifest = json_decode(file_get_contents($manifestPath), true);
        
        // Check if the file is in the manifest before enqueuing
        if (isset($manifest['src/js/index.jsx'])) {
            wp_enqueue_script('archives-wales', get_theme_file_uri('dist/' . $manifest['src/js/index.jsx']['file']));
            // Enqueue the CSS file
            wp_enqueue_style('archives-wales', get_theme_file_uri('dist/' . $manifest['src/js/index.jsx']['css'][0]));
        }
    }


	// /**
	// * Load Comments
	// */
	// if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
	// 	wp_enqueue_script( 'comment-reply' );
	// }
}
add_action( 'wp_enqueue_scripts', 'properbear_scripts_styles' );

	/**
	* Include all PHP files in the inc folder
	*/
foreach ( glob( get_template_directory() . '/inc/*.php' ) as $filename ) {
	require_once $filename;
}

add_theme_support( 'post-thumbnails' );

/**
 * Set Image sizes
*/
add_image_size( 'hero-large', 1920, 1080, true );
add_image_size( 'hero', 1280, 720, true );
add_image_size( 'hero-small', 800, 450, true );
add_image_size( 'thumbnail-large', 800, 800, true );
