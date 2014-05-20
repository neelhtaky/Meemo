



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
					<p class="alert-box success">Check your email for the password and then return to log in.</p>

					<?php } elseif ($reset == true) { ?>
					<h3>Success!</h3>
					<p class="alert-box success">Check your email to reset your password.</p>

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
									<input type="text" name="user_login" id="user_login user_login" value="<?php echo wp_specialchars(stripslashes($user_login), 1) ?>" />
								</label>
							</div><!-- username small-12 large-6 columns -->

							<div class="user_email small-12 large-6 columns">
								<label for="user_email">Your Email</label>
									<input type="text" id="user_email" name="user_email" value="<?php echo wp_specialchars(stripslashes($user_email), 1) ?>" id="user_email" />
								</label>
							</div><!-- user_email small-12 large-6 columns -->

						</div><!-- row -->
						<div class="row">
							<div class="login_fields small-12 large-6 columns">

								<?php do_action('register_form'); ?>
								<input type="submit" name="user-submit" value="<?php _e('Sign up!'); ?>" class="user-submit button" />

								<?php $register = $_GET['register']; if($register == true) { echo '<p class="alert-box warning">Check your email for the password!</p>'; } ?>

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
								<input type="text" name="user_login" id="log user_login" value="<?php echo wp_specialchars(stripslashes($user_login), 1) ?>" />

								<?php do_action('login_form', 'resetpass'); ?>
								<input type="submit" name="user-submit" value="<?php _e('Reset my password'); ?>" class="user-submit button" />
								<?php $reset = $_GET['reset']; if($reset == true) { echo '<p class="alert-box alert">A message will be sent to your email address.</p>'; } ?>
								<input type="hidden" name="redirect_to" value="<?php echo $_SERVER['REQUEST_URI']; ?>?reset=true" />
								<input type="hidden" name="user-cookie" value="1" />
							</div>
						</div>
					</form>
				</div>



					<?php } ?>

				</div>
				<a class="close-reveal-modal">&#215;</a>
			</div>

		</li>
