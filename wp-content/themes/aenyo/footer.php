	</div><!-- #main -->
	<?php
	global $aenyo_page_id;
	$aenyo_settings = aenyo_global_settings();
	$footer_style = aenyo_get_config('footer_style', '');
	$footer_style = (get_post_meta($aenyo_page_id, 'page_footer_style', true)) ? get_post_meta($aenyo_page_id, 'page_footer_style', true) : $footer_style;
	$header_style = aenyo_get_config('header_style', '');
	$header_style  = (get_post_meta($aenyo_page_id, 'page_header_style', true)) ? get_post_meta($aenyo_page_id, 'page_header_style', true) : $header_style;
	?>
	<?php if ($footer_style && (get_post($footer_style)) && in_array('elementor/elementor.php', apply_filters('active_plugins', get_option('active_plugins')))) { ?>
		<?php $elementor_instance = Elementor\Plugin::instance(); ?>
		<footer id="bwp-footer" class="bwp-footer <?php echo esc_attr(get_post($footer_style)->post_name); ?>">
			<?php echo aenyo_render_footer($footer_style);	?>
		</footer>
	<?php } else {
		aenyo_copyright();
	} ?>
	</div><!-- #page -->
	<div class="search-overlay">
		<?php
		$aenyo_settings = aenyo_global_settings();
		$cart_layout = aenyo_get_config('cart-layout', 'dropdown');
		$cart_style = aenyo_get_config('cart-style', 'light');
		$show_minicart = (isset($aenyo_settings['show-minicart']) && $aenyo_settings['show-minicart']) ? ($aenyo_settings['show-minicart']) : true;
		$show_wishlist = (isset($aenyo_settings['show-wishlist']) && $aenyo_settings['show-wishlist']) ? ($aenyo_settings['show-wishlist']) : true;
		$sitelogo = (isset($aenyo_settings['sitelogo']['url']) && $aenyo_settings['sitelogo']['url']) ? $aenyo_settings['sitelogo']['url'] : "";
		?>
		<div class="close-search-overlay"></div>
		<div class="search-overlay--inner">
			<div class="container wrapper-search">
				<div class="close-search"></div>
				<div class="wpbingoLogo hidden-sm hidden-xs">
					<a href="<?php echo esc_url(home_url('/')); ?>">
						<img src="<?php echo esc_attr($sitelogo); ?>" alt="<?php bloginfo('name'); ?>" />
					</a>
				</div>
				<div class="form-search">
					<?php aenyo_search_form_product(); ?>
				</div>
				<?php if (($show_minicart || $show_wishlist || is_active_sidebar('top-link')) && class_exists('WooCommerce')) { ?>
					<div class="header-page-link hidden-sm hidden-xs">
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
				<?php } ?>
			</div>
		</div>
	</div>
	<div class="container-quickview">
		<div class="quickview-overlay"></div>
		<div class="bwp-quick-view"></div>
	</div>
	<?php
	$back_active = aenyo_get_config('back_active', true);
	if ($back_active): ?>
		<div class="back-top"></div>
	<?php endif; ?>
	<?php if ((isset($aenyo_settings['show-verify']) && $aenyo_settings['show-verify'])) : ?>
		<div class="js-verify-popup verify-popup">
			<div class="close-overlay"></div>
			<div class="content-verify">
				<div class="verify-info">
					<?php if ((isset($aenyo_settings['verify-title']) && $aenyo_settings['verify-title'])) : ?>
						<h2 class="title"><?php echo esc_html($aenyo_settings['verify-title']); ?></h2>
					<?php endif; ?>
					<?php if ((isset($aenyo_settings['verify-content']) && $aenyo_settings['verify-content'])) : ?>
						<div class="info"><?php echo esc_html($aenyo_settings['verify-content']); ?></div>
					<?php endif; ?>
					<?php if ((isset($aenyo_settings['verify-btn-allow']) && $aenyo_settings['verify-btn-allow']) || (isset($aenyo_settings['verify-btn-not-allow']) && $aenyo_settings['verify-btn-not-allow'])) : ?>
						<div class="group-button">
							<?php if ((isset($aenyo_settings['verify-btn-allow']) && $aenyo_settings['verify-btn-allow'])) : ?>
								<button class="button-allow"><?php echo esc_html($aenyo_settings['verify-btn-allow']); ?></button>
							<?php endif; ?>
							<?php if ((isset($aenyo_settings['verify-btn-not-allow']) && $aenyo_settings['verify-btn-not-allow'])) : ?>
								<button class="button-not-allow"><?php echo esc_html($aenyo_settings['verify-btn-not-allow']); ?></button>
							<?php endif; ?>
						</div>
					<?php endif; ?>
				</div>
				<?php if ((isset($aenyo_settings['verify-alert']) && $aenyo_settings['verify-alert'])) : ?>
					<div class="alert-verify hidden">
						<svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" width="1em" height="1em" x="0" y="0" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512" xml:space="preserve" class="">
							<g>
								<path d="M505.403 406.394 295.389 58.102c-8.274-13.721-23.367-22.245-39.39-22.245s-31.116 8.524-39.391 22.246L6.595 406.394c-8.551 14.182-8.804 31.95-.661 46.37 8.145 14.42 23.491 23.378 40.051 23.378h420.028c16.56 0 31.907-8.958 40.052-23.379 8.143-14.421 7.89-32.189-.662-46.369zm-28.364 29.978a12.684 12.684 0 0 1-11.026 6.436H45.985a12.68 12.68 0 0 1-11.025-6.435 12.683 12.683 0 0 1 .181-12.765L245.156 75.316A12.732 12.732 0 0 1 256 69.192c4.41 0 8.565 2.347 10.843 6.124l210.013 348.292a12.677 12.677 0 0 1 .183 12.764z" fill="#000000" data-original="#000000" class=""></path>
								<path d="M256.154 173.005c-12.68 0-22.576 6.804-22.576 18.866 0 36.802 4.329 89.686 4.329 126.489.001 9.587 8.352 13.607 18.248 13.607 7.422 0 17.937-4.02 17.937-13.607 0-36.802 4.329-89.686 4.329-126.489 0-12.061-10.205-18.866-22.267-18.866zM256.465 353.306c-13.607 0-23.814 10.824-23.814 23.814 0 12.68 10.206 23.814 23.814 23.814 12.68 0 23.505-11.134 23.505-23.814 0-12.99-10.826-23.814-23.505-23.814z" fill="#000000" data-original="#000000" class=""></path>
							</g>
						</svg><?php echo esc_html($aenyo_settings['verify-alert']); ?>
					</div>
				<?php endif; ?>
			</div>
		</div>
	<?php endif;  ?>
	<?php if ((isset($aenyo_settings['show-newsletter']) && $aenyo_settings['show-newsletter']) && is_active_sidebar('newsletter-popup-form') && function_exists('aenyo_popup_newsletter')) : ?>
		<?php aenyo_popup_newsletter(); ?>
	<?php endif;  ?>
	<?php
	$time_nofication = aenyo_get_config('time-nofication', true);
	if ($time_nofication): ?>
		<?php aenyo_time_nofication(); ?>
	<?php endif; ?>
	<?php
	$cart_layout = aenyo_get_config('cart-layout', 'dropdown');
	if ($cart_layout == 'dropdown'): ?>
		<div class="content-cart-popup">
		</div>
	<?php endif; ?>
	<div class="remove-mobile-menu"></div>
	<div class="content-mobile-menu hidden-lg">
		<?php if (get_theme_mod('header_login_moble', true)) { ?>
			<div class="content">
				<div class="login-header">
					<a href="<?php echo get_permalink(wc_get_page_id('myaccount')); ?>">
						<?php if (is_user_logged_in()) {
							echo esc_html__('My Account', 'aenyo');
						} else {
							echo esc_html__('Login or Register', 'aenyo');
						}
						?>
					</a>
				</div>
			</div>
		<?php } ?>
	</div>
	<div class="attribute-mobile-content quick-shop"></div>
	<?php
	$come_back_alert = aenyo_get_config('come_back_alert', 'hide');
	$come_back_text1 = aenyo_get_config('come_back_text1', "Don't forget this...");
	$come_back_text2 = aenyo_get_config('come_back_text2', 'Come back!');
	if ($come_back_alert == "show"): ?>
		<div class="come-back-alert hidden" data-content1="⚡ <?php echo esc_attr($come_back_text1); ?>" data-content2="📢 <?php echo esc_attr($come_back_text2); ?>"></div>
	<?php endif; ?>

	<script>
		document.querySelectorAll('.content-tab').forEach(tab => {
			const children = tab.children;
			if (children.length === 3) {
				children[1].style.display = 'none'; // 2nd child (index 1)
			}
		});
	</script>
	<?php wp_footer(); ?>
	</body>

	</html>