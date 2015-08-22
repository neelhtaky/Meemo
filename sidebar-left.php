<aside id="sidebar" class="hide-for-medium-down large-2 xlarge-2 xxlarge-2 columns nopin" role="complementary">
	<ul class="no-bullet">

		<?php if ( is_active_sidebar( 'secondary' ) ) : ?>
			<?php dynamic_sidebar( 'secondary' ); ?>
		<?php endif; ?>
	</ul>
</aside>