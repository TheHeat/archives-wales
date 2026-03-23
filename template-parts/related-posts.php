<?php

$this_guy = get_the_id();
$type = get_post_type();
$wrapper_classes = isset($args['fullWidth']) ? 'relatedPosts-wrapper fullWidth' : 'relatedPosts-wrapper';


$project = isset($args['project']) ? $args['project'] : null;

// if we're looking at a single project
// only display posts that refer to this project
if($type === 'project' ){

  $title_string = sprintf(__('Updates from <i>%s</i>', 'acaw'), get_the_title());

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
  // if a project is passed in as an argument, 
  // show posts related to that project
}elseif( $project ){

  $title_string = sprintf(__('More from <i>%s</i>', 'acaw'), get_the_title($project));

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
        'value'   => '"' . $project . '"',
        'compare' => 'LIKE',
  
      ),
    )
    
  );
  // if we're looking at an organisation, 
  // show posts that refer to this organisation
}elseif($type === 'organisation' ){

  $title_string = sprintf(__('Updates from %s', 'acaw'), get_the_title());

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
  $title_string = __('Latest Updates', 'acaw');
// if none of the above, pick 3 off the top
  $query_args = array(
    'post_type' => 'post',
    'post_status' => 'publish',
    'posts_per_page' => 3,
    'post__not_in' => array($this_guy),
    'ignore_sticky_posts' => 1,    
  );
}
  
$posts = new WP_Query($query_args);


?>

<?php if ($posts->have_posts()) : ?>

  <div class="<?php echo esc_attr($wrapper_classes); ?>">
    <h2 class="relatedPosts-title"><?php echo is_front_page() ? __('Latest Updates from Archives Wales', 'acaw') : $title_string; ?></h2>
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