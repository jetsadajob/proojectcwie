<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


session_start();


// include '../server.php';
$servername = "localhost";
$username = "root"; // or your database username
$password = ""; // or your database password
$dbname = "projectcwie";


$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (!isset($_SESSION['user_id'])) {
    header("Location: ../login_student.php");
    exit();
}

$user_id = $_SESSION['user_id'];

$sql = "SELECT email FROM login_student WHERE id = '$user_id'";
$result = mysqli_query($conn, $sql);

if ($row = mysqli_fetch_assoc($result)) {
    $email = $row['email'];

    $sql = "SELECT petition_document.*, login_student.*
            FROM petition_document
            JOIN login_student ON petition_document.email = login_student.email
            WHERE petition_document.email = '$email'";
    $result = mysqli_query($conn, $sql);
    $row1 = mysqli_fetch_array($result);
} else {
    echo "ไม่พบผู้ใช้";
}


// เรียกข้อมูลจากตาราง company_detail
$sql_company = "SELECT * FROM company_detail WHERE email ='$email' ";
$result_company = mysqli_query($conn, $sql_company);
$row_company = mysqli_fetch_array($result_company);

// เรียกข้อมูลจากตาราง internship_parental_consent_form
$sql_internship = "SELECT * FROM internship_parental_consent_form WHERE email ='$email' ";
$result_internship = mysqli_query($conn, $sql_internship);
$row_internship = mysqli_fetch_array($result_internship);


// เรียกข้อมูลจากตาราง student_history
$sql_student = "SELECT * FROM student_history WHERE email ='$email' ";
$result_student = mysqli_query($conn, $sql_student);
$row_student = mysqli_fetch_array($result_student);

// เรียกข้อมูลจากตาราง internship_certificate
$sql_certificate = "SELECT * FROM internship_certificate WHERE email ='$email' ";
$result_certificate = mysqli_query($conn, $sql_certificate);
$row_certificate = mysqli_fetch_array($result_certificate);


// เรียกข้อมูลจากตาราง internship_time
$sql_time = "SELECT * FROM internship_time WHERE email ='$email' ";
$result_time = mysqli_query($conn, $sql_time);
$row_time = mysqli_fetch_array($result_time);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>แบบฟอร์มฝึกงาน</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <meta name="description" content="Smarthr - Bootstrap Admin Template">
    <meta name="keywords" content="admin, estimates, bootstrap, business, corporate, creative, management, minimal, modern, accounts, invoice, html5, responsive, CRM, Projects">
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
    <title>แบบฟอร์มฝึกงาน</title>

    <!-- รูปโปรไฟล์ -->
    <link rel="shortcut icon" type="image/x-icon" href="..assets/img/icon.png">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <!-- Lineawesome CSS -->
    <link rel="stylesheet" href="../assets/css/line-awesome.min.css">

    <!-- Main CSS ของส่วนข้อมูล-->
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="../assets/css/internship.css">

    <style>
        .breadcrumb a {
            color: grey;
        }

        nav .breadcrumb {
            margin-left: 35px;
            padding-top: 65px;
        }
    </style>

</head>

