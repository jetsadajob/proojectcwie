<?php
include './admin//db.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">

    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> -->

    <title>สำหรับนักศึกษา</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="./admin/assets/img/profiles/icon.png" rel="icon">
    <link href="assets/img/favicon.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans&family=Prompt&display=swap" rel="stylesheet">

    <!-- Google Fonts -->
    <!-- <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet"> -->

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
    <link href="./css/consultant.css" rel="stylesheet">

    <link rel="stylesheet" href="./css/style.css">


    <!-- endinject -->
    <link rel="shortcut icon" href="/Computing_KKU.svg.png" />


</head>

<body>

    <!-- ======= Top Bar ======= -->
    <!-- <section id="topbar" class="d-md-flex align-items-center">
        <div class="container d-flex justify-content-center justify-content-md-between">
            <div class="contact-info d-flex align-items-center">
                <i class="bi bi-geo-alt-fill d-flex align-items-center"><a
                        href="https://computing.kku.ac.th/index">วิทยาลัยการคอมพิวเตอร์ มหาวิทยาลัยขอนแก่น</a></i>
                <i class="bi bi-telephone-fill d-flex align-items-center ms-4"><span>043-009700 ต่อ 50525</span></i>
            </div>
            <div class="contact-box d-none d-md-flex align-items-center">
                <a class="getstarted" href="#about"><i class="bi bi-person-circle"></i> เข้าสู่ระบบ / สมัครสมาชิก</a>
                <a class="getstarted" href="#about"><i class="bi bi-people-fill"></i> นักศึกษาฝึกงาน / นักศึกษาสหกิจ</a>

            </div>

        </div>
    </section> -->


    <!-- ======= Header ======= -->
    <header id="header" class="fixed-top  align-items-center">
        <div class="container d-flex justify-content-between">

            <?php include('nav_index.php'); ?>

        </div>
    </header><!-- #header -->

    <!-- ======= Header ======= -->

    <main class="container">



        <div class="con1 row mb-2">
            <div class="col-md-3">
                <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                    <div class="col p-4 d-flex flex-column position-static">

                        <h6 class="pb-1 border-bottom">ดาวน์โหลด</h6>


                        <a type="button" class="btn btn-primary p-2 p-md- mb-4 " style="--bs-btn-padding-y: .25rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .75rem;" href="downloads_student.php">
                            <i class="bi bi-list-task"></i> สำหรับนักศึกษา
                        </a>

                        <a type="button" class="btn btn-primary p-2 p-md- mb-4 " style="--bs-btn-padding-y: .25rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .75rem;" href="downloads_teacher.php">
                            <i class="bi bi-text-left"></i> สำหรับอาจารย์
                        </a>


                        <a type="button" class="btn btn-primary p-2 p-md- mb-4" style="--bs-btn-padding-y: .25rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .75rem;" href="downloads_company.php">
                            <i class="bi bi-journal-bookmark-fill"></i> สำหรับสถานประกอบการ
                        </a>





                    </div>

                </div>
            </div>


            <div class="col-md-9">

                <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                    <div class="col p-4 d-flex flex-column position-static">
                        <h6 class="pb-1 border-bottom"><i class="bi bi-book"></i> นักศึกษาสหกิจศึกษา</h6>

                        <div class="row ">
                            <div class="col-sm-12 p-1 ">
                                <?php
                                // คิวรี่ข้อมูลมาแสดงในตาราง
                                require_once './admin/connect.php';
                                $stmt = $conn->prepare("SELECT* FROM tbl_pdf");
                                $stmt->execute();
                                $result = $stmt->fetchAll();
                                foreach ($result as $row) {
                                ?>


                                    <div class="col-sm-12 p-1">
                                        <!-- <div class="name-content col-md-12 pl-1 pr-1 mb-1">
                                            <i class="bi bi-filetype-doc"></i> <a href="admin/docs/<?= htmlspecialchars($row['doc_file']); ?>" download>
                                                <?= htmlspecialchars($row['doc_name']) ? htmlspecialchars($row['doc_name']) : htmlspecialchars($row['doc_file']); ?>
                                            </a>
                                        </div> -->

                                        <div class="name-content col-md-12 pl-1 pr-1 mb-1">
                                            <div class="kv-attribute"><i class="bi bi-filetype-doc"></i><a href="admin/docs/<?php echo $row['doc_file']; ?>" target="_blank" style=" color: #0d6efd;"><?php echo basename($row['doc_file']); ?></a>
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




                <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                    <div class="col p-4 d-flex flex-column position-static">
                        <h6 class="pb-1 border-bottom"><i class="bi bi-book"></i> นักศึกษาฝึกงาน</h6>
                        <div class="row ">

                            <div class="col-sm-12 p-1 ">
                                <?php
                                // คิวรี่ข้อมูลมาแสดงในตาราง
                                require_once './admin/connect.php';
                                $stmt = $conn->prepare("SELECT* FROM tbl_internship");
                                $stmt->execute();
                                $result = $stmt->fetchAll();
                                foreach ($result as $row) {
                                ?>


                                    <div class="col-sm-12 p-1">
                                        <div class="name-content col-md-12 pl-1 pr-1 mb-1">
                                            <i class="bi bi-filetype-doc"></i> <a href="admin/docinternship/<?= htmlspecialchars($row['doc_file']); ?>" download>
                                                <?= htmlspecialchars($row['doc_name']) ? htmlspecialchars($row['doc_name']) : htmlspecialchars($row['doc_file']); ?>
                                            </a>
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




    </main>

    <!-- <div class="footer d-flex align-items-center justify-content-center py-3" data-v-064a8820="" >
        <div class="mx-2" data-v-064a8820="">College of Computing Khon Kaen University</div>
    </div> -->

    <script src="./index.js"></script>

</body>

</html>