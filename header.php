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
<script src="<?php bloginfo('template_directory'); ?>/bower_components/imagesloaded/imagesloaded.pkgd.min.js"></script>
<script src="<?php bloginfo('template_directory'); ?>/bower_components/masonry/dist/masonry.pkgd.min.js"></script>

<script src="<?php bloginfo('template_directory'); ?>/bower_components/jquery/dist/jquery.min.js"></script>

<link href='http://fonts.googleapis.com/css?family=Lora' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Alice' rel='stylesheet' type='text/css'>
	<?php wp_head(); ?>
</head>
<body <?php body_class(''); ?>>











<div id="top" class="hfeed site">
	<header id="header" role="banner">

		<!-- TOPBAR -->
		<div id="nav_wrapper">
			<nav class="top-bar" data-topbar role="navigation">
			<ul class="title-area">
					<!-- Remove the class "menu-icon" to get rid of menu icon. Take out "Menu" to just have icon alone -->
				<li class="toggle-topbar menu-icon"><a href="#"><span>Menu</span></a></li>
			</ul>
			<section class="top-bar-section">
			  	<!-- Left Nav Section -->
			    <ul class="left">
			     	<?php
						global $current_user;
						get_currentuserinfo();
						$fname = $current_user->user_firstname;
						$dname = $current_user->display_name;
						if (is_user_logged_in()) {
							if (!empty($fname)) {
								 ?>
								<li id="welcome_user">Welcome <?php echo $fname; ?>!</li>
							<?php } else{ ?>
								<li id="welcome_user">Welcome <?php echo $dname; ?>!</li>
							<?php }
						} else { ?>
						<li class="has-form">
							<a href="#" data-reveal-id="user_logreglost" class="button">Login or Register</a>

							<?php get_template_part( 'login', 'modal' ); ?>



						</li>
						<?php } ?>
						 <?php $options = array(
								'theme_location' => 'nav_secondary',
								'container' => false,
								'depth' => 2,
								'items_wrap' => '<ul id="%1$s" class="left %2$s">%3$s</ul>',
								'walker' => new GC_walker_nav_menu()
								);
								wp_nav_menu($options); ?>
    			</ul>

			    <!-- Right Nav Section -->
			    <ul class="right">
			      <?php $options = array(
					'theme_location' => 'nav_primary',
					'container' => false,
					'depth' => 2,
					'items_wrap' => '<ul id="%1$s" class="left %2$s">%3$s</ul>',
					'walker' => new GC_walker_nav_menu()
					);
					wp_nav_menu($options); ?>
				</ul>
  			</section>
		</nav>
		</div>


		<div id="header_title" class=" hide-for-small-only">


			<div class="site_title small-12 columns">
				<?php if(is_home()){ ?>
					<h1><a href="<?php echo home_url(); ?>"><?php bloginfo('name'); ?></a></h1>
				<?php } else { ?>
					<h4><a href="<?php echo home_url(); ?>"><?php bloginfo('name'); ?></a></h4>
				<?php } ?>
			</div><!-- #site_title END -->



		</div>





<div class="off-canvas-wrap" data-offcanvas>
	<div class="inner-wrap">

		<nav class="tab-bar hide-for-medium-up">
			<section class="left-medium">
		        <a class="left-off-canvas-toggle menu-icon" href="#"><span></span></a>
		    </section>
		    <section class="middle tab-bar-section">
	        	<h1 class="title"><a href="<?php echo home_url(); ?>"><?php bloginfo('name'); ?></a></h1>
	      	</section>

		</nav>

	    <!-- Off Canvas Menu -->
	    <aside class="left-off-canvas-menu">
		    <ul class="off-canvas-list">
		        <?php $options = array(
					'theme_location' => 'nav_primary',
					'container' => false,
					'depth' => 2,
					'items_wrap' => '<ul id="%1$s" class="no-bullet">%3$s</ul>',
					'walker' => new GC_walker_nav_menu()
				);
				wp_nav_menu($options); ?>
		    </ul>
	    </aside>

    	<!-- main content goes here -->

			<div id="main" class="site-main row">

