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






		<div id="main_wrapper" class="js-masonry"
				data-masonry-options='{
				isInitLayout: false,
				"itemSelector": ".post"
				}' >







<?php if(is_home() && !is_paged()) {

	$args1 =  array('post__in'=>get_option('sticky_posts'));
	$stickyQuery = new WP_Query ($args1);

	if ($stickyQuery -> have_posts()) :
		while ( $stickyQuery -> have_posts() ) :
			$stickyQuery -> the_post(); ?>

		<article <?php post_class("clear sticky entry post small-12 medium-12 xlarge-6 xxlarge-6 columns"); ?> id="post-<?php the_ID(); ?>" role="article">
			<h2 class="post_title"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
			<?php if (has_post_thumbnail( )): ?>
				<aside class="thumbnail small-12 medium-6 large-6 xlarge-12 xxlarge-12 columns">
					<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" ><?php the_post_thumbnail(); ?></a>
				</aside>
			<?php endif ?>

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

		</article>

		<?php endwhile;
	endif;
	wp_reset_postdata();

} //end if is home and not paged

$args2 = array(
	'post__not_in' => get_option('sticky_posts'),
	'paged' => get_query_var('paged')
	);
$normalQuery = new WP_Query ( $args2 );
if ($normalQuery -> have_posts()) :
	while ( $normalQuery -> have_posts() ) :
		$normalQuery -> the_post(); ?>
			<article <?php post_class("clear entry post small-12 medium-12 xlarge-6 xxlarge-6 columns"); ?> id="post-<?php the_ID(); ?>" role="article">
				<h2 class="post_title"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
				<?php if (has_post_thumbnail( )): ?>
					<aside class="thumbnail small-12 medium-6 large-6 xlarge-12 xxlarge-12 columns">
						<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" ><?php the_post_thumbnail(); ?></a>
					</aside>
				<?php endif ?>
							<?php if( has_excerpt() ){
				//if post has custom manual excerpt
				the_content('... <div class="read_more"><a href="'. get_permalink($post->ID) . '" class="button" rel="bookmark">Read More</a></div>');
			} else if(strpos($post->post_content, '<!--more-->')) {
				//should break at more tag
				the_content('<div class="read_more"><a href="'. get_permalink($post->ID) . '" class="button" rel="bookmark">Read More</a></div>');
			} else {
				//display auto generated excerpt
				the_excerpt();
			}?>
			</article>
	<?php endwhile;
endif;
wp_reset_postdata();

?>
</div><!-- masonry -->
	<div class="navigation">
		<?php kriesi_pagination($pages = '', $range = 6); ?>
	</div><!-- .navigation -->
<?php wp_reset_query(); ?>
		</section>
		<?php get_sidebar('right'); ?>
		<?php get_footer(); ?>