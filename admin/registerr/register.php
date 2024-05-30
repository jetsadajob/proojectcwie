<?php
include '../functions.php';
include('./include_sweetalert.php');
$userdata = new DB_con();

if (isset($_POST['submit'])) {
    $username = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = $userdata->registration($username, $email, $password);

    if ($sql) {
        // แสดง SweetAlert2 เมื่อเข้าสู่ระบบสำเร็จ
        echo "<script>
            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.addEventListener('mouseenter', Swal.stopTimer);
                    toast.addEventListener('mouseleave', Swal.resumeTimer);
                }
            });
            Toast.fire({
                icon: 'success',
                title: 'เข้าสู่ระบบสำเร็จ'
            });
        </script>";
        echo "<script>window.location.href='login.php'</script>";
    } else {
        echo "<script>alert('ผิดพลาด');</script>";
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
    <title>Register admin</title>

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="..assets/img/profiles/Computing_KKU.svg.png">
    <link rel="shortcut icon" type="image/x-icon" href="../assets/img/profiles/icon.png">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">

    <!-- Fontawesome CSS -->
    <link rel="stylesheet" href="../assets/css/font-awesome.min.css">

    <!-- Main CSS -->
    <link rel="stylesheet" href="../assets/css/style.css">

    <!-- ฟอน CSS -->
    <link rel="stylesheet" href="../internship/assets/css/index.css">

    <!-- Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans&family=Prompt&display=swap" rel="stylesheet">


    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
			<script src="assets/js/html5shiv.min.js"></>
			<script src="assets/js/respond.min.js"></script>
		<![endif]-->
</head>

<body class="account-page">

    <!-- Main Wrapper -->
    <div class="main-wrapper">
        <div class="account-content">
            <!-- <a href="#" class="btn btn-primary apply-btn">Apply Job</a> -->
            <div class="container">


                <form method="post">
                    <div class="account-box">
                        <div class="account-wrapper">
                            <!-- Account Logo -->
                            <div class="account-logo">
                                <a href="login.php"><img src="../assets/img/profiles/icon.png"></a>
                            </div>
                            <!-- /Account Logo -->

                            <h3 class="account-title text-align-center">ลงทะเบียน</h3>


                            <!-- Account Form -->
                            <form action="" onsubmit="return validateloginForm()" onblur="checkusername(this.value)" id="adwork">
                                <div class="form-group">
                                    <label>ชื่อผู้ใช้</label>
                                    <!-- <input class="form-control" type="text" id="name" name="name" onblur="checkusername(this.value)" required> -->
                                    <input class="form-control" type="text" id="name" name="name" required>
                                    <span id="usernamemeavailable"> </span>
                                </div>
                                <div class="form-group">
                                    <label>อีเมล</label>
                                    <input class="form-control" type="email" id="email" name="email" required>
                                </div>
                                <div class="form-group">
                                    <label>รหัสผ่าน</label>
                                    <input class="form-control" type="password" id="password" name="password" required>
                                </div>
                                <!-- <div class="form-group">
                                <label>Repeat Password</label>
                                <input class="form-control" type="password">
                            </div> -->
                                <div class="form-group text-center">
                                    <button class="btn btn-primary account-btn" type="submit" name="submit" id="submit" onclick="return validateloginForm()">ลงทะเบียน</button>
                                </div>
                                <div class="account-footer">
                                    <p>มีบัญชีอยู่แล้ว? <a href="login.php">เข้าสู่ระบบ</a></p>
                                </div>
                            </form>
                            <!-- /Account Form -->
                        </div>
                    </div>

                </form>

            </div>
        </div>
    </div>
    <!-- /Main Wrapper -->

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        function validateloginForm() {
            var fields = ["name", "email", "password"];

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

    <script src="../assets/js/jquery-3.5.1.min.js"></script>

    <!-- Bootstrap Core JS -->
    <script src="../assets/js/popper.min.js"></script>
    <script src="../assets/js/bootstrap.min.js"></script>

    <!-- Custom JS -->
    <script src="../assets/js/app.js"></script>

</body>

</html>