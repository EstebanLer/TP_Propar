<?php

include_once '../model/Management.class.php';
include_once '../model/dbSingleton.class.php';

session_start();

if (!(empty($_POST['id_operation']))) {
    if (filter_var($_POST['id_operation'], FILTER_VALIDATE_INT)) {

        $dbi = dbSingleton::getInstance()->getConnection();

        $req = $dbi->query("SELECT id_operation FROM operations");
        $response = $req->fetchAll(PDO::FETCH_ASSOC);


        foreach ($response as $rep) {
            if ($_POST['id_operation'] == $rep['id_operation']) {
                $idExist = true;
            }
        }

        if (isset($idExist)) {
            Management::endOperation($_SESSION['userLastName'], $_SESSION['userFirstName'], $_SESSION['userRole'], $_POST['id_operation']);
            $errorMsg['success'] = true;
            echo json_encode($errorMsg);
        } else {
            $errorMsg['success'] = false;
            echo json_encode($errorMsg);
        }

    } else {
        $errorMsg['nan'] = false;
        echo json_encode($errorMsg);
    }

} else {
    $errorMsg['empty'] = false;
    echo json_encode($errorMsg);
}


