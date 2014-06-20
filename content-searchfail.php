
	<article <?php post_class("clear entry post small-12 medium-12 xlarge-6 xxlarge-6 columns"); ?> id="post-<?php the_ID(); ?>" role="article">
		<h2>Sorry... No results were found for '<?php echo get_search_query(); ?>'</h2>
	<p>Well this is embarrassing, isn’t it?</p>
	<p>I cannot seem to find what you were looking for. I'm very sorry. That page or file may have been moved or deleted.</p>
<p>Would you like to try another search?</p>
	<?php get_search_form(); ?>

	<h2>Maybe I can still help you...</h2>

	<h3>Popular Posts</h3>
	<p>Here's a list of our most popular posts; these are what people come to read!</p>
	<ol class="popular_posts">
		<?php $pc = new WP_Query('orderby=comment_count&posts_per_page=9');

		while ($pc->have_posts()) : $pc->the_post(); ?>
			<li><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></li>
		<?php endwhile; ?>
	</ol>

	<h3>Recent Posts</h3>
	<p>Maybe you were looking for one of our more recently published posts?</p>
	<ul>
		<?php $recent_posts = wp_get_recent_posts();
			foreach( $recent_posts as $recent ){
				echo '<li><a href="' . get_permalink($recent["ID"]) . '" title="Look '.esc_attr($recent["post_title"]).'" >' .   $recent["post_title"].'</a> </li> ';
			} ?>
</ul>
</article>