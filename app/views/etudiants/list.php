<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion des etudiants</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<a href="?controller=etudiants&page=create">create</a>
<table class="table">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">nom</th>
      <th scope="col">prenom</th>
      <th scope="col">email</th>
      <th scope="col">filiere</th>
      <th scope="col">Actions</th>
    </tr>
  </head>
  <body>

    <?php foreach ($etudiants as $e) :?>
        
    <tr>
      <th><?=$e['id']?></th>
      <td><?=$e['nom']?></td>
      <td><?=$e['prenom']?></td>
      <td><?=$e['email']?></td>
      <td><?=$e['filiere']?></td>
      

      <td>
        <a href="?page=editE&id=<?=$e['id']?>">EDIT</a>
        <a href="?action=deleteEtudiants&id=<?=$e['id']?>">DELETE</a>
      </td>
    </tr>

    <?php endforeach;?>
  </body>
</table>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>


