<?php
  include("include/header.php");

if(isset($_POST["promotionname"]) && $_POST["promotionname"] != " ") {
  $request = sprintf("INSERT INTO promotions (id, name) VALUES ('', '%s')",
              $_POST["promotionname"]);
  if($connection->query($request)) {
      printf("<div class='alert alert-success'>Promotion créée</div>\n<a href='promotions.php'>Retour à la liste des promotions</a>");
  }
  else {
    printf("<div class='alert alert-warning'>Erreur: %s</div>", $connection->error);
  }
}

?>
  <form method="POST" class="form-horizontal">
  <fieldset>

  <legend>Créer une promotion</legend>

  <div class="form-group">
    <label class="col-md-4 control-label" for="promotionname">Nom de la promotion</label>
    <div class="col-md-4">
    <input id="promotionname" name="promotionname" placeholder="Nom de la promotion" class="form-control input-md" required="" type="text">
    <span class="help-block">Indiquez le nom de la promotion</span>
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
  <?php
  include("include/footer.php");
   ?>
