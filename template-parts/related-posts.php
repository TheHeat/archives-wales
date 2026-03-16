<?php

$this_guy = get_the_id();
$type = get_post_type();
$related_posts = get_field('related_posts');

$wrapper_classes = isset($args['fullWidth']) ? 'relatedPosts-wrapper fullWidth' : 'relatedPosts-wrapper';

// if we're looking at a single project
// only display posts that refer to this project
if($type === 'project' ){

  $query_args = array(
    'post_type' => 'post',
    'post_status' => 'publish',
    'ignore_sticky_posts' => 1,
    'posts_per_page' => -1,
    'post__not_in' => array($this_guy),
    'meta_query' => array(
      'relation' => 'AND',
      array(
        'key'     => 'related_projects',
        'value'   => '"' . $this_guy . '"',
        'compare' => 'LIKE',
  
      ),
    )
    
  );
}elseif( isset($query_args['project']) ){

  $query_args = array(
    'post_type' => 'post',
    'post_status' => 'publish',
    'posts_per_page' => 3,
    'ignore_sticky_posts' => 1,
    'post__not_in' => array($this_guy),
    'meta_query' => array(
      'relation' => 'AND',
      array(
        'key'     => 'related_projects',
        'value'   => '"' . $query_args['project'] . '"',
        'compare' => 'LIKE',
  
      ),
    )
    
  );
}elseif($type === 'organisation' ){

  $query_args = array(
    'post_type' => 'post',
    'post_status' => 'publish',
    'posts_per_page' => -1,
    'post__not_in' => array($this_guy),
    'meta_query' => array(
      'relation' => 'AND',
      array(
        'key'     => 'related_orgs',
        'value'   => '"' . $this_guy . '"',
        'compare' => 'LIKE',
  
      ),
    )
    
  );
}

else{
  
// if there are related posts specified display them
// if not, pick 2 off the top
  $query_args = array(
    'post_type' => 'post',
    'post_status' => 'publish',
    'posts_per_page' => 3,
    'post__not_in' => array($this_guy),
    'post__in' => $related_posts,
    'ignore_sticky_posts' => 1,
    
  );
}
  
$posts = new WP_Query($query_args);


?>

<?php if ($posts->have_posts()) : ?>

  <div class="<?php echo esc_attr($wrapper_classes); ?>">
    <h2 class="relatedPosts-title"><?php _e('Related Posts', 'acaw');?></h2>
    <ol class="relatedPosts">
      <?php while ($posts->have_posts()) : $posts->the_post(); ?>
      <li class="relatedPost">
        <?php get_template_part('template-parts/post-teaser'); ?>
      </li>
      <?php endwhile; ?>
      
      <?php wp_reset_query(); ?>
    </ol>
  </div>

<?php endif; ?>