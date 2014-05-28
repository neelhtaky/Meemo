<div id="user_logreglost" class="reveal-modal" data-reveal>
	<dl class="tabs" data-tab>
		<dd class="active"><a href="#panel2-1">Login</a></dd>
		<dd><a href="#panel2-2">Register</a></dd>
		<dd><a href="#panel2-3">Lost Password</a></dd>
	</dl>
	<div class="tabs-content">
		<div class="content active" id="panel2-1">
			<h2>Login</h2>
			<p>Sign in to get access to some amazing content.</p>
			<h3>Already have an account?</h3>
			<p>By the way, if you have a Wordpress.com account, you can login using those details. It's safer, and much easier.</p>
			<form method="post" action="<?php bloginfo('url') ?>/wp-login.php" class="wp-user-form" data-abide>
				<div class="row">
					<div class="username small-12 large-6 columns">
						<label for="user_login">Username</label>
						<input type="text" name="log" id="user_login" placeholder="Example: Your Name" value="<?php echo wp_specialchars(stripslashes($user_login), 1) ?>" tabindex="10" />
					</div><!-- username -->
					<div class="password small-12 large-6 columns">
						<label for="user_pass">Password</label>
						<input type="password" name="pwd" value="" placeholder="Example: A Short Secret" id="user_pass" tabindex="11" />
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
			<p>Register cto get access to some wonderful goodies. It's fast and <em>free!</em></p>
			<?php $register = $_GET['register']; if($register == true) { echo '<p class="alert-box warning">Check your email for the password!</p>'; } ?>


			<form method="post" action="<?php echo site_url('wp-login.php?action=register', 'login_post') ?>" class="wp-user-form">

				<div class="form small-12 large-6 columns">
					<div class="row">

						<div class="firstname small-12 large-6 columns">
							<label for="first_name">First Name</label>
							<input type="text" name="first_name" id="first_name" class="input" placeholder="Example: Kat" value="<?php echo esc_attr(stripslashes($first_name)); ?>" tabindex="17" />
						</div>
						<div class="lastname small-12 large-6 columns">
							<label for="last_name">Last Name (Surname)</label>
							<input type="text" name="last_name" id="last_name" class="input" placeholder="Example: Skinner" value="<?php echo esc_attr(stripslashes($last_name)); ?>" tabindex="18" />
						</div>
					</div>
					<div class="row">
						<div class="username small-12 columns">
							<label for="user_login">Username <small>Required</small>
							<input type="text" name="user_login" id="user_login" placeholder="Example: Your Name" value="<?php echo wp_specialchars(stripslashes($user_login), 1) ?>" tabindex="17" />
						</div><!-- username -->
						<div class="user_email small-12 columns">
							<label for="user_email">Your Email <small>Required</small><input type="email" id="user_email" name="user_email" placeholder="Example: someone@somewhere.com" value="<?php echo wp_specialchars(stripslashes($user_email), 1) ?>" tabindex="18" required /></label>

							<small class="error">An email address is required.</small>
						</div><!-- user_email -->
					</div>

					<div class="row">
						<div class="password small-12 large-6 columns">
							<label for="user_pass">Password</label>
							<input type="password" name="pwd" placeholder="Example: A Short Secret" value="" id="user_pass" tabindex="19" required pattern="[a-zA-Z]+" />
							<small class="error">Your password must match the requirements.</small>
						</div><!-- password -->
						<div class="password-confirmation-field small-12 large-6 columns">
							<label for="user_pass">Confirm Password</label>
							<input type="password" name="pwd" placeholder="Example: A Short Secret" value="" id="user_pass" tabindex="20" required pattern="[a-zA-Z]+" data-equalto="user_pass"/>
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
						<input type="text" name="user_login" id="log user_login" placeholder="Example: someone@somewhere.com" value="<?php echo wp_specialchars(stripslashes($user_login), 1) ?>" tabindex="17"/>
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