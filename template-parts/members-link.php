<?php

$link = get_post_type_archive_link('organisation');

?>

<div class="membersLink-wrapper">
<?php get_template_part('template-parts/map-with-query', null, array('map_options' => array('map_link_url' => $link))); ?>
	<a class="membersLink" href="<?php echo $link?>">
		<h2>
			<?php _e('Archive Services', 'acaw');?>
		</h2>
</a>
</div>
