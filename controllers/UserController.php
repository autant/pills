<?php

require_once './models/UserModel.php';

class UserController {

    public function register() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['email'])) {
            $userModel = new UserModel(null, 'monemail@mail.com', 'monpseudo', 'monmotdepasse', 'Mon', 'Nom', '2000-01-01');

            $userModel->setEmail($_POST['email']);
            $userModel->setPseudo($_POST['pseudo']);
            $userModel->setPassword(password_hash($_POST['password'], PASSWORD_DEFAULT));
            $userModel->setFirstname($_POST['firstname']);
            $userModel->setLastname($_POST['lastname']);
            $userModel->setDdn($_POST['ddn']);
            $userModel->createUser();

            header('Location: index.php');
        } else {
            require_once './views/register.php';
        }
    }
    public function getUserByUsername($username) {
        $db = Database::getInstance()->getConnection();
    
        $stmt = $db->prepare('SELECT * FROM utilisateur WHERE pseudo = :username');
        $stmt->bindParam(':username', $username);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_OBJ);
    
        return $user ? $user : null;
    }
    
    public function login($pseudo, $password) {
        $db = Database::getInstance();
        $user = new UserModel($db);

        $userData = $user->getUserByPseudo($pseudo);
    
        if ($userData && password_verify($password, $userData['password'])) {
            // L'utilisateur existe et le mot de passe est correct, connecter l'utilisateur en créant une variable de session
            session_start();
            $_SESSION['user_pseudo'] = $userData['id'];
    
            // Rediriger l'utilisateur vers la page d'accueil
            header('Location: index.php?action=home');
            exit;
        } else {
            // Le nom d'utilisateur ou le mot de passe est incorrect, afficher un message d'erreur
            $errorMessage = 'Email ou mot de passe incorrect';
            echo $errorMessage;
        }
    }
    
}
