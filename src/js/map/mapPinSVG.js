// SVG markup for a simple map pin
export const mapPinSVG = `<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 40">
  <ellipse cx="10" cy="37" rx="2" ry="1.05" opacity=".5"/>
  <path d="M10,40c7.05,0,18.44-9.52,0-9.52s-7.05,9.52,0,9.52Z" opacity=".1"/>
  <path d="M11.17,36.83l.83-19.5h-4l.83,19.5s0,.62,1.17.62,1.17-.62,1.17-.62Z" fill="#939598"/>
  <path d="M8.47,28.38s.27.61,1.53.61,1.53-.61,1.53-.61l.47-11.05h-4l.47,11.05Z" opacity=".4"/>
  <ellipse cx="10" cy="20.78" rx="10" ry="5.67" fill="#ba5a32"/>
  <path d="M19.38,20.47c0,2.74-4.2,4.97-9.38,4.97S.62,23.21.62,20.47c0,0,2.06,3.79,9.38,3.79s9.38-3.79,9.38-3.79Z" fill="#c87b5b"/>
  <path d="M16.77,20l-2.4-14.48H5.64l-2.4,14.48s2.34,2.63,6.77,2.63,6.77-2.63,6.77-2.63Z" fill="#ba5a32"/>
  <path d="M4.64,11.52s1.28,1.29,5.36,1.29,5.36-1.29,5.36-1.29l-1-6H5.64l-1,6Z" opacity=".4"/>
  <ellipse cx="10" cy="5.17" rx="9.2" ry="5.17" fill="#ba5a32"/>
  <path d="M1.47,4.93c.18,1.97,3.92,3.54,8.53,3.54s8.36-1.57,8.53-3.54c-.18-2.57-3.92-4.62-8.53-4.62S1.64,2.36,1.47,4.93Z" fill="#c87b5b"/>
</svg>`;

// Returns a data URL for the SVG
export function getMapPinDataUrl() {
	return `data:image/svg+xml;utf8,${encodeURIComponent(mapPinSVG)}`;
}
