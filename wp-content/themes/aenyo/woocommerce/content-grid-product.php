<?php
global $product, $woocommerce_loop, $post;
$aenyo_settings = aenyo_global_settings();
if (!isset($layout_shop)) {
	$layout_shop = aenyo_get_config('layout_shop', '1');
}
if ($product->is_on_backorder(1)) {
	$stock = 'pre-order';
} else {
	$stock = ($product->is_in_stock()) ? 'in-stock' : 'out-stock';
}
$product = wc_get_product($product->get_id());
$attributes = $product->get_attributes();
if ($product->is_type('variable')) {
	$variations = $product->get_available_variations();
	$all_attrs = array();
	$arr_attrs = array();
	$count_attr = 0;
	$color_check = 0;
	$variation_check = 0;
	foreach ($variations as $variation) {
		$attr_variation = new WC_Product_Variation($variation['variation_id']);
		$attr = $attr_variation->get_variation_attributes();
		$attr_product = wc_get_product($variation['variation_id']);
		$is_in_stock = $attr_product->is_in_stock();
		if ($is_in_stock) {
			foreach ($attr as $attribute_name => $attribute_value) {
				if (!in_array($attribute_value, $arr_attrs)) {
					array_push($arr_attrs, $attribute_value);
				}
			}
		}
	}
	foreach ($attributes as $attribute) {
		$attribute_name = $attribute->get_name();
		$attribute_values = get_the_terms($product->get_id(), $attribute_name);
		if (function_exists("bwp_get_tax_attribute")) {
			$tax_attribute 	= bwp_get_tax_attribute($attribute['name']);
		}
		if (isset($tax_attribute->attribute_type) && $tax_attribute->attribute_type != "color") {
			$count_attr++;
		}
		if (isset($tax_attribute->attribute_type) && $tax_attribute->attribute_type == "color") {
			$color_check++;
		}
		if ($attribute_values && ! is_wp_error($attribute_values)) {
			foreach ($attribute_values as $attribute_value) {
				$term = get_term_by('id', $attribute_value->term_id, $attribute_name);
				array_push($all_attrs, $term->slug);
			}
		}
		$variation_check++;
	}
	$arr_diff = array_diff($all_attrs, $arr_attrs);
}
?>
<?php if ($layout_shop == '1') { ?>
	<?php
	remove_action('woocommerce_after_shop_loop_item_title', 'bwp_display_woocommerce_attribute', 20);
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
			add_action('woocommerce_after_shop_loop_item_title', 'bwp_display_woocommerce_attribute', 20);
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
			</div>
		</div>
	</div>
<?php } elseif ($layout_shop == '3') { ?>
	<?php
	remove_action('woocommerce_after_shop_loop_item_title', 'bwp_display_woocommerce_attribute', 20);
	remove_action('woocommerce_after_shop_loop_item', 'aenyo_add_loop_wishlist_link', 18);
	?>
	<div class="products-entry content-product3 clearfix product-wapper">
		<div class="products-thumb">
			<?php
			/**
			 * woocommerce_before_shop_loop_item_title hook
			 *
			 * @hooked woocommerce_show_product_loop_sale_flash - 10
			 * @hooked woocommerce_template_loop_product_thumbnail - 10
			 */
			do_action('woocommerce_before_shop_loop_item_title');
			add_action('woocommerce_after_shop_loop_item_title', 'bwp_display_woocommerce_attribute', 20);
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
				<?php
				if (isset($aenyo_settings['product-wishlist']) && $aenyo_settings['product-wishlist'] && class_exists('WPCleverWoosw')) {
					aenyo_add_loop_wishlist_link();
				}
				?>
				<h3 class="product-title"><a href="<?php esc_url(the_permalink()); ?>"><?php esc_html(the_title()); ?></a></h3>
				<?php do_action('woocommerce_after_shop_loop_item_title'); ?>
			</div>
		</div>
	</div>
<?php } elseif ($layout_shop == '2') { ?>
	<?php
	remove_action('woocommerce_after_shop_loop_item_title', 'bwp_display_woocommerce_attribute', 20);
	remove_action('woocommerce_after_shop_loop_item', 'aenyo_quickview', 35);
	?>
	<div class="products-entry content-product2 clearfix product-wapper">
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
			<div class="btn-quickview hidden-md hidden-sm hidden-xs">
				<?php aenyo_quickview(); ?>
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
				<h3 class="product-title"><a href="<?php esc_url(the_permalink()); ?>"><?php esc_html(the_title()); ?></a></h3>
				<?php do_action('woocommerce_after_shop_loop_item_title'); ?>
			</div>
			<div class="content-attribute">
				<?php bwp_display_woocommerce_attribute(); ?>
			</div>
		</div>
	</div>
<?php } elseif ($layout_shop == '4') { ?>
	<?php
	remove_action('woocommerce_after_shop_loop_item_title', 'bwp_display_woocommerce_attribute', 20);
	remove_action('woocommerce_after_shop_loop_item', 'aenyo_woocommerce_template_loop_add_to_cart', 10);
	?>
	<div class="products-entry content-product4 clearfix product-wapper">
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
			<div class="btn-atc">
				<?php aenyo_woocommerce_template_loop_add_to_cart(); ?>
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
				<h3 class="product-title"><a href="<?php esc_url(the_permalink()); ?>"><?php esc_html(the_title()); ?></a></h3>
				<?php do_action('woocommerce_after_shop_loop_item_title'); ?>
			</div>
			<div class="content-attribute">
				<?php bwp_display_woocommerce_attribute(); ?>
			</div>
		</div>
	</div>
<?php } elseif ($layout_shop == '5') {
	remove_action('woocommerce_after_shop_loop_item_title', 'bwp_display_woocommerce_attribute', 20);
?>
	<?php
	global $product, $woocommerce_loop, $post;
	$aenyo_settings = aenyo_global_settings();
	if (!isset($layout_shop)) {
		$layout_shop = aenyo_get_config('layout_shop', '1');
	}
	if ($product->is_on_backorder(1)) {
		$stock = 'pre-order';
	} else {
		$stock = ($product->is_in_stock()) ? 'in-stock' : 'out-stock';
	}
	$product = wc_get_product($product->get_id());
	$attributes = $product->get_attributes();
	if ($product->is_type('variable')) {
		$variations = $product->get_available_variations();
		$all_attrs = array();
		$arr_attrs = array();
		$count_attr = 0;
		$color_check = 0;
		$variation_check = 0;
		foreach ($variations as $variation) {
			$attr_variation = new WC_Product_Variation($variation['variation_id']);
			$attr = $attr_variation->get_variation_attributes();
			$attr_product = wc_get_product($variation['variation_id']);
			$is_in_stock = $attr_product->is_in_stock();
			if ($is_in_stock) {
				foreach ($attr as $attribute_name => $attribute_value) {
					if (!in_array($attribute_value, $arr_attrs)) {
						array_push($arr_attrs, $attribute_value);
					}
				}
			}
		}
		foreach ($attributes as $attribute) {
			$attribute_name = $attribute->get_name();
			$attribute_values = get_the_terms($product->get_id(), $attribute_name);
			if (function_exists("bwp_get_tax_attribute")) {
				$tax_attribute 	= bwp_get_tax_attribute($attribute['name']);
			}
			if (isset($tax_attribute->attribute_type) && $tax_attribute->attribute_type != "color") {
				$count_attr++;
			}
			if (isset($tax_attribute->attribute_type) && $tax_attribute->attribute_type == "color") {
				$color_check++;
			}
			if ($attribute_values && ! is_wp_error($attribute_values)) {
				foreach ($attribute_values as $attribute_value) {
					$term = get_term_by('id', $attribute_value->term_id, $attribute_name);
					array_push($all_attrs, $term->slug);
				}
			}
			$variation_check++;
		}
		$arr_diff = array_diff($all_attrs, $arr_attrs);
	}
	?>
	<?php if ($layout_shop == '1') { ?>
		<?php
		remove_action('woocommerce_after_shop_loop_item_title', 'bwp_display_woocommerce_attribute', 20);
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
				add_action('woocommerce_after_shop_loop_item_title', 'bwp_display_woocommerce_attribute', 20);
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
					<h3 class="product-title"><a href="<?php esc_url(the_permalink()); ?>"><?php esc_html(the_title()); ?></a></h3>
					<?php do_action('woocommerce_after_shop_loop_item_title'); ?>
				</div>
			</div>
		</div>
	<?php } elseif ($layout_shop == '3') { ?>
		<?php
		remove_action('woocommerce_after_shop_loop_item_title', 'bwp_display_woocommerce_attribute', 20);
		remove_action('woocommerce_after_shop_loop_item', 'aenyo_add_loop_wishlist_link', 18);
		?>
		<div class="products-entry content-product3 clearfix product-wapper">
			<div class="products-thumb">
				<?php
				/**
				 * woocommerce_before_shop_loop_item_title hook
				 *
				 * @hooked woocommerce_show_product_loop_sale_flash - 10
				 * @hooked woocommerce_template_loop_product_thumbnail - 10
				 */
				do_action('woocommerce_before_shop_loop_item_title');
				add_action('woocommerce_after_shop_loop_item_title', 'bwp_display_woocommerce_attribute', 20);
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
					<?php
					if (isset($aenyo_settings['product-wishlist']) && $aenyo_settings['product-wishlist'] && class_exists('WPCleverWoosw')) {
						aenyo_add_loop_wishlist_link();
					}
					?>
					<h3 class="product-title"><a href="<?php esc_url(the_permalink()); ?>"><?php esc_html(the_title()); ?></a></h3>
					<?php do_action('woocommerce_after_shop_loop_item_title'); ?>
				</div>
			</div>
		</div>
	<?php } elseif ($layout_shop == '2') { ?>
		<?php
		remove_action('woocommerce_after_shop_loop_item_title', 'bwp_display_woocommerce_attribute', 20);
		remove_action('woocommerce_after_shop_loop_item', 'aenyo_quickview', 35);
		?>
		<div class="products-entry content-product2 clearfix product-wapper">
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
				<div class="btn-quickview hidden-md hidden-sm hidden-xs">
					<?php aenyo_quickview(); ?>
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
					<h3 class="product-title"><a href="<?php esc_url(the_permalink()); ?>"><?php esc_html(the_title()); ?></a></h3>
					<?php do_action('woocommerce_after_shop_loop_item_title'); ?>
				</div>
				<div class="content-attribute">
					<?php bwp_display_woocommerce_attribute(); ?>
				</div>
			</div>
		</div>
	<?php } elseif ($layout_shop == '4') { ?>
		<?php
		remove_action('woocommerce_after_shop_loop_item_title', 'bwp_display_woocommerce_attribute', 20);
		remove_action('woocommerce_after_shop_loop_item', 'aenyo_woocommerce_template_loop_add_to_cart', 10);
		?>
		<div class="products-entry content-product4 clearfix product-wapper">
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
				<div class="btn-atc">
					<?php aenyo_woocommerce_template_loop_add_to_cart(); ?>
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
					<h3 class="product-title"><a href="<?php esc_url(the_permalink()); ?>"><?php esc_html(the_title()); ?></a></h3>
					<?php do_action('woocommerce_after_shop_loop_item_title'); ?>
				</div>
				<div class="content-attribute">
					<?php bwp_display_woocommerce_attribute(); ?>
				</div>
			</div>
		</div>
	<?php } elseif ($layout_shop == '5') {
		remove_action('woocommerce_after_shop_loop_item_title', 'bwp_display_woocommerce_attribute', 20);
	?>
		<div class="products-entry content-product5<?php if ($product->is_type('variable')) {  ?> quick-shop<?php } ?> clearfix product-wapper" data-product_id="<?php echo esc_attr($product->get_id()); ?>">
			<div class="products-thumb">
				<?php if ($product->is_type('variable')) {  ?>
					<?php
					//woocommerce_variable_add_to_cart();
					if ($attributes && $count_attr > 0) {
						echo '<div class="content-form-attribute"><div class="form-attribute"><div class="content"><div class="title disabled" data-title="' . esc_html__('SELECT OPTIONS', 'aenyo') . '" data-title_atc="' . esc_html__('ADD TO CART', 'aenyo') . '"></div>';
						foreach ($attributes as $attribute) {
							if (function_exists("bwp_get_tax_attribute")) {
								$tax_attribute 	= bwp_get_tax_attribute($attribute['name']);
							}
							$attribute_name = $attribute->get_name();
							$attribute_values = get_the_terms($product->get_id(), $attribute_name);
							if (isset($tax_attribute->attribute_type) && $tax_attribute->attribute_type != "color" && $tax_attribute->attribute_type != "image") {
								echo '<ul class="attribute-card option-' . $attribute['position'] . '">';
								if ($attribute_values && ! is_wp_error($attribute_values)) {
									foreach ($attribute_values as $attribute_value) {
										$term = get_term_by('id', $attribute_value->term_id, $attribute_name);
										if ($term && $term->slug !== '' && $term->name !== '') {
											if (in_array($term->slug, $arr_diff)) {
												$disabled = 'default disabled';
											} else {
												$disabled = '';
											}
											echo '<li class="lablel list-attribute ' . esc_attr($disabled) . '" data-id_product="' . esc_attr($product->get_id()) . '" data-title="' . esc_attr($term->slug) . '"><span>' . esc_html($term->name) . '</span></li>';
										}
									}
								}
								echo '</ul>';
							}
						}
						echo '</div></div></div>';
					}
					?>
				<?php } ?>
				<?php do_action('woocommerce_before_shop_loop_item_title'); ?>
				<div class='product-button'>
					<?php if ($product->is_type('variable')) {  ?>
						<div class="form-variable variable-atc disabled" data-title="<?php echo esc_attr__('Select options', 'aenyo') ?>" data-title_atc="<?php echo esc_attr__('Add to cart', 'aenyo') ?>">
							<form class="cart" method="post" enctype="multipart/form-data" data-product_id="<?php echo esc_attr($product->get_id()); ?>">
								<button type="submit" class="single_add_to_cart_button button disabled"><span><?php echo esc_html__('Add to cart', 'aenyo') ?></span></button>
								<input type="hidden" name="add-to-cart" value="<?php echo esc_attr($product->get_id()); ?>">
								<input type="hidden" name="product_id" value="<?php echo esc_attr($product->get_id()); ?>">
								<?php
								foreach ($variations as $variation) {
									$attr_variation = new WC_Product_Variation($variation['variation_id']);
									$attr = $attr_variation->get_variation_attributes();
									$count = count($attr);
									$i = 1;
									$attr_product = wc_get_product($variation['variation_id']);
									$price = $attr_product->get_price_html();
									$is_in_stock = $attr_product->is_in_stock();
									if ($is_in_stock) { ?>
										<input type="hidden" data-attributes="<?php foreach ($attr as $attribute_name => $attribute_value) {
																					if ($i == $count) {
																						echo esc_attr($attribute_value);
																					} else {
																						echo esc_attr($attribute_value . ',');
																					}
																					$i++;
																				} ?>" data-price="<?php echo esc_attr($price); ?>" name="variation_id" class="variation_id" value="<?php echo esc_attr($variation['variation_id']); ?>">
								<?php }
								} ?>
							</form>
						</div>
					<?php } ?>
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
					<h3 class="product-title"><a href="<?php esc_url(the_permalink()); ?>"><?php esc_html(the_title()); ?></a></h3>
					<?php do_action('woocommerce_after_shop_loop_item_title'); ?>
					<?php if ($product->is_type('variable')) {  ?>
					<?php if ($attributes) {
							echo '<div class="content-form-attribute-color">';
							foreach ($attributes as $attribute) {
								if (function_exists("bwp_get_tax_attribute")) {
									$tax_attribute 	= bwp_get_tax_attribute($attribute['name']);
								}
								$attribute_name = $attribute->get_name();
								$attribute_values = get_the_terms($product->get_id(), $attribute_name);
								if (isset($tax_attribute->attribute_type) && ($tax_attribute->attribute_type == "color" || $tax_attribute->attribute_type == "image")) {
									echo '<ul class="attribute-card color option-' . $attribute['position'] . '">';
									if ($attribute_values && ! is_wp_error($attribute_values)) {
										foreach ($attribute_values as $attribute_value) {
											$term = get_term_by('id', $attribute_value->term_id, $attribute_name);
											if ($term && $term->slug !== '' && $term->name !== '') {
												$color = get_term_meta($term->term_id, 'color', true);
												$images_attributes = get_term_meta($term->term_id, 'image', true);
												$image_attribute = wp_get_attachment_image_src($images_attributes);
												if ($tax_attribute->attribute_type == "color") {
													$style = 'background-color:' . esc_attr($color) . ';';
												} elseif ($tax_attribute->attribute_type == "image") {
													$style = 'background-image:url(' . esc_attr($image_attribute[0]) . ');';
												}
												$name_attr = $attribute['name'];
												if (in_array($term->slug, $arr_diff)) {
													$disabled = 'default disabled';
												} else {
													$disabled = '';
												}
												foreach ($variations as $variation) {
													if ($variation['attributes']['attribute_' . $name_attr . ''] == $term->slug) {
														$image = wp_get_attachment_image_src($variation['image_id'], 'woocommerce_thumbnail');
													}
												}
												echo '<li class="color list-attribute ' . esc_attr($disabled) . '" data-id_product="' . esc_attr($product->get_id()) . '" data-title="' . esc_html($term->slug) . '" data-image="' . esc_attr($image[0]) . '"><span style="' . $style . '">' . esc_html($term->name) . '</span></li>';
											}
										}
									}
									echo '</ul>';
								}
							}
							echo '</div>';
						}
					} ?>
					<div class="button-atc-mobile hidden-lg">
						<?php if ($product->is_type('variable')) {  ?>
							<?php if ($color_check != $variation_check) {  ?>
								<div class="gruop-btn-mobile">
									<div class="select-option-mobile <?php if ($color_check > 0) { ?>disabled<?php } ?>"><?php echo esc_html__('Select options', 'aenyo') ?></div>
									<div class="form-variable variable-atc disabled" data-title="<?php echo esc_attr('Select options', 'aenyo') ?>" data-title_atc="<?php echo esc_attr('Add to cart', 'aenyo') ?>">
										<form class="cart" method="post" enctype="multipart/form-data" data-product_id="<?php echo esc_attr($product->get_id()); ?>">
											<button type="submit" class="single_add_to_cart_button button disabled"><span><?php echo esc_html__('Add to cart', 'aenyo') ?></span></button>
											<input type="hidden" name="add-to-cart" value="<?php echo esc_attr($product->get_id()); ?>">
											<input type="hidden" name="product_id" value="<?php echo esc_attr($product->get_id()); ?>">
											<?php
											foreach ($variations as $variation) {
												$attr_variation = new WC_Product_Variation($variation['variation_id']);
												$attr = $attr_variation->get_variation_attributes();
												$count = count($attr);
												$i = 1;
												$attr_product = wc_get_product($variation['variation_id']);
												$price = $attr_product->get_price_html();
												$is_in_stock = $attr_product->is_in_stock();
												if ($is_in_stock) { ?>
													<input type="hidden" data-attributes="<?php foreach ($attr as $attribute_name => $attribute_value) {
																								if ($i == $count) {
																									echo esc_attr($attribute_value);
																								} else {
																									echo esc_attr($attribute_value . ',');
																								}
																								$i++;
																							} ?>" data-price="<?php echo esc_attr($price); ?>" name="variation_id" class="variation_id" value="<?php echo esc_attr($variation['variation_id']); ?>">
											<?php }
											} ?>
										</form>
									</div>
								</div>
							<?php } else { ?>
								<div class="form-variable variable-atc disabled" data-title="<?php echo esc_attr__('Select options', 'aenyo') ?>" data-title_atc="<?php echo esc_attr__('Add to cart', 'aenyo') ?>">
									<form class="cart" method="post" enctype="multipart/form-data" data-product_id="<?php echo esc_attr($product->get_id()); ?>">
										<button type="submit" class="single_add_to_cart_button button disabled"><span><?php echo esc_html__('Add to cart', 'aenyo') ?></span></button>
										<input type="hidden" name="add-to-cart" value="<?php echo esc_attr($product->get_id()); ?>">
										<input type="hidden" name="product_id" value="<?php echo esc_attr($product->get_id()); ?>">
										<?php
										foreach ($variations as $variation) {
											$attr_variation = new WC_Product_Variation($variation['variation_id']);
											$attr = $attr_variation->get_variation_attributes();
											$count = count($attr);
											$i = 1;
											$attr_product = wc_get_product($variation['variation_id']);
											$price = $attr_product->get_price_html();
											$is_in_stock = $attr_product->is_in_stock();
											if ($is_in_stock) { ?>
												<input type="hidden" data-attributes="<?php foreach ($attr as $attribute_name => $attribute_value) {
																							if ($i == $count) {
																								echo esc_attr($attribute_value);
																							} else {
																								echo esc_attr($attribute_value . ',');
																							}
																							$i++;
																						} ?>" data-price="<?php echo esc_attr($price); ?>" name="variation_id" class="variation_id" value="<?php echo esc_attr($variation['variation_id']); ?>">
										<?php }
										} ?>
									</form>
								</div>
							<?php } ?>
						<?php } else {
							aenyo_woocommerce_template_loop_add_to_cart();
						} ?>
					</div>
				</div>
			</div>
		</div>
	<?php } ?>
<?php } ?>