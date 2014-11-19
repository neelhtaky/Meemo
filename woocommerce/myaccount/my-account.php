<?php
/**
 * My Account page
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

wc_print_notices(); ?>

<p class="myaccount_user">
	<?php
	printf(
		__( 'Hello <strong>%1$s</strong> (not %1$s? <a href="%2$s">Sign out</a>).', 'woocommerce' ) . ' ',
		$current_user->display_name,
		wp_logout_url( get_permalink( wc_get_page_id( 'myaccount' ) ) )
	);
	echo '</br>';
	printf( __( 'From your account dashboard you can view your registered courses, your messages, recent orders, manage your shipping and billing addresses and <a href="%s">edit your password and account details</a>.', 'woocommerce' ),
		wc_customer_edit_account_url()
	);
	?>
</p>
<div class="small-12 large-12 xlarge-6 columns">
<?php do_action( 'woocommerce_before_my_account' ); ?>

<?php wc_get_template( 'myaccount/my-downloads.php' ); ?>

<?php wc_get_template( 'myaccount/my-orders.php', array( 'order_count' => $order_count ) ); ?>

<?php wc_get_template( 'myaccount/my-address.php' ); ?>

<?php do_action( 'woocommerce_after_my_account' ); ?>
</div>
<div class="small-12 xlarge-6 columns">
<?php
/**
 * The Template for displaying the my course page data.
 *
 * Override this template by copying it to yourtheme/sensei/user/my-courses.php
 *
 * @author 		WooThemes
 * @package 	Sensei/Templates
 * @version     1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) exit;

global $woothemes_sensei, $post, $current_user, $wp_query;

// Get User Meta
get_currentuserinfo();

// Check if the user is logged in
if ( is_user_logged_in() ) {
	// Handle completion of a course
	do_action( 'sensei_complete_course' );
	?>
	<h2>My Courses</h2>
	<section id="main-course" class="course-container">
		<?php

		do_action( 'sensei_frontend_messages' );

		do_action( 'sensei_before_user_course_content', $current_user );

		echo $woothemes_sensei->course->load_user_courses_content( $current_user, true );

		do_action( 'sensei_after_user_course_content', $current_user );

		?>
	</section>
<?php } else {
	do_action( 'sensei_login_form' );
} // End If Statement ?>
</div>