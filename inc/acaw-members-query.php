<?php

function members_query($query) {

	if (! is_admin() && $query->is_main_query() && isset($query->query['post_type']) && $query->query['post_type']=='organisation') {

		$query->set( 'order', 'ASC' );
		$query->set( 'orderby', 'name' );
		$query->set( 'meta_query', array(
			array(
				'key' => 'member',
				'value' => true,
				'compare' => '='
			)
		) );

	}
}

add_action( 'pre_get_posts', 'members_query' );