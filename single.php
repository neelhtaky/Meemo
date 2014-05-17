<?php get_header(); ?>

<!-- MAIN CONTENT WRAPPER -->
<section id="entries wrap" class="small-12 medium-8  large-6 xlarge-7  xxlarge-7 columns ">


<?php get_template_part( 'loop', 'single' ); ?>
<div class="cn-bar">
	<div class="cn-nav row">





<?php
function generateNavButton($the_post,$className){
	 if($the_post) {
		/* get the primary key id from the_post */
		$post_id_prev= $the_post->ID;
		/* get thumbnail id from post ID */
		$post_thumb_id= get_post_thumbnail_id( $post_id_prev );
		/* get the thumbnail url from thumbnail ID */
		 $thumb_url = wp_get_attachment_image_src( $post_thumb_id );
		 /* get the posts url from post ID */
		 $prev_post_url = get_permalink($the_post->ID);

		/* Display */ ?>
		<a href="<?php echo $prev_post_url ?>" class="<?php echo $className ?>">
			<!-- Fallback text is not displayed by css -->
			<span>Previous</span>
			<!-- display title -->
			<p><?php echo get_the_title($post_id_prev); ?></p>
			<!-- display background image on css hover -->
			<div style="background-image:url('<?php  echo $thumb_url['0'];?>');"></div>
		</a>

		<?php } } ?>

	<!-- check if previous post exsists -->
	<?php
	$prv_post = get_previous_post(true);
	generateNavButton($prv_post,"cn-nav-prev");
	$nxt_post = get_next_post(true);
	generateNavButton($nxt_post,"cn-nav-next");
	?>




	</div><!-- .cn-nav .row -->
</div><!-- cn-bar -->
<?php get_template_part( 'loop', 'related' ); ?>











	<div id="comments_wrap" class="row small-12 medium-12 xlarge-12 xxlarge-12 columns">
		<?php if( is_single() || is_page() ){ ?>
			<?php comments_template(); ?>
		<?php } ?>
	</div>


</section>
<?php get_sidebar(); ?>
<?php get_footer(); ?>