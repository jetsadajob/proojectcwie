<?php
include './admin/work/dbwork.php';

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
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>ข้อปฏิบัติในการยื่นฝึกงาน</title>
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
    <style>
        .grid-view .table th a {
            color: #B65921;
        }

        .form-title {
            font-size: 18px;
            margin: 0 0 20px;
            color: #2c66af;
            border-bottom: 1px dotted #2c66af;
            padding-bottom: 5px;
        }

        .wrapper-preview-list {
            font-size: 14px;
            border: 1px solid #6680a0;
            border-top: 3px solid #6680a0;
            border-radius: 5px;
            margin-top: 5px;
            margin-bottom: 20px;
            padding: 20px;
            line-height: 28px;
        }

        .wrapper-preview-list-1 {
            font-size: 14px;
            line-height: 28px;
        }

        .border-bootom {
            border-bottom: 1px dotted #ddd;
        }
    </style>
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
                    <li>ฝึกงาน</li>
                </ol>
                <h2>รายละเอียดประกาศงาน</h2>

            </div>
        </section><!-- End Breadcrumbs -->

        <!-- ======= work Us Section ======= -->
        <div class="work-us section-bgg">
            <div class="container-fluid" data-aos="fade-up">

                <!-- ส่วนของข้อมูล -->
                <div class="content container-fluid ">


                
                    <div class="card profile-box flex-fill p-3">

                        <!-- Page Header -->

                        <div class="col-md-12">


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
                                        <?= $row["recruitment_company_detailjob"] ?>
                                    </div>
                                </div>


                                <div class="row">
                                    <div class="col-sm-12">
                                        <br>
                                    </div>
                                    <div class="col-sm-10">
                                        <div><b>ไฟล์แนบ:</b> </div>
                                        <div class="kv-attribute"><a href="./admin/work/<?php echo $row['recruitment_company_file']; ?>" target="_blank" style=" color: #0d6efd;"><?php echo basename($row['recruitment_company_file']); ?></a>


                                        </div></a>
                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>

                    <!-- ส่วนของข้อมูลทั้งหมด -->
                </div>



            </div>
            </section><!-- End work Us Section -->



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