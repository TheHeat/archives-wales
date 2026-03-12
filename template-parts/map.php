<?php



	$markers = $args['markers'];


	wp_localize_script('acaw-main', 'mapData', [
		'markers' => $markers,
	]);

?>

<div class="leafletMap" id="map"></div>