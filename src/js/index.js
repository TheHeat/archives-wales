import initMap from './map';
import squishMenu  from 'squishMenu';

if (window.mapData) {

const mapMarkers = window.mapData.markers || [];
const mapOptions = window.mapData.options || {};

	initMap({
		id: 'map',
		markers: mapMarkers,
		options: mapOptions,
	});
}



const menu = document.querySelector('.siteNav-wrapper');

squishMenu({
	containerId: 'siteNav-wrapper',
	toggleClass: 'siteNav-toggle',
});