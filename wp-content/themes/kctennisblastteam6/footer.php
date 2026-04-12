<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package KcTennisBlastTeam6
 */

?>
	<footer id="colophon" class="site-footer">
		<div class="footer-content">

			<div class="footer-section footer-contact">
				<?php
				if ( is_active_sidebar( 'footer-contact' ) ) {
					dynamic_sidebar( 'footer-contact' );
				}
				?>
			</div>

			<div class="footer-section footer-hours">
				<?php
				if ( is_active_sidebar( 'footer-hours' ) ) {
					dynamic_sidebar( 'footer-hours' );
				}
				?>
			</div>

			<div class="footer-section footer-connect">
				<?php
				if ( is_active_sidebar( 'footer-connect' ) ) {
					dynamic_sidebar( 'footer-connect' );
				}
				?>
			</div>

			<div class="footer-section footer-tagline">
				<?php
				if ( is_active_sidebar( 'footer-tagline' ) ) {
					dynamic_sidebar( 'footer-tagline' );
				}
				?>
			</div>

		</div>
	</footer>
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
