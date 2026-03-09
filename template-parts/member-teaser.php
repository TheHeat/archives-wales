<?php if(is_post_type_archive('organisation')): ?> 


<?php
	
	$logo_id = get_field('logo');
	$logo = $logo_id ? wp_get_attachment_image($logo_id, 'medium', null, array('class' => 'memberTeaser-logo')) : get_proper_svg('fallback-organisation', 'memberTeaser-logo fallback', '');
	
	?>	
<div <?php post_class( 'memberTeaser big'); ?>>
	<?php echo $logo; ?>
	<h2>
		<a href="<?php the_permalink();?>">
			<?php the_title(); ?>
		</a>
	</h2>
</div>

<?php else: ?>

<?php
$current_url = home_url( add_query_arg( null, null ) );
$permalink = get_permalink();
$is_current = ($current_url === trailingslashit($permalink));
?>
<div <?php post_class( 'memberTeaser small' . ( $is_current ? ' current' : '' ) ); ?>>
       <h3>
	       <a href="<?php the_permalink();?>">
		       <?php the_title(); ?>
	       </a>
       </h3>
</div>
<?php endif; ?>