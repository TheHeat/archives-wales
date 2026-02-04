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
		<div class="postTeaser-date">
			<?php the_date('d/m/Y'); ?>
		</div>
		<h3><a href="<?php the_permalink();?>">
			<?php the_title(); ?>
		</a></h3>
		<?php the_excerpt(); ?>
	</div>
	
	<a class="postTeaser-image-link" href="<?php the_permalink();?>">
		<?php echo get_the_post_thumbnail(null, 'thumbnail', array('class' => 'postTeaser-image')); ?>
	</a>
</div>
	<a href="<?php the_permalink();?>"><?php _e('Read more', 'acaw');?></a>
</article>
