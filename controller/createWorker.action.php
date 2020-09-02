<?php

require_once '../model/dbSingleton.class.php';
require_once '../model/Workers.class.php';
require_once '../model/Management.class.php';

if (isset($_POST)) {
    //print_r($_POST); // Il renvoit bien mes attributs

    $dbi = dbSingleton::getInstance()->getConnection(); // Connexion à la base de données

    $req = $dbi->prepare("SELECT firstName, lastName FROM workers WHERE firstName= :firstName AND lastName= :lastName");
    $req->execute(array(
        'firstName' => $_POST['fname'],
        'lastName' => $_POST['lname']
    ));

    $worker = $req->fetch(PDO::FETCH_ASSOC);

    $passwordHash = password_hash($_POST['password'], PASSWORD_BCRYPT, array("cost" => 12));

    //$workers = new Workers('Esteban', 'Leroy', 'leroy@gmail.com', "expert", "admin", "admin", $dateBirth, $dateHiring, array());
    if (($_POST['lname'] == $worker['lastName']) && ($_POST['fname'] == $worker['firstName'])) {
        echo ("L'employé existe déjà");
    } else {
        // createIdWorkers($firstName, $lastName, $role, $birthday, $email, $login, $password)
        Management::createIdWorkers($_POST['fname'], $_POST['lname'], $_POST['role'], $_POST['birthday'],$_POST['email'], $_POST['login'], $passwordHash);
        echo "Employé créé ! ";
    }
}