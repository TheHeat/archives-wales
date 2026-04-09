import L from 'leaflet';
import { getMapPinDataUrl } from './mapPinSVG';

const initMap = ({ id, markers, options = {} }) => {
	const { overlayLinkUrl = '', overlayLinkLabel = 'Open full map' } = options;
	const userLang = document.documentElement.lang;
	const isWelsh = userLang && userLang.toLowerCase().startsWith('cy');
	const tilesCymraegURL =
		'https://openstreetmap.cymru/osm_tiles/{z}/{x}/{y}.png';
	const tilesAttrCymraeg =
		'Defnyddiwch openstreetmap.cymru. Data ar y map © Cyfranwyr osm.org';
	const tilesEnglishURL = 'https://tile.openstreetmap.org/{z}/{x}/{y}.png';
	const tilesAttrEnglish = 'Map data © OpenStreetMap';
	const tilesURL = isWelsh ? tilesCymraegURL : tilesEnglishURL;
	const tilesAttr = isWelsh ? tilesAttrCymraeg : tilesAttrEnglish;
	const mapElement = document.getElementById(id);
	const safeOverlayLinkUrl =
		typeof overlayLinkUrl === 'string' && overlayLinkUrl.trim()
			? overlayLinkUrl.trim()
			: '';
	const safeOverlayLinkLabel =
		typeof overlayLinkLabel === 'string' && overlayLinkLabel.trim()
			? overlayLinkLabel.trim()
			: 'Open full map';
	const effectiveDisableControls = Boolean(safeOverlayLinkUrl);

	if (mapElement) {
		const map = L.map(mapElement, {
			zoomControl: !effectiveDisableControls,
			attributionControl: !effectiveDisableControls,
			dragging: !effectiveDisableControls,
			touchZoom: !effectiveDisableControls,
			doubleClickZoom: !effectiveDisableControls,
			scrollWheelZoom: !effectiveDisableControls,
			boxZoom: !effectiveDisableControls,
			keyboard: !effectiveDisableControls,
			tap: !effectiveDisableControls,
		});
		const hasAttributionControl =
			!effectiveDisableControls && Boolean(map.attributionControl);

		const tileLayer = L.tileLayer(tilesURL, {
			maxZoom: 16,
			attribution: tilesAttr,
		}).addTo(map);

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
					'.leaflet-control-container, .leaflet-top, .leaflet-bottom, .leaflet-control, .leaflet-control-zoom, .leaflet-control-attribution',
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
			fullMapLink.ariaLabel = safeOverlayLinkLabel;
			fullMapLink.style.position = 'absolute';
			fullMapLink.style.inset = '0';
			fullMapLink.style.zIndex = '1000';
			fullMapLink.style.display = 'block';
			fullMapLink.style.background = 'transparent';

			mapElement.appendChild(fullMapLink);
		}

		const svgIcon = L.icon({
			iconUrl: getMapPinDataUrl(),
			iconSize: [20, 40], // adjust as needed
			iconAnchor: [10, 35], // point of the icon which will correspond to marker's location
			popupAnchor: [0, -40],
		});

		const validMarkerPoints = [];

		markers.forEach((marker) => {
			const { title, url, lat, lng, label } = marker;
			const popupContent = `<a href="${url}">${title}</a><div>${label}</div>`;
			const latitude = Number(lat);
			const longitude = Number(lng);

			if (Number.isFinite(latitude) && Number.isFinite(longitude)) {
				const point = [latitude, longitude];
				validMarkerPoints.push(point);
				const leafletMarker = L.marker(point, { icon: svgIcon }).addTo(map);

				if (!effectiveDisableControls) {
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
			map.setView([52.5, -3.5], 7);
		}
	}
};

export default initMap;
