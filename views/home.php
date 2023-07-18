<?php
require_once './controllers/pillscontroleur.php';
require_once './models/pillsmodel.php';
require_once './src/Database.php';

$db = new Database();
$pillsModel = new PillsModel($db);
$pillsController = new PillsController($pillsModel);

//var_dump($pillsModel); // Ici vous pouvez vérifier le contenu de $pillsModel

$pillsController->index();
?>

