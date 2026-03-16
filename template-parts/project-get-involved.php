<?php if ( get_field('get_involved') ) : ?>

<section class="projectSidebar-getInvolved">
				<h2 class="projectSidebar-title"><?php _e('Get Involved', 'acaw'); ?></h2>
				<div class="projectSidebar-content">
					<?php echo apply_filters('the_content', get_field('get_involved')); ?>
				</div>
			</section>
<?php endif; ?>
