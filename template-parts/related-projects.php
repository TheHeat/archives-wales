<?

$projects = get_field('related_projects'); ?>

<?php if ($projects) :

  $args = array(
    'post_type' => 'project',
    'post_status' => 'publish',
    'post__in' => $projects,
    'posts_per_page' => -1,
    'ignore_sticky_posts' => 1,

  );


  $posts = new WP_Query($args);


?>
  <?php if ($posts->have_posts()) : ?>

    <ol class="relatedprojects">
      <?php while ($posts->have_posts()) : $posts->the_post(); ?>
        <li class="relatedproject">
          <?php get_template_part('template-parts/project-teaser'); ?>
        </li>
      <?php endwhile; ?>

      <?php wp_reset_query(); ?>
    </ol>

  <?php endif; ?>
<?php endif; ?>