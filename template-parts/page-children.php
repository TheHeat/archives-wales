<?php
/////////////////
// GET THE KIDS//
/////////////////

// where are we? (allow a parent to be passed in via get_template_part args)
$parent_ID = !empty($args['parent_id']) ? $args['parent_id'] : get_the_id();

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
        <?php get_template_part('template-parts/page-teaser'); ?>
      </li>

    <?php
    // reset $post to avoid weirdness
    endforeach;
    wp_reset_postdata(); ?>

  </ol>

<?php endif;

?>
