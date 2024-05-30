<?php
session_start();
include './work/dbwork.php';

if (!isset($_SESSION['id'])) {
    header('Location: ./registerr/login.php');
    exit();
}

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
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/profiles/Computing_KKU.svg.png">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">


    <!-- ฟอน CSS -->
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">

    <!-- Lineawesome CSS -->
    <link rel="stylesheet" href="assets/css/line-awesome.min.css">

    <!-- แชท CSS -->
    <!-- <link rel="stylesheet" href="assets/plugins/morris/morris.css"> -->

    <!-- Main CSS ของส่วนข้อมูล-->
    <link rel="stylesheet" href="./assets/css/style.css">
    <link rel="stylesheet" href="./assets/css/addwork.css">
    <link rel="stylesheet" href="./assets/css/work.css">

    <!-- ฟอนต์ CSS -->
    <link rel="stylesheet" href="./assets/css/font.css">

    <!-- Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans&family=Prompt&display=swap" rel="stylesheet">



    <!-- Boxicons -->
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
        <div class="content container-fluid">
            <div class="page-header">
                <div class="row align-items-center">
                    <div class="col">
                        <!-- <h3 class="page-title">นักศึษาสหกิจ</h3> -->
                        <ul class="breadcrumb mt-5">
                            <li class="breadcrumb-item"><a href="addmin.php">Dashboard</a></li>
                            <li class="breadcrumb-item">สถานประกอบการ</li>
                            <li class="breadcrumb-item active">ลงประกาศรับสมัครงาน</li>
                        </ul>
                    </div>

                </div>
            </div>

            <!-- Page Header -->

            <div class="head-title">
                <div class="left">
                    <h6 class="page-title">ประกาศรับสมัครงาน</h6>
                </div>
                <a href="./addwork.php" class="btn-download">
                    <i class='bx bxs-file'></i>
                    <span class="text">ลงประกาศรับสมัครงาน</span>
                </a>
            </div><br>

            <?php
// คำนวณจำนวนรายการทั้งหมด
$sql_count = "SELECT COUNT(*) AS total FROM job_recruitment";
$result_count = mysqli_query($conn, $sql_count);
$row_count = mysqli_fetch_assoc($result_count);
$total_records = $row_count['total'];

// กำหนดจำนวนรายการต่อหน้า
$per_page = 5;

// คำนวณจำนวนหน้าทั้งหมด
$total_pages = ceil($total_records / $per_page);

// ตรวจสอบหน้าปัจจุบัน
$page = isset($_GET['page']) && is_numeric($_GET['page']) ? $_GET['page'] : 1;

// ตรวจสอบว่าหน้าปัจจุบันมากกว่าหน้าสุดท้ายหรือไม่
$page = ($page > $total_pages) ? $total_pages : $page;

// ตรวจสอบว่าหน้าปัจจุบันน้อยกว่าหน้าแรกหรือไม่
$page = ($page < 1) ? 1 : $page;

// คำนวณ offset
$offset = ($page - 1) * $per_page;

// ดึงข้อมูลจากฐานข้อมูล
$sql = "SELECT * FROM job_recruitment ORDER BY created_at DESC LIMIT $offset, $per_page";
$result = mysqli_query($conn, $sql);

// เริ่มสร้างตารางหรือ UI แสดงข้อมูลตามที่คุณต้องการ
?>

<!-- Blog -->
<div class="row">
    <div class="col-sm-12">
        <table id="example" class="table table-striped" style="width:100%">
            <?php while ($row = mysqli_fetch_array($result)) : ?>
                <div class="blog">
                    <div class="blog-image">
                        <a href="detailwork.php?id=<?= htmlspecialchars($row["recruitment_id"]) ?>">
                            <div class="kv-attribute">
                                <?php if (file_exists('./uploads/' . $row["recruitment_id"] . '.png')) : ?>
                                    <img class="thumbnail" src="./work/<?= $row["recruitment_id"] ?>.png" width="120" height="120" alt="" style="margin:0px;">
                                <?php else : ?>
                                    <a href="detailwork.php?id=<?= htmlspecialchars($row["recruitment_id"]) ?>">
                                        <img src="<?= (!empty($row["recruitment_company_image"])) ? './work/uploads/' . htmlspecialchars($row["recruitment_company_image"]) : './assets/img/img3.svg' ?>" alt="">
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
            <?php endwhile; ?>
        </table>
    </div>
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