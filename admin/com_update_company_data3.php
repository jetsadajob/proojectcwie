<?php
// เชื่อมต่อกับฐานข้อมูล
include './work/dbwork.php';

$year = $_GET['year'];

// ตรวจสอบว่าค่าที่ส่งมาคือ 'ทั้งหมด' หรือไม่
if($year === "all") {
    // SQL query สำหรับดึงข้อมูลทั้งหมด
    $sql = "SELECT YEAR(created_at) AS registration_year, COUNT(company_id) AS company_count
            FROM tbl_company
            GROUP BY YEAR(created_at)";
} else {
    // SQL query สำหรับดึงข้อมูลตามปีที่เลือก
    $sql = "SELECT YEAR(created_at) AS registration_year, COUNT(company_id) AS company_count
            FROM tbl_company
            WHERE YEAR(created_at) = '$year'
            GROUP BY YEAR(created_at)";
}

$result = $conn->query($sql);

$graphData3 = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $graphData3[] = array($row['registration_year'], intval($row['company_count']));
    }
}

echo json_encode($graphData3);
?>
