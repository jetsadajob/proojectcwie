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
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> -->

    <title>ค้นหางาน</title>
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
    <link href="./css/searchjob.css" rel="stylesheet">

    <link rel="stylesheet" href="CSS/style.css">

    <!-- Main CSS ของส่วนข้อมูล-->
    <link rel="stylesheet" href="./admin/assets/css/style.css">
    <!-- <link rel="stylesheet" href="./admin/assets/css/addwork.css"> -->
    <link rel="stylesheet" href="./admin/assets/css/work.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />


    <!-- endinject -->
    <link rel="shortcut icon" href="/Computing_KKU.svg.png" />

    <!-- Boxicons -->
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>

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

    <!-- ======= Top Bar ======= -->
    <!-- <section id="topbar" class="d-md-flex align-items-center">
        <div class="container d-flex justify-content-center justify-content-md-between">
            <div class="contact-info d-flex align-items-center">
                <i class="bi bi-geo-alt-fill d-flex align-items-center"><a
                        href="https://computing.kku.ac.th/index">วิทยาลัยการคอมพิวเตอร์ มหาวิทยาลัยขอนแก่น</a></i>
                <i class="bi bi-telephone-fill d-flex align-items-center ms-4"><span>043-009700 ต่อ 50525</span></i>
            </div>
            <div class="contact-box d-none d-md-flex align-items-center">
                <a class="getstarted" href="./pages/samples/login.html"><i class="bi bi-person-circle"></i> เข้าสู่ระบบ
                    / สมัครสมาชิก</a>
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

        <div class="contop">
            <div class="p-1 p-md-2 mb-3 mt-3 border rounded shadow-sm h-md-250">
                <div class="iconsearch d-flex">
                    <div class="icon"><i class="bi bi-search "></i></div></i>&nbsp;&nbsp;
                    <h5 class="mb-1">ค้นหาสถานประกอบการ</h5>
                </div>

            </div>
        </div>


        <!-- บล๊อคงานที่ค้นหา -->


        <div class="con1 row mb-2">
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
                                <div class="buttonsearch mr-2">
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
                $per_page = 15; // จำนวนข้อมูลต่อหน้า
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



                        <div class=" row col-4">
                            <div class="input-group col-4 mb-1 ">
                                <label for="exampleDataList" class="form-label">เรียงตาม</label>&nbsp;&nbsp;
                                <select class="form-select" id="company">
                                    <option selected>ลงประกาศล่าสุด</option>
                                    <option value="2">ชื่อสถานประกอบการ</option>
                                    <option value="3">เงินเดือนมากไปน้อย</option>
                                    <option value="ภ">เงินเดือนน้อยไปมาก</option>
                                </select>

                            </div>

                        </div>
                        <h6 class=" pb-1 border-bottom item"></h6>

                        <?php
                        // ... โค้ดก่อนหน้านี้ ...


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
                                        <a href="./detailwork.php?id=<?= $row["recruitment_id"] ?>"><img src="./admin/assets/img/img1.svg" alt=""></a>
                                    </div>
                                    <div class="blog-meta">
                                        <div class="blog-top">
                                            <a href="./detailwork.php?id=<?= $row["recruitment_id"] ?>" class="cat"><?= $row["recruitment_type_company"] ?></a>
                                            <span class="date"><i class="bx bxs-time"></i><?php echo $thai_date; ?></span>
                                        </div>
                                        <h3 class="blog-title">
                                            <a href="./detailwork.php?id=<?= $row["recruitment_id"] ?>"><?= $row["recruitment_company_role"] ?></a>
                                        </h3>
                                        <div class="blog-desc">
                                            <i class='bx bxs-school'></i>
                                            <span class="detail"><?= $row["recruitment_company_name"] ?></span>
                                        </div>
                                        <div class="blog-desc">
                                            <i class='bx bxs-map'></i>
                                            <span class="detail"><?= $row["recruitment_company_location"] ?>&nbsp;&nbsp;<i class="bx bxs-dollar-circle"></i>&nbsp;<?= $row["recruitment_company_experienc"] ?></span>
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
                        mysqli_close($conn);  //ปิดการเชื่อมต่อข้อมูล
                        ?>




                    </div>
                    <!-- <nav aria-label="Page navigation example">

                        <ul class="pagination justify-content-center">
                            <?php
                            // ลิงก์หน้าก่อน
                            if ($page > 1) {
                                echo "<li class='page-item disabled'><a class='page-link' href='searchjob.php?page=" . ($page - 1) . "'>หน้าก่อน</a></li>";
                            }

                            // ลิงก์หน้าตัวเลข
                            for ($i = 1; $i <= $total_pages; $i++) {
                                echo "<li class='page-item" . ($page == $i ? " active" : "") . "'><a class='page-link' href='searchjob.php?page=" . $i . "'>" . $i . "</a></li>";
                            }

                            // ลิงก์หน้าถัดไป
                            if ($page < $total_pages) {
                                echo "<li class='page-item'><a class='page-link' href='searchjob.php?page=" . ($page + 1) . "'>หน้าถัดไป</a></li>";
                            }
                            ?>
                        </ul>
                    </nav> -->



                </div>

            </div>

        </div>
        </div>









        </div>
        </div>
    </main>





    <script src="./index.js"></script>





</body>

</html>