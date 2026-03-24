<?php

$class = isset($args['class']) ? $args['class'] : 'organisation-logo';
$title = get_the_title();
$link  = get_field( 'website' );
$image = get_field('logo')
	? wp_get_attachment_image( get_field('logo'), 'medium', null, array( 'class' => $class ) )
	: sprintf( '<div class="logo-placeholder %s">%s</div>', $class, $title );


$format = $link ? '<a title="%1$s" href="%2$s">%3$s</a>' : '<div>%3$s</div>';

echo sprintf( $format, $title, $link, $image );