<?php

$this_guy = get_the_id();
$this_guys_family_tree = get_ancestors($this_guy, 'page');
$oldest_ancestor = end($this_guys_family_tree);
$kids_to_show = $oldest_ancestor ? $oldest_ancestor : $this_guy;
$list_title = '<h3><a href="' . get_the_permalink($oldest_ancestor) . '">' . get_the_title($oldest_ancestor) . '</a></h3>';

$args = array(
  "post_type" =>'page',

  'child_of' => $kids_to_show,
  'hierarchical' => true,
  'sort_column' => 'menu_order',
  'title_li' => $list_title,
  'depth' => 2,
);

?>
<?php if (count(get_posts($args)) > 0) : ?>
<nav class="familyTree-wrapper">
  <ol class="familyTree">
    <?php wp_list_pages($args); ?>
  </ol>
</nav>

<?php endif; ?>