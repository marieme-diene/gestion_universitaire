<?php
// index.php
include_once '../app/controllers/CoursController.php';
include_once '../app/controllers/EtudiantController.php';
// Instancier le contrôleur
$coursController = new CoursController();

// Si une action de soumission du formulaire est effectuée
if (isset($_GET['action']) && $_GET['action'] == 'ajouter') {
   
    // Si le formulaire est soumis
        // Appeler la méthode pour créer un cours
        $nom_cours = $_POST['nom_cours'];
        $code_cours = $_POST['code_cours'];
        $nb_heures = $_POST['nb_heures'];

        if ($coursController->createCours($nom_cours, $code_cours, $nb_heures)) {
            echo "Cours ajouté avec succès !";
        } else {
            echo "Échec de l'ajout du cours.";
        }

    }

    // Inclusion de la connexion à la base de données
    $etudiantsController = new EtudiantController();

    if (isset($_GET['action']) && $_GET['action'] == 'ajouterEtudiants') {
        // Récupérer les données du formulaire
        $nom = $_POST['nom'];
        $prenom = $_POST['prenom'];
        $email = $_POST['email'];
        $filiere = $_POST['filiere'];
    
        // Insertion dans la base de données
        if ($etudiantsController->createEtudiant($nom, $prenom, $email, $filiere)){
        
            echo "Nouvel étudiant ajouté avec succès!";
        } else {
            echo "Erreur de l'ajout d'etudiants." ;
        }
    }
    if (isset($_GET['page']) && $_GET['page'] == "listeCours"){
        $cours = $coursController->afficherCours();
      include_once ("../app/views/cours/list.php");
    }
    if(isset($_GET['action']) && $_GET['action'] == "deleteCours"){
        if(isset($_GET['id'])){
       $coursController->deleteCours($_GET['id']);
       header("location:http://localhost/gestion_universitaire/public/index.php?page=listeCours");

            }
        }
            if (isset($_GET['page']) && $_GET['page'] == "listeEtudiants"){
                $etudiants = $etudiantsController->afficherEtudiants();
              include_once ("../app/views/etudiants/list.php");
            }
        
            if(isset($_GET['action']) && $_GET['action'] == "deleteEtudiants"){
                if(isset($_GET['id'])){
               $etudiantsController->deleteEtudiant($_GET['id']);
               header("location:http://localhost/gestion_universitaire/public/index.php?page=listeEtudiants");
             }
     }
     if (isset($_GET['page']) && $_GET['page'] == "editC"){
        if(isset($_GET['id'])){
            $cours=$coursController->showCours($_GET['id']);
            include_once ("../app/views/cours/edit.php");

          }
          
    }
    if (isset($_GET['action']) && $_GET['action'] == "update"){
        if(isset($_GET['idC'])){
            extract($_POST);
            $cours=$coursController->updateCours($id,$nom,$code,$nb_heures);
            header("location:http://localhost/gestion_universitaire/public/index.php?page=listeCours");

          }
        }
        if (isset($_GET['page']) && $_GET['page'] == "editE"){
            if(isset($_GET['id'])){
                $etudiants=$etudiantsController->showEtudiants($_GET['id']);
                include_once ("../app/views/etudiants/edit.php");
    
              }
              
        }
        if (isset($_GET['action']) && $_GET['action'] == "update"){
            if(isset($_GET['idE'])){
                extract($_POST);
                $etudiants=$etudiantsController->updateEtudiants($id,$nom,$prenom,$email,$filiere);
                header("location:http://localhost/gestion_universitaire/public/index.php?page=listeEtudiants");
    
              }
            }
?>
