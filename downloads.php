<?php
include './admin/db.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>ดาวน์โหลด</title>
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
<header id="header" class="fixed-top header-inner-pages">
      <div class="container d-flex align-items-center">

        <a href="index.php" class="logo me-auto"><img
            src="assets/img/CPW.png" alt class="img-fluid"></a>

        <nav id="navbar" class="navbar">
          <ul>
            <li><a class="nav-link " href="./index.php">หน้าเเรก</a></li>
            <!-- <li><a class="nav-link scrollto active" href="./cwieindex.php">สหกิจศึกษา</a> -->

            <li class="dropdown"><a href="#"><span>สหกิจศึกษา</span>
                <i class="bi bi-chevron-down"></i></a>
              <ul>
                <li><a
                    href="./cwieindex.php">บทบาทหน้าที่ของนักศึกษาสหกิจศึกษา</a></li>
                <li><a href="./liststudent_coop.php">รายชื่อนักศึกษาที่ออกสหกิจ</a></li>
                
              </ul>
            </li>

            <li class="dropdown"><a href="#"><span>ฝึกงาน</span> <i
                  class="bi bi-chevron-down"></i></a>
              <ul>
                <li><a href="./internship.php">บทบาทหน้าที่ของนักศึกษาฝึกงาน</a></li>
                
                <li><a href="./practice_internship.php">ข้อปฏิบัติในการยื่นฝึกงาน</a></li>
              </ul>
            </li>

            <li ><a  href="./teacher.php"><span>อาจารย์</span> </i></a>
             
            </li>

            <li ><a href="./company.php"><span>สถานประกอบการ</span> </a></li>

           

            <li ><a class="nav-link scrollto active" href="downloads.php"><span>ดาวน์โหลด</span></i></a></li>

            <li><a class="nav-link scrollto" href="./searchjob.php">ค้นหางาน</a></li>

            <li><a class="nav-link scrollto "
                href="./contace.php">ติดต่อ</a></li>
          

            <li class="dropdown  scrollto"><a href="#"><span>เข้าสู่ระบบ</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li><a href="./cooperative/login_student.php">นักศึกษา</a></li>
              <li><a href="./company/hr/hr_dashboard.php">อาจารย์</a></li>
              <li><a href="./teacher/supervision_teacher/supervision_teacher_home.php">สถานประกอบการ</a></li>
              <li><a href="./admin/addmin.php">ผู้ดูแลระบบ</a></li>
              <!-- <li><a href="./admin/addmin.php">ผู้ดูแลระบบ</a></li> -->
            </ul>
          </li>
          </ul>
          <i class="bi bi-list mobile-nav-toggle"></i>
        </nav><!-- .navbar -->

      </div>
    </header>
    <!-- End Header -->


  <main id="main">
    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
      <div class="container">

        <ol>
          <li><a href="index.php">หน้าเเรก</a></li>
          <li>ดาวน์โหลด</li>
        </ol>
        <h2>ดาวน์โหลด</h2>

      </div>
    </section><!-- End Breadcrumbs -->

    <!-- ======= Cta Section ======= -->
    <section id="ct3" class="ct3">
      <div class="container" data-aos="zoom-in">

        <h2 class="text-center">ดาวน์โหลดเอกสาร</h2>

      </div>
    </section>

    <!-- ======= Why Us Section ======= -->
    <section id="why-us" class="why-us section-bgg">
      <div class="container-fluid" data-aos="fade-up">

        <div class="row">

          <div class="col-xl-6 col-lg-12">
            <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
              <div class="col p-4 d-flex flex-column position-static">
                <h6 class="pb-1 border-bottom"><i class="bi bi-book"></i> นักศึกษาฝึกงาน</h6>
                <div class="row ">

                  <div class="col-sm-12 p-1 ">
                    <?php
                    // คิวรี่ข้อมูลมาแสดงในตาราง
                    require_once './admin/connect.php';
                    $stmt = $conn->prepare("SELECT* FROM tbl_pdf_internship");
                    $stmt->execute();
                    $result = $stmt->fetchAll();
                    foreach ($result as $row) {
                    ?>


                      <div class="col-sm-12 p-1">
                        <div class="name-content col-md-12 pl-1 pr-1 mb-1">
                          <div class="kv-attribute"><i class="bi bi-filetype-doc"></i><a href="admin/downloadsdocs/docinternship/<?php echo $row['doc_file']; ?>" target="_blank" style=" color: #0d6efd;"><?php echo basename($row['doc_file']); ?></a>
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

          </div>

          <div class="col-xl-6 col-lg-12">


            <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
              <div class="col p-4 d-flex flex-column position-static">
                <h6 class="pb-1 border-bottom"><i class="bi bi-book"></i> นักศึกษาสหกิจศึกษา</h6>

                <div class="row ">
                  <div class="col-sm-12 p-1 ">
                    <?php
                    // คิวรี่ข้อมูลมาแสดงในตาราง
                    require_once './admin/connect.php';
                    $stmt = $conn->prepare("SELECT* FROM tbl_pdf_coop");
                    $stmt->execute();
                    $result = $stmt->fetchAll();
                    foreach ($result as $row) {
                    ?>


                      <div class="col-sm-12 p-1">

                        <div class="name-content col-md-12 pl-1 pr-1 mb-1">
                          <div class="kv-attribute"><i class="bi bi-filetype-doc"></i><a href="admin/downloadsdocs/docscoop/<?php echo $row['doc_file']; ?>" target="_blank" style=" color: #0d6efd;"><?php echo basename($row['doc_file']); ?></a>
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

          </div>


          <div class="col-xl-6 col-lg-12">
            <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
              <div class="col p-4 d-flex flex-column position-static">
                <h6 class="pb-1 border-bottom"><i class="bi bi-book"></i> อาจารย์</h6>
                <div class="row ">

                  <div class="col-sm-12 p-1 ">
                    <?php
                    // คิวรี่ข้อมูลมาแสดงในตาราง
                    require_once './admin/connect.php';
                    $stmt = $conn->prepare("SELECT* FROM tbl_pdf_teacher");
                    $stmt->execute();
                    $result = $stmt->fetchAll();
                    foreach ($result as $row) {
                    ?>


                      <div class="col-sm-12 p-1">
                        <div class="name-content col-md-12 pl-1 pr-1 mb-1">
                          <div class="kv-attribute"><i class="bi bi-filetype-doc"></i><a href="admin/downloadsdocs/docsteacher/<?php echo $row['doc_file']; ?>" target="_blank" style=" color: #0d6efd;"><?php echo basename($row['doc_file']); ?></a>
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

          </div>

          <div class="col-xl-6 col-lg-12">
            <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
              <div class="col p-4 d-flex flex-column position-static">
                <h6 class="pb-1 border-bottom"><i class="bi bi-book"></i> สถานประกอบการ</h6>
                <div class="row ">

                  <div class="col-sm-12 p-1 ">
                    <?php
                    // คิวรี่ข้อมูลมาแสดงในตาราง
                    require_once './admin/connect.php';
                    $stmt = $conn->prepare("SELECT* FROM tbl_pdf_company");
                    $stmt->execute();
                    $result = $stmt->fetchAll();
                    foreach ($result as $row) {
                    ?>


                      <div class="col-sm-12 p-1">
                        <div class="name-content col-md-12 pl-1 pr-1 mb-1">
                          <div class="kv-attribute"><i class="bi bi-filetype-doc"></i><a href="admin/downloadsdocs/docscompany/<?php echo $row['doc_file']; ?>" target="_blank" style=" color: #0d6efd;"><?php echo basename($row['doc_file']); ?></a>
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
          </div>





        </div>
    </section>
    <!-- End Why Us Section -->

  </main><!-- End #main -->

  <?php include('footer.php'); ?>

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