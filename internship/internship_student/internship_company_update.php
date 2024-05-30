<?php
session_start();
include('./include_sweetalert.php');
$servername = "localhost";
$username = "itwebsit_itweb126_projectcwie"; // or your database username
$password = "Kt85gLyHOzgzEKosNw6s"; // or your database password
$dbname = "itwebsit_itweb126_projectcwie";


$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$user_id = $_SESSION['user_id'];
$sql = "SELECT email FROM login_student WHERE id = '$user_id'";
$result = mysqli_query($conn, $sql);

if ($result) {
    // ตรวจสอบว่ามีข้อมูลที่ได้จากฐานข้อมูลหรือไม่
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $email = $row['email'];
    } else {
        echo "ไม่พบข้อมูลสำหรับ user_id นี้ในฐานข้อมูล";
    }
} else {
    echo "เกิดข้อผิดพลาดในการดึงข้อมูล: " . mysqli_error($conn);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $company_detail_name = mysqli_real_escape_string($conn, $_POST['company_detail_name']);
    $company_detail_address = mysqli_real_escape_string($conn, $_POST['company_detail_address']);
    $company_detail_subdistrict = mysqli_real_escape_string($conn, $_POST['company_detail_subdistrict']);
    $company_detail_district = mysqli_real_escape_string($conn, $_POST['company_detail_district']);
    $company_detail_province = mysqli_real_escape_string($conn, $_POST['company_detail_province']);
    $company_detail_zip = mysqli_real_escape_string($conn, $_POST['company_detail_zip']);
    $company_detail_other_detail = mysqli_real_escape_string($conn, $_POST['company_detail_other_detail']);
    $company_detail_specity_who = mysqli_real_escape_string($conn, $_POST['company_detail_specity_who']);
    $company_detail_coordinator_name = mysqli_real_escape_string($conn, $_POST['company_detail_coordinator_name']);
    $company_detail_phone = mysqli_real_escape_string($conn, $_POST['company_detail_phone']);
    $company_detail_submit_document = mysqli_real_escape_string($conn, $_POST['company_detail_submit_document']);
    $company_detail_medical_privilege = mysqli_real_escape_string($conn, $_POST['company_detail_medical_privilege']);
    $company_detail_submit_document_type = mysqli_real_escape_string($conn, $_POST['company_detail_submit_document_type']);

    $sql = "UPDATE company_detail SET 
                company_detail_name = '$company_detail_name', 
                company_detail_address = '$company_detail_address',
                company_detail_subdistrict = '$company_detail_subdistrict',
                company_detail_district = '$company_detail_district',
                company_detail_province = '$company_detail_province',
                company_detail_zip = '$company_detail_zip',
                company_detail_other_detail = '$company_detail_other_detail',
                company_detail_specity_who = '$company_detail_specity_who',
                company_detail_coordinator_name = '$company_detail_coordinator_name',
                company_detail_phone = '$company_detail_phone',
                company_detail_submit_document = '$company_detail_submit_document',
                company_detail_medical_privilege = '$company_detail_medical_privilege',
                company_detail_submit_document_type = '$company_detail_submit_document_type',
                status_admin = 1
            WHERE email = '$email'";

    if (mysqli_query($conn, $sql)) {
        mysqli_close($conn);
        // SweetAlert2 สำหรับอัปเดตสำเร็จ
        echo "<script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>";
        echo "<script>";
        echo "Swal.fire({";
        echo "    icon: 'success',";
        echo "    title: 'แจ้งเตือน',";
        echo "    text: 'อัปเดตข้อมูลสำเร็จ',";
        echo "    showConfirmButton: true";
        echo "}).then(function () {";
        echo "    window.location ='./company_detail.php';";
        echo "});";
        echo "</script>";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        mysqli_close($conn);
    }
}
?>
