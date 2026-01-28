<?php

// Register Custom Post Type Organisation
function create_organisation_cpt() {

	$labels = array(
		'name' => _x( 'Organisations', 'Post Type General Name', 'properbear' ),
		'singular_name' => _x( 'Organisation', 'Post Type Singular Name', 'properbear' ),
		'menu_name' => _x( 'Organisations', 'Admin Menu text', 'properbear' ),
		'name_admin_bar' => _x( 'Organisation', 'Add New on Toolbar', 'properbear' ),
		'archives' => __( 'Organisation Archives', 'properbear' ),
		'attributes' => __( 'Organisation Attributes', 'properbear' ),
		'parent_item_colon' => __( 'Parent Organisation:', 'properbear' ),
		'all_items' => __( 'All Organisations', 'properbear' ),
		'add_new_item' => __( 'Add New Organisation', 'properbear' ),
		'add_new' => __( 'Add New', 'properbear' ),
		'new_item' => __( 'New Organisation', 'properbear' ),
		'edit_item' => __( 'Edit Organisation', 'properbear' ),
		'update_item' => __( 'Update Organisation', 'properbear' ),
		'view_item' => __( 'View Organisation', 'properbear' ),
		'view_items' => __( 'View Organisations', 'properbear' ),
		'search_items' => __( 'Search Organisation', 'properbear' ),
		'not_found' => __( 'Not found', 'properbear' ),
		'not_found_in_trash' => __( 'Not found in Trash', 'properbear' ),
		'featured_image' => __( 'Featured Image', 'properbear' ),
		'set_featured_image' => __( 'Set featured image', 'properbear' ),
		'remove_featured_image' => __( 'Remove featured image', 'properbear' ),
		'use_featured_image' => __( 'Use as featured image', 'properbear' ),
		'insert_into_item' => __( 'Insert into Organisation', 'properbear' ),
		'uploaded_to_this_item' => __( 'Uploaded to this Organisation', 'properbear' ),
		'items_list' => __( 'Organisations list', 'properbear' ),
		'items_list_navigation' => __( 'Organisations list navigation', 'properbear' ),
		'filter_items_list' => __( 'Filter Organisations list', 'properbear' ),
	);
	$args = array(
		'label' => __( 'Organisation', 'properbear' ),
		'description' => __( '', 'properbear' ),
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
		'has_archive' => false,
		'hierarchical' => false,
		'exclude_from_search' => true,
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
    'name' => _x('Projects', 'Post Type General Name', 'properbear'),
    'singular_name' => _x('Project', 'Post Type Singular Name', 'properbear'),
    'menu_name' => _x('Projects', 'Admin Menu text', 'properbear'),
    'name_admin_bar' => _x('Project', 'Add New on Toolbar', 'properbear'),
    'archives' => __('Project Archives', 'properbear'),
    'attributes' => __('Project Attributes', 'properbear'),
    'parent_item_colon' => __('Parent Project:', 'properbear'),
    'all_items' => __('All Projects', 'properbear'),
    'add_new_item' => __('Add New Project', 'properbear'),
    'add_new' => __('Add New', 'properbear'),
    'new_item' => __('New Project', 'properbear'),
    'edit_item' => __('Edit Project', 'properbear'),
    'update_item' => __('Update Project', 'properbear'),
    'view_item' => __('View Project', 'properbear'),
    'view_items' => __('View Projects', 'properbear'),
    'search_items' => __('Search Project', 'properbear'),
    'not_found' => __('Not found', 'properbear'),
    'not_found_in_trash' => __('Not found in Trash', 'properbear'),
    'featured_image' => __('Featured Image', 'properbear'),
    'set_featured_image' => __('Set featured image', 'properbear'),
    'remove_featured_image' => __('Remove featured image', 'properbear'),
    'use_featured_image' => __('Use as featured image', 'properbear'),
    'insert_into_item' => __('Insert into Project', 'properbear'),
    'uploaded_to_this_item' => __('Uploaded to this Project', 'properbear'),
    'items_list' => __('Projects list', 'properbear'),
    'items_list_navigation' => __('Projects list navigation', 'properbear'),
    'filter_items_list' => __('Filter Projects list', 'properbear'),
  );
  $args = array(
    'label' => __('Project', 'properbear'),
    'description' => __('AW/AC Projects', 'properbear'),
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
		'name' => _x( 'Archive Items', 'Post Type General Name', 'properbear' ),
		'singular_name' => _x( 'Archive Item', 'Post Type Singular Name', 'properbear' ),
		'menu_name' => _x( 'Archive Items', 'Admin Menu text', 'properbear' ),
		'name_admin_bar' => _x( 'Archive Item', 'Add New on Toolbar', 'properbear' ),
		'archives' => __( 'Archive Item Archives', 'properbear' ),
		'attributes' => __( 'Archive Item Attributes', 'properbear' ),
		'parent_item_colon' => __( 'Parent Archive Item:', 'properbear' ),
		'all_items' => __( 'All Archive Items', 'properbear' ),
		'add_new_item' => __( 'Add New Archive Item', 'properbear' ),
		'add_new' => __( 'Add New', 'properbear' ),
		'new_item' => __( 'New Archive Item', 'properbear' ),
		'edit_item' => __( 'Edit Archive Item', 'properbear' ),
		'update_item' => __( 'Update Archive Item', 'properbear' ),
		'view_item' => __( 'View Archive Item', 'properbear' ),
		'view_items' => __( 'View Archive Items', 'properbear' ),
		'search_items' => __( 'Search Archive Item', 'properbear' ),
		'not_found' => __( 'Not found', 'properbear' ),
		'not_found_in_trash' => __( 'Not found in Trash', 'properbear' ),
		'featured_image' => __( 'Featured Image', 'properbear' ),
		'set_featured_image' => __( 'Set featured image', 'properbear' ),
		'remove_featured_image' => __( 'Remove featured image', 'properbear' ),
		'use_featured_image' => __( 'Use as featured image', 'properbear' ),
		'insert_into_item' => __( 'Insert into Archive Item', 'properbear' ),
		'uploaded_to_this_item' => __( 'Uploaded to this Archive Item', 'properbear' ),
		'items_list' => __( 'Archive Items list', 'properbear' ),
		'items_list_navigation' => __( 'Archive Items list navigation', 'properbear' ),
		'filter_items_list' => __( 'Filter Archive Items list', 'properbear' ),
	);
	$args = array(
		'label' => __( 'Archive Item', 'properbear' ),
		'description' => __( '', 'properbear' ),
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