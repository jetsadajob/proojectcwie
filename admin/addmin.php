<?php
session_start();
include './work/dbwork.php';

if (!isset($_SESSION['id'])) {
    header('Location: ./registerr/login.php');
    exit();
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
    <title>ผู้ดูเเลระบบ</title>

    <!-- รูปโปรไฟล์ -->
    <link rel="shortcut icon" type="image/x-icon" href="./assets/img/profiles/Computing_KKU.svg.png">

    <!-- Bootstrap CSS -->
    <!-- <link rel="stylesheet" href="./assets/css/bootstrap.min.css"> -->


    <!-- ฟอน CSS -->
    <link rel="stylesheet" href="./assets/css/font-awesome.min.css">

    <!-- Lineawesome CSS -->
    <link rel="stylesheet" href="./assets/css/line-awesome.min.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans&family=Prompt&display=swap" rel="stylesheet">

    <!-- Main CSS ของส่วนข้อมูล-->
    <link rel="stylesheet" href="./assets/css/style.css">
    <link rel="stylesheet" href="./assets/css/addwork.css">
    <!-- <link rel="stylesheet" href="./assets/css/listastu.css"> -->


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="./assets/css/bootstrap.min.css">
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous"> -->


    <!-- Main CSS -->
    <!-- <link rel="stylesheet" href="./assets/css/style.css"> -->
    <link rel="stylesheet" href="./assets/css/style.css">


    <!-- ตัวหมุนๆ CSS -->
    <link rel="stylesheet" href="./assets/css/font-awesome.min.css">



    <!-- Bootstrap Core CSS -->
    <!-- <link href="./assets/css/bootstrap.min.css" rel="stylesheet"> -->

    <!-- <script src='/lib/jquery.min.js'></script> -->
    <!-- jQuery Version 1.11.1 -->
    <!-- <script src="./assets/js/jquery.js"></script> -->
    <script src="assets/js/jquery-3.5.1.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="./assets/js/bootstrap.min.js"></script>


    <!-- Slimscroll JS -->
    <script src="./assets/js/jquery.slimscroll.min.js"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>
    <script src="https://code.highcharts.com/modules/accessibility.js"></script>
    <script src="https://code.highcharts.com/modules/export-data.js"></script>


    <!-- Select2 CSS -->
    <link rel="stylesheet" href="./assets/css/select2.min.css">

    <!-- Datetimepicker CSS -->
    <link rel="stylesheet" href="./assets/css/bootstrap-datetimepicker.min.css">

    <!-- jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


    <!-- Slimscroll JS -->
    <script src="./assets/js/jquery.slimscroll.min.js"></script>

    <script src="https://code.highcharts.com/highcharts.js"></script>




    <style>
        .highcharts-figure,
        .highcharts-data-table table {
            min-width: 320px;
            max-width: 800px;
            margin: 1em auto;
        }

        .highcharts-data-table table {
            font-family: Verdana, sans-serif;
            border-collapse: collapse;
            border: 1px solid #ebebeb;
            margin: 10px auto;
            text-align: center;
            width: 100%;
            max-width: 500px;
        }

        .highcharts-data-table caption {
            padding: 1em 0;
            font-size: 1.2em;
            color: #555;
        }

        .highcharts-data-table th {
            font-weight: 600;
            padding: 0.5em;
        }

        .highcharts-data-table td,
        .highcharts-data-table th,
        .highcharts-data-table caption {
            padding: 0.5em;
        }

        .highcharts-data-table thead tr,
        .highcharts-data-table tr:nth-child(even) {
            background: #f8f8f8;
        }

        .highcharts-data-table tr:hover {
            background: #f1f7ff;
        }

        input[type="number"] {
            min-width: 50px;
        }

        .highcharts-figure,
        .highcharts-data-table table {
            min-width: 310px;
            max-width: 800px;
            margin: 1em auto;
        }

        #container {
            height: 400px;
        }

        .highcharts-data-table table {
            font-family: Verdana, sans-serif;
            border-collapse: collapse;
            border: 1px solid #ebebeb;
            margin: 10px auto;
            text-align: center;
            width: 100%;
            max-width: 500px;
        }

        .highcharts-data-table caption {
            padding: 1em 0;
            font-size: 1.2em;
            color: #555;
        }

        .highcharts-data-table th {
            font-weight: 600;
            padding: 0.5em;
        }

        .highcharts-data-table td,
        .highcharts-data-table th,
        .highcharts-data-table caption {
            padding: 0.5em;
        }

        .highcharts-data-table thead tr,
        .highcharts-data-table tr:nth-child(even) {
            background: #f8f8f8;
        }

        .highcharts-data-table tr:hover {
            background: #f1f7ff;
        }
    </style>



