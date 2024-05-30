<?php
include './work/dbwork.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // รับค่า 'email' จากฟอร์ม
    $email = $_POST['email'];

    // คำสั่ง SQL ที่ใช้ในการอัปเดตข้อมูล
    $sql = "UPDATE login_student SET status_end = 2 WHERE email = '$email'";

    $result = mysqli_query($conn, $sql);
    if ($result) {
        header("Location: submitdocinternship.phpphp?id=$email"); // ส่งกลับไปยังหน้า submitdocinternship.php
        exit;
    } else {
        echo "error"; // แสดงข้อความเมื่อมีข้อผิดพลาดในการอัปเดต
    }
}

mysqli_close($conn);
?>
