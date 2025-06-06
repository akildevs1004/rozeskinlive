<?php
/**
 * The template for displaying product content in the single-product.php template
 *
 * Override this template by copying it to yourtheme/woocommerce/content-single-product.php
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */
global $product; 
?>
<div id="quickview-container-<?php the_ID(); ?>">
	<div class="quickview-container woocommerce">
		<div class="content-quickview">
			<a href="#" class="quickview-close" data-product_id="<?php echo the_ID(); ?>">
				<span class="close-wrap">
					<span class="close-line close-line1"></span>
					<span class="close-line close-line2"></span>
				</span>
			</a>
		</div>
		<?php
        global $product;
            /**
             * woocommerce_before_single_product hook
             *
             * @hooked woocommerce_show_messages - 10
             */
             do_action( 'woocommerce_before_single_product' );
        ?>
        <div itemscope itemtype="http://schema.org/Product" id="product-<?php echo the_ID(); ?>" <?php post_class("product single-product"); ?>>
			<div class="product_detail">
				<div class="row">
					<div class="img-quickview">							
						<div class="slider_img_productd">
							<!-- woocommerce_show_product_images -->
							<?php
								/**
								 * woocommerce_show_product_images hook
								 *
								 * @hooked woocommerce_show_product_sale_flash - 10
								 * @hooked woocommerce_show_product_images - 20
								 */
								wc_get_template( 'single-product/thumbnails-image/quickview.php' );
							?>
						</div>							
					</div>
					<div class="bwp-single-info">
						<div class="content_product_detail entry-summary">
							<!-- woocommerce_template_single_title - 5 -->
							<!-- woocommerce_template_single_rating - 1 -->
							<!-- woocommerce_template_single_price - 20 -->
							<!-- woocommerce_template_single_excerpt - 30 -->
							<!-- woocommerce_template_single_add_to_cart 40 -->
							<?php
								/**
								 * woocommerce_single_product_summary hook
								 *
								 * @hooked woocommerce_template_single_title - 5
								 * @hooked woocommerce_template_single_price - 10
								 * @hooked woocommerce_template_single_excerpt - 20
								 * @hooked woocommerce_template_single_add_to_cart - 30
								 * @hooked woocommerce_template_single_meta - 40
								 * @hooked woocommerce_template_single_sharing - 50
								 */
								 remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 20 );
								 remove_action( 'woocommerce_single_product_summary', 'aenyo_sigle_author_product', 40 );
								 remove_action( 'woocommerce_single_product_summary', 'aenyo_size_guide', 20 );
								 remove_action( 'woocommerce_single_product_summary', 'aenyo_get_brands', 5 );
								 remove_action( 'woocommerce_after_single_product', 'aenyo_prev_next_product', 0 );
								do_action( 'woocommerce_single_product_summary' );
							?>
						</div>
					</div>
				</div>
			</div><!-- .summary -->
		</div>
        <?php do_action( 'woocommerce_after_single_product' ); ?>
        <div class="clearfix"></div>
    </div>
</div>