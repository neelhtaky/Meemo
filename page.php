<?php get_template_part('partials/content', 'container'); ?>

<?php if (have_posts()) : ?>
	<!-- Display any code output from this region above the entire set of posts, generated via the h2 element only if there are posts. Any code is processed only once. -->

	<?php while (have_posts()) : the_post(); ?>
	<!-- Loop through posts and process each according to the code specified here  Process any code included in this region before the content of each post. -->


		<article <?php post_class("clear page_content"); ?> id="post-<?php the_ID(); ?>" role="article">
			<?php if ( is_singular() || is_single() || is_404() || is_archive() ) { ?>
				<h1><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h1>
			<?php } else { ?>
				<h1><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h1>
			<?php } ?>
			<p><?php the_content(); ?></p>
		</article>

		<?php wp_link_pages('before=<div id="page-links">&after=</div>'); ?>

			<?php

			if(comments_open()){
				if (is_cart() || is_checkout() || is_account_page() ) {

				}
				else{
					comments_template();
				}
			} else {}
			 ?>

<?php endwhile; else: ?>
		  <p class="panel alert">
		    Sorry, no posts matched your criteria.
		  </p>
	<?php endif; ?>

</section>
<?php get_sidebar('right'); ?>
<?php get_footer(); ?>