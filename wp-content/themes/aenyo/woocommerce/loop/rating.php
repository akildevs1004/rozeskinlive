<?php
/**
 * Loop Rating
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/loop/rating.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woocommerce.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     3.6.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
global $product;
$aenyo_settings = aenyo_global_settings();
if ( get_option( 'woocommerce_enable_review_rating' ) === 'no' ) {
	return;
}
$woo_show_rating = aenyo_get_config('woo-show-rating',true);
?>
<?php if($woo_show_rating ): ?>
	<?php if ( $rating_html = wc_get_rating_html( $product->get_average_rating() ) ) { ?>
		<div class="rating">
			<?php echo wc_get_rating_html( $product->get_average_rating() ); ?>
			<div class="review-count">
				<?php 
				$review_count =  $product->get_review_count();
				if($review_count > 1) {
				?>
					<?php echo esc_attr($review_count) .'<span>'. esc_html__(' reviews', 'aenyo').'</span>'; ?>
				<?php }else{ ?>
					<?php echo esc_attr($review_count) .'<span>'. esc_html__(' review', 'aenyo').'</span>'; ?>
				<?php } ?>
			</div>
		</div>
	<?php }else{ ?>
		<div class="rating none">
			<div class="star-rating none"></div>
			<div class="review-count">
				0 <?php echo esc_html__("review","aenyo"); ?>
			</div>
		</div>
	<?php } ?>
<?php endif; ?>