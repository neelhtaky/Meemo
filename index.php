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


<script src="<?php bloginfo('template_directory'); ?>/bower_components/isotope/dist/isotope.pkgd.min.js" type="text/javascript">

   window.onload = function () {
alert();
$('#container').css('color', 'red');
var $container = $('#container').isotope({
  // options
  itemSelector: '.item'
});

$container.isotope('layout');

}




</script>

<div id="container" >

<?php
if ( have_posts() ) {
	while ( have_posts() ) {
		the_post();  ?>
		<article <?php post_class("sticky entries item"); ?> id="post-<?php the_ID(); ?>" role="article">
			<?php if (has_post_thumbnail( )): ?>
				<?php $post_thumbnail_id = get_post_thumbnail_id( $post_id );
				$imgmeta = wp_get_attachment_metadata( $post_thumbnail_id );
				if ($imgmeta['width'] > $imgmeta['height']) {
				?>
					<aside class="feature_th_vert small-6 columns">
						<a class="" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" ><?php the_post_thumbnail(); ?></a>
					</aside>
				 <?php } else { ?>
					<aside class="feature_th_hor small-12 columns">
						<a class="" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" ><?php the_post_thumbnail(); ?></a>
					</aside>
				<?php } ?>

			<?php endif ?>
			<div class="entry_content">
				<h2 class="post_title"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
				<footer class="byline meta postmetadata">
					<time class="published" datetime="<?php the_time('l, F jS, Y') ?>"><?php the_time('jS F Y') ?>.</time>
					<div class="author"><?php the_author(); ?>.</div>
					<a href="<?php comments_link(); ?>" class="comments-link"><?php comments_number( 'No Comments Yet.','1 Comment.', '% Comments.', 'comments-link', 'Sorry, Comments are closed.'); ?></a>
					<?php if(has_category()){ ?>
							<span class="category"><?php the_category(', ') ?>.</span>
					<?php } else {} ?>
					<?php  if(has_tag()){ ?>
							<span class="tags"><?php the_tags('Tags: ', ', ', '. '); ?>.</span>
					<?php } else {} ?>
				</footer>

				<?php if( has_excerpt() ){
					//if post has custom manual excerpt
					the_content('... <div class="read_more"><a href="'. get_permalink($post->ID) . '" class="button" rel="bookmark">Read More</a></div>');
				} else if(strpos($post->post_content, '<!--more-->')) {
					//should break at more tag
					the_content('... <div class="read_more"><a href="'. get_permalink($post->ID) . '" class="button" rel="bookmark">Read More</a></div>');
				} else {
					//display auto generated excerpt
					the_excerpt();
				}?>
			</div><!-- entry_content -->

		</article>
	<?php
	} // end while
} // end if
?>

</div><!-- container -->

	<?php kriesi_pagination($pages = '', $range = 4); ?>

<?php wp_reset_query(); ?>

<?php get_template_part('partials/content', 'containerclose'); ?>