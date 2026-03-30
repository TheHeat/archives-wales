import L from 'leaflet';
import mapPinUrl from '../../svg/mapPin.svg';

const initMap = ({ id, markers, options = {} }) => {
	const {
		disableControls = false,
		disableInteractivity = false,
		overlayLinkUrl = '',
		overlayLinkLabel = 'Open full map',
	} = options;
	
	const userLang = document.documentElement.lang;
	const isWelsh = userLang && userLang.toLowerCase().startsWith('cy');
	
	const tilesCymraegURL = 'https://openstreetmap.cymru/osm_tiles/{z}/{x}/{y}.png';
	const tilesAttrCymraeg = 'Defnyddiwch openstreetmap.cymru. Data ar y map © Cyfranwyr osm.org';
	
	const tilesEnglishURL = 'https://tile.openstreetmap.org/{z}/{x}/{y}.png';
	const tilesAttrEnglish = 'Map data © OpenStreetMap';
	
	const tilesURL = isWelsh ? tilesCymraegURL : tilesEnglishURL;
	const tilesAttr = isWelsh ? tilesAttrCymraeg : tilesAttrEnglish;

	const mapElement = document.getElementById(id);
	const safeOverlayLinkUrl =
		typeof overlayLinkUrl === 'string' && overlayLinkUrl.trim() ? overlayLinkUrl.trim() : '';
	const safeOverlayLinkLabel =
		typeof overlayLinkLabel === 'string' && overlayLinkLabel.trim() ? overlayLinkLabel.trim() : 'Open full map';
	const effectiveDisableControls = disableControls || Boolean(safeOverlayLinkUrl);

	// console.log('Initializing map with markers:', markers);

	if (mapElement) {
		const map = L.map(mapElement, {
			zoomControl: !effectiveDisableControls,
			attributionControl: !effectiveDisableControls,
			dragging: !disableInteractivity,
			touchZoom: !disableInteractivity,
			doubleClickZoom: !disableInteractivity,
			scrollWheelZoom: !disableInteractivity,
			boxZoom: !disableInteractivity,
			keyboard: !disableInteractivity,
			tap: !disableInteractivity,
		});
		const hasAttributionControl = !effectiveDisableControls && Boolean(map.attributionControl);

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

				if (hasAttributionControl) {
					map.attributionControl.removeAttribution(tilesAttrCymraeg);
					map.attributionControl.addAttribution(tilesAttrEnglish);
				}
			});
		}

		if (effectiveDisableControls) {
			const hideMapControls = () => {
				const controlNodes = mapElement.querySelectorAll(
					'.leaflet-control-container, .leaflet-top, .leaflet-bottom, .leaflet-control, .leaflet-control-zoom, .leaflet-control-attribution'
				);

				controlNodes.forEach((node) => {
					node.style.setProperty('display', 'none', 'important');
					node.style.setProperty('visibility', 'hidden', 'important');
					node.style.setProperty('pointer-events', 'none', 'important');
				});
			};

			if (map.zoomControl) {
				map.removeControl(map.zoomControl);
			}

			if (map.attributionControl) {
				map.removeControl(map.attributionControl);
			}

			hideMapControls();
			map.whenReady(hideMapControls);
		}

		if (hasAttributionControl) {
			map.attributionControl.setPrefix(false);
		}


		if (safeOverlayLinkUrl) {
			mapElement.style.position = 'relative';

			const fullMapLink = document.createElement('a');
			fullMapLink.href = safeOverlayLinkUrl;
			fullMapLink.className = 'leafletMap-fullLink';
			fullMapLink.target = '_blank';
			fullMapLink.rel = 'noopener';
			fullMapLink.ariaLabel = safeOverlayLinkLabel;
			fullMapLink.style.position = 'absolute';
			fullMapLink.style.inset = '0';
			fullMapLink.style.zIndex = '1000';
			fullMapLink.style.display = 'block';
			fullMapLink.style.background = 'transparent';

			mapElement.appendChild(fullMapLink);
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
				const leafletMarker = L.marker(point, { icon: svgIcon }).addTo(map);

				if (!disableInteractivity) {
					leafletMarker.bindPopup(popupContent);
				}
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
