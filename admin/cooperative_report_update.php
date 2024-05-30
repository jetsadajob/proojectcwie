
<?php
include './work/dbwork.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // รับค่า 'email' จากฟอร์ม
    $email = $_POST['email'];

    // รับค่า 'status_admin' จากฟอร์ม
    $status_admin = $_POST['status_admin'];

    // รับค่า 'comment' จากฟอร์ม
    $comment = $_POST['comment'];

    // ใช้คำสั่ง SQL UPDATE เพื่ออัปเดตข้อมูล
    $sql = "UPDATE coopperative_education_report_form SET 
    comment='$comment',
    status_admin='$status_admin'
    WHERE email='$email'";


    $result = mysqli_query($conn, $sql);
    if ($result) {
        header("Location: detilcoop_success.php?id=$email"); // ส่งกลับไปยังหน้า detilinterns.php พร้อมกับ id
        exit;
    } else {
        echo "error"; // ส่งข้อความกลับไปยัง JavaScript เพื่อบอกว่าอัปเดตไม่สำเร็จ
    }

}

mysqli_close($conn);
?>
