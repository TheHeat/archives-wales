import initMap from './map';

const mapMarkers = window.mapData.markers || [];
const mapOptions = window.mapData.options || {};

initMap({
	id: 'map',
	markers: mapMarkers,
	options: mapOptions,
});