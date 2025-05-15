<?php
	remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_title', 0 );
	remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_price', 0 );
	remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_rating',0);
	remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 0 );
	remove_action( 'woocommerce_single_product_summary', 'aenyo_size_guide', 20 );
	remove_action( 'woocommerce_single_product_summary', 'aenyo_get_countdown', 0 );
	remove_action( 'woocommerce_single_product_summary', 'aenyo_count_view', 0 );
	remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 0 );
	remove_action( 'woocommerce_single_product_summary', 'aenyo_label_stock', 0 );
	remove_action( 'woocommerce_single_product_summary', 'aenyo_get_brands', 0 );
	?>
	<div class="bwp-single-image col-lg-12 col-md-12 col-12">
		<?php
			/**
			 * woocommerce_before_single_product_summary hooked
			 *
			 * @hooked woocommerce_show_product_sale_flash - 10
			 * @hooked woocommerce_show_product_images - 20
			 */
			do_action( 'woocommerce_before_single_product_summary' );
		?>
	</div>
	<div class="bwp-single-info col-lg-12 col-md-12 col-12">
		<div class="summary entry-summary entry-heading">
			<?php woocommerce_template_single_rating(); ?>
			<?php woocommerce_template_single_title(); ?>
			<?php aenyo_get_brands(); ?>
			<?php woocommerce_template_single_price(); ?>
			<?php aenyo_count_view(); ?>
			<?php woocommerce_template_single_excerpt(); ?>
			<?php aenyo_get_countdown(); ?>
			<?php aenyo_label_stock(); ?>
		</div>
		<div class="summary entry-summary entry-cart">
			<?php woocommerce_template_single_add_to_cart(); ?>
		</div>
		<div class="summary entry-summary entry-info">
		<?php
			/**
			 * woocommerce_single_product_summary hook
			 *
			 * @hooked woocommerce_template_single_title - 5
			 * @hooked woocommerce_template_single_rating - 10
			 * @hooked woocommerce_template_single_price - 10
			 * @hooked woocommerce_template_single_excerpt - 20
			 * @hooked woocommerce_template_single_add_to_cart - 30
			 * @hooked woocommerce_template_single_meta - 40
			 * @hooked woocommerce_template_single_sharing - 50
			 */
			do_action( 'woocommerce_single_product_summary' );
		?>
		</div><!-- .summary -->
	</div>