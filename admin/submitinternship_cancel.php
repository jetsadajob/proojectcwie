<?php 
session_start();
include './work/dbwork.php';

if (!isset($_SESSION['id'])) {
    header('Location: ./registerr/login.php');
    exit();
}


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
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="addmin.php">Dashboard</a></li>
                            <li class="breadcrumb-item active">แบบฟอร์มฝึกงาน</li>
                            <li class="breadcrumb-item active">นักศึกษาที่ยื่นคำร้องฝึกงาน</li>
                        </ul>
                    </div>

                </div>
            </div>

            <!-- Page Header -->

            <div class="head-title">
                <div class="left">
                    <h6 class="page-title">นักศึกษาที่ยื่นคำร้องฝึกงาน</h6>
                </div>

                
            </div><br>

            <div class="page-header">

                <div>
                <a href="./submitinternship.php"><button type="button" class="btn btn-outline-warning">รอตรวจสอบ</button></a>
                <a href="./submitinternship_success.php"><button type="button" class="btn btn-outline-success">ตรวจสอบแล้ว</button></a>
                <a href="./submitinternship_cancel.php"><button type="button" class="btn btn-outline-danger">ไม่อนุมัติ</button></a>
                </div>
                <br>
                
                <div class="row">
                    <div class="col-sm-12">
                        <table id="example" class="table table-striped" style="width:100%">
                            <thead>
                                <tr>
                                    <th>ชื่อ-นามสกุล</th>
                                    <th>อีเมล</th>
                                    <th>สาขา</th>
                                    <th>วันที่ส่ง</th>
                                    <th>สถานะ</th>
                                    <!-- <th>แก้ไข</th> -->
                                    <th>รายเอียด</th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                   $sql = "SELECT * FROM login_student RIGHT JOIN company_detail ON login_student.email = company_detail.email WHERE login_student.role = 'internship_student'";
                                    $result=mysqli_query($conn,$sql);
                                    while ($row=mysqli_fetch_array($result)){ 
                                    
                                    ?>

                                <tr>
                                    


                                    <td><?= $row["name"]?></td>
                                    <td><?= $row["email"]?></td>
                                    <td><?= $row["major"]?></td>
                                    <td><?= $row["created_at"]?></td>
                                    
                                    <td>
                                        <?php if ($row["status_admin"] == 0): ?>
                                            <span class="badge badge-pill badge-danger">ยังไม่กรอกฟอร์ม</span>
                                        <?php elseif ($row["status_admin"] == 1): ?>
                                            <span class="badge badge-pill badge-warning">รอตรวจสอบ</span>
                                        <?php elseif ($row["status_admin"] == 2): ?>
                                            <span class="badge badge-pill badge-success">ตรวจสอบแล้ว</span>
                                        <?php elseif ($row["status_admin"] == 3): ?>
                                             <span class="badge badge-danger">ยกเลิก</span>
                                        <?php elseif ($row["status_admin"] == 4): ?>
                                        <span style="color: #FF0000;">ยกเลิก</span>
                                        <?php endif; ?>
                                    </td>
                                    <!-- <td><?= $row["comment"]?></td> -->

                                    <!-- <td><a href="./internship_company_detail.php?id=<?=$row["email"]?>"><button type="button" class="btn btn-outline-primary">ดูรายละเอียด</button></a></td> -->

                                    <td><a href="./internship_company_detail.php?id=<?=$row["email"]?>"><button
                                                type="button" class="btn btn-outline-primary"><svg
                                                    xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                    fill="currentColor" class="bi bi-eye-fill" viewBox="0 0 16 16">
                                                    <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z" />
                                                    <path
                                                        d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z" />
                                                </svg></button></a>
                                        </svg></button></a>
                                        <a href="./internship_company_detail_edit.php?id=<?=$row["email"]?>"><button type="button"
                                                class="btn btn-outline-warning"><svg xmlns="http://www.w3.org/2000/svg"
                                                    width="16" height="16" fill="currentColor"
                                                    class="bi bi-pencil-square" viewBox="0 0 16 16">
                                                    <path
                                                        d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                                    <path fill-rule="evenodd"
                                                        d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                                                </svg></button></a>
                                        <a href="./delete_std_in.php?id=<?=$row["email"]?>"><button type="button"
                                                class="btn btn-outline-danger"><svg xmlns="http://www.w3.org/2000/svg"
                                                    width="16" height="16" fill="currentColor" class="bi bi-trash-fill"
                                                    viewBox="0 0 16 16">
                                                    <path
                                                        d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z" />
                                                </svg></button>
                                        </a>

                                    </td>
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