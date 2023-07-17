<?php

// models/PillsModel.php

class PillsModel {
  private $db;

  public function __construct() {
    $this->db = Database::getInstance()->getConnection();
  }

  public function getMedicNames() {
    $query = "SELECT name FROM medictable";
    $stmt = $this->db->prepare($query);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_COLUMN, 0);
  }
}
