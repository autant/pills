<?php

require_once 'UserController.php';


$userModel = new UserModel(null, '', '', '', '', '', '');


$action = isset($_GET['action']) ? $_GET['action'] : '';

switch($action) {
    case 'login':
        // Afficher la page de connexion
        require_once 'LoginController.php';
        require_once './views/login.php';

        break;
    case 'register':
        // Traitement de l'inscription
        require_once 'RegisterController.php';
        //require_once './views/register.php';
        break;

    case 'home':
        // Afficher la page de connexion
        //require_once 'HomeController.php';
        require_once './views/home.php';
        break;
    
    case 'logout':
        // Déconnexion de l'utilisateur
        //session_start();
        session_unset();
        session_destroy();
        header('Location: index.php');
        break;
    default:
        // Afficher la page d'accueil
        require_once 'LoginController.php';
        require_once './views/login.php';
        break;
}
?>