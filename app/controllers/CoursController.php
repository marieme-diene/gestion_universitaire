
<?php
// /controllers/CoursController.php
include_once '../app/models/Cours.php';
include_once '../app/database.php';

class CoursController {
    private $conn;
    private $cours;

    public function __construct() {
        // Connexion à la base de données
        $database = new Database();
        $this->conn = $database->getConnection();

        // Initialiser le modèle
        $this->cours = new Cours($this->conn);
    }

    // Créer un nouveau cours
    public function createCours($nom, $code, $nb_heures) {
        // Affecter les propriétés du modèle
        $this->cours->nom = $nom;
        $this->cours->code = $code;
        $this->cours->nb_heures = $nb_heures;

        // Appeler la méthode pour créer le cours
        if ($this->cours->create()) {
            return true;
        }
        return false;
    }

    // Afficher tous les cours
    public function afficherCours() {
        $stmt = $this->cours->read();
        return $stmt;
    }
    public function deleteCours($id) {
        $stmt = $this->cours->delete($id);
        return $stmt;
    }
    public function showCours($id) {
        $stmt = $this->cours->showCours($id);
        return $stmt;
    }
   public function updateCours($id, $nom, $code, $nb_heures){
    $stmt = $this->cours->updateCours($id, $nom, $code, $nb_heures);
    return $stmt;
   }
}
?>