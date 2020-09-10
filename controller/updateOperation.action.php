<?php

include_once '../model/Management.class.php';
include_once '../model/dbSingleton.class.php';


if (!empty($_POST['firstName']) && !empty($_POST['lastName']) && !empty($_POST['typeUpdate']) && !empty($_POST['description']) && !empty($_POST['id_operation'])) {

    if (preg_match("/^\p{L}([- ']\p{L}|\p{L})*$/", $_POST['firstName']) && preg_match("/^\p{L}([- ']\p{L}|\p{L})*$/", $_POST['lastName'])) {
        if (filter_var($_POST['id_operation'], FILTER_VALIDATE_INT)) {

            $dbi = dbSingleton::getInstance()->getConnection();

            $req = $dbi->query("SELECT firstName, lastName, id_operation FROM customers, operations WHERE customers.id_customer = operations.id_customer AND status IN ('Available', 'Taken')");
            $response1 = $req->fetchAll(PDO::FETCH_ASSOC);

            foreach ($response1 as $rep) {
                if ($rep['firstName'] == $_POST['firstName'] && $rep['lastName'] == $_POST['lastName'] && $rep['id_operation'] ==  $_POST['id_operation']) {
                    $operationExist = true;
                }
            }

            if (isset($operationExist)) {
                Management::updateOperation($_POST['firstName'], $_POST['lastName'], $_POST['typeUpdate'], $_POST['description'], $_POST['id_operation']);
                $errorMsg['success'] = true;
                echo json_encode($errorMsg);
            } else {
                $errorMsg['success'] = false;
                echo json_encode($errorMsg);
            }

        } else {
            $errorMsg['nan'] = true;
            echo json_encode($errorMsg);
        }
    } else {
        $errorMsg['badTypo'] = true;
        echo json_encode($errorMsg);
    }

} else {
    $errorMsg['empty'] = true;
    echo json_encode($errorMsg);
}