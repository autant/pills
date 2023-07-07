<?php
// Inclure le fichier d'en-tête
require_once 'header.php';
require_once 'config/Database.php';
session_start();

// Vérifier si le formulaire de connexion a été soumis
if (isset($_POST['submit'])) {
    // Récupérer les données de connexion du formulaire
    $pseudo = $_POST['pseudo'];
    $password = $_POST['password'];

    // Vérifier si l'utilisateur existe dans la base de données
    $user = UserModel::getUserco($pseudo, $password);
    error_log(print_r($user, true));  // Log the user object

    if ($user && password_verify($password, $user->getPassword())) {
        // L'utilisateur existe et le mot de passe est correct, connecter l'utilisateur en créant une variable de session
        session_start();

        $_SESSION['user_id'] = $user->getId();
    
        // Rediriger l'utilisateur vers la page d'accueil
        header('Location: index.php?action=home');

    } else {
        // Le nom d'utilisateur ou le mot de passe est incorrect, afficher un message d'erreur
        $errorMessage = 'Nom d\'utilisateur ou mot de passe incorrect';
        if (!$user) {
            $errorMessage = 'Nom d\'utilisateur incorrect';
        } else if (!password_verify($password, $user->getPassword())) {
            $errorMessage = 'Mot de passe incorrect';
        }

    }

    
}
?>

<h1>Page de connexion</h1>

<?php
// Afficher un message d'erreur s'il y en a un
if (isset($errorMessage)) {
    echo '<p class="error">' . $errorMessage . '</p>';
}
?>
<!-- Formulaire de connexion -->
<h2>Connexion</h2>
<form action="index.php?action=login" method="POST">
    <label for="pseudo">Nom d'utilisateur :</label>
    <input type="text" id="pseudo" name="pseudo"><br>
    <label for="password">Mot de passe :</label>
    <input type="password" id="password" name="password"><br>
    <input type="submit" name="submit" value="Se connecter">
</form>

<p>Pas encore inscrit ? <a href="index.php?action=register">Inscrivez-vous ici</a>.</p>
<?php
// Inclure le fichier de pied de page
require_once 'footer.php';
?>
