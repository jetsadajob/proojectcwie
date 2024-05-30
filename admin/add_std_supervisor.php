<?php
// เชื่อมต่อกับฐานข้อมูล
$conn = new mysqli("localhost", "root", "", "projectcwie");

// ตรวจสอบการเชื่อมต่อ
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// รับข้อมูลที่ส่งมาจาก AJAX
$selectedStudents = $_POST['selectedStudents'];
$response = array();

// ดึงข้อมูล major และ email จากฐานข้อมูลโดยใช้ชื่อนักศึกษา
foreach ($selectedStudents as $studentName) {
    $sql = "SELECT major, email FROM login_student WHERE name = '$studentName'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $response[] = array(
                'name' => $studentName,
                'major' => $row['major'],
                'email' => $row['email']
            );
        }
    }
}

// ส่งข้อมูลกลับในรูปแบบ JSON
echo json_encode($response);

// ปิดการเชื่อมต่อกับฐานข้อมูล
$conn->close();
?>
