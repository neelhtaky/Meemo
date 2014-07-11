<aside id="sidebar" class="hide-for-medium-down large-2 xlarge-2 xxlarge-2 columns" role="complementary">
	<ul class="no-bullet">
		<div class="site_title">
			<?php if(is_home()){ ?>
			<h1><a href="<?php echo home_url(); ?>"><?php bloginfo('name'); ?></a></h1>
			<?php } else { ?>
			<h4><a href="<?php echo home_url(); ?>"><?php bloginfo('name'); ?></a></h4>
			<?php } ?>
		</div><!-- #site_title END -->
		<div id="description">
			<p><?php bloginfo('description'); ?></p>
		</div><!-- #description END -->
		<?php wp_nav_menu(array('theme_location' => 'nav_sidebar', 'container' => false, 'menu_class' => 'side-nav', 'depth' => 1)); ?>
		<?php if ( is_active_sidebar( 'secondary' ) ) : ?>
			<?php dynamic_sidebar( 'secondary' ); ?>
		<?php endif; ?>
	</ul>
</aside>