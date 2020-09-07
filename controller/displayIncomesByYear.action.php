<?php


include_once '../model/Management.class.php';

echo json_encode(Management::displayIncomesByYear());