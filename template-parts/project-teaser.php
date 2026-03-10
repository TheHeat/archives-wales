<?php
/**
 * Preview of a single Project.
 *
 * @package WordPress
 */


?>
<article <?php post_class( 'projectTeaser' ); ?>>

<div class="projectTeaser-header">
	<h3 class="projectTeaser-title"><a href="<?php the_permalink();?>">
		<?php the_title(); ?>
	</a></h3>

	
	<?php get_template_part(slug: 'template-parts/project-dates'); ?>
</div>

<a class="projectTeaser-image-link" href="<?php the_permalink();?>">
	<?php echo get_the_post_thumbnail(null, 'hero', array('class' => 'projectTeaser-image')); ?>
</a>
<div class="projectTeaser-content">
	<?php the_excerpt(); ?>


	<div>
		<a class="button" href="<?php the_permalink();?>"><?php _e('Read more', 'acaw');?></a>
	</div>
	</div>
</article>
