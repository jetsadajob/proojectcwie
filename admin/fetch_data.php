<?php
include './work/dbwork.php';
// รับค่าที่เลือกจาก dropdown
$selected_option = $_POST['selected_option'];

// สร้างคำสั่ง SQL ใหม่เพื่อคัดเลือกข้อมูลตามประเภทที่เลือก
$sql_advisor = "SELECT COUNT(*) FROM login_teacher WHERE role = 'advisor'";
$sql_supervision = "SELECT COUNT(*) FROM login_teacher WHERE role = 'supervision_teacher'";
$sql_course = "SELECT COUNT(*) FROM login_teacher WHERE role = 'course_instructor' ";

// นับจำนวนอาจารย์แต่ละประเภท
if ($selected_option == 'advisor') {
    $sql_advisor .= " AND major = '$major'";
} elseif ($selected_option == 'supervision') {
    $sql_supervision .= " AND major = '$major'";
} elseif ($selected_option == 'courseInstructor') {
    $sql_course .= " AND major = '$major'";
}

// ดึงข้อมูลจำนวนอาจารย์ตามประเภท
$advisorCount = mysqli_query($conn, $sql_advisor);
$supervisionCount = mysqli_query($conn, $sql_supervision);
$courseCount = mysqli_query($conn, $sql_course);

// ส่งข้อมูลกลับเป็น JSON
echo json_encode(array('advisorCount' => $advisorCount, 'supervisionCount' => $supervisionCount, 'courseCount' => $courseCount));

// ปิดการเชื่อมต่อฐานข้อมูล
$conn->close();
