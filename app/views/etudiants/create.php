<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion des Étudiants</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2>Ajouter / Modifier un Étudiant</h2>
        <!-- Formulaire de soumission -->
        <form action="http://localhost/gestion_universitaire/public/index.php?action=ajouterEtudiants" method="POST">
            <div class="form-group">
                <label for="nom">Nom</label>
                <input type="text" class="form-control" id="nom" name="nom" required>
            </div>
            <div class="form-group">
                <label for="prenom">Prénom</label>
                <input type="text" class="form-control" id="prenom" name="prenom" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="filiere">Filière</label>
                <input type="text" class="form-control" id="filiere" name="filiere" required>
            </div>
            <button type="submit" class="btn btn-primary mt-3" name="submit">Enregistrer</button>
        </form>
        <a href="http://localhost/gestion_universitaire/public/index.php?page=listeEtudiants" class="btn btn-primary">liste des etudiants</a>

    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
