<?php 
session_start();
include './work/dbwork.php';

if (!isset($_SESSION['id'])) {
    header('Location: ./registerr/login.php');
    exit();
}



 $sql = "SELECT * FROM petition_document 
 RIGHT JOIN login_student ON petition_document.email = login_student.email 
WHERE login_student.role = 'cooperative_student' ";
 $result = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result);
?>



<!DOCTYPE html>
    <html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <meta name="description" content="Smarthr - Bootstrap Admin Template">
    <meta name="keywords"
        content="admin, estimates, bootstrap, business, corporate, creative, management, minimal, modern, accounts, invoice, html5, responsive, CRM, Projects">
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

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- [if lt IE 9]>
			<script src="assets/js/html5shiv.min.js"></script>
			<script src="assets/js/respond.min.js"></script>
		<![endif] -->
</head>

<body>

    <!--ส่วนของเมนูบลาเเละเเทบข้าง  -->
    <?php include('nav_admin.php') ;?>
    <!--ส่วนของเมนูบลาเเละเเทบข้าง  -->

    <!-- ส่วนของข้อมูลทั้งหมด -->
    <div class="page-wrapper">
        
        <!-- ส่วนของข้อมูล -->
        <div class="content container-fluid">
            <div class="page-header">
                <div class="row align-items-center">
                    <div class="col">
                        <!-- <h3 class="page-title">นักศึษาสหกิจ</h3> -->
                        <ul class="breadcrumb mt-5">
                             <li class="breadcrumb-item"><a href="addmin.php">Dashboard</a></li>
                            <li class="breadcrumb-item active">แบบฟอร์มสหกิจศึกษา</li>
                            <li class="breadcrumb-item active">นักศึกษาที่ยื่นคำร้องสหกิจศึกษา</li>
                            <li class="breadcrumb-item active">ตรวจสอบแล้ว</li>
                        </ul>
                    </div>

                </div>
            </div>

            <!-- Page Header -->

            <div class="head-title">
                <div class="left">
                    <h6 class="page-title">นักศึกษาที่ยื่นคำร้องสหกิจศึกษา</h6>
                </div>

                <div class="col-auto float-right ml-auto">
                <a href="./submitcooperative.php"><button type="button" class="btn btn-outline-primary">รอตรวจสอบ</button></a>
                <a href="./submitcooperative_succes.php"><button  type="button" class="btn btn-outline-primary">ตรวจสอบแล้ว</button></a>
                <!-- <a href="./submitcooperative_cancel.php"><button type="button" class="btn btn-outline-primary">ไม่อนุมัติ</button></a> -->
                                </div>
            </div><br>

            <div class="page-header">
                
                

                <div class="row">
                    <div class="col-sm-12">
                        <table id="example" class="table table-striped" style="width:100%">
                            <thead>
                                <tr>
                                <th>ชื่อ-นามสกุล</th>
                                    <th>สาขา</th>
                                    <th>email</th>
                                    <th>สถานะ</th>
                                    <th>จัดการ</th>

                                </tr>
                            </thead>
                            <tbody>
                            <?php
                            $sql = "SELECT ls.*, cd.status_admin AS cd_status, ca.status_admin AS ca_status, cp.status_admin AS cp_status, ce.status_admin AS ce_status
                               FROM login_student ls
                               LEFT JOIN petition_document cd ON ls.email = cd.email
                               LEFT JOIN coop_application_form ca ON ls.email = ca.email
                               LEFT JOIN coopperative_perental_consent_form cp ON ls.email = cp.email
                               LEFT JOIN coopperative_education_report_form ce ON ls.email = ce.email
                               WHERE ls.role = 'cooperative_student' AND ls.status_end = 1  ";
                       
                                $result = mysqli_query($conn, $sql);

                                while ($row = mysqli_fetch_array($result)) {
                                    // ตรวจสอบสถานะในแต่ละตาราง
                                    $show_row = ($row['cd_status'] == 2) || ($row['ca_status'] == 2) || ($row['cp_status'] == 2) || ($row['ce_status'] == 2);

                                    if ($show_row) {
                                        ?>

                                        <tr>
                                            <td><?= htmlspecialchars($row["std_fname"], ENT_QUOTES, 'UTF-8') ?><?= htmlspecialchars($row["std_lname"], ENT_QUOTES, 'UTF-8') ?></td>
                                            <td><?= htmlspecialchars($row["major"], ENT_QUOTES, 'UTF-8') ?></td>
                                            <td><?= htmlspecialchars($row["email"], ENT_QUOTES, 'UTF-8') ?></td>

                                            <td>
                                                <span class="badge badge-pill badge-success">ตรวจสอบเเล้ว</span>
                                            </td>
                                            <td><a href="detilcoop_success1.php?id=<?= urlencode($row["email"]) ?>"><button type="button" class="btn btn-outline-primary">รายละเอียด</button></a></td>
                                        </tr>
                                        <?php
                                    }
                                }
                                mysqli_close($conn); // ปิดการเชื่อมต่อข้อมูล
                                ?>




                            </tbody>
                        </table>


                    </div>
                </div>
            </div>


            <!-- <div class="box-carblogs-blog">
                    <div class="blog">
                        <div class="blog-image">
                            <a href="#"><img src="./assets/img/img1.svg" alt=""></a>
                        </div>
                        <div class="blog-meta">
                            <div class="blog-top">
                                <a href="#" class="cat">programmer</a>
                                <span class="date"><i class="bx bxs-time"></i>1 มกราคม 2566</span>
                            </div>
                            <h3 class="blog-title"><a href="#">นักศึกษาสหกิจศึกษา และผู้สำเร็จการศึกษา</a></h3>

                            <div class="blog-desc">
                                <i class='bx bxs-school'></i>
                                <span class="detail">บริษัท ซีพีออลล์ จำกัด (มหาชน)</span>
                            </div>
                            <div class="blog-desc">
                                <i class='bx bxs-map'></i>
                                <span class="detail">313 อาคาร ซี.พี. ทาวเวอร์ ชั้น 24 ถ.สีลม แขวงสีลม เขตบางรัก
                                    กรุงเทพฯ
                                    10500</span>
                            </div>
                            <div class="blog-bottom">
                                <div class="user">
                                    <div class="avatars">
                                        <a href="#" class="edit"><i class="bx bxs-pencil"></i></a>
                                        <a href="#" class="delete"><i class="bx bxs-trash"></i></a>
                                        
                                    </div>
                                </div>
                                <a href="#" class="readmore">
                                    Read more →
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="blog">
                        <div class="blog-image">
                            <a href="#"><img src="./assets/img/img2.svg" alt=""></a>
                        </div>
                        <div class="blog-meta">
                            <div class="blog-top">
                                <a href="#" class="cat">PRODUCTIVITY</a>
                                <span class="date"><i class="bx bxs-time"></i>30 มกราคม 2566</span>
                            </div>
                            <h3 class="blog-title"><a href="#">นักศึกษาฝึกงาน</a></h3>
                            <div class="blog-desc">
                                <i class='bx bxs-school'></i>
                                <span class="detail">บริษัท ปตท. จำกัด (มหาชน)</span>
                            </div>
                            <div class="blog-desc">
                                <i class='bx bxs-map'></i>
                                <span class="detail">555 ถนนวิภาวดีรังสิต แขวงจตุจักร เขตจตุจักร กรุงเทพมหานคร
                                    10900</span>
                            </div>
                            <div class="blog-bottom">
                                <div class="user">
                                    <div class="avatars">
                                        <a href="#" class="edit"><i class="bx bxs-pencil"></i></a>
                                        <a href="#" class="delete"><i class="bx bxs-trash"></i></a>
                                        <
                                    </div>
                                </div>
                                <a href="#" class="readmore">
                                    Read more →
                                </a>
                            </div>
                        </div>
                    </div> -->


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
    <script src="./assets/js/tablemember.js"></script>

</body>

</html>