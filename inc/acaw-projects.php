<?php

function projects_query($query) {

	if (! is_admin() && $query->is_main_query() && isset($query->query['post_type']) && $query->query['post_type']=='project') {
		// Order projects by end_date meta key in descending order
		$query->set('meta_key', 'end_date');
		$query->set('orderby', 'meta_value');
		$query->set('order', 'DESC');
	}
	
}

add_action( 'pre_get_posts', 'projects_query' );