<?php 
    // session_start();

    // if (!isset($_SESSION['internship_student_login'])) {
    //     header("location: ../login.php");
    // }

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>แบบฟอร์มสหกิจศึกษา</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <meta name="description" content="Smarthr - Bootstrap Admin Template">
    <meta name="keywords"
        content="admin, estimates, bootstrap, business, corporate, creative, management, minimal, modern, accounts, invoice, html5, responsive, CRM, Projects">
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
    <title>แบบฟอร์มการประเมินนักศึกษา</title>

    <!-- รูปโปรไฟล์ -->
    <link rel="shortcut icon" type="image/x-icon" href="..assets/img/icon.png">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">


    <!-- ฟอนต์ CSS -->
    <!-- <link rel="stylesheet" href="../assets/css/font-awesome.min.css"> -->

    <!-- Lineawesome CSS -->
    <link rel="stylesheet" href="../assets/css/line-awesome.min.css">

    <!-- Main CSS ของส่วนข้อมูล-->
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="../assets/css/dashboard.css">
    <link rel="stylesheet" href="../assets/css/cooperative.css">

    <!-- Boxicons -->
    <!-- <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'> -->

</head>

<body>

    <!-- <div class="text-center mt-5"> -->
    <!-- <div class="container"> -->
    <div class="main-wrapper">

        <?php
    include('./navbar_menu_staff.php');
    ?>

        <!-- ส่วนของข้อมูลทั้งหมด -->
        <div class="page-wrapper">
            <!-- ส่วนของข้อมูล -->
            <div class="content container-fluid">

                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">หน้าหลัก</a></li>
                        <li class="breadcrumb-item active" aria-current="page">แบบฟอร์มการประเมินนักศึกษา</li>
                    </ol>
                </nav>
                <div class="nameform">
                    <div class="page-header">
                        <div class="row">
                            <div class="col-sm-12">
                                <h5 class="text-center">รายละเอียดแบบฟอร์มการประเมินนักศึกษา</h5>
                                <p class="text-center">นิภาภัทร นระทัด : นักศึกษาสหกิจศึกษา</p>
                                
                            </div>
                        </div>
                    </div><br>

                    <table id="example" class="table table-striped" style="width:100%">
                        <thead>
                            <tr>
                                <th>ลำดับ</th>
                                <th>ชื่อแบบฟอร์ม</th>
                                <th>สถานะ</th>
                                <th>การประเมิน</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>KKUCP-T002_แบบแจ้งรายละเอียดงานและรายละเอียดที่พัก</td>
                                <td>
                                    <li>
                                        <span class="text-success">ทำแบบประเมินเสร็จสิ้น</span>
                                    </li>
                                </td>
                                <td><a href="./job_description_accommodation.php"><button type="button" class="btn btn-outline-primary">ทำแบบประเมิน</button></a></td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>KKUCP-T003_แบบแจ้งโครงร่างรายงานการปฏิบัติงานสหกิจศึกษา (Proposal)</td>
                                <td></td>
                                <td><a href="./KKUCP-T003.php"><button type="button" class="btn btn-outline-primary">ทำแบบประเมิน</button></a></td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>KKUCP-T004_แบบบันทึกการนิเทศงานนักศึกษาสหกิจศึกษา</td>
                                <td></td>
                                <td><a href="./KKUCP-T004_staff.php"><button type="button" class="btn btn-outline-primary">ทำแบบประเมิน</button></a></td>
                            </tr>
                            <tr>
                                <td>4</td>
                                <td>KKUCP-T005_แบบประเมินผลการปฏิบัติงานของนักศึกษาสหกิจศึกษา</td>
                                <td></td>
                                <td><a href="./performance_appraisal_form.php"><button type="button" class="btn btn-outline-primary">ทำแบบประเมิน</button></a></td>
                            </tr>
                            <tr>
                                <td>5</td>
                                <td>KKUCP-T006_แบบประเมินผลรายงานสหกิจศึกษา</td>
                                <td></td>
                                <td><a href="./report_evaluation_form.php"><button type="button" class="btn btn-outline-primary">ทำแบบประเมิน</button></a></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <!-- /ส่วนของข้อมูล -->
            </div>
            <!-- /Page Wrapper -->
            <!-- ส่วนของข้อมูลทั้งหมด -->
        </div>
        <!-- /ส่วนของข้อมูล -->
    </div>
    <!-- /Page Wrapper -->
    </div>
    <!-- /Main Wrapper -->
    </div>
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

    <script src="https://code.jquery.com/jquery-3.6.0.slim.min.js"
        integrity="sha256-u7e5khyithlIdTpu22PHhENmPcRdFiHRjhAuHcs05RI=" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
    <script src="../script.js"></script>
</body>

</html>