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

    // รับค่าจากฟอร์ม
    $std_company = mysqli_real_escape_string($conn, $_POST['std_company']);
    $std_executive = mysqli_real_escape_string($conn, $_POST['std_executive']);
    $std_officer = mysqli_real_escape_string($conn, $_POST['std_officer']);
    $std_supervisor = mysqli_real_escape_string($conn, $_POST['std_supervisor']);
    $std_workload = mysqli_real_escape_string($conn, $_POST['std_workload']);
    $std_quality_of_work = mysqli_real_escape_string($conn, $_POST['std_quality_of_work']);
    $std_safety = mysqli_real_escape_string($conn, $_POST['std_safety']);
    $std_coordinate = mysqli_real_escape_string($conn, $_POST['std_coordinate']);
    $std_orientation = mysqli_real_escape_string($conn, $_POST['std_orientation']);
    $std_consulting_students = mysqli_real_escape_string($conn, $_POST['std_consulting_students']);
    $std_consulting_knowledgeable = mysqli_real_escape_string($conn, $_POST['std_consulting_knowledgeable']);
    $std_consulting_peration = mysqli_real_escape_string($conn, $_POST['std_consulting_peration']);
    $std_consulting_assignwork = mysqli_real_escape_string($conn, $_POST['std_consulting_assignwork']);
    $std_preparation = mysqli_real_escape_string($conn, $_POST['std_preparation']);
    $std_compensation = mysqli_real_escape_string($conn, $_POST['std_compensation']);
    $std_welfare_benefit = mysqli_real_escape_string($conn, $_POST['std_welfare_benefit']);
    $std_equipment_readiness = mysqli_real_escape_string($conn, $_POST['std_equipment_readiness']);
    $std_evaluation = mysqli_real_escape_string($conn, $_POST['std_evaluation']);
    $std_overall_quality = mysqli_real_escape_string($conn, $_POST['std_overall_quality']);
    $std_suggestions = mysqli_real_escape_string($conn, $_POST['std_suggestions']); // ลบ comment ออก

    // คำสั่ง SQL สำหรับอัปเดตข้อมูล
    $sql = "UPDATE supervision_recording SET 
                std_company = '$std_company',
                std_executive = '$std_executive', 
                std_officer = '$std_officer',
                std_supervisor = '$std_supervisor',
                std_workload = '$std_workload',
                std_quality_of_work = '$std_quality_of_work',
                std_safety = '$std_safety',
                std_coordinate = '$std_coordinate',
                std_orientation = '$std_orientation',
                std_consulting_students = '$std_consulting_students',
                std_consulting_knowledgeable = '$std_consulting_knowledgeable',
                std_consulting_peration = '$std_consulting_peration',
                std_consulting_assignwork = '$std_consulting_assignwork',
                std_preparation = '$std_preparation',
                std_compensation = '$std_compensation',
                std_welfare_benefit = '$std_welfare_benefit',
                std_equipment_readiness = '$std_equipment_readiness',
                std_evaluation = '$std_evaluation',
                std_overall_quality = '$std_overall_quality',
                std_suggestions = '$std_suggestions', 
                status_admin = 1
            WHERE email = '$email'";

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
        echo "    window.location ='./supervision_recording_student_detail.php';";
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
