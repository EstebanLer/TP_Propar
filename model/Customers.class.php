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
    public function __construct($firstName, $lastName, $email, $city, $zipCode, $street, $number)
    {
        $this->lastName = $lastName;
        $this->firstName = $firstName;
        $this->email = $email;
        $this->zipCode = $zipCode;
        $this->street = $street;
        $this->number = $number;
        $this->city = $city;
    }

    /**
     * @return mixed
     */
    public function getIdCustomer()
    {
        return $this->id_customer;
    }

    /**
     * @param mixed $id_customer
     */
    public function setIdCustomer($id_customer): void
    {
        $this->id_customer = $id_customer;
    }


    /**
     * @return mixed
     */
    public function getZipCode()
    {
        return $this->zipCode;
    }

    /**
     * @param mixed $zipCode
     */
    public function setZipCode($zipCode): void
    {
        $this->zipCode = $zipCode;
    }

    /**
     * @return mixed
     */
    public function getStreet()
    {
        return $this->street;
    }

    /**
     * @param mixed $street
     */
    public function setStreet($street): void
    {
        $this->street = $street;
    }

    /**
     * @return mixed
     */
    public function getNumber()
    {
        return $this->number;
    }

    /**
     * @param mixed $number
     */
    public function setNumber($number): void
    {
        $this->number = $number;
    }

    /**
     * @return mixed
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * @param mixed $city
     */
    public function setCity($city): void
    {
        $this->city = $city;
    }




}