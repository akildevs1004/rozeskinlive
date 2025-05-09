<?php
require_once(dirname(__FILE__) . '/wp-load.php'); // Adjust path if needed

if (! class_exists('WooCommerce')) {
    exit('WooCommerce not active');
}

$orders = wc_get_orders([
    'limit'   => 10,
    'orderby' => 'date',
    'order'   => 'DESC',
]);

foreach ($orders as $order) {
    echo '<h2>Order ID: #' . $order->get_id() . '</h2>';
    echo 'Date: ' . $order->get_date_created()->date('d M Y H:i') . '<br>';
    echo 'Status: ' . wc_get_order_status_name($order->get_status()) . '<br>';
    echo 'Order Total: <strong>' . wc_price($order->get_total()) . '</strong><br>';
    echo 'Payment Method: ' . $order->get_payment_method_title() . '<br>';
    echo 'Shipping Method: ' . $order->get_shipping_method() . '<br><br>';

    // ✅ Customer Details
    echo '<strong>Customer Info:</strong><br>';
    echo 'Name: ' . $order->get_billing_first_name() . ' ' . $order->get_billing_last_name() . '<br>';
    echo 'Email: ' . $order->get_billing_email() . '<br>';
    echo 'Phone: ' . $order->get_billing_phone() . '<br><br>';

    // Billing Info
    echo '<strong>Billing Info:</strong><br>';
    echo $order->get_billing_first_name() . ' ' . $order->get_billing_last_name() . '<br>';
    echo $order->get_billing_address_1() . '<br>';
    if ($order->get_billing_address_2()) echo $order->get_billing_address_2() . '<br>';
    echo $order->get_billing_city() . ', ' . $order->get_billing_state() . ' ' . $order->get_billing_postcode() . '<br>';
    echo $order->get_billing_country() . '<br>';
    echo 'Phone: ' . $order->get_billing_phone() . '<br>';
    echo 'Email: ' . $order->get_billing_email() . '<br><br>';

    // Shipping Info
    echo '<strong>Shipping Info:</strong><br>';
    echo $order->get_shipping_first_name() . ' ' . $order->get_shipping_last_name() . '<br>';
    echo $order->get_shipping_address_1() . '<br>';
    if ($order->get_shipping_address_2()) echo $order->get_shipping_address_2() . '<br>';
    echo $order->get_shipping_city() . ', ' . $order->get_shipping_state() . ' ' . $order->get_shipping_postcode() . '<br>';
    echo $order->get_shipping_country() . '<br><br>';



    // ✅ Products
    echo '<strong>Products:</strong><ul>';
    foreach ($order->get_items() as $item) {
        echo '<li>' . $item->get_name() . ' — Qty: ' . $item->get_quantity() . ', Total: ' . wc_price($item->get_total()) . '</li>';
    }
    echo '</ul><hr>';
}
