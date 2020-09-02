<?php

require_once '../model/Workers.class.php';
require_once '../model/Operation_type.class.php';
require_once '../model/Management.class.php';

$dateHiring = new DateTime("2020-09-01");


$dateBirth = new DateTime("1995-02-15");


$workers = new Workers('Esteban', 'Leroy', 'leroy@gmail.com', "expert", "admin", "admin", $dateBirth, $dateHiring, array());
//Management::createIdWorkers($workers);

$customer = new Customers("Jacques","Dupond", "dupond.jacques@homail.com", "Tourcoing", "59200", "Rue fin de la guerre", 45);
$customer1 = new Customers("Jean","martin", "martin.jean@homail.com", "Tourcoing", "59200", "rue du bois blanc", 04);
//Management::createCustomers($customer1);

$operationType1 = new Operation_type(1000, "Petite");
$operationType2 = new Operation_type(2500, "Moyenne");
$operationType3 = new Operation_type(10000, "Grande");
//
//Management::addOperationType($operationType1);
//Management::addOperationType($operationType2);
//Management::addOperationType($operationType3);


//Management::addOperation($customer, $operationType1, "Ceci est une petite opération de nettoyage");
//Management::modifyRoleWorkers($workers, "Admin");

print_r(Management::listOfOperationsAvailable());



