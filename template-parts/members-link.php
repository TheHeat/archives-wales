<?php

$link = get_post_type_archive_link('organisation');

?>

<div class="membersLink-wrapper">
<?php get_template_part('template-parts/map-with-query');?>
	<a class="membersLink" href="<?php echo $link?>">
		<h2>
			<?php _e('Our member repositories', 'acaw');?>
		</h2>
</a>
</div>
