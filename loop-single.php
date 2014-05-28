<?php
if (have_posts()) :
	while (have_posts()) :
		the_post(); ?>

	<article <?php post_class("clear entry post small-12 medium-12 xlarge-12 xxlarge-12 columns"); ?> id="post-<?php the_ID(); ?>" role="article">


	<?php if (!$woothemes_sensei) { ?>
		<?php if ( is_singular() || is_single() || is_404() || is_archive() ) { ?>
						<h1><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h1>
					<?php } else { ?>
						<h1><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h1>
					<?php } ?>
	<?php } else { ?>
	This should show only for woocommerce pages....
	<?php } ?>






		<p><?php the_content(); ?></p>
	</article>
	<?php endwhile;
	endif;