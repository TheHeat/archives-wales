<?php
/**
 * @package WordPress
 */
get_header(); ?>

<div class="page-wrapper">
	<?php if ( have_posts() ) : ?>
		<?php while ( have_posts() ) : the_post();?>

		<main <?php post_class(); ?> id="post-<?php the_ID(); ?>">


		<div class="post-header">
			<?php proper_post_date(); ?>
			<?php the_title( '<h1>', '</h1>' ); ?>
			<?php if(get_field('byline')): ?>
				<p class="meta"><?php the_field('byline');?></p>
				<?php endif; ?>
			</div>
			<?php the_content(); ?>

			<div class="post-footer">
				<?php get_template_part('template-parts/downloads');?>
				<?php get_template_part('template-parts/post-project-funders'); ?>
			</div>
</main>




		<?php endwhile;?>
	<?php endif;	?>

	<div class="sidebar">
		<?php get_template_part('template-parts/post-sidebar');?>
	</div>
</div>
<?php get_footer(); ?>
