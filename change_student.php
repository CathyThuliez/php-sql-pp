<?php
  include("include/header.php");
  header("Access-Control-Allow-Origin: *");

  if (isset($_GET["id"]) && $_GET["id"] != "" && $_GET["id"] != 0) {

    if (isset($_POST["firstname"]) && isset($_POST["lastname"]) && isset($_POST["promotion_id"])) {
      $request = sprintf("UPDATE eleves SET
                                      firstname='%s',
                                      lastname='%s',
                                      promotion_id=%s
                                      WHERE id='%s'",
                                      $_POST["firstname"],
                                      $_POST["lastname"],
                                      $_POST["promotion_id"],
                                      $_POST["id"]);
      if($connection->query($request)) {
          printf("<div class='alert alert-success'>Eléve modifié</div>\n<a href='students.php'>Retour à la liste des élèves</a>");
      }
      else {
        printf("<div class='alert alert-warning'>Erreur: %s</div>", $connection->error);
      }
    }

    $request = sprintf("SELECT * FROM eleves WHERE id=%s", $_GET["id"]);
    $result = $connection->query($request);
    $student = $result->fetch_assoc();
  }
  else {
    printf("<div class='alert alert-danger'>Pas d’ID renseigné</div>");
    die();
  }
?>
  <form method="post" class="form-horizontal">
  <fieldset>

  <legend>Modifier un élève</legend>

  <div class="form-group">
    <label class="col-md-4 control-label" for="firstname">Prénom</label>
    <div class="col-md-4">
    <input id="firstname" name="firstname"
    placeholder="Prénom" class="form-control input-md"
    required="" value="<?php printf("%s",$student["firstname"]); ?>"
    type="text">
    <span class="help-block">Indiquez le prénom de l’élève</span>
    </div>
  </div>
  <div class="form-group">
    <label class="col-md-4 control-label" for="lastname">Nom</label>
    <div class="col-md-4">
    <input id="lastname" name="lastname"
    placeholder="Nom" class="form-control input-md"
    required="" value="<?php printf("%s",$student["lastname"]); ?>"
    type="text">
    <span class="help-block">Indiquez le nom de l’élève</span>
    </div>
  </div>

  <div class="form-group">
    <label class="col-md-4 control-label" for="promotion_id">Promotion</label>
    <div class="col-md-4">
      <select id="promotion_id" name="promotion_id" class="form-control">
        <option value="1">Aeris Gainsborough</option>
        <option value="2">Squall Léonheart</option>
      </select>
    </div>
  </div>

  <div class="form-group">
    <label class="col-md-4 control-label" for="validate"></label>
    <div class="col-md-4">
      <input type="hidden" name="id" value="<?php printf("%s", $student["id"]);?>">
      <button id="validate" name="validate" class="btn btn-primary">Valider</button>
    </div>
  </div>

  </fieldset>
  </form>
  <?php
  include("include/footer.php");
   ?>
