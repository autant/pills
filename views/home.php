<?php

// home.php

require_once './models/pillsmodel.php';
require_once './controllers/pillscontroleur.php';

$pdo = new PDO('mysql:host=localhost;dbname=pills', 'root', 'Sabrina1211!');
$model = new PillsModel($pdo);
$controller = new PillsController($model);

$controller->display();

require_once'header.php';

