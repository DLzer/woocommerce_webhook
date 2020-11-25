<?php

/**
 * Address
 */
class Address
{
    /**
     * Address Line 1
     *
     * @var string
     */
    private $addressLineOne;
    /**
     * Address Line 2
     *
     * @var string
     */
    private $addressLineTwo;
    /**
     * City
     *
     * @var string
     */
    private $city;
    /**
     * State
     *
     * @var string
     */
    private $state;
    /**
     * Country
     *
     * @var string
     */
    private $country;
    /**
     * Post Code
     *
     * @var string
     */
    private $areaCode;

    public function __construct($addressLineOne, $addressLineTwo, $city, $state, $country, $areaCode)
    {
        $this->addressLineOne   = $addressLineTwo;
        $this->addressLinetwo   = $addressLineTwo;
        $this->city             = $city;
        $this->state            = $state;
        $this->country          = $country;
        $this->areaCode         = $areaCode;
    }
}