	</div><!-- #main .site-main row -->
</div><!-- #container -->
<footer id="footer_widgets" class="row">
	<ul class="no-bullet">
		<?php if ( is_active_sidebar( 'footer' ) ) : ?>
			<?php dynamic_sidebar( 'footer' ); ?>
		<?php else : ?>
			<div class="alert alert-box alert-help">
				<p>Please activate some Widgets.</p>
			</div>
		<?php endif; ?>
	</ul>
</footer>

<footer id="footer_meta" class="row">
		<div class="small-12 medium-6 large-5 xlarge-3 columns">
			<p>Copyright &copy; <?php echo date("Y") ?> <a href="<?php echo home_url(); ?>"><?php bloginfo('name'); ?></a>. All Rights Reserved.
			</br>
			Theme Designed By <a href="<?php echo esc_url( __( 'http://katskinner.com/') ); ?>" title="<?php esc_attr_e( 'Kat Skinner' ); ?>">Kat Skinner</a>.
			</br>
			<span id="wordpress">
				Proudly powered by <a href="<?php echo esc_url( __( 'http://wordpress.org/') ); ?>" title="<?php esc_attr_e( 'Semantic Personal Publishing Platform' ); ?>"><?php printf( __( '%s'), 'WordPress' ); ?></a>.
			</span>
		</div>

			<?php wp_nav_menu(array('theme_location' => 'nav_footer', 'container_class' => 'small-12 medium-6 large-7 xlarge-9 columns', 'menu_class' => 'inline-list right', 'depth' => 1)); ?>

</footer>
					<!-- close the off-canvas menu -->
					<a class="exit-off-canvas"></a>
				</div><!-- .inner-wrap -->
			</div><!-- .off-canvas-wrap -->
		</header><!-- #header -->
	</div><!-- #page END -->
	<script src="<?php bloginfo('template_directory'); ?>/bower_components/jquery/dist/jquery.min.js"></script>
	<script src="<?php bloginfo('template_directory'); ?>/bower_components/foundation/js/foundation.min.js"></script>
	<script src="<?php bloginfo('template_directory'); ?>/bower_components/foundation/js/foundation/foundation.abide.js"></script>
	<script src="<?php bloginfo('template_directory'); ?>/js/app.js"></script>

	<?php wp_footer(); ?>
</body>
</html>