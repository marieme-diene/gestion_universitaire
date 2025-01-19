<?php
// /models/Cours.php

class Cours {
    private $conn;
    private $table_name = "cours"; // Nom de la table

    // Propriétés du cours
    public $id;
    public $nom;  // Propriété nom du cours
    public $code; // Propriété code du cours
    public $nb_heures; // Propriété nombre d'heures

    // Constructeur
    public function __construct($db) {
        $this->conn = $db;
    }

    // Créer un cours
    public function create() {
        // Vérifier que les valeurs nécessaires sont présentes
        if (empty($this->nom) || empty($this->code) || empty($this->nb_heures)) {
            echo "Erreur : le nom, le code ou le nombre d'heures est manquant.";
            return false;
        }

        $query = "INSERT INTO " . $this->table_name . " (nom, code, nb_heures) VALUES (?, ?, ?)";

        // Préparer la requête
        $stmt = $this->conn->prepare($query);

        // Lier les paramètres
        $stmt->bind_param("ssi", $this->nom, $this->code, $this->nb_heures);

        // Exécuter la requête
        if ($stmt->execute()) {
            return true;
        }
        echo "Erreur lors de l'exécution de la requête : " . $stmt->error;  // Ajout d'une erreur explicite
        return false;
    }

    // Lire tous les cours
    public function read() {
        $query = "SELECT id, nom, code, nb_heures FROM " . $this->table_name;

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
            echo "Erreur lors de la suppression du cours : " . $stmt->error;
            return false;  // Erreur dans la suppression
        }
    }
    public function showCours($id) {
        // Requête SQL avec un paramètre
        $query = "SELECT id, nom, code, nb_heures FROM " . $this->table_name . " WHERE id = ?";
    
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
                return $result->fetch_assoc(); // Retourne un tableau associatif du cours
            } else {
                return null; // Aucun cours trouvé
            }
        } else {
            // Gérer une erreur de préparation de requête
            throw new Exception("Erreur lors de la préparation de la requête : " . $this->conn->error);
        }
    }
    public function updateCours($id, $nom, $code, $nb_heures) {
        // Requête SQL pour mettre à jour un cours
        $query = "UPDATE " . $this->table_name . " 
                  SET nom = ?, code = ?, nb_heures = ? 
                  WHERE id = ?";
    
        // Préparer la requête
        if ($stmt = $this->conn->prepare($query)) {
            // Associer les paramètres
            $stmt->bind_param("ssii", $nom, $code, $nb_heures, $id);
    
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