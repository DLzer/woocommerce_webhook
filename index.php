<?php

require_once('models/Users.php');
require_once('models/Address.php');
require_once('models/Order.php');
require_once('models/Request.php');

function process_completed_order( $order_id )
{
    // Get WooCommerce Order
    $order = new WC_Order($order_id);

    // Shipping Address
    $shipping_address = new Address(
        $order->shipping_address_1,
        $order->shipping_address_2,
        $order->shipping_city,
        $order->shipping_state,
        $order->shipping_country,
        $order->shipping_postcode
    );

    // Billing Address
    $billing_address = new Address(
        $order->billing_address_1,
        $order->billing_address_2,
        $order->billing_city,
        $order->billing_state,
        $order->billing_country,
        $order->billing_postcode
    );

    // Order Data
    $orderData = new Order(
        $order->id,
        $order->get_meta('_order_total'),
        $order->get_meta('_transaction_id'),
        $order->get_meta('_date_paid'),
        $order->get_meta('hubwoo_ecomm_deal_id'),
        $order->get_meta('hubwoo_ecomm_deal_created')
    );

    // User data
    $uData = get_userdata( $order->get_user_id() );
    $user = new User(
        $order->get_user_id(),
        $uData->first_name,
        $uData->last_name,
        $uData->user_email,
        null
    );

    // Prepare and send request
    $request = new Request($user, $orderData, $shipping_address, $billing_address);
    $requestData = $this->request->getRequest();
    $response = $this->request->sendRequest('API_URL', true, $requestData, false);

    return ($response ? $response : false);

}

add_action( 'woocommerce_order_status_completed', 'process_completed_order', 10, 1);
