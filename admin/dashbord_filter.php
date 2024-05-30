<?php
// เชื่อมต่อฐานข้อมูล
$conn = new mysqli("localhost", "root", "", "projectcwie");

// ตรวจสอบการเชื่อมต่อ
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// ดึงจำนวนนักศึกษาฝึกงาน
$sql_coop = "SELECT COUNT(*) FROM login_student WHERE role = 'cooperative_student'";
$result_coop = $conn->query($sql_coop);
$coopCount = $result_coop->fetch_row()[0];

// ดึงจำนวนนักศึกษาสหกิจศึกษา
$sql_intern = "SELECT COUNT(*) FROM login_student WHERE role = 'internship_student'";
$result_intern = $conn->query($sql_intern);
$internCount = $result_intern->fetch_row()[0];

$conn->close();
?>
