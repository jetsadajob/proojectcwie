
<?php
include('./include_sweetalert.php');
include './work/dbwork.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email']; // รับค่า 'email' จากฟอร์ม

    $sql = "UPDATE login_student SET status_end = 1 WHERE email = '$email'"; // คำสั่ง SQL อัปเดต
    $result = mysqli_query($conn, $sql);

    if ($result) {
        echo '<script>
        setTimeout(function() {
            swal({
                title: "ตรวจสอบข้อมูลสำเร็จ",
                type: "success"
            }, function() {
                window.location = "./submitcooperative.php?id=' . $email . '"; // ส่งกลับไปยังหน้า detilcoop.php พร้อมกับ id
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
                window.location = "./submitcooperative.php?id=' . $email . '"; // ส่งกลับไปยังหน้า detilcoop.php พร้อมกับ id
            });
        }, 1000);
    </script>';
       
    }
}

mysqli_close($conn);
?>
