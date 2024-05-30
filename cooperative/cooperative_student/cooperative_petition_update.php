<?php
session_start();
include('./include_sweetalert.php');
include('../server.php');
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
    $petition_prefix = mysqli_real_escape_string($conn, $_POST['petition_prefix']);
    $petition_fname = mysqli_real_escape_string($conn, $_POST['petition_fname']);
    $petition_lname = mysqli_real_escape_string($conn, $_POST['petition_lname']);
    $petition_year_of_study = mysqli_real_escape_string($conn, $_POST['petition_year_of_study']);
    $petition_field_of_study = mysqli_real_escape_string($conn, $_POST['petition_field_of_study']);
    $petition_project = mysqli_real_escape_string($conn, $_POST['petition_project']);
    $petition_organiztion_name = mysqli_real_escape_string($conn, $_POST['petition_organiztion_name']);
    $petition_name_of_coordinator = mysqli_real_escape_string($conn, $_POST['petition_name_of_coordinator']);
    $petition_position = mysqli_real_escape_string($conn, $_POST['petition_position']);
    $petition_phone = mysqli_real_escape_string($conn, $_POST['petition_phone']);
    $petition_email = mysqli_real_escape_string($conn, $_POST['petition_email']);
    $petition_fax = mysqli_real_escape_string($conn, $_POST['petition_fax']);
    $petition_address = mysqli_real_escape_string($conn, $_POST['petition_address']);
    $petition_subdistrict = mysqli_real_escape_string($conn, $_POST['petition_subdistrict']);
    $petition_district = mysqli_real_escape_string($conn, $_POST['petition_district']);
    $petition_province = mysqli_real_escape_string($conn, $_POST['petition_province']);
    $petition_zip = mysqli_real_escape_string($conn, $_POST['petition_zip']);
    $petition_website = mysqli_real_escape_string($conn, $_POST['petition_website']);
    $petition_wishes_to_prectice = mysqli_real_escape_string($conn, $_POST['petition_wishes_to_prectice']);


    // ตัวแปรสำหรับเก็บเส้นทางไฟล์
    $petition_graduation_document_file_path = '';
    $petition_book_path = '';
    $petition_applicant_signature_file_path = '';

    $target_dir = "../uploads/";

    // อัปโหลดไฟล์ petition_graduation_document_file
    if (isset($_FILES["petition_graduation_document_file"]) && $_FILES["petition_graduation_document_file"]["error"] == 0) {
        $petition_graduation_document_file_path = $target_dir . basename($_FILES["petition_graduation_document_file"]["name"]);
        move_uploaded_file($_FILES["petition_graduation_document_file"]["tmp_name"], $petition_graduation_document_file_path);
    } else {
        $sqlgraduation = "SELECT petition_graduation_document_file FROM petition_document WHERE email = '$email'";
        $result_graduation = mysqli_query($conn, $sqlgraduation);
        $row_graduation = mysqli_fetch_array($result_graduation);
        $petition_graduation_document_file_path = $row_graduation["petition_graduation_document_file"];
    }

    // อัปโหลดไฟล์ petition_book
    if (isset($_FILES["petition_book"]) && $_FILES["petition_book"]["error"] == 0) {
        $petition_book_path = $target_dir . basename($_FILES["petition_book"]["name"]);
        move_uploaded_file($_FILES["petition_book"]["tmp_name"], $petition_book_path);
    } else {
        $sqlpetition_book = "SELECT petition_book FROM petition_document WHERE email = '$email'";
        $result_petition_book = mysqli_query($conn, $sqlpetition_book);
        $row_petition_book = mysqli_fetch_array($result_petition_book);
        $petition_book_path = $row_petition_book["petition_book"];
    }

    // อัปโหลดไฟล์ petition_applicant_signature_file
    if (isset($_FILES["petition_applicant_signature_file"]) && $_FILES["petition_applicant_signature_file"]["error"] == 0) {
        $petition_applicant_signature_file_path = $target_dir . basename($_FILES["petition_applicant_signature_file"]["name"]);
        move_uploaded_file($_FILES["petition_applicant_signature_file"]["tmp_name"], $petition_applicant_signature_file_path);
    } else {
        $sqlpetition_applicant_signature_file = "SELECT petition_applicant_signature_file FROM petition_document WHERE email = '$email'";
        $result_petition_applicant_signature_file = mysqli_query($conn, $sqlpetition_applicant_signature_file);
        $row_petition_applicant_signature_file = mysqli_fetch_array($result_petition_applicant_signature_file);
        $petition_applicant_signature_file_path = $row_petition_applicant_signature_file["petition_applicant_signature_file"];
    }
 
    // คำสั่ง SQL สำหรับอัพเดตข้อมูล
    $sql = "UPDATE petition_document SET
            petition_prefix = '$petition_prefix',
            petition_fname = '$petition_fname',
            petition_lname = '$petition_lname',
            petition_year_of_study = '$petition_year_of_study',
            petition_field_of_study = '$petition_field_of_study',
            petition_project = '$petition_project',
            petition_organiztion_name = '$petition_organiztion_name',
            petition_name_of_coordinator = '$petition_name_of_coordinator',
            petition_position = '$petition_position',
            petition_phone = '$petition_phone',
            petition_email = '$petition_email',
            petition_fax = '$petition_fax',
            petition_address = '$petition_address',
            petition_subdistrict = '$petition_subdistrict',
            petition_district = '$petition_district',
            petition_province = '$petition_province',
            petition_zip = '$petition_zip',
            petition_website = '$petition_website',
            petition_wishes_to_prectice = '$petition_wishes_to_prectice',
            petition_graduation_document_file = '$petition_graduation_document_file_path',
            petition_book = '$petition_book_path',
            petition_applicant_signature_file = '$petition_applicant_signature_file_path',
            status_admin = 1
            WHERE email = '$email'";

if (mysqli_query($conn, $sql)) {
    // โค้ด SweetAlert
    echo "<script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>";
    echo "<script>";
    echo "Swal.fire({";
    echo "    icon: 'success',";
    echo "    title: 'แจ้งเตือน',";
    echo "    text: 'อัปเดตข้อมูลสำเร็จ',";
    echo "    showConfirmButton: true";
    echo "}).then(function () {";
    echo "    window.location = './petition_detail.php';";
    echo "});";
    echo "</script>";
} else {
    // แสดงข้อผิดพลาดหากมี
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

}
?>