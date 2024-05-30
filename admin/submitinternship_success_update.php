
<?php
include './work/dbwork.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email']; // รับค่า 'email' จากฟอร์ม

    $sql = "UPDATE login_student SET status_end = 1 WHERE email = '$email'"; // คำสั่ง SQL อัปเดต
    $result = mysqli_query($conn, $sql);

    if ($result) {
        header("Location: submitinternship.php"); // ส่งกลับไปยังหน้า submitdocinternship.php
        exit;
    } else {
        echo "error"; // แสดงข้อความเมื่อมีข้อผิดพลาด
    }
}

mysqli_close($conn);
?>
