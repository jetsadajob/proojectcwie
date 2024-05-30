<?php
include('./include_sweetalert.php');
include('../server.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "final_project";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("การเชื่อมต่อกับฐานข้อมูลล้มเหลว: " . $conn->connect_error);
    }

    $acceptance_agency_name = $_POST["acceptance_agency_name"] ?? '';
    $acceptance_address = $_POST["acceptance_address"] ?? '';
    $acceptance_subdistrict = $_POST["acceptance_subdistrict"] ?? '';
    $acceptance_district = $_POST["acceptance_district"] ?? '';
    $acceptance_province = $_POST["acceptance_province"] ?? '';
    $acceptance_zip = $_POST["acceptance_zip"] ?? '';
    $acceptance_phone = $_POST["acceptance_phone"] ?? '';
    $acceptance_fax = $_POST["acceptance_fax"] ?? '';
    $acceptance_website = $_POST["acceptance_website"] ?? '';
    $acceptance_status_type = $_POST["acceptance_status_type"] ?? '';
    $acceptance_prefix = mysqli_real_escape_string($conn, $_POST['acceptance_prefix'] ?? '');
    $acceptance_fname = mysqli_real_escape_string($conn, $_POST['acceptance_fname'] ?? '');
    $acceptance_lname = mysqli_real_escape_string($conn, $_POST['acceptance_lname'] ?? '');
    $acceptance_receiving_department = mysqli_real_escape_string($conn, $_POST['acceptance_receiving_department'] ?? '');
    $acceptance_job_description = mysqli_real_escape_string($conn, $_POST['acceptance_job_description'] ?? '');
    $acceptance_coordinator_fname = mysqli_real_escape_string($conn, $_POST['acceptance_coordinator_fname'] ?? '');
    $acceptance_coordinator_lname = mysqli_real_escape_string($conn, $_POST['acceptance_coordinator_lname'] ?? ''); // ลบช่องว่างที่ส่งผลให้เกิดปัญหา
    $acceptance_coordinator_position = mysqli_real_escape_string($conn, $_POST['acceptance_coordinator_position'] ?? '');
    $acceptance_coordinator_phone = mysqli_real_escape_string($conn, $_POST['acceptance_coordinator_phone'] ?? '');
    $acceptance_coordinator_fax = mysqli_real_escape_string($conn, $_POST['acceptance_coordinator_fax'] ?? '');
    $acceptance_coordinator_email = mysqli_real_escape_string($conn, $_POST['acceptance_coordinator_email'] ?? '');
    $acceptance_welfare_status = mysqli_real_escape_string($conn, $_POST['acceptance_welfare_status'] ?? '');

    // ตัวแปรสำหรับเก็บเส้นทางไฟล์
    $acceptance_signature_img_path = '';

    $target_dir = "../uploads/";

    if (isset($_FILES["acceptance_signature_img"]) && $_FILES["acceptance_signature_img"]["error"] == 0) {
        $acceptance_signature_img_path = $target_dir . basename($_FILES["acceptance_signature_img"]["name"]);
        move_uploaded_file($_FILES["acceptance_signature_img"]["tmp_name"], $acceptance_signature_img_path);
    }

    $sql = "INSERT INTO student_acceptance_form (acceptance_agency_name, acceptance_address, acceptance_subdistrict, acceptance_district, acceptance_province, acceptance_zip, acceptance_phone, acceptance_fax, acceptance_website, acceptance_status_type, acceptance_prefix, acceptance_fname, acceptance_lname, acceptance_receiving_department, acceptance_job_description, acceptance_coordinator_fname, acceptance_coordinator_lname, acceptance_coordinator_position, acceptance_coordinator_phone, acceptance_coordinator_fax, acceptance_coordinator_email, acceptance_welfare_status, acceptance_signature_img, created_at) 
    VALUES ('$acceptance_agency_name', '$acceptance_address', '$acceptance_subdistrict', '$acceptance_district', '$acceptance_province', '$acceptance_zip', '$acceptance_phone', '$acceptance_fax', '$acceptance_website', '$acceptance_status_type', '$acceptance_prefix', '$acceptance_fname', '$acceptance_lname', '$acceptance_receiving_department', '$acceptance_job_description', '$acceptance_coordinator_fname', '$acceptance_coordinator_lname', '$acceptance_coordinator_position', '$acceptance_coordinator_phone', '$acceptance_coordinator_fax', '$acceptance_coordinator_email', '$acceptance_welfare_status', '$acceptance_signature_img_path', CURRENT_TIMESTAMP)";

    if (mysqli_query($conn, $sql)) {
        mysqli_close($conn);
        // SweetAlert2 สำหรับการแสดงผลเมื่อเพิ่มข้อมูลสำเร็จ
        echo "<script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>";
        echo "<script>";
        echo "Swal.fire({";
        echo "    icon: 'success',";
        echo "    title: 'แจ้งเตือน',";
        echo "    text: 'เพิ่มข้อมูลสำเร็จ',";
        echo "    showConfirmButton: true";
        echo "}).then(function () {";
        echo "    window.location ='./student_acceptance_form.php';";
        echo "});";
        echo "</script>";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        mysqli_close($conn);
    }
}