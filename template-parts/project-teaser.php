<?php
/**
 * Preview of a single post.
 *
 * @package WordPress
 */

?>
<article <?php post_class( 'projectTeaser' ); ?>>
<div class="projectTeaser-inner">

	<div class="projectTeaser-content">
		<h3><a href="<?php the_permalink();?>">
			<?php the_title(); ?>
		</a></h3>
	</div>
	
	<a class="projectTeaser-image-link" href="<?php the_permalink();?>">
		<?php echo get_the_post_thumbnail(null, 'thumbnail', array('class' => 'projectTeaser-image')); ?>
	</a>
</div>
	<a class="button" href="<?php the_permalink();?>"><?php _e('Read more', 'acaw');?></a>
</article>
