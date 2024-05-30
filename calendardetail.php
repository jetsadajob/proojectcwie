<?php
include "./admin/work/dbwork.php";
$id = $_GET['id'];
$sql = "SELECT * FROM events WHERE id='$id' "; //เช็คเงื่อนไขที่ส่งมา
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

$start_date = $row["start"];
$end_date = $row["end"];

// แปลงวันที่ให้อยู่ในรูปแบบที่ต้องการ
$start_timestamp = strtotime($start_date);
$end_timestamp = strtotime($end_date);
$start_thai_date = date(" j ", $start_timestamp) . thai_month(date("n", $start_timestamp)) . date(" Y", $start_timestamp);
$end_thai_date = date(" j ", $end_timestamp) . thai_month(date("n", $end_timestamp)) . date(" Y", $end_timestamp);


// นับจำนวนผู้เข้าชม
$mysqli = new mysqli("localhost", "root", "", "projectcwie");

// ตรวจสอบการเชื่อมต่อ
if ($mysqli->connect_errno) {
  echo "Failed to connect to MySQL: " . $mysqli->connect_error;
  exit();
}

// ตรวจสอบ ID ที่ส่งมา
if (isset($_GET['id'])) {
  $recruitment_id = $_GET['id'];

  // อัปเดตจำนวนผู้เข้าชม
  $queryUpdate = "UPDATE news SET views = views + 1 WHERE a_id = '$recruitment_id'";
  $mysqli->query($queryUpdate);
}

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
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>ปฎิทิน</title>
  <meta content name="description">
  <meta content name="keywords">

  <!-- Favicons -->
  <link href="assets/img/icon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Font -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans&family=Prompt&display=swap" rel="stylesheet">


  <!-- Vendor CSS Files -->
  <!-- <link href="assets/vendor/aos/aos.css" rel="stylesheet">  -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/styleindex.css" rel="stylesheet">




</head>

<body>
  <!-- ======= Header ======= -->
  <?php include('nav_all.php'); ?>
  <!-- End Header -->

  <main id="main">
    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
      <div class="container">

        <ol>
          <li><a href="index.html">หน้าเเรก</a></li>
          <li>ปฏิทิน</li>
        </ol>
        <h2>ปฏิทิน</h2>

      </div>
    </section>
    <!-- End Breadcrumbs -->

    <!-- ส่วนของข้อมูล -->

    <div class="informationnews">





      <div class="container">
        <div class="row">


          <div class="py-3 px-0 d-flex align-items-center col-sm-12 col-lg-10">
            <div class="row mx-0 w-100">
              <div class="px-0 py-2 d-flex justify-content-center align-content-center align-items-center col-sm-12 col-lg-5">
                <span>วันที่เริ่ม&nbsp;<?php echo $start_thai_date; ?> วันที่สิ้นสุด <?php echo $end_thai_date; ?>&nbsp;&nbsp;</span>
                <!-- <span class="text-success"><i class="bi bi-eye"></i>&nbsp; <?= $views ?>&nbsp;ครั้ง</span> -->
              </div>
            </div>
          </div>


          <div class="text-center py-1 col-12">
            <h2><?= $row["title"] ?></h2>
          </div>

          <div class="py-2 col-12">
            <div class="responsive-text">
              <?= $row["doc"] ?>
            </div>

          

          </div>

          <div class="d-flex justify-content-end col-12">
            <h6><i class="bi bi-person-fill"></i> สหกิจศึกษาและฝึกงาน วิทยาลัยการคอมพิวเตอร์ มหาวิทยาลัยขอนแก่น</h6>
          </div>

          <div class=" d-flex justify-content-end col-12">
            <h6>
              <span>
              <?php echo $start_thai_date; ?> - <?php echo $end_thai_date; ?>
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

  <!-- ======= Footer ======= -->
  <?php include('footer.php'); ?>
  <!-- End Footer -->

  <div id="preloader"></div>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/waypoints/noframework.waypoints.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>




</body>

</html>