<?php
// /config/database.php

class Database {
    private $host = "localhost";
    private $db_name = "gestion_universitaire"; // Remplacez par votre base de données
    private $username = "root";
    private $password = "";
    public $conn;

    // Connexion à la base de données
    public function getConnection() {
        $this->conn = null;

        try {
            $this->conn = new mysqli($this->host, $this->username, $this->password, $this->db_name);
            if ($this->conn->connect_error) {
                throw new Exception("Connexion échouée : " . $this->conn->connect_error);
            }
        } catch (Exception $e) {
            echo "Erreur : " . $e->getMessage();
        }

        return $this->conn;
    }
}
?>
