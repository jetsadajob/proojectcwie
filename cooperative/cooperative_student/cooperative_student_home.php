<?php
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



// เรียกข้อมูลจากตาราง petition_document
$sql_petition = "SELECT * FROM petition_document WHERE email ='$email' ";
$result_petition = mysqli_query($conn, $sql_petition);
$row_petition = mysqli_fetch_array($result_petition);

// เรียกข้อมูลจากตาราง coop_application_form
$sql_application = "SELECT * FROM coop_application_form WHERE email ='$email' ";
$result_application = mysqli_query($conn, $sql_application);
$row_application = mysqli_fetch_array($result_application);


// เรียกข้อมูลจากตาราง coopperative_perental_consent_form
$sql_perental = "SELECT * FROM coopperative_perental_consent_form WHERE email ='$email' ";
$result_perental = mysqli_query($conn, $sql_perental);
$row_perental = mysqli_fetch_array($result_perental);

// เรียกข้อมูลจากตาราง job_description_accommodation
$sql_description_ = "SELECT * FROM job_description_accommodation WHERE email ='$email' ";
$result_description_ = mysqli_query($conn, $sql_description_);
$row_description_ = mysqli_fetch_array($result_description_);

// เรียกข้อมูลจากตาราง student_acceptance_form
$sql_acceptance = "SELECT * FROM student_acceptance_form WHERE email ='$email' ";
$result_acceptance = mysqli_query($conn, $sql_acceptance);
$row_acceptance = mysqli_fetch_array($result_acceptance);


// เรียกข้อมูลจากตาราง cooperative_report_outline
$sql_report = "SELECT * FROM cooperative_report_outline WHERE email ='$email' ";
$result_report = mysqli_query($conn, $sql_report);
$row_report = mysqli_fetch_array($result_report);

// เรียกข้อมูลจากตาราง supervision_recording
$sql_recording = "SELECT * FROM supervision_recording WHERE email ='$email' ";
$result_recording = mysqli_query($conn, $sql_recording);
$row_recording = mysqli_fetch_array($result_recording);

// เรียกข้อมูลจากตาราง coopperative_education_report_form
$sql_education = "SELECT * FROM coopperative_education_report_form WHERE email ='$email' ";
$result_education = mysqli_query($conn, $sql_education);
$row_education = mysqli_fetch_array($result_education);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>แบบฟอร์มสหกิจศึกษา</title>
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
    <title>แบบฟอร์มสหกิจศึกษา</title>

    <!-- รูปโปรไฟล์ -->
    <link rel="shortcut icon" type="image/x-icon" href="..assets/img/icon.png">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <!-- Lineawesome CSS -->
    <link rel="stylesheet" href="../assets/css/line-awesome.min.css">

    <!-- Main CSS ของส่วนข้อมูล-->
    <link rel="stylesheet" href="../assets/css/style.css">
    <!-- <link rel="stylesheet" href="../assets/css/cooperative.css"> -->

    <style>
        .breadcrumb a {
            color: grey;
        }

        nav .breadcrumb {
            margin-left: 6;
            margin-top: 45px;
        }
    </style>

</head>

