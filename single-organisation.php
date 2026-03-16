<?php
/**
 * @package WordPress
 */
get_header(); ?>

<div class="page-wrapper">
	<?php if ( have_posts() ) : ?>
		<?php while ( have_posts() ) : the_post(); ?>
			<main <?php post_class(); ?> id="organisation-<?php the_ID(); ?>">
				<?php get_template_part('template-parts/featured-image');?>
				<?php the_title( '<h1>', '</h1>' ); ?>
				<?php the_content(); ?>
				<?php get_template_part( 'template-parts/member-meta' ); ?>				
				<?php
			
				$pins = get_field('map_data');
				if ($pins && isset($pins['markers'])) {
					get_template_part('template-parts/map', null, array('pins' => array($pins)));
				}
				?>
			</main>
		<?php endwhile;?>
	<?php endif;?>
	<div class="sidebar">
		<?php get_template_part( 'template-parts/member-sidebar' ); ?>
	</div>
	<?php get_template_part( 'template-parts/related-posts', null, array('fullWidth' => true) ); ?>
</div>

<?php get_footer(); ?>
