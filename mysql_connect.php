<?php
  DEFINE('DB_USER', 'FLITDB');
  DEFINE('DB_PASSWORD', 'MobileAppLab2016!');
  DEFINE('DB_HOST', '68.178.143.157');
  DEFINE('DB_NAME', 'FLITDB');
  
  $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME)
  OR die('Could not connect to FLIT Database! ' . mysqli_connect_error());
?>
