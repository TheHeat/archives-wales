<?php

// Register Custom Post Type Organisation
function create_organisation_cpt() {

	$labels = array(
		'name' => _x( 'Organisations', 'Post Type General Name', 'acaw' ),
		'singular_name' => _x( 'Organisation', 'Post Type Singular Name', 'acaw' ),
		'menu_name' => _x( 'Organisations', 'Admin Menu text', 'acaw' ),
		'name_admin_bar' => _x( 'Organisation', 'Add New on Toolbar', 'acaw' ),
		'archives' => __( 'Organisation Archives', 'acaw' ),
		'attributes' => __( 'Organisation Attributes', 'acaw' ),
		'parent_item_colon' => __( 'Parent Organisation:', 'acaw' ),
		'all_items' => __( 'All Organisations', 'acaw' ),
		'add_new_item' => __( 'Add New Organisation', 'acaw' ),
		'add_new' => __( 'Add New', 'acaw' ),
		'new_item' => __( 'New Organisation', 'acaw' ),
		'edit_item' => __( 'Edit Organisation', 'acaw' ),
		'update_item' => __( 'Update Organisation', 'acaw' ),
		'view_item' => __( 'View Organisation', 'acaw' ),
		'view_items' => __( 'View Organisations', 'acaw' ),
		'search_items' => __( 'Search Organisation', 'acaw' ),
		'not_found' => __( 'Not found', 'acaw' ),
		'not_found_in_trash' => __( 'Not found in Trash', 'acaw' ),
		'featured_image' => __( 'Featured Image', 'acaw' ),
		'set_featured_image' => __( 'Set featured image', 'acaw' ),
		'remove_featured_image' => __( 'Remove featured image', 'acaw' ),
		'use_featured_image' => __( 'Use as featured image', 'acaw' ),
		'insert_into_item' => __( 'Insert into Organisation', 'acaw' ),
		'uploaded_to_this_item' => __( 'Uploaded to this Organisation', 'acaw' ),
		'items_list' => __( 'Organisations list', 'acaw' ),
		'items_list_navigation' => __( 'Organisations list navigation', 'acaw' ),
		'filter_items_list' => __( 'Filter Organisations list', 'acaw' ),
	);
	$args = array(
		'label' => __( 'Organisation', 'acaw' ),
		'description' => __( '', 'acaw' ),
		'labels' => $labels,
		'menu_icon' => 'dashicons-admin-multisite',
		'supports' => array('title', 'editor', 'thumbnail', 'custom-fields'),
		'taxonomies' => array(),
		'public' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'menu_position' => 5,
		'show_in_admin_bar' => true,
		'show_in_nav_menus' => true,
		'can_export' => true,
		'has_archive' => true,
		'hierarchical' => false,
		'exclude_from_search' => true,
		// 'rewrite' => array('slug' => __('repositories', 'acaw')),s
		'show_in_rest' => true,
		'publicly_queryable' => true,
		'capability_type' => 'post',
	);
	register_post_type( 'organisation', $args );

}
add_action( 'init', 'create_organisation_cpt', 0 );

