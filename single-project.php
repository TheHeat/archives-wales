<?php
/**
 * @package WordPress
 */
get_header(); ?>

<div class="page-wrapper">
	<?php if ( have_posts() ) : ?>
		<?php while ( have_posts() ) : the_post();?>

		<main <?php post_class(); ?> id="project-<?php the_ID(); ?>">

			<?php get_template_part('template-parts/featured-image'); ?>
			<?php get_template_part('template-parts/project-dates'); ?>
			<?php the_title( '<h1>', '</h1>' ); ?>

			<?php the_content(); ?>
			




			<?php get_template_part('template-parts/downloads');?>
		</main>
		
		
		
		<?php endwhile;?>
		<?php endif;	?>
		
		<div class="sidebar">
			<?php get_template_part('template-parts/project-sidebar');?>
</div>
<?php get_template_part('template-parts/related-posts', null, array('fullWidth' => true)); ?>

</div>


<?php get_footer(); ?>
