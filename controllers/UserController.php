<?php
echo "Hello from UserController!";
require_once __DIR__ . '/../models/UserModel.php';


class UserController {

    public function register()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['email'])) {
            $userModel = new UserModel();
            $userModel->setEmail($_POST['email']);
            $userModel->setPseudo($_POST['pseudo']);
            $userModel->setPassword(password_hash($_POST['password'], PASSWORD_DEFAULT));
            $userModel->setFirstname($_POST['firstname']);
            $userModel->setLastname($_POST['lastname']);
            $userModel->setDdn($_POST['ddn']);

            $errors = [];

            // Vérification de la confirmation de mot de passe
            if ($_POST['password'] !== $_POST['password-confirm']) {
                $errors[] = 'Les mots de passe ne correspondent pas';
            }

            if (count($errors) === 0) {
                $userModel->createUser();
                header('Location: index.php');
            } else {
                require_once 'views/register.php';
            }
        } else {
            require_once 'views/register.php';
        }
    }

    public function login($email, $password)
    {
        $userModel = new UserModel();
        $user = $userModel->getUserByEmail($email);
    
        // Vérifier si l'utilisateur existe et si le mot de passe est correct
        if ($user && password_verify($password, $user['password'])) {
            // Le mot de passe est correct, connecter l'utilisateur
            $_SESSION['user'] = $user;
            header('Location: index.php?action=home');
            exit();
        } else {
            // Le mot de passe est incorrect ou l'utilisateur n'existe pas, afficher un message d'erreur
            $errors[] = 'L\'adresse email ou le mot de passe est incorrect';
            require_once 'views/login.php';
        }
    }
    
}
