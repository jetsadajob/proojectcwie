<?php
session_start();
include './work/dbwork.php';

if (!isset($_SESSION['id'])) {
    header('Location: ./registerr/login.php');
    exit();
}


$id = $_GET['id'];
$sql = "SELECT * FROM news WHERE a_id='$id' "; //เช็คเงื่อนไขที่ส่งมา
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


$datesave = $row["datesave"];
// แปลงวันที่
$timestamp = strtotime($datesave);
$thai_date = date(" j ", $timestamp) . thai_month(date("n", $timestamp)) . date("  Y", $timestamp);


// // นับจำนวนผู้เข้าชม
// $mysqli = new mysqli("localhost", "root", "", "projectcwie");

// // ตรวจสอบการเชื่อมต่อ
// if ($mysqli->connect_errno) {
//   echo "Failed to connect to MySQL: " . $mysqli->connect_error;
//   exit();
// }

// // ตรวจสอบ ID ที่ส่งมา
// if (isset($_GET['id'])) {
//   $recruitment_id = $_GET['id'];

//   // อัปเดตจำนวนผู้เข้าชม
//   $queryUpdate = "UPDATE news SET views = views + 1 WHERE a_id = '$recruitment_id'";
//   $mysqli->query($queryUpdate);
// }

//ดึงข้อมูลเเละข้อมูลผู้เข้าชมมาแสดง
// if (isset($recruitment_id)) {
//   $querySelect = "SELECT views,title,txtMessage,img,views,file FROM news WHERE a_id = '$recruitment_id'";
//   $result = $mysqli->query($querySelect);

//   if ($result) {
//     $row = $result->fetch_assoc();
//     $views = $row["views"];
//   } else {
//     $views = "0";
//   }
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
    <link rel="shortcut icon" type="image/x-icon" href="./assets/img/profiles/Computing_KKU.svg.png">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="./assets/css/bootstrap.min.css">


    <!-- ฟอน CSS -->
    <link rel="stylesheet" href="./assets/css/font-awesome.min.css">

    <!-- Lineawesome CSS -->
    <link rel="stylesheet" href="./assets/css/line-awesome.min.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans&family=Prompt&display=swap" rel="stylesheet">




    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />







    <!-- Main CSS ของส่วนข้อมูล-->
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/addwork.css">
    <link rel="stylesheet" href="assets/css/detailwork.css">
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



            <div class="py-3 px-0 d-flex align-items-center col-sm-12 col-lg-10">
                <div class="row mx-0 w-100">
                    <div class="px-0 py-2 d-flex justify-content-center align-content-center align-items-center col-sm-12 col-lg-4">
                        <span>เผยแพร่&nbsp;<?php echo $thai_date; ?>&nbsp;|&nbsp;</span>
                        <span class="text-success">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
                                <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8M1.173 8a13 13 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5s3.879 1.168 5.168 2.457A13 13 0 0 1 14.828 8q-.086.13-.195.288c-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5s-3.879-1.168-5.168-2.457A13 13 0 0 1 1.172 8z" />
                                <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5M4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0" />
                            </svg>


                            <?= $row["views"] ?> ครั้ง</span>
                    </div>
                </div>
            </div>


            <div class="text-center py-1 col-12">
                <h2><?= $row["title"] ?></h2>
            </div>

            <div class="py-2 col-12">
                <div class="responsive-text">
                    <?= $row["txtMessage"] ?>
                </div>

                <?php if (!empty($row["file"])) : ?>
                    <h5>เอกสารเพิ่มเติม</h5>
                    <div class="file-link">
                        <a href="./news/uploads/<?= htmlspecialchars($row["file"]) ?>" target="_blank"><?= $row["file"] ?></a>
                    </div>
                <?php endif; ?>

            </div>

            <div class="d-flex justify-content-end col-12">
                <h6><i class="bi bi-person-fill"></i> สหกิจศึกษาและฝึกงาน วิทยาลัยการคอมพิวเตอร์ มหาวิทยาลัยขอนแก่น</h6>
            </div>

            <div class=" d-flex justify-content-end col-12">
                <h6>
                    อัปเดตล่าสุด
                    <span>
                        <?php echo $thai_date; ?>
                    </span>
                </h6>
            </div>

        </div>
    </div>
    <br><br>

    </div>

    <!-- ส่วนของข้อมูล -->

    <!-- <main class="container">

      <div class="col-md-12 mt-4">
        <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
          <div class="col p-4 d-flex flex-column position-static">
            <h4 class="header-title alert-info">
              <i class="fa fa-th-list " aria-hidden="true"></i>&nbsp;ข่าวประชาสัมพันธ์
            </h4>




          </div>
        </div>

      </div>
      </div>
      </div>


    </main> -->

    </main><!-- End #main -->



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