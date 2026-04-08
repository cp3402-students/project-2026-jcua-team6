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
				<h3 class="footer-heading"><?php esc_html_e( 'CONTACT', 'kctennisblastteam6' ); ?></h3>
				<?php
				if ( have_posts() ) {
					// Display contact information from theme options or hardcoded
					?>
					<ul class="footer-contact-list">
						<li><a href="tel:+61421177764">0421 177 764</a></li>
						<li><a href="mailto:kalyndachasetennis@outlook.com">kalyndachasetennis@outlook.com</a></li>
						<li>47-59 Kalynda Parade, Townsville</li>
					</ul>
					<?php
				}
				?>
			</div><!-- .footer-contact -->

			<div class="footer-section footer-hours">
				<h3 class="footer-heading"><?php esc_html_e( 'HOURS', 'kctennisblastteam6' ); ?></h3>
				<p><?php esc_html_e( 'Court Hire Available', 'kctennisblastteam6' ); ?></p>
				<p class="hours-emphasis">24/7</p>
			</div><!-- .footer-hours -->

			<div class="footer-section footer-connect">
				<h3 class="footer-heading"><?php esc_html_e( 'CONNECT', 'kctennisblastteam6' ); ?></h3>
				<ul class="footer-social-links">
					<li><a href="https://www.facebook.com/TennisBLASTKalynda" target="_blank" rel="noopener noreferrer"><?php esc_html_e( 'Facebook', 'kctennisblastteam6' ); ?></a></li>
				</ul>
			</div><!-- .footer-connect -->

			<div class="footer-section footer-tagline">
				<p class="footer-tagline-text"><?php esc_html_e( 'BELIEVE - LEARN - ACHIEVE - SUCCEED', 'kctennisblastteam6' ); ?></p>
				<p class="footer-tagline-sub"><?php esc_html_e( 'in TENNIS!', 'kctennisblastteam6' ); ?></p>
			</div><!-- .footer-tagline -->
		</div><!-- .footer-content -->

		<div class="site-info">
			<a href="<?php echo esc_url( __( 'https://wordpress.org/', 'kctennisblastteam6' ) ); ?>">
				<?php
				/* translators: %s: CMS name, i.e. WordPress. */
				printf( esc_html__( 'Proudly powered by %s', 'kctennisblastteam6' ), 'WordPress' );
				?>
			</a>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
