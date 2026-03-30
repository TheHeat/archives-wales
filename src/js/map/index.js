import L from 'leaflet';
import mapPinUrl from '../../svg/mapPin.svg';

const initMap = ({ id, markers }) => {
	const mapElement = document.getElementById(id);

	// console.log('Initializing map with markers:', markers);

	if (mapElement) {
		const map = L.map(mapElement).setView([52.5, -3.5], 7);
		map.attributionControl.setPrefix(false);

		L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
			maxZoom: 19,
			attribution: false,
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
			const { title, url, lat, lng, label } = marker;
			const popupContent = `<a href="${url}" target="_blank" rel="noopener">${title}</a><div>${label}</div>`;

			if (lat && lng) {
				L.marker([lat, lng], { icon: svgIcon }).addTo(map).bindPopup(popupContent);
			}
		});
	}
};

export default initMap;
