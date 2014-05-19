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

																<!-- Right Nav Section -->
																<ul class="right">

																	<?php
																	if ( is_user_logged_in() ) {
																		global $current_user; get_currentuserinfo();?>
																		<li>Welcome <?php echo $current_user->user_firstname ?></li>
																	<?php } else { ?>

																	<!-- if user is not logged in give option for login or register -->
																	<li class="has-form">
																		<a href="#" class="button" data-reveal-id="user_login">Login or Register</a>
																		<div id="user_login" class="reveal-modal medium" data-reveal>
																			<div id="login-register-password">

																				<?php global $user_ID, $user_identity; get_currentuserinfo(); if (!$user_ID) { ?>

																				<dl class="tabs" data-tab>
																					<dd class="active"><a href="#panel2-1">Login</a></dd>
																					<dd><a href="#panel2-2">Register</a></dd>
																					<dd><a href="#panel2-3">Forgot Password</a></dd>
																				</dl>

																				<div class="tabs-content">
																					<div class="content active" id="panel2-1">
																						<!-- check for and return message on success -->
																						<?php $register = $_GET['register']; $reset = $_GET['reset']; if ($register == true) { ?>

																						<h3>Success!</h3>
																						<p>Check your email for the password and then return to log in.</p>

																						<?php } elseif ($reset == true) { ?>
																						<h3>Success!</h3>
																						<p>Check your email to reset your password.</p>

																						<?php } else { ?>
																						<h3>Have an account?</h3>
																						<p>Log in or sign up! It's fast and <em>free!</em></p>
																						<?php } ?>


																						<form method="post" action="<?php bloginfo('url') ?>/wp-login.php" class="wp-user-form">
																							<div class="row">
																								<div class="username small-12 large-6 columns">
																									<label for="user_login">Username</label>
																										<input type="text" name="log" id="log user_login" value="<?php echo wp_specialchars(stripslashes($user_login), 1) ?>" />
																									</label>
																								</div>
																								<div class="password small-12 large-6 columns">
																									<label for="user_pass">Password</label>
																										<input type="password" name="pwd" value="" id="user_pass" tabindex="12" />
																									</label>
																								</div>
																							</div>
																							<div class="row">
																								<div class="rememberme small-12 large-6 columns">
																									<label for="rememberme">
																										<input type="checkbox" name="rememberme" value="forever" checked="checked" id="rememberme" /> Remember me
																									</label>
																								</div>
																								<div class="login_fields small-12 large-6 columns">

																									<?php do_action('login_form'); ?>
																									<input type="submit" name="user-submit" value="<?php _e('Login'); ?>" class="user-submit button" />
																									<input type="hidden" name="redirect_to" value="<?php echo $_SERVER['REQUEST_URI']; ?>" />
																									<input type="hidden" name="user-cookie" value="1" />
																								</div><!-- login_fields small-12 large-6 columns -->
																							</div><!-- row -->
																						</form>
																					</div><!-- .content active #panel2-1 -->



																					<div class="content" id="panel2-2">
																						<h3>Register.</h3>
																						<p>Register to get access to some wonderful goodies.</p>
																						<form method="post" action="<?php echo site_url('wp-login.php?action=register', 'login_post') ?>" class="wp-user-form">
																							<div class="row">

																								<div class="username small-12 large-6 columns">
																									<label for="user_login">Username</label>
																										<input type="text" name="log" id="log user_login" value="<?php echo wp_specialchars(stripslashes($user_login), 1) ?>" />
																									</label>
																								</div><!-- username small-12 large-6 columns -->

																								<div class="password small-12 large-6 columns">
																									<label for="user_email">Your Email</label>
																										<input type="text" name="user_email" value="<?php echo wp_specialchars(stripslashes($user_email), 1) ?>" id="user_email" />
																									</label>
																								</div><!-- password small-12 large-6 columns -->

																							</div><!-- row -->
																							<div class="row">
																								<div class="login_fields small-12 large-6 columns">

																									<?php do_action('register_form'); ?>
																									<input type="submit" name="user-submit" value="<?php _e('Sign up!'); ?>" class="user-submit button" />
																									<?php $register = $_GET['register']; if($register == true) { echo '<p>Check your email for the password!</p>'; } ?>

																									<input type="hidden" name="redirect_to" value="<?php echo $_SERVER['REQUEST_URI']; ?>?register=true" />
																									<input type="hidden" name="user-cookie" value="1" />

																								</div><!-- login_fields -->
																							</div>

																						</form>
																					</div><!-- .content #panel2-2 -->

																					<div class="content" id="panel2-3">
																						<h3>Lose something?</h3>
																						<p>Enter your username or email to reset your password.</p>
																						<form method="post" action="<?php echo site_url('wp-login.php?action=lostpassword', 'login_post') ?>" class="wp-user-form">
																							<div class="row">
																								<div class="username small-12 large-6 columns">
																									<label for="user_login" class="hide">Username or Email
																									</label>
																									<input type="text" name="log" id="log user_login" value="<?php echo wp_specialchars(stripslashes($user_login), 1) ?>" />

																									<?php do_action('login_form', 'resetpass'); ?>
																									<input type="submit" name="user-submit" value="<?php _e('Reset my password'); ?>" class="user-submit button" />
																									<?php $reset = $_GET['reset']; if($reset == true) { echo '<p>A message will be sent to your email address.</p>'; } ?>
																									<input type="hidden" name="redirect_to" value="<?php echo $_SERVER['REQUEST_URI']; ?>?reset=true" />
																									<input type="hidden" name="user-cookie" value="1" />
																								</div>
																							</div>
																						</form>
																					</div>

																				<?php } else { // is logged in ?>

																				<div class="sidebox">
																					<h3>Welcome, <?php echo $user_identity; ?></h3>
																					<div class="usericon">
																						<?php global $userdata; get_currentuserinfo(); echo get_avatar($userdata->ID, 60); ?>

																					</div>
																					<div class="userinfo">
																						<p>You&rsquo;re logged in as <strong><?php echo $user_identity; ?></strong></p>
																						<p>
																							<a href="<?php echo wp_logout_url('index.php'); ?>">Log out</a> |
																							<?php if (current_user_can('manage_options')) {
																								echo '<a href="' . admin_url() . '">' . __('Admin') . '</a>'; } else {
																									echo '<a href="' . admin_url() . 'profile.php">' . __('Profile') . '</a>'; } ?>
																								</p>
																							</div>
																						</div>

																						<?php } ?>

																					</div>
																					<a class="close-reveal-modal">&#215;</a>
																				</div>

																			</li>
																			<?php } ?>


																			<li class="has-form show-for-large-up">
																				<?php get_search_form(); ?>
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