import initMap from './map';


const mapMarkers = mapData.markers || [];

initMap({
	id: 'map',
	markers: mapMarkers,
});