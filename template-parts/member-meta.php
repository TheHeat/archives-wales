<?php

$website_url = get_field('website_url');	

	while( have_rows('member_fields') ): the_row();

	$links_raw = [
		[
			'label' => __('Website', 'acaw'),
			'url' => $website_url,
			'icon' => 'link',
		],
		[
			'label' => __('Catalogue', 'acaw'),
			'url' => get_sub_field('catalogue_url'),
			'icon' => 'catalogue',
		]
	];

		$links = array_filter($links_raw, function($link) {
			return !empty($link['url']);
		});

		$socials_raw = [
			[ 'icon' => 'bluesky', 'url' => get_sub_field('bluesky_url'), ],
			[ 'icon' => 'youtube', 'url' => get_sub_field('youtube_url'), ],
			[ 'icon' => 'tiktok', 'url' => get_sub_field('tiktok_url'), ],
			[ 'icon' => 'facebook', 'url' => get_sub_field('facebook_url'), ],
			[ 'icon' => 'instagram', 'url' => get_sub_field('instagram_url'), ],
		];
		$socials = array_filter($socials_raw, function($social) {
			return !empty($social['url']);
		});

	?>

<div class="memberMeta-wrapper">
	<div class="memberMeta-contacts">
		<?php get_template_part('template-parts/organisation-logo');?>
		<ul class="memberMeta-links">
					<?php if(get_sub_field('email')): ?>
						<li>
							<a class="button email" href="mailto:<?php the_sub_field('email'); ?>"><?php get_template_part('template-parts/svg', 'email'); the_sub_field('email'); ?></a>
						</li>
						<?php endif; ?>
						<?php if(get_sub_field('telephone')): ?>
							<li>
								<a class="button phone" href="tel:<?php the_sub_field('telephone'); ?>"><?php get_template_part('template-parts/svg', 'phone'); the_sub_field('telephone'); ?></a>
							</li>
							<?php endif; ?>
					<?php foreach ($links as $key => $link):  ?>
						<li>
							<a class="button <?php echo esc_attr($link['icon']); ?>" href="<?php echo esc_url($link['url']); ?>"  rel="noopener"><?php get_template_part('template-parts/svg', $link['icon']); ?><?php echo esc_html($link['label']); ?></a>
						</li>
						<?php endforeach; ?>
					</ul>
					
					<?php if (count($socials) > 0): ?>
						<ul class="memberMeta-socials">
							<?php foreach ( $socials as $social ) : ?>
								<li>
									<a href="<?php echo esc_url( $social['url'] ); ?>"  rel="noopener">
										<?php get_template_part('template-parts/svg', $social['icon']); ?>
									</a>
								</li>
								<?php endforeach;?>
							</ul>
							<?php endif; ?>
							
						</div>
<div class="memberMeta-location-wrapper">
	<figure class="memberMeta-location">
		
		<?php get_template_part('template-parts/map', null, ['markers' => acaw_get_organisation_markers_with_title_url(get_the_ID(), get_sub_field('map')['markers']) ] ); ?>
		<figcaption>
			<?php the_sub_field('address'); ?>
		</figcaption>
	</figure>
</div>


<?php if (get_sub_field('opening_hours')): ?>
<div class="memberMeta-openingHours">
	<h2><?php _e('Opening Hours', 'acaw'); ?></h2>
	<?php echo apply_filters('the_content', get_sub_field('opening_hours')); ?>
</div>
<?php endif; ?>



</div>
<?php endwhile; ?>


