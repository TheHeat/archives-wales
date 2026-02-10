<?php

//
// remove the protocol from a given url //
//

function proper_strip_protocol( $url ) {

	$stripped_url = preg_replace( '#^https?://#', '', $url );
	return $stripped_url;
}



//
// return just the domain and TLD from a given url //
//
function proper_clean_address( $url ) {
	// Remove protocol and www
	$host = preg_replace( '#^https?://#', '', $url );
	$host = preg_replace( '#^www\.#', '', $host );
	// Extract domain and TLD
	$parts = explode('/', $host, 2);
	$domain = $parts[0];
	return $domain;
}



