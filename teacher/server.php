<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbwork = "projectcwie";

// Create connection
$conn = mysqli_connect($servername, $username, $password ,$dbwork);

// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

//echo "Connected successfully";
?>