<article <?php post_class("clear entry post small-12 medium-12 xlarge-6 xxlarge-6 columns"); ?> id="post-<?php the_ID(); ?>" role="article">
	<h2 class="post_title"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
	<?php if (has_post_thumbnail( )): ?>
		<aside class="thumbnail small-12 medium-6 large-6 xlarge-12 xxlarge-12 columns">
			<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" ><?php the_post_thumbnail(); ?></a>
		</aside>
	<?php endif ?>
	<?php the_excerpt(); ?>
</article>