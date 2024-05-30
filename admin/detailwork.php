<?php
session_start();
include './work/dbwork.php';

if (!isset($_SESSION['id'])) {
    header('Location: ./registerr/login.php');
    exit();
}


$id = $_GET['id'];
$sql = "SELECT * FROM job_recruitment WHERE recruitment_id='$id' "; //เช็คเงื่อนไขที่ส่งมา
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result); //ส่งไปอสดงผลที่บล๊อค

function thai_month($month)
{
    $thai_months = array(
        1 => "มกราคม",
        2 => "กุมภาพันธ์",
        3 => "มีนาคม",
        4 => "เมษายน",
        5 => "พฤษภาคม",
        6 => "มิถุนายน",
        7 => "กรกฎาคม",
        8 => "สิงหาคม",
        9 => "กันยายน",
        10 => "ตุลาคม",
        11 => "พฤศจิกายน",
        12 => "ธันวาคม"
    );
    return $thai_months[$month];
}


$created_at = $row["created_at"];
// แปลงวันที่
$timestamp = strtotime($created_at);
$thai_date = date(" j ", $timestamp) . thai_month(date("n", $timestamp)) . date("  Y", $timestamp);
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
    <link rel="stylesheet" href="./assets/css/font.css">

    <!-- Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans&family=Prompt&display=swap" rel="stylesheet">

    <!-- Lineawesome CSS -->
    <link rel="stylesheet" href="assets/css/line-awesome.min.css">



    <!-- Main CSS ของส่วนข้อมูล-->
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/addwork.css">
    <link rel="stylesheet" href="assets/css/detailwork.css" <!-- Boxicons -->
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>

    <!-- ไอคอน -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- [if lt IE 9]>
			<script src="assets/js/html5shiv.min.js"></script>
			<script src="assets/js/respond.min.js"></script>
		<![endif] -->
</head>

