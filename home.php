<?php
/**
 * Default template for any archive.
 *
 * @package WordPress
 */

get_header();

?>

<div class="archiveHeader">
	<div class="archive-header-inner">
		<h1><?php _e( 'News', 'acaw' ); ?></h1>
		<?php _e('Stay up to date with the latest news from across the network', 'acaw'); ?>
</div>
</div>
<div class="archiveSearchbar">
	<?php get_template_part( 'template-parts/search-form' ); ?>
</div>


<?php if ( have_posts() ) : ?>
			<ol class="archiveGrid">
			<?php while ( have_posts() ) : ?>
				<?php the_post(); ?>
				<li>
					<?php get_template_part( 'template-parts/post-teaser' ); ?>
				</li>
				<?php endwhile; ?>
			</ol>
				<?php the_posts_pagination(); ?>
				<?php else : ?>
					
					<h2><?php esc_html_e( 'Nothing Found', 'acaw' ); ?></h2>
					
	<?php endif; ?>


<?php get_footer(); ?>
