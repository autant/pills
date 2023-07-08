<?php

// Démarrer la session


require_once 'controllers/UserController.php';



$action = isset($_GET['action']) ? $_GET['action'] : 'login';

switch($action) {
    case 'login':
        //session_start();
        if (isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] === 'POST') {
            $userController = new UserController();
            $userController->login($_POST['pseudo'], $_POST['password']);
        } else {
            require_once 'views/login.php';
        }
        break;

    case 'register':
        //session_start();
        // Afficher la page d'inscription
        require_once 'views/register.php';
        break;

    case 'home':
       

        // Vérification de l'authentification de l'utilisateur
        session_start();
        
        if (isset($_SESSION['user_id'])) {
            // L'utilisateur est authentifié, on peut afficher la page d'accueil
            require_once 'views/pills.php';
            header('Location: views/pills.php');

            
        } else {
            // L'utilisateur n'est pas authentifié, on redirige vers la page de connexion
            header('Location: index.php');

        }
        break;

    case 'logout':
        //session_start();
        // Supprimer toutes les données de session
        $_SESSION = array();
        // Supprimer le cookie de session
        if (ini_get("session.use_cookies")) {
            $params = session_get_cookie_params();
            setcookie(session_name(), '', time() - 42000,
                $params["path"], $params["domain"],
                $params["secure"], $params["httponly"]
            );
        }
        // Détruire la session
        session_destroy();
        // Rediriger l'utilisateur vers la page d'accueil
        header('Location: index.php');

        break;



    default:
        // Vérification de l'authentification de l'utilisateur
        //session_start();
        if (isset($_SESSION['user_id'])) {
            // L'utilisateur est authentifié, on redirige vers la page d'accueil
            header('Location: index.php?action=home');
            //exit();
        } else {
            // L'utilisateur n'est pas authentifié, on redirige vers la page de connexion
            header('Location: index.php?action=login');

        }
        break;

    }
