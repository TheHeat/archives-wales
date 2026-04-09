// SVG markup for a simple map pin
export const mapPinSVG = `<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 40">
  <polygon points="17.1 22.02 2.9 22.02 5.64 5.52 14.36 5.52 17.1 22.02" fill="#ba5a32"/>
  <path d="M10,40c7.05,0,18.44-9.52,0-9.52s-7.05,9.52,0,9.52Z" opacity=".1"/>
  <path d="M11.17,36.83l.83-19.5h-4l.83,19.5s.37.62,1.17.62,1.17-.62,1.17-.62Z" fill="#aeaeae"/>
  <path d="M8.47,28.38s.27.61,1.53.61,1.53-.61,1.53-.61l.47-11.05h-4l.47,11.05Z" opacity=".25"/>
  <ellipse cx="10" cy="20.78" rx="10" ry="5.67" fill="#ba5a32"/>
  <path d="M4.64,11.52s1.28,1.29,5.36,1.29,5.36-1.29,5.36-1.29l-1-6H5.64l-1,6Z" opacity=".25"/>
  <ellipse cx="10" cy="5.17" rx="9.2" ry="5.17" fill="#ba5a32"/>
</svg>`;

// Returns a data URL for the SVG
export function getMapPinDataUrl() {
	return `data:image/svg+xml;utf8,${encodeURIComponent(mapPinSVG)}`;
}
