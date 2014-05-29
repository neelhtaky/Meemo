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
			<?php } ?>
		</div>

		<div id="main_wrapper" class="js-masonry "
				data-masonry-options='{
				"itemSelector": ".post" }' >

<?php if(is_home() && !is_paged()) { ?>
	<?php query_posts(array('post__in'=>get_option('sticky_posts'))); ?>
	<?php while(have_posts()) : the_post(); ?>

		<article <?php post_class("clear sticky entry post small-12 medium-12 xlarge-6 xxlarge-6 columns"); ?> id="post-<?php the_ID(); ?>" role="article">
			<h2 class="post_title"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
			<?php if (has_post_thumbnail( )): ?>
				<aside class="thumbnail small-12 medium-6 large-6 xlarge-12 xxlarge-12 columns">
					<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" ><?php the_post_thumbnail(); ?></a>
				</aside>
			<?php endif ?>
			<?php the_excerpt(); ?>
		</article>
	<?php endwhile; ?>
	<?php wp_reset_query(); ?>
<?php } ?>

<?php query_posts(array('post__not_in'=>get_option('sticky_posts'), 'paged' => get_query_var('paged'))); ?>
<?php if (have_posts()) : ?>
	<?php while (have_posts()) : the_post(); ?>

		<article <?php post_class("clear entry post small-12 medium-12 xlarge-6 xxlarge-6 columns"); ?> id="post-<?php the_ID(); ?>" role="article">
			<h2 class="post_title"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
			<?php if (has_post_thumbnail( )): ?>
				<aside class="thumbnail small-12 medium-6 large-6 xlarge-12 xxlarge-12 columns">
					<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" ><?php the_post_thumbnail(); ?></a>
				</aside>
			<?php endif ?>
			<?php the_excerpt(); ?>
		</article>

	<?php endwhile; ?>

</div><!-- masonry -->
	<div class="navigation">
		<?php kriesi_pagination($pages = '', $range = 6); ?>
	</div><!-- .navigation -->
<?php endif; ?>
<?php wp_reset_query(); ?>
		</section>
		<?php get_sidebar('right'); ?>
		<?php get_footer(); ?>