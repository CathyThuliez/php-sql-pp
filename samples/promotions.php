<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Promotions</title>
    <link rel="stylesheet" href="../vendor/bootstrap-3.3.7-dist/css/bootstrap.min.css" />

  </head>
  <body>
    <form class="form-horizontal">
    <fieldset>
    <!-- Form Name -->
    <legend>Liste des promotions</legend>
    <!-- Button double -->
<?php
$connection = new mysqli("localhost", "cours1", "0258", "coursSQL1");

    if ($result = $connection->query("SELECT * FROM promotions")) {
      while ($row = $result->fetch_assoc()) {
        printf ('
        <div class="form-group">
          <label class="col-md-4 control-label" for="edit_button1">%s - %s</label>
          <div class="col-md-8">
            <button id="edit_button%s" name="edit%s" class="btn btn-success">Éditer</button>
            <button id="del_button%s" name="del%s" class="btn btn-danger">Supprimer</button>
          </div>
        </div>
        ',
        $row["name"],
        $row["id"],
        $row["id"],
        $row["id"],
        $row["id"],
        $row["id"]
      );
    }
  }
    ?>
  </fieldset>
</form>
  </body>
</html>
