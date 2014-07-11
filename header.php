<!doctype html>
<html<?php language_attributes(); ?>>

<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="description" content="<?php bloginfo('description'); ?>">
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
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
	<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory'); ?>/stylesheets/app.css" media="screen" />
	<link rel="stylesheet" type="text/css" href="<?php bloginfo('stylesheet_url'); ?>" media="screen" />
	<script src="<?php bloginfo('template_directory'); ?>/bower_components/modernizr/modernizr.js"></script>
	<script src="<?php bloginfo('template_directory'); ?>/bower_components/isotope/dist/isotope.pkgd.min.js"></script>

	<?php wp_head(); ?>
</head>
<body <?php body_class(''); ?>>
<div id="top" class="hfeed site">
	<header id="header" role="banner">

		<!-- TOPBAR -->
		<div class="contain-to-grid hide-for-small-only">
			<nav class="top-bar" data-topbar>
				<section class="top-bar-section">
				  	<!-- Left Nav Section -->
				    <ul class="left">
				     <?php $options = array(
						'theme_location' => 'nav_primary',
						'container' => false,
						'depth' => 2,
						'items_wrap' => '<ul id="%1$s" class="left %2$s">%3$s</ul>',
						'walker' => new GC_walker_nav_menu()
						);
						wp_nav_menu($options); ?>
				    </ul>

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
								<li><a class="button" href="<?php echo get_page_link(568); ?>">Your Profile</a></li>
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
					</ul>
			  	</section>
			</nav>
		</div>


<div class="off-canvas-wrap hide-for-medium-up" data-offcanvas>
	<div class="inner-wrap">

	<nav class="tab-bar">
		<section class="left-small">
	        <a class="left-off-canvas-toggle menu-icon" href="#"><span></span></a>
	    </section>
	    <section class="middle tab-bar-section">
        	<h1 class="title">Foundation</h1>
      	</section>

      	<section class="right-small">
        	<a class="right-off-canvas-toggle menu-icon" href="#"><span></span></a>
      	</section>
	</nav>

	<!-- target the leftside menu -->
	<a class="left-off-canvas-toggle" href="#">Left Menu</a>
	<!-- target the rightside menu -->
	<a class="right-off-canvas-toggle" href="#">Right Menu</a>

    <!-- Off Canvas Menu -->
    <aside class="left-off-canvas-menu">
	    <ul class="off-canvas-list">
	        <li><label>Foundation</label></li>
	        <li><a href="#">The Psychohistorians</a></li>
	        <li><a href="#">...</a></li>
	    </ul>
    </aside>

	<aside class="right-off-canvas-menu">
    	<ul class="off-canvas-list">
	        <li><label>Users</label></li>
	        <li><a href="#">Hari Seldon</a></li>
	        <li><a href="#">...</a></li>
    	</ul>
    </aside>
    <!-- main content goes here -->

			<div id="main" class="site-main row">