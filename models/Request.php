<?php

/**
 * Request
 */
class Request
{
    /**
     * User
     *
     * @var User
     */
    private $user;
    /**
     * Order
     *
     * @var Order
     */
    private $order;
    /**
     * Shipping Address
     *
     * @var Address
     */
    private $shipping_address;
    /**
     * Billing Address
     *
     * @var Address
     */
    private $billing_address;
    /**
     * Default cURL options
     *
     * @var array
     */
    private $curl_opts;

    public function __construct($user, $order, $shipping_address, $billing_address)
    {
        $this->user = $user;
        $this->order = $order;
        $this->shipping_address = $shipping_address;
        $this->billing_address = $billing_address;
        $this->curl_opts = [
            CURLOPT_HEADER => 1,
            CURLOPT_TIMEOUT => 15,
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_SSL_VERIFYPEER => 0,
            CURLOPT_SSL_VERIFYHOST => 0,
            CURLOPT_USERAGENT => $this->_userAgents()
        ];
    }

    public function getRequest()
    {
        return json_endcode(array(
            'user' => $this->user,
            'order' => $this->order,
            'shipping_address' => $this->shipping_address,
            'billing_address' => $this->billing_address,
        ));
    }

    public function sendRequest($url = '', $post = false, $postfield = '', $follow_redirection = true)
    {
        $options = $this->_curlOptions();
        if ( $follow_redirection ) {
            $options[CURLOPT_FOLLOWLOCATION] = 1;
        }
        if ( $post && $postfield != '' ) {
            $options[CURLOPT_POST] = 1;
            $options[CURLOPT_POSTFIELDS] = $postfield;
        }
    
        $handle = curl_init($url);
        $ok = false;
        $data = "";
    
        if ( is_resource($handle) ) {
            if ( curl_setopt_array($handle, $options) != false ) {
                if ( ($data = curl_exec($handle)) != false ) {
                    $ok = true;
                }
            }
        }
        curl_close($handle);

        return ( $ok ? $data : false );
    }

}