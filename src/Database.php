<?php

class Database {

    private $host = 'localhost';
    private $dbname = 'pills';
    private $username = 'root';
    private $password = '';
    private $db;
    private static $instance = null;

    public function __construct() {
        // Connexion à la base de données
        try {
            $this->db = new PDO('mysql:host='.$this->host.';dbname='.$this->dbname.';charset=utf8', $this->username, $this->password);
        } catch(PDOException $e) {
            die('Erreur de connexion à la base de données : '.$e->getMessage());
        }
    }

    public static function getInstance() {
        if (self::$instance == null) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    public function query($sql, $params = []) {
        // Exécution d'une requête SQL
        $statement = $this->db->prepare($sql);
        $statement->execute($params);
        return $statement;
    }

    public function getConnection() {
        return $this->db;
    }

    public function close() {
        $this->db = null;
    }
}



