<?php

include('../include_sweetalert.php');
include '../work/dbwork.php';

$email = $_SESSION['email'];


if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    if (isset($_SESSION['email'])) {
        $email = mysqli_real_escape_string($conn, $_SESSION['email']);

        $username = isset($_POST['name']) ? mysqli_real_escape_string($conn, $_POST['name']) : '';


        $sql = "UPDATE  SET 
            name = '$username'
            WHERE email = '$email'";


        if (mysqli_query($conn, $sql)) {

            echo '<script>
                                        setTimeout(function() {
                                            swal({
                                                title: "แก้ไขชื่อผู้ใช้สำเร็จ",
                                                type: "success"
                                            }, function() {
                                                window.location = "./profile.php";
                                            });
                                        }, 1000);
                                    </script>';
            mysqli_close($conn);
        } else {
            echo '<script>
                                        setTimeout(function() {
                                            swal({
                                                title: "เกิดข้อผิดพลาดไม่สามารถแก้ไขชื่อผู้ใช้ได้",
                                                type: "error"
                                            }, function() {
                                                window.location = "./profile.php";
                                            });
                                        }, 1000);
                                    </script>';
        }
    }
}
}
?>