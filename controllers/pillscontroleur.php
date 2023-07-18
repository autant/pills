<?php

session_start();
// pillscontroller.php

require './models/pillsmodel.php';

class PillsController {

  private $model;

  public function __construct() {
    $this->model = new PillsModel();
  }

  public function index() {
    $userId = $_SESSION['userId']; // Suppose que l'ID de l'utilisateur est stocké dans la session
    $medics = $this->model->getMedicsByUser($userId);
    require './views/pills.php';
  }

  public function display() {
    $userId = $_SESSION['userId']; // Suppose que l'ID de l'utilisateur est stocké dans la session
    $medics = $this->model->getMedicsByUser($userId);
    $medicNames = $this->model->getMedicNames(); // Récupère les noms des médicaments
    require 'views/pillsview.php';
}

}

  

//var_dump($model);
