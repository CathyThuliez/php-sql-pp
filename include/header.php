<?php

include("config/db.php");
$connection = new mysqli(
  $db_host,
  $db_user,
  $db_password,
  $db_base
);

?>
<!DOCTYPE html>
<head>
  <meta charset="utf-8">
  <link rel="stylesheet" href="vendor/bootstrap-3.3.7-dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="css/style.css">

  <script type="text/javascript" src="vendor/bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>
  <title>TP PHP: Gestion des promotions et des élèves</title>
</head>
<body>
  <nav class="navbar navbar-default">
    <div class="container-fluid">
      <div class="nav">
        <ul class="nav navbar-nav">
          <li><a href="/">Accueil</a></li>
          <li><a href="promotions.php">Promotions</a></li>
          <li><a href="students.php">Elèves</a></li>
          <li><a href="create_promotion.php">Ajouter une promotion</a></li>
          <li><a href="create_student.php">Ajouter un élève</a></li>
        </ul>
      </div>
    </div>
  </nav>
