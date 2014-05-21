<?php get_header(); ?>
<?php get_sidebar('left'); ?>

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

		?>

				<a href="<?php echo $prev_post_url ?>" class="<?php echo $className ?> ">
					<?php
					if ($className == 'cn-nav-next small-6 columns'){?>
						<p class="small-8 columns "><?php echo get_the_title($post_id_prev);?> </p>
					<?php } /* Display */ ?>

					<!-- Fallback text is not displayed by css -->
					<span class="small-3 columns">Previous</span>

					<!-- display background image on css hover -->
					<div class=""style="background-image:url('<?php  echo $thumb_url['0'];?>');"></div>
					<!-- display title -->
					<?php
					if ($className=="cn-nav-prev small-6 columns"){?>
								<p class="small-8 columns push-4"><?php echo get_the_title($post_id_prev);?> </p>
					<?php } ?>
				</a>
		<?php } } ?>
	<!-- check if previous post exists -->
	<?php
	$prv_post = get_previous_post(true);
	generateNavButton($prv_post,"cn-nav-prev small-6 columns");
	$nxt_post = get_next_post(true);
	generateNavButton($nxt_post,"cn-nav-next small-6 columns");
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
<?php get_sidebar('right'); ?>
<?php get_footer(); ?>