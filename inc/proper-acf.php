<?php

// Proper Bear Adavnced Custom Fields helpers

// Add custom load and save points for Advanced Custom Fields
add_filter( 'acf/settings/save_json', 'acaw_acf_save_point' );

function acaw_acf_save_point( $path ) {

	// update path
	$path = get_stylesheet_directory() . '/src/acf-json';

	// return
	return $path;
}


add_filter( 'acf/settings/load_json', 'acaw_json_load_point' );

function acaw_json_load_point( $paths ) {

	// remove original path (optional)
	unset( $paths[0] );

	// append path
	$paths[] = get_stylesheet_directory() . '/src/acf-json';

	// return
	return $paths;
}


// register Google Maps API Key

function acaw_acf_init() {
    
    acf_update_setting('google_api_key', 'AIzaSyAptx7O3rvOdWuS2PVv3rSil3hwRj4SK8E');
}

add_action('acf/init', 'acaw_acf_init');