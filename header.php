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
	<script src="<?php bloginfo('template_directory'); ?>/bower_components/masonry/dist/masonry.pkgd.min.js"></script>

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

								<!-- Left Nav Section -->
								<div id="left-nav" >
									<?php
									$options = array(
										'theme_location' => 'nav_primary',
										'container' => false,
										'depth' => 2,
										'items_wrap' => '<ul id="%1$s" class="left %2$s">%3$s</ul>',
										'walker' => new GC_walker_nav_menu()
										);
										wp_nav_menu($options); ?>
								</div>

								<!-- Right Nav Section -->
								<ul class="right">

									<?php
									global $current_user;
									get_currentuserinfo();
									$fname = $current_user->user_firstname;
									$dname = $current_user->display_name;
										if (is_user_logged_in()) {
											if (!empty($fname)) {
												 ?>
												<li id="welcome_user">Welcome <?php echo $fname; ?>!</li>
												<li><a class="button" href="<?php echo get_edit_user_link(); ?>">Your Profile</a></li>
											<?php } else{ ?>
												<li id="welcome_user">Welcome <?php echo $dname; ?>!</li>
												<li><a class="button" href="<?php echo get_edit_user_link(); ?>">Your Profile</a></li>
											<?php }
										} else { ?>
											<li class="has-form">
												<a href="#" data-reveal-id="user_logreglost" class="button">Login or Register</a>

												<?php get_template_part( 'login', 'modal' ); ?>
											</li>
										<?php } ?>
									<li class="has-form show-for-large-up">
										<?php get_search_form(); ?>
									</li>
								</ul><!-- .right -->
							</section><!-- .top-bar-section -->
						</nav><!-- .top-bar -->
					</div><!-- .contain-to-grid sticky hide-for-small -->
					<div id="container">
						<div id="main" class="site-main row">