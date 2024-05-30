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
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>รายงานอาจารย์</title>

    <!-- รูปโปรไฟล์ -->
    <link rel="shortcut icon" type="image/x-icon" href="./assets/img/profiles/Computing_KKU.svg.png">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="./assets/css/bootstrap.min.css">
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous"> -->


    <!-- Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans&family=Prompt&display=swap" rel="stylesheet">

    <!-- Lineawesome CSS -->
    <link rel="stylesheet" href="assets/css/line-awesome.min.css">

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <!-- Boxicons -->
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>

    <!-- ไอคอน -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <iink rel="stylesheet" href="./dashbord/css/dashbord.css">

        <!-- Main CSS -->
        <link rel="stylesheet" href="./assets/css/style.css">


        <script src="https://code.highcharts.com/highcharts.js"></script>
        <script src="https://code.highcharts.com/modules/exporting.js"></script>
        <script src="https://code.highcharts.com/modules/accessibility.js"></script>
        <script src="https://code.highcharts.com/modules/export-data.js"></script>



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
    <!-- ======= Header ======= -->
    <?php include('nav_admin.php'); ?>
    <!-- End Header -->

    <!-- ส่วนของข้อมูลทั้งหมด -->
    <div class="page-wrapper">

        <!-- ส่วนของข้อมูล -->
        <div class="content container-fluid mt-5">

            <!-- Page Header -->
            <div class="page-header ">
                <div class="row">
                    <div class="col-sm-12">
                        <h3 class="page-title text-center">รายงานอาจารย์</h3>

                    </div>
                </div>
            </div>



            <div class="row  mb-2 col-2">
                <?php
                // ทำการเชื่อมต่อกับฐานข้อมูล
                include './work/dbwork.php';

                // ทำการคำสั่ง SQL เพื่อดึงข้อมูลปีการศึกษาจากตาราง login_teacher โดยใช้ DISTINCT เพื่อไม่ให้มีการซ้ำข้อมูล
                $sql_years = "SELECT DISTINCT YEAR(created_at) AS year FROM login_teacher";
                $result_years = $conn->query($sql_years);
                ?>
                <div class="col">
                    <div class="boxfilter">
                        <fieldset>
                            <legend class="text-xs text-uppercase mb-2">ปีการศึกษา</legend>
                            <select class="form-select form-select-sm" aria-label="Small select example" id="created_at" name="created_at" onchange="updateGraph()">
                                <script>
                                    function updateGraph() {
                                        var year = document.getElementById("created_at").value;
                                        if (year === "ทั้งหมด") {
                                            year = "all"; // ใช้ค่าพิเศษเพื่อบ่งบอกว่าเลือก "ทั้งหมด"
                                        }
                                        updateGraph1(year); // สมมติว่าฟังก์ชันนี้รองรับการส่งค่าปี
                                        updateGraph2(year); // สมมติว่าฟังก์ชันนี้รองรับการส่งค่าปี
                                        // updateGraph3(year); // สมมติว่าฟังก์ชันนี้รองรับการส่งค่าปี
                                    }
                                </script>


                                <option selected>ทั้งหมด</option>
                                <?php
                                // วนลูปเพื่อแสดงรายชื่อปีการศึกษาที่มีอยู่ในฐานข้อมูล
                                if ($result_years->num_rows > 0) {
                                    while ($row = $result_years->fetch_assoc()) {
                                        echo "<option value='" . $row['year'] . "'>" . $row['year'] . "</option>";
                                    }
                                }
                                ?>
                            </select>

                        </fieldset>
                    </div>
                </div>
                <!-- <div class="col">
                        <div class="boxfilter">
                            <fieldset>
                                <legend class="text-xs  text-uppercase mb-1">ปีการศึกษา</legend>

                                <select class="form-select form-select-sm" aria-label="Small select example">
                                    <option selected>ทั้งหมด</option>
                                    <option value="2566">2566</option>
                                    <option value="2565">2565</option>
                                    <option value="2564">2564</option>
                                </select>
                            </fieldset>
                        </div>
                    </div> -->

                <!-- <div class="col">
                    <div class="boxfilter">
                        <fieldset>
                            <legend class="text-xs  text-uppercase mb-1">ประเภทอาจารย์</legend>
                            <select id="teacherType" class="form-select form-select-sm" aria-label="Small select example">
                                <option selected value="all">ทั้งหมด</option>
                                <option value="advisor">อาจารย์ที่ปรึกษา</option>
                                <option value="supervision">อาจารย์นิเทศ</option>
                                <option value="courseInstructor">อาจารย์ประจำวิชาสหกิจ</option>
                            </select>
                        </fieldset>
                    </div>
                </div> -->
            </div>


            <!-- ป้ายเเดชบอร์ด Row -->
            <div class="row">

                <!-- Earnings (Monthly) Card Example -->
                <div class="col-xl-3 col-md-6 ">
                    <div class="card  shadow  ">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col ">
                                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1"> ผู้ใช้ทั้งหมด</div>

                                    <?php
                                    // ตรวจสอบการเชื่อมต่อและตั้งค่าการเชื่อมต่อที่นี่...
                                    // อาจารย์ที่ปรึกษา
                                    $result_advisor = $conn->query("SELECT COUNT(*) FROM login_teacher WHERE role = 'advisor'");
                                    $advisorCount = $result_advisor->fetch_row()[0];

                                    // อาจารญืนิเทศ
                                    $result_supervision = $conn->query("SELECT COUNT(*) FROM login_teacher WHERE role = 'supervision_teacher'");
                                    $supervisionCount = $result_supervision->fetch_row()[0];

                                    // อาจารย์ประจำวิชา
                                    $result_course = $conn->query("SELECT COUNT(*) FROM login_teacher WHERE role = 'course_instructor'");
                                    $courseCount = $result_course->fetch_row()[0];


                                    // รับจำนวนผู้ใช้จากตาราง login_teacher
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
                                    $totalUsers =  $teacherCount;

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
                <div class="col-xl-3 col-md-6 ">
                    <div class="card  shadow  ">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                        อาจารย์ที่ปรึกษา</div>
                                    <?php
                                    // ตรวจสอบการเชื่อมต่อและตั้งค่าการเชื่อมต่อที่นี่...

                                    $sql = "SELECT COUNT(*) FROM login_teacher WHERE role = 'advisor'"; // ตรวจสอบชื่อตารางที่ถูกต้อง
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
                <div class="col-xl-3 col-md-6 ">
                    <div class="card  shadow  ">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-info text-uppercase mb-1">อาจารย์นิเทศ
                                    </div>
                                    <?php
                                    // ตรวจสอบการเชื่อมต่อและตั้งค่าการเชื่อมต่อที่นี่...

                                    $sql = "SELECT COUNT(*) FROM login_teacher WHERE role = 'course_instructor'"; // ตรวจสอบชื่อตารางที่ถูกต้อง
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

                <!-- นักศึกษาฝึกงาน -->
                <div class="col-xl-3 col-md-6 ">
                    <div class="card  shadow  ">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-info text-uppercase mb-1">อาจารย์ประจำวิชาสหกิจ
                                    </div>
                                    <?php
                                    // ตรวจสอบการเชื่อมต่อและตั้งค่าการเชื่อมต่อที่นี่...

                                    $sql = "SELECT COUNT(*) FROM login_teacher WHERE role = 'internship_student'"; // ตรวจสอบชื่อตารางที่ถูกต้อง
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
                <!-- <div class="col-xl-3 col-md-6 ">
                        <div class="card  shadow  ">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-warning text-uppercase mb-1"> สถานประกอบการ </div>

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
                    </div> -->

            </div>



            <!------------------------------------------------------------------------------------แดชบอร์ด----------------------------------------------------------------------------------------------- -->

            <!-- <div class="row">
                    <div class="col-xl-4 col-lg-12">

                        <div class="card shadow mb-0">
                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-primary text-center">จำนวนนักศึกษาแต่ละประเภท</h6>
                            </div>
                            <div class="card-body">

                                <canvas id="pieChart" style="width:100%;max-width:600px"></canvas>

                            </div>
                        </div>
                    </div> -->

            <div class="row">
                <div class="col-xl-4 col-lg-12">
                    <?php
                    $sql_advisor = "SELECT COUNT(*) FROM login_teacher WHERE role = 'advisor'";
                    // รับจำนวนนักศึกษาฝึกงาน
                    $sql_supervision = "SELECT COUNT(*) FROM login_teacher WHERE role = 'supervision_teacher'";
                    // รับจำนวนสถานประกอบการ
                    $sql_course = "SELECT COUNT(*) FROM login_teacher WHERE role = 'course_instructor' ";
                    ?>
                    <script>
                        var advisorCount = <?= $advisorCount; ?>;
                        var supervisionCount = <?= $supervisionCount; ?>;
                        var courseCount = <?= $courseCount; ?>;
                    </script>


                    <div class="card shadow mb-4">

                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary text-center">จำนวนอาจารย์แต่ละประเภท</h6>
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
                                pointFormat: '<b>{point.percentage:.1f}%</b>'
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
                                    dataLabels: {
                                        enabled: true,
                                        format: '<b>{point.name}</b>: {point.percentage:.1f} %',
                                        distance: -50
                                    }
                                }
                            },
                            series: [{
                                name: 'จำนวนอาจารย์',
                                data: [{
                                        name: 'อาจารย์ที่ปรึกษา',
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

                        function updatepieChart(graphData1) {
                            var advisorCount = 0;
                            var supervisionCount = 0;
                            var courseCount = 0;

                            // ปรับปรุงการนับจำนวนอาจารย์ตามประเภท
                            for (var i = 0; i < graphData1.length; i++) {
                                if (graphData1[i].role === 'advisor') {
                                    advisorCount = parseInt(graphData1[i].count);
                                }
                                if (graphData1[i].role === 'supervision_teacher') {
                                    supervisionCount = parseInt(graphData1[i].count);
                                }
                                if (graphData1[i].role === 'course_instructor') {
                                    courseCount = parseInt(graphData1[i].count);
                                }
                            }

                            // สร้างกราฟ Pie Chart ใหม่
                            var chart = Highcharts.chart('container', {
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
                                    pointFormat: '<b>{point.percentage:.1f}%</b>'
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
                                        dataLabels: {
                                            enabled: true,
                                            format: '<b>{point.name}</b>: {point.percentage:.1f} %',
                                            distance: -50
                                        }
                                    }
                                },
                                series: [{
                                    name: 'จำนวนอาจารย์',
                                    data: [{
                                            name: 'อาจารย์ที่ปรึกษา',
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
                        }
                    </script>
                </div>



                <div class="col-xl-8 col-lg-12">
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


                        function updateChart(graphData2) {
                            var categories = ['เทคโนโลยีสารสนเทศ', 'วิทยาการคอมพิวเตอร์', 'ภูมิสารสนเทศศาสตร์', 'ปัญญาประดิษฐ์', 'ความมั่นคงปลอดภัยไซเบอร์'];

                            var advisorCounts = [];
                            var supervisionCounts = [];
                            var courseCounts = [];

                            // กำหนดค่าให้กับ arrays ตามข้อมูลที่ได้รับ
                            for (var i = 0; i < graphData2.length; i++) {
                                var data = graphData2[i];
                                if (data.role === 'advisor') {
                                    advisorCounts.push(parseInt(data.count));
                                } else if (data.role === 'supervision_teacher') {
                                    supervisionCounts.push(parseInt(data.count));
                                } else if (data.role === 'course_instructor') {
                                    courseCounts.push(parseInt(data.count));
                                }
                            }

                            // สร้างกราฟ Column Chart ใหม่
                            Highcharts.chart('allmajorteacher', {
                                chart: {
                                    type: 'column'
                                },
                                title: {
                                    text: '',
                                    align: 'left'
                                },
                                xAxis: {
                                    categories: categories,
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
                                    data: advisorCounts
                                }, {
                                    name: 'อาจารย์นิเทศ',
                                    data: supervisionCounts
                                }, {
                                    name: 'อาจารย์ประจำวิชาสหกิจ',
                                    data: courseCounts
                                }]
                            });
                        }
                    </script>

                </div>




                <div class="col-xl-12 col-lg-12">
                    <div class="card shadow mb-4">
                        <!-- Card Header - Dropdown -->
                        <div class="card-header py-3  ">
                            <h6 class="m-0 font-weight-bold text-primary text-center">จำนวนนักศึกษาที่อาจารย์ที่ปรึกษาทีดูเเล</h6>
                            <div class="col">
                                <div class="boxfilter">
                                    <fieldset>
                                        <!-- <legend class="text-xs text-uppercase mb-2">ปีการศึกษา</legend> -->
                                        <select class="form-select form-select-sm" aria-label="Small select example" id="created_at" name="created_at" onchange="updateGraph3()">
                                            <?php
                                            // ทำการคำสั่ง SQL เพื่อดึงข้อมูลปีการศึกษาจากตาราง login_teacher โดยใช้ DISTINCT เพื่อไม่ให้มีการซ้ำข้อมูล
                                            $sql_years = "SELECT DISTINCT YEAR(created_at) AS year FROM login_student";
                                            $result_years = $conn->query($sql_years);
                                            ?>


                                            <option selected>ทั้งหมด</option>
                                            <?php
                                            // วนลูปเพื่อแสดงรายชื่อปีการศึกษาที่มีอยู่ในฐานข้อมูล
                                            if ($result_years->num_rows > 0) {
                                                while ($row = $result_years->fetch_assoc()) {
                                                    echo "<option value='" . $row['year'] . "'>" . $row['year'] . "</option>";
                                                }
                                            }
                                            ?>
                                        </select>

                                    </fieldset>
                                </div>
                            </div>

                            <?php
                            // คำสั่ง SQL เพื่อนับจำนวนนักศึกษาที่ดูแลโดยแต่ละอาจารย์
                            $sql = "SELECT teacher.name AS advisor_name, COUNT(student.id) AS student_count
                            FROM login_teacher AS teacher
                            LEFT JOIN login_student AS student ON teacher.email = student.teacher_email
                            WHERE teacher.role = 'advisor'
                            GROUP BY teacher.name";

                            $result = $conn->query($sql);

                            // สร้างตัวแปร JavaScript เพื่อเก็บข้อมูลจำนวนนักศึกษาที่ดูแลของแต่ละอาจารย์
                            $advisor_data = array();
                            while ($row = $result->fetch_assoc()) {
                                $advisor_data[] = array($row['advisor_name'], intval($row['student_count']));
                            }

                            ?>



                        </div>
                        <!-- Card Body -->
                        <div class="card-body">
                            <div id="std_advisor"></div>
                        </div>

                    </div>
                    <script>
                        Highcharts.chart('std_advisor', {
                            chart: {
                                type: 'column'
                            },
                            title: {
                                text: ''
                            },
                            subtitle: {
                                text: ''
                            },
                            xAxis: {
                                type: 'category',
                                labels: {
                                    autoRotation: [-45, -90],
                                    style: {
                                        fontSize: '13px',
                                        fontFamily: 'Verdana, sans-serif'
                                    }
                                }
                            },
                            yAxis: {
                                min: 0,
                                title: {
                                    text: 'คน'
                                }
                            },
                            legend: {
                                enabled: false
                            },
                            tooltip: {
                                pointFormat: 'จำนวนนักศึกษาที่ดูแล: <b>{point.y} คน </b>'
                            },
                            series: [{
                                name: 'Population',
                                colors: [
                                    '#9b20d9', '#9215ac', '#861ec9', '#7a17e6', '#7010f9', '#691af3',
                                    '#6225ed', '#5b30e7', '#533be1', '#4c46db', '#4551d5'
                                ],
                                colorByPoint: true,
                                groupPadding: 0,
                                data: <?php echo json_encode($advisor_data); ?>,
                                dataLabels: {
                                    enabled: true,
                                    rotation: -90,
                                    color: '#FFFFFF',
                                    align: 'right',
                                    format: '{point.y}', // one decimal
                                    y: 10, // 10 pixels down from the top
                                    style: {
                                        fontSize: '13px',
                                        fontFamily: 'Verdana, sans-serif',
                                        color: '#FFFFFF'
                                    }
                                }
                            }]
                        });

                        function updateChartyear(advisor_data) {
                            Highcharts.chart('std_advisor', {
                                chart: {
                                    type: 'column'
                                },
                                title: {
                                    text: ''
                                },
                                subtitle: {
                                    text: ''
                                },
                                xAxis: {
                                    type: 'category',
                                    labels: {
                                        autoRotation: [-45, -90],
                                        style: {
                                            fontSize: '13px',
                                            fontFamily: 'Verdana, sans-serif'
                                        }
                                    }
                                },
                                yAxis: {
                                    min: 0,
                                    title: {
                                        text: 'จำนวนนักศึกษา'
                                    }
                                },
                                legend: {
                                    enabled: false
                                },
                                tooltip: {
                                    pointFormat: 'จำนวนนักศึกษาที่ดูแล: <b>{point.y} คน </b>'
                                },
                                series: [{
                                    name: 'จำนวนนักศึกษา',
                                    colors: [
                                        '#9b20d9', '#9215ac', '#861ec9', '#7a17e6', '#7010f9', '#691af3',
                                        '#6225ed', '#5b30e7', '#533be1', '#4c46db', '#4551d5'
                                    ],
                                    colorByPoint: true,
                                    groupPadding: 0,
                                    data: advisor_data,
                                    dataLabels: {
                                        enabled: true,
                                        rotation: -90,
                                        color: '#FFFFFF',
                                        align: 'right',
                                        format: '{point.y}', // one decimal
                                        y: 10, // 10 pixels down from the top
                                        style: {
                                            fontSize: '13px',
                                            fontFamily: 'Verdana, sans-serif',
                                            color: '#FFFFFF'
                                        }
                                    }
                                }]
                            });
                        }
                    </script>
                </div>





            </div>



        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- /ส่วนของข้อมูล -->


    <script src=" https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

    <!-- jQuery -->
    <script src="./assets/js/jquery-3.5.1.min.js"></script>

    <!-- Bootstrap Core JS -->
    <script src="./assets/js/popper.min.js"></script>
    <script src="./assets/js/bootstrap.min.js"></script>

    <!-- Slimscroll JS ตัวเลื่อนแทบข้างๆ -->
    <script src="./assets/js/jquery.slimscroll.min.js"></script>
    <!-- Select2 JS -->
    <!-- <script src="./assets/js/select2.min.js"></script> -->

    <!-- Custom JS -->
    <script src="./assets/js/app.js"></script>

    <script>
        function updateGraph1(year) {
            var xhr = new XMLHttpRequest();
            xhr.open("GET", "teacher_update_data1.php?year=" + encodeURIComponent(year), true);
            xhr.onreadystatechange = function() {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    var graphData1 = JSON.parse(xhr.responseText);
                    updatepieChart(graphData1);
                }
            };
            xhr.send();
        }

        function updateGraph2() {
            var year = document.getElementById("created_at").value;

            var xhr = new XMLHttpRequest();
            xhr.open("GET", "teacher_update_data2.php?year=" + encodeURIComponent(year), true);
            xhr.onreadystatechange = function() {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    var graphData2 = JSON.parse(xhr.responseText);
                    updateChart(graphData2);
                    // updatepieChart(graphData);
                }
            };
            xhr.send();
        }

        function updateGraph3() {
            var year = document.getElementById("created_at").value;
            if (year === "ทั้งหมด") {
                year = "all"; // ใช้ค่าพิเศษเพื่อบ่งบอกว่าเลือก "ทั้งหมด"
            }
            var xhr = new XMLHttpRequest();
            xhr.open("GET", "teacher_update_data3.php?year=" + encodeURIComponent(year), true);
            xhr.onreadystatechange = function() {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    var advisor_data = JSON.parse(xhr.responseText);
                    updateChartyear(advisor_data);
                }
            };
            xhr.send();
        }
    </script>















</body>

</html>
<?php

mysqli_close($conn);
?>