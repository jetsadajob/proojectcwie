<?php

include 'db.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ใบคำร้องขอเข้าร่วมโครงการสหกิจศึกษา</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <meta name="description" content="Smarthr - Bootstrap Admin Template">
    <meta name="keywords"
        content="admin, estimates, bootstrap, business, corporate, creative, management, minimal, modern, accounts, invoice, html5, responsive, CRM, Projects">
    <meta name="author" content="Dreamguys - Bootstrap Admin Template">
    <meta name="robots" content="noindex, nofollow">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">

    <!-- CSS -->
    <link rel="stylesheet" href="./assets/css/index.css">

    <!-- Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans&family=Prompt&display=swap" rel="stylesheet">
    <title>ใบคำร้องขอเข้าร่วมโครงการสหกิจศึกษา</title>

    <!-- รูปโปรไฟล์ -->
    <link rel="shortcut icon" type="image/x-icon" href="..assets/img/icon.png">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="./assets/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">


    <!-- ฟอนต์ CSS -->
    <!-- <link rel="stylesheet" href="../assets/css/font-awesome.min.css"> -->

    <!-- Lineawesome CSS -->
    <link rel="stylesheet" href="./assets/css/line-awesome.min.css">

    <!-- กราฟ CSS -->
    <!-- <link rel="stylesheet" href="../assets/plugins/morris/morris.css"> -->

    <!-- Main CSS ของส่วนข้อมูล-->
    <link rel="stylesheet" href="../internship/assets/css/style.css">
    <link rel="stylesheet" href="../internship/assets/cssร/dashboard.css">
    <link rel="stylesheet" href="../internship/assets/css/cooperative.css">

    <!-- ส่วนของตารางรายชื่อ-->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">


</head>

<body>
<div class="main-wrapper">

<?php
include('./navbar_menu_instructor.php');
?>

<!-- ส่วนของข้อมูลทั้งหมด -->
<div class="page-wrapper">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">หน้าหลัก</a></li>
            <li class="breadcrumb-item active" aria-current="page">ตรวจสอบใบคำร้องขอเข้าร่วมโครงการสหกิจศึกษา</li>
        </ol>
    </nav>
    <!-- ส่วนของข้อมูล -->

    <div class="content container-fluid">
         <!-- Page Header -->

         <div class="head-title">
                    <div class="left">
                        <h6 class="page-title">ตรวจสอบใบคำร้องขอเข้าร่วมโครงการสหกิจศึกษา</h6>
                    </div>
                    <div class="col-auto float-right ml-auto">
                        <a href="./submitcooperative.php"><button type="button"
                                class="btn  btn-outline-warning">รอตรวจสอบ</button></a>
                        <a href="./submitcooperative_succes.php"><button type="button"
                                class="btn btn-outline-primary">ตรวจสอบแล้ว</button></a>
                        <a href="./submitcooperative_cancel.php"><button type="button" class="btn btn-outline-danger">ไม่ผ่านเงื่อนไข</button></a>
                    </div>
                </div><br><br>
        
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="nameform">
                        <div class="page-header">
                            <div class="row">
                            </div>
                        </div>

                        <div class="table-responsive">
                        <table id="example" class="table table-striped" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>ลำดับ</th>
                                        <th width="20%">ชื่อ-นามสกุล</th>
                                        <th width="20%">สาขาวิชา</th>
                                        <th width="20%">อาจารย์ที่ปรึกษา</th>
                                        <th width="20%">สถานะ</th>
                                        <th>รายละเอียด</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>นิภาภัทร นระทัด</td>
                                        <td>เทคโนโลยีสารสนเทศ</td>
                                        <td>ผศ.ดร.สุมณฑา เกษมวิลาศ</td>
                                        <td>
                                            <span class="badge badge-pill badge-warning">รอตรวจสอบ</span>
                                         
                                        </td>
                                        <td><a href="detail_coop.php"><button type="button"
                                            class="btn btn-outline-primary">ตรวจสอบใบคำร้อง</button></a></td>
                                        <!-- <td><a href="./student_detail.php"><button type="button"
                                                    class="btn btn-outline-primary">ทำแบบประเมิน</button></a>
                                        </td> -->
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>รัตนธิดา นันทบัน</td>
                                        <td>ภูมิสารสนเทศศาสตร์</td>
                                        <td>ผศ.ดร.มัลลิกา วัฒนะ</td>
                                        <td>
                                        <span class="badge badge-pill badge-danger">ไม่ผ่านเงื่อนไข</span>

                                        </td>
                                        <!-- <td><a href="./internship_detail.php"><button type="button" class="btn btn-outline-primary">ทำแบบประเมิน</button></a></td> -->
                                        <td><a href="#"><button type="button"
                                            class="btn btn-outline-primary">ตรวจสอบใบคำร้อง</button></a></td>

                                    </tr>
                                    <tr>
                                        <td>3</td>
                                        <td>เจษฎา เสงี่ยมสูงเนิน</td>
                                        <td>วิทยาการคอมพิวเตอร์</td>
                                        <td>ผศ.ดร.งามนิจ อาจอินทร์</td>
                                        <td>
                                        <span class="badge badge-pill badge-success">ตรวจสอบแล้ว</span>

                                        </td>
                                        <td><a href="#"><button type="button"
                                            class="btn btn-outline-primary">ตรวจสอบใบคำร้อง</button></a></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <br>
                    </div>
                </div>
            </div>
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
<script src="assets/js/jquery-3.5.1.min.js"></script>

<!-- Bootstrap Core JS -->
<script src="assets/js/popper.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>

<!-- Slimscroll JS ตัวเลื่อนแทบข้างๆ -->
<script src="assets/js/jquery.slimscroll.min.js"></script>

<!-- Chart JS ส่วนของกราฟ-->
<script src="assets/plugins/morris/morris.min.js"></script>
<script src="assets/plugins/raphael/raphael.min.js"></script>
<script src="assets/js/chart.js"></script>

<!-- Custom JS -->
<script src="assets/js/app.js"></script>

    <!-- ตารางรายชื่อ -->
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
    <script src="../assets/js/tablemember.js"></script>

</body>

</html>              