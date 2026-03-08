<?php
/**
 * Preview of a single post.
 *
 * @package WordPress
 */

?>
<article <?php post_class( 'postTeaser' ); ?>>
<div class="postTeaser-inner">

	<div class="postTeaser-content">
		<h3><a href="<?php the_permalink();?>">
			<?php the_title(); ?>
		</a></h3>
	</div>

</div>
</article>
