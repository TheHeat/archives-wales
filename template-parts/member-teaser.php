<?php if(is_post_type_archive('organisation')): ?> 
<div <?php post_class( 'memberTeaser big'); ?>>
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