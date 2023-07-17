<?php


// controllers/PillsController.php

class PillsController {
  
  private $model;
  
  public function __construct(PillsModel $model) {
    $this->model = $model;
  }
  
  
  public function display() {
    $medicNames = $this->model->getMedicNames();
    include './views/pills.php';
}

  
}
//var_dump($model);