// Register Custom Post Type Project
function create_project_cpt()
{

  $labels = array(
    'name' => _x('Projects', 'Post Type General Name', 'acaw'),
    'singular_name' => _x('Project', 'Post Type Singular Name', 'acaw'),
    'menu_name' => _x('Projects', 'Admin Menu text', 'acaw'),
    'name_admin_bar' => _x('Project', 'Add New on Toolbar', 'acaw'),
    'archives' => __('Project Archives', 'acaw'),
    'attributes' => __('Project Attributes', 'acaw'),
    'parent_item_colon' => __('Parent Project:', 'acaw'),
    'all_items' => __('All Projects', 'acaw'),
    'add_new_item' => __('Add New Project', 'acaw'),
    'add_new' => __('Add New', 'acaw'),
    'new_item' => __('New Project', 'acaw'),
    'edit_item' => __('Edit Project', 'acaw'),
    'update_item' => __('Update Project', 'acaw'),
    'view_item' => __('View Project', 'acaw'),
    'view_items' => __('View Projects', 'acaw'),
    'search_items' => __('Search Project', 'acaw'),
    'not_found' => __('Not found', 'acaw'),
    'not_found_in_trash' => __('Not found in Trash', 'acaw'),
    'featured_image' => __('Featured Image', 'acaw'),
    'set_featured_image' => __('Set featured image', 'acaw'),
    'remove_featured_image' => __('Remove featured image', 'acaw'),
    'use_featured_image' => __('Use as featured image', 'acaw'),
    'insert_into_item' => __('Insert into Project', 'acaw'),
    'uploaded_to_this_item' => __('Uploaded to this Project', 'acaw'),
    'items_list' => __('Projects list', 'acaw'),
    'items_list_navigation' => __('Projects list navigation', 'acaw'),
    'filter_items_list' => __('Filter Projects list', 'acaw'),
  );
  $args = array(
    'label' => __('Project', 'acaw'),
    'description' => __('AW/AC Projects', 'acaw'),
    'labels' => $labels,
    'menu_icon' => 'dashicons-clipboard',
    'supports' => array('title', 'editor', 'thumbnail', 'excerpt'),
    'taxonomies' => array(),
    'public' => true,
    'show_ui' => true,
    'show_in_menu' => true,
    'menu_position' => 5,
    'show_in_admin_bar' => true,
    'show_in_nav_menus' => true,
    'can_export' => true,
    'has_archive' => true,
    'hierarchical' => false,
    'exclude_from_search' => false,
    'show_in_rest' => true,
    'publicly_queryable' => true,
    'capability_type' => 'post',
    'rewrite' => 'projects'
  );
  register_post_type('project', $args);
}
add_action('init', 'create_project_cpt', 0);

// Register Custom Post Type Archive Item
function create_archiveitem_cpt() {

	$labels = array(
		'name' => _x( 'Archive Items', 'Post Type General Name', 'acaw' ),
		'singular_name' => _x( 'Archive Item', 'Post Type Singular Name', 'acaw' ),
		'menu_name' => _x( 'Archive Items', 'Admin Menu text', 'acaw' ),
		'name_admin_bar' => _x( 'Archive Item', 'Add New on Toolbar', 'acaw' ),
		'archives' => __( 'Archive Item Archives', 'acaw' ),
		'attributes' => __( 'Archive Item Attributes', 'acaw' ),
		'parent_item_colon' => __( 'Parent Archive Item:', 'acaw' ),
		'all_items' => __( 'All Archive Items', 'acaw' ),
		'add_new_item' => __( 'Add New Archive Item', 'acaw' ),
		'add_new' => __( 'Add New', 'acaw' ),
		'new_item' => __( 'New Archive Item', 'acaw' ),
		'edit_item' => __( 'Edit Archive Item', 'acaw' ),
		'update_item' => __( 'Update Archive Item', 'acaw' ),
		'view_item' => __( 'View Archive Item', 'acaw' ),
		'view_items' => __( 'View Archive Items', 'acaw' ),
		'search_items' => __( 'Search Archive Item', 'acaw' ),
		'not_found' => __( 'Not found', 'acaw' ),
		'not_found_in_trash' => __( 'Not found in Trash', 'acaw' ),
		'featured_image' => __( 'Featured Image', 'acaw' ),
		'set_featured_image' => __( 'Set featured image', 'acaw' ),
		'remove_featured_image' => __( 'Remove featured image', 'acaw' ),
		'use_featured_image' => __( 'Use as featured image', 'acaw' ),
		'insert_into_item' => __( 'Insert into Archive Item', 'acaw' ),
		'uploaded_to_this_item' => __( 'Uploaded to this Archive Item', 'acaw' ),
		'items_list' => __( 'Archive Items list', 'acaw' ),
		'items_list_navigation' => __( 'Archive Items list navigation', 'acaw' ),
		'filter_items_list' => __( 'Filter Archive Items list', 'acaw' ),
	);
	$args = array(
		'label' => __( 'Archive Item', 'acaw' ),
		'description' => __( '', 'acaw' ),
		'labels' => $labels,
		'menu_icon' => 'dashicons-media-document',
		'supports' => array('title', 'excerpt', 'thumbnail', 'revisions', 'author', 'custom-fields'),
		'taxonomies' => array(),
		'public' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'menu_position' => 5,
		'show_in_admin_bar' => true,
		'show_in_nav_menus' => true,
		'can_export' => true,
		'has_archive' => false,
		'hierarchical' => false,
		'exclude_from_search' => true,
		'show_in_rest' => true,
		'publicly_queryable' => false,
		'capability_type' => 'post',
	);
	register_post_type( 'archiveitem', $args );

}
add_action( 'init', 'create_archiveitem_cpt', 0 );