<body>


    <div class="main-wrapper">
        <?php
        include('./navbar_menu.php');

        ?>

        <div class="page-wrapper">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active" aria-current="page">แบบฟอร์มฝึกงาน</li>
                </ol>
            </nav>
            <div class="content container-fluid">
                <div class="page-header text-center">

                    <div class="row">
                        <div class="col-sm-12">
                            <h5 class="page-title">รายละเอียดแบบฟอร์มฝึกงาน</h5>
                        </div>
                    </div>
                </div>
                <br>

                <table id="example" class="table table-striped" style="width:100%">
                    <thead>
                        <tr>
                            <th>ลำดับ</th>
                            <th>ชื่อแบบฟอร์ม</th>
                            <th>สถานะ</th>
                            <th>รายละเอียด</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>รายละเอียดบริษัท/หน่วยงาน</td>
                            <td>
                                <?php if ($row_company["status_admin"] == 0) : ?>
                                    <span class="badge badge-pill badge-danger">ยังไม่กรอกฟอร์ม</span>
                                <?php elseif ($row_company["status_admin"] == 1) : ?>
                                    <span class="badge badge-pill badge-warning">รอตรวจสอบ</span>
                                <?php elseif ($row_company["status_admin"] == 2) : ?>
                                    <span class="badge badge-pill badge-success">ตรวจสอบแล้ว</span>
                                <?php elseif ($row_company["status_admin"] == 3) : ?>
                                    <span class="badge badge-warning">มีข้อมูลต้องแก้ไข</span>
                                <?php elseif ($row_company["status_admin"] == 4) : ?>
                                    <span class="badge badge-danger">ยกเลิก</span>
                                <?php endif; ?>
                            </td>
                            <td><a href="./company_detail.php"><button class="btn btn-outline-primary" style="border-radius: 7px;"><svg xmlns="http://www.w3.org/2000/svg" width="23" height="23" fill="currentColor" class="bi bi-eye-fill" viewBox="0 0 16 16">
                                            <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0" />
                                            <path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8m8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7" />
                                        </svg></button></a>
                                <!-- <a href="./company_edit.php"><button class="btn btn-outline-warning" style="border-radius: 7px;"><svg xmlns="http://www.w3.org/2000/svg" width="23" height="23" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                            <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                            <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z" />
                                        </svg></button></a> -->
                                <a href="./internship_company_print.php"><button class="btn btn-outline-success" style="border-radius: 7px;"><svg xmlns="http://www.w3.org/2000/svg" width="23" height="23" fill="currentColor" class="bi bi-printer-fill" viewBox="0 0 16 16">
                                            <path d="M5 1a2 2 0 0 0-2 2v1h10V3a2 2 0 0 0-2-2zm6 8H5a1 1 0 0 0-1 1v3a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1v-3a1 1 0 0 0-1-1" />
                                            <path d="M0 7a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v3a2 2 0 0 1-2 2h-1v-2a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v2H2a2 2 0 0 1-2-2zm2.5 1a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1" />
                                        </svg></button></a>
                            </td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>หนังสือยินยอมผู้ปกครอง</td>
                            <td>
                                <?php if ($row_internship["status_admin"] == 0) : ?>
                                    <span class="badge badge-pill badge-danger">ยังไม่กรอกฟอร์ม</span>
                                <?php elseif ($row_internship["status_admin"] == 1) : ?>
                                    <span class="badge badge-pill badge-warning">รอตรวจสอบ</span>
                                <?php elseif ($row_internship["status_admin"] == 2) : ?>
                                    <span class="badge badge-pill badge-success">ตรวจสอบแล้ว</span>
                                <?php elseif ($row_internship["status_admin"] == 3) : ?>
                                    <span class="badge badge-warning">มีข้อมูลต้องแก้ไข</span>
                                <?php elseif ($row_internship["status_admin"] == 4) : ?>
                                    <span class="badge badge-danger">ยกเลิก</span>
                                <?php endif; ?>
                            </td>
                            <td><a href="./internship_book_detail.php"><button class="btn btn-outline-primary" style="border-radius: 7px;"><svg xmlns="http://www.w3.org/2000/svg" width="23" height="23" fill="currentColor" class="bi bi-eye-fill" viewBox="0 0 16 16">
                                            <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0" />
                                            <path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8m8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7" />
                                        </svg></button></a>
                                <!-- <a href="./internship_book_edit.php"><button class="btn btn-outline-warning" style="border-radius: 7px;"><svg xmlns="http://www.w3.org/2000/svg" width="23" height="23" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                            <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                            <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z" />
                                        </svg></button></a> -->
                            </td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>ประวัตินักศึกษา</td>
                            <td>
                                <?php if ($row_student["status_admin"] == 0) : ?>
                                    <span class="badge badge-pill badge-danger">ยังไม่กรอกฟอร์ม</span>
                                <?php elseif ($row_student["status_admin"] == 1) : ?>
                                    <span class="badge badge-pill badge-warning">รอตรวจสอบ</span>
                                <?php elseif ($row_student["status_admin"] == 2) : ?>
                                    <span class="badge badge-pill badge-success">ตรวจสอบแล้ว</span>
                                <?php elseif ($row_student["status_admin"] == 3) : ?>
                                    <span class="badge badge-warning">มีข้อมูลต้องแก้ไข</span>
                                <?php elseif ($row_student["status_admin"] == 4) : ?>
                                    <span class="badge badge-danger">ยกเลิก</span>
                                <?php endif; ?>
                            </td>
                            <td><a href="./history_detail.php"><button class="btn btn-outline-primary" style="border-radius: 7px;"><svg xmlns="http://www.w3.org/2000/svg" width="23" height="23" fill="currentColor" class="bi bi-eye-fill" viewBox="0 0 16 16">
                                            <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0" />
                                            <path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8m8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7" />
                                        </svg></button></a>
                                <!-- <a href="./internship_history_edit.php"><button class="btn btn-outline-warning" style="border-radius: 7px;"><svg xmlns="http://www.w3.org/2000/svg" width="23" height="23" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                            <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                            <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z" />
                                        </svg></button></a> -->
                                <a href="./internship_history_print.php"><button class="btn btn-outline-success" style="border-radius: 7px;"><svg xmlns="http://www.w3.org/2000/svg" width="23" height="23" fill="currentColor" class="bi bi-printer-fill" viewBox="0 0 16 16">
                                            <path d="M5 1a2 2 0 0 0-2 2v1h10V3a2 2 0 0 0-2-2zm6 8H5a1 1 0 0 0-1 1v3a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1v-3a1 1 0 0 0-1-1" />
                                            <path d="M0 7a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v3a2 2 0 0 1-2 2h-1v-2a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v2H2a2 2 0 0 1-2-2zm2.5 1a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1" />
                                        </svg></button></a>
                            </td>
                        </tr>
                        <tr>
                            <td>4</td>
                            <td>ใบรับรองการฝึกงาน</td>
                            <td>
                                <?php if ($row_certificate["status_admin"] == 0) : ?>
                                    <span class="badge badge-pill badge-danger">ยังไม่กรอกฟอร์ม</span>
                                <?php elseif ($row_certificate["status_admin"] == 1) : ?>
                                    <span class="badge badge-pill badge-warning">รอตรวจสอบ</span>
                                <?php elseif ($row_certificate["status_admin"] == 2) : ?>
                                    <span class="badge badge-pill badge-success">ตรวจสอบแล้ว</span>
                                <?php elseif ($row_certificate["status_admin"] == 3) : ?>
                                    <span class="badge badge-warning">มีข้อมูลต้องแก้ไข</span>
                                <?php elseif ($row_certificate["status_admin"] == 4) : ?>
                                    <span class="badge badge-danger">ยกเลิก</span>
                                <?php endif; ?>
                            </td>
                            <td><a href="./certificate_detail.php"><button class="btn btn-outline-primary" style="border-radius: 7px;"><svg xmlns="http://www.w3.org/2000/svg" width="23" height="23" fill="currentColor" class="bi bi-eye-fill" viewBox="0 0 16 16">
                                            <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0" />
                                            <path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8m8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7" />
                                        </svg></button></a>
                                <!-- <a href="./internship_certificate_edit.php"><button class="btn btn-outline-warning" style="border-radius: 7px;"><svg xmlns="http://www.w3.org/2000/svg" width="23" height="23" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                            <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                            <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z" />
                                        </svg></button></a> -->
                        </tr>
                        <tr>
                            <td>5</td>
                            <td>บันทึกการฝึกงาน</td>
                            <td>
                                <?php if ($row_time["status_admin"] == 0) : ?>
                                    <span class="badge badge-pill badge-danger">ยังไม่กรอกฟอร์ม</span>
                                <?php elseif ($row_time["status_admin"] == 1) : ?>
                                    <span class="badge badge-pill badge-warning">รอตรวจสอบ</span>
                                <?php elseif ($row_time["status_admin"] == 2) : ?>
                                    <span class="badge badge-pill badge-success">ตรวจสอบแล้ว</span>
                                <?php elseif ($row_time["status_admin"] == 3) : ?>
                                    <span class="badge badge-warning">มีข้อมูลต้องแก้ไข</span>
                                <?php elseif ($row_time["status_admin"] == 4) : ?>
                                    <span class="badge badge-danger">ยกเลิก</span>
                                <?php endif; ?>
                            </td>
                            <td><a href="./time_detail.php"><button class="btn btn-outline-primary" style="border-radius: 7px;"><svg xmlns="http://www.w3.org/2000/svg" width="23" height="23" fill="currentColor" class="bi bi-eye-fill" viewBox="0 0 16 16">
                                            <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0" />
                                            <path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8m8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7" />
                                        </svg></button></a>
                                <!-- <a href="./internship_time_edit.php"><button class="btn btn-outline-warning" style="border-radius: 7px;"><svg xmlns="http://www.w3.org/2000/svg" width="23" height="23" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                            <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                            <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z" />
                                        </svg></button></a> -->
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>


    <!-- jQuery -->
    <script src="../assets/js/jquery-3.5.1.min.js"></script>

    <!-- Bootstrap Core JS -->
    <script src="../assets/js/popper.min.js"></script>
    <script src="../assets/js/bootstrap.min.js"></script>

    <!-- Slimscroll JS ตัวเลื่อนแทบข้างๆ -->
    <script src="../assets/js/jquery.slimscroll.min.js"></script>


    <!-- Custom JS -->
    <script src="../assets/js/app.js"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>


    <script src="https://code.jquery.com/jquery-3.6.0.slim.min.js" integrity="sha256-u7e5khyithlIdTpu22PHhENmPcRdFiHRjhAuHcs05RI=" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
    <script src="../script.js"></script>
    <script src="../script.js"></script>
</body>

</html>