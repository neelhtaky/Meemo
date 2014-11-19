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

<div id="container" class="js-isotope">

THIS JAIBJ PASEG FJAWPEG


 <!-- Start the Loop. -->
 <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

 	<!-- Test if the current post is in category 3. -->
 	<!-- If it is, the div box is given the CSS class "post-cat-three". -->
 	<!-- Otherwise, the div box is given the CSS class "post". -->

 	<?php if ( in_category( '3' ) ) : ?>
 		<div class="post-cat-three">
 	<?php else : ?>
 		<div class="post">
 	<?php endif; ?>


 	<!-- Display the Title as a link to the Post's permalink. -->

 	<h2><a href="<?php the_permalink(); ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>


 	<!-- Display the date (November 16th, 2009 format) and a link to other posts by this posts author. -->

 	<small><?php the_time('F jS, Y'); ?> by <?php the_author_posts_link(); ?></small>


 	<!-- Display the Post's content in a div box. -->




 	<!-- Display a comma separated list of the Post's Categories. -->

 	<p class="postmetadata"><?php _e( 'Posted in' ); ?> <?php the_category( ', ' ); ?></p>
 	</div> <!-- closes the first div box -->


 	<!-- Stop The Loop (but note the "else:" - see next line). -->

 <?php endwhile; else : ?>


 	<!-- The very first "if" tested to see if there were any Posts to -->
 	<!-- display.  This "else" part tells what do if there weren't any. -->
 	<p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>


 	<!-- REALLY stop The Loop. -->
 <?php endif; ?>


</div><!-- container -->

	<?php kriesi_pagination($pages = '', $range = 4); ?>

<?php wp_reset_query(); ?>

<?php get_template_part('partials/content', 'containerclose'); ?>