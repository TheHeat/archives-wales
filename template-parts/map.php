<?php

	$markers = $args['markers'] ?? [];
	$map_options = $args['map_options'] ?? [];

	$disable_controls = !empty($map_options['disable_controls']);
	$disable_interactivity = !empty($map_options['disable_interactivity']);
	$overlay_link_url = '';

	if (isset($map_options['map_link_url'])) {
		$overlay_link_url = esc_url_raw($map_options['map_link_url']);
	} elseif (isset($map_options['overlay_url'])) {
		$overlay_link_url = esc_url_raw($map_options['overlay_url']);
	}


	wp_localize_script('acaw-main', 'mapData', [
		'markers' => $markers,
		'options' => [
			'disableControls' => $disable_controls,
			'disableInteractivity' => $disable_interactivity,
			'overlayLinkUrl' => $overlay_link_url,
			'overlayLinkLabel' => __('Open full map', 'acaw'),
		],
	]);

?>

<div class="leafletMap" id="map"></div>