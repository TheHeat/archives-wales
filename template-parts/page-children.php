<?php
/////////////////
// GET THE KIDS//
/////////////////

// where are we?
$parent_ID = get_the_id();

// pick up the kids
$children = get_children(array(
  'post_parent' => $parent_ID,
  'post_status' => 'publish',
  'orderby'     => 'menu_order',
  'order'       => 'ASC'
));



// echo '<pre>';
// print_r($children);
// echo '</pre>';

if ($children) : ?>
  <ol class="archiveGrid">
    <?php foreach ($children as $post) :
      // Treat each child item as $post
      setup_postdata($post); ?>
      <li>
        <article id="page-<?php the_ID(); ?>" <?php post_class('pageTeaser'); ?>>
				<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
					<?php the_post_thumbnail('hero', ['class' => 'pageTeaser-thumbnail']); ?>
				</a>
<div class="pageTeaser-title-wrapper">

  <h2 class="pageTeaser-title">
    <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
      <?php the_title(); ?>
    </a>
  </h2>
</div>
          <div class="pageTeaser-excerpt">
            <?php the_excerpt(); ?>
          </div>
          <div class="pageTeaser-button-wrapper">
            <a href="<?php the_permalink() ?>" class="button"><?php _e('Read More', 'properbear'); ?></a>
          </div>

        </article>
      </li>

    <?php
    // reset $post to avoid weirdness
    endforeach;
    wp_reset_postdata(); ?>

  </ol>

<?php endif;

?>