<?php

$website_url = get_field('website_url');	

	while( have_rows('member_fields') ): the_row();

	$links_raw = [
		'website' => $website_url,
		'catalogue' => get_sub_field('catalogue_url'),
	];

		$links = array_filter($links_raw, function($link) {
			return !empty($link);
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

<?php the_sub_field('map'); ?>
<?php the_sub_field('address'); ?>

<?php if(get_sub_field('email')): ?>
	<div>
		<a href="mailto:<?php the_sub_field('email'); ?>"><?php the_sub_field('email'); ?></a>
	</div>
<?php endif; ?>

<?php if(get_sub_field('telephone')): ?>
	<div>
		<a href="tel:<?php the_sub_field('telephone'); ?>"><?php the_sub_field('telephone'); ?></a>
	</div>
<?php endif; ?>


<?php if(count($links) > 0): ?>
<ul class="memberMeta-links">
<?php foreach ($links as $key => $link):  ?>
	<li>
		<a href="<?php echo esc_url($link); ?>" target="_blank" rel="noopener"><?php echo  proper_strip_protocol($link); ?></a>
	</li>
	<?php endforeach; ?>
</ul>
<?php endif; ?>

<?php the_sub_field('opening_hours'); ?>



<?php if (count($socials) > 0): ?>
<ul class="memberMeta-socials">
	<?php foreach ( $socials as $social ) : ?>
			<li>
				<a href="<?php echo esc_url( $social['url'] ); ?>" target="_blank" rel="noopener">
					<img class="memberMeta-social-icon" src="<?php echo get_template_directory_uri() . '/src/svg/' . $social['icon'] . '.svg'; ?>" alt="<?php echo esc_attr( $social['icon'] ); ?>">
				</a>
			</li>
			<?php endforeach;?>
		</ul>
<?php endif; ?>


</div>
<?php endwhile; ?>
