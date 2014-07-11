	</div><!-- #main .site-main row -->

	<footer class="footer_wrap">
		<div id="footer_widgets" >
			<div class="row">
				<ul class="no-bullet">
					<?php if ( is_active_sidebar( 'footer' ) ) : ?>
						<?php dynamic_sidebar( 'footer' ); ?>
					<?php else : ?>
						<div class="alert alert-box alert-help">
							<p>Please activate some Widgets.</p>
						</div>
					<?php endif; ?>
				</ul>
			</div><!-- row -->
		</div><!-- footer_widgets -->

		<div id="footer_meta" >
			<div class="row">
				<div class="small-12 medium-6 large-6 xlarge-4 columns">
					<p>Copyright &copy; <?php echo date("Y") ?> <a href="<?php echo home_url(); ?>"><?php bloginfo('name'); ?></a>. All Rights Reserved.
					</br>
					Theme Designed By <a href="<?php echo esc_url( __( 'http://katskinner.com/') ); ?>" title="<?php esc_attr_e( 'Kat Skinner' ); ?>">Kat Skinner</a>.
					</p>
					<span id="wordpress">
						Proudly powered by <a href="<?php echo esc_url( __( 'http://wordpress.org/') ); ?>" title="<?php esc_attr_e( 'Semantic Personal Publishing Platform' ); ?>"><?php printf( __( '%s'), 'WordPress' ); ?></a>.
					</span>
				</div><!-- fsize -->
				<?php wp_nav_menu(array('theme_location' => 'nav_footer', 'container_class' => 'small-12 medium-6 large-6 xlarge-8 columns', 'menu_class' => 'inline-list right', 'depth' => 1)); ?>
			</div><!-- row -->
		</div><!-- footer_meta -->
	</footer><!-- footer_wrap -->


	<!-- close the off-canvas menu -->
  <a class="exit-off-canvas"></a>

  </div>
</div>

	<script src="<?php bloginfo('template_directory'); ?>/bower_components/jquery/dist/jquery.min.js"></script>
	<script src="<?php bloginfo('template_directory'); ?>/bower_components/foundation/js/foundation.min.js"></script>
	<script src="<?php bloginfo('template_directory'); ?>/bower_components/foundation/js/foundation/foundation.abide.js"></script>
	<script src="<?php bloginfo('template_directory'); ?>/js/app.js"></script>
	<script>
		// or with jQuery
		var $container = $('#main_wrapper');
		// initialize Masonry after all images have loaded
		$container.imagesLoaded( function() {
			$container.masonry({
		  		"itemSelector": ".entry"
		});
		});
	</script>
	<?php wp_footer(); ?>
</body>
</html>