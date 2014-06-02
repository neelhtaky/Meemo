<?php
/**
 * Single Product Sale Flash
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

global $post, $product;
?>
<?php if ( $product->is_on_sale() ) : ?>

	<?php echo apply_filters( 'woocommerce_sale_flash', '<span class="onsale panel callout small-12 medium-12 large-12 xlarge-12 xxlarge-12 columns">' . __( 'Lucky for you: this product is on sale!', 'woocommerce' ) . '</span>', $post, $product ); ?>

<?php endif;

}
 ?>