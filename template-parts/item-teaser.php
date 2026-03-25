<?php
/**
 * Preview of a single Archive Item.
 *
 * @package WordPress
 */

?>
<article <?php post_class( 'relatedItemTeaser' ); ?>>
  <button command="show-modal" commandfor="dialog-<?php the_ID(); ?>" aria-haspopup="dialog" class="relatedItemTeaser-imageButton">
    <?php the_post_thumbnail( 'medium', array( 'class' => 'relatedItemTeaser-image' ) ); ?>
  </button>

  <div class="relatedItemTeaser-content">
		</div>
		
		<dialog id="dialog-<?php the_ID(); ?>" class="itemModal" closedby="any">

				<button command="close" commandfor="dialog-<?php the_ID(); ?>" class="itemModal-close" aria-label="Close">&times;</button>

				<div class="itemModal-inner">
			<?php get_template_part('template-parts/featured-image');?>
			<div class="itemModal-content">

				<?php the_content();?>
				<?php the_field('catalogue_url'); ?>
				<?php edit_post_link( __( 'Edit this item', 'acaw' )); ?>
				<?php if(get_field('historical_year')): ?>
					<span class="meta"><?php the_field('historical_year'); ?></span>
				<?php endif; ?>
				</div>




			</div>

  </dialog>
</article>
