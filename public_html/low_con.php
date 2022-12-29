<?php
  $hostname = "localhost";
  $username = "root";
  $password = "";
  $dbname = "id19159302_dbname";

  $conn = mysqli_connect($hostname, $username, $password, $dbname);
  if(!$conn){
    echo "Database connection error".mysqli_connect_error();
  }
?>