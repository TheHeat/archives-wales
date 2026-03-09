<?php


// this is to work around wp_reset_postdata not working as expected in parent-project-teaser.php
$project = get_the_id();
$funders = get_field( 'funders', $project );

if ( $funders ) :

$funder_args = array(
	'post_status' => 'publish',
	'post_type'   => 'organisation',
	'post__in'    => $funders,
	'orderby'     => 'post__in',
);

$title_format = __( '%1$s was created thanks to support from', 'acaw' );
$title_string = sprintf( $title_format, get_the_title() );

?>

<?php if ( $funders ) : ?>
	<?php $funders_query = new WP_Query( $funder_args ); ?>
	<div class="projectFunders-wrapper">
		<?php if ( $funders_query->have_posts() ) : ?>
			<h3 class='projectSidebar-title'><?php echo $title_string; ?></h3>
			<ul class='projectSidebar-list'>
				<?php
				while ( $funders_query->have_posts() ) :
					$funders_query->the_post();
					?>
					<li>
						<?php get_template_part( 'template-parts/organisation-logo' ); ?>
					</li>
				<?php endwhile; ?>
			</ul>
		<?php endif; ?>
	</div>
	<?php wp_reset_postdata(); ?>
<?php endif; ?>
<?php endif; ?>