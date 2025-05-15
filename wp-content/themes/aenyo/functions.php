<?php
define('aenyo_version', '1.0');
if (!isset($content_width)) {
  $content_width = 1200;
}
require_once(get_template_directory() . '/inc/class-tgm-plugin-activation.php');
require_once(get_template_directory() . '/inc/plugin-requirement.php');
require_once(get_template_directory() . '/inc/megamenu/megamenu.php');
include_once(get_template_directory() . '/inc/megamenu/mega_menu_custom_walker.php');
require_once(get_template_directory() . '/inc/function.php');
require_once(get_template_directory() . '/inc/loader.php');
include_once(get_template_directory() . '/inc/menus.php');
include_once(get_template_directory() . '/inc/template-tags.php');
require_once(get_template_directory() . '/inc/woocommerce.php');
require_once(get_template_directory() . '/inc/admin/functions.php');
require_once(get_template_directory() . '/inc/admin/theme-options.php');
require_once(get_template_directory() . '/customizer/settings/custom-apply.php');
require_once(get_template_directory() . '/customizer/settings/customizer.php');
function aenyo_custom_css()
{
  global $aenyo_page_id;
  $aenyo_settings = aenyo_global_settings();
  if (!is_admin()) {
    wp_enqueue_style('aenyo-style-template', get_template_directory_uri() . '/css/template.css');
    ob_start();
    include(get_template_directory() . '/inc/custom-css.php');
    $content = ob_get_clean();
    $content = str_replace(array("\r\n", "\r"), "\n", $content);
    $csss = explode("\n", $content);
    $custom_css = array();
    foreach ($csss as $i => $css) {
      if (!empty($css)) $custom_css[] = trim($css);
    }
    wp_add_inline_style('aenyo-style-template', implode($custom_css));
  }
}
add_action('wp_enqueue_scripts', 'aenyo_custom_css');
function aenyo_custom_js()
{
  if (!is_admin()) {
    wp_enqueue_script('aenyo-script', get_template_directory_uri() . '/js/functions.js', array('jquery'), null, true);
    wp_localize_script(
      'aenyo-script',
      'aenyo_ajax',
      array(
        'ajaxurl' => admin_url('admin-ajax.php'),
        'redirecturl' => home_url(),
        'ajax_nonce' => wp_create_nonce('aenyo_ajax_nonce'),
      )
    );
    $custom_js = 'jQuery(function($){ "use strict"; $(document).on("click",".plus, .minus",function(){var t=$(this).closest(".quantity").find(".qty"),a=parseFloat(t.val()),n=parseFloat(t.attr("max")),s=parseFloat(t.attr("min")),e=t.attr("step");a&&""!==a&&"NaN"!==a||(a=0),(""===n||"NaN"===n)&&(n=""),(""===s||"NaN"===s)&&(s=0),("any"===e||""===e||void 0===e||"NaN"===parseFloat(e))&&(e=1),$(this).is(".plus")?t.val(n&&(n==a||a>n)?n:a+parseFloat(e)):s&&(s==a||s>a)?t.val(s):a>0&&t.val(a-parseFloat(e)),t.trigger("change")})});';
    wp_add_inline_script('aenyo-script', $custom_js);
  }
}
add_action('wp_enqueue_scripts', 'aenyo_custom_js');

/**
 * change currency symbol to AED
 */

add_filter('woocommerce_currency_symbol', 'wc_change_uae_currency_symbol', 10, 2);

function wc_change_uae_currency_symbol($currency_symbol, $currency)
{
  switch ($currency) {
    case 'AED':
      $currency_symbol = 'AED';
      break;
  }

  return $currency_symbol;
}

add_filter('woocommerce_thankyou_order_received_text', 'woo_change_order_received_text', 20, 2);
function woo_change_order_received_text($thankyou_text, $order)
{

  $html_content = "<!-- Google tag (gtag.js) event -->
<script>
  gtag('event', 'purchase', {
    // <event_parameters>
  });
</script>";

  return sprintf($thankyou_text . $html_content);
}


