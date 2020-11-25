<?php

/**
 * Order
 */
class Order
{
    /**
     * WP Order ID
     *
     * @var int|string
     */
    private $wpOrderId;
    /**
     * WC Order Total
     *
     * @var float
     */
    private $orderTotal;
    /**
     * Stripe Transaction ID
     *
     * @var int|string
     */
    private $transactionId;
    /**
     * Date Paid
     *
     * @var int
     */
    private $datePaid;
    /**
     * HS Deal ID
     *
     * @var string
     */
    private $hubspotDealId;
    /**
     * HS Deal Created Date
     *
     * @var string
     */
    private $hubspotDealCreated;

    public function __construct($wpOrderId, 
                                $orderTotal, 
                                $transactionId,
                                $datePaid,
                                $hubspotDealId,
                                $hubspotDealCreated)
    {
        $this->wpOrderId            = $wpOrderId;
        $this->orderTotal           = $orderTotal;
        $this->transactionId        = $transactionId;
        $this->datePaid             = $datePaid;
        $this->hubspotDealId        = $hubspotDealId;
        $this->hubspotDealCreated   = $hubspotDealCreated;
    }
}
