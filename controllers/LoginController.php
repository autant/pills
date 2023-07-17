<?php
require_once './views/header.php';
require_once './src/Database.php';
require_once './models/UserModel.php';

if (isset($_POST['submit'])) {
    $pseudo = $_POST['pseudo'];
    $password = $_POST['password'];

    $user = UserModel::getUserByPseudo($pseudo); 

    if ($user && password_verify($password, $user->getPassword())) {
        session_start();
        $_SESSION['user_id'] = $user->getId();
        header('Location: index.php?action=home');
        exit; // Stop the script after redirection
    } else {
        $errorMessage = 'Nom d\'utilisateur ou mot de passe incorrect';
        if (!$user) {
            $errorMessage = 'Nom d\'utilisateur incorrect';
        } else if (!password_verify($password, $user->getPassword())) {
            $errorMessage = 'Mot de passe incorrect';
        }

        echo $errorMessage; // Display the error message to the user
    }
}
