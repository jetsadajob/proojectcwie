<?php
// เชื่อมต่อกับฐานข้อมูล
include './work/dbwork.php';

$year = $_GET['year'];

// SQL query สำหรับดึงข้อมูลจำนวนนักศึกษาสหกิจและฝึกงานตามปีที่เลือก
$sql_coop = "SELECT company.company, COUNT(petition_document.email) AS coop_count
    FROM petition_document
    INNER JOIN tbl_company AS company ON petition_document.petition_organiztion_name = company.company
    WHERE YEAR(petition_document.created_at) = '$year'
    GROUP BY company.company";

$result_coop = $conn->query($sql_coop);

$sql_intern = "SELECT company.company, COUNT(company_detail.email) AS intern_count
    FROM company_detail
    INNER JOIN tbl_company AS company ON company_detail.company_detail_name = company.company
    WHERE YEAR(company_detail.created_at) = '$year'
    GROUP BY company.company";

$result_intern = $conn->query($sql_intern);

$graphData2 = [
    'year' => $year,
    'companies' => [],
    'coop_counts' => [],
    'intern_counts' => []
];

// เก็บข้อมูลบริษัทและจำนวนนักศึกษาสหกิจ
if ($result_coop->num_rows > 0) {
    while ($row = $result_coop->fetch_assoc()) {
        $graphData2['companies'][] = $row['company'];
        $graphData2['coop_counts'][] = (int) $row['coop_count'];
    }
}

// เก็บข้อมูลบริษัทและจำนวนนักศึกษาฝึกงาน
if ($result_intern->num_rows > 0) {
    while ($row = $result_intern->fetch_assoc()) {
        $graphData2['intern_counts'][] = (int) $row['intern_count'];
    }
}

echo json_encode($graphData2);
?>
