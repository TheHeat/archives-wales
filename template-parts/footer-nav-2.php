<?php
/**
 * The primary menu as defined in functions.php
 *
 * @package WordPress
 */

?>
	<nav class="footerNav" role="navigation">

		<?php
		// Limits the menu to one level by default.
		$args = array(
			'theme_location' => 'tertiary',
			'container'      => false,
			'menu_class'     => 'menu',
			'echo'           => true,
			'fallback_cb'    => false,
			'depth'          => 1,
		);

		wp_nav_menu( $args );
		
		?>

	</nav>
