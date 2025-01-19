<!-- /views/form.php -->

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion des Cours</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2>Modifier un Cours</h2>
        <form action="http://localhost/gestion_universitaire/public/index.php?action=update&idC=<?=$cours['id']?>" method="POST">
          <input type="text" class="form-control" id="nom" name="id" value="<?=$cours['id']?>" hidden required>

            <div class="mb-3">
                <label for="nom_cours" class="form-label">Nom du Cours</label>
                <input type="text" class="form-control" id="nom" name="nom" value="<?=$cours['nom']?>" required>
            </div>
            <div class="mb-3">
                <label for="code_cours" class="form-label">Code du Cours</label>
                <input type="text" class="form-control" id="code" name="code" value="<?=$cours['code']?>" required>
            </div>
            <div class="mb-3">
                <label for="nb_heures" class="form-label">Nombre d'Heures</label>
                <input type="number" class="form-control" id="nb_heures" name="nb_heures" value="<?=$cours['nb_heures']?>" required>
            </div>
            <button type="submit" class="btn btn-primary">Modifier</button>
        </form>
        <a href="http://localhost/gestion_universitaire/public/index.php?page=listeCours" class="btn btn-primary">liste des cours</a>

    </div>

    

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
