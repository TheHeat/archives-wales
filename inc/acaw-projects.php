<?php

function projects_query($query) {

	if (! is_admin() && $query->is_main_query() && isset($query->query['post_type']) && $query->query['post_type']=='project') {
		// Order projects by end_date meta key in descending order
		// Exclude projects with an end_date and order by start_date
		$query->set('meta_query', array(
			array(
				'key' => 'end_date',
				'value' => '',
				'compare' => '=='
			)
		));
		$query->set('orderby', 'meta_value');
		$query->set('meta_key', 'start_date');
		$query->set('order', 'DESC');
	}
	
}

add_action( 'pre_get_posts', 'projects_query' );