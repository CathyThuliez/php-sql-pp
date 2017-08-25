<?php
include("config/db.php");
$connection = new mysqli(
  $db_host,
  $db_user,
  $db_password,
  $db_base
);

$_POST = json_decode($_POST);
$request = sprintf("INSERT INTO eleves (id, firstname, lastname, promotion_id) VALUES
                id='',
                firstname='%s',
                lastname='%s',
                promotion_id='%s'
                ",
                $_POST["studentname"]);
if($connection->query($request)) {
  echo json_encode("success");
}
else {
  echo json_encode("failure");
}
?>
