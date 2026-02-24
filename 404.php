<?php
/**
 * Error 404 template.
 *
 * @package WordPress
 */

get_header(); ?>

<main>

<div class="archiveHeader">
	<div class="archiveHeader-inner">
		<h1><?php _e( 'Error 404 - Page Not Found', 'acaw' ); ?></h1>
</div>
</div>
<div class="archiveSearchbar">
	<?php get_template_part( 'template-parts/search-form' ); ?>
</div>

	</main>

<?php get_footer(); ?>
