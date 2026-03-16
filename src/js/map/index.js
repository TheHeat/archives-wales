import L from 'leaflet';
import mapPinUrl from '../../svg/mapPin.svg';

const initMap = ({ id, markers }) => {
	const mapElement = document.getElementById(id);

	if (mapElement) {
		const map = L.map(mapElement).setView([52.5, -3.5], 7);

		L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
			maxZoom: 19,
			attribution:
				'&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>',
		}).addTo(map);

		// Custom SVG marker icon
		const svgIcon = L.icon({
			iconUrl: mapPinUrl,
			iconSize: [24, 24], // adjust as needed
			iconAnchor: [12, 24],
			popupAnchor: [0, -24],
		});

		// loop markers and add to map
		markers.forEach((marker) => {
			const { lat, lng, geocode } = marker;
			const title = geocode && geocode.length > 0 ? geocode[0].name : 'Title';
			L.marker([lat, lng], { icon: svgIcon }).addTo(map).bindPopup(title);
		});
	}
};

export default initMap;
