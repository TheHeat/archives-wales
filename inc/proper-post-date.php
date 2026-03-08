
<?php

/**
 * Template part for displaying the proper post date.
 *
 * @package WordPress
 */	

function proper_post_date() {

	?>
	<time class="meta dt-published" datetime="<?php echo get_the_date( 'c' ); ?>">
		<?php the_date( get_option( 'date_format' ) ); ?>
	</time>
	<?php
}