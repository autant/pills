<?php

// models/PillsModel.php

class PillsModel {
  
  private $db;

  public function __construct(Database $db) {
    $this->db = $db;
  }

  

  public function getMedicName() {
    $pdo = $this->db->getInstance();

    // Query the database
    $stmt = $pdo->query('SELECT name FROM medictable');
    $medic = $stmt->fetch();

    return $medic['name'];
    var_dump($medic);
  }

}