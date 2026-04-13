<?php
/**
 * Template part for displaying posts (custom single/post layout)
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package KcTennisBlastTeam6
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'post-card' ); ?>>
	<?php if ( has_post_thumbnail() ) : ?>
		<div class="post-card-media">
			<?php kctennisblastteam6_post_thumbnail(); ?>
		</div>
	<?php endif; ?>

	<div class="post-card-body">
		<header class="entry-header">
			<div class="post-card-meta">
				<?php if ( has_category() ) : ?>
					<span class="post-card-category">
						<?php echo wp_kses_post( get_the_category_list( ', ' ) ); ?>
					</span>
				<?php endif; ?>

				<?php if ( 'post' === get_post_type() ) : ?>
					<div class="entry-meta">
						<?php
						kctennisblastteam6_posted_on();
						kctennisblastteam6_posted_by();
						?>
					</div><!-- .entry-meta -->
				<?php endif; ?>
			</div><!-- .post-card-meta -->
		</header><!-- .entry-header -->

		<div class="entry-content">
			<?php
			the_content(
				sprintf(
					wp_kses(
						/* translators: %s: Name of current post. Only visible to screen readers */
						__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'kctennisblastteam6' ),
						array(
							'span' => array(
								'class' => array(),
							),
						)
					),
					wp_kses_post( get_the_title() )
				)
			);

			wp_link_pages(
				array(
					'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'kctennisblastteam6' ),
					'after'  => '</div>',
				)
			);
			?>
		</div><!-- .entry-content -->

		<?php if ( is_singular() ) : ?>
			<footer class="entry-footer">
				<?php kctennisblastteam6_entry_footer(); ?>
			</footer><!-- .entry-footer -->
		<?php endif; ?>
	</div><!-- .post-card-body -->
</article><!-- #post-<?php the_ID(); ?> -->
