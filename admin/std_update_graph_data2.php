

<?php
// เชื่อมต่อกับฐานข้อมูล
include './work/dbwork.php';

$year = $_GET['year'];

// ตรวจสอบว่าค่าที่ส่งมาคือ 'all' หรือไม่
if($year === "ทั้งหมด") {
    // SQL query สำหรับดึงข้อมูลทั้งหมด
    $sql = "SELECT major, role, COUNT(*) AS count FROM login_student GROUP BY major, role";
} else {
    // SQL query สำหรับดึงข้อมูลตามปีที่เลือก
    $sql = "SELECT major, role, COUNT(*) AS count FROM login_student WHERE YEAR(created_at) = '$year' GROUP BY major, role";
}

$result = $conn->query($sql);

$graphData2 = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $graphData2[] = $row;
    }
}

echo json_encode($graphData2);
?>

