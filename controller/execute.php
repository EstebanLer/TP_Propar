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
//$req = $dbi->query("SELECT COUNT(id_operation) as nbOperation, role FROM workers, operations WHERE workers.id_worker = operations.id_worker AND status = 'Taken' AND workers.id_worker = 4 ");
//$response = $req->fetch(PDO::FETCH_ASSOC);
//
//
//print_r($response);

//foreach ($response as $rep) {
//    if ("duhdhuzhd" == $rep['login']) {
//        $loginExist = true;
//    }
//}
//
//if (isset($loginExist)) {
//    echo "il existe !";
//} else {
//    echo "N'existe pas !";
//}

//$req = $dbi->prepare("SELECT firstName, lastName, login FROM workers WHERE login= :login");
//$req->execute(array(
//    'login' => "admin1",
//));
//
//$worker = $req->fetch(PDO::FETCH_ASSOC);
//
//print_r($worker);
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

//if (filter_var("blalbla", FILTER_VALIDATE_INT)) {
//    echo "C'est un chiffre";
//} else {
//    echo "Ce n'est pas un nombre !!";
//}


//$dbi = dbSingleton::getInstance()->getConnection();
//
//$req = $dbi->prepare("SELECT id_worker FROM workers WHERE firstName = :firstName AND lastName = :lastName AND role = :role");
//$req->execute(array(
//    'firstName' => 'Esteban',
//    'lastName' => 'Leroy',
//    'role' => 'Expert'
//));
//
//$id_worker = $req->fetch(PDO::FETCH_ASSOC);
//
//$id =  $id_worker['id_worker'];
//
//echo $id;

//$dbi = dbSingleton::getInstance()->getConnection();
//
//$req = $dbi->query("SELECT firstName, lastName, id_operation FROM customers, operations WHERE customers.id_customer = operations.id_customer AND status IN ('Available', 'Taken')");
//$response1 = $req->fetchAll(PDO::FETCH_ASSOC);
//
//foreach ($response1 as $rep) {
//    if ($rep['firstName'] == "Neron" && $rep['lastName'] == "Pompilli" && $rep['id_operation'] ==  21) {
//        $operationExist = true;
//    }
//}
//
//if (isset($operationExist)) {
//    echo "l'opération existe";
//} else {
//    echo "n'existe pas";
//}


$myDateString = "2020-09-15";
$date = date($myDateString);

$currentDate = date("Y-m-d");


if ($date < $currentDate) {
    echo "date antérieur";
} else {
    echo "date ulterieur";
}


