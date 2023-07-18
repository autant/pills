<?php

require_once './models/UserModel.php';
//require_once './views/login.php';


class UserController {

    public function register() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['email'])) {
            $userModel = new UserModel(null, $_POST['email'], $_POST['pseudo'], password_hash($_POST['password'], PASSWORD_DEFAULT), $_POST['firstname'], $_POST['lastname'], $_POST['ddn']);

            $userModel->createUser();

            header('Location: index.php');
            exit;
        } else {
            require_once 'RegisterController.php';
            require_once './views/register.php';
        }
    }

    public function login() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['pseudo']) && isset($_POST['password'])) {
            $db = Database::getInstance();
            $user = new UserModel($db);

            $userData = $user->getUserByPseudo($_POST['pseudo']);
        
            if ($userData && password_verify($_POST['password'], $userData['password'])) {
                // The user exists and the password is correct, log the user in by creating a session variable
                session_start();
                $_SESSION['user_id'] = $userData['id'];
        
                // Redirect the user to the home page
                header('Location: index.php?action=home');
                exit;
            } else {
                // The username or password is incorrect, display an error message
                $errorMessage = 'Email ou mot de passe incorrect';
                echo $errorMessage;
                header('Location: index.php?action=register');
                exit;
            }
        } else {
            require_once 'LoginController.php';
            require_once './views/login.php';
        
        }
    
    }
}