<?php
/**
 * @package WordPress
 */
get_header(); ?>

<div class="page-wrapper">
	<?php if ( have_posts() ) : ?>
		<?php while ( have_posts() ) : the_post();?>

		<main <?php post_class(); ?> id="page-<?php the_ID(); ?>">
			<?php if ( $video = get_field('video') ) : ?>
				<figure class="featuredVideo-wrapper"><?php echo $video; ?></figure>
			<?php else : ?>
				<?php get_template_part('template-parts/featured-image'); ?>
			<?php endif; ?>
			<?php the_title( '<h1>', '</h1>' ); ?>
			<?php the_content(); ?>
			
			<?php get_template_part('template-parts/resources'); ?>
		</main>




		<?php endwhile;?>
	<?php endif;	?>

	<div class="sidebar">
		<?php get_template_part( 'template-parts/page-sidebar' ); ?>
	</div>
</div>
<?php get_footer(); ?>
