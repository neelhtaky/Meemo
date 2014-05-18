<?php get_header(); ?>

<!-- MAIN CONTENT WRAPPER -->
<section id="entries wrap" class="small-12 medium-8  large-6 xlarge-7  xxlarge-7 columns ">



	<?php woocommerce_content(); ?>

	<?php get_template_part( 'loop', 'related' ); ?>


	<div id="comments_wrap" class="row small-12 medium-12 xlarge-12 xxlarge-12 columns">
		<?php if( is_single() || is_page() ){ ?>
			<?php comments_template(); ?>
		<?php } ?>

		<?php posts_nav_link(); ?>
	</div>


</section>



<?php get_sidebar(); ?>
<?php get_footer(); ?>