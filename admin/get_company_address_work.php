<?php
// เชื่อมต่อกับฐานข้อมูล
include './work/dbwork.php';

// ตรวจสอบว่ามีการส่งชื่อบริษัทมาหรือไม่
if (isset($_GET['recruitment_company_name'])) {
    $companyName = $_GET['recruitment_company_name'];

    // คำสั่ง SQL สำหรับดึงข้อมูลที่อยู่ของบริษัท
    $sql = "SELECT * FROM job_recruitment WHERE recruitment_company_name = '$companyName'";
    $result = $conn->query($sql);

    // ตรวจสอบว่ามีข้อมูลที่อยู่ของบริษัทหรือไม่
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $companyAddress = array(
            'recruitment_type_company' => $row['recruitment_type_company'],
            'recruitment_company_address' => $row['recruitment_company_address'],
            'recruitment_company_subdistrict' => $row['recruitment_company_subdistrict'],
            'recruitment_company_district' => $row['recruitment_company_district'],
            'recruitment_company_province' => $row['recruitment_company_province'],
            'recruitment_company_zip' => $row['recruitment_company_zip'],
            'recruitment_company_phone' => $row['recruitment_company_phone'],
            'recruitment_company_email' => $row['recruitment_company_email'],
            'recruitment_company_detail' => $row['recruitment_company_detail']
        );

        // ส่งข้อมูลที่อยู่กลับในรูปแบบ JSON
        echo json_encode($companyAddress);
    } else {
        // ถ้าไม่พบข้อมูลที่อยู่ของบริษัท
        echo json_encode(array('error' => 'Company address not found'));
    }
} else {
    // ถ้าไม่มีชื่อบริษัทที่ส่งมา
    echo json_encode(array('error' => 'Company name is not set'));
}
?>
