<?php
session_start();
include '../server.php';

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
if (!isset($_SESSION['user_id'])) {
    header("Location: ../login_student.php");
    exit();
}

$user_id = $_SESSION['user_id'];

$sql = "SELECT email FROM login_student WHERE id = '$user_id'";
$result = mysqli_query($conn, $sql);

if ($row = mysqli_fetch_assoc($result)) {
    $email = $row['email'];

    $sql = "SELECT * FROM coopperative_perental_consent_form WHERE email = '$email'";
    $result = mysqli_query($conn, $sql);
    $row1 = mysqli_fetch_array($result);
} else {
    echo "ไม่พบผู้ใช้";
}

$sql2 = "SELECT * FROM login_student WHERE id = '$user_id'";
$result2 = mysqli_query($conn, $sql2);
$row = mysqli_fetch_array($result2);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ใบยินยอมจากผู้ปกครอง</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <meta name="description" content="Smarthr - Bootstrap Admin Template">
    <meta name="keywords" content="admin, estimates, bootstrap, business, corporate, creative, management, minimal, modern, accounts, invoice, html5, responsive, CRM, Projects">
    <meta name="author" content="Dreamguys - Bootstrap Admin Template">
    <meta name="robots" content="noindex, nofollow">

    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">

    <!-- CSS -->
    <link rel="stylesheet" href="../assets/css/index.css">

    <!-- Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans&family=Prompt&display=swap" rel="stylesheet">
    <title>ใบยินยอมจากผู้ปกครอง</title>

    <!-- รูปโปรไฟล์ -->
    <link rel="shortcut icon" type="image/x-icon" href="..assets/img/icon.png">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <!-- Lineawesome CSS -->
    <link rel="stylesheet" href="../assets/css/line-awesome.min.css">

    <!-- Main CSS ของส่วนข้อมูล-->
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="../assets/css/cooperative.css">

    <style>
        .breadcrumb a {
            color: grey;
        }

        nav .breadcrumb {
            padding-left: 30px;
            margin-top: 65px;
        }
    </style>

</head>

<body>
    <div class="main-wrapper">
    <?php
        include('./navbar_menu.php');
        ?>

        <div class="page-wrapper">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="../cooperative_student/cooperative_student_home.php">แบบฟอร์มสหกิจศึกษา</a></li>
                    <li class="breadcrumb-item"><a href="../cooperative_student/coopbook_detail.php">รายละเอียดใบยินยอมจากผู้ปกครอง</a></li>
                    <li class="breadcrumb-item active" aria-current="page">แก้ไขใบยินยอมจากผู้ปกครอง</li>
                </ol>
            </nav>
            <!-- ส่วนของข้อมูล -->

            <div class="content container-fluid">
                <div class="fw-semibold text-center">
                    ใบยินยอมจากผู้ปกครอง <br>
                </div>
                <form action="./cooperative_book_update.php" method="post" class="form-horizontal" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="formFile" class="form-label">แนบไฟล์</label>
                        <input class="form-control" type="file" id="formFile" name="coop_perental_consent_file" required>
                    </div>
                    <p>นามสกุลไฟล์ที่สามารถแนบได้ pdf, png, jpg, jpeg</p>

                    <br>
                    <div class="button text-right">
                        <button type="button" class="btn btn-danger">
                            ยกเลิก
                        </button>
                        <button type="submit" class="btn btn-success">
                            บันทึก
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>
    <!-- jQuery -->
    <script src="./assets/js/jquery-3.5.1.min.js"></script>

        <!-- Bootstrap Core JS -->
        <script src="./assets/js/popper.min.js"></script>
        <script src="./assets/js/bootstrap.min.js"></script>

        <!-- Slimscroll JS ตัวเลื่อนแทบข้างๆ -->
        <script src="./assets/js/jquery.slimscroll.min.js"></script>

        <!-- Chart JS ส่วนของกราฟ-->
        <script src="./assets/plugins/morris/morris.min.js"></script>
        <script src="./assets/plugins/raphael/raphael.min.js"></script>
        <script src="./assets/js/chart.js"></script>

        <!-- Custom JS -->
        <script src="./assets/js/app.js"></script>




    <script src="https://code.jquery.com/jquery-3.6.0.slim.min.js" integrity="sha256-u7e5khyithlIdTpu22PHhENmPcRdFiHRjhAuHcs05RI=" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
    <script src="../script.js"></script>
</body>

</html>