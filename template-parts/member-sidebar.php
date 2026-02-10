<?php
// WP_Query for 'organisations' post type
$organisations_query = new WP_Query([
	'post_type' => 'organisation',
	'posts_per_page' => -1, // Get all organisations
	'post_status' => 'publish',
	'meta_query' => array(
			array(
				'key' => 'member',
				'value' => true,
				'compare' => '='
			)
		),
		'orderby' => 'title',
		'order' => 'ASC',
]); ?>

<?php if ($organisations_query->have_posts()) : ?>
	<div class="member-nav">
	<?php while ($organisations_query->have_posts()) : 
		$organisations_query->the_post(); ?>

		<?php get_template_part('template-parts/member-teaser'); ?>
		<?php	endwhile; ?>
	</div>
	<?php wp_reset_postdata(); ?>
<?php endif; ?>