<?php
/**
 * Single Product Up-Sells
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/up-sells.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you (the theme developer).
 * will need to copy the new files to your theme to maintain compatibility. We try to do this.
 * as little as possible, but it does happen. When this occurs the version of the template file will.
 * be bumped and the readme will list any important changes.
 *
 * @see 	    http://docs.woothemes.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     3.0.0
 */
$show_product_upsell = aenyo_get_config('product-upsell',true);
$limit =  aenyo_get_config('product-upsell-count',5);
if( $show_product_upsell ):	
	if ( ! defined( 'ABSPATH' ) ) {
		exit; // Exit if accessed directly
	}
	global $product;
	if ( $upsells ) : ?>
		<div class="upsells">
			<div class="title-block"><h2><?php echo esc_html__( 'You may also like&hellip;', 'aenyo' ); ?></h2></div>
			<div class="content-product-list">
				<div class="products-list grid slick-carousel" data-columns4="1" data-columns3="2" data-columns2="2" data-columns1="<?php echo esc_attr((int)aenyo_get_config( 'product-upsell-cols',3 )); ?>" data-columns="<?php echo esc_attr((int)aenyo_get_config( 'product-upsell-cols',3 )); ?>">
					<?php foreach ( $upsells as $key => $upsell ) : ?>
						<?php
						if( ($key+1) <= $limit){
							$post_object = get_post( $upsell->get_id() );
							setup_postdata( $GLOBALS['post'] =& $post_object );
							wc_get_template_part( 'content-grid', 'product' );
						}
						?>
					<?php endforeach; ?>
				</div>
			</div>	
		</div>
	<?php endif;
	wp_reset_postdata();
endif;