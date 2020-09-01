<?php

require_once 'dbSingleton.class.php';
require_once 'Customers.class.php';
require_once 'Operation.class.php';
require_once 'Operation_type.class.php';
require_once 'Workers.class.php';

class Management
{

    public static function addOperationType($operation_type) {

        $dbi = dbSingleton::getInstance()->getConnection(); // Connexion à la base de données

        $req0 = $dbi->prepare("INSERT INTO operation_type (type, price) VALUES (:type, :price)");
        $req0->execute(array(
            'type' => $operation_type->getType(),
            'price' => $operation_type->getPrice()
        ));
    }

    public static function createIdWorkers(Workers $workers) {

        $dbi = dbSingleton::getInstance()->getConnection(); // Connexion à la base de données
        $req0 = $dbi->prepare("INSERT INTO workers (firstName, lastName, role, hiring_date, email, login, password) VALUES (:firstName, :lastName, :role, :hiring_date, :email, :login, :password)");
        $req0->execute(array(
            'firstName' => $workers->getFirstName(),
            'lastName' => $workers->getLastName(),
            'role' => $workers->getRole(),
            'hiring_date' => $workers->getHiringDate(),
            'email' => $workers->getEmail(),
            'login' => $workers->getLogin(),
            'password' => $workers->getPassword()
        ));
    }

}