add_action('woocommerce_single_product_summary', 'wc_custom_product_cash_on_delivery', 10);

function wc_custom_product_cash_on_delivery()
{
  echo '<div class="free-delivery-text" style="margin:auto;font-size:15px;">Cash on Delivery Is available for UAE Customers</div>';
}


// /**
//  * Change min password strength.
//  */
// function iconic_min_password_strength($strength)
// {
// 	return 2;
// }

// add_filter('woocommerce_min_password_strength', 'iconic_min_password_strength', 10, 1);

add_action('wp_print_scripts', 'DisableStrongPW', 100);

function DisableStrongPW()
{
  if (wp_script_is('user-profile', 'enqueued')) {
    wp_dequeue_script('user-profile');
  }
}

add_action('woocommerce_thankyou', 'call_third_party_api_on_new_order', 10, 1);

function call_third_party_api_on_new_order($order_id)
{
  $order = wc_get_order($order_id);

  $data = [
    'user_id'     => $order->get_user_id(),
    'username'    => $order->get_user() ? $order->get_user()->user_login : null,
    'email'       => $order->get_billing_email(), // can also use: $order->get_user()->user_email
    'order_id' => $order->get_id(),
    'order_date' => $order->get_date_created()->date('Y-m-d H:i:s'),
    'order_status' => $order->get_status(),
    'currency' => $order->get_currency(),
    'total' => $order->get_total(),
    'payment_method' => $order->get_payment_method(),
    'payment_method_title' => $order->get_payment_method_title(),
    'shipping_method' => $order->get_shipping_method(),

    'shipping_charges' => 0,
    'business_source_id' => 0,
    'delivery_service_id' => 0,
    'tracking_number' => 0,


    'customer' => [
      'first_name' => $order->get_billing_first_name(),
      'last_name' => $order->get_billing_last_name(),
      'email' => $order->get_billing_email(),
      'phone' => $order->get_billing_phone(),
      'whatsapp' => $order->get_billing_phone(),
    ],

    'billing_address' => [
      'address_1' => $order->get_billing_address_1(),
      'address_2' => $order->get_billing_address_2(),
      'city' => $order->get_billing_city(),
      'state' => $order->get_billing_state(),
      'postcode' => $order->get_billing_postcode(),
      'country' => $order->get_billing_country(),
    ],

    'shipping_address' => [
      'address_1' => $order->get_shipping_address_1(),
      'address_2' => $order->get_shipping_address_2(),
      'city' => $order->get_shipping_city(),
      'state' => $order->get_shipping_state(),
      'postcode' => $order->get_shipping_postcode(),
      'country' => $order->get_shipping_country(),
    ],

    'items' => [],
  ];

  foreach ($order->get_items() as $item) {
    $product = $item->get_product();
    $data['items'][] = [
      'item' => $item->get_name(),
      'quantity' => $item->get_quantity(),
      "rate" => $product->get_price(), // get product price
      'tax' => 0,
      'total' => $item->get_total(),
    ];
  }

  $api_url = 'https://backend.rozeskin.com/api/orders';
  $headers = [
    'Content-Type'  => 'application/json',

  ];

  $response = wp_remote_post($api_url, [
    'method'    => 'POST',
    'headers'   => $headers,
    'body'      => json_encode($data),
    'timeout'   => 10,
  ]);

  // Logging
  $log_entry = "[" . current_time('Y-m-d H:i:s') . "] Order ID: {$order_id}\n";
  $log_entry .= "Request:\n" . json_encode($data, JSON_PRETTY_PRINT) . "\n";

  if (is_wp_error($response)) {
    $log_entry .= "Response: ERROR - " . $response->get_error_message() . "\n";
  } else {
    $body = wp_remote_retrieve_body($response);
    $log_entry .= "Response: SUCCESS\n" . $body . "\n";
  }

  $log_entry .= str_repeat("-", 80) . "\n";

  // Write to log file

  $log_path = ABSPATH . '/logs/' .   $order->get_id() . '_' . date("d-m-Y") . '_api_orders.log';



  file_put_contents($log_path, $log_entry, FILE_APPEND);
}

