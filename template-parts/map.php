<?php



	$markers = $args['markers'];

?>



<?php if (!empty($markers)): ?>

<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY="
crossorigin=""/>

<!-- Make sure you put this AFTER Leaflet's CSS -->
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo="
crossorigin=""></script>


<div id="map"></div>


<style>
	#map { height: 400px; }
	</style>


	<script>




		var map = L.map('map').setView([ 52.5, -3.5], 7);

		L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
    maxZoom: 19,
    attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
}).addTo(map);



		// // Place markers for each item in markers array

			<?php if (!empty($markers)): ?>
				<?php foreach ($markers as $marker): ?>
					L.marker([<?php echo $marker['lat']; ?>, <?php echo $marker['lng']; ?>])
						.addTo(map)
						.bindPopup('<?php echo addslashes($marker['geocode'][0]["name"] ?? $marker["label"] ?? ""); ?>');
			<?php endforeach; ?>
			<?php endif; ?>

	</script>




<?php endif; ?>