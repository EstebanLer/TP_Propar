<?php

require_once '../model/dbSingleton.class.php';
require_once '../model/Workers.class.php';
require_once '../model/Management.class.php';


    $customer = new Customers($_POST['firstName'],$_POST['lastName'], $_POST['email'], $_POST['city'], $_POST['zipCode'], $_POST['street'], $_POST['number']);

    // TODO : Controller si le client existe déjà si, oui on ajoute une opération à ce client sinon on créé le client

    Management::createCustomers($customer);

    Management::addOperation($customer, $_POST['type'], $_POST['description'], $_POST['date_start']);

