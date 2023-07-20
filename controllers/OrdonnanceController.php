<?php
require_once './models/PillsModel.php';
require_once './src/Database.php';

class OrdonnanceController {
  private $model;

  public function __construct(PillsModel $model) {
    $this->model = $model;
  }

  public function removeMedic() {
    // Récupérer l'ID de l'utilisateur et du médicament à partir de la requête POST
    $data = json_decode(file_get_contents('php://input'), true);
    $userId = $data['userId'];
    $medicId = $data['medicId'];

    // Supprimer le médicament de l'ordonnance de l'utilisateur
    $this->model->removeMedicFromUser($userId, $medicId);
  }
}
