<?php


include_once '../model/Management.class.php';
include_once '../model/dbSingleton.class.php';


session_start();

echo json_encode(Management::displayAllWorkers());