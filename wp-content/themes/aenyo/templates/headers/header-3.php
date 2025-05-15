<?php
$aenyo_settings = aenyo_global_settings();
$cart_layout = aenyo_get_config('cart-layout', 'dropdown');
$cart_style = aenyo_get_config('cart-style', 'light');
$show_minicart = get_theme_mod('icon_cart_3', true);
$show_searchform = get_theme_mod('icon_search_3', true);
$show_wishlist = get_theme_mod('icon_wishlist_3', true);
$show_account = get_theme_mod('icon_account_3', true);
$sticky_header = (isset($aenyo_settings['enable-sticky-header']) && $aenyo_settings['enable-sticky-header']) ? ($aenyo_settings['enable-sticky-header']) : false;
if (get_theme_mod('topbar_order_3')) {
	$arr_topbar_order = explode("-", get_theme_mod('topbar_order_3', ''));
} else {
	$arr_topbar_order = explode("-", "topbar1-topbar3");
}
if (get_theme_mod('header_order_3')) {
	$header_order_3   = get_theme_mod('header_order_3', '');
	$arr_header_order = explode("-", get_theme_mod('header_order_3', ''));
} else {
	$header_order_3   = 'logo-menu-icons';
	$arr_header_order =  explode("-", "logo-menu-icons");
}
?>
<h43 class="bwp-title hide"><a href="<?php echo esc_url(home_url('/')); ?>" rel="home"><?php bloginfo('name'); ?></a></h43>
<header id='bwp-header' class="bwp-header header-v3 header-white header-absolute">
	<?php aenyo_campbar(); ?>
	<?php if (get_theme_mod('top_bar_3', true)) { ?>
		<div id="bwp-topbar" class="topbar-v1<?php if (!get_theme_mod('topbar_mobile', '')) { ?> hidden-sm hidden-xs<?php } ?>">
			<div class="topbar-inner">
				<div class="container">
					<div class="topbar-container">
						<?php foreach ($arr_topbar_order as $value) {
							switch ($value) {
								case 'topbar1': ?>
									<?php if (get_theme_mod('content_left_top_bar_3', 'Welcome to our store! Free shipping on orders £100 or more!')) { ?>
										<div class="topbar-left">
											<?php echo get_theme_mod('content_left_top_bar_3', 'Welcome to our store! Free shipping on orders £100 or more!'); ?>
										</div>
									<?php } ?>
								<?php break;
								case 'topbar2': ?>
									<?php if (get_theme_mod('content_center_top_bar_3', 'content topbar 3')) { ?>
										<div class="topbar-center">
											<?php echo get_theme_mod('content_center_top_bar_3', 'content topbar 3'); ?>
										</div>
									<?php } ?>
								<?php break;
								case 'topbar3': ?>
									<div class="topbar-right contact">
										<div class="phone hidden-xs"><a href="tel:<?php echo get_theme_mod('phone_topbar_3', '0987654321') ?>"><i class="icon-phone"></i><?php echo get_theme_mod('phone_topbar_3', '0987654321') ?></a></div>
										<div class="email"><a href="mailto:<?php echo get_theme_mod('email_topbar_3', 'support@aenyo.com') ?>"><i class="icon-email"></i><?php echo get_theme_mod('email_topbar_3', 'support@aenyo.com') ?></a></div>
									</div>
								<?php break;
								case 'social': ?>
									<?php if (get_theme_mod('social_3', '') && shortcode_exists("social_link")) { ?>
										<div class="social-link_topbar">
											<?php echo do_shortcode("[social_link]") ?>
										</div>
									<?php } ?>
								<?php break;
								default: ?>
							<?php } ?>
						<?php } ?>
					</div>
				</div>
			</div>
		</div>
	<?php } ?>
	<?php aenyo_menu_mobile(); ?>
	<div class="header-desktop">
		<div class='header-wrapper' data-sticky_header="<?php echo esc_attr($aenyo_settings['enable-sticky-header']); ?>">
			<div class="container">
				<div class="header-container <?php echo esc_attr($header_order_3) ?> <?php echo get_theme_mod('menu_pos_3', 'menu-right'); ?>">
					<?php foreach ($arr_header_order as $value) {
						switch ($value) {
							case 'logo': ?>
								<div class="header-logo <?php echo get_theme_mod('logo_pos_3', 'text-left'); ?>">
									<?php aenyo_header_logo(); ?>
								</div>
							<?php break;
							case 'menu': ?>
								<div class="header-menu <?php echo get_theme_mod('menu_pos_3', 'menu-right'); ?>">
									<div class="wpbingo-menu-mobile">
										<div class="header-menu-bg">
											<?php aenyo_top_menu(); ?>
										</div>
									</div>
								</div>
							<?php break;
							case 'icons': ?>
								<?php if (($show_account || $show_minicart || $show_wishlist || is_active_sidebar('top-link')) && class_exists('WooCommerce')) { ?>
									<div class="header-icon <?php echo get_theme_mod('icon_pos_3', 'text-right'); ?>">
										<div class="header-page-link <?php echo get_theme_mod('icon_pos_3', 'text-right'); ?>">
											<!-- Begin Search -->
											<?php if ($show_searchform) { ?>
												<div class="search-box search-dropdown">
													<div class="search-toggle"><i class="icon-search"></i></div>
												</div>
											<?php } ?>
											<!-- End Search -->
											<?php if ($show_account) { ?>
												<div class="login-header">
													<?php if (is_user_logged_in()) { ?>
														<?php if (is_active_sidebar('top-link')) { ?>
															<div class="block-top-link">
																<?php dynamic_sidebar('top-link'); ?>
															</div>
														<?php } ?>
													<?php } else { ?>
														<a class="active-login" href="#"><i class="icon-user"></i></a>
														<?php aenyo_login_form(); ?>
													<?php } ?>
												</div>
											<?php } ?>
											<?php if ($show_wishlist && class_exists('WPCleverWoosw')) { ?>
												<div class="wishlist-box">
													<a href="<?php echo WPcleverWoosw::get_url(); ?>">
														<i class="icon-wishlist"></i>
														<span class="count-wishlist"><?php echo WPcleverWoosw::get_count(); ?></span>
													</a>
												</div>
											<?php } ?>
											<?php if ($show_minicart && class_exists('WooCommerce')) { ?>
												<div class="remove-cart-shadow"></div>
												<div class="aenyo-topcart aenyo-topcart-desktop <?php echo esc_attr($cart_layout); ?> <?php echo esc_attr($cart_style); ?>">
													<?php get_template_part('woocommerce/minicart-ajax'); ?>
												</div>
											<?php } ?>
										</div>
									</div>
								<?php } ?>
							<?php break;
							default: ?>
						<?php } ?>
					<?php } ?>
				</div>
			</div>
		</div>
	</div>
</header><!-- End #bwp-header -->