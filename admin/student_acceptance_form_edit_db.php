<?php
include './work/dbwork.php';


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // รับค่าจากฟอร์ม
    $acceptance_agency_name = mysqli_real_escape_string($conn, $_POST['acceptance_agency_name']);
    $acceptance_address = mysqli_real_escape_string($conn, $_POST['acceptance_address']);
    $acceptance_subdistrict = mysqli_real_escape_string($conn, $_POST['acceptance_subdistrict']);
    $acceptance_district = mysqli_real_escape_string($conn, $_POST['acceptance_district']);
    $acceptance_province = mysqli_real_escape_string($conn, $_POST['acceptance_province']);
    $acceptance_zip = mysqli_real_escape_string($conn, $_POST['acceptance_zip']);
    $acceptance_phone = mysqli_real_escape_string($conn, $_POST['acceptance_phone']);
    $acceptance_fax = mysqli_real_escape_string($conn, $_POST['acceptance_fax']);
    $acceptance_website = mysqli_real_escape_string($conn, $_POST['acceptance_website']);
    $acceptance_status_type = mysqli_real_escape_string($conn, $_POST['acceptance_status_type']);
    $acceptance_prefix = mysqli_real_escape_string($conn, $_POST['acceptance_prefix'] ?? '');
    $acceptance_fname = mysqli_real_escape_string($conn, $_POST['acceptance_fname'] ?? '');
    $acceptance_lname = mysqli_real_escape_string($conn, $_POST['acceptance_lname'] ?? '');
    $acceptance_receiving_department = mysqli_real_escape_string($conn, $_POST['acceptance_receiving_department'] ?? '');
    $acceptance_job_description = mysqli_real_escape_string($conn, $_POST['acceptance_job_description'] ?? '');
    $acceptance_coordinator_fname = mysqli_real_escape_string($conn, $_POST['acceptance_coordinator_fname'] ?? '');
    $acceptance_coordinator_lname = mysqli_real_escape_string($conn, $_POST['acceptance_coordinator_lname'] ?? '');
    $acceptance_coordinator_position = mysqli_real_escape_string($conn, $_POST['acceptance_coordinator_position'] ?? '');
    $acceptance_coordinator_phone = mysqli_real_escape_string($conn, $_POST['acceptance_coordinator_phone'] ?? '');
    $acceptance_coordinator_fax = mysqli_real_escape_string($conn, $_POST['acceptance_coordinator_fax'] ?? '');
    $acceptance_coordinator_email = mysqli_real_escape_string($conn, $_POST['acceptance_coordinator_email'] ?? '');
    $acceptance_welfare_status = mysqli_real_escape_string($conn, $_POST['acceptance_welfare_status'] ?? '');

    // จัดการกับการอัปโหลดไฟล์
    $target_dir = "../uploads/";
    $file_paths = [];

    if (isset($_FILES["acceptance_signature_img"]) && $_FILES["acceptance_signature_img"]["error"] == 0) {
        $target_file = $target_dir . basename($_FILES["acceptance_signature_img"]["name"]);
        move_uploaded_file($_FILES["acceptance_signature_img"]["tmp_name"], $target_file);
        $file_paths['acceptance_signature_img'] = $target_file;
    }

    // สร้างสตริงสำหรับการอัปเดตฐานข้อมูล
    $file_updates = [];
    foreach ($file_paths as $field_name => $file_path) {
        $file_updates[] = "$field_name = '" . mysqli_real_escape_string($conn, $file_path) . "'";
    }
    $file_updates_string = count($file_updates) > 0 ? ', ' . implode(', ', $file_updates) : '';

    // คำสั่ง SQL สำหรับอัปเดตข้อมูล
    $sql = "UPDATE student_acceptance_form SET 
                acceptance_agency_name = '$acceptance_agency_name', 
                acceptance_address = '$acceptance_address', 
                acceptance_subdistrict = '$acceptance_subdistrict',
                acceptance_district = '$acceptance_district',
                acceptance_province = '$acceptance_province',
                acceptance_zip = '$acceptance_zip',
                acceptance_phone = '$acceptance_phone',
                acceptance_fax = '$acceptance_fax',
                acceptance_website = '$acceptance_website',
                acceptance_status_type = '$acceptance_status_type',
                acceptance_prefix = '$acceptance_prefix',
                acceptance_fname = '$acceptance_fname',
                acceptance_lname = '$acceptance_lname',
                acceptance_receiving_department = '$acceptance_receiving_department',
                acceptance_job_description = '$acceptance_job_description',
                acceptance_coordinator_fname = '$acceptance_coordinator_fname',
                acceptance_coordinator_lname = '$acceptance_coordinator_lname',
                acceptance_coordinator_position = '$acceptance_coordinator_position',
                acceptance_coordinator_phone = '$acceptance_coordinator_phone',
                acceptance_coordinator_fax = '$acceptance_coordinator_fax',
                acceptance_coordinator_email = '$acceptance_coordinator_email',
                acceptance_welfare_status = '$acceptance_welfare_status'";

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
        echo "    window.location ='./student_acceptance_form_detail.php';";
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
