

<?php
include('./include_sweetalert.php');
include './work/dbwork.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // รับค่า 'email' จากฟอร์ม
    $email = $_POST['email'];

    // รับค่า 'status_admin' จากฟอร์ม
    $status_admin = $_POST['status_admin'];

    // รับค่า 'comment' จากฟอร์ม
    $comment = $_POST['comment'];

    // ใช้คำสั่ง SQL UPDATE เพื่ออัปเดตข้อมูล
    $sql = "UPDATE supervision_recording SET 
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
