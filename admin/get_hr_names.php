<?php
// คำสั่ง SQL สำหรับดึงชื่อผู้ประสานงานจากตาราง hr ตามบริษัท
$sql_hr_names = "SELECT name_hr FROM hr WHERE company_id = (SELECT company_id FROM tbl_company WHERE company = '$_GET[company_name]')";
$result_hr_names = $conn->query($sql_hr_names);

$hr_names = array();
if ($result_hr_names->num_rows > 0) {
    while ($row = $result_hr_names->fetch_assoc()) {
        $hr_names[] = $row['name_hr'];
    }
}

echo json_encode($hr_names);
?>
