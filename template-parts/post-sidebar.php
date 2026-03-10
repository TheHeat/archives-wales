<?php 

$related_posts_args = get_field('related_projects') ? ['project' => get_field('related_projects')[0]] : [];

?>

<?php get_template_part('template-parts/related-projects');?>
<?php get_template_part('template-parts/related-posts', null, $related_posts_args);?>