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
    $coop_name_of_employer = mysqli_real_escape_string($conn, $_POST['coop_name_of_employer']);
    $coop_position = mysqli_real_escape_string($conn, $_POST['coop_position']);
    $coop_working_period_start = mysqli_real_escape_string($conn, $_POST['coop_working_period_start']);
    // $coop_working_period_end = mysqli_real_escape_string($conn, $_POST['coop_working_period_end']);
    $coop_prefix_thai = mysqli_real_escape_string($conn, $_POST['coop_prefix_thai']);
    $coop_fname_thai = mysqli_real_escape_string($conn, $_POST['coop_fname_thai']);
    $coop_lname_thai = mysqli_real_escape_string($conn, $_POST['coop_lname_thai']);
    $coop_prefix_eng = mysqli_real_escape_string($conn, $_POST['coop_prefix_eng']);
    $coop_fname_eng = mysqli_real_escape_string($conn, $_POST['coop_fname_eng']);
    $coop_lname_eng = mysqli_real_escape_string($conn, $_POST['coop_lname_eng']);
    $coop_std_id = mysqli_real_escape_string($conn, $_POST['coop_std_id']);
    $coop_year_of_study = mysqli_real_escape_string($conn, $_POST['coop_year_of_study']);
    $coop_faculty = mysqli_real_escape_string($conn, $_POST['coop_faculty']);
    $coop_field_of_study = mysqli_real_escape_string($conn, $_POST['coop_field_of_study']);
    $coop_advisor_prefix = mysqli_real_escape_string($conn, $_POST['coop_advisor_prefix']);
    $coop_advisor_fname = mysqli_real_escape_string($conn, $_POST['coop_advisor_fname']);
    $coop_advisor_lname = mysqli_real_escape_string($conn, $_POST['coop_advisor_lname']);
    $coop_gpa = mysqli_real_escape_string($conn, $_POST['coop_gpa']);
    $coop_phone = mysqli_real_escape_string($conn, $_POST['coop_phone']);
    $coop_std_address = mysqli_real_escape_string($conn, $_POST['coop_std_address']);
    $coop_std_subdistrict = mysqli_real_escape_string($conn, $_POST['coop_std_subdistrict']);
    $coop_std_district = mysqli_real_escape_string($conn, $_POST['coop_std_district']);
    $coop_std_province = mysqli_real_escape_string($conn, $_POST['coop_std_province']);
    $coop_std_zip = mysqli_real_escape_string($conn, $_POST['coop_std_zip']);
   
    $coop_emergency_fname = mysqli_real_escape_string($conn, $_POST['coop_emergency_fname']);
    $coop_emergency_lname = mysqli_real_escape_string($conn, $_POST['coop_emergency_lname']);
    $coop_emergency_relation = mysqli_real_escape_string($conn, $_POST['coop_emergency_relation']);
    $coop_emergency_occupation = mysqli_real_escape_string($conn, $_POST['coop_emergency_occupation']);
    $coop_emergency_place_of_work = mysqli_real_escape_string($conn, $_POST['coop_emergency_place_of_work']);
    $coop_emergency_address = mysqli_real_escape_string($conn, $_POST['coop_emergency_address']);
    $coop_emergency_subdistrict = mysqli_real_escape_string($conn, $_POST['coop_emergency_subdistrict']);
    $coop_emergency_district = mysqli_real_escape_string($conn, $_POST['coop_emergency_district']);
    $coop_emergency_province = mysqli_real_escape_string($conn, $_POST['coop_emergency_province']);
    $coop_emergency_zip = mysqli_real_escape_string($conn, $_POST['coop_emergency_zip']);
    $coop_emergency_phone = mysqli_real_escape_string($conn, $_POST['coop_emergency_phone']);
    $coop_emergency_email = mysqli_real_escape_string($conn, $_POST['coop_emergency_email']);
    $coop_career_objective = mysqli_real_escape_string($conn, $_POST['coop_career_objective']);

    // ตัวแปรสำหรับเก็บเส้นทางไฟล์
    $std_application_profile_img_path = '';
    $coop_applicant_signature_path = '';
    $coop_petition_documennt_path = '';
    $coop_copy_std_id_card_file_path = '';
    $coop_copy_id_card_file_path = '';
    $coop_copy_acadamic_report_file_path = '';
    $coop_cv_file_path = '';

    $target_dir = "../uploads/";


    if (isset($_FILES["std_application_profile_img"]) && $_FILES["std_application_profile_img"]["error"] == 0) {

        $std_application_profile_img_path = $target_dir . basename($_FILES["std_application_profile_img"]["name"]);
        move_uploaded_file($_FILES["std_application_profile_img"]["tmp_name"], $std_application_profile_img_path);
    } else {
        $sqlprofile_img = "SELECT std_application_profile_img FROM coop_application_form WHERE email = '$email'";
        $result_profile_img = mysqli_query($conn, $sqlprofile_img);
        $row = mysqli_fetch_array($result_profile_img);
        $std_application_profile_img_path = $row["std_application_profile_img"];
    }
