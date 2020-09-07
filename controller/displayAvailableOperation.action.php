<?php

include_once '../model/Management.class.php';
include_once '../model/Operation.class.php';


echo json_encode(Management::listOfOperationsAvailable());

//$list = Management::listOfOperationsAvailable();
//print_r($list);