<body>
    <div class="main-wrapper">
        <?php
        include('./navbar_menu.php');
        ?>

        <div class="page-wrapper">
            <div class="content container-fluid">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item active" aria-current="page">แบบฟอร์มสหกิจศึกษา</li>
                    </ol>
                </nav>
                <div class="nameform">
                    <div class="page-header text-center">
                        <div class="row">
                            <div class="col-sm-12">
                                <h5 class="page-title">แบบฟอร์มสหกิจศึกษา</h5>
                            </div>
                        </div>
                    </div>
                </div>

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
                            <td>ใบคำร้องขอเข้าร่วมโครงการสหกิจศึกษา</td>
                            <td>
                                <?php if ($row_petition["status_admin"] == 0) : ?>
                                    <span class="badge badge-pill badge-danger">ยังไม่กรอกฟอร์ม</span>
                                <?php elseif ($row_petition["status_admin"] == 1) : ?>
                                    <span class="badge badge-pill badge-warning">รอตรวจสอบ</span>
                                <?php elseif ($row_petition["status_admin"] == 2) : ?>
                                    <span class="badge badge-pill badge-success">ตรวจสอบแล้ว</span>
                                <?php elseif ($row_petition["status_admin"] == 3) : ?>
                                    <span class="badge badge-warning">มีข้อมูลต้องแก้ไข</span>
                                <?php elseif ($row_petition["status_admin"] == 4) : ?>
                                    <span class="badge badge-danger">ยกเลิก</span>
                                <?php endif; ?>
                            </td>
                            <!-- Add an input hidden field to store the 'email' -->
                            <input type="hidden" name="email" value="<?php echo $id; ?>">
                            <td><a href="./petition_detail.php"><button class="btn btn-outline-primary" style="border-radius: 7px;"><svg xmlns="http://www.w3.org/2000/svg" width="23" height="23" fill="currentColor" class="bi bi-eye-fill" viewBox="0 0 16 16">
                                            <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0" />
                                            <path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8m8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7" />
                                        </svg></button></a>
                                <!-- <a href="./cooperative_petition_edit.php"><button class="btn btn-outline-warning" style="border-radius: 7px;"><svg xmlns="http://www.w3.org/2000/svg" width="23" height="23" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                            <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                            <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z" />
                                        </svg></button></a> -->
                                <a href="./cooperative_petition_print.php"><button class="btn btn-outline-success" style="border-radius: 7px;"><svg xmlns="http://www.w3.org/2000/svg" width="23" height="23" fill="currentColor" class="bi bi-printer-fill" viewBox="0 0 16 16">
                                            <path d="M5 1a2 2 0 0 0-2 2v1h10V3a2 2 0 0 0-2-2zm6 8H5a1 1 0 0 0-1 1v3a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1v-3a1 1 0 0 0-1-1" />
                                            <path d="M0 7a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v3a2 2 0 0 1-2 2h-1v-2a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v2H2a2 2 0 0 1-2-2zm2.5 1a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1" />
                                        </svg></button></a>
                            </td>
                        </tr>

                        <tr>
                            <td>2</td>
                            <td>แบบตอบรับนักศึกษาเข้าปฏิบัติงานสหกิจศึกษา</td>
                            <td>
                                <?php if ($row_petition["status_admin"] == 0) : ?>
                                    <span class="badge badge-pill badge-danger">ยังไม่กรอกฟอร์ม</span>
                                <?php elseif ($row_petition["status_admin"] == 1) : ?>
                                    <span class="badge badge-pill badge-warning">รอตรวจสอบ</span>
                                <?php elseif ($row_petition["status_admin"] == 2) : ?>
                                    <span class="badge badge-pill badge-success">ตรวจสอบแล้ว</span>
                                <?php elseif ($row_petition["status_admin"] == 3) : ?>
                                    <span class="badge badge-warning">มีข้อมูลต้องแก้ไข</span>
                                <?php elseif ($row_petition["status_admin"] == 4) : ?>
                                    <span class="badge badge-danger">ยกเลิก</span>
                                <?php endif; ?>
                            </td>
                            <td><a href="./student_acceptance_form_detail.php"><button class="btn btn-outline-primary" style="border-radius: 7px;"><svg xmlns="http://www.w3.org/2000/svg" width="23" height="23" fill="currentColor" class="bi bi-eye-fill" viewBox="0 0 16 16">
                                            <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0" />
                                            <path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8m8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7" />
                                        </svg></button></a>
                            </td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>KKUCP-T000_ใบสมัครงานสหกิจศึกษา</td>
                            <td>
                                <?php if ($row_application["status_admin"] == 0) : ?>
                                    <span class="badge badge-pill badge-danger">ยังไม่กรอกฟอร์ม</span>
                                <?php elseif ($row_application["status_admin"] == 1) : ?>
                                    <span class="badge badge-pill badge-warning">รอตรวจสอบ</span>
                                <?php elseif ($row_application["status_admin"] == 2) : ?>
                                    <span class="badge badge-pill badge-success">ตรวจสอบแล้ว</span>
                                <?php elseif ($row_application["status_admin"] == 3) : ?>
                                    <span class="badge badge-warning">มีข้อมูลต้องแก้ไข</span>
                                <?php elseif ($row_application["status_admin"] == 4) : ?>
                                    <span class="badge badge-danger">ยกเลิก</span>
                                <?php endif; ?>
                            </td>

                            <td><a href="./application_detail.php"><button class="btn btn-outline-primary" style="border-radius: 7px;"><svg xmlns="http://www.w3.org/2000/svg" width="23" height="23" fill="currentColor" class="bi bi-eye-fill" viewBox="0 0 16 16">
                                            <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0" />
                                            <path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8m8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7" />
                                        </svg></button></a>
                                <!-- <a href="./cooperative_application_edit.php"><button class="btn btn-outline-warning" style="border-radius: 7px;"><svg xmlns="http://www.w3.org/2000/svg" width="23" height="23" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                            <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                            <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z" />
                                        </svg></button></a> -->
                                <a href="./cooperative_application_print.php"><button class="btn btn-outline-success" style="border-radius: 7px;"><svg xmlns="http://www.w3.org/2000/svg" width="23" height="23" fill="currentColor" class="bi bi-printer-fill" viewBox="0 0 16 16">
                                            <path d="M5 1a2 2 0 0 0-2 2v1h10V3a2 2 0 0 0-2-2zm6 8H5a1 1 0 0 0-1 1v3a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1v-3a1 1 0 0 0-1-1" />
                                            <path d="M0 7a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v3a2 2 0 0 1-2 2h-1v-2a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v2H2a2 2 0 0 1-2-2zm2.5 1a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1" />
                                        </svg></button></a>
                            </td>
                        </tr>
                        <tr>
                            <td>4</td>
                            <td>KKUCP-T001_ใบยินยอมจากผู้ปกครอง</td>
                            <td>
                                <?php if ($row_perental["status_admin"] == 0) : ?>
                                    <span class="badge badge-pill badge-danger">ยังไม่กรอกฟอร์ม</span>
                                <?php elseif ($row_perental["status_admin"] == 1) : ?>
                                    <span class="badge badge-pill badge-warning">รอตรวจสอบ</span>
                                <?php elseif ($row_perental["status_admin"] == 2) : ?>
                                    <span class="badge badge-pill badge-success">ตรวจสอบแล้ว</span>
                                <?php elseif ($row_perental["status_admin"] == 3) : ?>
                                    <span class="badge badge-warning">มีข้อมูลต้องแก้ไข</span>
                                <?php elseif ($row_perental["status_admin"] == 4) : ?>
                                    <span class="badge badge-danger">ยกเลิก</span>
                                <?php endif; ?>
                            </td>
                            <td><a href="./coopbook_detail.php"><button class="btn btn-outline-primary" style="border-radius: 7px;"><svg xmlns="http://www.w3.org/2000/svg" width="23" height="23" fill="currentColor" class="bi bi-eye-fill" viewBox="0 0 16 16">
                                            <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0" />
                                            <path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8m8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7" />
                                        </svg></button></a>
                                <!-- <a href="./cooperative_book_edit.php"><button class="btn btn-outline-warning" style="border-radius: 7px;"><svg xmlns="http://www.w3.org/2000/svg" width="23" height="23" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                            <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                            <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z" />
                                        </svg></button></a> -->
                            </td>
                        </tr>
                        <tr>
                            <td>5</td>
                            <td>KKUCP-T002_แบบแจ้งรายละเอียดงานและรายละเอียดที่พัก</td>
                            <td>
                                <?php if ($row_description_["status_admin"] == 0) : ?>
                                    <span class="badge badge-pill badge-danger">ยังไม่กรอกฟอร์ม</span>
                                <?php elseif ($row_description_["status_admin"] == 1) : ?>
                                    <span class="badge badge-pill badge-warning">รอตรวจสอบ</span>
                                <?php elseif ($row_description_["status_admin"] == 2) : ?>
                                    <span class="badge badge-pill badge-success">ตรวจสอบแล้ว</span>
                                <?php elseif ($row_description_["status_admin"] == 3) : ?>
                                    <span class="badge badge-warning">มีข้อมูลต้องแก้ไข</span>
                                <?php elseif ($row_description_["status_admin"] == 4) : ?>
                                    <span class="badge badge-danger">ยกเลิก</span>
                                <?php endif; ?>
                            </td>
                            <td><a href="./job_description_accommodation_detail.php"><button class="btn btn-outline-primary" style="border-radius: 7px;"><svg xmlns="http://www.w3.org/2000/svg" width="23" height="23" fill="currentColor" class="bi bi-eye-fill" viewBox="0 0 16 16">
                                            <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0" />
                                            <path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8m8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7" />
                                        </svg></button></a>
                                <!-- <a href="./job_description_accommodation_edit.php"><button class="btn btn-outline-warning" style="border-radius: 7px;"><svg xmlns="http://www.w3.org/2000/svg" width="23" height="23" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                            <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                            <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z" />
                                        </svg></button></a> -->
                                <a href="./job_description_accommodation_print.php"><button class="btn btn-outline-success" style="border-radius: 7px;"><svg xmlns="http://www.w3.org/2000/svg" width="23" height="23" fill="currentColor" class="bi bi-printer-fill" viewBox="0 0 16 16">
                                            <path d="M5 1a2 2 0 0 0-2 2v1h10V3a2 2 0 0 0-2-2zm6 8H5a1 1 0 0 0-1 1v3a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1v-3a1 1 0 0 0-1-1" />
                                            <path d="M0 7a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v3a2 2 0 0 1-2 2h-1v-2a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v2H2a2 2 0 0 1-2-2zm2.5 1a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1" />
                                        </svg></button></a>
                            </td>
                        </tr>
                        <tr>
                            <td>6</td>
                            <td>KKUCP-T003_แบบแผนและโครงร่างรายงานการปฏิบัติงานสหกิจศึกษา</td>
                            <td>
                                <?php if ($row_report["status_admin"] == 0) : ?>
                                    <span class="badge badge-pill badge-danger">ยังไม่กรอกฟอร์ม</span>
                                <?php elseif ($row_report["status_admin"] == 1) : ?>
                                    <span class="badge badge-pill badge-warning">รอตรวจสอบ</span>
                                <?php elseif ($row_report["status_admin"] == 2) : ?>
                                    <span class="badge badge-pill badge-success">ตรวจสอบแล้ว</span>
                                <?php elseif ($row_report["status_admin"] == 3) : ?>
                                    <span class="badge badge-warning">มีข้อมูลต้องแก้ไข</span>
                                <?php elseif ($row_report["status_admin"] == 4) : ?>
                                    <span class="badge badge-danger">ยกเลิก</span>
                                <?php endif; ?>
                            </td>
                            <td><a href="./report_outline_detail.php"><button class="btn btn-outline-primary" style="border-radius: 7px;"><svg xmlns="http://www.w3.org/2000/svg" width="23" height="23" fill="currentColor" class="bi bi-eye-fill" viewBox="0 0 16 16">
                                            <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0" />
                                            <path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8m8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7" />
                                        </svg></button></a>
                                <!-- <a href="./cooperative_report_outline_edit.php"><button class="btn btn-outline-warning" style="border-radius: 7px;"><svg xmlns="http://www.w3.org/2000/svg" width="23" height="23" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                            <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                            <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z" />
                                        </svg></button></a> -->
                                <a href="./cooperative_report_outline_print.php"><button class="btn btn-outline-success" style="border-radius: 7px;"><svg xmlns="http://www.w3.org/2000/svg" width="23" height="23" fill="currentColor" class="bi bi-printer-fill" viewBox="0 0 16 16">
                                            <path d="M5 1a2 2 0 0 0-2 2v1h10V3a2 2 0 0 0-2-2zm6 8H5a1 1 0 0 0-1 1v3a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1v-3a1 1 0 0 0-1-1" />
                                            <path d="M0 7a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v3a2 2 0 0 1-2 2h-1v-2a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v2H2a2 2 0 0 1-2-2zm2.5 1a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1" />
                                        </svg></button></a>
                            </td>
                        </tr>
                        <tr>
                            <td>7</td>
                            <td>KKUCP-T004_แบบบันทึกการนิเทศงานนักศึกษาสหกิจศึกษา</td>
                            <td>
                                <?php if ($row_recording["status_admin"] == 0) : ?>
                                    <span class="badge badge-pill badge-danger">ยังไม่กรอกฟอร์ม</span>
                                <?php elseif ($row_recording["status_admin"] == 1) : ?>
                                    <span class="badge badge-pill badge-warning">รอตรวจสอบ</span>
                                <?php elseif ($row_recording["status_admin"] == 2) : ?>
                                    <span class="badge badge-pill badge-success">ตรวจสอบแล้ว</span>
                                <?php elseif ($row_recording["status_admin"] == 3) : ?>
                                    <span class="badge badge-warning">มีข้อมูลต้องแก้ไข</span>
                                <?php elseif ($row_recording["status_admin"] == 4) : ?>
                                    <span class="badge badge-danger">ยกเลิก</span>
                                <?php endif; ?>
                            </td>
                            <td><a href="./supervision_recording_student_detail.php"><button class="btn btn-outline-primary" style="border-radius: 7px;"><svg xmlns="http://www.w3.org/2000/svg" width="23" height="23" fill="currentColor" class="bi bi-eye-fill" viewBox="0 0 16 16">
                                            <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0" />
                                            <path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8m8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7" />
                                        </svg></button></a>
                                <a href="./supervision_recording_student_print.php"><button class="btn btn-outline-success" style="border-radius: 7px;"><svg xmlns="http://www.w3.org/2000/svg" width="23" height="23" fill="currentColor" class="bi bi-printer-fill" viewBox="0 0 16 16">
                                            <path d="M5 1a2 2 0 0 0-2 2v1h10V3a2 2 0 0 0-2-2zm6 8H5a1 1 0 0 0-1 1v3a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1v-3a1 1 0 0 0-1-1" />
                                            <path d="M0 7a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v3a2 2 0 0 1-2 2h-1v-2a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v2H2a2 2 0 0 1-2-2zm2.5 1a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1" />
                                        </svg></button></a>
                            </td>
                        </tr>
                        <tr>
                            <td>8</td>
                            <td>KKUCP-T007_แบบฟอร์มรายงานการปฏิบัติสหกิจศึกษา</td>
                            <td>
                                <?php if ($row_education["status_admin"] == 0) : ?>
                                    <span class="badge badge-pill badge-danger">ยังไม่กรอกฟอร์ม</span>
                                <?php elseif ($row_education["status_admin"] == 1) : ?>
                                    <span class="badge badge-pill badge-warning">รอตรวจสอบ</span>
                                <?php elseif ($row_education["status_admin"] == 2) : ?>
                                    <span class="badge badge-pill badge-success">ตรวจสอบแล้ว</span>
                                <?php elseif ($row_education["status_admin"] == 3) : ?>
                                    <span class="badge badge-warning">มีข้อมูลต้องแก้ไข</span>
                                <?php elseif ($row_education["status_admin"] == 4) : ?>
                                    <span class="badge badge-danger">ยกเลิก</span>
                                <?php endif; ?>
                            </td>
                            <td><a href="./education_detail.php"><button class="btn btn-outline-primary" style="border-radius: 7px;"><svg xmlns="http://www.w3.org/2000/svg" width="23" height="23" fill="currentColor" class="bi bi-eye-fill" viewBox="0 0 16 16">
                                            <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0" />
                                            <path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8m8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7" />
                                        </svg></button></a>
                                <!-- <a href="./cooperative_education_edit.php"><button class="btn btn-outline-warning" style="border-radius: 7px;"><svg xmlns="http://www.w3.org/2000/svg" width="23" height="23" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                            <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                            <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z" />
                                        </svg></button></a> -->
                                <a href="./cooperative_education_print.php"><button class="btn btn-outline-success" style="border-radius: 7px;"><svg xmlns="http://www.w3.org/2000/svg" width="23" height="23" fill="currentColor" class="bi bi-printer-fill" viewBox="0 0 16 16">
                                            <path d="M5 1a2 2 0 0 0-2 2v1h10V3a2 2 0 0 0-2-2zm6 8H5a1 1 0 0 0-1 1v3a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1v-3a1 1 0 0 0-1-1" />
                                            <path d="M0 7a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v3a2 2 0 0 1-2 2h-1v-2a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v2H2a2 2 0 0 1-2-2zm2.5 1a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1" />
                                        </svg></button></a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <!-- /ส่วนของข้อมูล -->
        </div>
        <!-- /Page Wrapper -->
        <!-- ส่วนของข้อมูลทั้งหมด -->
    </div>
    <!-- /ส่วนของข้อมูล -->
    </div>
    <!-- /Page Wrapper -->
    </div>
    <!-- /Main Wrapper -->
    </div>
    </div>
    <!-- jQuery -->
    <script src="./assets/js/jquery-3.5.1.min.js"></script>

    <!-- Bootstrap Core JS -->
    <script src="./assets/js/popper.min.js"></script>
    <script src="./assets/js/bootstrap.min.js"></script>

    <!-- Slimscroll JS ตัวเลื่อนแทบข้างๆ -->
    <script src="./assets/js/jquery.slimscroll.min.js"></script>

    <!-- Chart JS ส่วนของกราฟ-->
    <script src="./assets/plugins/morris/morris.min.js"></script>
    <script src="./assets/plugins/raphael/raphael.min.js"></script>
    <script src="./assets/js/chart.js"></script>

    <!-- Custom JS -->
    <script src="./assets/js/app.js"></script>




    <script src="https://code.jquery.com/jquery-3.6.0.slim.min.js" integrity="sha256-u7e5khyithlIdTpu22PHhENmPcRdFiHRjhAuHcs05RI=" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
    <script src="../script.js"></script>
</body>

</html>