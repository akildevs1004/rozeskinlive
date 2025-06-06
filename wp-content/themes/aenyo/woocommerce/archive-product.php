<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/archive-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 8.6.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
get_header();
do_action( 'woocommerce_before_main_content' );
$category_style  		= aenyo_get_config('category_style','sidebar');
$shop_layout  			= aenyo_get_config('shop-layout','boxed');
$current_category 		= get_queried_object();
$show_subcategories 	= aenyo_get_config('show-subcategories','show');
$sub_col_large 			= aenyo_get_config('sub_col_large',6);
$sub_col_medium 		= aenyo_get_config('sub_col_medium',4);
$sub_col_sm 			= aenyo_get_config('sub_col_sm',3);
$sub_col_xs 			= aenyo_get_config('sub_col_xs',1);
$id_category 			= (isset($current_category->term_id) && $current_category->term_id) ? $current_category->term_id : 0;
?>
<div class="<?php echo esc_attr($category_style); ?><?php if($category_style == 'only_categories'){ ?> filter_sideout<?php } ?>  shop-layout-<?php echo esc_attr($shop_layout); ?>">
	<div class="remove-sidebar"></div>
	<?php if( function_exists('is_shop') && is_shop() && !is_search() && $category_style == 'only_categories' && apply_filters( 'aenyo_custom_category', $html = '' ) ): ?>
	<div class="container">
		<div class="main-archive-product">
			<ul class="woocommerce-product-category row">
				<?php aenyo_woocommerce_output_product_categories(); ?>
			</ul>
		</div>
	</div>
	<?php else: ?>
		<div class="container">
			<div class="main-archive-product row">
				<?php wc_get_template_part( 'content', 'product-author' ); ?>
				<?php if(($category_style == 'sidebar' || $category_style == 'filter_drawer') && is_active_sidebar('sidebar-product')): ?>	
					<div class="bwp-sidebar sidebar-product <?php echo esc_attr(aenyo_get_class()->class_sidebar_left); ?>">
						<?php if( $category_style == 'sidebar' || $category_style == 'filter_drawer'): ?>
							<div class="button-filter-toggle hidden-lg hidden-md">
								<div class="filter-close">
								</div>
							</div>
						<?php endif; ?>
						<?php if ( ( class_exists('WCV_Vendors') && WCV_Vendors::is_vendor_page() ) || is_tax('dc_vendor_shop') ) { ?>
							<?php dynamic_sidebar( 'sidebar-vendor' ); ?>
						<?php }else{ ?>	
							<?php dynamic_sidebar( 'sidebar-product' ); ?>
						<?php } ?>
					</div>				
				<?php endif; ?>
				<div class="<?php echo esc_attr(aenyo_get_class()->class_product_content); ?>" >
					<?php if (!is_tax()){  do_action( 'woocommerce_archive_description' );}?>
					<?php if ( have_posts() ) : ?>
						<div class="bwp-top-bar top clearfix<?php if( !is_active_sidebar('sidebar-product') ){ ?> dropdown-left<?php } ?>">				
							<?php aenyo_category_top_bar(); ?>							
						</div>
						<?php if($category_style != 'sidebar' && $category_style != 'filter_drawer' && is_active_sidebar('filter-product')): ?>
							<div class="bwp-sidebar sidebar-product-filter full">
								<?php if($category_style == 'filter_ontop'): ?>
									<div class="button-filter-toggle hidden-lg hidden-md">
										<div class="filter-close">
										</div>
									</div>
								<?php endif; ?>
								<?php if($category_style == 'filter_sideout' || $category_style == 'only_categories'): ?>
									<div class="button-filter-toggle">
										<div class="filter-close">
											<?php echo esc_html__('Close','aenyo') ?>
										</div>
									</div>
								<?php endif; ?>
								<?php dynamic_sidebar( 'filter-product' ); ?>
							</div>
						<?php endif; ?>
						<div class="content-products-list">
							<?php woocommerce_product_loop_start(); ?>
								<?php while ( have_posts() ) : the_post(); ?>
									<?php wc_get_template_part( 'content', 'product' ); ?>
								<?php endwhile;  ?>
							<?php woocommerce_product_loop_end(); ?>
						</div>
						<div class="bwp-top-bar bottom clearfix">
							<?php do_action('woocommerce_after_shop_loop'); ?>
						</div>
					<?php else : ?>
						<?php wc_get_template( 'loop/no-products-found.php' ); ?>
					<?php endif; ?>
				</div>
			</div>
		</div>	
	<?php endif; ?>
</div>
<?php
do_action( 'woocommerce_after_main_content' );
get_footer( 'shop' );
?>
