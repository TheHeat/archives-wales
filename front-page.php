<?php
/**
 * @package WordPress
 */
get_header(); ?>

<div class="frontPage-wrapper">
	<?php if ( have_posts() ) : ?>
		<?php while ( have_posts() ) : the_post();?>


		<div class="frontPage-hero-wrapper">

			<main <?php post_class('frontPage-hero'); ?> id="page-<?php the_ID(); ?>">
			<div>

				<h1 class="frontPage-hero-title">
					<?php the_title(); ?>
				</h1>
				<?php the_content(); ?>
			</div>
			<?php the_post_thumbnail( 'large' ); ?>
		</main>
	</div>


	
	
	
	<?php endwhile;?>
	<?php endif;	?>
	
	<?php get_template_part( 'template-parts/searchbar' ); ?>
	<?php get_template_part( 'template-parts/front-page', 'guides' ); ?>
	<div class="frontPage-map-wrapper">
		<?php get_template_part( 'template-parts/map-teaser' ); ?>
	</div>

	<div class="frontPage-posts-wrapper">

		<div class="frontPage-posts">
			<?php get_template_part( 'template-parts/related-posts' ); ?>
		</div>
	</div>
</div>

<?php get_footer(); ?>
