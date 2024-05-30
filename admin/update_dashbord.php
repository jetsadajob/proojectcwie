<?php
// สมมติว่าคุณได้ตั้งค่าการเชื่อมต่อฐานข้อมูลแล้ว
include './work/dbwork.php'; // สมมติว่าคุณมีไฟล์นี้เพื่อการเชื่อมต่อฐานข้อมูล

$year = $_POST['year'] ?? 'ทั้งหมด';
$type = $_POST['type'] ?? 'ทั้งหมด';

// ตัวอย่างคำสั่ง SQL, ปรับแต่งตามโครงสร้างฐานข้อมูลของคุณ
$sql = "SELECT COUNT(*) as total FROM login_student WHERE 1=1";
if ($year !== 'ทั้งหมด') {
    $sql .= " AND academic_year = '$year'";
}
if ($type !== 'ทั้งหมด') {
    $role = $type === 'นักศึกษาฝึกงาน' ? 'internship_student' : 'cooperative_student';
    $sql .= " AND role = '$role'";
}

$result = $conn->query($sql);
$row = $result->fetch_assoc();

echo json_encode(['totalUsers' => $row['total']]);
