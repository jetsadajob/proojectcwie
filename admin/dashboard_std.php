<?php
session_start();
include './work/dbwork.php';

if (!isset($_SESSION['id'])) {
    header('Location: ./registerr/login.php');
    exit();
}


// session_start();
// if ($_SESSION['id'] == "") {
//     header("location : ./register/login.php");
// } else {

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>รายงานนักศึกษา</title>

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
        <!-- <iink rel="stylesheet" href="./assets/css/style2.css"> -->


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


            .highcharts-figure,
            .highcharts-data-table table {
                min-width: 310px;
                max-width: 800px;
                margin: 1em auto;
            }

            #containertt {
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
                        <h3 class="page-title text-center">รายงานนักศึกษาสหกิจศึกษาและฝึกงาน</h3>

                    </div>
                </div>
            </div>

            <div class="row  mb-2 col-2">
                <?php
                // ทำการเชื่อมต่อกับฐานข้อมูล
                include './work/dbwork.php';

                // ทำการคำสั่ง SQL เพื่อดึงข้อมูลปีการศึกษาจากตาราง login_student โดยใช้ DISTINCT เพื่อไม่ให้มีการซ้ำข้อมูล
                $sql_years = "SELECT DISTINCT YEAR(created_at) AS year FROM login_student";
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
                                        updateGraph3(year); // สมมติว่าฟังก์ชันนี้รองรับการส่งค่าปี
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
                            <legend class="text-xs  text-uppercase mb-2">ประเภทนักศึกษา</legend>
                            <select class="form-select form-select-sm" aria-label="Small select example">
                                <option selected>ทั้งหมด</option>
                                <option value="นักศึกษาฝึกงาน">ฝึกงาน</option>
                                <option value="นักศึกษาสหกิจศึกษา">สหกิจศึกษา</option>
                            </select>
                    </div>
                    </fieldset>
                </div> -->
            </div>



            <!-- <form method="GET" action="">
                <div class="row  mb-2 ">
                    <div class="col-2">
                        <div class="boxfilter">
                            <fieldset>
                                <legend class="text-xs text-uppercase mb-1">ปีการศึกษา</legend>

                                <select class="form-select form-select-sm" aria-label="Small select example" name="year">
                                    <option value="">ทั้งหมด</option>
                                    <?php
                                    $currentYear = date('Y');
                                    for ($year = $currentYear; $year >= $currentYear - 3; $year--) : ?>
                                        <option value="<?php echo $year; ?>" <?php if (isset($_GET['year']) && $_GET['year'] == $year) echo 'selected'; ?>>
                                            <?php echo $year; ?>
                                        </option>
                                    <?php endfor; ?>
                                </select>
                            </fieldset>
                        </div>
                    </div>

                    <div class="col-2">
                        <div class="boxfilter">
                            <fieldset>
                                <legend class="text-xs text-uppercase mb-1">ประเภทนักศึกษา</legend>
                                <select class="form-select form-select-sm" aria-label="Small select example" name="student_type">
                                    <option value="">ทั้งหมด</option>
                                    <option value="cooperative_student" <?php if (isset($_GET['student_type']) && $_GET['student_type'] == 'cooperative_student') echo 'selected'; ?>>นักศึกษาสหกิจศึกษา</option>
                                    <option value="internship_student" <?php if (isset($_GET['student_type']) && $_GET['student_type'] == 'internship_student') echo 'selected'; ?>>นักศึกษาฝึกงาน</option>
                                </select>
                            </fieldset>
                        </div>
                    </div>



                    
                </div>

                <input type="submit" value="ค้นหา">
            </form> -->





            <!-- ป้ายเเดชบอร์ด Row -->
            <div class="row">

                <!-- Earnings (Monthly) Card Example -->
                <div class="col-xl-4 col-md-6 ">
                    <div class="card  shadow  ">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col ">
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

                                    // รวมจำนวนผู้ใช้จากทั้งสองตาราง
                                    $totalUsers = $hrCount + $studentCount;

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
                <div class="col-xl-4 col-md-6 ">
                    <div class="card  shadow  ">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                        นักศึกษาสหกิจ</div>
                                    <?php
                                    // ตรวจสอบการเชื่อมต่อและตั้งค่าการเชื่อมต่อที่นี่...

                                    $sql = "SELECT COUNT(*) FROM login_student WHERE role = 'cooperative_student'"; // ตรวจสอบชื่อตารางที่ถูกต้อง
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
                <div class="col-xl-4 col-md-6 ">
                    <div class="card  shadow  ">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-info text-uppercase mb-1">นักศึกษาฝึกงาน
                                    </div>
                                    <?php
                                    // ตรวจสอบการเชื่อมต่อและตั้งค่าการเชื่อมต่อที่นี่...

                                    $sql = "SELECT COUNT(*) FROM login_student WHERE role = 'internship_student'"; // ตรวจสอบชื่อตารางที่ถูกต้อง
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

                    <script>
                        var coopCount = <?= $coopCount; ?>;
                        var internCount = <?= $internCount; ?>;
                    </script>

                    <div class="card shadow mb-4">

                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary text-center">จำนวนนักศึกษาแต่ละประเภท</h6>
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
                                name: 'จำนวนนักศึกษา',
                                data: [{
                                        name: 'นักศึกษาฝึกงาน',
                                        y: coopCount
                                    },
                                    {
                                        name: 'นักศึกษาสหกิจศึกษา',
                                        y: internCount
                                    },

                                ]
                            }]
                        });
                    </script>

                    <script>
                        function updatepieChart(graphData1) {
                            var coopCount = 0;
                            var internCount = 0;

                            for (var i = 0; i < graphData1.length; i++) {
                                if (graphData1[i].role === 'cooperative_student') {
                                    coopCount = parseInt(graphData1[i].count);
                                }
                                if (graphData1[i].role === 'internship_student') {
                                    internCount = parseInt(graphData1[i].count);
                                }
                            }

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
                                    // pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'

                                    //  pointFormat: '{series.name}:<b>{series.data:} คน</b>'
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
                                    name: 'จำนวนนักศึกษา',
                                    data: [{
                                            name: 'นักศึกษาฝึกงาน',
                                            y: coopCount
                                        },
                                        {
                                            name: 'นักศึกษาสหกิจศึกษา',
                                            y: internCount
                                        },

                                    ]
                                }]
                            });

                            chart.series[0].setData([{
                                    name: 'นักศึกษาฝึกงาน',
                                    y: coopCount
                                },
                                {
                                    name: 'นักศึกษาสหกิจศึกษา',
                                    y: internCount
                                }
                            ]);
                        }
                    </script>


                </div>



                <div class="col-xl-8 col-lg-12">
                    <?php

                    // รับจำนวนนักศึกษาสหกิจ IT
                    $result_coopIT = $conn->query("SELECT COUNT(*) FROM login_student WHERE role = 'cooperative_student' AND major = 'เทคโนโลยีสารสนเทศ'");
                    $coopCountIT = $result_coopIT->fetch_row()[0];

                    // รับจำนวนนักศึกษาฝึกงาน IT
                    $result_internIT = $conn->query("SELECT COUNT(*) FROM login_student WHERE role = 'internship_student' AND major = 'เทคโนโลยีสารสนเทศ'");
                    $internCountIT = $result_internIT->fetch_row()[0];


                    // รับจำนวนนักศึกษาสหกิจ CS
                    $result_coopCS = $conn->query("SELECT COUNT(*) FROM login_student WHERE role = 'cooperative_student' AND major = 'วิทยาการคอมพิวเตอร์'");
                    $coopCountCS = $result_coopCS->fetch_row()[0];

                    // รับจำนวนนักศึกษาฝึกงาน CS
                    $result_internCS = $conn->query("SELECT COUNT(*) FROM login_student WHERE role = 'internship_student' AND major = 'วิทยาการคอมพิวเตอร์'");
                    $internCountCS = $result_internCS->fetch_row()[0];


                    // รับจำนวนนักศึกษาสหกิจ GIS
                    $result_coopGIS = $conn->query("SELECT COUNT(*) FROM login_student WHERE role = 'cooperative_student' AND major = 'ภูมิสารสนเทศศาสตร์'");
                    $coopCountGIS = $result_coopGIS->fetch_row()[0];

                    // รับจำนวนนักศึกษาฝึกงาน GIS
                    $result_internGIS = $conn->query("SELECT COUNT(*) FROM login_student WHERE role = 'internship_student' AND major = 'ภูมิสารสนเทศศาสตร์'");
                    $internCountGIS = $result_internGIS->fetch_row()[0];


                    // รับจำนวนนักศึกษาสหกิจ AI
                    $result_coopAI = $conn->query("SELECT COUNT(*) FROM login_student WHERE role = 'cooperative_student' AND major = 'ปัญญาประดิษฐ์'");
                    $coopCountAI = $result_coopAI->fetch_row()[0];

                    // รับจำนวนนักศึกษาฝึกงาน AI
                    $result_internAI = $conn->query("SELECT COUNT(*) FROM login_student WHERE role = 'internship_student' AND major = 'ปัญญาประดิษฐ์'");
                    $internCountAI = $result_internAI->fetch_row()[0];

                    // รับจำนวนนักศึกษาสหกิจ CB
                    $result_coopCB = $conn->query("SELECT COUNT(*) FROM login_student WHERE role = 'cooperative_student' AND major = 'ความมั่นคงปลอดภัยไซเบอร์'");
                    $coopCountCB = $result_coopCB->fetch_row()[0];

                    // รับจำนวนนักศึกษาฝึกงาน CB
                    $result_internCB = $conn->query("SELECT COUNT(*) FROM login_student WHERE role = 'internship_student' AND major = 'ความมั่นคงปลอดภัยไซเบอร์'");
                    $internCountCB = $result_internCB->fetch_row()[0];



                    $sql_coop_it = "SELECT COUNT(*) FROM login_student WHERE role = 'cooperative_student' AND major = 'เทคโนโลยีสารสนเทศ'";
                    $sql_intern_it = "SELECT COUNT(*) FROM login_student WHERE role = 'internship_student' AND major = 'เทคโนโลยีสารสนเทศ'";

                    $sql_coop_cs = "SELECT COUNT(*) FROM login_student WHERE role = 'cooperative_student' AND major = 'วิทยาการคอมพิวเตอร์'";
                    $sql_intern_cs = "SELECT COUNT(*) FROM login_student WHERE role = 'internship_student' AND major = 'วิทยาการคอมพิวเตอร์'";

                    $sql_coop_gis = "SELECT COUNT(*) FROM login_student WHERE role = 'cooperative_student' AND major = 'ภูมิสารสนเทศศาสตร์'";
                    $sql_intern_gis = "SELECT COUNT(*) FROM login_student WHERE role = 'internship_student' AND major = 'ภูมิสารสนเทศศาสตร์'";

                    $sql_coop_ai = "SELECT COUNT(*) FROM login_student WHERE role = 'cooperative_student' AND major = 'ปัญญาประดิษฐ์'";
                    $sql_intern_ai = "SELECT COUNT(*) FROM login_student WHERE role = 'internship_student' AND major = 'ปัญญาประดิษฐ์'";

                    $sql_coop_cb = "SELECT COUNT(*) FROM login_student WHERE role = 'cooperative_student' AND major = 'ความมั่นคงปลอดภัยไซเบอร์'";
                    $sql_intern_cb = "SELECT COUNT(*) FROM login_student WHERE role = 'internship_student' AND major = 'ความมั่นคงปลอดภัยไซเบอร์'";




                    ?>
                    <script>
                        var coopCountIT = <?= $coopCountIT; ?>;
                        var internCountIT = <?= $internCountIT; ?>;

                        var coopCountCS = <?= $coopCountCS; ?>;
                        var internCountCS = <?= $internCountCS; ?>;

                        var coopCountGIS = <?= $coopCountGIS; ?>;
                        var internCountGIS = <?= $internCountGIS; ?>;

                        var coopCountAI = <?= $coopCountAI; ?>;
                        var internCountAI = <?= $internCountAI; ?>;

                        var coopCountCB = <?= $coopCountCB; ?>;
                        var internCountCB = <?= $internCountCB; ?>;
                    </script>

                    <div class="card shadow mb-4">
                        <!-- Card Header - Dropdown -->
                        <div class="card-header py-3  ">
                            <h6 class="m-0 font-weight-bold text-primary text-center">จำนวนนักศึกษาแต่ละหลักสูตร (แบ่งตามประเภท)</h6>


                        </div>
                        <!-- Card Body -->
                        <div class="card-body">
                            <div id="allmajor"></div>
                        </div>

                    </div>

                    <script>
                        Highcharts.chart('allmajor', {
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
                                },
                            },
                            yAxis: {
                                min: 0,
                                title: {
                                    text: 'จำนวนนักศึกษา'
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
                                pointFormat: '{series.name}: {point.y}<br/>นักศึกษาทั้งหมด: {point.stackTotal}'
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
                                name: 'สหกิจศึกษา',
                                data: [coopCountIT, coopCountCS, coopCountGIS, coopCountAI, coopCountCB]
                            }, {
                                name: 'ฝึกงาน',
                                data: [internCountIT, internCountCS, internCountGIS, internCountAI, internCountCB]

                            }]
                        });
                    </script>

                    <script>
                        function updateChart(graphData2) {
                            var categories = ['เทคโนโลยีสารสนเทศ', 'วิทยาการคอมพิวเตอร์', 'ภูมิสารสนเทศศาสตร์', 'ปัญญาประดิษฐ์', 'ความมั่นคงปลอดภัยไซเบอร์'];

                            var coopData = [];
                            var internData = [];

                            for (var i = 0; i < categories.length; i++) {
                                var coopCount = 0;
                                var internCount = 0;

                                for (var j = 0; j < graphData2.length; j++) {
                                    if (graphData2[j].major === categories[i] && graphData2[j].role === 'cooperative_student') {
                                        coopCount = parseInt(graphData2[j].count);
                                    }
                                    if (graphData2[j].major === categories[i] && graphData2[j].role === 'internship_student') {
                                        internCount = parseInt(graphData2[j].count);
                                    }
                                }

                                coopData.push(coopCount);
                                internData.push(internCount);
                            }

                            var chart = Highcharts.chart('allmajor', {

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
                                    },
                                },
                                yAxis: {
                                    min: 0,
                                    title: {
                                        text: 'จำนวนนักศึกษา'
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
                                    pointFormat: '{series.name}: {point.y}<br/>นักศึกษาทั้งหมด: {point.stackTotal}'
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
                                    name: 'สหกิจศึกษา',
                                    data: [coopCountIT, coopCountCS, coopCountGIS, coopCountAI, coopCountCB]
                                }, {
                                    name: 'ฝึกงาน',
                                    data: [internCountIT, internCountCS, internCountGIS, internCountAI, internCountCB]

                                }]

                            });

                            chart.series[0].setData(coopData);
                            chart.series[1].setData(internData);
                        }
                    </script>

                </div>




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

                    <script>
                        function updateChartyear(graphData3) {
                            var years = [];
                            var coopData = [];
                            var internData = [];

                            graphData3.forEach(function(item) {
                                if (!years.includes(item.year)) {
                                    years.push(item.year);
                                }
                                if (item.role === 'cooperative_student') {
                                    coopData.push(parseInt(item.count));
                                } else if (item.role === 'internship_student') {
                                    internData.push(parseInt(item.count));
                                }
                            });

                            Highcharts.chart('containertt', {
                                chart: {
                                    type: 'column'
                                },
                                title: {
                                    text: ''
                                },
                                xAxis: {
                                    categories: years,
                                    crosshair: true
                                },
                                yAxis: {
                                    min: 0,
                                    title: {
                                        text: 'จำนวน (คน)'
                                    }
                                },
                                series: [{
                                    name: 'นักศึกษาสหกิจศึกษา',
                                    data: coopData
                                }, {
                                    name: 'นักศึกษาฝึกงาน',
                                    data: internData
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
        function updateGraph1() {
            var year = document.getElementById("created_at").value;

            var xhr = new XMLHttpRequest();
            xhr.open("GET", "std_update_graph_data1.php?year=" + encodeURIComponent(year), true);
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
            xhr.open("GET", "std_update_graph_data2.php?year=" + encodeURIComponent(year), true);
            xhr.onreadystatechange = function() {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    var graphData2 = JSON.parse(xhr.responseText);
                    updateChart(graphData2);
                    // updatepieChart(graphData);
                }
            };
            xhr.send();
        }

        function updateGraph3(year) {
            var xhr = new XMLHttpRequest();
            xhr.open("GET", "std_update_graph_data3.php?year=" + encodeURIComponent(year), true);
            xhr.onreadystatechange = function() {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    var graphData3 = JSON.parse(xhr.responseText);
                    updateChartyear(graphData3);
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