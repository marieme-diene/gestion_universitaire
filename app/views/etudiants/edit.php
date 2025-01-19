<!-- /views/form.php -->

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion des Etudiants</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2>Modifier un etudiants</h2>
        <form action="http://localhost/gestion_universitaire/public/index.php?action=update&idE=<?=$etudiants['id']?>" method="POST">
          <input type="text" class="form-control" id="nom" name="id" value="<?=$etudiants['id']?>" hidden required>

            <div class="mb-3">
                <label for="nom_" class="form-label">Nom de l'etudiant</label>
                <input type="text" class="form-control" id="nom" name="nom" value="<?=$etudiants['nom']?>" required>
            </div>
            <div class="mb-3">
                <label for="prenom" class="form-label">Prenom de l'etudiant</label>
                <input type="text" class="form-control" id="prenom" name="prenom" value="<?=$etudiants['prenom']?>" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" value="<?=$etudiants['email']?>" required>
            </div>
            <div class="mb-3">
                <label for="filiere" class="form-label">Filiere</label>
                <input type="text" class="form-control" id="filiere" name="filiere" value="<?=$etudiants['filiere']?>" required>
            </div>
            <button type="submit" class="btn btn-primary">Modifier</button>
        </form>
        <a href="http://localhost/gestion_universitaire/public/index.php?page=listeEtudiants" class="btn btn-primary">liste des etudiants</a>

    </div>

    

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
