<?php

require_once '../model/dbSingleton.class.php';
require_once '../model/Workers.class.php';
require_once '../model/Management.class.php';

//if (isset($_POST)) {
//
//    $dbi = dbSingleton::getInstance()->getConnection(); // Connexion à la base de données
//
//    $req = $dbi->prepare("SELECT firstName, lastName, login FROM workers WHERE login= :login");
//    $req->execute(array(
//        'login' => $_POST['login'],
//    ));
//
//    $worker = $req->fetch(PDO::FETCH_ASSOC);
//
//    $passwordHash = password_hash($_POST['password'], PASSWORD_BCRYPT, array("cost" => 12));
//
//    $exist = true;
//
//    //$workers = new Workers('Esteban', 'Leroy', 'leroy@gmail.com', "expert", "admin", "admin", $dateBirth, $dateHiring, array());
//    // TODO : faire le contrôle pour ne pas ajouter deux fois la même personne
//    if (($_POST['login'] != $worker['login']) && ($_POST['firstName'] != $worker['firstName']) && ($_POST['lastName'] != $worker['lastName'])) {
//        Management::createIdWorkers($_POST['firstName'], $_POST['lastName'], $_POST['role'], $_POST['birthday'],$_POST['email'], $_POST['login'], $passwordHash);
//    }
//}

if (!empty($_POST['firstName']) && !empty($_POST['lastName']) && !empty($_POST['role'])
    && !empty($_POST['birthday']) && !empty($_POST['email']) && !empty($_POST['login']) && !empty($_POST['password'])) {
    if (filter_var(filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) == true)) {

        $dbi = dbSingleton::getInstance()->getConnection(); // Connexion à la base de données

        $req = $dbi->query("SELECT email, login FROM workers");
        $response = $req->fetchAll(PDO::FETCH_ASSOC);

        foreach ($response as $rep) {
            if ($_POST['email'] == $rep['email']) {
                $emailExist = true;
            }
        }

        foreach ($response as $rep) {
            if ($_POST['login'] == $rep['login']) {
                $loginExist = true;
            }
        }


        if (isset($loginExist)) {

            $errorMsg['loginExist'] = true;
            echo json_encode($errorMsg);
        } else {

            if (isset($emailExist)) {
                $errorMsg['workerExist'] = false;
                echo json_encode($errorMsg);
            } else {

                $passwordHash = password_hash($_POST['password'], PASSWORD_BCRYPT, array("cost" => 12));
                Management::createIdWorkers($_POST['firstName'], $_POST['lastName'], $_POST['role'], $_POST['birthday'],$_POST['email'], $_POST['login'], $passwordHash);

                $errorMsg['workerExist'] = true;
                echo json_encode($errorMsg);
            }
        }




    } else {
        $errorMsg['badEmail'] = false;
        echo json_encode($errorMsg);
    }
} else {
    $errorMsg['empty'] = false;
    echo json_encode($errorMsg);
}