<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <title>Formulaire</title>
  </head>
  <body>
    <?php

    $connection = new mysqli("localhost", "root", "azertypoiu003", "coursSQL1");

    if ($result = $connection->query("SELECT * FROM promotions")) {
      printf("\nLe résultat de la requête contient %d lignes.\n", $result->num_rows);
      printf("\n<ul>");
      while ($row = $result->fetch_assoc()) {
        printf ("\n<li>%s %s</li>",  $row["id"], $row["name"]);
      }
    }
    else {
      printf("tu t'es planté");
    }
    ?>
  </ul>
  </body>
</html>
