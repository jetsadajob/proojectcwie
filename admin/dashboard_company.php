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
    <title>รายงานสถานประกอบการ</title>

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

        <!-- cdn mapchart -->

        <script src="https://code.highcharts.com/highcharts.js"></script>
        <script src="https://code.highcharts.com/maps/modules/map.js"></script>
        <script src="https://code.highcharts.com/mapdata/custom/world.topo.json"></script>


        <script src="https://code.highcharts.com/highcharts.js"></script>


        <script src="https://code.highcharts.com/highcharts.js"></script>
        <!-- <script src="https://code.highcharts.com/modules/exporting.js"></script> -->
        <!-- <script src="https://code.highcharts.com/modules/export-data.js"></script> -->
        <script src="https://code.highcharts.com/modules/accessibility.js"></script>

        <!-- <script src="https://code.highcharts.com/highcharts.js"></script>
            <script src="https://code.highcharts.com/modules/exporting.js"></script>
            <script src="https://code.highcharts.com/modules/accessibility.js"></script> -->





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

            #map {
                height: 500px;
                min-width: 310px;
                max-width: 800px;
                margin: 0 auto;
            }



            @import url("https://netdna.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css");

            .highcharts-figure {
                margin: 0;
            }

            #play-controls {
                max-width: 1000px;
                margin: 1em auto;
            }


            .highcharts-figure,
            .highcharts-data-table table {
                min-width: 310px;
                max-width: 800px;
                margin: 1em auto;
            }

            #moneny {
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
                min-width: 320px;
                max-width: 500px;
                margin: 1em auto;
            }


            #typecompany {
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
                        <h3 class="page-title text-center">รายงานสถานประกอบการ</h3>

                    </div>
                </div>
            </div>



            <div class="row  mb-2 col-2">
                <?php
                // ทำการเชื่อมต่อกับฐานข้อมูล
                include './work/dbwork.php';

                // ทำการคำสั่ง SQL เพื่อดึงข้อมูลปีการศึกษาจากตาราง login_student โดยใช้ DISTINCT เพื่อไม่ให้มีการซ้ำข้อมูล
                $sql_years = "SELECT DISTINCT YEAR(created_at) AS year FROM hr";
                $result_years = $conn->query($sql_years);
                ?>
                <div class="col">
                    <div class="boxfilter">
                        <fieldset>
                            <legend class="text-xs text-uppercase mb-2">ปีการศึกษา</legend>
                            <select class="form-select form-select-sm" aria-label="Small select example" id="created_at" name="created_at" onchange="updatecompany()">
                                <script>
                                    function updatecompany() {
                                        var year = document.getElementById("created_at").value;
                                        if (year === "ทั้งหมด") {
                                            year = "all"; // ใช้ค่าพิเศษเพื่อบ่งบอกว่าเลือก "ทั้งหมด"
                                        }
                                        updatecompany1(year); // เรียกใช้ฟังก์ชัน updatecompany1() เพื่ออัปเดตข้อมูลกราฟ
                                        updatecompany2(year); // สมมติว่าฟังก์ชันนี้รองรับการส่งค่าปี
                                        updatecompany3(year); // สมมติว่าฟังก์ชันนี้รองรับการส่งค่าปี
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


                                    // รับจำนวนสถานประกอบการ
                                    $result_hr = $conn->query("SELECT COUNT(*) FROM hr WHERE role = 'hr'");
                                    $hrCount = $result_hr->fetch_row()[0];

                                    // รับจำนวนสถานประกอบการ
                                    $result_staff = $conn->query("SELECT COUNT(*) FROM hr WHERE role = 'staff'");
                                    $hrCount = $result_staff->fetch_row()[0];




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


                                    // รวมจำนวนผู้ใช้จากทั้งสองตาราง
                                    $totalUsers = $hrCount;

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
                                        ผู้ประสานงาน (HR)</div>
                                    <?php
                                    // ตรวจสอบการเชื่อมต่อและตั้งค่าการเชื่อมต่อที่นี่...

                                    $sql = "SELECT COUNT(*) FROM hr WHERE role = 'hr'"; // ตรวจสอบชื่อตารางที่ถูกต้อง
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
                                    <div class="text-xs font-weight-bold text-info text-uppercase mb-1">พนักงานที่ปรึกษา (พี่เลี้ยง)
                                    </div>
                                    <?php
                                    // ตรวจสอบการเชื่อมต่อและตั้งค่าการเชื่อมต่อที่นี่...

                                    $sql = "SELECT COUNT(*) FROM hr WHERE role = 'staff'"; // ตรวจสอบชื่อตารางที่ถูกต้อง
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
                <div class="col-xl-5 col-lg-12">
                    <?php


                    $sql_hr = "SELECT COUNT(*) as hr_count FROM hr WHERE role = 'hr'";
                    $result_hr = $conn->query($sql_hr);
                    $row_hr = $result_hr->fetch_assoc();
                    $hrCount = $row_hr['hr_count'];


                    $sql_staff = "SELECT COUNT(*) as staff_count FROM hr WHERE role = 'staff'";
                    $result_staff = $conn->query($sql_staff);
                    $row_staff = $result_staff->fetch_assoc();
                    $staffCount = $row_staff['staff_count'];
                    ?>

                    <script>
                        var hrCount = <?= $hrCount; ?>;
                        var staffCount = <?= $staffCount; ?>;
                    </script>

                    <div class="card shadow mb-4">

                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary text-center">จำนวนผู้ใช้ของสถานประกอบการแต่ละประเภท</h6>
                        </div>
                        <div class="card-body">


                            <div id="company"></div>



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
                        Highcharts.chart('company', {
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
                                name: 'จำนวนพนักงาน',
                                data: [{
                                        name: 'HR',
                                        y: hrCount
                                    },
                                    {
                                        name: 'staff',
                                        y: staffCount
                                    },

                                ]
                            }]
                        });
                    </script>

                    <script>
                        function updatepieChart(graphData1) {
                            var hrCount = 0;
                            var staffCount = 0;

                            for (var i = 0; i < graphData1.length; i++) {
                                if (graphData1[i].role === 'hr') {
                                    hrCount = parseInt(graphData1[i].count);
                                }
                                if (graphData1[i].role === 'staff') {
                                    staffCount = parseInt(graphData1[i].count);
                                }
                            }

                            var chart = Highcharts.chart('company', {
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
                                    name: 'จำนวนผู้ใช้ของสถานประกอบการ',
                                    data: [{
                                            name: 'HR',
                                            y: hrCount
                                        },
                                        {
                                            name: 'staff',
                                            y: staffCount
                                        },

                                    ]
                                }]
                            });

                            chart.series[0].setData([{
                                    name: 'HR',
                                    y: hrCount
                                },
                                {
                                    name: 'staff',
                                    y: staffCount
                                }
                            ]);
                        }
                    </script>




                </div>




                <div class="col-xl-7 col-lg-12">
                    <div class="card shadow mb-4">
                        <!-- Card Header - Dropdown -->
                        <div class="card-header py-3 d ">
                            <h6 class="m-0 font-weight-bold text-primary text-center">จำนวนนักศึกษาที่ปฏิบัติสหกิจหรือฝึกงานในแต่ละบริษัท</h6>

                            <?php
                            // สำหรับนักศึกษาสหกิจ
                            $sql_coop = "SELECT company.company, COUNT(petition_document.email) AS coop_count
                            FROM petition_document
                            INNER JOIN tbl_company AS company ON petition_document.petition_organiztion_name = company.company
                            GROUP BY company.company";

                            $result_coop = $conn->query($sql_coop);

                            // สำหรับนักศึกษาฝึกงาน
                            $sql_intern = "SELECT company.company, COUNT(company_detail.email) AS intern_count
                            FROM company_detail
                            INNER JOIN tbl_company AS company ON company_detail.company_detail_name = company.company
                            GROUP BY company.company";

                            $result_intern = $conn->query($sql_intern);
                            ?>




                        </div>
                        <!-- Card Body -->
                        <div class="card-body">
                            <div id="coopintern"></div>
                        </div>

                    </div>
                    <script>
                        Highcharts.chart('coopintern', {
                            chart: {
                                type: 'column'
                            },
                            title: {
                                text: ' ',
                                align: 'center'
                            },
                            xAxis: {
                                categories: [<?php
                                                while ($row = $result_coop->fetch_assoc()) {
                                                    echo "'" . $row['company'] . "',";
                                                }
                                                ?>],
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
                                    data: [<?php
                                            $result_coop->data_seek(0);
                                            while ($row = $result_coop->fetch_assoc()) {
                                                echo $row['coop_count'] . ",";
                                            }
                                            ?>]
                                },
                                {
                                    name: 'นักศึกษาฝึกงาน',
                                    data: [<?php
                                            $result_intern->data_seek(0);
                                            while ($row = $result_intern->fetch_assoc()) {
                                                echo $row['intern_count'] . ",";
                                            }
                                            ?>]
                                }
                            ]
                        });

                        function updateChart(graphData2) {
                            Highcharts.chart('coopintern', {
                                chart: {
                                    type: 'column'
                                },
                                title: {
                                    text: ' ',
                                    align: 'center'
                                },
                                xAxis: {
                                    categories: graphData2.companies,
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
                                    data: graphData2.coop_counts
                                }, {
                                    name: 'นักศึกษาฝึกงาน',
                                    data: graphData2.intern_counts
                                }]
                            });
                        }
                    </script>

                </div>


                <!-- <div class="col-xl-12 col-lg-12">
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary text-center">จำนวนเบี้ยเลี้ยงของแต่ละบริษัทที่ให้นักศึกษามากที่สุด</h6>
                        </div>
                        <div class="card-body">

                            <div id="moneny"></div>



                        </div>
                    </div>
                </div> -->

                <script>
                    Highcharts.chart('moneny', {
                        chart: {
                            type: 'bar'
                        },
                        title: {
                            text: '',
                            align: 'left'
                        },
                        subtitle: {
                            text: '',
                            align: 'left'
                        },
                        xAxis: {
                            categories: ['INET', 'PPT', 'SCG', 'SCB', 'TCC '],
                            title: {
                                text: null
                            },
                            gridLineWidth: 1,
                            lineWidth: 0
                        },
                        yAxis: {
                            min: 0,
                            title: {
                                text: 'บาท',
                                align: 'high'
                            },
                            labels: {
                                overflow: 'justify'
                            },
                            gridLineWidth: 0
                        },
                        tooltip: {
                            valueSuffix: ' บาท'
                        },
                        plotOptions: {
                            bar: {
                                borderRadius: '50%',
                                dataLabels: {
                                    enabled: true
                                },
                                groupPadding: 0.1
                            }
                        },
                        legend: {
                            layout: 'vertical',
                            align: 'right',
                            verticalAlign: 'top',
                            x: -40,
                            y: 80,
                            floating: true,
                            borderWidth: 1,
                            backgroundColor: Highcharts.defaultOptions.legend.backgroundColor || '#FFFFFF',
                            shadow: true
                        },
                        credits: {
                            enabled: false
                        },
                        series: [{
                                name: 'นักศึกษาสหกิจศึกษา',
                                data: [631, 727, 3202, 721, 3202]
                            },
                            {
                                name: 'นักศึกษาสหกิจศึกษาฝึกงาน',
                                data: [814, 841, 3714, 726, 3714]
                            }, {

                            }
                        ]
                    });
                </script>
            </div>
















            <div class="col-xl-12 col-lg-12">
                <div class="card shadow mb-4">
                    <!-- Card Header - Dropdown -->
                    <div class="card-header py-3  ">
                        <h6 class="m-0 font-weight-bold text-primary text-center">จำนวนสถานประกอบการที่เข้าร่วมในแต่ละปี โดยเเบ่งตามประเภทสถานประกอบการ (แห่ง)</h6>


                        <?php
                        // คำสั่ง SQL เพื่อดึงข้อมูลจำนวนบริษัทที่ลงทะเบียนเข้าใช้บริการในแต่ละปี
                        $sql = "SELECT YEAR(created_at) AS registration_year, COUNT(company_id) AS company_count
                            FROM tbl_company
                            GROUP BY YEAR(created_at)";
                        $result = $conn->query($sql);

                        $company_data = array();
                        while ($row = $result->fetch_assoc()) {
                            $company_data[] = array($row['registration_year'], intval($row['company_count']));
                        }

                        ?>



                    </div>
                    <!-- Card Body -->
                    <div class="card-body">
                        <div id="company_year"></div>
                    </div>

                </div>
                <script>
                    Highcharts.chart('company_year', {
                        chart: {
                            type: 'column'
                        },
                        title: {
                            text: ''
                        },
                        xAxis: {
                            type: 'category',
                            labels: {
                                style: {
                                    fontSize: '13px',
                                    fontFamily: 'Verdana, sans-serif'
                                }
                            }
                        },
                        yAxis: {
                            min: 0,
                            title: {
                                text: 'จำนวนบริษัท'
                            }
                        },
                        legend: {
                            enabled: false
                        },
                        tooltip: {
                            pointFormat: 'จำนวนบริษัท: <b>{point.y} บริษัท</b>'
                        },
                        series: [{
                            name: 'Population',
                            colorByPoint: true,
                            data: <?php echo json_encode($company_data); ?>,
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


                    function updateChartyear(graphData3) {
                        Highcharts.chart('company_year', {
                            chart: {
                                type: 'column'
                            },
                            title: {
                                text: ' ',
                                align: 'center'
                            },
                            xAxis: {
                                type: 'category',
                                labels: {
                                    style: {
                                        fontSize: '13px',
                                        fontFamily: 'Verdana, sans-serif'
                                    }
                                }
                            },
                            yAxis: {
                                min: 0,
                                title: {
                                    text: 'จำนวนบริษัท'
                                }
                            },
                            legend: {
                                enabled: false
                            },
                            tooltip: {
                                pointFormat: 'จำนวนบริษัท: <b>{point.y} บริษัท</b>'
                            },
                            series: [{
                                name: 'จำนวนบริษัท',
                                colorByPoint: true,
                                data: graphData3,
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
        function updatecompany1(year) {
            var xhr = new XMLHttpRequest();
            xhr.open("GET", "com_update_company_data1.php?year=" + encodeURIComponent(year), true);
            xhr.onreadystatechange = function() {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    var graphData1 = JSON.parse(xhr.responseText);
                    updatepieChart(graphData1); // เรียกใช้ฟังก์ชัน updatepieChart() เพื่ออัปเดตข้อมูลกราฟ
                }
            };
            xhr.send();
        }

        function updatecompany2() {
            var year = document.getElementById("created_at").value;

            var xhr = new XMLHttpRequest();
            xhr.open("GET", "com_update_company_data2.php?year=" + encodeURIComponent(year), true);
            xhr.onreadystatechange = function() {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    var graphData2 = JSON.parse(xhr.responseText);
                    updateChart(graphData2);
                    // updatepieChart(graphData);
                }
            };
            xhr.send();
        }

        function updatecompany3(year) {
            var xhr = new XMLHttpRequest();
            xhr.open("GET", "com_update_company_data3.php?year=" + encodeURIComponent(year), true);
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