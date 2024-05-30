<?php
include './work/dbwork.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $accommodation_employer_thai = mysqli_real_escape_string($conn, $_POST['accommodation_employer_thai']);
    $accommodation_employer_eng = mysqli_real_escape_string($conn, $_POST['accommodation_employer_eng']);
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

    // จัดการกับการอัปโหลดไฟล์
    $target_dir = "../uploads/";
    $file_paths = [];

    if (isset($_FILES["map"]) && $_FILES["map"]["error"] == 0) {
        $target_file = $target_dir . basename($_FILES["map"]["name"]);
        move_uploaded_file($_FILES["map"]["tmp_name"], $target_file);
        $file_paths['map'] = $target_file;
    }
    if (isset($_FILES["accommodation_std_signature_img"]) && $_FILES["accommodation_std_signature_img"]["error"] == 0) {
        $target_file = $target_dir . basename($_FILES["accommodation_std_signature_img"]["name"]);
        move_uploaded_file($_FILES["accommodation_std_signature_img"]["tmp_name"], $target_file);
        $file_paths['accommodation_std_signature_img'] = $target_file;
    }
    if (isset($_FILES["accommodation_staff_signature_img"]) && $_FILES["accommodation_staff_signature_img"]["error"] == 0) {
        $target_file = $target_dir . basename($_FILES["accommodation_staff_signature_img"]["name"]);
        move_uploaded_file($_FILES["accommodation_staff_signature_img"]["tmp_name"], $target_file);
        $file_paths['accommodation_staff_signature_img'] = $target_file;
    }

// คุณสามารถทำการเดียวกันกับไฟล์อื่นๆ

    // สร้างสตริงสำหรับการอัปเดตฐานข้อมูล
    $file_updates = [];
    foreach ($file_paths as $field_name => $file_path) {
        $file_updates[] = "$field_name = '" . mysqli_real_escape_string($conn, $file_path) . "'";
    }
    $file_updates_string = count($file_updates) > 0 ? ', ' . implode(', ', $file_updates) : '';

    // คำสั่ง SQL สำหรับอัปเดตข้อมูล
    $sql = "UPDATE job_description_accommodation SET 
                accommodation_employer_thai = '$accommodation_employer_thai', 
                accommodation_employer_eng = '$accommodation_employer_eng', 
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
                accommodation_liaise_position = '$accommodation_liaise_position'
                accommodation_liaise_department = '$accommodation_liaise_department'
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
                accommodation_accommodation_province = '$accommodation_accommodation_province'
                accommodation_accommodation_zip = '$accommodation_accommodation_zip'
                accommodation_accommodationl_phone = '$accommodation_accommodationl_phone',
                accommodation_accommodation_email = '$accommodation_accommodation_email',
                accommodation_emergency_fname = '$accommodation_emergency_fname',
                accommodation_emergency_lname = '$accommodation_emergency_lname',
                accommodation_emergency_address = '$accommodation_emergency_address',
                accommodation_emergency_subdistrict = '$accommodation_emergency_subdistrict',
                accommodation_emergency_district = '$accommodation_emergency_district',
                accommodation_emergency_province = '$accommodation_emergency_province',
                accommodation_emergency_zip = '$accommodation_emergency_zip',
                accommodation_emergency_phone = '$accommodation_emergency_phone'
                accommodation_emergency_email = '$accommodation_emergency_email'
                $file_updates_string
            WHERE petition_email = '$petition_email'";

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
