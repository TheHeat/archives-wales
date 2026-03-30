import L from 'leaflet';
import mapPinUrl from '../../svg/mapPin.svg';

const initMap = ({ id, markers }) => {
	
	const userLang = document.documentElement.lang;
	const isWelsh = userLang && userLang.toLowerCase().startsWith('cy');
	
	const tilesCymraegURL = 'https://openstreetmap.cymru/osm_tiles/{z}/{x}/{y}.png';
	const tilesAttrCymraeg = 'Defnyddiwch openstreetmap.cymru. Data ar y map © Cyfranwyr osm.org';
	
	const tilesEnglishURL = 'https://tile.openstreetmap.org/{z}/{x}/{y}.png';
	const tilesAttrEnglish = 'Map data © OpenStreetMap';
	
	const tilesURL = isWelsh ? tilesCymraegURL : tilesEnglishURL;
	const tilesAttr = isWelsh ? tilesAttrCymraeg : tilesAttrEnglish;

	const mapElement = document.getElementById(id);

	// console.log('Initializing map with markers:', markers);

	if (mapElement) {
		const map = L.map(mapElement);
		map.attributionControl.setPrefix(false);

		const tileLayer = L.tileLayer(tilesURL, {
			maxZoom: 16,
			attribution: tilesAttr,
		}).addTo(map);


		// Failsafe guard to fall back to English tiles if Welsh tiles fail to load
		if (isWelsh) {
			let hasFallenBackToEnglish = false;

			tileLayer.on('tileerror', () => {
				if (hasFallenBackToEnglish) {
					return;
				}

				hasFallenBackToEnglish = true;
				tileLayer.setUrl(tilesEnglishURL);
				map.attributionControl.removeAttribution(tilesAttrCymraeg);
				map.attributionControl.addAttribution(tilesAttrEnglish);
			});
		}

		// Custom SVG marker icon
		const svgIcon = L.icon({
			iconUrl: mapPinUrl,
			iconSize: [24, 24], // adjust as needed
			iconAnchor: [12, 24],
			popupAnchor: [0, -24],
		});

		const validMarkerPoints = [];

		// loop markers and add to map
		markers.forEach((marker) => {
			const { title, url, lat, lng, label } = marker;
			const popupContent = `<a href="${url}" target="_blank" rel="noopener">${title}</a><div>${label}</div>`;
			const latitude = Number(lat);
			const longitude = Number(lng);

			if (Number.isFinite(latitude) && Number.isFinite(longitude)) {
				const point = [latitude, longitude];
				validMarkerPoints.push(point);
				L.marker(point, { icon: svgIcon }).addTo(map).bindPopup(popupContent);
			}
		});

		if (validMarkerPoints.length === 1) {
			map.setView(validMarkerPoints[0], 12);
		} else if (validMarkerPoints.length > 1) {
			map.fitBounds(validMarkerPoints, {
				padding: [24, 24],
			});
		} else {
			// No valid markers, set default view over Wales
			map.setView([52.5, -3.5], 7);
		}
	}
};

export default initMap;
