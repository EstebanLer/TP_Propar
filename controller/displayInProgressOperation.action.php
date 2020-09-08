<?php

include_once '../model/Management.class.php';
include_once '../model/Operation.class.php';

session_start();

echo json_encode(Management::listOfOperationsInProgress($_SESSION['userLastName'], $_SESSION['userFirstName'], $_SESSION['userRole']));