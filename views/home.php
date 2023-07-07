<?php
session_start();
// home.php

require_once './models/pillsmodel.php';
require_once './controllers/pillscontroleur.php';

$pdo = new PDO('mysql:host=localhost;dbname=pills', 'root', '');
$model = new PillsModel($pdo);
$controller = new PillsController($model);

$controller->display();

require_once'header.php';
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>pills</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<h1>test</h1>
</body>
