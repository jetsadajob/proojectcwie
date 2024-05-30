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
    $outline_prefix = $conn->real_escape_string($_POST['outline_prefix']);
    $outline_fname = $conn->real_escape_string($_POST['outline_fname']);
    $outline_lname = $conn->real_escape_string($_POST['outline_lname']);
    $outline_std_id = $conn->real_escape_string($_POST['outline_std_id']);
    $outline_field_of_study = $conn->real_escape_string($_POST['outline_field_of_study']);
    $outline_faculty = $conn->real_escape_string($_POST['outline_faculty']);
    $outline_company_name = $conn->real_escape_string($_POST['outline_company_name']);
    $outline_address = $conn->real_escape_string($_POST['outline_address']);
    $outline_subdistrict = $conn->real_escape_string($_POST['outline_subdistrict']);
    $outline_district = $conn->real_escape_string($_POST['outline_district']);
    $outline_province = $conn->real_escape_string($_POST['outline_province']);
    $outline_zip = $conn->real_escape_string($_POST['outline_zip']);
    $outline_phone = $conn->real_escape_string($_POST['outline_phone']);
    $outline_fax = $conn->real_escape_string($_POST['outline_fax']);
    $outline_email = $conn->real_escape_string($_POST['outline_email']);
    $outline_detail_title_thai = $conn->real_escape_string($_POST['outline_detail_title_thai']);
    $outline_detail_title_eng = $conn->real_escape_string($_POST['outline_detail_title_eng']);
    $outline_detail_description = $conn->real_escape_string($_POST['outline_detail_description']);
    $outline_detail_expected_results = $conn->real_escape_string($_POST['outline_detail_expected_results']);
    $outline_detail_significance = $conn->real_escape_string($_POST['outline_detail_significance']);
    $outline_detail_reference = $conn->real_escape_string($_POST['outline_detail_reference']);
    $outline_detail_pjmethodology = $conn->real_escape_string($_POST['outline_detail_pjmethodology']);
    $outline_detail_scope = $conn->real_escape_string($_POST['outline_detail_scope']);
    $outline_detail_other = $conn->real_escape_string($_POST['outline_detail_other']);

    // คำสั่ง SQL แบบ Prepared Statement
    $stmt = $conn->prepare("UPDATE cooperative_report_outline SET 
                            outline_prefix = ?, 
                            outline_fname = ?, 
                            outline_lname = ?,
                            outline_std_id = ?,
                            outline_field_of_study = ?,
                            outline_faculty = ?,
                            outline_company_name = ?,
                            outline_address = ?,
                            outline_subdistrict = ?,
                            outline_district = ?,
                            outline_province = ?,
                            outline_zip = ?,
                            outline_phone = ?,
                            outline_fax = ?,
                            outline_email = ?,
                            outline_detail_title_thai = ?,
                            outline_detail_title_eng = ?,
                            outline_detail_description = ?,
                            outline_detail_expected_results = ?,
                            outline_detail_significance = ?,
                            outline_detail_reference = ?,
                            outline_detail_pjmethodology = ?, 
                            outline_detail_scope = ?, 
                            outline_detail_other = ?,
                            outline_work_plan_file = ?, 
                            outline_std_signature_img = ?,
                            outline_staff_signature_img = ?,
                            status_admin = 1
                        WHERE email = ?");

    // ตัวแปรสำหรับเก็บเส้นทางไฟล์
    $outline_work_plan_file = '';
    $outline_std_signature_img = '';
    $outline_staff_signature_img = '';

    // ตรวจสอบและอัปโหลดไฟล์
    if (!empty($_FILES["outline_work_plan_file"]["name"])) {
        $target_dir = "../uploads/";
        $outline_work_plan_file = $target_dir . basename($_FILES["outline_work_plan_file"]["name"]);
        move_uploaded_file($_FILES["outline_work_plan_file"]["tmp_name"], $outline_work_plan_file);
    } else{
        $sql_outline_work_plan_file = "SELECT outline_work_plan_file FROM cooperative_report_outline WHERE email = '$email'";
        $result_outline_work_plan_file = mysqli_query($conn, $sql_outline_work_plan_file);
        $row_outline_work_plan_file = mysqli_fetch_array($result_outline_work_plan_file);
        $outline_work_plan_file = $row_outline_work_plan_file["outline_work_plan_file"];
    }

    if (!empty($_FILES["outline_std_signature_img"]["name"])) {
        $target_dir = "../uploads/";
        $outline_std_signature_img = $target_dir . basename($_FILES["outline_std_signature_img"]["name"]);
        move_uploaded_file($_FILES["outline_std_signature_img"]["tmp_name"], $outline_std_signature_img);
    } else{
        $sql_outline_std_signature_img = "SELECT outline_std_signature_img FROM cooperative_report_outline WHERE email = '$email'";
        $result_outline_std_signature_img = mysqli_query($conn, $sql_outline_std_signature_img);
        $row_outline_std_signature_img = mysqli_fetch_array($result_outline_std_signature_img);
        $outline_std_signature_img = $row_outline_std_signature_img["outline_std_signature_img"];
    }

    if (!empty($_FILES["outline_staff_signature_img"]["name"])) {
        $target_dir = "../uploads/";
        $outline_staff_signature_img = $target_dir . basename($_FILES["outline_staff_signature_img"]["name"]);
        move_uploaded_file($_FILES["outline_staff_signature_img"]["tmp_name"], $outline_staff_signature_img);
    } else{
        $sql_outline_staff_signature_img = "SELECT outline_staff_signature_img FROM cooperative_report_outline WHERE email = '$email'";
        $result_outline_staff_signature_img = mysqli_query($conn, $sql_outline_staff_signature_img);
        $row_outline_staff_signature_img = mysqli_fetch_array($result_outline_staff_signature_img);
        $outline_staff_signature_img = $row_outline_staff_signature_img["outline_staff_signature_img"];
    }


    // Bind parameters 
    $stmt->bind_param("ssssssssssssssssssssssssssss",
        $outline_prefix,
        $outline_fname,
        $outline_lname,
        $outline_std_id,
        $outline_field_of_study,
        $outline_faculty,
        $outline_company_name,
        $outline_address,
        $outline_subdistrict,
        $outline_district,
        $outline_province,
        $outline_zip,
        $outline_phone,
        $outline_fax,
        $outline_email,
        $outline_detail_title_thai,
        $outline_detail_title_eng,
        $outline_detail_description,
        $outline_detail_expected_results,
        $outline_detail_significance,
        $outline_detail_reference,
        $outline_detail_pjmethodology,
        $outline_detail_scope,
        $outline_detail_other,
        $outline_work_plan_file,
        $outline_std_signature_img,
        $outline_staff_signature_img,
        $email
    );

    // ประมวลผลคำสั่ง SQL
    if ($stmt->execute()) {
        // อัปเดตสำเร็จ
        echo "<script>Swal.fire({icon: 'success', title: 'แจ้งเตือน', text: 'อัปเดตข้อมูลสำเร็จ'}).then(function () {window.location ='./report_outline_detail.php';});</script>";
    } else {
        // แสดงข้อผิดพลาด
        echo "Error: " . $stmt->error;
    }

    // ปิดการเชื่อมต่อ
    $stmt->close();
    $conn->close();
}
?>
