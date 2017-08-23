<?php

  $connection = new mysqli("localhost", "coursSQL1", "1234", "coursSQL1");

?>
<!DOCTYPE html>
<head>
  <meta charset="utf-8">
  <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css">
  <title>Liste des promotions</title>
</head>
<body>
  <form class="form-horizontal">
    <fieldset>

      <!-- Form Name -->
      <legend>Liste des promotions</legend>

      <!-- Button (Double) -->
      <?php
      if ($result = $connection->query("SELECT * FROM promotions")) {
            while ($row = $result->fetch_assoc()) {
              printf('
                <div class="form-group">
                  <label class="col-md-4 control-label" for="edit_button">%s n°%s</label>
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
