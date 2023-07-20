<?php
require_once './controllers/OrdonnanceController.php';
require_once './models/pillsmodel.php';
require_once './src/Database.php';

$db = new Database();
$pillsModel = new PillsModel($db);

$ordonnanceController = new OrdonnanceController($pillsModel);
$ordonnanceController->removeMedic();
