<?php

// Démarrer la session

session_start();


require_once 'controllers/SwitchController.php';
require_once 'views/header.php';

switch($action) {
    case 'home':
        // Load the Home controller
        require_once 'controllers/HomeController.php';
        $controller = new PillsController();
        $controller->display();
        break;
    // Other cases...
}


?>

