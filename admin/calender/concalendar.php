<?php
$servername = "localhost";
$username = "root";
$password = "";
$concalendar = "projectcwie";

// Create connection
$conn = mysqli_connect($servername, $username, $password ,$concalendar);

// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

//echo "Connected successfully";
?>
