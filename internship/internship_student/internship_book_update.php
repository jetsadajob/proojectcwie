<?php
session_start();
include('./include_sweetalert.php');

$servername = "localhost";
$username = "itwebsit_itweb126_projectcwie"; // or your database username
$password = "Kt85gLyHOzgzEKosNw6s"; // or your database password
$dbname = "itwebsit_itweb126_projectcwie";


$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

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


    // ตรวจสอบว่ามีไฟล์ที่อัปโหลดหรือไม่
    if (isset($_FILES["internship_parental_file"]) && $_FILES["internship_parental_file"]["error"] == 0) {
        // กำหนดโฟลเดอร์ที่จะบันทึกไฟล์
        $target_dir = "../uploads/";
        // แสดงนามสกุลของไฟล์ที่อัปโหลด
        $file_extension = strtolower(pathinfo($_FILES["internship_parental_file"]["name"], PATHINFO_EXTENSION));
        // ตรวจสอบว่านามสกุลของไฟล์ถูกต้องหรือไม่
        if (in_array($file_extension, ['pdf', 'png', 'jpg', 'jpeg'])) {
            // สร้างชื่อไฟล์ใหม่โดยใช้ timestamp เพื่อไม่ให้ซ้ำกับไฟล์ที่มีอยู่แล้ว
            $filename = time() . '-' . basename($_FILES["internship_parental_file"]["name"]);
            // เตรียมพาธของไฟล์ที่จะบันทึก
            $target_file = $target_dir . $filename;
            // ย้ายไฟล์ไปยังโฟลเดอร์ที่กำหนด
            if (move_uploaded_file($_FILES["internship_parental_file"]["tmp_name"], $target_file)) {
                // ทำการอัปเดตข้อมูลในฐานข้อมูล
                $sql = "UPDATE internship_parental_consent_form SET 
                            	internship_parental_file = '" . mysqli_real_escape_string($conn, $filename) . "',
                            status_admin = 1
                        WHERE email = '$email'";
                // ทำการอัปเดตข้อมูล
                if (mysqli_query($conn, $sql)) {
                    // แสดง SweetAlert เมื่ออัปเดตข้อมูลสำเร็จ
                    echo "<script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>";
                    echo "<script>";
                    echo "Swal.fire({";
                    echo "    icon: 'success',";
                    echo "    title: 'แจ้งเตือน',";
                    echo "    text: 'อัปเดตข้อมูลสำเร็จ',";
                    echo "    showConfirmButton: true";
                    echo "}).then(function () {";
                    echo "    window.location ='./internship_book_detail.php';";
                    echo "});";
                    echo "</script>";
                } else {
                    // แสดง SweetAlert เมื่อมีข้อผิดพลาดในการอัปเดตข้อมูล
                    echo "<script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>";
                    echo "<script>";
                    echo "Swal.fire({";
                    echo "    icon: 'error',";
                    echo "    title: 'แจ้งเตือน',";
                    echo "    text: 'มีข้อผิดพลาดในการอัปเดตข้อมูล',";
                    echo "    showConfirmButton: true";
                    echo "}).then(function () {";
                        echo "    window.location ='./internship_book_detail.php';";
                    echo "});";
                    echo "</script>";
                }
            } else {
                // แสดง SweetAlert เมื่อเกิดข้อผิดพลาดในการย้ายไฟล์
                echo "<script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>";
                echo "<script>";
                echo "Swal.fire({";
                echo "    icon: 'error',";
                echo "    title: 'แจ้งเตือน',";
                echo "    text: 'มีข้อผิดพลาดในการย้ายไฟล์',";
                echo "    showConfirmButton: true";
                echo "}).then(function () {";
                    echo "    window.location ='./internship_book_detail.php';";
                echo "});";
                echo "</script>";
            }
        } else {
            // แสดง SweetAlert เมื่อนามสกุลของไฟล์ไม่ถูกต้อง
            echo "<script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>";
            echo "<script>";
            echo "Swal.fire({";
            echo "    icon: 'error',";
            echo "    title: 'แจ้งเตือน',";
            echo "    text: 'นามสกุลของไฟล์ไม่ถูกต้อง',";
            echo "    showConfirmButton: true";
            echo "}).then(function () {";
                echo "    window.location ='./internship_book_detail.php';";
            echo "});";
            echo "</script>";
        }
    } else {
        // แสดง SweetAlert เมื่อไม่มีการอัปโหลดไฟล์
        echo "<script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>";
        echo "<script>";
        echo "Swal.fire({";
        echo "    icon: 'error',";
        echo "    title: 'แจ้งเตือน',";
        echo "    text: 'ไม่มีการอัปโหลดไฟล์',";
        echo "    showConfirmButton: true";
        echo "}).then(function () {";
            echo "    window.location ='./internship_book_detail.php';";
        echo "});";
        echo "</script>";
    }

    // ปิดการเชื่อมต่อฐานข้อมูล
    mysqli_close($conn);
}
?>