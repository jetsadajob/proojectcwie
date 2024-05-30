<?php
include('./include_sweetalert.php');
include('../server.php'); 

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    session_start();
    if (isset($_SESSION['internship_student_login'])) {
        $email = mysqli_real_escape_string($conn, $_SESSION['internship_student_login']);

        // ตรวจสอบว่าค่า POST ที่ต้องการมีอยู่จริง
        $infor_std_prefix = isset($_POST['infor_std_prefix']) ? mysqli_real_escape_string($conn, $_POST['infor_std_prefix']) : '';
        $infor_std_fname = isset($_POST['infor_std_fname']) ? mysqli_real_escape_string($conn, $_POST['infor_std_fname']) : '';
        $infor_std_lname = isset($_POST['infor_std_lname']) ? mysqli_real_escape_string($conn, $_POST['infor_std_lname']) : '';
        $infor_std_id = isset($_POST['infor_std_id']) ? mysqli_real_escape_string($conn, $_POST['infor_std_id']) : '';
        $infor_field_of_study = isset($_POST['infor_field_of_study']) ? mysqli_real_escape_string($conn, $_POST['infor_field_of_study']) : '';
        $infor_teacher_prefix = isset($_POST['infor_teacher_prefix']) ? mysqli_real_escape_string($conn, $_POST['infor_teacher_prefix']) : '';
        $infor_teacher_fname = isset($_POST['infor_teacher_fname']) ? mysqli_real_escape_string($conn, $_POST['infor_teacher_fname']) : '';
        $infor_teacher_lname = isset($_POST['infor_teacher_lname']) ? mysqli_real_escape_string($conn, $_POST['infor_teacher_lname']) : '';
        $infor_teacher_email = isset($_POST['infor_teacher_email']) ? mysqli_real_escape_string($conn, $_POST['infor_teacher_email']) : '';

        $sql = "UPDATE internship_information SET 
                    infor_std_prefix = '$infor_std_prefix', 
                    infor_std_fname = '$infor_std_fname',
                    infor_std_lname = '$infor_std_lname',
                    infor_std_id = '$infor_std_id',
                    infor_field_of_study = '$infor_field_of_study',
                    infor_teacher_prefix = '$infor_teacher_prefix',
                    infor_teacher_fname = '$infor_teacher_fname',
                infor_teacher_lname = '$infor_teacher_lname',
                infor_teacher_email = '$infor_teacher_email',
                status_admin = 1
            WHERE email = '$email'";

            if (mysqli_query($conn, $sql)) {
        mysqli_close($conn);
        echo "<script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>";
        echo "<script>";
        echo "Swal.fire({";
        echo "    icon: 'success',";
        echo "    title: 'แจ้งเตือน',";
        echo "    text: 'อัปเดตข้อมูลสำเร็จ',";
        echo "    showConfirmButton: true";
        echo "}).then(function () {";
        echo "    window.location ='./internship_information_detail.php';";
        echo "});";
        echo "</script>";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        mysqli_close($conn);
    }
    }
            }
            ?>