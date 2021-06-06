<?php
  $servername = "localhost";
  $username = "root";
  $password = "";
  $db_name = "course_db";

  //create connection
  $conn = mysqli_connect($servername, $username, $password, $db_name);

  //check connection

  if(!$conn){
    die("Connection Error");
  }
?>
