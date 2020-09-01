<?php

require_once 'dbSingleton.class.php';
require_once 'Customers.class.php';
require_once 'Operation.class.php';
require_once 'Operation_type.class.php';
require_once 'Workers.class.php';

class Management
{

    public static function addOperationType($price, $type) {

        $dbi = dbSingleton::getInstance()->getConnection(); // Connexion à la base de données

        $operation_type = new Operation_type($price, $type);

        $req0 = $dbi->prepare("INSERT INTO operation_type (type, price) VALUES (:type, :price)");
        $req0->execute(array(
            'type' => $operation_type->getType(),
            'price' => $operation_type->getPrice()
        ));
    }

}