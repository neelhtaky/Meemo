<?php get_template_part('partials/content', 'containeropen'); ?>

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
<script type="text/javascript">
	// initialize Isotope after all images have loaded
	var $container = $('#container').imagesLoaded( function() {
	  	$container.isotope({
	    	// options
	    	itemSelector: '.item'
	  	});
	});
</script>

<h1>Portfolio</h1>
<div id="container" class="js-isotope">




 <!-- Start the Loop. -->
 <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

	<article <?php post_class("sticky entries item portfolio_item small-6 large-4 xlarge-3"); ?> id="post-<?php the_ID(); ?>" role="article">

				<?php if (has_post_thumbnail( )): ?>
					<aside class="thumbnail">
						<a class="" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" ><?php the_post_thumbnail('medium'); ?></a>
					</aside>

				<?php endif ?>

	</article>

 <?php endwhile; else : ?>
 	<p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
 <?php endif; ?>




</div><!-- container -->




	<?php kriesi_pagination($pages = '', $range = 4); ?>

<?php wp_reset_query(); ?>









<?php get_template_part('partials/content', 'containerclose'); ?>