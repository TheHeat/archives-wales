<?php

$this_guy = get_the_id();
$type = get_post_type();

if($type === 'organisation' ){

  $query_args = array(
    'post_type' => 'archiveitem',
    'post_status' => 'publish',
    'posts_per_page' => -1,
    'post__not_in' => array($this_guy),
    'meta_query' => array(
      'relation' => 'AND',
      array(
        'key'     => 'related_repository',
        'value'   => '"' . $this_guy . '"',
        'compare' => 'LIKE',
  
      ),
    )
    
  );
}
else{
  
// if none of the above, pick 3 off the top
  $query_args = array(
    'post_type' => 'archiveitem',
    'post_status' => 'publish',
    'posts_per_page' => 3,
    'post__not_in' => array($this_guy),
    'ignore_sticky_posts' => 1,    
  );
}
  
$posts = new WP_Query($query_args);


?>

<?php if ($posts->have_posts()) : ?>

  <div class="relatedItems-wrapper">
    <h2 class="relatedItems-title"><?php echo is_front_page() ? __('From the collections', 'acaw') : sprintf(__('Items from %s', 'acaw'), get_the_title()); ?></h2>
    <ol class="relatedItems">
      <?php while ($posts->have_posts()) : $posts->the_post(); ?>
      <li class="relatedItem">
        <?php get_template_part('template-parts/item-teaser'); ?>
      </li>
      <?php endwhile; ?>
      
      <?php wp_reset_query(); ?>
    </ol>
  </div>

<?php endif; ?>