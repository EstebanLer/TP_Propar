<?php


require_once '../model/dbSingleton.class.php';
require_once '../model/Workers.class.php';
require_once '../model/Management.class.php';

if (!empty($_POST['firstName']) && !empty($_POST['lastName']) && !empty($_POST['role']) && !empty($_POST['id_worker'])) {

    if (preg_match("/^\p{L}([- ']\p{L}|\p{L})*$/", $_POST['firstName']) && preg_match("/^\p{L}([- ']\p{L}|\p{L})*$/", $_POST['lastName'])) {

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

                    $req2 = $dbi->prepare("SELECT COUNT(*) as workerExist FROM workers WHERE firstName = :firstName AND lastName = :lastName AND id_worker = :id_worker");
                    $req2->execute(array(
                        'firstName' => $_POST['firstName'],
                        'lastName' => $_POST['lastName'],
                        'id_worker' => $_POST['id_worker']
                    ));

                    $response2 = $req2->fetch(PDO::FETCH_ASSOC);

                    if ($response2['workerExist'] == 1) {
                        Management::modifyRoleWorkers($_POST['firstName'], $_POST['lastName'], $_POST['role'], $_POST['id_worker']);
                        $errorMsg['success'] = true;
                        echo json_encode($errorMsg);
                    } else {
                        $errorMsg['workerExist'] = false;
                        echo json_encode($errorMsg);
                    }

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
        $errorMsg['badTypo'] = true;
        echo json_encode($errorMsg);
    }

} else {
    $errorMsg['empty'] = false;
    echo json_encode($errorMsg);
}