<?php require_once "controllerUserData.php"; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>ลงทะเบียนเเอดมิน</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
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

</head>

<body class="account-page">
    <div class="main-wrapper">
        <div class="account-content">
            <!-- <a href="#" class="btn btn-primary apply-btn">Apply Job</a> -->
            <div class="container">
                <div class="account-box">
                    <div class="account-wrapper">
                        <!-- Account Logo -->
                        <div class="account-logo">
                            <a href="login.php"><img src="../assets/img/profiles/icon.png"></a>
                        </div>
                        <!-- /Account Logo -->
                        <form action="signup-user.php" method="POST" autocomplete="">
                            <h2 class="text-center">เข้าสู่ระบบแอดมิน</h2>
                            <p class="text-center"></p>
                            <?php
                            if (count($errors) == 1) {
                            ?>
                                <div class="alert alert-danger text-center">
                                    <?php
                                    foreach ($errors as $showerror) {
                                        echo $showerror;
                                    }
                                    ?>
                                </div>
                            <?php
                            } elseif (count($errors) > 1) {
                            ?>
                                <div class="alert alert-danger">
                                    <?php
                                    foreach ($errors as $showerror) {
                                    ?>
                                        <li><?php echo $showerror; ?></li>
                                    <?php
                                    }
                                    ?>
                                </div>
                            <?php
                            }
                            ?>
                            <div class="form-group">
                                <input class="form-control" type="text" name="name" placeholder="ชื่อ-นามสกุล" required value="<?php echo $name ?>">
                            </div>
                            <div class="form-group">
                                <input class="form-control" type="email" name="email" placeholder="อีเมล" required value="<?php echo $email ?>">
                            </div>
                            <div class="form-group">
                                <input class="form-control" type="password" name="password" placeholder="รหัสผ่าน" required>
                            </div>
                            <div class="form-group">
                                <input class="form-control" type="password" name="cpassword" placeholder="ยืนยันรหัสผ่าน" required>
                            </div>
                            <div class="form-group">
                                <input class="btn btn-primary account-btn" type="submit" name="signup" value="ลงทะเบียน">
                            </div>
                            <div class="link login-link text-center">เป็นสมาชิกอยู่เเล้ว? <a href="login-user.php">เข้าสู่ระบบที่นี่</a></div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script src="../assets/js/jquery-3.5.1.min.js"></script>

    <!-- Bootstrap Core JS -->
    <script src="../assets/js/popper.min.js"></script>
    <script src="../assets/js/bootstrap.min.js"></script>

    <!-- Custom JS -->
    <script src="../assets/js/app.js"></script>



</body>

</html>