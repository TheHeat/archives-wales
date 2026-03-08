<?php

// remove unhelpful 'sizes' attribute from images, which is added by WordPress in a way that doesn't work with our CSS

add_filter( 'post_thumbnail_html', 'twr_remove_width_attribute', 10 );
add_filter( 'image_send_to_editor', 'twr_remove_width_attribute', 10 );
add_filter(	'the_content', 'twr_remove_width_attribute', 10);

function twr_remove_width_attribute($html) {
    // loop only through img tags
    if ( preg_match_all( '/<img[^>]+>/ims', $html, $matches ) ) {

        foreach ( $matches as $match ) {
            // Replace all occurences of width/height
            $clean = preg_replace('/(width|height)=["\'\d%\s]+/ims', "", $match );
            // Replace with result within html
            $html = str_replace( $match, $clean, $html );

        }
    }
    return $html;
}



// Changes the markup structure created by the caption shortcode
// uses figure and figcaption to be more HTML5 groovy.

add_filter( 'img_caption_shortcode', 'proper_image_caption', 10, 3 );

function proper_image_caption( $val, $attr, $content = null ) {
	extract(
		shortcode_atts(
			array(
				'id'      => '',
				'align'   => '',
				'width'   => '',
				'caption' => '',
			),
			$attr
		)
	);

	if ( 1 > (int) $width || empty( $caption ) ) {
		return $val;
	}

	return '<figure id="' . $id . '" class="wp-caption ' . esc_attr( $align ) . '" style="width: ' . ( 0 + (int) $width ) . 'px">' . do_shortcode( $content ) . '<figcaption class="wp-caption-text">' . $caption . '</figcation></figure>';
}



