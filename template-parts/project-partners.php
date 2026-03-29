<?php

$project = get_the_id();
$partners = get_field( 'partners', $project );

if ( $partners ) :

	$partner_args = array(
		'post_status' => 'publish',
		'post_type'   => 'organisation',
		'post__in'    => $partners,
		'orderby'     => 'post__in',
	);

	?>
	<?php if ( $partners ) : ?>
		<?php

		$partners_query = new WP_Query( $partner_args );

		?>
		<div class="projectPartners-wrapper">

			<h3 class='projectSidebar-title'><?php _e( 'In partnership with', 'acaw' ); ?></h3>
			<?php if ( $partners_query->have_posts() ) : ?>
				<ul class='projectSidebar-list'>
					<?php
					while ( $partners_query->have_posts() ) :
						$partners_query->the_post();
						?>
						<li>
						<?php get_template_part( 'template-parts/organisation-logo', null, ['class' => 'projectSidebar-logo'] ); ?>

						</li>
					<?php endwhile; ?>
				</ul>
				<?php wp_reset_postdata(); ?>
			<?php endif; ?>
		</div>
	<?php endif; ?>
<?php endif; ?>