<body>

    <!--ส่วนของเมนูบลาเเละเเทบข้าง  -->
    <?php include('nav_admin.php'); ?>
    <!--ส่วนของเมนูบลาเเละเเทบข้าง  -->

    <!-- ส่วนของข้อมูลทั้งหมด -->
    <div class="page-wrapper">

        <!-- ส่วนของข้อมูล -->
        <div class="content container-fluid ">
            <div class="page-header">
                <div class="row align-items-center">
                    <div class="col">
                        <!-- <h3 class="page-title">นักศึษาสหกิจ</h3> -->
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="addmin.php">Dashboard</a></li>
                            <li class="breadcrumb-item">สถานประกอบการ</li>
                            <li class="breadcrumb-item active">ลงประกาศรับสมัครงาน</li>
                            <li class="breadcrumb-item active">รายละเอียดประกาศรับสมัคร</li>
                        </ul>
                    </div>

                </div>
            </div>


            <!-- Page Header -->

            <div class="col-md-12">
                <div class="head-title">
                    <div class="left">
                        <h3 class="topic">รายละเอียดประกาศรับสมัคร</h3>
                    </div>
                </div><br>

                <!-- <h4 class="header-title">
                    <i class="fa fa-th-list " aria-hidden="true"></i>&nbsp;รับสมัครงาน
                </h4><br> -->



                <h1 class="form-title">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-buildings" viewBox="0 0 16 16">
                        <path d="M14.763.075A.5.5 0 0 1 15 .5v15a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5V14h-1v1.5a.5.5 0 0 1-.5.5h-9a.5.5 0 0 1-.5-.5V10a.5.5 0 0 1 .342-.474L6 7.64V4.5a.5.5 0 0 1 .276-.447l8-4a.5.5 0 0 1 .487.022ZM6 8.694 1 10.36V15h5V8.694ZM7 15h2v-1.5a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 .5.5V15h2V1.309l-7 3.5V15Z" />
                        <path d="M2 11h1v1H2v-1Zm2 0h1v1H4v-1Zm-2 2h1v1H2v-1Zm2 0h1v1H4v-1Zm4-4h1v1H8V9Zm2 0h1v1h-1V9Zm-2 2h1v1H8v-1Zm2 0h1v1h-1v-1Zm2-2h1v1h-1V9Zm0 2h1v1h-1v-1ZM8 7h1v1H8V7Zm2 0h1v1h-1V7Zm2 0h1v1h-1V7ZM8 5h1v1H8V5Zm2 0h1v1h-1V5Zm2 0h1v1h-1V5Zm0-2h1v1h-1V3Z" />
                    </svg>&nbsp;
                    <?= $row["recruitment_company_role"] ?>, <?= $row["recruitment_company_name"] ?>
                </h1>

                <div class="wrapper-preview-list-1">

                    <strong>ประเภท : </strong> <?= $row["recruitment_type_company"] ?> <br>
                    <strong>ชื่อบริษัท/สถานประกอบการ : </strong> <?= $row["recruitment_company_name"] ?> <br>
                    <strong>ที่ตั้ง : </strong>
                    <?= $row["recruitment_company_address"] ?><?= $row["recruitment_company_subdistrict"] ?><?= $row["recruitment_company_district"] ?>
                    <br>
                    <strong>จังหวัด : </strong> <?= $row["recruitment_company_province"] ?> <br>
                    <strong>รหัสไปรษณีย์ : </strong> <?= $row["recruitment_company_zip"] ?> <br>
                    <strong>โทรศัพท์ : </strong> <?= $row["recruitment_company_phone"] ?> <br>
                    <strong>อีเมล : </strong> <?= $row["recruitment_company_email"] ?> <br>

                    <strong>เกี่ยวกับบริษัท/ร้านค้า: </strong><br>
                    <?= nl2br($row["recruitment_company_detail"]) ?>


                </div>

                <div class="clearfix"></div>


                <p style="margin-top:20px;color:#999;">
                    <i class="fa fa-clock-o" aria-hidden="true"></i> วันที่ลงประกาศ <?php echo $thai_date; ?>
                </p>
                </p>

                <div class="wrapper-preview-list">


                    <div class="row border-bootom">

                        <div class="col-sm-2">
                            <strong>ตำแหน่งงาน :</strong>
                        </div>
                        <div class="col-sm-4"> <?= $row["recruitment_company_role"] ?> </div>
                        <div class="col-sm-2">
                            <strong>รูปแบบงาน :</strong>
                        </div>
                        <div class="col-sm-4"> <?= $row["recruitment_company_form_of_work"] ?> </div>

                    </div>

                    <div class="clearfix"></div>

                    <div class="row border-bootom">

                        <div class="col-sm-2">
                            <strong>ประเภทงาน :</strong>
                        </div>
                        <div class="col-sm-4"><?= $row["recruitment_company_typejob"] ?> </div>
                        <div class="col-sm-2">
                            <strong>อัตราที่รับ :</strong>
                        </div>
                        <div class="col-sm-4"> <?= $row["recruitment_company_amout"] ?> </div>

                    </div>

                    <div class="clearfix"></div>


                    <div class="row border-bootom">

                        <div class="col-sm-2">
                            <strong>เงินเดือน :</strong>
                        </div>
                        <div class="col-sm-4"><?= $row["recruitment_company_salary"] ?> </div>
                        <div class="col-sm-2">
                            <strong>ประสบการณ์ทำงาน :</strong>
                        </div>
                        <div class="col-sm-4"> <?= $row["recruitment_company_experienc"] ?> </div>
                    </div>

                    <div class="clearfix"></div>


                    <div class="row border-bootom">
                        <div class="col-sm-2">
                            <strong>เพศ :</strong>
                        </div>
                        <div class="col-sm-4"><?= $row["recruitment_company_gender"] ?> </div>
                        <div class="col-sm-2">
                            <strong>การศึกษา :</strong>
                        </div>
                        <div class="col-sm-4"> <?= $row["recruitment_company_education"] ?> </div>
                    </div>

                    <div class="clearfix"></div>

                    <div class="row border-bootom">
                        <div class="col-sm-2">
                            <strong>สถานที่ทำงาน :</strong>
                        </div>
                        <div class="col-sm-10"><?= $row["recruitment_company_location"] ?> </div>
                    </div>

                    <div class="clearfix"></div>

                    <div class="row">
                        <div class="col-sm-12">
                            <br>
                            <strong>รายละเอียดงาน / คุณสมบัติอื่นๆ / วิธีการรับสมัคร :</strong>
                        </div>
                        <div class="col-sm-10">
                           
                            <?= nl2br($row["recruitment_company_detailjob"]) ?>

                        
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-sm-12">
                            <br>
                        </div>
                        <div class="col-sm-10">
                            <div><b>ไฟล์แนบ:</b> </div>
                            <div class="kv-attribute"><a href="./work/uploads/<?php echo $row['recruitment_company_file']; ?>" target="_blank" style=" color: #0d6efd;"><?php echo basename($row['recruitment_company_file']); ?></a>


                            </div></a>
                        </div>
                    </div>
                </div>

            </div>

        </div>

        <!-- ส่วนของข้อมูลทั้งหมด -->
    </div>

    <!-- /ส่วนของข้อมูล -->


    <!-- jQuery -->
    <script src="assets/js/jquery-3.5.1.min.js"></script>

    <!-- Bootstrap Core JS -->
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>

    <!-- Slimscroll JS ตัวเลื่อนแทบข้างๆ -->
    <script src="assets/js/jquery.slimscroll.min.js"></script>

    <!-- Custom JS -->
    <script src="assets/js/app.js"></script>
</body>

</html>
<?php

mysqli_close($conn);  //ปิดการเชื่อมต่อข้อมูล
?>