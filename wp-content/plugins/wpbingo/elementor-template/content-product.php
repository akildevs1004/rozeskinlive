<?php
if (! defined('ABSPATH')) exit; // Exit if accessed directly
global $product, $woocommerce_loop, $post;
$aenyo_settings = aenyo_global_settings();
if ($product->is_on_backorder(1)) {
	$stock = 'pre-order';
} else {
	$stock = ($product->is_in_stock()) ? 'in-stock' : 'out-stock';
}
add_action('woocommerce_after_shop_loop_item_title', 'bwp_display_woocommerce_attribute', 20);
add_action('woocommerce_after_shop_loop_item', 'aenyo_quickview', 35);
add_action('woocommerce_after_shop_loop_item', 'aenyo_add_loop_wishlist_link', 18);
?>
<div class="products-entry content-product1 clearfix product-wapper">
	<div class="products-thumb">
		<?php
		/**
		 * woocommerce_before_shop_loop_item_title hook
		 *
		 * @hooked woocommerce_show_product_loop_sale_flash - 10
		 * @hooked woocommerce_template_loop_product_thumbnail - 10
		 */
		do_action('woocommerce_before_shop_loop_item_title');
		?>
		<div class='product-button'>
			<?php do_action('woocommerce_after_shop_loop_item'); ?>
		</div>
		<?php if ($stock == "out-stock"): ?>
			<div class="product-stock">
				<span class="stock"><?php echo esc_html__('Out Of Stock', 'aenyo'); ?></span>
			</div>
		<?php elseif ($stock == "pre-order"): ?>
			<div class="product-stock pre-order">
				<span class="stock"><?php echo esc_html__('Pre Order', 'aenyo'); ?></span>
			</div>
		<?php endif; ?>
		<div class="product-button-mobile">
			<?php if (isset($aenyo_settings['product-wishlist']) && $aenyo_settings['product-wishlist'] && class_exists('WPCleverWoosw')) {
				aenyo_add_loop_wishlist_link();;
			} ?>
			<?php aenyo_quickview(); ?>
		</div>
	</div>
	<div class="products-content">
		<div class="contents">
			<h3 class="product-title"> <a href="<?php esc_url(the_permalink()); ?>"><?php esc_html(the_title()); ?></a></h3>
			<?php do_action('woocommerce_after_shop_loop_item_title'); ?>
			<br /><a class="button product_type_simple add_to_cart_button ajax_add_to_cart" style="background: var(--theme-color, #db7137);
    color: var(--white, #fff);
    padding: 6px;
    width: 50%;
    font-size: 16px;" href="<?php esc_url(the_permalink()); ?>">
				<span>View Product Details</span>



				<!-- <span><?php echo $product->id; ?></span> -->


			</a>
			<!-- <?php if ($product->id == 52117) {

					?>

				Delivered in 5 days
			<?php

					} ?> -->
			<!-- <br />
			<span style="color:black">*Cash On Delivery is Available</span> -->

		</div>
	</div>
</div>