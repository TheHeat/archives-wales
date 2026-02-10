<?php
/**
 * Archive page for the organisations post-type
 * 
 * The query for this archive is modified in inc/acaw-members-query.php to only show posts with the meta key 'member' set to true, and to order them alphabetically by title. The template part template-parts/member-teaser.php is used to display each post, with a different style for the archive page and the single post page.
 * @package WordPress
 */

get_header();

$archive_type = get_queried_object();
$labels = $archive_type->labels;

?>

<div class="arhive-header">
	<div class="archive-header-inner">
		<h1><?php echo $archive_type->labels->archives; ?></h1>	
</div>
</div>

<div class="archive-content">

	
	<?php if ( have_posts() ) : ?>
		<ol class="archiveGrid">
			<?php while ( have_posts() ) : ?>
				<?php the_post(); ?>
				<li>
					<?php get_template_part( 'template-parts/member-teaser' ); ?>
				</li>
				<?php endwhile; ?>
			</ol>
			<?php the_posts_pagination(); ?>
			<?php else : ?>
				
				<h2><?php esc_html_e( 'Nothing Found', 'acaw' ); ?></h2>
				
				<?php endif; ?>
			</div>


<?php get_footer(); ?>
