<?php get_header(); ?>

<!-- MAIN CONTENT WRAPPER -->
<section id="entries wrap" class="small-12 medium-8  large-6 xlarge-7  xxlarge-7 columns ">

	<!--<?php next_post_link('<span>%link</span>'); ?> -->



	<div class="cn-bar">
		<div class="cn-nav row">

			<?php $prevPost = get_previous_post(true);
			if($prevPost) {?>
				<?php $prevthumbnail = get_the_post_thumbnail($prevPost->ID );
					$post_id_p= $prevPost->ID;

				$post_thumb_id= get_post_thumbnail_id( $post_id_p );
				$image_attributes = wp_get_attachment_image_src( $post_thumb_id );
			}?>
			<?php
			if ($post_id_p){
			$prev_post_url = get_permalink($prevPost->ID); ?>

			<a href="<?php echo $prev_post_url ?>" class="cn-nav-prev ">
				<span>Previous</span>
				<p><?php echo get_the_title($post_id_p); ?></p>

				<div style="background-image:url('<?php  echo $image_attributes['0'];?>');"></div>
			</a>
			<?php } ?>

			<?php $nextPost = get_next_post(true);
			if($nextPost) { ?>
			<?php $nextthumbnail = get_the_post_thumbnail($nextPost->ID );
			$post_id_x= $nextPost->ID;

				$post_thumb_id= get_post_thumbnail_id( $post_id_x );
				$image_attributes = wp_get_attachment_image_src( $post_thumb_id );
			} ?>
	<?php
	if ($post_id_x){
	$next_post_url = get_permalink($post_id_x); ?>
		<a href="<?php echo $next_post_url ?>" class="cn-nav-next">
			<span>Next</span>
			<p><?php
			if ($post_id_x){
			 echo get_the_title($post_id_x);
			 } ?></p>

			<div style="background-image:url('<?php  echo $image_attributes['0'];?>');"></div>

		</a>
	<?php } ?>
</div>
</div>


<?php get_template_part( 'loop', 'single' ); ?>




	<?php get_template_part( 'loop', 'related' ); ?>











	<div id="comments_wrap" class="row small-12 medium-12 xlarge-12 xxlarge-12 columns">
		<?php if( is_single() || is_page() ){ ?>
			<?php comments_template(); ?>
		<?php } ?>
	</div>


</section>
<?php get_sidebar(); ?>
<?php get_footer(); ?>