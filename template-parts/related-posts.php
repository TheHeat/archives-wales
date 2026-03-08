<?php

$this_guy = get_the_id();
$type = get_post_type();
$related_posts = get_field('related_posts');

// if we're looking at a single project
// only display posts that refer to this project
if($type === 'project'){

  $args = array(
    'post_type' => 'post',
    'post_status' => 'publish',
    'post__not_in' => array($this_guy),
    'ignore_sticky_posts' => 1,
    'meta_query' => array(
      'relation' => 'AND',
      array(
        'key'     => 'related_projects',
        'value'   => '"' . $this_guy . '"',
        'compare' => 'LIKE',
  
      ),
    )
    
  );
}else{
  
// if there are related posts specified display them
// if not, pick 2 off the top
  $args = array(
    'post_type' => 'post',
    'post_status' => 'publish',
    'posts_per_page' => 2,
    'post__not_in' => array($this_guy),
    'post__in' => $related_posts,
    'ignore_sticky_posts' => 1,
    
  );
}
  
$posts = new WP_Query($args);


?>

<?php if ($posts->have_posts()) : ?>

  <ol class="relatedPosts">
    <?php while ($posts->have_posts()) : $posts->the_post(); ?>
      <li class="relatedPost">
        <?php get_template_part('template-parts/post-teaser-slim'); ?>
      </li>
    <?php endwhile; ?>

    <?php wp_reset_query(); ?>
  </ol>

<?php endif; ?>