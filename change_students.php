<?php

  $connection = new mysqli("localhost", "root", "azertypoiu003", "coursSQL1");

?>
<!DOCTYPE html>
<head>
  <meta charset="utf-8">
  <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css">
  <title>Modifier un élève</title>
</head>
<body>
<?php
  // Si on n’a pas de id dans les paramètres de l’URL, on bloque la page
  if (isset($_GET["id"]) && $_GET["id"] != "" && $_GET["id"] != 0) {

    // Si on a des variables en POST, on tente de modifier la promotion ciblée
    if (isset($_POST["studentname"]) && $_POST["studentname"] != " ") {
      $request = sprintf("UPDATE promotions SET name='%s' WHERE id='%s'",
                  $_POST["studentname"], $_POST["id"]);
      if($connection->query($request)) {
          printf("<div class='alert alert-success'>Elève modifié</div>");
      }
      else {
        // Gestion d’erreur SQL
        printf("<div class='alert alert-warning'>Erreur: %s</div>", $connection->error);
      }
    }

    // On a un id en GET, on sélectionne la promotion et ses informations
    $request = sprintf("SELECT * FROM eleves WHERE id=%s", $_GET["id"]);
    $result = $connection->query($request);
    $eleves = $result->fetch_assoc();
  }
  else {
    // message d’alerte si on n’a pas d’id en paramètre d’URL
    printf("<div class='alert alert-danger'>Pas d’ID renseigné</div>");
    die();
  }
?>
  <form method="post" class="form-horizontal">
  <fieldset>

  <!-- Form Name -->
  <legend>Modifier un élève</legend>

  <!-- Text input
  Notez les balises PHP qui permettent l’affichage dynamique -->
  <div class="form-group">
    <label class="col-md-4 control-label" for="studentname">Nom de l'élève</label>
    <div class="col-md-4">
    <input id="studentname" name="studentname"
    placeholder="Nom de la promotion" class="form-control input-md"
    required="" value="<?php printf("%s",$promotion["name"]); ?>"
    type="text">
    <span class="help-block">Indiquez ici le nom de l'élève</span>
    </div>
  </div>

  <!-- Button -->
  <div class="form-group">
    <label class="col-md-4 control-label" for="validate"></label>
    <div class="col-md-4">
      <input type="hidden" name="id" value="<?php printf("%s", $promotion["id"]);?>">
      <button id="validate" name="validate" class="btn btn-primary">Valider</button>
    </div>
  </div>

  </fieldset>
  </form>
</body>
</html>
