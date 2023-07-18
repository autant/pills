<?php

// validateMedic.php

// Inclure le fichier de votre modèle
require 'models/PillsModel.php';

// Créer une instance de votre modèle
$model = new PillsModel();

// Obtenir les données JSON de la requête AJAX
$data = json_decode(file_get_contents('php://input'), true);

// Extraire l'ID de l'utilisateur et l'ID du médicament
$userId = $data['userId'];
$medicId = $data['medicId'];

// Valider le médicament dans la base de données
$model->validateMedic($userId, $medicId);

?>