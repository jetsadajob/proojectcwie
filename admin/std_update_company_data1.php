
<?php
// เชื่อมต่อกับฐานข้อมูล
include './work/dbwork.php';

$year = $_GET['year'];

// ตรวจสอบว่าค่าที่ส่งมาคือ 'all' หรือไม่
if($year === "ทั้งหมด") {
    // SQL query สำหรับดึงข้อมูลทั้งหมด
    $sql = "SELECT  role, COUNT(*) AS count FROM hr GROUP BY  role";
} else {
    // SQL query สำหรับดึงข้อมูลตามปีที่เลือก
    $sql = "SELECT role, COUNT(*) AS count FROM hr WHERE YEAR(created_at) = '$year' GROUP BY role";
}

$result = $conn->query($sql);

$graphData1 = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $graphData1[] = $row;
    }
}

echo json_encode($graphData1);
?>


