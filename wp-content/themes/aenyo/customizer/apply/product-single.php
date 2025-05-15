<?php if( get_theme_mod('scroll_title_color', '') || get_theme_mod('scroll_title_size', '') || get_theme_mod('scroll_title_margin_top', '') || get_theme_mod('scroll_title_margin_right', '') || get_theme_mod('scroll_title_margin_bottom', '') || get_theme_mod('scroll_title_margin_left', '') ) { ?>
	.single-product .product_title {
		<?php if( get_theme_mod('scroll_title_color', '') ) { ?>color: <?php echo get_theme_mod('scroll_title_color', ''); ?>;<?php } ?>
		<?php if( get_theme_mod('scroll_title_size', '') ) { ?>font-size: <?php echo get_theme_mod('scroll_title_size', ''); ?>px;<?php } ?>
		<?php if( get_theme_mod('scroll_title_size', '') ) { ?>line-height: calc(<?php echo get_theme_mod('scroll_title_size', ''); ?>px + 8px);<?php } ?>
		<?php if( get_theme_mod('scroll_title_margin_top', '') ) { ?>margin-top: <?php echo get_theme_mod('scroll_title_margin_top', ''); ?>px;<?php } ?>
		<?php if( get_theme_mod('scroll_title_margin_right', '') ) { ?>margin-right: <?php echo get_theme_mod('scroll_title_margin_right', ''); ?>px;<?php } ?>
		<?php if( get_theme_mod('scroll_title_margin_bottom', '') ) { ?>margin-bottom: <?php echo get_theme_mod('scroll_title_margin_bottom', ''); ?>px;<?php } ?>
		<?php if( get_theme_mod('scroll_title_margin_left', '') ) { ?>margin-left: <?php echo get_theme_mod('scroll_title_margin_left', ''); ?>px;<?php } ?>
	}
<?php } ?>
<?php if( get_theme_mod('scroll_brand_margin_top', '') || get_theme_mod('scroll_brand_margin_right', '') || get_theme_mod('scroll_brand_margin_bottom', '') || get_theme_mod('scroll_brand_margin_left', '') ) { ?>
	.single-product .brands-single {
		<?php if( get_theme_mod('scroll_brand_margin_top', '') ) { ?>margin-top: <?php echo get_theme_mod('scroll_brand_margin_top', ''); ?>px;<?php } ?>
		<?php if( get_theme_mod('scroll_brand_margin_right', '') ) { ?>margin-right: <?php echo get_theme_mod('scroll_brand_margin_right', ''); ?>px;<?php } ?>
		<?php if( get_theme_mod('scroll_brand_margin_bottom', '') ) { ?>margin-bottom: <?php echo get_theme_mod('scroll_brand_margin_bottom', ''); ?>px;<?php } ?>
		<?php if( get_theme_mod('scroll_brand_margin_left', '') ) { ?>margin-left: <?php echo get_theme_mod('scroll_brand_margin_left', ''); ?>px;<?php } ?>
	}
<?php } ?>
<?php if( get_theme_mod('scroll_brand_color', '') || get_theme_mod('scroll_brand_size', '') ) { ?>
	.single-product .brands-single ul li a{
		<?php if( get_theme_mod('scroll_brand_color', '') ) { ?>color: <?php echo get_theme_mod('scroll_brand_color', ''); ?>;<?php } ?>
		<?php if( get_theme_mod('scroll_brand_size', '') ) { ?>font-size: <?php echo get_theme_mod('scroll_brand_size', ''); ?>px;<?php } ?>
		<?php if( get_theme_mod('scroll_brand_size', '') ) { ?>line-height: calc(<?php echo get_theme_mod('scroll_brand_size', ''); ?>px + 5px);<?php } ?>
	}
	<?php if( get_theme_mod('scroll_brand_size', '') ) { ?>
	.single-product .brands-single{
		font-size: calc(<?php echo get_theme_mod('scroll_brand_size', ''); ?>px - 5px);
		line-height: <?php echo get_theme_mod('scroll_brand_size', ''); ?>px;
	}
	<?php } ?>
<?php } ?>
<?php if( get_theme_mod('scroll_price_margin_top', '') || get_theme_mod('scroll_price_margin_right', '') || get_theme_mod('scroll_price_margin_bottom', '') || get_theme_mod('scroll_price_margin_left', '') ) { ?>
	.single-product .entry-summary .price-single {
		<?php if( get_theme_mod('scroll_price_margin_top', '') ) { ?>margin-top: <?php echo get_theme_mod('scroll_price_margin_top', ''); ?>px;<?php } ?>
		<?php if( get_theme_mod('scroll_price_margin_right', '') ) { ?>margin-right: <?php echo get_theme_mod('scroll_price_margin_right', ''); ?>px;<?php } ?>
		<?php if( get_theme_mod('scroll_price_margin_bottom', '') ) { ?>margin-bottom: <?php echo get_theme_mod('scroll_price_margin_bottom', ''); ?>px;<?php } ?>
		<?php if( get_theme_mod('scroll_price_margin_left', '') ) { ?>margin-left: <?php echo get_theme_mod('scroll_price_margin_left', ''); ?>px;<?php } ?>
	}
<?php } ?>
<?php if( get_theme_mod('scroll_price_color', '') || get_theme_mod('scroll_price_size', '') ) { ?>
	.single-product .entry-summary .price{
		<?php if( get_theme_mod('scroll_price_color', '') ) { ?>color: <?php echo get_theme_mod('scroll_price_color', ''); ?>;<?php } ?>
		<?php if( get_theme_mod('scroll_price_size', '') ) { ?>font-size: <?php echo get_theme_mod('scroll_price_size', ''); ?>px;<?php } ?>
		<?php if( get_theme_mod('scroll_price_size', '') ) { ?>line-height: calc(<?php echo get_theme_mod('scroll_price_size', ''); ?>px + 8px);<?php } ?>
	}
	<?php if( get_theme_mod('scroll_price_size', '') ) { ?>
	.single-product .entry-summary .price del{
		font-size: calc(<?php echo get_theme_mod('scroll_price_size', ''); ?>px - 5px);
		line-height: <?php echo get_theme_mod('scroll_price_size', ''); ?>px;
	}
	<?php } ?>
<?php } ?>
<?php if( get_theme_mod('scroll_countview_color', '') || get_theme_mod('scroll_countview_size', '') || get_theme_mod('scroll_countview_margin_top', '') || get_theme_mod('scroll_countview_margin_right', '') || get_theme_mod('scroll_countview_margin_bottom', '') || get_theme_mod('scroll_countview_margin_left', '') ) { ?>
	.single-product .product-count-view {
		<?php if( get_theme_mod('scroll_countview_color', '') ) { ?>color: <?php echo get_theme_mod('scroll_countview_color', ''); ?>;<?php } ?>
		<?php if( get_theme_mod('scroll_countview_size', '') ) { ?>font-size: <?php echo get_theme_mod('scroll_countview_size', ''); ?>px;<?php } ?>
		<?php if( get_theme_mod('scroll_countview_size', '') ) { ?>line-height: calc(<?php echo get_theme_mod('scroll_countview_size', ''); ?>px + 8px);<?php } ?>
		<?php if( get_theme_mod('scroll_countview_margin_top', '') ) { ?>margin-top: <?php echo get_theme_mod('scroll_countview_margin_top', ''); ?>px;<?php } ?>
		<?php if( get_theme_mod('scroll_countview_margin_right', '') ) { ?>margin-right: <?php echo get_theme_mod('scroll_countview_margin_right', ''); ?>px;<?php } ?>
		<?php if( get_theme_mod('scroll_countview_margin_bottom', '') ) { ?>margin-bottom: <?php echo get_theme_mod('scroll_countview_margin_bottom', ''); ?>px;<?php } ?>
		<?php if( get_theme_mod('scroll_countview_margin_left', '') ) { ?>margin-left: <?php echo get_theme_mod('scroll_countview_margin_left', ''); ?>px;<?php } ?>
	}
	<?php if( get_theme_mod('scroll_countview_size', '') ) { ?>
	.single-product .product-count-view i{
		font-size: calc(<?php echo get_theme_mod('scroll_countview_size', ''); ?>px - 10px);
	}
	<?php } ?>
<?php } ?>
<?php if( get_theme_mod('scroll_description_color', '') || get_theme_mod('scroll_description_size', '') || get_theme_mod('scroll_description_margin_top', '') || get_theme_mod('scroll_description_margin_right', '') || get_theme_mod('scroll_description_margin_bottom', '') || get_theme_mod('scroll_description_margin_left', '') ) { ?>
	.single-product .bwp-single-info .description {
		<?php if( get_theme_mod('scroll_description_color', '') ) { ?>color: <?php echo get_theme_mod('scroll_description_color', ''); ?>;<?php } ?>
		<?php if( get_theme_mod('scroll_description_size', '') ) { ?>font-size: <?php echo get_theme_mod('scroll_description_size', ''); ?>px;<?php } ?>
		<?php if( get_theme_mod('scroll_description_size', '') ) { ?>line-height: calc(<?php echo get_theme_mod('scroll_description_size', ''); ?>px + 8px);<?php } ?>
		<?php if( get_theme_mod('scroll_description_margin_top', '') ) { ?>margin-top: <?php echo get_theme_mod('scroll_description_margin_top', ''); ?>px;<?php } ?>
		<?php if( get_theme_mod('scroll_description_margin_right', '') ) { ?>margin-right: <?php echo get_theme_mod('scroll_description_margin_right', ''); ?>px;<?php } ?>
		<?php if( get_theme_mod('scroll_description_margin_bottom', '') ) { ?>margin-bottom: <?php echo get_theme_mod('scroll_description_margin_bottom', ''); ?>px;<?php } ?>
		<?php if( get_theme_mod('scroll_description_margin_left', '') ) { ?>margin-left: <?php echo get_theme_mod('scroll_description_margin_left', ''); ?>px;<?php } ?>
	}
<?php } ?>
<?php if( get_theme_mod('scroll_countdown_size', '') ) { ?>
	.single-product .countdown-single .product-countdown .countdown-content .countdown-text{
		font-size: calc(<?php echo get_theme_mod('scroll_countdown_size', ''); ?>px);
		line-height: calc(<?php echo get_theme_mod('scroll_countdown_size', ''); ?>px + 8px);
	}
<?php } ?>
<?php if( get_theme_mod('scroll_countdown_size_time', '') ) { ?>
	.single-product .countdown-single .product-countdown .countdown-content .countdown-amount{
		font-size: <?php echo get_theme_mod('scroll_countdown_size_time', ''); ?>px;
		line-height: calc(<?php echo get_theme_mod('scroll_countdown_size_time', ''); ?>px + 8px);
	}
<?php } ?>
<?php if( get_theme_mod('scroll_countdown_color', '') ) { ?>
	.single-product .countdown-single .product-countdown .countdown-content .countdown-text{
		color: <?php echo get_theme_mod('scroll_countdown_color', ''); ?>;
	}
	.single-product .countdown-single .product-countdown .countdown-content > span{
		border-color: <?php echo get_theme_mod('scroll_countdown_color', ''); ?>;
	}
<?php } ?>
<?php if( get_theme_mod('scroll_countdown_color_time', '') ) { ?>
	.single-product .countdown-single .product-countdown .countdown-content .countdown-amount{
		color: <?php echo get_theme_mod('scroll_countdown_color_time', ''); ?>;
	}
<?php } ?>
<?php if( get_theme_mod('scroll_countdown_margin_top', '') || get_theme_mod('scroll_countdown_margin_right', '') || get_theme_mod('scroll_countdown_margin_bottom', '') || get_theme_mod('scroll_countdown_margin_left', '') ) { ?>
	.single-product .countdown-single{
		<?php if( get_theme_mod('scroll_countdown_margin_top', '') ) { ?>margin-top: <?php echo get_theme_mod('scroll_countdown_margin_top', ''); ?>px;<?php } ?>
		<?php if( get_theme_mod('scroll_countdown_margin_right', '') ) { ?>margin-right: <?php echo get_theme_mod('scroll_countdown_margin_right', ''); ?>px;<?php } ?>
		<?php if( get_theme_mod('scroll_countdown_margin_bottom', '') ) { ?>margin-bottom: <?php echo get_theme_mod('scroll_countdown_margin_bottom', ''); ?>px;<?php } ?>
		<?php if( get_theme_mod('scroll_countdown_margin_left', '') ) { ?>margin-left: <?php echo get_theme_mod('scroll_countdown_margin_left', ''); ?>px;<?php } ?>
	}
<?php } ?>
<?php if( get_theme_mod('scroll_stock_size', '') || get_theme_mod('scroll_stock_margin_top', '') || get_theme_mod('scroll_stock_margin_right', '') || get_theme_mod('scroll_stock_margin_bottom', '') || get_theme_mod('scroll_stock_margin_left', '') ) { ?>	
	.single-product .bwp-single-info .percent_quantity_stock{
		<?php if( get_theme_mod('scroll_stock_size', '') ) { ?>font-size: <?php echo get_theme_mod('scroll_stock_size', ''); ?>px;<?php } ?>
		<?php if( get_theme_mod('scroll_stock_size', '') ) { ?>line-height: calc(<?php echo get_theme_mod('scroll_stock_size', ''); ?>px + 8px);<?php } ?>
		<?php if( get_theme_mod('scroll_stock_margin_top', '') ) { ?>margin-top: <?php echo get_theme_mod('scroll_stock_margin_top', ''); ?>px;<?php } ?>
		<?php if( get_theme_mod('scroll_stock_margin_right', '') ) { ?>margin-right: <?php echo get_theme_mod('scroll_stock_margin_right', ''); ?>px;<?php } ?>
		<?php if( get_theme_mod('scroll_stock_margin_bottom', '') ) { ?>margin-bottom: <?php echo get_theme_mod('scroll_stock_margin_bottom', ''); ?>px;<?php } ?>
		<?php if( get_theme_mod('scroll_stock_margin_left', '') ) { ?>margin-left: <?php echo get_theme_mod('scroll_stock_margin_left', ''); ?>px;<?php } ?>
	}
<?php } ?>
<?php if( get_theme_mod('scroll_stock_color', '') ) { ?>
	.single-product .bwp-single-info .percent_quantity_stock .quantity_stock{
		color: <?php echo get_theme_mod('scroll_stock_color', ''); ?>;
	}
<?php } ?>
<?php if( get_theme_mod('scroll_stock_stock_color', '') ) { ?>
	.single-product .bwp-single-info .percent_quantity_stock .quantity_stock span{
		color: <?php echo get_theme_mod('scroll_stock_stock_color', ''); ?>;
	}
	.single-product .bwp-single-info .percent_quantity_stock .percent .content{
		background: <?php echo get_theme_mod('scroll_stock_stock_color', ''); ?>;
	}
<?php } ?>
<?php if( get_theme_mod('scroll_atc_margin_top', '') || get_theme_mod('scroll_atc_margin_right', '') || get_theme_mod('scroll_atc_margin_bottom', '') || get_theme_mod('scroll_atc_margin_left', '') ) { ?>
	.single-product .bwp-single-info .cart{
		<?php if( get_theme_mod('scroll_atc_margin_top', '') ) { ?>margin-top: <?php echo get_theme_mod('scroll_atc_margin_top', ''); ?>px !important;<?php } ?>
		<?php if( get_theme_mod('scroll_atc_margin_right', '') ) { ?>margin-right: <?php echo get_theme_mod('scroll_atc_margin_right', ''); ?>px;<?php } ?>
		<?php if( get_theme_mod('scroll_atc_margin_bottom', '') ) { ?>margin-bottom: <?php echo get_theme_mod('scroll_atc_margin_bottom', ''); ?>px;<?php } ?>
		<?php if( get_theme_mod('scroll_atc_margin_left', '') ) { ?>margin-left: <?php echo get_theme_mod('scroll_atc_margin_left', ''); ?>px;<?php } ?>
	}
<?php } ?>
<?php if( get_theme_mod('scroll_atc_color', '') || get_theme_mod('scroll_atc_bg', '') ) { ?>
	.single-product .bwp-single-info .single_add_to_cart_button.button{
		<?php if( get_theme_mod('scroll_atc_color', '') ) { ?>color: <?php echo get_theme_mod('scroll_atc_color', ''); ?>;<?php } ?>
		<?php if( get_theme_mod('scroll_atc_bg', '') ) { ?>background: <?php echo get_theme_mod('scroll_atc_bg', ''); ?>;<?php } ?>
	}
<?php } ?>
<?php if( get_theme_mod('scroll_atc_buynow_color', '') || get_theme_mod('scroll_atc_buynow_bg', '') ) { ?>
	.single-product .bwp-single-info .button.quick-buy{
		<?php if( get_theme_mod('scroll_atc_buynow_color', '') ) { ?>color: <?php echo get_theme_mod('scroll_atc_buynow_color', ''); ?>;<?php } ?>
		<?php if( get_theme_mod('scroll_atc_buynow_bg', '') ) { ?>
			background: <?php echo get_theme_mod('scroll_atc_buynow_bg', ''); ?>;
			border-color: <?php echo get_theme_mod('scroll_atc_buynow_bg', ''); ?>;
		<?php } ?>
	}
<?php } ?>
<?php if( get_theme_mod('scroll_atc_size', '') ) { ?>	
	.single-product .bwp-single-info .button.quick-buy{
		font-size: <?php echo get_theme_mod('scroll_atc_size', ''); ?>px;
	}
	.single-product .bwp-single-info .single_add_to_cart_button.button{
		font-size: <?php echo get_theme_mod('scroll_atc_size', ''); ?>px;
	}
<?php } ?>
<?php if( get_theme_mod('scroll_atc_color_hover', '') || get_theme_mod('scroll_atc_bg_hover', '') ) { ?>
	.single-product .bwp-single-info .button.quick-buy:hover:not(.disabled){
		<?php if( get_theme_mod('scroll_atc_color_hover', '') ) { ?>color: <?php echo get_theme_mod('scroll_atc_color_hover', ''); ?>;<?php } ?>
		<?php if( get_theme_mod('scroll_atc_bg_hover', '') ) { ?>
			background: <?php echo get_theme_mod('scroll_atc_bg_hover', ''); ?>;
			border-color: <?php echo get_theme_mod('scroll_atc_bg_hover', ''); ?>;
		<?php } ?>
	}
	.single-product .bwp-single-info .single_add_to_cart_button.button:hover:not(.disabled){
		<?php if( get_theme_mod('scroll_atc_color_hover', '') ) { ?>color: <?php echo get_theme_mod('scroll_atc_color_hover', ''); ?>;<?php } ?>
		<?php if( get_theme_mod('scroll_atc_bg_hover', '') ) { ?>background: <?php echo get_theme_mod('scroll_atc_bg_hover', ''); ?>;<?php } ?>
	}
<?php } ?>
<?php if( get_theme_mod('scroll_imagecheckout_bg', '') || get_theme_mod('scroll_imagecheckout_margin_top', '') || get_theme_mod('scroll_imagecheckout_margin_right', '') || get_theme_mod('scroll_imagecheckout_margin_bottom', '') || get_theme_mod('scroll_imagecheckout_margin_left', '') ) { ?>
	.single-product .bwp-single-info .safe-checkout{
		<?php if( get_theme_mod('scroll_imagecheckout_bg', '') ) { ?>background: <?php echo get_theme_mod('scroll_imagecheckout_bg', ''); ?>;<?php } ?>
		<?php if( get_theme_mod('scroll_imagecheckout_margin_top', '') ) { ?>margin-top: <?php echo get_theme_mod('scroll_imagecheckout_margin_top', ''); ?>px;<?php } ?>
		<?php if( get_theme_mod('scroll_imagecheckout_margin_right', '') ) { ?>margin-right: <?php echo get_theme_mod('scroll_imagecheckout_margin_right', ''); ?>px;<?php } ?>
		<?php if( get_theme_mod('scroll_imagecheckout_margin_bottom', '') ) { ?>margin-bottom: <?php echo get_theme_mod('scroll_imagecheckout_margin_bottom', ''); ?>px;<?php } ?>
		<?php if( get_theme_mod('scroll_imagecheckout_margin_left', '') ) { ?>margin-left: <?php echo get_theme_mod('scroll_imagecheckout_margin_left', ''); ?>px;<?php } ?>
	}
<?php } ?>
<?php if( get_theme_mod('scroll_imagecheckout_color', '') || get_theme_mod('scroll_imagecheckout_size', '') || get_theme_mod('scroll_imagecheckout_width', '') ) { ?>
	.single-product .bwp-single-info .safe-checkout .title-safe-checkout{
		<?php if( get_theme_mod('scroll_imagecheckout_color', '') ) { ?>color: <?php echo get_theme_mod('scroll_imagecheckout_color', ''); ?>;<?php } ?>
		<?php if( get_theme_mod('scroll_imagecheckout_size', '') ) { ?>font-size: <?php echo get_theme_mod('scroll_imagecheckout_size', ''); ?>px;<?php } ?>
		<?php if( get_theme_mod('scroll_imagecheckout_size', '') ) { ?>line-height: calc(<?php echo get_theme_mod('scroll_imagecheckout_size', ''); ?>px + 8px);<?php } ?>
		<?php if( get_theme_mod('scroll_imagecheckout_width', '') ) { ?>max-width: <?php echo get_theme_mod('scroll_imagecheckout_width', ''); ?>px;<?php } ?>
	}
<?php } ?>
<?php if( get_theme_mod('scroll_delivers_color', '') || get_theme_mod('scroll_delivers_size', '') || get_theme_mod('scroll_delivers_margin_top', '') || get_theme_mod('scroll_delivers_margin_right', '') || get_theme_mod('scroll_delivers_margin_bottom', '') || get_theme_mod('scroll_delivers_margin_left', '') ) { ?>
	.single-product .bwp-single-info .product-shipping-delivers{
		<?php if( get_theme_mod('scroll_delivers_margin_top', '') ) { ?>margin-top: <?php echo get_theme_mod('scroll_delivers_margin_top', ''); ?>px;<?php } ?>
		<?php if( get_theme_mod('scroll_delivers_margin_right', '') ) { ?>margin-right: <?php echo get_theme_mod('scroll_delivers_margin_right', ''); ?>px;<?php } ?>
		<?php if( get_theme_mod('scroll_delivers_margin_bottom', '') ) { ?>margin-bottom: <?php echo get_theme_mod('scroll_delivers_margin_bottom', ''); ?>px;<?php } ?>
		<?php if( get_theme_mod('scroll_delivers_margin_left', '') ) { ?>margin-left: <?php echo get_theme_mod('scroll_delivers_margin_left', ''); ?>px;<?php } ?>
		<?php if( get_theme_mod('scroll_delivers_color', '') ) { ?>color: <?php echo get_theme_mod('scroll_delivers_color', ''); ?>;<?php } ?>
		<?php if( get_theme_mod('scroll_delivers_size', '') ) { ?>font-size: <?php echo get_theme_mod('scroll_delivers_size', ''); ?>px;<?php } ?>
		<?php if( get_theme_mod('scroll_delivers_size', '') ) { ?>line-height: calc(<?php echo get_theme_mod('scroll_delivers_size', ''); ?>px + 8px);<?php } ?>
		<?php if( get_theme_mod('scroll_delivers_color', '') ) { ?>color: <?php echo get_theme_mod('scroll_delivers_color', ''); ?>;<?php } ?>
	}
<?php } ?>
<?php if( get_theme_mod('scroll_delivers_color', '') ) { ?>
	.single-product .bwp-single-info .product-shipping-delivers a{
		color: <?php echo get_theme_mod('scroll_delivers_color', ''); ?>;
	}
	.single-product .bwp-single-info .product-shipping-delivers li > a:after{
		background: <?php echo get_theme_mod('scroll_delivers_color', ''); ?>;
	}
	.single-product .bwp-single-info .product-shipping-delivers svg path{
		fill: <?php echo get_theme_mod('scroll_delivers_color', ''); ?>;
	}
	.single-product .bwp-single-info .product-shipping-delivers svg{
		fill: <?php echo get_theme_mod('scroll_delivers_color', ''); ?>;
	}
<?php } ?>
<?php if( get_theme_mod('scroll_delivers_icon_color', '') ) { ?>
	.single-product .bwp-single-info .product-shipping-delivers li .content-info{
		background: <?php echo get_theme_mod('scroll_delivers_icon_color', ''); ?>;
	}
<?php } ?>
<?php if( get_theme_mod('scroll_delivers_icon_size', '') ) { ?>
	.single-product .bwp-single-info .product-shipping-delivers svg{
		<?php if( get_theme_mod('scroll_delivers_icon_size', '') ) { ?>font-size: <?php echo get_theme_mod('scroll_delivers_icon_size', ''); ?>px;<?php } ?>
	}
<?php } ?>
<?php if( get_theme_mod('scroll_infomation_color', '') ) { ?>
	.single-product .bwp-single-info .product_meta >span span{
		color: <?php echo get_theme_mod('scroll_infomation_color', ''); ?>;
	}
	.single-product .bwp-single-info .product_meta >span a{
		color: <?php echo get_theme_mod('scroll_infomation_color', ''); ?>;
	}
	.single-product .social-icon .social-share>a{
		color: <?php echo get_theme_mod('scroll_infomation_color', ''); ?>;
	}
<?php } ?>
<?php if( get_theme_mod('scroll_infomation_label_color', '') ) { ?>
	.single-product .bwp-single-info .product_meta >span{
		color: <?php echo get_theme_mod('scroll_infomation_label_color', ''); ?>;
	}
	.single-product .social-icon label{
		color: <?php echo get_theme_mod('scroll_infomation_label_color', ''); ?>;
	}
<?php } ?>
<?php if( get_theme_mod('scroll_infomation_size', '') ) { ?>
	.single-product .bwp-single-info .product_meta{
		font-size: <?php echo get_theme_mod('scroll_infomation_size', ''); ?>px;
		line-height: calc(<?php echo get_theme_mod('scroll_infomation_size', ''); ?>px + 8px);
	}
	.single-product .social-icon{
		font-size: <?php echo get_theme_mod('scroll_infomation_size', ''); ?>px;
		line-height: calc(<?php echo get_theme_mod('scroll_infomation_size', ''); ?>px + 8px);
	}
<?php } ?>