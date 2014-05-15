<!doctype html>
<html lang="en">
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="description" content="<?php bloginfo('description'); ?>">
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
	<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory'); ?>/stylesheets/app.css" media="screen" />
	<link rel="stylesheet" type="text/css" href="<?php bloginfo('stylesheet_url'); ?>" media="screen" />
	<script src="<?php bloginfo('template_directory'); ?>/bower_components/modernizr/modernizr.js"></script>
	<title>
		<?php if (function_exists('is_tag') && is_tag()) {
			single_tag_title("Tag Archive for &quot;"); echo '&quot; - '; }
			elseif (is_archive()) {
				wp_title(''); echo ' Archive - '; }
			elseif (is_search()) {
				echo 'Search for &quot;'.wp_specialchars($s).'&quot; - '; }
			elseif (!(is_404()) && (is_single()) || (is_page())) {
				wp_title(''); echo ' - '; }
			elseif (is_404()) {
				echo 'Not Found - '; }
			if (is_home()) {
				bloginfo('name'); echo ' - '; bloginfo('description'); }
			else {
				bloginfo('name'); }
			if ($paged>1) {
				echo ' - page '. $paged; }
		?>
	</title>
	<?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); ?>
	<?php wp_head(); ?>
</head>
<body <?php body_class(''); ?>>
	<div id="page" class="hfeed site">
		<header id="header" role="banner">
			<div class="off-canvas-wrap">
				<div class="inner-wrap">
					<nav class="tab-bar hide-for-medium-up">

						<section class="left-small">
							<a class="left-off-canvas-toggle menu-icon" ><span>Menu</span></a>
						</section>

						<section class="right tab-bar-section">
							<h1 class="title"><a href="<?php bloginfo('url'); ?>" title="<?php bloginfo('name'); ?>"><?php bloginfo('name'); ?></a></h1>
						</section>
					</nav>
					<!-- Off Canvas Menu -->
					<aside class="left-off-canvas-menu">
						<?php wp_nav_menu(array('theme_location' => 'nav_primary', 'container' => false, 'menu_class' => 'off-canvas-list', 'depth' => 1)); ?>
					</aside>

						<!-- content goes in here -->
						<div class="contain-to-grid sticky hide-for-small">
							<nav class="top-bar" data-topbar data-options="mobile_show_parent_link: true">
								<ul class="title-area">
									<li class="name">
										<h1><a href="#"><a href="<?php bloginfo('url'); ?>" title="<?php bloginfo('name'); ?>"><?php bloginfo('name'); ?></a></a></h1>
									</li>
									<li class="toggle-topbar menu-icon"><a href="#">Menu</a></li>
								</ul>

								<section class="top-bar-section">
									<!-- Right Nav Section -->
									<ul class="right">
										<li class="has-form">
											<a href="http://foundation.zurb.com/docs" class="button">Register Account</a>
										</li>
										<li class="has-form show-for-large-up">
											<div class="row collapse">
												<div class="large-8 small-9 columns">
													<input type="text" placeholder="Find Stuff">
												</div>
												<div class="large-4 small-3 columns">
													<a href="#" class="alert button expand">Search</a>
												</div>
											</div>
										</li>
									</ul><!-- .right -->


									<!-- Left Nav Section -->
									<?php
									$options = array(
									  'theme_location' => 'nav_primary',
									  'container' => false,
									  'depth' => 2,
									  'items_wrap' => '<ul id="%1$s" class="left %2$s">%3$s</ul>',
									  'walker' => new GC_walker_nav_menu()
									);
									wp_nav_menu($options); ?>

								</section><!-- .top-bar-section -->
							</nav><!-- .top-bar -->
						</div><!-- .contain-to-grid sticky hide-for-small -->

						<div id="container">

							<!-- SIDEBAR NAVIGATION = 1 COLUMN -->
							<div id="main" class="site-main row">
								<div id="sidebar-nav" class="hide-for-medium-down large-2 xlarge-2 xxlarge-2 columns">
									<div id="site_title">
										<?php if(is_home()){ ?>
										<h1><a href="<?php echo home_url(); ?>"><?php bloginfo('name'); ?></a></h1>
										<?php } else { ?>
										<h4><a href="<?php echo home_url(); ?>"><?php bloginfo('name'); ?></a></h4>
										<?php } ?>
									</div><!-- #site_title END -->
									<div id="description">
										<p><?php bloginfo('description'); ?></p>
									</div><!-- #description END -->
									<?php wp_nav_menu(array('theme_location' => 'nav_primary', 'container' => false, 'menu_class' => 'side-nav ', 'depth' => 1)); ?>
								</div>