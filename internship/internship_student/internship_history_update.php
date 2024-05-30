<?php
session_start();
include('./include_sweetalert.php');

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$servername = "localhost";
$username = "itwebsit_itweb126_projectcwie"; // or your database username
$password = "Kt85gLyHOzgzEKosNw6s"; // or your database password
$dbname = "itwebsit_itweb126_projectcwie";


$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

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
    $std_history_prefix = mysqli_real_escape_string($conn, $_POST['std_history_prefix']);
    $std_history_fname = mysqli_real_escape_string($conn, $_POST['std_history_fname']);
    $std_history_lname = mysqli_real_escape_string($conn, $_POST['std_history_lname']);
    $std_history_std_id = mysqli_real_escape_string($conn, $_POST['std_history_std_id']);
    $std_history_field_of_study = mysqli_real_escape_string($conn, $_POST['std_history_field_of_study']);
    $std_history_faculty = mysqli_real_escape_string($conn, $_POST['std_history_faculty']);
    $std_history_birthday = mysqli_real_escape_string($conn, $_POST['std_history_birthday']);
    $std_history_age = mysqli_real_escape_string($conn, $_POST['std_history_age']);
    $std_history_race = mysqli_real_escape_string($conn, $_POST['std_history_race']);
    $std_history_nationality = mysqli_real_escape_string($conn, $_POST['std_history_nationality']);
    $std_history_religion = mysqli_real_escape_string($conn, $_POST['std_history_religion']);
    $std_history_address = mysqli_real_escape_string($conn, $_POST['std_history_address']);
    $std_history_subdistrict = mysqli_real_escape_string($conn, $_POST['std_history_subdistrict']);
    $std_history_district = mysqli_real_escape_string($conn, $_POST['std_history_district']);
    $std_history_province = mysqli_real_escape_string($conn, $_POST['std_history_province']);
    $std_history_zip = mysqli_real_escape_string($conn, $_POST['std_history_zip']);
    $std_history_original_address = mysqli_real_escape_string($conn, $_POST['std_history_original_address']);
    $std_history_original_subdistrict = mysqli_real_escape_string($conn, $_POST['std_history_original_subdistrict']);
    $std_history_original_district = mysqli_real_escape_string($conn, $_POST['std_history_original_district']);
    $std_history_original_province = mysqli_real_escape_string($conn, $_POST['std_history_original_province']);
    $std_history_original_zip = mysqli_real_escape_string($conn, $_POST['std_history_original_zip']);
    $std_history_email = mysqli_real_escape_string($conn, $_POST['std_history_email']);
    $std_history_father_fname = mysqli_real_escape_string($conn, $_POST['std_history_father_fname']);
    $std_history_father_lname = mysqli_real_escape_string($conn, $_POST['std_history_father_lname']);
    $std_history_father_occupation = mysqli_real_escape_string($conn, $_POST['std_history_father_occupation']);
    $std_history_father_phone = mysqli_real_escape_string($conn, $_POST['std_history_father_phone']);
    $std_history_father_office = mysqli_real_escape_string($conn, $_POST['std_history_father_office']);
    $std_history_mother_fname = mysqli_real_escape_string($conn, $_POST['std_history_mother_fname']);
    $std_history_mother_lname = mysqli_real_escape_string($conn, $_POST['std_history_mother_lname']);
    $std_history_mother_occupation = mysqli_real_escape_string($conn, $_POST['std_history_mother_occupation']);
    $std_history_mother_phone = mysqli_real_escape_string($conn, $_POST['std_history_mother_phone']);
    $std_history_mother_office = mysqli_real_escape_string($conn, $_POST['std_history_mother_office']);
    $student_history_parent_address = mysqli_real_escape_string($conn, $_POST['student_history_parent_address']);
    $student_history_parent_subdistrict = mysqli_real_escape_string($conn, $_POST['student_history_parent_subdistrict']);
    $student_history_parent_district = mysqli_real_escape_string($conn, $_POST['student_history_parent_district']);
    $student_history_parent_province = mysqli_real_escape_string($conn, $_POST['student_history_parent_province']);
    $student_history_parent_zip = mysqli_real_escape_string($conn, $_POST['student_history_parent_zip']);
    $student_history_apprentice = mysqli_real_escape_string($conn, $_POST['student_history_apprentice']);
    $std_history_start_date = mysqli_real_escape_string($conn, $_POST['std_history_start_date']);
    $std_history_end_date = mysqli_real_escape_string($conn, $_POST['std_history_end_date']);
    $std_history_talent = mysqli_real_escape_string($conn, $_POST['std_history_talent']);
    $std_history_computer_proficiency = mysqli_real_escape_string($conn, $_POST['std_history_computer_proficiency']);
    $std_history_awards = mysqli_real_escape_string($conn, $_POST['std_history_awards']);
    $std_history_job_interest = mysqli_real_escape_string($conn, $_POST['std_history_job_interest']);
    $std_history_head_prefix = mysqli_real_escape_string($conn, $_POST['std_history_head_prefix']);
    $std_history_head_fname = mysqli_real_escape_string($conn, $_POST['std_history_head_fname']);
    $std_history_head_lname = mysqli_real_escape_string($conn, $_POST['std_history_head_lname']);
    $std_history_head_phone = mysqli_real_escape_string($conn, $_POST['std_history_head_phone']);
    $std_history_acting_dean_prefix = mysqli_real_escape_string($conn, $_POST['std_history_acting_dean_prefix']);
    $std_history_acting_dean_fname = mysqli_real_escape_string($conn, $_POST['std_history_acting_dean_fname']);
    $std_history_acting_dean_lname = mysqli_real_escape_string($conn, $_POST['std_history_acting_dean_lname']);
    $std_history_acting_dean_phone = mysqli_real_escape_string($conn, $_POST['std_history_acting_dean_phone']);


    // ตัวแปรสำหรับเก็บเส้นทางไฟล์
    $std_history_profile_img_path = '';

    $target_dir = "../uploads/";

    // อัปโหลดไฟล์ std_history_profile_img
    if (isset($_FILES["std_history_profile_img"]) && $_FILES["std_history_profile_img"]["error"] == 0) {
        $std_history_profile_img_path = $target_dir . basename($_FILES["std_history_profile_img"]["name"]);
        move_uploaded_file($_FILES["std_history_profile_img"]["tmp_name"], $std_history_profile_img_path);
    } else {
        $sql_std_history_profile_img = "SELECT std_history_profile_img FROM student_history WHERE email = '$email'";
        $result_std_history_profile_img = mysqli_query($conn, $sql_std_history_profile_img);
        $row_std_history_profile_img = mysqli_fetch_array($result_std_history_profile_img);
        $std_history_profile_img_path = $row_std_history_profile_img["std_history_profile_img"];
    }



    // คำสั่ง SQL สำหรับอัพเดตข้อมูล
    $sql = "UPDATE student_history SET
    std_history_profile_img = '$std_history_profile_img_path',
    std_history_prefix = '$std_history_prefix',
    std_history_fname = '$std_history_fname',
    std_history_lname = '$std_history_lname',
    std_history_std_id = '$std_history_std_id',
    std_history_field_of_study = '$std_history_field_of_study',
    std_history_faculty = '$std_history_faculty',
    std_history_birthday = '$std_history_birthday',
    std_history_age = '$std_history_age',
    std_history_race = '$std_history_race',
    std_history_nationality = '$std_history_nationality',
    std_history_religion = '$std_history_religion',
    std_history_address = '$std_history_address',
    std_history_subdistrict = '$std_history_subdistrict',
    std_history_district = '$std_history_district',
    std_history_province = '$std_history_province',
    std_history_zip = '$std_history_zip',
    std_history_original_address = '$std_history_original_address',
    std_history_original_subdistrict = '$std_history_original_subdistrict',
    std_history_original_district = '$std_history_original_district',
    std_history_original_province = '$std_history_original_province',
    std_history_original_zip = '$std_history_original_zip',
    std_history_email = '$std_history_email',
    std_history_father_fname = '$std_history_father_fname',
    std_history_father_lname = '$std_history_father_lname',
    std_history_father_occupation = '$std_history_father_occupation',
    std_history_father_phone = '$std_history_father_phone',
    std_history_father_office = '$std_history_father_office',
    std_history_mother_fname = '$std_history_mother_fname',
    std_history_mother_lname = '$std_history_mother_lname',
    std_history_mother_occupation = '$std_history_mother_occupation',
    std_history_mother_phone = '$std_history_mother_phone',
    std_history_mother_office = '$std_history_mother_office',
    student_history_parent_address = '$student_history_parent_address',
    student_history_parent_subdistrict = '$student_history_parent_subdistrict',
    student_history_parent_district = '$student_history_parent_district',
    student_history_parent_province = '$student_history_parent_province',
    student_history_parent_zip = '$student_history_parent_zip',
    student_history_apprentice = '$student_history_apprentice',
    std_history_start_date = '$std_history_start_date',
    std_history_end_date = '$std_history_end_date',
    std_history_talent = '$std_history_talent',
    std_history_computer_proficiency = '$std_history_computer_proficiency',
    std_history_awards = '$std_history_awards',
    std_history_job_interest = '$std_history_job_interest',
    std_history_head_prefix = '$std_history_head_prefix',
    std_history_head_fname = '$std_history_head_fname',
    std_history_head_lname = '$std_history_head_lname',
    std_history_head_phone = '$std_history_head_phone',
    std_history_acting_dean_prefix = '$std_history_acting_dean_prefix',
    std_history_acting_dean_fname = '$std_history_acting_dean_fname',
    std_history_acting_dean_lname = '$std_history_acting_dean_lname',
    std_history_acting_dean_phone = '$std_history_acting_dean_phone',
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
    echo "    window.location = './history_detail.php';";
    echo "});";
    echo "</script>";
} else {
    // แสดงข้อผิดพลาดหากมี
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

}
?>
