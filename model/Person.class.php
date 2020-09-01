<?php


 abstract class Person
{

    protected $lastName; // De type String
    protected $firstName; // De type String
    protected $email;  // De type String


     public function getLastName()
     {
         return $this->lastName;
     }


     public function setLastName(string $lastName)
     {
         $this->lastName = $lastName;
     }


     public function getFirstName()
     {
         return $this->firstName;
     }


     public function setFirstName(string $firstName)
     {
         $this->firstName = $firstName;
     }


     public function getEmail()
     {
         return $this->email;
     }


     public function setEmail(string $email)
     {
         $this->email = $email;
     }




}