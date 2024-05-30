<?php
$servername = "localhost";
$username = "root"; // or your database username
$password = ""; // or your database password
$dbwork = "projectcwie";

// Create connection
$conn = mysqli_connect($servername, $username, $password ,$dbwork);

// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
$pdo = new PDO("mysql:host=$servername;dbname=$dbwork", $username, $password);
// Set the PDO error mode to exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//echo "Connected successfully";
?>
