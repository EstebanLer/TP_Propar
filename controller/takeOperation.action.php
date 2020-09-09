<?php

include_once '../model/Management.class.php';
include_once '../model/dbSingleton.class.php';

session_start();

//Management::takeOperation($_SESSION['userLastName'], $_SESSION['userFirstName'], $_SESSION['userRole'], $_POST['id_operation']);

if (!empty($_POST['id_operation'])) {
    if (filter_var($_POST['id_operation'], FILTER_VALIDATE_INT)) {

        $dbi = dbSingleton::getInstance()->getConnection();


        $req0 = $dbi->query("SELECT id_operation FROM operations");
        $response0 = $req0->fetchAll(PDO::FETCH_ASSOC);

        foreach ($response0 as $rep) {
            if ($rep['id_operation'] == $_POST['id_operation']) {
                $idExist = true;
            }
        }

        if (isset($idExist)) {
            $req = $dbi->prepare("SELECT id_worker FROM workers WHERE firstName = :firstName AND lastName = :lastName AND login = :login AND role = :role");
            $req->execute(array(
                'firstName' => $_SESSION['userFirstName'],
                'lastName' => $_SESSION['userLastName'],
                'role' => $_SESSION['userRole'],
                'login' => $_SESSION['login']
            ));

            $id = $req->fetch(PDO::FETCH_ASSOC);

            $id_worker = $id['id_worker'];

            $req1 = $dbi->query("SELECT COUNT(id_operation) as nbOperation FROM workers, operations WHERE workers.id_worker = operations.id_worker AND status = 'Taken' AND workers.id_worker = $id_worker ");
            $response = $req1->fetch(PDO::FETCH_ASSOC);

            if ($_SESSION['userRole'] === "Expert") {

                if ($response['nbOperation'] < 5) {
                    Management::takeOperation($_SESSION['userLastName'], $_SESSION['userFirstName'], $_SESSION['userRole'], $_POST['id_operation']);
                    $errorMsg['success'] = true;
                    echo json_encode($errorMsg);
                } else {
                    $errorMsg['success'] = false;
                    echo json_encode($errorMsg);
                }

            } elseif ($_SESSION['userRole'] === "Senior") {

                if ($response['nbOperation'] < 3) {
                    Management::takeOperation($_SESSION['userLastName'], $_SESSION['userFirstName'], $_SESSION['userRole'], $_POST['id_operation']);
                    $errorMsg['success'] = true;
                    echo json_encode($errorMsg);
                } else {
                    $errorMsg['success'] = false;
                    echo json_encode($errorMsg);
                }

            } elseif($_SESSION['userRole'] === "Junior") {

                if ($response['nbOperation'] < 1) {
                    Management::takeOperation($_SESSION['userLastName'], $_SESSION['userFirstName'], $_SESSION['userRole'], $_POST['id_operation']);
                    $errorMsg['success'] = true;
                    echo json_encode($errorMsg);
                } else {
                    $errorMsg['success'] = false;
                    echo json_encode($errorMsg);
                }

            }
        } else {
            $errorMsg['idExist'] = false;
            echo json_encode($errorMsg);
        }


    } else {
        $errorMsg['nan'] = true;
        echo json_encode($errorMsg);
    }
} else {
    $errorMsg['empty'] = true;
    echo json_encode($errorMsg);
}