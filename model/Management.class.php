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

    public static function createIdWorkers($firstName, $lastName, $role, $birthday, $email, $login, $password) {

        $dbi = dbSingleton::getInstance()->getConnection(); // Connexion à la base de données

        // In fine rajouter la création d'un workers dans cette méthode et en paramètre on mettra les posts
        // $passwordHash = password_hash($password, PASSWORD_BCRYPT, array("cost" => 12)); ligne pour hash les passwords

        $currentDate = date('Y-m-d');

        $workers = new Workers($firstName, $lastName, $email, $role, $login, $password,new DateTime("$birthday"), $currentDate, array());

        $req = $dbi->prepare("INSERT INTO workers (firstName, lastName, role, birthday, hiring_date, email, login, password) VALUES (:firstName, :lastName, :role, :birthday, :hiring_date, :email, :login, :password)");
        $req->execute(array(
            'firstName' => iconv("UTF-8", "Windows-1252",$workers->getFirstName()),
            'lastName' => iconv("UTF-8", "Windows-1252",$workers->getLastName()),
            'role' => iconv("UTF-8", "Windows-1252",$workers->getRole()),
            'birthday' => $workers->getBirthday()->format("Y-m-d"),
            'hiring_date' => $workers->getHiringDate(),
            'email' => iconv("UTF-8", "Windows-1252",$workers->getEmail()),
            'login' => iconv("UTF-8", "Windows-1252",$workers->getLogin()),
            'password' => iconv("UTF-8", "Windows-1252",$workers->getPassword())
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

    public static function addOperation(Customers $customers, $type, $description, $dateStart) {

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
            'type' => $type
        ));

        $id_operationType = $idType_select->fetch(PDO::FETCH_ASSOC);



        /* Ici, on créé un objet Operation avec les information récoltées en bdd et une description qu'on récupèrera du formulaire*/
        $operation = new Operation($id_customer, $id_operationType, $description);


        /* On insère l'opération en bdd*/
        $addOperationRequest = $dbi->prepare("INSERT INTO operations(description, creation_date, date_start, status, id_customer, id_type)
                                                        VALUES (:description, :creation_date, :date_start, :status, :id_customer, :id_type)");

        $addOperationRequest->execute(array(
           'description' => iconv("UTF-8", "Windows-1252", $operation->getDescription()),
           'creation_date' => $currentDate,
           'date_start' => $dateStart,
           'status' => $operation->getStatus(),
            'id_customer' => $id_customer['id_customer'],
            'id_type' => $id_operationType['id_type']
        ));

    }

    public static function modifyRoleWorkers($firstName, $lastName, $newRole) {

        $dbi = dbSingleton::getInstance()->getConnection(); // Connexion à la base de données

        $id_select = $dbi->prepare("SELECT id_worker FROM workers WHERE lastName = :lastName AND firstName = :firstName");
        $id_select->execute(array(
            'lastName' => $lastName,
            'firstName' => $firstName
        ));

        $id_worker = $id_select->fetch(PDO::FETCH_ASSOC);

        $modify = $dbi->prepare("UPDATE workers SET role = :role WHERE id_worker = :id_worker");
        $modify->execute(array(
            'role' => $newRole,
            'id_worker' => $id_worker['id_worker']
        ));

    }

    public static function takeOperation($lastName, $firstName, $role, $id_operation) {

        // TODO : Penser à ajouter une date de début

        $dbi = dbSingleton::getInstance()->getConnection(); // Connexion à la base de données

        /* On récupère l'id de l'employé */
        $req0 = $dbi->prepare("SELECT id_worker FROM workers WHERE lastName = :lastName AND firstName = :firstName AND role = :role");
        $req0->execute(array(
            'lastName' => $lastName,
            'firstName' => $firstName,
            'role' => $role
        ));

        $id_worker = $req0->fetch(PDO::FETCH_ASSOC);

        /* On vient l'ajouter dans l'opération et on passe son status à "taken" dans la bdd*/
        $modify = $dbi->prepare("UPDATE operations SET id_worker = :id_worker, status = :status  WHERE id_operation = :id_operation");
        $modify->execute(array(
            'id_worker' => $id_worker['id_worker'],
            'status' => 'Taken',
            'id_operation' => $id_operation

        ));

    }

    public static function updateOperation($firstName, $lastName, $id_Type, $newDescription , $id_operation) {
        $dbi = dbSingleton::getInstance()->getConnection(); // Connexion à la base de données

//        $req = $dbi->prepare("SELECT id_customer FROM customers WHERE firstName = :firstname AND lastName = :lastName");
//        $req->execute(array(
//            'firstName' => $firstName,
//            'lastName' => $lastName
//        ));

        $req = $dbi->query("SELECT id_customer FROM customers WHERE firstName = '$firstName' AND lastName = '$lastName'");

        $id_client = $req->fetch(PDO::FETCH_ASSOC);

        $req2 = $dbi->prepare("UPDATE operations SET id_type = :id_type, description = :description WHERE id_customer = :id_customer AND id_operation = :id_operation ");
        $req2->execute(array(
            'id_customer' => $id_client['id_customer'],
            'id_type' => $id_Type,
            'description' => $newDescription,
            'id_operation' => $id_operation
        ));

    }

    public static function endOperation($lastName, $firstName, $role, $id_operation) {
        $dbi = dbSingleton::getInstance()->getConnection(); // Connexion à la base de données

        $currentDate = date('Y-m-d');

        $req0 = $dbi->prepare("SELECT id_worker FROM workers WHERE lastName = :lastName AND firstName = :firstName AND role = :role");
        $req0->execute(array(
            'lastName' => $lastName,
            'firstName' => $firstName,
            'role' => $role
        ));

        $id_worker = $req0->fetch(PDO::FETCH_ASSOC);

        $req2 = $dbi->prepare("UPDATE operations SET status = :status, date_end = :date_end WHERE id_worker= :id_worker AND id_operation = :id_operation ");
        $req2->execute(array(
            'status' => 'Done',
            'date_end' => $currentDate,
            'id_worker' => $id_worker['id_worker'],
            'id_operation' =>$id_operation
        ));
    }


    public static function listOfOperationsAvailable() {

        $dbi = dbSingleton::getInstance()->getConnection(); // Connexion à la base de données

        $req = $dbi->prepare("SELECT lastName, firstName, description, email, creation_date,date_start, type, id_operation FROM operations, customers, operation_type WHERE status = :status AND operations.id_customer = customers.id_customer AND operations.id_type = operation_type.id_type ORDER BY lastName, firstName");
        $req->execute(array(
           'status' => 'Available'
        ));

        // TODO : Revoir le la ligne du dessous

         return $listOfOperationsAvailable = $req->fetchAll(PDO::FETCH_ASSOC);

    }

    public static function listOfOperationsInProgress($lastName, $firstName, $role) {

        $dbi = dbSingleton::getInstance()->getConnection(); // Connexion à la base de données

        $req0 = $dbi->prepare("SELECT id_worker FROM workers WHERE lastName = :lastName AND firstName = :firstName AND role = :role");
        $req0->execute(array(
            'lastName' => $lastName,
            'firstName' => $firstName,
            'role' => $role
        ));

        $id_worker = $req0->fetch(PDO::FETCH_ASSOC);



        //$req = $dbi->prepare("SELECT customers.firstName, customers.lastName, description, creation_date,id_type FROM  operations, customers WHERE status = :status AND customers.id_customer = operations.id_customer ORDER BY  customers.lastName, customers.firstName");
        $req = $dbi->prepare("SELECT operations.id_operation, operations.description, operations.date_start, customers.firstName, customers.lastName, type
        FROM customers, operations, operation_type WHERE operations.id_worker = :id_worker AND customers.id_customer = operations.id_customer AND status = :status AND operations.id_type = operation_type.id_type");
        $req->execute(array(
            'status' => 'Taken',
            'id_worker' => $id_worker['id_worker']
        ));
        return $listOfOperationsInProgress = $req->fetchAll(PDO::FETCH_ASSOC);

        // SELECT operations.id_operation, operations.description, operations.date_start,
        // customers.firstName, customers.lastName FROM customers, operations
        // WHERE operations.id_worker = 7 AND customers.id_customer = operations.id_customer AND operations.status = "Taken"
    }

    public static function listOfOperationsDone() {
        $dbi = dbSingleton::getInstance()->getConnection(); // Connexion à la base de données

        $req = $dbi->prepare("SELECT lastName, firstName, description, email, creation_date,date_start, date_end,  type, id_operation FROM operations, customers, operation_type WHERE status = :status AND operations.id_customer = customers.id_customer AND operations.id_type = operation_type.id_type ORDER BY lastName, firstName");
        $req->execute(array(
            'status' => 'Done'
        ));
        return $listOfOperationsDone = $req->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function displayIncomesByMonth() {

        $currentMonth = date('m');

        $dbi = dbSingleton::getInstance()->getConnection(); // Connexion à la base de données
        $req = $dbi->query("SELECT SUM(price) FROM operations, operation_type WHERE operations.id_type = operation_type.id_type AND creation_date LIKE '%$currentMonth%' ");



        $response = $req->fetch(PDO::FETCH_ASSOC);

          return implode(" ",$response );

    }

    public static function displayIncomesByYear() {

        $currentYear = date('Y');

        $dbi = dbSingleton::getInstance()->getConnection(); // Connexion à la base de données
        $req = $dbi->query("SELECT SUM(price) FROM operations, operation_type WHERE operations.id_type = operation_type.id_type AND creation_date LIKE '%$currentYear%' ");



        $response = $req->fetch(PDO::FETCH_ASSOC);

        return implode(" ",$response );

    }
}