<?php

require_once '../model/dbSingleton.class.php';
require_once '../model/Workers.class.php';
require_once '../model/Management.class.php';

if (isset($_POST)) {
    if (!empty($_POST['firstName']) && !empty($_POST['lastName'])
        && !empty($_POST['email']) && !empty($_POST['city']) &&
        !empty($_POST['zipCode']) && !empty($_POST['street'])
        && !empty($_POST['number']) &&filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {

        $dbi = dbSingleton::getInstance()->getConnection();

        $req = $dbi->query("SELECT * FROM customers");
        $response = $req->fetchAll(PDO::FETCH_ASSOC);


        foreach ($response as $rep) {
            if ($_POST['email'] == $rep['email']) {

                $emailExist = true;

            }
        }

        if (isset($emailExist)) {
            Management::addOperation($_POST['lastName'],$_POST['firstName'], $_POST['type'], $_POST['description'], $_POST['date_start']);
        } else {
            $customer = new Customers($_POST['firstName'],$_POST['lastName'], $_POST['email'], $_POST['city'], $_POST['zipCode'], $_POST['street'], $_POST['number']);
            Management::createCustomers($customer);
            Management::addOperation($_POST['lastName'],$_POST['firstName'], $_POST['type'], $_POST['description'], $_POST['date_start']);
        }
    }
}