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

				<?php the_content();?>
									<?php edit_post_link( __( 'Edit this item', 'acaw' )); ?>

			</div>

  </dialog>
</article>
