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
      while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $medicNames[] = $row['name'];
      }
      
      return $medicNames;
  
    } catch (PDOException $e) {
      error_log("Database Query Error: " . $e->getMessage(), 0);
      // Gérer l'exception...
    }
  }

  
  public function getMedicIdByName($name) {
    try {
      $query = "SELECT id FROM medictable WHERE name = :name LIMIT 1";
      $stmt = $this->db->prepare($query);
      $stmt->execute([':name' => $name]);

      return $stmt->fetchColumn();  // Retourne l'ID du médicament
    } catch (PDOException $e) {
      error_log("Erreur de requête à la base de données : " . $e->getMessage(), 0);
      // Gérez l'exception
    }
}

  public function addMedic($userId, $medicId) {
    try {
      $query = "INSERT INTO compose (id, num_ordonnance, taken) VALUES (:medicId, (SELECT num_ordonnance FROM ordonnance WHERE Id_utilisateur = :userId LIMIT 1), FALSE)";
      $stmt = $this->db->prepare($query);
      $stmt->execute([':userId' => $userId, ':medicId' => $medicId]);
    } catch (PDOException $e) {
      error_log("Erreur de requête à la base de données : " . $e->getMessage(), 0);
      // Gérez l'exception
    }
  }
  
  public function validateMedic($userId, $medicId) {
    try {
      $query = "UPDATE compose SET taken = TRUE WHERE id = :medicId AND num_ordonnance = (SELECT num_ordonnance FROM ordonnance WHERE Id_utilisateur = :userId LIMIT 1)";
      $stmt = $this->db->prepare($query);
      $stmt->execute([':userId' => $userId, ':medicId' => $medicId]);
    } catch (PDOException $e) {
      error_log("Erreur de requête à la base de données : " . $e->getMessage(), 0);
      // Gérez l'exception
    }
  }

  public function getMedicsByUser($userId) {
    $query = "SELECT medictable.name, compose.taken FROM compose 
              JOIN medictable ON compose.id = medictable.id
              WHERE compose.num_ordonnance = (SELECT num_ordonnance FROM ordonnance WHERE Id_utilisateur = :userId LIMIT 1)";
    $stmt = $this->db->prepare($query);
    $stmt->execute([':userId' => $userId]);

    return $stmt->fetchAll(PDO::FETCH_ASSOC);
    
}

  public function removeMedicFromUser($userId, $medicId) {
    try {
        // Préparer la requête SQL
        $query = "DELETE FROM ordonnance WHERE Id_utilisateur = :userId AND id = :medicId";
        $stmt = $this->db->prepare($query);
    
        // Exécuter la requête SQL
        $stmt->execute([':userId' => $userId, ':medicId' => $medicId]);
    } catch (PDOException $e) {
        error_log("Erreur de requête à la base de données : " . $e->getMessage(), 0);
        // Gérez l'exception ici
    }
  }

}
