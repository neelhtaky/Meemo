<?php
/**
 * Pagination - Lesson
 *
 * @author 		WooThemes
 * @package 	Sensei/Templates
 * @version     1.1.0
 */

if ( ! defined( 'ABSPATH' ) ) exit;

global $post;
$nav_id_array = sensei_get_prev_next_lessons( $post->ID );
$previous_lesson_id = absint( $nav_id_array['prev_lesson'] );
$next_lesson_id = absint( $nav_id_array['next_lesson'] );
// Output HTML
if ( ( 0 < $previous_lesson_id ) || ( 0 < $next_lesson_id ) ) { ?>
	<nav id="post-entries" class="fix row">
        <?php if ( 0 < $previous_lesson_id ) { ?><div class="nav-prev fl small-12 medium-12 large-12 xlarge-6 xx-large-6 columns"><a href="<?php echo esc_url( get_permalink( $previous_lesson_id ) ); ?>" rel="prev" class="button"><span class="meta-nav"></span> <?php echo get_the_title( $previous_lesson_id ); ?></a></div><?php } ?>
        <?php if ( 0 < $next_lesson_id ) { ?><div class="nav-next fr small-12 medium-12 large-12 xlarge-6 xxlarge-6 columns"><a href="<?php echo esc_url( get_permalink( $next_lesson_id ) ); ?>" rel="prev" class="button"><span class="meta-nav"></span> <?php echo get_the_title( $next_lesson_id ); ?></a></div><?php } ?>
    </nav><!-- #post-entries -->
<?php } ?>