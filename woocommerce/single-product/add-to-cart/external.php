<?php
/**
 * External product add to cart
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.1.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
?>
<div class="row">
<div class="small-12 medium-12 large-12 xlarge-12 xxlarge-12 columns">
<?php do_action( 'woocommerce_before_add_to_cart_button' ); ?>

<p class="cart">
	<a href="<?php echo esc_url( $product_url ); ?>" rel="nofollow" class="single_add_to_cart_button button alt"><?php echo $button_text; ?></a>
</p>

<?php do_action( 'woocommerce_after_add_to_cart_button' ); ?>
</div>
</div>