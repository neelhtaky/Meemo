<?php
/**
 * Product Loop Start
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.0.0
 */
?>

<script type="text/javascript">
	// initialize Isotope after all images have loaded
	var $container = $('#products').imagesLoaded( function() {
	  $container.isotope({
	    // options
	    itemSelector: '.product'
	  });
});
</script>
<div id="products">

