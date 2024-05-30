<?php require_once "controllerUserData.php"; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>เข้าสู่ระบบแอดมิน</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
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
    <link rel="stylesheet" href="../internship/assets/css/index.css">

    <!-- Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans&family=Prompt&display=swap" rel="stylesheet">

</head>

<body class="account-page">
    <div class="container">
        <div class="row">

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
                                <form action="login-user.php" method="POST" autocomplete="">
                                    <h2 class="text-center">เข้าสู่ระบบแอดมิน</h2>
                                    <p class="text-center">เข้าสู่ระบบด้วย email และ รหัสผ่าน</p>
                                    <?php
                                    if (count($errors) > 0) {
                                    ?>
                                        <div class="alert alert-danger text-center">
                                            <?php
                                            foreach ($errors as $showerror) {
                                                echo $showerror;
                                            }
                                            ?>
                                        </div>
                                    <?php
                                    }
                                    ?>
                                    <div class="form-group">
                                        <input class="form-control" type="email" name="email" placeholder="อีเมล" required value="<?php echo $email ?>">
                                    </div>
                                    <div class="form-group">
                                        <input class="form-control" type="password" name="password" placeholder="รหัสผ่าน" required>
                                    </div>
                                    <div class="link forget-pass text-left"><a href="forgot-password.php">ลืมรหัสผ่าน?</a></div>
                                    <div class="form-group">
                                        <input class="btn btn-primary account-btn" type="submit" name="login" value="เข้าสู่ระบบ">
                                    </div>
                                    <div class="link login-link text-center">ยังไม่ได้สมัครสมาชิก ? <a href="signup-user.php">ลงทะเบียน</a></div>



                                </form>
                            </div>
                        </div>
                    </div>

                </div>

            </div>

        </div>

    </div>
    </div>
    </div>


    <!-- jQuery -->
    <script src="../assets/js/jquery-3.5.1.min.js"></script>

    <!-- Bootstrap Core JS -->
    <script src="../assets/js/popper.min.js"></script>
    <script src="../assets/js/bootstrap.min.js"></script>

    <!-- Custom JS -->
    <script src="../assets/js/app.js"></script>


</body>

</html>