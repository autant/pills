<?php
// traitement.php

require_once './models/PillsModel.php';

// Créer une nouvelle instance de PillsModel
$pillsModel = new PillsModel();

// Obtenez l'ID de l'utilisateur d'une manière ou d'une autre
$userId = $_SESSION['userId']; // Suppose que l'ID de l'utilisateur est stocké dans la session

// Vérifier si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Vérifier si le médicament a été sélectionné
    if (!empty($_POST["medicName"])) {
        // Obtenir l'ID du médicament à partir de son nom
        $medicId = $pillsModel->getMedicIdByName($_POST["medicName"]);
        
        if ($medicId) {
            // Ajouter le médicament à la liste des médicaments de l'utilisateur
            $pillsModel->addMedic($userId, $medicId);
            
            // Rediriger l'utilisateur vers la page des médicaments
            header("Location: pills.php");
            exit();
        } else {
            echo "Erreur : Le médicament sélectionné n'existe pas.";
        }
    } else {
        echo "Erreur : Aucun médicament n'a été sélectionné.";
    }
} else {
    echo "Erreur : Aucune donnée n'a été envoyée par le formulaire.";
}

?>
