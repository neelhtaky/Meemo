<?php
/**
 * Pagination - Posts
 *
 * @author 		WooThemes
 * @package 	Sensei/Templates
 * @version     1.1.0
 */

if ( ! defined( 'ABSPATH' ) ) exit;

?>
			<nav id="post-entries" class="fix row">
	            <div class="nav-prev fl small-12 medium-12 large-12 xlarge-6 xx-large-6 columns"><?php previous_post_link( '%link', '<span class="meta-nav"></span> %title' ); ?></div>
	            <div class="nav-next fr small-12 medium-12 large-12 xlarge-6 xx-large-6 columns"><?php next_post_link( '%link', '%title <span class="meta-nav"></span>' ); ?></div>
	        </nav><!-- #post-entries -->