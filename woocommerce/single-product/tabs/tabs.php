<?php
/**
 * Single Product tabs
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.0.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * Filter tabs and allow third parties to add their own
 *
 * Each tab is an array containing title, callback and priority.
 * @see woocommerce_default_product_tabs()
 */
$tabs = apply_filters( 'woocommerce_product_tabs', array() );

if ( ! empty( $tabs ) ) : ?>
<div class="row">
	<div class="woocommerce-tabs small-12 medium-12 large-12 xlarge-12 xxlarge-12 columns">
		<dl class="tabs" data-tab>
			<?php foreach ( $tabs as $key => $tab ) : ?>
				<dd class="<?php echo $key ?>_tab tab-title">
					<a href="#tab-<?php echo $key ?>"><?php echo apply_filters( 'woocommerce_product_' . $key . '_tab_title', $tab['title'], $key ) ?></a>
				</dd>
			<?php endforeach; ?>
		</dl>
		<div class="tabs-content">
		<?php $tabcount = 0; ?>
			<?php foreach ( $tabs as $key => $tab ) : ?>
			<div class="entry-content content <?php if ($tabcount==0){echo'active';}?> " id="tab-<?php echo $key ?>">
				<?php call_user_func( $tab['callback'], $key, $tab ) ?>
			</div>
		<?php $tabcount++; ?>
		<?php endforeach; ?>
		</div>

<?php endif; ?>
