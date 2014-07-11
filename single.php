<?php get_template_part('partials/content', 'container'); ?>

<?php
if (have_posts()) :
	while (have_posts()) :
		the_post(); ?>
	<article <?php post_class("clear single_content"); ?> id="post-<?php the_ID(); ?>" role="article">
		<?php if ( is_singular() || is_single() || is_404() || is_archive() ) { ?>
			<h1><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h1>
		<?php } else { ?>
			<h1><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h1>
		<?php } ?>
		<p><?php the_content(); ?></p>
		<?php custom_wp_link_pages(); ?>

	</article>
	<?php endwhile;
	endif; ?>
		<?php if( is_single() || is_page() ){ ?>
			<?php comments_template(); ?>
		<?php } ?>
</section>
<?php get_sidebar('right'); ?>
<?php get_footer(); ?>