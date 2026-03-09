<?php


$title = get_the_title();
$link  = get_field( 'website' );
$image = get_field('logo')
	? wp_get_attachment_image( get_field('logo'), 'medium', null, array( 'class' => 'projectSidebar-logo' ) )
	: get_proper_svg( 'fallback-organisation', 'projectSidebar-logo fallback', '' );



$format = $link ? '<a title="%1$s" href="%2$s">%3$s</a>' : '%3$s';

echo sprintf( $format, $title, $link, $image );