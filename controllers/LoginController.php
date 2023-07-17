<?php
require_once './views/header.php';
//require_once './src/Database.php';
require_once './models/UserModel.php';

echo 'test1';
if (isset($_POST['submit'])) {
    $pseudo = $_POST['pseudo'];
    $password = $_POST['password'];
    
echo 'test2';
    
    $user = UserModel::getUserByPseudo($pseudo); 
    var_dump($user);
    var_dump($user->getPassword());
    if ($user && password_verify($password, $user->getPassword())) {
        session_start();
        //var_dump($user->getPassword());
        $_SESSION['user_id'] = $user->getId();
        header('Location: index.php?action=home');
    } else {
        $errorMessage = 'Nom d\'utilisateur ou mot de passe incorrect';
        if (!$user) {
            $errorMessage = 'Nom d\'utilisateur incorrect';
        } else if (!password_verify($password, $user->getPassword())) {
            $errorMessage = 'Mot de passe incorrect';
        }
        
        echo 'test4';
        echo $errorMessage; // Display the error message to the user
    }
}
