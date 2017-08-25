<?php
include("config/db.php");
$connection = new mysqli(
  $db_host,
  $db_user,
  $db_password,
  $db_base
);

$_POST = json_decode($_POST);
$request = sprintf("INSERT INTO promotions (id, name) VALUES
                id='',
                name='%s'
                ",
                $_POST["promotionname"]);
if($connection->query($request)) {
  echo json_encode("success");
}
else {
  echo json_encode("failure");
}
?>
