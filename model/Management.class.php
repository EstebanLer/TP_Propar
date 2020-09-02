<?php

require_once 'dbSingleton.class.php';
require_once 'Customers.class.php';
require_once 'Operation.class.php';
require_once 'Operation_type.class.php';
require_once 'Workers.class.php';

class Management
{

    public static function addOperationType(Operation_type $operation_type) {

        $dbi = dbSingleton::getInstance()->getConnection(); // Connexion à la base de données

        $req = $dbi->prepare("INSERT INTO operation_type (type, price) VALUES (:type, :price)");
        $req->execute(array(
            'type' => $operation_type->getType(),
            'price' => $operation_type->getPrice()
        ));
    }

    public static function createIdWorkers(Workers $workers) {

        $dbi = dbSingleton::getInstance()->getConnection(); // Connexion à la base de données

        // In fine rajouter la création d'un workers dans cette méthode et en paramètre on mettra les posts
        // $passwordHash = password_hash($password, PASSWORD_BCRYPT, array("cost" => 12)); ligne pour hash les passwords

        $req = $dbi->prepare("INSERT INTO workers (firstName, lastName, role, birthday, hiring_date, email, login, password) VALUES (:firstName, :lastName, :role, :birthday, :hiring_date, :email, :login, :password)");
        $req->execute(array(
            'firstName' => $workers->getFirstName(),
            'lastName' => $workers->getLastName(),
            'role' => $workers->getRole(),
            'birthday' => $workers->getBirthday()->format("Y-m-d"),
            'hiring_date' => $workers->getHiringDate()->format("Y-m-d"),
            'email' => $workers->getEmail(),
            'login' => $workers->getLogin(),
            'password' => $workers->getPassword()
        ));
    }

    public static function createCustomers(Customers $customers) {

        $dbi = dbSingleton::getInstance()->getConnection(); // Connexion à la base de données

        $req = $dbi->prepare("INSERT INTO customers (firstName, lastName, email, city, zipCode, street, number) VALUES (:firstName, :lastName, :email, :city, :zipCode, :street, :number)");
        $req->execute(array(
            'firstName' => $customers->getFirstName(),
            'lastName' => $customers->getLastName(),
            'email' => $customers->getEmail(),
            'city' => $customers->getCity(),
            'zipCode' => $customers->getZipCode(),
            'street' => $customers->getStreet(),
            'number' => $customers->getNumber()
        ));

    }

    public static function addOperation(Customers $customers, Operation_type $operationType, $description) {

        $dbi = dbSingleton::getInstance()->getConnection(); // Connexion à la base de données

        $currentDate = date('Y-m-d');


//        $response = $dbi->query("SELECT `id_customer` FROM `customers` WHERE lastName = '".$lastName."' AND firstname = '".$firstname."'"); // récupérer un id avec cette syntaxe
//        $donnee = $response->fetch(PDO::FETCH_ASSOC);


        /* On récupère l'ID du client passé en paramètre en bdd*/

        $id_select = $dbi->prepare("SELECT id_customer FROM customers WHERE lastName = :lastName AND firstName = :firstName");
        $id_select->execute(array(
           'lastName' => $customers->getLastName(),
           'firstName' => $customers->getFirstName()
        ));

        $id_customer = $id_select->fetch(PDO::FETCH_ASSOC);


        /* On récupère l'ID du type d'opération passé en paramètre en bdd*/

        $idType_select = $dbi->prepare("SELECT id_type FROM operation_type WHERE type = :type");
        $idType_select->execute(array(
            'type' => $operationType->getType()
        ));

        $id_operationType = $idType_select->fetch(PDO::FETCH_ASSOC);



        /* Ici, on créé un objet Operation avec les information récoltées en bdd et une description qu'on récupèrera du formulaire*/
        $operation = new Operation($id_customer, $id_operationType, $description);


        /* On insère l'opération en bdd*/
        $addOperationRequest = $dbi->prepare("INSERT INTO operations(description, creation_date, status, id_customer, id_type)
                                                        VALUES (:description, :creation_date, :status, :id_customer, :id_type)");

        $addOperationRequest->execute(array(
           'description' => iconv("UTF-8", "Windows-1252", $operation->getDescription()),
           'creation_date' => $currentDate,
           'status' => $operation->getStatus(),
            'id_customer' => $id_customer['id_customer'],
            'id_type' => $id_operationType['id_type']
        ));

    }

    public static function modifyRoleWorkers(Workers $workers, $newRole) {

        $dbi = dbSingleton::getInstance()->getConnection(); // Connexion à la base de données

        $id_select = $dbi->prepare("SELECT id_worker FROM workers WHERE lastName = :lastName AND firstName = :firstName");
        $id_select->execute(array(
            'lastName' => $workers->getLastName(),
            'firstName' => $workers->getFirstName()
        ));

        $id_worker = $id_select->fetch(PDO::FETCH_ASSOC);

        $modify = $dbi->prepare("UPDATE workers SET role = :role WHERE id_worker = :id_worker");
        $modify->execute(array(
            'role' => $newRole,
            'id_worker' => $id_worker['id_worker']
        ));

    }

}