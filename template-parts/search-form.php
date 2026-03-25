<?php
/**
 * The search form.
 *
 * @package WordPress
 */

$search_term = isset($_GET["s"]) ? htmlspecialchars($_GET["s"]) : '';

?>

<form role="search" method="get"  id="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<div class="search-form">
		<label for="s" class="screen-reader-text"><?php esc_html_e( 'Search for:', 'acaw' ); ?></label>
		<input type="search" id="s" name="s" value="<?php echo $search_term; ?>" />
		<input type="submit" value="<?php esc_html_e( 'Search', 'acaw' ); ?>" id="searchsubmit" />
	</div>

</form>
