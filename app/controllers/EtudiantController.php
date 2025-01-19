<?php
// /controllers/EtudiantController.php
include_once '../app/models/Etudiant.php';
include_once '../app/database.php';
class EtudiantController {
    private $conn;
    private $etudiants;

    // Constructeur
    public function __construct() {
        $database = new Database();
        $this->conn = $database->getConnection();
        $this->etudiants = new Etudiants($this->conn); 
    }

    public function createEtudiant($nom, $prenom, $email, $filiere) {
        $this->etudiants->nom = $nom;
        $this->etudiants->prenom = $prenom;
        $this->etudiants->email = $email;
        $this->etudiants->filiere = $filiere;

        if ($this->etudiants->create()) {
            return true;
        }
        return false;
    }
    

    public function afficherEtudiants() {
        $stmt = $this->etudiants->read();
        return $stmt;
        }
        public function deleteEtudiant($id) {
            $stmt = $this->etudiants->delete($id);
            return $stmt;
        }
        public function showEtudiants($id) {
            $stmt = $this->etudiants->showEtudiants($id);
            return $stmt;
        }
       public function updateEtudiants($id, $nom, $prenom, $email, $filiere){
        $stmt = $this->etudiants->updateEtudiants($id, $nom, $prenom, $email, $filiere);
        return $stmt;
       }
    }
?>
