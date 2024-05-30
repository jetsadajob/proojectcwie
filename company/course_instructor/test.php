<?php

include 'db.php';

?>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <meta name="description" content="Smarthr - Bootstrap Admin Template">
    <meta name="keywords" content="admin, estimates, bootstrap, business, corporate, creative, management, minimal, modern, accounts, invoice, html5, responsive, CRM, Projects">
    <meta name="author" content="Dreamguys - Bootstrap Admin Template">
    <meta name="robots" content="noindex, nofollow">
    <title></title>

    <!-- รูปโปรไฟล์ -->
    <link rel="shortcut icon" type="image/x-icon" href="../assets/img/profiles/Computing_KKU.svg.png">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">


    <!-- ฟอน CSS -->
    <link rel="stylesheet" href="../assets/css/font-awesome.min.css">

    <!-- Lineawesome CSS -->
    <link rel="stylesheet" href="../assets/css/line-awesome.min.css">

    <!-- แชท CSS -->
    <!-- <link rel="stylesheet" href="../assets/plugins/morris/morris.css"> -->

    <!-- Main CSS ของส่วนข้อมูล-->
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="../assets/css/addwork.css">
    <link rel="stylesheet" href="../assets/css/listastu.css">

    <!-- ส่วนของตารางรายชื่อ-->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">


    <!-- ฟอนต์ CSS -->
    <link rel="stylesheet" href="../assets/css/font.css">

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
<div class="main-wrapper">

        <?php include('./navbar_menu_hr.php');?>
        <!-- ส่วนของข้อมูลทั้งหมด -->
        <div class="page-wrapper">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">หน้าหลัก</a></li>
                    <li class="breadcrumb-item active">จัดการแบบตอบรับนักศึกษา</li>
                    <li class="breadcrumb-item active" aria-current="page">รายละเอียด</li>

                </ol>
            </nav>
        <!-- ส่วนของข้อมูล -->
        <div class="content container-fluid">
            <!-- Page Header -->
            <div class="page-header">
                <div class="row">
                    <div class="col-sm-12">
                        <h6 class="page-title">รายละเอียด</h6>
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
                                        <a href="#"><img alt="" src="../assets/img/user.jpg"></a>
                                    </div>
                                </div>


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
                            <!-- <li class="nav-item"><a href="#file" data-toggle="tab" class="nav-link active">เอกสาร</a>
                            </li> -->
                            <!-- <li class="nav-item"><a href="#advisor" data-toggle="tab" class="nav-link">อาจารย์ที่ปรึกษา</a>
                            </li> -->
                            <li class="nav-item"><a href="#company" data-toggle="tab" class="nav-link">สถานประกอบการ</a></li>
                            <li class="nav-item"><a href="#bank_statutory" data-toggle="tab"
                                    class="nav-link">ประเมินนักศึกษา</a></li>


                        </ul>
                    </div>
                </div>
            </div>

            <div class="tab-content">

                <!--  Info Tab -->
                <!-- <div id="file" class="pro-overview tab-pane fade show active">
                    <div class="row">
                        <div class="col-md-12 ">
                            <div class="card profile-box flex-fill">
                                <div class="card-body">
                                    
                        </div>
                    </div>

                </div> -->




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

                                            // เรียกข้อมูลจากตาราง petition_document
                                            $sql_petition = "SELECT * FROM petition_document WHERE email ='$id' ";
                                            $result_petition = mysqli_query($conn, $sql_petition);
                                            $row_petition = mysqli_fetch_array($result_petition);



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
                                                        <td>KKUCP-T005_แบบประเมินผลการปฏิบัติงานของนักศึกษาสหกิจศึกษา</td>
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
                                                            <a href="./performance_appraisal_form.php?id=<?= $row["email"] ?>"><button type="button" class="btn btn-outline-primary"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye-fill" viewBox="0 0 16 16">
                                                                        <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z" />
                                                                        <path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z" />
                                                                    </svg></button></a>
                                                            </svg></button></a>
                                                            <a href="./cooperative_petition_detil_edit.php?id=<?= $row["email"] ?>"><button type="button" class="btn btn-outline-warning"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                                                        <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                                                        <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                                                                    </svg></button></a>
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
                                                        <td>KKUCP-T006_แบบประเมินผลรายงานสหกิจศึกษา</td>
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
                                                            <a href="./cooperative_petition_detil.php?id=<?= $row["email"] ?>"><button type="button" class="btn btn-outline-primary"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye-fill" viewBox="0 0 16 16">
                                                                        <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z" />
                                                                        <path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z" />
                                                                    </svg></button></a>
                                                            </svg></button></a>
                                                            <a href="./cooperative_petition_detil_edit.php?id=<?= $row["email"] ?>"><button type="button" class="btn btn-outline-warning"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                                                        <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                                                        <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                                                                    </svg></button></a>
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
                <!-- /สถานประกอบการ -->

                <!-- ประเมิน นศ -->
                <div class="tab-pane fade" id="bank_statutory">
                    <div class="card">
                        <div class="card-body">
                            <h3 class="card-title">ประเมินนักศึกษา</h3>
                            <form>



                            </form>
                        </div>
                    </div>
                </div>
                <!-- /ประเมิน นศ -->

            </div>
            <form action="./detilcoop_update.php" method="post">
                <div class="button text-right ">
                    <!-- แก้ไขลิงก์เป็นปุ่ม submit -->
                    <input type="hidden" name="email" value="<?= $row["email"] ?>">
                    <button type="submit" id="submit" class="btn btn-success" name="status_admin" value="1">ยืนยันการตรวจสอบ</button>
                    <button type="button" class="btn btn-danger">ยกเลิก</button>
                </div>
            </form>








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
    <script src="assets/js/jquery-3.5.1.min.js"></script>

    <!-- Bootstrap Core JS -->
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>

    <!-- Slimscroll JS ตัวเลื่อนแทบข้างๆ -->
    <script src="assets/js/jquery.slimscroll.min.js"></script>

    <!-- Custom JS -->
    <script src="assets/js/app.js"></script>


    <!-- <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
    <script src="./assets/js/tablemember.js"></script> -->
</body>

</html>
<?php

mysqli_close($conn);  //ปิดการเชื่อมต่อข้อมูล
?>