<?php
include "../internship/internship_student/server.php";

// $sql = "SELECT * FROM coop_application_form 
// RIGHT JOIN login_student ON coop_application_form.email = login_student.email 
// WHERE login_student.role = 'cooperative_student' ";
//  $result = mysqli_query($conn, $sql);
// $row = mysqli_fetch_array($result);






?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">

    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> -->

    <title>สหกิจศึกษา</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="./admin/assets/img/profiles/icon.png" rel="icon">
    <link href="assets/img/favicon.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
    <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="./css/Cooperative1.css" rel="stylesheet">
    <link href="./css/index.css" rel="stylesheet">

    <link rel="stylesheet" href="CSS/style.css">

    <!-- ส่วนของตารางรายชื่อ-->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">

    <!-- Boxicons -->


    <!-- endinject -->
    <link rel="shortcut icon" href="/Computing_KKU.svg.png" />


</head>

<body>

    <!-- ======= Header ======= -->
    <header id="header" class="fixed-top  align-items-center">
        <div class="container d-flex justify-content-between">

            <?php include('nav_index.php'); ?>

        </div>
    </header><!-- #header -->

    <!-- ======= Header ======= -->

    <main class="container">

        <div class="contentimg ">
            <div class="pox">
                <div class="text ms-4 text-center ">
                    <div class="photo"><img src="./images/cwie.jpg" class="img-fluid mt-1 rounded" alt="Responsive image"></div>

                </div>
            </div>
        </div>



        <div class="con1 row mb-2">
            <div class="col-md-3">
                <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                    <div class="col p-4 d-flex flex-column position-static">
                        <h6 class="pb-1 border-bottom ">เกี่ยวกับสหกิจศึกษา</h6>
                        <a type="button" class="btn btn-primary p-2  mb-4 " href="Cooperative1.php" style="--bs-btn-padding-y: .25rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .75rem;">
                            <i class="bi bi-list-task"></i> หลักสูตรสหกิจศึกษา

                        </a>

                        <a type="button" class="btn btn-primary p-2 p-md- mb-4 " href="coobenefit.php" style="--bs-btn-padding-y: .25rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .75rem;">
                            <i class="bi bi-text-left"></i> ประโยชน์สหกิจศึกษา

                        </a>


                        <a type="button" class="btn btn-primary p-2 p-md- mb-4" href="#" style="--bs-btn-padding-y: .25rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .75rem;">
                            <i class="bi bi-journal-bookmark-fill"></i> รายชื่อสถานประกอบการ
                        </a>

                        <a type="button" class="btn btn-primary p-2 p-md- mb-4" href="./liststdcoop.php" style="--bs-btn-padding-y: .25rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .75rem;">
                            <i class="bi bi-person-video2"></i> รายชื่อนักศึกษาที่ออกสหกิจ
                        </a>
                    </div>

                </div>
            </div>


            <div class="col-md-9">
                <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                    <div class="col p-4 d-flex flex-column position-static">
                        <h4 class="pb-1 border-bottom font-weight-bold">ประกาศรายชื่อนักศึกษาที่ออกสหกิจ</h4>


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






    <script src="./index.js"></script>
    <!-- Swiper JS -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>

    !-- ตารางรายชื่อ -->
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
    <script src="./admin/assets/js/tablemember.js"></script>










</body>

</html>