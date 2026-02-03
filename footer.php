<?php
/**
 * The theme footer component.
 *
 * @package WordPress
 */

?>

</div>

<div class="siteFooter-wrapper">

<div class="siteFooter-menus">

	<?php get_template_part( 'template-parts/footer-nav' ); ?>
	<ul class="socials">
		<li><a href="https://bsky.app/profile/archiveswales.bsky.social">Bluesky</a></li>
		<li><a href="https://www.instagram.com/archifaucymru.archiveswales/">Instagram</a></li>
		<li><a href="https://www.facebook.com/ArchifauCymru.ArchivesWales">Facebook</a></li>
	</ul>
</div>
	<footer id="footer" class="siteFooter">
		<div class="siteFooter-logos">
			<?php get_template_part( 'template-parts/logo' ); ?>
			<?php get_template_part( 'template-parts/wg-logo' ); ?>
		</div>
		
		<div class="source-org vcard copyright" role="contentinfo">

			
			<div class="copyright">
				
				
				<?php
			echo sprintf(
				/* translators: %s: current year */
				__( 'Archives Wales is a brand of the Archives and Records Council Wales (ARCW) © %s. All Rights Reserved ARCW unless otherwise stated.', 'acaw' ),
				esc_attr( gmdate( 'Y' ) )
				);
				?>
		</div>
		<div>
	</div>
	</div>
		
</footer>
</div>

</div>

<?php wp_footer(); ?>

</body>

</html>
