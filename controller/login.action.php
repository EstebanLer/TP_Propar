<?php

include_once '../model/dbSingleton.class.php';

session_start();

if (isset($_POST)) {
    if (!empty($_POST['username']) && (!empty($_POST['password']))) {


        $dbi = dbSingleton::getInstance()->getConnection(); // Connexion à la base de données
        $req = $dbi->prepare("SELECT login, password, firstName, lastName, role FROM workers WHERE login = :login AND password = :password");

        $req->execute(array(
            'login' => $_POST['username'],
            'password' => $_POST['password']
        ));


        $result = $req->fetchAll(PDO::FETCH_ASSOC);

        // $passwordVerify = password_verify($_POST['password'], $passwordHash);

        if ($result[0]['login'] == $_POST['username'] && $result[0]['password'] == $_POST['password']) {
            $_SESSION['user'] = $result[0]['firstName'] . " " . $result[0]['lastName'];
            $_SESSION['userRole'] = $result[0]['role'];
            header("Location: ../view/index.php");
        } else {
            echo "Le login ou le mot de passe est incorrect";
        }
    }

}