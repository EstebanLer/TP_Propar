<?php

include_once '../model/Management.class.php';

session_start();

if (!empty($_POST['price'] && $_POST['type'])) {
    if (filter_var($_POST['price'], FILTER_VALIDATE_INT)) {

        $dbi = dbSingleton::getInstance()->getConnection();

        $req = $dbi->query("SELECT type FROM operation_type");
        $response = $req->fetchAll(PDO::FETCH_ASSOC);


        foreach ($response as $rep) {
            if ($_POST['type'] == $rep['type']) {
                $typeExist = true;
            }
        }

        if (isset($typeExist)) {
            $errorMsg['exist'] = false;
            echo json_encode($errorMsg);
        } else {
            $operationType = new Operation_type($_POST['price'], $_POST['type']);
            Management::addOperationType($operationType);

            $errorMsg['success'] = true;
            echo json_encode($errorMsg);
        }

    } else {
        $errorMsg["nan"] = false;
        echo json_encode($errorMsg);

    }
} else {
    $errorMsg['success'] = false;
    echo  json_encode($errorMsg);
}
