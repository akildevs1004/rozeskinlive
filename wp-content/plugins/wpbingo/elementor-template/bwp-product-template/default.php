<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
global $post, $woocommerce, $product;
do_action( 'woocommerce_before_single_product' );
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_title', 5 );
remove_action( 'woocommerce_single_product_summary', 'aenyo_count_view', 15 );
remove_action( 'woocommerce_single_product_summary', 'aenyo_safe_checkout', 35 );
remove_action( 'woocommerce_single_product_summary', 'aenyo_shipping_delivers', 35 );
remove_action( 'woocommerce_single_product_summary', 'aenyo_add_social', 45 );
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40 );
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_rating', 10 );
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_price', 10 );
remove_action( 'woocommerce_after_add_to_cart_button', 'aenyo_add_loop_wishlist_link', 15 );
remove_action( 'woocommerce_after_add_to_cart_button', 'aenyo_product_quick_buy_button', 35 );
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_rating', 5 );
remove_action( 'woocommerce_single_product_summary', 'aenyo_get_countdown', 20 );
?>
<div id="product-<?php the_ID(); ?>" class="bwp-product-template <?php echo esc_html( $layout ); ?>">
	<div class="bg-banner single-product scroll">
		<?php  if($product_id && $product = wc_get_product( $product_id )):
			$symboy = get_woocommerce_currency_symbol( get_woocommerce_currency() );
		?>
		<div class="row">
			<div class="col-xl-8 col-lg-6 col-md-12 col-12 bwp-single-image">
				<div class="image woocommerce-product-gallery">
					<div class="row">
						<div class="col-md-12">
							<div class="list-product">
								<div class="scroll-image">
									<div class="image-additional slick-carousel" data-slidestoscroll="true" data-dots="<?php echo esc_attr($show_pag);?>"  data-nav="<?php echo esc_attr($show_nav);?>" data-columns4="<?php echo $columns4; ?>" data-columns3="<?php echo $columns3; ?>" data-columns2="<?php echo $columns2; ?>" data-columns1="<?php echo $columns1; ?>" data-columns1440="<?php echo $columns1440; ?>" data-columns="<?php echo $columns; ?>">
										<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $product_id ), 'full' );?>
										<?php
											$attachment_ids = $product->get_gallery_image_ids();
											if ( $attachment_ids ) {
												$loop 		= 0;
												foreach ( $attachment_ids as $attachment_id ) { ?>
													<div class="img-thumbnail">
													<?php $image_link = wp_get_attachment_url( $attachment_id );
													if ( ! $image_link )
														continue;
													$image_title 	= esc_attr( get_the_title( $attachment_id ) );
													$image_caption 	= esc_attr( get_post_field( 'post_excerpt', $attachment_id ) );
													$image       = wp_get_attachment_image( $attachment_id, apply_filters( 'single_product_small_thumbnail_size', 'shop_single' ), 0, $attr = array(
														'title' => $image_title,
														'alt'   => $image_title,
														) );
													$image_class = "image-scroll";
													echo apply_filters( 'woocommerce_single_product_image_thumbnail_html', sprintf( '<a href="%s" data-elementor-open-lightbox="default" data-elementor-lightbox-slideshow="image-additional"  data-image="%s" class="%s" title="%s">%s</a>', $image_link, $image_link, $image_class, $image_caption, $image ), $attachment_id, $post->ID, $image_class );
													?>
													</div>
													<?php $loop++;
												}							
											}
										?>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-xl-4 col-lg-6 col-md-12 col-sm-12 col-12 bwp-single-info">
				<div class="products-content product-type-variable">
					<div class="contents-detail">
						<?php aenyo_woocommerce_template_loop_category(); ?>
						<?php if( $title1) : ?>
							<h2 class="title-banner"><?php echo esc_html( $title1 ); ?></h2>
						<?php endif; ?>
						<h3 class="product_title"><a href="<?php echo get_permalink( $product_id );  ?>"><?php echo $product->get_title(); ?></a></h3>
						<?php woocommerce_template_single_price(); ?>
						<div class="product-description"><?php echo wp_trim_words( $product->get_short_description() ); ?></div>
						<?php if( $time_deal) : ?>
							<div class="countdown-circles">
								<div class="time-circles section"  
									data-bg_color="#dddddd"
									data-time_color="#222222"
									data-fg_width = "0"
									data-bg_width = "1"
									data-text_day = "<?php echo esc_html__("days","wpbingo"); ?>"
									data-text_hour = "<?php echo esc_html__("hours","wpbingo"); ?>"
									data-text_min = "<?php echo esc_html__("mins","wpbingo"); ?>"
									data-text_sec = "<?php echo esc_html__("secs","wpbingo"); ?>"
									data-date="<?php echo esc_attr($time_deal); ?>">
								</div>
							</div>
						<?php endif;?>
						<?php
							do_action( 'woocommerce_single_product_summary' );
						?>
					</div>
				</div>
			</div>
			</div>
		<?php endif ?>
	</div>
</div><!-- #product-<?php the_ID(); ?> -->
