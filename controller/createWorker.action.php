<?php

require_once '../model/dbSingleton.class.php';
require_once '../model/Workers.class.php';
require_once '../model/Management.class.php';

if (isset($_POST)) {
    //print_r($_POST); // Il renvoit bien mes attributs

    $dbi = dbSingleton::getInstance()->getConnection(); // Connexion à la base de données

    $req = $dbi->prepare("SELECT firstName, lastName FROM workers WHERE firstName= :firstName AND lastName= :lastName");
    $req->execute(array(
        'firstName' => $_POST['firstName'],
        'lastName' => $_POST['lastname']
    ));

    $worker = $req->fetch(PDO::FETCH_ASSOC);

    $passwordHash = password_hash($_POST['password'], PASSWORD_BCRYPT, array("cost" => 12));



    //$workers = new Workers('Esteban', 'Leroy', 'leroy@gmail.com', "expert", "admin", "admin", $dateBirth, $dateHiring, array());
    if (($_POST['lastname'] == $worker['lastName']) && ($_POST['firstName'] == $worker['firstName'])) {
        $_SESSION['erreur'] = "L'employé existe déjà";
        header("Location: ../view/index.php");
    } else {
        Management::createIdWorkers($_POST['firstName'], $_POST['lastname'], $_POST['role'], $_POST['birthday'],$_POST['email'], $_POST['login'], $_POST['password']);
        header("Location: ../view/index.php");
    }
}