<?php

require_once './src/Database.php';

class UserModel {
    private $db;
    private $id;
    private $email;
    private $pseudo;
    private $password;
    private $firstname;
    private $lastname;
    private $ddn;


    public function __construct($db) {
        $this->db = $db;
    }

    public function getId() { 
        return $this->id; 
    }

    public function getEmail() { 
        return $this->email; 
    }

    public function getPseudo() { 
        return $this->pseudo; 
    }

    public function getFirstname() { 
        return $this->firstname; 
    }

    public function getLastname() { 
        return $this->lastname; 
    }

    public function getDdn() { 
        return $this->ddn; 
    }

    public function getPassword() {
        return $this->password;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function setPseudo($pseudo) {
        $this->pseudo = $pseudo;
    }

    public function setPassword($password) {
        $this->password = $password;
    }

    public function setFirstname($firstname) {
        $this->firstname = $firstname;
    }

    public function setLastname($lastname) {
        $this->lastname = $lastname;
    }

    public function setDdn($ddn) {
        $this->ddn = $ddn;
    }


    public function createUser() {
        $sql = "INSERT INTO utilisateur (email, pseudo, password, firstname, lastname, ddn) VALUES (:email, :pseudo, :password, :firstname, :lastname, :ddn)";
        $stmt = Database::getInstance()->getConnection()->prepare($sql);
    
        $stmt->bindParam(':email', $this->email);
        $stmt->bindParam(':pseudo', $this->pseudo);
        $stmt->bindParam(':password', $this->password);
        $stmt->bindParam(':firstname', $this->firstname);
        $stmt->bindParam(':lastname', $this->lastname);
        $stmt->bindParam(':ddn', $this->ddn);
    
        return $stmt->execute();
    }
   /* 
    public function getUserByUsername($username) {
        $db = Database::getInstance()->getConnection();
    
        $stmt = $db->prepare('SELECT * FROM utilisateur WHERE pseudo = :username');
        $stmt->bindParam(':username', $username);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_OBJ);
    
        return $user ? $user : null;
    }
    */
    public static function getUserByPseudo($pseudo) {
        $query = "SELECT * FROM utilisateur WHERE pseudo = :pseudo";
        $stmt = Database::getInstance()->getConnection()->prepare($query);
        $stmt->bindParam(':pseudo', $pseudo);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);

    }
    /*
    public static function getUserco($pseudo, $pass) {
        $pdo = Database::getInstance()->getConnection();
        $query = "SELECT * FROM utilisateur WHERE pseudo = :pseudo and password = :password";
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(':pseudo', $pseudo);
        $stmt->bindParam(':password', $pass);
        $stmt->execute();
        $res = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($res !== false) {
            return new self($res['Id_utilisateur'], $res['email'], $res['pseudo'], $res['password'], $res['firstname'], $res['lastname'],$res['ddn']);
        } else {
            return null;
        }
        
    }
*/
    public function getUserByEmail($email) {
        $db = Database::getInstance()->getConnection();
        $query = "SELECT * FROM utilisateur WHERE email = :email";
        $stmt = $db->prepare($query);
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    

}



