<?php
/**
 * @package WordPress
 */
get_header(); ?>

<div class="page-wrapper">

	<?php if ( have_posts() ) : ?>
			<?php while ( have_posts() ) : the_post(); ?>

					<main <?php post_class(); ?> id="organisation-<?php the_ID(); ?>">
						<?php the_post_thumbnail( 'large' ); ?>
						<?php the_title( '<h1>', '</h1>' ); ?>
						
						<?php the_content(); ?>
						<?php edit_post_link( __( 'Edit this entry', 'acaw' ), '<p>', '</p>' ); ?>
		
					</main>
				<?php endwhile;?>
			<?php endif;?>
			<div class="sidebar">
				<?php get_template_part( 'template-parts/member-sidebar' ); ?>
			</div>
	</div>
<?php get_footer(); ?>
