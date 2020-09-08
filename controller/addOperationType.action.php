<?php

include_once '../model/Management.class.php';

session_start();

if (isset($_POST)) {

    $operationType = new Operation_type($_POST['price'], $_POST['type']);

    Management::addOperationType($operationType);
}
