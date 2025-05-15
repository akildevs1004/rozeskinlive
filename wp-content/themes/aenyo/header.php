<?php

/**
 * Version:            1.0.0
 * Theme Name:         aenyo * Theme URI:          http://wpbingosite.com/themes/aenyo/
 * Author:             Wpbingo
 * Author URI:         http://wpbingosite.com/
 * License:            GNU General Public License v2 or later
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<?php
$header_style  = aenyo_config_header()->header_style;
$enable_sticky_header = aenyo_config_header()->enable_sticky_header;
$show_minicart = aenyo_config_header()->show_minicart;
$show_searchform = aenyo_config_header()->show_searchform;
$background_page = aenyo_config_header()->background_page;
$checkout_page_style = aenyo_config_header()->checkout_page_style;
?>
<!--<![endif]-->

<head>
	<!-- Meta Pixel Code -->
	<script>
		! function(f, b, e, v, n, t, s) {
			if (f.fbq) return;
			n = f.fbq = function() {
				n.callMethod ?
					n.callMethod.apply(n, arguments) : n.queue.push(arguments)
			};
			if (!f._fbq) f._fbq = n;
			n.push = n;
			n.loaded = !0;
			n.version = '2.0';
			n.queue = [];
			t = b.createElement(e);
			t.async = !0;
			t.src = v;
			s = b.getElementsByTagName(e)[0];
			s.parentNode.insertBefore(t, s)
		}(window, document, 'script',
			'https://connect.facebook.net/en_US/fbevents.js');
		fbq('init', '1210911723357528');
		fbq('track', 'PageView');
	</script>
	<noscript><img height="1" width="1" style="display:none"
			src="https://www.facebook.com/tr?id=1210911723357528&ev=PageView&noscript=1" /></noscript>
	<!-- End Meta Pixel Code -->

	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width">
	<link rel="profile" href="//gmpg.org/xfn/11">

	<link rel="icon" href="favicon.ico">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<?php wp_body_open(); ?>
	<?php aenyo_loading_overlay(); ?>

	<div id="cookieBanner" style="text-align:center;color:red">
		<p>Cookies are disabled or restricted. Please enable cookies for the best experience.</p>
		<button onclick="acceptCookies()">Enable Cookies</button>
	</div>

	<script>
		// Function to check if cookies are enabled
		function checkCookiesEnabled() {
			// Set a test cookie
			document.cookie = "test_cookie=enabled; path=/; samesite=strict";

			// Check if the cookie was set successfully
			if (document.cookie.includes("test_cookie=enabled")) {
				document.getElementById("cookieBanner").style.display = "none";
				document.getElementById("status").innerText = "✅ Cookies are enabled!";
				// Optionally delete the test cookie after checking
				document.cookie = "test_cookie=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/; samesite=strict";
			} else {
				document.getElementById("status").innerText = "❌ Cookies are disabled!";
				document.getElementById("cookieBanner").style.display = "block";
			}
		}

		// Function to handle user acceptance of cookies
		function acceptCookies() {
			alert(
				"Please enable cookies in your browser settings:\n\n1. Go to your browser's settings.\n2. Look for Privacy or Site Settings.\n3. Enable cookies.\n\nAfter enabling cookies, refresh this page."
			);
		}

		// Run the cookie check
		checkCookiesEnabled();
	</script>
	<div id='page' class="hfeed page-wrapper  <?php echo esc_attr($checkout_page_style); ?>" <?php if ($background_page) { ?>style="background-image: url('<?php echo esc_url($background_page); ?>');background-repeat:no-repeat;background-position:top center;" <?php } ?>>
		<?php if (isset($header_style) && $header_style) { ?>
			<?php get_template_part('templates/headers/header', $header_style); ?>
		<?php } else { ?>
			<div id='bwp-header' class="bwp-header bwp-header-default">
				<?php aenyo_menu_mobile(); ?>
				<div class="header-desktop">
					<div class="container">
						<div class='header-content' data-sticky_header="<?php echo esc_attr($enable_sticky_header); ?>">
							<div class="row">1111
								<?php if ($show_minicart || $show_searchform) { ?>
									<div class="col-xl-2 col-lg-2 col-md-6 col-sm-6 col-6 header-logo">
										<?php aenyo_header_logo(); ?>
									</div>
									<div class="col-xl-8 col-lg-8 col-md-12 col-12  wpbingo-menu-mobile">
										<?php aenyo_top_menu(); ?>
									</div>
									<div class="col-xl-2 col-lg-2 col-md-6 col-sm-6 col-6 margin-top-20">
										<!-- Begin menu -->
										<?php if ($show_minicart && class_exists('WooCommerce')) { ?>
											<div class="wpbingo-cart-top pull-right">
												<?php get_template_part('woocommerce/minicart-ajax'); ?>
											</div>
										<?php } ?>
										<!-- Begin Search -->
										<?php if ($show_searchform && class_exists('WooCommerce')) { ?>
											<div class="search-box pull-right">
												<div class="search-toggle"><i class="fa fa-search"></i></div>
												<div class="dropdown-search"><?php aenyo_search_form_product(); ?></div>
											</div>
										<?php } ?>
										<!-- End Search -->

									</div>
								<?php } else { ?>
									<div class="col-xl-2 col-lg-2 col-md-6 col-sm-6 col-8 header-logo">
										<?php aenyo_header_logo(); ?>
									</div>
									<div class="col-xl-10 col-lg-10 col-md-6 col-sm-6 col-4 wpbingo-menu-mobile text-right">
										<?php aenyo_top_menu(); ?>
									</div>
								<?php } ?>
							</div>
						</div>
					</div>
				</div>
			</div><!-- End header-wrapper -->
		<?php } ?>
		<div id="bwp-main" class="bwp-main">
			<?php aenyo_get_page_title(); ?>