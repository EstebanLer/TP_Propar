<?php

require_once '../model/Workers.class.php';
require_once '../model/Operation_type.class.php';
require_once '../model/Management.class.php';
require_once '../model/dbSingleton.class.php';


// Login = admin1 mdp = admin
// Login = coco mdp = azerty


$dateHiring = new DateTime("2020-09-01");


$dateBirth = new DateTime("1995-02-15");


$workers = new Workers('Esteban', 'Leroy', 'leroy@gmail.com', "expert", "admin", "admin", $dateBirth, $dateHiring, array());
//Management::createIdWorkers($workers);

$customer = new Customers("Marc","toto", "toto.marc@homail.com", "Tourcoing", "59200", "Rue fin de la guerre", 78);
$customer1 = new Customers("Jean","martin", "martin.jean@homail.com", "Tourcoing", "59200", "rue du bois blanc", 04);
//Management::createCustomers($customer);

$operationType1 = new Operation_type(1000, "Petite");
$operationType2 = new Operation_type(2500, "Moyenne");
$operationType3 = new Operation_type(10000, "Grande");

//Management::addOperationType($operationType1);
//Management::addOperationType($operationType2);
//Management::addOperationType($operationType3);


//Management::addOperation($customer, $operationType1, "Ceci est une petite operation de nettoyage");
//Management::modifyRoleWorkers($workers, "Expert");

//print_r(Management::listOfOperationsAvailable());
//print_r(Management::listOfOperationsInProgress());

//Management::takeOperation($workers, 1);


$currentMonth = date('m');
//echo $currentMonth;

//$dbi = dbSingleton::getInstance()->getConnection(); // Connexion à la base de données
//
//$req = $dbi->query("SELECT id_type FROM operation_type");
//
//$response = $req->fetchAll(PDO::FETCH_ASSOC);
//
//print_r($response);

//$req = $dbi->prepare("SELECT id_customer FROM customers WHERE firstName = :firstname AND lastName = :lastName");
//$req->execute(array(
//    'firstName' => 'Jean',
//    'lastName' => 'martin'
//));

//print_r(Management::listOfOperationsInProgress('Leroy', 'Esteban', 'Expert'));
//Management::endOperation('Leroy', 'Esteban', 'Expert', 4);


