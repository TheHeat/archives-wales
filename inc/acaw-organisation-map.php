<?php
/**
 * Utility: Get map markers for a single organisation post, including title and url.
 *
 * @param int|null $post_id Optional. Post ID. Defaults to current post in loop.
 * @return array Array of marker arrays, each with 'title' and 'url'.
 */
function acaw_get_organisation_markers_with_title_url( $post_id = null, $markers = null ) {
    if ( ! $post_id ) {
        $post_id = get_the_ID();
    }
    $enhanced_markers = array();
    // Use provided $markers if given, otherwise fetch from ACF
    if ( is_array( $markers ) ) {
        foreach ( $markers as $marker ) {
            if ( is_array( $marker ) ) {
                $marker['title'] = get_the_title( $post_id );
                $marker['url'] = get_permalink( $post_id );
                $enhanced_markers[] = $marker;
            }
        }
    } else if ( have_rows( 'member_fields', $post_id ) ) {
        while ( have_rows( 'member_fields', $post_id ) ) {
            the_row();
            $map = get_sub_field( 'map' );
            if ( isset( $map['markers'][0] ) && is_array( $map['markers'][0] ) ) {
                $marker = $map['markers'][0];
                $marker['title'] = get_the_title( $post_id );
                $marker['url'] = get_permalink( $post_id );
                $enhanced_markers[] = $marker;
            }
        }
    }
    return $enhanced_markers;
}
