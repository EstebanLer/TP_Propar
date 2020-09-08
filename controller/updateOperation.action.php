<?php

include_once '../model/Management.class.php';

if (isset($_POST)) {
    Management::updateOperation($_POST['firstName'], $_POST['lastName'], $_POST['typeUpdate'], $_POST['description'], $_POST['id_operation']);
}