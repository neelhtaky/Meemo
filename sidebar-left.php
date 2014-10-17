<aside id="sidebar" class="hide-for-medium-down large-2 xlarge-2 xxlarge-2 columns" role="complementary">
	<ul class="no-bullet">

		<?php wp_nav_menu(array('theme_location' => 'nav_sidebar', 'container' => false, 'menu_class' => 'side-nav', 'depth' => 1)); ?>
		<?php if ( is_active_sidebar( 'secondary' ) ) : ?>
			<?php dynamic_sidebar( 'secondary' ); ?>
		<?php endif; ?>
	</ul>
</aside>