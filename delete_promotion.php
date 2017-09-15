<?php
  include("include/header.php");
  header("Access-Control-Allow-Origin: *");

  if (isset($_GET["id"]) && $_GET["id"] != "" && $_GET["id"] != 0) {

    if (isset($_POST["user_validation"]) && $_POST["user_validation"] == 1) {
      $request = sprintf("DELETE FROM promotions WHERE id='%s'", $_POST["id"]);
      if($connection->query($request)) {
          printf("<div class='alert alert-success'>Promotion supprimée</div>\n<a href='promotions.php'>Retour à la liste des promotions</a>");
          die();
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

  <legend>Supprimer une promotion</legend>

  <div class="form-group">
    <label class="col-md-4 control-label" for="promotionname">Nom de la promotion</label>
    <div class="col-md-4">
    <input id="promotionname" name="promotionname"
    placeholder="Nom de la promotion" class="form-control input-md"
    required="" value="<?php printf("%s",$promotion["name"]); ?>"
    type="text" disabled="true">
    </div>
  </div>

  <div class="form-group">
    <label class="col-md-4 control-label" for="user_validation">Etes-vous sûr de vouloir supprimer cette promotion ?</label>
    <div class="col-md-4">
      <div class="checkbox">
        <label for="user_validation-0">
          <input name="user_validation" id="user_validation-0" value="1" type="checkbox">
          Oui
        </label>
      </div>
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
