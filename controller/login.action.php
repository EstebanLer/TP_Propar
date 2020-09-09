<?php

include_once '../model/dbSingleton.class.php';

session_start();

$_SESSION['user'] = "";
$_SESSION['userRole'] = "";
$_SESSION['userFirstName'] = "";
$_SESSION['userLastName'] = "";

    if (!empty($_POST['username']) && (!empty($_POST['password']))) {

        $dbi = dbSingleton::getInstance()->getConnection(); // Connexion à la base de données

        $req0 = $dbi->query("SELECT login FROM workers");
        $response = $req0->fetchAll(PDO::FETCH_ASSOC);

        foreach ($response as $rep) {
            if ($_POST['username'] == $rep['login']) {
                $loginExist = true;
            }
        }

        if (isset($loginExist)) {
            $req = $dbi->prepare("SELECT login, password, firstName, lastName, role FROM workers WHERE login = :login");

            $req->execute(array(
                'login' => $_POST['username'],
            ));

            $result = $req->fetchAll(PDO::FETCH_ASSOC);


            $passwordVerify = password_verify($_POST['password'], $result[0]['password']);


            if ($result[0]['login'] == $_POST['username'] && $passwordVerify == true) {
                $_SESSION['user'] = $result[0]['firstName'] . " " . $result[0]['lastName'];
                $_SESSION['userRole'] = $result[0]['role'];
                $_SESSION['userFirstName'] = $result[0]['firstName'];
                $_SESSION['userLastName'] = $result[0]['lastName'];
                $_SESSION['login'] = $_POST['username'];
                $errorMsg['return'] = true;
                echo json_encode($errorMsg);
            } else {
                $errorMsg['return'] = false;
                echo json_encode($errorMsg);
            }
        } else {
            $errorMsg['bad'] = false;
            echo json_encode($errorMsg);
        }
     } else {
        $errorMsg['empty'] = false;
        echo json_encode($errorMsg);
    }

