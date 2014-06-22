<?php get_header(); ?>
<!-- TO INSERT BREADCRUMBS HERE -->
	<?php get_sidebar('left'); ?>

	<!-- MAIN CONTENT WRAPPER -->
	<section id="entries wrap index" class="small-12 medium-9 large-7 xlarge-8 xxlarge-8 columns ">

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
			<?php } ?>
		</div>


		<div id="content">
			<div class="box cat1 cat3">
				<h2 class="box-title">Lorem Ipsum</h2>
				<div class="box-text">
					Urna vut, eros aliquet sagittis augue? Augue adipiscing duis? Et a placerat, magna enim? Lacus sit. Nunc montes tristique purus auctor. Nascetur? Vut amet, phasellus pulvinar et odio. Ut aliquet integer sed enim ac amet nunc? Tincidunt sit, cum ridiculus, placerat cum, vut magna ridiculus ut phasellus ridiculus? Eu hac, mattis adipiscing, montes adipiscing urna montes rhoncus!
				</div>
			</div>

			<div class="box cat1">
				<h2 class="box-title">Lorem Ipsum</h2>
				<div class="box-text">
					Urna vut, eros aliquet sagittis augue? Augue adipiscing duis? Et a placerat, magna enim? Lacus sit. Nunc montes tristique purus auctor. Nascetur? Vut amet, phasellus pulvinar et odio. Ut aliquet integer sed enim ac amet nunc? Tincidunt sit, cum ridiculus, placerat cum, vut magna ridiculus ut phasellus ridiculus? Eu hac, mattis adipiscing, montes adipiscing urna montes rhoncus! Odio placerat pellentesque risus urna elit, odio phasellus, rhoncus, est ridiculus purus etiam, penatibus integer!
				</div>
			</div>

			<div class="box cat2 cat3">
				<h2 class="box-title">Lorem Ipsum</h2>
				<div class="box-text">
					Urna vut, eros aliquet sagittis augue? Augue adipiscing duis? Et a placerat, magna enim? Lacus sit. Nunc montes tristique purus auctor. Nascetur?
				</div>
			</div>

			<div class="box cat1">
				<h2 class="box-title">Lorem Ipsum</h2>
				<div class="box-text">
					Amet dolor? Diam cras ac quis a ut, augue massa cursus natoque cursus in sociis rhoncus, scelerisque mus ac. Pellentesque odio rhoncus, aliquet tempor? Nisi cursus lorem tincidunt penatibus eu scelerisque! Scelerisque mid rhoncus turpis eros? Nunc rhoncus in turpis, mus, nec augue, odio, mid tempor aliquam, ultricies.
				</div>
			</div>
			<div class="box cat2">
				<h2 class="box-title">Lorem Ipsum</h2>
				<div class="box-text">
					Diam cras ac quis a ut, augue massa cursus natoque cursus in sociis rhoncus, scelerisque mus ac. Pellentesque odio rhoncus, aliquet tempor? Nisi cursus lorem tincidunt penatibus eu scelerisque! Scelerisque mid rhoncus turpis eros? Nunc rhoncus in turpis, mus, nec augue, odio, mid tempor aliquam, ultricies.
				</div>
			</div>
			<div class="box cat2">
				<h2 class="box-title">Lorem Ipsum</h2>
				<div class="box-text">
					Urna vut, eros aliquet sagittis augue? Augue adipiscing duis? Et a placerat, magna enim? Lacus sit. Nunc montes tristique purus auctor. Nascetur? Vut amet, phasellus pulvinar et odio. Pellentesque odio rhoncus, aliquet tempor? Nisi cursus lorem tincidunt penatibus eu scelerisque! Scelerisque mid rhoncus turpis eros? Nunc rhoncus in turpis, mus, nec augue, odio, mid tempor aliquam, ultricies.
				</div>
			</div>

			<div class="box cat2 cat3">
				<h2 class="box-title">Lorem Ipsum</h2>
				<div class="box-text">
					Urna vut, eros aliquet sagittis augue? Augue adipiscing duis? Et a placerat, magna enim? Lacus sit.
				</div>
			</div>

			<div class="box cat1">
				<h2 class="box-title">Lorem Ipsum</h2>
				<div class="box-text">
					Amet dolor? Diam cras ac quis a ut, augue massa cursus natoque cursus in sociis rhoncus, scelerisque mus ac. Pellentesque odio rhoncus, aliquet tempor? Nisi cursus lorem tincidunt penatibus eu scelerisque! Scelerisque mid rhoncus turpis eros? Nunc rhoncus in turpis, mus, nec augue, odio, mid tempor aliquam, ultricies.
				</div>
			</div>

			<div class="box cat2 cat3">
				<h2 class="box-title">Lorem Ipsum</h2>
				<div class="box-text">
					Urna vut, eros aliquet sagittis augue? Augue adipiscing duis? Et a placerat, magna enim? Lacus sit. Nunc montes tristique purus auctor. Amet dolor? Diam cras ac quis a ut, augue massa cursus natoque cursus in sociis rhoncus, scelerisque mus ac. Pellentesque odio rhoncus, aliquet tempor? Nisi cursus lorem tincidunt penatibus eu scelerisque! Scelerisque mid rhoncus turpis eros? Nunc rhoncus in turpis, mus, nec augue, odio, mid tempor aliquam, ultricies.
				</div>
			</div>


		</div>




	<div class="navigation">
		<?php kriesi_pagination($pages = '', $range = 6); ?>
	</div><!-- .navigation -->
<?php wp_reset_query(); ?>
		</section>
		<?php get_sidebar('right'); ?>
		<?php get_footer(); ?>