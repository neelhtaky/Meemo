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
								<div id="left-nav" class="hide-for-large-up">
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
									if ( is_user_logged_in() ) {
										global $current_user; get_currentuserinfo();?>
										<li>Welcome <?php echo $current_user->user_firstname ?></li>
										<?php } else { ?>

										<!-- if user is not logged in give option for login or register -->
										<li class="has-form">
											<a href="#" data-reveal-id="user_logreglost" class="button">Login or Register</a>
											<div id="user_logreglost" class="reveal-modal" data-reveal>
												<dl class="tabs" data-tab>
													<dd class="active"><a href="#panel2-1">Login</a></dd>
													<dd><a href="#panel2-2">Register</a></dd>
													<dd><a href="#panel2-3">Lost Password</a></dd>
												</dl>
												<div class="tabs-content">
													<div class="content active" id="panel2-1">
														<h2>Login</h2>
														<h3>Already have an account?</h3>
														<p>Sign in to get access to some amazing content.</p>
														<form method="post" action="<?php bloginfo('url') ?>/wp-login.php" class="wp-user-form" data-abide>
															<div class="row">
																<div class="username small-12 large-6 columns">
																	<label for="user_login">Username</label>
																	<input type="text" name="log" id="user_login" value="<?php echo wp_specialchars(stripslashes($user_login), 1) ?>" tabindex="10" />
																</div><!-- username -->
																<div class="password small-12 large-6 columns">
																	<label for="user_pass">Password</label>
																	<input type="password" name="pwd" value="" id="user_pass" tabindex="11" />
																</div><!-- password -->
															</div><!-- row -->
															<div class="row">
																<div class="rememberme small-12 large-6 columns">
																	<input type="checkbox" name="rememberme" value="forever" checked="checked" id="rememberme" tabindex="12" />
																	<label for="rememberme">Remember Me</label>
																</div><!-- rememberme -->
																<div class="login_fields small-12 large-6 columns">
																	<?php do_action('login_form'); ?>
																	<input type="submit" name="user-submit" value="<?php _e('Login'); ?>" class="user-submit button" tabindex="13" />
																	<input type="hidden" name="redirect_to" value="<?php echo $_SERVER['REQUEST_URI']; ?>" />
																	<input type="hidden" name="user-cookie" value="1" />
																</div>
															</div><!-- row -->
														</form><!-- login form -->
													</div><!-- panel2-1 login -->

													<div class="content" id="panel2-2">
														<h2>Register</h2>
														<p>Register to get access to some wonderful goodies. It's fast and <em>free!</em></p>
														<?php $register = $_GET['register']; if($register == true) { echo '<p class="alert-box warning">Check your email for the password!</p>'; } ?>
														<form method="post" action="<?php echo site_url('wp-login.php?action=register', 'login_post') ?>" class="wp-user-form">
															<div class="row">
																<div class="username small-12 large-6 columns">
																	<label for="user_login">Username</label>
																	<input type="text" name="user_login" id="user_login" value="<?php echo wp_specialchars(stripslashes($user_login), 1) ?>" tabindex="14" />
																</div><!-- username -->
																<div class="user_email small-12 large-6 columns">
																	<label for="user_email">Your Email<span class="label alert">Required</span></label>
																	<input type="email" id="user_email" name="user_email" value="<?php echo wp_specialchars(stripslashes($user_email), 1) ?>" tabindex="15" required/>
																</div><!-- user_email -->
															</div><!-- row -->
															<div class="row">
																<div class="login_fields small-12 large-6 columns">
																	<?php do_action('register_form'); ?>
																	<input type="submit" name="user-submit" value="<?php _e('Sign up!'); ?>" class="user-submit button" tabindex="16" />

																	<input type="hidden" name="redirect_to" value="<?php echo $_SERVER['REQUEST_URI']; ?>?register=true" />
																	<input type="hidden" name="user-cookie" value="1" />
																</div><!-- login_fields -->
															</div><!-- row -->




															<h2>Ideal Registery Form</h2>
															<div class="form small-12 large-6 columns">
																<div class="row">

																	<div class="firstname small-12 large-6 columns">
																		<label for="first_name">First Name</label>
																		<input type="text" name="first_name" id="first_name" class="input" value="<?php echo esc_attr(stripslashes($first_name)); ?>" tabindex="17" />
																	</div>
																	<div class="lastname small-12 large-6 columns">
																		<label for="last_name">Last Name (Surname)</label>
																		<input type="text" name="last_name" id="last_name" class="input" value="<?php echo esc_attr(stripslashes($last_name)); ?>" tabindex="18" />
																	</div>
																</div>
																<div class="row">
																	<div class="username small-12 columns">
																		<label for="user_login">Username<span class="label alert">Required</span></label>
																		<input type="text" name="user_login" id="user_login" value="<?php echo wp_specialchars(stripslashes($user_login), 1) ?>" tabindex="17" />
																	</div><!-- username -->
																	<div class="user_email small-12 columns">
																		<label for="user_email">Your Email<span class="label alert">Required</span></label>
																		<input type="email" id="user_email" name="user_email" value="<?php echo wp_specialchars(stripslashes($user_email), 1) ?>" tabindex="18" required />
																		<small class="error">An email address is required.</small>
																	</div><!-- user_email -->
																</div>

																<div class="row">
																	<div class="password small-12 large-6 columns">
																		<label for="user_pass">Password</label>
																		<input type="password" name="pwd" value="" id="user_pass" tabindex="19" required pattern="[a-zA-Z]+" />
																		<small class="error">Your password must match the requirements.</small>
																	</div><!-- password -->
																	<div class="password-confirmation-field small-12 large-6 columns">
																		<label for="user_pass">Confirm Password</label>
																		<input type="password" name="pwd" value="" id="user_pass" tabindex="20" required pattern="[a-zA-Z]+" data-equalto="user_pass"/>
																		<small class="error">The password did not match.</small>
																	</div><!-- password -->
																</div>

															</div>
															<div class="disclaimer small-12 large-6 columns">
																<h2>Why You Will Love Being A Member</h2>
																<ul>
																	<li>Participate fully in courses. Maximise your learning by completing quizzes and submitting content. </li>
																	<li>Recieve feedback from the teachers.</li>
																	<li>Purchase aditional content without needing to login again.</li>
																</ul>
															</div>
															<div class="row">
																<div class="login_fields small-12 large-6 columns">
																	<?php do_action('register_form'); ?>
																	<input type="submit" name="user-submit" value="<?php _e('Sign up!'); ?>" class="user-submit button" tabindex="21" />

																	<input type="hidden" name="redirect_to" value="<?php echo $_SERVER['REQUEST_URI']; ?>?register=true" />
																	<input type="hidden" name="user-cookie" value="1" />
																</div><!-- login_fields -->
															</div><!-- row -->















														</form><!-- register form -->
													</div><!-- panel2-2 register -->

													<div class="content" id="panel2-3">
														<h2>Lose something?</h2>
														<p>Enter your username or email to reset your password.</p>
														<?php $reset = $_GET['reset']; if($reset == true) { echo '<p class="alert-box alert">A message will be sent to your email address.</p>'; } ?>
														<form method="post" action="<?php echo site_url('wp-login.php?action=lostpassword', 'login_post') ?>" class="wp-user-form">
															<div class="row">
																<div class="username small-12 large-6 columns">
																	<label for="user_login">Username or Email</label>
																	<input type="text" name="user_login" id="log user_login" value="<?php echo wp_specialchars(stripslashes($user_login), 1) ?>" tabindex="17"/>
																</div><!-- username -->
															</div><!-- row -->
															<div class="row">
																<div class="login_fields small-12 large-6 columns">
																	<?php do_action('login_form', 'resetpass'); ?>
																	<input type="submit" name="user-submit" value="<?php _e('Reset my password'); ?>" class="user-submit button" tabindex="18"/>
																	<input type="hidden" name="redirect_to" value="<?php echo $_SERVER['REQUEST_URI']; ?>?reset=true" />
																	<input type="hidden" name="user-cookie" value="1" />
																</div>

															</div><!-- row -->
														</form>
													</div><!-- panel2-3 lost password -->
												</div><!-- tabs-content -->
												<a class="close-reveal-modal">&#215;</a>
											</div>
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


<div id="user_logreglost_alert">
	<!-- check for and return message on success -->
	<?php $register = $_GET['register']; $reset = $_GET['reset']; if ($register == true) { ?>

<span class="alert-box success">
	<h3>Success!</h3>
	<p>Check your email for the password and then return to log in.</p>
</span>

	<?php } elseif ($reset == true) { ?>
	<span class="alert-box warning">
		<h3>Success!</h3>
		<p>Check your email to reset your password.</p>
	</span>

	<?php } else { ?>
	<?php } ?>
</div>








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