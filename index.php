<?php
include './admin/work/dbwork.php';

$sql = "SELECT * FROM job_recruitment"; //เลือกข้อมูลจากตาราง employee ออกมาแสดง
$result = mysqli_query($conn, $sql); //รันคำสั่งที่ถูกเก็บไว้ในตัวแปร $sql

$count = mysqli_num_rows($result); //เก็บผลที่ได้จากคำสั่ง $result เก็บไว้ในตัวแปร $count
$order = 1; //ให้เริ่มนับแถวจากเลข 1

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

$provinces_thailand =  [
  "กรุงเทพมหานคร", "สมุทรปราการ", "นนทบุรี", "ปทุมธานี", "พระนครศรีอยุธยา",
  "อ่างทอง", "ลพบุรี", "สิงห์บุรี", "ชัยนาท", "สระบุรี", "ชลบุรี", "ระยอง",
  "จันทบุรี", "ตราด", "ฉะเชิงเทรา", "ปราจีนบุรี", "นครนายก", "สระแก้ว", "นครราชสีมา",
  "บุรีรัมย์", "สุรินทร์", "ศรีสะเกษ", "อุบลราชธานี", "ยโสธร", "ชัยภูมิ",
  "อำนาจเจริญ", "บึงกาฬ", "หนองบัวลำภู", "ขอนแก่น", "อุดรธานี", "เลย", "หนองคาย",
  "มหาสารคาม", "ร้อยเอ็ด", "กาฬสินธุ์", "สกลนคร", "นครพนม", "มุกดาหาร", "เชียงใหม่",
  "ลำพูน", "ลำปาง", "อุตรดิตถ์", "แพร่", "น่าน", "พะเยา", "เชียงราย", "แม่ฮ่องสอน",
  "นครสวรรค์", "อุทัยธานี", "กำแพงเพชร", "ตาก", "สุโขทัย", "พิษณุโลก", "พิจิตร",
  "เพชรบูรณ์", "ราชบุรี", "กาญจนบุรี", "สุพรรณบุรี", "นครปฐม", "สมุทรสาคร",
  "สมุทรสงคราม", "เพชรบุรี", "ประจวบคีรีขันธ์", "นครศรีธรรมราช", "กระบี่", "พังงา",
  "ภูเก็ต", "สุราษฎร์ธานี", "ระนอง", "ชุมพร", "สงขลา", "สตูล", "ตรัง", "พัทลุง",
  "ปัตตานี", "ยะลา", "นราธิวาส"
];
$provinces_thailand_html = '';
foreach ($provinces_thailand as $province) {
  $provinces_thailand_html .= '<option value="' . $province . '">' . $province . '</option>' . "\n";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Cwie & internship CP KKU</title>
  <meta content name="description">
  <meta content name="keywords">

  <!-- Favicons -->
  <link href="assets/img/icon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- ฟอน CSS -->

  <!-- <iink rel="stylesheet" href="./internship/assets/css/index.css"> -->

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

  <!-- การ์ด -->
  <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
  <link rel="stylesheet" href="assets/css/owl.theme.default.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/4.5.6/css/ionicons.min.css">
  <link rel="stylesheet" href="assets/css/stylecard.css">

  <!-- Template Main CSS File -->
  <link href="assets/css/styleindex.css" rel="stylesheet">

  <style>
    .box-blogs-blog {
      max-width: 991px;
      margin: auto;
      padding: 20px 0px;
    }

    /* blog item */
    .blog {

      margin-bottom: 20px;
      /* display: flex; */
      background-color: #E0FFFF;
      transition: box-shadow 0.3s ease;
      border-radius: 20px;
      overflow: hidden;
      /* เพื่อให้รูปภาพไม่เกินขอบของบทความ */
      padding: 15px;
      box-shadow: 10px;

    }

    .blog:hover {
      transition: box-shadow 0.3s ease;
      box-shadow: 0px 24px 64px rgba(0, 0, 0, 0.04);
    }

    /*Responsive Blog*/
    @media (max-width: 991px) {
      .box-blogs-blog.-grid {
        display: block;
      }

      .box-blogs-blog.-grid .blog {
        width: 100%;
        display: flex;
      }

      .box-blogs-blog.-grid .blog .blog-image {
        width: 200px;
      }

      .box-blogs-blog.-grid .blog .blog-meta {
        margin-left: 20px;
        margin-top: 0px;
      }
    }

    @media (max-width: 768px) {
      .box-blogs-blog {
        padding: 20px;
      }

      .blog {
        display: block;
      }

      .blog .blog-image {
        width: 100%;
      }

      .blog .blog-image img {
        border-radius: 20px;
      }

      .blog .blog-meta {
        width: 100%;
        margin-left: 0px;
      }

      .box-blogs-blog.-grid .blog {
        display: block;
      }

      .box-blogs-blog.-grid .blog .blog-image {
        width: 100%;
      }

      .box-blogs-blog.-grid .blog .blog-meta {
        margin-left: 0px;
        margin-top: 1rem;
      }
    }
  </style>

</head>

<body>

  <!-- ======= Header ======= -->
  <?php include('nav_index.php'); ?>
  <!-- End Header -->




  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center">

    <div class="container">
      <div class="row">
        <div class="col-lg-6 d-flex flex-column justify-content-center pt-4 pt-lg-0 order-2 order-lg-1" data-aos="fade-up" data-aos-delay="200">
          <h1>CWIE สหกิจศึกษาและฝึกงาน การศึกษาเชิงบูรณาการกับการทำงาน</h1>

          <h2>วิทยาลัยการคอมพิวเตอร์ มหาวิทยาลัยขอนแก่น</h2>
          <div class="d-flex justify-content-center justify-content-lg-start">
          <a href="./cooperative/register_student.php" class="btn-get-started scrollto">สมัครสหกิจศึกษา</a>
            <a href="./internship/register_student.php" class="btn-get-started2 scrollto">สมัครฝึกงาน</a>

          </div>
        </div>
        <div class="col-lg-6 order-1 order-lg-2 hero-img" data-aos="zoom-in" data-aos-delay="200">
          <img src="assets/img/2.png" class="img-fluid animated" alt>
        </div>
      </div>
    </div>

  </section><!-- End Hero -->

  <main id="main">

    <!-- ======= Services Section ======= -->
    <!-- <section id="services" class="services section-bg">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>สำหรับผู้ใช้</h2>
        </div>

        <div class="row">
          <div class="col-xl-3 col-md-6 d-flex align-items-stretch " data-aos="zoom-in" data-aos-delay="100">
            <a type="button" href="./login_student.php">
              <div class="icon-box">
                <div class="icon"><i class="bx bxl-dribbble"></i></div>
                <h4><a href="./login_student.php">นักศึกษา</a></h4>
                <p>สมัครสหกิจศึกษา ฝึกงาน หรือเข้าสู่ระบบ</p>
              </div>
            </a>

          </div>

          <div class="col-xl-3 col-md-6 d-flex align-items-stretch mt-4 mt-md-0" data-aos="zoom-in" data-aos-delay="200">
            <a type="button" href="./company/hr/hr_dashboard.php">
              <div class="icon-box">
                <div class="icon"><i class="bx bx-file"></i></div>
                <h4><a href="./company/hr/hr_dashboard.php">สถานประกอบการ</a></h4>
                <p>ลงทะเบียนหรือ เข้าสู่ระบบสถานประกอบการ</p>
              </div>
            </a>

          </div>

          <div class="col-xl-3 col-md-6 d-flex align-items-stretch mt-4 mt-xl-0" data-aos="zoom-in" data-aos-delay="300">
            <a type="button" href="./teacher/supervision_teacher/supervision_teacher_home.php">
              <div class="icon-box">
                <div class="icon"><i class="bx bx-tachometer"></i></div>
                <h4><a href="./teacher/supervision_teacher/supervision_teacher_home.php">อาจารย์</a></h4>
                <p>ลงะเบียน หรือเข้าสู่ระบบสำหรับอาจารย์</p>
              </div>

            </a>

          </div>

          <div class="col-xl-3 col-md-6 d-flex align-items-stretch mt-4 mt-xl-0" data-aos="zoom-in" data-aos-delay="400">
            <a type="button" href="./admin/addmin.php">
              <div class="icon-box">
                <div class="icon"><i class="bx bx-layer"></i></div>
                <h4><a href="./admin/addmin.php">ผู้ดูแลระบบ</a></h4>
                <p>ลงะเบียน หรือเข้าสู่ระบบสำหรับผู้ดูแลระบบ</p>
              </div>
            </a>

          </div>


        </div>

      </div>
    </section> -->
    <!-- End Services Section -->

    <!-- ======= news Us Section ======= -->
    <section id="news" class="news">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>ข่าวประชาสัมพันธ์</h2>
        </div>

        <div class="cintainer">
          <div class="row">
            <div class="col-md-12">
              <div class="featured-carousel owl-carousel">
                <?php
                $sql = "SELECT * FROM news ORDER BY datesave DESC";
                $result = mysqli_query($conn, $sql);
                while ($row = mysqli_fetch_assoc($result)) {
                  $datesave = $row["datesave"];
                  // แปลงวันที่ให้อยู่ในรูปแบบที่คุณต้องการ
                  $timestamp = strtotime($datesave);
                  $thai_day = date(" j ", $timestamp);
                  $thai_month =  thai_month(date("n", $timestamp));
                  $thai_year = date(" Y", $timestamp);

                  $imageURL = !empty($row["img"]) ? './admin/news/uploads/' . htmlspecialchars($row["img"]) : './assets/img/cpkku.png';
                ?>

                  <div class="item">

                    <div class="blog-entry">
                      <a href="newsdetail.php?id=<?= htmlspecialchars($row["a_id"]) ?>" class="block-20 d-flex align-items-start" style="background-image: url('<?= $imageURL ?>');">

                        <div class="meta-date text-center p-2">
                          <span class="day"></i><?php echo $thai_day; ?></span>
                          <span class="mos"><?php echo $thai_month; ?></span>
                          <span class="yr"><?php echo $thai_year; ?></span>
                        </div>
                      </a>
                      <div class="text border border-top-0 p-4">
                        <h3 class="heading"><a href="./newsdetail.php?id=<?= htmlspecialchars($row["a_id"]) ?>"><?= htmlspecialchars($row["title"]) ?></a></h3>
                        <p><?= strip_tags($row["txtMessage"]) ?></p>


                        <div class="d-flex align-items-center mt-4">
                          <p class="mb-0"><a href="./newsdetail.php?id=<?= $row["a_id"] ?>" class="btn btn-primary">ดูรายละเอียด <span class="ion-ios-arrow-round-forward"></span></a></p>
                          <p class="ml-auto meta2 mb-0">
                            <a href="./newsdetail.php?id=<?= $row["a_id"] ?>" class="mr-2">Admin</a>

                          </p>
                        </div>
                      </div>
                    </div>


                  </div>
                <?php
                }
                ?>

              </div>
            </div>

          </div>

        </div>




    </section>
    </div>
    </section>

    <!-- End news Us Section -->


    <!-- ======= Why Us Section ======= -->
    <section id="" class=" calender">
      <div class="container-fluid" data-aos="fade-up">
        <div class="section-title">
          <h2>ปฏิทินกิจกรรม</h2>

          <div class="container">
            <div class="row mx-0">
              <div class="p-0 col-sm-12 col-md-12 col-lg-12">
                <div class="w-100 h-100">
                  <div class="w-100 h-100">
                    <div class="card">
                      <div class="card-body">
                        <div class="d-flex justify-content-between mb-3">
                          <!-- <div><button type="button" class="btn btn-outline-secondary">วันนี้</button></div> -->

                        </div>


                        <div style="text-align: left;">
                          <?php
                          $records_per_page = 5;
                          if (isset($_GET["page"])) {
                            $page = $_GET["page"];
                          } else {
                            $page = 1;
                          }
                          $start_from = ($page - 1) * $records_per_page;

                          $sql = "SELECT * FROM events ORDER BY start DESC LIMIT $start_from, $records_per_page";
                          $result = mysqli_query($conn, $sql);

                          while ($row = mysqli_fetch_array($result)) {
                            $start_date = $row["start"];
                            $end_date = $row["end"];

                            $start_timestamp = strtotime($start_date);
                            $end_timestamp = strtotime($end_date);
                            $start_thai_date = date(" j ", $start_timestamp) . thai_month(date("n", $start_timestamp)) . date(" Y", $start_timestamp);
                            $end_thai_date = date(" j ", $end_timestamp) . thai_month(date("n", $end_timestamp)) . date(" Y", $end_timestamp);

                            // ดึงค่าสีจากฐานข้อมูล
                            $color = $row["color"];

                            // ตรวจสอบว่ามีการเลือกประเภทหรือไม่
                            if (!empty($color)) {
                              // กำหนดคลาสของแบจจ์ตามค่าสี
                              if ($color == "#0071c5") {
                                $badge_class = "badge bg-primary";
                                $badge_text = "นักศึกษาฝึกงาน";
                              } elseif ($color == "#40E0D0") {
                                $badge_class = "badge bg-info ";
                                $badge_text = "นักศึกษาสหกิจศึกษา";
                              } elseif ($color == "#008000") {
                                $badge_class = "badge badge-pill badge-success";
                                $badge_text = "อาจารย์ที่ปรึกษา";
                              } elseif ($color == "#FFD700") {
                                $badge_class = "badge badge-warning";
                                $badge_text = "อาจารย์ประจำวิชาสหกิจ";
                              } elseif ($color == "#FF8C00") {
                                $badge_class = "badge badge-danger";
                                $badge_text = "อาจารย์นิเทศ";
                              } elseif ($color == "#FF0000") {
                                $badge_class = "badge bg-info ";
                                $badge_text = "สถานประกอบการ";
                              }
                            } else {
                              // ถ้าไม่มีการเลือกประเภท กำหนดให้ไม่มีสี
                              $badge_class = "";
                              $badge_text = "";
                            }
                          ?>
                            <div class="row">
                              <div class="col-12">
                                <div class="mb-1 text-left">
                                  <div class="row">
                                    <div class="context ">
                                      <!-- ใช้ค่าสีที่ดึงมาจากฐานข้อมูลในการกำหนดคลาสของแบจจ์ -->
                                      <?php if (!empty($badge_class)) : ?>
                                        <span class="<?php echo $badge_class; ?>"><?php echo $badge_text; ?></span>
                                      <?php endif; ?>
                                    </div>
                                    <div class="col">
                                      <?php echo $start_thai_date; ?> - <?php echo $end_thai_date; ?>
                                    </div>
                                  </div>
                                  <div>
                                    <a href="./calendardetail.php?id=<?= $row["id"] ?>" class=" text-primary mb-1 ">
                                      <div class="context "><?= $row["title"] ?></div>
                                    </a>
                                  </div>
                                  <hr>
                                </div>
                              </div>
                            </div>
                          <?php
                          }
                          ?>

                          <nav aria-label="...">
                            <ul class="pagination pagination-sm justify-content-center">
                              <?php
                              $total_records = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM events"));
                              $total_pages = ceil($total_records / $records_per_page);
                              for ($i = 1; $i <= $total_pages; $i++) {
                                echo "<li class='page-item'><a class='page-link' href='?page=" . $i . "'>" . $i . "</a></li>";
                              }
                              ?>
                            </ul>
                          </nav>
                        </div>



                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>










        </div>
      </div>
    </section>
    <!-- End Why Us Section -->



    <!-- ======= job Section ======= -->
    <section id="job" class="job">
      <div class="container" data-aos="fade-up">
        <div class="section-title">
          <h2>ประกาศรับบสมัครงาน</h2>
        </div>

        <div class="row">
          <div class="col-md-12">
            <div class="featured-carousel owl-carousel">
              <?php
              $sql = "SELECT * FROM job_recruitment ORDER BY created_at DESC";
              $result = mysqli_query($conn, $sql);
              while ($row = mysqli_fetch_assoc($result)) {
                $created_at = $row["created_at"];
                // แปลงวันที่ให้อยู่ในรูปแบบที่คุณต้องการ
                $timestamp = strtotime($created_at);
                $thai_day = date(" j ", $timestamp);
                $thai_month =  thai_month(date("n", $timestamp));
                $thai_year = date(" Y", $timestamp);

                $imageURL = !empty($row["recruitment_company_image"]) ? './admin/work/uploads/' . htmlspecialchars($row["recruitment_company_image"]) : 'assets/images/image_1.jpg';
              ?>
                <div class="item">

                  <div class="blog-entry">
                    <a href="detailwork.php?id=<?= htmlspecialchars($row["recruitment_id"]) ?>" class="block-20 d-flex align-items-start" style="background-image: url('<?= $imageURL ?>');">

                      <div class="meta-date text-center p-2">
                        <span class="day"></i><?php echo $thai_day; ?></span>
                        <span class="mos"><?php echo $thai_month; ?></span>
                        <span class="yr"><?php echo $thai_year; ?></span>
                      </div>
                    </a>
                    <div class="text border border-top-0 p-4">
                      <h3 class="heading"><a href="detailwork.php?id=<?= $row["recruitment_id"] ?>"><?= $row["recruitment_company_role"] ?></a></h3>
                      <p> <?= $row["recruitment_company_name"] ?></p>

                      <div class="d-flex align-items-center mt-4">
                        <p class="mb-0"><a href="detailwork.php?id=<?= $row["recruitment_id"] ?>" class="btn btn-primary">ดูรายละเอียด <span class="ion-ios-arrow-round-forward"></span></a></p>
                        <p class="ml-auto meta2 mb-0">
                          <a href="#" class="mr-2">Admin</a>

                        </p>
                      </div>
                    </div>
                  </div>


                </div>
              <?php
              }

              ?>

            </div>
          </div>
        </div>
        <!-- End job Section -->

  </main>
  <!-- End #main -->

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

  <script src="assets/js/jquery.min.js"></script>
  <script src="assets/js/popper.js"></script>
  <script src="assets/js/bootstrap.min.js"></script>
  <script src="assets/js/owl.carousel.min.js"></script>
  <script src="assets/js/maing.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>
<?php


mysqli_close($conn);  //ปิดการเชื่อมต่อข้อมูล
?>