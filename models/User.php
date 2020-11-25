<?php

/**
 * User Model
 */
class User
{   
    /**
     * ID
     *
     * @var int|string
     */
    private $id;
    /**
     * First Name
     *
     * @var string
     */
    private $firstName;
    /**
     * Last Name
     *
     * @var string
     */
    private $lastName;
    /**
     * Email
     *
     * @var string
     */
    private $email;
    /**
     * Phone Number
     *
     * @var string
     */
    private $phone;

    public function __construct($id, $firstName, $lastName, $email, $phone)
    {
        $this->id           = $id;
        $this->firstName    = $firstName;
        $this->lastName     = $lastName;
        $this->email        = $email;
        $this->phone        = $phone;
    }
}