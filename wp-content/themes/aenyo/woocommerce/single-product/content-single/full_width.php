<?php
	remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_title', 0 );
	remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_price', 0 );
	remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_rating', 0 );
	remove_action( 'woocommerce_single_product_summary', 'aenyo_size_guide', 20 );
	remove_action( 'woocommerce_single_product_summary', 'aenyo_get_countdown', 0 );	
	remove_action( 'woocommerce_single_product_summary', 'aenyo_add_social', 0 );	
	remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40 );
	remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 0 );
	remove_action( 'woocommerce_single_product_summary', 'aenyo_get_brands', 0);
	$video_style = aenyo_get_config("video-style","inner");
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
		wc_get_template( 'single-product/thumbnails-image/full_width.php' );
	?>
	<?php aenyo_add_social(); ?>
</div>
<div class="bwp-single-content-info col-lg-12 col-md-12 col-12 ">
	<div class="bwp-single-info">
		<div class="summary entry-summary entry-heading">
			<?php woocommerce_template_single_rating(); ?>
			<?php woocommerce_template_single_title(); ?>
			<?php aenyo_get_brands(); ?>
			<?php woocommerce_template_single_price(); ?>
			<?php if($video_style == 'popup'){ aenyo_get_video_product(); } ?>
			<?php aenyo_view_product(); ?>
			<?php aenyo_get_countdown(); ?>
		</div>
		<div class="summary entry-summary entry-cart">
			<?php do_action( 'woocommerce_single_product_summary' ); ?>
		</div>
	</div>
</div>