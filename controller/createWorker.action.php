<?php

require_once '../model/dbSingleton.class.php';
require_once '../model/Workers.class.php';
require_once '../model/Management.class.php';

if (isset($_POST)) {

    $dbi = dbSingleton::getInstance()->getConnection(); // Connexion à la base de données

    $req = $dbi->prepare("SELECT firstName, lastName, login FROM workers WHERE login= :login");
    $req->execute(array(
        'login' => $_POST['login'],
    ));

    $worker = $req->fetch(PDO::FETCH_ASSOC);

    $passwordHash = password_hash($_POST['password'], PASSWORD_BCRYPT, array("cost" => 12));

    $exist = true;

    //$workers = new Workers('Esteban', 'Leroy', 'leroy@gmail.com', "expert", "admin", "admin", $dateBirth, $dateHiring, array());
    // TODO : faire le contrôle pour ne pas ajouter deux fois la même personne
    if (($_POST['login'] != $worker['login']) && ($_POST['firstName'] != $worker['firstName']) && ($_POST['lastName'] != $worker['lastName'])) {
        Management::createIdWorkers($_POST['firstName'], $_POST['lastName'], $_POST['role'], $_POST['birthday'],$_POST['email'], $_POST['login'], $passwordHash);
    }

}