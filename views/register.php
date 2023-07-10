<form action="index.php?action=register" method="POST">

<?php
require_once './controllers/RegisterController.php';
?>
    <label for="email">Adresse email</label>
    <input type="email" id="email" name="email" required>
    <br>
    <label for="pseudo">Pseudo</label>
    <input type="text" id="pseudo" name="pseudo" required>
    <br>
    <label for="password">Mot de passe</label>
    <input type="password" id="password" name="password" required>
    <br>
    <label for="password-confirm">Confirmer le mot de passe</label>
    <input type="password" id="password-confirm" name="password-confirm" required>
    </br>
    <label for="firstname">Prénom</label>
    <input type="text" id="firstname" name="firstname" required>
    <br>
    <label for="lastname">Nom</label>
    <input type="text" id="lastname" name="lastname" required>
    <br>
    <label for="ddn">Date de naissance</label>
    <input type="date" id="ddn" name="ddn" required>
    <br>
    <button type="submit">S'inscrire</button>

