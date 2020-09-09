<?php


require_once '../model/dbSingleton.class.php';
require_once '../model/Workers.class.php';
require_once '../model/Management.class.php';

if (!empty($_POST['firstName']) && !empty($_POST['lastName']) && !empty($_POST['role']) && !empty($_POST['id_worker'])) {
    if (filter_var($_POST["id_worker"], FILTER_VALIDATE_INT)) {

        $dbi = dbSingleton::getInstance()->getConnection();

        $req = $dbi->query("SELECT * FROM workers");
        $response = $req->fetchAll(PDO::FETCH_ASSOC);


        foreach ($response as $rep) {
            if ($_POST['firstName'] == $rep['firstName'] && $_POST['lastName'] === $rep['lastName']) {
                $userExist = true;
            }
        }

        foreach ($response as $rep) {
            if ($_POST['id_worker'] == $rep['id_worker']) {
                $idExist = true;
            }
        }

        if (isset($userExist)) {
            if (isset($idExist)) {
                Management::modifyRoleWorkers($_POST['firstName'], $_POST['lastName'], $_POST['role'], $_POST['id_worker']);
                $errorMsg['success'] = true;
                echo json_encode($errorMsg);
            }  else {
                $errorMsg['success'] = false;
                echo json_encode($errorMsg);
            }
        } else {
            $errorMsg['userExist'] = false;
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