<?php

/**
 * Template Name: Section Parent Page
 * @package WordPress
 * @subpackage Proper-Bear-WordPress-Theme
 * @since Proper Bear 1.0
 */

get_header(); ?>

<div class="archive-wrapper">
  <?php if (have_posts()) : ?>
    <?php while (have_posts()) : the_post(); ?>
<div class="archive-header-wrapper">

	<div class="archive-header">
		<main <?php post_class("archive-header-inner"); ?> id="page-<?php the_ID(); ?>">
  			<?php the_title( '<h1>', '</h1>' ); ?>
				<?php the_content(); ?>
			</main>
		</div>
	</div>
	<div class="archive-content">
		<?php get_template_part('template-parts/page-children'); ?>
	</div>
    <?php endwhile; ?>
  <?php endif; ?>



</div>

<?php get_footer(); ?>