</head>

<body>
    <!--ส่วนของเมนูบลาเเละเเทบข้าง  -->
    <?php include('nav_admin.php'); ?>
    <!--ส่วนของเมนูบลาเเละเเทบข้าง  -->

    <!-- ส่วนของข้อมูลทั้งหมด -->
    <div class="page-wrapper">




        <!-- ส่วนของข้อมูล -->
        <div class="content container-fluid mt-5">

            <!-- Page Header -->
            <div class="page-header">
                <div class="row">
                    <div class="col-sm-12">
                        <h3 class="page-title">ยินดีต้อนรับ Admin!</h3>

                    </div>
                </div>
            </div>

            <!-- ส่วนของข้อมูลทั้งหมด -->
            <!-- Page Heading -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h5 mb-0 text-gray-900">Dashboard</h1>

            </div>

            <!-- ป้ายเเดชบอร์ด Row -->
            <div class="row">

                <!-- Earnings (Monthly) Card Example -->
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-primary shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1"> ผู้ใช้ทั้งหมด</div>

                                    <?php
                                    // ตรวจสอบการเชื่อมต่อและตั้งค่าการเชื่อมต่อที่นี่...
                                    // รับจำนวนนักศึกษาสหกิจศึกษา
                                    $result_coop = $conn->query("SELECT COUNT(*) FROM login_student WHERE role = 'cooperative_student'");
                                    $coopCount = $result_coop->fetch_row()[0];

                                    // รับจำนวนนักศึกษาฝึกงาน
                                    $result_intern = $conn->query("SELECT COUNT(*) FROM login_student WHERE role = 'internship_student'");
                                    $internCount = $result_intern->fetch_row()[0];

                                    // รับจำนวนสถานประกอบการ
                                    $result_hr = $conn->query("SELECT COUNT(*) FROM hr");
                                    $hrCount = $result_hr->fetch_row()[0];




                                    // รับจำนวนผู้ใช้จากตาราง hr
                                    $sql_hr = "SELECT COUNT(*) FROM hr";
                                    $query_hr = $conn->prepare($sql_hr);
                                    if ($query_hr) {
                                        $query_hr->execute();
                                        $query_hr->bind_result($hrCount);
                                        $query_hr->fetch();
                                        $query_hr->close();
                                    } else {
                                        die("เกิดข้อผิดพลาดในการเตรียมคำสั่ง SQL สำหรับตาราง hr");
                                    }

                                    // รับจำนวนผู้ใช้จากตาราง login_student
                                    $sql_student = "SELECT COUNT(*) FROM login_student";
                                    $query_student = $conn->prepare($sql_student);
                                    if ($query_student) {
                                        $query_student->execute();
                                        $query_student->bind_result($studentCount);
                                        $query_student->fetch();
                                        $query_student->close();
                                    } else {
                                        die("เกิดข้อผิดพลาดในการเตรียมคำสั่ง SQL สำหรับตาราง login_student");
                                    }

                                    // รับจำนวนผู้ใช้จากตาราง login_student
                                    $sql_teacher = "SELECT COUNT(*) FROM login_teacher";
                                    $query_teacher = $conn->prepare($sql_teacher);
                                    if ($query_teacher) {
                                        $query_teacher->execute();
                                        $query_teacher->bind_result($teacherCount);
                                        $query_teacher->fetch();
                                        $query_teacher->close();
                                    } else {
                                        die("เกิดข้อผิดพลาดในการเตรียมคำสั่ง SQL สำหรับตาราง login_teacher");
                                    }

                                    // รวมจำนวนผู้ใช้จากทั้งสองตาราง
                                    $totalUsers = $hrCount + $studentCount + $teacherCount;

                                    echo "<div class='h5 mb-0 font-weight-bold text-gray-800'> " . $totalUsers . "</div>";




                                    ?>
                                </div>
                                <div class="col-auto">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-people-fill text-gray-500" viewBox="0 0 16 16">
                                        <path d="M7 14s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1H7Zm4-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6Zm-5.784 6A2.238 2.238 0 0 1 5 13c0-1.355.68-2.75 1.936-3.72A6.325 6.325 0 0 0 5 9c-4 0-5 3-5 4s1 1 1 1h4.216ZM4.5 8a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5Z" />
                                    </svg>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- นักศึกษาสหกิจ -->
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-success shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                        นักศึกษา</div>
                                    <?php
                                    // ตรวจสอบการเชื่อมต่อและตั้งค่าการเชื่อมต่อที่นี่...

                                    $sql = "SELECT COUNT(*) FROM login_student "; // ตรวจสอบชื่อตารางที่ถูกต้อง
                                    $query = $conn->prepare($sql);

                                    if ($query) {
                                        $query->execute();
                                        $query->bind_result($usersCount);
                                        $query->fetch();

                                        echo "<div class='h5 mb-0 font-weight-bold text-gray-800'>" . $usersCount . "</div>";

                                        $query->close();
                                    } else {
                                        echo "เกิดข้อผิดพลาดในการเตรียมคำสั่ง SQL";
                                    }


                                    ?>
                                </div>
                                <div class="col-auto">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-people-fill text-gray-500" viewBox="0 0 16 16">
                                        <path d="M14 9.5a2 2 0 1 1-4 0 2 2 0 0 1 4 0Zm-6 5.7c0 .8.8.8.8.8h6.4s.8 0 .8-.8-.8-3.2-4-3.2-4 2.4-4 3.2Z" />
                                        <path d="M2 2a2 2 0 0 0-2 2v8a2 2 0 0 0 2 2h5.243c.122-.326.295-.668.526-1H2a1 1 0 0 1-1-1V4a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v7.81c.353.23.656.496.91.783.059-.187.09-.386.09-.593V4a2 2 0 0 0-2-2H2Z" />
                                    </svg>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>




                <!-- นักศึกษาฝึกงาน -->
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-info shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-info text-uppercase mb-1">อารจาย์
                                    </div>
                                    <?php
                                    // ตรวจสอบการเชื่อมต่อและตั้งค่าการเชื่อมต่อที่นี่...

                                    $sql = "SELECT COUNT(*) FROM login_teacher "; // ตรวจสอบชื่อตารางที่ถูกต้อง
                                    $query = $conn->prepare($sql);

                                    if ($query) {
                                        $query->execute();
                                        $query->bind_result($usersCount);
                                        $query->fetch();

                                        echo "<div class='h5 mb-0 font-weight-bold text-gray-800'>" . $usersCount . "</div>";

                                        $query->close();
                                    } else {
                                        echo "เกิดข้อผิดพลาดในการเตรียมคำสั่ง SQL";
                                    }


                                    ?>
                                </div>
                                <div class="col-auto">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-people-fill text-gray-500" viewBox="0 0 16 16">
                                        <path d="M4 16s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1H4Zm4-5.95a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5Z" />
                                        <path d="M2 1a2 2 0 0 0-2 2v9.5A1.5 1.5 0 0 0 1.5 14h.653a5.373 5.373 0 0 1 1.066-2H1V3a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v9h-2.219c.554.654.89 1.373 1.066 2h.653a1.5 1.5 0 0 0 1.5-1.5V3a2 2 0 0 0-2-2H2Z" />
                                    </svg>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>




                <!-- ประการรับสมัครงาน -->
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-warning shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-warning text-uppercase mb-1"> สถานประกอบการ </div>
                                    <?php
                                    // ตรวจสอบการเชื่อมต่อและตั้งค่าการเชื่อมต่อที่นี่...

                                    $sql = "SELECT COUNT(*) FROM hr "; // ตรวจสอบชื่อตารางที่ถูกต้อง
                                    $query = $conn->prepare($sql);

                                    if ($query) {
                                        $query->execute();
                                        $query->bind_result($usersCount);
                                        $query->fetch();

                                        echo "<div class='h5 mb-0 font-weight-bold text-gray-800'>" . $usersCount . "</div>";

                                        $query->close();
                                    } else {
                                        echo "เกิดข้อผิดพลาดในการเตรียมคำสั่ง SQL";
                                    }
                                    // $conn->close();

                                    ?>
                                </div>

                                <div class="col-auto">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-people-fill text-gray-500" viewBox="0 0 16 16">
                                        <path d="M14.763.075A.5.5 0 0 1 15 .5v15a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5V14h-1v1.5a.5.5 0 0 1-.5.5h-9a.5.5 0 0 1-.5-.5V10a.5.5 0 0 1 .342-.474L6 7.64V4.5a.5.5 0 0 1 .276-.447l8-4a.5.5 0 0 1 .487.022ZM6 8.694 1 10.36V15h5V8.694ZM7 15h2v-1.5a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 .5.5V15h2V1.309l-7 3.5V15Z" />
                                        <path d="M2 11h1v1H2v-1Zm2 0h1v1H4v-1Zm-2 2h1v1H2v-1Zm2 0h1v1H4v-1Zm4-4h1v1H8V9Zm2 0h1v1h-1V9Zm-2 2h1v1H8v-1Zm2 0h1v1h-1v-1Zm2-2h1v1h-1V9Zm0 2h1v1h-1v-1ZM8 7h1v1H8V7Zm2 0h1v1h-1V7Zm2 0h1v1h-1V7ZM8 5h1v1H8V5Zm2 0h1v1h-1V5Zm2 0h1v1h-1V5Zm0-2h1v1h-1V3Z" />
                                    </svg>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- ป้ายเเดชบอร์ด Row -->

            <div class="row">

                <!-- Bar Chart -->
                <div class="col-xl-6 col-lg-12">
                    <?php

                    // ฟังก์ชันสำหรับดึงจำนวนอาจารย์
                    function getTeacherCount($conn, $role, $major)
                    {
                        $query = "SELECT COUNT(*) FROM login_teacher WHERE role = '$role' AND major = '$major'";
                        $result = $conn->query($query);
                        return $result->fetch_row()[0];
                    }

                    // รับจำนวนอาจารย์สำหรับแต่ละประเภทและแต่ละสาขา
                    $advisorCountIT = getTeacherCount($conn, 'advisor', 'เทคโนโลยีสารสนเทศ');
                    $supervisionCountIT = getTeacherCount($conn, 'supervision_teacher', 'เทคโนโลยีสารสนเทศ');
                    $courseCountIT = getTeacherCount($conn, 'course_instructor', 'เทคโนโลยีสารสนเทศ');

                    $advisorCountCS = getTeacherCount($conn, 'advisor', 'วิทยาการคอมพิวเตอร์');
                    $supervisionCountCS = getTeacherCount($conn, 'supervision_teacher', 'วิทยาการคอมพิวเตอร์');
                    $courseCountCS = getTeacherCount($conn, 'course_instructor', 'วิทยาการคอมพิวเตอร์');

                    $advisorCountGIS = getTeacherCount($conn, 'advisor', 'ภูมิสารสนเทศศาสตร์');
                    $supervisionCountGIS = getTeacherCount($conn, 'supervision_teacher', 'ภูมิสารสนเทศศาสตร์');
                    $courseCountGIS = getTeacherCount($conn, 'course_instructor', 'ภูมิสารสนเทศศาสตร์');

                    $advisorCountAI = getTeacherCount($conn, 'advisor', 'ปัญญาประดิษฐ์');
                    $supervisionCountAI = getTeacherCount($conn, 'supervision_teacher', 'ปัญญาประดิษฐ์');
                    $courseCountAI = getTeacherCount($conn, 'course_instructor', 'ปัญญาประดิษฐ์');

                    $advisorCountCB = getTeacherCount($conn, 'advisor', 'ความมั่นคงปลอดภัยไซเบอร์');
                    $supervisionCountCB = getTeacherCount($conn, 'supervision_teacher', 'ความมั่นคงปลอดภัยไซเบอร์');
                    $courseCountCB = getTeacherCount($conn, 'course_instructor', 'ความมั่นคงปลอดภัยไซเบอร์');







                    ?>
                    <script>
                        var advisorCountIT = <?= $advisorCountIT; ?>;
                        var supervisionCountIT = <?= $supervisionCountIT; ?>;
                        var courseCountIT = <?= $courseCountIT; ?>;

                        var advisorCountCS = <?= $advisorCountCS; ?>;
                        var supervisionCountCS = <?= $supervisionCountCS; ?>;
                        var courseCountCS = <?= $courseCountCS; ?>;

                        var advisorCountGIS = <?= $advisorCountGIS; ?>;
                        var supervisionnCountGIS = <?= $supervisionCountGIS; ?>;
                        var courseCountGIS = <?= $courseCountGIS; ?>;

                        var advisorCountAI = <?= $advisorCountAI; ?>;
                        var supervisionCountAI = <?= $supervisionCountAI; ?>;
                        var courseCountAI = <?= $courseCountAI; ?>;

                        var advisorCountCB = <?= $advisorCountCB; ?>;
                        var supervisionCountCB = <?= $supervisionCountCB; ?>;
                        var courseCountCB = <?= $courseCountCB; ?>;
                    </script>
                    <div class="card shadow mb-4">
                        <!-- Card Header - Dropdown -->
                        <div class="card-header py-3 ">
                            <h6 class="m-0 font-weight-bold text-primary text-center">จำนวนอาจารย์แต่ละหลักสูตร (แบ่งตามสาขาวิชาที่ประจำอยู่)</h6>


                        </div>
                        <!-- Card Body -->
                        <div class="card-body">
                            <div id="allmajorteacher"></div>
                        </div>

                    </div>
                    <script>
                        Highcharts.chart('allmajorteacher', {
                            chart: {
                                type: 'column'
                            },
                            title: {
                                text: '',
                                align: 'left'
                            },
                            xAxis: {
                                categories: ['เทคโนโลยีสารสนเทศ', 'วิทยาการคอมพิวเตอร์', 'ภูมิสารสนเทศศาสตร์', 'ปัญญาประดิษฐ์', 'ความมั่นคงปลอดภัยไซเบอร์'],
                                title: {
                                    text: 'สาขาวิชา'
                                }
                            },
                            yAxis: {
                                min: 0,
                                title: {
                                    text: 'จำนวนอาจารย์'
                                },
                                stackLabels: {
                                    enabled: true
                                }
                            },
                            legend: {
                                align: 'center',
                                x: 0,
                                verticalAlign: 'top',
                                y: 0,
                                floating: true,
                                backgroundColor: Highcharts.defaultOptions.legend.backgroundColor || 'white',
                                borderColor: '#CCC',
                                borderWidth: 1,
                                shadow: false
                            },
                            tooltip: {
                                headerFormat: '<b>{point.x}</b><br/>',
                                pointFormat: '{series.name}: {point.y}<br/>จำนวนอาจจารย์ทั้งหมด: {point.stackTotal}'
                            },
                            plotOptions: {
                                column: {
                                    stacking: 'normal',
                                    dataLabels: {
                                        enabled: true
                                    }
                                }
                            },
                            series: [{
                                name: 'อาจารย์ที่ปรึกษา',
                                data: [advisorCountIT, advisorCountCS, advisorCountGIS, advisorCountAI, advisorCountCB]
                            }, {
                                name: 'อาจารย์นิเทศ',
                                data: [supervisionCountIT, supervisionCountCS, supervisionnCountGIS, supervisionCountAI, supervisionCountCB]
                            }, {
                                name: 'อาจารย์ประจำวิชาสหกิจ',
                                data: [courseCountIT, courseCountCS, courseCountGIS, courseCountAI, courseCountCB]

                            }]
                        });
                    </script>
                </div>





                <div class="col-xl-6 col-lg-12">
                    <?php
                    // ดึงข้อมูลจำนวนนักศึกษาสหกิจศึกษา
                    $sql_coop = "SELECT COUNT(*) FROM login_student WHERE role = 'cooperative_student'";
                    $result_coop = $conn->query($sql_coop);
                    $coopCount = $result_coop->fetch_row()[0];

                    // ดึงข้อมูลจำนวนนักศึกษาฝึกงาน
                    $sql_intern = "SELECT COUNT(*) FROM login_student WHERE role = 'internship_student'";
                    $result_intern = $conn->query($sql_intern);
                    $internCount = $result_intern->fetch_row()[0];

                    // ดึงข้อมูลจำนวนสถานประกอบการ
                    $sql_hr = "SELECT COUNT(*) FROM hr";
                    $result_hr = $conn->query($sql_hr);
                    $hrCount = $result_hr->fetch_row()[0];

                    // ดึงข้อมูลจำนวนอาจารย์ที่เป็น Advisor
                    $sql_tcr_advisor = "SELECT COUNT(*) FROM login_teacher WHERE role = 'advisor'";
                    $result_tcr_advisor = $conn->query($sql_tcr_advisor);
                    $advisorCount = $result_tcr_advisor->fetch_row()[0];

                    // ดึงข้อมูลจำนวนอาจารย์ที่เป็น Supervision Teacher
                    $sql_tcr_super = "SELECT COUNT(*) FROM login_teacher WHERE role = 'supervision_teacher'";
                    $result_tcr_super = $conn->query($sql_tcr_super);
                    $supervisionCount = $result_tcr_super->fetch_row()[0];

                    // ดึงข้อมูลจำนวนอาจารย์ที่เป็น Course Instructor
                    $sql_tcr_course = "SELECT COUNT(*) FROM login_teacher WHERE role = 'course_instructor'";
                    $result_tcr_course = $conn->query($sql_tcr_course);
                    $courseCount = $result_tcr_course->fetch_row()[0];
                    ?>
                    <script>
                        // กำหนดค่าข้อมูลที่ได้จาก PHP เพื่อใช้ในกราฟ
                        var coopCount = <?= $coopCount; ?>;
                        var internCount = <?= $internCount; ?>;
                        var hrCount = <?= $hrCount; ?>;
                        var advisorCount = <?= $advisorCount; ?>;
                        var supervisionCount = <?= $supervisionCount; ?>;
                        var courseCount = <?= $courseCount; ?>;
                    </script>

                    <div class="card shadow mb-4">

                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary text-center">จำนวนผู้ใช้แต่ละประเภท</h6>
                        </div>




                        <div class="card-body">
                            <div id="container"></div>
                        </div>




                    </div>

                    <script>
                        // Data retrieved from https://netmarketshare.com/
                        // Make monochrome colors
                        const colors = Highcharts.getOptions().colors.map((c, i) =>
                            // Start out with a darkened base color (negative brighten), and end
                            // up with a much brighter color
                            Highcharts.color(Highcharts.getOptions().colors[0])
                            .brighten((i - 3) / 7)
                            .get()
                        );

                        // Build the chart
                        Highcharts.chart('container', {
                            chart: {
                                plotBackgroundColor: null,
                                plotBorderWidth: null,
                                plotShadow: false,
                                type: 'pie'
                            },
                            title: {
                                text: '',
                                align: 'center'
                            },
                            tooltip: {
                                // pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'

                                //  pointFormat: '{series.name}:<b>{series.data:} คน</b>'

                                // pointFormat: '{point.name}: <b>{point.percentage:.1f}%</b> คน'
                            },
                            accessibility: {
                                point: {
                                    valueSuffix: ' คน'
                                }
                            },
                            plotOptions: {
                                pie: {
                                    allowPointSelect: true,
                                    cursor: 'pointer',
                                    colors,
                                    borderRadius: 5,
                                    dataLabels: {
                                        enabled: true,
                                        format: '<b>{point.name}</b><br>{point.percentage:.1f} %',
                                        distance: -50,
                                        filter: {
                                            property: 'percentage',
                                            operator: '>',
                                            value: 4
                                        }
                                    }
                                }
                            },
                            series: [{
                                name: 'จำนวนผู้ใช้',
                                data: [{
                                        name: 'นักศึกษาสหกิจศึกษา',
                                        y: coopCount
                                    },
                                    {
                                        name: 'นักศึกษาฝึกงาน',
                                        y: internCount
                                    },
                                    {
                                        name: 'สถานประกอบการ',
                                        y: hrCount
                                    },
                                    {
                                        name: 'อาจารย์ที่่ปรึกษา',
                                        y: advisorCount
                                    },
                                    {
                                        name: 'อาจารย์นิเทศ',
                                        y: supervisionCount
                                    },
                                    {
                                        name: 'อาจารย์ประจำวิชา',
                                        y: courseCount
                                    }
                                ]

                            }]

                        });
                    </script>
                </div>

                <!-- Area Chart -->
                <div class="col-xl-12 col-lg-12">
                    <div class="card shadow mb-4">
                        <!-- Card Header - Dropdown -->
                        <div class="card-header py-3  ">
                            <h6 class="m-0 font-weight-bold text-primary text-center">จำนวนนักศึกษาที่สหกิจเเละฝึกงานในเเต่ละปี</h6>
                            <?php
                            include './work/dbwork.php';

                            $query = "SELECT YEAR(created_at) AS year, role, COUNT(*) AS total
                            FROM login_student
                            GROUP BY YEAR(created_at), role
                            ORDER BY YEAR(created_at) ASC";
                            $result = $conn->query($query);

                            $years = [];
                            $coop_data = [];
                            $intern_data = [];

                            while ($row = $result->fetch_assoc()) {
                                $year = $row['year'];
                                $role = $row['role'];
                                $total = $row['total'];

                                if (!in_array($year, $years)) {
                                    $years[] = $year;
                                }

                                if ($role == 'cooperative_student') {
                                    $coop_data[$year] = $total;
                                } elseif ($role == 'internship_student') {
                                    $intern_data[$year] = $total;
                                }
                            }

                            // แปลงข้อมูลให้อยู่ในรูปแบบที่สามารถใช้ใน Highcharts
                            $chart_data_coop = [];
                            $chart_data_intern = [];
                            foreach ($years as $year) {
                                $chart_data_coop[] = isset($coop_data[$year]) ? (int)$coop_data[$year] : 0;
                                $chart_data_intern[] = isset($intern_data[$year]) ? (int)$intern_data[$year] : 0;
                            }
                            ?>


                        </div>
                        <!-- Card Body -->
                        <div class="card-body">
                            <div id="containertt"></div>
                        </div>

                    </div>


                    <script>
                        Highcharts.chart('containertt', {
                            chart: {
                                type: 'column'
                            },
                            title: {
                                text: ' ',
                                align: 'center'
                            },
                            xAxis: {
                                categories: <?php echo json_encode($years); ?>,
                                crosshair: true
                            },
                            yAxis: {
                                min: 0,
                                title: {
                                    text: 'จำนวน (คน)'
                                }
                            },
                            tooltip: {
                                headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                                pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                                    '<td style="padding:0"><b>{point.y} คน</b></td></tr>',
                                footerFormat: '</table>',
                                shared: true,
                                useHTML: true
                            },
                            plotOptions: {
                                column: {
                                    pointPadding: 0.2,
                                    borderWidth: 0
                                }
                            },
                            series: [{
                                name: 'นักศึกษาสหกิจศึกษา',
                                data: <?php echo json_encode($chart_data_coop); ?>
                            }, {
                                name: 'นักศึกษาฝึกงาน',
                                data: <?php echo json_encode($chart_data_intern); ?>
                            }]
                        });
                    </script>

                </div>

            </div>





        </div>
        <!-- /.container-fluid -->





    </div>
    <!-- /ส่วนของข้อมูล -->


    </div>
    <!-- /Page Wrapper -->



    <!-- jQuery -->
    <script src="./assets/js/jquery-3.5.1.min.js"></script>

    <!-- Bootstrap Core JS -->
    <script src="./assets/js/popper.min.js"></script>
    <script src="./assets/js/bootstrap.min.js"></script>

    <!-- Slimscroll JS ตัวเลื่อนแทบข้างๆ -->
    <script src="./assets/js/jquery.slimscroll.min.js"></script>

    <!-- Custom JS -->
    <script src="./assets/js/app.js"></script>




    <!-- Tagsinput JS -->
    <!-- <script src="assets/plugins/bootstrap-tagsinput/bootstrap-tagsinput.min.js"></script>


        <script src="assets/plugins/sticky-kit-master/dist/sticky-kit.min.js"></script> -->





    <!-- Select2 JS -->
    <!-- <script src=".assets/js/select2.min.js"></script> -->



    <!-- Datetimepicker JS -->
    <!-- <script src=".assets/js/moment.min.js"></script>
        <script src=".assets/js/bootstrap-datetimepicker.min.js"></script> -->

    <!-- Custom JS -->
    <!-- <script src=".assets/js/app.js"></script>

        <script src="./script.js"></script> -->






</body>







</html>
<?php

mysqli_close($conn);
?>