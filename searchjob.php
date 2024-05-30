<?php
include './admin/work/dbwork.php';
session_start();


// รับค่าตัวแปรจากฟอร์ม
// $companyName = $_GET['companyName'] ?? '';
// $jobType = $_GET['jobType'] ?? '';
// $salaryMin = $_GET['salaryMin'] ?? '';
// $salaryMax = $_GET['salaryMax'] ?? '';

// สร้าง SQL Query ตามตัวกรอง
// $sql = "SELECT * FROM job_recruitment WHERE 1=1";
// if (!empty($companyName)) {
//     $sql .= " AND recruitment_company_name LIKE '%" . mysqli_real_escape_string($conn, $companyName) . "%'";
// }
// if (!empty($jobType)) {
//     $sql .= " AND recruitment_type_company = '" . mysqli_real_escape_string($conn, $jobType) . "'";
// }
// if (!empty($salaryMin)) {
//     $sql .= " AND recruitment_company_salary >= " . intval($salaryMin);
// }
// if (!empty($salaryMax)) {
//     $sql .= " AND recruitment_company_salary <= " . intval($salaryMax);
// }

// $result = mysqli_query($conn, $sql);


// $sql = "SELECT DISTINCT recruitment_company_name FROM job_recruitment";
// $result = mysqli_query($conn, $sql);
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

    <title>ค้นหางาน</title>
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

    <link href="./admin/assets/css/work.css" rel="stylesheet">
    <link href="./assets/css/styleindex.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="assets/css/styleindex.css" rel="stylesheet">
    <style>
        .form-control,
        .form-select {
            width: 100%;
            /* กำหนดความกว้างเป็น 100% */
        }

        .input-group .mb-3 {
            width: 100%;
            /* กำหนดความกว้างของคอนเทนเนอร์ที่ห่อหุ้ม */
        }

        .buttonsearch {
            margin-top: 10px;
            /* กำหนดระยะห่างด้านบนสำหรับปุ่ม */
        }

        .buttonsearch {
            display: flex;
            /* ใช้ flexbox */
            justify-content: center;
            /* จัดกลางในแนวนอน */
            align-items: center;
            /* จัดกลางในแนวตั้ง (ถ้าจำเป็น) */
        }
    </style>

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

           

            <li ><a  href="downloads.php"><span>ดาวน์โหลด</span></i></a></li>

            <li><a class="nav-link scrollto active" href="./searchjob.php">ค้นหางาน</a></li>

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
                    <li>ค้นหางาน</li>
                </ol>
                <h2>ค้นหางาน</h2>

            </div>
        </section>
        <!-- End Breadcrumbs -->

        <main class="container ">
            <!-- บล๊อคงานที่ค้นหา -->
            <div class="con1 row mb-2 mt-3">
                <div class="col-md-3">
                    <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                        <div class="col p-4 d-flex flex-column position-static">
                            <?php
                            // ตรวจสอบว่ามีการส่งฟอร์มค้นหาหรือไม่
                            if (isset($_POST['submit'])) {
                                // โค้ดสำหรับการค้นหาข้อมูล
                            }

                            // โค้ดสำหรับการดึงข้อมูลเพื่อใช้ใน datalist
                            $companyNamesResult = mysqli_query($conn, "SELECT DISTINCT recruitment_company_name FROM job_recruitment");
                            ?>

                            <form class="form-inline" method="POST">
                                <div class="input-group mr-2">
                                    <!-- ชื่อบริษัท -->
                                    <div class="mb-3">
                                        <label for="exampleDataList" class="form-label">ชื่อบริษัท หรือตำแหน่งงาน</label>
                                        <input type="text" class="form-control" list="companyNames" name="recruitment_company_name" placeholder="ชื่อบริษัท หรือตำแหน่งงาน.." value="<?php echo isset($_POST['recruitment_company_name']) ? $_POST['recruitment_company_name'] : ''; ?>">
                                        <datalist id="companyNames">
                                            <?php
                                            while ($row = mysqli_fetch_assoc($companyNamesResult)) {
                                                echo "<option value='" . htmlspecialchars($row['recruitment_company_name'], ENT_QUOTES, 'UTF-8') . "'>";
                                            }
                                            ?>
                                        </datalist>
                                    </div>

                                    <!-- สถานที่ทำงาน -->
                                    <div class="mb-3">
                                        <label for="province" class="form-label">สถานที่ทำงาน</label>
                                        <select class="form-select" id="province" name="recruitment_company_province">
                                            <option selected value="">ทั้งหมด</option>
                                            <!-- ตัวอย่างข้อมูลจังหวัด -->
                                            <?php echo $provinces_thailand_html; ?>
                                        </select>
                                    </div>

                                    <!-- ประเภทงาน -->
                                    <div class="mb-3">
                                        <label for="jobType" class="form-label">ประเภทงาน</label>
                                        <select class="form-select" id="jobType" name="recruitment_company_typejob">
                                            <option selected value="">ทั้งหมด...</option>
                                            <option value="UX/UI,Mobile DeveloperOne">Data Scientist/Data Engineer/Data Analyst</option>
                                            <option value=" Software Tester"> Software Tester</option>
                                            <option value="Programmer">Programmer</option>
                                            <option value="UX/UI,Mobile DeveloperOne">IT Manager/Senior Programmer</option>
                                            <option value=" Software Tester"> IT Support/Help Desk</option>
                                            <option value="Programmer">Mobile Developer</option>
                                            <option value="UX/UI,Mobile DeveloperOne">UX/UI,Mobile DeveloperOne</option>
                                            <option value=" Software Tester"> QA/Tester/Software Tester</option>
                                            <option value="Programmer">System Admin/IT Network/Network Engineer</option>
                                            <option value="UX/UI,Mobile DeveloperOne">System Analyst</option>
                                            <option value=" Software Tester"> UX/UI Designer</option>
                                            <option value="Programmer">ภูมิศาสตร์/แผนที่/GIS/ผังเมือง</option>
                                            <option value="Programmer">Web Design /Web Developer /Web Content</option>
                                            <option value="Programmer">โปรแกรมเมอร์/IT</option>
                                            <option value="Data Scientist/Data Engineer/Data Analyst">Data Scientist/Data Engineer/Data Analyst</option>
                                            <!-- และตัวเลือกอื่นๆ -->
                                        </select>
                                    </div>



                                    <!-- ปุ่มค้นหา -->
                                    <div class="buttonsearch mr-2 ">
                                        <button type="submit" name="submit" class="btn btn-info">ค้นหา</button>
                                    </div>


                                    <!-- ปุ่มล้างข้อมูล -->
                                    <!-- <div class="buttonsearch">
                                        <button type="reset" class="btn btn-warning">ล้างข้อมูล</button>
                                    </div> -->
                                </div>
                            </form>
                            <!-- เงินเดือน -->
                            <!-- <div class="input-group mb-3">
                                    <label for="salaryRange" class="form-label">เงินเดือน</label>
                                    <select class="form-select" id="salaryRange" name="recruitment_company_salary">
                                        <option selected value="">เลือก</option>
                                        <option value="5,000">5,000</option>
                                        <option value="10,000">10,000</option>
                                        <option value="15,000">15,000</option>
                                        <option value="20,000">20,000</option>
                                        <option value="25,000">25,000</option>
                                        <option value="30,000">30,000</option>
                                        <option value="35,000">35,000</option>
                                        <option value="40,000">40,000</option>
                                        <option value="45,000">45,000</option>
                                        <option value="50,000">50,000</option>
                                        <option value="55,000">55,000</option>
                                        <option value="60,000">60,000</option>
                                        <option value="65,000">65,000</option>
                                        <option value="70,000">70,000</option>
                                        <option value="75,000">75,000</option>
                                        <option value="80,000">80,000</option>
                                        <option value="85,000">85,000</option>
                                        <option value="90,000">90,000</option>
                                        <option value="95,000">95,000</option>
                                        <option value="100,000 ขึ้นไป">100000ขึ้นไป</option>
                                    </select>
                                </div> -->
                        </div>

                    </div>
                </div>

                <!-- บล๊อคงานที่ค้นหา -->


                <div class="col-md-9">
                    <?php
                    $per_page = 5; // จำนวนข้อมูลต่อหน้า
                    $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
                    $start_from = ($page - 1) * $per_page;

                    // รับค่าจากฟอร์มค้นหา
                    $companyName = $_POST['recruitment_company_name'] ?? '';
                    $province = $_POST['recruitment_company_province'] ?? '';
                    $jobType = $_POST['recruitment_company_typejob'] ?? '';
                    $salaryRange = $_POST['recruitment_company_salary'] ?? '';

                    // สร้าง SQL Query ตามตัวกรอง
                    $sql = "SELECT * FROM job_recruitment WHERE 1=1";
                    if (!empty($companyName)) {
                        $sql .= " AND recruitment_company_name LIKE '%" . mysqli_real_escape_string($conn, $companyName) . "%'";
                    }
                    if (!empty($province)) {
                        $sql .= " AND recruitment_company_province = '" . mysqli_real_escape_string($conn, $province) . "'";
                    }
                    if (!empty($jobType)) {
                        $sql .= " AND recruitment_company_typejob LIKE '%" . mysqli_real_escape_string($conn, $jobType) . "%'";
                    }
                    // ... คำสั่งเพิ่มเติมสำหรับ salaryRange ...

                    $sql .= " LIMIT $start_from, $per_page";
                    $result = mysqli_query($conn, $sql);
                    if (!$result) {
                        die("Error in SQL query: " . mysqli_error($conn));
                    }



                    ?>

                    <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                        <div class="col p-4 d-flex flex-column position-static">
                            <?php
                            $num = ($page - 1) * $per_page + 1; // ตั้งค่าเริ่มต้นสำหรับลำดับข้อมูล
                            $result = mysqli_query($conn, $sql);
                            if (mysqli_num_rows($result) > 0) {
                                while ($row = mysqli_fetch_assoc($result)) {
                                    // ดึงข้อมูลวันที่จากฐานข้อมูลหรือแหล่งข้อมูลอื่น ๆ
                                    $created_at = $row["created_at"];
                                    // แปลงวันที่ให้อยู่ในรูปแบบที่คุณต้องการ
                                    $timestamp = strtotime($created_at);
                                    $thai_date = date(" j ", $timestamp) . thai_month(date("n", $timestamp)) . date(" Y", $timestamp);
                            ?>
                                    <div class="blog">
                                        <div class="blog-image">
                                            <a href="detailwork.php?id=<?= htmlspecialchars($row["recruitment_id"]) ?>">
                                                <div class="kv-attribute">
                                                    <?php if (file_exists('./uploads/' . $row["recruitment_id"] . '.png')) : ?>
                                                        <img class="thumbnail" src="./admin/work/uploads/<?= $row["recruitment_id"] ?>.png" width="120" height="120" alt="" style="margin:0px;">
                                                    <?php else : ?>
                                                        <a href="detailwork.php?id=<?= htmlspecialchars($row["recruitment_id"]) ?>">
                                                            <img src="<?= (!empty($row["recruitment_company_image"])) ? './admin/work/uploads/' . htmlspecialchars($row["recruitment_company_image"]) : './assets/img/img3.svg' ?>" alt="">
                                                        </a>
                                                    <?php endif; ?>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="blog-meta">
                                            <div class="blog-top">
                                                <a href="detailwork.php?id=<?= $row["recruitment_id"] ?>" class="cat"><?= $row["recruitment_company_form_of_work"] ?></a>
                                                <span class="date"><i class="bx bxs-time"></i><?php echo date(" j ", strtotime($row["created_at"])) . thai_month(date("n", strtotime($row["created_at"]))) . date(" Y", strtotime($row["created_at"])); ?></span>
                                            </div>
                                            <h3 class="blog-title"><a href="detailwork.php?id=<?= $row["recruitment_id"] ?>"><?= $row["recruitment_company_role"] ?></a></h3>
                                            <div class="blog-desc"><i class='bx bxs-school'></i><span class="detail"><?= $row["recruitment_company_name"] ?></span></div>
                                            <div class="blog-desc"><i class='bx bxs-map'></i><span class="detail"><?= $row["recruitment_company_location"] ?></span></div>
                                            <div class="blog-bottom">
                                                <div class="user">
                                                    <div class="avatars">
                                                        <a href="./work/edit_work.php?id=<?= $row["recruitment_id"] ?>" class="edit"><i class="bx bxs-pencil"></i></a>
                                                        <a href="./work/delete_work.php?id=<?= $row["recruitment_id"] ?>" class="delete"><i class="bx bxs-trash"></i></a>
                                                    </div>
                                                </div>
                                                <a href="detailwork.php?id=<?= $row["recruitment_id"] ?>" class="readmore">ดูรายละเอียด →</a>
                                            </div>
                                        </div>
                                    </div>
                            <?php
                                }
                                // คำนวณจำนวนหน้าทั้งหมด
                                $query = "SELECT COUNT(recruitment_id) AS total FROM job_recruitment";
                                $total_result = mysqli_query($conn, $query);
                                $total_row = mysqli_fetch_assoc($total_result);
                                $total_pages = $total_row ? ceil($total_row['total'] / $per_page) : 0;
                            } else {
                                echo "<p class='text-center'>ไม่พบงานที่ต้องการ</p>";
                            }
                            ?>
                        </div>

                        <nav aria-label="...">
                            <ul class="pagination pagination-sm justify-content-center">
                                <?php for ($i = 1; $i <= $total_pages; $i++) {
                                    if ($i == $page) {
                                        echo "<li class='page-item active'><span class='page-link'>$i</span></li>";
                                    } else {
                                        echo "<li class='page-item'><a class='page-link' href='?page=$i'>$i</a></li>";
                                    }
                                } ?>
                            </ul>
                        </nav>




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

</body>

</html>