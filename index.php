<?php get_header(); ?>

<!-- MAIN CONTENT WRAPPER -->
<section id="entries wrap" class="small-12 medium-8  large-6 xlarge-7  xxlarge-7 columns ">

	<?php get_template_part( 'loop', 'stickyindex' ); ?>

	<div class="navigation">
		<?php previous_posts_link('&laquo; Newer Posts') ?>
		<?php next_posts_link('Older Posts &raquo;','') ?>
	</div><!-- .navigation -->
</section>

<?php get_sidebar(); ?>
<?php get_footer(); ?>