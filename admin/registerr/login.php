<?php
include('./include_sweetalert.php');
session_start();
include '../functions.php';
$userdata = new DB_con();

if (isset($_POST['login'])) {
    $username = $_POST['name'];
    $password = $_POST['password'];

    $resule = $userdata->signin($username, $password);
    $num = mysqli_fetch_array($resule);

    if ($num > 0) {
        $_SESSION['id'] = $num['id'];
        $_SESSION['name'] = $num['name'];
        
        // แสดง SweetAlert2 เมื่อล็อกอินสำเร็จ
        echo "<script>
                const Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 3000,
                    timerProgressBar: true,
                    didOpen: (toast) => {
                        toast.onmouseenter = Swal.stopTimer;
                        toast.onmouseleave = Swal.resumeTimer;
                    }
                });
                Toast.fire({
                    icon: 'success',
                    title: 'ล็อกอินสำเร็จ'
                });
              </script>";
        echo "<script>window.location.href='../addmin.php'</script>";
    } else {
        echo "<script>alert('ไม่พบชื่อผู้ใช้! ');</script>";
        echo "<script>window.location.href='login.php'</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <meta name="description" content="Smarthr - Bootstrap Admin Template">
    <meta name="keywords" content="admin, estimates, bootstrap, business, corporate, creative, management, minimal, modern, accounts, invoice, html5, responsive, CRM, Projects">
    <meta name="author" content="Dreamguys - Bootstrap Admin Template">
    <meta name="robots" content="noindex, nofollow">
    <title>Login admin</title>

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="../assets/img/profiles/Computing_KKU.svg.png">
    <link rel="shortcut icon" type="image/x-icon" href="../assets/img/favicon.png">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">

    <!-- Fontawesome CSS -->
    <link rel="stylesheet" href="../assets/css/font-awesome.min.css">

    <!-- Main CSS -->
    <link rel="stylesheet" href="../assets/css/style.css">

    <!-- ฟอน CSS -->
    <!-- <link rel="stylesheet" href="../internship/assets/css/index.css"> -->

    <!-- Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans&family=Prompt&display=swap" rel="stylesheet">

    <style>
        .back {
            margin: 1%;
            position: absolute;
            margin-top: -41%;
            /* margin-left: -30%; */
            /* กำหนดค่าเปอร์เซ็นต์ให้เหมาะสมกับความกว้างของหน้าจอ */
        }


        .back a {
            text-decoration: none;
            color: black;
            color: gray;
            font-size: 16px;
        }

        
    </style>
</head>

<body class="account-page">

    

    <!-- Main Wrapper -->
    <div class="main-wrapper">

        <div class="account-content">
            

            <!-- <a href="job-list.html" class="btn btn-primary apply-btn">Apply Job</a> -->
            <div class="container">

            




                <div class="account-box">
                    <!-- Account Logo -->
                    <!-- <div class="account-logo">
                            <a href="login.php"><img src="../assets/img/profiles/icon.png"></a>
                        </div> -->
                    <!-- /Account Logo -->
                    <div class="account-wrapper">
                        <div class="account-logo">
                            <img src="../assets/img/profiles/icon.png" alt="logo">
                        </div>

                        <h3 class="account-title ">เข้าสู่ระบบ</h3>
                        <p class="account-subtitle"></p>

                        <!-- Account Form -->
                        <form method="post" onsubmit="return validateloginForm()" id="adwork" >
                            <div class="form-group">
                                <label>ชื่อผู้ใช้</label>
                                <input class="form-control" type="text" id="name" name="name" required>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col">
                                        <label>รหัสผ่าน</label>
                                    </div>
                                    <div class="col-auto ">
                                        <a class="text-muted" href="./forgot_password.php">
                                            ลืมรหัสผ่าน
                                        </a>
                                    </div>
                                </div>
                                <input class="form-control" type="password" id="password" name="password" required>
                            </div>
                            <div class="form-group text-center">
                                <button class="btn btn-primary account-btn" type="submit" name="login" onclick="return validateloginForm()">เข้าสู่ระบบ</button>
                            </div>
                            <div class="account-footer">
                                <!-- <p>มีบัญชีแล้วหรือยัง? <a href="register.php">ลงทะเบียน</a></p> -->
                                <p><a href="../../index.php">กลับหน้าแรก</a></p>
                            </div>
                        </form>
                        <!-- /Account Form -->

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /Main Wrapper -->

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
    function validateloginForm() {
        var fields = ["name", "password"];

        for (var i = 0; i < fields.length; i++) {
            var fieldValue = document.getElementById(fields[i]).value.trim();
            if (fieldValue === "") {
                Swal.fire({
                    icon: 'error',
                    title: 'กรุณากรอกข้อมูลให้ถูกต้อง',
                    text: 'ห้ามกรอกข้อมูลที่เป็นช่องว่าง',
                });
                return false;
            }
        }
        return true;
    }

    </script>

     <!-- jQuery -->
     <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
    <script>
        function checkusername(val) {
            $.ajax({
                type: 'POST',
                url: 'checkuser_available.php',
                data: 'username=' + val,
                success: function(data) {
                    $('#usernamemeavailable').html(data);

                    // เพิ่ม SweetAlert2 เมื่อล็อคอินสำเร็จ
                    const Toast = Swal.mixin({
                        toast: true,
                        position: "top-end",
                        showConfirmButton: false,
                        timer: 3000,
                        timerProgressBar: true,
                        didOpen: (toast) => {
                            toast.onmouseenter = Swal.stopTimer;
                            toast.onmouseleave = Swal.resumeTimer;
                        }
                    });
                    Toast.fire({
                        icon: "success",
                        title: "Signed in successfully"
                    });
                }
            });
        }
    </script>

    <!-- jQuery -->
    <script src="../assets/js/jquery-3.5.1.min.js"></script>

    <!-- Bootstrap Core JS -->
    <script src="../assets/js/popper.min.js"></script>
    <script src="../assets/js/bootstrap.min.js"></script>

    <!-- Custom JS -->
    <script src="../assets/js/app.js"></script>

</body>

</html>