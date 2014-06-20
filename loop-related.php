<div id="related" class="row small-12 medium-12 xlarge-12 xxlarge-12 columns">
	<h1>Similar Posts</h1>
	<?php $tags = wp_get_post_tags($post->ID);
	if ($tags) {
		$first_tag = $tags[0]->term_id;
		$args=array(
		'tag__in' => array($first_tag),
		'post__not_in' => array($post->ID),
		'posts_per_page'=>6,
		'caller_get_posts'=>1
	);
	$my_query = new WP_Query($args);
	if( $my_query->have_posts() ) {
		while ($my_query->have_posts()) : $my_query->the_post(); ?>
			<?php if ( has_post_thumbnail() ) { ?>
				<aside class="related small-6 xlarge-3 columns">
					<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" ><?php the_post_thumbnail(); ?></a>
					<a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a>
				</aside>
			<?php } else { ?>
				<aside class="related small-6 xlarge-3 columns">
					<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" ><img src="<?php echo get_stylesheet_directory_uri() ?>/library/images/thumb.jpg" alt="" title=""/></a>
					<a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a>
				</aside>
			<?php } ?>
		<?php endwhile;
	}
	wp_reset_query();
	} ?>
</div>





