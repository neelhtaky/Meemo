<?php get_header(); ?>
<?php get_sidebar('left'); ?>
<section id="entries wrap" class="small-12 medium-8  large-6 xlarge-7  xxlarge-7 columns ">
<?php
if (have_posts()) :
	while (have_posts()) :
		the_post(); ?>
	<article <?php post_class("clear entry post small-12 medium-12 xlarge-12 xxlarge-12 columns"); ?> id="post-<?php the_ID(); ?>" role="article">
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