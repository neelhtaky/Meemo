			<article <?php post_class("clear entry post small-12 medium-12 xlarge-6 xxlarge-6 columns"); ?> id="post-<?php the_ID(); ?>" role="article">
				<?php if (has_post_thumbnail( )): ?>
					<aside class="thumbnail small-12 medium-6 large-6 xlarge-12 xxlarge-12 columns">
						<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" ><?php the_post_thumbnail(); ?></a>
					</aside>
				<?php endif ?>

				<h2 class="post_title"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
				<footer class="byline meta postmetadata">
					<time class="published" datetime="<?php the_time('l, F jS, Y') ?>"><?php the_time('l, F jS, Y') ?></time>.
					<div class="author">Written by <?php the_author(); ?>.</div>
					<a href="<?php comments_link(); ?>" class="comments-link">
						<?php comments_number( 'No Responses Yet. Leave a response?','1 Response.', '% Responses.', 'comments-link', 'Sorry, Comments are closed.'); ?></a>
						<span class="course-category"><?php the_category(', ') ?></span>.
					<span class="tags"><?php the_tags('Tags: ', ', ', '. '); ?></span>
				</footer>
				<p><?php the_excerpt(); ?></p>
			</article>