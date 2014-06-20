<?php
/**
 * Single Product Sale Flash
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

global $post, $product; ?>
<div class="row">
	<div class="small-12 medium-12 large-12 xlarge-12 xxlarge-12 columns">
		<?php if ($product->is_on_sale() && $product->is_in_stock() ) {
			echo apply_filters( 'woocommerce_sale_flash', '<span class="onsale_single alert-box info row">' . __( 'Lucky for you: this product is on sale!', 'woocommerce' ) . '</span>', $post, $product );
		} else {}
 		?>
 	</div>
</div>