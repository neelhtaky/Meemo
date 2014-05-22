<?php get_header(); ?>
<?php get_sidebar('left'); ?>
<section id="entries wrap" class="small-12 medium-8  large-6 xlarge-7  xxlarge-7 columns ">
	<?php get_template_part( 'loop', 'single' ); ?>
		<?php if( is_single() || is_page() ){ ?>
			<?php comments_template(); ?>
		<?php } ?>

		<?php posts_nav_link(); ?>
</section>
<?php get_sidebar('right'); ?>
<?php get_footer(); ?>