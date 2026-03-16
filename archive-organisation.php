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




while ( have_posts() ) : the_post(); 
	while( have_rows('member_fields') ) : the_row();
		$markers[] = get_sub_field('map')['markers'][0] ?? [];
	endwhile; 
endwhile; 


?>



<div class="archive-header-wrapper">

	<div class="archive-header">
		<div class="archive-header-inner">

		<?php if(!empty($markers)){ get_template_part('template-parts/map', null, ['markers' => $markers]); }?>

			<h1><?php echo $archive_type->labels->archives; ?></h1>	
		</div>
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

<?php
// Example: get pins for all organisations
$pins = get_field('map_data', 'option'); // Adjust field name and context as needed
if ($pins && isset($pins['markers'])) {
    get_template_part('template-parts/map', null, array('pins' => array($pins)));
}
?>

<?php get_footer(); ?>
