<?php get_header(); ?>
	<?php get_sidebar('left'); ?>

<!-- MAIN CONTENT WRAPPER -->
<section id="entries wrap index" class="small-12 medium-8 large-6 xlarge-7 xxlarge-7 columns ">

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

	<?php get_template_part( 'loop', 'stickyindex' ); ?>

	<div class="navigation">
		<?php kriesi_pagination($pages = '', $range = 6); ?>
	</div><!-- .navigation -->

</section>
<?php get_sidebar('right'); ?>
<?php get_footer(); ?>