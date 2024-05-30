<?php
// เชื่อมต่อกับฐานข้อมูล
include './work/dbwork.php';

// ตรวจสอบว่ามีการส่งชื่อบริษัทมาหรือไม่
if (isset($_GET['company_name'])) {
    $companyName = $_GET['company_name'];

    // คำสั่ง SQL สำหรับดึงข้อมูลที่อยู่ของบริษัท
    $sql = "SELECT * FROM tbl_company WHERE company = '$companyName'";
    $result = $conn->query($sql);

    // ตรวจสอบว่ามีข้อมูลที่อยู่ของบริษัทหรือไม่
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $companyAddress = array(
            'address' => $row['address'],
            'subdistrict' => $row['subdistrict'],
            'district' => $row['district'],
            'province' => $row['province'],
            'zip' => $row['zip']
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
