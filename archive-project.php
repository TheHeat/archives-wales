<?php
/**
 * Default template for any archive.
 *
 * @package WordPress
 */

get_header();

$archive_type = get_queried_object();
$labels = $archive_type->labels;

?>


<div class="archive-header-wrapper">

	<div class="archive-header">
		
		<h1><?php echo $archive_type->labels->archives; ?></h1>	
	</div>
</div>

<div class="archive-content">	

	
	<?php if ( have_posts() ) : ?>
		<ol class="archiveGrid">
			<?php while ( have_posts() ) : ?>
				<?php the_post(); ?>
				<li>
					<?php get_template_part( 'template-parts/project-teaser' ); ?>
				</li>
				<?php endwhile; ?>
			</ol>
			<?php the_posts_pagination(); ?>
			<?php else : ?>
				
				<h2><?php esc_html_e( 'Nothing Found', 'acaw' ); ?></h2>
				
				<?php endif; ?>
				
			</div>

<?php get_footer(); ?>
