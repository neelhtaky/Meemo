<?php get_header(); ?>
<?php get_sidebar('left'); ?>
<section id="entries wrap" class="small-12 medium-8 large-6 xlarge-7 xxlarge-7 columns ">

<?php if (have_posts()) : ?>
	<!-- Display any code output from this region above the entire set of posts, generated via the h2 element only if there are posts. Any code is processed only once. -->

	<?php while (have_posts()) : the_post(); ?>
	<!-- Loop through posts and process each according to the code specified here  Process any code included in this region before the content of each post. -->


	<article <?php post_class("clear entry post small-12 medium-12 xlarge-12 xxlarge-12 columns"); ?> id="post-<?php the_ID(); ?>" role="article">
		<?php if ( is_singular() || is_single() || is_404() || is_archive() ) { ?>
			<h1><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h1>
		<?php } else { ?>
			<h1><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h1>
		<?php } ?>
		<p><?php the_content(); ?></p>
	</article>


		 <?php wp_link_pages('before=<div id="page-links">&after=</div>'); ?>
		 <?php if (!is_woocommerce()) {
		 	 if( is_single() || is_page() ){ ?>
			<?php comments_template();
			}
			} ?>
<?php endwhile; else: ?>
		  <p>
		    Sorry, no posts matched your criteria.
		  </p>
	<?php endif; ?>

</section>
<?php get_sidebar('right'); ?>
<?php get_footer(); ?>