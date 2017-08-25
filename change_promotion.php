<?php
  include("include/header.php");


  if (isset($_GET["id"]) && $_GET["id"] != "" && $_GET["id"] != 0) {

    if (isset($_POST["promotionname"]) && $_POST["promotionname"] != " ") {
      $request = sprintf("UPDATE promotions SET name='%s' WHERE id='%s'",
                  $_POST["promotionname"], $_POST["id"]);
      if($connection->query($request)) {
          printf("<div class='alert alert-success'>Promotion modifiée</div>\n<a href='promotions.php'>Retour à la liste des promotions</a>");
      }
      else {
        printf("<div class='alert alert-warning'>Erreur: %s</div>", $connection->error);
      }
    }

    $request = sprintf("SELECT * FROM promotions WHERE id=%s", $_GET["id"]);
    $result = $connection->query($request);
    $promotion = $result->fetch_assoc();
  }
  else {
    printf("<div class='alert alert-danger'>Pas d’ID renseigné</div>");
    die();
  }
?>
  <form method="post" class="form-horizontal">
  <fieldset>

  <legend>Modifier une promotion</legend>

  <div class="form-group">
    <label class="col-md-4 control-label" for="promotionname">Nom de la promotion</label>
    <div class="col-md-4">
    <input id="promotionname" name="promotionname"
    placeholder="Nom de la promotion" class="form-control input-md"
    required="" value="<?php printf("%s",$promotion["name"]); ?>"
    type="text">
    <span class="help-block">Indiquez le nom de la promotion</span>
    </div>
  </div>

  <div class="form-group">
    <label class="col-md-4 control-label" for="validate"></label>
    <div class="col-md-4">
      <input type="hidden" name="id" value="<?php printf("%s", $promotion["id"]);?>">
      <button id="validate" name="validate" class="btn btn-primary">Valider</button>
    </div>
  </div>

  </fieldset>
  </form>
  <?php
  include("include/footer.php");
   ?>
