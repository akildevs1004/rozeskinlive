<?php
	remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_title', 0 );
	remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_price', 0 );
	remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_rating', 0 );
	remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 0 );
	remove_action( 'woocommerce_single_product_summary', 'aenyo_size_guide', 25 );
	remove_action( 'woocommerce_single_product_summary', 'aenyo_get_countdown', 20 );
	remove_action( 'woocommerce_single_product_summary', 'aenyo_get_brands', 0 );		
	$video_style = aenyo_get_config("video-style","inner");	
	?>
<div class="bwp-single-image col-lg-6 col-md-12 col-12">
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
<div class="col-lg-6 col-md-12 col-12 ">
	<div class="summary entry-summary entry-heading">
		<?php woocommerce_template_single_rating(); ?>
		<?php woocommerce_template_single_title(); ?>
		<?php aenyo_get_brands(); ?>
		<?php woocommerce_template_single_price(); ?>
	</div>
	<div class="bwp-single-info">
		<?php if($video_style == 'popup'){ aenyo_get_video_product(); } ?>
		<?php aenyo_view_product(); ?>
		<div class="summary entry-summary entry-cart">
			<?php woocommerce_template_single_add_to_cart(); ?>
			<?php aenyo_get_countdown(); ?>
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
</div>