add_action('woocommerce_checkout_before_terms_and_conditions', 'add_amazon_button_before_privacy_policy', 10);

function add_amazon_button_before_privacy_policy()
{
?>
  <style>
    .checkout .woocommerce-checkout-payment .payment_methods {
      margin-bottom: 0px !important;
      padding: 0px !important;

      ;
    }

    .amazon-button-wrap {
      margin-top: 0px !important;
      padding: 0px !important;

      /* margin-bottom: 15px !important;
			; */

    }


    .amazon-button-wrap a {
      display: inline-flex;
      align-items: center;
      gap: 10px;
      color: #111;
      padding: 5px 5px;
      border-radius: 5px;
      font-weight: bold;
      text-decoration: none;
      /* border: 1px solid #fcd200; */
      font-size: 16px;
    }

    .amazon-button-wrap img {
      width: 120px;
      height: auto;
      vertical-align: middle;
    }

    .woocommerce-terms-and-conditions-wrapper {
      border: 1px solid #d9d9d9;
      padding: 10px;

    }

    /* Mobile styles */
    @media (max-width: 767px) {
      .amazon-button-wrap a {
        font-size: 14px;
      }

      .amazon-button-wrap img {
        width: 120px;
      }

      .desktop-text {
        display: none;
      }

      .mobile-text {
        display: inline;
      }
    }

    /* Desktop styles */
    @media (min-width: 768px) {
      .desktop-text {
        display: inline;
      }

      .mobile-text {
        display: none;
      }
    }
  </style>


  <div class="wc_payment_methods payment_methods methods stripe-small amazon-button-wrap" style="text-align: center; width: 100%; margin: auto; ">
    <div style="border:1px solid black;margin:0px;height: 60px;">
      <a href="https://www.amazon.ae/s?me=AO3Y4MMO1OGGU&marketplaceID=A2VIGQ35RCS4UG"
        target="_blank" rel="noopener noreferrer">
        <!-- <span class="desktop-text">Buy from Amazon or Shop in Amazon</span> -->
        <span class="mobile-text1">Shop in Amazon</span>
        <img src="https://rozeskin.com/amazon.png?1=1" style="height:auto" alt="Buy on Amazon">
      </a>
    </div>
  </div>
  <div class="wc_payment_methods payment_methods methods stripe-small amazon-button-wrap" style="text-align: center; width: 100%; margin: auto; ">
    <div style="border:1px solid black;margin:0px;height: 60px;">
      <a href="https://www.noon.com/uae-en/roze/"
        target="_blank" rel="noopener noreferrer">
        <!-- <span class="desktop-text">Buy from Amazon or Shop in Amazon</span> -->
        <span class="mobile-text1">Shop on Noon</span>
        <img src="https://rozeskin.com/noon.png?1=1" style="height:auto" alt="Shop on Noon">
      </a>
    </div>
  </div>
  <?php
}

/*
 * Variation Dropdown to Radio Button Code by wpcookie
 * https://redpishi.com/wordpress-tutorials/dropdown-to-radio-button/
 */