// mysqli_fetch_array ดึงข้อมูลเป็น array
    if (isset($_FILES["coop_applicant_signature"]) && $_FILES["coop_applicant_signature"]["error"] == 0) {
        $coop_applicant_signature_path = $target_dir . basename($_FILES["coop_applicant_signature"]["name"]);
        move_uploaded_file($_FILES["coop_applicant_signature"]["tmp_name"], $coop_applicant_signature_path);
    } else{
        $sql_coop_applicant_signature = "SELECT coop_applicant_signature FROM coop_application_form WHERE email = '$email'";
        $result_signature = mysqli_query($conn, $sql_coop_applicant_signature);
        $row_signature = mysqli_fetch_array($result_signature);
        $coop_applicant_signature_path = $row_signature["coop_applicant_signature"];
    }

    if (isset($_FILES["coop_petition_documennt"]) && $_FILES["coop_petition_documennt"]["error"] == 0) {
        $coop_petition_documennt_path = $target_dir . basename($_FILES["coop_petition_documennt"]["name"]);
        move_uploaded_file($_FILES["coop_petition_documennt"]["tmp_name"], $coop_petition_documennt_path);
    } else{
        $sql_coop_petition_documennt = "SELECT coop_petition_documennt FROM coop_application_form WHERE email = '$email'";
        $result_documennt = mysqli_query($conn, $sql_coop_petition_documennt);
        $row_document = mysqli_fetch_array($result_documennt);
        $coop_petition_documennt_path = $row_document["coop_petition_documennt"];
    }

    if (isset($_FILES["coop_copy_std_id_card_file"]) && $_FILES["coop_copy_std_id_card_file"]["error"] == 0) {
        $coop_copy_std_id_card_file_path = $target_dir . basename($_FILES["coop_copy_std_id_card_file"]["name"]);
        move_uploaded_file($_FILES["coop_copy_std_id_card_file"]["tmp_name"], $coop_copy_std_id_card_file_path);
    } else{
        $sqlstd_id_card_file = "SELECT coop_copy_std_id_card_file FROM coop_application_form WHERE email = '$email'";
        $result_std_id_card_file = mysqli_query($conn, $sqlstd_id_card_file);
        $row_std_id_card_file = mysqli_fetch_array($result_std_id_card_file);
        $coop_copy_std_id_card_file_path = $row_std_id_card_file["coop_copy_std_id_card_file"];
    }

    if (isset($_FILES["coop_copy_id_card_file"]) && $_FILES["coop_copy_id_card_file"]["error"] == 0) {
        $coop_copy_id_card_file_path = $target_dir . basename($_FILES["coop_copy_id_card_file"]["name"]);
        move_uploaded_file($_FILES["coop_copy_id_card_file"]["tmp_name"], $coop_copy_id_card_file_path);
    } else{
        $sqlcopy_id_card_file = "SELECT coop_copy_id_card_file FROM coop_application_form WHERE email = '$email'";
        $result_copy_id_card_file = mysqli_query($conn, $sqlcopy_id_card_file);
        $row_copy_id_card_file = mysqli_fetch_array($result_copy_id_card_file);
        $coop_copy_id_card_file_path = $row_copy_id_card_file["coop_copy_id_card_file"];
    }

    if (isset($_FILES["coop_copy_acadamic_report_file"]) && $_FILES["coop_copy_acadamic_report_file"]["error"] == 0) {
        $coop_copy_acadamic_report_file_path = $target_dir . basename($_FILES["coop_copy_acadamic_report_file"]["name"]);
        move_uploaded_file($_FILES["coop_copy_acadamic_report_file"]["tmp_name"], $coop_copy_acadamic_report_file_path);
    } else{
        $sqlacadamic_report = "SELECT coop_copy_acadamic_report_file FROM coop_application_form WHERE email = '$email'";
        $result_acadamic_report = mysqli_query($conn, $sqlacadamic_report);
        $row_acadamic_report = mysqli_fetch_array($result_acadamic_report);
        $coop_copy_acadamic_report_file_path = $row_acadamic_report["coop_copy_acadamic_report_file"];
    }

    if (isset($_FILES["coop_cv_file"]) && $_FILES["coop_cv_file"]["error"] == 0) {
        $coop_cv_file_path = $target_dir . basename($_FILES["coop_cv_file"]["name"]);
        move_uploaded_file($_FILES["coop_cv_file"]["tmp_name"], $coop_cv_file_path);
    } else{
        $sqlcoop_cv_file = "SELECT coop_cv_file FROM coop_application_form WHERE email = '$email'";
        $result_coop_cv_file = mysqli_query($conn, $sqlcoop_cv_file);
        $row_coop_cv_file = mysqli_fetch_array($result_coop_cv_file);
        $coop_cv_file_path = $row_coop_cv_file["coop_cv_file"];
    }



    $sql = "UPDATE coop_application_form SET
            coop_name_of_employer = '$coop_name_of_employer',
            coop_position = '$coop_position',
            coop_working_period_start = '$coop_working_period_start',
            coop_prefix_thai = '$coop_prefix_thai',
            coop_fname_thai = '$coop_fname_thai',
            coop_lname_thai = '$coop_lname_thai',
            coop_prefix_eng = '$coop_prefix_eng',
            coop_fname_eng = '$coop_fname_eng',
            coop_lname_eng = '$coop_lname_eng',
            coop_std_id = '$coop_std_id',
            coop_year_of_study = '$coop_year_of_study',
            coop_faculty = '$coop_faculty',
            coop_field_of_study = '$coop_field_of_study',
            coop_advisor_prefix = '$coop_advisor_prefix',
            coop_advisor_fname = '$coop_advisor_fname',
            coop_advisor_lname = '$coop_advisor_lname',
            coop_gpa = '$coop_gpa',
            coop_phone = '$coop_phone',
            coop_std_address = '$coop_std_address',
            coop_std_subdistrict = '$coop_std_subdistrict',
            coop_std_district = '$coop_std_district',
            coop_std_province = '$coop_std_province',
            coop_std_zip = '$coop_std_zip',

            coop_emergency_fname = '$coop_emergency_fname',
            coop_emergency_lname = '$coop_emergency_lname',
            coop_emergency_relation = '$coop_emergency_relation',
            coop_emergency_occupation = '$coop_emergency_occupation',
            coop_emergency_place_of_work = '$coop_emergency_place_of_work',
            coop_emergency_address = '$coop_emergency_address',
            coop_emergency_subdistrict = '$coop_emergency_subdistrict',
            coop_emergency_district = '$coop_emergency_district',
            coop_emergency_province = '$coop_emergency_province',
            coop_emergency_zip = '$coop_emergency_zip',
            coop_emergency_phone = '$coop_emergency_phone',
            coop_emergency_email = '$coop_emergency_email',
            coop_career_objective = '$coop_career_objective',
            std_application_profile_img = '$std_application_profile_img_path',
            coop_applicant_signature = '$coop_applicant_signature_path',
            coop_petition_documennt = '$coop_petition_documennt_path',
            coop_copy_std_id_card_file = '$coop_copy_std_id_card_file_path',
            coop_copy_id_card_file = '$coop_copy_id_card_file_path',
            coop_copy_acadamic_report_file = '$coop_copy_acadamic_report_file_path',
            coop_cv_file = '$coop_cv_file_path',
            status_admin = 1
            WHERE email = '$email'";

    if (mysqli_query($conn, $sql)) {
        // เพิ่มส่วนของ SweetAlert2 ที่แสดงเมื่ออัปเดตข้อมูลสำเร็จ
        echo "<script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>";
        echo "<script>";
        echo "Swal.fire({";
        echo "    icon: 'success',";
        echo "    title: 'แจ้งเตือน',";
        echo "    text: 'อัปเดตข้อมูลสำเร็จ',";
        echo "    showConfirmButton: true"; // แสดงปุ่ม OK เพื่อให้ผู้ใช้คลิกเพื่อปิดหน้าต่าง
        echo "}).then(function () {";
        echo "    window.location ='./application_detail.php';";
        echo "});";
        echo "</script>";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
    mysqli_close($conn);
}
