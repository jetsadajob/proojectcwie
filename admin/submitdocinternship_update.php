
<?php
include('./include_sweetalert.php');
include './work/dbwork.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email']; // รับค่า 'email' จากฟอร์ม
    $status_end = $_POST['status_end']; // รับค่า 'status_end' จากฟอร์ม

    // ตรวจสอบความถูกต้องของข้อมูลที่รับมา
    if ($status_end == 2) {
        $sql = "UPDATE login_student SET status_end = $status_end WHERE email = '$email'";
        $result = mysqli_query($conn, $sql);

        if ($result) {
            echo '<script>
            setTimeout(function() {
                swal({
                    title: "ตรวจสอบข้อมูลสำเร็จ",
                    type: "success"
                }, function() {
                    window.location = "./submitdocinternship.php?id=' . $email . '"; // ส่งกลับไปยังหน้า detilcoop.php พร้อมกับ id
                });
            }, 1000);
        </script>';
            // header("Location: submitdocinternship.php?id=$email"); // ส่งกลับไปยังหน้า submitinternship.php
            
            exit;
        } else {
            echo '<script>
            setTimeout(function() {
                swal({
                    title: "เกิดข้อผิดพลาดไม่สามารถตรวจสอบข้อมูลสำเร็จได้",
                    type: "error"
                }, function() {
                    window.location = "./submitdocinternship.php?id=' . $email . '"; // ส่งกลับไปยังหน้า detilcoop.php พร้อมกับ id
                });
            }, 1000);
        </script>';
            // echo "error"; // แสดงข้อความเมื่อมีข้อผิดพลาด
        }
    }
}

mysqli_close($conn);

?>
