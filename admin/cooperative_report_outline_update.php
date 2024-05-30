<?php
include('./include_sweetalert.php');
include './work/dbwork.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $status_admin = $_POST['status_admin'];
    $comment = $_POST['comment'];

    // ทำความสะอาดค่า email ก่อนใช้ใน header
    $clean_email = trim($email);

    $sql = "UPDATE cooperative_report_outline SET 
    comment='$comment',
    status_admin='$status_admin'
    WHERE email='$email'";

    $result = mysqli_query($conn, $sql);
    if ($result) {
        echo '<script>
        setTimeout(function() {
            swal({
                title: "ตรวจสอบข้อมูลสำเร็จ",
                type: "success"
            }, function() {
                window.location = "./detilcoop_success2.php?id=' . $email . '"; // ส่งกลับไปยังหน้า detilcoop.php พร้อมกับ id
            });
        }, 1000);
    </script>';
        exit;
    } else {
        echo '<script>
        setTimeout(function() {
            swal({
                title: "เกิดข้อผิดพลาดไม่สามารถตรวจสอบข้อมูลสำเร็จได้",
                type: "error"
            }, function() {
                window.location = "./detilcoop_success2.php?id=' . $email . '"; // ส่งกลับไปยังหน้า detilcoop.php พร้อมกับ id
            });
        }, 1000);
    </script>';
    }
}

mysqli_close($conn);
?>
