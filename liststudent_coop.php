<?php
include './admin/work/dbwork.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>รายชื่อนักศึกษาที่ออกสหกิจ</title>
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

  <!-- ส่วนของตารางรายชื่อ-->
  <link rel="stylesheet" href="./admin/assets/css/dataTables.bootstrap5.min.css">
</head>

<body>
  <!-- ======= Header ======= -->
  <!-- ======= Header ======= -->
<header id="header" class="fixed-top header-inner-pages">
      <div class="container d-flex align-items-center">

        <a href="index.php" class="logo me-auto"><img
            src="assets/img/CPW.png" alt class="img-fluid"></a>

        <nav id="navbar" class="navbar">
          <ul>
            <li><a class="nav-link " href="./index.php">หน้าเเรก</a></li>
            <!-- <li><a class="nav-link scrollto active" href="./cwieindex.php">สหกิจศึกษา</a> -->

            <li class="dropdown"><a class="nav-link scrollto active" href="#"><span>สหกิจศึกษา</span>
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

           

            <li ><a href="downloads.php"><span>ดาวน์โหลด</span></i></a></li>

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
  <!-- End Header -->

  <main id="main">
    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
      <div class="container">

        <ol>
          <li><a href="index.html">หน้าเเรก</a></li>
          <li>รายชื่อนักศึกษาที่ออกสหกิจ</li>
        </ol>
        <h2>รายชื่อนักศึกษาที่ออกสหกิจ</h2>

      </div>
    </section><!-- End Breadcrumbs -->

    <main class="container">

      <div class="col-md-12 mt-4">
        <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
          <div class="col p-4 d-flex flex-column position-static">
            <h4 class="pb-1 border-bottom font-weight-bold mb-4"><i class="bi bi-person-lines-fill"></i> ประกาศรายชื่อนักศึกษาที่ออกสหกิจ </h4>


            <div class="row justify-content-md-center ">
              <!-- ทำให้ตารางเหมาะกับการแสดงผลในอุปกรณ์ต่างๆ -->
              <div class="page-header">
                <div class="row">
                  <table id="example" class="table table-striped" style="width:100%">
                    <thead>
                      <tr>
                        <!-- <th scope="col">ลำดับที่</th> -->
                        <th scope="col">รหัสนักศึกษา</th>
                        <th scope="col">ชื่อ - นามสกุล</th>
                        <th scope="col">สาขา</th>
                        <th scope="col">สถานประกอบการ</th>

                      </tr>
                    </thead>
                    <tbody>


                      <?php
                      $sql = "SELECT coop_application_form.*, login_student.email 
                                            FROM coop_application_form 
                                            JOIN login_student ON coop_application_form.email = login_student.email 
                                            WHERE login_student.role = 'cooperative_student' AND login_student.status_end = 1";

                      $result = mysqli_query($conn, $sql);
                      while ($row = mysqli_fetch_assoc($result)) {
                        // ตรวจสอบว่าข้อมูลที่จำเป็นมีอยู่หรือไม่
                        if (!empty($row["coop_std_id"]) && !empty($row["coop_prefix_thai"]) && !empty($row["coop_fname_thai"]) && !empty($row["coop_lname_thai"]) && !empty($row["coop_field_of_study"]) && !empty($row["coop_name_of_employer"])) {
                      ?>

                          <tr>
                            <td><?= $row["coop_std_id"] ?></td>
                            <td><?= $row["coop_prefix_thai"] ?> <?= $row["coop_fname_thai"] ?> <?= $row["coop_lname_thai"] ?></td>
                            <td><?= $row["coop_field_of_study"] ?></td>
                            <td><?= $row["coop_name_of_employer"] ?></td>
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


              </ul>
              </nav>

            </div>
          </div>
        </div>

      </div>
      </div>
      </div>


    </main>

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

  <!-- ตารางรายชื่อ -->
  <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
  <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
  <script src="./admin/assets/js/tablemember.js"></script>

</body>

</html>