<?php
session_start();

if (!isset($_SESSION['internship_student_login'])) {
    header("location: ../login.php");
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HR Page</title>
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
    <title>Dashboard</title>

    <!-- รูปโปรไฟล์ -->
    <link rel="shortcut icon" type="image/x-icon" href="..assets/img/icon.png">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">


    <!-- ฟอนต์ CSS -->
    <!-- <link rel="stylesheet" href="../assets/css/font-awesome.min.css"> -->

    <!-- Lineawesome CSS -->
    <link rel="stylesheet" href="../assets/css/line-awesome.min.css">

    <!-- กราฟ CSS -->
    <!-- <link rel="stylesheet" href="../assets/plugins/morris/morris.css"> -->

    <!-- Main CSS ของส่วนข้อมูล-->
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="../assets/css/dashboard.css">

    <!-- Boxicons -->
    <!-- <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'> -->

</head>

<body>

    <!-- <div class="text-center mt-5"> -->
    <!-- <div class="container"> -->
    <div class="main-wrapper">

        <!-- เมนู bar -->
        <div class="header">

            <!-- Logo -->
            <div class="text-decoration-none">
                <a  href="hr_index.html" class="logo">
                    <img src="./assets/img/icon.png" width="40" height="40" alt="">
                    <span class="university">cpkku-cwie</span>
                </a>
            </div>
            <!-- /Logo -->

            <a id="mobile_btn" class="mobile_btn" href="#sidebar"><i class="fa fa-bars"></i></a>

            <!-- Header Menu -->
            <ul class="nav user-menu">

                <!-- ตั้งค่า โปรไฟล์ ออกจากระบบ -->
                <li class="nav-item dropdown has-arrow main-drop">
                    <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
                        <span class="user-img"><img src="../assets/img/user.jpg" alt="">
                            <span>สถานะ : นักศึกษาฝึกงาน</span>
                    </a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="#">โปรไฟล์</a>
                        <a class="dropdown-item" href="#">ตั้งค่า</a>
                        <a class="dropdown-item" href="./login_student.php">ออกจากระบบ</a>
                    </div>
                </li>


                <!-- <span class="status online"></span> -->
                <!-- <span>
                                <h6>
                                    <?php if (isset($_SESSION['internship_student_login'])) { ?>
                                    <?php echo $_SESSION['internship_student_login'];
                                    } ?>
                                </h6>
                            </span> -->

                </a>
                </span>
                <!--/ ตั้งค่า โปรไฟล์ ออกจากระบบ -->

            </ul>
            <!-- /Header Menu -->


            <!-- Mobile Menu -->
            <div class="dropdown mobile-user-menu">
                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v" style="color: gray;"></i></a>
                <div class="dropdown-menu dropdown-menu-right">
                    <a class="dropdown-item" href="#">โปรไฟล์</a>
                    <a class="dropdown-item" href="#">ตั้งค่า</a>
                    <a class="dropdown-item" href="./login_student.php">ออกจากระบบ</a>
                </div>
            </div>
            <!-- /Mobile Menu -->

        </div>
        <!-- /เเทบเมนู -->


        <!-- Sidebar แก้ตรงนี้นะคะ!! เคาะให้เเล้วจะได้ไม่งงอันไหนส่วนไหน -->
        <div class="sidebar" id="sidebar">
            <div class="sidebar-inner slimscroll">
                <div id="sidebar-menu" class="sidebar-menu">
                    <ul>
                        <li class="menu-title">
                        <li>
                <a class="text-decoration-none"  href="./internship_index.php">
                    <i class="fa fa-clipboard" aria-hidden="true"></i>
                    <div class="content">แบบฟอร์มฝึกงาน</div>
                </a>
            </li>
            <li>
                <a class="text-decoration-none" href="./internship_company.php">
                    <i class="fa fa-building" aria-hidden="true"></i>
                    <div class="content">รายละเอียดบริษัท/หน่วยงาน</div>
                </a>
            </li>
            <li>
                <a class="text-decoration-none" href="./internship_book.php">
                    <i class="fa fa-envelope-open" aria-hidden="true"></i>
                    <div class="content">หนังสือยินยอมผู้ปกครอง</div>
                </a>
            </li>
            <li>
                <a class="text-decoration-none" href="./internship_history.php">
                    <i class="fa fa-address-book" aria-hidden="true"></i>
                    <div class="content">ประวัตินักศึกษา</div>
                </a>
            </li>
            <li>
                <a class="text-decoration-none" href="./internship_certificate.php">
                    <i class="fa fa-address-card" aria-hidden="true"></i>
                    <div class="content">ใบรับรองการฝึกงาน</div>
                </a>
            </li>
            <li>
                <a class="text-decoration-none" href="./internship_time.php">
                    <i class="fa fa-film" aria-hidden="true"></i>
                    <div class="content">บันทึกการฝึกงาน</div>
                </a>
            </li>

                    </ul>
                </div>
            </div>
        </div>
        <!-- /Sidebar -->



        <!-- ส่วนของข้อมูลทั้งหมด -->
    </div>
    <!-- jQuery -->
    <script src="../assets/js/jquery-3.5.1.min.js"></script>

    <!-- Bootstrap Core JS -->
    <script src="../assets/js/popper.min.js"></script>
    <script src="../assets/js/bootstrap.min.js"></script>

    <!-- Slimscroll JS ตัวเลื่อนแทบข้างๆ -->
    <script src="../assets/js/jquery.slimscroll.min.js"></script>

    <!-- Chart JS ส่วนของกราฟ-->
    <script src="../assets/plugins/morris/morris.min.js"></script>
    <script src="../assets/plugins/raphael/raphael.min.js"></script>
    <script src="../assets/js/chart.js"></script>

    <!-- Custom JS -->
    <script src="../assets/js/app.js"></script>




    <script src="https://code.jquery.com/jquery-3.6.0.slim.min.js" integrity="sha256-u7e5khyithlIdTpu22PHhENmPcRdFiHRjhAuHcs05RI=" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
    <script src="../script.js"></script>
</body>

</html>