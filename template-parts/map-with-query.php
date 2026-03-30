<?php
	$markers = array();
	$map_options = isset($args['map_options']) && is_array($args['map_options'])
		? $args['map_options']
		: array();

	$members = new WP_Query(array(
		'post_type' => 'organisation',
		'posts_per_page' => -1,
		'meta_query' => array(
			array(
				'key' => 'member',
				'value' => '1',
				'compare' => '='
			)
		),
		'orderby' => 'title',
		'order' => 'ASC'
	));


	if($members->have_posts()){
		$markers = array();
		while($members->have_posts()){
			$members->the_post();
			$post_id = get_the_ID();
			$org_markers = acaw_get_organisation_markers_with_title_url($post_id);
			if(!empty($org_markers)){
				$markers = array_merge($markers, $org_markers);
			}
		}
		wp_reset_postdata();
	}

	$map_args = [
		'markers' => $markers,
		'wrapper' => 'teaser-map',
	];

	if (!empty($map_options)) {
		$map_args['map_options'] = $map_options;
	}


	get_template_part('template-parts/map', null, $map_args); 
	
	
	?>