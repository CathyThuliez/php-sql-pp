<?php

  $connection = new mysqli("localhost", "root", "abc003", "coursSQL1");

?>
<!DOCTYPE html>
<head>
  <meta charset="utf-8">
  <link rel="stylesheet" href="vendor/bootstrap-3.3.7-dist/css/bootstrap.min.css">
  <title>Creation d'un élève</title>
</head>
<body>
<?php

// Si on a reçu des paramètres en POST grâce au formulaire
if(isset($_POST["studentname"]) && $_POST["studentname"] != " ") {
  // On prépare la requête au serveur de base de données
  $request = sprintf("INSERT INTO eleves (id, firstname) VALUES ('', '%s')",
              $_POST["studentname"]);
  // On execute la requête
  if($connection->query($request)) {
      // Si on est ici, c’est que ça a marché
      printf("<div class='alert alert-success'>Eleve créé</div>");
  }
  else {
    // Si on est ici, c’est que ça a foiré. Message pour la gestion d’erreur MySQL
    printf("<div class='alert alert-warning'>Erreur: %s</div>", $connection->error);
  }
}

?>
  <form method="POST" class="form-horizontal">
  <fieldset>

  <!-- Form Name -->
  <legend>Créer un élève</legend>

  <!-- Text input-->
  <div class="form-group">
    <label class="col-md-4 control-label" for="studentname">Nom de l'élève</label>
    <div class="col-md-4">
    <input id="studentname" name="studentname" placeholder="Nom de l'élève" class="form-control input-md" required="" type="text">
    <span class="help-block">Indiquez ici le nom de l'élève</span>
    </div>
  </div>

  <!-- Button -->
  <div class="form-group">
    <label class="col-md-4 control-label" for="validate"></label>
    <div class="col-md-4">
      <button id="validate" name="validate" class="btn btn-primary">Valider</button>
    </div>
  </div>

  </fieldset>
  </form>
</body>
</html>
