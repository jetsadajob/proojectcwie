<!-- <?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "projectcwie";


$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?> -->


<?php
$servername = "localhost";
$username = "root"; // or your database username
$password = ""; // or your database password
$dbname = "projectcwie";

try {
    $db = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "&nbsp;"; 
} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>
