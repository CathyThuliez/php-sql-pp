<!DOCTYPE html>
<head>
  <meta charset="utf-8">
  <link rel="stylesheet" href="/node_modules/bootstrap/dist/css/bootstrap.min.css">
</head>
<body>

<?php

$connection = new mysqli("localhost", "coursSQL1", "1234", "coursSQL1");

if ($result = $connection->query("SELECT * FROM promotions")) {
    printf("\nLe résultat de la requête contient %d lignes", $result->num_rows);
    printf("\n<h1>Liste des promotions</h1>");
    printf("\n<select class='form-control' name='promotion'>");
    while ($row = $result->fetch_assoc()) {
      printf ("\n\t<option value='%s'>%s %s %s</option>",
        $row["id"], $row["name"], $row["startdate"], $row["enddate"]);
    }
    printf("\n</select>");
}
else {
  printf("Erreur dans la requête");
}
?>

</body>
</html>
