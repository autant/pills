<?php
session_start();
// home.php

require_once './models/PillsModel.php';
require_once './controllers/PillsController.php';
require_once './views/pills.php';
require_once './src/Database.php';


$model = new PillsModel($pdo);
$controller = new PillsController($model);

$controller->display();

require_once './views/header.php';
?>