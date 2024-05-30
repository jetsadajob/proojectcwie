<?php
session_start();
include('./include_sweetalert.php');
include('../server.php');

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

    // รับค่าจากฟอร์ม
    $accommodation_employer_thai = mysqli_real_escape_string($conn, $_POST['accommodation_employer_thai']);
    $accommodation_address = mysqli_real_escape_string($conn, $_POST['accommodation_address']);
    $accommodation_subdistrict = mysqli_real_escape_string($conn, $_POST['accommodation_subdistrict']);
    $accommodation_district = mysqli_real_escape_string($conn, $_POST['accommodation_district']);
    $accommodation_province = mysqli_real_escape_string($conn, $_POST['accommodation_province']);
    $accommodation_zip = mysqli_real_escape_string($conn, $_POST['accommodation_zip']);
    $accommodation_phone = mysqli_real_escape_string($conn, $_POST['accommodation_phone']);
    $accommodation_fax = mysqli_real_escape_string($conn, $_POST['accommodation_fax']);
    $accommodation_email = mysqli_real_escape_string($conn, $_POST['accommodation_email']);
    $accommodation_manager_employer = mysqli_real_escape_string($conn, $_POST['accommodation_manager_employer']);
    $accommodation_maneger_position = mysqli_real_escape_string($conn, $_POST['accommodation_maneger_position']);
    $accommodation_maneger_phone = mysqli_real_escape_string($conn, $_POST['accommodation_maneger_phone']);
    $accommodation_maneger_fax = mysqli_real_escape_string($conn, $_POST['accommodation_maneger_fax']);
    $accommodation_maneger_email = mysqli_real_escape_string($conn, $_POST['accommodation_maneger_email']);
    $accommodation_liaise_type = mysqli_real_escape_string($conn, $_POST['accommodation_liaise_type']);
    $accommodation_liaise_fname = mysqli_real_escape_string($conn, $_POST['accommodation_liaise_fname']);
    $accommodation_liaise_lname = mysqli_real_escape_string($conn, $_POST['accommodation_liaise_lname']);
    $accommodation_liaise_position = mysqli_real_escape_string($conn, $_POST['accommodation_liaise_position']);
    $accommodation_liaise_department = mysqli_real_escape_string($conn, $_POST['accommodation_liaise_department']);
    $accommodation_liaise_phone = mysqli_real_escape_string($conn, $_POST['accommodation_liaise_phone']);
    $accommodation_liaise_fax = mysqli_real_escape_string($conn, $_POST['accommodation_liaise_fax']);
    $accommodation_liaise_email = mysqli_real_escape_string($conn, $_POST['accommodation_liaise_email']);
    $accommodation_supervisor_fname = mysqli_real_escape_string($conn, $_POST['accommodation_supervisor_fname']);
    $accommodation_supervisor_lname = mysqli_real_escape_string($conn, $_POST['accommodation_supervisor_lname']);
    $accommodation_supervisor_position = mysqli_real_escape_string($conn, $_POST['accommodation_supervisor_position']);
    $accommodation_supervisor_department = mysqli_real_escape_string($conn, $_POST['accommodation_supervisor_department']);
    $accommodation_supervisor_phone = mysqli_real_escape_string($conn, $_POST['accommodation_supervisor_phone']);
    $accommodation_supervisor_fax = mysqli_real_escape_string($conn, $_POST['accommodation_supervisor_fax']);
    $accommodation_supervisor_email = mysqli_real_escape_string($conn, $_POST['accommodation_supervisor_email']);
    $accommodation_assignment_std_prefix = mysqli_real_escape_string($conn, $_POST['accommodation_assignment_std_prefix']);
    $accommodation_assignment_std_fname = mysqli_real_escape_string($conn, $_POST['accommodation_assignment_std_fname']);
    $accommodation_assignment_std_lname = mysqli_real_escape_string($conn, $_POST['accommodation_assignment_std_lname']);
    $accommodation_assignment_position = mysqli_real_escape_string($conn, $_POST['accommodation_assignment_position']);
    $accommodation_assignment_description = mysqli_real_escape_string($conn, $_POST['accommodation_assignment_description']);
    $accommodation_accommodation_address = mysqli_real_escape_string($conn, $_POST['accommodation_accommodation_address']);
    $accommodation_accommodation_subdistrict = mysqli_real_escape_string($conn, $_POST['accommodation_accommodation_subdistrict']);
    $accommodation_accommodation_district = mysqli_real_escape_string($conn, $_POST['accommodation_accommodation_district']);
    $accommodation_accommodation_province = mysqli_real_escape_string($conn, $_POST['accommodation_accommodation_province']);
    $accommodation_accommodation_zip = mysqli_real_escape_string($conn, $_POST['accommodation_accommodation_zip']);
    $accommodation_accommodationl_phone = mysqli_real_escape_string($conn, $_POST['accommodation_accommodationl_phone']);
    $accommodation_accommodation_email = mysqli_real_escape_string($conn, $_POST['accommodation_accommodation_email']);
    $accommodation_emergency_fname = mysqli_real_escape_string($conn, $_POST['accommodation_emergency_fname']);
    $accommodation_emergency_lname = mysqli_real_escape_string($conn, $_POST['accommodation_emergency_lname']);
    $accommodation_emergency_address = mysqli_real_escape_string($conn, $_POST['accommodation_emergency_address']);
    $accommodation_emergency_subdistrict = mysqli_real_escape_string($conn, $_POST['accommodation_emergency_subdistrict']);
    $accommodation_emergency_district = mysqli_real_escape_string($conn, $_POST['accommodation_emergency_district']);
    $accommodation_emergency_province = mysqli_real_escape_string($conn, $_POST['accommodation_emergency_province']);
    $accommodation_emergency_zip = mysqli_real_escape_string($conn, $_POST['accommodation_emergency_zip']);
    $accommodation_emergency_phone = mysqli_real_escape_string($conn, $_POST['accommodation_emergency_phone']);
    $accommodation_emergency_email = mysqli_real_escape_string($conn, $_POST['accommodation_emergency_email']);
    // ตรวจสอบให้แน่ใจว่าคุณรวมทุกฟิลด์จากฟอร์มที่คุณต้องการอัปเดต

    // จัดการกับการอัปโหลดไฟล์
    $target_dir = "../uploads/";
    $file_paths = [];

    // ตัวอย่างการอัปโหลดไฟล์ "map"
    if (isset($_FILES["map"]) && $_FILES["map"]["error"] == 0) {
        $filename = time() . '-' . basename($_FILES["map"]["name"]);
        $target_file = $target_dir . $filename;
        if (move_uploaded_file($_FILES["map"]["tmp_name"], $target_file)) {
            $file_paths['map'] = $filename;
        }
    } else{
        $sql_map = "SELECT map FROM job_description_accommodation WHERE email = '$email'";
        $result_map = mysqli_query($conn, $sql_map);
        $row_map = mysqli_fetch_array($result_map);
        $map_path = $row_map["map"];
    }

    if (isset($_FILES["accommodation_std_signature_img"]) && $_FILES["accommodation_std_signature_img"]["error"] == 0) {
        $filename = time() . '-' . basename($_FILES["accommodation_std_signature_img"]["name"]);
        $target_file = $target_dir . $filename;
        if (move_uploaded_file($_FILES["accommodation_std_signature_img"]["tmp_name"], $target_file)) {
            $file_paths['accommodation_std_signature_img'] = $filename;
        }
    } else{
        $sql_accommodation_std_signature_img = "SELECT accommodation_std_signature_img FROM job_description_accommodation WHERE email = '$email'";
        $result_accommodation_std_signature_img = mysqli_query($conn, $sql_accommodation_std_signature_img);
        $row_accommodation_std_signature_img = mysqli_fetch_array($result_accommodation_std_signature_img);
        $accommodation_std_signature_img_path = $row_accommodation_std_signature_img["accommodation_std_signature_img"];
    }

    // if (isset($_FILES["accommodation_staff_signature_img"]) && $_FILES["accommodation_staff_signature_img"]["error"] == 0) {
    //     $filename = time() . '-' . basename($_FILES["accommodation_staff_signature_img"]["name"]);
    //     $target_file = $target_dir . $filename;
    //     if (move_uploaded_file($_FILES["accommodation_staff_signature_img"]["tmp_name"], $target_file)) {
    //         $file_paths['accommodation_staff_signature_img'] = $filename;
    //     }
    // }

    // ตรวจสอบว่าตัวแปร $_SESSION['email'] ถูกตั้งค่า
    // if (!isset($_SESSION['email'])) {
    //     echo "Session not set";
    //    exit;
    // }
    // $email = mysqli_real_escape_string($conn, $_SESSION['email']);

    // สร้างสตริงสำหรับการอัปเดตฐานข้อมูล
    $file_updates = [];
    foreach ($file_paths as $field_name => $file_path) {
        $file_updates[] = "$field_name = '" . mysqli_real_escape_string($conn, $file_path) . "'";
    }
    $file_updates_string = count($file_updates) > 0 ? ', ' . implode(', ', $file_updates) : '';

    // คำสั่ง SQL สำหรับอัปเดตข้อมูล
    $sql = "UPDATE job_description_accommodation SET 
            accommodation_employer_thai = '$accommodation_employer_thai', 
            accommodation_address = '$accommodation_address',
            accommodation_subdistrict = '$accommodation_subdistrict',
            accommodation_district = '$accommodation_district',
            accommodation_province = '$accommodation_province',
            accommodation_zip = '$accommodation_zip',
            accommodation_phone = '$accommodation_phone',
            accommodation_fax = '$accommodation_fax',
            accommodation_email = '$accommodation_email',
            accommodation_manager_employer = '$accommodation_manager_employer',
            accommodation_maneger_position = '$accommodation_maneger_position',
            accommodation_maneger_phone = '$accommodation_maneger_phone',
            accommodation_maneger_fax = '$accommodation_maneger_fax',
            accommodation_maneger_email = '$accommodation_maneger_email',
            accommodation_liaise_type = '$accommodation_liaise_type',
            accommodation_liaise_fname = '$accommodation_liaise_fname',
            accommodation_liaise_lname = '$accommodation_liaise_lname',
            accommodation_liaise_position = '$accommodation_liaise_position',
            accommodation_liaise_department = '$accommodation_liaise_department',
            accommodation_liaise_phone = '$accommodation_liaise_phone', 
            accommodation_liaise_fax = '$accommodation_liaise_fax', 
            accommodation_liaise_email = '$accommodation_liaise_email',
            accommodation_supervisor_fname = '$accommodation_supervisor_fname',
            accommodation_supervisor_lname = '$accommodation_supervisor_lname',
            accommodation_supervisor_position = '$accommodation_supervisor_position',
            accommodation_supervisor_department = '$accommodation_supervisor_department',
            accommodation_supervisor_phone = '$accommodation_supervisor_phone',
            accommodation_supervisor_fax = '$accommodation_supervisor_fax',
            accommodation_supervisor_email = '$accommodation_supervisor_email',
            accommodation_assignment_std_prefix = '$accommodation_assignment_std_prefix',
            accommodation_assignment_std_fname = '$accommodation_assignment_std_fname',
            accommodation_assignment_std_lname = '$accommodation_assignment_std_lname',
            accommodation_assignment_position = '$accommodation_assignment_position',
            accommodation_assignment_description = '$accommodation_assignment_description',
            accommodation_accommodation_address = '$accommodation_accommodation_address',
            accommodation_accommodation_subdistrict = '$accommodation_accommodation_subdistrict',
            accommodation_accommodation_district = '$accommodation_accommodation_district',
            accommodation_accommodation_province = '$accommodation_accommodation_province',
            accommodation_accommodation_zip = '$accommodation_accommodation_zip',
            accommodation_accommodationl_phone = '$accommodation_accommodationl_phone',
            accommodation_accommodation_email = '$accommodation_accommodation_email',
            accommodation_emergency_fname = '$accommodation_emergency_fname',
            accommodation_emergency_lname = '$accommodation_emergency_lname',
            accommodation_emergency_address = '$accommodation_emergency_address',
            accommodation_emergency_subdistrict = '$accommodation_emergency_subdistrict',
            accommodation_emergency_district = '$accommodation_emergency_district',
            accommodation_emergency_province = '$accommodation_emergency_province',
            accommodation_emergency_zip = '$accommodation_emergency_zip',
            accommodation_emergency_phone = '$accommodation_emergency_phone',
            accommodation_emergency_email = '$accommodation_emergency_email'
            $file_updates_string,
            status_admin = 1
        WHERE email = '$email'";

    // ตรวจสอบและทำการอัปเดตข้อมูล
    if (mysqli_query($conn, $sql)) {
        // แสดง SweetAlert สำหรับอัปเดตสำเร็จ
        echo "<script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>";
        echo "<script>";
        echo "Swal.fire({";
        echo "    icon: 'success',";
        echo "    title: 'แจ้งเตือน',";
        echo "    text: 'อัปเดตข้อมูลสำเร็จ',";
        echo "    showConfirmButton: true";
        echo "}).then(function () {";
        echo "    window.location ='./job_description_accommodation_detail.php';";
        echo "});";
        echo "</script>";
    } else {
        // แสดงข้อผิดพลาดหากมี
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

    // ปิดการเชื่อมต่อฐานข้อมูล
    mysqli_close($conn);
}
?>
