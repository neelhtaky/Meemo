	<div id="main_wrapper" class="js-masonry "
	data-masonry-options='{
	"itemSelector": ".post" }' >

<!-- DISPLAY STICKY POSTS ABOVE ALL OTHER POSTS -->
	<?php if ( is_home() && !is_paged() ) {
		$sticky = get_option('sticky_posts');
		rsort( $sticky );
		$sticky = array_slice( $sticky, 0, 5);
		if ( $sticky[0] ) {
		query_posts( array( 'post__in' => $sticky, 'caller_get_posts' => 1 ) );

		if (have_posts()) :
			while (have_posts()) : the_post(); ?>
				<?php get_template_part( 'loop', 'index' ); ?>
			<?php endwhile; ?>

		<?php endif; } } ?>

	<?php wp_reset_query(); ?>

<!-- DISPLAY MAIN LOOP -->
	<?php $categories = get_the_category(); ?>
	<?php query_posts(array("post__not_in"=>get_option("sticky_posts"), 'paged'=>get_query_var('paged'))); ?>
	<?php if (have_posts()) :
		while (have_posts()) : the_post();
			if( $post->ID == $do_not_duplicate ) continue;
				get_template_part( 'loop', 'index' ); ?>

		<?php endwhile; else: ?>
			<p>Sorry, no posts matched your criteria.</p>
	<?php endif; ?>


	</div><!-- #main_wrapper -->