add_action('woocommerce_variable_add_to_cart', function () {
  add_action('wp_print_footer_scripts', function () {
    $color = "#1c1c1c";
    $font_color = "#1c1c1c"; // unselected font color
    $selected_font_color = "#ffffff"; // for selected

  ?>
    <script type="text/javascript">
      // DOM Loaded
      document.addEventListener('DOMContentLoaded', function() {

        // Get Variation Pricing Data
        var variations_form = document.querySelector('form.variations_form');
        var data = variations_form.getAttribute('data-product_variations');
        data = JSON.parse(data);

        // Loop Drop Downs
        document.querySelectorAll('table.variations select')
          .forEach(function(select) {

            // Loop Drop Down Options
            select.querySelectorAll('option')
              .forEach(function(option) {

                // Skip Empty
                if (!option.value) {
                  return;
                }

                // Get Pricing For This Option
                var pricing = '';
                data.forEach(function(row) {
                  if (row.attributes[select.name] == option.value) {
                    pricing = row.price_html;
                  }
                });

                var span = document.createElement('span');

                // Create Radio
                var radio = document.createElement('input');
                radio.type = 'radio';
                radio.name = select.name;
                radio.value = option.value;
                radio.checked = option.selected;
                radio.setAttribute('id', option.value);
                var label = document.createElement('label');
                label.htmlFor = option.value;
                label.appendChild(document.createTextNode(' ' + option.text + ' '));

                span.appendChild(radio);
                span.appendChild(label);


                // Insert Radio
                select.closest('td').appendChild(span);

                // Handle Clicking
                radio.addEventListener('click', function(event) {
                  select.value = radio.value;
                  jQuery(select).trigger('change');
                });

              }); // End Drop Down Options Loop

            // Hide Drop Down
            select.style.display = 'none';

          }); // End Drop Downs Loop

      }); // End Document Loaded
    </script>
    <style>
      .single-product .product-type-variable .variations_form.cart table tr td label:after {
        content: "" !important;
      }



      html {
        --radio-color: <?= $color ?>;
        --radio-font-color-selected: #ffffff;
        /* Font color for selected */
        --radio-font-color-unselected: <?= $font_color ?>;
        /* Font color for unselected */
      }

      td.value {
        width: 100%;
        height: 100%;
        display: flex;
        justify-content: flex-start;
        align-items: center;
        gap: 10px;
      }


      td.value input[type="radio"] {
        appearance: none;
        display: none;
      }

      td.value label {
        width: 120px;
        float: left;
        font-size: 1em;
        display: flex;
        justify-content: center;
        align-items: center;
        background-color: inherit;
        text-align: center;
        border-radius: 5px;
        overflow: hidden;
        transition: linear 0.3s;
        /* color: var(--radio-color); */
        color: var(--radio-font-color-unselected);

        padding: 0.3em 0.6em;
        border: 2px solid var(--radio-color);
        cursor: pointer;
      }

      td.value input[type="radio"]:checked+label {
        background-color: var(--radio-color);



        transition: 0.3s;
        color: var(--radio-font-color-selected) !important;

      }

      a.reset_variations {
        display: none !important;
      }

      .type_attribute {
        margin-bottom: 10px !important;

        padding-bottom: 10px !important;

        border-bottom: 1px solid #e5e5e5;
      }
    </style>
<?php
  });
});

/**
 * Set a minimum order amount for checkout
 */
/*
add_action('woocommerce_checkout_process', 'wc_minimum_order_amount');
add_action('woocommerce_before_cart', 'wc_minimum_order_amount');

function wc_minimum_order_amount()
{
  // Set this variable to specify a minimum order value
  $minimum = 50;

  if (WC()->cart->total < $minimum) {

    if (is_cart()) {

      wc_print_notice(
        sprintf(
          'Your current order total is %s — you must have an order with a minimum of %s to place your order ',
          wc_price(WC()->cart->total),
          wc_price($minimum)
        ),
        'error'
      );
    } else {

      wc_add_notice(
        sprintf(
          'Your current order total is %s — you must have an order with a minimum of %s to place your order',
          wc_price(WC()->cart->total),
          wc_price($minimum)
        ),
        'error'
      );
    }
  }
}
  */
// add_filter('woocommerce_available_payment_gateways', 'hide_tabby_below_minimum');
// function hide_tabby_below_minimum($gateways)
// {
//   $minimum = 50; // AED
//   // if (is_admin()) return $gateways;

