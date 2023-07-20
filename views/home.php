<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once './controllers/PillsController.php';
require_once './models/PillsModel.php';
require_once './src/Database.php';

$db = new Database();
$pillsModel = new PillsModel($db);
$pillsController = new PillsController($pillsModel);

//var_dump($pillsModel); // Ici vous pouvez vérifier le contenu de $pillsModel

$pillsController->display();
?>

