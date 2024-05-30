<?php
include './work/dbwork.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $outline_prefix = mysqli_real_escape_string($conn, $_POST['outline_prefix']);
    $outline_fname = mysqli_real_escape_string($conn, $_POST['outline_fname']);
    $outline_lname = mysqli_real_escape_string($conn, $_POST['outline_lname']);
    $outline_std_id = mysqli_real_escape_string($conn, $_POST['outline_std_id']);
    $outline_field_of_study = mysqli_real_escape_string($conn, $_POST['outline_field_of_study']);
    $outline_company_name = mysqli_real_escape_string($conn, $_POST['outline_company_name']);
    $outline_address = mysqli_real_escape_string($conn, $_POST['outline_address']);
    $outline_subdistrict = mysqli_real_escape_string($conn, $_POST['outline_subdistrict']);
    $outline_district = mysqli_real_escape_string($conn, $_POST['outline_district']);
    $outline_province = mysqli_real_escape_string($conn, $_POST['outline_province']);
    $outline_zip = mysqli_real_escape_string($conn, $_POST['outline_zip']);
    $outline_phone = mysqli_real_escape_string($conn, $_POST['outline_phone']);
    $outline_fax = mysqli_real_escape_string($conn, $_POST['outline_fax']);
    $outline_email = mysqli_real_escape_string($conn, $_POST['outline_email']);
    $outline_detail_title_thai = mysqli_real_escape_string($conn, $_POST['outline_detail_title_thai']);
    $outline_detail_title_eng = mysqli_real_escape_string($conn, $_POST['outline_detail_title_eng']);
    $outline_detail_description = mysqli_real_escape_string($conn, $_POST['outline_detail_description']);
    $outline_detail_expected_results = mysqli_real_escape_string($conn, $_POST['outline_detail_expected_results']);
    $outline_detail_significance = mysqli_real_escape_string($conn, $_POST['outline_detail_significance']);
    $outline_detail_reference = mysqli_real_escape_string($conn, $_POST['outline_detail_reference']);
    $outline_detail_pjmethodology = mysqli_real_escape_string($conn, $_POST['outline_detail_pjmethodology']);
    $outline_detail_scope = mysqli_real_escape_string($conn, $_POST['outline_detail_scope']);
    $outline_detail_other = mysqli_real_escape_string($conn, $_POST['outline_detail_other']);

    // จัดการกับการอัปโหลดไฟล์
    $target_dir = "../uploads/";
    $file_paths = [];

    if (isset($_FILES["outline_work_plan_file"]) && $_FILES["outline_work_plan_file"]["error"] == 0) {
        $target_file = $target_dir . basename($_FILES["outline_work_plan_file"]["name"]);
        move_uploaded_file($_FILES["outline_work_plan_file"]["tmp_name"], $target_file);
        $file_paths['outline_work_plan_file'] = $target_file;
    }
    if (isset($_FILES["outline_std_signature_img"]) && $_FILES["outline_std_signature_img"]["error"] == 0) {
        $target_file = $target_dir . basename($_FILES["outline_std_signature_img"]["name"]);
        move_uploaded_file($_FILES["outline_std_signature_img"]["tmp_name"], $target_file);
        $file_paths['outline_std_signature_img'] = $target_file;
    }

// คุณสามารถทำการเดียวกันกับไฟล์อื่นๆ

    // สร้างสตริงสำหรับการอัปเดตฐานข้อมูล
    $file_updates = [];
    foreach ($file_paths as $field_name => $file_path) {
        $file_updates[] = "$field_name = '" . mysqli_real_escape_string($conn, $file_path) . "'";
    }
    $file_updates_string = count($file_updates) > 0 ? ', ' . implode(', ', $file_updates) : '';

    // คำสั่ง SQL สำหรับอัปเดตข้อมูล
    $sql = "UPDATE cooperative_report_outline SET 
                outline_prefix = '$outline_prefix', 
                outline_fname = '$outline_fname', 
                outline_lname = '$outline_lname',
                outline_std_id = '$outline_std_id',
                outline_field_of_study = '$outline_field_of_study',
                outline_company_name = '$outline_company_name',
                outline_address = '$outline_address',
                outline_subdistrict = '$outline_subdistrict',
                outline_district = '$outline_district',
                outline_province = '$outline_province',
                outline_zip = '$outline_zip',
                outline_phone = '$outline_phone',
                outline_fax = '$outline_fax',
                outline_email = '$outline_email',
                outline_detail_title_thai = '$outline_detail_title_thai',
                outline_detail_title_eng = '$outline_detail_title_eng',
                outline_detail_description = '$outline_detail_description',
                outline_detail_expected_results = '$outline_detail_expected_results',
                outline_detail_significance = '$outline_detail_significance',
                outline_detail_reference = '$outline_detail_reference',
                outline_detail_pjmethodology = '$outline_detail_pjmethodology', 
                outline_detail_scope = '$outline_detail_scope', 
                outline_detail_other = '$outline_detail_other'
                ";

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
        echo "    window.location ='./report_outline_detail.php';";
        echo "});";
        echo "</script>";
    } else {
        // แสดงข้อผิดพลาดหากมี
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
    // ปิดการเชื่อมต่อฐานข้อมูล
    mysqli_close($conn);
}
