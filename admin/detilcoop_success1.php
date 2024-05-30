<?php
// session_start();
include './work/dbwork.php';

// if (!isset($_SESSION['id'])) {
//     header('Location: ./registerr/login.php');
//     exit();
// }

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
    <title>Addmin</title>

    <!-- รูปโปรไฟล์ -->
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/profiles/Computing_KKU.svg.png">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">


    <!-- ฟอน CSS -->
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">

    <!-- Lineawesome CSS -->
    <link rel="stylesheet" href="assets/css/line-awesome.min.css">

    <!-- แชท CSS -->
    <!-- <link rel="stylesheet" href="assets/plugins/morris/morris.css"> -->

    <!-- Main CSS ของส่วนข้อมูล-->
    <link rel="stylesheet" href="./assets/css/style.css">
    <link rel="stylesheet" href="./assets/css/addwork.css">
    <link rel="stylesheet" href="./assets/css/listastu.css">

    <!-- ส่วนของตารางรายชื่อ-->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">


    <!-- ฟอนต์ CSS -->
    <link rel="stylesheet" href="./assets/css/font.css">

    <!-- Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans&family=Prompt&display=swap" rel="stylesheet">



    <!-- Boxicons -->
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>

    <!-- ไอคอน -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    
</head>

<body>

    <!--ส่วนของเมนูบลาเเละเเทบข้าง  -->
    <?php include('nav_admin.php'); ?>
    <!--ส่วนของเมนูบลาเเละเเทบข้าง  -->

    <!-- ส่วนของข้อมูลทั้งหมด -->
    <div class="page-wrapper">

        <!-- ส่วนของข้อมูล -->
        <div class="content container-fluid mt-5">
            <!-- Page Header -->
            <div class="page-header">
                <div class="row">
                    <div class="col-sm-12">
                        <h3 class="page-title">รายละเอียด</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="addmin.php">Dashboard</a></li>
                            <li class="breadcrumb-item active">แบบฟอร์มสหกิจ</li>
                            <li class="breadcrumb-item active">นักศึกษาที่ยื่นคำร้องสหกิจศึกษา</li>
                            <li class="breadcrumb-item active">รายละเอียด</li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- /Page Header -->

            <div class="card mb-0">
                <div class="card-body">
                    <div class="row">

                        <div class="col-md-12">
                            <div class="file-view">
                                <div class="profile-img-wrap">
                                    <div class="profile-img">
                                        <a href="#"><img alt="" src="./assets/img/profiles/icon.png"></a>
                                    </div>
                                </div>

                                <?php
                                // $emai = $_SESSION['internship_student_login'];
                                // $user_info_query = "SELECT login_student.*,company_detail.* FROM login_student JOIN company_detail ON login_student.email= company_detail.email
                                // WHERE login_student  = '$email ";


                                // $id = $_GET['id']; 
                                // $sql = "SELECT * FROM login_student WHERE email='$id'";
                                // $result = mysqli_query($conn, $sql);
                                // $row = mysqli_fetch_array($result);



                                $id = $_GET['id']; // รับค่า id จาก URL
                                $sql = "SELECT * FROM login_student 
                                RIGHT JOIN petition_document ON login_student.email = petition_document.email 
                                WHERE login_student.role = 'cooperative_student' 
                                AND login_student.email = '$id'";
                                $result = mysqli_query($conn, $sql);
                                $row = mysqli_fetch_array($result);




                                ?>

                                <div class="profile-basic">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="profile-info-left">
                                                <h3 class="user-name m-t-0 mb-0">
                                                    <?= !empty($row["petition_lname"]) ? $row["petition_fname"] : 'ยังไม่กรอกข้อมูล' ?>
                                                    <?= !empty($row["petition_fname"]) ? $row["petition_lname"] : 'ยังไม่กรอกข้อมูล' ?>
                                                </h3>
                                                <h5 class="text-muted">สาขา
                                                    <?= !empty($row["petition_field_of_study"]) ? $row["petition_field_of_study"] : 'ยังไม่กรอกข้อมูล' ?>
                                                </h5>
                                                <h5 class="text-muted">โครงการ
                                                    <?= !empty($row["petition_project"]) ? $row["petition_project"] : 'ยังไม่กรอกข้อมูล' ?>
                                                </h5>
                                                <h5 class="text-muted ">ชั้นปีที่
                                                    <?= !empty($row["petition_year_of_study"]) ? $row["petition_year_of_study"] : 'ยังไม่กรอกข้อมูล' ?>
                                                </h5>
                                                <h5 class="text-muted">Email
                                                    <a href=""><?= !empty($row["email"]) ? $row["email"] : 'ยังไม่กรอกข้อมูล' ?></a>
                                                </h5>
                                                <h5 class="text-muted">ประเภทนักศึกษา
                                                    นักศึกษาสหกิจศึกษา
                                                </h5>

                                            </div>
                                        </div>
                                        <div class="col-md-10">
                                            <ul class="personal-info">

                                                <!-- <li>
                                                    <div class="title">ปฏิบัติสหกิจที่ :</div>
                                                    <div class="text"><a
                                                            href=""><?= !empty($row["email"]) ? $row["email"] : 'ยังไม่มีบริษัทปฏิบัติสหกิจศึกษา' ?></a>
                                                    </div>
                                                </li> -->
                                                <!-- <li>
                                                    <div class="title">Birthday:</div>
                                                    <div class="text">
                                                        <?= !empty($row["email"]) ? $row["email"] : 'ยังไม่กรอกข้อมูล' ?>
                                                    </div>
                                                </li> -->
                                                <!-- <li>
                                                    <div class="title">Address:</div>
                                                    <div class="text">
                                                        <?= !empty($row["petition_address"]) ? $row["petition_address"] : 'ยังไม่กรอกข้อมูล' ?>
                                                        <?= !empty($row["petition_subdistrict"]) ? $row["petition_subdistrict"] : 'ยังไม่กรอกข้อมูล' ?>
                                                        <?= !empty($row["petition_district"]) ? $row["petition_district"] : 'ยังไม่กรอกข้อมูล' ?>
                                                        <?= !empty($row["petition_province"]) ? $row["petition_province"] : 'ยังไม่กรอกข้อมูล' ?>
                                                        <?= !empty($row["petition_zip"]) ? $row["petition_zip"] : 'ยังไม่กรอกข้อมูล' ?>
                                                    </div>
                                                </li> -->
                                                <!-- <li>
                                                    <div class="title">Gender:</div>
                                                    <div class="text">Male</div>
                                                </li> -->
                                                <!-- <li>
                                                    <div class="title">Reports to:</div>
                                                    <div class="text">
                                                        <div class="avatar-box">
                                                            <div class="avatar avatar-xs">
                                                                <img src="assets/img/profiles/avatar-16.jpg" alt="">
                                                            </div>
                                                        </div>
                                                        
                                                        <p></p>
                                                        </a>
                                                    </div>
                                                </li> -->
                                            </ul>
                                        </div>
                                    </div>
                                </div>



                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card tab-box">
                <div class="row user-tabs">
                    <div class="col-lg-12 col-md-12 col-sm-12 line-tabs">
                        <ul class="nav nav-tabs nav-tabs-bottom">
                            <li class="nav-item"><a href="#file" data-toggle="tab" class="nav-link active">เอกสาร</a>
                            </li>
                            <li class="nav-item"><a href="#advisor" data-toggle="tab" class="nav-link">อาจารย์ประจำวิชาสหกิจ</a>
                            </li>
                            <li class="nav-item"><a href="#company" data-toggle="tab" class="nav-link">สถานประกอบการ</a></li>
                            <li class="nav-item"><a href="#bank_statutory" data-toggle="tab" class="nav-link">อาจารย์นิเทศ</a></li>


                        </ul>
                    </div>
                </div>
            </div>

            <div class="tab-content">

                <!--  Info Tab -->
                <div id="file" class="pro-overview tab-pane fade show active">
                    <div class="row">
                        <div class="col-md-12 ">
                            <div class="card profile-box flex-fill">
                                <div class="card-body">
                                    <form action="">
                                        <h3 class="card-title">การดำเนินการสมัครสหกิจศึกษา</h3>
                                        <div class="page-header">
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <?php
                                                    $id = $_GET['id']; // รับค่า id จาก URL
                                                    $sql = "SELECT * FROM petition_document 
                                                  RIGHT JOIN login_student ON petition_document.email = login_student.email 
                                                  WHERE login_student.role = 'cooperative_student' 
                                                  AND login_student.email = '$id'";
                                                    $result = mysqli_query($conn, $sql);
                                                    $row = mysqli_fetch_array($result);

                                                    // เรียกข้อมูลจากตาราง petition_document
                                                    $sql_petition = "SELECT * FROM petition_document WHERE email ='$id' ";
                                                    $result_petition = mysqli_query($conn, $sql_petition);
                                                    $row_petition = mysqli_fetch_array($result_petition);

                                                    // เรียกข้อมูลจากตาราง coop_application_form
                                                    $sql_application = "SELECT * FROM coop_application_form WHERE email ='$id' ";
                                                    $result_application = mysqli_query($conn, $sql_application);
                                                    $row_application = mysqli_fetch_array($result_application);

                                                    // เรียกข้อมูลจากตาราง student_acceptance_form
                                                    $sql_acceptance = "SELECT * FROM student_acceptance_form WHERE email ='$id' ";
                                                    $result_acceptance = mysqli_query($conn, $sql_acceptance);
                                                    $row_acceptance = mysqli_fetch_array($result_acceptance);






                                                    // เรียกข้อมูลจากตาราง coopperative_perental_consent_form
                                                    $sql_consent = "SELECT * FROM coopperative_perental_consent_form  WHERE email ='$id' ";
                                                    $result_consent = mysqli_query($conn, $sql_consent);
                                                    $row_consent = mysqli_fetch_array($result_consent);

                                                    // เรียกข้อมูลจากตาราง coopperative_education_report_form
                                                    $sql_education = "SELECT * FROM coopperative_education_report_form WHERE email ='$id' ";
                                                    $result_education = mysqli_query($conn, $sql_education);
                                                    $row_education = mysqli_fetch_array($result_education);


                                                    ?>


                                                    <table class="table table-striped">
                                                        <thead>
                                                            <tr>
                                                                <th>ลำดับ</th>
                                                                <th>ชื่อแบบฟอร์ม</th>
                                                                <th>สถานะ (ผู้ดูแลระบบ)</th>
                                                                <th>สถานะ (อาจารย์)</th>

                                                                <th>รายละเอียด</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td>1</td>
                                                                <td>ใบคำร้องขอเข้าร่วมโครงการสหกิจศึกษา</td>
                                                                <td>
                                                                
                                                                </td>
                                                                <td>
                                                                    <?php if ($row_petition["status_admin"] == 0) : ?>
                                                                        <span class="badge badge-pill badge-danger">ยังไม่กรอกฟอร์ม</span>
                                                                    <?php elseif ($row_petition["status_admin"] == 1) : ?>
                                                                        <span class="badge badge-pill badge-warning">รอตรวจสอบ</span>
                                                                    <?php elseif ($row_petition["status_admin"] == 2) : ?>
                                                                        <span class="badge badge-pill badge-success">ตรวจสอบแล้ว</span>
                                                                    <?php elseif ($row_petition["status_admin"] == 3) : ?>
                                                                        <span class="badge badge-warning">มีข้อมูลต้องแก้ไข</span>
                                                                    <?php elseif ($row_petition["status_admin"] >= 4) : ?>
                                                                        <span class="badge badge-danger">ยกเลิก</span>
                                                                        <?php elseif ($row_petition["status_admin"] >= 5) : ?>
                                                                        <span class="badge badge-pill badge-success">ตรวจสอบแล้ว</span>
                                                                    <?php endif; ?>
                                                                </td>

                                                                <td>
                                                                    <a href="./cooperative_petition_detil.php?id=<?= $row["email"] ?>"><button type="button" class="btn btn-outline-primary"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye-fill" viewBox="0 0 16 16">
                                                                                <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z" />
                                                                                <path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z" />
                                                                            </svg></button></a>
                                                                    </svg></button></a>
                                                                    <!-- <a href="./cooperative_petition_detil_edit.php?id=<?= $row["email"] ?>"><button type="button" class="btn btn-outline-warning"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                                                                <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                                                                <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                                                                            </svg></button></a> -->
                                                                    <!-- <a href="./?id=<?= $row["email"] ?>"><button type="button"
                                                                        class="btn btn-outline-danger"><svg
                                                                            xmlns="http://www.w3.org/2000/svg"
                                                                            width="16" height="16" fill="currentColor"
                                                                            class="bi bi-trash-fill"
                                                                            viewBox="0 0 16 16">
                                                                            <path
                                                                                d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z" />
                                                                        </svg></button>
                                                                </a> -->
                                                                <a href="./cooperative_petition_print.php?id=<?= $row["email"] ?>"><button type="button" class="btn btn-outline-success"><svg xmlns="http://www.w3.org/2000/svg" width="23" height="23" fill="currentColor" class="bi bi-printer-fill" viewBox="0 0 16 16">
                                                                                <path d="M5 1a2 2 0 0 0-2 2v1h10V3a2 2 0 0 0-2-2zm6 8H5a1 1 0 0 0-1 1v3a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1v-3a1 1 0 0 0-1-1" />
                                                                                <path d="M0 7a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v3a2 2 0 0 1-2 2h-1v-2a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v2H2a2 2 0 0 1-2-2zm2.5 1a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1" />
                                                                            </svg></button></a>

                                                                </td>
                                                            </tr>


                                                            <tr>การดำเนินการสมัครสหกิจศึกษา
                                                                <td>2</td>
                                                                <td>KKUCP-T000_ใบสมัครงานสหกิจศึกษา</td>
                                                                <td></td>
                                                                <td>
                                                                    <?php if ($row_application["status_admin"] == 0) : ?>
                                                                        <span class="badge badge-pill badge-danger">ยังไม่กรอกฟอร์ม</span>
                                                                    <?php elseif ($row_application["status_admin"] == 1) : ?>
                                                                        <span class="badge badge-pill badge-warning">รอตรวจสอบ</span>
                                                                    <?php elseif ($row_application["status_admin"] == 2) : ?>
                                                                        <span class="badge badge-pill badge-success">ตรวจสอบแล้ว</span>
                                                                    <?php elseif ($row_application["status_admin"] == 3) : ?>
                                                                        <span class="badge badge-warning">มีข้อมูลต้องแก้ไข</span>
                                                                    <?php elseif ($row_application["status_admin"] == 4) : ?>
                                                                        <span class="badge badge-danger">ยกเลิก</span>
                                                                        <?php elseif ($row_application["status_admin"] >= 5) : ?>
                                                                        <span class="badge badge-pill badge-success">ตรวจสอบแล้ว</span>
                                                                    <?php endif; ?>
                                                                </td>
                                                                <td>
                                                                    <a href="./cooperative_application_detail.php?id=<?= $row["email"] ?>"><button type="button" class="btn btn-outline-primary"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye-fill" viewBox="0 0 16 16">
                                                                                <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z" />
                                                                                <path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z" />
                                                                            </svg></button></a>
                                                                    </svg></button></a>
                                                                    <!-- <a href="./cooperative_application_detail_edit.php?id=<?= $row["email"] ?>"><button type="button" class="btn btn-outline-warning"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                                                                <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                                                                <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                                                                            </svg></button></a> -->
                                                                    <!-- <a href="./?id=<?= $row["email"] ?>"><button type="button"
                                                                        class="btn btn-outline-danger"><svg
                                                                            xmlns="http://www.w3.org/2000/svg"
                                                                            width="16" height="16" fill="currentColor"
                                                                            class="bi bi-trash-fill"
                                                                            viewBox="0 0 16 16">
                                                                            <path
                                                                                d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z" />
                                                                        </svg></button>
                                                                </a> -->
                                                                <a href="./cooperative_application_print.php?id=<?= $row["email"] ?>"><button type="button" class="btn btn-outline-success"><svg xmlns="http://www.w3.org/2000/svg" width="23" height="23" fill="currentColor" class="bi bi-printer-fill" viewBox="0 0 16 16">
                                                                                <path d="M5 1a2 2 0 0 0-2 2v1h10V3a2 2 0 0 0-2-2zm6 8H5a1 1 0 0 0-1 1v3a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1v-3a1 1 0 0 0-1-1" />
                                                                                <path d="M0 7a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v3a2 2 0 0 1-2 2h-1v-2a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v2H2a2 2 0 0 1-2-2zm2.5 1a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1" />
                                                                            </svg></button></a>
                                                                </td>
                                                            </tr>


                                                            <tr>
                                                                <td>3</td>
                                                                <td>KKUCP-T001_ใบยินยอมจากผู้ปกครอง</td>
                                                                <td></td>

                                                                <td>
                                                                    <?php if ($row_consent["status_admin"] == 0) : ?>
                                                                        <span class="badge badge-pill badge-danger">ยังไม่กรอกฟอร์ม</span>
                                                                    <?php elseif ($row_consent["status_admin"] == 1) : ?>
                                                                        <span class="badge badge-pill badge-warning">รอตรวจสอบ</span>
                                                                    <?php elseif ($row_consent["status_admin"] == 2) : ?>
                                                                        <span class="badge badge-pill badge-success">ตรวจสอบแล้ว</span>
                                                                    <?php elseif ($row_consent["status_admin"] == 3) : ?>
                                                                        <span class="badge badge-warning">มีข้อมูลต้องแก้ไข</span>
                                                                    <?php elseif ($row_consent["status_admin"] == 4) : ?>
                                                                        <span class="badge badge-danger">ยกเลิก</span>
                                                                        <?php elseif ($row_consent["status_admin"] >= 5) : ?>
                                                                        <span class="badge badge-pill badge-success">ตรวจสอบแล้ว</span>
                                                                    <?php endif; ?>
                                                                </td>
                                                                
                                                                <td>
                                                                    <a href="./cooperative_book.php?id=<?= $row["email"] ?>"><button type="button" class="btn btn-outline-primary"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye-fill" viewBox="0 0 16 16">
                                                                                <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z" />
                                                                                <path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z" />
                                                                            </svg></button></a>
                                                                    </svg></button></a>
                                                                    <!-- <a href=" ./cooperative_book_edit.php?id=<?= $row["email"] ?>"><button type="button" class="btn btn-outline-warning"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                                                                <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                                                                <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                                                                            </svg></button></a> -->
                                                                    <!-- <a href="./?id=<?= $row["email"] ?>"><button type="button"
                                                                        class="btn btn-outline-danger"><svg
                                                                            xmlns="http://www.w3.org/2000/svg"
                                                                            width="16" height="16" fill="currentColor"
                                                                            class="bi bi-trash-fill"
                                                                            viewBox="0 0 16 16">
                                                                            <path
                                                                                d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z" />
                                                                        </svg></button>
                                                                </a> -->
                                                                </td>
                                                            </tr>

                                                            <tr>
                                                                <td>4</td>
                                                                <td>แบบตอบรับนักศึกษาเข้าปฏิบัติงานสหกิจศึกษา</td>

                                                                <td>
                                                                    <?php if ($row_acceptance["status_admin"] == 0) : ?>
                                                                        <span class="badge badge-pill badge-danger">ยังไม่กรอกฟอร์ม</span>
                                                                    <?php elseif ($row_acceptance["status_admin"] == 1) : ?>
                                                                        <span class="badge badge-pill badge-warning">รอตรวจสอบ</span>
                                                                    <?php elseif ($row_acceptance["status_admin"] == 2) : ?>
                                                                        <span class="badge badge-pill badge-success">ตรวจสอบแล้ว</span>
                                                                    <?php elseif ($row_acceptance["status_admin"] == 3) : ?>
                                                                        <span class="badge badge-warning">มีข้อมูลต้องแก้ไข</span>
                                                                    <?php elseif ($row_acceptance["status_admin"] == 4) : ?>
                                                                        <span class="badge badge-danger">ยกเลิก</span>
                                                                        <?php elseif ($row_acceptance["status_admin"] >= 5) : ?>
                                                                        <span class="badge badge-pill badge-success">ตรวจสอบแล้ว</span>
                                                                    <?php endif; ?>
                                                                </td>
                                                                <td></td>
                                                                <td>
                                                                    <!-- <a href="./student_acceptance_form_detail.php?id=<?= $row["email"] ?>"><button type="button" class="btn btn-outline-primary"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye-fill" viewBox="0 0 16 16">
                                                                                <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z" />
                                                                                <path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z" />
                                                                            </svg></button></a>
                                                                    </svg></button></a> -->
                                                                    <!-- <a href="./student_acceptance_form_edit.php?id=<?= $row["email"] ?>"><button type="button" class="btn btn-outline-warning"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                                                                <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                                                                <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                                                                            </svg></button></a> -->
                                                                    <!-- <a href="./?id=<?= $row["email"] ?>"><button type="button"
                                                                        class="btn btn-outline-danger"><svg
                                                                            xmlns="http://www.w3.org/2000/svg"
                                                                            width="16" height="16" fill="currentColor"
                                                                            class="bi bi-trash-fill"
                                                                            viewBox="0 0 16 16">
                                                                            <path
                                                                                d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z" />
                                                                        </svg></button>
                                                                </a> -->
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>

                                                </div>
                                            </div>

                                        </div>
                                        <!-- <div class="btn ">
                                            <button type="button" class="btn btn-success">แก้ไขการตรวจสอบ</button>
                                            <button type="button" class="btn btn-danger">ยกเลิกการตรวจสอบ</button>

                                        </div> -->
                                    </form>
                                </div>




                            </div>

                            <div class="card profile-box flex-fill">
                                <div class="card-body">
                                    <form action="">
                                        <h3 class="card-title">ที่ต้องส่งขณะที่ปฏิบัติสหกิจศึกษา</h3>
                                        <div class="page-header">
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <?php
                                                    $id = $_GET['id']; // รับค่า id จาก URL
                                                    $sql = "SELECT * FROM petition_document 
                                                  RIGHT JOIN login_student ON petition_document.email = login_student.email 
                                                  WHERE login_student.role = 'cooperative_student' 
                                                  AND login_student.email = '$id'";
                                                    $result = mysqli_query($conn, $sql);
                                                    $row = mysqli_fetch_array($result);

                                                    // เรียกข้อมูลจากตาราง petition_document ใบคำร้องขอเข้าร่วมโครงการสหกิจศึกษา
                                                    $sql_petition = "SELECT * FROM petition_document WHERE email ='$id' ";
                                                    $result_petition = mysqli_query($conn, $sql_petition);
                                                    $row_petition = mysqli_fetch_array($result_petition);

                                                    // เรียกข้อมูลจากตาราง coop_application_form ใบสมัครงานสหกิจศึกษา
                                                    $sql_application = "SELECT * FROM coop_application_form WHERE email ='$id' ";
                                                    $result_application = mysqli_query($conn, $sql_application);
                                                    $row_application = mysqli_fetch_array($result_application);


                                                    // เรียกข้อมูลจากตาราง coopperative_perental_consent_form
                                                    $sql_consent = "SELECT * FROM coopperative_perental_consent_form  WHERE email ='$id' ";
                                                    $result_consent = mysqli_query($conn, $sql_consent);
                                                    $row_consent = mysqli_fetch_array($result_consent);

                                                    // เรียกข้อมูลจากตาราง coopperative_education_report_form
                                                    $sql_education = "SELECT * FROM coopperative_education_report_form WHERE email ='$id' ";
                                                    $result_education = mysqli_query($conn, $sql_education);
                                                    $row_education = mysqli_fetch_array($result_education);


                                                    // เรียกข้อมูลจากตาราง job_description_accommodation
                                                    $sql_description_ = "SELECT * FROM job_description_accommodation WHERE email ='$id' ";
                                                    $result_description_ = mysqli_query($conn, $sql_description_);
                                                    $row_description_ = mysqli_fetch_array($result_description_);


                                                    // เรียกข้อมูลจากตาราง cooperative_report_outline
                                                    $sql_report = "SELECT * FROM cooperative_report_outline WHERE email ='$id' ";
                                                    $result_report = mysqli_query($conn, $sql_report);
                                                    $row_report = mysqli_fetch_array($result_report);

                                                    // เรียกข้อมูลจากตาราง supervision_recording_student
                                                    $sql_recording = "SELECT * FROM supervision_recording WHERE email ='$id' ";
                                                    $result_recording = mysqli_query($conn, $sql_recording);
                                                    $row_recording = mysqli_fetch_array($result_recording);

                                                     // เรียกข้อมูลจากตาราง performance_appraisal_form
                                                     $sql_appraisal = "SELECT * FROM performance_appraisal_form WHERE email ='$id' ";
                                                     $result_appraisal = mysqli_query($conn, $sql_appraisal);
                                                     $row_appraisal = mysqli_fetch_array($result_appraisal);
 
                                                     // เรียกข้อมูลจากตาราง report_evaluation_form
                                                     $sql_evaluation = "SELECT * FROM report_evaluation_form WHERE email ='$id' ";
                                                     $result_evaluation = mysqli_query($conn, $sql_evaluation);
                                                     $row_evaluation = mysqli_fetch_array($result_evaluation);
 





                                                    ?>


                                                    <table class="table table-striped">
                                                        <thead>
                                                            <tr>
                                                                <th>ลำดับ</th>
                                                                <th>ชื่อแบบฟอร์ม</th>
                                                                <th>สถานะ (ผู้ดูแลระบบ)</th>
                                                                <th>รายละเอียด</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <td>1</td>
                                                            <td>KKUCP-T002_แบบแจ้งรายละเอียดงานและรายละเอียดที่พัก</td>
                                                            <td>
                                                                <?php if ($row_description_["status_admin"] == 0) : ?>
                                                                    <span class="badge badge-pill badge-danger">ยังไม่กรอกฟอร์ม</span>
                                                                <?php elseif ($row_description_["status_admin"] == 1) : ?>
                                                                    <span class="badge badge-pill badge-warning">รอตรวจสอบ</span>
                                                                <?php elseif ($row_description_["status_admin"] == 2) : ?>
                                                                    <span class="badge badge-pill badge-success">ตรวจสอบแล้ว</span>
                                                                <?php elseif ($row_description_["status_admin"] == 3) : ?>
                                                                    <span class="badge badge-warning">มีข้อมูลต้องแก้ไข</span>
                                                                <?php elseif ($row_description_["status_admin"] == 4) : ?>
                                                                    <span class="badge badge-danger">ยกเลิก</span>
                                                                <?php endif; ?>
                                                            </td>

                                                            <td>
                                                                <a href="./job_description_accommodation.php?id=<?= $row["email"] ?>"><button type="button" class="btn btn-outline-primary"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye-fill" viewBox="0 0 16 16">
                                                                            <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z" />
                                                                            <path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z" />
                                                                        </svg></button></a>
                                                                </svg></button></a>
                                                                <!-- <a href="./job_description_accommodation_edit.php?id=<?= $row["email"] ?>"><button type="button" class="btn btn-outline-warning"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                                                            <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                                                            <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                                                                        </svg></button></a> -->
                                                                <!-- <a href="./?id=<?= $row["email"] ?>"><button type="button"
                                                                        class="btn btn-outline-danger"><svg
                                                                            xmlns="http://www.w3.org/2000/svg"
                                                                            width="16" height="16" fill="currentColor"
                                                                            class="bi bi-trash-fill"
                                                                            viewBox="0 0 16 16">
                                                                            <path
                                                                                d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z" />
                                                                        </svg></button>
                                                                </a> -->

                                                            </td>
                                                            </tr>
                                                            <tr>
                                                                <td>2</td>
                                                                <td>KKUCP-T003_แบบแผนและโครงร่างรายงานการปฏิบัติงานสหกิจศึกษา-Proposal</td>

                                                                <td>
                                                                    <?php if ($row_report["status_admin"] == 0) : ?>
                                                                        <span class="badge badge-pill badge-danger">ยังไม่กรอกฟอร์ม</span>
                                                                    <?php elseif ($row_report["status_admin"] == 1) : ?>
                                                                        <span class="badge badge-pill badge-warning">รอตรวจสอบ</span>
                                                                    <?php elseif ($row_report["status_admin"] == 2) : ?>
                                                                        <span class="badge badge-pill badge-success">ตรวจสอบแล้ว</span>
                                                                    <?php elseif ($row_report["status_admin"] == 3) : ?>
                                                                        <span class="badge badge-warning">มีข้อมูลต้องแก้ไข</span>
                                                                    <?php elseif ($row_report["status_admin"] == 4) : ?>
                                                                        <span class="badge badge-danger">ยกเลิก</span>
                                                                    <?php endif; ?>
                                                                </td>
                                                                <td>
                                                                    <a href="./cooperative_report_outline.php?id=<?= $row["email"] ?>"><button type="button" class="btn btn-outline-primary"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye-fill" viewBox="0 0 16 16">
                                                                                <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z" />
                                                                                <path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z" />
                                                                            </svg></button></a>
                                                                    </svg></button></a>


                                                                    <!-- <a href="./cooperative_report_outline_edit.php?id=<?= $row["email"] ?>"><button type="button" class="btn btn-outline-warning"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                                                                <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                                                                <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                                                                            </svg></button></a> -->
                                                                    <!-- <a href="./?id=<?= $row["email"] ?>"><button type="button"
                                                                        class="btn btn-outline-danger"><svg
                                                                            xmlns="http://www.w3.org/2000/svg"
                                                                            width="16" height="16" fill="currentColor"
                                                                            class="bi bi-trash-fill"
                                                                            viewBox="0 0 16 16">
                                                                            <path
                                                                                d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z" />
                                                                        </svg></button>
                                                                </a> -->
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>3</td>
                                                                <td>KKUCP-T004_แบบบันทึกการนิเทศงานนักศึกษาสหกิจศึกษา</td>

                                                                <td>
                                                                    <?php if ($row_recording["status_admin"] == 0) : ?>
                                                                        <span class="badge badge-pill badge-danger">ยังไม่กรอกฟอร์ม</span>
                                                                    <?php elseif ($row_recording["status_admin"] == 1) : ?>
                                                                        <span class="badge badge-pill badge-warning">รอตรวจสอบ</span>
                                                                    <?php elseif ($row_recording["status_admin"] == 2) : ?>
                                                                        <span class="badge badge-pill badge-success">ตรวจสอบแล้ว</span>
                                                                    <?php elseif ($row_recording["status_admin"] == 3) : ?>
                                                                        <span class="badge badge-warning">มีข้อมูลต้องแก้ไข</span>
                                                                    <?php elseif ($row_recording["status_admin"] == 4) : ?>
                                                                        <span class="badge badge-danger">ยกเลิก</span>
                                                                    <?php endif; ?>
                                                                </td>
                                                                
                                                                <td>
                                                                    <a href="./supervision_recording_student.php?id=<?= $row["email"] ?>"><button type="button" class="btn btn-outline-primary"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye-fill" viewBox="0 0 16 16">
                                                                                <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z" />
                                                                                <path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z" />
                                                                            </svg></button></a>
                                                                    </svg></button></a>
                                                                    <!-- <a href="./supervision_recording_student_edit.php?id=<?= $row["email"] ?>"><button type="button" class="btn btn-outline-warning"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                                                                <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                                                                <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                                                                            </svg></button></a> -->
                                                                    <!-- <a href="./?id=<?= $row["email"] ?>"><button type="button"
                                                                        class="btn btn-outline-danger"><svg
                                                                            xmlns="http://www.w3.org/2000/svg"
                                                                            width="16" height="16" fill="currentColor"
                                                                            class="bi bi-trash-fill"
                                                                            viewBox="0 0 16 16">
                                                                            <path
                                                                                d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z" />
                                                                        </svg></button>
                                                                </a> -->
                                                                </td>
                                                            </tr>


                                                            <tr>
                                                                <td>4</td>
                                                                <td>KKUCP-T005_แบบประเมินผลการปฏิบัติงานของนักศึกษาสหกิจศึกษา</td>
                                                                <td>
                                                                    <?php if ($row_appraisal["status_admin"] == 0) : ?>
                                                                        <span class="badge badge-pill badge-danger">ยังไม่กรอกฟอร์ม</span>
                                                                    <?php elseif ($row_appraisal["status_admin"] == 1) : ?>
                                                                        <span class="badge badge-pill badge-warning">รอตรวจสอบ</span>
                                                                    <?php elseif ($row_appraisal["status_admin"] == 2) : ?>
                                                                        <span class="badge badge-pill badge-success">ตรวจสอบแล้ว</span>
                                                                    <?php elseif ($row_appraisal["status_admin"] == 3) : ?>
                                                                        <span class="badge badge-warning">มีข้อมูลต้องแก้ไข</span>
                                                                    <?php elseif ($row_appraisal["status_admin"] == 4) : ?>
                                                                        <span class="badge badge-danger">ยกเลิก</span>
                                                                        <?php elseif ($row_appraisal["status_admin"] >= 5) : ?>
                                                                        <span class="badge badge-pill badge-success">ตรวจสอบแล้ว</span>
                                                                    <?php endif; ?>
                                                                </td>
                                                                

                                                                <td>
                                                                    <a href="./performance_appraisal_form.php?id=<?= $row["email"] ?>"><button type="button" class="btn btn-outline-primary"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye-fill" viewBox="0 0 16 16">
                                                                                <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z" />
                                                                                <path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z" />
                                                                            </svg></button></a>
                                                                    </svg></button></a>
                                                                    <!-- <a href="./performance_appraisal_form_edit.php?id=<?= $row["email"] ?>"><button type="button" class="btn btn-outline-warning"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                                                                <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                                                                <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                                                                            </svg></button></a> -->
                                                                    <!-- <a href="./?id=<?= $row["email"] ?>"><button type="button"
                                                                        class="btn btn-outline-danger"><svg
                                                                            xmlns="http://www.w3.org/2000/svg"
                                                                            width="16" height="16" fill="currentColor"
                                                                            class="bi bi-trash-fill"
                                                                            viewBox="0 0 16 16">
                                                                            <path
                                                                                d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z" />
                                                                        </svg></button>
                                                                </a> -->

                                                                </td>
                                                            </tr>

                                                            <tr>
                                                                <td>5</td>
                                                                <td>KKUCP-T006_แบบประเมินผลรายงานสหกิจศึกษา</td>
                                                                <td>
                                                                    <?php if ($row_evaluation["status_admin"] == 0) : ?>
                                                                        <span class="badge badge-pill badge-danger">ยังไม่กรอกฟอร์ม</span>
                                                                    <?php elseif ($row_evaluation["status_admin"] == 1) : ?>
                                                                        <span class="badge badge-pill badge-warning">รอตรวจสอบ</span>
                                                                    <?php elseif ($row_evaluation["status_admin"] == 2) : ?>
                                                                        <span class="badge badge-pill badge-success">ตรวจสอบแล้ว</span>
                                                                    <?php elseif ($row_evaluation["status_admin"] == 3) : ?>
                                                                        <span class="badge badge-warning">มีข้อมูลต้องแก้ไข</span>
                                                                    <?php elseif ($row_evaluation["status_admin"] == 4) : ?>
                                                                        <span class="badge badge-danger">ยกเลิก</span>
                                                                    <?php endif; ?>
                                                                </td>
                                                                

                                                                <td>
                                                                    <a href="./report_evaluation_form.php?id=<?= $row["email"] ?>"><button type="button" class="btn btn-outline-primary"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye-fill" viewBox="0 0 16 16">
                                                                                <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z" />
                                                                                <path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z" />
                                                                            </svg></button></a>
                                                                    </svg></button></a>
                                                                    <!-- <a href="./report_evaluation_form_edit.php?id=<?= $row["email"] ?>"><button type="button" class="btn btn-outline-warning"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                                                                <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                                                                <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                                                                            </svg></button></a> -->
                                                                    <!-- <a href="./?id=<?= $row["email"] ?>"><button type="button"
                                                                        class="btn btn-outline-danger"><svg
                                                                            xmlns="http://www.w3.org/2000/svg"
                                                                            width="16" height="16" fill="currentColor"
                                                                            class="bi bi-trash-fill"
                                                                            viewBox="0 0 16 16">
                                                                            <path
                                                                                d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z" />
                                                                        </svg></button>
                                                                </a> -->

                                                                </td>
                                                            </tr>

                                                        </tbody>
                                                    </table>

                                                </div>
                                            </div>

                                        </div>
                                        <!-- <div class="btn ">
                                            <button type="button" class="btn btn-success">แก้ไขการตรวจสอบ</button>
                                            <button type="button" class="btn btn-danger">ยกเลิกการตรวจสอบ</button>

                                        </div> -->
                                    </form>
                                </div>




                            </div>

                            <div class="card profile-box flex-fill">
                                <div class="card-body">
                                    <form action="">
                                        <h3 class="card-title">รายงานหลังการปฏิบัติสหกิจศึกษา</h3>
                                        <div class="page-header">
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <?php
                                                    $id = $_GET['id']; // รับค่า id จาก URL
                                                    $sql = "SELECT * FROM petition_document 
                                                  RIGHT JOIN login_student ON petition_document.email = login_student.email 
                                                  WHERE login_student.role = 'cooperative_student' 
                                                  AND login_student.email = '$id'";
                                                    $result = mysqli_query($conn, $sql);
                                                    $row = mysqli_fetch_array($result);



                                                    // เรียกข้อมูลจากตาราง coopperative_education_report_form
                                                    $sql_education = "SELECT * FROM coopperative_education_report_form WHERE email ='$id' ";
                                                    $result_education = mysqli_query($conn, $sql_education);
                                                    $row_education = mysqli_fetch_array($result_education);




                                                    ?>


                                                    <table class="table table-striped">
                                                        <thead>
                                                            <tr>
                                                                <th>ลำดับ</th>
                                                                <th>ชื่อแบบฟอร์ม</th>
                                                                <th>สถานะ (ผู้ดูแลระบบ)</th>
                                                                <th>รายละเอียด</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td>1</td>
                                                                <td>KKUCP-T007_แบบฟอร์มรายงานการปฏิบัติสหกิจศึกษา</td>
                                                                <td>
                                                                    <?php if ($row_education["status_admin"] == 0) : ?>
                                                                        <span class="badge badge-pill badge-danger">ยังไม่กรอกฟอร์ม</span>
                                                                    <?php elseif ($row_education["status_admin"] == 1) : ?>
                                                                        <span class="badge badge-pill badge-warning">รอตรวจสอบ</span>
                                                                    <?php elseif ($row_education["status_admin"] == 2) : ?>
                                                                        <span class="badge badge-pill badge-success">ตรวจสอบแล้ว</span>
                                                                    <?php elseif ($row_education["status_admin"] == 3) : ?>
                                                                        <span class="badge badge-warning">มีข้อมูลต้องแก้ไข</span>
                                                                    <?php elseif ($row_education["status_admin"] == 4) : ?>
                                                                        <span class="badge badge-danger">ยกเลิก</span>
                                                                    <?php endif; ?>
                                                                </td>

                                                                <td>

                                                                    <a href="./education_detail2.php?id=<?= $row["email"] ?>"><button type="button" class="btn btn-outline-primary"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye-fill" viewBox="0 0 16 16">
                                                                                <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z" />
                                                                                <path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z" />
                                                                            </svg></button></a>
                                                                    </svg></button></a>
                                                                    <!-- <a href=" ./coopperative_education_edit.php?id=<?= $row["email"] ?>"><button type="button" class="btn btn-outline-warning"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                                                                <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                                                                <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                                                                            </svg></button></a> -->


                                                                </td>
                                                            </tr>

                                                        </tbody>
                                                    </table>

                                                </div>
                                            </div>

                                        </div>
                                        <!-- <div class="btn ">
                                            <button type="button" class="btn btn-success">แก้ไขการตรวจสอบ</button>
                                            <button type="button" class="btn btn-danger">ยกเลิกการตรวจสอบ</button>

                                        </div> -->
                                    </form>
                                </div>




                            </div>
                        </div>
                    </div>
                </div>










                <!-- /file Info Tab -->



                <!-- Projects Tab -->
                <div class="tab-pane fade" id="advisor">
                    <div class="card">
                        <div class="card-body">
                            <h3 class="card-title">เอกสารที่อาจารย์ประจำวิชาสหกิจต้องส่งต้องส่ง</h3>
                            <form>
                                <div class="page-header">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <?php
                                            $id = $_GET['id']; // รับค่า id จาก URL
                                            $sql = "SELECT * FROM petition_document 
                                                  RIGHT JOIN login_student ON petition_document.email = login_student.email 
                                                  WHERE login_student.role = 'cooperative_student' 
                                                  AND login_student.email = '$id'";
                                            $result = mysqli_query($conn, $sql);
                                            $row = mysqli_fetch_array($result);

                                            // เรียกข้อมูลจากตาราง petition_document
                                            $sql_petition = "SELECT * FROM petition_document WHERE email ='$id' ";
                                            $result_petition = mysqli_query($conn, $sql_petition);
                                            $row_petition = mysqli_fetch_array($result_petition);

                                            // เรียกข้อมูลจากตาราง coop_application_form
                                            $sql_application = "SELECT * FROM coop_application_form WHERE email ='$id' ";
                                            $result_application = mysqli_query($conn, $sql_application);
                                            $row_application = mysqli_fetch_array($result_application);







                                            ?>


                                            <table class="table table-striped">
                                                <thead>
                                                    <tr>
                                                        <th>ลำดับ</th>
                                                        <th>ชื่อแบบฟอร์ม</th>
                                                        <th>สถานะ (อาจารย์</th>
                                                        <th>รายละเอียด</th>
                                                    </tr>
                                                </thead>
                                                <tbody>



                                                    <tr>
                                                        <td>1</td>
                                                        <td>ใบคำร้องขอเข้าร่วมโครงการสหกิจศึกษา</td>
                                                        <td>
                                                            <?php if ($row_petition["status_admin"] == 0) : ?>
                                                                <span class="badge badge-pill badge-danger">ยังไม่กรอกฟอร์ม</span>
                                                            <?php elseif ($row_petition["status_admin"] == 1) : ?>
                                                                <span class="badge badge-pill badge-warning">รอตรวจสอบ</span>
                                                            <?php elseif ($row_petition["status_admin"] == 2) : ?>
                                                                <span class="badge badge-pill badge-success">ตรวจสอบแล้ว</span>
                                                            <?php elseif ($row_petition["status_admin"] == 3) : ?>
                                                                <span class="badge badge-warning">มีข้อมูลต้องแก้ไข</span>
                                                            <?php elseif ($row_petition["status_admin"] == 4) : ?>
                                                                <span class="badge badge-danger">ยกเลิก</span>
                                                            <?php endif; ?>
                                                        </td>

                                                        <td>
                                                            <a href="./cooperative_petition_detil.php?id=<?= $row["email"] ?>"><button type="button" class="btn btn-outline-primary"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye-fill" viewBox="0 0 16 16">
                                                                        <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z" />
                                                                        <path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z" />
                                                                    </svg></button></a>
                                                            </svg></button></a>
                                                            <!-- <a href="./cooperative_petition_detil_edit.php?id=<?= $row["email"] ?>"><button type="button" class="btn btn-outline-warning"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                                                        <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                                                        <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                                                                    </svg></button></a> -->
                                                            <!-- <a href="./?id=<?= $row["email"] ?>"><button type="button"
                                                                        class="btn btn-outline-danger"><svg
                                                                            xmlns="http://www.w3.org/2000/svg"
                                                                            width="16" height="16" fill="currentColor"
                                                                            class="bi bi-trash-fill"
                                                                            viewBox="0 0 16 16">
                                                                            <path
                                                                                d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z" />
                                                                        </svg></button>
                                                                </a> -->

                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>2</td>
                                                        <td>KKUCP-T000_ใบสมัครงานสหกิจศึกษา</td>

                                                        <td>
                                                            <?php if ($row_application["status_admin"] == 0) : ?>
                                                                <span class="badge badge-pill badge-danger">ยังไม่กรอกฟอร์ม</span>
                                                            <?php elseif ($row_application["status_admin"] == 1) : ?>
                                                                <span class="badge badge-pill badge-warning">รอตรวจสอบ</span>
                                                            <?php elseif ($row_application["status_admin"] == 2) : ?>
                                                                <span class="badge badge-pill badge-success">ตรวจสอบแล้ว</span>
                                                            <?php elseif ($row_application["status_admin"] == 3) : ?>
                                                                <span class="badge badge-warning">มีข้อมูลต้องแก้ไข</span>
                                                            <?php elseif ($row_application["status_admin"] == 4) : ?>
                                                                <span class="badge badge-danger">ยกเลิก</span>
                                                            <?php endif; ?>
                                                        </td>
                                                        <td>
                                                            <a href="./cooperative_application_detail.php?id=<?= $row["email"] ?>"><button type="button" class="btn btn-outline-primary"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye-fill" viewBox="0 0 16 16">
                                                                        <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z" />
                                                                        <path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z" />
                                                                    </svg></button></a>
                                                            </svg></button></a>
                                                            <!-- <a href="./cooperative_application_detail_edit.php?id=<?= $row["email"] ?>"><button type="button" class="btn btn-outline-warning"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                                                        <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                                                        <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                                                                    </svg></button></a> -->
                                                            <!-- <a href="./?id=<?= $row["email"] ?>"><button type="button"
                                                                        class="btn btn-outline-danger"><svg
                                                                            xmlns="http://www.w3.org/2000/svg"
                                                                            width="16" height="16" fill="currentColor"
                                                                            class="bi bi-trash-fill"
                                                                            viewBox="0 0 16 16">
                                                                            <path
                                                                                d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z" />
                                                                        </svg></button>
                                                                </a> -->
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>

                                        </div>
                                    </div>

                                </div>



                            </form>
                        </div>
                    </div>

                </div>
                <!-- /Projects Tab -->




                <!-- สถานประกอบการ -->
                <div class="tab-pane fade" id="company">
                    <div class="card">
                        <div class="card-body">
                            <h3 class="card-title">สถานประกอบการ</h3>
                            <form>

                                <div class="page-header">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <?php
                                            $id = $_GET['id']; // รับค่า id จาก URL
                                            $sql = "SELECT * FROM petition_document 
                                                  RIGHT JOIN login_student ON petition_document.email = login_student.email 
                                                  WHERE login_student.role = 'cooperative_student' 
                                                  AND login_student.email = '$id'";
                                            $result = mysqli_query($conn, $sql);
                                            $row = mysqli_fetch_array($result);

                                            // เรียกข้อมูลจากตาราง job_description_accommodation
                                            $sql_description_ = "SELECT * FROM job_description_accommodation WHERE email ='$id' ";
                                            $result_description_ = mysqli_query($conn, $sql_description_);
                                            $row_description_ = mysqli_fetch_array($result_description_);

                                            // เรียกข้อมูลจากตาราง cooperative_report_outline
                                            $sql_report = "SELECT * FROM cooperative_report_outline WHERE email ='$id' ";
                                            $result_report = mysqli_query($conn, $sql_report);
                                            $row_report = mysqli_fetch_array($result_report);



                                            ?>


                                            <table class="table table-striped">
                                                <thead>
                                                    <tr>
                                                        <th>ลำดับ</th>
                                                        <th>ชื่อแบบฟอร์ม</th>
                                                        <th>สถานะ (บริษัท)</th>
                                                        <th>รายละเอียด</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>


                                                        <td>1</td>
                                                        <td>KKUCP-T002_แบบแจ้งรายละเอียดงานและรายละเอียดที่พัก</td>
                                                        <td>
                                                            <?php if ($row_description_["status_admin"] == 0) : ?>
                                                                <span class="badge badge-pill badge-danger">ยังไม่กรอกฟอร์ม</span>
                                                            <?php elseif ($row_description_["status_admin"] == 1) : ?>
                                                                <span class="badge badge-pill badge-warning">รอตรวจสอบ</span>
                                                            <?php elseif ($row_description_["status_admin"] == 2) : ?>
                                                                <span class="badge badge-pill badge-success">ตรวจสอบแล้ว</span>
                                                            <?php elseif ($row_description_["status_admin"] == 3) : ?>
                                                                <span class="badge badge-warning">มีข้อมูลต้องแก้ไข</span>
                                                            <?php elseif ($row_description_["status_admin"] == 4) : ?>
                                                                <span class="badge badge-danger">ยกเลิก</span>
                                                            <?php endif; ?>
                                                        </td>

                                                        <td>
                                                            <a href="./job_description_accommodation.php?id=<?= $row["email"] ?>"><button type="button" class="btn btn-outline-primary"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye-fill" viewBox="0 0 16 16">
                                                                        <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z" />
                                                                        <path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z" />
                                                                    </svg></button></a>
                                                            </svg></button></a>
                                                            <!-- <a href="./job_description_accommodation_edit.php?id=<?= $row["email"] ?>"><button type="button" class="btn btn-outline-warning"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                                                        <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                                                        <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                                                                    </svg></button></a> -->
                                                            <!-- <a href="./?id=<?= $row["email"] ?>"><button type="button"
                                                                        class="btn btn-outline-danger"><svg
                                                                            xmlns="http://www.w3.org/2000/svg"
                                                                            width="16" height="16" fill="currentColor"
                                                                            class="bi bi-trash-fill"
                                                                            viewBox="0 0 16 16">
                                                                            <path
                                                                                d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z" />
                                                                        </svg></button>
                                                                </a> -->

                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>2</td>
                                                        <td>KKUCP-T003_แบบแผนและโครงร่างรายงานการปฏิบัติงานสหกิจศึกษา-Proposal</td>

                                                        <td>
                                                            <?php if ($row_report["status_admin"] == 0) : ?>
                                                                <span class="badge badge-pill badge-danger">ยังไม่กรอกฟอร์ม</span>
                                                            <?php elseif ($row_report["status_admin"] == 1) : ?>
                                                                <span class="badge badge-pill badge-warning">รอตรวจสอบ</span>
                                                            <?php elseif ($row_report["status_admin"] == 2) : ?>
                                                                <span class="badge badge-pill badge-success">ตรวจสอบแล้ว</span>
                                                            <?php elseif ($row_report["status_admin"] == 3) : ?>
                                                                <span class="badge badge-warning">มีข้อมูลต้องแก้ไข</span>
                                                            <?php elseif ($row_report["status_admin"] == 4) : ?>
                                                                <span class="badge badge-danger">ยกเลิก</span>
                                                            <?php endif; ?>
                                                        </td>
                                                        <td>
                                                            <a href="./cooperative_report_outline.php?id=<?= $row["email"] ?>"><button type="button" class="btn btn-outline-primary"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye-fill" viewBox="0 0 16 16">
                                                                        <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z" />
                                                                        <path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z" />
                                                                    </svg></button></a>
                                                            </svg></button></a>
                                                            <!-- <a href="./cooperative_report_outline_edit.php?id=<?= $row["email"] ?>"><button type="button" class="btn btn-outline-warning"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                                                        <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                                                        <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                                                                    </svg></button></a> -->



                                                            <!-- <a href="./?id=<?= $row["email"] ?>"><button type="button"
                                                                        class="btn btn-outline-danger"><svg
                                                                            xmlns="http://www.w3.org/2000/svg"
                                                                            width="16" height="16" fill="currentColor"
                                                                            class="bi bi-trash-fill"
                                                                            viewBox="0 0 16 16">
                                                                            <path
                                                                                d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z" />
                                                                        </svg></button>
                                                                </a> -->
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>3</td>
                                                        <td>KKUCP-T005_แบบประเมินผลการปฏิบัติงานของนักศึกษาสหกิจศึกษา</td>
                                                        <td>
                                                            <?php if ($row_appraisal["status_admin"] == 0) : ?>
                                                                <span class="badge badge-pill badge-danger">ยังไม่กรอกฟอร์ม</span>
                                                            <?php elseif ($row_appraisal["status_admin"] == 1) : ?>
                                                                <span class="badge badge-pill badge-warning">รอตรวจสอบ</span>
                                                            <?php elseif ($row_appraisal["status_admin"] == 2) : ?>
                                                                <span class="badge badge-pill badge-success">ตรวจสอบแล้ว</span>
                                                            <?php elseif ($row_appraisal["status_admin"] == 3) : ?>
                                                                <span class="badge badge-warning">มีข้อมูลต้องแก้ไข</span>
                                                            <?php elseif ($row_appraisal["status_admin"] == 4) : ?>
                                                                <span class="badge badge-danger">ยกเลิก</span>
                                                            <?php endif; ?>
                                                        </td>

                                                        <td>
                                                        <a href="./performance_appraisal_form.php?id=<?= $row["email"] ?>"><button type="button" class="btn btn-outline-primary"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye-fill" viewBox="0 0 16 16">
                                                                                <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z" />
                                                                                <path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z" />
                                                                            </svg></button></a>
                                                                    </svg></button></a>
                                                                    <!-- <a href="./report_evaluation_form_edit.php?id=<?= $row["email"] ?>"><button type="button" class="btn btn-outline-warning"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                                                                <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                                                                <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                                                                            </svg></button></a> -->
                                                            <!-- <a href="./?id=<?= $row["email"] ?>"><button type="button"
                                                                        class="btn btn-outline-danger"><svg
                                                                            xmlns="http://www.w3.org/2000/svg"
                                                                            width="16" height="16" fill="currentColor"
                                                                            class="bi bi-trash-fill"
                                                                            viewBox="0 0 16 16">
                                                                            <path
                                                                                d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z" />
                                                                        </svg></button>
                                                                </a> -->

                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td>4</td>
                                                        <td>KKUCP-T006_แบบประเมินผลรายงานสหกิจศึกษา</td>
                                                        <td>
                                                            <?php if ($row_evaluation["status_admin"] == 0) : ?>
                                                                <span class="badge badge-pill badge-danger">ยังไม่กรอกฟอร์ม</span>
                                                            <?php elseif ($row_evaluation["status_admin"] == 1) : ?>
                                                                <span class="badge badge-pill badge-warning">รอตรวจสอบ</span>
                                                            <?php elseif ($row_evaluation["status_admin"] == 2) : ?>
                                                                <span class="badge badge-pill badge-success">ตรวจสอบแล้ว</span>
                                                            <?php elseif ($row_evaluation["status_admin"] == 3) : ?>
                                                                <span class="badge badge-warning">มีข้อมูลต้องแก้ไข</span>
                                                            <?php elseif ($row_evaluation["status_admin"] == 4) : ?>
                                                                <span class="badge badge-danger">ยกเลิก</span>
                                                            <?php endif; ?>
                                                        </td>

                                                        <td>
                                                        <a href="./report_evaluation_form.php?id=<?= $row["email"] ?>"><button type="button" class="btn btn-outline-primary"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye-fill" viewBox="0 0 16 16">
                                                                                <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z" />
                                                                                <path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z" />
                                                                            </svg></button></a>
                                                                    </svg></button></a>
                                                                    <!-- <a href="./report_evaluation_form_edit.php?id=<?= $row["email"] ?>"><button type="button" class="btn btn-outline-warning"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                                                                <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                                                                <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                                                                            </svg></button></a> -->
                                                            <!-- <a href="./?id=<?= $row["email"] ?>"><button type="button"
                                                                        class="btn btn-outline-danger"><svg
                                                                            xmlns="http://www.w3.org/2000/svg"
                                                                            width="16" height="16" fill="currentColor"
                                                                            class="bi bi-trash-fill"
                                                                            viewBox="0 0 16 16">
                                                                            <path
                                                                                d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z" />
                                                                        </svg></button>
                                                                </a> -->

                                                        </td>
                                                    </tr>

                                                </tbody>
                                            </table>

                                        </div>
                                    </div>

                                </div>
                                <!-- <div class="btn ">
                                            <button type="button" class="btn btn-success">แก้ไขการตรวจสอบ</button>
                                            <button type="button" class="btn btn-danger">ยกเลิกการตรวจสอบ</button>

                                        </div> -->



                            </form>
                        </div>
                    </div>
                </div>
                <!-- /สถานประกอบการ -->

                <!-- ประเมิน นศ -->
                <div class="tab-pane fade" id="bank_statutory">
                    <div class="card">
                        <div class="card-body">
                            <h3 class="card-title">อาจารย์นิเทศ</h3>
                            <form>
                                <div class="page-header">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <?php
                                            $id = $_GET['id']; // รับค่า id จาก URL
                                            $sql = "SELECT * FROM petition_document 
                                                  RIGHT JOIN login_student ON petition_document.email = login_student.email 
                                                  WHERE login_student.role = 'cooperative_student' 
                                                  AND login_student.email = '$id'";
                                            $result = mysqli_query($conn, $sql);
                                            $row = mysqli_fetch_array($result);

                                            // เรียกข้อมูลจากตาราง petition_document
                                            $sql_petition = "SELECT * FROM petition_document WHERE email ='$id' ";
                                            $result_petition = mysqli_query($conn, $sql_petition);
                                            $row_petition = mysqli_fetch_array($result_petition);

                                            // เรียกข้อมูลจากตาราง coop_application_form
                                            $sql_application = "SELECT * FROM coop_application_form WHERE email ='$id' ";
                                            $result_application = mysqli_query($conn, $sql_application);
                                            $row_application = mysqli_fetch_array($result_application);


                                            // เรียกข้อมูลจากตาราง coopperative_perental_consent_form ใบยินยอมจากผู้ปกครอง
                                            $sql_consent = "SELECT * FROM coopperative_perental_consent_form  WHERE email ='$id' ";
                                            $result_consent = mysqli_query($conn, $sql_consent);
                                            $row_consent = mysqli_fetch_array($result_consent);

                                            // เรียกข้อมูลจากตาราง coopperative_education_report_form
                                            $sql_education = "SELECT * FROM coopperative_education_report_form WHERE email ='$id' ";
                                            $result_education = mysqli_query($conn, $sql_education);
                                            $row_education = mysqli_fetch_array($result_education);


                                            // เรียกข้อมูลจากตาราง job_description_accommodation
                                            $sql_description_ = "SELECT * FROM job_description_accommodation WHERE email ='$id' ";
                                            $result_description_ = mysqli_query($conn, $sql_description_);
                                            $row_description_ = mysqli_fetch_array($result_description_);


                                            // เรียกข้อมูลจากตาราง cooperative_report_outline
                                            $sql_report = "SELECT * FROM cooperative_report_outline WHERE email ='$id' ";
                                            $result_report = mysqli_query($conn, $sql_report);
                                            $row_report = mysqli_fetch_array($result_report);

                                            // เรียกข้อมูลจากตาราง supervision_recording_student
                                            $sql_recording = "SELECT * FROM supervision_recording WHERE email ='$id' ";
                                            $result_recording = mysqli_query($conn, $sql_recording);
                                            $row_recording = mysqli_fetch_array($result_recording);




                                            ?>


                                            <table class="table table-striped">
                                                <thead>
                                                    <tr>
                                                        <th>ลำดับ</th>
                                                        <th>ชื่อแบบฟอร์ม</th>
                                                        <th>สถานะ (อาจารย์)</th>
                                                        <th>รายละเอียด</th>
                                                    </tr>
                                                </thead>
                                                <tbody>



                                                    <tr>
                                                        <td>1</td>
                                                        <td>KKUCP-T004_แบบบันทึกการนิเทศงานนักศึกษาสหกิจศึกษา</td>

                                                        <td>
                                                            <?php if ($row_recording["status_admin"] == 0) : ?>
                                                                <span class="badge badge-pill badge-danger">ยังไม่กรอกฟอร์ม</span>
                                                            <?php elseif ($row_recording["status_admin"] == 1) : ?>
                                                                <span class="badge badge-pill badge-warning">รอตรวจสอบ</span>
                                                            <?php elseif ($row_recording["status_admin"] == 2) : ?>
                                                                <span class="badge badge-pill badge-success">ตรวจสอบแล้ว</span>
                                                            <?php elseif ($row_recording["status_admin"] == 3) : ?>
                                                                <span class="badge badge-warning">มีข้อมูลต้องแก้ไข</span>
                                                            <?php elseif ($row_recording["status_admin"] == 4) : ?>
                                                                <span class="badge badge-danger">ยกเลิก</span>
                                                            <?php endif; ?>
                                                        </td>
                                                        <td>
                                                            <a href="./supervision_recording_student.php?id=<?= $row["email"] ?>"><button type="button" class="btn btn-outline-primary"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye-fill" viewBox="0 0 16 16">
                                                                        <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z" />
                                                                        <path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z" />
                                                                    </svg></button></a>
                                                            </svg></button></a>
                                                            <!-- <a href="./supervision_recording_student_edit.php?id=<?= $row["email"] ?>"><button type="button" class="btn btn-outline-warning"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                                                        <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                                                        <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                                                                    </svg></button></a> -->
                                                            <!-- <a href="./?id=<?= $row["email"] ?>"><button type="button"
                                                                        class="btn btn-outline-danger"><svg
                                                                            xmlns="http://www.w3.org/2000/svg"
                                                                            width="16" height="16" fill="currentColor"
                                                                            class="bi bi-trash-fill"
                                                                            viewBox="0 0 16 16">
                                                                            <path
                                                                                d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z" />
                                                                        </svg></button>
                                                                </a> -->
                                                        </td>
                                                    </tr>




                                                </tbody>
                                            </table>

                                        </div>
                                    </div>

                                </div>



                            </form>
                        </div>
                    </div>
                </div>
                <!-- /ประเมิน นศ -->

            </div>
            







        </div>


    </div>

    </div>

    <!-- ส่วนของข้อมูลทั้งหมด -->
    </div>
    <!-- /ส่วนของข้อมูล -->
    </div>
    <!-- /Page Wrapper -->
    </div>
    <!-- /Main Wrapper -->

    <!-- jQuery -->
    <script src="./assets/js/jquery-3.5.1.min.js"></script>

    <!-- Bootstrap Core JS -->
    <script src="./assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>

    <!-- Slimscroll JS ตัวเลื่อนแทบข้างๆ -->
    <script src="./assets/js/jquery.slimscroll.min.js"></script>

    <!-- Custom JS -->
    <script src="./assets/js/app.js"></script>


    <!-- <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
    <script src="./assets/js/tablemember.js"></script> -->
</body>

</html>
<?php

mysqli_close($conn);  //ปิดการเชื่อมต่อข้อมูล
?>