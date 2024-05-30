<?php
include 'dbwork.php';


$id = $_GET['id']; 
echo "<script> window.location.href = '../hr.php'; </script>";
$sql = "DELETE FROM job_recruitment WHERE recruitment_id='$id'";

if (mysqli_query($conn, $sql)) {
    
} else {
    echo "ไม่สามารถลบข้อมูลได้: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
?>
