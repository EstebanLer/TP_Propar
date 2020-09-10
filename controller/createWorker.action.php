<?php

require_once '../model/dbSingleton.class.php';
require_once '../model/Workers.class.php';
require_once '../model/Management.class.php';

if (!empty($_POST['firstName']) && !empty($_POST['lastName']) && !empty($_POST['role'])
    && !empty($_POST['birthday']) && !empty($_POST['email']) && !empty($_POST['login']) && !empty($_POST['password'])) {
    if (preg_match("/^\p{L}([- ']\p{L}|\p{L})*$/", $_POST['firstName']) && preg_match("/^\p{L}([- ']\p{L}|\p{L})*$/", $_POST['lastName'])) {

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
        $errorMsg['badTypo'] = true;
        echo json_encode($errorMsg);
    }

} else {
    $errorMsg['empty'] = false;
    echo json_encode($errorMsg);
}