//   if (WC()->cart && WC()->cart->total < $minimum) {
//     unset($gateways['tabby_checkout']); // Adjust key to match your gateway ID
//   }

//   return $gateways;
// }


/**
 * Add UAE cities to WooCommerce
 */
/*
function add_uae_cities_to_woocommerce($states)
{
  $states['AE'] = array(
    'DXB' => 'Dubai',
    'AUH' => 'Abu Dhabi',
    'SHJ' => 'Sharjah',
    'AJM' => 'Ajman',
    'RAK' => 'Ras Al Khaimah',
    'FUJ' => 'Fujairah',
    'UAQ' => 'Umm Al Quwain',
    'ALN' => 'Al Ain',
  );
  return $states;
}
add_filter('woocommerce_states', 'add_uae_cities_to_woocommerce');


function enqueue_uae_cities_checkout_script()
{
  if (is_checkout()) {
    wp_enqueue_script(
      'uae-cities-checkout-blocks',
      get_template_directory_uri() . '/js/uae-cities-checkout-blocks.js', // Path to your JS file
      array('wp-hooks', 'wc-blocks-checkout'), // Dependencies
      //filemtime(get_template_directory() . '/js/uae-cities-checkout-blocks.js'),
      true
    );
  }
}
add_action('wp_enqueue_scripts', 'enqueue_uae_cities_checkout_script');
*/

// Limit country selection to only UAE
add_filter('woocommerce_countries_allowed_countries', 'custom_allowed_countries');

function custom_allowed_countries($countries)
{
  return array(
    'AE' => __('United Arab Emirates', 'woocommerce'),
  );
}

// Change city field to a dropdown for UAE
add_filter('woocommerce_checkout_fields', 'custom_uae_city_dropdown');

function custom_uae_city_dropdown($fields)
{
  // Since only UAE is allowed, we can directly replace the city field
  $uae_cities = array(
    ''               => __('Select a city', 'woocommerce'),
    'Dubai'          => 'Dubai',
    'Abu Dhabi'      => 'Abu Dhabi',
    'Sharjah'        => 'Sharjah',
    'Ajman'          => 'Ajman',
    'Ras Al Khaimah' => 'Ras Al Khaimah',
    'Fujairah'       => 'Fujairah',
    'Umm Al Quwain'  => 'Umm Al Quwain',
  );

  $city_field = array(
    'type'     => 'select',
    'label'    => __('City', 'woocommerce'),
    'required' => true,
    'class'    => array('form-row-wide') . " billing_city_dropdownlist",
    'style'    => "width:100%!important",

    'options'  => $uae_cities,
  );

  $fields['billing']['billing_city']  = $city_field;
  $fields['shipping']['shipping_city'] = $city_field;

  return $fields;
}

/*
add_filter('woocommerce_checkout_fields', 'custom_uae_city_dropdown');

function custom_uae_city_dropdown($fields)
{
  // Get selected billing country (fallback to default)
  $billing_country = isset($_POST['billing_country']) ? $_POST['billing_country'] : WC()->customer->get_billing_country();

  // Only apply for United Arab Emirates (AE)
  if ($billing_country === 'AE') {
    $uae_cities = array(
      ''               => __('Select a city', 'woocommerce'),
      'Dubai'          => 'Dubai',
      'Abu Dhabi'      => 'Abu Dhabi',
      'Sharjah'        => 'Sharjah',
      'Ajman'          => 'Ajman',
      'Ras Al Khaimah' => 'Ras Al Khaimah',
      'Fujairah'       => 'Fujairah',
      'Umm Al Quwain'  => 'Umm Al Quwain',
    );

    $fields['billing']['billing_city'] = array(
      'type'     => 'select',
      'label'    => __('City', 'woocommerce'),
      'required' => true,
      'class'    => array('form-row-wide'),
      'options'  => $uae_cities,
    );

    // Optional: also override shipping city
    $fields['shipping']['shipping_city'] = $fields['billing']['billing_city'];
  }

  return $fields;
}
  */
