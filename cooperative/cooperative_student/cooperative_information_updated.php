<?php
session_start();
include '../server.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_SESSION['user_id'])) {
        $user_id = $_SESSION['user_id'];
        $std_prefix = isset($_POST['std_prefix']) ? mysqli_real_escape_string($conn, $_POST['std_prefix']) : '';
        $std_fname = isset($_POST['std_fname']) ? mysqli_real_escape_string($conn, $_POST['std_fname']) : '';
        $std_lname = isset($_POST['std_lname']) ? mysqli_real_escape_string($conn, $_POST['std_lname']) : '';
        $std_id = isset($_POST['std_id']) ? mysqli_real_escape_string($conn, $_POST['std_id']) : '';
        $year_of_study = isset($_POST['year_of_study']) ? mysqli_real_escape_string($conn, $_POST['year_of_study']) : '';
        $major = isset($_POST['major']) ? mysqli_real_escape_string($conn, $_POST['major']) : '';
        $std_birthday = isset($_POST['std_birthday']) ? mysqli_real_escape_string($conn, $_POST['std_birthday']) : '';
        $std_age = isset($_POST['std_age']) ? mysqli_real_escape_string($conn, $_POST['std_age']) : '';
        $std_phone = isset($_POST['std_phone']) ? mysqli_real_escape_string($conn, $_POST['std_phone']) : '';
        $teacher_prefix = isset($_POST['teacher_prefix']) ? mysqli_real_escape_string($conn, $_POST['teacher_prefix']) : '';
        $teacher_fname = isset($_POST['teacher_fname']) ? mysqli_real_escape_string($conn, $_POST['teacher_fname']) : '';
        $teacher_lname = isset($_POST['teacher_lname']) ? mysqli_real_escape_string($conn, $_POST['teacher_lname']) : '';
        $teacher_email = isset($_POST['teacher_email']) ? mysqli_real_escape_string($conn, $_POST['teacher_email']) : '';

        // สร้างคำสั่ง SQL สำหรับการอัปเดตข้อมูล 
        $sql = "UPDATE login_student SET 
                std_prefix = '$std_prefix',
                std_fname = '$std_fname',
                std_lname = '$std_lname',
                std_id = '$std_id',
                year_of_study = '$year_of_study',
                major = '$major',
                std_birthday = '$std_birthday',
                std_age = '$std_age',
                std_phone = '$std_phone',
                teacher_prefix = '$teacher_prefix',
                teacher_fname = '$teacher_fname',
                teacher_lname = '$teacher_lname',
                teacher_email = '$teacher_email'
                WHERE id = '$user_id'";

        // ทำการอัปเดตข้อมูลในฐานข้อมูล
        if (mysqli_query($conn, $sql)) {
            // หากอัปเดตข้อมูลสำเร็จ ให้แสดงข้อความแจ้งเตือนและ redirect ไปยังหน้า cooperative_information_detail.php
            echo "<script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>";
            echo "<script>";
            echo "Swal.fire({";
            echo "    icon: 'success',";
            echo "    title: 'แจ้งเตือน',";
            echo "    text: 'อัปเดตข้อมูลสำเร็จ',";
            echo "    showConfirmButton: true";
            echo "}).then(function () {";
            echo "    window.location ='./cooperative_information_detail.php';";
            echo "});";
            echo "</script>";
        } else {
            // หากเกิดข้อผิดพลาดในการอัปเดตข้อมูล ให้แสดงข้อความข้อผิดพลาด
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    }
}
?>