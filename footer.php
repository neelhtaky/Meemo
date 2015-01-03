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
				<div id="copyright" class="small-12 medium-6 large-6 xlarge-4 columns">
					<p>Copyright &copy; <?php echo date("Y") ?> <a href="<?php echo home_url(); ?>"><?php bloginfo('name'); ?></a>. All Rights Reserved.
					</p>
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

<script type="text/javascript">
var container = document.querySelector('#container');
var msnry = new Masonry( container, {
  // options
  itemSelector: '.item'
});
window.onload = function () {
// alert();
// $('#container').css('color', 'red');
msnry.layout();


}




</script>
	<?php wp_footer(); ?>

	<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-11172830-3', 'auto');
  ga('send', 'pageview');

</script>
</body>
</html>