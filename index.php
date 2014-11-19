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
	 <?php if(is_home() && !is_paged()) {
		$args1 =  array('post__in'=>get_option('sticky_posts'));
		$stickyQuery = new WP_Query ($args1);
		if ($stickyQuery -> have_posts()) :
			while ( $stickyQuery -> have_posts() ) :
				$stickyQuery -> the_post(); ?>
			<article <?php post_class("sticky entries item"); ?> id="post-<?php the_ID(); ?>" role="article">

				<?php if (has_post_thumbnail( )): ?>
					<?php $post_thumbnail_id = get_post_thumbnail_id( $post_id );
					$imgmeta = wp_get_attachment_metadata( $post_thumbnail_id );
					if ($imgmeta['width'] > $imgmeta['height']) {
						//if
					?>
						<aside class="thumbnail small-6 columns">
							<a class="" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" ><?php the_post_thumbnail(); ?></a>
						</aside>
					 <?php } else { ?>
						<aside class="thumbnail small-12 columns">
							<a class="" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" ><?php the_post_thumbnail(); ?></a>
						</aside>
					<?php } ?>

				<?php endif ?>
				<div class="entry_content">
					<h2 class="post_title"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
						<footer class="byline meta postmetadata">
						<time class="published" datetime="<?php the_time('l, F jS, Y') ?>"><?php the_time('jS F Y') ?>.</time>
						<div class="author"><?php the_author(); ?>.</div>
						<a href="<?php comments_link(); ?>" class="comments-link">
							<?php comments_number( 'No Comments Yet.','1 Comment.', '% Comments.', 'comments-link', 'Sorry, Comments are closed.'); ?></a>
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

			<?php endwhile;
		endif;
		wp_reset_postdata(); ?>
	<?php
	} //end if is home and not paged
	$args2 = array(
		'post__not_in' => get_option('sticky_posts'),
		'paged' => get_query_var('paged')
		);
	$normalQuery = new WP_Query ( $args2 );
	if ($normalQuery -> have_posts()) :
		while ( $normalQuery -> have_posts() ) :
			$normalQuery -> the_post(); ?>

			<article <?php post_class("item entry"); ?> id="post-<?php the_ID(); ?>" role="article">

				<?php if (has_post_thumbnail( )): ?>


					<?php $post_thumbnail_id = get_post_thumbnail_id( $post_id );
					$imgmeta = wp_get_attachment_metadata( $post_thumbnail_id );
					if ($imgmeta['width'] > $imgmeta['height']) {
						//vertical image
					?>
						<aside class="thumbnail small-12 columns">
							<a class="" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" ><?php the_post_thumbnail(); ?></a>
						</aside>
					 <?php } else {
					 	//horizontal image
					 	?>
						<aside class="thumbnail small-6 columns">
							<a class="" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" ><?php the_post_thumbnail(); ?></a>
						</aside>
					<?php } ?>
				<?php endif ?>
				<div class="entry_content">
					<h2 class="post_title"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
					<footer class="byline meta postmetadata">
						<time class="published" datetime="<?php the_time('l, F jS, Y') ?>"><?php the_time('jS F Y') ?>.</time>
						<div class="author"><?php the_author(); ?>.</div>
						<a href="<?php comments_link(); ?>" class="comments-link">
							<?php comments_number( 'No Comments Yet.','1 Comment.', '% Comments.', 'comments-link', 'Sorry, Comments are closed.'); ?></a>
						<?php if(has_category()){ ?>
							<span class="category"><?php the_category(', ') ?>.</span>
						<?php } else {} ?>
						<?php  if(has_tag()){ ?>
							<span class="tags"><?php the_tags('Tags: ', ', ', '. '); ?>.</span>
						<?php } else {} ?>
					</footer>

					<?php if( has_excerpt() ){
						//if post has custom manual excerpt
						the_content('... <div class="read_more"><a href="'. get_permalink($post->ID) . '"  rel="bookmark">Read More</a></div>');
					} else if(strpos($post->post_content, '<!--more-->')) {
						//should break at more tag
						the_content('<div class="read_more"><a href="'. get_permalink($post->ID) . '"  rel="bookmark">Read More</a></div>');
					} else {
						//display auto generated excerpt
						the_excerpt();
					}?>
				</div>
			</article>
		<?php endwhile;
	endif;
	wp_reset_postdata();
	?>
</div><!-- container -->

	<?php kriesi_pagination($pages = '', $range = 4); ?>

<?php wp_reset_query(); ?>

<?php get_template_part('partials/content', 'containerclose'); ?>