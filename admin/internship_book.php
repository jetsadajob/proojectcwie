<?php
session_start();
include './work/dbwork.php';

if (!isset($_SESSION['id'])) {
    header('Location: ./registerr/login.php');
    exit();
}



$id = $_GET['id']; // รับค่า id จาก URL
$sql = "SELECT * FROM login_student 
RIGHT JOIN internship_book ON login_student.email = internship_book.email 
WHERE login_student.role = 'internship_student' 
AND login_student.email = '$id'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ใบรับรองการฝึกงาน</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <meta name="description" content="Smarthr - Bootstrap Admin Template">
    <meta name="keywords"
        content="admin, estimates, bootstrap, business, corporate, creative, management, minimal, modern, accounts, invoice, html5, responsive, CRM, Projects">
    <meta name="author" content="Dreamguys - Bootstrap Admin Template">
    <meta name="robots" content="noindex, nofollow">

    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">

    <!-- CSS -->
    <link rel="stylesheet" href="../assets/css/index.css">

    <!-- Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans&family=Prompt&display=swap" rel="stylesheet">
    <title>ใบยินยอมจากผู้ปกครอง</title>

    <!-- รูปโปรไฟล์ -->
    <link rel="shortcut icon" type="image/x-icon" href="..assets/img/icon.png">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">


    <!-- ฟอนต์ CSS -->
    <!-- <link rel="stylesheet" href="../assets/css/font-awesome.min.css"> -->

    <!-- Lineawesome CSS -->
    <link rel="stylesheet" href="../assets/css/line-awesome.min.css">

    <!-- กราฟ CSS -->
    <!-- <link rel="stylesheet" href="../assets/plugins/morris/morris.css"> -->

    <!-- Main CSS ของส่วนข้อมูล-->
    <link rel="stylesheet" href="../internship/assets/css/style.css">
    <link rel="stylesheet" href="../internship/assets/css/dashboard.css">
    <link rel="stylesheet" href="../internship/assets/css/internship_book.css">

    <!-- Boxicons -->
    <!-- <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'> -->

</head>

<body>

    <!-- <div class="text-center mt-5"> -->
    <!-- <div class="container"> -->
    <div class="main-wrapper">

        <?php
       include('./nav_admin.php');

        ?>

        <!-- ส่วนของข้อมูลทั้งหมด -->
        <div class="page-wrapper">
            <!-- ส่วนของข้อมูล -->
            <div class="content container-fluid">


                <div class="nameform">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">หน้าหลัก</a></li>
                            <li class="breadcrumb-item active" aria-current="page">ใบรับรองการฝึกงาน</li>
                        </ol>
                    </nav>
                    <!-- <div class="bordermain"> -->
                    <div class="text-center">
                        <h5>ใบรับรองการฝึกงาน</h5>
                    </div><br>
                    <form action="./internship_certificate_update.php" method="post" class="form-horizontal"
                        enctype="multipart/form-data">
                        <!-- <hr> -->
                        <div class="mb-3">
                            <label for="formFile" class="form-label">แนบไฟล์</label>
                            <td>
                                <!-- <div class="kv-attribute"><a href="" target="_blank" style=" color: #0d6efd;"><?php echo ($book_file); ?></a></div> -->

                                <div class="kv-attribute">
                                    <a
                                href="../internship/internship_student/<?php echo $row['internship_book_file']; ?>"
                                target="_blank"
                                style=" color: #0d6efd;"><?php echo basename($row['internship_book_file']); ?></a>
                        </div>
                        <p>นามสกุลไฟล์ที่สามารถแนบได้ pdf, png, jpg, jpeg</p>
                        <br>
                        <!-- <div class="button">
                            <a href="./internship_index.php"><button type="button" class="btn btn-danger"
                                    data-toggle="button" aria-pressed="false">ยกเลิก</button></a>

                            <button type="submit" class="btn btn-success" data-toggle="button" aria-pressed="false">
                                บันทึก
                            </button>
                        </div> -->
                    </form>
                    <!-- </div> -->


                </div>
                <!-- /ส่วนของข้อมูล -->
            </div>
            <!-- /Page Wrapper -->
            <!-- ส่วนของข้อมูลทั้งหมด -->
        </div>
        <!-- /ส่วนของข้อมูล -->
    </div>
    <!-- jQuery -->
    <script src="../assets/js/jquery-3.5.1.min.js"></script>

    <!-- Bootstrap Core JS -->
    <script src="./assets/js/popper.min.js"></script>
    <script src="./assets/js/bootstrap.min.js"></script>

    <!-- Slimscroll JS ตัวเลื่อนแทบข้างๆ -->
    <script src=".
    <!-- Chart JS ส่วนของกราฟ-->
    <script src=" ./assets/plugins/morris/morris.min.js"></script>
    <script src="./assets/plugins/raphael/raphael.min.js"></script>
    <script src="./assets/js/chart.js"></script>

    <!-- Custom JS -->
    <script src="./assets/js/app.js"></script>




    <script src="https://code.jquery.com/jquery-3.6.0.slim.min.js"
        integrity="sha256-u7e5khyithlIdTpu22PHhENmPcRdFiHRjhAuHcs05RI=" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
    <script src="../script.js"></script>
</body>

</html>