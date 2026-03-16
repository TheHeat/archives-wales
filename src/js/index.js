import initMap from './map';

const mapMarkers = window.mapData.markers || [];

initMap({
	id: 'map',
	markers: mapMarkers,
});