<?php
/**
 * The secondary menu as defined in functions.php
 *
 * @package WordPress
 */

?>
	<?php
	$args = [
		'theme_location' => 'secondary',
		'container'      => false,
		'menu_class'     => 'menu',
		'echo'           => false,
		'fallback_cb'    => false,
		'depth'          => 1,
	];

	$menu = wp_nav_menu( $args );

	if ( $menu ) : ?>
	<nav class="footerNav" role="navigation">
		<?php echo $menu; ?>
	</nav>
	<?php endif; ?>
