<?php
require_once './views/header.php';
require_once './src/Database.php';

if (isset($_POST['submit'])) {
    $pseudo = $_POST['pseudo'];
    $password = $_POST['password'];

    // Obtenez une instance de votre connexion à la base de données
    $pdo = Database::getInstance()->getConnection();

    // Préparez et exécutez la requête pour récupérer l'utilisateur par pseudo
    $stmt = $pdo->prepare('SELECT * FROM utilisateur WHERE pseudo = :pseudo');
    $stmt->execute([':pseudo' => $pseudo]);

    // Récupérez l'utilisateur en tant que tableau associatif
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user && password_verify($password, $user['password'])) {
        session_start();
        $_SESSION['user_id'] = $user['id'];
        header('Location: index.php?action=home');
    } else {
        $errorMessage = 'Nom d\'utilisateur ou mot de passe incorrect';
        echo $errorMessage;
    }
}