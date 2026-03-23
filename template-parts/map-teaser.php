
<section class="frontPage-map">

<?php get_template_part('map-with-query'); ?>
	<div>
		<h2><?php _e('There are Archives Wales members in every corner of the country', 'acaw'); ?></h2>
		<p><?php _e('Explore the complete list of our members along with a map to help you find your nearest archive.', 'acaw'); ?></p>
		<a class="button" href="<?php echo get_post_type_archive_link('organisation'); ?>"><?php _e('Meet our members', 'acaw'); ?></a>
	</div>	
		</section>