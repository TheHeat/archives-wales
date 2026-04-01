<?php
/**
 * Preview of a single post.
 *
 * @package WordPress
 */

?>
<article <?php post_class( 'postTeaser' ); ?>>
<div class="postTeaser-inner">
<?php if(is_home()): the_post_thumbnail(); endif; ?>
	<div class="postTeaser-content">
			<?php proper_post_date(); ?>
		<h3 class="postTeaser-title">
			<a href="<?php the_permalink();?>"><?php the_title(); ?></a>
		</h3>
	</div>
</div>
</article>
