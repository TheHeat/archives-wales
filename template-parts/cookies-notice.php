<?php
/**
 * Render target for React Cookie Consent
 *
 * @package WordPress
 */

$cookie_strings = array(
	'message'    => __( 'We use cookies from third-party services to help us improve our website.', 'acaw' ),
	'buttonText' => __( 'Ok, got it', 'acaw' ),
);

wp_localize_script( 'acaw-theme', 'cookieStrings', $cookie_strings );

?>
 
<div id="cookiesRoot"></div>
