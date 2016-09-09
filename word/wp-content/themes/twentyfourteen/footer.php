<?php
/**
 * The template for displaying the footer
 *
 * Contains footer content and the closing of the #main and #page div elements.
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */
?>

		</div><!-- #main -->

		<footer id="colophon" class="site-footer" role="contentinfo">

			<?php get_sidebar( 'footer' ); ?>

			<div class="site-info" style="text-align: center">
				<?php do_action( 'twentyfourteen_credits' ); ?>
				<a href="<?php echo esc_url( __( 'http://krzysztofsikora24.pl/', 'twentyfourteen' ) ); ?>"><?php printf( __( 'Developed by Krzysztof Sikora ' ) ); ?></a>
				<a href="<?php echo esc_url( home_url( '/wp-admin' ) ); ?>"><?php printf( __( 'Panel' ) ); ?></a>
			</div><!-- .site-info -->
		</footer><!-- #colophon -->
	</div><!-- #page -->

	<?php wp_footer(); ?>
</body>
</html>