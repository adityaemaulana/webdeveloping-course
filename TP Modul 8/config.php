<?php
  //config your database
  $host_NIM = "";
  $user_NIM = "";
  $password_NIM = "";
  $db_NIM = "";
  $conn = mysqli_connect($host, $user, $password, $database);

  if (mysqli_connect_errno()){
    die("Disconnect. ".mysqli_connect_error());
  } 
?>