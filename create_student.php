<?php
include("include/header.php");
header("Access-Control-Allow-Origin: *");

if(isset($_POST["studentname"]) && $_POST["studentname"] != " ") {
  $request = sprintf("INSERT INTO eleves (id, firstname) VALUES ('', '%s')", $_POST["studentname"]);
  if($connection->query($request)) {
        printf("<div class='alert alert-success'>Elève créé</div>\n<a href='students.php'>Retour à la liste des élèves</a>");
  }
  else {
    printf("<div class='alert alert-warning'>Erreur: %s</div>", $connection->error);
  }
}

?>
  <form method="POST" class="form-horizontal">
  <fieldset>

  <legend>Créer un élève</legend>

  <div class="form-group">
    <label class="col-md-4 control-label" for="studentname">Nom de l'élève</label>
    <div class="col-md-4">
    <input id="studentname" name="studentname" placeholder="Nom de l'élève" class="form-control input-md" required="" type="text">
    <span class="help-block">Indiquez le nom de l'élève</span>
    </div>
  </div>

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
