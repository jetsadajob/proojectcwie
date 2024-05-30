<?php

include 'db.php';

?>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <meta name="description" content="Smarthr - Bootstrap Admin Template">
    <meta name="keywords"
        content="admin, estimates, bootstrap, business, corporate, creative, management, minimal, modern, accounts, invoice, html5, responsive, CRM, Projects">
    <meta name="author" content="Dreamguys - Bootstrap Admin Template">
    <meta name="robots" content="noindex, nofollow">
    <title></title>

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
    <link rel="stylesheet" href="./assets/css/work.css">

    <!-- ฟอนต์ CSS -->
    <link rel="stylesheet" href="./assets/css/font.css">

    <!-- Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans&family=Prompt&display=swap" rel="stylesheet">

    <!-- ส่วนของตารางรายชื่อ-->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">

    <!-- Boxicons -->
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>

    <!-- ไอคอน -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

   <!-- Template Main CSS File -->
   <link href="./css/Cooperative1.css" rel="stylesheet">
    <link href="./css/index.css" rel="stylesheet">

       
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

        <!-- ส่วนของข้อมูล -->
        <div class="content container-fluid">

            <!-- Page Header -->
            <div class="head-title">
                <div class="left">
                    <h6 class="page-title">ตรวจสอบใบคำร้องขอเข้าร่วมโครงการสหกิจศึกษา</h6>
                </div>
                <!-- <a href="submitdoccoop_end.php"><button  type="button" class="btn  btn-outline-primary">ปฏิบัติสหกิจเสร็จสิ้น</button></a> -->
                <div class="col-auto float-right ml-auto">
                        <a href="./submit_coop.php"><button type="button"
                                class="btn  btn-outline-warning">รอตรวจสอบ</button></a>
                        <a href="./submitcooperative_succes.php"><button type="button"
                                class="btn btn-outline-success">ตรวจสอบแล้ว</button></a>
                        <a href="./submitcooperative_cancel.php"><button type="button" class="btn btn-outline-danger">ไม่ผ่านเงื่อนไข</button></a>
                    </div><br>
                </div><br><br>
            

            <div class="page-header">
                <div class="row">
                    <div class="col-sm-12">
                        <table id="example" class="table table-striped" style="width:100%">
                            <thead>
                                <tr>
                                    <th>ชื่อ-นามสกุล</th>
                                    <th>สาขาวิชา</th>
                                    <th>อาจารย์ที่ปรึกษา</th>
                                    <th>อีเมล</th>
                                    <th>สถานะ</th>
                                    <th>ดูรายละเอียด</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $sql = "SELECT * FROM login_student WHERE role = 'cooperative_student' ";
                                    $result=mysqli_query($conn,$sql);
                                    while ($row=mysqli_fetch_array($result)){ 
                                    ?>

                                    <tr>
                                        <td><?= $row["name"]?></td>
                                        <td><?= $row["major"]?></td>
                                        <td><?= $row["type"]?></td>
                                        <td><?= $row["email"]?></td>
                                        <td><span class="badge badge-pill badge-warning">รอตรวจสอบ</span></td>
                                       
                                        <td><a href="detilcoop.php?id=<?= urlencode($row["email"]) ?>"><button type="button" class="btn btn-outline-primary">รายละเอียด</button></a></td>
                                    </tr>

                                <?php
                                }
                                mysqli_close($conn);  //ปิดการเชื่อมต่อข้อมูล
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
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
    <script src="assets/js/jquery-3.5.1.min.js"></script>

    <!-- Bootstrap Core JS -->
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>

    <!-- Slimscroll JS ตัวเลื่อนแทบข้างๆ -->
    <script src="assets/js/jquery.slimscroll.min.js"></script>

    <!-- Custom JS -->
    <script src="assets/js/app.js"></script>

    <!-- ตารางรายชื่อ -->
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
    <script src="../assets/js/tablemember.js"></script>

</body>

</html>