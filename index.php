<?php get_header(); ?>

		<!-- MAIN CONTENT WRAPPER -->
		<div id="main_wrapper" class="small-12 medium-8 large-6 xlarge-6 xxlarge-6 columns" >

			<?php
				if ( have_posts() ) {
					while ( have_posts() ) {
						the_post(); ?>




						<div class="post xlarge-6 xxlarge-6 columns" data-equalizer-watch>

							<aside class="thumbnail small-12 medium-6 large-6 xlarge-12 xxlarge-12 columns">
								<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" ><?php the_post_thumbnail(); ?></a>
							</aside>

						<h2 class="post_title"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>

						<footer class="byline meta postmetadata">
							<time class="published" datetime="<?php the_time('l, F jS, Y') ?>"><?php the_time('l, F jS, Y') ?></time>.
							<div class="author">Written by <?php the_author(); ?>.</div>
							<a href="<?php comments_link(); ?>" class="comments-link">
								<?php comments_number( 'No Responses Yet. Leave a response?','1 Response.', '% Responses.', 'comments-link', 'Sorry, Comments are closed.'); ?></a>
								<?php the_category(', ') ?>.
							<span class="tags"><?php the_tags('Tags: ', ', ', '. '); ?></span>
						</footer>
						<p><?php the_excerpt(); ?></p>

						</div>












					<?php } // end while
				} // end if
			?>

		</div><!-- #main_wrapper -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>