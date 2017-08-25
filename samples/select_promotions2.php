<!DOCTYPE html>
<head>
  <meta charset="utf-8">
</head>
<body>

<?php

$connection = new mysqli("localhost", "coursSQL1", "1234", "coursSQL1");

if ($result = $connection->query("SELECT * FROM promotions")) {
    printf("\nLe résultat de la requête contient %d lignes", $result->num_rows);
    printf("\n<ul>");
    while ($row = $result->fetch_assoc()) {
      printf ("\n<li>%s du %s au %s %s</li>", $row["name"], $row["startdate"], $row["enddate"], $row["id"]);
    }
}
else {
  printf("Erreur dans la requête");
}
?>

</ul>
</body>
</html>
