<?php

require_once '../model/Workers.class.php';
require_once '../model/Operation_type.class.php';
require_once '../model/Management.class.php';

$dateHiring = "2020-09-01";
$dateHiring=date("Y-m-d",strtotime($dateHiring));

$dateBirth = "1995-02-15";
$dateBirth=date("Y-m-d",strtotime($dateBirth));

//$workers = new Workers('Esteban', 'Leroy', 'leroy@gmail.com', "expert", "admin", "admin", $dateBirth, $dateHiring, array());
//Management::createIdWorkers($workers);