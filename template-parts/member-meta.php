<?php

while( have_rows('member_fields') ): the_row();
	$website_url = get_field('website_url');
	$email = get_sub_field('email');
	$telephone = get_sub_field('telephone');
	$catalogue_url = get_sub_field('catalogue_url');

	$links_raw = [
		[
			'field' => $website_url,
			'label' => proper_strip_protocol($website_url),
			'url' => $website_url,
			'icon' => 'link',
		],
		[
		'field' => $email,	
		'label' => $email,
			'url' => 'mailto:' . $email,
			'icon' => 'email',
		],
		[
			'field' => $telephone,
			'label' => $telephone,
			'url' => 'tel:' . $telephone,
			'icon' => 'phone',
		],

		[
			'field' => $catalogue_url,
			'label' => __('Search the catalogue', 'acaw'),
			'url' => $catalogue_url,
			'icon' => 'catalogue',
		]
	];

		$links = array_filter($links_raw, function($link) {
			return !empty($link['field']);
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





		


			
			
			<div class="memberMeta-location-wrapper">
				<figure class="memberMeta-location">
					
					<?php get_template_part('template-parts/map', null, ['markers' => acaw_get_organisation_markers_with_title_url(get_the_ID(), get_sub_field('map')['markers']) ] ); ?>
					<figcaption>
						<?php the_sub_field('address'); ?>
					</figcaption>
				</figure>
			</div>
			
			<div class="memberMeta-contacts">
				<?php foreach ($links as $key => $link):  ?>
					<a class="button <?php echo esc_attr($link['icon']); ?>" href="<?php echo esc_url($link['url']); ?>"  rel="noopener"><?php get_template_part('template-parts/svg', $link['icon']); ?><span><?php echo esc_html($link['label']); ?></span></a>
				<?php endforeach; ?>
			</div>
			
			<?php if (get_sub_field('opening_hours')): ?>
				<div class="memberMeta-openingHours">
					<h2><?php _e('Opening Hours', 'acaw'); ?></h2>
					<?php echo apply_filters('the_content', get_sub_field('opening_hours')); ?>
				</div>
				<?php endif; ?>



					<?php if (count($socials) > 0): ?>
		<div class="memberMeta-socials">
				<?php foreach ( $socials as $social ) : ?>
					<a class="button social <?php echo esc_attr($social['icon']); ?>" href="<?php echo esc_url( $social['url'] ); ?>"  rel="noopener">
						<?php get_template_part('template-parts/svg', $social['icon']); ?> <span><?php echo esc_html($social['icon']); ?></span>
					</a>
					<?php endforeach;?>
				</div>
					<?php endif; ?>
				
				

</div>
<?php endwhile; ?>


