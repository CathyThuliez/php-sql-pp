<?php
  include("config/db.php");
  $connection = new mysqli(
    $db_host,
    $db_user,
    $db_password,
    $db_base
  );

  $request = "SELECT * FROM promotions";
  $result = $connection->query($request);

  while ($row = $result->fetch_assoc()) {
    $promotions[] = $row;
  }
  echo json_encode($promotions);
?>
