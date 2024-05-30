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
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />


</head>

<body>

    <!--ส่วนของเมนูบลาเเละเเทบข้าง  -->
    <?php include('nav_admin.php'); ?>
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
                            <li class="breadcrumb-item active">สถานประกอบการ</li>
                            <li class="breadcrumb-item active">จัดการสถานประกอบการ</li>
                        </ul>
                    </div>

                </div>
            </div>

            <!-- Page Header -->

            <div class="head-title">
                <div class="left">
                    <h6 class="page-title">รายชื่อสถานประกอบการที่เข้าร่วมโครงการสหกิจศึกษาและฝึกงาน</h6>
                </div>

                <div class="col-auto float-right ml-auto">
                    <a href="./addcompany.php"><button type="button" class="btn btn-outline-primary">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-building-add" viewBox="0 0 16 16">
                                <path d="M12.5 16a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7m.5-5v1h1a.5.5 0 0 1 0 1h-1v1a.5.5 0 0 1-1 0v-1h-1a.5.5 0 0 1 0-1h1v-1a.5.5 0 0 1 1 0" />
                                <path d="M2 1a1 1 0 0 1 1-1h10a1 1 0 0 1 1 1v6.5a.5.5 0 0 1-1 0V1H3v14h3v-2.5a.5.5 0 0 1 .5-.5H8v4H3a1 1 0 0 1-1-1z" />
                                <path d="M4.5 2a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5zm3 0a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5zm3 0a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5zm-6 3a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5zm3 0a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5zm3 0a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5zm-6 3a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5zm3 0a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5z" />
                            </svg>
                            เพิ่มสถานประกอบการ</button></a>
                    <!-- <a href="#"><button type="button" class="btn btn-outline-primary">เข้าร่วมเรียบร้อยเเล้ว</button></a>
                    <a href="#"><button type="button" class="btn btn-outline-primary">ยังไม่ได้เข้าร่วม</button></a> -->
                </div>


            </div><br>

            <div class="page-header">



                <div class="row">
                    <div class="col-sm-12">


                        <table id="example" class="table table-striped" style="width:100%">
                            <thead>
                                <tr>
                                    <th>ชื่อสถานประกอบการ</th>
                                    <th>ชื่อผู้ประสานงาน</th>
                                    <th>email</th>
                                    <th>ที่อยู่</th>
                                    <th>จัดการ</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $sql = "SELECT hr.email,hr.namehr, tbl_company.company, tbl_company.address, tbl_company.zip 
                                FROM hr 
                                JOIN tbl_company ON hr.hr_id = tbl_company.company_id
                                WHERE hr.role = 'hr'";

                                $result = mysqli_query($conn, $sql);
                                while ($row = mysqli_fetch_assoc($result)) {
                                ?>
                                    <tr>
                                        <td><?= $row["company"] ?></td> <!-- ตรวจสอบให้แน่ใจว่าใช้ตัวพิมพ์เล็กในชื่อคอลัมน์ -->
                                        <td><?= $row["namehr"] ?></td> <!-- ตรวจสอบให้แน่ใจว่าใช้ตัวพิมพ์เล็กในชื่อคอลัมน์ -->
                                        <td><?= $row["email"] ?></td> <!-- ตรวจสอบให้แน่ใจว่าใช้ตัวพิมพ์เล็กในชื่อคอลัมน์ -->
                                        <td><?= $row["address"] ?> , <?= $row["zip"] ?></td> <!-- ตรวจสอบให้แน่ใจว่าใช้ตัวพิมพ์เล็กในชื่อคอลัมน์ -->
                                        <td><a href="./listcompany_detail.php?id=<?= $row["email"] ?>"><button type="button" class="btn btn-outline-primary">ดูรายละเอียด</button></a></td>
                                    </tr>
                                <?php
                                }
                                mysqli_close($conn);  //ปิดการเชื่อมต่อข้อมูล
                                ?>

                                <!-- <tr>
                                    <td>CP ALL จำกัด</td>
                                    <td>สุนิสา จันมาศ</td>
                                    <td>sunisa@gmail.com</td>
                                    <td>3</td>
                                    <td><a href="detailadvisor.php"><button type="button" class="btn btn-outline-primary">ดูรายละเอียด</button></a></td>
                                </tr> -->

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

  

    <!-- jQuery -->
    <script src="assets/js/jquery-3.5.1.min.js"></script>

    <!-- Bootstrap Core JS -->
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>

    <!-- bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

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