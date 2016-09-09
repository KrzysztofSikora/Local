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
<!--ssss-->
			<div class="container-fluid" id="footbar">
				<div class="row">
					<div class="col-md-2"></div>
					<div class="col-md-8">
						<div class="col-xs-6 col-sm-4 col-md-3">
							<div class="fb"><a
									href="https://www.facebook.com/krzysztofsikora24pl-1541480686181605"><i
										class="icon-facebook"></i></a>
							</div>
						</div>

						<div class="col-xs-6 col-sm-4 col-md-3">
							<div class="yt"><a href="https://www.youtube.com"><i class="icon-youtube-squared"></i></a></div>
						</div>

						<div class="col-xs-6 col-sm-4 col-md-3">
							<div class="tw"><a href="https://www.instagram.com"><i class="icon-instagram"></i></a></div>

						</div>

						<div class="col-xs-6 col-sm-4 col-md-3">
							<div class="gplus"><a href="https://www.plus.google.com"><i class="icon-snapchat-square"></i></a></div>
						</div>

						<div style="clear: both"></div>
					</div>
					<div class="col-md-2"></div>

				</div>
<!--sss-->
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