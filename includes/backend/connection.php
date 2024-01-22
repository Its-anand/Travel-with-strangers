<?php
$server = "localhost";
$username = "anandcho_anand";
$password = "bw@44@k7Mu@RFRF";
// $username = "root";
// $password = "bw@44@k7Mu@RFRF";
$db = "anandcho_databases";

$con = new mysqli($server, $username, $password, $db);
// mysqli_set_charset($con, "utf8");
//  if ($con->connect_error) {
//      die("Connection failed: " . $con->connect_error);
//  }
//  echo "Connected successfully";
?>