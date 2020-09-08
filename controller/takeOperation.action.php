<?php

include_once '../model/Management.class.php';

session_start();

Management::takeOperation($_SESSION['userLastName'], $_SESSION['userFirstName'], $_SESSION['userRole'], $_POST['id_operation']);