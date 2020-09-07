<?php

include_once '../model/dbSingleton.class.php';

session_start();

$_SESSION['user'] = "";
$_SESSION['userRole'] = "";

if (isset($_POST)) {
    if (!empty($_POST['username']) && (!empty($_POST['password']))) {


        $dbi = dbSingleton::getInstance()->getConnection(); // Connexion à la base de données
        $req = $dbi->prepare("SELECT login, password, firstName, lastName, role FROM workers WHERE login = :login");

        $req->execute(array(
            'login' => $_POST['username'],
        ));

        $result = $req->fetchAll(PDO::FETCH_ASSOC);

        $passwordVerify = password_verify($_POST['password'], $result[0]['password']);


        if ($result[0]['login'] == $_POST['username'] && $passwordVerify == true) {
            $_SESSION['user'] = $result[0]['firstName'] . " " . $result[0]['lastName'];
            $_SESSION['userRole'] = $result[0]['role'];
            header("Location: ../view/index.php");
        } else {
            echo "Le login ou le mot de passe est incorrect";
        }
     }

}