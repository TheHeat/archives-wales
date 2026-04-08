<?php
/**
 * The primary menu as defined in functions.php
 *
 * @package WordPress
 */


$menu_args = array(
			'theme_location' => 'primary',
			'container'      => false,
			'container_id'   => '',
			'menu_class'     => 'menu',
			'menu_id'        => '',
			'echo'           => true,
			'fallback_cb'    => '',
			'before'         => '',
			'after'          => '',
			'link_before'    => '',
			'link_after'     => '',
			'depth'          => 1,
			'walker'         => '',
		);





?>
<div id="siteNav-wrapper" class="siteNav-wrapper">
	<button id="siteNav-toggle" class="siteNav-toggle"><?php esc_attr_e( 'Menu', 'acaw' ); ?></button>
	<nav class="siteNav" role="navigation">
			<button id="siteNav-close" class="siteNav-toggle siteNav-close">&times;</button>

		<?php wp_nav_menu( $menu_args ); ?>

	</nav>
</div>
