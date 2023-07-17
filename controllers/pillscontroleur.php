<?php


// controllers/PillsController.php

class PillsController {
  
  private $model;
  
  public function __construct(PillsModel $model) {
    $this->model = $model;
  }
  
  
  public function display() {

    $medicName = $this->model->getMedicName();
    include './views/pills.php';
  }
}
var_dump($model);
