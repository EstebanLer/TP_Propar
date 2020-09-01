<?php

require_once 'Person.class.php';

class Customers extends Person
{

    private $id_customer;
    private $zipCode;
    private $street;
    private $number;
    private $city;

    /**
     * Customers constructor.
     * @param $lastName
     * @param $firstName
     * @param $email
     * @param $zipCode
     * @param $street
     * @param $number
     * @param $city
     */
    public function __construct($lastName, $firstName, $email, $zipCode, $street, $number, $city)
    {
        $this->lastName = $lastName;
        $this->firstName = $firstName;
        $this->email = $email;
        $this->zipCode = $zipCode;
        $this->street = $street;
        $this->number = $number;
        $this->city = $city;
    }


}