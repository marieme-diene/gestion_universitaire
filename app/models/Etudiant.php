<?php 

class Etudiants {
    private $conn;
    private $table_name = "etudiants"; 

    public $id;
    public $nom;
    public $prenom;
    public $email;
    public $filiere;

    // Constructeur
    public function __construct($db) {
        $this->conn = $db;
    }

    // Créer un étudiant
    public function create() {
        // Vérifier que les valeurs nécessaires sont présentes
        if (empty($this->nom) || empty($this->prenom) || empty($this->email) || empty($this->filiere)) {
            echo "Erreur : le nom, le prénom, l'email ou la filière est manquant.";
            return false;
        }

        $query = "INSERT INTO " . $this->table_name . " (nom, prenom, email, filiere) VALUES (?, ?, ?, ?)";

        // Préparer la requête
        $stmt = $this->conn->prepare($query);

        // Lier les paramètres
        $stmt->bind_param("ssss", $this->nom, $this->prenom, $this->email, $this->filiere);

        // Exécuter la requête
        if ($stmt->execute()) {
            return true;
        }

        echo "Erreur lors de l'exécution de la requête : " . $stmt->error;  // Ajout d'une erreur explicite
        return false;
    }

    // Lire tous les étudiants
    public function read() {
        $query = "SELECT id, nom, prenom, email, filiere FROM " . $this->table_name;

        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result;
    }
    public function delete($id) {
        // Préparer la requête DELETE
        $query = "DELETE FROM " . $this->table_name . " WHERE id = ?";
    
        // Préparer la requête
        $stmt = $this->conn->prepare($query);
    
        // Lier l'ID à la requête préparée pour éviter les injections SQL
        $stmt->bind_param("i", $id);
    
        // Exécuter la requête
        if ($stmt->execute()) {
            return true;  // Suppression réussie
        } else {
            echo "Erreur lors de la suppression de l'etudiant: " . $stmt->error;
            return false;  // Erreur dans la suppression
        }
    }
    public function showEtudiants($id) {
        // Requête SQL avec un paramètre
        $query = "SELECT id, nom, prenom, email, filiere FROM " . $this->table_name . " WHERE id = ?";
    
        // Préparer la requête
        if ($stmt = $this->conn->prepare($query)) {
            // Associer le paramètre
            $stmt->bind_param("i", $id);
    
            // Exécuter la requête
            $stmt->execute();
    
            // Obtenir le résultat
            $result = $stmt->get_result();
    
            // Vérifier si le cours existe
            if ($result->num_rows > 0) {
                return $result->fetch_assoc(); // Retourne un tableau associatif d'un etudiants
            } else {
                return null; // Aucun etudiants trouvé
            }
        } else {
            // Gérer une erreur de préparation de requête
            throw new Exception("Erreur lors de la préparation de la requête : " . $this->conn->error);
        }
    }
    public function updateEtudiants($id, $nom, $prenom, $email, $filiere) {
        // Requête SQL pour mettre à jour un etudiants
        $query = "UPDATE " . $this->table_name . " 
                  SET nom = ?, prenom = ?, email = ?, filiere = ? 
                  WHERE id = ?";
    
        // Préparer la requête
        if ($stmt = $this->conn->prepare($query)) {
            // Associer les paramètres
            $stmt->bind_param("sssii", $nom, $prenom, $email, $filiere, $id);
    
            // Exécuter la requête
            if ($stmt->execute()) {
                // Vérifier si une ligne a été mise à jour
                if ($stmt->affected_rows > 0) {
                    return true; // Mise à jour réussie
                } else {
                    return false; // Aucun changement ou ID non trouvé
                }
            } else {
                // Gérer une erreur lors de l'exécution
                throw new Exception("Erreur lors de la mise à jour : " . $stmt->error);
            }
        } else {
            // Gérer une erreur de préparation de requête
            throw new Exception("Erreur lors de la préparation de la requête : " . $this->conn->error);
        }
    }

} 
?>
