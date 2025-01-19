<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion des Cours</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<a href="?controller=cours&page=create">create</a>
<table class="table">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Nom</th>
      <th scope="col">code</th>
      <th scope="col">Nombre d'heure</th>
      <th scope="col">Actions</th>
    </tr>
  </head>
  <body>
    <?php foreach ($cours as $e) :?>
    <tr>
      <th><?=$e['id']?></th>
      <td><?=$e['nom']?></td>
      <td><?=$e['code']?></td>
      <td><?=$e['nb_heures']?></td>
      <td>
        <a href="?page=editC&id=<?=$e['id']?>">EDIT</a>
        <a href="?action=deleteCours&id=<?=$e['id']?>">DELETE</a>
      </td>
    </tr>
    <?php endforeach;?>

  </tbody>
</table>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>


