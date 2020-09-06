<?php


require_once '../model/dbSingleton.class.php';
require_once '../model/Workers.class.php';
require_once '../model/Management.class.php';

if (isset($_POST)) {

    Management::modifyRoleWorkers($_POST['firstName'], $_POST['lastName'], $_POST['role']);
}