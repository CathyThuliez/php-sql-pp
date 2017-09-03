<?php
include("config/db.php");
$connection = new mysqli(
  $db_host,
  $db_user,
  $db_password,
  $db_base
);

$_POST = json_decode($_POST);
$request = sprintf("DELETE promotions SET
                name='%s'
                WHERE id='%s'
                ",
                $_POST["name"],
                $_POST["id"]);
if($connection->query($request)) {
  echo json_encode("success");
}
else {
  echo json_encode("failure");
}
?>
