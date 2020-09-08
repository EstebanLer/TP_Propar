<?php

include_once '../model/dbSingleton.class.php';


$dbi = dbSingleton::getInstance()->getConnection(); // Connexion à la base de données

$req = $dbi->query("SELECT id_type FROM operation_type");

$response = $req->fetchAll(PDO::FETCH_ASSOC);

echo json_encode($response);