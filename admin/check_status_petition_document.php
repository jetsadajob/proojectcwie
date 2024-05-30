<?php
include './work/dbwork.php';

// สร้างคำสั่ง SQL เพื่อดึงค่า status_admin จากฐานข้อมูล
$id = $_GET['id']; // รับค่า id จาก URL
$sql = "SELECT status_admin FROM petition_document WHERE email = '$id'"; // เพิ่มเงื่อนไขตามที่ต้องการ

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // ดึงข้อมูล
    $row = $result->fetch_assoc();
    $status_admin = $row["status_admin"];
    
    // ส่งค่ากลับในรูปแบบ JSON
    echo json_encode(array("status_admin" => $status_admin));
} else {
    echo json_encode(array("status_admin" => "ไม่พบข้อมูล"));
}

$conn->close();
?>
