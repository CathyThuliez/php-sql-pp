<?php
include("../config/db.php");
$connection = new mysqli(
  $db_host,
  $db_user,
  $db_password,
  $db_base
);

if ($connection->connect_error) {
  printf(
    "Erreur de connexion.<br>Message d’erreur: %s<br>Code d’erreur: %s",
    $connection->connect_error,$connection->connect_error
  );
}
else {
  printf("On est connectés, hourra");
}
?>
