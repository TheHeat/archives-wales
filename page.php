<?php
/**
 * @package WordPress
 */
get_header(); ?>

<div class="page-wrapper">
	<?php if ( have_posts() ) : ?>
		<?php while ( have_posts() ) : the_post();?>

		<main <?php post_class(); ?> id="page-<?php the_ID(); ?>">
			<?php the_post_thumbnail( 'large' ); ?>
			<?php the_title( '<h1>', '</h1>' ); ?>
			<?php the_content(); ?>
			<?php edit_post_link( __( 'Edit this entry', 'acaw' ), '<p>', '</p>' ); ?>
			<?php
			wp_link_pages(
				array(
					'before'         => __( 'Pages: ', 'acaw' ),
					'next_or_number' => 'number',
				)
			);
			?>
		</main>




		<?php endwhile;?>
	<?php endif;	?>

	<div class="sidebar">
		STUFF GOES HERE
	</div>
</div>
<?php get_footer(); ?>
