<?php

// models/PillsModel.php

class PillsModel {
  private $db;

  public function __construct() {
    $this->db = Database::getInstance()->getConnection();
  }

  public function getMedicNames() {
    try {
      $query = "SELECT name FROM medictable";
      $stmt = $this->db->prepare($query);
      $stmt->execute();
  
      $medicNames = [];
      while ($name = $stmt->fetchColumn()) {
          $medicNames[] = $name;
      }
      return $medicNames;
    } catch (PDOException $e) {
      error_log("Erreur de requête à la base de données : " . $e->getMessage(), 0);
      // Gérez l'exception
    }
  }
}
