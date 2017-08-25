<!DOCTYPE html>
<head>
  <meta charset="iso-8859-1">
  <title></title>
  <link rel="stylesheet" href="../vendor/bootstrap-3.3.7-dist/css/bootstrap.min.css" />
</head>
<body>

<?php

$connection = new mysqli("localhost", "root", "azertypoiu003", "coursSQL1");

if ($result = $connection->query("SELECT * FROM eleves")) {
  printf("\nLe résultat de la requête contient %d lignes.\n", $result->num_rows);
  printf("\n<ul>");
  while ($row = $result->fetch_assoc()) {
    printf ("\n<li>%s %s %s %s</li>",  $row["id"], $row["firstname"], $row["lastname"], $row["city"]);
  }
}
else {
  printf("tu t'es planté");
}
?>
</ul>
</body>
</html>
