<?php if(is_post_type_archive('organisation')): ?> 
<div <?php post_class( 'memberTeaser big'); ?>>
	<h2>
		<a href="<?php the_permalink();?>">
			<?php the_title(); ?>
		</a>
	</h2>
</div>
<?php else: ?>
	<div <?php post_class( 'memberTeaser small'); ?>>
	<h3>
		<a href="<?php the_permalink();?>">
			<?php the_title(); ?>
			
		</a>
	</h3>
</div>
<?php endif; ?>