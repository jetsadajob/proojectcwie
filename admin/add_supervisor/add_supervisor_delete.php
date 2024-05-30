<?php
include('../include_sweetalert.php');
include '../work/dbwork.php';

$id = $_GET['id'];

// สร้างคำสั่ง SQL สำหรับลบข้อมูลจากตาราง add_supervisor
$sql_add_supervisor = "SELECT * FROM add_supervisor WHERE supervision_id='$id'";
$result_add_supervisor = mysqli_query($conn, $sql_add_supervisor);

if (!$result_add_supervisor) {
    echo "เกิดข้อผิดพลาดในการดึงข้อมูลจากตาราง add_supervisor: " . mysqli_error($conn);
    exit;
}

while ($row = mysqli_fetch_assoc($result_add_supervisor)) {
    // สร้างคำสั่ง SQL สำหรับลบข้อมูลจากตาราง std_supervision โดยใช้เงื่อนไขที่เหมาะสม
    $sql_std_supervision = "DELETE FROM std_supervision 
                            WHERE company_address = '{$row['company_address']}' 
                            AND company_subdistrict = '{$row['company_subdistrict']}' 
                            AND company_district = '{$row['company_district']}' 
                            AND company_province = '{$row['company_province']}' 
                            AND company_zip = '{$row['company_zip']}' 
                            
                            AND created_at = '{$row['created_at']}'";
    
    $result_std_supervision = mysqli_query($conn, $sql_std_supervision);
    if (!$result_std_supervision) {
        echo "เกิดข้อผิดพลาดในการลบข้อมูลจากตาราง std_supervision: " . mysqli_error($conn);
        exit;
    }
}

// ลบข้อมูลจากตาราง add_supervisor
$sql_delete_add_supervisor = "DELETE FROM add_supervisor WHERE supervision_id='$id'";
$result_delete_add_supervisor = mysqli_query($conn, $sql_delete_add_supervisor);
if (!$result_delete_add_supervisor) {
    echo "เกิดข้อผิดพลาดในการลบข้อมูลจากตาราง add_supervisor: " . mysqli_error($conn);
    exit;
}

echo "<script> window.location.href = '../supervisor.php'; </script>";

mysqli_close($conn);
?>
