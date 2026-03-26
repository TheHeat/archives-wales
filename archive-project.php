<?php
/**
 * Default template for any archive.
 *
 * @package WordPress
 */

get_header();

$archive_type = get_queried_object();
$labels = $archive_type->labels;

// Use the default main query for ongoing projects
$ongoing_projects = array();
if (have_posts()) {
    global $wp_query;
    $ongoing_projects = $wp_query->posts;
}

// Query finished projects (has end_date)
$finished_projects = new WP_Query( array(
	'post_type' => 'project',
	'posts_per_page' => -1,
	'orderby' => array('end_date' => 'DESC'),
	'order' => 'DESC',
	'meta_query' => array(
		array(
			'key' => 'end_date',
			'value' => '',
			'compare' => '!=',
		),
	),
) );

// Merge posts: ongoing first, then finished
$all_projects = array();
if ($ongoing_projects) {
	$all_projects = $ongoing_projects;
}
if ($finished_projects->have_posts()) {
	$all_projects = array_merge($all_projects, $finished_projects->posts);
}

?>

<div class="archive-header-wrapper">
	<div class="archive-header">

	<div class="archive-header-inner">

		<h1><?php echo $archive_type->labels->archives; ?></h1>
		<?php if (!empty($archive_type->description)) : ?>
				<?php echo wp_kses_post(wpautop($archive_type->description)); ?>
			<?php endif; ?>
		</div>
	</div>
</div>

<div class="archive-content">
	<?php if (!empty($all_projects)) : ?>
		<ol class="archiveGrid">
			<?php foreach ($all_projects as $post) :
				setup_postdata($post); ?>
				<li>
					<?php get_template_part( 'template-parts/project-teaser' ); ?>
				</li>
			<?php endforeach; ?>
			<?php wp_reset_postdata(); ?>
		</ol>
	<?php else : ?>
		<h2><?php esc_html_e( 'Nothing Found', 'acaw' ); ?></h2>
	<?php endif; ?>
</div>

<?php get_footer(); ?>
