<?php require_once "controllerUserData.php"; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>ลืมรหัสผ่าน</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="../assets/img/favicon.png">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">

    <!-- Fontawesome CSS -->
    <link rel="stylesheet" href="../assets/css/font-awesome.min.css">

    <!-- Main CSS -->
    <link rel="stylesheet" href="../assets/css/style.css">

    <!-- ajax -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

</head>

<body class="account-page">

    <!-- Main Wrapper -->
    <div class="main-wrapper">

        <div class="account-content">
            <!-- <a href="job-list.html" class="btn btn-primary apply-btn">Apply Job</a> -->
            <div class="container">



                <div class="account-box">
                    <div class="account-wrapper">
                        <!-- Account Logo -->
                        <div class="account-logo">
                            <a href="login.php"><img src="../assets/img/profiles/logo.png"></a>
                        </div>
                        <form action="forgot-password.php" method="POST" autocomplete="">
                            <h2 class="text-center">ลืมรหัสผ่าน</h2>
                            <p class="text-center">Enter your email address</p>
                            <?php
                            if (count($errors) > 0) {
                            ?>
                                <div class="alert alert-danger text-center">
                                    <?php
                                    foreach ($errors as $error) {
                                        echo $error;
                                    }
                                    ?>
                                </div>
                            <?php
                            }
                            ?>
                            <div class="form-group">
                                <input class="form-control" type="email" name="email" placeholder="Enter email address" required value="<?php echo $email ?>">
                            </div>
                            <div class="form-group">
                                <input class="btn btn-primary account-btn" type="submit" name="check-email" value="Continue">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            </div>
            </div>
            

</body>

</html>